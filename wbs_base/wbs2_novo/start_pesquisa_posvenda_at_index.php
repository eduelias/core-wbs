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
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_at_index.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_at_os.php");
		break;
	case "4":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_formulario_at_onsite.php");
		break;
	case "5":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_formulario_at.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_at_index.php");
		break;
}

?>
