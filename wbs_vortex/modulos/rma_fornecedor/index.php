<script>
	 
	 muda = function (codb){

	 WBS.wait.show()
	 	_hand = {
			success:function(o){
				var div = document.getElementById('mostra');
				div.innerHTML = o.responseText;
				WBS.wait.hide();
			},
			failure:function(o){
				alert('Conexão falhou');
				WBS.wait.hide();
			}		
		}
	 
	 	var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=<?=encode('modulos/rma_fornecedor/index2.php')?>&codbarra='+codb), _hand);
	 
	 }
	 
</script>

<?
	include('modulos/rma_fornecedor/tab_pesquisa.php')
?>
