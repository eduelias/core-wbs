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
|  arquivo:     start_controle_revenda_editar.php
|  template:    controle_revenda_editar.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Salvar" :
    	$save_meta = $_POST['meta'];
    	$save_meta = $db->fvalorbd($save_meta);
        $rs_update = $db->query_db("UPDATE vendedor SET block = '".$_POST['bloquear']."', msg = '".$_POST['msg_block']."', meta = '$save_meta', malote = '".$_POST['malote']."' WHERE codvend = '".$_POST['codrevenda_select']."'","SQL_NONE","S");
        
        $codrevenda_select = $_POST['codrevenda_select'];
    break;
}

$rs_revenda_select = $db->query_db("SELECT * FROM vendedor WHERE codvend = '".$_GET['codrevenda_select']."'","SQL_NONE","N");

$db->disconnect();

include ("templates/controle_revenda_editar.htm");

?>