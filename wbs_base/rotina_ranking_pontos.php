<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("classprod.php" );
$udia = date("t");
#$diahoje = date("j");
#$diahoje = 15;
#$login = "joao";
$meta = $metauser/$udia;
$k= $mes;
$g= $mes+1;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;


// INICIO DA CLASSE
$prod = new operacao();

echo("
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<title>Untitled Document</title>
<style type='text/css'>
<!--
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; }
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; font-weight: bold; }
-->
</style>
</head>

<body>
<table width='740' border='0' align='center' cellpadding='3' cellspacing='3'>
  <tr>
    <td width='40' align='center'><span class='style5'>POS</span></td>
    <td width='500'><span class='style5'>NOME</span></td>
    <td width='100' align='center'><span class='style5'>PONTOS</span></td>
    <td width='100' align='center'><span class='style5'>GARANTIA</span></td>
  </tr>
  
  ");


	 $prod->clear();
     $prod->listProdSum("pedido.codvend, SUM(ponto_ped)*(70000/ if (meta = 0, 70000, meta)) as ponto, nome","pedido, pedidostatus, vendedor", "dataped >= '$ano-$k-01 00:00:00' AND dataped <= '$ano-$k-31 23:59:59' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND (statusped =  'CAIXA' or statusped =  'CAIXA FAT') AND datastatus <=  '$ano-$g-05' AND vendedor.codvend = pedido.codvend AND vendedor.codgrp <> '14' AND vendedor.codgrp <> '46'", $array, $array_campo, "GROUP by pedido.codvend having ponto >0 ORDER by ponto DESC, pedido.codvend");
     //$prod->listProdSum("pedido.codvend, FORMAT(SUM(ponto_ped)*(70000/ if (meta = 0, 70000, meta)), 0) as ponto, nome","pedido, pedidostatus, vendedor", "dataped >= '$ano-$k-01 00:00:00' AND dataped <= '$ano-$k-31 23:59:59' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND (statusped =  'CAIXA' or statusped =  'CAIXA FAT') AND datastatus <=  '$ano-$g-05' AND vendedor.codvend = pedido.codvend AND vendedor.codgrp <> '14' AND vendedor.codgrp <> '46'", $array, $array_campo, "GROUP by pedido.codvend having ponto >0 ORDER by ponto DESC, pedido.codvend");
     
     for($i = 0; $i < count($array); $i++ ){

         $prod->mostraProd( $array, $array_campo, $i );
         $codvend = $prod->showcampo0();
         $ponto = $prod->showcampo1();
         $nome = $prod->showcampo2();
         
         //echo "ponto(1): $ponto<br>";
         
         $t= $i+1;

		// MODIFICACAO INI
		//if($metax == 0) {$metax = 70000;}
		//$ponto = $ponto * (70000 / $metax);
		//$ponto = number_format($ponto, 0);
		// MODIFICACAO FIM
		//echo "meta: $metax<br>";
		//echo "ponto(2): $ponto<br><hr>";

 /*
         $prod->clear();
         $prod->listProdU("count(*) as win", "pedidoprod, produtos, pedido", "pedidoprod.codprod=produtos.codprod and codcat = 65 and pedidoprod.codped=pedido.codped and cancel <> 'OK' and dataped >= '$ano-$k-01' AND dataped <= '$ano-$k-31' and codvend = '$codvend' having win > 0");
         $num_windows = $prod->showcampo0();
*/
         $prod->clear();
         $prod->listProdU("count(*) as gar", "pedido", "tipo_vge >0 and cancel <>'OK' and dataped >= '$ano-$k-01' AND dataped <= '$ano-$k-31' and codvend = '$codvend' having gar > 0");
         $num_garantia = $prod->showcampo0();



         echo("
  <tr>
    <td align='center'><span class='style3'>$t</span></td>
    <td><span class='style3'>$nome</span></td>
    <td align='center'><span class='style3'>$ponto</span></td>
    <td align='center'><span class='style3'>$num_garantia</span></td>
  </tr>
  ");

     }//FOR

echo("
</table>
</body>
</html>
");


?>
