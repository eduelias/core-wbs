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
|  arquivo:     start_noticias_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "amarelo");
define("MOD_PG", $pg);
define("MOD_TITULO", "Relatorio Celular Meta (Supervisor)");

// Para postar uma variavel para proxima p�gina, fa�a como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;

switch ($pg_ped)
{
	case "2":
		break;
	case "3":
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_celular_meta_sup.php");
		break;
}

?>
