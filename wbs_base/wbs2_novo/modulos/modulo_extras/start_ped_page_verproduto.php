<?php

// WBS
// arquivo:	start_ped_page_verproduto.php
// template:	ped_page_verproduto.htm

#require("../classprod.php");

// inicio da classe
$prod = new operacao();

	// DATA HOJE
 	$hoje = getdate();
	$ano = $hoje[year];
	$mes = $hoje[mon];
	$dia = $hoje[mday];
	if (strlen($mes)==1){$mes = '0'.$mes;}
	if (strlen($dia)==1){$dia = '0'.$dia;}
	
	// DADOS DO PEDIDO
	$prod->clear();
	$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
	$codempselect = $prod->showcampo0();
	$codvendselect = $prod->showcampo1();;
	$tipovend = $prod->showcampo2();
	$fatorusertabela = $prod->showcampo3();
	if ($fatorusertabela == 0){$fatorusertabela = 1;}

	// PESQUISA POR DADOS DO PRODUTO
	$prod->listProdU("nomeprod, produtos.codprod, descres, descdet, unidade, (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), chkcb, hist, imagemsize,imagemtype, imagemfile","produtos, estoque", "produtos.codprod=$codprodselect AND produtos.codprod=estoque.codprod");
	$nomeprod = $prod->showcampo0();
	$codprod = $prod->showcampo1();
	$descres = $prod->showcampo2();
	$descdet = $prod->showcampo3();
	$unidade = $prod->showcampo4();
	$pvv = $prod->showcampo5();
	$pvvcj = $prod->showcampo6();
	$chkcb = $prod->showcampo7();
	$hist = $prod->showcampo8();

	//DADOS DA IMAGEM
	$imgsize = $prod->showcampo9();
	$imgtype = $prod->showcampo10();
	$imgname = $prod->showcampo11();
	
	#-- CALCULA PRECOS - INICIO

		$precof = number_format($pvv,2,',','.');
		$tam = strlen ($precof);
		$real = substr($precof,0,($tam-3));
		$centavos = substr($precof,($tam-2),$tam);

	#-- CALCULA PRECOS - FIM


	// TEMPLATES
	include ("templates/ped_page_verproduto.htm");

?>
