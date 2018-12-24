<?php

require("classprod.php");

#$desloc = 0;
$acrescimo = 10000;


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("codprod, codpped", "pedidoprod", "", $array71, $array_campo71, "order by codpped limit $desloc,$acrescimo" );
						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$codprod = $prod->showcampo0();
				$codpped = $prod->showcampo1();

				// MOSTRA DADOS DO PEDIDO - INICIO
				 $prod->listProdU("gar_um, gar_cj", "produtos", "codprod=$codprod");
		    	 $gar_um = $prod->showcampo0();
 		    	 $gar_cj = $prod->showcampo1();
			
				if ($gar_cj <> 0 and $gar_um <> 0){
					 // ADICIONAR GARANTIA
					 $prod->clear();
					 $prod->listProd("pedidoprod", "codpped=$codpped");
					 $prod->setcampo11($gar_um);
					 $prod->setcampo12($gar_cj);
					 $prod->upProd("pedidoprod", "codpped=$codpped");
				
	

					echo "$codpped - $codprod - $gar_um - $gar_cj <br>";
					
				}

			}//FOR

		
			          
#echo("$html");