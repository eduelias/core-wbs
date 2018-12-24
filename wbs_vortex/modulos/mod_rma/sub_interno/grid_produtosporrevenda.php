<?
	session_start;
	#pre($_SESSION);
	$grp = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false;  
	
	$true = true;
	//Cria a página
	$pagina = new pagina("rma_produtosporrevenda","PRODUTOS AGUARDANDO RETORNO");

	
	$pagina->setGrid("IF(NOW()>DATE_ADD(v_rma.data,INTERVAL 5 DAY),IF((NOW()>DATE_ADD(v_rma.data,INTERVAL 15 DAY)),\'<img src=images/botoes/error_shield.png width=14px title=\\\"mais de 5 dias\\\">\',\'<img src=images/botoes/alert_shield.png width=14px title=\\\"mais de 2 dias\\\">\'),\'<img src=images/botoes/concluded_shield.png width=14px title=\\\"menos de 2 dias\\\">\') as alerta,v_rma.idrma as idrma, CONCAT(\'<img src=\\\"images/botoes/arrow_up.png\\\" width=9px><b>\',codprod_tcliente,\'</b><br><div style=\\\" color:990000\\\"><img src=\\\"images/botoes/arrow_up_red.png\\\" width=9px>\',v_rma.codprod,\'</div>\') as codprod, (CONCAT(\'<b>\',(IFNULL(LEFT((select nomeprod from produtos where produtos.codprod = codprod_tcliente limit 1),20),\'* * * * *\')),\'</b><br><div style=\\\" color:990000\\\">\',LEFT(IFNULL((select nomeprod from produtos where produtos.codprod = v_rma.codprod limit 1),laudo_rma),20),\'</div>\')) as nomeprod, CONCAT(\'<b>\',codbarra_tcliente,\'</b><br><div style=\\\" color:990000\\\">\',v_rma.codbarra,\'</div>\') as codbarra, IF(v_rma.codbarra_tcliente=0,flag_garantia,2) as flag_garantia, v_rma.idstatus, IF(v_rma.codbarra_tcliente=0,flag_disponivel,2) as flag_disponivel, IF(v_rma.codbarra_tcliente=0,flag_credito,2) as flag_credito, laudo_rma, \'X\' as test, LEFT(clientenovo.nome,35) as revenda, DATE_FORMAT(v_rma.data,\'%d/%m/%Y\') as data, v_rma_status.descr as status", "v_rma,v_rma_status,v_rma_pct,v_rma_pctrma,clientenovo", "v_rma.idstatus = v_rma_status.idstatus and  v_rma.idrma = v_rma_pctrma.idrma AND v_rma_pctrma.idrmapct = v_rma_pct.idrmapct AND v_rma_pct.short_desc = clientenovo.codcliente AND ((not v_rma.idstatus = 9 AND not v_rma.idstatus = 8 AND  v_rma_pct.tipo = 2 AND tipo_rma = \'REV\') or (v_rma.idstatus=13))", "Lista de produtos aguardando","idrma","v_rma");
	$pagina->grid->set_rowformatter('myRowFormatter');

	$pagina->AddPesquisa($pagina->grid->addPesquisa('codbarra','N/S').$pagina->grid->addPesquisa('v_rma.idrma','<br>RMA').$pagina->grid->addPesquisa('1=1 HAVING revenda','REVENDA').$pagina->grid->addPesquisa('1=1 HAVING nomeprod','PRODUTO'));
	
	$pagina->grid->AddFuncao('empacota','',array('html'=>'<img src=\"modulos/mod_rma/images/arrow.png\" style=\"border:none; background:none;\"><img src=\"modulos/mod_rma/images/act_empacotar.png\" onClick=\"javascript:empacota_devolucao();\"/>'));
	$pagina->grid->setRender('WBS.rendered');
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("alerta", " ", "String", "16", "''", 'td_center');
	$pagina->grid->AddAcao('rma_cond_checkbox', '', array('campo'=>'idstatus', 'head'=>' ', tamanho=>'15', condicao=>'(oData==7||oData==10)||((oRecord.getData("flag_garantia")==0)&&oData==4)||(oData==13)||(oData==14)', img_lock=>'lock'));
	#$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("idrma", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("revenda", "REVENDA", "String", "250", "''", '');
	$pagina->grid->AddColuna("codprod", "COD", "String", "50", "''", '');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "180", "''", '');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "140", "'textbox'", '');
	$pagina->grid->AddColuna("status", "status", "String", "100", "''", '');
	if ($true) $pagina->grid->AddAcao("trufalse_rma", "", array('limagem'=>'images/botoes/lock.png','lmsg'=>'IMPEDIDO','vimagem'=>'images/button_ok.png', 'fimagem'=>'images/cancel.png', 'vmsg'=>'STATUS ATUAL: OK','fmsg'=>'STATUS ATUAL: NO', campo=>'flag_garantia', head=>'G', tamanho=>15));
	if ($true) $pagina->grid->AddAcao("trufalse_rma", "", array('limagem'=>'images/botoes/lock.png','lmsg'=>'IMPEDIDO','vimagem'=>'images/button_ok.png', 'fimagem'=>'images/cancel.png', 'vmsg'=>'STATUS ATUAL: OK','fmsg'=>'STATUS ATUAL: NO', campo=>'flag_disponivel', head=>'D', tamanho=>15));
	if ($true) $pagina->grid->AddAcao("trufalse_credito", "", array('vimagem'=>'images/botoes/arrow_undo.png','vmsg'=>'AG DEVOLUCAO','fimagem'=>'images/botoes/arrow_undo_gray.png','fmsg'=>'Iniciar Devolucao', campo=>'flag_credito', head=>' ', tamanho=>15));
	if ($true) $pagina->grid->AddAcao("rma_aguarda_compras", "", array('imagem'=>'images/botoes/cart.png','msg'=>'CLIQUE PARA AGUARDA COMPRAS', campo=>'codbarra', head=>'  ', tamanho=>15));
	if ($true&&$grp) $pagina->grid->AddAcao("rma_trocacliente", encode("modulos/mod_rma/sub_interno/ajax_trocaproduto.php") , array('imagem'=>'images/botoes/arrow_switch.png','msg'=>'TROCAR PRODUTO', campo=>'codprod_tcliente', head=>' ', tamanho=>15));
	$pagina->grid->setSorted('idrma','desc');
	$pagina->loadGrid('30');
	#$pagina->imprime();
	include('modulos/mod_rma/sub_revenda/grid_rma_revenda.php');
?>