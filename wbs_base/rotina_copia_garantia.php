<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("codpped, gar_um, gar_cj", "pedidoprod", "gar_um >0 and gar_cj >0 ", $array71, $array_campo71, "order by codprod" );
						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$codpped = $prod->showcampo0();
				$gar_um = $prod->showcampo1();
				$gar_cj = $prod->showcampo2();


				echo "$codpped - $gar_um - $gar_cj<br>";

				
				$prod->upProdU("pedidoprod", "gar_um_orig = $gar_um,  gar_cj_orig=$gar_cj", "codpped=$codpped");


			}//FOR

		
			          
#echo("$html");
