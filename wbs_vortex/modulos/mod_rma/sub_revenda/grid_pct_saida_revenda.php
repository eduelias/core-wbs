<?php 
	$super = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false; 
?>
<script>
	YAHOO.widget.DataTable.prototype.formatpapel = function(cel,rec,col,data){
	
		cel.innerHTML = "<div class='print'></div>";
	
	};
	
	WBS.vai = function(fnCallbk,oNewValue){
	
		M = this;
		oT = M.getDataTable();
		rec = M.getRecord();
		
		var arr = Array();
		arr[1] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas04_modelo_nf.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		arr[2] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas05_relatorio_saida.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		arr[3] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas07_etiqueta_transporte.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		arr[4] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas03_carta_devolucao.php')?>&id='+rec.getData('idrmapct')+'&pct=1';
		
		M.unblock();
		
		url = arr[oNewValue];
		
		window.open(url);
	
	}
	
	YAHOO.widget.DataTable.prototype.formatEnvia = function (elCell,oRecord,oColumn,oData) {
	
		var nf = oRecord.getData('nf_e');
		var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/ajax_envio_revenda.php')?>&id="+oData;
		var oTable = this;
		
		if((nf!='000000')||(nf=='BALCAO')) {
		
			elCell.innerHTML = '<div class="comando_envia"></div>';
			
			YAHOO.util.Event.addListener(elCell, "click", function(e, oSelf) {
			
				var _hand = {
					success:function(o){
						oTable.deleteRows(oRecord);
						oTable.refreshView();
					},
					failure:function(o){
						oTable.showTableMessage('ERRO DE SERVIDOR','alert_gar');
					},
					timeout:1400
				}
				
				if (confirm('LIBERAR PACOTE PARA REVENDA?','SIM','NAO')) {
				
					WBS.conn.asyncRequest('GET',url,_hand,null);
					
				}
			
			},elCell);
		
		} else {
		
			elCell.innerHTML = '<div class="exclamacao"></div>';
		
		}
	
	}
</script>
<?
	require_once('include/classes/grid.class.php');
	require_once('include/classes/formatter.class.php');
	
	$fmt_edit_nf = new formatter(array(tipo=>'auto_edit',args=>array('file'=>"modulos/formularios/act_gera.php",campo=>'idrmapct',formid=>'31')));
	$fmt_detalhes = new formatter(array(tipo=>"det_tab",arquivo=>"modulos/mod_rma/sub_revenda/grid_rma_detalhe.php", args=>array('modulo'=>'tab_rma_revenda', mensagem=>'Detalhes do pacote')));
	$fmt_delete = new formatter(array(tipo=>"delbyid", arquivo=>"modulos/libraries/exclui_por_id.php", args=>array('campo'=>'idrmapct', tamanho=>15)));
	
	$campos = "	idrmapct, 
				\'1\' as sameuser,
				idrmapct as id, 
				DATE_FORMAT(v_rma_pct.data,\'%d/%m/%Y %h:%i\') as data, 
				clientenovo.nome as revenda, 
				nf_e, 
				DATE_FORMAT(data_nf_e,\'%d/%m/%Y\') as data_nf_e, 
				(select count(idrma) from v_rma_pctrma where v_rma_pctrma.idrmapct = id) as qtde,
				IFNULL((select IF(flag_credito,10,4) from v_rma,v_rma_pctrma where v_rma.idrma = v_rma_pctrma.idrma and v_rma_pctrma.idrmapct = id and flag_credito limit 1),4) as status";
	
	$tabelas = 'v_rma_pct,clientenovo';
	
	$condicao = "v_rma_pct.short_desc = clientenovo.codcliente and v_rma_pct.tipo = 4 and hist=\'N\'";
	
	$config_ini = array(idname=>'pct_envio_revenda',maxw=>940);
	
	$grid = new grid('pct_envio_revenda', "ajax_json.php?campos=".$campos."&obj=".$tabelas."&condicao=".$condicao, $config_ini);
	
	$grid->AddColuna('idrmapct','PCT',18,'Number');
	$grid->AddColuna('data','data do pacote',170,'String',"className:'td_center'");
	$grid->AddColuna('revenda','revenda',400,'String',"className:'td_center td_bold'");
	$grid->AddColuna('nf_e','NF',40,'String',"className:'td_center'");
	$grid->AddColuna('data_nf_e','data nf',60,'String',"className:'td_center'");
	$grid->AddColuna('qtde','QTD',20,'Number',"className:'td_center'");
	$grid->AddColuna('id','',20,'String',array('editor'=>"new YAHOO.widget.DropdownCellEditor({dropdownOptions:[{label:'MODELO NF',value:'1'},{label:'RELATORIO SAIDA',value:'2'},{label:'LABEL TRANSPORT', value:'3'},{label:'CARTA DEVOLUCAO',value:'4'}], LABEL_SAVE:'IMPRIMIR', LABEL_CANCEL:'FECHAR',asyncSubmitter:WBS.vai})",'formatter'=>"YAHOO.widget.DataTable.prototype.formatpapel"));
	$grid->AddColuna('id','',20,'String','formatter:'.$grid->addFormatter_dpr($fmt_edit_nf->getNewFmt('auto_edit')));
	$grid->AddColuna('id','',20,'String','formatter:'.$grid->addFormatter_dpr($fmt_detalhes->getNewFmt('det_tab')));
	$grid->AddColuna('id','',20,'String','formatter:YAHOO.widget.DataTable.prototype.formatEnvia');
	if($super) $grid->AddColuna('id','',20,'Number','formatter:'.$grid->addFormatter_dpr($fmt_delete->getNewFmt('delbyid')));
	$grid->AddCampo('status');
	$grid->AddCampo('sameuser');
	
	$config = array(
		sortedBy => array('key'=>"idrmapct",'dir'=>"desc"),
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'",
		formatRow=>'WBS.modulo.rowFormatter',
		_tablename=>"'v_rma_pct'",
		_campochave=>"'idrmapct'"
	);	
	
	$grid->AddPesquisa('clientenovo.nome','revenda');	
			
	$grid->SetConfigs($config);
	$grid->loadGrid();
	$grid->imprime();
	
	
?>