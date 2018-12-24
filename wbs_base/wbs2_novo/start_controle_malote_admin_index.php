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
|  arquivo:     start_controle_malote_admin_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "Controle Malote Admin");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "100":
		include(DIR_MODULOS."/modulo_controle_malote/start_controle_malote_admin_index.php");
		break;
	case "200":
		include(DIR_MODULOS."/modulo_controle_malote/start_controle_malote_admin_enviar.php");
		break;
	case "201":
		include(DIR_MODULOS."/modulo_controle_malote/start_controle_malote_admin_view.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_controle_malote/start_controle_malote_admin_index.php");
		break;
}

?>
