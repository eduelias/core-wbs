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

define("MOD_COR", "verde");
define("MOD_PG", $pg);
define("MOD_TITULO", "Controle Emprestimo Produtos");

// Para postar uma variavel para proxima página, faça como o codigo abaixo.
$_POST['pg'] = $pg;
$_POST['pg_ped'] = $pg_ped;
$_POST['pagina'] = $pagina;


switch ($pg_ped)
{

	case "2":
		include(DIR_MODULOS."/modulo_emprestimo/start_emprestimo_add.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_emprestimo/start_emprestimo_ex.php");
		break;
 	case "4":
		include(DIR_MODULOS."/modulo_emprestimo/start_emprestimo_list.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_emprestimo/start_emprestimo_new.php");
		break;
}

?>