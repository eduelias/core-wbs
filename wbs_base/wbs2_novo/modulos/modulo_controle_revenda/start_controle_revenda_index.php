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
|  arquivo:     start_controle_revenda_index.php
|  template:    controle_revenda_index.htm
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
        $discover_revendapesq = $db->discover_method("revendapesq");
		if ($discover_revendapesq)
        {
            $condicaopesq = " vendedor.nome LIKE '%$discover_revendapesq%' AND ";
        }
    break;

    case "Bloquear" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
              	$msg_bloqueio = "Login bloqueado! Por favor entre em contato com o seu supervidor.";
                $rs_update = $db->query_db("UPDATE vendedor SET block = 'Y', msg = '$msg_bloqueio' WHERE codvend = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Desbloquear" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
              	$msg_bloqueio = "";
                $rs_update = $db->query_db("UPDATE vendedor SET block = 'N', msg = '$msg_bloqueio' WHERE codvend = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "NaoMalote" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
              	$msg_bloqueio = "";
                $rs_update = $db->query_db("UPDATE vendedor SET malote = 'N' WHERE codvend = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "SimMalote" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
              	$msg_bloqueio = "";
                $rs_update = $db->query_db("UPDATE vendedor SET malote = 'S' WHERE codvend = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;

    case "Salvar" :
    	$save_meta = $_POST['meta'];
    	$save_meta = $db->fvalorbd($save_meta);
        $rs_update = $db->query_db("UPDATE vendedor SET block = '".$_POST['bloquear']."', msg = '".$_POST['msg_block']."', meta = '$save_meta', malote = '".$_POST['malote']."' WHERE codvend = '".$_POST['codrevenda_select']."'","SQL_NONE","S");
    break;

}

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM vendedor WHERE $condicaopesq tipo = 'R' ","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

#$rs_lista = $db->query_db("SELECT vendedor.codvend AS codlogin, vendedor.nome AS login, doc, clientenovo.nome AS nome, cidade, estado, block, email, cep, dddtel1, tel1, dddtel2, tel2, malote FROM vendedor, clientenovo WHERE $condicaopesq tipo = 'R' AND ((doc = cnpj) OR (doc = cpf))  ORDER BY vendedor.nome LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");
$rs_lista = $db->query_db("SELECT vendedor.codvend AS codlogin, vendedor.nome AS login, doc, tipocliente, block, malote FROM vendedor WHERE $condicaopesq tipo = 'R' ORDER BY vendedor.nome LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/controle_revenda_index.htm");

?>
