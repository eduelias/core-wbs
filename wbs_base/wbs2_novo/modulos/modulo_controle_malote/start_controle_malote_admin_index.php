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
|  arquivo:     start_controle_malote_admin_index.php
|  template:    controle_malote_admin_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Empresa" :
    	$discover_empresa = $db->discover_method("empresa");
    	
        $rs_empresa = $db->query_db("SELECT * FROM empresa WHERE codemp = '$discover_empresa'","SQL_NONE","N");
        
        $condicaopesq = " ((cod_dest = '".$rs_empresa->fields['codemp']."' and tipo_dest ='E' )) OR ((cod_remet = '".$rs_empresa->fields['codemp']."' and  tipo_remet ='E')) ";
        
    break;

    case "Pesquisar" :
    	$discover_empresa = $db->discover_method("empresa");
    	
        $condicaopesq = " ((cod_dest = '$discover_empresa' and tipo_dest ='E')  OR (cod_remet = '$discover_empresa' and  tipo_remet ='E')) ";
        $discover_nmalotepesq = $db->discover_method("nmalotepesq");
		if ($discover_nmalotepesq)
        {
            $condicaopesq .= " AND num_malote = '$discover_nmalotepesq' ";
        }
    break;

    case "ReceberMalote" :
    	$discover_empresa = $db->discover_method("empresa");
    	
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE controle_malote SET hist = 'S', resp_dest = '$login', datahorareceb = NOW() WHERE codmalote = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
        $condicaopesq = " ((cod_dest = '$discover_empresa' OR cod_remet = '$discover_empresa')) ";
    break;
    
    default :
    	$discover_empresa = $db->discover_method("empresa");
    	
        $condicaopesq = " ((cod_dest = '$discover_empresa' OR cod_remet = '$discover_empresa')) ";
    break;
}

$rs_empresa = $db->query_db("SELECT * FROM empresa WHERE codemp = '$discover_empresa'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];

$rs_empresas = $db->query_db("SELECT * FROM empresa WHERE codemp = '$codemp_transf_vend'","SQL_NONE","N");

$discover_hist = $db->discover_method("hist");

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM controle_malote WHERE $condicaopesq AND hist = '$discover_hist'","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM controle_malote WHERE $condicaopesq AND hist = '$discover_hist' ORDER BY datahoraenvio LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/controle_malote_admin_index.htm");

?>