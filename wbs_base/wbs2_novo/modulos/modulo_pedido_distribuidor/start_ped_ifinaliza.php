<?php

// WBS
// arquivo:		ped_icarrinho.php
// template:	ped_icarrinho.htm

#require("../classprod.php");
#$codemp = 1;
#$login = "felipe";

// INICIO DA CLASSE
$prod = new operacao();

	// SELECIONA PAGINA PARA REDIRECIONAMENTO
	$prod->clear();
	$prod->listProdU("codpg","seguranca", "arquivo='start_orc_index.php'");
	$pg_sel = $prod->showcampo0();


switch ($Action)
{
    
    	case "contrato_venda":
    	
        // VERIFICA SE O PEDIDO FOI À VISTA E EM DINHEIRO , FINANCIAMNETO BANCARIO ou CARTAO VISA
	$prod->listProdSum("IF((tipo like '02.00' or tipo like '02.08' or tipo like '02.4%' or tipo like '02.30' or tipo like '02.31'), 1, 0)", "pedidoparcelas", "codped=$codpedselect ", $array56, $array_campo56, "" );
	$vvista=1;

	for($k = 0; $k < count($array56); $k++ ){

		$prod->mostraProd( $array56, $array_campo56, $k);
		$nr = $prod->showcampo0();
		#echo("nr=$nr");
		$vvista=$vvista*$nr;

	}
	if ($vvista == 0 ){$reserva=1;}else{$reserva=0;}

	// CONTRATO DE COMPRA E VENDA
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "iniciocontrato.php?Action=update&codped=$codpedselect&reserva=$reserva&pg=$pg&impressao=1&desloc=$desloc");
	exit;
	#if ($contrato == "DC"){$arqcontrato="iniciocontrato.php";$reserva=0;}

        break;
        
        case "contrato_garantia":

        // CONTRATO DE GARANTIA
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "iniciocontrato_garantia.php?Action=update&codped=$codpedselect&reserva=$reserva&pg=$pg&impressao=1&desloc=$desloc");
	exit;

	break;

	case "orcamento":

        // CONTRATO DE GARANTIA
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?Action=print&codorcselect=$codpedselect&pg=$pg_sel&pg_ped=2&print_val=$print_val&menu_not=$menu_not");
	exit;
	break;
	
	   
        case "checklist_finasa":

        // CONTRATO DE GARANTIA
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "iniciochecklist_finasa.php?Action=update&codped=$codpedselect&reserva=$reserva&pg=$pg&impressao=1&desloc=$desloc&tipo_finasa_cel=$tipo_finasa_cel");
	exit;

	break;
	
	   
        case "checklist_telemig":

        // CONTRATO DE GARANTIA
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "iniciochecklist_celular.php?Action=update&codped=$codpedselect&reserva=$reserva&pg=$pg&impressao=1&desloc=$desloc");
	exit;

	break;
	
	 case "pesquisa_vpropag":

     //PESQUISA DE VEICULO
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "iniciopesquisa_vpropag.php?Action=update&codped=$codpedselect&reserva=$reserva&pg=$pg&impressao=1&desloc=$desloc&codemp_view=$codemp_view&codvend_view=$codvend_view&tipo_orc_view=$tipo_orc_view");
	exit;

	break;
	
}
?>
