<?php

// ARQUIVO DE CONFIGURACAO DO MICRO

//require("../classprod.php");

$placaSelect = "0:-11:1";
$codcatplataforma = 28; // CODIGO DA CATEGORIA DE PLATAFORMAS
$var_select = explode(":", $placaSelect);
$codplacaselect =  $var_select[0]; // CODIGO DA PLACA
$codcjselect = $var_select[1]; // CODIGO DA PLATAFORMA
if ($Action_alter== "altera" and $pesq == 1){
$placaSelect = $codplacaselect.":".$codcjselect.":".$codtipocjselect; // CODIGO DO TIPOCJ
}else{
$codtipocjselect = $var_select[2]; // CODIGO DO TIPOCJ
}
#$login = "felipe";

// INICIO DA CLASSE
$prod = new operacao();

$prod->clear();
$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela, fatorusertabela_ata","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();
$fatorusertabela_ata = $prod->showcampo4();

#echo("pedido = $codpedselect - codemp= $codempselect - fator = $fatorusertabela");


		
switch ($Action)
{
	case "start":

	 $prod->delProd("pedidoprodtemp_micro", "codped = '$codpedselect'");

		break;

       	case "start_altera":

	 $prod->delProd("pedidoprodtemp_micro", "codped = '$codpedselect' and prod_add <> 'OK'");

		break;
		
		case "grava":

        $prod->clear();
    	$prod->listProdgeral("pedidoprodtemp_micro", "codped = '$codpedselect'", $arrayx1, $array_campox1, "");

    		for($i = 0; $i < count($arrayx1); $i++ ){

    			$prod->mostraProd( $arrayx1, $array_campox1, $i );
    			$codprod_ped = $prod->showcampo2();

    			// VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
    			$prod->clear();
    			$prod->listProdU("gar_um, gar_cj","produtos", "codprod = '$codprod_ped'");
                $gar_um = $prod->showcampo0();
    			$gar_cj = $prod->showcampo1();

    			$prod->clear();
    			$prod->mostraProd( $arrayx1, $array_campox1, $i );
    			$prod->setcampo0("");
                $prod->setcampo7(0); // COD CJ
   				$prod->setcampo8("UM");
    			$prod->setcampo9(0); //TIPOCJ
    			$prod->setcampo11($gar_um);
    			$prod->setcampo12($gar_cj);
    			$prod->setcampo17(1);
    			$prod->setcampo22("NO"); //KIT
    			$prod->addProd("pedidoprodtemp", $uregmicro);
    		}

     		 $prod->delProd("pedidoprodtemp_micro", "codped = '$codpedselect'");


    		if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
    		header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=2&codpedselect=$codpedselect");

    		break;
}
					

	//PESQUISA DA PÁGINA
		
		// LISTA OS REGISTROS
	$prod->listProdSum("produtos.codcat, produtos.codsubcat, produtos.codprod, SUM(qtde-reserva) as est, lib_linha, descres, nomeprod, (pvacj*1*$fatorusertabela_ata), (pva*1*$fatorusertabela_ata), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), restricao_pl, n_prod_int, n_prod_ext, nomecat, nomesubcat, ordem, cor1_prod, cor2_prod, reserva, produtos.gar_um, produtos.gar_cj, garext_12, garext_24, pvd*$fatorusertabela_ata, pvdcj*$fatorusertabela_ata", "produtos, estoque, categoria, subcategoria", "produtos.codprod=estoque.codprod AND categoria.codcat=produtos.codcat AND subcategoria.codsubcat=produtos.codsubcat AND estoque.codemp = $codempselect AND produtos.hist <> 'Y' AND cat_micro = 'OK' ", $array2, $array_campo2, "GROUP BY produtos.codprod  ORDER BY  ordem, nomecat, nomesubcat, nomeprod ");

	for($k = 0; $k < count($array2); $k++ ){

	$prod->mostraProd( $array2, $array_campo2, $k );

	$codcat[$k] = $prod->showcampo0();
	$codsubcat[$k] = $prod->showcampo1();
	$codprod[$k] = $prod->showcampo2();
	$est[$k] = $prod->showcampo3();
	$lib_linha[$k] = $prod->showcampo4();
	$descres[$k] = $prod->showcampo5();
	$nomeprod[$k] = $prod->showcampo6();
	$pvacj[$k] = $prod->showcampo7();
	$pva[$k] = $prod->showcampo8();
	$pvvcj[$k] = $prod->showcampo9();
	$pvv[$k] = $prod->showcampo10();
	$restricao_pl[$k] = $prod->showcampo11();
	$n_prod_int[$k] = $prod->showcampo12();
	$n_prod_ext[$k] = $prod->showcampo13();
	$nomecat[$k] = $prod->showcampo14();
	$nomesubcat[$k] = $prod->showcampo15();
	$ordem[$k] = $prod->showcampo16();
	$cor1_prod[$k] = $prod->showcampo17();
	$cor2_prod[$k] = $prod->showcampo18();
	$reserva[$k] = $prod->showcampo19();
	$gar_um[$k] = $prod->showcampo20();
	$gar_cj[$k] = $prod->showcampo21();
	if ($gar_um[$k] == 0){$gar_um[$k] = 12;}
	if ($gar_cj[$k] == 0){$gar_cj[$k] = 12;}
	$garext_12[$k] = $prod->showcampo22();
	$garext_24[$k] = $prod->showcampo23();
	$pvd[$k] = $prod->showcampo24();
	$pvdcj[$k] = $prod->showcampo25();
		// MARRETA PARA MOSTRAR ESTOQUE DA FABRICA 
		#echo "est=".$est[$k]."<BR>";
		
		if ($codempselect ==15){
			
			$prod->clear();
			$prod->listProdU("COUNT(*) est","codbarra", "codprod=$codprod[$k] and codemp=14 and tipo_fab <>'P' and codbarraped <> 1 GROUP by codprod ");
			$est_fab[$k] = $prod->showcampo0();
			$prod->clear();
			$prod->listProdU("SUM(reserva) as res","estoque", "estoque.codprod=$codprod[$k] and estoque.codemp=14");
			$res_fab[$k] = $prod->showcampo0();
			
			$est[$k] = $est[$k] + ($est_fab[$k]-$res_fab[$k]);
				#echo "est_fb=".$est_fab[$k]."<BR>";
		}
		#echo "est_t=".$est[$k]."<BR>";
		
    if ($garext_12[$k]=="OK" or $garext_24[$k]=="OK"){$estrela[$k] = 1;}else{$estrela[$k] = 0;}
	
	#echo "$cor1_prod[$k] - $cor2_prod[$k]<br>";
	
	if (($cor1_prod[$k] == '') AND ($cor2_prod[$k] == '')) { $mostra_cor[$k] = '1'; }
	if ($cor1_prod[$k] <> '') { $borda_cor1[$k] = "border: 1px solid #000000"; }
	if ($cor2_prod[$k] <> '') { $borda_cor2[$k] = "border: 1px solid #000000"; }

	if ($tipovend == "A" or $tipovend == "R"){$preco[$k] = $pvd[$k];}else{$preco[$k] = $pvvcj[$k];}
	
	// FORMATADO
	$precof[$k] =  $prod->fpreco($preco[$k]);



#echo("A = $codprod[$k] - $prod_selected[$k]<br>");


// PESQUISA NUMERO DE OC DE COMPRA

	if ($codempselect == 15){$cond1 = "(ocprod.codemp = 14 or ocprod.codemp = 15)";$cond2 = " and codped_transf = 0";}else{$cond1 = "(ocprod.codemp = $codempselect)";$cond2 = "";}

	$prod->clear();
	$prod->listProdU("SUM(qtdecomp) + $est[$k] as est_oc,  dataprevcheg ","ocprod, oc", "codprod=$codprod[$k] and ".$cond1." and oc.hist <> 1 and oc.codoc=ocprod.codoc  and tipo_nf <> 'P' ".$cond2." GROUP by codprod ORDER by dataprevcheg DESC");
	$qtde_oc[$k] = $prod->showcampo0();
	$dataprev_oc[$k] = $prod->showcampo1();
	$dataprev_ocf[$k] = $prod->fdata($dataprev_oc[$k]);


	// RESTRICAO DE VISUALIZACAO
	if ($est[$k] <= 0 and $lib_linha[$k] <> 'Y' and $qtde_oc[$k] <= 0){$restricao_view[$k] =1;}
	if ($preco[$k] == 0){$restricao_view[$k] =1;}
	#if ($est[$k] <= 0 ){$restricao_view[$k] = 1;}
	
	#if ($codempselect <> 14 and ($codsubcat[$k] == 225 or $codsubcat[$k] == 219)){$restricao_view[$k] =1;}
	
/*
if ($restricao_view[$k] <> 1){


		#$opcao[$k] = "checked";
		
		// SE HOUVER MODIFICACAO
		if ($modifica != 1){

		// ADICIONA PRODUTOS NA TABELA TEMPORARIA DO MICRO
		$prod->clear();
		$prod->setcampo1($codpedselect);
		$prod->setcampo2($codprod[$k]);
		$prod->setcampo3(1); // QTDE
		$prod->setcampo4($preco[$k]);
		$prod->setcampo7($codcjselect);
		$prod->setcampo8("CJ");
		$prod->setcampo9($codtipocjselect); //TIPOCJ
		$prod->setcampo18($ordem[$k]); //ORDEM
		$prod->setcampo19("OK"); // KIT
		
		$prod->addProd("pedidoprodtemp_micro", $uregmicro);
		
		}
}
*/

		#echo("sele= $codcjselect - $codprod[$k] - $prod_selected[$k]<br>");

	

    #echo("$codprod[$k] - $restricao_view[$k] - $qtde_oc[$k]<br>");

	} //FOR
	

#include("topo.php");
// TEMPLATE
include ("templates/ped_page_maxxpc.html");
#include("rodape.php");

?>
