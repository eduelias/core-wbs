<?
	$ids = $_GET[id];
	$tab = $_GET[table];

	$json = new Services_JSON();
	$ids = $json->decode($ids);
	
	
		$s = new bd(); 
		
		//comentario

		$idz = $ids[0];
		$s->del($tab,$_GET['keyfield'],$ids);
		
		$result[sql] = $s->get_sql();
		$result[erro] = 0;
		$result[id] = $ids;

			
 $data = $json->encode($result);
 
 echo $data;
?>