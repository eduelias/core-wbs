<?php

	//Cria a página
	$pagina = new pagina("campos","Listagem de campos");
	
	$tab = 'frm_campo_formulario';// JOIN frm_formulario ON frm_formulario.idformulario = frm_campo_formulario.idformulario';
	$idtab = 'idcampo_formulario';
	$con = "TRUE";
	$titulo = "Listagem de Campos";

	//Seta o elemento grid na página
	$pagina->setGrid("frm_campo_formulario.*,(select titulo from frm_formulario where idformulario = frm_campo_formulario.idformulario) as titulo",$tab,$con,"Listagem de Campos",$idtab,"frm_campo_formulario");
	$pagina->grid->addInsert(5);
	$editar = true;
	//Adiciona as colunas açoes e eventos 
	$pagina->grid->AddColuna('idcampo_formulario', "ID", "Number", "10", "", 'false');
	$pagina->grid->AddColuna('titulo', "Form", "string", "150","");
	$pagina->grid->AddColuna('label','Label',"string","100","'textbox'");
	$pagina->grid->AddColuna('tipo','Tipo',"string","40","'textbox'");
	$pagina->grid->AddColuna('tamanho','Px',"Number","18","'textbox'");
	$pagina->grid->AddColuna('tabela_master','Tb Principal',"string","160","'textbox'");
	$pagina->grid->AddColuna('tabela_master_campo','Campo chave',"string","140","'textbox'");
	$pagina->grid->AddColuna('dica','Dica',"string","100",($editar)?"'textbox'":"");
	//$pagina->grid->AddColuna('tabela_detalhe','Tb Det',"string","",($editar)?"'textbox'":"");
	//$pagina->grid->AddColuna('tabela_campo_detalhe','Campo lista',"string","",($editar)?"'textbox'":"");
	$pagina->grid->AddColuna('elname','Nome HTML',"string","100",($editar)?"'textbox'":"");
	//$pagina->grid->AddColuna('elid','ID HTML',"string","130",($editar)?"'textbox'":"");
	//$pagina->grid->AddColuna('style','estilo',"string","80",($editar)?"'textbox'":"");
	$pagina->grid->AddColuna('js','JS',"string","100",($editar)?"'textbox'":"");
	//$pagina->grid->AddAcao("view", "modules/seguranca/modulo_has_menu.php");
	//$pagina->grid->AddAcao("edit_off", "modules/seguranca/usuarios.php&formid=3");
	//$pagina->grid->AddAcao("open_form", "5");
	//$pagina->grid->width = '37em';
	//$pagina->grid->AddAcao("delete", "modulos/permissao/excluiarquivo.php");
	//$pagina->grid->AddEvento("Excluir", "_excluir()");
	//$pagina->grid->AddColuna("checked", "ON", "truefalse", "1em", "","","false","YAHOO.widget.DataTable.formatSimNao");
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid();
	$pagina->imprime();
	//include("modulos/permissao/template/listaacessogrp.php");



?>