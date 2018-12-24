<?
include('modulos/mod_rma/classes/rma.class.php');
include('modulos/mod_rma/classes/rma2.class.php');
$rma = new rma();
$rma2 = new rma2();
header('Content-type: application/json; charset=iso-8859-1');
$bd = new bd();
session_start();
if (isset($_GET[codbarra])) {

	$recs = $rma2->get_dados($_GET[codbarra]);
	$ret[msg] = $rma2->get_msg();
	$ret[records] = $recs;
	if ($_SESSION[debug]) $ret[debug] = $rma2->get_debug();
	#pre($rma2);
	echo json($ret);

} else {
	$aProds = array();
	
	if ($_GET[codped]!='') {
		$aProds = $rma->get_liblist($_GET[codped]);
	}
	$prods['pedido'] = $oPedido;	
	$prods['records'] = $aProds;
	$prods['totalRecords'] = count($aProds);
	$prods['debug'] = $rma->get_debug();

	echo json($prods);
}

	

	
?>