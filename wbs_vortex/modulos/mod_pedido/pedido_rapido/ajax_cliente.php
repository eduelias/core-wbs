<?php

	$bd = new bd();
	
	switch ($_GET['action']) {
		
		case ('cidades'):{
			
			if(isset($_GET['uf']))
				$arr = $bd->gera_array('nome','tb_cidades','uf = "'.$_GET['uf'].'"');
				
			$ret['cidades'] = $arr;
			
			$ret['debug'] = $bd->get_sql();
			
		}break;
		
		case ('insere'): {
			
			$bd->insere($_GET['c']);
			
			$ret['debug'] = $bd->get_sql();

			if (isset($_GET['c']['clientenovo@cpf']) and $_GET['c']['clientenovo@cpf'] != '') {
				$arr = $bd->gera_array('codcliente,nome,cpf,cnpj,endereco,numero,complemento,cidade,estado','clientenovo','cpf = "'.$_GET['c']['clientenovo@cpf'].'"');
			} else {
				$arr = $bd->gera_array('codcliente,nome,cpf,cnpj,endereco,numero,complemento,cidade,estado','clientenovo','cnpj = "'.$_GET['c']['clientenovo@cnpj'].'"');
				
			}
			
			$ret = $arr[0];
				
			$ret['end'] = $arr[0]['endereco'].', '.$arr[0]['numero'].'/'.$arr[0]['complemento'];
			
			$ret['cadastrado'] = true;

		}break;
	
		case 'cpf': {

			$arr = $bd->gera_array('codcliente,nome,cpf,cnpj,endereco,numero,complemento,cidade,estado','clientenovo','cpf = "'.$_GET['cpf'].'"');
			
			if (!is_array($arr)) $ret['cadastrado'] = false;
			else {
								
				$ret = $arr[0];
				
				$ret['end'] = $arr[0]['endereco'].', '.$arr[0]['numero'].'/'.$arr[0]['complemento'];
				
				$ret['cadastrado'] = true;
			}
			
			
		}; break;
		
		case ('cnpj'): {
			
			$arr = $bd->gera_array('codcliente,nome,cpf,cnpj,endereco,numero,complemento,cidade,estado','clientenovo','cnpj = "'.$_GET['cnpj'].'"');
			
			if (!is_array($arr)) $ret['cadastrado'] = false;
			
			else {
								
				$ret = $arr[0];
				
				$ret['end'] = $arr[0]['endereco'].', '.$arr[0]['numero'].'/'.$arr[0]['complemento'];
				
				$ret['cadastrado'] = true;
			}
			
			
		}; break;
		
		default:{
			$ret['msg'] = 'ERRO';
      $ret['debug'] = $_GET;
		}
		
	}
	
	echo json($ret);

?>