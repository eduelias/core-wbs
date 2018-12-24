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


if ($emp == 1){
	// VARIAVEIS PADRAO
	$unidade_prod = '99';
	$codemp_estoque = 1;
	#$qtde_lote = ;	
}
if ($emp == 14){

	// VARIAVEIS PADRAO
	$unidade_prod = '01';
	$codemp_estoque = 14;
	#$qtde_lote = ;	
}

if ($emp == 18){

	// VARIAVEIS PADRAO
	$unidade_prod = '02';
	$codemp_estoque = 18;
	#$qtde_lote = ;	
}

include ("rotina_gera_ordem_producao_config.php");


$rs_insert_op = $db->query_db("INSERT INTO op SET codemp = '$codemp_estoque' , codprod = '$modelo_prod', qtde= '$qtde_lote' , datainicio = NOW() , codcliente = '$codcli' ","SQL_NONE","N");
$idop = $db->conn->Insert_ID();
#$idop = 423;

if($idop){
	for($i = 0; $i < count($codprod_m); $i++ ){
		
	$rs_insert_op_prod = $db->query_db("INSERT INTO op_prod SET idop = '$idop' , codprod = '$codprod_m[$i]', qtde= '1' ","SQL_NONE","N");	
	$rs_insert_estoque = $db->query_db("UPDATE estoque SET reserva = (reserva + $qtde_lote) WHERE codemp = '$codemp_estoque' and codprod = '$codprod_m[$i]'","SQL_NONE","N");	
	
	
	}//FOR
	
	
	for($i = 0; $i < count($codprod_insumo); $i++ ){
	
	if($qtde_ins[$i] <> 0){	
	
		$rs_insert_op_insumo = $db->query_db("INSERT INTO op_insumos SET idop = '$idop' , codprod = '".$codprod_insumo[$i]."', qtde= '".$qtde_ins[$i]."', unidade = '".$unid_ins[$i]."',  datainsumo = NOW() ","SQL_NONE","N");	
	}
	
	}//FOR
	
	for($i = 1; $i <= $qtde_lote; $i++ ){
		
		$lote_dec = 70000000 + $idop;
		$lote_hex = strtoupper(dechex($lote_dec));
	 	$unidade = 100000 + $i;
	 	$unidade = substr($unidade, 1,6);
	 	$sn  = "MX".$unidade_prod."L".$lote_hex."UN".$unidade;
	 	
	 	echo $i."-".$sn."<BR>";
		
	$rs_insert_op_sn = $db->query_db("INSERT INTO op_sn SET idop = '$idop' , unidade = '$i' , sn = '$sn'","SQL_NONE","N");	
	
	}//FOR
}

$db->disconnect();
?>
