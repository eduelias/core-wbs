<?
	$id = $_GET['id'];
	$balc = $_GET['balc'];
	$bd = new bd();
	#pre($_GET);
	$res = $bd->gera_array('IF(cpf,cpf,cnpj) as ident, codcliente, nome from clientenovo where tipo_rev order by nome');
	#pre($bd->get_sql());
	#$ori = $bd->gera_array('codbarra,codprod,codcb,codoc,(select "I") as tipo,tipo_fab as tipo_prod, codemp, (select codfor from oc where codoc = (select codoc from ocprod where codoc = codbarra.codoc order by codoc ASC limit 1)) as codforn, DATE_FORMAT(DATE_ADD((select datanf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod limit 1), INTERVAL (select garantia from ocprod WHERE ocprod.codprod = codbarra.codprod AND codoc = codbarra.codoc limit 1) MONTH),\'%d/%m/%Y\') as garantia from codbarra where codbarra = "'.$id.'" GROUP by codbarra' );
	#codbarra,codprod,codcb,codoc,"I",tipo_fab as tipo_prod,codemp,(select codfor from oc where codoc = (select codoc from ocprod where codprod = codbarra.codprod LIMIT 1)) as codforn','codbarra','codbarra = '.$_GET['id'].' ORDER BY codcb DESC LIMIT 1');
	#echo($bd->get_sql());
	#pre($ori);	 
	 
	/*	REVENDA: <input type="text" name="revenda" size="40"/><br />
	<input type="hidden" name="laudos" value="1" />    <? foreach ($ori[0] as $nome => $val) {?>
    	<input type="hidden" name="<?=$nome?>" value="<?=$val?>">
  
    <? } ?>*/
	$elId = 'dtnf';
	define('MSG_REQ','CAMPO REQUERIDO');
	define('MSG_INV','INVALIDO');
?>
<table width="100%" height="250px" border="no">
<tr><td align="right">REVENDA:</td><td align="left"><select name="revenda" id="revenda">
    <? foreach ($res as $k => $v) { ?>
		<option value="<?=$v['codcliente']?>"><?=substr($v['nome'],0,30).' - '.$v['ident']?></option>
    <? } ?>
	</select></td></tr> 

<tr><td align="right">NUMERO NF: </td><td align="left"><input type="text" name="nf" id='nf' size="20" maxlength="6" value="<?=(($balc)?'BALCAO" disabled="disabled"':'')?>"/></td></tr>


<tr><td align="right" valign="top">DATA NF: </td><td align="left" style="position:relative;"><?='<input type="text" name="dtnf" id="dtnf" disabled="disabled"/><br><div id="'.$elId.'Container" >&nbsp;</div>
			<label id="text_'.$elId.'"><br><span class="textfieldRequiredMsg">'.MSG_REQ.'</span><span class="textfieldInvalidFormatMsg">'.MSG_INV.'</span></label>
			<script>function handleSelect(type,args,obj) {
		var dates = args[0];
		var date = dates[0];
		var year = date[0], month = date[1], day = date[2];

		var txtDate1 = document.getElementById("dtnf");
		txtDate1.value = year+ "-" +month+ "-" +day;
	}
	WBS.cal1 = new YAHOO.widget.Calendar("'.$elId.'Container", {LOCALE_WEEKDAYS:"short"});
	WBS.cal1.selectEvent.subscribe(handleSelect, WBS.cal1, true);
	WBS.cal1.cfg.setProperty("MONTHS_SHORT",   ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]);
		WBS.cal1.cfg.setProperty("MONTHS_LONG",    ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_1CHAR", ["D", "S", "T", "Q", "Q", "S", "S"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_SHORT", ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_MEDIUM",["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]);
		WBS.cal1.cfg.setProperty("WEEKDAYS_LONG",  ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"]);
	WBS.cal1.render();
	</script>'?></td></tr>

<tr><td colspan="2" align="right"><input type="button" value="EMPACOTAR" onclick="storeData()" /></td>
</table>
