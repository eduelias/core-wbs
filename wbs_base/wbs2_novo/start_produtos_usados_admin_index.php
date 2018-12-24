<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (vers�o 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright � 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_produtos_usados_admin_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	// VIEW PROD
	case "1":
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_admin_prod_index.php");
		break;
	// VIEW SOL
	case "2":
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_admin_sol_index.php");
		break;
	// ADD PROD
	case "3":
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_admin_prod_add_prod.php");
		break;
	// ADD SOL
	case "4":
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_admin_prod_add_sol.php");
		break;
	// EDIT PROD
	case "5":
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_admin_prod_edit.php");
		break;
	// VIEW IMG
	case "6":
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_view.php");
		break;
	// PADRAO
	default:
		include(DIR_MODULOS."/modulo_produtos_usados/start_produtos_usados_admin_prod_index.php");
		break;
}

?>