<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN

 $prod->clear();
 $prod->listProdU("mcv_prot_max, mcv_prot_min, mcv_incre, meia_mcv_hab", "vendedor", "codvend = '$codvend'");
 
 $mcv_prot_max = $prod->showcampo0();
 $mcv_prot_min = $prod->showcampo1();
 $mcv_incre = $prod->showcampo2();
 $meia_mcv_hab = $prod->showcampo3();
 
switch ($Action)
{

	case "simula":
	
     $valortabelavista = $vt * $fatorvista;
     
     #echo("$mcv_aplic_sim - $mcv_real");
    
     if ($meia_mcv_sim == "S"){
     	
     	if ($meia_mcv_hab == "S"){
    		$mcv = ((100-$mcv_real)/2)+$mcv_real;
        	$mlb = ($mcv*$valortabelavista)/1000;
        }else{$erro_per = "Sem Permissão para MEIA MCV"; $ckerro_per = 1;}
        
     }else{

		if ($mcv_real >= $mcv_prot_min and $mcv_real <= $mcv_prot_max){
		                
		    if (($mcv_aplic_sim - $mcv_real) <= $mcv_incre and ($mcv_aplic_sim) <= $mcv_prot_max and ($mcv_aplic_sim) >= $mcv_prot_min){
		       	$mcv = $mcv_aplic_sim;
		       	$mlb = ($mcv_aplic_sim*$valortabelavista)/1000;
		       	}else{$erro_per = "Sem Permissão"; $ckerro_per = 1;}
		}else{$erro_per = "Sem Permissão"; $ckerro_per = 1;}
	}
			
    $mcv_sim = $mcv;
    $mlb_sim = $mlb;
    
    	if ($meia_mcv_sim == "S"){$chk_meia = "checked";}else{$chk_meia = "";}

	
		break;
		
	case "grava":
	
		if ($codbarrapesq){

	        if ($meia_mcv_sim == ""){$meia_mcv_sim = "N";}
	        if ($meia_mcv_sim == "S"){$mcv_prot_sim = 100;$mcv_aplic_sim = 0;}
	        $prod->clear();
			$prod->listProdU("codped, ckmlb", "pedido", "codbarra = '$codbarrapesq'");
			$codped_gr = $prod->showcampo0();
			$ckmlb_gr = $prod->showcampo1();
			
			echo("$codbarrapesq");
			
			if ($ckmlb_gr <> 'OK' and $ckerro_per <> 1){
	         	$prod->upProdU("pedido","mlb = '$mlb_sim', mcv = '$mcv_sim', mcv_prot = '$mcv_prot_sim', mcv_aplic = '$mcv_aplic_sim', meia_mcv ='$meia_mcv_sim'","codped='$codped_gr'");
	         	$msg = "COMISSÃO MODIFICADA CORRETAMENTE";
	        }else{
	          	$msg = "PEDIDO NÃO PODE SER MODIFICADO, POIS A COMISSÃO JÁ FOI PAGA.";
	        }
		}

		break;
}


if ($codbarrapesq <> ""){
	
		#echo("$codproj_vend");
		
        $prod->clear();
		$prod->listProdU("codped, codbarra, mcv, mlb, vpp, mlb_real, mcv_real, pedido.mcv_prot, pedido.mcv_aplic, pedido.meia_mcv, vt, fatorvista ", "pedido, vendedor", " pedido.codvend=vendedor.codvend and vendedor.codproj = '$codproj_vend' and  cancel <>'OK' and ckmlb <> 'OK' and codbarra = '$codbarrapesq'");

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

		     include("templates/ped_page_altera_mlb_sup.htm");

#include("rodape.php");


?>
