<?
	header('Content-Type: text/html; charset=utf-8');
?>
<?
	$id = $_GET[id];
	$s_raw = array();
	
	if ($id == '') { 
		$url = "ajax_html.php?file=".encode('modulos/actions/inserearquivo.php');
		$ed = false;
	}else{	
		$b = new bd();
		$s_raw = $b->gera_raw('*','seguranca_submenu','codsubmenu = '.$id,'codsubmenu');
		$url = "ajax_html.php?file=".encode('modulos/actions/alteraarquivo.php');
		$ed = true;
	}
?>
  	<form action="<? echo $url ?>&id=0" onSubmit="return ajaxForm.subForm(this)" method="POST" class="formulario" style="width:300px">
    <? if ($ed == 1) { ?><input type="hidden" name="cond@seguranca_submenu@codsubmenu" value="<? echo $s_raw['codsubmenu'];?>"  class="hidden"/> <? } ?>

    <input type="submit" value="Salvar Dados" class="submit" />
    <fieldset>   
    	<legend>Dados da Haba</legend>
        <label class="first" for="nome">
        	Nome:
            <input type="text" name="seguranca_submenu@nome" id="nome" value="<? echo $s_raw['nome']; ?>" />
		</label>
         <label for="arquivo">
        	Arquivo:
            <input type="text" name="seguranca_submenu@sub_arquivo" id="arquivo" value="<? echo $s_raw['sub_arquivo']; ?>" />
		</label>
        <label for="ajax">
        	Usa Ajax?
            <select id="habilitado" name="seguranca_submenu@ajax">
            	<option value="S" <?=($s_raw['habilitado'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($s_raw['habilitado'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
        <label for="seguranca_submenu@codpg">
        	P&aacute;gina Mestre:
            <select name="seguranca_submenu@codpg" id="seguranca_submenu@codmenu" >
                <?
				   $ban = new bd();
				   $lista = $ban->gera_array('*','seguranca','TRUE ORDER BY nomem');
                   foreach($lista as $linha) {
				   		$sel = ($s_raw['codpg'] == $linha['codpg'])?'SELECTED':'';
                        echo "<option value='".$linha['codpg']."' $sel>".$linha['nomem']."</option>";
                    }
                ?>
            </select>
		</label>
        <label for="posicao">
        	Posi&ccedil;&atilde;o:
            <input type="text" name="seguranca_submenu@posicao" id="posicao" value="<? echo $s_raw['posicao']; ?>" />
		</label>
    </fieldset>
    </form>
   <? // echo $b->get_sql(); ?>