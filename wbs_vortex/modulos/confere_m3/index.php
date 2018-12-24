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
	YAHOO.widget.DataTable.prototype.formatCheck = function(e,r,c,d){
	
		var oTable = this;

		var id = r.getData('codnf');
		
		e.innerHTML = (d=='N')?'<div class="rma_1">&nbsp;</div>':'<div class="rma_3>&nbsp;</div>';

		YAHOO.util.Event.addListener(e, "click", function(e, oSelf) {
				oSelf.parentNode.innerHTML = '...';
				set = (d == 'N')?'S':'N';
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=pedidonf&id="+id+"&keyfield=codnf&field=chk&val="+set;
		 
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
	
	YAHOO.widget.DataTable.prototype.formatEd_datanf = function(e,r,c,d){
	
		var oTable = this;

		var id = r.getData('codnf');
		
		var campo = 'datanf';
		
		e.innerHTML = '<input type="text" size="10" value='+d+'>';

		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {
				
				//set = (d == 'N')?'S':'N';
				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=pedidonf&id="+id+"&keyfield=codnf&field="+campo+"&val="+oSelf.value;
		
				var _hand = {
						success:function(o){
							r.setData(campo,oSelf.value);
						},
						failure:function(o){
		
						},
						timeout:2000
				};
				
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	
	YAHOO.widget.DataTable.prototype.formatEd_nf = function(e,r,c,d){
	
		var oTable = this;

		var id = r.getData('codnf');
		
		e.innerHTML = '<input type="text" value='+d+' size="6">';

		YAHOO.util.Event.addListener(e.firstChild, "blur", function(e, oSelf) {
				
				//set = (d == 'N')?'S':'N';
				
				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=pedidonf&id="+id+"&keyfield=codnf&field=nf&val="+oSelf.value;
		
				var _hand = {
						success:function(o){
							r.setData('nf',oSelf.value);
							//e.innerHTML = (set=='N')?'<div class="rma_1">&nbsp;</div>':'<div class="rma_3">&nbsp;</div>';
							//oTable.refreshView();
						},
						failure:function(o){
		
						},
						timeout:2000
				};
				
				WBS.conn.asyncRequest('GET',url,_hand,null);
		}, e.firstChild);
	}
	
	G = function (obj) {
		return document.getElementById(obj);
	}
</script>
<div class="pesquisa">
<label>M&ecirc;s</label>
<select name="data_i" id="data_i">
	<?php include('modulos/confere_m3/datas.php');?>
</select>
</div>

<?php include('modulos/confere_m3/grid_conferencia.php'); ?>

<script>

	

	YAHOO.util.Event.addListener(G('data_i'), "change", function(e, oSelf) { 
		
		oTable = onscreen.myDataTableconfere_pedidos['confere_pedidos0'];
		
		oTable.requery('&data_i='+oSelf.value);
		
	},G('data_i'));

</script>