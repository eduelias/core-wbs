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
|  arquivo:     start_grupos_editar.php
|  template:    grupos_editar.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

$rs_show = $db->query_db("SELECT * FROM segurancagrp WHERE codgrp = '".$_GET['codgrp_select']."'","SQL_NONE","N");


$db->disconnect();

include ("templates/grupos_editar.htm");

?>