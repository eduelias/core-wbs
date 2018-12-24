
<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_saci_admin_index.php
+--------------------------------------------------------------
*/

include("classprod.php");

$prod = new operacao();

echo ("
<style type='text/css'>
<!--
body {
	margin-left: 15px;
	margin-top: 15px;
	margin-right: 15px;
	margin-bottom: 15px;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 14px;
	color: #333333;
	background-color: #FFFFFF;
}
.campoedt {
	border-top: 1px solid #333;
	border-left: 1px solid #333;
	border-bottom: 1px solid #ccc;
	border-right: 1px solid #ccc;
	font-size: 10px;
	color: #333333;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	background-color: #FFFFFF;
	padding: 1px;
}
.botao {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 10px;
	color: #666666;
	background-color: #FFFFFF;
	border-top: 1px solid #CCCCCC;
	border-left: 1px solid #CCCCCC;
	border-bottom: 1px solid #333333;
	border-right: 1px solid #333333;
}
.emp_atual {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	color: #FFFFFF;
	background-color: #666666;
	padding: 6px;
}
.emp_nova {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	color: #FFFFFF;
	background-color: #EA0000;
	padding: 6px;
}
.borda {
	border: 2px solid #666666;
	margin: 4px;
	padding: 4px;
}
-->
</style>
");

if (!$acao) {
    echo ("
<table  border='0' cellpadding='2' cellspacing='2' class='borda'>
  <tr>
    <td class='emp_atual'>Mestre dos Magos</td>
  </tr>
</table>
<br>
<table  border='0' cellpadding='2' cellspacing='2' class='borda'>
<form action='evandro.php?acao=login' name='login' method='post'>
  <tr>
    <td>Senha:</td>
    <td><input name='senha' type='password' class='campoedt' id='senha' size='10' maxlength='8'></td>
    <td><input name='Submit' type='submit' class='botao' value='ok'></td>
  </tr>
</form>
</table>
    ");
}
elseif ($acao == "login")
{
    if ($senha == "ipa321")
    {
        // pega codemp
        $prod->clear();
        $prod->listProdU("codemp_transf","vendedor", "codvend = '105'");
        $codemp_view = $prod->showcampo0();

        // nome codemp
        $prod->clear();
        $prod->listProdU("nome","empresa", "codemp = '$codemp_view'");
        $nomeemp_view = $prod->showcampo0();
        
        // ipasoft independencia = 2
        // ipasoft halfeld = 10
        if ($codemp_view == "2")
        {
            $nomeemp_view2 = "Ipasoft Halfeld";
        }
        if ($codemp_view == "10")
        {
            $nomeemp_view2 = "Ipasoft Independência";
        }
        
        echo ("
<table  border='0' cellpadding='2' cellspacing='2' class='borda'>
  <tr>
    <td class='emp_atual'>Mestre dos Magos</td>
  </tr>
</table>
<br>
<table  border='0' cellpadding='2' cellspacing='2' class='borda'>
<form action='evandro.php?acao=trocar' name='troca' method='post'>
  <tr>
    <td align='right'>Empresa atual:</td>
    <td class='emp_atual'>$nomeemp_view</td>
  </tr>
  <tr>
    <td align='right'>Trocar para:</td>
    <td class='emp_nova'>$nomeemp_view2</td>
  </tr>
  <tr>
    <td align='right'><input name='empatual' type='hidden' id='empatual' value='$codemp_view'></td>
    <td><input name='Submit' type='submit' class='botao' value='Sim'></td>
  </tr>
</form>
</table>
        ");
//echo "codemp_view: $codemp_view<br>";
    }
}
elseif ($acao == "trocar")
{
        // ipasoft independencia = 2
        // ipasoft halfeld = 10
        //echo "empatual: $empatual<br>";
        if ($empatual == "2")
        {
            $condicaoup = "codemp_transf = '10'";
        }
        if ($empatual == "10")
        {
            $condicaoup = "codemp_transf = '2'";
        }

        // troca
        $prod->clear();
        $prod->upProdU("vendedor", "$condicaoup", "codvend = '105'");

        // pega codemp
        $prod->clear();
        $prod->listProdU("codemp_transf","vendedor", "codvend = '105'");
        $codemp_view = $prod->showcampo0();

        // nome codemp
        $prod->clear();
        $prod->listProdU("nome","empresa", "codemp = '$codemp_view'");
        $nomeemp_view = $prod->showcampo0();
        
        echo ("
<table  border='0' cellpadding='2' cellspacing='2' class='borda'>
  <tr>
    <td class='emp_atual'>Mestre dos Magos</td>
  </tr>
</table>
<br>
<table  border='0' cellpadding='2' cellspacing='2' class='borda'>
  <tr>
    <td align='center'>Troca efetuada!</td>
  </tr>
  <tr>
    <td align='center'>Empresa atual</td>
  </tr>
  <tr>
    <td align='center' class='emp_nova'>$nomeemp_view</td>
  </tr>
</table>
        ");
}


?>
