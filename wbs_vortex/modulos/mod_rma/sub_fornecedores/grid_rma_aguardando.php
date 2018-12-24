<script type="text/javascript">
<!--
	WBS.sendf = function(ob) {
		WBS.sendSTDForm(ob);
		WBS.modulo.rma_revenda.dt.requery();
		return false;
	}
	
	YAHOO.widget.DataTable.prototype.formatCheck = function(elCell, oRecord, oColumn, oData){

		elCell.innerHTML = '<input type="checkbox" id="'+oRecord.getId()+'" name="'+oRecord.getData('idrma')+'"></input>';
		var oTable = this;
		YAHOO.util.Event.addListener(elCell.firstChild, "click", function(e, oSelf) {
			
			if (elCell.firstChild.checked) {
				oTable.selectRow(oRecord);
			} else {
				oTable.unselectRow(oRecord);
			}
			
		},elCell.firstChild);
	}
//-->
	 
</script>
<?
	$header = "() {
		oTable = this;
		var sels,postdata,url,resp,revenda,rec0;
		
		sels = oTable.getSelectedRows();
		postdata = this.getSelectedsAsPost();
		
		if (sels.length > 0) { 
			
			revenda = oTable.getRecord(sels[0]).getData('nome');
		
			var _hande = {
				success:function(o){
					eval('resp = '+o.responseText);
					if (resp.erro==0) {
						for ( recKey in sels ) {
							if (recKey != '______array'){
								oTable.unselectRow(sels[recKey]);
								oTable.deleteRow(sels[recKey]);
							}
						}
						oTable.refreshView();
					} else {
					
						oTable.showTableMessage(resp.erromsg,'alert_gar');
						setTimeout('oTable.hideTableMessage()',3000);
					}
				},
				failure:function(o){
				
				
				},
				timeout:20000
			}
			
	
			url = 'ajax_html.php?file=".encode('modulos/mod_rma/ajax/ajax_empacota.php')."&tipo=6';
			if (confirm('Empacotar este(s) iten(s) do fornecedor \"'+revenda+'\"')){
				WBS.conn.asyncRequest('POST',url, _hande, postdata);
			}
		} else {
		
			alert('Nao ha itens selecionados');
		
		}
	
	}";
	
    require_once('include/classes/grid.class.php');
	$grp = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false;  
	
	$campos = " oc.codemp as codemp,
				v_rma.idrma as idrma,
				v_rma.codbarra as ns,
				v_rma.codprod as codprod,
				produtos.nomeprod as nomeprod,
				v_rma_laudos.descr as descr,
				fornecedor.nome as nome,
				empresa.nome as nomemp,
				ocprod.numnf as nf,
				DATE_FORMAT(ocprod.datanf,\'%d/%m/%Y\') as dtnf,
				ocprod.pcu as valor";

	$camp = ereg_replace("[\r\t\n]","",$campos);

	$tabelas = "v_rma,produtos,v_rma_laudos,fornecedor,oc,empresa,ocprod";
	
	$condicao = "oc.codoc = ocprod.codoc and ocprod.codprod = v_rma.codprod and oc.codemp = empresa.codemp and v_rma.codoc = oc.codoc and v_rma.idlaudo = v_rma_laudos.idlaudo and v_rma.codforn = fornecedor.codfor and v_rma.codprod = produtos.codprod and v_rma.idstatus = 9 and flag_nosso";
		
	$grid = new grid('rma_fornecedores', "ajax_json.php?campos=".$camp."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'principal',maxw=>1050,chave=>"'idrma'"));
	
	$grid->AddColuna('id','',20,'Number',"formatter:YAHOO.widget.DataTable.prototype.formatCheck");
	$grid->AddColuna('idrma','RMA',20,'Number');
	$grid->AddColuna('codprod','PRODUTO',40,'Number');
	$grid->AddColuna("nomeprod", "PRODUTO", 200, "String");
	$grid->AddColuna("nome", "Fornecedor", 240, "String","className:'td_bold td_center'");
	$grid->AddColuna('ns','NS','200','String');
	$grid->AddColuna('nf','NF',60,'Number');
	$grid->AddColuna('dtnf','DATA-NF',80,'String');
	$grid->AddColuna('valor','Valor',60,'Number');
	$grid->AddColuna('nomemp','EMP',100,'String');
	$grid->AddColuna('descr','Laudo',280,'String');
	
	$grid->AddPesquisa('oc.codemp','EMPRESA');
	$grid->AddPesquisa('v_rma.idrma','IDRMA');
	$grid->AddPesquisa('nomeprod','Produto');
	$grid->AddPesquisa('fornecedor.nome','Fornecedor');
	
	#$grid->AddHeader("modulos/mod_rma/images/act_pct_green.png",'ENVIAR');
	#$grid->AddFuncao('requestBuilder',$request_builder);
	#$grid->AddFuncao('empacota',$header_devol,0);
	
	$grid->AddHeader("modulos/mod_rma/images/act_pct_blue.png",'EMPACOTAR');	
	$grid->AddFuncao('empacota_t',$header);
	
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