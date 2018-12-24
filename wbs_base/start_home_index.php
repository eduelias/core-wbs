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

switch ($pg_ped)
{
	case "2":
		include("wbs2/start_home_index.php");
		break;
 	case "3":
		include("wbs2/start_home_itipo.php");
		break;
 	case "4":
		include("wbs2/start_home_iinfopopup.php");
		break;
 	case "5":
		include("wbs2/start_home_ipopup.php");
		break;
	default:
		include("wbs2/start_home_index.php");
		break;
}

?>
