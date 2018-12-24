<?
	//Cria a página
	$pagina = new pagina("tickets_adm_hist","Sistema de Tickets");

	//Seta o elemento grid na página
	$pagina->setGrid("idticket,status,data_aberto,msg,(select data from v_ticket_status where idticket = v_tickets.idticket ORDER by data DESC limit 1) as data_final","v_tickets", "status >= 4", "Lista de tickets","idticket","v_tickets","",'1600');
	//$pagina->AddPesquisa($pagina->grid->addPesquisa('status','CODPG').$pagina->grid->addPesquisa('nomem','Nome').$pagina->grid->addPesquisa('arquivo','Arquivo'));
	//Adiciona as colunas açoes e eventos 
	//$pagina->grid->AddColuna("codpg", "", "checkbox", "1em", "center","", "'checkbox'");
	$pagina->AddPesquisa($pagina->grid->addPesquisa('msg','Assunto').$pagina->grid->addPesquisa('idticket','ID'));
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	//$pagina->grid->addInsert('30');
	//$
	
	$pagina->grid->AddColuna("idticket", "Cod", "String", "14", "''", 'td_bold');
	$pagina->grid->AddColuna("msg", "Assunto", "String", "300", "'textbox'");
	$pagina->grid->AddColuna("data_aberto", "Abertura", "String", "80", "''");
	$pagina->grid->AddColuna("data_final", "Conclusão", "String", "80", "''");
	$pagina->grid->AddAcao('ticket_hstatus', '', array(arquivo=>'','campo'=>'status', 'head'=>'Status', 'tamanho'=>'70', 'sort'=>'true'));
	$pagina->grid->AddAcao("det_tab", "modulos/tickets_adm/grid_adm_allhist.php", array('modulo'=>'tickets_adm','campo'=>'idticket',head=>'VER'));

	
	//$pagina->addCpanelOff('Pesquisar',$pagina->grid->addPesquisa('codpg','Código'));
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('10');
	$pagina->imprime();
	//include("modulos/permissao/template/listaarquivo.php");

?>