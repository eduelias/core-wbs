<script type="text/javascript">
<!--
	WBS.modulo = {};

	YAHOO.widget.DataTable.prototype.formatGeraCredito = function(e,r,c,d){
		var oTable = this;
		var id = r.getData('idrma');
		var set = 21;
		e.innerHTML = '<div class="rma_3">&nbsp;</div>';
		YAHOO.util.Event.addListener(e, "click", function(ev, oSelf) {

				var _hand = {
					success:function(o){
						oTable.deleteRow(r);
					},
					failure:function(o){
						
					},
					timeout:2000
				};

				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=v_rma&id="+id+"&keyfield=idrma&field=idstatus&val="+set;

				if (confirm('DESEJA CONCEDER R$'+r.getData('preco_in')+' DE CREDITO À EMPRESA "'+r.getData('empresa')+'"?')) {
					WBS.conn.asyncRequest('GET',url,_hand,null);
				}
			},null);

	}
//-->
</script>
<h1>PRODUTOS AGUARDANDO PERMISSÃO DE CRÉDITO</h1>
<?php

include('include/classes/grid.class.php');

$campos = "v_rma.codprod,nomeprod,v_rma.idrma,nome as empresa,preco_in";

$tabelas = "v_rma,produtos,clientenovo,v_rma_pctrma,(select idrmapct,short_desc from v_rma_pct where tipo=2) as pct2";

$condicoes = "v_rma.codprod = produtos.codprod
			and v_rma_pctrma.idrma = v_rma.idrma
			and pct2.idrmapct = v_rma_pctrma.idrmapct
			and clientenovo.codcliente = pct2.short_desc 
			and flag_credito 
			and idstatus = 11";

$grid = new grid('g_financeiro', 'ajax_json.php?campos='.$campos.'&obj='.$tabelas.'&condicao='.$condicoes, array( 'idname'=>'gfinanceiro', 'maxw'=>800));

$grid->AddColuna('idrma','RMA',20,'String');
$grid->AddColuna('empresa','empresa',230,'String',"className:'td_bold'");
$grid->AddColuna('codprod','cod',30,'String');
$grid->AddColuna('nomeprod','produto',250,'String');
$grid->AddColuna('preco_in','VAL(R$)',40,'Number');
$grid->AddColuna('flag_credito','',18,'String',"formatter:YAHOO.widget.DataTable.prototype.formatGeraCredito");

#TODO listar campos que realmente necessitam ser mostrados para o financeiro.
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