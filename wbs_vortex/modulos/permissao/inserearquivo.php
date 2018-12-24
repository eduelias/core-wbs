<?
	$dados = new bd();
	$result[erro] = $dados->insere($_POST);
	$result[records] = $dados->gera_array('*',$dados->get_tabela(),'TRUE');
	
	$json = new Services_JSON();
	$data = $json->encode($result);

	echo $data;
?>