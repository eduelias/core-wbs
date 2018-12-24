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

switch ($pg_ped) {

   
  
    case "1":
        include(DIR_MODULOS."/modulo_extras/start_ped_page_verproduto.php");
        break;
   
    default:
         include(DIR_MODULOS."/modulo_extras/start_ped_page_verproduto.php");
		break;
}

?>
