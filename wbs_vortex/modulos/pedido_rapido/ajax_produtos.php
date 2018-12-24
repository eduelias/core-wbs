<?php
	$bd = new bd();
	
	$ret['e']['no'] = 0;
	
	$ret['e']['msg'] = 'Sucesso';
	
	switch ($_GET['action']){
		
		case ('ean'):{
			
			$res = $bd->gera_array('chkcb,codprod,nomeprod,pvv as preco','produtos','codbarra = "'.$_GET['ean'].'"');			
			
			$ret['produto'] = $res[0];
			
			if (!is_array($res)) die(json(array('e'=>array('no'=>16,'msg'=>'Favor cadastrar este produto','debug'=>array('produtos'=>$bd->get_sql())))));
			
			$res2 = $bd->gera_array('qtde','estoque','codprod = "'.$res[0]['codprod'].'" and codemp = 15');
			
			if ($res2[0]['qtde'] == 0) die(json(array('e'=>array('no'=>20,'msg'=>'Quantidade Insuficiente no estoque','debug'=>array('estoque EAN'=>$bd->get_sql())))));
			
			$ret['debug'] = array('estoque EAN'=>$bd->get_sql());
			
			$ret['ean'] = ($res[0]['chkcb']=='Y')?'false':'true';
			
		};break;
		
		case ('sn'):{
			
			$res = $bd->gera_array('codbarra','codbarra','codbarra = "'.$_GET['sn'].'" and codprod = "'.$_GET['codprod'].'"');
			
			if (!is_array($res)) die(json(array('e'=>array('no'=>25,'msg'=>'Serial Number inexistente','debug'=>$bd->get_sql()))));
			
			$res3 = $bd->gera_array('codbarraped','codbarra','codbarra = "'.$_GET['sn'].'" and codemp = 15');
			
			if (!is_array($res3) or ($res3[0]['codbarraped'] == '1')) die(json(array('e'=>array('no'=>36,'msg'=>'Quantidade Insuficiente no estoque','debug'=>array('estoque SN'=>$bd->get_sql(),'cbp'=>$res3[0]['codbarraped'])))));
			
			$ret['debug'] = array('Estoque SN'=>$bd->get_sql(),'cbp'=>$res3[0]['codbarraped']);
			
			$ret['ok'] = true;
			
		};break;
		
		default:{
			
		};break;
		
	}
	
	echo json($ret);
?>