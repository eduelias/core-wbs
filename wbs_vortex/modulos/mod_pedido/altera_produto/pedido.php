<div id="cadastro">
    <label for="codped">CODPED: </label>
    <input type="text" id="codped" /><br />
    <script>
        var spry_codped = new Spry.Widget.ValidationTextField("codped", "custom", {validateOn:["change"],useCharacterMasking:true, pattern:"0000000000000", isRequired:true, requiredClass:'required', invalidClass:'invalid', validClass:'valid', focusClass:'focus'}) 
    </script>    


<div id="mostrando">
<label for="mcpf">CPF/CNPJ:</label><span id="mcpf"></span><br />
<label>NOME:</label><span id="mnome"></span><br />
</div>
</div>
<script>

  GET('mostrando').style.display = 'none';

  var i_codped = GET('codped');
  
  YAHOO.util.Event.addListener(i_codped, "blur", function(e,oSelf) { 
  
    _hand = {
      success:function(o){
        
        eval('resp = '+o.responseText);   
        
        VENDA.table.oDT.deleteRows(0,VENDA.table.oDT.getRecordSet().getLength());
        
        if (resp.pload === null) {
	        alert('Código do pedido não encontrado no sistema!');
			oSelf.value = '';
		} else {
			GET('mcpf').innerHTML = resp.cliente.doc;
			GET('mnome').innerHTML = resp.cliente.nome;
			GET('mostrando').style.display = 'block';
			
			for (var recKey in resp.pload){ 
				if(recKey != '______array') {
					VENDA.addproduto(resp.pload[recKey]); 
				}
			}
		}
		
		pedido.codped = resp.debug.get.id;
          
      },
      failure:function(o){
        
      }
    }
    var  file = '<?=encode('modulos/mod_pedido/altera_produto/ajax_pedido.php')?>';
    
    YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&action=codped&id='+i_codped.value), _hand)
  
  }, i_codped);
  
</script>