<script>
YAHOO.util.Event.addListener(window, "load", function() {
    VENDA.table = function() {
    
		var fmt = function(elCell,oRecord,oColumn,oData) {	
			
			elCell.innerHTML = '<input size="4" type="text" id="'+oData+'">';
			
			YAHOO.util.Event.addListener(elCell.firstChild, "blur", function(e,oSelf) {
			
				var  file = '<?=encode('modulos/mod_pedido/altera_produto/ajax_produto.php')?>';
    			
    			_hand = {
    				success:function(o){
    					
    					eval('resp = '+o.responseText); 
    					
    					if (resp.pload === null) {
					        alert('Código do produto não encontrado no sistema!');
							oSelf.value = '';
						} else {
	    					if (confirm('Novo produto: '+resp.pload[0].nomeprod+'?')){
	    						
	    						_hand2 = {
	    							success:function(o){
	    								VENDA.table.oDT.deleteRows(0,VENDA.table.oDT.getRecordSet().getLength());
	    								GET('codped').focus();
	    							},
	    							failure:function(o){
	    							}
	    						}
	    						
	    						YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&action=changeprod&id='+oSelf.id+'&novoid='+oSelf.value+'&codped='+pedido.codped), _hand2)
	    						
	    					}
    					}
    				},
    				failure:function(o){
    				
    				}
    			}
    			if (oSelf.value != '')
    			YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&action=searchprod&id='+oSelf.value), _hand)
			
			},elCell.firstChild);
			
		}

        var myColumnDefs = [
            {key:"codprod", label:"COD", sortable:true, resizeable:true},
            {key:"nomeprod", label:"PRODUTO", sortable:true, width:650, sortOptions:{defaultDir:YAHOO.widget.DataTable.CLASS_DESC},resizeable:true},
            {key:"status", label:"Status", sortable:true, resizeable:true},
            {key:"preco", label:"PRE&Ccedil;O", formatter:YAHOO.widget.DataTable.formatCurrency, sortable:true, resizeable:true},
            {key:"codprod", label:"Novo", sortable:true, resizeable:true, formatter:fmt}
        ];

        var myDataSource = new YAHOO.util.DataSource(VENDA.produtos);
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
        myDataSource.responseSchema = {
            fields: ["codprod","nomeprod","preco","status","codprod"]
        };

        var myDataTable = new YAHOO.widget.DataTable("dt_container", myColumnDefs, myDataSource);
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
});
</script>
<div id="dt_container"></div>
