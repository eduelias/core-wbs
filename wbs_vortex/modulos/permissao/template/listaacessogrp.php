<?
	header('Content-Type: text/html; charset=UTF-8'); 
?>
<script>
	WBS.pagina.idgeral = <? echo $_GET['id']; ?>;
</script>
<body bgcolor="#FFFFFF"> 
<div style="background-color:#FFFFFF">
<h1> Grupo: <?
	$bd = new bd();
	$grupo = $bd->gera_raw('*','segurancagrp','codgrp='.$_GET["id"]);
	echo $grupo['nomegrp']; 
?></h1>
<?
	$pagina->imprime('segurancagrp');
?>
</div>   
</body>