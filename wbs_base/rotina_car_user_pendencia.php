<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codemp", "empresa", "", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codemp = $prod->showcampo0();
			#$codvend_car = $prod->showcampo1();
			#$codvend_cap = $prod->showcampo2();
			#$xcodvend_car = explode(":", $codvend_car);
			#$xcodvend_cap = explode(":", $codvend_cap);

			$dif = 2; // DIFERENCA (dias)

			$valor = 0;
			$valort = 0;

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("opcaixa, descricao, codcliente, valordevido, codped, TO_DAYS(NOW()) - TO_DAYS(datavenc) as atraso, valorpago, datavenc ", "fin_car", "codemp = $codemp and TO_DAYS(NOW()) - TO_DAYS(datavenc) > $dif and valorpago = 0.00 and opcaixa = '02.09' and hist <> 'S'", $array71, $array_campo71, "" );

			#$html .= "EMPRESA : $codemp<br><br>";
				
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$opcaixa = $prod->showcampo0();
				$descricao = $prod->showcampo1();
				$codcliente = $prod->showcampo2();
				$valor = $prod->showcampo3();
				$codped = $prod->showcampo4();
				$atraso = $prod->showcampo5();
				$valorpago = $prod->showcampo6();
				$datavenc = $prod->showcampo7();
				$valorf = number_format($valor,2,',','.'); 
				$datavencf = $prod->fdata($datavenc);

				$prod->clear();
		        $prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
				$nomecli = $prod->showcampo0();
				$nomecli = strtoupper($nomecli);
				if ($nomecli == ""){$nomecli = "SEM CLIENTE";}

				$prod->clear();
		        $prod->listProdU("codvend, codbarra", "pedido", "codped='$codped'");
				$codvend = $prod->showcampo0();
				$codbarra = $prod->showcampo1();
				
				$prod->clear();
		        $prod->listProdU("nome, codgrp", "vendedor", "codvend='$codvend'");
				$nomevend = $prod->showcampo0();
				$codgrp = $prod->showcampo1();

				

				if (count($array71) <> 0){

					$html = "<font size=1 face=Verdana, Arial, Helvetica, sans-serif>";

					$html .= "O pedido abaixo está pendende de pagamento no nosso sistema:<br><br>";	

					$html .= "<b>$codbarra - $nomecli</b> -  $atraso dias<br>$opcaixa - $descricao - R$ $valorf - $datavencf - $nomevend<br>";	

					$html .= "</font>";

					if ($codvend <> 0 and $codgrp <> 0){
			

						// ENVIA MENSAGEM 
						$prod->clear();
						$prod->setcampo1($codgrp);
						$prod->setcampo2($codvend);
						$prod->setcampo3($dataatual);
						$prod->setcampo4("PENDÊNCIA NO FINANCEIRO");
						$prod->setcampo5($html);
						$prod->setcampo6("N");  // HISTORICO
						$prod->setcampo7("NO");      // STATUS
						$prod->setcampo9($codvendold);  
						$prod->setcampo10("NO"); // ENVIADA
												
						$prod->addProd("msg", $ureg);
															
						#$html .= "EMAIL ENVIADO<br>";

					}
				
				}
				
				
			}//FOR

				
		}//FOR
          
echo("$html");