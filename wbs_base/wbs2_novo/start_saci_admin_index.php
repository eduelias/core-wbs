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

define("MOD_COR", "verde");
define("MOD_PG", $pg);

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_index.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_atend.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_view.php");
		break;
	case "4":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_agenda.php");
		break;
	case "5":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_codbarra.php");
		break;
	case "6":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_cliente.php");
		break;
	case "7":
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_atend_ipedido.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_saci/start_saci_admin_index.php");
		break;
}

?>
