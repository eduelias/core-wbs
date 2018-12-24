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
$rs_lista = $db->query_db("SELECT codprod, nomeprod, ( SELECT count( * ) FROM codbarra WHERE codprod = produtos.codprod AND codemp =14 AND codbarraped <>1 ) AS FAB, ( SELECT count( * ) FROM codbarra WHERE codprod = produtos.codprod AND codemp =15 AND codbarraped <>1 ) AS LFAB, ( SELECT count( * ) FROM codbarra WHERE codprod = produtos.codprod AND codemp =16 AND codbarraped <>1 ) AS IND, ( SELECT count( * ) FROM codbarra WHERE codprod = produtos.codprod AND codemp =17 AND codbarraped <>1 ) AS BAT, ( SELECT count( * ) FROM codbarra WHERE codprod = produtos.codprod AND codemp =19 AND codbarraped <>1 ) AS HALF, ( SELECT SUM( reserva ) FROM estoque WHERE codprod = produtos.codprod ) AS RESERVA FROM `produtos` WHERE hist <> 'Y' HAVING ( FAB =0 AND LFAB =0 AND IND =0 AND BAT =0 AND HALF =0 ) ORDER by nomeprod","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			
			$rs_insert_op = $db->query_db("UPDATE produtos SET hist = 'Y', lib_linha = 'Y' WHERE codprod = '".$rs_lista->fields[0]."'","SQL_NONE","N");
			echo $i." - ".$rs_lista->fields[0]."<BR>";
						
	
			$rs_lista->MoveNext();
		}//WHILE
}


$db->disconnect();


?>

