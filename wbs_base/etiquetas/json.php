<?php
	
	$txt = $_GET['txt'];
	echo "seta('";
	include($txt.'.txt');
	echo "');";
	
?>