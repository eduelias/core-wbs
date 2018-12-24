<?
	header('Content-Type: text/html; charset=iso-8859-1');
	
	$id = $_GET[id];

	$s = new bd();
	$s_raw = $s->gera_array('*','seguranca','codpg ='.$id, '1');
	$seg = $s_raw[0];
?>
  	<form action="ajax_html.php?file=<?=encode('modulos/permissao/alteraarquivo.php')?>" onSubmit="return ajaxForm.subForm(this);" method="POST" class="formulario" style="width:300px">
    <input type="hidden" name="cond@seguranca@codpg" value="<? echo $seg['codpg']?>"  class="hidden"/>
    <input type="submit" value="Salvar Dados" class="submit" />
    <fieldset>
    	<legend>Dados do arquivo</legend>
        <label class="first" for="nomem">
        	Nome:
            <input type="text" name="seguranca@nomem" id="nomem" value="<? echo $seg['nomem'] ?>" />
		</label>
        <label for="arquivo">
        	Arquivo:
            <input type="text" name="seguranca@arquivo" id="arquivo" value="<? echo $seg['arquivo']?>" />
		</label>
        <label for="descricao">
        	Descri&ccedil;&atilde;o:
            <input type="text" name="seguranca@descr" id="descr" value="<? echo $seg['descr']?>" />
		</label>
        <label for="codmenu">
        	Menu:
            <select name="seguranca@codmenu" id="codmenu">
                <?
                    //$sm = new seguranca_menu(); Depreciado pela nova classe bd();
					$sm = new bd();
                    $lista = $sm->gera_array('*','seguranca_menu',"TRUE ORDER BY menu",'1');
                    foreach($lista as $linha) {
						//echo $linha['codmenu'].'  ->  '.$seguranca['codmenu'];
						$sel = ($linha['codmenu'] == $seg['codmenu']?"SELECTED":""); // seguranca_menu[codmenu] == seguranca[codmenu]
						echo "<option value='".$linha['codmenu']."' ".$sel.">".$linha['menu']."</option>";
						//$sel = ($linha->getcodmenu() == $s->getcodmenu()?"SELECTED":"");
                      //  echo "<option value='".$linha->getcodmenu()."' $sel>".$linha->getmenu()."</option>";
                    }
                ?>
            </select>
		</label>
        <label for="habilitado">
        	Habilitado:
            <select id="habilitado" name="seguranca@habilitado">
            	<option value="S" <?=($seg['habilitado'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($seg['habilitado'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
        <label for="manutencao">
        	Manuten&ccedil;&atilde;o:
            <select id="manutencao" name="seguranca@manutencao">
            	<option value="S" <?=($seg['manutencao'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($seg['manutencao'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
        <label for="senha">
        	Senha:
            <select id="senha" name="seguranca@senha">
            	<option value="S" <?=($seg['senha'] == "S"?"SELECTED":"")?>>SIM</option>
                <option value="N" <?=($seg['senha'] == "N"?"SELECTED":"")?>>NAO</option>
            </select>
		</label>
        <label for="cor">
        	Cor:
            <select name="seguranca@cor" id="cor">
                <option value="amarelo" <?=($seg['cor'] == "amarelo"?"SELECTED":"")?>>Amarelo</option>
                <option value="azul" <?=($seg['cor'] == "azul"?"SELECTED":"")?>>Azul</option>
                <option value="verde" <?=($seg['cor'] == "verde"?"SELECTED":"")?>>Verde</option>
                <option value="vermelho" <?=($seg['cor'] == "vermelho"?"SELECTED":"")?>>Vermelho</option>
            </select>
		</label>
    </fieldset>
    </form>