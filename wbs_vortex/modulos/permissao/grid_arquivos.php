<?
	//Cria a página
	$pagina = new pagina("listaArquivo","Lista de arquivos do Sistema");

	//Seta o elemento grid na página
	$pagina->setGrid("codpg, cor, codmenu, visivel, nomem, arquivo, manutencao, senha, novo, habilitado, actionpg, modulo, (SELECT menu FROM seguranca_menu WHERE seguranca_menu.codmenu = seguranca.codmenu) AS menu","seguranca", "TRUE", "Lista de arquivos","codpg","seguranca","",'1600');
	$pagina->AddPesquisa($pagina->grid->addPesquisa('codpg','CODPG').$pagina->grid->addPesquisa('nomem','Nome').$pagina->grid->addPesquisa('arquivo','Arquivo'));
	//Adiciona as colunas açoes e eventos 
	//$pagina->grid->AddColuna("codpg", "", "checkbox", "1em", "center","", "'checkbox'");
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->addInsert('24');
	//$
	
	$pagina->grid->AddColuna("codpg", "Cod", "String", "24", "''", 'td_bold');
	//$pagina->grid->AddColuna("cod", "Cd", "String", "10", "", "'td_bold'","false","'checkbox'");
	$pagina->grid->AddColuna("nomem", "Nome", "String", "300", "'textbox'");
	$pagina->grid->AddColuna("arquivo", "Arquivo", "String", "200","'textbox'", 'td_bold');
	$pagina->grid->AddColuna("menu", "Menu", "", "100");
	$pagina->grid->AddColuna("cor", "Cor", "String", "100", "'textbox'");
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'habilitado', 'head'=>'HAB'));
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'senha', 'head'=>'PWD'));
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'manutencao', 'head'=>'MNT'));
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'visivel', 'head'=>'VIS'));
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'novo', 'head'=>'NEW'));
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'actionpg', 'head'=>'INI'));
	$pagina->grid->AddAcao('enum_sn', '', array(arquivo=>'ajax_altera.php','campo'=>'modulo', 'head'=>'MOD'));
	$pagina->grid->AddAcao("edit","modulos/permissao/forms/form_arquivo_alt.php", array(campo=>'codpg', tamanho=>32));
	
	
	//$pagina->addCpanelOff('Pesquisar',$pagina->grid->addPesquisa('codpg','Código'));
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('10');
	$pagina->imprime();
	//include("modulos/permissao/template/listaarquivo.php");

?>