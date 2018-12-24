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
|  arquivo:     start_noticias_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "2":
		break;
	case "3":
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_page_grafico.php");
		break;
}

?>
