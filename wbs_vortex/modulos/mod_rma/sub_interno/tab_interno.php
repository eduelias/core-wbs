<? 		
		//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
		$tab = new tabs('tab_rma_interno');
		
		#$tab->addTab("modulos/mod_rma/sub_cliente/insert_codbarra.php","1) ENTRADA", false);
		#$tab->addTab("modulos/mod_rma/sub_cliente/atrev_insert.php","1) ENTRADA", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/controle_entrada.php","1) ENTRADA", false);
		$tab->addTab("modulos/mod_rma/sub_interno/grid_pacotes.php","2) PACOTES REV", false);
		$tab->addTab("modulos/mod_rma/sub_interno/grid_produtosporrevenda.php","3) LISTA RMA ABERTOS", false);
		$tab->addTab("modulos/mod_rma/sub_interno/grid_pacotes_envio_revendas.php","4) RETORNO DE MATERIAL", false);
		$tab->addTab("modulos/mod_rma/sub_interno/grid_credito.php","5) CONTROLE DE CREDITO", false);
		$tab->addTab("modulos/mod_rma/sub_interno/grid_pacotes_separacao.php","6) RECEBIMENTO DE PACOTES", false);
		
		$tab->addTab("modulos/mod_rma/sub_interno/grid_historico_pct.php","HISTORICO", false);
		
		#$tab->addTab("modulos/rma_fornecedor/pesq_codbarra.php","3) ACOMPANHAR PACOTES", false);
		#$tab->addTab("modulos/mod_rma/sub_cliente/grid_h_produtos.php"," ACOMPANHAR RMAs", false);	
		#$tab->addTab("modulos/mod_rma/sub_cliente/insert_codbarra.php"," INSERIR POR CODBARRA", false);
		
		
		$tab->show_tabs(0);		
?>	