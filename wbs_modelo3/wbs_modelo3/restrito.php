<?
	header('Content-type: text/html; charset=iso-8859-1');

	include("include/var.php");
	include("include/class.php");
	include("include/functions.php");

	$login = new login($_SESSION);
	$login->checklogin();

	/////////////////////////////////////////
	// PEGA TODOS OS DADOS DO USUÁRIO LOGADO
	/////////////////////////////////////////
	$userlogged = new vendedor();
	$userlogged->getdadosfromid($login->getid());
	/////////////////////////////////////////

?>
<head>

	<title>WBS - Web Business System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<meta name="author" content="Kico Zaninetti" />
	<meta name="author" content="Felipe" />

	<link rel="shortcut icon" href="img/icone.png" type="image/x-icon" />

	<script type="text/javascript" src="include/js/json.js"></script>	

	<script type="text/javascript" src="include/js/pagina.js"></script>	
    
    <!-- DETECTA O BROWSER -->
	<script type="text/javascript" src="include/js/browserdetect.js"></script>

	<!-- BIBLIOTECA YUI -->
	<!-- CSS for Reset Values -->
	<link rel="stylesheet" type="text/css" href="include/yui/reset/reset.css">

	<!-- Namespace source file -->
	<script type="text/javascript" src="include/yui/yahoo/yahoo.js"></script>

	<!-- Dependency source files -->
	<script type="text/javascript" src="include/yui/event/event.js"></script>
	<script type="text/javascript" src="include/yui/dom/dom.js"></script>
	<script type="text/javascript" src="include/yui/animation/animation.js"></script>

	<!-- Container source file -->
	<script type="text/javascript" src="include/yui/container/container_core.js"></script>

	<!-- Menu source file -->
	<script type="text/javascript" src="include/yui/menu/menu.js"></script>
	<link rel="stylesheet" type="text/css" href="include/yui/menu/assets/menu.css">

	<!-- AJAX connection source file -->
	<script type="text/javascript" src="include/yui/connection/connection.js"></script>

	<!-- Datatable and Datasource source files -->
	<script type="text/javascript" src="include/yui/datasource/datasource-beta.js"></script>
	<script type="text/javascript" src="include/yui/datatable/datatable-beta.js"></script>
	<link rel="stylesheet" type="text/css" href="include/yui/datatable/assets/datatable.css">

	<!-- Button source files -->
	<!--<script type="text/javascript" src="include/yui/button/button-beta-debug.js"></script>
	<link rel="stylesheet" type="text/css" href="include/yui/button/assets/button.css">-->

	<!-- Tabview and source files -->
	<script type="text/javascript" src="include/yui/element/element-beta.js"></script>
	<script type="text/javascript" src="include/yui/tabview/tabview.js"></script>
	<link rel="stylesheet" type="text/css" href="include/yui/tabview/assets/tabview.css">
	<link rel="stylesheet" type="text/css" href="include/yui/tabview/assets/css/module_tabs.css">

	<!-- Logger and source files -->
	<script type="text/javascript" src="include/yui/logger/logger.js"></script>
	<link href="include/yui/logger/assets/logger.css" rel="stylesheet" type="text/css" />

	<!-- FIM BIBLIOTECA YUI -->

	<!-- Início biblioteca Spry -->
	<script src="include/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
    <link href="include/SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
	<!-- Fim biblioteca Spry-->



	<link href="include/css/estilo.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="include/js/javascript.js"></script>

<script>
//Cria a janela de log
YAHOO.util.Event.onContentReady("topo", function() {
	//var myLogger = new YAHOO.widget.LogReader();
	//myLogger.collapse();
});
</script>
</head>
<body>
	<div id="principal">
		<div id="topo">
			<? include("topo.php") ?>
		</div>
		<?
				////////////////////////////////////////////////////
				// PEGA O MENU CLICADO, SELECIONA OS DADOS E INCLUI
				////////////////////////////////////////////////////

				$pg = $_GET[pg];
				$pgo = new v_menu;
				$pgo->getdadosfromid($pg);

		?>
		<div id="corpo" class="<?=$pgo->getcor()?>">
			<?
				include("modulos/".$pgo->getarquivo()."/index.php");
			?>
		</div>
		<div id="separa"></div>
		<div id="rodape">
			<? include("rodape.php") ?>
		</div>
	</div>
</body>
</html>