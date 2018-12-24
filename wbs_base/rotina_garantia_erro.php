<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, gar_um, gar_cj", "pedidoprod", "(gar_um >12 OR gar_cj >12) and tipoprod <> 'CJ'", $array, $array_campo, "GROUP BY codped");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$gar_um = $prod->showcampo1();
			$gar_cj = $prod->showcampo2();
			
			$prod->listProdU("codbarra, codcliente, codvend, contrato","pedido", "codped=$codped");
			$codbarra = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$contrato = $prod->showcampo3();

			$prod->listProdU("nome","clientenovo", "codcliente='$codcliente'");
			$nome = $prod->showcampo0();

			$prod->listProdU("nome","vendedor", "codvend='$codvend'");
			$nomevend = $prod->showcampo0();
			
				$dataatual = $prod->gdata();

			echo("$codbarra - $gar_um - $gar_cj - $nome - $contrato - $nomevend<br>");				

		}

echo("TOTAL DE PEDIDOS MODIFICADOS : $i");