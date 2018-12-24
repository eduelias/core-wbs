<?
	//Cria a página
	$pagina = new pagina("tickets_adm","Sistema de Tickets");

	//Seta o elemento grid na página
	$pagina->setGrid("idticket,status,data_aberto,v_tickets.msg,prioridade,nome","v_tickets,vendedor","v_tickets.codvend = vendedor.codvend AND status < 4", "Lista de tickets","idticket","v_tickets","",'1600');
	$pagina->grid->addInsert('30');
	$pagina->AddPesquisa($pagina->grid->addPesquisa('nome','Vendedor').$pagina->grid->addPesquisa('v_tickets.msg','Assunto'));
	//$pagina->AddPesquisa($pagina->grid->addPesquisa('status','CODPG').$pagina->grid->addPesquisa('nomem','Nome').$pagina->grid->addPesquisa('arquivo','Arquivo'));
	
	//Adiciona as colunas açoes e eventos	
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	
	$pagina->grid->AddColuna("idticket", "Cod", "Number", "14", "''", 'td_bold');
	$pagina->grid->AddColuna("nome", "Remetente", "String", "90", "''", 'td_bold');
	$pagina->grid->AddColuna("msg", "Assunto", "String", "250", "'textbox'");
	$pagina->grid->AddColuna("data_aberto", "Aberto", "String", "70", "''", 'td_bold');
	//$pagina->grid->AddColuna('prior','prior','String','50',"''",'');
	$pagina->grid->AddAcao('ticket_status_changer', '', array(arquivo=>'','campo'=>'status', 'editor'=>'textbox', 'head'=>'Status', 'tamanho'=>'120', 'sort'=>true));
	$pagina->grid->AddAcao('ticket_prior_changer', '', array(arquivo=>'','campo'=>'prioridade', 'head'=>'Prioridade', 'tamanho'=>'80', 'sort'=>true));
	$pagina->grid->AddAcao("det_tab", "modulos/tickets_adm/grid_adm_allhist.php", array('modulo'=>'tickets_adm','campo'=>'idticket',head=>'VER'));
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('10');
	$pagina->imprime();

?>