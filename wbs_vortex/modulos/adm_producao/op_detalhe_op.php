<?
	$pagina = new pagina("op_detail");
	$pagina->setGrid("op.codemp, (op.qtde * op_prod.qtde) AS total, (estoque.qtde - (op.qtde * op_prod.qtde)) as disp, produtos.nomeprod as nomeprod, op_prod.qtde as qtde, op.idop as idop, op_prod.codprod as codprod, idop_prod as id, idop_prod","op_prod JOIN produtos ON op_prod.codprod = produtos.codprod  JOIN op ON op.idop = op_prod.idop JOIN estoque ON op_prod.codprod = estoque.codprod AND estoque.codemp = op.codemp", "op.idop = ".$_GET['id'], "Produtos da OP","idop_prod","op_prod");
	
	//Adiciona as colunas açoes e eventos 
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("codprod", "Cod", "Number", "1.4em", "''");
	$pagina->grid->AddColuna("nomeprod", "Produto", "date", "30em");
	$pagina->grid->AddColuna("qtde", "QTDE", "String", "2em","''");
	$pagina->grid->AddColuna("total", "Ttl", "Number", "1em","''");
	$pagina->grid->AddColuna("disp", "Dsp", "Number", "1em","''");
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('15', false);
	$pagina->imprime();
?>