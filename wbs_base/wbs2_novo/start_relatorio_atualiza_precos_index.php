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
|  arquivo:     start_relatorio_atualiza_precos_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "azul");
define("MOD_PG", $pg);
define("MOD_TITULO", "Relatorio Atualizacao de Precos");
define("DIR_AJAX_MODULO", DIR_SISTEMA."/".DIR_MODULOS."/modulo_relatorios");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "100":
	    include(DIR_MODULOS."/modulo_relatorios/start_relatorio_atualiza_precos.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_atualiza_precos.php");
		break;
}

?>