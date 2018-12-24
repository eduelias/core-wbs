<?php
	$bd = new bd;
	$debug = array();
	
	switch (true) {
		//tipo 6 = fornecedor
		case($_GET[tipo]=='6'):{
			
			$res = $bd->send_sql('update v_rma_pct set hist="S" where idrmapct = '.$_GET['id']);
			$debug[] = $bd->get_sql();
			
			$res = $bd->send_sql('update v_rma set idstatus = 20 where idrma in (select idrma from v_rma_pctrma where idrmapct = '.$_GET['id'].')');
			
			$debug[] = $bd->get_debug();
			
			$debug[tipo] = 'FORNECEDOR';
			
			$debug['error'] = 0;
			
			echo json($debug);
		}break;
		//compatibilidade: caso venha a mudar o envio de pacotes para esse arquivo, suporta o envio para revenda.
		default:{			
			$res = $bd->send_sql('update v_rma_pct set hist="S" where idrmapct = '.$_GET['id']);
			$debug[] = $bd->get_sql();
			
			$res = $bd->send_sql('update v_rma set idstatus = 9 where idrma in (select idrma from v_rma_pctrma where idrmapct = '.$_GET['id'].')');
			$debug[] = $bd->get_sql();
			
			$debug['error'] = 0;
			
			echo json($debug);
		}
	}
?>