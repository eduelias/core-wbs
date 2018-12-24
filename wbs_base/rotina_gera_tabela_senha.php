<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_seed.php
|  template:    sistema_seed.htm
+--------------------------------------------------------------
*/

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$db->connect_wbs();

//$db->conn->debug = true;

$rs_lista = $db->query_db("SELECT codvend, nome, seed FROM vendedor WHERE tipo = 'R' AND block = 'N' ORDER BY codvend","SQL_NONE","N");

function gera_codigo($id_vend, $seed, $pos)
{
	$i= $pos;

	$valor1 = abs((int)(ceil(pow($i*$seed,4))+pow($id_vend,2) + log($seed*$i)));
	$valor2 = abs((int)(ceil(pow($id_vend,3))+pow($seed*$i,2) + log($i)*pi));

	$valor_t = substr($valor1 + $valor2,0,4); 

	return $valor_t;
}

?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
/* Verificacao */
.vs_verifica {
	background-color: #FFFFFF;
	margin: 5px;
	padding: 5px;
	width: 80%;
}
.vs_numero {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: bold;
	text-transform: uppercase;
	color: #FFFFFF;
	padding: 2px;
	background-color: #305DB8;
	background-image: url(wbs2_novo/images/fd4azul_padrao.jpg);
	background-position: 20px;
	border: 1px solid #305DB8;
}
.vs_botao_ok {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: bold;
	color: #FFFFFF;
	background-image: url(wbs2_novo/images/fd5blackgrey.jpg);
	background-position: 20px;
	border: 2px ridge #4F4F4F;
}
.vs_botao_limpar {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: bold;
	color: #FFFFFF;
	background-image: url(wbs2_novo/images/fd5blackgrey.jpg);
	background-position: 20px;
	border: 2px ridge #4F4F4F;
}
.vs_botao_ajuda {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: bold;
	color: #FFFFFF;
	background-image: url(wbs2_novo/images/fd5blackgrey.jpg);
	background-position: 20px;
	border: 2px ridge #4F4F4F;
}
.vs_botao_numero {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-weight: bold;
	color: #000000;
	background-image: url(wbs2_novo/images/fd2coresgold.jpg);
	background-position: 20px;
	border: 2px ridge #FFAA07;
	padding-top: 4px;
	padding-bottom: 4px;
}
.letra001 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	text-transform: uppercase;
	color: #000000;
}
.vs_senha {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	text-transform: uppercase;
	color: #000000;
	background-color: #FFFFFF;
	border: 2px solid #3160BA;
	padding: 3px;
}

/* Tabela */
.tabela {
	border: 3px solid #000000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.titulo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-transform: uppercase;
	color: #FFFFFF;
	background-color: #5582C2;
	font-weight: bold;
	text-align: center;
	border-bottom-width: 2px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
	background-image: url(wbs2_novo/images/fd2coresblue.jpg);
	background-position: 20px;
	padding-top: 8px;
	padding-bottom: 8px;
	font-size: 12px;
}
.titulo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	text-transform: uppercase;
	background-color: #83B7E2;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
	background-image: url(wbs2_novo/images/fd4azul_padrao.jpg);
	padding: 0px;
}
.linhas {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-transform: uppercase;
	color: #000000;
	padding: 3px;
	font-size: 10px;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #000000;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}

-->
</style>
<?
while (!$rs_lista->EOF)
{
$id_vend = $rs_lista->fields['codvend'];
$loginseed= $rs_lista->fields['nome'];
$seed = $rs_lista->fields['seed'];
?>
<table border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <td><table border="0" cellpadding="0" cellspacing="1" class="tabela">
      <tr>
        <td colspan="10" class="titulo1">WBS - TABELA DE SENHAS</td>
      </tr>
      <tr>
        <td colspan="10" class="titulo2"><table border="0" cellpadding="1" cellspacing="2" class="letra001">
            <tr>
              <td><strong><? echo $loginseed; ?></strong></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <? for($i = 1; $i <= 10; $i++) { ?>
      <tr align="center">
        <td bgcolor="#FFCC00" class="linhas"><strong>
          <? $a = $i; echo $a; ?>
        </strong></td>
        <td class="linhas"><? echo gera_codigo($id_vend, $seed, $i); ?></td>
        <td bgcolor="#FFCC00" class="linhas"><strong>
          <? $b = $i + 10; echo $b; ?>
        </strong></td>
        <td class="linhas"><? echo gera_codigo($id_vend, $seed, $i+10); ?></td>
        <td bgcolor="#FFCC00" class="linhas"><strong>
          <? $c = $i + 20; echo $c; ?>
        </strong></td>
        <td class="linhas"><? echo gera_codigo($id_vend, $seed, $i+20); ?></td>
        <td bgcolor="#FFCC00" class="linhas"><strong>
          <? $d = $i + 30; echo $d; ?>
        </strong></td>
        <td class="linhas"><? echo gera_codigo($id_vend, $seed, $i+30); ?></td>
        <td bgcolor="#FFCC00" class="linhas"><strong>
          <? $e = $i + 40; echo $e; ?>
        </strong></td>
        <td class="linhas"><? echo gera_codigo($id_vend, $seed, $i+40); ?></td>
      </tr>
      <? } ?>
    </table></td>
    <td><img src="images/ajudask.jpg" width="447" height="250"></td>
  </tr>
</table>
<?php
	$rs_lista->MoveNext();
}

$db->disconnect();
?>