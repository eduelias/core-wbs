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
$db->connect_wbs();
//$db->conn->debug = true;

$del_opcaixa = "";
$add_opcaixa = "02.61";


	$rs_lista = $db->query_db("SELECT codcliente, opcaixa FROM clientenovo","SQL_NONE","N");

if ($rs_lista){			
	while (!$rs_lista->EOF)
	{
	$opcaixa_format = "";	
	$codcliente= $rs_lista->fields[0];
	$opcaixa_array = $rs_lista->fields[1];
	
	$opcaixa = explode(":", $opcaixa_array);
	
	
	
	for($k = 0; $k < count($opcaixa); $k++ ){
		
		#echo $opcaixa[$k]."<BR>";
		
		if ($del_opcaixa == $opcaixa[$k]){$opcaixa[$k] = "";}
		
		
		
		if ($opcaixa[$k] <> ""){
					
				$opcaixa_format = $opcaixa_format .":". $opcaixa[$k];
		}
	}		
	
	if ($add_opcaixa){
		
		$opcaixa_format = $opcaixa_format .":". $add_opcaixa;
	}
	
		

	$rs_insert = $db->query_db("UPDATE clientenovo SET opcaixa = '".$opcaixa_format."' WHERE codcliente = '".$codcliente."'","SQL_NONE","N");
	echo "$codcliente - $opcaixa_format<BR>";
	
	
		$rs_lista->MoveNext();
	}
}
	

	


$db->disconnect();
?>