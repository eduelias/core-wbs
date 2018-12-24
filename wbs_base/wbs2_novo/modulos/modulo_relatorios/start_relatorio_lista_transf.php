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
#$db->$conn->debug = true; // DEBUG
//PAGINADOR
include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
#include("/home/www/htdocs/wbs/wbs2_novo/modulos/paginador.class.php");
$paginator = new Mult_Pag();
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


if ($codemp_pesq){

 

//PESQUISA POR PRUDUTOS
    $rs = $db->query_db("SELECT pedidoprod.codprod, nomeprod, SUM(pedidoprod.qtde) FROM pedido, produtos, pedidoprod WHERE  produtos.codprod=pedidoprod.codprod  and  pedidoprod.codped=pedido.codped and codemp = '$codemp_pesq' and caixa = 'OK' and codcb = '' and pedido.hist <> 1 group by pedidoprod.codprod  ORDER by nomeprod" ,"SQL_NONE","N");
        
   
}

// PESQUISA POR EMPRESA
$rs_empresas = $db->query_db("SELECT * FROM empresa WHERE ".$cond,"SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT * FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];

######################## FIM CODIGO ############################

// TEMPLATE
include ("templates/relatorio_lista_transf.html");

// DISCONECT BD
$db->disconnect();

?>
