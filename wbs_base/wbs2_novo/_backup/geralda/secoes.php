INDEX.PHP
<?

include("inc/config.inc.php");

session_start();

$ROOTID_USERNAME = check_root_session ();

// Carrega o Layout
include(DIR_TEMPLATES . "tpl.layout.htm");

?>

LOGIN.PHP
<?php

include("inc/config.inc.php");

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
	include(DIR_TEMPLATES . "tpl.login.htm");
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$aut_login = $_POST['login'];
	$aut_senha = $_POST['senha'];

	$result = db_query ("SELECT password FROM root WHERE username = '$aut_login'");
	if ($result['rows'] == 1)
	{
		$row = mysql_fetch_array ($result['result']);
		$password = pacrypt ($aut_senha, $row['password']);

		$result2 = db_query ("SELECT * FROM root WHERE username='$aut_login' AND password='$password'");
		if ($result2['rows'] != 1)
		{
			$erro = 1;
			$erro_msg .= $erro_gerente_senha_erro;
			$aut_login_rec = $aut_login;
		}
	}
	else
	{
		$erro = 1;
		$erro_msg .= $erro_gerente_login_erro;
	}
	if ($erro != 1)
	{
		session_start();
		session_register("rootid");
		$_SESSION['rootid']['username'] = $aut_login;

		header("Location: index.php?pg=home");
		exit;
	}
	include(DIR_TEMPLATES . "tpl.login.htm");
}

?>

FUNCOES.INC.PHP
<?

function check_root_session ()
{
   session_start ();
   if (!session_is_registered ("rootid"))
   {
		header ("Location: login.php");
		exit;
   }
   $ROOTID_USERNAME = $_SESSION['rootid']['username'];
   return $ROOTID_USERNAME;
}

?>

LOGOUT.PHP
<?

include("inc/config.inc.php");

$ROOTID_USERNAME = check_root_session ();

session_unset ();
session_destroy ();

header ("Location: login.php");
exit;

?>
