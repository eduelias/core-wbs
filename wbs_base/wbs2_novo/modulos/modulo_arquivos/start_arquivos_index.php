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
|  arquivo:     start_arquivos_index.php
|  template:    arquivos_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    case "Pesquisar" :
        $discover_codpesq = $db->discover_method("codpesq");
        if ($discover_codpesq)
        {
            $condicaopesq = " WHERE codpg = '$discover_codpesq' ";
        }
        
		$discover_nomepesq = $db->discover_method("nomepesq");
		if ($discover_nomepesq)
        {
			$condicaopesq = " WHERE descr LIKE '%$discover_nomepesq%' ";
        }
    break;

    case "Desabilitar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET habilitado = 'N' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Habilitar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET habilitado = 'S' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Invisivel" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET actionpg = 'N' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Visivel" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET actionpg = 'S' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;

    case "EmManutencao" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET manutencao = 'S' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;

    case "ForaManutencao" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET manutencao = 'N' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "SemSenha" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET senha = 'N' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;

    case "ComSenha" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET senha = 'S' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;

    case "SenhaPersistente" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca SET senha = 'P' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
	break;
    
    case "Editar" :
    	$rs_update = $db->query_db("UPDATE seguranca SET nomem = '".$_POST['nome']."', arquivo = '".$_POST['arquivo']."', actionpg = '".$_POST['visivel']."', descr = '".$_POST['descricao']."', codmenu = '".$_POST['menu']."', modulo = '".$_POST['modulo']."', habilitado = '".$_POST['habilitado']."' WHERE codpg = '".$_POST['codpg_select']."'","SQL_NONE","S");
    break;
}


$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM seguranca $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM seguranca $condicaopesq ORDER BY codmenu, nomem LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");
$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/arquivos_index.htm");

?>