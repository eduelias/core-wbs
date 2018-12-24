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
|  arquivo:     start_modped_index.php
+--------------------------------------------------------------
*/

switch ($pg_ped) {

	case "2":
		include(DIR_MODULOS."/modulo_modificacao_pedido/start_modped_page_produtos.php");
		break;
	case "3":
		include(DIR_MODULOS."/modulo_modificacao_pedido/start_modped_page_formapg.php");
		break;
    case "4":
        include(DIR_MODULOS."/modulo_modificacao_pedido/start_modped_iformapg.php");
        break;
    case "5":
        include(DIR_MODULOS."/modulo_modificacao_pedido/start_modped_iproduto_list.php");
        break;
    case "6":
        include(DIR_MODULOS."/modulo_modificacao_pedido/start_modped_iproduto_mod.php");
        break;
    default:
        include(DIR_MODULOS."/modulo_modificacao_pedido/start_modped_page_inicio.php");
        break;
}

?>