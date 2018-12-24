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
*/

#require("../classprod.php");

#echo("pedido = $codpedselect");

switch ($pg_ped) {

	case "2":
		include("wbs2/start_ped_page_carrinho.php");
		break;
	case "3":
		include("wbs2/start_ped_page_micro01.php");
		break;
	case "4":
                include("wbs2/start_ped_page_micro02.php");
                break;
        case "5":
                include("wbs2/start_ped_page_produtos.php");
                break;
        case "6":
                include("wbs2/start_ped_icarrinho.php");
                break;
        case "7":
                include("wbs2/start_ped_iprodutoadcmicro.php");
                break;
        case "8":
                include("wbs2/start_ped_iprodutoadc.php");
                break;
        case "9":
                include("wbs2/start_ped_topocarrinho.php");
                break;
        case "10":
                include("wbs2/start_ped_page_formapg.php");
                break;
        case "11":
                include("wbs2/start_ped_iformapg.php");
                break;
	case "12":
                include("wbs2/start_cad_page_pessoafisica.php");
                break;
	case "13":
                include("wbs2/start_cad_page_pessoajuridica.php");
                break;
       	case "14":
                include("wbs2/start_ped_page_finaliza.php");
                break;
        case "15":
                include("wbs2/start_ped_ifinaliza.php");
                break;
        case "16":
                include("wbs2/start_ped_page_formapg_add.php");
                break;
        case "17":
                include("wbs2/start_ped_page_verproduto.php");
                break;
         case "18":
                include("wbs2/start_ped_page_modifica.php");
                break;
         case "19":
                include("wbs2/start_ped_icelularadc.php");
                break;
         case "20":
                include("wbs2/start_ped_page_celular.php");
                break;
        default:
	        include("wbs2/start_ped_page_inicio.php");
		break;
}

?>
