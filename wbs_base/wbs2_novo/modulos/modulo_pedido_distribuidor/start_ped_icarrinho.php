<?php

// WBS
// arquivo:		ped_icarrinho.php
// template:	ped_icarrinho.htm

#require("../classprod.php");


// INICIO DA CLASSE
$prod = new operacao();


switch ($Action)
{
	case "altera":

	$prod->clear();
	$prod->listProdU("codpped", "pedidoprodtemp_micro, produtos", "codped = '$codpedselect' AND codprodcj = '$codcjselect' AND tipocj = '$codtipocjselect' AND codcat = '$codcatselect' AND pedidoprodtemp_micro.codprod=produtos.codprod");
	$codpped = $prod->showcampo0();

    #echo"AQUI - $codcjselect";

        $prod->delProd("pedidoprodtemp_micro", "codpped = '$codpped'");
        
	if ($codprodselect[$codcatselect] <> -1){
	
	// ADICIONA PRODUTOS NA TABELA TEMPORARIA DO MICRO
	$prod->clear();
	$prod->setcampo1($codpedselect);
	$prod->setcampo2($codprodselect[$codcatselect]);
	$prod->setcampo3(1); // QTDE
	$prod->setcampo4($precoselect);
	$prod->setcampo7($codcjselect);
	$prod->setcampo8("CJ");
	$prod->setcampo9($codtipocjselect); //TIPOCJ
	$prod->setcampo18($ordemselect); //ORDEM
	if ($codcjselect == -11){$prod->setcampo22("OK");}else{$prod->setcampo22("NO");} //KIT
	$prod->addProd("pedidoprodtemp_micro", $uregmicro);
	}
		break;
		
        case "alteraqtde":


	$prod->clear();
	$prod->upProdU("pedidoprodtemp_micro","qtde = $qtde_nova", "codped='$codpedselect' and prod_add <> 'OK' and codprodcj= $codcjselect and tipocj = $codtipocjselect ");
	

		break;

}


// ROTINA DEFAULT

	if ($codcjselect <> 0){

	// CALCULA O VALOR DO MICRO ATUAL
	$prod->clear();
	$prod->listProdSum("nomeprod, qtde, ppu, pedidoprodtemp_micro.codprod", "pedidoprodtemp_micro, produtos, categoria", "codped = '$codpedselect' AND codprodcj = '$codcjselect' and tipocj = '$codtipocjselect' AND pedidoprodtemp_micro.codprod = produtos.codprod AND produtos.codcat=categoria.codcat", $arrayx, $array_campox, "ORDER BY categoria.ordem, nomeprod ");
	
	for ($i = 0; $i < count($arrayx); $i++)
	{
		$prod->mostraProd($arrayx, $array_campox, $i);
		$nomeprod_micro[$i] = $prod->showcampo0();
		$qtde[$i] = $prod->showcampo1();
		$ppu[$i] = $prod->showcampo2();
		$codprod_micro[$i] = $prod->showcampo3();
		
		$nomeprod_micro[$i] = str_replace("'","",$nomeprod_micro[$i]);
		$nomeprod_micro[$i] = str_replace('"','',$nomeprod_micro[$i]);
		
		$itens_micro = $itens_micro + $qtde[$i];
		$soma_micro = $soma_micro + ($ppu[$i]*$qtde[$i]);
	}//FOR
	
	
	// NOME DO CONJUNTO
	$prod->clear();
	$prod->listProdU("nomeprod", "produtos", "codprod = '$codcjselect'");
	$nomeprod_cj = $prod->showcampo0();

	// FORMATADO
	$soma_microf =  $prod->fpreco($soma_micro);

	}// IF CODCJSELECT

	// CALCULA O VALOR DO CARRINHO
	$prod->clear();
	$prod->listProdU("SUM(ppu*qtde*fator_micro), SUM(qtde) as itens", "pedidoprodtemp", "codped = '$codpedselect'");
	$soma_carrinho = $prod->showcampo0();
	$itens_carrinho = $prod->showcampo1();
	
	// FORMATADO
	$soma_carrinhof =  $prod->fpreco($soma_carrinho);


// TEMPLATE
include ("templates/ped_icarrinho.htm");

?>
