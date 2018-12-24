<?php
	session_start();
	header('Content-type: application/json; charset=iso-8859-1');
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Accept-Encoding: gzip, deflate");
	$login = new login($_SESSION);
	$path = realpath($_GET['path']);
	
	if ($_GET['data_i'] == 'load'){
		
		$msg = 'Escolha um per&iacute;odo';
		
	} else {
		
		$bd = new bd();
		
		$wheredata = 'EXTRACT(YEAR_MONTH FROM ocprod.datanf) = EXTRACT(YEAR_MONTH FROM "'.$_GET['data_i'].'")';
		
		if ($_GET['data_i'] == '0000-00-01')
		{
			$wheredata = 'ocprod.datanf = "0000-00-00"';
		}
		
		$res = $bd->gera_array("codpoc, date_format(oc.datacompra, '%d/%m/%Y') as dataoc, ocprod.codoc as codoc, fornecedor.nome as nome, ocprod.codprod as codprod, ocprod.qtderec as qtderec, pcu, ocprod.numnf as numnf, ocprod.datanf as datanf, st1, st2, ocprod.ipi as ipi, ocprod.v_icms as v_icms, v_despesas, v_frete, v_icms_frete, ocprod.v_seguro as v_seguro,chk, ocprod.icms as icms, ocprod.tipo_nf as tiponf, (SELECT SUM( (qtderec * pcu
) + ( qtderec * ( ipi /100 ) ) + st1 ) FROM ocprod WHERE codoc = oc.codoc) AS voc","oc,ocprod,fornecedor", 'ocprod.codoc = oc.codoc AND fornecedor.codfor = oc.codfor AND oc.codemp = 14 AND '.$wheredata.'order by ocprod.datanf ASC');
		
		$dbg = $bd->get_debug();
		
	}
	
	$a['erro'] = ($login->checklogin())?0:1;
	$a['msg'] = $msg;
	$a['debug'] = $dbg;
	$a['totalRecords'] = count($res);
	$a['records'] = $res;
	
	echo json($a);
?>