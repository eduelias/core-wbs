<?
	//Cria a página
	$pagina = new pagina("hist_adm_tickets","Histórico dos tickets abertos");

	//Seta o elemento grid na página
	$pagina->setGrid("idticket_status,(select nome from vendedor where vendedor.codvend = v_ticket_status.codvend) as nome, data, v_ticket_status.status as status, descricao,v_ticket_status.idticket","v_ticket_status", "v_ticket_status.idticket = ".$_GET['id'], "Lista de tickets","idticket_status","v_ticket_status","",'1600');

	$pagina->AddPesquisa($pagina->grid->addPesquisa('msg','Assunto').$pagina->grid->addPesquisa('idticket','ID'));

	$pagina->grid->AddColuna("idticket_status", "Cod", "String", "14", "''", 'td_bold');
	$pagina->grid->AddColuna("data", "Data historico", "String", "80", "''");
	$pagina->grid->AddColuna("nome", "Operador", "String", "80", "''");
	$pagina->grid->AddAcao('ticket_hstatus', '', array(arquivo=>'','campo'=>'status', 'head'=>'Status', 'tamanho'=>'70', 'sort'=>'true'));
	$pagina->grid->AddColuna("descricao", "Descrição", "String", "80", "''");

	$pagina->loadGrid('10');
	$pagina->imprime();

?>