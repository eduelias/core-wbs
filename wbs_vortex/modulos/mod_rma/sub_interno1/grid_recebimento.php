<?
	//Cria a página
	$pagina = new pagina("rma_produtos","PRODUTOS AGUARDANDO");

	//Seta o elemento grid na página
	$pagina->setGrid("idrma,codprod,codcb,codcb_ent,(IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma)) as nomeprod, laudo_rma as revenda, idrma as idrma_a, codbarra,(select codemp from codbarra where codcb = v_rma.codcb_ent) as codemp_final, (select descr from v_rma_status where v_rma.idstatus = v_rma_status.idstatus) as status,(select nome from vendedor where vendedor.codvend = v_rma.codvend) as vend, DATE_FORMAT(data,\'%d/%m/%Y\') as data", "v_rma", "not idrma in (select idrma from v_rma_pctrma where idrmapct in (select idrmapct from v_rma_pct where tipo = 5)) and (codvend = ".$_SESSION['id'].") and tipo_rma = \'I\' ", "Lista de produtos aguardando","idrma","v_rma");
	$pagina->grid->set_rowformatter('myRowFormatter');
	
	$pagina->grid->AddFuncao('empacota','',array('html'=>'<img src=\"modulos/mod_rma/images/arrow.png\" style=\"border:none; background:none;\"><img src=\"modulos/mod_rma/images/act_empacotar.png\" onClick=\"javascript:empacota(5,18);\"/>'));
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("idrma_a", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "320", "''", '');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "110", "''", '');
	$pagina->grid->AddColuna("codcb", "FORN", "String", "55", "''", '');
	$pagina->grid->AddColuna("codcb_ent", "CLI", "String", "55", "''", '');
	$pagina->grid->AddColuna("codemp_final", "EMP", "String", "20", "''", '');
	$pagina->grid->AddColuna("status", "Status", "String", "120", "''", '');
	$pagina->grid->AddAcao("delete", encode("modulos/libraries/exclui_por_id.php"), array('campo'=>'idrma', tamanho=>15));
	$pagina->grid->setSorted('idrma_a','desc');
	$pagina->loadGrid('10');
	$pagina->imprime();
?>