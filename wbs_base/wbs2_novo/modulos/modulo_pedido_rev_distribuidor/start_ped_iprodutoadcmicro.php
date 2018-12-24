<?php

// WBS
// arquivo:		ped_iprodutoadcmicro.php
// template:	ped_iprodutoadcmicro.htm

//require("../classprod.php");


// INICIO DA CLASSE
$prod = new operacao();


#echo("cat=$codcatselect - $codprodselect - $codcjselect - $codpedselect - $qtdeselect - $precoselect - $Action - $planoselect");




switch ($Action)
{
	case "adiciona":
	
	if ($qtdeselect <> 0){

         $var_plano = explode(":", $planoselect);
        $codplano_select =  $var_plano[0]; // CODIGO PLANO
        $desconto_select = $var_plano[1]; // CODIGO DESCONTO

        $prod->clear();
       	$prod->listProdU("bonus","produtos_planos", "codplano = $codplano_select");
        $bonus = $prod->showcampo0();

        $precofinal = $precoselect - $desconto_select - $bonus;


		// ADICIONA PRODUTOS NA TABELA TEMPORARIA DO MICRO
		$prod->clear();
		$prod->setcampo1($codpedselect);
		$prod->setcampo2($codprodselect);
		$prod->setcampo3($qtdeselect); // QTDE
		$prod->setcampo4($precofinal);
		$prod->setcampo7($codcjselect);
		$prod->setcampo8("CJ");
		$prod->setcampo9($codtipocjselect); //TIPOCJ
		$prod->setcampo13($codplano_select); //COD PLANO
		$prod->setcampo14($bonus); //BONUS
		$prod->setcampo15("OK"); //PROD ADD
		$prod->setcampo18($ordemselect); //ORDEM
		$prod->setcampo22("NO"); //KIT
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

if ($Action_alter == "altera" and $Action <> "pesquisa"){

 	$prod->delProd("pedidoprodtemp_micro", "codped = '$codpedselect' and prod_add = 'OK' and tipocj = $codtipocjselect");

	$prod->clear();
        $prod->listProdgeral("pedidoprodtemp", "codped = '$codpedselect' and prod_add = 'OK' and tipocj = $codtipocjselect ", $arrayx1, $array_campox1, "");

		for($i = 0; $i < count($arrayx1); $i++ ){

			$prod->mostraProd( $arrayx1, $array_campox1, $i );

			$prod->setcampo0("");
			$prod->setcampo7($codcjselect);
			$prod->addProd("pedidoprodtemp_micro", $uregmicro);
		}//FOR
}

// LISTA OS REGISTROS
$prod->listProdSum("codpped, pedidoprodtemp_micro.codprod, nomeprod, pedidoprodtemp_micro.qtde, pedidoprodtemp_micro.ppu, codplano", "pedidoprodtemp_micro, produtos", "pedidoprodtemp_micro.codprod=produtos.codprod AND codped = '$codpedselect' AND tipoprod = 'CJ' AND prod_add = 'OK' ", $arrayx, $array_campox, "ORDER BY  nomeprod");

	for($i = 0; $i < count($arrayx); $i++ ){

		$prod->mostraProd( $arrayx, $array_campox, $i );

		$codpped[$i] = $prod->showcampo0();
		$codprod[$i] = $prod->showcampo1();
		$nomeprod[$i] = $prod->showcampo2();
		$qtde[$i] = $prod->showcampo3();
		$preco[$i] = $prod->showcampo4();
		$codplano[$i] = $prod->showcampo5();
    	// FORMATADO
    	$precof[$i] =  $prod->fpreco($preco[$i]);

    	$prod->clear();
    	$prod->listProdU("plano","produtos_planos", "codplano = $codplano[$i]");
        $nomeplano[$i] = $prod->showcampo0();

		
	}//FOR

	//TEMPLATE
	include ("templates/ped_iprodutoadcmicro.htm");
?>
