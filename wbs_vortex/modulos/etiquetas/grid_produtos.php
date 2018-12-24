<?
	//Cria a página
	$pagina = new pagina("ETQ_ADM","descri&ccedil;&otilde;es");

	//Seta o elemento grid na página
	$pagina->setGrid("campo", "obj", "condicao", "Lista de arquivos","codprod","produtos","");
	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/etiquetas/ajax_retprod.php'),"&prods=false");
	
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	//$pagina->grid->AddAcao('codprod', '', array('campo'=>'path', 'head'=>'UP', tamanho=>'10'));
	//$pagina->grid->AddAcao('svn_status', '', array('campo'=>'repos_text_status', 'head'=>'STS', tamanho=>'10'));
	//$pagina->grid->AddAcao('form_diretorio', '', array('campo'=>'path', 'head'=>'CAMINHO', tamanho=>'240','sort'=>'true'));
	$pagina->grid->AddColuna("codprod", "COD", "String", "14", "''", 'central');
	$pagina->grid->AddColuna("nomeprod", "Nome", "String", "24", "''", 'central');
	$pagina->grid->AddColuna("descres", "DESC", "String", "75", "'textbox'", 'central');
	
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('25');
	$pagina->imprime();

?>