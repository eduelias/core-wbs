<?php
   
/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (vers�o 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright � 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_relatorio_cheques_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "Relatorio Cobranca");
#echo $pg_ped;

switch ($pg_ped)
{
	case "1":
	    include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cobranca_list.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cobranca_ped.php");
		break;
 	case "3":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cobranca_detalhes.php");
		break;
    case "4":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cobranca_limite.php");
		break;
	case "5":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cobranca_log.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cobranca_pesq.php");
		break;
}



?>
