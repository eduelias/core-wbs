<?
	require_once('include/classes/grid.class.php');
	$bd = new bd();
	$res = $bd->gera_array('codcliente,nome from v_rma_pct,clientenovo where v_rma_pct.short_desc = clientenovo.codcliente and v_rma_pct.idrmapct = '.$_GET[id]);
	
	$true = ($res[0]['tipo']==2)?1:0;
	$rev =  $res[0]['nome'];
	session_start;
	
	$fmt_mudalaudo = "{
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			var markup;
			var emrma = rec.getData('idrma');
			var oTable = this;
			
		if (true) {
		
			markup = '<img src=\"images/botoes/pencil.png\" title=\"Editar laudo e preço deste prodtuo\" width=14px>';
			
			if(rec.getData('idrma_t')) {
				oTable.subscribe('renderEvent', function() { oTable.showTableMessage('<center><div class=rma_2><b>ESTE PRODUTO FOI EM TROCA NO RMA '+rec.getData('idrma_t')+'</b></div></center>') },null);
			}
			
			YAHOO.util.Event.addListener(cell, 'click', function(e, oSelf) { 
			
				WBS.rma = {
					nomeprod:rec.getData('nomeprod')
				}
				
				divCentral.carrega('".encode('modulos/mod_rma/ajax/ajax_laudos.php')."&idrma='+rec.getData('idrma')+'&act=REV',this);
				
			},cell);
		
		} else {
		
			markup = '<img src=\"images/botoes/cancel.png\" title=\"Produto EM rma\" width=14px>';
		
		}
		
		cell.innerHTML = markup;
	
	};";

	$grp = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false;
	
	$campos = "v_rma_laudos.descr as descr, v_rma.idrma as idrma, v_rma.idrma as id, (select v_rma_pct.idrmapct from v_rma_pct,v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and v_rma_pct.tipo = 2 and v_rma_pctrma.idrma = v_rma.idrma) as pct2, v_rma.codprod as codprod, IF(codprod=0,laudo_rma,(select nomeprod from produtos where produtos.codprod = v_rma.codprod)) as nomeprod, v_rma.codbarra as codbarra, v_rma_status.descr as status";
	
	$tabelas = "v_rma,v_rma_pct,v_rma_pctrma,v_rma_status,v_rma_laudos";
	
	$condicao = "v_rma.idlaudo = v_rma_laudos.idlaudo and v_rma.idrma = v_rma_pctrma.idrma and v_rma_pctrma.idrmapct = v_rma_pct.idrmapct and v_rma.idstatus = v_rma_status.idstatus and v_rma_pct.idrmapct = ".$_GET[id];
	
	
	$grid = new grid('rma_detalhe_revenda'.$_GET[id] , "ajax_json.php?campos=".$campos."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'det_'.$_GET[id],maxw=>740,chave=>"'idrma'"));
	
	$grid->AddColuna("idrma", "RMA", 25, "String");
	$grid->AddColuna("pct2", "PCT", 25, "String");
	$grid->AddColuna("codprod", "COD", 40, "Number");
	$grid->AddColuna('nomeprod','RMA',220,'String',"className:'td_center td_bold'");
	$grid->AddColuna("codbarra", "NS", 60, "String");
	$grid->AddColuna("status",'Status',140,'String');
	$grid->AddColuna('descr','Laudo',260,'String');
	$grid->AddColuna("id","",20,"Number",'formatter:'.$grid->addFormatter('addlaudo',$fmt_mudalaudo));
	
	$config = array(
		sortedBy => array('key'=>"idrma",'dir'=>"desc"),
		formatRow=>'WBS.modulo.rowFormatter',
		initialLoad => true,
		paginator => true,
		dynamicData => true,
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'"
	);
	
	$grid->SetConfigs($config);
	$grid->loadGrid();
	
	$grid->imprime();
?>