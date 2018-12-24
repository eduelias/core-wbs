<script>
//funcao que formata valores 
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
		//retorno da funcao
		return(false)
	}
}
</script>
<?
	pre($_GET);
	
	$codcb = $_GET[codcb];
	$codcb_ent = $_GET[codcb_ent];
	
	$id = $_GET['id'];
	$gar = $_GET['gar'];
	$disp = $_GET['disp'];
	$garant = $_GET['garant']; 
	$codped = explode('<',$_GET['codped']);
	$codped = $codped[0];
	
	#pre($_GET);
	#$codped = ($codped)?$codped:'codped from codbarra where codbarra = "'.$id.'" and codbarraped == 1 ORDER BY codcb DESC limit 1';
	#pre($_GET);
	
	$bd = new bd();
	#pre($_GET);
	$res = $bd->gera_array('idlaudo,descr from v_rma_laudos where codcat = (select codcat from produtos where codprod = (select codprod from codbarra where codbarra = "'.$id.'" LIMIT 1))');
	#pre($bd->get_sql());
	$ori = $bd->gera_array('codbarra, @cod := codprod as codprod, ("'.$codcb_ent.'") as codcb_ent, ("'.$codcb.'") as codcb, codoc,(select "REV") as tipo, (select "'.$garant.'") as garant, (select count(codbarra) from codbarra where codbarraped <> 1 and codbarra.codprod = @cod and (codemp = 14 or codemp = 15)) as disp, (select "'.$codped.'") as codped, tipo_fab as tipo_prod, codemp, idop_sn, (select codfor from oc where codoc = (select codoc from ocprod where codoc = codbarra.codoc order by codoc ASC limit 1)) as codforn, DATE_FORMAT(DATE_ADD((select datanf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod limit 1), INTERVAL (select garantia from ocprod WHERE ocprod.codprod = codbarra.codprod AND codoc = codbarra.codoc limit 1) MONTH),\'%d/%m/%Y\') as garantia from codbarra where codbarra = "'.$id.'" GROUP by codbarra' );
	
	#pre($bd->get_debug());
	
	$resp = $bd->gera_array('pvv from produtos where codprod = '.$ori[0]['codprod']);
	#codbarra,codprod,codcb,codoc,"I",tipo_fab as tipo_prod,codemp,(select codfor from oc where codoc = (select codoc from ocprod where codprod = codbarra.codprod LIMIT 1)) as codforn','codbarra','codbarra = '.$_GET['id'].' ORDER BY codcb DESC LIMIT 1');
	#echo($bd->get_sql());
	#pre($ori);	
	
	/*	REVENDA: <input type="text" name="revenda" size="40"/><br />
	<input type="hidden" name="laudos" value="1" />*/
?>
<script>

	WBS.sendRma = function(form, ccc) { // função com method e action próprios para envio de form.
		
		input = document.getElementById('in');
		
		YAHOO.util.Connect.setForm(form);
		var cObj = YAHOO.util.Connect.asyncRequest(form.method, encodeURI(form.action), {success:function(o){ var oTable;
		input.select();
		input.focus();
			onscreen.myDataTablerma_codbarra["210"].requery();
			onscreen.myDataTablerma_produtos["rma_produtos0"].requery();
		}, failure:function(o){ ;}});

		if ( typeof ccc == 'undefined' ) {
			divCentral.off();
		}
		return false;
	}
</script>
<?=($gar)?'':'<h1>ATEN&Ccedil;&Atilde;O: PRODUTO FORA DE GARANTIA</h1>'?>
<form action="ajax_html.php?file=<?=encode('modulos/mod_rma/sub_interno/ajax_insert.php')?>" onSubmit="return WBS.sendRma(this)" method="POST">
LAUDO: <select name="laudos">
    <? foreach ($res as $k => $v) { ?>
		<option value="<?=$v['idlaudo']?>"><?=$v['descr']?></option>
    <? } ?>
	</select><br />
    <? foreach ($ori[0] as $nome => $val) {?>
    	<?=$nome?><input type="text" name="<?=$nome?>" value="<?=$val?>"><br>
    <?  } ?>
    <label>PRE&Ccedil;O: R$ <input type='text' name='preco' id='preco' value=''  onkeyPress="if (!(mascara_valor(this))) return false;">
     <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></label>&nbsp;Pre&ccedil;o de tabela: R$ <?=$resp[0]['pvv']?><br />
     <label>ICMS:<input type='text' name='icms' id='icms' value=''  onkeyPress="if (!(mascara_valor(this))) return false;">
     <span class="textfieldRequiredMsg"></span>(%)<span class="textfieldInvalidFormatMsg"></span></label><br />
     <label> IPI:<input type='text' name='ipi' id='ipi' value=''  onkeyPress="if (!(mascara_valor(this))) return false;">
     <span class="textfieldRequiredMsg"></span>(%)<span class="textfieldInvalidFormatMsg"></span></label><br />
    <input type="submit" value="INICIAR">    
</form>