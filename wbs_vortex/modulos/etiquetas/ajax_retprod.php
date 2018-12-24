<?php
	session_start();
	$login = new login($_SESSION);
	$path = realpath($_GET['path']);
	
	if ($_GET['prods'] == 'false'){
		
		$msg = 'INSIRA LISTA DE PRODUTOS SEPARADOS PRO VIRGULA, ACIMA';
		
	} else {
		
		$bd = new bd();
		$ax = explode(',',$_GET['prods']);
		$s = '';
		
		foreach ($ax as $k => $v) {
			$s .= 'codprod = '.$v.' OR '; 	
		}
		$s .= ' false ';
		
		$res = $bd->gera_array('codprod,nomeprod,descres','produtos',$s);

	}
	
	$a['atualizados'] = $wc_novos;
	$a['erro'] = ($login->checklogin())?0:1;
	$a['msg'] = $msg;
	$a['debug'] = $dbg;
	$a['totalRecords'] = count($st);
	$a['records'] = $res;
	
	foreach ($res as $k=>$v) {

		$tt[0] = substr($res['nomeprod'], 0, 28);
		$tt[1] = substr($res['nomeprod'], 27, 28);
		
		$ln[0] = substr($res['descres'], 0, 38);
		$ln[1] = substr($res['descres'], 37, 38);
		$ln[2] = substr($res['descres'], 74, 38);
		$ln[3] = substr($res['descres'], 111, 38);
		$ln[4] = substr($res['descres'], 148, 38);
		
		if ($et%2==0) {
			$s .= "	^FO15,15^A0,30,35^FR^FD".$tt[0]."^FS^FO15,50^A0,30,35^FR^FD".$tt[1]."^FS^FO30,100^AD^FD".$ln[0]."^FS^FO30,125^AD^FD".$ln[1]."^FS^FO30,150^AD^FD".$ln[2]."^FS^FO30,175^AD^FD".$ln[3]."^FS^FO30,200^AD^FD".$ln[4]."^FS^FO30,225^AD^FD".$ln[5]."^FS^FO0,255^AD^FD+                                            +^FS";	
		} else {
			$s .=  "^FWI^FO30,275^AD^FD".$ln[0]."^FS^FO30,300^AD^FD".$ln[1]."^FS^FO30,325^AD^FD".$ln[2]."^FS^FO30,350^AD^FD".$ln[3]."^FS^FO30,375^AD^FD".$ln[4]."^FS^FO30,400^AD^FD".$ln[5]."^FS^FO0,430^GB530,40,90^FS^FO15,435^A0,30,35^FR^FD".$tt[1]."^FS^FO15,470^A0,30,35^FR^FD".$tt[0]."^FS^FWN";
		}
		
		$et++;
		
		$s .= '^XZ';
	
	}
	
	//$hand = fopen('desc_label.txt','w');
	
	//fwrite($hand, $s);
	
	//fclose($h);
		
	echo json($a);
?>