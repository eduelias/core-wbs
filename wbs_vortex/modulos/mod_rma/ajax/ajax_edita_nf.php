<?PHP

	include('../../../include/class.php'); 
	
	include('../../../include/functions.php'); 
	
	$bd = new bd();
	session_start();
	$_GET['v_rma_pct@codvend'] = $_SESSION['id'];
	
	$bd->altera($_GET);
	
	$array[''] = '';
	
	echo $bd->get_sql();
	
?>

