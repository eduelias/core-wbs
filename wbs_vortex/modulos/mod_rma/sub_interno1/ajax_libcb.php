<?

	$bd = new bd();

	$cod = explode('%',$_GET['condicao']);
	$res = $bd->gera_array("codemp,codbarra.codprod as cbprod, codbarra.codprod as codprod,codcb as codcb_ent,codbarra.codbarra,nomeprod, codcb as em_garantia", "codbarra,produtos", "codbarra.codprod = produtos.codprod and chkcb <> 'Y' and codbarraped <> 1 AND codbarra.codprod = ".$cod[1]." and not codcb in (select codcb_ent from v_rma where v_rma.codprod = cbprod) and ((codemp=14) or (codemp=15)) GROUP BY codemp");
	
	$ret['records'] = $res;
	$ret['totalRecords'] = count($res);
	$ret['msg'] = 'GRID PARA PRODUTOS LIBCB NA LF OU F&Aacute;BRICA';
	$ret['erro'] = 0;
	
	if ($_SESSION[debug]) $ret['debug'] = $bd->get_debug();
	
	echo json($ret);

?>