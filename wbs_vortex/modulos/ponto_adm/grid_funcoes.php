<?
	//Cria a página
	$pagina = new pagina("lista_funcoes","Lista de Fu&ccedil;&otilde;es");

	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel('modulos/permissao/forms/pesq_arquivo.php');

	//Seta o elemento grid na página
	$pagina->setGrid("*","ponto_funcoes", "TRUE", "Lista de Funções","codfnc","ponto_funcoes","",'1600');
	
	$pagina->grid->addInsert('25');

	$pagina->grid->AddColuna("codfnc", "Cod", "string", "2em", "''");
	$pagina->grid->AddColuna("desc", "Nome", "string", "12em", "'textbox'");
	$pagina->grid->AddAcao("det_tab", "modulos/ponto_adm/grid_funcao_tem_faixa.php", array('modulo'=>'ponto_adm', 'campo'=>'codfnc'));
	//$pagina->grid->AddAcao("edit", "modulos/permissao/forms/form_arquivo_alt.php");

	$pagina->loadGrid('10');
	$pagina->imprime();

?>