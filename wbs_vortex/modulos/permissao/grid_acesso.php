<?
	//$grid = new geraGrid("seguranca", "TRUE", "Lista de arquivos","codpg");

	//Cria a página
	$pagina = new pagina("seguranca_submenu","Itens de submenu");
	
	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel();
	
	$id = $_GET['id'];

	if ($id != ''){
		$tb = 'seguranca_submenu,seguranca';
		$cond = "seguranca_submenu.codpg=".$id." AND seguranca.codpg=".$id;
	} else {
		$tb = "seguranca_submenu INNER JOIN seguranca ON seguranca_submenu.codpg = seguranca.codpg";
		$cond = 'TRUE';
	}
//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")

	//Seta o elemento grid na página
	$pagina->setGrid("*", $tb, $cond, "Submenus","codsubmenu","seguranca_submenu");
	
	//Adiciona as colunas açoes e eventos 
	$pagina->grid->AddColuna("posicao", "Pos", "string", "1em", "'textbox'");
	$pagina->grid->AddColuna("nomem", "Menu", "string", "20em", "''");
	$pagina->grid->AddColuna("nome", "Sub-Menu", "string", "20em", "'textbox'");
	$pagina->grid->AddColuna("sub_arquivo", "Arquivo", "string", "10em" , "'textbox'");
$pagina->grid->AddColuna("ajax", "XHR", "", "2em", "","","false","YAHOO.widget.DataTable.formatdot");
	$pagina->grid->AddAcao("edit", "modulos/permissao/forms/form_segurancasubmenu.php");
	$pagina->grid->AddAcao("delete", "modulos/permissao/excluiarquivo.php");
	$pagina->grid->AddEvento("Excluir", "_excluir(segurancaacesso)");
	
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid();
	
	$pagina->imprime();

	//include("modulos/permissao/template/listaacesso.php");

?>