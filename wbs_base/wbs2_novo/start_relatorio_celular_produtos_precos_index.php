<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_relatorio_celular_produtos_precos_index.php
+--------------------------------------------------------------
*/

define("MOD_COR", "azul");
define("MOD_PG", $db->discover_method("pg"));
define("MOD_TITULO", "Relatorio Celular Produtos Precos");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $db->discover_method("pg");
$_POST['pg_ped'] = $db->discover_method("pg_ped");
$_POST['pagina'] = $db->discover_method("pagina");

switch ($db->discover_method("pg_ped"))
{
  	// Arquivos
	case "100":
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_celular_produtos_precos.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_relatorios/start_relatorio_celular_produtos_precos.php");
		break;
}

?>