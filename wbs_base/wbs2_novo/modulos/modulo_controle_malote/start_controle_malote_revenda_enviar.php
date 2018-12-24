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
|  arquivo:     start_controle_malote_revenda_enviar.php
|  template:    controle_malote_revenda_enviar.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Envia" :
		$sql_insert = "INSERT INTO controle_malote (num_malote, cod_remet, resp_remet, cod_dest, datahoraenvio, tipo_remet, tipo_dest, descricao) VALUES ('".$_POST['nmalote']."', '$codvend', '$login', '".$_POST['cod_dest']."', NOW(), 'R', 'E', '".$_POST['descricao']."')";

		$rs_insert = $db->query_db($sql_insert, "SQL_NONE", "S");
    break;
}

$db->disconnect();

include ("templates/controle_malote_revenda_enviar.htm");

?>