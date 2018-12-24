<button onclick="Javascript:divCentral.carrega('modulos/permissao/forms/form_arquivo_ins.php')" style="float:right">Inserir arquivo</button>
<?
	header('Content-Type: text/html; charset=UTF-8');
	$pagina->imprime();
?>
<script type="text/javascript"> 
	WBS.pagina.showForm.init('ajax_html.php?file=<?=encode('modulos/permissao/forms/pesq_arquivo.php')?>', 'Pesquisa', 'cp_listaArquivo');
</script>

