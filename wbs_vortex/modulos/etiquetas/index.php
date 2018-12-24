<script>

	ETQ = {};
	
	ETQ.envia = function (o) {
		
		var fram = document.getElementById('fram');
		
		onscreen.myDataTableETQ_ADM.ETQ_ADM0.requery('&prods='+o.value);
		onscreen.myDataTableETQ_ADM.ETQ_ADM0.focus();
		
		fram.src = "http://10.10.9.240/wbsprint/desc_lab.php?prods="+o.value;
		
							
	}
	
	ETQ.imprime = function() {
	
		var area = document.getElementById('codprods');
		
		area.value = area.value || 'FALSE';
		
		_hand = {
			success:function(o){
				
			},
			failure:function(o) {
				alert('Erro');
			}
		}
		
		var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=<?=encode('modulos/etiquetas/ajax_gera_etiqueta.php')?>&prods='+area.value), _hand);
		
	}
</script>
<style>
.topog {
	background:#FF9;
	border:thin solid #FC6;
	padding: 10px;
	padding-top: 25px;
	width: 680px;
}

.topog span{
	float: left;
	margin-top: -15px;
	font-weight:bold;
}
h2 {
	margin-left:15%;
}
</style>
<h2>PRODUTOS</h2>
<center>
<div class="topog"> 
<span>CODPRODS:</span>
<textarea id="codprods" onBlur="ETQ.envia(this)" cols="75"></textarea><br />
<iframe src="http://10.10.9.240/wbsprint/desc_lab.php?prods=false" id='fram' width="60px" height="20px"></iframe>
</div>
</center>

<?php include('modulos/etiquetas/grid_produtos.php'); ?>