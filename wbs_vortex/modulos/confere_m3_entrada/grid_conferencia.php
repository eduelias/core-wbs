

<?  
	//Cria a página
	$pagina = new pagina("confere_pedidos","MODELO 3 - Entrada");

	//Seta o elemento grid na página
	$pagina->setGrid("obj","tab","cond","Lista","codnf","pedidonf", "");
	$pagina->grid->setsource("ajax_html.php?file=".encode('modulos/confere_m3_entrada/ajax_grid.php'),"&data_i=load");
	//$pagina->grid->set_rowformatter('WBS.modulo.rowFormatter');
	
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	//$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("codpoc", "COD", "Number", "5");
	$pagina->grid->AddColuna("codoc",'OC',"Number","15", "''", "''", "''","YAHOO.widget.DataTable.prototype.flink");
	$pagina->grid->AddColuna("dataoc", "DATAOC", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nome", "FORN", "String", "50", "''", 'td_bold td_center');
	$pagina->grid->AddColuna("codprod", "PROD", "Number", "15", "''", 'td_center');
	//$pagina->grid->AddColuna("qtderec", "QTDE", "Number", "10", "''", 'td_center');
	$pagina->grid->AddColuna("qtderec", "QTDE", "String", "30", "''", "''", "''","YAHOO.widget.DataTable.prototype.eqtde");
	$pagina->grid->AddColuna("pcu", "PCU", "String", "30", "''", "''", "''","YAHOO.widget.DataTable.prototype.epcu");
	$pagina->grid->AddColuna("numnf", "NF", "String", "30", "''", "''", "''","YAHOO.widget.DataTable.prototype.enf");
	$pagina->grid->AddColuna("datanf", "DTF", "String", "50", "''", "''", "''","YAHOO.widget.DataTable.prototype.ednf");
	$pagina->grid->AddColuna("st1", "ST1", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.est1");
	$pagina->grid->AddColuna("st2", "ST2", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.est2");
	$pagina->grid->AddColuna("ipi", "IPI", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.eipi");
	$pagina->grid->AddColuna("icms", "ICMS", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.eicms");
	$pagina->grid->AddColuna("tiponf", "TIPO", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.etiponf");
	$pagina->grid->AddColuna("voc", "VOC", "String", "30", "''", 'td_bold td_center');
	//$pagina->grid->AddColuna("v_icms", "VICM", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.evicm");
	//$pagina->grid->AddColuna("v_frete", "VFR", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.ev_f");
	//$pagina->grid->AddColuna("v_despesas", "DSP", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.edsp");
	//$pagina->grid->AddColuna("v_icms_frete", "I_F", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.ei_f");
	//$pagina->grid->AddColuna("v_seguro", "SG", "String", "20", "''", "''", "''","YAHOO.widget.DataTable.prototype.esg");
	$pagina->grid->AddColuna("chk", " ", "String", "10", "''", "''", "''","YAHOO.widget.DataTable.prototype.formatCheck");	

	$pagina->grid->setSorted('dataoc','asc');
	
	$pagina->loadGrid('30');
	$pagina->imprime();
?>