<?php 

	header('Content-type: application/json; charset=iso-8859-1');

	$bd = new bd();
	
	$ins['cond@produtos@codprod'] = $_GET['codpr'];
	
	$ins['produtos@codbarra'] = $_GET['codbr'];

	$bd->altera($ins);
	
	$ret['debug'] = $bd->get_sql();
	
	echo json($ret);

?>