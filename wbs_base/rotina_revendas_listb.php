<?php

include("classprod.php");

// INICIO DA CLASSE
$prod = new operacao();

$prod->clear();
$prod->listProdSum("codvend, nome, doc, tipocliente, codsuper, dataini", "vendedor", "tipo = 'R' AND block = 'Y' AND (codsuper <> '22' AND codsuper <> '24' AND codsuper <> '25' AND codsuper <> '33')", $arrayx, $array_campox, "ORDER BY dataini, nome ASC");

for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );

	$codvend_list[$i] = $prod->showcampo0();
	$login_list[$i] = $prod->showcampo1();
	$docvend_list[$i] = $prod->showcampo2();
	$tipocliente_list[$i] = $prod->showcampo3();
	$codsuper_list[$i] = $prod->showcampo4();
	$dataini_list[$i] = $prod->showcampo5();
/*
	if ($block_list[$i] == "Y")
	{
        $block_list[$i] = "SIM";
    }
	if ($block_list[$i] == "N")
	{
        $block_list[$i] = "";
    }
*/
	if ($tipocliente_list[$i] == "F")
	{
        $condicaopesq1 = "tipocliente = 'F' and cpf = '$docvend_list[$i]'";
    }
	if ($tipocliente_list[$i] == "J")
	{
        $condicaopesq1 = "tipocliente = 'J' AND cnpj = '$docvend_list[$i]'";
    }
	
    $prod->clear();
    $prod->listProdU("nome, cidade, dddtel1, tel1, email, dddtel2, tel2","clientenovo", "$condicaopesq1");
    $nomecliente_list[$i] = $prod->showcampo0();
    $cidade_list[$i] = $prod->showcampo1();
    $dddtel_list[$i] = $prod->showcampo2();
    $tel_list[$i] = $prod->showcampo3();
    $email_list[$i] = $prod->showcampo4();
    $dddtel2_list[$i] = $prod->showcampo5();
    $tel2_list[$i] = $prod->showcampo6();
    
    $telefone_list[$i] = "($dddtel_list[$i]) $tel_list[$i]";
    $telefone2_list[$i] = "($dddtel2_list[$i]) $tel2_list[$i]";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Revendas</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	font-family: "Trebuchet MS", Tahoma, Verdana;
	font-size: 11px;
	color: #000000;
}
.titulo_tabela {
	font-family: "Trebuchet MS", Tahoma, Verdana;
	font-size: 11px;
	padding: 2px;
	background-color: #FFCC00;
	text-transform: uppercase;
	font-weight: bold;
}
.resul_tabela {
	font-family: "Trebuchet MS", Tahoma, Verdana;
	font-size: 11px;
	text-transform: uppercase;
	padding: 3px;
}
-->
</style>
</head>

<body>
<table  border="1" cellpadding="1" cellspacing="2">
  <tr>
    <td>&nbsp;</td>
    <td class="titulo_tabela">Login</td>
    <td class="titulo_tabela">Nome</td>
    <td class="titulo_tabela">DOC</td>
    <td class="titulo_tabela">Tel1</td>
    <td class="titulo_tabela">E-mail</td>
    <td class="titulo_tabela">Cidade</td>
  </tr>
<?	for($i = 0; $i < count($arrayx); $i++ ){ ?>
  <tr>
    <td rowspan="2" align="center" valign="middle"><? echo $i+1; ?></td>
    <td valign="top" class="resul_tabela"><strong><? echo $login_list[$i]; ?></strong><br>
      <? echo $dataini_list[$i]; ?></td>
    <td valign="top" class="resul_tabela"><? echo $nomecliente_list[$i]; ?></td>
    <td valign="top" class="resul_tabela"><? echo $docvend_list[$i]; ?></td>
    <td valign="top" class="resul_tabela"><? echo $telefone_list[$i]; ?><br>
    <? echo $telefone2_list[$i]; ?></td>
    <td valign="top" class="resul_tabela"><? echo $email_list[$i]; ?></td>
    <td valign="top" class="resul_tabela"><? echo $cidade_list[$i]; ?></td>
  </tr>
  <tr>
    <td colspan="6" class="resul_tabela">&nbsp;</td>
  </tr>
<?php } ?>
</table>
</body>
</html>
