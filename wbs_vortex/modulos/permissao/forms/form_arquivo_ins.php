<?
	header('Content-Type: text/html; charset=UTF-8');
?>
  	<form action="ajax_html.php?file=<?=encode('modulos/permissao/inserearquivo.php')?>" onsubmit="return ajaxForm.subForm(this)" method="POST" class="formulario" style="width:300px">
    <input type="submit" value="Salvar Dados" class="submit" />
    <fieldset>
    	<legend>Dados do arquivo</legend>
        <label class="first" for="seguranca@nomem">
        	Nome:
            <input type="text" name="seguranca@nomem" id="seguranca@nomem" />
		</label>
        <label for="seguranca@arquivo">
        	Arquivo:
            <input type="text" name="seguranca@arquivo" id="seguranca@arquivo" />
		</label>
        <label for="descr">
        	Descri&ccedil;&atilde;o:
            <input type="text" name="seguranca@descr" id="descr" value="<? echo $seg['descr']?>" />
		</label>
        <label for="seguranca@codmenu">
        	Menu:
            <select name="seguranca@codmenu" id="seguranca@codmenu" >
                <?
                  //  $sm = new seguranca_menu();
                   // $lista = $sm->getlista("TRUE ORDER BY menu");
				   $ban = new bd();
				  $lista = $ban->gera_array('*','seguranca_menu','TRUE ORDER BY menu');
                    foreach($lista as $linha) {
                        echo "<option value='".$linha['codmenu']."'>".$linha['menu']."</option>";
                    }
                ?>
            </select>
		</label>
        <label for="seguranca@habilitado">
        	Habilitado:
            <input type="checkbox" id="seguranca@habilitado" name="seguranca@habilitado" value="S" checked="checked" />
		</label>
        <label for="seguranca@manutencao">
        Manuten&ccedil;&atilde;o:
        	<input type="checkbox" name="seguranca@manutencao" id="seguranca@manutencao" value="S" />
<!--            <input type="radio" id="seguranca@manutencao" name="seguranca@manutencao" value="N" />       -->	
       	</label>
        <label for="seguranca@senha">
        	Senha:
            <input type="checkbox" id="seguranca@senha" name="seguranca@senha" value="S" />
		</label>
        <label for="seguranca@cor">
        	Cor:
            <select name="seguranca@cor" id="seguranca@cor">
                <option value="amarelo">Amarelo</option>
                <option value="azul">Azul</option>
                <option value="verde">Verde</option>
                <option value="vermelho">Vermelho</option>
            </select>
		</label>
    </fieldset>
    </form>