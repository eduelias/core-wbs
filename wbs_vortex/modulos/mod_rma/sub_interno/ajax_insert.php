<? 

	//pre($_POST);
	
	$array = array();
	$bd = new bd();
	$fl = false;
	
	$debug = false;
	
	pre($_POST);
	#$array['v_rma'] = '';
	#$array['v_rma'] = $_POST[''];
	
	
	#FUNÇÃO QUE PEGA O ID DO CARA E RETORNA O TIPO DE RMA DELE;
	function tipo_rma ( $i ) {
	
		return 'REV';
		
	}
	
	function codped($codbarra) {
	
		$codped = $bd->gera_array('MAX(codcb) as maxcb, codped from codbarra where codbarra ='.$codbarra.' and codbarraped = 1 HAVING maxcb = codcb');
		pre($codped);
		if ($debug) echo $bd->get_sql();
		
		return $codped[0]['codped'];
		
	}
	
	function empresa_origem ( $cb, $codprod, $codemp, $codped, $idop_sn_orig) {

			$bd = new bd();

			$cb_orig = $cb; //this->prods[$this->codped]['codbarra'];

			$codprod_orig = $codprod; //$this->prods[$this->codped]['codprod'];

			$codemp_orig = $codemp; //$this->prods[$this->codped]['codemp'];

			$codped_orig = ($codped=='')?0:$codped;

			$i = 0;

			while(!$fl){
				
				//$res = $bd->gera_array("codoc, codcb, codemp, (SELECT codped_transf FROM oc WHERE codoc = codbarra.codoc ) as codped_transf, (select codfor from oc where codoc = codbarra.codoc) as codforn,(SELECT codemp FROM pedido WHERE codped = codped_transf ) as codemp_transf FROM codbarra WHERE codbarra.codbarra = '".$cb_orig."' and codprod = '".$codprod_orig."' and codemp = '".$codemp_orig."' and codped = '".$codped_orig."'");
				
				$res = $bd->gera_array("codoc, codcb, codemp, tipo_fab as tipo_prod,(SELECT codped_transf FROM oc WHERE codoc = codbarra.codoc ) as codped_transf, (SELECT codemp FROM pedido WHERE codped = codped_transf ) as codemp_transf, idop_sn, (select idop FROM op_sn WHERE idop_sn = codbarra.idop_sn) as idop_pesq , (select @codfor:=codfor FROM oc WHERE codoc = codbarra.codoc) as codforn, (select nome FROM fornecedor WHERE codfor = @codfor) as nomefor FROM codbarra WHERE codbarra = '".$cb_orig."' and codprod = '".$codprod_orig."' and  codemp = '".$codemp_orig."' and (codped = '".$codped_orig."' or idop_sn = '".$idop_sn_orig."') and not codcb in (select codcb from v_rma) limit 1");
				
				if ($debug) echo $bd->get_sql();
				
				//$array_orig[] = $res[0]	;
				if (is_array($res)) {
					$codped_orig = $res[0]['codped_transf'];
					$codemp_orig = $res[0]['codemp_transf'];
				}
				if ($res[0]['codped_transf'] == 0) { $fl = 1; } else { $i++; };
				
			}//WHILE
			if ($debug) echo '1.2.7';
			return $res;
	
	}
	

	if ($debug) echo '1';
	
	session_start();
	if ($debug) echo '1.1';
	$garantia = $_POST['gar'];
	if ($debug) echo '1.2';

	$ori = empresa_origem($_POST['codbarra'],$_POST['codprod'],$_POST['codemp'],$_POST['codped'],$_POST['idop_sn']);

	$revenda = $_SESSION['id'];
	$tipo = $_POST['tipo'];

	$laudo_rma = $_POST['revenda'];
	$idstatus = ($_POST['gar'])?1:14; // status 1: ABERTO, 14: SEM GARANTIA
	$idstatus = ($_POST['idstatus'])?$_POST['idstatus']:$idstatus;

	$tipo_fab = $ori[count($origem)-1]['tipo_prod'];

	function disponivel ($codprod) {
	
		$res_dis = $bd->gera_array('COUNT(codbarra) as dis from codbarra where codprod = "'.$_POST['codprod'].'" and codbarraped <> 1 and (codemp = 14 or codemp = 15) and tipo_fab = "'.$tipo_fab.'"');
		
		return $res_dis[0]['dis'];
	
	}
	#codbarra,codprod,codcb,codoc,'I',tipo_prod(PV),codemp,codforn,nf,datanf,modo_nf
	$array['v_rma@codbarra'] = $_POST['codbarra'];
	$array['v_rma@codprod'] = $_POST['codprod'];
	$array['v_rma@codcb'] = $_POST['codcb'];
	$array['v_rma@codcb_ent'] = $_POST['codcb_ent'];
	$array['v_rma@codoc'] = $_POST['codoc']; //($ori[count($ori)-1]['codoc'])?$ori[count($ori)-1]['codoc']:$_POST['codoc'];
	$array['v_rma@codped'] = $_POST['codped'];
	$array['v_rma@idstatus'] = $idstatus;
	$array['v_rma@idlaudo'] = $_POST['laudos'];
	$array['v_rma@tipo_rma'] = $tipo;
	$array['v_rma@tipo_prod'] = ($ori[count($ori)-1]['tipo_prod']=='P')?'P':'V';//($tipo_prod=='')?'V':$tipo_prod;
	$array['v_rma@codvend'] = $revenda;
	$array['v_rma@codemp'] = $_POST['codemp']; //($ori[count($ori)-1]['codemp'])?$ori[count($ori)-1]['codemp']:$_POST['codemp']; //
	$array['v_rma@codforn'] = $_POST['codforn']; //($ori[count($ori)-1]['codforn'])?$ori[count($ori)-1]['codforn']:$_POST['codforn']; //
	$array['v_rma@preco_in'] = str_replace(',','.',$_POST['preco']);
	$array['v_rma@preco_icms'] = str_replace(',','.',$_POST['icms']);
	$array['v_rma@preco_ipi'] = str_replace(',','.',$_POST['ipi']);
	$array['v_rma@laudo_rma'] = $laudo_rma;
	$array['v_rma@flag_garantia'] = $garantia;
	$array['v_rma@flag_disponivel'] = ($_POST['disp']>0)?1:0;
	$garant = explode('/',$_POST['garant']);
	$array['v_rma@garantia'] = $garant[2].'-'.$garant[1].'-'.$garant[0];

	$bd->insere($array);
	#echo "ori\n";
	#echo "\npost\n";	
	#echo "\nsql\n";
	#$debug = true;
	pre($bd->get_debug());
	
	//$res = $bd->gera_array('idrma','v_rma','codbarra = '.$array['v_rma@codbarra'].' AND codped ='.$array['v_rma@codped'].' AND codprod = '.$array['v_rma@codprod'].' LIMIT 1 DESC');
	
	//$bd->
?>