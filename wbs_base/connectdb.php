<?php
$IP_S =  $_SERVER['SERVER_ADDR'];
if ($IP_S == '200.251.60.105') { 
	include ("/var/www/wbs/connectdb.php");
} else {
	include ("/home/wbs/public_html/maxxmicro/connectdb.php");

}
 
?> 

