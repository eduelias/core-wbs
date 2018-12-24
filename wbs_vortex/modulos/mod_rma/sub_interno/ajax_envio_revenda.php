<?

	$bd = new bd;
	$debug = array();
	
	$res = $bd->send_sql('update v_rma_pct set hist="S" where idrmapct = '.$_GET['id']);
	$debug[] = $bd->get_sql();
	
	$res = $bd->send_sql('update v_rma set idstatus = 9 where idrma in (select idrma from v_rma_pctrma where idrmapct = '.$_GET['id'].')');
	$debug[] = $bd->get_sql();
	
	$debug['error'] = 0;
	
	echo json($debug);

?>