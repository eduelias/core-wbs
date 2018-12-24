<fieldset style="padding:4px;">
	<legend> Pesquisar em Produtos: </legend> 	
    <form method="GET" class="for1" name="form1">
    <input type="button" onClick="Javascript:WBS.pagina.pesquisa('produtos.codprod, produtos.codprod as cod,produtos.codcat, produtos.nomeprod, estoque.qtde as qtde','produtos JOIN estoque ON estoque.codprod = produtos.codprod', this.parentNode, myDataTableadd_prod);" value="Pesquisar" class="submit" style="float:right;"/>
        <label class="first" for="codprod">
        	Cod. Produto:
            <input type="text" id="produtos.codprod" size="4"/>
		</label>
        <label for="nomeprod">
        	Nome:
            <input type="text" id="produtos.nomeprod" />
		</label>
        <label for="codcat">
        	Cod. Categoria:
            <input type="text" id="produtos.codcat" size="4"/>
		</label>
		<input type="hidden" id="estoque.codemp" value="<?=$emp[0]['codemp']?>"/>
        <input type="hidden" id="produtos.hist" value="N" />
    </form>
</fieldset>