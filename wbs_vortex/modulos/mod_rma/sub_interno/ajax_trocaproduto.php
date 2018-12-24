<?

	$bd = new bd();
	session_start();
	$res = $bd->gera_array('idrma,codemp,codprod as codp,(IF(ISNULL(codprod_tcliente),codprod,codprod_tcliente)) as codprod_t,(select nomeprod from produtos where codprod = codp) as nomeprodrma,(select nomeprod from produtos where codprod = codprod_t) as nomeprod, (select qtde-reserva from estoque where codprod = codprod_t AND codemp = v_rma.codemp) as est from v_rma where idrma ='.$_GET['id']);
	#echo $bd->get_sql();
	$codprod = $codprod[0];
	
#echo $bd->get_sql();NS: <input type="text" name="v_rma@codbarra_tcliente" value=""  /><br />
?>
<b> EM RMA: 
<?=$res[0]['codp']?> </b>- <?= $res[0]['nomeprodrma'] ?>
<?
#echo '<form onSubmit="return WBS.sendSTDForm(this);" action="modulos/formularios/act.php" method="post">';
#echo '<form onSubmit="return WBS.sendForm(this);" action="modulos/mod_rma/sub_adm/ajax_nomeporcodprod.php" method="get">';
echo '<form onSubmit="return WBS.sendf(this);" action="modulos/formularios/act.php" method="post">';
?>
CODPROD: <input type="text" name="v_rma@codprod_tcliente" id="codprod_tcliente" value="<?=$res[0]['codprod_t']?>" />
<input type="hidden" name="v_rma@idstatus" value="12">
<input type="hidden" name="v_rma@flag_disponivel" value="1">
<input type="hidden" name="v_rma@codvend" value="<?=$_SESSION['id']?>">
<span id="nomeprod"><?=$res[0]['nomeprod']?></span> (QTDE:<span id="qtde" style="display:inline"><?=$res[0]['est']?></span>)<br><input type="button" id="b_troca" value="TROCAR" /><input type="hidden" name="cond@v_rma@idrma" value="<?=$res[0]['idrma']?>"<input type="submit" id="b_confirma" value="CONFIRMAR" />
</form>
<script>

	var empresa = '<?=$res[0]['codemp']?>'; 
	
	var codprod = document.getElementById('codprod_tcliente');
	
	var bconfirma = document.getElementById('b_confirma');
	
	var btroca = document.getElementById('b_troca');
	
	var nome = document.getElementById('nomeprod');

	var qtde = document.getElementById('qtde');
	
	YAHOO.util.Event.addListener(bconfirma, "click", function(e, oSelf) {
						
						
	}, bconfirma);
	
	YAHOO.util.Event.addListener(btroca, "click", function(e, oSelf) {

		_hand = {
			success:function(o){
				eval('obj ='+o.responseText);
				nome.innerHTML = obj.nomeprod;
				qtde.innerHTML = obj.qtde;
			},
			timeout:1000
		}
		
		var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('ajax_html.php?file="<?=encode('modulos/mod_rma/sub_interno/ajax_nomeporcodprod.php')?>"&codprod='+codprod.value+'&codemp='+empresa), _hand);
		
	}, btroca);

</script>