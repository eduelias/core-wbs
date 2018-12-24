<script>
	aaaaaa_formatter = function(tr,rec){
	
		var Dom = YAHOO.util.Dom; 	 
			Dom.addClass(tr, 'm'+rec.getData('status'));
			
		return true;	
		
	};
</script>
<? 
	$true = false;
	$tipo = '(v_rma_pct.tipo = 3)';
	$status = '(v_rma.idstatus = 16)';
	
	if ($_SESSION['MOD'] == 'RMA') {
		
		$true = true;
		$tipo = '(v_rma_pct.tipo = 3 OR v_rma_pct.tipo = 5)';
		$status = '(v_rma.idstatus = 18 or v_rma.idstatus=16)';
	}
	
	#					Cria a página
	$pagina = new pagina("rma_pacotes_sep","PACOTES SEPARA&Ccedil;&Atilde;O");

	#					Seta o elemento grid na página
	$pagina->setGrid("DISTINCT(v_rma_pct.idrmapct) as idrmapct,(select COUNT(v_rma_pctrma.idrma) from v_rma_pctrma where v_rma_pctrma.idrmapct = v_rma_pct.idrmapct) as produtos, vendedor.nome as vend,v_rma_status.descr as status, DATE_FORMAT(v_rma_pct.data,\'%d/%m/%Y %h:%i\') as data","v_rma_pct,v_rma_pctrma,v_rma,v_rma_status,vendedor","v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and v_rma.idrma = v_rma_pctrma.idrma and v_rma_pct.codvend = vendedor.codvend and v_rma.idstatus = v_rma_status.idstatus and ".$status." AND ".$tipo." AND NOT v_rma_pct.hist = \'S\'","v_rma_pct","idrmapct","v_rma_pct");
	$pagina->grid->set_rowformatter('aaaaaa_formatter');	
	$pagina->AddPesquisa($pagina->grid->addPesquisa('idrmapct','PCT').$pagina->grid->addPesquisa('data','DATA PCT'));
	
	#                   ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("idrmapct", "PCT", "Number", "15", "''", 'central');
	$pagina->grid->AddColuna("data", "DATA DO PACOTE", "String", "200", "''", 'central');
	$pagina->grid->AddColuna("vend", "Usuario", "String", "120", "''", 'central');
	$pagina->grid->AddColuna("status", "Status", "String", "180", "''", 'central');
	$pagina->grid->AddColuna("produtos", "QTD", "Number", "20", "", 'central');
	$pagina->grid->AddAcao("rma_romaneio", "modulos/mod_rma/impressos/rmas06_transferencia.php", array('campo'=>'idrmapct', imagem=>'images/botoes/script.png', mensagem=>'Imprimir pacote', tamanho=>20));
	$pagina->grid->AddAcao("det_tab", "modulos/mod_rma/sub_interno/grid_item_empacotado.php", array('modulo'=>'tab_rma_interno','campo'=>'idrmapct', mensagem=>'Produtos do pacote', tamanho=>15));
	if ($true) $pagina->grid->AddAcao("em_rma", "modulos/mod_rma/sub_interno/ajax_recebepacote.php", array('campo'=>'idrmapct', tamanho=>20));
	$pagina->loadGrid('10');
	$pagina->imprime();
?>