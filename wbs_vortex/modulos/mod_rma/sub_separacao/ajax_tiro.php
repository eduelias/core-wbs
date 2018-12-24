<?

	$idrma = $_GET['idrma'];
	$newcb = $_GET['newcb'];
	
	$retorno = array();
	$retorno['GET'] = $_GET;
	$bd = new bd();
	
	$res = $bd->gera_array('@codpro:=IF(codprod_tcliente=0,codprod,codprod_tcliente) as codprod_tcliente, IF(v_rma.tipo_prod="P","14",IF(pedido.codemp=14,14,15)) as codemp, (select chkcb from produtos where codprod = @codpro) as chkcb from v_rma,pedido where v_rma.codped = pedido.codped AND idrma = '.$idrma);
	
	$retorno['sql_codprod'] = $bd->get_sql();
	
	$rma = ' ';
	
	$codemp = $res[0]['codemp'];
	
	if ($res[0]['chkcb'] == 'Y') {
		
		$rma = ' AND NOT codbarra in (select codbarra_tcliente from v_rma)';
		
	} else {
	
		$retorno['chkcb'] = 'LIBERA CB';
	
	}

	$res2 = $bd->gera_array('codcb,codemp from codbarra where codbarra = \''.$newcb.'\' AND codprod = '.$res[0]['codprod_tcliente'].' AND NOT codbarraped = 1'.$rma.'and codemp = '.$codemp.' and tipo_fab = (select IF(tipo_prod=\'P\',\'P\',\'\') from v_rma where idrma='.$idrma.') order by codcb DESC limit 1');
	
	$codcb = $res2[0][codcb];
	
	$retorno['sql_newdata'] = $bd->get_sql();
	
	$retorno['a_newdata'] = $res2;
	
	if (is_array($res2)){
	
		$arr['cond@v_rma@idrma'] = $idrma;
		
		$arr['v_rma@codcb_tcliente'] = $codcb;
		
		$arr['v_rma@codbarra_tcliente'] = $newcb;
		
		$arr['v_rma@codprod_tcliente'] = $res[0]['codprod_tcliente'];
		
		$arr['v_rma@idstatus'] = 6;	
		
		$bd->altera($arr);
		
		$retorno['sql_update_v_rma'] = $bd->get_sql();
		
		$arr1['cond@codbarra@codcb'] = $res2[0]['codcb'];
		
		$arr1['codbarra@codbarraped'] = 1;
		
		$arr1['codbarra@idrma'] = $idrma;
		
		$arr1['codbarra@codped'] = -55;
		
		$bd->altera($arr1);
		
		$retorno['sql_update_codbarra'] = $bd->get_sql();
		
		$retorno['raw_estoque'] = $bd->send_sql('UPDATE estoque SET qtde = qtde-1 where codemp = '.$res2[0]['codemp'].' and codprod = '.$res[0]['codprod_tcliente']);
		
		$retorno['sql_estoque'] = $bd->get_sql();
		
		$retorno['erro'] = 0;
		
			
	} else {
		
		$retorno['erro'] = 1;
		
	}
	
	echo json($retorno);
	
?>