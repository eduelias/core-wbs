<?php

// WBS
// arquivo:		ped_iprodutoadcmicro.php
// template:	ped_iprodutoadcmicro.htm

//require("../classprod.php");


// INICIO DA CLASSE
$prod = new operacao();


echo("cat=$codcatselect - $codprodselect - $codcjselect - $codpedselect - $qtdeselect - $precoselect - $Action");




switch ($Action)
{
	case "adiciona":

	if ($qtdeselect <> 0){

		// ADICIONA PRODUTOS NA TABELA TEMPORARIA DO MICRO
		$prod->clear();
		$prod->setcampo1($codpedselect);
		$prod->setcampo2($codprodselect);
		$prod->setcampo3($qtdeselect); // QTDE
		$prod->setcampo4($precoselect);
		$prod->setcampo7(0);
		$prod->setcampo8("UM");
		$prod->setcampo9(0); //TIPOCJ
		$prod->setcampo15("OK"); //PROD ADD
		$prod->addProd("pedidoprodtemp_micro", $uregmicro);

	}

		break;

        case "delete":

	// DELETA PRODUTOS NA TABELA TEMPORARIA DO MICRO
	for($i = 0; $i < $cont; $i++ ){
		if ($ckprd[$i] <> ""){
			$prod->delProd("pedidoprodtemp_micro", "codpped=$ckprd[$i]");
			#echo("msg= $ckmsg[$i]");
		}
	}
		break;
}


	// LISTA OS REGISTROS
	$prod->listProdSum("codpped, pedidoprodtemp_micro.codprod, nomeprod, pedidoprodtemp_micro.qtde, pedidoprodtemp_micro.ppu", "pedidoprodtemp_micro, produtos", "pedidoprodtemp_micro.codprod=produtos.codprod AND codped = '$codpedselect' AND tipoprod = 'UM' ", $arrayx, $array_campox, "ORDER BY  nomeprod");

		for($i = 0; $i < count($arrayx); $i++ ){

			$prod->mostraProd( $arrayx, $array_campox, $i );

			$codpped[$i] = $prod->showcampo0();
			$codprod[$i] = $prod->showcampo1();
			$nomeprod[$i] = $prod->showcampo2();
			$qtde[$i] = $prod->showcampo3();
			$preco[$i] = $prod->showcampo4();
			// FORMATADO
			$precof[$i] =  $prod->fpreco($preco[$i]);

		}//FOR

	//TEMPLATE
	include ("templates/ped_iprodutoadc.htm");

?>
