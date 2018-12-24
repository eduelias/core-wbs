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
|  arquivo:     start_relatorio_posvenda_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "amarelo");
define("MOD_PG", $pg);
define("MOD_TITULO", "Relatorio Contabil");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_contabil_list.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_contabil_list.php");
		break;
}

?>
