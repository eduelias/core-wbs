<?php

require("classprod.php");

#$desloc = 0;
$acrescimo = 10000;


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	 

// ACOES PRINCIPAIS DA PAGINA

			// MOEDA PADRAO
			$prod->listProdU("codmoeda", "moeda", "padrao='S'");		
			$codmoedapadrao = $prod->showcampo0();

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("nomeprod, codprod", "produtos", "unidade <> 'CJ'", $array71, $array_campo71, "order by codprod" );
						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$nome = $prod->showcampo0();
				$codprod = $prod->showcampo1();

				$prod->listProdU("count(*)", "estoque", "codprod=$codprod");
				$qtde = $prod->showcampo0();
				
			
				if ($qtde <> 20){

				$codped = 0;
				$prod->listProdSum("count(*), codped", "pedidoprod", "codprod=$codprod and ppu = 0", $array72, $array_campo72, "group by codprod" );
				$prod->mostraProd($array72, $array_campo72, 0 );
				$qtdeprod = $prod->showcampo0();
				$codped = $prod->showcampo1();

				

				echo "$codprod - $qtde - $qtdeprod - $codped - $nome<br>";
				}
				  
				if ($qtde < 20 and qtdeprod == 0){
				
				echo("AQUI<br>");
				
   					for($k = 1; $k < 20; $k++ ){
					
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($k);
					$prod->setcampo2($codprod);
					$prod->setcampo3(0);
					$prod->setcampo4(0);
					$prod->setcampo5(10);
					$prod->setcampo8($codmoedapadrao);
					$prod->setcampo6(1);
					$prod->setcampo7(1);

					$prod->addProd("estoque", $ureg);
					
					}
				}
					
				
			}//FOR

		
			          
#echo("$html");
