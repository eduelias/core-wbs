<?

	$arr = array();
	
	$bd = new bd();
	
	$res = $bd->gera_array('tipo from v_rma_pct where idrmapct = '.$_GET[id]);
	
	$sts = 7;
	
	if ($res[0][tipo]==5) $sts = 19;
	
	#$arr['v_rma@idstatus'] = 4;
	
	#$arr['v_rma@codvend'] = $_SESSION['id'];
	
	#$arr['cond@v_rma@idrma'] = $_GET['id'];
	
	$bd->send_sql('UPDATE v_rma SET idstatus = '.$sts.', codvend = '.$_SESSION['id'].' WHERE idrma IN (select idrma from v_rma_pctrma WHERE idrmapct = '.$_GET['id'].')');
	
	echo $bd->get_sql();
?>