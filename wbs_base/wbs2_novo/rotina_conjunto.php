<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

echo("

<table border='0' width='100%' cellspacing='1' height='31'>
  <tr>
    <td width='70%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODPED</font></b></td>
    <td width='10%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CONT</font></b></td>
    <td width='10%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>KIT</font></b></td>
    <td width='10%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>TOTAL</font></b></td>
    
  </tr>


");



		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codbarra, pedido.codped", "pedido", "dataped >=  '2006-10-01'  and dataped <=  '2006-10-31' and cancel <> 'OK' and codemp =1", $array, $array_campo, "ORDER BY codped");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codbarra = $prod->showcampo0();
			$codped = $prod->showcampo1();

			$prod->clear();
			$prod->listProdSum("tipocj", "pedidoprod", "codped='$codped' and tipoprod = 'CJ'", $array1, $array_campo1, "GROUP by tipocj");
			#$prod->mostraProd( $array1, $array_campo1, 0 );
			$count = count($array1);
			
			$prod->clear();
			$prod->listProdU("SUM(qtde) as kit", "pedidoprod, produtos", "codped='$codped' and tipoprod = 'UM' and codcat = 73 and pedidoprod.codprod = produtos.codprod GROUP by tipocj");
			$kit = $prod->showcampo0();
		
			
			if($count > 0){
			$u = $u+1;
			
			}//IF
			$t = $count + $kit;
			echo("
		 <tr>
    <td width='70%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$codbarra</font></td>
    <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$count</font></b></td>
      <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$kit</font></b></td>
    <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$t</font></b></td>
  </tr>

");

$countt = $countt + $count;



		}//FOR

echo("TOTAL DE PEDIDOS : $i <BR>TOTAL DE PEDIDOS C/ CONJUNTO: $u <BR>TOTAL DE CONJUNTOS : $countt");

