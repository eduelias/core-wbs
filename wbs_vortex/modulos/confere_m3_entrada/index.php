<link rel="stylesheet" type="text/css" href="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_css.css">
<style>
.pesquisa {
	border:thin solid #930;
	margin: 0 auto;
	background:#FFEFEF;
	font-size:30px;
	padding: 20px;
	width: 400px;
}
.pesquisa input {
	font-size:20px;
}
input[type="text"], select, textarea {
	border-color:#AAAAAA #000000 #000000 #AAAAAA;
	border-style:solid;
	border-width:1px;
	font:inherit;
	font-weight:bolder;
	padding:2px;
}
</style>

<script>
	G = function (o) 
	{
		return document.getElementById(o);
	}
	
	YAHOO.widget.DataTable.prototype.flink = function(e,r,c,d){
		e.innerHTML = '<a href="http://wbs.maxxmicro.com.br/wbs_base/restrito.php?Action=update&codoc='+d+'&codempselect=14&desloc=0&palavrachave=&operador=&pagina=1&retlogin=1&connectok=&pg=174" target= "_blank">'+d+'</a>';
	}
	
	YAHOO.widget.DataTable.prototype.formatCheck = function(e,r,c,d){
		
		var oTable = this;
		
		var id = r.getData('codpoc');
		
		e.innerHTML = (d=='N')?'<div class="rma_1">&nbsp;</div>':'<div class="rma_3>&nbsp;</div>';

		YAHOO.util.Event.addListener(e, "click", function(e, oSelf) {
				oSelf.parentNode.innerHTML = '...';
				set = (d == 'N')?'S':'N';
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field=chk&val="+set;
		 
				var _hand = {
						success:function(o){
							r.setData('chk',set);
							e.innerHTML = (set=='N')?'<div class="rma_1">&nbsp;</div>':'<div class="rma_3">&nbsp;</div>';
							oTable.refreshView();
						},
						failure:function(o){
		
						},
						timeout:2000
				};
				
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e);
	}
	
		
	YAHOO.widget.DataTable.prototype.eqtde = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'qtderec';
		e.innerHTML = '<input type="text" size="5" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.epcu = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'pcu';
		e.innerHTML = '<input type="text" size="5" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}

	YAHOO.widget.DataTable.prototype.enf = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'numnf';
		e.innerHTML = '<input type="text" size="5" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.ednf = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'datanf';
		e.innerHTML = '<input type="text" size="10" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.est1 = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'st1';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.est2 = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'st2';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.eipi = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'ipi';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.evicm = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'v_icms';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.eicms = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'icms';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	
	YAHOO.widget.DataTable.prototype.etiponf = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'tipo_nf';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	
	YAHOO.widget.DataTable.prototype.edsp = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'v_despesas';
		e.innerHTML = '<input type="text" size="3 value='+d+'">';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.ev_f = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'v_frete';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.ei_f = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'v_icms_frete';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	YAHOO.widget.DataTable.prototype.esg = function (e,r,c,d)
	{
		var oTable = this;
		var id = r.getData('codpoc');
		var campo = 'v_seguro';
		e.innerHTML = '<input type="text" size="3" value='+d+'>';
		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=ocprod&id="+id+"&keyfield=codpoc&field="+campo+"&val="+oSelf.value;
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						timeout:2000
				};
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
</script>
<style>
.yui-skin-sam .yui-dt-liner {
	padding:10px;
}
</style>
<div class="pesquisa">
<label>M&ecirc;s</label>
<select name="data_i" id="data_i">
	<?php include('modulos/confere_m3_entrada/datas.php');?>
</select>
</div>
<?php include('modulos/confere_m3_entrada/grid_conferencia.php'); ?>
<script>
	YAHOO.util.Event.addListener(G('data_i'), "change", function(e, oSelf) { 	
		if (oSelf.value != "-1") 
		{
			oTable = onscreen.myDataTableconfere_pedidos['confere_pedidos0'];
			oTable.requery('&data_i='+oSelf.value);
		}
	},G('data_i'));
</script>