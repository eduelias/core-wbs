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
|  arquivo:     start_assistencia_tecnica_admin_criar_ireincidencias.php
|  template:    assistencia_tecnica_admin_criar_ireincidencias.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

$rs_cliente = $db->query_db("SELECT codcliente FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$rs_reincidencias = $db->query_db("SELECT * FROM os_at WHERE codcliente = '".$rs_cliente->fields['codcliente']."'","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_atualiza_ireincidencias.htm");

?>
