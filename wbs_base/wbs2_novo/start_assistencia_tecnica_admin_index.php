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
|  arquivo:     start_sedex_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "vermelho");
define("MOD_PG", $pg);
define("MOD_TITULO", "Assistencia Tecnica Admin");
define("DIR_MODULO_SELECT", DIR_SISTEMA."/".DIR_MODULOS."/modulo_assistencia_tecnica");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_index.php");
		break;
	case "100":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_criar_pesquisa.php");
		break;
	case "101":
	include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_criar_ipedidos.php");
		break;
	case "102":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_criar_idados.php");
		break;
	case "103":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_criar_os.php");
		break;
	case "104":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_criar_ireincidencias.php");
		break;
	case "105":
	include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_criar_ianalises.php");
		break;
	case "106":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_reincidencia_view.php");
		break;
	case "107":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_os_at_print.php");
		break;
	case "2":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_sintoma.php");
		break;
	case "200":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_sintoma_edita.php");
		break;
	case "3":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_laudo.php");
		break;
	case "300":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_laudo_edita.php");
		break;
	case "4":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_srv_exec.php");
		break;
	case "400":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_srv_exec_edita.php");
		break;
	case "5":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_produtos.php");
		break;
	case "500":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_produtos_ilista.php");
		break;
	case "600":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_atualiza_os.php");
		break;
	case "601":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_atualiza_ireincidencias.php");
		break;
	case "602":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_atualiza_ianalises.php");
		break;
	case "700":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_ajax.php");
		break;
	case "8":
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_relacionamento.php");
		break;
	default:
		include(DIR_MODULO_SELECT."/start_assistencia_tecnica_admin_index.php");
		break;
}

?>
