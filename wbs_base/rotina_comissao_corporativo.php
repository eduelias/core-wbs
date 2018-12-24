<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, codmov", "fin_bcomov", "codconta = $codconta AND datamov <= '2005-01-06' and opcaixa = '00.01'", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$codmov = $prod->showcampo1();

			$prod->listProdU("mlb, vc, fatorcomissao, tipo, pedido.codvend, codbarra", "pedido, vendedor", "codped=$codped and pedido.codvend=vendedor.codvend");
			$ped_mlb = $prod->showcampo0();
			$ped_vc = $prod->showcampo1();
			$ped_fatorcomissao = $prod->showcampo2();
			$ped_tipo = $prod->showcampo3();
			$ped_codvend = $prod->showcampo4();
			$ped_codbarra = $prod->showcampo5();

			if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_mlb;}
			if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_mlb;}
			if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_mlb;}
						
					
				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("fin_bcomov", "codmov=$codmov");
				if ($valorp >= 0){
					$prod->setcampo4($valorp);
					$prod->setcampo5(0);
				}else{
					$prod->setcampo4(0);
					$prod->setcampo5($valorp);
				}
				
				$prod->upProd("fin_bcomov", "codmov=$codmov");

				

				$valorpt = $valorpt + $valorp; 

				echo("$codmov - $ped_mlb - $valorp<br>");

		}

echo("TOTAL DE PEDIDOS MODIFICADOS : $i - $valorpt");
