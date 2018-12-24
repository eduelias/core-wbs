<?
	//Cria a página
	$pagina = new pagina("lista_faixas","Lista de Faixas Horárias");

	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel('modulos/permissao/forms/pesq_arquivo.php');

	//Seta o elemento grid na página
	$pagina->setGrid("*","ponto_horafaixas", "TRUE", "Lista de Faixas","codfaixa","ponto_horafaixas","",'1600');
	
	$pagina->grid->addInsert('26');

	$pagina->grid->AddColuna("codfaixa", "Cod", "string", "2em", "''");
	$pagina->grid->AddColuna("hora", "Hora", "string", "12em", "'textbox'");
	$pagina->grid->AddColuna("tolerancia", "Tolaerancia (min)", "string", "12em", "'textbox'");
	//$pagina->grid->AddAcao("edit", "modulos/permissao/forms/form_arquivo_alt.php");

	$pagina->loadGrid('10');
	$pagina->imprime();

?>