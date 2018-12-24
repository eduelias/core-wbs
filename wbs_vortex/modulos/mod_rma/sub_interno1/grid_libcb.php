<?  
	//Cria a página
	$pagina = new pagina("rma_produtos_libcb","CODIGO DO PRODUTO (LIBCB)");
	$pagina->setGrid("campo", "obj", "true", "Lista de arquivos","naoha","naoha","992");
	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/mod_rma/sub_interno1/ajax_libcb.php'),false);
	$pagina->AddPesquisa($pagina->grid->addPesquisa('produtos.codprod','CODPROD').$pagina->grid->addPesquisa('1=1 HAVING nomeprod','PRODUTO'));
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("codcb_ent", "CB", "String", "65", "''", 'td_center td_bold');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "380", "''", 'td_center');
	$pagina->grid->AddColuna("codemp", "EMP", "String", "20", "''", 'td_center');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "140", "''", 'td_center td_bold');
	$pagina->grid->AddAcao('addlaudo2', 'modulos/mod_rma/sub_interno1/ajax_mostralaudos.php', array('campo'=>'em_garantia', 'head'=>' ', tamanho=>'25', imagem=>'add.png'));
	$pagina->loadGrid('10');
	$pagina->imprime();
?>