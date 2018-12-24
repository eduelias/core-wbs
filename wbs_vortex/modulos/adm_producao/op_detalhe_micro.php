<?
	$ubd = new bd();
	$idop = $ubd->gera_array('idop','op','codprod = '.$_GET[id].' ORDER BY idop LIMIT 1');

	$pagina = new pagina("detail_micro");
	$pagina->setGrid("produtos.nomeprod as nomeprod, op_prod.qtde as qtde, op.idop as idop, op_prod.codprod as codprod, idop_prod as id, idop_prod","op_prod JOIN produtos ON op_prod.codprod = produtos.codprod  JOIN op ON op_prod.idop = op.idop", "op.codprod = ".$_GET['id']." AND op_prod.idop = ".$idop[0]['idop'], "Produtos do Micro COD:".$_GET[id],"idop_prod","op_prod");
	
	//Adiciona as colunas açoes e eventos 
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("codprod", "Cod", "Number", "1.4em", "''");
	$pagina->grid->AddColuna("nomeprod", "Produto", "date", "30em");
	$pagina->grid->AddColuna("qtde", "QTDE", "String", "2em","''");
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('15', false);
	$pagina->imprime();
?>