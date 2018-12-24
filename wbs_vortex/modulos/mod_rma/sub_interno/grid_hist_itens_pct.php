<?

	define('C_ZEBRA','10.10.9.240');
	$bd = new bd();
	$res = $bd->gera_array('codcliente,nome,(select tipo from v_rma_pct where idrmapct = '.$_GET['id'].') as tipo from clientenovo where codcliente = (select short_desc from v_rma_pct where idrmapct = "'.$_GET['id'].'")');
	
	//$res[0]['nome'] = 'SUBSTITUI&Ccedil;&Atilde;O';
	#echo $bd->get_sql();
	$true = ($res[0]['tipo']==2)?1:0;
	$rev =  $res[0]['nome'];
?>
<?  
	//Cria a página
	$pagina = new pagina("rma_produtos_internos_hist_".$_GET['id'],"PRODUTOS NO HISTORICO DE ".$rev);

	//Seta o elemento grid na página
	$pagina->setGrid("idrma, codemp, flag_credito, flag_garantia, flag_disponivel, codprod_tcliente, codbarra_tcliente, idstatus, laudo_rma, codforn as forn,idrma as idrma_a,codbarra,codprod,(select MAX(idrmapct) from v_rma_pctrma where v_rma_pctrma.idrma = v_rma.idrma) as pct, (select nome from vendedor where vendedor.codvend = v_rma.codvend) as vend,(IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma)) as nomeprodi, DATE_FORMAT(data,\'%d/%m/%Y\') as data,(select descr from v_rma_status where v_rma_status.idstatus = v_rma.idstatus) as sts", "v_rma", "idrma in (select idrma from v_rma_pctrma where idrmapct = ".$_GET['id'].")", "Lista de produtos aguardando","idrma","v_rma");
	$pagina->grid->set_rowformatter('aaaaaa_formatter');
	$pagina->AddPesquisa($pagina->grid->addPesquisa('codbarra','N/S').$pagina->grid->addPesquisa('idrma','RMA').$pagina->grid->addPesquisa('1=1 HAVING laudo_rma','<br>REVENDA').$pagina->grid->addPesquisa('1=1 HAVING nomeprodi','PRODUTO'));
	
	#if ($true) $pagina->grid->AddFuncao('empacota','',array('html'=>'<img src=\"modulos/mod_rma/images/arrow.png\" style=\"border:none; background:none;\"><img src=\"modulos/mod_rma/images/act_empacotar.png\" onClick=\"javascript:empacota_devolucao();\"/>'));
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("idrma", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprodi", "PRODUTO", "String", "230", "''", '');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "120", "''", '');
	$pagina->grid->AddColuna("sts","Status","String","80","''","");
	$pagina->grid->AddColuna("codbarra_tcliente", "NOVO", "String", "120", "'textbox'", '');
	$pagina->grid->AddAcao("edit", "modulos/mod_rma/sub_interno/grid_view_item_hist.php", array('modulo'=>'tab_rma_interno','campo'=>'idrma', tamanho=>15));

	
	$pagina->grid->setSorted('idrma_a','desc');
	$pagina->loadGrid('10');
	$pagina->imprime();
?>