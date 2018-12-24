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
#$Action = "pesquisa";
*/

if ($codemp_transf_vend){

    $rs_emprestimo = $db->query_db("SELECT codprod, codbarra, dataemprestimo, login_est, login_vend FROM codbarra WHERE codemp = '$codemp_transf_vend'  and emprestimo = 'OK' and codbarraped <> 1" ,"SQL_NONE","N");
        
 
}

// PESQUISA POR EMPRESA
#$rs_empresas = $db->query_db("SELECT codemp, nome FROM empresa WHERE ".$cond,"SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT codemp, nome FROM empresa WHERE codemp = '$codemp_transf_vend'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];


######################## FIM CODIGO ############################


// TEMPLATE
include ("templates/emprestimo_page_new.htm");

// DISCONECT BD
$db->disconnect();

?>
