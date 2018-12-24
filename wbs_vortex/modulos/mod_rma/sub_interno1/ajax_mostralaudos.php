<?
	include('modulos/mod_rma/classes/rma.class.php');
	
	$rma = new rma;
	$id = $_GET['id'];
	$codcb_ent = $_GET[codcb_ent];
	$codped = $_GET['codped'];

	#pre($_GET);
	$bd = new bd();

	$res = $bd->gera_array('produtos.codprod as codprod,idlaudo,descr from v_rma_laudos,codbarra,produtos where produtos.codprod = codbarra.codprod and v_rma_laudos.codcat = produtos.codcat and codbarra.codbarra = "'.$id.'" GROUP BY idlaudo');
		
	$codprod = $res[0][codprod];

	$origem = $rma->calc_emporigem($codcb_ent);
	
	#pre($rma->get_debug());
	
	$ori = $bd->gera_array('codbarra,@cod := codprod as codprod, ("'.$codcb_ent.'") as codcb_ent, ("'.$origem[0][codcb].'") as codcb,(select "'.$origem[0][codoc].'") as codoc,(select "I") as tipo,(select 17) as idstatus,(select "true") as gar, (select 0) as codped, IF(tipo_fab="","V","P") as tipo_prod, (select "'.$origem[0][codemp].'") as codemp, (select "'.$origem[0][codfor].'") as codforn,(select codfor from oc where codoc = (select codoc from ocprod where codoc = codbarra.codoc order by codoc ASC limit 1)) as codforn, DATE_FORMAT(DATE_ADD((select datanf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod limit 1), INTERVAL (select garantia from ocprod WHERE ocprod.codprod = codbarra.codprod AND codoc = codbarra.codoc limit 1) MONTH),\'%d/%m/%Y\') as garant from codbarra where codcb = '.$codcb_ent.' GROUP by codbarra order by codcb DESC limit 1');
	
	#pre($ori);
	
	if(!is_array($ori)) {
	
		echo 'ERRO, DADOS N ENCONTRADOS';
	
	} else { 
	
		$_SESSION['REVENDA'] = $ori[0]['codemp'];	

?>
<script>
	WBS.sendRma = function(form, ccc) { // função com method e action próprios para envio de form.
		
		input = document.getElementById('in');
		
		WBS.conn.setForm(form);
		var cObj = YAHOO.util.Connect.asyncRequest(form.method, encodeURI(form.action), {
		success:function(o){ 
		input.select();
		input.focus();
			onscreen.myDataTablerma_codbarra["210"].requery();
			onscreen.myDataTablerma_produtos["rma_produtos0"].requery();
			onscreen.myDataTablerma_produtos_libcb["992"].requery();
			
		}, failure:function(o){ alert('ERRO?');}});

		if ( typeof ccc == 'undefined' ) {
			divCentral.off();
		}
		return false;
	}
</script>
<?=($gar)?'':'<h1>ATEN&Ccedil;&Atilde;O: PRODUTO FORA DE GARANTIA</h1>'?>
<form action="ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno1/ajax_insert.php')?>" onSubmit="return WBS.sendRma(this)" method="POST">
LAUDO: <select name="laudos">
    <? foreach ($res as $k => $v) { ?>
		<option value="<?=$v['idlaudo']?>"><?=$v['descr']?></option>
    <? } ?>
	</select><br />
    <? foreach ($ori[0] as $nome => $val) {?>
    	<input type="hidden" name="<?=$nome?>" value="<?=$val?>">
    <?  } ?>
    <input type="submit" value="INICIAR">
</form>
<? } ?>