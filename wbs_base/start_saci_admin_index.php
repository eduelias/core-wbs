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
|  arquivo:     start_saci_admin_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "1":
		include("wbs2/start_saci_admin_index.php");
		break;
	case "2":
		include("wbs2/start_saci_admin_atend.php");
		break;
	case "3":
		include("wbs2/start_saci_admin_view.php");
		break;
	case "4":
		include("wbs2/start_saci_admin_agenda.php");
		break;
	case "5":
		include("wbs2/start_saci_admin_codbarra.php");
		break;
	case "6":
		include("wbs2/start_saci_admin_cliente.php");
		break;
	default:
		include("wbs2/start_saci_admin_index.php");
		break;
}

?>
