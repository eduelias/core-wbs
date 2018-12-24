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
|  arquivo:     start_produtos_usados_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "1":
		include("wbs2/start_produtos_usados_index.php");
		break;
	case "2":
		include("wbs2/start_produtos_usados_prod_add_sol.php");
		break;
	// VIEW IMG
	case "3":
		include("wbs2/start_produtos_usados_view.php");
		break;
	default:
		include("wbs2/start_produtos_usados_index.php");
		break;
}

?>