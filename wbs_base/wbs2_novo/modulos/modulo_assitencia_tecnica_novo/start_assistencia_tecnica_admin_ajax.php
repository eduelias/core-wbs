<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_assistencia_tecnica_admin_ajax.php
|  template:    assistencia_tecnica_admin_ajax.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();
//$db->conn->debug = true;

switch ($Action)
{
   case "BuscaSrvExec" :
   		//echo "$codlaudo";
        $rs_srv_exec_show = $db->query_db("SELECT os_at_srv_exec.codsrv_exec as codsrv_exec_select, descricao FROM os_at_rel_laudos_srv_exec, os_at_srv_exec WHERE codlaudo = '".$_GET['codlaudo']."' AND os_at_rel_laudos_srv_exec.codsrv_exec = os_at_srv_exec.codsrv_exec ORDER BY os_at_srv_exec.codsrv_exec","SQL_NONE","N");
        echo $db->GeraXML($rs_srv_exec_show);
        break;
}

//include ("templates/assistencia_tecnica_admin_atualiza_ianalises.htm");

$db->disconnect();

?>
