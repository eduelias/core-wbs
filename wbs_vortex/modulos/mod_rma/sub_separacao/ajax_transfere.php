<?

	include('modulos/mod_rma/classes/rma.class.php');
		
	$rma = new rma();
	
	$aux = array_pop($_POST);
	
	$arr = $_POST;
	
	if($rma->executa_transferencia($arr)) {
	//PCT TIPO 1 => CLIENTE-RMA / 2 => SEPARACAO-RMA
		$bd = new bd();
		$arr2['v_rma_pct@codvend'] = $_SESSION['id'];
		$arr2['v_rma_pct@tipo'] = 3;
		$bd->insere($arr2);
		$sq[] = $bd->get_sql();
		
		$idpct = $bd->conn->Insert_ID();
		$arr2 = array();
		$arr2['v_rma_pctrma@idrmapct'] = $idpct;
		$arr2['v_rma_pctrma@codvend'] = $_SESSION['id'];
		
		
		foreach ($arr as $k => $v) {
			$arr2['v_rma_pctrma@idrma'] = $v; 
			$bd->insere($arr2);	
		}
		
		foreach ($arr as $k => $v) {			
			$arr3['cond@v_rma@idrma'] = $v;
			$arr3['v_rma@flag_transferido'] = 1;
			$arr3['v_rma@idstatus'] = 16;
			$bd->altera($arr3);
		}
		
		$sq[] = $bd->get_sql();
		echo json(array('erro'=>0,'SQL'=>$sq));
	
	} else {
	
		echo json(array('erro'=>1,'SQL'=>$bd->get_sql()));
	
	}

?>