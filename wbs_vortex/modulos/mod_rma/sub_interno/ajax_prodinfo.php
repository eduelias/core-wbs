<style>
.yui-skin-sam .yui-dt tr.mark, .yui-skin-sam .yui-dt tr.mark td.yui-dt-asc, .yui-skin-sam .yui-dt tr.mark td.yui-dt-desc { 
	    background:#FF9933
} 
	

</style>
<? $tit = "ETAPA 1 - NOTA FISCAL";
$html = 'NF: <input type="text" tabindex="0" id="numero_fiscal"/><div id="selecionador" style="display:none">DATA NF:<select name="tf" tabindex="1" id="tf"></select></div><input type="button" id="pesquisanota" value="Buscar" >&nbsp;&nbsp;&nbsp;<img src="images/botoes/help.png" id="barrcode" alt="INSERIR CODBARRA" title="INSERIR CODBARRA">'; 
/*
';*/ ?>
<?

	$pagina = new pagina('pre_rma_atrev','Controle pre rma');
	$pagina->addPanObj($html,$tit);
	$tit2 = 'DADOS DO PEDIDO';
	$xtml = '<div id="dados" style="width:680px; height:40px;"> DIGITE OS DADOS CORRETAMENTE </div>';
	$pagina->addPanObj($xtml,$tit2);
	
	$tit2 = 'ETAPA 2 - ESCOLHA O PRODUTO';
	$xtml = '<div id="central" style="width:680px; height:400px;"> DIGITE OS DADOS CORRETAMENTE </div>';
	$pagina->addPanObj($xtml,$tit2);
	$pagina->imprime();

?>
<script>

	var central = document.getElementById('central');
	
	onscreen.rma = {};

	submitter = function(oDados) {
	
		_hande = {
			success:function(o) {
			
				WBS.panel2.hide();
				myTabtab_rma_atrev.set('activeIndex',1);
			
			},
			failure:function(o){
			
			
			}
		}
		
		var sel_laudos = document.getElementById('laudos');
		
		oDados['laudos'] = sel_laudos.value;
		
		postdata = '';
		
		for (var recKey in oDados){
		
			postdata += '&'+recKey+'='+oDados[recKey];
		
		}
	//	postdata = '&q=2';
		
			
		var cObj = YAHOO.util.Connect.asyncRequest('POST', encodeURI('ajax_html.php?file=<?=encode('modulos/mod_rma/sub_cliente/ajax_insert.php')?>'), _hande, postdata);
	
	}




	
	//função que busca no BD se existe NF + DATA no BD
	ok_dtnf = function(iNf, dNf){
	
		
		
		return true;
	
	}
	
	//função que testa se existe o TIPO + NF + DATA no BD
	ok_tnf = function () {
	
		return true;
	
	}
	//container que exibirá o select com as possíveis datas;
	var obContainer = document.getElementById('selecionador');
	
	//pegando o botão de clique
	var bPesq = document.getElementById('pesquisanota');
	
	//pegando elemento numero-fiscal
	var eltx = document.getElementById('numero_fiscal');
	
	//pegando elemento data-fiscal
	var data_fiscal = document.getElementById('dtnf');
	
	//pegando elemento tipo_fiscal
	var tipo_fiscal = document.getElementById('tf');
	
	var barrcode = document.getElementById('barrcode');
	
	YAHOO.util.Event.addListener(barrcode, 'click', function (e, oSelf) { 
	
		_hand = {
			success:function(o){
			
				central.innerHTML = o.responseText;
				WBS.pagina.ExtraiScript(o.responseText);
			
			},
			failure:function(o){
			
			
			}
		}
		
		var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=<?=encode('modulos/mod_rma/sub_cliente/ajax_nfbarrcode.php')?>&codbarra='+eltx.value), _hand);
	
	});

	 
	abre_pagina = function(nf,dtnf){
		//elSelect = oSelf;
		if (ok_tnf(oEl.value)) {
		
			_hand = {
				success:function(o){
					
					central.innerHTML = o.responseText;
					WBS.pagina.ExtraiScript(o.responseText);
				
				},
				failure: function(o) {
				
					alert('ERRO NA COMUNICACAO');
					
				}
			}
		
	}
	
	//função que vai abrir a tela para inserção
	YAHOO.util.Event.addListener(tipo_fiscal, 'change', function (e, oSelf) { WBS.wait.show(); abre_pagina(eltx.value,oSelf.value); } , tipo_fiscal);
	
</script>