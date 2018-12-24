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
if ($codgrp_vend == 2 or $codgrp_vend == 54){
    #$cond = "nome <> ''";
}else{
    if ($codemp_transf_vend <> 0 ){
       # $cond = "codemp = '$codemp_transf_vend'";$empresa = $codemp_transf_vend;
		 #$cond = "nome <> ''";
    }else{
       # $cond = "nome <> ''";
    }
}

$codemp_pesq = $empresa;
#$Action = "pesquisa";


if ($codemp_pesq){

 

//PESQUISA POR PRUDUTOS
    $rs = $db->query_db("SELECT estoque.codprod, nomeprod, estoque.qtde, estoque.reserva, sum(qtde-reserva) as est, hist FROM estoque, produtos WHERE unidade not like 'CJ'  and produtos.codprod=estoque.codprod and codemp = '$codemp_pesq' group by codprod HAVING estoque.qtde > 0  ORDER by nomeprod" ,"SQL_NONE","N");
        
   
}

// PESQUISA POR EMPRESA
$rs_empresas = $db->query_db("SELECT * FROM empresa WHERE hist_emp <>'S'","SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT * FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];

######################## FIM CODIGO ############################

// TEMPLATE
include ("templates/relatorio_estoque_conf.html");

// DISCONECT BD
$db->disconnect();

?>
