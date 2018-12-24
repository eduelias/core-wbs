<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codconta, opcaixa, descricao, credito, datamov ", "fin_bcomov", " datamov >= '2007-01-01' and opcaixa = '00.04' AND descricao LIKE '%SEDEX%' and credito <> 0", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codconta = $prod->showcampo0();
			$opcaixa = $prod->showcampo1();
			$descricao = $prod->showcampo2();
			$credito = $prod->showcampo3();
			$datamov = $prod->showcampo4();
			
			echo "$codconta - $opcaixa - $descricao - $credito - $datamov<BR>";

						
						// ADICIONA ESTORNO 
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($codconta);
						$prod->setcampo2($opcaixa);
						$prod->setcampo3("EXTORNO - ".$descricao); // DESCRICAO
						$prod->setcampo5($credito); // DEBITO
						$prod->setcampo6($datamov); 
						$prod->setcampo7($datamov); 
						$prod->setcampo8("N"); 
						$prod->setcampo12("Extorno referente ao Malote fora da expecificação mínima"); // OBS 
						$prod->setcampo13("felipe"); // login 

						$prod->addProd("fin_bcomov", $ureg);
						
						
						// ADICIONA ESTORNO 
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($codconta);
						$prod->setcampo2($opcaixa);
						$prod->setcampo3($descricao); // DESCRICAO
						$prod->setcampo5($credito); // DEBITO
						$prod->setcampo6($datamov); 
						$prod->setcampo7($datamov); 
						$prod->setcampo8("N"); 
						$prod->setcampo12("Malote fora da expecificação mínima"); // OBS 
						$prod->setcampo13("felipe"); // login 

						$prod->addProd("fin_bcomov", $ureg);
						
				#echo("$codmov - $ped_mlb - $valorp<br>");

		}

echo("TOTAL DE PEDIDOS MODIFICADOS : $i - $valorpt");
