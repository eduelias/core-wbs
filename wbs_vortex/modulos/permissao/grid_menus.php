<?
	//$grid = new geraGrid("seguranca", "TRUE", "Lista de arquivos","codpg");
	
	//Cria a página	
	$pagina = new pagina("listaMenus","Menus do sistema");
	

	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel();


	//Seta o elemento grid na página
	$pagina->setGrid("*,codmenu AS cod","seguranca_menu", "TRUE", "Dados do menu", "codmenu", "seguranca_menu");
	$pagina->grid->addInsert('28');
	//Adiciona as colunas açoes e eventos 
	$pagina->grid->AddColuna("cod", "Cod", "string", "20", "","td_bold_center");
	$pagina->grid->AddColuna("menu", "Menu", "string", "560", "'textbox'");
	$pagina->grid->AddAcao("image_src", '',array(campo=>image,tamanho=>32,editor=>"'textbox'"));
	$pagina->grid->addAcao('enum_sn', 'ajax_altera.php', array(campo=>'habilitado'));
	$pagina->grid->AddAcao("edit", "modulos/permissao/forms/form_segurancamenu.php", array(campo=>'codmenu'));
	$pagina->grid->AddAcao("delete", "modulos/permissao/excluiarquivo.php", array(campo=>'codmenu'));
	$pagina->grid->AddEvento("Excluir", "_excluir()");
	$pagina->addObj($pagina->grid->addPesquisa('codmenu','COD_MENU').$pagina->grid->addPesquisa('menu','Menu'));
	$pagina->loadGrid();
	
//	include("modulos/permissao/template/listagrupo.php");
	$pagina->imprime('segurancagrp');
?>