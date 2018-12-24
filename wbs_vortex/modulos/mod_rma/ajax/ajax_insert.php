<?
	switch ($_GET[act]) {
		case ('REV'): {
			$bd = new bd();
			$res = $bd->gera_array('oc.codoc as codoc, codfor,oc.codemp as codemp,IF(tipo_fab="P","P","V") as tipo_prod from codbarra,oc where codbarra.codoc = oc.codoc AND codbarra.codcb = '.$_POST[codcb]);
			
			$debug = $bd->get_debug();
		
			$array = $_POST;
			$array[codvend] = $_SESSION[id];
			$array[codforn] = $res[0][codfor];
			$array[codoc] = $res[0][codoc];
			$array[codemp] = $res[0][codemp];
			$array[tipo_prod] = $res[0][tipo_prod];
			$array[idstatus] = ($array[tipo_rma]=='I')?17:(($array[flag_garantia]!=1)?14:1);
			$array[flag_disponivel] = (($array[disponivel]+1)<=1)?0:1;
			$array[preco_in] = str_replace(',','.',$array[preco_in]);
			$array[preco_icms] = str_replace(',','.',$array[preco_icms]);
			$array[preco_ipi] = str_replace(',','.',$array[preco_ipi]);
			$garant = explode('/',$array[garantia]);
			$array[garantia] = $garant[2].'-'.$garant[1].'-'.$garant[0];
			
			
			foreach ($array as $k => $v) {
				if (($k!='disponivel') and ($k!='nomeprod')) {
					$ins['v_rma@'.$k] = $v;
				}
			}
			$bd->insere($ins);
		}break;
		case ('UPD'):{
			$array = $_POST;
			$ins['cond@v_rma@idrma']  = $_GET[idrma];
			foreach ($array as $k => $v) {
				if (($k!='disponivel') and ($k!='nomeprod')) {
					$ins['v_rma@'.$k] = $v;
				}
			}
			#pre($ins);
			$bd->altera($ins);
		}
		default:{
		
		}
	}			
	#$bd->insere($ins);
	pre($bd->get_sql());
?>