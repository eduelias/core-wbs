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
*/

#require("classprod.php");
#$login = "felipe";

switch ($pg_ped) {

	case "2" :
		include("wbs2/start_orc_page_admin_view.php");
		break;
    default :
        include("wbs2/start_orc_page_admin_list.php");
		break;
}

?>
