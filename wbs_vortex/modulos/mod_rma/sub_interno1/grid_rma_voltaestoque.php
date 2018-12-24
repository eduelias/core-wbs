<script>
	WBS.modulo = { };
	
	YAHOO.widget.DataTable.prototype.formatView  = function(elCell, oRecord, oColumn, oData) {
		var markup = "<div class='flag_c_1'></div>";
		elCell.innerHTML = markup;

		var oTable = this;
		var oRecord = oRecord;
		
		var fEdit = '<?=encode('modulos/mod_rma/ajax/ajax_voltaestoque.php')?>';
		
		var id = oData;
		var codprod = oRecord.getData('codprod');
		
		YAHOO.util.Event.addListener(elCell.firstChild, "click", function(e, oSelf) {
			if (confirm('DESEJA VOLTAR O RMA '+id+' PARA O ESTOQUE?')) {
					
				_hand = {
					success:function(o){
						eval('resp = '+o.responseText);
						if(resp.erro==0){
							var rs = oTable.getRecordSet();
							rs.deleteRecord(rs.getRecordIndex(oRecord));
							oTable.refreshView();
						}
					}, 
					failure: function(o){
						alert('FALHOU');
					}
				}
	
				var url = 'ajax_html.php?file='+fEdit;
	
				var postdata = '&idrma='+id;
	
				WBS.conn.asyncRequest('POST',url,_hand,postdata);
			}
		}
		, elCell);
	};
</script>
<?php 
 require_once('include/classes/grid.class.php');

	$campos = "v.idrma as id,
				v.idrma as idrma,
				v.codprod as codprod,
				nomeprod,
				v.codbarra as ns,
				DATE_FORMAT(DATE_ADD(ocprod.datanf, INTERVAL ocprod.garantia MONTH),\'%d/%m/%Y\') as gar_for";

	$camp = ereg_replace("[\r\t\n]","",$campos);

	$tabelas = "v_rma as v,v_rma_status,produtos,ocprod";
	
	$condicao = "v.idstatus = v_rma_status.idstatus and ocprod.codoc = v.codoc AND ocprod.codprod = v.codprod AND v.codprod = produtos.codprod AND v.tipo_rma = \'I\' AND (v.idstatus = 19)";	
	
	$grid = new grid('rma_interno_voltaestoque', "ajax_json.php?campos=".$camp."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'volta_estoque',maxw=>950,chave=>"'idrma'"));
	

	$grid->AddColuna('idrma','RMA',20,'Number');
	$grid->AddColuna('codprod','COD',20,'Number');
	$grid->AddColuna('nomeprod','PRODUTO',200,'String');
	$grid->AddColuna('ns','NS',200,'String');
	$grid->AddColuna('gar_for','GAR. FOR.',60,'String',"className:'td_center'");
	$grid->AddColuna('id','',20,'String',"formatter:YAHOO.widget.DataTable.prototype.formatView");

	$grid->AddPesquisa('v.idrma','IDRMA');
	$grid->AddPesquisa('v.codbarra','NS');
	$grid->AddPesquisa('nomeprod','PRODUTO');
	
	#$grid->AddHeader("modulos/mod_rma/images/act_pct_green.png",'ENVIAR');
	#$grid->AddFuncao('requestBuilder',$request_builder);
	#$grid->AddFuncao('empacota',$header_devol,0);
	
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