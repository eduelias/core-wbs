
<script>

	ETQ_ONLINE = true;
	
	var arr;
	
	WBS.lastcb = '';
	
	var input = document.getElementById('in');
	
	var resposta = {};
	
	procura_cb = function(value){
	
		if (value!=WBS.lastcb) { 
			
			WBS.lastcb = value;
		
			resposta = {};
			
			oTable = onscreen.myDataTablerma_codbarra["210"];
	
			oTable.requery('&codbarra='+changeIt(value));
			
		};
		
	}

	abre_pagina = function(nf,dtnf){

		if (ok_tnf(nf)) {
			
			oTable = onscreen.myDataTablerma_codbarra['210'];

			oTable.requery('&nf='+changeIt(nf)+'&dtnf='+changeIt(dtnf));
			
		}
		
	}
	
	
	YAHOO.util.Event.addListener(input, "blur", function(e, oSelf) { 
		if (input.value != '') {
			procura_cb(input.value);
		}
	},input);

</script>

<? 

	//Cria a página
	$pagina = new pagina("rma_codbarra","C&oacute;digo de barras");

	//Seta o elemento grid na página
	$pagina->setGrid("campo", "obj", "condicao", "Lista de arquivos","naoha","naoha","210");

	$pagina->addObj('Entre com o <b>codigo de barras</b><br> CODBARRA: <input type="text" onblur="javascript:envia(this.value);" id="in"/>');

	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/mod_rma/sub_interno1/ajax_codbarra.php')."&codbarraped=3",false);
	
	#$pagina->grid->AddColuna("codcb", "CB", "String", "25", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("codcb_ent", "CB", "String", "25", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("idrma", "RMA", "String", "25", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "240", "''", '');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "140", "''", 'td_center td_bold');
	$pagina->grid->AddHidden("codcb"); 
	$pagina->grid->AddHidden("codemp");
	$pagina->grid->AddHidden("codforn");
	$pagina->grid->AddHidden("codoc");	
	
	$pagina->grid->AddAcao('novolaudo', 'modulos/mod_rma/ajax/ajax_laudos.php', array('campo'=>'codcat', 'head'=>' ', tamanho=>'25', imagem=>'add.png'));
	$pagina->loadGrid('10');
	$pagina->imprime();
?>
<?
include('modulos/mod_rma/sub_interno1/grid_libcb.php');
include('modulos/mod_rma/sub_interno1/grid_recebimento.php');
?>