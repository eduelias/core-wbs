<?
	$id = $_GET['id']; 
	$balc = $_GET['balc'];
	$bd = new bd();

	$res = $bd->gera_array('IF(cpf,cpf,cnpj) as ident, codcliente, nome from clientenovo where tipo_rev order by nome');

	$elId = 'dtnf';
	define('MSG_REQ','CAMPO REQUERIDO');
	define('MSG_INV','INVALIDO');
?>
<style>
.detail_cont {
	background:white;
	border: thin solid #444;
	padding:4px;
	margin:5px;
}
.help_cont {
	background:#FFE;
	border: thin solid #FD0;
	padding:4px;
	margin:5px;
}
.empacotar{
	backbround: url('images/ok.gif') no-repeat;
	display:inline-block;
	margin-left:45%;
	cursor:pointer;
	width:50px;
	padding:4px;
	height:50px;
	border: 3px outset #333;
	font-size:large;
}
</style>
<script>

	var h = {
			c:document.getElementById('help_cont'),
			d:function(title,img,desc){
				this.c.innerHTML = "<table width='100%'><tr><td class='"+img+"' width='3%'>&nbsp;</td><td width='97%'><b>"+title+"</b></td></tr><tr><td colspan=2>"+desc+"</td></tr></table>";
			}
	};

	var disp = {
			container:document.getElementById('dispcont'),
			add:function(str){
				this.container.innerHTML += str+"<br>";
			}
	};


	anterior = function(){
		var step = WBS.modulo.passo;
		if (step>0){
			troca(step-1);
		};
	};
	
	troca = function(passo){
		for (var i=0; i<=4; i++){
			if (i != passo) {
				document.getElementById('passo'+i).style.display = 'none';
			} else {
				document.getElementById('passo'+i).style.display = '';
			}
		}
		WBS.modulo.passo = passo;
	};
	
	WBS.proximo = function(o,ob){
		var passo;
		
		switch (true) {

			case ((o.type=='select-one')&&(o.id=="entrada")):{
				if (o.value!='-1'){

					h.d('Nota Fiscal','gridinfo','Coloque o NÚMERO da nota fiscal DA REVENDA, caso a mesma esteja OK');

					disp.add("<b>EMPRESA:</b>  07.296.453/"+o.options[o.selectedIndex].text);
					
					troca(2);
				}				
			}break;

			case ((o.type=='select-one')&&(o.id=="revenda")):{
				
				if (o.value!='-1'){
					var balc = <?=(($balc)?'true':'false')?>;
					
					passo = 1;
					
					if (balc) {
						passo = 3;
						h.d('DATA DE ENTRADA','gridinfo','Selecione abaixo a data que os RMAs selecionados foram trazidos');
					} else {
						h.d('EMPRESA DE ENTRADA','gridinfo','A QUAL EMPRESA VEIO DESTINADA A NOTA FISCAL');
					}
					
					troca(passo);

					disp.add('<b>REVENDA: </b>'+o.options[o.selectedIndex].text);
					
				} else { 
					alert('SELECIONE UMA REVENDA');
				}
			}break;
			case (o == 'NF'):{

				h.d('DATA DA NF','gridinfo','Selecione abaixo a data da nota fiscal DA REVENDA');
				
				disp.add("<b>NOTA FISCAL: </b>"+ob.value);

				troca(3);
				
			}break;
			case (o == 'CAL'):{

				h.d('EMPACOTAR','gridinfo','Caso os dados acima estejam corretos, clique em <div class="flag_1"></div> abaixo.<br> Caso não esteja correto, feche esta janela e abra novamente');

				disp.add("<b>DATA: </b>"+ob);
				
				troca(4);
				
			}break;
			default:{
				alert('ERRO');
			}
		}
	};
		
	check_atualiza = function (revenda,nf,dtnf,entrada){
		ent = document.getElementById('entrada');
		entrada = ent.value;
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
		var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/ajax_empacota.php')?>&rev="+revenda+"&entrada="+entrada+"&nf="+nf+"&dtnf="+dtnf;
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
	};
</script>
<div id='dispcont' class="detail_cont"></div>
<div id='help_cont' class="help_cont"><table width='100%'><tr><td class='gridinfo' width='3%'>&nbsp;</td><td width='97%'><b>SELECIONE UMA EMPRESA</b></td></tr><tr><td colspan=2>Selecione a revenda a qual a nota fiscal se refere ou revenda a que pertecem as RMAs selecionadas</td></tr></table></div>
<table width="100%" height="150px" border="no">
<tr id="passo1" style="display:none"><td align="right"></td><td align="left"><select name="entrada" id="entrada" onChange="WBS.proximo(this)">
    	<option value='-1'>--- EMPRESA DE ENTRADA ---</option>
		<option value="14">0001-56 - MAXXMICRO</option>
		<option value="15">0003-18 - LJ FABRICA</option>
	</select></td></tr> 
	
<tr id="passo0"><td align="right"></td><td align="left"><select name="revenda" id="revenda" onChange="WBS.proximo(this)">
    	<option value='-1'>--- SELECIONE UMA REVENDA ---</option>
	<? foreach ($res as $k => $v) { ?>
		<option value="<?=$v['codcliente']?>"><?=substr($v['nome'],0,30).' - '.$v['ident']?></option>
    <? } ?>
	</select></td></tr> 

<tr id="passo2" style="display:none"><td align="right">NUMERO NF: </td><td align="left"><input type="text" name="nf" id='nf' size="20" maxlength="6" value="<?=(($balc)?'BALCAO" disabled="disabled"':'')?>" onBlur="WBS.proximo('NF',this)" /></td></tr>


<tr id="passo3" style="display:none"><td align="right" valign="top">DATA NF: </td><td align="left" style="position:relative;"><input type="hidden" name="dtnf" id="dtnf" disabled="disabled"/><br><div id="<?=$elId?>Container" >&nbsp;</div>
			<label id="text_<?=$elId?>"></label>
			<script> function handleSelect(type,args,obj) {
		var dates = args[0];
		var date = dates[0];
		var year = date[0], month = date[1], day = date[2];

		var txtDate1 = document.getElementById("dtnf");
		txtDate1.value = year+ "-" +month+ "-" +day;

		WBS.proximo("CAL", day+"/"+month+"/"+year);
	}
	WBS.cal1 = new YAHOO.widget.Calendar("<?=$elId?>Container", {LOCALE_WEEKDAYS:"short"});
	WBS.cal1.selectEvent.subscribe(handleSelect, WBS.cal1, true);
	WBS.cal1.cfg.setProperty("MONTHS_SHORT",   ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]);
		WBS.cal1.cfg.setProperty("MONTHS_LONG",    ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_1CHAR", ["D", "S", "T", "Q", "Q", "S", "S"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_SHORT", ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_MEDIUM",["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_LONG",  ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"]);
	WBS.cal1.render();
	</script></tr>
	<tr id="passo4" style="display:none"><td colspan=2><img src='images/ok.gif' title='Empacotar' onclick="storeData()" class='empacotar'/></td>
</table>