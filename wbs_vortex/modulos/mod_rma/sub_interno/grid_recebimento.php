<?
	define('C_ZEBRA','10.10.9.240');
?>
<style>
.wbshead{
	border:none !important;
	text-align:center !important;
	vertical-align:middle !important;
	font-size:8px !important;
	border-width: thin;
}
</style>
<script>
	ETQ_ONLINE = 0;
	//formatador de linha 
	aaaaaa_formatter = function(tr,rec){
	
		var Dom = YAHOO.util.Dom; 	 
			Dom.addClass(tr, 'm'+rec.getData('idstatus'));
			
		return true;	
		
	};
	

	function addScript(url) {
	  var s = document.createElement('script');
	  s.type = 'text/javascript';
	  s.src = url;
	  document.getElementsByTagName('head')[0].appendChild(s);
	}
	
	impressoraonline = function(ip) {
		
		//addScript('http://'+ip+'/wbsprint/mod_rma/rma_etq.php');
		
	}
	
	
	impressoraonline("<?=C_ZEBRA?>");
</script>


<?  
	//Cria a página
	$pagina = new pagina("rma_produtos","PRODUTOS AGUARDANDO");

	//Seta o elemento grid na página
	$pagina->setGrid("idrma,codprod,(IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma)) as nomeprod, laudo_rma as revenda, idrma as idrma_a, codbarra,(select descr from v_rma_status where v_rma.idstatus = v_rma_status.idstatus) as status,(select nome from vendedor where vendedor.codvend = v_rma.codvend) as vend, DATE_FORMAT(data,\'%d/%m/%Y\') as data", "v_rma", "not idrma in (select idrma from v_rma_pctrma where idrmapct in (select idrmapct from v_rma_pct)) and (codvend = ".$_SESSION['id']." or codvend = 0) and v_rma.tipo_rma = \'REV\'", "Lista de produtos aguardando","idrma","v_rma");
	$pagina->grid->set_rowformatter('myRowFormatter');
	
	$pagina->grid->AddFuncao('empacota','',array('html'=>'<table width=\'100%\' border=\'no\' class=\'wbshead\'><tr><td rowspan=2 width=\'16px\' valign=\'bottom\'><img src=\"modulos/mod_rma/images/arrow.png\" style=\"border:none; background:none;\"></td><td align=\'center\'><img src=\"modulos/mod_rma/images/act_pct_blue.png\" onClick=\"javascript:check_prepara();\"/></td><td>&nbsp;</td><td align=\'center\'><img src=\"modulos/mod_rma/images/act_pct_green.png\" onClick=\"javascript:check_prepara(\'1\');\"/></td><td width=\'90%\'></td></tr><tr><td align=\'center\' width=\'32px\'><center>TRANSP</center></td><td>&nbsp;</td><td align=\'center\' width=\'32px\'><center>BALC&Atilde;O</center></td></tr></table>'));
	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'15'));
	$pagina->grid->AddColuna("idrma_a", "RMA", "Number", "20", "''", 'td_center');
	$pagina->grid->AddColuna("codprod", "COD", "String", "30", "''", 'td_center');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "280", "''", '');
	#$pagina->grid->AddAcao("rma_prod_status_changer", encode("modulos/mod_rma/sub_cliente/ajax_status.php"), array('campo'=>'idstatus', head=>'STATUS', tamanho=>115));
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "200", "''", '');
	#$pagina->grid->AddColuna("revenda", "LAUDO", "String", "90", "''", '');
	$pagina->grid->AddColuna("status", "Status", "String", "80", "''", '');
	$pagina->grid->AddAcao("delete", encode("modulos/libraries/exclui_por_id.php"), array('campo'=>'idrma', tamanho=>15));
	
	$pagina->grid->setSorted('idrma_a','desc');
	
	$pagina->loadGrid('10');
	$pagina->imprime();
	
?>