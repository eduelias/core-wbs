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
|  arquivo:     start_pesquisa_posvenda_index.php
+--------------------------------------------------------------
*/
switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_extras/start_pesquisa_vpropag_list.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_extras/start_pesquisa_vpropag_pesq.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_extras/start_pesquisa_vpropag_list.php");
		break;
}

?>
