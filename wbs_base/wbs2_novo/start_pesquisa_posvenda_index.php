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
|  arquivo:     start_pesquisa_posvenda_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped)
{
	case "1":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_index.php");
		break;
	case "2":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_clientes.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_pedidos.php");
		break;
	case "4":
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_formulario.php");
		break;
	default:
		include(DIR_MODULOS."/modulo_pesquisas/start_pesquisa_posvenda_index.php");
		break;
}

?>
