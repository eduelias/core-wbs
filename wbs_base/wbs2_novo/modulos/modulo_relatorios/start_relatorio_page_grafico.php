<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");


 #include("topo.php");
 
// inicio da classe
$prod = new operacao();
 


switch ($Action)
{

	case "pesquisa":

		if ($codemp_select <> -1){
		// Busca codvend
		$prod->clear();
        $prod->listProdU("nome", "empresa", "codemp = '$codemp_select'");
        $nomeemp_select = $prod->showcampo0();
		}else{
		$nomeemp_select = "TODAS";
		}

		break;
}

 
 // VERIFICA SE TEM EMPRESA TRANSFERENCIA
if ($codgrp_vend == 2 or $codgrp_vend == 54){
    $cond = "";
}else{
    if ($codemp_transf_vend <> 0 ){
        $cond = "codemp = '$codemp_transf_vend'";#$empresa = $codemp_transf_vend;
    }else{
        $cond = "";
    }
}


$prod->listProdSum("codemp, nome", "empresa", $cond, $array_pesq, $array_campo_pesq, "ORDER BY nome");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codemp_pesq[$i] = $prod->showcampo0();
	$nomeemp_pesq[$i] = $prod->showcampo1();
	
}


		     include("templates/relatorio_page_celular_grafico.htm");

		       	#include("rodape.php");


?>
