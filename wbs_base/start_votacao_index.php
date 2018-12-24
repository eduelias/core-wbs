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
		include("wbs2/start_votacao2_index.php");
		break;
	default:
		include("wbs2/start_votacao2_index.php");
		break;
}

?>
