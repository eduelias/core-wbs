<?
	#session_start();
	$bd = new bd();
	$retorno = array();
	$retorno['erro'] = 0;
	

	if ($_GET['tipo'] == 5){

		$arr['v_rma_pct@codvend'] = $_SESSION['id'];
		$arr['v_rma_pct@short_desc'] = $_SESSION['REVENDA']; //;
		$arr['v_rma_pct@nf_e']= '000000';
		$arr['v_rma_pct@data_nf_e']= date('%Y-%m-%d');
		$arr['v_rma_pct@tipo'] = $_GET['tipo'];
		$bd->insere($arr);
		
		$idstatus = 18;
		
		$retorno['39'] = $bd->get_sql();	
		$idstatus = $_GET['status'];
		$retorno['erro'] = 0;
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
			
			$retorno['raw_estoque'] = $bd->send_sql('UPDATE estoque,v_rma,codbarra SET estoque.qtde = estoque.qtde-1 where estoque.codemp = codbarra.codemp and codbarra.codcb = v_rma.codcb_ent and estoque.codprod = v_rma.codprod AND v_rma.idrma ='.$v);
			
			$arr1['cond@codbarra@codcb'] = '(select codcb_ent from v_rma where idrma = '.$v.')';
			
			$arr1['codbarra@codbarraped'] = 1;
			
			$arr1['codbarra@idrma'] = $v;
			
			$arr1['codbarra@codped'] = -33;
			
			$bd->altera($arr1);
			
			$retorno['A'] = $bd->get_sql();
		}
	}
		

	
	echo json($retorno);

?>