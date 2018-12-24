<?php

// ARQUIVO DE CONFIGURACAO DO MICRO

//require("../classprod.php");


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
$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();;
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();

#echo("pedido = $codpedselect - codemp= $codempselect - fator = $fatorusertabela");

// ROTINA DEFAULT


		// LISTA OS REGISTROS 
		$prod->listProdSum("codprod, nomeprod", "produtos, categoria, subcategoria", "categoria.codcat=produtos.codcat AND subcategoria.codsubcat=produtos.codsubcat AND produtos.codcat = $codcatplataforma AND unidade = 'CJ' and hist <> 'Y'", $arrayx, $array_campox, "ORDER BY  nomecat, nomesubcat, nomeprod");

		for($i = 0; $i < count($arrayx); $i++ ){
			
			$prod->mostraProd( $arrayx, $array_campox, $i );

			$codprod_plat[$i] = $prod->showcampo0();
			$nomeprod_plat[$i] = $prod->showcampo1();
			
			// PLACA MAE PADRAO
			$prod->clear();
        	$prod->listProdU("codsubprod","relacoes, produtos", "relacoes.codprod=$codprod_plat[$i] and codcat=4 and relacoes.codsubprod=produtos.codprod");
            $codprod_placam_padrao[$i] = $prod->showcampo0();

			$prod->clear();
			$prod->listProdSum("codplaca , nomeprod, SUM(qtde-reserva) as est, lib_linha", "produtos, produtos_relacao_restricao, estoque", "produtos.codprod=estoque.codprod AND  produtos_relacao_restricao.codplaca=produtos.codprod AND produtos_relacao_restricao.codprod_restricao = $codprod_plat[$i] AND produtos.hist <> 'Y' AND estoque.codemp = $codempselect", $array1, $array_campo1, "GROUP BY produtos.codprod HAVING est > 0 OR (est <=0 AND lib_linha = 'Y') ORDER BY nomeprod");

			for($j = 0; $j < count($array1); $j++ ){

				$prod->mostraProd( $array1, $array_campo1, $j );

			    $codprod_placam[$i][$j] = $prod->showcampo0();
				$nomeprod_placam[$i][$j] = $prod->showcampo1();
				$est_placam[$i][$j] = $prod->showcampo2();
				$lib_linha_placam[$i][$j] = $prod->showcampo3();
				$codprod_placamf = $codprod_placam[$i][$j];


 $prod->listProdU("SUM(qtdecomp)","ocprod, oc", "codprod='$codprod_placamf' and ocprod.codemp=$codempselect and oc.hist <> 1 and oc.codoc=ocprod.codoc");
	$qtde_oc_placam = $prod->showcampo0();
	#echo("$qtde_oc_placam");

if ($est_placam[$i][$j] > 0){$img="+";}
if (($est_placam[$i][$j] == 0 OR $est_placam[$i][$j] < 0) and $qtde_oc_placam > 0){$img="!";$oc=$qtde_oc_placam;}
if (($est_placam[$i][$j] == 0 OR $est_placam[$i][$j] < 0) and $qtde_oc_placam <= 0){$img="X";}
if ($codprod_placam_padrao[$i]==$codprod_placam[$i][$j]){$ppadrao = " (PADRAO)";}else{$ppadrao = "";}

				$n_placam[$i] .= "'[".$img."] - ".$nomeprod_placam[$i][$j].$ppadrao."'".", ";
				$c_placam[$i] .= "'".$codprod_placam[$i][$j].":".$codprod_plat[$i]."'".", ";

			
			}//FOR

			$sub_array[$i] = $j;
			$n_placam[$i] .= "''";
			$c_placam[$i] .= "''";

		}//FOR
		
switch ($Action)
{
	case "start":

	 $prod->delProd("pedidoprodtemp_micro", "codped = '$codpedselect'");

		break;

       	case "start_altera":

	 $prod->delProd("pedidoprodtemp_micro", "codped = '$codpedselect' and prod_add <> 'OK'");

		break;
}
					
if ($codplacaselect <> ""){

	//PESQUISA DA PÁGINA
		
		// LISTA OS REGISTROS
	$prod->listProdSum("produtos.codcat, produtos.codsubcat, produtos.codprod, SUM(qtde-reserva) as est, lib_linha, descres, nomeprod, (pvacj*fatorata*$fatorusertabela), (pva*fatorata*$fatorusertabela), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), restricao_pl, n_prod_int, n_prod_ext, nomecat, nomesubcat, ordem, cor1_prod, cor2_prod, reserva, produtos.gar_um, produtos.gar_cj, garext_12, garext_24", "produtos, estoque, categoria, subcategoria", "produtos.codprod=estoque.codprod AND categoria.codcat=produtos.codcat AND subcategoria.codsubcat=produtos.codsubcat AND estoque.codemp = $codempselect AND produtos.hist <> 'Y' AND cat_cj = 'OK' ", $array2, $array_campo2, "GROUP BY produtos.codprod  ORDER BY  ordem, nomecat, nomesubcat, nomeprod");

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

	if ($tipovend == "A"){$preco[$k] = $pvacj[$k];}else{$preco[$k] = $pvvcj[$k];}
	
	// FORMATADO
	$precof[$k] =  $prod->fpreco($preco[$k]);


	// PESQUISA POR RESTRICAO COM A PLACA MAE ESCOLHIDA
	$prod->clear();
	$prod->listProdU("COUNT(*)","produtos_relacao_restricao", "codprod_restricao=$codprod[$k] AND codplaca= $codplacaselect");
	$relacao_prod_pl[$k] = $prod->showcampo0();

// ROTINA PARA ALTERACAO DE UM CONJUNTO
if ($Action_alter == "altera" and $pesq <> 1){

	// PESQUISA POR PRODUTOS DO CONJUNTO NO ALTERACAO
	$prod->clear();
	$prod->listProdU("COUNT(*)","pedidoprodtemp", "codprodcj=$codcjselect and codprod=$codprod[$k] and codped= $codpedselect and tipocj = $codtipocjselect and prod_add <> 'OK'");
	$prod_selected[$k] = $prod->showcampo0();

}else{

        if ($modifica != 1){
        
	// PESQUISA POR PRODUTOS PADROES DO CONJUNTO
	$prod->clear();
	$prod->listProdU("COUNT(*)","relacoes", "codprod=$codcjselect and codsubprod=$codprod[$k]");
	$prod_selected[$k] = $prod->showcampo0();
	if ($pesq <> 1 ){
	$codtipocjselect = 1;
	}
	
	}else{

        $codtipocjselect = 1;
	// PESQUISA POR PRODUTOS DO CONJUNTO NA MODIFICACAO
	$prod->clear();
	$prod->listProdU("COUNT(*)","pedidoprodtemp_micro", "codprodcj=$codcjselect and codprod=$codprod[$k] and codped= $codpedselect and tipocj = $codtipocjselect and prod_add <> 'OK'");
	$prod_selected[$k] = $prod->showcampo0();
	}

}

#echo("A = $codprod[$k] - $prod_selected[$k]<br>");


// PESQUISA NUMERO DE OC DE COMPRA

	$prod->clear();
	$prod->listProdU("SUM(qtdecomp) + $est[$k] as est_oc,  dataprevcheg ","ocprod, oc", "codprod=$codprod[$k] and ocprod.codemp=$codempselect and oc.hist <> 1 and oc.codoc=ocprod.codoc GROUP by codprod ORDER by dataprevcheg DESC");
	$qtde_oc[$k] = $prod->showcampo0();
	$dataprev_oc[$k] = $prod->showcampo1();
	$dataprev_ocf[$k] = $prod->fdata($dataprev_oc[$k]);


	// RESTRICAO DE VISUALIZACAO
	if ($est[$k] <= 0 and $lib_linha[$k] <> 'Y' and $qtde_oc[$k] <= 0){$restricao_view[$k] =1;}

if ($prod_selected[$k] <> 0 and $restricao_view[$k] <> 1){

	if (($relacao_prod_pl[$k] <> 0 AND $restricao_pl[$k] == 'OK') OR $restricao_pl[$k] <> 'OK')
	{
		$opcao[$k] = "checked";
		
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
		$prod->setcampo22("NO"); //KIT
		$prod->addProd("pedidoprodtemp_micro", $uregmicro);
		
		}
	}
}

		#echo("sele= $codcjselect - $codprod[$k] - $prod_selected[$k]<br>");

	

    #echo("$codprod[$k] - $restricao_view[$k] - $qtde_oc[$k]<br>");

	} //FOR
	
		// PESQUISA POR DADOS DA PLACA MAE
	$prod->clear();
	$prod->listProdU("nomeprod, (pvacj*fatorata*$fatorusertabela),  (pvvcj*fatorvar*$fatorusertabela), ordem","produtos, estoque, categoria", "produtos.codprod=$codplacaselect AND produtos.codprod=estoque.codprod AND produtos.codcat=categoria.codcat and estoque.codemp ='$codempselect' ");
        $nome_placa = $prod->showcampo0();
	$pvacj_placa = $prod->showcampo1();
	$pvvcj_placa = $prod->showcampo2();
	$ordem_placa = $prod->showcampo3();
	
		// NOME DO CONJUNTO
	$prod->clear();
	$prod->listProdU("nomeprod", "produtos", "codprod = '$codcjselect'");
	$nomeprod_cj = $prod->showcampo0();
	
	if ($tipovend == "A"){$preco_placa = $pvacj_placa;}else{$preco_placa = $pvvcj_placa;}
	
	        // SE HOUVER MODIFICACAO
		if ($modifica != 1){
		
		// ADICIONA PLACA MAE NA TABELA TEMPORARIA DO MICRO
		$prod->clear();
		$prod->setcampo1($codpedselect);
		$prod->setcampo2($codplacaselect);
		$prod->setcampo3(1); // QTDE
		$prod->setcampo4($preco_placa);
		$prod->setcampo7($codcjselect);
		$prod->setcampo8("CJ");
		$prod->setcampo9($codtipocjselect); //TIPOCJ
		$prod->setcampo16("OK"); //PRODPLACA
		$prod->setcampo18($ordem_placa); //ORDEM
		$prod->setcampo22("NO"); //KIT
		$prod->addProd("pedidoprodtemp_micro", $uregmicro);

		}

}

#include("topo.php");
// TEMPLATE
include ("templates/ped_page_micro01.htm");
#include("rodape.php");

?>
