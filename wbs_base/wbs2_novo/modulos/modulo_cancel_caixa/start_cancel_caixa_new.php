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
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/
//CONEXAO BD
$db->connect_wbs();
#$db->conn->debug = true; // DEBUG
//PAGINADOR
#include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
#include("/home/www/htdocs/wbs/wbs2_novo/modulos/paginador.class.php");
#$paginator = new Mult_Pag();
$acrescimo = 30;


######################## INICIO CODIGO ############################

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
#$Action = "pesquisa";


switch ($Action) {

    case "verifica":
    	
    	if ($codped_pesq){
		
		 $rs_pedido = $db->query_db("SELECT codped, codvend, caixa, codcliente FROM pedido WHERE codbarra = '$codped_pesq'" ,"SQL_NONE","N");
		 
		 
		 
	 if ($rs_pedido->fields['codped'] <>  "" and $rs_pedido->fields['caixa'] <> 'NO' ){
	  
	  $rs_caixa = $db->query_db("SELECT codcxlanc, codcxsaldo FROM fin_cxlanc WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
	  $rs_saldo = $db->query_db("SELECT hist FROM fin_cxsaldo WHERE codcxsaldo = '".$rs_caixa->fields['codcxsaldo']."'" ,"SQL_NONE","N");
     
	  
	  // CAIXA ABERTO
	  if ($rs_saldo->fields['hist'] <> 1){
	  	
	  	$rs_cliente = $db->query_db("SELECT nome FROM clientenovo WHERE codcliente =  '".$rs_pedido->fields['codcliente']."'" ,"SQL_NONE","N");
	  	$rs_ped_parc = $db->query_db("SELECT * FROM pedidoparcelas WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
	  	
	  	$acao = "CANCELAR RECEBIMENTO PEDIDO";
		$Action = "cancelar";
	  	
	   
	   }else{
	  	$status = "CAIXA FECHADO - O RECEBIMENTO NÃO PODERA SER CANCELADO.";
	  	$Action = "verifica";
    	$acao = "VERIFICAR PEDIDO";
	  }
	  
	  }else{
	  	$status = "PEDIDO INCORRETO OU NAO ESTÁ NO CAIXA.";
	  	$Action = "verifica";
    	$acao = "VERIFICAR PEDIDO";
	  }
	  
    	}else{
    		$Action = "verifica";
    		$acao = "VERIFICAR PEDIDO";
    	}
		
        break;
        
    case "cancelar":
    	
    	if ($codped_pesq){
		
		 $rs_pedido = $db->query_db("SELECT codped, codvend, caixa FROM pedido WHERE  codbarra = '$codped_pesq'" ,"SQL_NONE","N");
	
	if ($rs_pedido->fields['codped'] <>  "" and $rs_pedido->fields['caixa'] <> 'NO' ){
	  
	  $rs_caixa = $db->query_db("SELECT codcxlanc, codcxsaldo FROM fin_cxlanc WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
	  $rs_saldo = $db->query_db("SELECT hist FROM fin_cxsaldo WHERE codcxsaldo = '".$rs_caixa->fields['codcxsaldo']."'" ,"SQL_NONE","N");
     
	  
	  // CAIXA ABERTO
	  if ($rs_saldo->fields['hist'] <> 1){
	  	
	  	
	  //DELETE BCO
	  	 $rs_acao = $db->query_db("DELETE FROM fin_bcomov WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
      //DELETE BCO
	  	 $rs_acao = $db->query_db("DELETE FROM fin_car WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
	  //DELETE BCO
	  	 $rs_acao = $db->query_db("DELETE FROM fin_cheques WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
	  //DELETE BCO
	  	 $rs_acao = $db->query_db("DELETE FROM fin_cxlanc WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
	  	 
	  //UPDATE PEDIDO PARCELAS
	  	 $rs_acao = $db->query_db("UPDATE pedidoparcelas SET parcpg = 'NO' , numcheq = '', conta = '', agencia = '' , banco = '' WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
  	  //DELETE PEDIDO STATUS
  	 	 $rs_acao = $db->query_db("DELETE FROM pedidostatus WHERE codped = '".$rs_pedido->fields['codped']."' and statusped like 'CAIXA%'" ,"SQL_NONE","N");
	 //UPDATE PEDIDO 
  	 	$rs_acao = $db->query_db("UPDATE pedido SET ckmlb = 'NO', caixa = 'NO', confirm_fpg = 'NO' WHERE codped = '".$rs_pedido->fields['codped']."'" ,"SQL_NONE","N");
  	 
	  	$status = "RECEBIMENTO CANCELADO";
	  	
	  }else{
	  	$status = "CAIXA FECHADO - O RECEBIMENTO NÃO PODERA SER CANCELADO.";
	  }
	  
	  }else{
	  	$status = "PEDIDO INCORRETO OU NAO ESTÁ NO CAIXA.";
	  }
	  
	  }
	 
	 	$Action = "verifica";
    	$acao = "VERIFICAR PEDIDO";
    	
    	
			
        break;
        
    default:
    	
    	$Action = "verifica";
    	$acao = "VERIFICAR PEDIDO";
    	
    	break;
}

	
	 
 


// PESQUISA POR EMPRESA
#$rs_empresas = $db->query_db("SELECT codemp, nome FROM empresa WHERE ".$cond,"SQL_NONE","N");
#$rs_empresa = $db->query_db("SELECT codemp, nome FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
#$empresa = $rs_empresa->fields['codemp'];

######################## FIM CODIGO ############################


// TEMPLATE
include ("templates/cancel_caixa_page_new.htm");

// DISCONECT BD
$db->disconnect();

?>
