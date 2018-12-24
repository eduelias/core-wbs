<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, status, dataped, codvend", "pedido", "caixa =  'OK'  AND (contrato = 'EP' or contrato = 'NO') and status = 'ENTR' and hist <> 1  AND DATE_SUB( CURDATE( ) , INTERVAL 31 DAY ) >= dataped" , $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$status = $prod->showcampo1();
			$dataped = $prod->showcampo2();
			$codvend = $prod->showcampo3();
			
			$prod->listProdU("nome","vendedor", "codvend=$codvend ");
			$nomevend = $prod->showcampo0();

            /*
			$prod->listProdU("datastatus","pedidostatus", "codped=$codped and statusped = 'DESP'");
			$datastatus = $prod->showcampo0();
			$login = "felipe";
			
				$dataatual = $prod->gdata();

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($datastatus);
				$prod->setcampo3("ENTR");
				$prod->setcampo4($login);
					
				$prod->addProd("pedidostatus", $ureg);
    
            
				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo14("ENTR");
				$prod->setcampo32($datastatus);
				$prod->setcampo30("OK"); // FICHA ENTREGA
				$prod->setcampo15(1);
				
				$prod->upProd("pedido", "codped=$codped");
	        */
				$condicao_up = "hist = '1' ";
      			$prod->upProdU("pedido", $condicao_up ,"codped=$codped");
				
			echo"$codped - $status - $dataped - $nomevend<br>";

		}

echo("TOTAL DE PEDIDOS MODIFICADOS : $i");
