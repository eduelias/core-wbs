<?php

header("P3P: CP=\"ALL DSP COR NID CURa OUR STP PUR\""); 

$nocookies = false;
$reloaded = $_GET["ckset"];
$url = $_SERVER[PHP_SELF];
$querystring = $_SERVER[QUERY_STRING];

$querystring = str_replace("ckset=ok", "", $querystring);

setcookie("check_cookie", "on", time()+(1000000));
if ($reloaded == "" and !isset($check_cookie)) {
   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=http://wbs.ipasoft.com.br" .            

   $_SERVER[PHP_SELF] . "?ckset=ok" . $querystring . "\">";
   exit;
   }

else {
   if (!isset($check_cookie)) $nocookies = true;

   }

?>