<? 
	#					Cria a página
	$pagina = new pagina("rma_pacotes","PACOTES");

	#					Seta o elemento grid na página
	$pagina->setGrid("DISTINCT(v_rma_pct.idrmapct) as idrmapct,(select COUNT(v_rma_pctrma.idrma) from v_rma_pctrma where v_rma_pctrma.idrmapct = v_rma_pct.idrmapct) as produtos, vendedor.nome as vend,v_rma_status.descr as status, DATE_FORMAT(v_rma_pct.data,\'%d/%m/%Y %h:%i\') as data","v_rma_pct,v_rma_pctrma,v_rma,v_rma_status,vendedor","v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and v_rma.idrma = v_rma_pctrma.idrma and v_rma_pct.codvend = vendedor.codvend and v_rma.idstatus = v_rma_status.idstatus and (v_rma_pct.tipo = 5) AND (v_rma.idstatus = 18) AND NOT v_rma_pct.hist = \'S\' and v_rma_pct.codvend = ".$_SESSION[id],"v_rma_pct","idrmapct","v_rma_pct");
	$pagina->grid->set_rowformatter('myRowFormatter');	
	$pagina->AddPesquisa($pagina->grid->addPesquisa('idrmapct','PCT').$pagina->grid->addPesquisa('data','DATA PCT'));
	$pagina->grid->setRender('WBS.rendered');

	$pagina->grid->AddColuna("idrmapct", "PCT", "Number", "15", "''", 'central');
	$pagina->grid->AddColuna("data", "DATA DO PACOTE", "String", "580", "''", 'central');
	$pagina->grid->AddColuna("status", "STATUS", "String", "180", "''", 'central');
	$pagina->grid->AddColuna("produtos", "QTD", "Number", "20", "", 'central');
	$pagina->grid->AddAcao("rma_romaneio", "modulos/mod_rma/impressos/rmas02_entrada_interna.php", array('campo'=>'idrmapct', imagem=>'images/botoes/script.png', mensagem=>'Imprimir pacote', tamanho=>20));
	$pagina->grid->AddAcao("det_tab", "modulos/mod_rma/sub_interno/grid_item_empacotado.php", array('modulo'=>'tab_rma_interna','campo'=>'idrmapct', tamanho=>15, mensagem=>'Produtos do Pacote'));
	$pagina->grid->AddAcao("delrma", "modulos/libraries/exclui_por_id.php", array('campo'=>'idrmapct', tamanho=>15));
	$pagina->grid->setSorted('idrmapct','desc');
	$pagina->loadGrid('10');
	$pagina->imprime();
?>