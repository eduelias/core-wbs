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
|  arquivo:     start_jornal_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_jornal/start_jornal_noticia_index.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_jornal/start_jornal_inserir_noticia.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_jornal/start_jornal_inserir_secao.php");
		break;
	case "4":
		include(DIR_MODULOS."/modulo_jornal/start_jornal_editar_noticia.php");
		break;
	case "5":
		include(DIR_MODULOS."/modulo_jornal/start_jornal_editar_secao.php");
		break;
	case "99":
		include(DIR_MODULOS."/modulo_jornal/start_jornal_secao_index.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_jornal/start_jornal_noticia_index.php");
		break;
}

?>
