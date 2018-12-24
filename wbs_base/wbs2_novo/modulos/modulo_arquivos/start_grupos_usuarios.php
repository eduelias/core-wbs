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
|  arquivo:     start_grupos_usuarios.php
|  template:    grupos_usuarios.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
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

    case "Bloquear" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                $msg_bloqueio = "Login bloqueado! Por favor entre em contato com a administração ou com seu supervisor.";
				$rs_update = $db->query_db("UPDATE vendedor SET block = 'Y', msg = '$msg_bloqueio' WHERE codvend = '$rows_codlista[$i]'","SQL_NONE","N");
            }
        }
    break;
    
    case "Editar" :
    	$rs_update = $db->query_db("UPDATE segurancagrp SET nomegrp = '".$_POST['nome']."', obs = '".$_POST['obs']."', habilitado = '".$_POST['habilitado']."' WHERE codgrp = '".$_POST['codgrp_select']."'","SQL_NONE","S");
    break;
}

$discover_codgrp = $db->discover_method("codgrp_select");

$rs_grupo = $db->query_db("SELECT * FROM segurancagrp WHERE codgrp = '$discover_codgrp'","SQL_NONE","N");
//$rs_grupo = $db->query_db("SELECT * FROM segurancagrp WHERE codgrp = '".$_GET['codgrp_select']."'","SQL_NONE","N");

$rs_lista = $db->query_db("SELECT codvend, vendedor.codvend AS codlogin, vendedor.nome AS login, doc, clientenovo.nome AS nome, block, codemp FROM 
vendedor, clientenovo WHERE codgrp = '$discover_codgrp' AND ((doc = cnpj) OR (doc = cpf)) ORDER BY codemp, nome","SQL_NONE","N");
//$rs_lista = $db->query_db("SELECT codvend, vendedor.codvend AS codlogin, vendedor.nome AS login, doc, clientenovo.nome AS nome, block FROM vendedor, clientenovo WHERE codgrp = '".$_GET['codgrp_select']."' AND ((doc = cnpj) OR (doc = cpf)) ORDER BY nome","SQL_NONE","N");
$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/grupos_usuarios.htm");

?>