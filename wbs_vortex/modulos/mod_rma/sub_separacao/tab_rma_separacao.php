<? 		
		//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
		$tab = new tabs('tab_rma_interno');
		
		$tab->addTab("modulos/mod_rma/sub_separacao/grid_separacao.php","REQUISI&Ccedil;&Otilde;ES RMA", false);
		$tab->addTab("modulos/mod_rma/sub_interno/grid_pacotes_separacao.php","PACOTES RMA", false);	
		
		$tab->show_tabs(0);		
?>	