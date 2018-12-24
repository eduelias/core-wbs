<?php

	//Cria a página
	$pagina = new pagina("forms", 'Lista de Formul&aacute;rios');

	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel();
	
	//$id = $_GET['recordID'];
	//$editar = true;//($login->permissoes(1,'editar'))?true:false;
	//$deletar = true; //($login->permissoes(1,'deletar'))?true:false;
	//$inserir = true; //($login->permissoes(1,'inserir'))?true:false;

	//Seta o elemento grid na página
	$pagina->setGrid("*",'frm_formulario','TRUE',"Listagem de Formulários",'idformulario','frm_formulario');
	$pagina->grid->addInsert(4);
	//Adiciona as colunas açoes e eventos 
	$pagina->grid->AddColuna('idformulario',"ID",'number','10','','');
	$pagina->grid->AddColuna('nome', "Form Name", "string", "150","'textbox'");
	$pagina->grid->AddColuna('titulo', "Legenda", "string", "150","'textbox'");
	$pagina->grid->AddColuna('mth', "M&eacute;todo", "string", "40","'textbox'");
	$pagina->grid->AddColuna('action', "A&ccedil;&atilde;o", "string", "290","'textbox'");
	//$pagina->grid->AddColuna('style', "Estilo", "string", "90","'textbox'");
	$pagina->grid->AddColuna('js', "JScript", "string", "280","'textbox'");
	$pagina->grid->AddColuna('cap_submit', "Bt Submit", "string", "78","'textbox'");
	$pagina->grid->AddColuna('cap_reset', "Bt Reset", "string", "78","'textbox'");
	//$pagina->grid->AddAcao("view", "modules/seguranca/modulo_has_menu.php");
	//$pagina->grid->AddAcao("edit_off", "modules/seguranca/usuarios.php&formid=3");
	$pagina->grid->AddAcao("det_tab", "modulos/formularios/grid_field.php", array(modulo=>'forms', campo=>'idformulario'));
	//$pagina->grid->AddAcao("open_form", "4");
	//$pagina->grid->height = '35.1em';
	//$pagina->grid->AddAcao("delete", "modulos/permissao/excluiarquivo.php");
	//$pagina->grid->AddEvento("Excluir", "_excluir()");
	//$pagina->grid->AddColuna("checked", "ON", "truefalse", "1", "","","false","YAHOO.widget.DataTable.formatSimNao");
	//Carrega o grid no array $pagina->data*/
	$pagina->loadGrid();
	$pagina->imprime();
	//include("modulos/permissao/template/listaacessogrp.php");



?>