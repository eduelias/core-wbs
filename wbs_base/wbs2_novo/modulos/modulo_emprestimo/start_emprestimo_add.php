<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_noticias_add.php
|  template:    noticias_add.htm
+--------------------------------------------------------------
*/

/*
// VERIFICA SE TEM EMPRESA TRANSFERENCIA
if ($codgrp_vend == 2){
    $cond = "nome <> ''";
}else{
    if ($codemp_transf_vend <> 0 ){
        $cond = "codemp = '$codemp_transf_vend'";$empresa = $codemp_transf_vend;
    }else{
        $cond = "";
    }
}

$codemp_pesq = $empresa;
*/

//CONEXAO BD
$db->connect_wbs();
#$db->conn->debug = true; // DEBUG

switch ($Action)
{
	case "verificar" :
		
	for($i = 1; $i <= 10; $i++ ){
		
	$rs_result = $db->query_db("SELECT codprod FROM codbarra WHERE codemp = '$codemp_transf_vend' and codbarra = '".$codbarra[$i]."' and codbarraped <> 1 and emprestimo <> 'OK'","SQL_NONE","N");
	
	$rs_result1 = $db->query_db("SELECT nomeprod FROM produtos WHERE codprod = '".$rs_result->fields['codprod']."' ","SQL_NONE","N");
	$nomeprod[$i] = $rs_result1->fields['nomeprod'];
	
	if ($nomeprod[$i] == ""){$nomeprod[$i] = "ERRO";}
	
	
	
	}//FOR
	
		#$Action = 'verificar';
		#$acao = "VERIFICAR PRODUTOS";
		$Action = 'emprestimo';
		$acao = "EMPRESTAR PRODUTOS";

	break;
	
	case "emprestimo":


		for($i = 1; $i <= 10; $i++ ){
		
	$rs_result = $db->query_db("SELECT codcb, codprod FROM codbarra WHERE codemp = '$codemp_transf_vend' and codbarra = '".$codbarra[$i]."' and codbarraped <> 1 and emprestimo <> 'OK'","SQL_NONE","N");
	
	if ($rs_result->fields['codcb']){
		
		
		 $rs_emprestimo = $db->query_db("UPDATE codbarra SET dataemprestimo = NOW(), login_est =  '$codvend', login_vend = '$codvend_select', emprestimo = 'OK' WHERE codcb = '".$rs_result->fields['codcb']."'" ,"SQL_NONE","N");
        
		$rs_result1 = $db->query_db("SELECT nomeprod FROM produtos WHERE codprod = '".$rs_result->fields['codprod']."' ","SQL_NONE","N");
	$nomeprod[$i] = $rs_result1->fields['nomeprod'];
	
	if ($nomeprod[$i] == ""){$nomeprod[$i] = "ERRO";}	
	if ($nomeprod[$i] == ""){$status[$i] = "NO";}else{$status[$i] = "OK";}	
		
	}
	
		$Action = 'verificar';
		$acao = "VERIFICAR PRODUTOS";
	
	
	}//FOR
				
	break;
	
	default:
		
		$Action = 'verificar';
		$acao = "VERIFICAR PRODUTOS";
		
	break;
}

// PESQUISA POR EMPRESA
#$rs_empresas = $db->query_db("SELECT codemp, nome FROM empresa WHERE ".$cond,"SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT codemp, nome FROM empresa WHERE codemp = '$codemp_transf_vend'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];


$rs_vendedor = $db->query_db("SELECT codvend, nome FROM vendedor WHERE codemp = '$codemp_transf_vend' and (tipo_info = 'S' or tipo_celular = 'Y') and block <> 'Y' and tipo <> 'R'","SQL_NONE","N");

include ("templates/emprestimo_page_add.htm");

$db->disconnect();

?>
