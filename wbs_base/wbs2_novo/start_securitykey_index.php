<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_securitykey_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "azul");
define("MOD_PG", $pg);
define("MOD_TITULO", "Security Key");
define("DIR_AJAX_MODULO", DIR_SISTEMA."/".DIR_MODULOS."/modulo_securitykey");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "100":
		include(DIR_MODULOS."/modulo_securitykey/start_securitykey_index.php");
		break;
	case "101":
		include(DIR_MODULOS."/modulo_securitykey/start_securitykey_check.php");
		break;
	case "102":
		include(DIR_MODULOS."/modulo_securitykey/start_securitykey_ajax.php");
		break;
	case "200":
		include(DIR_MODULOS."/modulo_securitykey/start_securitykey_tabela.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_securitykey/start_securitykey_index.php");
		break;
}

?>