<script>
	aaaaaa_formatter = function(tr,rec){
	
		var Dom = YAHOO.util.Dom; 	 
			Dom.addClass(tr, 'm'+rec.getData('idstatus'));
			
		return true;	
		
	};
	
	YAHOO.widget.DataTable.prototype.formatpapel = function(cel,rec,col,data){
	
		cel.innerHTML = '<img src = "images/botoes/printer.png" width=14px>';
	
	}
	
	WBS.vai = function(fnCallbk,oNewValue){
	
		M = this;
		oT = M.getDataTable();
		rec = M.getRecord();
		
		var arr = Array();
		arr[1] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/print_modelonf.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		arr[2] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/print_saida_revenda.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		arr[3] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/print_modelonf.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		arr[4] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/print_carta_devolucao.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		//arr[5] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/print_modelonf.php')?>&id='+rec.getData('idrmapct')+'&pct=1';

		
		M.unblock();
		
		url = arr[oNewValue];
		
		window.open(url);
	
	}
</script>
<? 
	#					Cria a página
	$pagina = new pagina("rma_pacotes_para_revenda","PACOTES PARA REVENDA");

	#					Seta o elemento grid na página
	$pagina->setGrid("idrmapct,(select nome from clientenovo where clientenovo.codcliente = short_desc limit 1) as short_desc, DATE_FORMAT(data,\'%d/%m/%Y %T\') as data, DATE_FORMAT(data_nf_e,\'%d/%m/%Y\') as data_nf_e, nf_e, (select COUNT(*) from v_rma_pctrma WHERE v_rma_pctrma.idrmapct = v_rma_pct.idrmapct) as produtos","v_rma_pct","v_rma_pct.tipo = 4 AND NOT hist = \'S\'","v_rma_pct","idrmapct","v_rma_pct");
	$pagina->grid->set_rowformatter('aaaaaa_formatter');	
	$pagina->AddPesquisa($pagina->grid->addPesquisa('idrmapct','PCT').$pagina->grid->addPesquisa('data','DATA PCT'));
	
	#                   ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("idrmapct", "PCT", "Number", "15", "''", 'central');
	$pagina->grid->AddColuna("data", "DATA DO PACOTE", "String", "180", "''", 'central');
	$pagina->grid->AddColuna("short_desc", "REVENDA", "String", "300", "''", 'central');
	$pagina->grid->AddColuna("nf_e", "NF", "String", "90", "'textbox'", 'central');
	$pagina->grid->AddColuna("data_nf_e", "DATA NF", "String", "80", "''", 'central');
	$pagina->grid->AddColuna("produtos", "QTD", "Number", "20", "", 'central');
	
	$pagina->grid->AddColuna("test", "a", "String", "15", $pagina->grid->addEditor('YAHOO.widget.DropdownCellEditor({dropdownOptions:[{label:"MODELO NF",value:"1"},{label:"RELATORIO SAIDA",value:"2"},{label:"LABEL TRANSP",value:"3"},{label:"CARTA DEVOLUCAO",value:"4"}],LABEL_SAVE:"IMPRIMIR", LABEL_CANCEL:"FECHAR",asyncSubmitter:WBS.vai}), formatter:YAHOO.widget.DataTable.prototype.formatpapel'), '');

	$pagina->grid->AddAcao("auto_edit", "modulos/formularios/act_gera.php", array('campo'=>'idrmapct', 'formid'=>'31', head=>'NF', tamanho=>15, mensagem=>'Editar NF'));

	$pagina->grid->AddAcao("det_tab", "modulos/mod_rma/sub_interno/grid_item_empacotado.php", array('modulo'=>'tab_rma_interno','campo'=>'idrmapct', mensagem=>'Ver produtos do pacote', tamanho=>15));
	$pagina->grid->AddAcao("rma_send_revenda", "php", array('campo'=>'idrmapct', tamanho=>15, mensagem=>'Finalizar pacote', condicao=>"rec.getData('nf_e')!='000000'"));
	$pagina->grid->AddAcao("delete", encode("modulos/libraries/exclui_por_id.php"), array('campo'=>'idrmapct', tamanho=>15));
	$pagina->loadGrid('10');
	$pagina->imprime();
?>