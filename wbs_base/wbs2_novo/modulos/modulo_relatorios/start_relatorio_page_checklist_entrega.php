<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



require("../../../classprod.php");
require("../../../config.inc.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN



switch ($Action)
{

	case "pesquisa":
	
        // MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, dataped, tipo_vge, endentrega, refentrega", "pedido", "codped=$codped");

		$codemp = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		$codvend = $prod->showcampo2();
		$vpp = $prod->showcampo3();
		$vppf = number_format($vpp,2,',','.');
		$nf = $prod->showcampo4();
		$codbarra = $prod->showcampo5();
		$dataped = $prod->showcampo6();
		$tipo_vge = $prod->showcampo7();
		$endentrega = $prod->showcampo8();
		$refentrega = $prod->showcampo9();
		
		$prod->listProdU("nome", "vendedor", "codvend=$codvend");
		$nomevend = $prod->showcampo0();
		

	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProdU("nome, tipocliente, cpf, cnpj, rg, rgemissor, endereco, bairro, cidade, cep, estado, numero, complemento, dddtel1, tel1, dddtel2, tel2", "clientenovo", "codcliente=$codcliente");

		$xnome=			$prod->showcampo0();
		$xtipocliente=	$prod->showcampo1();
		if ($xtipocliente == "F"){
		$xdoc=			$prod->showcampo2(); // CPF
		}else{
		$xdoc=			$prod->showcampo3(); // CNPJ
		}
		$xrg=			$prod->showcampo4();
		$xrgemissor=	$prod->showcampo5();
		$xendereco=		$prod->showcampo6();
		$xbairro=		$prod->showcampo7();
		$xcidade=		$prod->showcampo8();
		$xcep=			$prod->showcampo9();
		$xestado=		$prod->showcampo10();
        $xynumero = $prod->showcampo11();
        $xycomplemento = $prod->showcampo12();
        $xdddtel1 = $prod->showcampo13();
        $xtel1 = $prod->showcampo14();
        $xdddtel2 = $prod->showcampo15();
        $xtel2 = $prod->showcampo16();
            
        
        
        $prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){

			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf[$j] = $prod->showcampo0();
			$nf_ped[$j] = $prod->showcampo2();
			$valornf[$j] = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.');
    }//FOR

		break;
}



    include("templates/relatorio_page_checklist_entrega.htm");




?>
