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
|  arquivo:     start_saci_infohelp_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_index.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_view.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_atend.php");
		break;
	case "4":
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_agenda.php");
		break;
	case "5":
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_codbarra.php");
		break;
	case "6":
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_cliente.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_saci/start_saci_infohelp_index.php");
		break;
}

?>