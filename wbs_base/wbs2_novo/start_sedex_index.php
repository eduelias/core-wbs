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
|  arquivo:     start_sedex_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "Sedex");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_sedex/start_sedex_receb_index.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_sedex/start_sedex_receb_iframe.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_sedex/start_sedex_envia_index.php");
		break;
	case "4":
		include(DIR_MODULOS."/modulo_sedex/start_sedex_envia_iframe.php");
		break;
	case "5":
		include(DIR_MODULOS."/modulo_sedex/start_sedex_receb_iframe_revenda.php");
		break;
	case "100":
		include(DIR_MODULOS."/modulo_sedex/start_sedex_lista_index.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_sedex/start_sedex_lista_index.php");
		break;
}

?>
