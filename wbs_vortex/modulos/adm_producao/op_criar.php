<?
	
	$bd2 = new bd();
	$emp_arr = $bd2->gera_array('codemp,nome','empresa','TRUE');
	$pagina = new pagina("op_master");
	$pagina->setGrid("op.idop,op.codemp,op.codprod,op.qtde,op.datainicio,op.hist,op.ativo,empresa.nome,produtos.nomeprod","op JOIN empresa ON op.codemp = empresa.codemp JOIN produtos ON op.codprod=produtos.codprod", "not ativo = \'S\'", "OPs","idop","op");
	
	//Adiciona as colunas açoes e eventos 
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina->grid->AddColuna("idop", "", "checkbox", "1em", "''", "","true","YAHOO.widget.DataTable.formatCheck");
	$pagina->grid->AddColuna("idop", "Cod", "string", "1.4em", "''");
	$aux = "[{field:'codemp',text:'Selecione a empresa:', value:'0'},";
	$i = 0;
	foreach ($emp_arr as $empresa){
		$aux .= '{field:"codemp",text:"'.$empresa['nome'].'", value:"'.$empresa['codemp'].'"},';
		$i++;
	}
	$aux = substr($aux, 0, -1);
	$aux .= "]";
	$pagina->grid->AddColuna("nome","Empresa","String", "9em", "'dropdown', editorOptions:{dropdownOptions:".$aux."}");
	$pagina->grid->AddColuna("nomeprod", "Produto", "DateTime", "8em");
	$pagina->grid->AddColuna("qtde", "QTDE", "Number", "2em","'textbox'");
	$pagina->grid->AddColuna("datainicio", "Inicio", "DateTime", "8em");
	$pagina->grid->AddColuna("hist", "HST", "string", "1em", "","","false","YAHOO.widget.DataTable.formatdot");
	$pagina->grid->AddColuna("ativo", "ATV", "string", "1em", "","","false","YAHOO.widget.DataTable.formatdot");
	$pagina->grid->AddAcao("delete", "modulos/adm_producao/actions/exclui_op.php");
	$pagina->grid->AddAcao("edit", "modulos/adm_producao/op_detalhe_op.php");
	$pagina->grid->AddAcao("view", "modulos/adm_producao/op_detalhe_addproduto.php");
	
	
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('15',true);
	$pagina->imprime();
	//Cria a página
	$pagina = new pagina("op_det");

	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel();
	
	//Seta o elemento grid na página
	$pagina->setGrid("codprod, codprod as cod,codcat,nomeprod","produtos", "codcat=72 or codcat=28 AND hist = \'N\'", "Lista de Micros","codprod","produtos");
	
	//Adiciona as colunas açoes e eventos 
	//$pagina->grid->AddColuna("codpg", "", "checkbox", "1em", "center","", "checkbox");
	
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "", parser)
	$pagina->grid->AddColuna("codprod", "", "checkbox", "1.4em", "''", "","true","YAHOO.widget.DataTable.formatCheck");
	$pagina->grid->AddColuna("cod", "Cod", "Number", "2em", "''","","true","YAHOO.widget.DataTable.formatNumber", "Number");
	$pagina->grid->AddColuna("nomeprod", "Nome", "string", "30em", "");
	$pagina->grid->AddAcao("edit", "modulos/adm_producao/op_detalhe_micro.php","codprod");
	$pagina->grid->AddColuna("codprod", "", "", "1.3em", "","","false","YAHOO.widget.DataTable.formatChoose");
	$pagina->grid->setMD('op_master','');
	//Carrega o grid no array $pagina->data
	$pagina->loadGrid('15',false);
	$pagina->imprime();
?>