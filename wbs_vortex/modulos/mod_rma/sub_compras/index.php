<link rel="stylesheet" type="text/css" href="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_css.css">

<script type="text/javascript" src="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_js.js"></script>

<script type="text/javascript">
<!--
YAHOO.widget.DataTable.prototype.formatAqDecisao = function(e,r,c,d){

	var oTable = this;
	var rec = r;
	var id = r.getData('idrma');

	var sendex = function (e, oSelf) {
		oSelf.parentNode.innerHTML = '...';
		var set = oSelf.name;
		<?php echo "var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=idstatus&val=\"+set;"?>

		var _hand = {
				success:function(o){
					if ((set==15)||(set==22)) r.setData('idstatus',set);
					if ((set==4)||(set==23)) oTable.deleteRow(r);
					oTable.refreshView();
				},
				failure:function(o){

				},
				timeout:2000
		};
		
		WBS.conn.asyncRequest('GET',url,_hand,null);
	};
	
	//SETANDO AS CONFIGURAÇÕES DE DADOS E TOOLTIPS
	if (r.getData('idstatus')==15) {
		
		var d1 = document.createElement('div');
		d1.style.width = '10px';
		d1.className = 'rma_3';
		d1.name = '4';
		d1.id = '4'+rec._sId;
		d1.title = '<div class="rma_3">&nbsp;</div><b>PRODUTO RECEBIDO</b><br>Clique se este produto<br>acabou de ser recebido.';
		WBS.tooltips.push(d1.id);
		YAHOO.util.Event.addListener(d1, 'click', sendex, d1);
		e.appendChild(d1);

		var d2 = document.createElement('div');
		d2.style.width = '10px';
		d2.className = 'rma_1';
		d2.name = '23';
		d2.id = '23'+rec._sId;
		d2.title = '<div class="rma_1">&nbsp;</div><b>PRODUTO INDISPONÍVEL</b><br>Produto indisponível no<br>mercado, não será comprado.';
		WBS.tooltips.push(d2.id);
		YAHOO.util.Event.addListener(d2, 'click', sendex, d2);
		e.appendChild(d2);

		var d3 = document.createElement('div');
		d3.style.width = '10px';	
		d3.className = 'flag_compras_0';
		d3.name = '22';
		d3.id = '22'+rec._sId;
		d3.title = '<div class="flag_compras_0">&nbsp;</div><b>PRODUTO COMPRADO</b><br>Produto foi comprado<br>Aguardando entrada';
		WBS.tooltips.push(d3.id);
		YAHOO.util.Event.addListener(d3, 'click', sendex, d3);
		e.appendChild(d3);
		
	} else if (r.getData('idstatus')==22){

		var d3 = document.createElement('div');
		d3.style.width = '10px';	
		d3.className = 'flag_compras_1';
		d3.name = '15';
		d3.id = '15'+rec._sId;
		d3.title = '<div class="flag_compras_1">&nbsp;</div><b>PRODUTO NÃO CHEGARÁ</b><br>Produto foi comprado<br>mas não vai chegar';
		WBS.tooltips.push(d3.id);
		YAHOO.util.Event.addListener(d3, 'click', sendex, d3);
		e.appendChild(d3);
		
	} else {

	}
	
}
//-->
</script>

<h1>PRODUTOS AGUARDANDO AQUISIÇÃO</h1>
<?php 

	include(C_PATH_CLASS."grid.class.php");
	
	$campos = "idrma,nomeprod,DATE_FORMAT(v_rma.data,\'%d/%m/%Y %h:%i\') as data, (select DATE_FORMAT(data,\'%d/%m/%Y %h:%i\') from v_rma_hstatus where idrma = v_rma.idrma order by data desc limit 1) as  data_status, descr, v_rma.idstatus";
	
	$tabelas = "v_rma,produtos,v_rma_status";
	
	$condicoes = "v_rma.idstatus = v_rma_status.idstatus AND IF(v_rma.codprod_tcliente<>0,v_rma.codprod_tcliente,v_rma.codprod)=produtos.codprod AND (v_rma.idstatus=15 or v_rma.idstatus=22)";
	
	$grid = new grid('rma_compras','ajax_json.php?campos='.$campos.'&obj='.$tabelas.'&condicao='.$condicoes,array(idname=>rma-compras,maxw=>800));
	
	$grid->AddColuna('idrma','RMA',20,'Number');
	$grid->AddColuna('nomeprod','Produto',100,'String');
	$grid->AddColuna('descr','Status',50,'String');
	$grid->AddColuna('data','DATA RMA',50,'String');
	$grid->AddColuna('data_status','DATA PEDIDO',50,'String');
	$grid->AddColuna('idstatus','ACOES',30,'String',"formatter:YAHOO.widget.DataTable.prototype.formatAqDecisao");
	$grid->AddCampo('idstatus');
	
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