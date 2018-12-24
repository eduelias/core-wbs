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
|  arquivo:     start_assistencia_tecnica_admin_srv_exec.php
|  template:    assistencia_tecnica_admin_srv_exec.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    // Adicionar novo sintoma
    case "Adicionar" :
        if(($db->discover_method('rel_srv_exec') <> "") AND ($db->discover_method('rel_laudo') <> ""))
        {
            $rs_insert = $db->query_db("INSERT INTO os_at_rel_laudos_srv_exec (codsrv_exec, codlaudo, datahoracriacao) VALUES ('".$db->discover_method('rel_srv_exec')."', '".$db->discover_method('rel_laudo')."', NOW())","SQL_NONE","S");
        }
    break;
   
    case "DelRel" :
        $rs_insert = $db->query_db("DELETE FROM os_at_rel_laudos_srv_exec WHERE codrel = '".$db->discover_method('codrel_select')."'","SQL_NONE","S");
    break;
   
    case "DelSrvExecRel" :
        $rs_insert = $db->query_db("DELETE FROM os_at_rel_laudos_srv_exec WHERE codsrv_exec = '".$db->discover_method('codsrv_exec_select')."'","SQL_NONE","S");
    break;
}

$rs_lista = $db->query_db("SELECT * FROM os_at_srv_exec WHERE hist = 'N' ORDER BY codsrv_exec","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$rs_laudos = $db->query_db("SELECT * FROM os_at_laudos WHERE hist = 'N'","SQL_NONE","N");
$rs_srv_exec = $db->query_db("SELECT * FROM os_at_srv_exec WHERE hist = 'N'","SQL_NONE","N");

include ("templates/assistencia_tecnica_admin_relacionamento.htm");

$db->disconnect();

?>
