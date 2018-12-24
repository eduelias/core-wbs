<?php
	//header('Content-Type: text/html; charset=iso-8859-1');
include(C_PATH_CLASS."form.class.php");

$formid = "1";
if (isset($_GET['formid'])) {
  $formid = $_GET['formid'];
} 

	$formulario = new form();
	$recordID = (isset($_GET['recordID']))?$_GET['recordID']:0;
	$formulario->imprime($formid,$recordID);
?>


