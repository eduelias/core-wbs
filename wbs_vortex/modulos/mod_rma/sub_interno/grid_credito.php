<?  
	//Cria a página
	$pagina = new pagina("rma_produtos_credito","PRODUTOS AGUARDANDO NF DE DEVOLUÇÃO");

	//Seta o elemento grid na página
	$pagina->setGrid("idrma as ida, codbarra_tcliente, CONCAT(\'R$ \',preco_in) as preco_in, CONCAT(preco_ipi,\'%\') as ipi, CONCAT(preco_icms,\'%\') as icms, flag_garantia, idstatus as ids, laudo_rma, codbarra, codprod, DATE_FORMAT((select MAX(data) from v_rma_hstatus where v_rma_hstatus.idstatus = ids and v_rma_hstatus.idrma = ida),\'%d/%m/%Y\') as datasts, (select nome from clientenovo where codcliente = (select short_desc from v_rma_pct where idrmapct = (select MIN(idrmapct) from v_rma_pctrma where v_rma_pctrma.idrma = v_rma.idrma))) as revenda, (IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma)) as nomeprod, DATE_FORMAT(data,\'%d/%m/%Y %h:%i\') as data,(select descr from v_rma_status where v_rma_status.idstatus = v_rma.idstatus) as sts", "v_rma", "idstatus = 9 and flag_credito", "Lista de produtos aguardando","idrma","v_rma");
	$pagina->grid->set_rowformatter('myRowFormatter');

	$pagina->AddPesquisa($pagina->grid->addPesquisa('codbarra','N/S').$pagina->grid->addPesquisa('idrma','<br>RMA').$pagina->grid->addPesquisa('1=1 HAVING revenda','REVENDA').$pagina->grid->addPesquisa('1=1 HAVING nomeprod','PRODUTO'));
	
	//$pagina->grid->AddFuncao('empacota','',array('html'=>'<img src=\"modulos/mod_rma/images/arrow.png\" style=\"border:none; background:none;\"><img src=\"modulos/mod_rma/images/fileprint.png\" onClick=\"javascript:empacota_devolucao()\"/><img src=\"modulos/mod_rma/images/act_empacotar.png\" onClick=\"javascript:empacota_devolucao();\"/>'));
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	//$pagina->grid->AddAcao('rma_cond_checkbox', '', array('campo'=>'idstatus', 'head'=>' ', tamanho=>'15', condicao=>'(oData==7||oData==10)||((oRecord.getData("flag_garantia")==0)&&oData==4)', img_lock=>'lock'));
	#$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("ida", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("revenda", "REVENDA", "String", "200", "''", '');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "290", "''", '');
	$pagina->grid->AddColuna("preco_in", "R$", "String", "80", "''", '');
	$pagina->grid->AddColuna("icms", "ICM", "String", "60", "''", '');
	$pagina->grid->AddColuna("ipi", "IPI", "String", "60", "''", '');
	$pagina->grid->AddColuna("datasts", "SAIDA", "String", "90", "''", 'td_center td_bold');
	#$pagina->grid->AddColuna("codbarra", "N/S", "String", "100", "''", '');	
	
	//$pagina->grid->AddColuna("codbarra_tcliente", "NOVO", "String", "80", "'textbox'", '');
	//$pagina->grid->AddAcao('rma_mark_garantia', '', array('campo'=>'flag_garantia', 'head'=>' ', tamanho=>'15'));
	#$pagina->grid->AddColuna("flag_garantia", "GAR", "String", "15", "", '');
	$pagina->grid->setSorted('idrma','desc');
	$pagina->loadGrid('10');
	$pagina->imprime();
?>