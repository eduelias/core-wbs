<?
	header('Content-Type: text/html; charset=UTF-8'); 
?>
<button onClick="Javascript:divCentral.carrega('modulos/permissao/forms/form_segurancasubmenu.php')" style="float:right">Inserir</button>
<h1> Menu: <?=$_GET['id']; ?></h1>
<?
	$pagina->imprime('seguranca_submenu');
?>