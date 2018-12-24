
<?php 
// Começo das Configurações 
$nome = "PHPBrasil"; 
$senha = "123456"; 
// Fim das Configurações 

if ($PHP_AUTH_USER !=$nome || $PHP_AUTH_PW !=$senha) { 
    header("WWW-Authenticate: basic realm='Sistema de Autentificação'"); 
    header("HTTP/1.0 401 Unauthorized"); 
    echo "Nome de Usuário ou Senha Inválidos!\n"; 
    exit; 
} else { 
?> 
<!-- Aqui vem a sua página --> 

<!-- Fim da página --> 
<? 
} 
?> 
