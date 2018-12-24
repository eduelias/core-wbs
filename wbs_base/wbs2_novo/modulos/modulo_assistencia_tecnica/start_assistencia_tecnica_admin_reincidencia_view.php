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
|  arquivo:     start_assistencia_tecnica_admin_reincidencia_view.php
|  template:    assistencia_tecnica_admin_reincidencia_view.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

$rs_assitencia = $db->query_db("SELECT * FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

// LISTA DADOS CLIENTE
$rs_dados_cliente = $db->query_db("SELECT * FROM clientenovo WHERE codcliente = '".$rs_assitencia->fields['codcliente']."'","SQL_NONE","N");

// LISTA REINCIDENCIAS
$rs_reincidencias = $db->query_db("SELECT * FROM os_at WHERE codcliente = '".$rs_assitencia->fields['codcliente']."'","SQL_NONE","N");

// LISTA ANALISES
$rs_analises = $db->query_db("SELECT codanalise, codsintoma, codlaudo, codsrv_exec, cancel, datacancel FROM os_at_analise WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_reincidencia_view.htm");

?>