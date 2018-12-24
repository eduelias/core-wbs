	<? 		
			//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
			$tab = new tabs('tab_rma_pesquisa');
			
			$tab->addTab("modulos/rma_fornecedor/pesq_codbarra.php","PESQUISAR", false);
/*			$tab->addTab("modulos/mod_rma/sub_cliente/grid_produtos.php","2) EMPACOTAR", false);
			$tab->addTab("modulos/mod_rma/sub_cliente/grid_pacotes.php","3) ACOMPANHAR PACOTES", false);
			$tab->addTab("modulos/mod_rma/sub_cliente/grid_h_produtos.php"," ACOMPANHAR RMAs", false);*/	
			
			
			$tab->show_tabs(0);		
	?>
			