

<?  
	//Cria a página
	$pagina = new pagina("confere_pedidos","MODELO 3 - Saída");

	//Seta o elemento grid na página
	$pagina->setGrid("obj","tab","cond","Lista","codnf","pedidonf", "");
	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/confere_m3/ajax_grid.php'),"&data_i=load");
	//$pagina->grid->set_rowformatter('WBS.modulo.rowFormatter');
	
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	//$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("codnf", "COD", "Number", "20");
	$pagina->grid->AddColuna("dataped", "Data", "String", "70", "''", 'td_center');
	$pagina->grid->AddColuna("codped", "Pedido", "Number", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nome", "Cliente", "String", "280", "''", '');
	$pagina->grid->AddColuna("nf", "NF", "String", "50", "''", "''", "''","YAHOO.widget.DataTable.prototype.formatEd_nf");
	$pagina->grid->AddColuna('datanf','Data Nf','String',70, "''", "''", "''","YAHOO.widget.DataTable.prototype.formatEd_datanf");
	$pagina->grid->AddColuna('valornf','Valor','Number',60, "''", "''");
	$pagina->grid->AddColuna("chk", " ", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.formatCheck");	
	//$pagina->grid->AddColuna("status", "Status", "String", "80", "''", '');
	//$pagina->grid->AddAcao("delete", encode("modulos/libraries/exclui_por_id.php"), array('campo'=>'idrma', tamanho=>15));
	$pagina->grid->setSorted('dataped','asc');
	
	$pagina->loadGrid('30');
	$pagina->imprime();
?>