<?	
	$b = new bd();
	$b->altera($_POST);
	
	$result[erro] = 0;

	$json = new Services_JSON();
	$data = $json->encode($result);

	echo $data;
	echo $b->get_sql();
?>