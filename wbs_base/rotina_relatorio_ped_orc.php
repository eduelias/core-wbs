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
$ano = 2005;
#$codproj = 13;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;


// INICIO DA CLASSE
$prod = new operacao();


// CALCULO DO SEGUNDO GRAFICO DE FATURAMENTO MENSAL


// PEDIDOS
	 for($i = 1; $i <= 12; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	$prod->listProdSum("pedido.codvend, nome,  COUNT(*)","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped like '$ano-$u%' and cancel <>  'OK' and vendedor.codproj='$codproj'", $array, $array_campo , "group by pedido.codvend");
	
	$t= count($array);
	#echo("array = $t<BR>");
        for($y = 0; $y < count($array); $y++ ){
	
		$prod->mostraProd( $array, $array_campo, $y );
		$codvend = $prod->showcampo0();
		$nome[$codvend] = $prod->showcampo1();
		$num[$codvend][$i] = $prod->showcampo2();
        #echo("$y - $nome[$y] $u $ano<BR>");
        }//FOR
        
}//FOR



// ORCAMENTOS
 for($i1 = 1; $i1 <= 12; $i1++ ){
		 if (strlen($i1)==1){$u1 = '0'.$i1;}else{$u1 = $i1;}
	$prod->listProdSum("orc.codvend,nome,  COUNT( distinct tel)","orc, vendedor", "orc.codvend = vendedor.codvend AND dataped like '$ano-$u1%' and vendedor.codproj='$codproj'", $array1, $array_campo1 , "group by orc.codvend");

	$t= count($array1);
	#echo("array = $t<BR>");
        for($y1 = 0; $y1 < count($array1); $y1++ ){

		$prod->mostraProd( $array1, $array_campo1, $y1 );
		$codvend_orc = $prod->showcampo0();
		$nome_orc[$codvend_orc] = $prod->showcampo1();
		$num_orc[$codvend_orc][$i1] = $prod->showcampo2();
        #echo("$y1 - $nome_orc[$y1] $u1 $ano<BR>");
        }//FOR

}//FOR

?>

<table width='100%' border='0' cellpadding='1' cellspacing='1'>
  <tr>
    <td colspan='13'>PEDIDOS</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align='center'><strong>JAN</strong></td>
    <td align='center'><strong>FEV</strong></td>
    <td align='center'><strong>MAR</strong></td>
    <td align='center'><strong>ABR</strong></td>
    <td align='center'><strong>MAI</strong></td>
    <td align='center'><strong>JUN</strong></td>
    <td align='center'><strong>JUL</strong></td>
    <td align='center'><strong>AGO</strong></td>
    <td align='center'><strong>SET</strong></td>
    <td align='center'><strong>OUT</strong></td>
    <td align='center'><strong>NOV</strong></td>
    <td align='center'><strong>DEZ</strong></td>
  </tr>
<?
$prod->clear();
$prod->listProdSum("codvend","vendedor", "vendedor.codproj='$codproj'", $array2, $array_campo2 , "");
 for($y = 0; $y < count($array2); $y++ ){
	$prod->mostraProd( $array2, $array_campo2, $y );
	$codvend_p = $prod->showcampo0();
 ?>
  <tr align="center">
    <td><? echo "$nome[$codvend_p]"?></td>
    <td><? echo $num[$codvend_p][1] ?></td>
    <td><? echo $num[$codvend_p][2] ?></td>
    <td><? echo $num[$codvend_p][3] ?></td>
    <td><? echo $num[$codvend_p][4] ?></td>
    <td><? echo $num[$codvend_p][5] ?></td>
    <td><? echo $num[$codvend_p][6] ?></td>
    <td><? echo $num[$codvend_p][7] ?></td>
    <td><? echo $num[$codvend_p][8] ?></td>
    <td><? echo $num[$codvend_p][9] ?></td>
    <td><? echo $num[$codvend_p][10] ?></td>
    <td><? echo $num[$codvend_p][11] ?></td>
    <td><? echo $num[$codvend_p][12] ?></td>
  </tr>
 <?}?>
  
</table>


<table width='100%' border='0' cellpadding='1' cellspacing='1'>
  <tr>
    <td colspan='13'>ORCAMENTOS</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align='center'><strong>JAN</strong></td>
    <td align='center'><strong>FEV</strong></td>
    <td align='center'><strong>MAR</strong></td>
    <td align='center'><strong>ABR</strong></td>
    <td align='center'><strong>MAI</strong></td>
    <td align='center'><strong>JUN</strong></td>
    <td align='center'><strong>JUL</strong></td>
    <td align='center'><strong>AGO</strong></td>
    <td align='center'><strong>SET</strong></td>
    <td align='center'><strong>OUT</strong></td>
    <td align='center'><strong>NOV</strong></td>
    <td align='center'><strong>DEZ</strong></td>
  </tr>
<?  $prod->clear();
$prod->listProdSum("codvend","vendedor", "vendedor.codproj='$codproj'", $array2, $array_campo2 , "");
 for($y = 0; $y < count($array2); $y++ ){
	$prod->mostraProd( $array2, $array_campo2, $y );
	$codvend_o = $prod->showcampo0();?>
   <tr align="center">
    <td><? echo "$nome_orc[$codvend_o]"?></td>
    <td><? echo $num_orc[$codvend_o][1] ?></td>
    <td><? echo $num_orc[$codvend_o][2] ?></td>
    <td><? echo $num_orc[$codvend_o][3] ?></td>
    <td><? echo $num_orc[$codvend_o][4] ?></td>
    <td><? echo $num_orc[$codvend_o][5] ?></td>
    <td><? echo $num_orc[$codvend_o][6] ?></td>
    <td><? echo $num_orc[$codvend_o][7] ?></td>
    <td><? echo $num_orc[$codvend_o][8] ?></td>
    <td><? echo $num_orc[$codvend_o][9] ?></td>
    <td><? echo $num_orc[$codvend_o][10] ?></td>
    <td><? echo $num_orc[$codvend_o][11] ?></td>
    <td><? echo $num_orc[$codvend_o][12] ?></td>
  </tr>
 <?}?>

</table>




