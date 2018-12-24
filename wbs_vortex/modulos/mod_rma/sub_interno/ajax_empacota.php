<?
	#session_start();
	$bd = new bd();
	$retorno = array();
	$retorno['erro'] = 0;
	
	if ($_GET['nf']) {
		$arr['v_rma_pct@codvend'] = $_SESSION['id'];
		$arr['v_rma_pct@short_desc'] = $_GET['rev'];
		$arr['v_rma_pct@codemp_ent'] = $_GET['entrada'];
		$arr['v_rma_pct@nf_e']= $_GET['nf'];
		$arr['v_rma_pct@data_nf_e']=$_GET['dtnf'];
		$arr['v_rma_pct@tipo'] = 2;
		$bd->insere($arr);
		$retorno['13'] = $bd->get_sql();
		$idstatus = 4;
		$arr2['cond@v_rma@idstatus'] = 1;
	};
	$str = '';
	$liga = '';
	
	
	
	if ($_GET['tipo'] == '4'){
		foreach ($_POST as $k => $v) { 
			$n = $v;
			$str .= $liga.'v_rma_pctrma.idrma = '.$v;
			$retorno['21'][] =  $v;
			$liga = ' OR ';
		}
		
		$res1 = $bd->gera_array('COUNT(DISTINCT(short_desc)) as counter from v_rma_pct, v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct AND ('.$str.')');
		$retorno['32'] = $bd->get_sql();
		
		$res2 = $bd->gera_array('COUNT(DISTINCT(short_desc)) as counter from v_rma_pct, v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct AND ('.$str.') AND v_rma_pct.nf_e = "BALCAO"');
		
		$res3 = $bd->gera_array('COUNT(DISTINCT(short_desc)) as counter from v_rma_pct, v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct AND ('.$str.') AND v_rma_pct.nf_e <> "BALCAO"');
		
		$retorno['34'] = $bd->get_sql();
		
		$nf = '000000';
		$dt = '';
		
		switch (true) {
			case (($res2[0]['counter']==1)and($res3[0]['counter']==1)):{
				$retorno['erro'] = 1;
				$retorno['erromsg'] = "PRODUTOS EM NF E DE BALCAO NAO\r\nDEVEM SER EMPACOTADOS JUNTOS";
			}break;
			case ($res1[0]['counter']!=1):{
				$retorno['erro'] = 1;
				$retorno['erromsg'] = 'MAIS DE UMA EMPRESA SELECIONADAS';
			}break;
			case ($res2[0]['counter']==1):{
			
				$nf = 'BALCAO';
				$dt = date('%Y-%m-%d');
			
			};
			default:{
				$res = $bd->gera_array('short_desc from v_rma_pct,v_rma_pctrma where v_rma_pctrma.idrmapct = v_rma_pct.idrmapct and v_rma_pct.tipo = 2 and v_rma_pctrma.idrma = '.$n);
				$retorno['31'] = $bd->get_sql();
				$arr['v_rma_pct@codvend'] = $_SESSION['id'];
				$arr['v_rma_pct@short_desc'] = ($_GET['codcliente'])? $_GET['codcliente']:$res[0]['short_desc']; //;
				$arr['v_rma_pct@nf_e']= $nf;
				$arr['v_rma_pct@data_nf_e']= $dt;
				$arr['v_rma_pct@tipo'] = $_GET['tipo'];
				$bd->insere($arr);
				
				$retorno['39'] = $bd->get_sql();	
		
				$idstatus = $_GET['status'];
				$retorno['erro'] = 0;
			}break;
		}

	}
	
	$idpct = $bd->conn->Insert_ID();
	$arr = array();
	$arr['v_rma_pctrma@idrmapct'] = $idpct;
	$arr['v_rma_pctrma@codvend'] = $_SESSION['id'];
	
	
	if ($retorno['erro'] == 0) { 
		foreach ($_POST as $k => $v) {
			$arr['v_rma_pctrma@idrma'] = $v; 
			$bd->insere($arr);	
			$retorno['56'] = $bd->get_sql();	
			$arr2['cond@v_rma@idrma'] = $v;
			$arr2['v_rma@idstatus'] = $idstatus;
			$bd->altera($arr2);
			$retorno['60'] =  $bd->get_sql();	
		}
	}
		
	echo json($retorno);
	#pre($bd);

?>