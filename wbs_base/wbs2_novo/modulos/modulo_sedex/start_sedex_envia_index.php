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
|  arquivo:     start_sedex_index.php
|  template:    sedex_index.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

$rs_peso = $db->query_db("SELECT * FROM sedex_valor","SQL_NONE","N");

$db->disconnect();

include ("templates/sedex_envia_index.htm");

?>