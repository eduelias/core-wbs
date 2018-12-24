<?php

// WBS
// arquivo:		ped_page_micro02.php
// template:	ped_page_micro02.htm

//require("../classprod.php");

$var_select1 = explode(":", $placaSelect);
$codplacaselect =  0; // CODIGO DA PLACA
$codcjselect = 0; // CODIGO DA PLATAFORMA

// CRIA AS VARIAVEIS DE CODCAT E CODSUBCAT PARA A PESQUISA
switch ($tipoPesq)
{
	case "menu":

$var_select = explode(":", $menuSelect);
$codsubcatselect =  $var_select[0]; // CODIGO DA SUBCATEGORIA
$codcatselect = $var_select[1]; // CODIGO DA CATEGORIA
	break;

	default:

$var_select = explode(":", $pesqSelect);
$codsubcatselect =  $var_select[0]; // CODIGO DA SUBCATEGORIA
$codcatselect = $var_select[1]; // CODIGO DA CATEGORIA
	break;
}


// inicio da classe
$prod = new operacao();

$prod->clear();
$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela, fatorusertabela_ata, fatormajor","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();;
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();
$fatorusertabela_ata = $prod->showcampo4();
$fatormajor = $prod->showcampo5();

// Rotina Default


$prod->listProdSum("codcat, nomecat", "categoria", "codcat <> 46 and codcat <> 71 and codcat <> 72", $array_pesq, $array_campo_pesq, "ORDER BY nomecat");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codcatp[$i] = $prod->showcampo0();
	$nomecatp[$i] = $prod->showcampo1();

	$prod->clear();
	$prod->listProdSum("codsubcat, nomesubcat", "subcategoria", "codcat = $codcatp[$i]", $array_pesq1, $array_campo_pesq1, "ORDER BY nomesubcat");

	for ($j = 0; $j < count($array_pesq1); $j++ )
	{
		$prod->mostraProd( $array_pesq1, $array_campo_pesq1, $j );

		$codsubcatp[$i][$j] = $prod->showcampo0();
		$nomesubcatp[$i][$j] = $prod->showcampo1();

		$codsubcat_pesq[$i] .= "'".$codsubcatp[$i][$j].":".$codcatp[$i]."'".", ";
		$nomesubcat_pesq[$i] .= "'".$nomesubcatp[$i][$j]."'".", ";
	}
	$sub_array_pesq[$i] = $j;
	$codsubcat_pesq[$i] .= "''";
	$nomesubcat_pesq[$i] .= "''";
}


switch ($Action)
{

       	case "start":

		 $prod->delProd("pedidoprodtemp_micro", "codped = '$id_session'");

	break;

	case "pesquisa":


	//PESQUISA DA PÁGINA


	$palavrachave1 = strtolower($palavrachave);

	if ($palavrachave <> ""){

		$condicao2 = " LCASE(nomeprod) like '%$palavrachave1%' ";
		$condicao2 .= " AND produtos.hist <> 'Y' ";
		$condicao2 .= " AND categoria.codcat=produtos.codcat";
		$condicao2 .= " AND subcategoria.codsubcat=produtos.codsubcat";
		$condicao2 .= " AND produtos.codprod=estoque.codprod";
		$condicao2 .= " AND estoque.codemp = $codempselect";
		$condicao2 .= " AND (produtos.codcat <> 71 AND produtos.codcat <> 46 AND produtos.codcat <> 72)";
	}

	if ($codcatselect <> "" AND $codsubcatselect <> ""){

		$condicao2 = " produtos.codcat = $codcatselect";
 		$condicao2 .= " AND produtos.codsubcat = $codsubcatselect";
		$condicao2 .= " AND produtos.hist <> 'Y' ";
		$condicao2 .= " AND categoria.codcat=produtos.codcat";
		$condicao2 .= " AND subcategoria.codsubcat=produtos.codsubcat";
		$condicao2 .= " AND produtos.codprod=estoque.codprod";
		$condicao2 .= " AND estoque.codemp = $codempselect";
		$condicao2 .= " AND (produtos.codcat <> 71 AND produtos.codcat <> 46 AND produtos.codcat <> 72)";
	}

	if ($codprodselect <> ""){

		$condicao2 = " produtos.codprod = $codprodselect";
		$condicao2 .= " AND produtos.hist <> 'Y' ";
		$condicao2 .= " AND categoria.codcat=produtos.codcat";
		$condicao2 .= " AND subcategoria.codsubcat=produtos.codsubcat";
		$condicao2 .= " AND produtos.codprod=estoque.codprod";
		$condicao2 .= " AND estoque.codemp = $codempselect";
		$condicao2 .= " AND (produtos.codcat <> 71 AND produtos.codcat <> 46 AND produtos.codcat <> 72)";
	}


if ($condicao2 <> ""){

		// LISTA OS REGISTROS
	$prod->listProdSum("produtos.codcat, produtos.codsubcat, produtos.codprod, SUM(qtde-reserva) as est, lib_linha, descres, nomeprod, (pvacj*1*$fatorusertabela_ata), (pva*1*$fatorusertabela_ata), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), restricao_pl, n_prod_int, n_prod_ext, nomecat, nomesubcat, ordem, cor1_prod, cor2_prod, reserva, produtos.gar_um, produtos.gar_cj, garext_12, garext_24, pvd*$fatorusertabela_ata*$fatormajor, pvdcj*$fatorusertabela_ata*$fatormajor , opcaixa10x", "produtos, estoque, categoria, subcategoria", $condicao2 , $array2, $array_campo2, "GROUP BY produtos.codprod ORDER BY  nomecat, nomesubcat, nomeprod");

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
	$opcaixa10x[$k] = $prod->showcampo26();

	
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
	
    //if ($garext_12[$k]=="OK" or $garext_24[$k]=="OK"){$estrela[$k] = 1;}else{$estrela[$k] = 0;}

	#echo "$cor1_prod[$k] - $cor2_prod[$k]<br>";

	if (($cor1_prod[$k] == '') AND ($cor2_prod[$k] == '')) { $mostra_cor[$k] = '1'; }
	if ($cor1_prod[$k] <> '') { $borda_cor1[$k] = "border: 1px solid #000000"; }
	if ($cor2_prod[$k] <> '') { $borda_cor2[$k] = "border: 1px solid #000000"; }

	if ($tipovend == "A" or $tipovend == "R"){$preco[$k] = $pvd[$k];}else{$preco[$k] = $pvvcj[$k];}
	
	// FORMATADO
	$precof[$k] =  $prod->fpreco($preco[$k]);


     // PESQUISA NUMERO DE OC DE COMPRA
	 
	 if ($codempselect == 15){$cond1 = "(ocprod.codemp = 14 or ocprod.codemp = 15)";$cond2 = " and codped_transf = 0";}else{$cond1 = "(ocprod.codemp = $codempselect)";$cond2 = "";}

	$prod->clear();
	$prod->listProdU("SUM(qtdecomp) + $est[$k] as est_oc,  dataprevcheg ","ocprod, oc", "codprod=$codprod[$k] and ".$cond1." and oc.hist <> 1 and oc.codoc=ocprod.codoc  and tipo_nf <> 'P' ".$cond2." GROUP by codprod ORDER by dataprevcheg DESC");
	$qtde_oc[$k] = $prod->showcampo0();
	$dataprev_oc[$k] = $prod->showcampo1();
	$dataprev_ocf[$k] = $prod->fdata($dataprev_oc[$k]);
	
	// RESTRICAO DE VISUALIZACAO
	if ($est[$k] <= 0 and $lib_linha[$k] <> 'Y' and $qtde_oc[$k] <= 0){$restricao_view[$k] =1;}
	if ($codcat[$k] == 74){$restricao_view[$k] =1;}
	if ($preco[$k] == 0){$restricao_view[$k] =1;}
	#if ($est[$k] <= 0 ){$restricao_view[$k] = 1;}

    // PESQUISA POR PLANOS
	$prod->listProdSum("produtos_planos_relacao.codplano, plano, desconto ", "produtos_planos, produtos_planos_relacao", "codprod = '$codprod[$k]' AND produtos_planos_relacao.codplano=produtos_planos.codplano and produtos_planos.hist <> 'S'", $arrayx1, $array_campox1, "ORDER BY plano");

		for ($j = 0; $j < count($arrayx1); $j++)
		{
			$prod->mostraProd($arrayx1, $array_campox1, $j);
			$codplano[$k][$j] = $prod->showcampo0();
			$plano[$k][$j] = $prod->showcampo1();
			$desconto[$k][$j] = $prod->showcampo2();

   			#$vpf[$j+1] = $prod->fpreco($vp[$j+1]);
			#$datavencf[$j+1] = $prod->fdata($datavenc[$j+1]);

		}//FOR

		$sub_array_plano[$k] = $j;


	}//FOR
	

	
}
		break;

	case "grava":


        $prod->clear();
	$prod->listProdgeral("pedidoprodtemp_micro", "codped = '$codpedselect'", $arrayx1, $array_campox1, "");

		for($i = 0; $i < count($arrayx1); $i++ ){

			$prod->mostraProd( $arrayx1, $array_campox1, $i );
			$codprod_ped = $prod->showcampo2();

			// VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
			$prod->clear();
			$prod->listProdU("gar_um, gar_cj","produtos", "codprod = '$codprod_ped'");			$gar_um = $prod->showcampo0();
			$gar_cj = $prod->showcampo1();

			$prod->clear();
			$prod->mostraProd( $arrayx1, $array_campox1, $i );
			$prod->setcampo0("");
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


	// TEMPLATE
	include ("templates/ped_page_produtos.htm");



?>
