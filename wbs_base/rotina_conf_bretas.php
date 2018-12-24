<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcxsaldo", " fin_cxsaldo", "codcx = 18", $array, $array_campo, "ORDER by codcxsaldo");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codcxsaldo = $prod->showcampo0();


			$prod->listProdSum("SUM(credito) , SUM(debito)", " fin_cxlanc", "codcxsaldo = $codcxsaldo", $array1, $array_campo1, "");

			for($j = 0; $j < count($array1); $j++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $j );

			// DADOS //
			$soma = $prod->showcampo0();
			$debito = $prod->showcampo1();
			
			

			echo("$codcxsaldo - $soma - $debito<br>");				
			
			}//FOR
		
		$somat = $somat + $soma;
		$debitot = $debitot + $debito;

		}


echo("TOTAL  : $somat - $debitot");