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

$rs_lista = $db->query_db("SELECT pedido.codped, pedido.codbarra, (SELECT estado FROM clientenovo WHERE codcliente = pedido.codcliente ) AS estado, pedidonf.datanf, pedidonf.nf,  (SELECT nome FROM clientenovo WHERE codcliente = pedido.codcliente ) AS cliente, vpp, pedidonf.modo_nf  FROM pedido, pedidonf WHERE pedido.codped = pedidonf.codped AND cancel <> 'OK' AND ped_transf <> 'OK' and codemp = '".$emp."' GROUP by nf HAVING estado <> 'MG' and datanf like '$ano-$mes%' ","SQL_NONE","N"); 
?>
<table width="100%" width="100%" border="1" cellpadding="1" cellspacing="1">
  


<?


if ($rs_lista)
{
	
	while (!$rs_lista->EOF)
	{
		
		$codcb_array = explode(":", $rs_lista->fields[1]);
		
		foreach ($codcb_array as $codcb){
		
		#$rs_lista2 = $db->query_db("SELECT codoc, codprod FROM codbarra  WHERE  codcb  = '". $codcb."'","SQL_NONE","N");
		
		#$rs_lista4 = $db->query_db("SELECT nomeprod FROM produtos  WHERE  codprod  = '". $rs_lista2->fields[1]."'","SQL_NONE","N");
		
				
		#$rs_lista1 = $db->query_db("SELECT ocprod.numnf, ocprod.datanf, oc.codfor FROM oc, ocprod  WHERE  oc.codoc = ocprod.codoc and ocprod.codemp = '".$emp."' and ocprod.codoc = '". $rs_lista2->fields[0]."' and ocprod.codprod='".$rs_lista2->fields[1]."'","SQL_NONE","N"); 
		
		
		#$rs_lista3 = $db->query_db("SELECT nome FROM fornecedor  WHERE  codfor  = '". $rs_lista1->fields[2]."'","SQL_NONE","N"); 
		
		
		}
		
		
		?>
		
  <tr>
    <td><? echo $rs_lista->fields[1]; ?></td> <!PEDIDO>
    <td><? echo $rs_lista->fields[5]; ?></td> <!CLIENTE>
    <td><? echo $rs_lista->fields[4]; ?></td> <!NF_PED>
    <td><? echo $rs_lista->fields[3]; ?></td> <!DATANF_PED>
   	<td><? echo $rs_lista->fields[6]; ?></td> <!VPP>
    <td><? echo $rs_lista->fields[2]; ?></td> <!MODO_NF>
  

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

