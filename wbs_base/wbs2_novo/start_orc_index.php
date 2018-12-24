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
|  arquivo:     start_orc_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{

	case "2" :
		include(DIR_MODULOS."/modulo_orcamento/start_orc_page_admin_view.php");
		break;
    default :
        include(DIR_MODULOS."/modulo_orcamento/start_orc_page_admin_list.php");
		break;
}

?>