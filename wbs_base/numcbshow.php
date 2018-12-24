<?php

include_once("classprod.php" );

#$codped = 65;
$codemp = 1;

$prod = new operacao();
$codbarra = $prod->codbarra($codemp,$codped, $tipo);



echo("Codbarra = $codbarra");


?>
