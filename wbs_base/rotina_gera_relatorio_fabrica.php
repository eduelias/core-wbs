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
#$db->conn->debug = true;



#$rs_lista = $db->query_db("SELECT codest, produtos.codprod, pvv, codcat, estoque.pcm, if( codcat =46, pvv / 1.40, pvv / 1.44 ) AS pcmnovo, estoque.puc, if( estoque.puc = 0, if( codcat =46, pvv / 1.40, pvv / 1.44 ) , estoque.puc ) as pucnovo, if( estoque.datauc =0, now(), estoque.datauc) as dataucnovo, mtv, mta, if( codcat =46, 40, mtv ) AS mtvnovo, estoque.codmoeda FROM produtos, estoque WHERE produtos.codprod = estoque.codprod ORDER BY `produtos`.`codprod` ASC  ","SQL_NONE","N"); 

$rs_lista = $db->query_db("SELECT codbarra.codprod, nomeprod, codbarra.codbarra, codoc FROM codbarra, produtos  WHERE  codbarra.codprod = produtos.codprod and codbarra.codemp = 14 and codbarraped <> 1 and tipo_fab = 'P' ","SQL_NONE","N"); 
?>
<table width="100%" width="100%" border="1" cellpadding="1" cellspacing="1">
  


<?


if ($rs_lista)
{
	
	while (!$rs_lista->EOF)
	{
		
		$rs_lista1 = $db->query_db("SELECT ocprod.pcu, ocprod.numnf, ocprod.datanf, oc.codfor FROM oc, ocprod  WHERE  oc.codoc = ocprod.codoc and ocprod.codemp = 14 and ocprod.codoc = '". $rs_lista->fields[3]."' and ocprod.codprod='".$rs_lista->fields[0]."'","SQL_NONE","N"); 
		
		
		$rs_lista2 = $db->query_db("SELECT nome FROM fornecedor  WHERE  codfor  = '". $rs_lista1->fields[3]."'","SQL_NONE","N"); 
		?>
		
  <tr>
    <td><? echo $rs_lista->fields[0]; ?></td>
    <td><? echo $rs_lista->fields[1]; ?></td>
    <td><? echo $rs_lista->fields[2]; ?></td>
    <td><? echo $rs_lista1->fields[0]; ?></td>
    <td><? echo $rs_lista1->fields[1]; ?></td>
    <td><? echo $rs_lista1->fields[2]; ?></td>
    <td><? echo $rs_lista2->fields[0]; ?></td>
  </tr>
		
		<?
			
		$total = $total + $rs_lista1->fields[0];
		$rs_lista->MoveNext();
	}//WHILE
}

?>

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><? echo $total; ?></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

<?


$db->disconnect();
?>