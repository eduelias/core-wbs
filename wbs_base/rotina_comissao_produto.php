<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("pedido.codped, dataped", "pedido, pedidostatus", "dataped > '2005-02-01' AND dataped <  '2005-02-31' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND statusped =  'CAIXA' AND datastatus <=  '2005-03-04'", $array, $array_campo, "order by datastatus");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$dataped = $prod->showcampo1();
			
			$prod->listProdU("COUNT(*)", "pedidoprod", "codped=$codped and (codprod = 1224 OR codprod = 50 OR codprod = 918 OR codprod = 1223 OR codprod = 1389 OR codprod = 1318 OR codprod = 556 OR codprod = 1225 OR codprod = 1375 OR codprod = 1226)");
			$num_prod = $prod->showcampo0();
			
			if ($num_prod > 0 ){
			
			echo("$codped - $dataped  - $ped_nomevend - $codprod - $nomeprod<br>");
			}

/*
			$prod->clear();
			$prod->listProdSum("pedidoprod.codprod as p, nomeprod", "pedidoprod, produtos", "codped=$codped AND pedidoprod.codprod = produtos.codprod ", $array1, $array_campo1," HAVING p = 1224 OR p = 50 OR p = 918 OR p = 1223 OR p = 1389 OR p = 1318 OR p = 556 OR p = 1225 OR p = 1375 OR p = 1226");
			
			for($j = 0; $j < count($array1); $j++ ){

			$prod->mostraProd( $array1, $array_campo1, $j );
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();

			if ($codprod <> ""){

			$prod->listProdU("dataped, pedido.codvend, codbarra, nome", "pedido, vendedor", "codped=$codped and pedido.codvend=vendedor.codvend");
			$ped_dataped = $prod->showcampo0();
			$ped_codvend = $prod->showcampo1();
			$ped_codbarra = $prod->showcampo2();
			$ped_nomevend = $prod->showcampo3();


			echo("$ped_codbarra - $ped_dataped  - $ped_nomevend - $codprod - $nomeprod<br>");


			$p++;
			}//PRODUTO ESCOLHIDO

			}//FOR
			
			*/
  		}//FOR

echo("TOTAL DE PEDIDOS MODIFICADOS : $p ");
