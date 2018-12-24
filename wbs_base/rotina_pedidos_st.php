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

#$emp = 14;
#$ano = "2009";
#$mes = "08";


$db->connect_wbs();
//$db->conn->debug =    true;

$rs_lista = $db->query_db("SELECT pedido.codped, pedidoprod.codcb , pedido.codbarra, (SELECT estado FROM clientenovo WHERE codcliente = pedido.codcliente) AS estado, (SELECT datanf FROM pedidonf WHERE codped = pedido.codped limit 0,1) AS datanf, (SELECT nf FROM pedidonf WHERE codped = pedido.codped limit 0,1) AS nf FROM pedido, pedidoprod WHERE pedidoprod.codped = pedido.codped  and  cancel <> 'OK' AND ped_transf <> 'OK' and codemp = '".$emp."'  HAVING estado <> 'MG' and datanf like '$ano-$mes%' ","SQL_NONE","N"); 
?>
<table width="100%" width="100%" border="1" cellpadding="1" cellspacing="1">
  


<?


if ($rs_lista)
{
	
	while (!$rs_lista->EOF)
	{
		
		$codcb_array = explode(":", $rs_lista->fields[1]);
		
		foreach ($codcb_array as $codcb){
		
		$rs_lista2 = $db->query_db("SELECT codoc, codprod FROM codbarra  WHERE  codcb  = '". $codcb."'","SQL_NONE","N");
		
		$rs_lista4 = $db->query_db("SELECT nomeprod FROM produtos  WHERE  codprod  = '". $rs_lista2->fields[1]."'","SQL_NONE","N");
		
				
		$rs_lista1 = $db->query_db("SELECT ocprod.numnf, ocprod.datanf, oc.codfor FROM oc, ocprod  WHERE  oc.codoc = ocprod.codoc and ocprod.codemp = '".$emp."' and ocprod.codoc = '". $rs_lista2->fields[0]."' and ocprod.codprod='".$rs_lista2->fields[1]."'","SQL_NONE","N"); 
		
		
		$rs_lista3 = $db->query_db("SELECT nome FROM fornecedor  WHERE  codfor  = '". $rs_lista1->fields[2]."'","SQL_NONE","N"); 
		
		
		}
		
		
		?>
		
  <tr>
    <td><? echo $rs_lista->fields[2]; ?></td> <!PEDIDO>
    <td><? echo $rs_lista4->fields[0]; ?></td> <!PRODUTO>
    <td><? echo $rs_lista->fields[5]; ?></td> <!NF_PED>
    <td><? echo $rs_lista->fields[4]; ?></td> <!DATANF_PED>
   	<td><? echo $rs_lista2->fields[0]; ?></td>
    <td><? echo $rs_lista3->fields[0]; ?></td> <!FORN>
    <td><? echo $rs_lista1->fields[0]; ?></td> <!NF_FOR>
    <td><? echo $rs_lista1->fields[1]; ?></td> <!DATANF_FOR>

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

