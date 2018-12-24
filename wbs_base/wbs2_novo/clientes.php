<?

include("../config.inc.php");
include("modulos/padrao.class.php");

$db = new Padrao();

$db->connect_wbs();
//$db->$conn->debug = true;

$rs_clientes = $db->query_db("SELECT * FROM `clientenovo` WHERE `estado` <> 'MG' GROUP BY nome ORDER BY estado ASC","SQL_NONE","N");

$db->disconnect();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8pt;
	color: #000000;
}
.titulo_tabela {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9pt;
	font-weight: bold;
	text-transform: uppercase;
	color: #000000;
	border-bottom-width: 2px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}
.conteudo_tabela {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8pt;
	text-transform: uppercase;
	color: #000000;
	margin: 2px;
	padding: 2px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #000000;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="1">
  <tr>
    <td class="titulo_tabela">COD</td>
    <td class="titulo_tabela">NOME</td>
    <td class="titulo_tabela">CPF</td>
    <td class="titulo_tabela">CNPJ</td>
    <td class="titulo_tabela">ENDERE&Ccedil;O</td>
    <td class="titulo_tabela">CIDADE/ESTADO</td>
  </tr>
<? while(!$rs_clientes->EOF) { ?>
  <tr>
    <td class="conteudo_tabela"><? echo $rs_clientes->fields['codcliente']; ?></td>
    <td class="conteudo_tabela"><? echo $db->format_str("UP", $rs_clientes->fields['nome']); ?></td>
    <td class="conteudo_tabela"><? echo $rs_clientes->fields['cpf']; ?></td>
    <td class="conteudo_tabela"><? echo $rs_clientes->fields['cnpj']; ?></td>
    <td class="conteudo_tabela"><? echo $db->format_str("UP", $rs_clientes->fields['endereco']); ?>, <? echo $rs_clientes->fields['numero']; ?> - <? echo $db->format_str("UP", $rs_clientes->fields['complemento']); ?> - <? echo $db->format_str("UP", $rs_clientes->fields['bairro']); ?> - <? echo $rs_clientes->fields['cep']; ?></td>
    <td class="conteudo_tabela"><? echo $db->format_str("UP", $rs_clientes->fields['cidade']); ?> - <? echo $db->format_str("UP", $rs_clientes->fields['estado']); ?></td>
  </tr>
<? $rs_clientes->MoveNext(); } ?>
</table>
</body>
</html>