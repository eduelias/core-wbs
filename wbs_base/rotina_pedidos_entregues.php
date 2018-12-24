<?php

require("classprod.php");

#$desloc = 0;
$acrescimo = 10000;


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("(TO_DAYS(datastatus) - TO_DAYS(dataprevent) -1 ) as dif, dataprevent, dataprevent_old  ", " pedidostatus, pedido ", "statusped = 'DESP' and pedido.codped = pedidostatus.codped and dataped > '2005-03-29' GROUP by pedidostatus.codped HAVING dif > 0 and dif < 20", $array71, $array_campo71, "" );
						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$dif = $prod->showcampo0();
				$d1 = $prod->showcampo1();
				$d2 = $prod->showcampo2();
				
				if ($d1 <> $d2){$y++;}

                $soma = $soma + $dif;

    			echo "$dif - $soma - $y<br>";

			}//FOR
			
			$total = count($array71);
			$media = $soma/$total;
			$t = $y/$total*100;

            echo"$media - $t - $total";
			          
#echo("$html");
