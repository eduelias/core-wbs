<?

	$bd = new bd();

	$res = $bd->gera_array('(select qtde-reserva from estoque where codprod = "'.$_GET['codprod'].'" AND codemp = '.$_GET['codemp'].') as qtde, nomeprod from produtos where codprod = '.$_GET['codprod']);

	echo json($res[0]);

?>