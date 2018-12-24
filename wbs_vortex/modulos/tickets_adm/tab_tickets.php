	<? 		
			//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
			$tab = new tabs('tickets_adm');
			$tab->addTab("modulos/tickets_adm/grid_adm_tickets.php","Tickets abertos", false);
			$tab->addTab("modulos/tickets_adm/grid_adm_hist.php","Tickets terminados", false);	
			$tab->show_tabs(0);		
	?>
			