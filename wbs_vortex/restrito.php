<? if( ereg("MSIE", $_SERVER['HTTP_USER_AGENT']) ){
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML TRANSITIONAL//EN" "http://www.w3.org/TR/html4/strict.dtd">';
}
?>

<html>
<head>
<?
ini_set('display_errors',1);

$d_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());
@define('ENCODING','utf-8');

@header("Content-Enconding: gzip, deflate",'Content-type: text/html; charset="'.ENCODING);

include("include/class.php");
include("include/functions.php");


flush();


//header('Content-type: text/html; charset=utf-8');
//@session_start();
if(isset($_POST['campousuario'])){

	$starter = $_POST;

} else {

	@session_start();
	$starter = $_SESSION;
}
//pre($starter);
//exit();
//$res = isset($_SESSION['logado']);
//$starter = ($_POST['campousuario'] == 'nome')?$_POST:$_SESSION; //checa se o login vem da sessão ou de um formulário de login.
$login = new login($starter);
$login->checklogin();

//pre($_SESSION);
//exit();
//if (!$res) echo "<script> window.location= '../wbs_base/restrito.php' </script>"; //SE FOR LOGIN NOVO, MANDA PRO WBS VELHO.
$banco = new bd();
$userlogged = $banco->gera_raw('*','vendedor','codvend ='.$login->getid());

// VERIFICAR NECESSIDADE DE USO
include('../wbs_base/classprod.php');
$prod = new operacao();
?>

<?
////////////////////////////////////////////////////
// PEGA O MENU CLICADO, SELECIONA OS DADOS E INCLUI
////////////////////////////////////////////////////
$pg = $_GET[pg];
$pgo = $banco->gera_array('*','seguranca','codpg ='.$pg);

?>
<title>WBS - Web Business System</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=<?=ENCODING?>" />
<meta name="author" content="Kico Zaninetti" />
<meta name="author" content="Felipe Pereira" />
<meta name="author" content="Eduardo E. Saléh" />

<link rel="shortcut icon" href="images/botoes/money.png"
	type="image/x-icon" />
<link rel="stylesheet" type="text/css"
	href="http://yui.yahooapis.com/combo?2.7.0/build/fonts/fonts-min.css&2.7.0/build/calendar/assets/skins/sam/calendar.css">
<link rel="stylesheet" type="text/css"
	href="<?=C_INC?>css_links.php?cor=<?=$pgo[0]['cor']?>">


<script type="text/javascript" src="<?=C_INC?>js_links.php"></script>
<script type="text/javascript"
	src="http://wbs-teste.maxxmicro.com.br/wbs_vortex/include/classes/min/f=wbs_vortex/include/js/pagina.js"></script>
<script type="text/javascript">
	//var tabView = new YAHOO.widget.TabView({id: 'demo'});

	//############################################################ ONLOAD DA PAGINA
	YAHOO.util.Event.addListener(window, "load", function() {

	}, null);
	var sfFocus = function() {
		var sfEls = document.getElementsByTagName("INPUT");
		for (var i=0; i<sfEls.length; i++) {
			sfEls[i].onfocus=function() {
				this.className+="sffocus";
			}
			sfEls[i].onblur=function() {
				this.className=this.className.replace(new RegExp("sffocus\\b"), "");
			}
		}
	}
	WBS.panel2 = new YAHOO.widget.Panel("panel2", {underlay:'none', fixedcenter:true, constraintoviewport:true, visible:false, draggable:true, close:true, modal:true, zindex:90, width:570, top:0} );
	WBS.panel2.setHeader("Conte&uacute;do");
	WBS.panel2.setBody('Erro no carregamento.');
	WBS.panel2.setFooter('Editando dados.');
	WBS.tooltips = Array();
	WBS.wait =  new YAHOO.widget.Panel("wait",{width:"230px", fixedcenter:true, close:false, draggable:false, zindex:90, modal:true, visible:true});
	//WBS.wait.setHeader("Carregando ...");
	WBS.wait.setBody('<table width="100%" class="t1"><tr><td valign="middle" align="center"><img src="images/ajax-loader.gif" width="32px" heigh"32px"/></td><td valign="middle" align="center">Carregando... </td></tr></table></center>');
	//WBS.wait.setBody('<center>AGUARDE!</center>');
	WBS.panel2.changeBodyEvent.subscribe( function (c, bodyContent) { WBS.pagina.ExtraiScript(bodyContent);  } );
	//;
</script>

</head>

<body class="yui-skin-sam <?=$pgo[0]['cor']?>">
<div id="container" style="display: none"></div>
<?
$IP_S =  $_SERVER['SERVER_ADDR'];
if ($IP_S == '200.251.60.6') {
	echo '<div style="position:absolute; top:80px; left:40px; font-size:44px; color:#FF0000; font-weight:bold;"> TESTE </div>';
}
?>
<div id="principal">
<div id="topo" class="topo"><? include("menu_YUI.php") ?></div>
<div id="meio" class="topof"></div>
<div id="msg"></div>





</div>
<div id="corpo" class="<?=$pgo[0]['cor']?>"><script> onscreen.color = "<?=$pgo[0]['cor']?>";
        	var Event = YAHOO.util.Event;
            	Event.onDOMReady(function() { WBS.wait.hide(); }); </script>
<?
include("modulos/".$pgo[0]['arquivo']."/index.php");
?></div>
<div id="rodape"><? include("rodape.php") ?></div>
<script>
WBS.wait.render(document.body);
WBS.panel2.render(document.body);
WBS.panel2.hideEvent.subscribe(function () { //compatibilidade com FF2 -> retira BUG visual
	document.getElementById('container').style.display = 'none'
});

</script>

</body>
</html>
