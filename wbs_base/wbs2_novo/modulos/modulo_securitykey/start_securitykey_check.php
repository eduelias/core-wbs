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
|  arquivo:     start_securitykey_check.php
|  template:    securitykey_check.htm
+--------------------------------------------------------------
*/

//$db->connect_wbs();

//$db->conn->debug = true;

$seqtoken = base64_decode($_POST['seqtoken']);
$autoriza = $db->check_senha($_POST['numerotoken'], $seqtoken, $_POST['senhatoken'], $_POST['idvendtoken']);

//$db->disconnect();

include ("templates/securitykey_check.htm");

?>