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

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];


$db->connect_wbs();
//$db->conn->debug =    true;

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codbarra, ( SELECT nome FROM clientenovo WHERE codcliente = pedido.codcliente ) AS nome, (
SELECT COUNT( * ) FROM pedidoparcelas WHERE tipo = '02.04' AND codped = pedido.codped ) AS numbol, ( SELECT nome FROM vendedor
WHERE codvend = pedido.codvend ) AS vendedor, vpp, dataped, status , caixa, libentr, fat, codemp FROM `pedido` WHERE cancel <> 'OK'
AND hist <>1 AND STATUS <> 'ENTR' HAVING numbol >0","SQL_NONE","N");
?>

 <table width="100%" border="1" cellspacing="0" cellpadding="6">
          <tr>
            <td width="13%"><div align="center"><strong>PEDIDO</strong></div></td>
            <td width="32%"><div align="center"><strong>NOME</strong></div></td>
            <td width="6%"><div align="center"><strong>NBOL</strong></div></td>
            <td width="11%"><div align="center"><strong>VENDEDOR</strong></div></td>
            <td width="9%"><div align="center"><strong>VPP</strong></div></td>
            <td width="11%"><div align="center"><strong>STATUS</strong></div></td>
            <td width="5%"><div align="center"><strong>CX</strong></div></td>
            <td width="7%"><div align="center"><strong>LIB</strong></div></td>
            <td width="6%"><div align="center"><strong>FAT</strong></div></td>
          </tr>


<?
if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			
		
			?>
 <tr>
    <td><div align="right"><b><? echo $rs_lista->fields['codbarra']; ?></b><br /><? echo $rs_lista->fields['dataped']; ?></div></td>
    <td><div align="right"><? echo  $rs_lista->fields['nome'];; ?></div></td>
    <td><div align="right"><? echo  $rs_lista->fields['numbol']; ?></div></td>
    <td><div align="center"><? echo  $rs_lista->fields['vendedor']; ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($rs_lista->fields['vpp']); ?></div></td>
    <td><div align="center"><? echo  $rs_lista->fields['status']; ?></div></td>
    <td><div align="right"><? echo  $rs_lista->fields['caixa']; ?></div></td>
    <td><div align="center"><? echo  $rs_lista->fields['libentr']; ?></div></td>
    <td><div align="center"><? echo  $rs_lista->fields['fat']; ?></div></td>
   </tr>
 
  <?			
	
			$rs_lista->MoveNext();
		}//WHILE
}


?>
 
  </table>
  <?

$db->disconnect();


?>

