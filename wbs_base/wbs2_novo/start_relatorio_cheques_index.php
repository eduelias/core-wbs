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
|  arquivo:     start_relatorio_cheques_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "1":
	    include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cheques_list.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cheques_fpg.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_cheques_pesq.php");
		break;
}

?>
