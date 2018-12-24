<div class="row">
	<div class="item">
        <label>FORMA DE PAGAMENTO: </label>
        <select id="pgto">
            <option value="00.00">DINHEIRO</option>
            <option value="02.00">DEBITO MASTER</option>
            <option value="02.00">DEBITO VISA</option>
            <option value="04.00">CREDITO MASTER</option>
            <option value="04.00">CREDITO VISA</option>
        </select>
    </div>
    <div class="item">
        <label>VALOR (R$):</label>
        <input type="text" id="valor_parcela" size="20">
    </div>
    <div class="item">
        <label>PARCELAS:</label>
        <input type="text" id="parcelas" size="4" value="1">
    </div>
    <div class="item">
    	<input type="button" value="OK" id="fechar_pedido">
    </div>
    <div class="item">
    	<input type="button" value="+ PG" id="nova_forma">
    </div>
</div>
<br>
<div id="dt_pagamentos"></div>

<script>
YAHOO.util.Event.addListener(window, "load", function() {
    VENDA.table_pagamentos = function() {
		var fmt = function(elCell,oRecord,oColumn,oData) {	
			elCell.innerHTML = ' - ';
			YAHOO.util.Event.addListener(elCell, "click", function(e, oSelf) {	
				VENDA.exclui_pagamento(oRecord);
			},elCell);
		}

        var myColumnDefs = [
            {key:"codformapg", label:"COD", sortable:true, width: 100, resizeable:true},
			{key:"formapg", label:"FORMA", sortable:true, width: 200, resizeable:true},
            {key:"valor", label:"VALOR", formatter:YAHOO.widget.DataTable.formatCurrency, width: 300, sortable:true,resizeable:true},
            {key:"parcelas", label:"PARCELAS", sortable:true, resizeable:true},
            {key:"excluir", label:"X", sortable:true, resizeable:true, formatter:fmt}
        ];

        var myDataSource = new YAHOO.util.DataSource(VENDA.formas_pg);
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
        myDataSource.responseSchema = {
            fields: ["formapg","valor","parcelas"]
        };

        var myDataTable = new YAHOO.widget.DataTable("dt_pagamentos", myColumnDefs, myDataSource);
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
	
	YAHOO.util.Event.addListener(GET('nova_forma'), "click", function(e, oSelf) {
		VENDA.addformapg();
	},GET('fechar_pedido'));
});
</script>