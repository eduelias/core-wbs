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
|  arquivo:     start_grupos_index.php
|  template:    grupos_index.htm
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
    	//echo "<b>Entrou no Action 'Pesquisar'</b><br />";
    	$discover_codpesq = $db->discover_method("codpesq");
        if ($discover_codpesq)
        {
            $condicaopesq = " WHERE codgrp = '$discover_codpesq' ";
            //echo "<b>Pesquisou por COD</b><br />";
        }
        
        $discover_nomepesq = $db->discover_method("nomepesq");
        if ($discover_nomepesq)
        {
			$condicaopesq = " WHERE nomegrp LIKE '%$discover_nomepesq%' ";
			//echo "<b>Pesquisou por NOME</b><br />";
        }
    break;

    case "Desabilitar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE segurancagrp SET habilitado = 'N' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Habilitar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE segurancagrp SET habilitado = 'S' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "SemSenha" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE segurancagrp SET hsenha = 'N' WHERE codgrp = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;

    case "ComSenha" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE segurancagrp SET hsenha = 'S' WHERE codgrp = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;
    
    case "Editar" :
    	$rs_update = $db->query_db("UPDATE segurancagrp SET nomegrp = '".$_POST['nome']."', obs = '".$_POST['obs']."', habilitado = '".$_POST['habilitado']."' WHERE codgrp = '".$_POST['codgrp_select']."'","SQL_NONE","S");
    break;
}


$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM segurancagrp $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM segurancagrp $condicaopesq ORDER BY nomegrp LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");
$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/grupos_index.htm");

?>
