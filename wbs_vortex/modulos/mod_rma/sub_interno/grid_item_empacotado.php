<?

	$bd = new bd();
	$res = $bd->gera_array('codcliente,nome from v_rma_pct,clientenovo where v_rma_pct.short_desc = clientenovo.codcliente and v_rma_pct.idrmapct = '.$_GET[id]);
	$true = ($res[0]['tipo']==2)?1:0;
	$rev =  $res[0]['nome'];
	session_start;
	
	$grp = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false;
	//Cria a página
	$pagina = new pagina("rma_produtos_interno".$_GET['id'],"REVENDA: ".$rev."<br> PACOTE: #".$_GET['id']);

	//Seta o elemento grid na página
	$pagina->setGrid("idrma, codemp, IF(codbarra_tcliente=0,flag_credito,2) as flag_credito, IF(codbarra_tcliente=0,flag_garantia,2) as flag_garantia, IF(codbarra_tcliente=0,flag_disponivel,2) as flag_disponivel, codprod_tcliente, codbarra_tcliente, idstatus, laudo_rma, codforn as forn,idrma as idrma_a,codbarra, v_rma.codprod as coprod,(CONCAT(IF(v_rma.codbarra_tcliente<>\'0\',IF(codprod_tcliente<>0,codprod_tcliente,codprod),0),\'</td><td> - </td><td>\',v_rma.codbarra_tcliente)) as info,(select MAX(idrmapct) from v_rma_pctrma where v_rma_pctrma.idrma = v_rma.idrma) as pct, (select nome from vendedor where vendedor.codvend = v_rma.codvend) as vend,(IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma)) as nomeprodi, DATE_FORMAT(data,\'%d/%m/%Y\') as data,(select descr from v_rma_status where v_rma_status.idstatus = v_rma.idstatus) as status", "v_rma", "idrma in (select idrma from v_rma_pctrma where idrmapct = ".$_GET['id'].")", "Lista de produtos aguardando","idrma","v_rma");
	$pagina->grid->set_rowformatter('WBS.modulo.rowFormatter');

	$pagina->grid->AddColuna("idrma", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("coprod", "COD", "String", "50", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprodi", "PRODUTO", "String", "450", "''", '');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "200", "''", '');
	$pagina->grid->AddColuna("status","Status","String","150","''","");
	
	if ($true) $pagina->grid->AddAcao("rma_info", "", array('campo'=>'info', tamanho=>25));
	
	if ($true) $pagina->grid->AddAcao("trufalse_rma", "", array('limagem'=>'images/botoes/lock.png','lmsg'=>'IMPEDIDO','vimagem'=>'images/button_ok.png', 'fimagem'=>'images/cancel.png', 'vmsg'=>'STATUS ATUAL: OK','fmsg'=>'STATUS ATUAL: NO', campo=>'flag_garantia', head=>'GAR', tamanho=>25));
	if ($true) $pagina->grid->AddAcao("trufalse_rma", "", array('limagem'=>'images/botoes/lock.png','lmsg'=>'IMPEDIDO','vimagem'=>'images/button_ok.png', 'fimagem'=>'images/cancel.png', 'vmsg'=>'STATUS ATUAL: OK','fmsg'=>'STATUS ATUAL: NO', campo=>'flag_disponivel', head=>'DSP', tamanho=>25));
	if ($true) $pagina->grid->AddAcao("trufalse_credito", "", array('vimagem'=>'images/botoes/money.png','vmsg'=>'PROC CREDITO INICIADO','fimagem'=>'images/botoes/money_gray.png','fmsg'=>'INICIAR PROC CREDITO', campo=>'flag_credito', head=>' $ ', tamanho=>25));
	if ($true&&$grp) $pagina->grid->AddAcao("rma_trocacliente", encode("modulos/mod_rma/sub_adm/ajax_trocaproduto.php") , array('imagem'=>'images/botoes/arrow_switch.png','msg'=>'TROCAR PRODUTO', campo=>'codprod_tcliente', head=>' ', tamanho=>25));
	if ($true&&$grp) $pagina->grid->AddAcao("edit", "modulos/mod_rma/sub_interno/grid_view_item_hist.php", array('modulo'=>'tab_rma_interno','campo'=>'idrma', tamanho=>25));
	
	$pagina->grid->setSorted('idrma','desc');
	$pagina->loadGrid('5');
	$pagina->imprime();
?>