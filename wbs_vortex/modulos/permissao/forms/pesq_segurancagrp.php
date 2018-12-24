<?
	header('Content-Type: text/html; charset=UTF-8');
?>
<form method="GET" class="for1" name="form1" >
    <input type="button" onClick="Javascript:WBS.pagina.pesquisa('*','segurancagrp',this.parentNode);" value="Pesquisar" class="submit" style="float:right;"/>
    	<legend>Pesquisar dados na tabela:&nbsp;&nbsp;&nbsp;</legend>
        <label class="first" for="nomegrp">
        	Nome:
            <input type="text" name="segurancagrp@nomegrp" id="nomegrp" />
		</label>
        <label for="obs">
        	Obs:
            <input type="text" name="segurancagrp@obs" id="obs" />
		</label>
                <input type="hidden" />
    </form>