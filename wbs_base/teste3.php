
<?php 
// Come�o das Configura��es 
$nome = "PHPBrasil"; 
$senha = "123456"; 
// Fim das Configura��es 

if ($PHP_AUTH_USER !=$nome || $PHP_AUTH_PW !=$senha) { 
    header("WWW-Authenticate: basic realm='Sistema de Autentifica��o'"); 
    header("HTTP/1.0 401 Unauthorized"); 
    echo "Nome de Usu�rio ou Senha Inv�lidos!\n"; 
    exit; 
} else { 
?> 
<!-- Aqui vem a sua p�gina --> 

<!-- Fim da p�gina --> 
<? 
} 
?> 
