<script>
	WBS.vai = function(fnCallbk,oNewValue){
	
		var M = this;
		var oT = M.getDataTable();
		var rec = M.getRecord();
		
		var arr = Array();
		arr[1] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas01_protocolo.php')?>&id='+rec.getData('idrmapct')+'&pct=1&act=protocolo';
		arr[2] = 'ajax_html.php?file=<?=encode('modulos/mod_rma/impressos/rmas01_protocolo.php')?>&id='+rec.getData('idrmapct')+'&pct=1&act=comprovante';
		
		M.unblock();
		
		url = arr[oNewValue];
		
		window.open(url);
	
	}
	YAHOO.widget.DataTable.prototype.formatpapel = function(cel,rec,col,data){
	
		cel.innerHTML = "<div class='print'></div>";
	
	}
	YAHOO.widget.DataTable.prototype.formatMark = function(cel,rec,col,data){
		cel.innerHTML = '<div class="mark_'+data+'"></div>';
	}
	
	YAHOO.widget.DataTable.prototype.formatView  = function(elCell, oRecord, oColumn, oData) {
							var markup = "<div class='view'></div>";
							elCell.innerHTML = markup;
							var fEdit = '<?=encode('modulos/mod_rma/sub_revenda/grid_rma_detalhe.php')?>';
							
							var id = oData;
							
							YAHOO.util.Event.addListener(elCell.firstChild, "click", function(e, oSelf) {
									WBS.pagina._msg.static('info','Aguarde, conectando...');
									divCentral.carrega(changeIt(fEdit+'&id='+id));
							}
							, elCell);
						};
</script>
<? 
	require_once('include/classes/formatter.class.php');
	
	$fmt_edit_nf = new formatter(array(tipo=>'auto_edit',args=>array('file'=>"modulos/formularios/act_gera.php",campo=>'idrmapct',formid=>'31')));
	
	$fmt_view = "{
	
	
	
	}";
	
	$fmt_detalhes = new formatter(array(tipo=>"det_tab",arquivo=>"modulos/mod_rma/sub_revenda/grid_rma_detalhe.php", args=>array('modulo'=>'tab_rma_revenda', mensagem=>'Detalhes do pacote')));

	$ft_carta_corr = "{
		var url,set,id,acao,cla,oTable,resp;
		var markup = '';
		var set = oRecord.getData('status');
		var id = oRecord.getData('id');
		var balc = oRecord.getData('nf_e');
		cla = (set==5) ?  5 : 4 ;
		elCell.innerHTML = '';
		
		if (((set==4)||(set==5)||(set==7)||(set==8)) && (balc!='BALCAO')){ 
			elCell.innerHTML = '<div class=\"flag_ccorrecao_'+cla+'\"></div>';
			oTable=this;
	
			YAHOO.util.Event.addListener(elCell, 'click', function(e, oSelf) { 
				elCell.innerHTML = '...';
				if ( set==5 ) { set = 4; acao='libera';} else { set = 5; acao='aguarda';};
				var _hande = {
					success:function(o){
						eval('resp = '+o.responseText);
						oRecord.setData('status', resp.status);
						oTable.refreshView()
					},
					failure:function(o){
						alert('ERRO DE SERVIDOR, NAO RESPONDEU.');
					},
					timeout:2000
				}
				var url = \"ajax_html.php?file=".encode('modulos/mod_rma/sub_interno/ajax_voltastatus.php')."&pct=\"+id+\"&acao=\"+acao;
				WBS.conn.asyncRequest('GET',url, _hande,null);
			},elCell);
		}
	}";
	
	$ed_print = "(fnCallbk,oNewValue){
	
		var M = this;
		var oT = M.getDataTable();
		var rec = M.getRecord();
		alert(oNewValue);
		var arr = Array();
		arr[1] = 'ajax_html.php?file=".encode('modulos/mod_rma/impressos/rmas01_protocolo.php')."&id='+rec.getData('idrmapct')+'&pct=1&act=protocolo';
		arr[2] = 'ajax_html.php?file=".encode('modulos/mod_rma/sub_interno/print_saida_revenda.php')."&id='+rec.getData('idrmapct')+'&pct=1&act=comprovante';
		
		M.unblock();
		
		url = arr[oNewValue];
		
		window.open(url);
	
	}";
	
	$bd = new bd();
	$bd->send_sql('update v_rma_pct set hist=\'S\' where v_rma_pct.idrmapct in (select v_rma_pct.idrmapct from v_rma_pctrma,v_rma where v_rma.idrma = v_rma_pctrma.idrma AND v_rma_pct.idrmapct = v_rma_pctrma.idrmapct GROUP BY v_rma_pct.idrmapct having MIN(v_rma.idstatus)=9)');
	
	$fmt_delete = new formatter(array(tipo=>"delbyid", arquivo=>"modulos/libraries/exclui_por_id.php", args=>array('campo'=>'idrmapct', tamanho=>15)));
	
	#Cria a página
    require_once('include/classes/grid.class.php');	
	
	$campos='idrmapct as id, 
	         idrmapct, 
	         nome as short_desc, 
	         '.$_SESSION['id'].' as s_user,
	         v_rma_pct.codvend as vend,
	         IF(v_rma_pct.codvend="'.$_SESSION['id'].'","1","0") as sameuser,
	         DATE_FORMAT(data,\"%d/%m/%Y %T\") as data, 
	         DATE_FORMAT(data_nf_e,\"%d/%m/%Y\") as data_nf_e, 
	         nf_e, 
	         (select COUNT(*) from v_rma_pctrma WHERE v_rma_pctrma.idrmapct = v_rma_pct.idrmapct) as produtos,
	         @stat:=(select v_rma.idstatus from v_rma,v_rma_status where v_rma.idstatus = v_rma_status.idstatus and idrma in (select idrma from v_rma_pctrma where idrmapct = id) ORDER BY v_rma_status.prioridade ASC limit 1) as status,
	         (select descr from v_rma_status where idstatus = @stat) as desc_status';
	
	$obj="v_rma_pct,clientenovo";
	
	$cond="v_rma_pct.short_desc = clientenovo.codcliente AND v_rma_pct.tipo = 2 AND NOT hist = \"S\"";	
	
	$grid = new grid('pct_revenda', "ajax_json.php?campos=".$campos."&obj=".$obj."&condicao=".$cond,array(idname=>'pct_revenda',maxw=>940));
	
	$grid->AddColuna('status', '', 25, 'String','formatter:YAHOO.widget.DataTable.prototype.formatMark');#, 'formatter:'.$grid->addFormatter_dpr($fmt_mark->getNewFmt('marker')));
	$grid->AddColuna('id', 'pct', 25, 'Number');
	$grid->AddColuna('data','Data do pacote',180,'String',"className:'td_center'");
	$grid->AddColuna('short_desc','revenda',545,'String',"className:'td_center'");
	$grid->AddColuna('desc_status','STATUS',200,"String", "className:'td_center td_bold'");
	$grid->AddColuna('nf_e','NF',90,'String');
	$grid->AddColuna('data_nf_e','DATA NF',100,'String');
	$grid->AddColuna('produtos','QTD',30,'Number');
	$grid->AddColuna('idrmapct',' ',19,'Number','formatter:'.$grid->addFormatter_dpr($fmt_edit_nf->getNewFmt('auto_edit')));
	$grid->AddColuna('idrmapct',' ',19,'Number', array('editor'=>"new YAHOO.widget.DropdownCellEditor({dropdownOptions:[{label:'PROTOCOLO',value:'1'},{label:'COMPROVANTE',value:'2'}],LABEL_SAVE:'IMPRIMIR', LABEL_CANCEL:'FECHAR',asyncSubmitter:WBS.vai})",'formatter'=>"YAHOO.widget.DataTable.prototype.formatpapel"));
	$grid->AddColuna('idrmapct','',19,'Number','formatter:YAHOO.widget.DataTable.prototype.formatView');
	$grid->AddColuna('idrmapct','',19,'Number','formatter:'.$grid->addFormatter('ft_cartacorr',$ft_carta_corr));
	$grid->AddColuna('idrmapct','',19,'Number','formatter:'.$grid->addFormatter_dpr($fmt_delete->getNewFmt('delbyid')));
	
	$grid->AddCampo('sameuser');
	
	$grid->AddPesquisa('clientenovo.nome','REVENDA');
	$grid->AddPesquisa('nf_e','NF:');
	$grid->AddPesquisa('idrmapct','pct');
	$grid->AddPesquisa('data_nf_e','data pct');
	
	
	
	$config = array(
		formatRow=>"WBS.modulo.rowFormatter",
		sortedBy => array('key'=>"id",'dir'=>"desc"),
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'",
		_tablename=>"'v_rma_pct'",
		_campochave=>"'idrmapct'"
	);	
	
	$grid->SetConfigs($config);
	$grid->loadGrid();
	$grid->imprime();
?>