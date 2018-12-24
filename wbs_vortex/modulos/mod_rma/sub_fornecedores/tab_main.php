<?php 
	$tab = new tabs('rma_fornecedor');
	
	$tab->addTab('modulos/mod_rma/sub_fornecedores/grid_rma_aguardando.php','RMAs',false);
	$tab->addTab('modulos/mod_rma/sub_fornecedores/grid_pct_enviar.php','PCTs',false);
	
	$tab->show_tabs(0);
?>