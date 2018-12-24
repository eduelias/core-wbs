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
|  arquivo:     start_securitykey_ajax.php
|  template:    securitykey_ajax.htm
+--------------------------------------------------------------
*/

//$db->connect_wbs();

//$db->conn->debug = true;

//echo "<strong>token_array[com64]:</strong> ".$_GET['token_array']."<br />";

$token_array = base64_decode($_GET['token_array']);

//echo "<strong>token_array[sem64]:</strong> $token_array<br />";

$token = explode("#", $token_array);
$seqtoken = $token[0];
$numerotoken = $token[1];
$idvendtoken = $token[2];
$pg_go = $token[3];
$p_ped_go = $token[4];

/*
echo "<strong>seqtoken:</strong> $seqtoken<br />";
echo "<strong>numerotoken:</strong> $numerotoken<br />";
echo "<strong>idvendtoken:</strong> $idvendtoken<br />";
echo "<strong>senhatoken:</strong> ".$_GET['senhatoken']."<br />";
echo "<strong>pg_go:</strong> $pg_go<br />";
echo "<strong>pg_ped:</strong> $pg_ped_go<br />";
*/

$autoriza = $db->check_senha($numerotoken, $seqtoken, $_GET['senhatoken'], $idvendtoken);

//echo $autoriza;

if($autoriza == 1)
{
	$_SESSION['secure_ch'][$pg_go] = true;
	echo "1";
}
else
{
	$_SESSION['secure_ch'][$pg_go] = false;
	echo "0";
}

//$db->disconnect();

//include ("templates/securitykey_ajax.htm");

?>