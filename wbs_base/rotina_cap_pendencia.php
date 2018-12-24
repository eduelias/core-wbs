<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codemp, codvend_car, codvend_cap, nome", "empresa", "", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codemp = $prod->showcampo0();
			$codvend_car = $prod->showcampo1();
			$codvend_cap = $prod->showcampo2();
			$nomeemp = $prod->showcampo3();
			#$xcodvend_car = explode(":", $codvend_car);
			$xcodvend_cap = explode(":", $codvend_cap);

			$dif = 1; // DIFERENCA (dias)

			$valor = 0;
			$valort = 0;

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("opcaixa, descricao, codfor, valordevido, TO_DAYS(NOW()) - TO_DAYS(datavenc) as atraso, valorpago, datavenc, obs ", "fin_cap", "codemp = $codemp and TO_DAYS(NOW()) - TO_DAYS(datavenc) > $dif and valorpago = 0.00 and hist <> 'S'", $array71, $array_campo71, "" );

			$html = "<font size=1 face=Verdana, Arial, Helvetica, sans-serif>";
			$html .= "<b>EMPRESA : $nomeemp</b><br><br>";
			$html .= "Relação de CONTAS A PAGAR pendentes:<br><br>";	
	

			
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$opcaixa = $prod->showcampo0();
				$descricao = $prod->showcampo1();
				$codfor = $prod->showcampo2();
				$valor = $prod->showcampo3();
				$atraso = $prod->showcampo4();
				$valorpago = $prod->showcampo5();
				$datavenc = $prod->showcampo6();
				$obs = $prod->showcampo7();
				$valorf = number_format($valor,2,',','.'); 
				$datavencf = $prod->fdata($datavenc);

				$prod->clear();
		        $prod->listProdU("nome", "fornecedor", "codfor=$codfor");
				$nomefor = $prod->showcampo0();
				$nomefor = strtoupper($nomefor);
				if ($nomefor == ""){$nomefor = "";}
				
								

				if (count($array71) <> 0){

					$html .= "<b>$opcaixa - $descricao</b> -  $atraso dias<br>$nomefor - $obs - R$ $valorf - $datavencf<br>";	

				}

				$valort = $valort + $valor;

			}//FOR

				#$html .= "</table>";

				$valortf = number_format($valort,2,',','.'); 

				$html .="<b>TOTAL $j pedidos - R$ $valortf</b><br><br>";

			$valor = 0;
			$valort = 0;

				$html .= "</font>";
			
				
				if (count($array71) <> 0){

					for($l = 0; $l < count($xcodvend_cap); $l++ ){

						$prod->clear();
						$prod->listProdU("codgrp", "vendedor", "codvend='$xcodvend_cap[$l]'");
						$codgrp = $prod->showcampo0();
						$codvend = $xcodvend_cap[$l];

					#echo("$codvend, $codgrp");

						if ($codvend <> 0 and $codgrp <> 0){
				
				
							// ENVIA MENSAGEM 
							$prod->clear();
							$prod->setcampo1($codgrp);
							$prod->setcampo2($codvend);
							$prod->setcampo3($dataatual);
							$prod->setcampo4("PENDÊNCIA NO CAP");
							$prod->setcampo5($html);
							$prod->setcampo6("N");  // HISTORICO
							$prod->setcampo7("NO");      // STATUS
							$prod->setcampo9($codvendold);  
							$prod->setcampo10("NO"); // ENVIADA
													
							$prod->addProd("msg", $ureg);
																	
							#$html .= "EMAIL ENVIADO<br>";

						}

					}//FOR
				}

		
		}//FOR
          
echo("$html");