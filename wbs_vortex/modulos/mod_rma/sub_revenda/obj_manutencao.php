<script type="text/javascript">

WBS.salvaedit = function(fnCallbk,oNewValue){
	
	var M = this;
	var oT = M.getDataTable();
	var rec = M.getRecord();
	
	var url = 'ajax_html.php?file=<?php echo encode('modulos/actions/alteraarquivo.php'); ?>';
	var postdata = 'cond@v_rma_laudos@idlaudo='+rec.getData('idlaudo')+'&v_rma_laudos@descr='+oNewValue;

	var _hand = {
			success:function(o){
				rec.setData('descr',oNewValue);
				oT.render();
				M.cancel();
				M.unblock();
			},
			failure:function(o){
				alert('FALHOU');
			}
	}

	WBS.conn.asyncRequest('POST',url,_hand, postdata);

}

WBS.slaudo = function(ob) {
	WBS.sendForm(ob);
	WBS.modulo.rma_new_laudos.dt.requery();
	alert('LAUDO INSERIDO');
	return false;
};

mostradiv = function() {

	divCentral.carrega('<?php echo encode('modulos/formularios/act_gera.php'); ?>&formid=35');
	
}

</script>
<?
    include('include/classes/grid.class.php');
    
    $header_t = "() {
    	divCentral.carrega('".encode('modulos/formularios/act_gera.php').")&formid=35');
    }";
    
	$camp = "idlaudo, idlaudo as id,nomecat,descr";

	$tabelas = "v_rma_laudos,categoria";
	
	$condicao = "v_rma_laudos.codcat = categoria.codcat";	  
	 
	$grid = new grid('rma_new_laudos', "ajax_json.php?campos=".$camp."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'rma_new_laudos',maxw=>700,chave=>"'idlaudo'"));
	 
	$grid->AddColuna('idlaudo','ID','10','Number');
	$grid->AddColuna("nomecat", "Categoria", "100", "String");
	$grid->AddColuna("descr", "Laudo *", "150", "String", array('editor'=>" new YAHOO.widget.TextboxCellEditor({asyncSubmitter:WBS.salvaedit})"));
	
	$grid->AddHeader("images/add.png",'INSERIR');
	$grid->AddFuncao('insere',$header_t);
	
	$config = array(
		sortedBy => array('key'=>"idlaudo",'dir'=>"desc"),
		initialRequest =>"'startIndex=0&results=15",
		initialLoad => true,
		paginator => true, 
		dynamicData => true,
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'"
	);
	
	$grid->SetConfigs($config,array('rowsPerPage'=>15));
	$grid->loadGrid();
	
	$grid->imprime();
?>
<br>
<center> * Para Editar, d&ecirc; dois cliques no laudo a ser editado.</center>