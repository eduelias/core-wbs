<?php

require("../classprod.php" );

$codempselect = 1;

// INICIO DA CLASSE
$prod = new operacao();

		#echo("cb=$codped");


			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("dataprevent, codped", "pedido", "", $array, $array_campo, "" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$dataprevent = $prod->showcampo0();
			$codped = $prod->showcampo1();


		// ATUALIZA ESTOQUE
		$prod->listProd("pedido", "codped=$codped");
		
		$prod->setcampo48($dataprevent);
		
		$prod->upProd("pedido", "codped=$codped");

		}
?>
