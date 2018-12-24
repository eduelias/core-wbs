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

//$db->connect_data();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
#$rs_delete = $db->query_db("DELETE FROM modelo_maxxmicro WHERE consolidado <> 'S' ","SQL_NONE","N");



$db->connect_wbs();
//$db->conn->debug =    true;

$dataperiodo = '2006'; 

////////////////////////// INSERE PRODUTOS ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codprod, nomeprod  FROM produtos","SQL_NONE","N");



if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			
			
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro_produtos SET 
			codprod = '".$rs_lista->fields[0]."' , 
			nome = '".$rs_lista->fields[1]."' 
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}

////////////////////////// INSERE FORNECEDOR ///////////////////////////////////////
$db->connect_wbs();
$rs_lista = $db->query_db("SELECT codfor, nome, cgc, ie  FROM fornecedor","SQL_NONE","N");



if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			
			
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro_forn SET 
			codfor = '".$rs_lista->fields[0]."' , 
			nome = '".$rs_lista->fields[1]."' ,
			cnpj = '".$rs_lista->fields[2]."', 
			ie = '".$rs_lista->fields[3]."' 
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}


$db->disconnect();

/*
SELECT codprod, SUM( entrada ) , SUM( saida ) , (
SUM( entrada ) - SUM( saida )
) AS saldo
FROM `modelo_maxxmicro`
GROUP BY codprod


*/
echo "DONE!!";
?>
