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
|  arquivo:     start_controle_malote_revenda_index.php
|  template:    controle_malote_revenda_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Pesquisar" :
        $condicaopesq = " ((cod_dest = '$codvend' and tipo_dest ='R')  OR (cod_remet = '$codvend' and  tipo_remet ='R')) ";
        
        $discover_nmalotepesq = $db->discover_method("nmalotepesq");
        if ($discover_nmalotepesq)
        {
            $condicaopesq .= " AND num_malote = '$discover_nmalotepesq' ";
        }
    break;

    case "ReceberMalote" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE controle_malote SET hist = 'S', resp_dest = '$login', datahorareceb = NOW() WHERE codmalote = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
        $condicaopesq = " ((cod_dest = '$codvend' and tipo_dest ='R')  OR (cod_remet = '$codvend' and  tipo_remet ='R')) ";
    break;
    
    default :
        $condicaopesq = " ((cod_dest = '$codvend' and tipo_dest ='R')  OR (cod_remet = '$codvend' and  tipo_remet ='R')) ";
        $_POST['hist'] = 'N';
    break;
}

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

include ("templates/controle_malote_revenda_index.htm");

?>