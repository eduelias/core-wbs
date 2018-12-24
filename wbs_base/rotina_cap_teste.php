<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("opcaixa, descricao, valordevido, datapg, valorpago, datavenc, obs ", "fin_cap", "codemp = 1 and datavenc >= '2004-06-01' and datavenc <= '2004-06-31' and valorpago <> 0.00 and hist = 'S' and opcaixa <> '60.01' and opcaixa <> '60.02'", $array71, $array_campo71, "" );

						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$opcaixa = $prod->showcampo0();
				$descricao = $prod->showcampo1();
				$valor = $prod->showcampo2();
				$datapg = $prod->showcampo3();
				$valorpago = $prod->showcampo4();
				$datavenc = $prod->showcampo5();
				$obs = $prod->showcampo6();
				
								

				

					$html .= "$opcaixa;$descricao;$datapg;$valorpago;$obs;<br>";	
					#$html .= "$opcaixa;$descricao;$valor;$datapg;$valorpago;$datavenc;$obs";	
				

		

			}//FOR

		
			          
echo("$html");