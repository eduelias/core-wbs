<?
	$bd = new bd;
	
	$dbg = array();

	function volta_status($idrma) {
		
		$bd = new bd;
		
		$res = $bd->gera_array('idstatus from v_rma_hstatus where idrma ='.$idrma.' order by data DESC limit 1,1');
		
		$dbg['bd'][] = $res;
		
		$dbg['rma_pct'] = $bd->get_debug();
		
		if(is_array($res)) {
			
			$altera['cond@v_rma@idrma'] = $idrma;
			
			$altera['v_rma@idstatus'] = $res[0]['idstatus'];
			
			$bd->altera($altera);
			
			$dbg['achou'] = $bd->get_debug();
					
		} else {
		
			$dbg['msg'] = 'NAO EXISTE HISTORICO?';
			
			return false;
		
		}
		
		return $res[0][idstatus];
	
	}
	
	$res = $bd->gera_array('idrma from v_rma_pctrma where idrmapct ='.$_GET['pct']);
		
	$dbg['sql'][] = $bd->get_debug();
	
	if (is_array($res)) {
		
		if ($_GET['acao'] == 'libera') {
		
			$dbg['acao'] = 'era pra liberar';
			
			foreach($res as $k=>$v) {
			
				$dbg[status] = volta_status($v['idrma']);
				
			}
			
		} else {		
			
			foreach($res as $k=>$v) {
				
				$altera['cond@v_rma@idrma'] = $v['idrma'];
				
				$altera['v_rma@idstatus'] = 5;
				
				$bd->altera($altera);
				
				$dbg['sql'] = $bd->get_sql();
				$dbg[status] = 5;
			}
			
		}
	} else {
	
		$dbg['errorMessage'] = 'NAO ENCONTROU idrma';
		
	}
	
	echo json($dbg);

?>