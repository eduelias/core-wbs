<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

echo("

<table border='0' width='100%' cellspacing='1' height='31'>
  <tr>
    <td width='50%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODPED</font></b></td>
    <td width='50%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CONT</font></b></td>
    
  </tr>


");



		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codvend, nome", "vendedor", "tipo = 'R'", $array, $array_campo, "ORDER by nome");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codvend = $prod->showcampo0();
			$nome = $prod->showcampo1();
			

			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codped", "pedido", "codvend = $codvend and dataped> '2005-01-01' and dataped <'2005-01-31'", $array2, $array_campo2, "");
			
			$cont = 0;
			$somat = 0;
			for($ia = 0; $ia < count($array2); $ia++ ){
			
				$prod->mostraProd( $array2, $array_campo2, $ia );

				// DADOS //
				$codped = $prod->showcampo0();
				


			$prod->listProdSum("COUNT(*), SUM(ppu)", "pedidoprod", "codped='$codped' and tipoprod <> 'CJ'", $array1, $array_campo1, "GROUP by tipocj");
			$prod->mostraProd( $array1, $array_campo1, 0 );
			$count = $prod->showcampo0();
			$soma = $prod->showcampo1();
			
			if ($count <> 0 ){$cont++;}	
			$somat = $somat + $soma;
			
			}
			
			if($count <> 0){

			echo("
		 <tr>
    <td width='50%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$nome</font></td>
    <td width='50%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$cont - $somat</font></b></td>
    
  </tr>

");

$countt = $countt + $count;

			}//IF

		}//FOR

echo("TOTAL DE PEDIDOS MODIFICADOS : $countt");

