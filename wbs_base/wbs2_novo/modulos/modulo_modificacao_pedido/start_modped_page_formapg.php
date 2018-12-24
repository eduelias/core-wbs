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
$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();;
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();

// Rotina Default


$prod->listProdSum("codcat, nomecat", "categoria", "", $array_pesq, $array_campo_pesq, "ORDER BY nomecat");
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
	}

	if ($codcatselect <> "" AND $codsubcatselect <> ""){

		$condicao2 = " produtos.codcat = $codcatselect";
 		$condicao2 .= " AND produtos.codsubcat = $codsubcatselect";
		$condicao2 .= " AND produtos.hist <> 'Y' ";
		$condicao2 .= " AND categoria.codcat=produtos.codcat";
		$condicao2 .= " AND subcategoria.codsubcat=produtos.codsubcat";
		$condicao2 .= " AND produtos.codprod=estoque.codprod";
		$condicao2 .= " AND estoque.codemp = $codempselect";
	}

	if ($codprodselect <> ""){

		$condicao2 = " produtos.codprod = $codprodselect";
		$condicao2 .= " AND produtos.hist <> 'Y' ";
		$condicao2 .= " AND categoria.codcat=produtos.codcat";
		$condicao2 .= " AND subcategoria.codsubcat=produtos.codsubcat";
		$condicao2 .= " AND produtos.codprod=estoque.codprod";
		$condicao2 .= " AND estoque.codemp = $codempselect";
	}


if ($condicao2 <> ""){

		// LISTA OS REGISTROS
	$prod->listProdSum("produtos.codcat, produtos.codsubcat, produtos.codprod, SUM(qtde-reserva) as est, lib_linha, descres, nomeprod, (pvacj*fatorata*$fatorusertabela), (pva*fatorata*$fatorusertabela), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), restricao_pl, n_prod_int, n_prod_ext, nomecat, nomesubcat, ordem, cor1_prod, cor2_prod", "produtos, estoque, categoria, subcategoria", $condicao2 , $array2, $array_campo2, "GROUP BY produtos.codprod HAVING est > 0 OR (est <=0 AND lib_linha = 'Y') ORDER BY  nomecat, nomesubcat, nomeprod");

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

	#echo "$cor1_prod[$k] - $cor2_prod[$k]<br>";

	if (($cor1_prod[$k] == '') AND ($cor2_prod[$k] == '')) { $mostra_cor[$k] = '1'; }
	if ($cor1_prod[$k] <> '') { $borda_cor1[$k] = "border: 1px solid #000000"; }
	if ($cor2_prod[$k] <> '') { $borda_cor2[$k] = "border: 1px solid #000000"; }

	if ($tipovend == "A"){$preco[$k] = $pva[$k];}else{$preco[$k] = $pvv[$k];}
	
	// FORMATADO
	$precof[$k] =  $prod->fpreco($preco[$k]);


         // PESQUISA NUMERO DE OC DE COMPRA

	$prod->clear();
	$prod->listProdU("SUM(qtdecomp)","ocprod, oc", "codprod=$codprod[$k] and ocprod.codemp=$codempselect and oc.hist <> 1 and oc.codoc=ocprod.codoc");
	$qtde_oc[$k] = $prod->showcampo0();

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
