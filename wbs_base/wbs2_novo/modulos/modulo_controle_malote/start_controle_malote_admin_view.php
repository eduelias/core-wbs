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
|  arquivo:     start_noticias_view.php
|  template:    noticias_view.htm
+--------------------------------------------------------------
*/$db->connect_wbs();

//$db->$conn->debug = true;

$rs_lista = $db->query_db("SELECT descricao FROM controle_malote WHERE codmalote ='$codmaloteselect'","SQL_NONE","N");

echo $descricao = $rs_lista->fields['descricao'];

$db->disconnect();

//include ("templates/controle_malote_admin_view.htm");
?>
