<?php
	$bd = new bd();

	$action = $_GET['action'];
	
	$ret['debug']['post'] = $_POST;
  
  	$ret['debug']['get'] = $_GET;

  	switch ($action) {
  		
		case 'searchprod': {
			
			$res = $bd->gera_array('codprod,nomeprod','produtos','codprod = '.$_GET['id']);
  
  			$ret['debug']['prod_sql'] = $bd->get_sql();
			
		}; break;
		
		
		case 'changeprod': {
			
			$res = $bd->gera_array('codcb','pedidoprod','codprod = '.$_GET['id']. ' AND codped = '.$_GET['codped']);
			
			$ret['debug']['cbs'] = $bd->get_sql();
			
			if ($res[0]['codcb'] == '') {
				
				$alt2['cond@pedidoprod@codprod'] = $_GET['id'];
				$alt2['cond@pedidoprod@codped'] = $_GET['codped'];
				$alt2['pedidoprod@codprod'] = $_GET['novoid'];
				
				$bd->altera($alt2);
				$ret['debug']['changecproddireto']= $bd->get_sql();
				
				$res = $bd->gera_array('codprod,nomeprod','produtos','codprod = '.$_GET['id']);
  
  				$ret['debug']['prod_sql'] = $bd->get_sql();
				
			} else {
				
				$cb = explode (':',$res[0]['codcb']);
				
				foreach ($cb as $c => $b) {
					
					$alt['cond@codbarra@cb'] = $b;
					$alt['codbarra@codbarraped'] = '';
					$alt['codbarra@codped'] = '';
					
					$bd->altera($alt);
					$ret['debug']['retcb'][] = $bd->get_sql();
				}
				
				$alt2['cond@pedidoprod@codprod'] = $_GET['id'];
				$alt2['cond@pedidoprod@codped'] = $_GET['codped'];
				$alt2['pedidoprod@codcb'] = '';
				$alt2['pedidoprod@codprod'] = $_GET['novoid'];
				
				$bd->altera($alt2);
				$ret['debug']['prodcb']= $bd->get_sql();
				
				$alt3['cond@pedido@codped'] = $_GET['codped'];
				$alt3['pedido@cb'] = 'NO';
				$alt3['pedido@modped'] = 'OK';
				$bd->altera($alt3);
				$ret['debug']['pedido']= $bd->get_sql();
				
				$res = $bd->gera_array('codprod,nomeprod','produtos','codprod = '.$_GET['id']);
  				$ret['debug']['prod_sql'] = $bd->get_sql();
				
			}
			
			
		};break;
		
		default: {
			
		
		};break;
		
  	}
  	
  	$ret['pload'] = $res;

  	echo json($ret); 
  
?>