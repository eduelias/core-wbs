<script>
	
	var arr;
	
	var input = document.getElementById('in');
	
	var input_nf = document.getElementById('inp');
	
	var tf = document.getElementById('tf');
	
	var obContainer = document.getElementById('selecionador');
	
	var resposta = {};
	
	WBS.lastcb = '';
	
	procura_cb = function(value){
	
		if (value!=WBS.lastcb) { 
			
			WBS.lastcb = value;
		
			resposta = {};
			
			oTable = onscreen.myDataTablerma_codbarra["210"];
	
			oTable.requery('&codbarra='+changeIt(value));
			
		};
		
	}
	
	insere_outros = function() {
		fEdit = '<?=encode('modulos/formularios/act_gera.php')?>';
		//ATENÇÃO, MODIFICAR PARA O SISTEMA;
		id = 34;
		divCentral.carrega(fEdit+'&formid='+id);
	
	}
	
	ok_tnf = function (value) {
	
		return true;
		
	}
	
	abre_pagina = function(sPedido){
		oTable = onscreen.myDataTablerma_codbarra['210'];
		oTable.requery('&codped='+changeIt(sPedido));		
	}
	
	procura_nf = function(value){
	
		WBS.wait.show();
		_hand = {
			success:function(o){
				eval('resposta = '+o.responseText);
				var arr = resposta;
				if (arr['resulta']==1) {
					abre_pagina(arr['datas'][0]['codped']);
					obContainer.style.display = 'none';
					return true;
					
				} else {
				
					WBS.wait.hide();
					tf.options.length = 0;
					tf.options[0] = new Option('SELECIONE UMA DATA',-1);
					i = 1;
					for (var recKey in arr['datas']){ 
						if(recKey != '______array') {
							tf.options[i] = new Option(arr['datas'][recKey]['data']+' '+arr['datas'][recKey]['modo_nf'] ,arr['datas'][recKey]['codped']);
							i++;
						}
					}
					
					obContainer.style.display = '';
					return false;
				}
				
			},
			failure:function(o){
				alert('CONEXÃO FALHOU');
			}
		}
		var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=<?=encode('modulos/mod_rma/sub_cliente/ajax_hnota.php')?>&nf='+value), _hand);
	}
	
	YAHOO.util.Event.addListener(input_nf, "blur", function(e, oSelf) { 
		if (input_nf.value!='') {
			input.value = '';
			procura_nf(input_nf.value);
		}
	},input_nf);
	
	YAHOO.util.Event.addListener(input, "blur", function(e, oSelf) { 
		if (input.value != '') {
			input_nf.value = '';
			procura_cb(input.value);
			//input.focus();
		}
	},input);

	YAHOO.util.Event.addListener(tf, "change", function(e, oSelf) { 
		if (input_nf.value != '') {
			abre_pagina(tf.value);
			resposta.id = tf.index;
		}
	},tf);
</script>

<? 
	//Cria a página
	$pagina = new pagina("rma_codbarra","C&oacute;digo de barras");

	//Seta o elemento grid na página
	$pagina->setGrid("campo", "obj", "condicao", "Lista de arquivos","naoha","naoha","210");
		
	$pagina->addObj('Entre com o <b>codigo de barras</b><br> CODBARRA: <input type="text" onblur="javascript:procura_cb(this.value);" id="in"/><br><BR>OU Com o <b>numero da nota fiscal</b> para produtos com codigo de barras compartilhado,<BR>NF: <input type="text" onblur="javascript:procura_nf(this.value);" tabindex="-1" id="inp"/><div id="selecionador" style="display:none"><select name="tf" tabindex="10" id="tf"></select></div><br><br>OU ainda a <input type="button" onclick="javascript:insere_outros()" value="DESCRI&Ccedil;&Atilde;O"/> de um produto que n&atilde;o seja nosso. <br>');

	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/mod_rma/sub_interno/ajax_codbarra.php'),false);
	$pagina->grid->AddColuna("codcb", " CBO ", "String", "25", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("codcb_ent", " CBE ", "String", "25", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("idrma", "RMA", "String", "25", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("codped", "PEDIDO", "String", "80", "''", 'td_center');
	$pagina->grid->AddColuna("nf", "Nota Fiscal", "String", "80", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "240", "''", '');
	$pagina->grid->AddColuna("quant", "EST", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "140", "''", 'td_center td_bold');
	$pagina->grid->AddAcao('marca_garantia', '', array('campo'=>'garantia', 'head'=>'GARANTIA', tamanho=>'90', imagem=>'add.png'));
	$pagina->grid->AddAcao('addlaudo2', 'modulos/mod_rma/sub_interno/ajax_mostralaudos.php', array('campo'=>'em_garantia', 'head'=>' ', tamanho=>'25', imagem=>'add.png'));
	$pagina->loadGrid('10');
	#$pagina->imprime();
?>
<?
#include('modulos/mod_rma/sub_revenda/grid_rma_entrada.php');
include('modulos/mod_rma/sub_interno/grid_recebimento.php');
?>