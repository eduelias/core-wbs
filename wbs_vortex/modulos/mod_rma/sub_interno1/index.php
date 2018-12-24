<?
$_SESSION[debug] = true;
?>
<style>
.central{
	text-align:center !important;
};
.icon-boneco { display:block; height: 19px; padding-left: 18px; background: transparent url(../../images/msg_icos.png) 0 -144px no-repeat; }
.icon-alert { display:block; height: 19px; padding-left: 18px;  background: transparent url(../../images/msg_icos.png) 0 -180px no-repeat;}
.icon-traco { display:block; height: 18px; padding-left: 18px;  background: transparent url(../../images/msg_icos.png) 0 -216px no-repeat; }
</style>
 <style>

.mAG.SEPARACAO.yui-dt-even,.m4.yui-dt-even{
	background-color:#EFE !important;
}

.mAG.SEPARACAO.yui-dt-odd,.m4.yui-dt-odd{
	background-color:#E0FFE0 !important;
}

.mPREP.P.ENVIO.yui-dt-even, .m8.yui-dt-even{
	background-color:#FEC !important;
}

.mPREP.P.ENVIO.yui-dt-odd, .m8.yui-dt-odd{
	background-color:#FEEDCB !important;
}

.mSEPARADO.yui-dt-even, .m6.yui-dt-even{
	background-color:#EDC !important;
}

.mSEPARADO.yui-dt-odd, .m6.yui-dt-odd{
	background-color:#EDDCCB !important;
}

.mAG.CONFERENCIA.yui-dt-even, .m16.yui-dt-even{
	background-color:#F96 !important;
}

.mAG.CONFERENCIA.yui-dt-odd, .m16.yui-dt-odd{
	background-color:#F09060 !important;
}

.mSUBSTITUIDO.yui-dt-even, .m7.yui-dt-even{
	background-color:#FDC !important;
}

.mSUBSTITUIDO.yui-dt-odd, .m7.yui-dt-odd{
	background-color:#FEDCCB !important;
}

.mENVIADO.yui-dt-even, .m9.yui-dt-even{
	background-color:#EEB !important;
}

.mENVIADO.yui-dt-odd,  .m9.yui-dt-odd{
	background-color:#EDEDBA !important;
}

.mCREDITO.yui-dt-even, .m10.yui-dt-even{
	background-color:#ADA !important;
}

.mCREDITO.yui-dt-odd,  .m10.yui-dt-odd{
	background-color:#A9DCA9 !important;
}

.mNAO.NOSSO.yui-dt-even, .m13.yui-dt-even{
	background-color:#EFEFEF !important;
	color:AAA;
}

.mNAO.NOSSO.yui-dt-odd,  .m13.yui-dt-odd{
	background-color:#EAEAEA !important;
	color:AAA;
}

.mSEM.GARANTIA.yui-dt-even, .m14.yui-dt-even{
	background-color:#FFEFEF !important;
	/*color:FAA;*/
}

.mSEM.GARANTIA.yui-dt-odd,  .m14.yui-dt-odd{
	background-color:#FFEAEA !important;
	/*color:FAA;*/
}

.mAG.CARTA.CORRECAO.yui-dt-even, .m5.yui-dt-even{
	background-color:#FAFAFA !important;
	/*color:FAA;*/
}

.mAG.CARTA.CORRECAO.yui-dt-odd,  .m5.yui-dt-odd{
	background-color:#F0F0F0 !important;
	/*color:FAA;*/
}

.yui-dt-desc, .yui-dt-asc {
	background-color:#CCC !important;
	opacity:.55;
	filter: alpha(opacity=55);
}

</style>
<div id="tt1"></div>
<script>

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
		
	check_prepara = function(){
	
		divCentral.carrega(changeIt("<?=encode('modulos/mod_rma/sub_interno/ajax_idrevenda.php')?>"));
	}
	
	empacota_devolucao = function (){
		//alert(revenda);
		WBS.wait.show();
		postdata = '';
		_hande = {	
			success: function (o) {
				//WBS.wait.show();
				WBS.wait.hide();
				eval('retorno = '+o.responseText);
				if (retorno['erro'] == 1) {
					alert('MAIS DE UM FORNECEDOR DIFERENTE SELECIONADO');
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

		for (var i=0;i<checks.length;i++){
			if((checks[i].type == 'checkbox')&&(checks[i].checked)){
				postdata += "&"+(i+1)+"="+checks[i].name;
			}															
		};
		YAHOO.util.Connect.asyncRequest('POST',url, _hande, postdata);	
	}
	
		empacota = function (tipo,status){
		WBS.wait.show();
		postdata = '';
		_hande = {	
			success: function (o) {
				WBS.wait.hide();
				eval('retorno = '+o.responseText);
				if (retorno['erro'] == 1) {
					alert('MAIS DE UM FORNECEDOR DIFERENTE SELECIONADO');
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

		var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno1/ajax_empacota.php')?>&tipo="+tipo+"&status="+status;
		
		var url = changeIt(url);

		for (var i=0;i<checks.length;i++){
			if((checks[i].type == 'checkbox')&&(checks[i].checked)){
				postdata += "&"+(i+1)+"="+checks[i].name;
			}															
		};
		YAHOO.util.Connect.asyncRequest('POST',url, _hande, postdata);	
	}
		
	check_atualiza = function (revenda,nf,dtnf){	
		
		WBS.wait.show();
		postdata = '';
		_hande = {	
			success: function (o) {
				WBS.wait.show();
				var checks = document.getElementsByTagName('input');
				divCentral.off();
				WBS.wait.hide();
				onscreen.myDataTablerma_produtos['rma_produtos0'].requery();
			},
			failure: function (o) {
				alert('ERRO N7892');
			},
			timeout:1000
		}
		var checks = document.getElementsByTagName('input');

		var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/ajax_empacota.php')?>&rev=2000";
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
	include('modulos/mod_rma/sub_interno1/tab_interna.php');

?>