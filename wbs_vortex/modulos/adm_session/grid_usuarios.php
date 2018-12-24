<?
	//Cria a página
	$pagina = new pagina("SVN_ADM","Usuários Online");

	//Seta o elemento grid na página
	$pagina->setGrid("campo", "obj", "condicao", " "," "," ","");
	$pagina->grid->setsource('modulos/adm_session/ajax_opensess.php?',false);
	
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddAcao('kill_user', '', array('campo'=>'file_id', 'head'=>'KILL', tamanho=>'20'));
	$pagina->grid->AddColuna("usuario", "USER", "String", "60", "''", 'central');
	$pagina->grid->AddColuna("aaa", "GRP", "String", "50", "''", 'central');
	$pagina->grid->AddColuna("BIRTH", "Refresh", "String", "100", "''", 'central');
	$pagina->grid->AddColuna("IP", "IP", "String", "60", "''", 'central');
	$pagina->grid->AddColuna("browser", "Browser", "String", "80", "''", 'central');
	//$pagina->grid->AddColuna("file_id", "PHPSESSID", "String", "100", "''", 'central');
	
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('60');
	$pagina->imprime();

?>