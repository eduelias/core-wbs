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
|  arquivo:     start_arquivos_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "amarelo");
define("MOD_PG", $pg);
define("MOD_TITULO", "Cadastro de Permissoes");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
  	// Arquivos
	case "100":
		include(DIR_MODULOS."/modulo_arquivos/start_arquivos_index.php");
		break;
	case "101":
		include(DIR_MODULOS."/modulo_arquivos/start_arquivos_editar.php");
		break;
	case "102":
		include(DIR_MODULOS."/modulo_arquivos/start_arquivos_inserir.php");
		break;
	// Grupos
	case "200":
		include(DIR_MODULOS."/modulo_arquivos/start_grupos_index.php");
		break;
	case "201":
		include(DIR_MODULOS."/modulo_arquivos/start_grupos_editar.php");
		break;
	case "202":
		include(DIR_MODULOS."/modulo_arquivos/start_grupos_inserir.php");
		break;
	case "203":
		include(DIR_MODULOS."/modulo_arquivos/start_grupos_usuarios.php");
		break;
	case "204":
		include(DIR_MODULOS."/modulo_arquivos/start_grupos_arquivos.php");
		break;
	// Menus
	case "300":
		include(DIR_MODULOS."/modulo_arquivos/start_menu_index.php");
		break;
	case "301":
		include(DIR_MODULOS."/modulo_arquivos/start_menu_editar.php");
		break;
	case "302":
		include(DIR_MODULOS."/modulo_arquivos/start_menu_inserir.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_arquivos/start_arquivos_index.php");
		break;
}

?>