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
|  arquivo:     start_processo_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "amarelo");
define("MOD_PG", $pg);
define("MOD_TITULO", "RELATORIO FATURAMENTO");

// Para postar uma variavel para proxima p�gina, fa�a como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{

	case "100":
		include(DIR_MODULOS."/modulo_processos/start_faturamento_lista_index.php");
		break;
	
	default:
		include(DIR_MODULOS."/modulo_processos/start_faturamento_lista_index.php");
		break;
}

?>
