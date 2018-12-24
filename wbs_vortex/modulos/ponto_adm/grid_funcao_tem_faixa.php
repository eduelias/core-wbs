<?
	//Cria a página
	$bag = new bd();
	$res = $bag->gera_array('*','ponto_funcoes','codfnc = '.$_GET['id']);
	$pagina = new pagina("lista_faixa_tem_funcao","Lista de Faixas para função: ".$res[0]['desc']);

	echo "<script> WBS.pagina.idgeral = ".$_GET['id'].";\r\n</script>";
	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel('modulos/permissao/forms/pesq_arquivo.php');
	
	$campos = "*,(select codfnc from ponto_fnc_tem_faixa where ponto_fnc_tem_faixa.codfaixa = ponto_horafaixas.codfaixa and ponto_fnc_tem_faixa.codfnc = ".$_GET['id'].") as existe";
	$tb = "ponto_horafaixas";
	//$condicao = "'TRUE'";
	
	//Seta o elemento grid na página
	$pagina->setGrid($campos,$tb,"true", "Lista de Faixas","codfaixa","ponto_fnc_tem_faixa","",'1600');
	
	//$pagina->grid->addInsert('26');

	$pagina->grid->AddColuna("codfaixa", "Cod", "string", "2em", "''");
	$pagina->grid->AddColuna("hora", "Hora", "string", "12em", "'textbox'");
	$pagina->grid->AddColuna("tolerancia", "Tolaerancia (min)", "string", "12em", "'textbox'");
	//$pagina->grid->AddColuna("existe", "Existe", "string", "12em", "'textbox'");
	$pagina->grid->AddAcao("relacional2", "ajax_altera.php", array('modulo'=>'ponto_adm', 'campo'=>'existe'));
	//$pagina->grid->AddAcao("edit", "modulos/permissao/forms/form_arquivo_alt.php");

	$pagina->loadGrid('10');
	$pagina->imprime();

?>