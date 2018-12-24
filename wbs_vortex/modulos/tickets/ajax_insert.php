<?PHP
include('../../include/class.php'); 
include('../../include/functions.php'); 

?>
<?php
	$ed = 0;
	$bd = new bd();
	session_start();
	$_POST['v_tickets@codvend'] = $_SESSION['id'];
	$bd->insere($_POST);
	
	$res = $bd->gera_array('idticket','v_tickets','codvend ='.$_SESSION['id'].' ORDER BY idticket DESC LIMIT 1');
	
	session_start();
	$aud = array();
	$aud['v_ticket_status@codvend'] = $_SESSION['id'];
	$aud['v_ticket_status@status'] = $_GET['status'];
	$aud['v_ticket_status@idticket'] = $res[0]['idticket'];
	$aud['v_ticket_status@descricao'] = 'PEDIDO: '.$_POST['v_tickets@msn'];
	$bd->insere($aud);
	
	echo $bd->get_sql();	
	
	pre($res);
?>
<?

include('classes/sendMsg.php');

$sendMsg = new sendMsg();

$sendMsg->login('wbs_automatico@hotmail.com', 'qawsed!');

$sendMsg->createSession('felipe@linuxjf.org');

$sendMsg->sendMessage('TICKET ABERTO => '.$_POST['v_tickets@msg'], 'Times New Roman', 'FF0000');

/*$sendMsg->createSession('du7@msn.com');

$sendMsg->sendMessage('TICKET ABERTO => '.$_POST['v_tickets@msg'], 'Times New Roman', 'FF0000');*/

?>