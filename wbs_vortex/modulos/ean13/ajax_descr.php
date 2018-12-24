<?php

	header('Content-type: application/json; charset=iso-8859-1');
	
	$bd = new bd();

	$arr = $bd->gera_array('descres,nomeprod,imagemfile,codbarra','produtos','codprod = '.$_GET['codbarra']);
	
	//print_r($arr);

	$retorno['codprod'] = $_GET['codbarra'];
	
	$retorno['nome'] = $arr[0]['nomeprod'];
	
	$retorno['desc'] = $arr[0]['descres'];
	
	$retorno['imagem'] = $arr[0]['imagemfile'];
	
	$retorno['codbarra'] = $arr[0]['codbarra'];

	$retorno['debug'] = $bd->get_sql();

	echo json($retorno);
	
?>