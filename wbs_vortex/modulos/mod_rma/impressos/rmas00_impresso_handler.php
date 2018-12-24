<?
	
	$bd = new bd();
	
	$res = $bd->gera_array('tipo from v_rma_pct where idrmapct = '.$_GET[id]);
	
	@$tipo = $res[0][tipo];
	
	switch ($tipo) {
		
		case '1':{
	
			include('');	
		
		}break;
		case '2':{
	
			include('');	
		
		}break;
		case '3':{
	
			include('modulos/mod_rma/impressos/rmas06_transferencia.php');	
		
		}break;
		case '4':{
	
			include('');	
		
		}break;
		case '5':{
	
			include('modulos/mod_rma/impressos/rmas02_entrada_interna.php');	
		
		}break;
		
	
	}

?>