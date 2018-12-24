<?	
	header('Content-type: application/json; charset=iso-8859-1');
	$bd = new bd();
	$debugit = true;//$_SESSION[debug];
	$acao = $_GET[acao];
	$codbarra = $_GET[codbarra] || false;
	$nf = $_GET[nf] || false;
	$dados = array();
	$debug = array();
	switch ($acao) {
		case 'rev_cb': {
			if ($codbarra) {
				include('modulos/mod_rma/classes/rma2.class.php');
				$rma2 = new rma2(); 
				$recs = $rma2->get_dados($_GET[codbarra]);
				$ret[msg] = $rma2->get_msg();
				$ret[totalRecords] = count($recs);
				$ret[records] = $recs;
				$debug = $rma2->get_debug();
				if ($debugit) $ret[debug] = $debug;
			} else {
				$ret[msg] = 'DIGITE UM CODIGO DE BARRAS OU NF';
				$ret[erro] = 0;
				$ret[records] = '';
				$ret[totalRecords] = 0;
			}
		}break;
		case 'rev_pesq_nf': {
				include('modulos/mod_rma/classes/rma.class.php');
				$rma = new rma();
				$res = $rma->get_oknf($_GET['nf']);
				$n = count($res);
				$arr['nfs_encontradas'] = count($res); 
				$arr['datas'] = ($n>1)?$res:$res;	
				$ret[debug] = $rma->get_debug();
				$ret[debug][nfs] = count($res);
				$ret = $arr;
		}break;
		case 'rev_ok_nf': {
			include('modulos/mod_rma/classes/rma.class.php');
			$rma = new rma();
			$aProds = array();
			if ($_GET[codped]!='') {
				$aProds = $rma->get_liblist($_GET[codped]);
			}
			$prods['msg'] = (count($aProds)>0)?'':'NÃO HA PRODUTOS LIBCB NESTA NF'; 
			$prods['pedido'] = $oPedido;	
			$prods['records'] = $aProds;
			$prods['totalRecords'] = count($aProds);
			if ($debugit) $prods['debug'] = $rma->get_debug();
			$ret = $prods;
		}break;
		case 'int_cb': {
		
		}break;
		case 'int_codprod': {
		
		}break;
		default: {
			$ret[msg] = 'INICIE NOVA PESQUISA';
			$ret[records] = '';
		}
	}			
	echo json($ret);
?>