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
|  arquivo:     start_controle_revenda_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "vermelho");
define("MOD_PG", $pg);
define("MOD_TITULO", "Controle Revenda");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "100":
		include(DIR_MODULOS."/modulo_controle_revenda/start_controle_revenda_index.php");
		break;
	case "200":
		include(DIR_MODULOS."/modulo_controle_revenda/start_controle_revenda_editar.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_controle_revenda/start_controle_revenda_index.php");
		break;
}

?>
