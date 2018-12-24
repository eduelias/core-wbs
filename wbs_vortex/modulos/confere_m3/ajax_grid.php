<?php
	session_start();
	$login = new login($_SESSION);
	$path = realpath($_GET['path']);
	
	if ($_GET['data_i'] == 'load'){
		
		$msg = 'Escolha um per&iacute;odo';
		
	} else {
		
		$bd = new bd();

		$res = $bd->gera_array("codnf,chk,date_format(pedido.dataped, '%d/%m/%Y') as dataped, pedido.codped as codped,pedidonf.nf as nf,valornf,datanf,clientenovo.nome as nome","pedido,pedidonf,clientenovo", 'pedido.codped = pedidonf.codped AND clientenovo.codcliente = pedido.codcliente AND pedido.codemp = 14 AND dataped between "'.$_GET['data_i'].'" AND DATE_ADD("'.$_GET['data_i'].'", INTERVAL 1 MONTH) order by dataped ASC');
		
		$dbg = $bd->get_debug();
		
	}
	
	$a['erro'] = ($login->checklogin())?0:1;
	$a['msg'] = $msg;
	$a['debug'] = $dbg;
	$a['totalRecords'] = count($res);
	$a['records'] = $res;
	
	echo json($a);
?>