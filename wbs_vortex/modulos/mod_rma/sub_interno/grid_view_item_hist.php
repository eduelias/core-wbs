<script>
	aaaaaa_formatter = function(tr,rec){
	
		var Dom = YAHOO.util.Dom; 	 
			Dom.addClass(tr, 'm'+rec.getData('idstatus'));
			
		return true;	
		
	};
</script>
<? 
	#					Cria a página
	$pagina = new pagina("rma_historico","Historico");

	#					Seta o elemento grid na página
	$pagina->setGrid("DATE_FORMAT(data,\'%d/%m/%Y %H:%i\') as data,(select descr from v_rma_status where v_rma_status.idstatus = v_rma_hstatus.idstatus) as status,(select nome from vendedor where codvend = v_rma_hstatus.codvend) as vend","v_rma_hstatus","idrma = ".$_GET['id'],"idhstatus","data");
	#$pagina->AddPesquisa($pagina->grid->addPesquisa('idrmapct','PCT').$pagina->grid->addPesquisa('data','DATA PCT'));
	
	#                   ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")


	$pagina->grid->AddColuna("data", "DATA", "String", "100", "''", 'central');
	$pagina->grid->AddColuna("vend", "Executor", "String", "100", "''", 'central');
	$pagina->grid->AddColuna("status", "Status", "String", "100", "''", 'central');
	
	$pagina->loadGrid('10');
	$pagina->imprime();
?>