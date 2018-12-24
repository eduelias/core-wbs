<?
	#echo decode('WWxjNWEyUlhlSFpqZVRsMFlqSlNabU50TVdoTU1rWnhXVmhuZGxsWGNHaGxSamx3WW01T2JHTnVVWFZqUjJoMw==');
    include('include/classes/grid.class.php');
	$fmt_addlaudo = "{
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			var markup;
			var emrma = rec.getData('idrma');
			var oTable = this;
			
		if ((typeof(emrma)=='undefined')||(emrma < 1)) {
		
			markup = '<img src=\"images/botoes/add.png\" title=\"Iniciar RMA deste prodtuo\" width=14px>';
			
			if(rec.getData('idrma_t')) {
				oTable.subscribe('renderEvent', function() { oTable.showTableMessage('<center><div class=rma_2><b>ESTE PRODUTO FOI EM TROCA NO RMA '+rec.getData('idrma_t')+'</b></div></center>') },null);
			}
			
			YAHOO.util.Event.addListener(cell, 'click', function(e, oSelf) { 
			
				WBS.rma = {
					codbarra:rec.getData('codbarra'),
					codcb:rec.getData('codcb'),
					codcb_ent:rec.getData('codcb_ent'),
					codped:rec.getData('codped'),
					codprod:rec.getData('codprod'),
					flag_garantia:rec.getData('em_garantia'),
					garantia:rec.getData('garantia'),
					nomeprod:rec.getData('nomeprod'),
					codoc:rec.getData('codoc'),
					codemp:rec.getData('codemp'),
					codforn:rec.getData('codforn'),
					disponivel:rec.getData('quant_f')+rec.getData('quant_lf')
				}
				
				divCentral.carrega('".encode('modulos/mod_rma/ajax/ajax_laudos.php')."&codcat='+rec.getData('codcat')+'&codprod='+rec.getData('codprod')+'&act=REV',this);
				
			},cell);
		
		} else {
		
			markup = '<img src=\"images/botoes/cancel.png\" title=\"Produto EM rma\" width=14px>';
		
		}
		
		cell.innerHTML = markup;
	
	};";
	$fmt_quantidade = "{
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			
			cell.innerHTML = '<b>FAB: </b>'+data+'<br><b>LFB: </b>'+rec.getData('quant_lf');	
	};";	
	$fmt_codped = "{
	
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			
			cell.innerHTML = '<a href=\"../wbs_base/restrito.php?Action=list&codprod=&codpedselect='+rec.getData('codbped')+'&desloc=0&palavrachave=&operador=OR&pagina=&codprodpesq=&retlogin=1&connectok=&pg=105&hist=0&menu_not=1&impressao=1\" target=\"_blank\">'+data+'</a>';	
	}";
	$fmt_nf = "{
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			
			cell.innerHTML = '<b>NF: </b>'+rec.getData('nf')+'<br>'+rec.getData('datanf');	
	};";
	
	$fmt_garantia = "{
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			var color = '990000';
			
			if (rec.getData('em_garantia')==1) color='009900';
			cell.innerHTML = '<font color=\"'+color+'\">'+data+'</font>';
	};";
	
	$grid = new grid('rma_entrada', "ajax_html.php?file=".encode("modulos/mod_rma/ajax/ajax_pesquisa_entrada.php"), array(maxw=>940));
	
	$grid->AddColuna('idrma', 'RMA', 15, 'Number');
	$grid->AddColuna('codprod','PRD',40,'String');
	$grid->AddColuna('codped','PED',60,'Number',"formatter:".$grid->addFormatter('codped',$fmt_codped));
	$grid->AddColuna('nf','NF',80,'String', "formatter:".$grid->addFormatter('nf',$fmt_nf));
	$grid->AddColuna('nomeprod','Produto',250);
	$grid->AddColuna('quant_f','EST',50,'String',"formatter:".$grid->addFormatter('quantidade',$fmt_quantidade));
	$grid->AddColuna('codbarra','NS',120,'String');
	$grid->AddColuna('garantia','Garantia',100,'String',"formatter:".$grid->addFormatter('garantia',$fmt_garantia));
	$grid->AddColuna('em_garantia','',15,'String','formatter:'.$grid->addFormatter('addlaudo',$fmt_addlaudo));
	$grid->AddCampo('idrma_t');
	$grid->AddCampo('codemp');
	$grid->AddCampo('codoc');
	$grid->AddCampo('codforn');
	$grid->AddCampo('codcb_ent');
	$grid->AddCampo('codcb');
	$grid->AddCampo('datanf');
	$grid->AddCampo('quant_lf');
	$grid->AddCampo('codcat');
	$grid->AddCampo('codbped');
	
	$config = array(
		sortedBy => array('key'=>"idrma",'dir'=>"asc"),
		initialLoad => false,
		paginator => false,
		dynamicData => false,
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'"
	);
	
	$grid->SetConfigs($config);
	$grid->loadGrid();
	
	$grid->imprime();
?>
<script>
YAHOO.util.Event.onDOMReady( function() {
	WBS.modulo.controle_entrada();
	//WBS.console.output.init();
});
</script>