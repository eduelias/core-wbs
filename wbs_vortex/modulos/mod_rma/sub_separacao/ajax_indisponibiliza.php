<?

	$bd = new bd();
	
	$arr['cond@v_rma@idrma'] = $_GET['idrma'];
	
	$arr['v_rma@flag_disponivel'] = 0;
	
	$res = $bd->altera($arr);
	
	echo $bd->get_sql();

?>