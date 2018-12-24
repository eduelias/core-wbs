<?php

require("classprod.php");

#$desloc = 0;
$acrescimo = 10000;


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("nome, senha", "vendedor", "codemp = 8", $array71, $array_campo71, "order by nome" );
						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$nome = $prod->showcampo0();
				$senha = $prod->showcampo1();
				
				$senhanew = base64_decode("$senha");

				
				echo "$nome - $senhanew<br>";
					
				
			}//FOR

		
			          
#echo("$html");