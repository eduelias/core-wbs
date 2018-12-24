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
|  arquivo:     start_noticias_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{

	case "2":
		include("wbs2/start_vitrine_add.php");
		break;
	case "3":
		include("wbs2/start_vitrine_ex.php");
		break;
 	case "4":
		include("wbs2/start_vitrine_list.php");
		break;
	default:
		include("wbs2/start_vitrine_new.php");
		break;
}

?>
