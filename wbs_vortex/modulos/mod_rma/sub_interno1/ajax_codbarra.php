<?
include('modulos/mod_rma/classes/rma.class.php');
include('modulos/mod_rma/classes/rma2.class.php');
$rma = new rma();
$rma2 = new rma2();

$bd = new bd();
session_start();
if (isset($_GET[codbarra])) {

	$rma2->set_interno();
	$recs = $rma2->get_dados($_GET[codbarra]);
	
	$ret[msg] = $rma2->get_msg();
	$ret[records] = $recs;
	if ($_SESSION[debug]) $ret[debug] = $rma2->get_debug();
	
	echo json($ret);

} else {

	$travacb = 'N'; 
	$codped = $rma->get_codped($_GET['nf'],$_GET['dtnf']);
	$aProds = $rma->get_prods($codped,$travacb);	
	$oPedido = $rma->get_pedata($codped);
	$prods['pedido'] = $oPedido;	
	$prods['records'] = $aProds;
	$prods['totalRecords'] = count($aProds);
	if ($_SESSION[debug]) $prods['debug'] = $rma->get_debug();

	echo json($prods);
}

	

	
?>