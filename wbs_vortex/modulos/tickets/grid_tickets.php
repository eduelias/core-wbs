<?
	//Cria a página
	$pagina = new pagina("tickets","Sistema de Tickets");

	//Seta o elemento grid na página
	$pagina->setGrid("idticket,status,data_aberto,msg,(select data from v_ticket_status where idticket = v_tickets.idticket order by data desc limit 1) l_status,prioridade","v_tickets", "codvend=".$_SESSION['id']." AND status < 4", "Lista de tickets","idticket","v_tickets","",'1600');

	$pagina->AddPesquisa($pagina->grid->addPesquisa('msg','Assunto').$pagina->grid->addPesquisa('idticket','ID'));
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->addInsert('30');
	
	$pagina->grid->AddColuna("idticket", "Cod", "String", "14", "''", 'td_bold');
	$pagina->grid->AddColuna("msg", "Assunto", "String", "200", "'textbox'");
	$pagina->grid->AddColuna("data_aberto", "Abertura", "String", "110", "''");
	$pagina->grid->AddColuna("l_status", "MODIFICADO", "String", "110", "''");
	$pagina->grid->AddColuna("prioridade", "P", "String", "3", "''");
	$pagina->grid->AddAcao('ticket_status', '', array(arquivo=>'','campo'=>'status', 'head'=>'Status', 'tamanho'=>'90', 'sort'=>'true'));
	$pagina->grid->AddAcao("det_tab", "modulos/tickets/grid_openhist.php", array('modulo'=>'tickets','campo'=>'idticket',head=>'VER'));
	
	$pagina->loadGrid('10');
	$pagina->imprime();

?>
<script>
eval('oTable ='+onscreen.dt[0]);
oTable.hideColumn(4); //SUMINDO COM A COLUNA 'PRIORIDADE' DO GRID.
</script>