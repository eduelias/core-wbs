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
     $prod->listProdSum("codvend, SUM(ponto_ped) as ponto","pedido, pedidostatus", "dataped >= '$ano-$k-01' AND dataped <= '$ano-$k-31' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND statusped =  'CAIXA' AND datastatus <=  '$ano-$g-05' ", $array, $array_campo, "GROUP by codvend having ponto >0 ORDER by ponto DESC,  codvend");
     
     for($i = 0; $i < count($array); $i++ ){

         $prod->mostraProd( $array, $array_campo, $i );
         $codvend = $prod->showcampo0();
         $ponto = $prod->showcampo1();

         $prod->clear();
         $prod->listProdU("nome", "vendedor", "codvend = '$codvend'");
         $nome = $prod->showcampo0();
         $t= $i+1;
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
