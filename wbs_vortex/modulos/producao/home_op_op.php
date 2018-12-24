<?
	//Cria a página
	$pagina = new pagina("producao1");
	
	//Adiciona o cpanel no array $pagina->data
	$pagina->addCpanel();
	
	//Seta o elemento grid na página
	$pagina->setGrid("codprod,codprod AS cod, nomeprod as nomem, descres","produtos", "hist = \'\' ORDER BY codprod", "Lista de Produtos","codpg","seguranca");
	
	//Adiciona as colunas açoes e eventos 
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("codprod", "", "", "1.4em", "''", "","true","YAHOO.widget.DataTable.formatCheck");
	$pagina->grid->AddColuna("cod", "Cod", "int", "2em", "''");
	$pagina->grid->AddColuna("nomem", "Nome", "string", "40%", "'textbox'");
	$pagina->grid->AddColuna("descres", "Descrição", "string", "50%", "'textarea'");
	
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('50');
	$pagina->imprime();
?>