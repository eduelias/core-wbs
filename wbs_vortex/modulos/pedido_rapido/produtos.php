<script>
YAHOO.util.Event.addListener(window, "load", function() {
    VENDA.table = function() {
		var fmt = function(elCell,oRecord,oColumn,oData) {	
			oTable = '';	
			elCell.innerHTML = ' - ';
			YAHOO.util.Event.addListener(elCell, "click", function(e, oSelf) {	
				VENDA.excluiproduto(oRecord);
			},elCell);
		}

        var myColumnDefs = [
            {key:"codprod", label:"COD", sortable:true, resizeable:true},
            {key:"nomeprod", label:"PRODUTO", sortable:true, width:680, sortOptions:{defaultDir:YAHOO.widget.DataTable.CLASS_DESC},resizeable:true},
            {key:"preco", label:"PREÇO", formatter:YAHOO.widget.DataTable.formatCurrency, sortable:true, resizeable:true},
            {key:"excluir", label:"X", sortable:true, resizeable:true, formatter:fmt}
        ];

        var myDataSource = new YAHOO.util.DataSource(VENDA.produtos);
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
        myDataSource.responseSchema = {
            fields: ["codprod","nomeprod","preco","codprod"]
        };

        var myDataTable = new YAHOO.widget.DataTable("dt_container", myColumnDefs, myDataSource);
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
	
	var ean = GET('ean13');
	
	var sn = GET('sn');
	
	//CASO O PRODUTO SEJA CONTROLADO POR NUMERO DE SERIE, UTILZIA ESSA FUNÇAO PARA ENCONTRA-LO/VALIDA-LO
	YAHOO.util.Event.addListener(sn, "blur", function(e, oSelf) {
		
		_hand = {
			success:function(o){
				eval('resp = '+o.responseText);
				
				switch (true) {
				
					//CASO HAJA ALGUM ERRO
					case (resp.e.no != 0):{
						alert(resp.e.msg);
						sn.value = '';
					};break;
				
					//CASO NAO HAJA NENHUM PROBLEMA 
					case (eval(resp.ok)):{
						ean.focus();
						VENDA.temp.sn = sn.value;
						VENDA.addproduto(VENDA.temp);	
						GET('scodbarra').style.display = 'none';
						GET('eproduto').innerHTML = '';
						ean.value = '';
						sn.value = '';
					}break;
					
					//TRATE ALGUMA EXCESSÂO
					default:{
						alert(resp.e.msg);
					}break;
				}
					
				
			},
			failure:function(o){
				
			}
		}
		
		var file = '<?=encode('modulos/pedido_rapido/ajax_produtos.php')?>';
		
		//ATENÇAO, EM CASO DE SERIAL NUMBER TESTAR PARA VER SE O MESMO JA NAO ESTÁ NO MESMO PEDIDO
		if (sn.value !== '') WBS.conn.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&action=sn&sn='+oSelf.value+'&codprod='+VENDA.temp.codprod), _hand);
		
		
	},sn);
	
	
	//BUSCA SE O PRODUTO É CONTROLADO POR SERIAL NUMBER. USA APENAS O EAN13
	YAHOO.util.Event.addListener(ean, "blur", function(e, oSelf) {
		
		_hand = {
			success:function(o){
				eval('resp = '+o.responseText);
				
				switch (true) {
				
					//caso haja algum tipo de erro, retorna-lo e exibi-lo
					case (resp.e.no != 0):{
						alert(resp.e.msg);
						ean.value = '';
						ean.focus();
					};break;
					
					//caso o dito produto seja controlado apenas pelo EAN13				
					case (eval(resp.ean)):{
						ean.value = '';
						GET('eproduto').innerHTML = '';
						VENDA.addproduto(resp.produto);	
						GET('scodbarra').style.display = 'none';
						oSelf.focus();
					}break;
					
					//caso o dito produto seja controlado por número de série
					case (!eval(resp.ean)):{
						VENDA.temp = resp.produto;
						GET('eproduto').innerHTML = resp.produto.nomeprod;
						GET('scodbarra').style.display = 'block';
						GET('sn').focus();
					}break;
					
					default:{
						alert(resp.e.msg);
					}break;
				}
								
			},
			failure:function(o){
				
			}
		}
		
		var file = '<?=encode('modulos/pedido_rapido/ajax_produtos.php')?>';
		if (ean.value !== '') WBS.conn.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&action=ean&ean='+oSelf.value), _hand);
		
		
	},ean);
});
</script>

<div id="valor_total"> R$ 00,00</div>
<span id="sean13"><label>CODIGO DE BARRAS (EAN13):</label> <input type="text" id="ean13"></span><br><span id="eproduto"></span><br><span id="scodbarra" style="display:none"><label>SERIAL NUMBER:</label><input type="text" id="sn"></span><br />

<div id="dt_container"></div>
