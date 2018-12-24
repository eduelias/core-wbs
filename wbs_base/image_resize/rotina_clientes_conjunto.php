<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

echo("

<table border='0' width='100%' cellspacing='1' height='31'>
  <tr>
    <td width='9%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODPED</font></b></td>
    <td width='50%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>NOME
      CLIENTE</font></b></td>
    <td width='14%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>TEL
      1</font></b></td>
    <td width='12%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>TEL2</font></b></td>
    <td width='9%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CIDADE</font></b></td>
  </tr>


");



		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codbarra, pedido.codcliente, nome, dddtel1, tel1, dddtel2, tel2, cidade, pedido.codped", "pedido, clientenovo", "pedido.codcliente = clientenovo.codcliente AND cidade LIKE  '%juiz%' AND dataped >  '2005-07-01' and pedido.codcliente <> 5550 and pedido.codcliente <> 1708 and pedido.codcliente <> 323 and pedido.codcliente <> 5034 and tipocliente = 'F'", $array, $array_campo, "ORDER BY nome");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codbarra = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$nome = $prod->showcampo2();
			$dddtel1 = $prod->showcampo3();
			$tel1 = $prod->showcampo4();
			$dddtel2 = $prod->showcampo5();
			$tel2 = $prod->showcampo6();
			$cidade = $prod->showcampo7();
			$codped = $prod->showcampo8();

			$prod->clear();
			$prod->listProdU("COUNT(*)","pedidoprod", "codped='$codped' and tipoprod = 'CJ'");
			$count = $prod->showcampo0();
			
			if($count <> 0){

			echo("
		 <tr>
    <td width='9%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$codbarra</font></td>
    <td width='50%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$nome</font></b></td>
    <td width='14%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#000000'>($dddtel1)
      $tel1</font></td>
    <td width='12%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#000000'>($dddtel2)
      $tel2</font></td>
    <td width='9%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#800000'>$cidade</font></td>
  </tr>

");

$j++;

			}//IF

		}//FOR

echo("TOTAL DE PEDIDOS MODIFICADOS : $j");

