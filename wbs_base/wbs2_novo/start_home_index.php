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
|  arquivo:     start_home_index.php
+--------------------------------------------------------------
*/

include("config.inc.php");

switch ($pg_ped)
{
	case "2":
		include(DIR_MODULOS."/modulo_home/start_home_index.php");
		break;
 	case "3":
		include(DIR_MODULOS."/modulo_home/start_home_itipo.php");
		break;
 	case "4":
		include(DIR_MODULOS."/modulo_home/start_home_iinfopopup.php");
		break;
 	case "5":
		include(DIR_MODULOS."/modulo_home/start_home_ipopup.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_home/start_home_index.php");
		break;
}

?>