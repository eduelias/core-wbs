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
		$prod->listProdSum("codbarra, pedido.codped", "pedido", "dataped >  '2005-04-17'  and dataped <  '2005-05-31' and codvend = 163", $array, $array_campo, "ORDER BY codped");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codbarra = $prod->showcampo0();
			$codped = $prod->showcampo1();

			
			$prod->listProdSum("tipocj", "pedidoprod", "codped='$codped' and tipoprod = 'CJ'", $array1, $array_campo1, "GROUP by tipocj");
			#$prod->mostraProd( $array1, $array_campo1, 0 );
			$count = count($array1);
			
			if($count > 0){
			$u = $u+1;
			
			}//IF

			echo("
		 <tr>
    <td width='50%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$codbarra</font></td>
    <td width='50%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$count</font></b></td>
    
  </tr>

");

$countt = $countt + $count;



		}//FOR

echo("TOTAL DE PEDIDOS : $i <BR>TOTAL DE PEDIDOS C/ CONJUNTO: $u <BR>TOTAL DE CONJUNTOS : $countt");

