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
|  arquivo:     start_controle_revenda_rma_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "vermelho");
define("MOD_PG", $pg);
define("MOD_TITULO", "Listagem Revenda RMA");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $db->discover_method("pg");
$_POST['pg_ped'] = $db->discover_method("pg_ped");
$_POST['pagina'] = $db->discover_method("pagina");

switch ($pg_ped)
{
	case "100":
		include(DIR_MODULOS."/modulo_controle_revenda/start_controle_revenda_rma_index.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_controle_revenda/start_controle_revenda_rma_index.php");
		break;
}

?>
