<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright 2006 Grupo Ipasoft. Todos os direitos reservados.
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
//$db->conn->debug = true;


$i=1;
$rs_lista = $db->query_db("SELECT codcap, datavenc, datacc, opcaixa, codcusto FROM projeto_relacao_custo WHERE datavenc >= '2010-01-01'  ","SQL_NONE","N");

while (!$rs_lista->EOF)
	{
		
		$rs_lista1 = $db->query_db("SELECT COUNT(*) FROM fin_cap WHERE codcap = '".$rs_lista->fields[0]."'","SQL_NONE","N");
		
		
		if ($rs_lista1->fields[0] <> 1){
			echo "$i - ".$rs_lista->fields[3]." - CODCAP: ".$rs_lista->fields[0]." - ".$rs_lista1->fields[0]." - ".$rs_lista->fields[1]." - ".$rs_lista->fields[2]." - ".$rs_lista->fields[4]."<BR>";
			$i++;
			
		$rs_lista2 = $db->query_db("DELETE FROM projeto_relacao_custo WHERE codcusto = '".$rs_lista->fields[4]."'","SQL_NONE","N");	
			
		}
		
		$rs_lista->MoveNext();
	
	

	
  }
  
  
  

$db->disconnect();
?>