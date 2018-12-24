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
|  arquivo:     start_cad_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "2":
		include("wbs2/start_cad_view_usuario_fisica.php");
		break;
 	case "3":
		include("wbs2/start_cad_view_usuario_juridica.php");
		break;
	default:
		include("wbs2/start_cad_list_usuario.php");
		break;
}

?>