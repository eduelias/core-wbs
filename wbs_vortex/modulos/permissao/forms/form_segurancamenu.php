<?
	header('Content-Type: text/html; charset=UTF-8');
	
	$id = $_GET[id];

	$b = new bd();
	$s_raw = $b->gera_raw('*','seguranca_menu','codmenu = '.$id,'codmenu');
	
	if ($id == '') { 
		$url = "ajax_html.php?file=".encode('modulos/permissao/inserearquivo.php');
		$ed = 0;
	}else{
		$url = "ajax_html.php?file=".encode('modulos/permissao/alteraarquivo.php');
		$ed = 1;
	}
?>
  	<form action="<? echo $url ?>?id=0" onSubmit="return ajaxForm.subForm(this)" method="POST" class="formulario" style="width:300px">
    <? if ($ed == 1) { ?><input type="hidden" name="cond@seguranca_menu@codmenu" value="<? echo $s_raw['codmenu'];?>"  class="hidden"/> <? } ?>

    <input type="submit" value="Salvar Dados" class="submit" />
    <fieldset>   
    	<legend>Dados do Menu</legend>
        <label class="first" for="menu">
        	Menu:
            <input type="text" name="seguranca_menu@menu" id="menu" value="<? echo $s_raw['menu']; ?>" />
		</label>
        <label for="imagem">
        	Imagem:
           <img src="images/menu/<?=$s_raw['image']?>" />
           <!-- <input type="text" name="segurancagrp@obs" id="obs" value="<? echo $s_raw['obs']; ?>" />-->
		</label>
        <br /><br /><br /><br /><br /><br />
        <label for="habilitado">
        	Habilitado:
            <select id="habilitado" name="seguranca_menu@habilitado">
            	<option value="S" <?=($s_raw['habilitado'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($s_raw['habilitado'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
    </fieldset>
    </form>
   <? // echo $b->get_sql(); ?>