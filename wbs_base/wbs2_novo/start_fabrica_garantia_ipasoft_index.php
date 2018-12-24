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

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "Garantia Ipasoft");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;


switch ($pg_ped) {

   
  
    case "1":
        include(DIR_MODULOS."/modulo_fabrica/start_fabrica_garantia_ipasoft.php");
        break;
    
    case "100":
		include(DIR_MODULOS."/modulo_fabrica/start_fabrica_garantia_ipasoft_idetalhes.php");
		break;
		
	 case "101":
		include(DIR_MODULOS."/modulo_fabrica/start_fabrica_garantia_checklist_teste.php");
		break;
   
    default:
         include(DIR_MODULOS."/modulo_fabrica/start_fabrica_garantia_ipasoft.php");
		break;
}

?>
