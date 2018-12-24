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

    $rs_vend = $db->query_db("SELECT codvend FROM vendedor WHERE block <> 'Y' and codemp = '$codemp_pesq'  and tipo <> 'R'" ,"SQL_NONE","N");
        
    $condicao .= " and ( ";
  	while (!$rs_vend->EOF) {
        $condicao .= " pedido.codvend=".$rs_vend->fields['codvend']." or ";
        $rs_vend->MoveNext();
    }//WHILE
	$condicao .= " pedido.codvend=-1 )";

//CONTADOR DE TODOS OS REGISTROS
    $rs_count = $db->query_db("SELECT count(*) AS total_reg  FROM pedido, clientenovo, vendedor WHERE cancel <> 'OK' and hist <> 1 and pedido.codcliente=clientenovo.codcliente and pedido.codvend=vendedor.codvend".$condicao,"SQL_NONE","N");
    $total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
    // select ou numero
    $paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
    $inicio_pesq = $pagina * $acrescimo;

//REGISTROS LITADOS
    $rs = $db->query_db("SELECT codbarra, codped, caixa, cb, libentr, contrato, fat, dataped, pedido.codemp, clientenovo.nome as nomecli , vendedor.nome as nomevend, status FROM pedido, clientenovo, vendedor WHERE cancel <> 'OK' and hist <> 1 and pedido.codcliente=clientenovo.codcliente and pedido.codvend=vendedor.codvend".$condicao."  ORDER BY dataped DESC LIMIT $inicio_pesq, $acrescimo" ,"SQL_NONE","N");
        
    $i=0;
  	while (!$rs->EOF) {

        $nd_ped = $db->func_numdias($rs->fields['dataped'], $db->datahoraatual());
        $nd_lib = $db->func_numdias($rs->fields['datalib'], $db->datahoraatual());
        $nd_ep = $db->func_numdias($rs->fields['dataep'], $db->datahoraatual());
          
        if ($rs->fields['contrato'] == 'EP' and $nd_ep >=3 ){$fields[$i]['pos1']=1;}else{$fields[$i]['pos1']=0;}
        if ($rs->fields['caixa'] == 'NO' and $nd_ped >=5 ){$fields[$i]['pos2']=1;}else{$fields[$i]['pos2']=0;}
        if ($rs->fields['caixa'] == 'NO' and $rs->fields['libentr'] == 'OK' and $nd_lib >=2 ){$fields[$i]['pos3']=1;}else{$fields[$i]['pos3']=0;}
        if ($rs->fields['caixa'] == 'OK' and $rs->fields['cb'] == 'NO' and $rs->fields['codemp'] <> 1 ){$fields[$i]['pos4']=1;}else{$fields[$i]['pos4']=0;}
        if ($rs->fields['caixa'] == 'OK' and ($rs->fields['contrato'] == 'OK' OR $rs->fields['contrato'] == 'DC') and $rs->fields['cb'] == 'OK' and $rs->fields['codemp'] <> 1 and $rs->fields['fat'] == 'NO'){$fields[$i]['pos5']=1;}else{$fields[$i]['pos5']=0;}

            
        $fields[$i]['codbarra'] = $rs->fields['codbarra'];
        $fields[$i]['nomevend'] = $rs->fields['nomevend'];
        $fields[$i]['nomecli'] = $rs->fields['nomecli'];
        $fields[$i]['dataped'] = $rs->fields['dataped'];
        $fields[$i]['status'] = $rs->fields['status'];

    $rs->MoveNext();
    $i++;
	}//WHILE
}

// PESQUISA POR EMPRESA
$rs_empresas = $db->query_db("SELECT * FROM empresa WHERE ".$cond,"SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT * FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];

######################## FIM CODIGO ############################

// TEMPLATE
include ("templates/relatorio_auditoria.htm");

// DISCONECT BD
$db->disconnect();

?>
