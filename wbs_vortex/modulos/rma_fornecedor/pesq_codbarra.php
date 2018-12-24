<?

	$pagina = new pagina('rma_fornecedor','BUSCAR DADOS POR CB');
	
	$pagina->addObj('<input type="text" id="codbarra"/>');

	$pagina->imprime();
?>
<style>
b{
	font-size:12px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
td{
	font-size:11px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
.odd{	
background:#CCCCCC;
}
.even{
	background:#FFFFFF;
}
</style>


<center><div id="mostra"></div></center>

<script>
	var input = document.getElementById('codbarra');
	//alert('w');
	YAHOO.util.Event.addListener(input, 'blur', function (e, oSelf) { 
		muda(input.value);
	},window);
</script>