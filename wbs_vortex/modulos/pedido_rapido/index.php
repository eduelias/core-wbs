<link href="modulos/pedido_rapido/form.css" type="text/css" rel="stylesheet">
<script src="modulos/libraries/cpf_cnpj.js" language="javascript"></script>
<script>

	function valor(num) {
		num = num.toString().replace(/\$|\,/g,'');
		if(isNaN(num))
		num = "0";
		sign = (num == (num = Math.abs(num)));
		num = Math.floor(num*100+0.50000000001);
		cents = num%100;
		num = Math.floor(num/100).toString();
		if(cents<10)
		cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		num = num.substring(0,num.length-(4*i+3))+'.'+
		num.substring(num.length-(4*i+3));
		return (((sign)?'':'-') + 'R$ ' + num + ',' + cents);
	}
	
 	var ajax_base = '../modulos/action_ajax.php';
	
	var VENDA = {
		valor_total:0,
		formaspg:{},
		valor_parcelas:0,
		valor_descontos:0,
	};
	
	VENDA.addproduto = function(p) {
		
		VENDA.valor_total += parseFloat(p.preco);
		
		GET('valor_total').innerHTML = valor(VENDA.valor_total);
		
		GET('valor_parcela').value = VENDA.valor_total;
		
		VENDA.table.oDT.addRow(p);
		
	};
	
	VENDA.excluiproduto = function(oRecord){
		
		VENDA.last_exclude = oRecord;
		
		VENDA.table.oDT.deleteRow(oRecord); 
		
		VENDA.valor_total -= parseFloat(oRecord.getData('preco'));
		
		GET('valor_total').innerHTML = valor(VENDA.valor_total);
		
		GET('valor_parcela').value = valor(VENDA.valor_total);
		
	};
	
	VENDA.fecha_pedido = function() {

		
	}
	
	VENDA.produtos = [];
	
	VENDA.getProdutos = function(){
		return this.produtos;	
	}

	var GET = function(id) {
		return document.getElementById(id);
	}
	
	VENDA.addformapg = function () {
		
		VENDA.valor_parcelas = VENDA.valor_parcelas || VENDA.valor_total;
		
		
		
		var forma = GET('pgto');
		
		var valor = GET('valor_parcela');
		
		var parc = GET('parcelas');

		if (valor.value > 0) { 
		
			VENDA.table_pagamentos.oDT.addRow({
				codformapg:forma.value,
				formapg:forma.options[forma.selectedIndex].text,
				valor:valor.value,
				parcelas:parc.value
			});
			
			VENDA.valor_parcelas -= valor.value;
			
			valor.value = VENDA.valor_parcelas.toFixed(2);
			
		}
		
	}
	
	VENDA.exclui_pagamento = function (oRecord) {
		
		var valor = GET('valor_parcela');

		VENDA.table_pagamentos.oDT.deleteRow(oRecord);
			
		VENDA.valor_parcelas += parseFloat(oRecord.getData('valor'));
		
		valor.value = VENDA.valor_parcelas.toFixed(2);
		
		//valor.value = VENDA.valor_parcelas.toFixed(2);
		
	}

		

</script>
<div class="container">
	
    <div class="cliente">
    <div class="secao">CLIENTE</div>
        <div class="form">
        <?php include('modulos/pedido_rapido/cliente.php');?>
        </div>
    </div>
    <br />
<div id="produtos" style="display:none">
    
    	<div class="produtos">
        <div class="secao">PRODUTOS</div>
            <div class="form">
            <?php include('modulos/pedido_rapido/produtos.php'); ?>
            </div>
        </div>  

          
    <div class="pagamento">
    <div class="secao">PAGAMENTO</div>
        <div class="form">
            <?php include('modulos/pedido_rapido/pagamento.php'); ?>
        </div>
    </div>
</div>