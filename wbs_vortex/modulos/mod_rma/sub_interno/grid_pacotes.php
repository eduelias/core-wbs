<script>
	WBS.vai = function(fnCallbk,oNewValue){
	
		var M = this;
		var oT = M.getDataTable();
		var rec = M.getRecord();
		
		var arr = Array();
		arr[1] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas01_protocolo.php')?>&id='+rec.getData('idrmapct')+'&pct=1&act=protocolo';
		arr[2] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/print_saida_revenda.php')?>&id='+rec.getData('idrmapct')+'&pct=1&act=comprovante';
		
		M.unblock();
		
		url = arr[oNewValue];
		
		window.open(url);
	
	}
	YAHOO.widget.DataTable.prototype.formatpapel = function(cel,rec,col,data){
	
		cel.innerHTML = '<img src = "images/botoes/printer.png" width=14px>';
	
	}
</script>
<? 
	#					Cria a página
	$pagina = new pagina("rma_pacotes","PACOTES");

	#					Seta o elemento grid na página
	$pagina->setGrid("idrmapct as id, idrmapct,(select nome from clientenovo where clientenovo.codcliente = short_desc limit 1) as short_desc, DATE_FORMAT(data,\'%d/%m/%Y %T\') as data, DATE_FORMAT(data_nf_e,\'%d/%m/%Y\') as data_nf_e, nf_e, (select COUNT(*) from v_rma_pctrma WHERE v_rma_pctrma.idrmapct = v_rma_pct.idrmapct) as produtos,(select v_rma.idstatus from v_rma,v_rma_status where v_rma.idstatus = v_rma_status.idstatus and idrma in (select idrma from v_rma_pctrma where idrmapct = id) ORDER BY v_rma_status.prioridade ASC limit 1) as sts","v_rma_pct","v_rma_pct.tipo = 2 AND NOT hist = \'S\'","v_rma_pct","idrmapct","v_rma_pct");
	$pagina->grid->set_rowformatter('myRowFormatter');	
	$pagina->AddPesquisa($pagina->grid->addPesquisa('1=1 HAVING short_desc','REVENDA').$pagina->grid->addPesquisa('nf_e','NF').$pagina->grid->addPesquisa('idrmapct','PCT').$pagina->grid->addPesquisa('data','DATA PCT'));
	$pagina->grid->setRender('WBS.rendered');
	#                   ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddAcao("marker", "", array('campo'=>'sts', head=>'', tamanho=>25));
	$pagina->grid->AddColuna("idrmapct", "PCT", "Number", "20", "''", 'central');
	$pagina->grid->AddColuna("data", "DATA DO PACOTE", "String", "180", "''", 'central');
	$pagina->grid->AddColuna("short_desc", "REVENDA", "String", "300", "''", 'td_bold central');
	$pagina->grid->AddColuna("nf_e", "NF", "String", "90", "'textbox'", 'central');
	$pagina->grid->AddColuna("data_nf_e", "DATA NF", "String", "80", "''", 'central');
	$pagina->grid->AddColuna("produtos", "QTD", "Number", "20", "", 'central');
	$pagina->grid->AddAcao("auto_edit", "modulos/formularios/act_gera.php", array('campo'=>'idrmapct', 'formid'=>'31', head=>'NF', tamanho=>15, mensagem=>'Editar NF'));
	
	$pagina->grid->AddColuna("test", "a", "String", "15", $pagina->grid->addEditor('YAHOO.widget.DropdownCellEditor({dropdownOptions:[{label:"PROTOCOLO",value:"1"},{label:"COMPROVANTE",value:"2"}],LABEL_SAVE:"IMPRIMIR", LABEL_CANCEL:"FECHAR",asyncSubmitter:WBS.vai}), formatter:YAHOO.widget.DataTable.prototype.formatpapel'), '');
	
	$pagina->grid->AddAcao("det_tab", "modulos/mod_rma/sub_interno/grid_item_empacotado.php", array('modulo'=>'tab_rma_interno','campo'=>'idrmapct', tamanho=>15, mensagem=>'Produtos do Pacote'));
	$pagina->grid->AddAcao("rma_correcao", "", array('campo'=>'idrmapct', tamanho=>20, msg1=>'Carta de corre&ccedil;&atilde;o <b>RECEBIDA</b>.', msg2=>'<b>AGUARDAR</b> carta de corre&ccedil;&atilde;o.'));
	$pagina->grid->AddAcao("delrma", "modulos/libraries/exclui_por_id.php", array('campo'=>'idrmapct', tamanho=>15));
	$pagina->grid->setSorted('idrmapct','desc');
	$pagina->loadGrid('60');
	$pagina->imprime();
?>