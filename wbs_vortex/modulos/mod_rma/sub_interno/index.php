<? 
$_SESSION[debug] = 'true';
?>
<link rel="stylesheet" type="text/css" href="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_css.css">
<script type="text/javascript" src="/wbs_vortex/include/classes/min/f=wbs_vortex/modulos/mod_rma/jscss/rma_js.js"></script>
<div id="tt1"></div>
<script>
function mascara_valor(form_campo, tam)
{
	var tecla;
	
	if (!tam) {
		tam = 13;
	} else {
		if (tam < 6) {
			tam = tam + 1;
		} else {
			if (tam < 9) {
				tam = tam + 2;
			} else {
				if (tam < 11) {
					tam = tam + 3
				} else {
					tam = tam + 3
				}
			}
		}
	}
	
	if (document.all) {		tecla = event.keyCode;	} else {
		if (document.layers) tecla = form_campo.which;	}
	
	if ((((tecla) > 47) && ((tecla) < 58)) || (tecla = 8)) //teclas numericas
	{
		//valor do form_campo
		numdig = form_campo.value;
		//tamanho (caracteres) do valor do form_campo
		tamdig = numdig.length;
		//inicia variavel contador
		contador = 0;
		if (tamdig > -1 && tamdig < tam) { //limita 13 caracteres (99.999.999,99)
			//inicia variavel numer		
			numer = "";
			for (i = tamdig; (i >= 0); i--){ //looping de acordo com a variavel tamdig
				if ((parseInt(numdig.substr(i,1))>=0) && (parseInt(numdig.substr(i, 1))<=9)) { //
					//incrementa a variavel contador
					contador++;
					if (contador == 2) {
						//adiciona a "," (vírgula)
						numer = ","+numer;
					}
					if ((contador == 5) || (contador == 8) || (contador == 11)) { //de 3 em 3
						numer = "."+numer;
					}
					numer = numdig.substr(i, 1)+numer;
				}
			}
			form_campo.value = numer;
			return true;
		} else {
			return false;
		}
	} else {
		return(false)
	}
}
	WBS.toolrender = true;
	WBS.rendered = function(ev) {
		ttr = document.getElementById('ttr');
		if (ttr != null) { 
			document.body.removeChild(ttr);
		}
		WBS.tooltip = new YAHOO.widget.Tooltip('ttr', { context: WBS.tooltips });
		WBS.tooltips = new Array();
	};
	WBS.rma = {};
	WBS.rma.codcliente = '';
	WBS.tooltips = Array();
	
	var storeData = function() { // função com method e action próprios para envio de form.
		
		revenda = document.getElementById('revenda');
		nf = document.getElementById('nf');
		dtnf = document.getElementById('dtnf');
		
		arevenda = revenda.value;
		anf = nf.value;
		adtnf = dtnf.value;
		check_atualiza(arevenda,anf,adtnf);
		
		return false;
	}

	
	var myRowFormatter = function(elTr, oRecord) {
		var Dom = YAHOO.util.Dom; 	
		var status = oRecord.getData('status')||oRecord.getData('sts');
		Dom.addClass(elTr, 'm'+status);
		if (oRecord.getData('em_garantia') < 1) {
			Dom.addClass(elTr, 'mark');
		}
		return true;
	}; 
		
	check_prepara = function(balc){
		if (typeof(balc)!='undefined') {
			str = '&balc=1';
		} else {
			str = '';
		}
		divCentral.carrega(changeIt("<?=encode('modulos/mod_rma/sub_interno/ajax_idrevenda.php')?>"+str));
	}
	
	empacota_devolucao = function (){
		WBS.wait.show();
		
		postdata = '';
		_hande = {	
			success: function (o) {
				oTable.requery();
				//WBS.wait.show();
				WBS.wait.hide();
				eval('retorno = '+o.responseText);
				if (retorno['erro'] == 1) {
					alert(retorno['erromsg']);
				} else {
				    alert('ITENS EMPACOTADOS');
				}
			},
			failure: function (o) {
				alert('ERRO DE SERVIDOR');
			},
			timeout:1000
		}
		var checks = document.getElementsByTagName('input');

		var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/ajax_empacota.php')?>&tipo=4&status=8";
		
		var url = changeIt(url);
		//alert(url);
		for (var i=0;i<checks.length;i++){
			if((checks[i].type == 'checkbox')&&(checks[i].checked)){
				postdata += "&"+(i+1)+"="+checks[i].name;
			}															
		};
		
/*		if () {*/
			YAHOO.util.Connect.asyncRequest('POST',url, _hande, postdata);	
/*		} else {
			WBS.wait.hide();
		}*/
	
	}
		
	check_atualiza = function (revenda,nf,dtnf){	
		
		WBS.wait.show();
		postdata = '';
		_hande = {	
			success: function (o) {
				WBS.wait.show();
					
						checks = document.getElementsByTagName('input');
						//var url = "ajax_html.php?file=<encode('modulos/mod_rma/sub_interno/ajax_imprimir.php')?>";
						divCentral.off();
						WBS.wait.hide();
						//url2 = url+postdata;
						onscreen.myDataTablerma_produtos['rma_produtos0'].requery();
						//window.open(url2);
			},
			failure: function (o) {
				alert('ERRO N7892');
			},
			timeout:1000
		}
		var checks = document.getElementsByTagName('input');

		var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/ajax_empacota.php')?>&rev="+revenda+"&nf="+nf+"&dtnf="+dtnf;
		var url = changeIt(url);
		//alert(url);
		for (var i=0;i<checks.length;i++){
			if((checks[i].type == 'checkbox')&&(checks[i].checked)){
				postdata += "&"+(i+1)+"="+checks[i].name;
			}															
		};
		if (revenda) {
			YAHOO.util.Connect.asyncRequest('POST',url, _hande, postdata);	
		} else {
			WBS.wait.hide();
		}
	}
</script>
<?
	$_SESSION['MOD'] = 'RMA';
	//ATENÇÃO, ESTA ROTINA LIMPA OS PACOTES TIPO 2 (RMA INTERNO) QUE FORAM COMPLETADOS ENVIANDO-OS PARA HISTÓRICO
	$bd = new bd();
	$bd->send_sql('update v_rma_pct set hist=\'S\' where v_rma_pct.idrmapct in (select v_rma_pct.idrmapct from v_rma_pctrma,v_rma where v_rma.idrma = v_rma_pctrma.idrma AND v_rma_pct.idrmapct = v_rma_pctrma.idrmapct GROUP BY v_rma_pct.idrmapct having MIN(v_rma.idstatus)=9)');

	include('modulos/mod_rma/sub_interno/tab_interno.php');

?>
<script>
	
</script>