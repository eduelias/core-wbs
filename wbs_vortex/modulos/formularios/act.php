<?PHP
include('../../include/class.php'); 
include('../../include/functions.php'); 
?>
<?php
	$ed = 0;
	$bd = new bd();
	foreach ($_POST as $chave=>$valor) {
		$duplas = explode('@',$chave);
		$ed = ($duplas[0] == 'cond')?1:$ed;
		$_POST[$chave] = $valor;
	}
	
	if (isset($_POST['vendedor@senha'])){
		$_POST['vendedor@senha'] = md5($_POST['vendedor@senha']);
		$login = new login($_POST);
		if($login->checklogin()) {
			echo '{erro:0}';
		} else {
			echo '{erro:1}';
			pre($login);
		}
	}
	
	if ($ed == 1) {
		$ebug['act.php:act'] = ($debug)?'Editando ...<hr>':'';
		$bd->altera($_POST);
		
	} else {
		$ebug['act.php:act'] = ($debug)?'Inserindo ...<hr>':'';
		$bd->insere($_POST);
	}
	echo $bd->get_sql();
?>