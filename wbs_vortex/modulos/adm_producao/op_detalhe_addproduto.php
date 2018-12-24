<?
	$bd3 = new bd();
	$emp_arr = $bd3->gera_array('codemp,nome','empresa','TRUE');
	$emp = $bd3->gera_array('codemp,idop','op','idop='.$_GET['id']);
	$pagina = new pagina("op_master");
	$pagina->setGrid("empresa.nome as nomemp, empresa.codemp as codemp, op.idop,op.codemp,op.codprod,op.qtde,op.datainicio,op.hist,op.ativo,empresa.nome,produtos.nomeprod","op JOIN empresa ON op.codemp = empresa.codemp JOIN produtos ON op.codprod=produtos.codprod", "idop = ".$_GET['id'], "Dados da O.P.","idop","op")	;
	echo "<script> WBS.MasterEmp = ".$emp[0]['codemp'].";\r\n WBS.MasterId = ".$_GET['id']."; \r\n</script>";
	$pagina->grid->AddColuna("idop", "Cod", "Number", "1.4em", "''");
	$aux = "[";
	$i = 0;
	foreach ($emp_arr as $empresa){
		$aux .= '{field:"codemp",text:"'.$empresa['nome'].'", value:"'.$empresa['codemp'].'"},';
		$i++;
	}
	$aux = substr($aux, 0, -1);
	$aux .= "]";
	$pagina->grid->AddColuna("nomemp", "Empresa", "String", "9em", "''", "","false","");
	$pagina->grid->AddColuna("nomeprod", "Produto", "String", "8em");
	$pagina->grid->AddColuna("qtde", "QDE", "Number", "1em","''");
	$pagina->grid->AddColuna("datainicio", "Inicio", "DateTime", "8em");
	
	//Carrega o grid no array $pagina->data
	$pagina->grid->setMD('','');
	$pagina->loadGrid('15', false);
	$pagina->imprime();
	
	$pagina1 = new pagina("op_detail");
	$pagina1->setGrid("op.codemp, (op.qtde * op_prod.qtde) AS total, (estoque.qtde - (op.qtde * op_prod.qtde)) as disp, produtos.nomeprod as nomeprod, op_prod.qtde as qtde, op.idop as idop, op_prod.codprod as codprod, idop_prod as id, idop_prod","op_prod JOIN produtos ON op_prod.codprod = produtos.codprod  JOIN op ON op.idop = op_prod.idop JOIN estoque ON op_prod.codprod = estoque.codprod AND estoque.codemp = op.codemp", "op.idop = ".$_GET['id'], "Produtos da OP","idop_prod","op_prod");
	
	//Adiciona as colunas açoes e eventos 
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina1->grid->AddColuna("id", "", "", "1em", "''", "","true","YAHOO.widget.DataTable.formatCheck");
	$pagina1->grid->AddColuna("codprod", "Cod", "Number", "1.4em", "''");
	$pagina1->grid->AddColuna("nomeprod", "Produto", "String", "30em");
	$pagina1->grid->AddColuna("qtde", "QT", "Number", "1em","'textbox'");
	$pagina1->grid->AddColuna("total", "Ttl", "Number", "1em","''");
	$pagina1->grid->AddAcao("negativo", "Dsp", "disp");
	$pagina1->grid->AddAcao("delete", "modulos/permissao/excluiarquivo.php");
	
	
	//Carrega o grid no array $pagina1->data
	$pagina1->loadGrid('15', true);
	$pagina1->imprime();
	//Cria a página
	$pagina1->grid->setMD('op','');
	
	$pagina2 = new pagina("add_prod");

	include('modulos/adm_producao/forms/pesq_produto.php');
	
	//Seta o elemento grid na página
	$pagina2->setGrid("produtos.codprod, produtos.codprod as cod,produtos.codcat, produtos.nomeprod, estoque.qtde as qtde","produtos JOIN estoque ON estoque.codprod = produtos.codprod", "not codcat=72 and not codcat=28 and produtos.hist = \'N\' and estoque.codemp = ".$emp[0]['codemp']." AND estoque.qtde > 0" , "Lista de Periféricos", "idop_prod", "op_prod");
	
	//Adiciona as colunas açoes e eventos 
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	$pagina2->grid->AddColuna("codprod", "", "", "1.4em", "''", "","true","YAHOO.widget.DataTable.formatCheck");
	$pagina2->grid->AddColuna("cod", "Cod", "Number", "2em", "''","","true","YAHOO.widget.DataTable.formatNumber",'Number');
	$pagina2->grid->AddColuna("nomeprod", "Nome", "String", "40em", "");
	$pagina2->grid->AddColuna("qtde", "Estq", "Number", "2em", "", '','true','YAHOO.widget.DataTable.formatNumber','Number');
	$pagina2->grid->AddColuna("codprod", "", "", "1.3em", "","","false","YAHOO.widget.DataTable.formatChoose");
	
	//Carrega o grid no array $pagina2->data
	$pagina2->grid->setMD('op_detail','');
	$pagina2->loadGrid('15',false);
	$pagina2->imprime();
	include("modulos/adm_producao/template/op_detalhe_addproduto.html");
?>