<?
	#header();
	#header();
	#header();	
	if(!$_GET[pct]) header('Content-type: application/json; charset=iso-8859-1');
	header("Accept-Encoding: gzip, deflate");
	include("include/class.php");
	include("include/functions.php");
	
	session_start();
	
	$login = new login($_SESSION);
	$login->checklogin();
	/////////////////////////////////////////
	// PEGA TODOS OS DADOS DO USUÁRIO LOGADO
	/////////////////////////////////////////
	$bd = new bd();
	$userlogged = $bd->gera_array('*','vendedor','codvend ='.$login->getid());
	/////////////////////////////////////////
	$file = $_GET[file];
	$file = decode($file);
	include($file);
?>
