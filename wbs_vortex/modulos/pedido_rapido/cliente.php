<div id="cadastro">
    <label for="cpf">CPF: </label>
    <input type="text" id="cpf" /><br />
    <script>
        var spry_cpf = new Spry.Widget.ValidationTextField("cpf", "custom", {validateOn:["change"],useCharacterMasking:true, pattern:"000.000.000-00", isRequired:true, requiredClass:'required', invalidClass:'invalid', validClass:'valid', focusClass:'focus'}) 
    </script>
    
    <label for="cnpj">CNPJ:</label>
    <input type="text" id="cnpj" /><br />
    <script>
        var spry_cnpj = new Spry.Widget.ValidationTextField("cnpj", "custom", {validateOn:["change"],useCharacterMasking:true, pattern:"00.000.000/0000-00", isRequired:true, requiredClass:'required', invalidClass:'invalid', validClass:'valid', focusClass:'focus'}) 
    </script>


    <span id="cadastro_sec">
       <label for="nome">NOME:</label><input type="text" id="nome" /><br />
        <script>
        	var spry_nome = new Spry.Widget.ValidationTextField("nome") 
    	</script>
        <label for="end1">END:</label><input type="text" id="end1" /> N&deg;<input type="text" id="num" size="5" /> Cmpl<input type="text" size="3" id="cmpl"/>
        <script>
        	var spry_end1 = new Spry.Widget.ValidationTextField("end1"); 
			var spry_num = new Spry.Widget.ValidationTextField("num");
    	</script>
        <label for="uf">UF:</label><select id="uf"><?php include('modulos/pedido_rapido/cliente_estados.php');?></select>CIDADE: <select id="cidade"><option value="Juiz de Fora">Juiz de Fora</option></select> 
        <input type="button" value="Salvar" id="salvar" />
    </span>
    
</div>

<div id="mostrando">
<label for="mcpf">CPF/CNPJ:</label><span id="mcpf"></span><br />
<label>NOME:</label><span id="mnome"></span><br />
<label>ENDERE&Ccedil;O:</label><span id="mend"></span><br />
</div>
<script>

	GET('mostrando').style.display = 'none';
	GET('cadastro_sec').style.display = 'none';
	
	var uf = GET('uf');
	
	var cpf = GET('cpf');
	
	var cnpj = GET('cnpj');
	
	var salvar = GET('salvar');
	
	VENDA.procura_cliente = function(oSelf,campo) {
		
		if (oSelf.value != '') {
			
			_hand = {
				success:function(o){
					eval('resp = '+o.responseText);
					
					if (eval(resp.cadastrado)) {
						GET('mostrando').style.display = 'block';
						GET('cadastro').style.display = 'none';
						GET('produtos').style.display = 'block';
						GET('mcpf').innerHTML = resp.cpf || resp.cnpj;
						GET('mnome').innerHTML = resp.nome;
						GET('mend').innerHTML = resp.end;
						VENDA.cliente = resp;
					
					} else {
							
						GET('cadastro').style.display = 'block';
						GET('cadastro_sec').style.display = 'block';
						GET('mostrando').style.display = 'none';
						GET('produtos').style.display = 'none';
						
					}
					
					GET('nome').focus();
					
				}, 
				failure:function(o){
					
				}
			}
			
			var file = '<?=encode('modulos/pedido_rapido/ajax_cliente.php')?>';
			
			if (((valida_CNPJ(oSelf.value)) || (valida_CPF(oSelf.value))) && oSelf.value != '') 
				YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&'+campo+'='+oSelf.value+'&action='+campo), _hand)
			else 
				alert(campo+' Inválido');
		} 
		
	}
	
	VENDA.insere_cliente = function(o){
		
		_hand = {
		
			success:function(o){
				
				eval('resp = '+o.responseText);
					
					if (eval(resp.cadastrado)) {
						GET('mostrando').style.display = 'block';
						GET('cadastro').style.display = 'none';
						GET('produtos').style.display = 'block';
						GET('mcpf').innerHTML = resp.cpf || resp.cnpj;
						GET('mnome').innerHTML = resp.nome;
						GET('mend').innerHTML = resp.end;
						VENDA.cliente = resp;
					
					} else {
							
						GET('cadastro').style.display = 'block';
						GET('cadastro_sec').style.display = 'block';
						GET('mostrando').style.display = 'none';
						GET('produtos').style.display = 'none';
						
					}
			},
			
			failure:function(o){
				
			}
			
		}
		
		
		
		if (valida_CNPJ(cnpj.value)) {
			p = 'J';
		} else if (valida_CPF(cpf.value)) {
			p = 'F';
		} else {
			p = false;
		}
			
		if ((p) && (GET('nome').value != '') && (GET('end1').value != '') && (GET('num').value !='')) {
			var file = '<?=encode('modulos/pedido_rapido/ajax_cliente.php')?>';
			var url = 'ajax_html.php?file='+file+'&action=insere&c[clientenovo@tipocliente]='+p
						+((p === 'F')?'&c[clientenovo@cpf]='+cpf.value:'&c[clientenovo@cnpj]='+cnpj.value)//'&doc='+(cnpj.value || cpf.value)
						+'&c[clientenovo@nome]='+GET('nome').value
						+'&c[clientenovo@endereco]='+GET('end1').value
						+'&c[clientenovo@numero]='+GET('num').value
						+'&c[clientenovo@complemento]='+GET('cmpl').value
						+'&c[clientenovo@cidade]='+GET('cidade').value
						+'&c[clientenovo@estado]='+GET('uf').value;
						
			YAHOO.util.Connect.asyncRequest('GET', encodeURI(url), _hand);
			
		} else {
			
			alert('Preencha TODOS os campos');
			
			return false
			
		}
		
	}
	
	YAHOO.util.Event.addListener(cpf, "blur", function(e, oSelf) { 
				VENDA.procura_cliente(oSelf,'cfp');
	},cpf);
	
	YAHOO.util.Event.addListener(cnpj, "blur", function(e, oSelf) { 
				VENDA.procura_cliente(oSelf,'cnpj');
	},cnpj);
	
	YAHOO.util.Event.addListener(salvar, "click", function(e, oSelf) { 
				VENDA.insere_cliente(oSelf)
	},salvar);
	
	YAHOO.util.Event.addListener(uf, "change", function(e,oSelf) { 
	
		_hand = {
			success:function(o){
				
				eval('resp = '+o.responseText); 	
				
				var cid = GET('cidade');
				cid.options.length = 0;
				cid.options[0] = new Option('--SELECIONE A CIDADE--',-1);
					i = 1;
					for (var recKey in resp.cidades){ 
						if(recKey != '______array') {
							cid.options[i] = new Option(resp.cidades[recKey].nome,resp.cidades[recKey].nome);
							i++;
						}
					}	
					
			},
			failure:function(o){
				
			}
		}
 		var  file = '<?=encode('modulos/pedido_rapido/ajax_cliente.php')?>';
		
		YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&action=cidades&uf='+oSelf.value), _hand)
	
	}, uf);
	
</script>