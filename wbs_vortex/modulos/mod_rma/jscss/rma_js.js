//SETANDO AS PROPRIEDADES JS DO MODULO
WBS.modulo = {
	name:'rma',
	ajax: {
		entrada:'WWxjNWEyUlhlSFpqZVRsMFlqSlNabU50TVdoTU1rWnhXVmhuZGxsWGNHaGxSamwzV2xoT2VHUlhiSHBaVmpsc1ltNVNlVmxYVW1oTWJrSnZZMEU5UFE9PQ=='
	}
}

//função que roda depois que a janela de entrada foi construida
WBS.modulo.controle_entrada = function() {			
	var obContainer = document.getElementById('selecionador');
	var cb_input = document.getElementById('cbinput');
	YAHOO.util.Event.addListener(cb_input, "blur", function(e, oSelf) { 
		if (cb_input.value != '') {
			nf_input.value = '';
			obContainer.style.display = 'none';
			WBS.modulo.codbarra(cb_input.value); 
		}
	},cb_input);
	
	var nf_input = document.getElementById('inp_nf');
	
	
	
	var data_nf_select = document.getElementById('tf');
	YAHOO.util.Event.addListener(data_nf_select, "change", function(e, oSelf) { 
		if (nf_input.value != '') {
			WBS.modulo.por_codped(data_nf_select.value);
		}
	},data_nf_select);
	
	YAHOO.util.Event.addListener(nf_input, "blur", function(e, oSelf) { 
		if (nf_input.value!='') {
			cb_input.value = '';
			WBS.modulo.valida_nf(nf_input.value,WBS.modulo.ajax.entrada,obContainer,data_nf_select);
		}
	},nf_input);				  

};
WBS.modulo.rowFormatter = function(tr,rec) {
		var Dom = YAHOO.util.Dom; 	 
			Dom.addClass(tr, 'm'+rec.getData('status'));
		return true;		
}

//FUNÇÃO QUE ACHA DADOS A PARTIR DE UM CODIGO DE BARRAS
WBS.modulo.codbarra = function (value) {
	var oTable = this.rma_entrada.dt;
	oTable.requery('&acao=rev_cb&codbarra='+changeIt(value));	
	oTable.focus();
}

WBS.modulo.valida_nf = function(value,file,container,elsel){
	var obContainer = container;
	WBS.wait.show();
	var _hand = {
		success:function(o){
			eval('resposta = '+o.responseText);
			var arr = resposta;
			if (arr['nfs_encontradas']==1) {
				WBS.modulo.por_codped(arr['datas'][0]['codped']);
				obContainer.style.display = 'none';
				return true;
			} else {
				if (arr['nfs_encontradas']==0) {
					WBS.modulo.rma_entrada.dt.showTableMessage('<font size=2>NOTA FISCAL NAO ENCONTRADA</font>');
					WBS.wait.hide();
					obContainer.style.display = 'none';
				}else{
					WBS.wait.hide();
					tf.options.length = 0;
					elsel.options[0] = new Option('SELECIONE UMA DATA',-1);
					i = 1;
					for (var recKey in arr['datas']){ 
						if(recKey != '______array') {
							elsel.options[i] = new Option(arr['datas'][recKey]['data']+' '+arr['datas'][recKey]['modo_nf'] ,arr['datas'][recKey]['codped']);
							i++;
						}
					}	
					obContainer.style.display = '';
				}
				return false;
			}			
		},
		failure:function(o){
			WBS.console.add(o.responseText);
		}
	}//<?=encode('modulos/mod_rma/sub_cliente/ajax_hnota.php')?>
	var cObj = YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file='+file+'&nf='+value+'&acao=rev_pesq_nf'), _hand);
}

WBS.modulo.por_codped = function(codped) {
	var oTable = this.rma_entrada.dt;
	oTable.requery('&acao=rev_ok_nf&codped='+codped);
	oTable.focus();
}

WBS.modulo.insere_outros = function(file) {
	var fEdit = file;
	var id = 34;
	divCentral.carrega(fEdit+'&formid='+id);
}

WBS.anexa_tooltips = function(ev) {
	var ttips = new Array();
	var imgs = document.getElementsByTagName('img');
	for (var i=0;i<imgs.length;i++){
		if(typeof(imgs[i].title)!='undefined'){
			if(typeof(imgs[i].id)!='undefined') {
				imgs[i].id = 'imagem'+i;
			}
			ttips.push(imgs[i].id);
		}															
	};
	var ttr = document.getElementById('ttr');
	if (ttr != null) { 
		document.body.removeChild(ttr);
	}
	WBS.tooltip = new YAHOO.widget.Tooltip('ttr', { context: ttips });
};

WBS.rma = {};

WBS.tooltips = Array();

WBS.modulo.rowformatter = function(elTr, oRecord) {
	var Dom = YAHOO.util.Dom; 	
	var status = oRecord.getData('status')||oRecord.getData('sts');
	Dom.addClass(elTr, 'm'+status);
	return true;
}; 

WBS.modulo.identifica_revenda = function(balc){
	var str;

	if (balc == '1' ) {
		str = '&balc=1';
	} else {
		str = '';
	}
	divCentral.carrega(changeIt("WWxjNWEyUlhlSFpqZVRsMFlqSlNabU50TVdoTU1rWnhXVmhuZGxsWGNHaGxSamx3V2toS2JHUnRWblZhUjBWMVkwZG9kdz09"+str));
}

empacota_devolucao = function (){
	//alert(revenda);
	WBS.wait.show();
	var postdata = '';
	_hande = {	
		success: function (o) {
			var retorno;
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
	
	var postdata;
	
	url = changeIt(url);

	for (var i=0;i<checks.length;i++){
		if((checks[i].type == 'checkbox')&&(checks[i].checked)){
			postdata += "&"+(i+1)+"="+checks[i].name;
		}															
	};
	WBS.conn.asyncRequest('POST',url, _hande, postdata);	

};
var storeData = function() { // função com method e action próprios para envio de form.
	revenda = document.getElementById('revenda');
	entrada = document.getElementById('entrada');
	nf = document.getElementById('nf');
	dtnf = document.getElementById('dtnf');
	arevenda = revenda.value;
	ent = entrada.value;
	anf = nf.value;
	adtnf = dtnf.value;
	check_atualiza(arevenda,anf,adtnf,ent);
	return false;
};
check_atualiza = function (revenda,nf,dtnf,entrada){	
	WBS.wait.show();
	var branco = false;
	var postdata = '';
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
	};
	
	var checks = document.getElementsByTagName('input');

	var url = "ajax_html.php?file=WWxjNWEyUlhlSFpqZVRsMFlqSlNabU50TVdoTU0wNHhXV3c1Y0dKdVVteGpiVFYyVERKR2NWbFlhR1phVnpGM1dWZE9kbVJIUlhWalIyaDM=&rev="+revenda+"&entrada="+entrada+"&nf="+nf+"&dtnf="+dtnf;
	var url = changeIt(url);
	for (var i=0;i<checks.length;i++){
		if((checks[i].type == 'checkbox')&&(checks[i].checked)){
			postdata += "&"+(i+1)+"="+checks[i].name;
			branco = true;
		}															
	};
	if (revenda && branco) {
		YAHOO.util.Connect.asyncRequest('POST',url, _hande, postdata);	
	} else {
		alert('PACOTE VAZIO?');
		WBS.wait.hide();
	}
}

function mascara_valor(form_campo, e, tam)
{
	var code,tecla,e;
	if (e.keyCode) code = e.keyCode;
	else if (e.which) code = e.which; // Netscape 4.?
	else if (e.charCode) code = e.charCode; // Mozilla
	
	AAA = form_campo;
	
	if ((((code) > 47) && ((code) < 58)) || (code == 8)) //teclas numericas
	{	
		
		if (code==8){
			
			form_campo.value.substr(0,(form_campo.value.length-1)); 
			
		}

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

		//valor do form_campo
		numdig = form_campo.value;
		//tamanho (caracteres) do valor do form_campo
		tamdig = numdig.length;
		//inicia variavel contador
		contador = 0;
		if ((tamdig > -1 && tamdig < tam)) { //limita 13 caracteres (99.999.999,99)
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
						//adiciona o "." (ponto)
						numer = "."+numer;
					}
					//soma o resto do valor com o ponto
					numer = numdig.substr(i, 1)+numer;
				}
			}
			//seta o valor do form_campo
			form_campo.value = numer;
			//retorno da funcao
			return true;
		} else {
			//retorno da funcao
			return false;
		}
	} else {
		if (code==9){ 
			return true;
		}else{
			return false;
		}
	}
}