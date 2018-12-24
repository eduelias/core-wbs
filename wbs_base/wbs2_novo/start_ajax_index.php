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
|  arquivo:     start_ajax_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "azul");
define("MOD_PG", $pg);
define("MOD_TITULO", "AJAX");
define("DIR_AJAX_MODULO", DIR_SISTEMA."/".DIR_MODULOS."/modulo_sistema");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "100":
		include(DIR_MODULOS."/modulo_pedido_rapido/actions_ajax.php");
		break;
	
	default:
		include(DIR_MODULOS."/modulo_pedido_rapido/actions_ajax.php");
		break;
}

?> 