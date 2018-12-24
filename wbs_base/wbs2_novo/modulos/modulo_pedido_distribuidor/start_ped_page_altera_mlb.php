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

	case "simula":
	
     $valortabelavista = $vt * $fatorvista;
     
     echo("$mcv_prot_sim - $mcv_real");

	if ($mcv_real < $mcv_prot_sim)
            {
                if ($meia_mcv_sim == "S"){
                    $mcv = (($mcv_prot_sim-$mcv_real)/2)+$mcv_real;
                    $mlb = ($mcv*$valortabelavista)/1000;
                }else{
                    $mcv = $mcv_aplic_sim;
                    $mlb = ($mcv_aplic_sim*$valortabelavista)/1000;
             }
     }
	
    $mcv_sim = $mcv;
    $mlb_sim = $mlb;
    
    	if ($meia_mcv_sim == "S"){$chk_meia = "checked";}else{$chk_meia = "";}

	
		break;
		
	case "grava":

        if ($meia_mcv_sim == ""){$meia_mcv_sim = "N";}
        $prod->clear();
		$prod->listProdU("codped, ckmlb", "pedido", "codbarra = '$codbarrapesq'");
		$codped_gr = $prod->showcampo0();
		$ckmlb_gr = $prod->showcampo1();
		
		if ($ckmlb_gr <> 'OK'){
         	$prod->upProdU("pedido","mlb = '$mlb_sim', mcv = '$mcv_sim', mcv_prot = '$mcv_prot_sim', mcv_aplic = '$mcv_aplic_sim', meia_mcv ='$meia_mcv_sim'","codped='$codped_gr'");
         	$msg = "COMISSÃO MODIFICADA CORRETAMENTE";
        }else{
          	$msg = "PEDIDO NÃO PODE SER MODIFICADO, POIS A COMISSÃO JÁ FOI PAGA.";
        }

		break;
}


if ($codbarrapesq <> ""){

        $prod->clear();
		$prod->listProdU("codped, codbarra, mcv, mlb, vpp, mlb_real, mcv_real, mcv_prot, mcv_aplic, meia_mcv, vt, fatorvista", "pedido", "cancel <>'OK' and ckmlb <> 'OK' and codbarra = '$codbarrapesq'");

		$codped_rel = $prod->showcampo0();
		$codbarra_rel = $prod->showcampo1();
		$mcv_rel = $prod->showcampo2();
		$mlb_rel = $prod->showcampo3();
   		$vpp_rel = $prod->showcampo4();
   		$mlb_real_rel = $prod->showcampo5();
		$mcv_real_rel = $prod->showcampo6();
		$mcv_prot_rel = $prod->showcampo7();
		$mcv_aplic_rel = $prod->showcampo8();
		$meia_mcv_rel = $prod->showcampo9();
		$vt_rel = $prod->showcampo10();
		$fatorvista_rel = $prod->showcampo11();
	

}


#include("topo.php");

		     include("templates/ped_page_altera_mlb.htm");

#include("rodape.php");


?>
