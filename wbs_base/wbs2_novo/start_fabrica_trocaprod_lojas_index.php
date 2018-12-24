<?php
 
/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_extras_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "amarelo");
define("MOD_PG", $pg);
define("MOD_TITULO", "TROCA DE PRODUTOS EM PEDIDOS");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;
 

switch ($pg_ped) {

   
  
    case "1":
        include(DIR_MODULOS."/modulo_fabrica/start_fabrica_trocaprod_lojas.php");
        break;
    
    case "100":
		include(DIR_MODULOS."/modulo_fabrica/start_fabrica_trocaprod_lojas_idetalhes.php");
		break;
   
    default:
         include(DIR_MODULOS."/modulo_fabrica/start_fabrica_trocaprod_lojas.php");
		break;
}

?>
