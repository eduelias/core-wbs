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
define("MOD_TITULO", "ORDEM DE PRODUCAO");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;


switch ($pg_ped) {

   
  
    case "1":
        include(DIR_MODULOS."/modulo_fabrica/start_fabrica_relatorio.php");
        break;
    
    case "100":
		include(DIR_MODULOS."/modulo_fabrica/start_fabrica_relatorio_iprodutos.php");
		break;
		
	case "23":
		include(DIR_MODULOS."/modulo_fabrica/actions.php");
		break;
		
	case "150":
		include(DIR_MODULOS."/modulo_fabrica/start_fabrica_relatorio_edit.php");
		break;
   
    default:
         include(DIR_MODULOS."/modulo_fabrica/start_fabrica_relatorio.php");
		break;
}

?>
