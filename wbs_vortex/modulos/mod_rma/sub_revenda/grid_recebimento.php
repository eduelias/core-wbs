<style>
.wbshead{
	border:none !important;
	text-align:center !important;
	vertical-align:middle !important;
	font-size:8px !important;
	border-width: thin;
}
</style>

<?  
	//Cria a página
	$pagina = new pagina("rma_produtos","PRODUTOS AGUARDANDO");

	//Seta o elemento grid na página
	$pagina->setGrid("idrma,preco_in,preco_icms,preco_ipi, codprod,(IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma)) as nomeprod, laudo_rma as revenda, idrma as idrma_a, codbarra,(select descr from v_rma_status where v_rma.idstatus = v_rma_status.idstatus) as status,(select nome from vendedor where vendedor.codvend = v_rma.codvend) as vend, DATE_FORMAT(data,\'%d/%m/%Y\') as data", "v_rma", "not idrma in (select idrma from v_rma_pctrma where idrmapct in (select idrmapct from v_rma_pct)) and (codvend = ".$_SESSION['id']." or codvend = 0 or ".$_SESSION[id]." = 11) and v_rma.tipo_rma = \'REV\'", "Lista de produtos aguardando","idrma","v_rma");
	
	$pagina->grid->set_rowformatter('WBS.modulo.rowFormatter');
	
	$pagina->grid->AddFuncao('empacota','',array('html'=>'<table width=\'100%\' border=\'no\' class=\'wbshead\'><tr><td rowspan=2 width=\'16px\' valign=\'bottom\'><img src=\"modulos/mod_rma/images/arrow.png\" style=\"border:none; background:none;\"></td><td align=\'center\'><img src=\"modulos/mod_rma/images/act_pct_blue.png\" onClick=\"javascript:WBS.modulo.identifica_revenda();\"/></td><td>&nbsp;</td><td align=\'center\'><img src=\"modulos/mod_rma/images/act_pct_green.png\" onClick=\"javascript:WBS.modulo.identifica_revenda(\'1\');\"/></td><td width=\'90%\'></td></tr><tr><td align=\'center\' width=\'32px\'><center>TRANSP</center></td><td>&nbsp;</td><td align=\'center\' width=\'32px\'><center>BALC&Atilde;O</center></td></tr></table>'));
	
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("idrma_a", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "280", "''", '');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "200", "''", '');
	$pagina->grid->AddColuna('preco_in','PRECO','String',60,"''",'');
	$pagina->grid->AddColuna('preco_icms','ICMS','String',60,"''",'');
	$pagina->grid->AddColuna('preco_ipi','IPI','String',60,"''",'');
	$pagina->grid->AddColuna("status", "Status", "String", "80", "''", '');
	$pagina->grid->AddAcao("delete", encode("modulos/libraries/exclui_por_id.php"), array('campo'=>'idrma', tamanho=>15));
	$pagina->grid->setSorted('idrma_a','desc');
	
	$pagina->loadGrid('10');
	$pagina->imprime();
?>