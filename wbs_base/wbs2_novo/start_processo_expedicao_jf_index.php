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
|  arquivo:     start_processo_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "EXPEDICAO PROPRIA");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{

	case "100":
		include(DIR_MODULOS."/modulo_processos/start_expedicao_lista_jf_index.php");
		break;
	case "101":
		include(DIR_MODULOS."/modulo_processos/start_relatorio_page_checklist_entrega.php");
		break;
	case "102":
		include(DIR_MODULOS."/modulo_processos/start_expedicao_lista_desp.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_processos/start_expedicao_lista_jf_index.php");
		break;
}

?>
