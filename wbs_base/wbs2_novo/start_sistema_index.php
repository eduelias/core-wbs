<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (vers�o 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright � 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "azul");
define("MOD_PG", $pg);
define("MOD_TITULO", "Controle do Sistema");
define("DIR_AJAX_MODULO", DIR_SISTEMA."/".DIR_MODULOS."/modulo_sistema");

// Para postar uma variavel para proxima p�gina, fa�a como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "100":
		include(DIR_MODULOS."/modulo_sistema/start_sistema_index.php");
		break;
	case "200":
		include(DIR_MODULOS."/modulo_sistema/start_sistema_seed.php");
		break;
	case "300":
		include(DIR_MODULOS."/modulo_sistema/start_sistema_tabela.php");
		break;
	case "400":
		include(DIR_MODULOS."/modulo_sistema/start_sistema_senha.php");
		break;
	case "500":
		include(DIR_MODULOS."/modulo_sistema/start_sistema_idremoto.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_sistema/start_sistema_index.php");
		break;
}

?>