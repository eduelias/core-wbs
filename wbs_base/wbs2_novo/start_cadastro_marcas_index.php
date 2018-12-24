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
|  arquivo:     start_cadastro_marcas_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "Cadastro de Marcas");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_cadastro_marcas/start_cadastro_marcas_index.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_cadastro_marcas/start_cadastro_marcas_edita.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_cadastro_marcas/start_cadastro_marcas_index.php");
		break;
}

?>
