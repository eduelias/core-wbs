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
|  arquivo:     start_menu_index.php
|  template:    menu_index.htm
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
        $discover_codpesq = $db->discover_method("codpesq");
        if ($discover_codpesq)
        {
            $condicaopesq = " WHERE codmenu = '$discover_codpesq' ";
        }
        
		$discover_nomepesq = $db->discover_method("nomepesq");
		if ($discover_nomepesq)
        {
			$condicaopesq = " WHERE menu LIKE '%$discover_nomepesq%' ";
        }
    break;

    case "Desabilitar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca_menu SET habilitado = 'N' WHERE codmenu = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Habilitar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $rs_update = $db->query_db("UPDATE seguranca_menu SET habilitado = 'S' WHERE codmenu = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;
    
    case "Editar" :
    	$rs_update = $db->query_db("UPDATE seguranca_menu SET menu = '".$_POST['nome']."', image = '".$_POST['imagem']."', habilitado = '".$_POST['habilitado']."' WHERE codmenu = '".$_POST['codmenu_select']."'","SQL_NONE","S");
    break;
}


$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM seguranca_menu $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM seguranca_menu $condicaopesq ORDER BY codmenu, menu LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");
$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/menu_index.htm");

?>