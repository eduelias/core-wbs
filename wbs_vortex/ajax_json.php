<?
	
	include("include/class.php");
	include("include/functions.php");
	#header('Content-type: application/json; charset=iso-8859-1');
	header("Accept-Encoding: gzip, deflate");
	session_start();
	flush();
	$login = new login($_SESSION);
	if (!$login->checklogin()) {
		$returnValue = array('erro'=>'1','tipo'=>'login');
	} else {
		$debug;
		//pre($_SESSION);
		/////////////////////////////////////////
		// PEGA TODOS OS DADOS DO USUÁRIO LOGADO
		/////////////////////////////////////////
		$bd = new bd();
		$userlogged = $bd->gera_array('*','vendedor','codvend ='.$login->getid());
		//$debug = '';
		//$debug .= $bd->get_sql()."\r\n";
		/////////////////////////////////////////
		$campos = ($_GET[campos]=='')?'*':$_GET[campos];
		//pre($_GET);
		$obj = $_GET[obj];
		// Search condition
		$condicao = $_GET[condicao];
		
		$agrupamento = $_GET[agrupamento];
		
		$cond_add = $_GET[filtro];
		
		$cond_sub = $_GET[cond];
		
		$having = $_GET[having];
		
		$obj = ($obj=='cli')?'clientenovo':$obj;
		
		// Pag num
		$pagina = $_GET['startIndex'];
		
		// Records returned
		$numregistro = (int) $_GET['results'];
		
		// Sorted?
		$sort = $_GET['sort'];
		
		// Sort dir?
		$dir = $_GET['dir'];
	
		//print_r($_GET);
		if (method_exists($obj,gera_array)) {
			$bb = new $obj();
			$deb.= "OBJ";
		} else {
			$bb = new bd(); 
			$deb .= "BD";
		};
		$sorta = explode('-',$sort);
		$sort = $sorta[0];
		//echo $debug;
		//$in = ($pagina-1)*$numregistro;	
		
		if ($cond_add) $condicao .= $cond_add;
		if ($cond_sub) $condicao = $cond_sub;
		if ($sort) $ordenacao = ' ORDER BY '.$sort.' '.$dir;
		
		$havings = ($having)?' HAVING '.$having:'';
		$paginacao = ($pagina!='')?' LIMIT '.$pagina.','.$numregistro:'';
		$agrupamento = ($agrupamento)?' GROUP BY '.$agrupamento:'';
		
		$count = $bb->gera_array($campos,$obj,$condicao.$havings.$agrupamento,1);
		$lista = $bb->gera_array($campos,$obj,$condicao.$agrupamento.$havings.$ordenacao.$paginacao,'1'); 
		
		
		#$debug = $bb->get_sql()."\r\n";
		
		//$debug = '';
		//$debug = $obj.' '.$condicao;
		$mysqlerr = $bb->get_sql_error();
		if (count($mysqlerr)>0) { 
			$err = 3;
			$msg = $mysqlerr['sqlerr'];
		} else {
		
			$msg = 'NENHUM REGISTRO ENCONTRADO'; //mensagem de 'vazio';
		
		}
		if (count($lista)<1){
			$returnValue = array(
				'erro'=>'0',
				'msg'=>$msg,
				'debug'=>array($deb=>$bb->get_debug()),
				'recordsReturned'=>0,
				'totalRecords'=>0,
				'startIndex'=>0,
				'records'=>0
			);
		} else {
			$returnValue = array(
				'msg'=>$msg,
				'erro'=>'0',
				'pagesize'=>$numregistro,
				'debug'=>array($deb=>$bb->get_debug()),
				'sort'=>$sort,
				'dir'=>$dir,
				'startIndex'=>$startIndex,
				'recordsReturned'=>sizeof($lista),
				'totalRecords'=>count($count),
				'records'=>$lista//,
			);
		}
	}
	//pre($returnValue);
	//print_r($returnValue);
	$json = new Services_JSON();
	$data = $json->encode($returnValue);
	echo $data;
?>