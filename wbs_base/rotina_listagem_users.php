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
|  arquivo:     start_grupos_usuarios.php
|  template:    grupos_usuarios.htm
+--------------------------------------------------------------
*/

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$db->connect_wbs();

//$db->conn->debug = true;

$rs_lista = $db->query_db("SELECT codvend, vendedor.codvend AS codlogin, vendedor.nome AS login, doc, clientenovo.nome AS nome, block, codemp, codgrp FROM vendedor, clientenovo WHERE funcionario = 'Y' AND ((doc = cnpj) OR (doc = cpf)) ORDER BY codemp, codgrp, nome","SQL_NONE","N");
$numRows = $rs_lista->_numOfRows;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listagem de Funcionarios</title>
<link href="<? echo DIR_CSS; ?>/padrao.css" rel="stylesheet" type="text/css">
<link href="<? echo DIR_CSS; ?>/azul.css" rel="stylesheet" type="text/css">
</head>

<body>
<? //$db->titulador("azul", "Listagem de Funcionarios", $bg_cor, $bg_cor_light); ?>
<br />
<table width="100%"  border="0" cellspacing="0" cellpadding="2" class="generalTable defaultBlackText">
  <tr>
    <td width="1%" align="center" class="generalGreyBorderBottomTableHeaderCell">Cod</td>
    <td align="center" class="generalGreyBorderBottomTableHeaderCell">Login/Nome</td>
    <td align="center" class="generalGreyBorderBottomTableHeaderCell">DOC</td>
    <td align="center" class="generalGreyBorderBottomTableHeaderCell">Empresa/Fun&ccedil;&atilde;o</td>
    <td align="center" class="generalGreyBorderBottomTableHeaderCell">Bloq</td>
  </tr>
  <?
if ($rs_lista)
{
	$ix = 0;
	while (!$rs_lista->EOF)
	{
?>
  <tr style="background-color: #FFFFFF; cursor: pointer;" onmouseover='this.style.backgroundColor=&quot;<? echo $bg_cor_light; ?>&quot;' onmouseout='this.style.backgroundColor=&quot;#FFFFFF&quot;'>
    <td rowspan="2" align="center" class="noramlTableCell" style="color: #FFFFFF; background-color: #999999;"><? echo $rs_lista->fields['codvend']; ?></td>
    <td class="noramlTableCell"><strong><? echo $rs_lista->fields['login']; ?></strong></td>
    <td align="center" class="noramlTableCell"><? echo $rs_lista->fields['doc']; ?></td>
    <td align="center" class="noramlTableCell"><? $rs_empresa_show = $db->query_db("SELECT nome FROM empresa WHERE codemp = '".$rs_lista->fields['codemp']."'","SQL_NONE","N"); echo $rs_empresa_show->fields['nome']; ?></td>
    <td align="center" class="noramlTableCell"><?
if($rs_lista->fields['block'] == "Y")
{
  	//echo "<img src=".DIR_IMAGES."/legendas/legenda_sim.gif border=0>";
	echo "SIM";
}
else
{
  	//echo "<img src=".DIR_IMAGES."/legendas/legenda_nao.gif border=0>";
	echo "NÃO";
}
?></td>
  </tr>
  <tr style="background-color: #FFFFFF; cursor: pointer;" onmouseover='this.style.backgroundColor=&quot;<? echo $bg_cor_light; ?>&quot;' onmouseout='this.style.backgroundColor=&quot;#FFFFFF&quot;'>
    <td class="noramlTableCell"><? echo $rs_lista->fields['nome']; ?></td>
    <td align="center" class="noramlTableCell">&nbsp;</td>
    <td align="center" class="noramlTableCell"><? $rs_grupo_show = $db->query_db("SELECT nomegrp FROM segurancagrp WHERE codgrp = '".$rs_lista->fields['codgrp']."'","SQL_NONE","N"); echo $rs_grupo_show->fields['nomegrp']; ?></td>
    <td align="center" class="noramlTableCell">&nbsp;</td>
  </tr>
  <?
	 	$ix++;
		$rs_lista->MoveNext();
	}//WHILE
}
?>
</table>
</body>
</html>
<?php
$db->disconnect();
?>