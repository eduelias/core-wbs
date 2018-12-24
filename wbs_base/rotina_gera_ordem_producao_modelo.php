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

$rs_modelo_prod = $db->query_db("SELECT codprod, nomeprod FROM produtos WHERE  nomeprod like '%maxx-pc%' and hist <> 'Y'","SQL_NONE","N");

if ($rs_modelo_prod)
{
	$ix = 0;
	while (!$rs_modelo_prod->EOF)
	{
  
    	 $modelo = $rs_modelo_prod->fields['codprod'];   	
         $nome = $rs_modelo_prod->fields['nomeprod']; 
		 
		$codprod_m = array();
		$lib_imp = array();
		 
		include ("rotina_gera_ordem_producao_config.php");
			
		$rs_insert_op = $db->query_db("INSERT INTO op_mod SET codprod = '$modelo_prod', descr= '$descr' , soft= '$soft' , fax= '$fax', perif= '$perif', monitor= '$monitor', cor= '$cor' ","SQL_NONE","N");
		$idop_mod = $db->conn->Insert_ID();
		
		for($i = 0; $i < count($codprod_m); $i++ ){
		
			$rs_insert_op_prod = $db->query_db("INSERT INTO op_mod_prod SET idop_mod = '$idop_mod' , codprod = '$codprod_m[$i]', lib_imp = '$lib_imp[$i]' ","SQL_NONE","N");	
	
	
		}//FOR	
        
		echo "$modelo - $nome <br>";
   		echo "<pre>";
		print_r($codprod_m);
		print_r($lib_imp);
		echo $descr."<br>";
    
       
	 	$ix++;
		$rs_modelo_prod->MoveNext();
	}//WHILE
}


$db->disconnect();
?>
