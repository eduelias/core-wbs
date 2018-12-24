<?php
    $tab = new tabs('tab_financeiro');
	
	$tab->addTab("modulos/mod_rma/sub_financeiro/grid_creditos.php",'Aguardando Credito',FALSE);
	
	$tab->show_tabs(0);
?>