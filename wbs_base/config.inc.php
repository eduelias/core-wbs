<?php
 
$IP_S =  $_SERVER['SERVER_ADDR'];
if ($IP_S == '200.251.60.105') { 
	include ("/var/www/wbs/config.inc.php");
} else {
	#include ("/var/www/wbs/config.inc.php");
	include ("/home/wbs/public_html/maxxmicro/config.inc.php");

}
#echo $IP_S;
?>