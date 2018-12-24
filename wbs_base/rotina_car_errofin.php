<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();

$login = "felipe";
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("codpgforma, fin_car_forma.codformagrupo, fin_car_forma.opcaixa, valor, fin_car_forma.descricao, fin_car_forma.codconta, datapg ", "fin_car_forma, fin_car", "fin_car_forma.opcaixa LIKE '03.4%' AND fin_car_forma.codformagrupo = fin_car.codformagrupo GROUP BY fin_car.codformagrupo", $array71, $array_campo71, "" );

								
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$codpgforma = $prod->showcampo0();
				$codformagrupo = $prod->showcampo1();
				$opcaixa = $prod->showcampo2();
				$valorp = $prod->showcampo3();
				$descricao = $prod->showcampo4();
				$codconta = $prod->showcampo5();
				$datapg = $prod->showcampo6();

				$prod->clear();
				$prod->listProdU("descricao, bco", "formapg", "opcaixa='$opcaixa'");
				$descricao = $prod->showcampo0();
				$bco = $prod->showcampo1();
				
									
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valorp);
						}else{
							$prod->setcampo5($valorp);
						}
					$prod->setcampo6($datapg);
					$prod->setcampo7($datapg);
					$prod->setcampo8("N");
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);


					// ATUALIZA CAR
					$prod->clear();
					$prod->listProd("fin_car_forma", "codpgforma=$codpgforma");
					$prod->setcampo8($descricao);

					$prod->upProd("fin_car_forma", "codpgforma=$codpgforma");

							
			echo("$codpgforma - $opcaixa - $descricao - $valorp - $codconta - $datapg - $bco - $login<br>");

				
			}//FOR
          
echo(" TOTAL REGISTROS: $j");