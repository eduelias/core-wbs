<?PHP
include('../../include/class.php'); 
include('../../include/functions.php'); 
?>
<?php
	$ed = 0;
	$bd = new bd();
	
	$arr = array();
	$arr['cond@v_tickets@idticket'] = $_GET['id'];
	$arr['v_tickets@prioridade'] = $_GET['prioridade'];
	$arr['v_tickets@status'] = '1';
	
	$bd->altera($arr);
	
	$arr1 = array(1=>'BAIXA',2=>'MEDIA',3=>'ALTA');
	session_start();
	$aud = array();
	$aud['v_ticket_status@codvend'] = $_SESSION['id'];
	$aud['v_ticket_status@status'] = $_GET['status'];
	$aud['v_ticket_status@idticket'] = $_GET['id'];
	$aud['v_ticket_status@descricao'] = 'PRIORIDADE: '.$arr1[$_GET['prioridade']];
	
	$bd->insere($aud);
	
	echo $bd->get_sql();
?>
