<?
	//header('Content-Type: text/html; charset=UTF-8');
?>
  	<form method="GET" class="for1" name="form1" >
    <input type="button" onClick="Javascript:WBS.pagina.pesquisa('codpg, codpg AS cod, codmenu, nomem, arquivo, manutencao, senha, novo, habilitado, actionpg, modulo, (SELECT menu FROM seguranca_menu WHERE seguranca_menu.codmenu = seguranca.codmenu) AS menu','seguranca',this.parentNode, onscreen.myDataTablelistaArquivo['listaArquivo0']);" value="Pesquisar" class="submit" style="float:right;"/>
        <label for="codpg">
        	Cod:
            <input type="text" id="codpg" size="4"/>
		</label>
        <label for="nomem">
        	Nome:
            <input type="text" id="nomem" />
		</label>
        <label for="arquivo">
        	Arquivo:
            <input type="text" id="arquivo" />
		</label>
        <label for="descricao">
        	Descri&ccedil;&atilde;o:
            <input type="text" id="descr"/>
		</label>
        <input type="hidden" />
    </form>