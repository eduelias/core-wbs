<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN

switch ($Action)
{

	case "pesquisa":
	
		// Busca codvend
        $prod->listProdU("nome, codemp", "vendedor", "codvend = '$codvend_select'");
        $nomevend_select = $prod->showcampo0();
		$codempvend_select = $prod->showcampo1();
		break;
}

if ($codgrp_vend == 2 or $codgrp_vend == 54){
    $cond = "";
}else{
    $cond = " and codemp = '$codemp_transf_vend'";#$empresa = $codemp_transf_vend;
}



$prod->listProdSum("codvend, nome", "vendedor", "block <> 'Y' and tipo_celular ='Y' ".$cond , $array_pesq, $array_campo_pesq, "ORDER BY nome");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codvend_pesq[$i] = $prod->showcampo0();
	$nomevend_pesq[$i] = $prod->showcampo1();
	
}




 #include("topo.php");

		     include("templates/relatorio_page_celular_grafico_vend.htm");

		       	#include("rodape.php");


?>
