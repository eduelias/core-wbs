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

$db->connect_data();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
$rs_delete = $db->query_db("DELETE FROM modelo_maxxmicro ","SQL_NONE","N");



$db->connect_wbs();
//$db->conn->debug =    true;


////////////////////////////////////////////////////////////////  1a ETAPA ///////////////////////////////////////////////////

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT datanf, codprod, ocprod.codoc, ocprod.numnf, qtderec, pcu, ipi, tipo_nf, codfor FROM ocprod LEFT JOIN oc ON oc.codoc = ocprod.codoc WHERE ocprod.codemp =14 and qtderec <> 0","SQL_NONE","N");

$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			if ($rs_lista->fields[7] == 'P'){$posicao = 'MP';}else{$posicao = 'PV';}
			
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."' , 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = '".$posicao."' , 
			codfor = '".$rs_lista->fields[8]."' ,
			codoc = '".$rs_lista->fields[2]."' , 
			nf = '".$rs_lista->fields[3]."', 
			entrada = '".$rs_lista->fields[4]."',  
			pcu = '".$rs_lista->fields[5]."', 
			ipi = '".$rs_lista->fields[6]."'
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}

////////////////////////// ORDEM DE PRODUCAO - SAIDA ///////////////////////////////////////
$db->connect_wbs();

$rs_lista = $db->query_db("SELECT datainicio, op_prod.codprod, op.idop, op.qtde, op.codprod as codprod_m FROM op_prod LEFT JOIN op ON op.idop = op_prod.idop WHERE codemp =14","SQL_NONE","N");

$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			
			// SAIDA DO PRODUTO PARA PRODUCAO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'MP' , 
			idop = '".$rs_lista->fields[2]."' , 
			saida = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			
			// 4A ETAPA 
			/*
			// ENTRADA DO PRODUTO EM PROCESSO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[4]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PP' , 
			idop = '".$rs_lista->fields[2]."' , 
			entrada = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			*/	
			
			$rs_lista->MoveNext();
		}//WHILE
}


////////////////////////// PEDIDOS - SAIDA ///////////////////////////////////////

$db->connect_wbs();

 $rs_lista = $db->query_db("SELECT dataped, codprod, pedido.codped, qtde FROM pedido LEFT JOIN pedidoprod ON pedidoprod.codped = pedido.codped WHERE codemp =14 AND cancel <> 'OK'","SQL_NONE","N");



if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$db->connect_wbs();
			$rs_lista1 = $db->query_db("SELECT datanf, nf FROM pedidonf WHERE codped = '".$rs_lista->fields[2]."'","SQL_NONE","N");
			
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista1->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PA' , 
			codped = '".$rs_lista->fields[2]."' , 
			nf = '".$rs_lista1->fields[1]."' , 
			saida = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}

/*

////////////////////////////////////////////////////////////////  4a ETAPA ///////////////////////////////////////////////////

////////////////////////// ORDEM DE PRODUCAO - SAIDA ///////////////////////////////////////
$db->connect_wbs();

$rs_lista = $db->query_db("SELECT datainicio, op_prod.codprod, op.idop, op.qtde, op.codprod as codprod_m FROM op_prod LEFT JOIN op ON op.idop = op_prod.idop WHERE codemp =14","SQL_NONE","N");

$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			
			
			// 4A ETAPA 
			
			// ENTRADA DO PRODUTO EM PROCESSO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[4]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PP' , 
			idop = '".$rs_lista->fields[2]."' , 
			entrada = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			
			$rs_lista->MoveNext();
		}//WHILE
}




////////////////////////// ORDEM DE PRODUÇAO - ENTRADA ///////////////////////////////////////

$db->connect_wbs();

$rs_lista = $db->query_db("SELECT datafim, op.codprod, op.idop, op.qtde FROM op WHERE codemp =14 and datafim <> 0","SQL_NONE","N");

$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			
			// SAIDA DO PRODUTO ACABADO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PP' , 
			idop = '".$rs_lista->fields[2]."' , 
			saida = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			// ENTRADA DO PRODUTO ACABADO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PA' , 
			idop = '".$rs_lista->fields[2]."' , 
			entrada = '".$rs_lista->fields[3]."' 
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}

*/


$db->disconnect();

/*
SELECT codprod, SUM( entrada ) , SUM( saida ) , (
SUM( entrada ) - SUM( saida )
) AS saldo
FROM `modelo_maxxmicro`
GROUP BY codprod
*/
?>

