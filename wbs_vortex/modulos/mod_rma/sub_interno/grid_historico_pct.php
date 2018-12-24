<? 
	#					Cria a página
	$pagina = new pagina("rma_historico_pacotes","PACOTES EM HISTORICO");

	#					Seta o elemento grid na página
	$pagina->setGrid("idrmapct as id, idrmapct,(select nome from clientenovo where clientenovo.codcliente = short_desc limit 1) as short_desc, DATE_FORMAT(data,\'%d/%m/%Y %T\') as data, DATE_FORMAT(data_nf_e,\'%d/%m/%Y\') as data_nf_e, nf_e, (select COUNT(*) from v_rma_pctrma WHERE v_rma_pctrma.idrmapct = v_rma_pct.idrmapct) as produtos,(select MIN(idstatus) from v_rma where idrma in (select idrma from v_rma_pctrma where idrmapct = id)) as sts","v_rma_pct","v_rma_pct.tipo = 2 AND hist = \'S\'","v_rma_pct","idrmapct","v_rma_pct");
	$pagina->grid->set_rowformatter('WBS.modulo.rowFormatter');	
	$pagina->AddPesquisa($pagina->grid->addPesquisa('idrmapct','PCT').$pagina->grid->addPesquisa('data','DATA PCT'));
	
	#                   ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")

	$pagina->grid->AddColuna("idrmapct", "PCT", "Number", "15", "''", 'central');
	$pagina->grid->AddColuna("data", "DATA DO PACOTE", "String", "180", "''", 'central');
	$pagina->grid->AddColuna("short_desc", "REVENDA", "String", "300", "''", 'central');
	$pagina->grid->AddColuna("nf_e", "NF", "Number", "90", "'textbox'", 'central');
	$pagina->grid->AddColuna("data_nf_e", "DATA NF", "String", "80", "''", 'central');
	$pagina->grid->AddColuna("produtos", "QTD", "Number", "20", "", 'central');
	
	$pagina->grid->AddAcao("det_tab", "modulos/mod_rma/sub_interno/grid_hist_itens_pct.php", array('modulo'=>'tab_rma_revenda','campo'=>'idrmapct', tamanho=>15));

	$pagina->loadGrid('10');
	$pagina->imprime();
?>