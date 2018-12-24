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
$rs_lista = $db->query_db("SELECT (SELECT codcap FROM fin_cap WHERE codcap = projeto_relacao_custo.codcap ) AS cap, projeto_relacao_custo.codcap AS cap2 FROM `projeto_relacao_custo` WHERE 1 GROUP BY projeto_relacao_custo.codcap HAVING ISNULL( cap ) ","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			
			$rs_insert_op = $db->query_db("DELETE FROM projeto_relacao_custo WHERE codcap = '".$rs_lista->fields[1]."'","SQL_NONE","N");
			echo $i." - ".$rs_lista->fields[0]." - ".$rs_lista->fields[1]."<BR>";
						
	
			$rs_lista->MoveNext();
		}//WHILE
}


$db->disconnect();


?>

