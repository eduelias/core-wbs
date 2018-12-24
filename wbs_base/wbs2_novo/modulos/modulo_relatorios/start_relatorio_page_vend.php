<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN


// Busca codvend
$prod->listProdU("codvend, allemp, codemp", "vendedor", "nome = '$login'");
$var_codvend = $prod->showcampo0();
$var_allemp = $prod->showcampo1();

if ($var_allemp <> 'Y'){
	$var_codemp = $prod->showcampo2();
}

switch ($Action)
{

	case "pesquisa":
	
  		$prod->clear();
		$prod->listProdSum("codped, codbarra, nome, cpf, cnpj, tipocliente, dataped", "pedido, clientenovo", "codvend = '$codvend_select' and pedido.codcliente=clientenovo.codcliente and dataped > '$aini-$mini-$dini' and dataped < '$afim-$mfim-$dfim' and cancel <>'OK'", $array2, $array2_campo, "ORDER BY codped");
		for($i = 0; $i < count($array2); $i++ ){
			$prod->mostraProd( $array2, $array2_campo, $i );

			$codped_rel[$i] = $prod->showcampo0();
			$codbarra_rel[$i] = $prod->showcampo1();
			$nome_rel[$i] = $prod->showcampo2();
			$cpf_rel[$i] = $prod->showcampo3();
    		$cnpj_rel[$i] = $prod->showcampo4();
    		$tipocliente_rel[$i] = $prod->showcampo5();
   			$dataped_rel[$i] = $prod->showcampo6();
   			

    		
    		if ($tipocliente_rel[$i] == "F"){$doc[$i]=$cpf_rel[$i];}else{$doc[$i]=$cnpj_rel[$i];}
    		   		
    		$prod->clear();
   			$prod->listProdSum("codplano, qtde, codprod", "pedidoprod", "codped='$codped_rel[$i]' and codplano <> 0", $array1, $array_campo1, "GROUP by codprod");
		for($j = 0; $j < count($array1); $j++ ){
            $prod->mostraProd( $array1, $array_campo1, $j );

   			$codplano_rel[$i][$j] = $prod->showcampo0();
			$qtde_rel[$i][$j] = $prod->showcampo1();
			$codprod_rel[$i][$j] = $prod->showcampo2();
			
			$codplano_t = $codplano_rel[$i][$j];
			$codprod_t = $codprod_rel[$i][$j];
			
            $prod->listProdU("plano", "produtos_planos", "codplano='$codplano_t' and hist <> 'S'");
            $nomeplano_rel[$i][$j] = $prod->showcampo0();

            $prod->listProdU("nomeprod", "produtos", "codprod='$codprod_t'");
            $nomeprod_rel[$i][$j] = $prod->showcampo0();
			
        }//FOR

        $sub_array[$i] = $j;

		}//FOR

		// Busca codvend
        $prod->listProdU("nome", "vendedor", "codvend = '$codvend_select'");
        $nomevend_select = $prod->showcampo0();

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

		     include("templates/relatorio_page_celular_vend.htm");

		       	#include("rodape.php");


?>
