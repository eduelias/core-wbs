<? 		
		$tab = new tabs('tab_rma_revenda');

		$tab->addTab("modulos/mod_rma/sub_revenda/controle_entrada.php","1) ENTRADA", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/grid_pct_revenda.php","2) PCT REV", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/grid_rma_revenda.php","3) LISTA RMA", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/grid_pct_saida_revenda.php","4) RET DE MAT", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/grid_rma_devolucao_credito.php","5) CREDITO", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/grid_pct_recebimento.php","6) RECEB DE PCTS", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/grid_rma_historico.php","HISTORICO", false);
		$tab->addTab("modulos/mod_rma/sub_revenda/obj_manutencao.php","MANUTEN&Ccedil;&Atilde;O", false);		
		
		$tab->show_tabs(0);		
?>	