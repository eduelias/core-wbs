<?
	
	include("include/class.php");
	include("include/functions.php");
	header('Content-type: application/json; charset=iso-8859-1');
	header("Accept-Encoding: gzip, deflate");

	if(isset($_GET['action']))
		include('modulos/at_export/ajax_'.$_GET['action'].'.php');
		
	else
		echo '{"erro":"GET NAO ENCONTRADO"}';
	
?>