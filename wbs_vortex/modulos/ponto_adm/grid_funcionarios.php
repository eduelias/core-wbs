<script>
	YAHOO.util.DataSource.parseAkilo = function (o) {
		
		res = parseInt(o);
		
		return res;
		
	}
</script>
<?
	//Cria a página
	$pagina = new pagina("lista_funcionarios","Lista de Fucionários");
 
	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel('modulos/permissao/forms/pesq_arquivo.php');

	//Seta o elemento grid na página
	$pagina->setGrid("codfnc, codvend, confianca, LEFT(CAST(HEX(MD5(codvend)) AS CHAR),12) as codbarra, vendedor.nome as login, clientenovo.nome,email,doc,cpf","clientenovo,vendedor", "cpf=doc AND not cpf = %22%22", "Lista de Funcionários","codvend","vendedor","",'1600');
	
	//$pagina->grid->addInsert('25');
	
	//($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "", $parser = 'String') 
	$pagina->grid->AddColuna("codfnc", "FUNCAO #", "Number", "2em", "'textbox'");
	$pagina->grid->AddColuna("codvend", "VEND #", "Number", "10", "''");
	$pagina->grid->AddColuna("codbarra", "COD BARRA", "String", "80", "''");
	$pagina->grid->AddColuna("login", "Login", "string", "70", "''");
	$pagina->grid->AddColuna("nome", "NOME", "string", "250", "''");
	$pagina->grid->AddColuna("email", "Email", "string", "250", "''");
	$pagina->grid->AddColuna("cpf", "DOC", "string", "150", "''");
	$pagina->grid->AddAcao('enum_sn', 'ajax_altera.php', array(arquivo=>'ajax_altera.php','campo'=>'confianca', 'head'=>'CONF'));
	//$pagina->grid->AddColuna("email", "CPF", "string", "12em", "'textbox'");
	//$pagina->grid->AddAcao("det_tab", "modulos/ponto_adm/grid_funcao_tem_faixa.php", array('modulo'=>'ponto_adm', 'campo'=>'codfnc'));
	//$pagina->grid->AddAcao("edit", "modulos/permissao/forms/form_arquivo_alt.php");
	$pagina->grid->setSorted('codvend');
	$pagina->loadGrid('30');
	$pagina->imprime();

?>