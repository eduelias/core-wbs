<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("opcaixa, codcap ", "projeto_relacao_custo", "1", $array71, $array_campo71, "GROUP BY codcap" );

						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$opcaixa = $prod->showcampo0();
				$codcap = $prod->showcampo1();
						

			$prod->listProdU("codcap", "fin_cap", "codcap=$codcap");
			$codcap_conta = $prod->showcampo0();

				
			if ($codcap_conta == ""){
					$html .= "$opcaixa - $codcap - $codcap_conta<br>";	
					#$html .= "$opcaixa;$descricao;$valor;$datapg;$valorpago;$datavenc;$obs";	
			}

		

			}//FOR

		
			          
echo("$html");