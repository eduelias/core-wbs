gen<?php

//$codpedselect = "$id_session";
//$codpedselect = "1870";

// WBS
// arquivo:	start_ped_page_carrinho.php
// template:	ped_page_carrinho.htm

$_SESSION['vgarext_12_calc'] = 0;
$_SESSION['vgarext_24_calc'] = 0;
$_SESSION['valortabela_real'] = 0;
$_SESSION['valortotal'] = 0;

if (!$start_session){
#require("../classprod.php");
}

#echo("pedido = $codpedselect");

// inicio da classe
#$prod = new operacao();

$prod->clear();
$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela, fatorusertabela_ata","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();;
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();
$fatorusertabela_ata = $prod->showcampo4();

$prod->listProdU("nome","empresa", "codemp='$codempselect'");
$nomeempselect = $prod->showcampo0();


switch ($Action)
{
	case "delete":
	        if ($delwhat == "micro") {
		$condicaodel = "codprodcj='$Dcodprodcj' AND tipocj='$Dtipocj' AND codped='$codpedselect'";
		} else {

		$condicaodel = "codpped='$codppedselect'";
        }
        $prod->delProd("pedidoprodtemp", $condicaodel);
	break;

	case "atualiza":
	        if ($updtwhat == "micro") {
	        
	$prod->listProdU("SUM(qtde*ppu) as subtotal", "pedidoprodtemp", "codprodcj='$codcjselect' AND tipocj='$codtipocjselect' AND codped='$codpedselect'");
	$valor_tabela_tipocj = $prod->showcampo0();

	$valormod = str_replace('.','',$valormod);
	$valormod = str_replace(',','.',$valormod);
	
	$fator_micro = $valormod / $valor_tabela_tipocj;
	
	$prod->upProdU("pedidoprodtemp","fator_micro = '$fator_micro'", "codprodcj='$codcjselect' AND tipocj='$codtipocjselect' AND codped='$codpedselect'");

		} else {
		      
	$prod->listProdU("SUM(qtde*ppu) as subtotal", "pedidoprodtemp", "codpped='$codppedselect'");
	$valor_tabela_tipocj = $prod->showcampo0();

	$valormod = str_replace('.','',$valormod);
	$valormod = str_replace(',','.',$valormod);

	$fator_micro = $valormod / $valor_tabela_tipocj;

	$prod->upProdU("pedidoprodtemp","fator_micro = '$fator_micro'", "codpped='$codppedselect'");
		      
		}
	
	$codcjselect = 0;
	break;
	
	case "retornavalores":
	
		$prod->upProdU("pedidoprodtemp","fator_micro = 1", "codped='$codpedselect' ");
	
	break;
	
	case "cancela_carrinho":

		$prod->delProd("pedidotemp", "codped=$codpedselect");
		$prod->delProd("pedidoprodtemp", "codped=$codpedselect");
		$prod->delProd("pedidoparcelastemp", "codped=$codpedselect");
		
		// APAGA COOKIE
		$prod->begin_id("id_session", "");
		
	// ENVIA PARA FINALIZAR ORCAMENTO
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?pg=$pg");

	break;
	
	
	
	
	default:
		
	#$prod->listProdU("SUM(v_garonsite_12) as gos_12", "pedidoprodtemp, produtos", "codped='$codpedselect' and pedidoprodtemp.codprod = produtos.codprod and garonsite_12 = 'OK'");
	#$valor_gos_12 = $prod->showcampo0();

	#$prod->listProdU("SUM(v_garonsite_24) as gos_24", "pedidoprodtemp, produtos", "codped='$codpedselect' and pedidoprodtemp.codprod = produtos.codprod and garonsite_24 = 'OK'");
	#$valor_gos_24 = $prod->showcampo0();
	
	#$prod->upProdU("pedidoprodtemp, produtos","gos_12 = 'OK'", "codped='$codpedselect' and pedidoprodtemp.codprod = produtos.codprod and garonsite_12 = 'OK'");
	
	#$prod->upProdU("pedidoprodtemp, produtos","gos_24 = 'OK'", "codped='$codpedselect' and pedidoprodtemp.codprod = produtos.codprod and garonsite_24 = 'OK'");
	
	break;
	
	
}


if ($codpedselect <> ""){

// Rotina Default
$prod->listProdSum("pedidoprodtemp.codprod, nomeprod, pedidoprodtemp.qtde, ppu * pedidoprodtemp.qtde AS pput, codprodcj, tipoprod, tipocj, descres, prod_placa, fator_micro, produtos.hist, produtos.lib_linha, produtos.cor1_prod, produtos.cor2_prod, codpped, codplano, produtos.gar_um, produtos.gar_cj, garext_12, garext_24, porc_garext_12, porc_garext_24, codsubcat, codcat, garonsite_12, garonsite_24, v_garonsite_12, v_garonsite_24", "pedidoprodtemp, produtos", "codped = '$codpedselect' AND pedidoprodtemp.codprod = produtos.codprod ", $arrayx, $array_campox, "ORDER BY tipoprod, tipocj, ordem, nomeprod");

//$prod->listProdSum("pedidoprod.codprod, nomeprod, qtde, ppu * qtde AS pput, codprodcj, tipoprod, tipocj, descres", "pedidoprod, produtos", "codped = '$codpedselect' AND pedidoprod.codprod = produtos.codprod", $arrayx, $array_campox, "ORDER BY tipoprod, tipocj, nomeprod");

$block_maxx = 1;

for ($i = 0; $i < count($arrayx); $i++)
{
	$prod->mostraProd($arrayx, $array_campox, $i);
	
	$t= $i -1;
	#$est[$codprod[$t]] = $est[$codprod[$t]] + $qtde[$t];
	
	// Dados
	$codprod[$i] = $prod->showcampo0();
	$nomeprod[$i] = $prod->showcampo1();
	$qtde[$i] = $prod->showcampo2();
	$pput[$i] = $prod->showcampo3();
	$codprodcj[$i] = $prod->showcampo4();
	$tipoprod[$i] = $prod->showcampo5();
	$tipocj[$i] = $prod->showcampo6();
	$descres[$i] = $prod->showcampo7();
	$prod_placa[$i] = $prod->showcampo8();
	$fator_micro = $prod->showcampo9();
	$prod_flinha[$i] = $prod->showcampo10();
	$prod_lib_linha[$i] = $prod->showcampo11();
	$cor1_prod[$i] = $prod->showcampo12();
	$cor2_prod[$i] = $prod->showcampo13();
	$codpped[$i] = $prod->showcampo14();
	$codplano[$i] = $prod->showcampo15();
	$gar_um[$i] = $prod->showcampo16();
	$gar_cj[$i] = $prod->showcampo17();
	if ($gar_um[$i] == 0){$gar_um[$i] = 12;}
	if ($gar_cj[$i] == 0){$gar_cj[$i] = 12;}
	$garext_12[$i] = $prod->showcampo18();
	$garext_24[$i] = $prod->showcampo19();
	$porc_garext_12[$i] = $prod->showcampo20();
	$porc_garext_24[$i] = $prod->showcampo21();
	$codsubcat_prod[$i] = $prod->showcampo22();
	$codcat_prod[$i] = $prod->showcampo23();
	$garonsite_12[$i] = $prod->showcampo24();
	$garonsite_24[$i] = $prod->showcampo25();
	$v_garonsite_12[$i] = $prod->showcampo26();
	$v_garonsite_24[$i] = $prod->showcampo27();
	
	if ($codsubcat_prod[$i] == 218){$block_maxx = $block_maxx * 0;}else{$block_maxx = $block_maxx * 1;}
	
	$est[$codprod[$i]] = $est[$codprod[$i]] + $qtde[$i];
	
	$prod->clear();
	$prod->listProdU("COUNT(*)", "pedidoprodtemp, produtos", "codped = '$codpedselect' and (tipocj <> 0 or codcat = 73) and pedidoprodtemp.codprod = produtos.codprod GROUP BY tipocj ");
	$libos[$i] = $prod->showcampo0();
	
	
    if ((($garext_12[$i]=="OK" or $garext_24[$i]=="OK") and  $tipoprod[$i] == "CJ") or (($garext_12[$i]=="OK" or $garext_24[$i]=="OK") and  $codcat_prod[$i] == 73)){$estrela[$i] = 1;}else{$estrela[$i] = 0;}
     if ((($garonsite_12[$i]=="OK" or $garonsite_24[$i]=="OK") and  $tipoprod[$i] == "CJ") or (($garonsite_12[$i]=="OK" or $garonsite_24[$i]=="OK") and  $codcat_prod[$i] == 73 ) or (($garonsite_12[$i]=="OK" or $garonsite_24[$i]=="OK") and  $tipoprod[$i] == "UM" and $libos[$i] <> 0)){$estrela_os[$i] = 1;}else{$estrela_os[$i] = 0;}
     
   #echo $tipoprod[$i];	  echo $libos[$i];
	#echo "$cor1_prod[$k] - $cor2_prod[$k]<br>";

	if (($cor1_prod[$i] == '') AND ($cor2_prod[$i] == '')) { $mostra_cor[$i] = '1'; }
	if ($cor1_prod[$i] <> '') { $borda_cor1[$i] = "border: 1px solid #000000"; }
	if ($cor2_prod[$i] <> '') { $borda_cor2[$i] = "border: 1px solid #000000"; }
	
        $pput[$i] = $pput[$i] * $fator_micro;
        
       	if (($garext_12[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_12[$i]== "OK" and $codcat_prod[$i] == 73) ){$vgarext_12 += ($porc_garext_12[$i]/100)*$pput[$i];}
       	if (($garext_24[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_24[$i]== "OK" and $codcat_prod[$i] == 73) ){$vgarext_24 += ($porc_garext_24[$i]/100)*$pput[$i];}

	//FORMATADO
	$pputf[$i] =  $prod->fpreco($pput[$i]);

	$prod->clear();
	$prod->listProdU("nomeprod", "produtos", "codprod = $codprodcj[$i]");
	$nomeprodcj[$i] = $prod->showcampo0();

	$prod->clear();
	$prod->listProdU("plano", "produtos_planos", "codplano = $codplano[$i]");
	$descr_plano[$i] = $prod->showcampo0();
	
 	// CALCULA O ESTOQUE RESTANTE DE CADA PRODUTO
	$prod->clear();
	$prod->listProdU("SUM(qtde-reserva), reserva","estoque", "codprod=$codprod[$i] and estoque.codemp=$codempselect GROUP by codprod");
	$qtde_est[$i] = $prod->showcampo0();
	$reserva[$i] = $prod->showcampo1();
	
		// MARRETA PARA MOSTRAR ESTOQUE DA FABRICA 
		#echo "est=".$qtde_est[$i]."<BR>";
		if ($codempselect ==15){
			
			$prod->clear();
			$prod->listProdU("COUNT(*) est","codbarra", "codprod=$codprod[$i] and codemp=14 and tipo_fab <>'P' and codbarraped <> 1 GROUP by codprod ");
			$est_fab[$i] = $prod->showcampo0();
			$prod->clear();
			$prod->listProdU("SUM(reserva) as res","estoque", "estoque.codprod=$codprod[$i] and estoque.codemp=14");
			$res_fab[$i] = $prod->showcampo0();
			
			$qtde_est[$i] = $qtde_est[$i] + ($est_fab[$i]-$res_fab[$i]);
				#echo "est_fb=".$est_fab[$i]."<BR>";
		}
		#echo "est_t=".$qtde_est[$i]."<BR>";

	$est[$i] = $qtde_est[$i] - $est[$codprod[$i]];
	$est_prod = $est[$codprod[$i]];
	
	
	$prod->clear();
	$prod->listProdU("SUM(qtdecomp) + $est[$i] as est_oc,  dataprevcheg ","ocprod, oc", "codprod=$codprod[$i] and ocprod.codemp=$codempselect and oc.hist <> 1 and oc.codoc=ocprod.codoc GROUP by codprod ORDER by dataprevcheg DESC");
	$qtde_oc[$i] = $prod->showcampo0();
	$dataprev_oc[$i] = $prod->showcampo1();
	$dataprev_ocf[$i] = $prod->fdata($dataprev_oc[$i]);
	
	//echo "codprod-".$codprod[$i]."est=".$qtde_est[$i]."qtdeoc=".$qtde_oc[$i]."estProd=".$est[$codprod[$i]]."<BR>";
	
	// CRIA A VARIAVEL placaSelect PARA ALTERACAO DE CONJUNTOS
	if ($prod_placa[$i] == "OK"){$placaSelect_alter[$tipocj[$i]] = "$codprod[$i]:$codprodcj[$i]:$tipocj[$i]";}
	
	// PRODUTO FORA DE LISTA
 	if ($prod_flinha[$i] == "Y" ){
	 	$prod_lib[$i] = 1;
	}else{
		#if ($est[$i] <= 0 and $prod_lib_linha[$i] == 'Y'){$prod_lib[$i] = 1;}
	}
}//FOR


#print_r(array_values ($arrayx));
$prod->clear();
$prod->listProdSum("tipocj, SUM(qtde*ppu*fator_micro) as subtotal, qtde, SUM(qtde*ppu) as subtotal_tabela", "pedidoprodtemp, produtos", "codped = '$codpedselect' and pedidoprodtemp.codprod = produtos.codprod", $array1, $array_campo1, "GROUP BY tipocj ORDER BY tipoprod, tipocj");

//$prod->listProdSum("tipocj, SUM(qtde*ppu) as subtotal, qtde", "pedidoprod", "codped = '$codpedselect'", $array1, $array_campo1, "GROUP BY tipocj ORDER BY tipoprod, tipocj");

for ($j = 0; $j < count($array1); $j++)
{
	$prod->mostraProd($array1, $array_campo1, $j);
	$tipocj_soma = $prod->showcampo0();
	$subtotal[$tipocj_soma] = $prod->showcampo1();
	$qtdetotal[$tipocj_soma] = $prod->showcampo2();
	$subtotal_tabela[$tipocj_soma] = $prod->showcampo3();
	

	// FORMATADO
	$subtotalf[$tipocj_soma] =  $prod->fpreco($subtotal[$tipocj_soma]);
	
	$total =  $total + $subtotal[$tipocj_soma];
	$total_tabela =  $total_tabela + $subtotal_tabela[$tipocj_soma];
}//FOR

// CALCULO DO PRECO REAL
$prod->clear();
$prod->listProdSum("tipoprod, pedidoprodtemp.qtde, (pvacj*fatorata*$fatorusertabela_ata), (pva*fatorata*$fatorusertabela_ata), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), codplano, descplano, pedidoprodtemp.codprod, pvd, pvdcj, fdist", "pedidoprodtemp, produtos, estoque", "codped = '$codpedselect' AND pedidoprodtemp.codprod=produtos.codprod AND produtos.codprod=estoque.codprod and estoque.codemp='$codempselect'", $array1, $array_campo1, "");

for ($j = 0; $j < count($array1); $j++)
{
	$prod->mostraProd($array1, $array_campo1, $j);
	$tipoprod_real = $prod->showcampo0();
	$qtde_real = $prod->showcampo1();
	$pvacj_real = $prod->showcampo2();
	$pva_real = $prod->showcampo3();
	$pvvcj_real = $prod->showcampo4();
	$pvv_real = $prod->showcampo5();
	$codplano_real = $prod->showcampo6();
    $bonus_real = $prod->showcampo7();
    $codprod_real = $prod->showcampo8();
	$pvd_real = $prod->showcampo9();
	$pvdcj_real = $prod->showcampo10();
	$fdist_real = $prod->showcampo11();
    
    if ($codplano_real <> 0){
    $prod->clear();
    $prod->listProdU("desconto","produtos_planos_relacao", "codplano = $codplano_real and codprod = $codprod_real");
    $desconto_real = $prod->showcampo0();
    }else{
      $desconto_real = 0;
    }
    
	if ($tipovend == "A" or $tipovend == "R"){
	   	if ($tipoprod_real == "CJ"){$preco_real = $pvdcj_real;}else{$preco_real = $pvd_real;}
	}else{
		if ($tipoprod_real == "CJ"){$preco_real = $pvvcj_real;}else{$preco_real = $pvv_real;}
 	}

    $preco_real = $preco_real - $desconto_real - $bonus_real;
    $preco_real = $preco_real*$qtde_real;
 	$total_tabela1 =  $total_tabela1 + $preco_real;
	$vc_real = $vc_real + $preco_real*$fdist_real;
 	
  	

}//FOR

   	if ($total_tabela1 < 0){$total_tabela1 = 0;}
	// FORMATADO
	$totalf =  $prod->fpreco($total);
	$total_tabelaf =  $prod->fpreco($total_tabela1);

}




#$_SESSION['valortabela_real'] = $total_tabela1;
$_SESSION['valortabela_real'] = $total_tabela1;
$_SESSION['valortotal'] = $total;
$_SESSION['valorcusto_real'] = $vc_real;
$_SESSION['vgarext_12_calc'] = $vgarext_12;
$_SESSION['vgarext_24_calc'] = $vgarext_24;
$_SESSION['vgaros_12_calc'] = 0;



#include("topo.php");

// Chama a Template
include("templates/ped_page_carrinho.htm");

#include("rodape.php");

?>
