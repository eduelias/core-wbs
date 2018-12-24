<?PHP
include('../../include/class.php'); 
include('../../include/functions.php'); 
?>
<?php
	$ed = 0;
	$bd = new bd();
	
	$arr = array();
	$arr['cond@v_tickets@idticket'] = $_GET['id'];
	$arr['v_tickets@status'] = $_GET['status'];
	
	$bd->altera($arr);
	echo $bd->get_sql();
	
	session_start();
	$aud = array();
	$aud['v_ticket_status@codvend'] = $_SESSION['id'];
	$aud['v_ticket_status@status'] = $_GET['status'];
	$aud['v_ticket_status@idticket'] = $_GET['id'];
	$aud['v_ticket_status@descricao'] = $_GET['desc'];
	
	$bd->insere($aud);
	echo $bd->get_sql();
	pre($_POST);
?>
