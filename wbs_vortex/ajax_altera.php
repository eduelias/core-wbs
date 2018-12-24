<?

	$alter_bd = new bd();
	$codpg = $_GET['id1'];
	$codgrp = $_GET['id2'];
	
	if ($_GET['act'] == 'insrow') {
		
		$res = $alter_bd->send_sql('describe '.$_GET['tabela']);
		$arr = $res->getArray();
		pre($arr);
		$alter_bd->send_sql('INSERT INTO '.$_GET['tabela'].' ('.$arr[1][1].') VALUES ("")');
		echo $alter_bd->get_sql();
		$ret = $alter_bd->gera_array('*',$_GET['tabela'],' TRUE ORDER BY '.$arr[0][0].' DESC LIMIT 1');
		echo $alter_bd->get_sql();
		pre($ret);
		exit();
		
	}

	switch ($_GET['tabela']) {
		case 'ponto_fnc_tem_faixa':{
			if ($_GET['field']=='existe'){
				if ($_GET['val']!='FALSE'){
					$alter_bd->send_sql('INSERT INTO ponto_fnc_tem_faixa (codfnc,codfaixa) values ('.$codgrp.','.$codpg.')');	
				} else {
					$alter_bd->send_sql('DELETE FROM ponto_fnc_tem_faixa WHERE codfnc = '.$codgrp.' AND codfaixa = '.$codpg);
				}
			} else {
				$campos = array ('cond@'.$_GET['tabela'].'@'.$_GET['keyfield']=>$_GET['id'],$_GET['tabela'].'@'.$_GET['field']=>$_GET['val']);
				print_r($campos);
				$alter_bd->altera($campos);
			}
			echo $alter_bd->get_sql();
		}
		break;
		case 'segurancaacesso':{
				$js = new joinseguranca();
			if ($_GET['val']!='FALSE'){
				$result = $js->cria_acesso($codpg,$codgrp);	
				echo 'gera';
			} else {
				$result = $js->retira_acesso($codpg,$codgrp);
				echo 'tira';
			}
			pre($js);
		}
		break;
		case 'op':{
			switch ($_GET['field']) {
				case 'idop':
				{
					$alter_bd->send_sql('INSERT INTO op (`codprod`,`codemp`,`datainicio`) VALUES ('.$_GET['id'].', 1, NOW())');
				}break;
				default:{
					$campos = array ('cond@'.$_GET['tabela'].'@'.$_GET['keyfield']=>$_GET['id'],$_GET['tabela'].'@'.$_GET['field']=>$_GET['val']);
					print_r($campos);
					$alter_bd->altera($campos);
				}
			}
			echo $alter_bd->get_sql();
		}
		break;
		case 'op_prod':{
			switch ($_GET['field']) {
				case 'idop_prod':
				{
					$alter_bd->send_sql('INSERT INTO op_prod (`codprod`,`idop`,`qtde`) VALUES ('.$_GET['id'].', '.$_GET['id2'].', 1)');
				}break;
				default:{
					$campos = array ('cond@'.$_GET['tabela'].'@'.$_GET['keyfield']=>$_GET['id'],$_GET['tabela'].'@'.$_GET['field']=>$_GET['val']);
					print_r($campos);
					$alter_bd->altera($campos);
				}
			}
			echo $alter_bd->get_sql();
		}
		break;
		default:{
			$campo = explode('-',$_GET['field']);
			$campos = array ('cond@'.$_GET['tabela'].'@'.$_GET['keyfield']=>$_GET['id'],$_GET['tabela'].'@'.$campo[0]=>$_GET['val']);
			print_r($campos);
			$alter_bd->altera($campos);
			echo $alter_bd->get_sql();
		}
}
?>