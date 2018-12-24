<style>
.setinha{
	background:none !important;
	padding: 0px !important;
	margin:10px 0 0 0 !important;
	border:none !important;
}
</style>
<?  
	//Cria a página
	$pagina = new pagina("rma_produtos","PRODUTOS POR CB");

	//Seta o elemento grid na página
	$pagina->setGrid("codprod,(select nomeprod from produtos where codprod = codbarra.codprod) as nomeprod,(select nome from fornecedor where fornecedor.codfor = (select codfor from oc where oc.codoc = codbarra.codoc)) as forn,codbarra,(select numnf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod) as nf,(select DATE_FORMAT(datanf,\'%d/%m/%Y\') from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod) as dtnf, codoc, (select pcu from ocprod where ocprod.codprod = codbarra.codprod and ocprod.codoc = codbarra.codoc) as preco,(select ' . ')as laudo, (select nome from empresa where codemp = codbarra.codemp) as empo,DATE_FORMAT(DATE_ADD((select datanf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod), INTERVAL (select garantia from ocprod WHERE ocprod.codprod = codbarra.codprod AND codoc = codbarra.codoc) MONTH),\'%d/%m/%Y\') as garantia", "codbarra", "codbarra = \'X\'", "Lista de produtos","idrma","v_rma","220");
	$pagina->grid->set_rowformatter('aaaaaa_formatter');
	
	
	$pagina->AddPesquisa($pagina->grid->addPesquisa('codbarra','N/S'));
	#$pagina->grid->AddFuncao('empacota','',array('html'=>'<img src=\"modulos/mod_rma/images/arrow.png\"><img src=\"modulos/mod_rma/images/act_empacotar.png\" onClick=\"javascript:check_atualiza();\"/><img src=\"modulos/mod_rma/images/act_addrma.png\" onClick=\"javascript:myTabtab_rma_atrev.set(\'activeIndex\',0);\"/>'));
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	#$pagina->grid->AddAcao('checkbox', '', array('campo'=>'idrma', 'head'=>' ', tamanho=>'10'));
	$pagina->grid->AddColuna("idrma_a", "RMA", "Number", "14", "''", 'central');
	$pagina->grid->AddColuna("codprod", "COD", "String", "20", "''", 'central');
	$pagina->grid->AddColuna("codbarra", "N/S", "String", "90", "''", 'central');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "220", "''", '');
	$pagina->grid->AddColuna("data", "Data", "String", "80", "''", 'central');
	$pagina->grid->AddColuna("sts", "Status", "String", "44", "''", 'central');
	
	//visualizar (ALTERAR)
	#$pagina->grid->AddAcao("edit", "modulos/mod_rma/sub_cliente/detalhe_produto.php", array(imagem=>'images/botoes/magnifier_zoom_in.png','modulo'=>'tab_rma_atrev','campo'=>'idrma', tamanho=>12));
	
	//deletar o pct (ALTERAR)
	#$pagina->grid->AddAcao("delete", encode("modulos/libraries/exclui_por_id.php"), array('campo'=>'idrma', tamanho=>15));
	
	$pagina->loadGrid('10');
	$pagina->imprime();
?>
