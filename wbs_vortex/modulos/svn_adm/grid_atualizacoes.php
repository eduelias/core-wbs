<?
	//Cria a página
	$pagina = new pagina("SVN_ADM","arquivos alterados");

	//Seta o elemento grid na página
	$pagina->setGrid("campo", "obj", "condicao", "Lista de arquivos","naoha","naoha","");
	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/svn_adm/ajax_updates.php'),"&path=/home/wbs/public_html/maxxmicro");
	
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddAcao('checkbox', '', array('campo'=>'path', 'head'=>'UP', tamanho=>'10'));
	$pagina->grid->AddAcao('svn_status', '', array('campo'=>'repos_text_status', 'head'=>'STS', tamanho=>'10'));
	$pagina->grid->AddAcao('form_diretorio', '', array('campo'=>'path', 'head'=>'CAMINHO', tamanho=>'240','sort'=>'true'));
	$pagina->grid->AddColuna("cmt_rev", "REVISAO", "String", "24", "''", 'central');
	$pagina->grid->AddColuna("cmt_author", "AUTOR", "String", "75", "''", 'central');
	
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('25');
	$pagina->imprime();

?>