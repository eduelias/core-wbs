<?

	$bd = new bd();	
	$laudosel = -1;
	$preco_in = '';
	$preco_ipi = '';
	$preco_icms = '';
	$up = 0;
	if (isset($_GET[idrma])) {
		$res1 = $bd->gera_array('idrma,codprod,preco_in,preco_ipi,preco_icms,codcat,descr,v_rma.idlaudo from v_rma,v_rma_laudos where v_rma.idlaudo = v_rma_laudos.idlaudo and idrma ='.$_GET[idrma]);
		$up = $res1[0][idrma];
		$preco_in = $res1[0][preco_in];
		$preco_ipi = $res1[0][preco_ipi];
		$preco_icms = $res1[0][preco_icms];
		$res = $bd->gera_array('idlaudo,descr from v_rma_laudos where codcat = '.$res1[0][codcat]);
		$laudosel = $res1[0][idlaudo];
		#pre($res1);
	} else {
		$res = $bd->gera_array('idlaudo,descr from v_rma_laudos where codcat = '.$_GET[codcat]);
		$resp = $bd->gera_array('pvv from produtos where codprod = '.$_GET[codprod]);
	}
?>
<script>
	if (WBS.rma.flag_garantia==0){
			
			var alrt = document.getElementById('alerta');
				alrt.style.display = '';
	
	}
	
		nomeprod = document.getElementById('nomeprod');
		nomeprod.value = WBS.rma.nomeprod;
		nomeprod.size = 66;
		
	WBS.sendRma = function() { // funçao com method e action próprios para envio de form.

		<? if ($_GET[act]=='REV')  { ?>
			var lauder = document.getElementById('laudos');
			var preco = document.getElementById('preco');
			var icms = document.getElementById('icms');
			var ipi = document.getElementById('ipi');
					
			WBS.rma.preco_icms = icms.value.replace(',','.');
			WBS.rma.preco_ipi = ipi.value.replace(',','.');
			WBS.rma.preco_in = preco.value.replace(',','.');
			WBS.rma.idlaudo = lauder.value;
		
		<? }; ?>
		
		WBS.rma.tipo_rma = '<?=$_GET[act]?>';
		
		var postdata = '';
		for (recKey in WBS.rma){
			postdata += "&"+recKey+"="+WBS.rma[recKey];														
		};
		var _hande = {
			success:function(o){
				<? if ($_GET[act]=='REV')  { ?>
					WBS.modulo.rma_entrada.dt.requery();
					onscreen.myDataTablerma_produtos["rma_produtos0"].requery();
				<? } else { ?>
					onscreen.myDataTablerma_codbarra["210"].requery();
					onscreen.myDataTablerma_produtos["rma_produtos0"].requery();
					onscreen.myDataTablerma_produtos_libcb["992"].requery();
				<? }; ?>
				WBS.panel2.hide();				
				WBS.wait.hide();
			},
			failure:function(o){
				WBS.console.add('<h1>N&Atilde;O FUNCINOU</h1>');
			},
			timeout:1000
		}
		var url = 'ajax_html.php?file=WWxjNWEyUlhlSFpqZVRsMFlqSlNabU50TVdoTU1rWnhXVmhuZGxsWGNHaGxSamx3WW01T2JHTnVVWFZqUjJoMw==&act=<?=(!$up)?'REV':'UPD'?>&idrma=<?=$up?>';

		WBS.conn.asyncRequest('POST',url, _hande, postdata);
		
		return false;
	}
</script>
<? if ($_GET[act]=='REV') { ?><div id='alerta' class="alert_gar" style="display:none">ATEN&Ccedil;&Atilde;O, PRODUTO FORA DE GARANTIA</div> <? } ?>
PRODUTO:<input type="text" id="nomeprod" disabled class="produto"><br>
LAUDO: <select name="laudos" id="laudos" class="laudos">
    <? foreach ($res as $k => $v) { ?>
		<option value="<?=$v['idlaudo']?>" <?=($v[idlaudo]==$laudosel)?'selected':''?>><?=$v['descr']?></option>
    <? } ?>
	</select><br />
    <? if ($_GET[act]=='REV') { ?>
    <label>PRE&Ccedil;O: R$ <input type='text' name='preco' id='preco' value='<?=$preco_in?>'  onkeyPress="if (!(mascara_valor(this,event))) return false;" class="preco_in">
     <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></label>&nbsp;Pre&ccedil;o de tabela: R$ <?=$resp[0]['pvv']?><br />
     <label>ICMS:<input type='text' name='icms' id='icms' value='<?=$preco_icms?>'  onkeyPress="if (!(mascara_valor(this,event))) return false;" size="4" class="preco_icms">
     <span class="textfieldRequiredMsg"></span>(%)<span class="textfieldInvalidFormatMsg"></span></label><br />
     <label> IPI:<input type='text' name='ipi' id='ipi' value='<?=$preco_ipi?>' size="2" class="preco_ipi">
     <span class="textfieldRequiredMsg"></span>(%)<span class="textfieldInvalidFormatMsg"></span></label><br />
     <? } ?>
    <input type="button" value="INICIAR" onClick="WBS.sendRma();" class="laudo_botao">    
    