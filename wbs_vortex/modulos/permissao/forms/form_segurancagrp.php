<?
	header('Content-Type: text/html; charset=UTF-8');
	
	$id = $_GET[id];

	$b = new bd();
	$s_raw = $b->gera_raw('*','segurancagrp','codgrp = '.$id,'codgrp');
	//echo $b->get_sql();
	
	if ($id == '') { 
		$url = "ajax_html.php?file=".encode('modulos/permissao/inserearquivo.php');
		$ed = 0;
	}else{
		$url = "ajax_html.php?file=".encode('modulos/permissao/alteraarquivo.php');
		$ed = 1;
	}
?>
<script>

</script>
  	<form action="<? echo $url ?>" onSubmit="return ajaxForm.subForm(this)" method="POST" class="formulario" style="width:300px">
    <? if ($ed == 1) { ?><input type="hidden" name="cond@segurancagrp@codgrp" value="<? echo $s_raw['codgrp'];?>"  class="hidden"/> <? } ?>

    <input type="submit" value="Salvar Dados" class="submit" />
    <fieldset>   
<!--     <input type="hidden" id="hid_hsenha" name="hsenha" value="<?//$s_raw['hsenha']; ?>" />
    <input type="hidden" id="hid_habilitado" name="habilitado" value="<?//$s_raw['habilitado']; ?>" /> -->
    	<legend>Dados do arquivo</legend>
        <label class="first" for="nomem">
        	Nome:
            <input type="text" name="segurancagrp@nomegrp" id="nomegrp" value="<? echo $s_raw['nomegrp']; ?>" />
		</label>
        <label for="arquivo">
        	Obs:
            <input type="text" name="segurancagrp@obs" id="obs" value="<? echo $s_raw['obs']; ?>" />
		</label>
        <label for="habilitado">
        	Habilitado:
            <select id="habilitado" name="segurancagrp@habilitado">
            	<option value="S" <?=($s_raw['habilitado'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($s_raw['habilitado'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
        <label for="senha">
        	Senha:
            <select id="habilitado" name="segurancagrp@hsenha">
            	<option value="S" <?=($s_raw['hsenha'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($s_raw['hsenha'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
    </fieldset>
    </form>