<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (vers�o 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright � 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_assistencia_tecnica_admin_srv_exec_edita.php
|  template:    assistencia_tecnica_admin_srv_exec_edita.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

$rs_linha = $db->query_db("SELECT descricao FROM os_at_srv_exec WHERE codsrv_exec = '$codsrv_exec_select'","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_srv_exec_edita.htm");

?>
