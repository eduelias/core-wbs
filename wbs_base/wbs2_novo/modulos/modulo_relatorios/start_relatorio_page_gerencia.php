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
/*
   		$prod->listProdSum("codvend, nome", "vendedor", "block <> 'Y' and tipo_celular = 'Y'  and codemp = '$codemp_select'", $array2, $array2_campo, "ORDER BY nome");
    for ($i = 0; $i < count($array2); $i++ )
    {
    	$prod->mostraProd( $array2, $array2_campo, $i );

    	$codvend_rel[$i] = $prod->showcampo0();
    	$nomevend_rel[$i] = $prod->showcampo1();
  */  	
    	// PLANOS
    	
    	$prod->listProdSum("pedido.codvend, nome, SUM(if (codplano = 4,qtde, 0)) as controle, SUM(if (codplano = 5,qtde, 0)) as ideal, SUM(if (codplano = 6, qtde, 0)) as ideal_micro, SUM(if (codplano = 7, qtde, 0)) as cartao, SUM(if (codplano = 13, qtde, 0)) as ideal_75, SUM(if (codplano = 14, qtde, 0)) as ideal_150, SUM(if (codplano = 15, qtde, 0)) as ideal_300, SUM(if (codplano = 16, qtde, 0)) as controle_120, SUM(if (codplano = 17, qtde, 0)) as controle_160", "pedido, pedidoprod, vendedor", "vendedor.codvend = pedido.codvend and block <> 'Y' and tipo_celular = 'Y' and pedido.codped=pedidoprod.codped  and dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim 23:59:59' and pedido.codemp = '$codemp_select' AND cancel <> 'OK' ", $array2, $array2_campo, "GROUP by pedido.codvend ORDER BY nome");
        
    	
    for ($i = 0; $i < count($array2); $i++ )
    {
    	
    	$prod->mostraProd( $array2, $array2_campo, $i );
    	
    	$codvend_rel[$i] = $prod->showcampo0();
    	$nomevend_rel[$i] = $prod->showcampo1();
    	
    	$plano_controle_rel[$i] = $prod->showcampo2();
		$plano_ideal_rel[$i] = $prod->showcampo3();
		$plano_ideal_m_rel[$i] = $prod->showcampo4();
		$plano_cartao_rel[$i] = $prod->showcampo5();
		$plano_ideal_75_rel[$i] = $prod->showcampo6();
		$plano_ideal_150_rel[$i] = $prod->showcampo7();
		$plano_ideal_300_rel[$i] = $prod->showcampo8();
		$plano_controle_120_rel[$i] = $prod->showcampo9();
		$plano_controle_160_rel[$i] = $prod->showcampo10();
		
		/*
		// PLANO CONTROLE
		$prod->clear();
        $prod->listProdU("codvend, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim 23:59:59' and codemp = '$codemp_select' AND codplano = 4 and codvend = '$codvend_rel[$i]' GROUP by codvend");
        $plano_controle_rel[$i] = $prod->showcampo1();

       	// PLANO IDEAL
		$prod->clear();
        $prod->listProdU("codvend, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim 23:59:59' and codemp = '$codemp_select' AND codplano = 5 and codvend = '$codvend_rel[$i]' GROUP by codvend");
        $plano_ideal_rel[$i] = $prod->showcampo1();
        
       	// PLANO IDEAL MICRO
		$prod->clear();
        $prod->listProdU("codvend, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim 23:59:59' and codemp = '$codemp_select' AND codplano = 6 and codvend = '$codvend_rel[$i]' GROUP by codvend");
        $plano_ideal_m_rel[$i] = $prod->showcampo1();
        
         	// PLANO CARTAO
		$prod->clear();
        $prod->listProdU("codvend, sum(qtde)", "pedido, pedidoprod", "pedido.codped=pedidoprod.codped  and dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim 23:59:59' and codemp = '$codemp_select' AND codplano = 7 and codvend = '$codvend_rel[$i]' GROUP by codvend");
        $plano_cartao_rel[$i] = $prod->showcampo1();
*/

	}//FOR

		// Busca codvend
		$prod->clear();
        $prod->listProdU("nome", "empresa", "codemp = '$codemp_select'");
        $nomeemp_select = $prod->showcampo0();

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




 #include("topo.php");

		     include("templates/relatorio_page_celular_gerencia.htm");

		       	#include("rodape.php");


?>
