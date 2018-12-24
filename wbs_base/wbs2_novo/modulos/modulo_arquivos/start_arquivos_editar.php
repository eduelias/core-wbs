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
|  arquivo:     start_arquivos_editar.php
|  template:    arquivos_editar.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

$rs_show = $db->query_db("SELECT * FROM seguranca WHERE codpg = '".$_GET['codpg_select']."'","SQL_NONE","N");

$rs_menu = $db->query_db("SELECT codmenu, menu FROM seguranca_menu","SQL_NONE","N");

$db->disconnect();

include ("templates/arquivos_editar.htm");

?>