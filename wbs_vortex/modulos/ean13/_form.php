<script>

	WBS.mandaForm = function(form) {
	
		var codbr = form.codbarra.value;
		var codpr = form.codprod.value;
		
		_hand = {
			success:function(o){
				alert('Produto Inserido com Sucesso.');
				form.codbarra.value = '';
				form.codprod.value = '';
				document.getElementById('imagem').style.display = 'none';
				document.getElementById('descricao').innerHTML = '';
			},
			failure:function(o){
				alert('Erro');
			}
		}
		
		//if (codbarra.validate()) {
			var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=<?=encode('modulos/ean13/ajax_ok.php')?>&codbr='+codbr+'&codpr='+codpr), _hand);
		//} else {
			//alert('Por favor, preencha corretamente');
		//}
		
		return false;
		
	}
	
	WBS.sendf = function (req) {
		alert(req.xhRequest.responseText);
	}

	WBS.enviar = function (o) {
		
		var div = document.getElementById('descricao');
		var img = document.getElementById('imagem');
		var cb = document.getElementById('codbarra');

		img.src = "http://www.shougun.it/images/loading.gif";
		_hand = {
			success:function(o){
				eval('WBS.json = '+o.responseText);			
				div.innerHTML = WBS.json.nome;
				if ((WBS.json.imagem != null) && (WBS.json.imagem != "")) {
					img.src = '../wbs_base/images_prod/'+WBS.json.imagem;
					img.style.display = 'block';
				} else {
					img.style.display = 'none';
				}
				
				cb.value = WBS.json.codbarra || '';
				
				WBS.wait.hide();
			},
			failure:function(o){
				div.innerHTML = 'Codigo nao encontrado';
				WBS.wait.hide();
			}
		}
		
		var codb = o.value;
		
		var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=<?=encode('modulos/ean13/ajax_descr.php')?>&codbarra='+codb), _hand);
			
	}

</script>

<form action="#" method="get" onsubmit="return WBS.mandaForm(this);">
	
    <div class="descricao" id="descricao"></div>
        
    <label for="codprod">CODPROD:</label>
    	<input type="text" name="codprod" id="codprod" onBlur="WBS.enviar(this)"/>
        <script>
			var codprod = new Spry.Widget.ValidationTextField("codprod", "custom", {validateOn:["change"],useCharacterMasking:true, pattern:"0000", isRequired:true, requiredClass:'required', invalidClass:'invalid', validClass:'valid', focusClass:'focus'}) 
   		 </script>
    <label for="codbarra">EAN13:</label>
    <input type="text" name="codbarra" id="codbarra" maxlength="13" />
    <script>
			var codbarra = new Spry.Widget.ValidationTextField("codbarra", "custom", {validateOn:["change"], useCharacterMasking:true, pattern:"0000000000000", isRequired:true, requiredClass:'required', invalidClass:'invalid', validClass:'valid', focusClass:'focus'}) 
    </script>
    <input type="submit" value="OK">
</form>
<div class="imagem" id="div_imagem">
	<img src="" id='imagem' width="300px" style="display:none;">
</div>