<?php
	$idrma = $_POST['idrma'];
	
	$bd = new bd();
	
	//TODO: SECAO - USUARIO QUE USOU O COMANDO

	$bd->send_sql('UPDATE v_rma SET idstatus = 24 WHERE idrma = '.$idrma);
	
	$res = $bd->gera_array('codcb_ent,codprod','v_rma','idrma='.$idrma);
	//pre($bd->get_debug());
	
	$res1 = $bd->gera_array('codemp','codbarra','codcb='.$res[0][codcb_ent]);
	//pre($bd->get_debug());
	
	$codemp = $res1[0][codemp];
	$codprod = $res[0][codprod];
	$codcb_ent = $res[0][codcb_ent];
	
	$bd->send_sql('UPDATE codbarra SET codbarraped=0,codped="",idrma="" WHERE codcb = '.$codcb_ent);
	#pre($bd->get_debug());
	
	$bd->send_sql('UPDATE estoque SET qtde=qtde+1 WHERE codprod = '.$codprod.' AND codemp = '.$codemp);
	#pre($bd->get_debug());

	echo '{erro:0}';
?>