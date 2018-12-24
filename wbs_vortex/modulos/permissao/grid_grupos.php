<?
	$pagina = new pagina("listaGrupo","Grupos");
	
	//Seta o elemento grid na página
	$pagina->setGrid("codgrp,nomegrp,habilitado,hsenha","segurancagrp", "TRUE", "Lista de Grupos","codgrp", 'segurancagrp');
	$pagina->grid->addInsert('29'); 
	//Adiciona as colunas açoes e eventos 
	$pagina->grid->AddColuna("codgrp", "COD", "string", "25", "", 'td_bold_center');
	$pagina->grid->AddColuna("nomegrp", "Nome do GRP", "string", "600", "'textbox'");
	$pagina->grid->AddAcao('enum_sn','',array('arquivo'=>'ajax_altera.php','campo'=>'habilitado', head=>'HAB'));
	$pagina->grid->AddAcao('enum_sn','',array('arquivo'=>'ajax_altera.php','campo'=>'hsenha', head=>'PWD'));
	$pagina->grid->AddAcao("det_tab", "modulos/permissao/grid_acesso_grupos.php", array('modulo'=>'Permissao','campo'=>'codgrp',head=>'VER'));
	$pagina->AddObj($pagina->grid->addPesquisa('codgrp','COD').$pagina->grid->addPesquisa('nomegrp','Nome'));
	$pagina->loadGrid('10');

	$pagina->imprime();
?>
