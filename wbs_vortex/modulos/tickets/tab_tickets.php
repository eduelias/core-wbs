	<? 		
			//pre( explode(' ',$_SERVER['HTTP_USER_AGENT']) );
			$tab = new tabs('tickets');
			$tab->addTab("modulos/tickets/grid_tickets.php","Tickets abertos", false);
			$tab->addTab("modulos/tickets/grid_hist.php","Tickets terminados", false);	
			$tab->show_tabs(0);		
	?>
			