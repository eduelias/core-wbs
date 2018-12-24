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
$codproj = 13;
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
		$codvend[$y] = $prod->showcampo0();
		$nome[$y] = $prod->showcampo1();
		$num[$y][$i] = $prod->showcampo2();
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
		$codvend_orc[$y1] = $prod->showcampo0();
		$nome_orc[$y1] = $prod->showcampo1();
		$num_orc[$y1][$i1] = $prod->showcampo2();
        #echo("$y - $nome[$y] $u $ano<BR>");
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
<?  for($y = 0; $y < 15; $y++ ){ ?>
  <tr align="center">
    <td><? echo "$nome[$y]"?></td>
    <td><? echo $num[$y][1] ?></td>
    <td><? echo $num[$y][2] ?></td>
    <td><? echo $num[$y][3] ?></td>
    <td><? echo $num[$y][4] ?></td>
    <td><? echo $num[$y][5] ?></td>
    <td><? echo $num[$y][6] ?></td>
    <td><? echo $num[$y][7] ?></td>
    <td><? echo $num[$y][8] ?></td>
    <td><? echo $num[$y][9] ?></td>
    <td><? echo $num[$y][10] ?></td>
    <td><? echo $num[$y][11] ?></td>
    <td><? echo $num[$y][12] ?></td>
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
<?  for($y1 = 0; $y1 < 15; $y1++ ){ ?>
  <tr align="center">
    <td><? echo "$nome_orc[$y1]"?></td>
    <td><? echo $num_orc[$y1][1] ?></td>
    <td><? echo $num_orc[$y1][2] ?></td>
    <td><? echo $num_orc[$y1][3] ?></td>
    <td><? echo $num_orc[$y1][4] ?></td>
    <td><? echo $num_orc[$y1][5] ?></td>
    <td><? echo $num_orc[$y1][6] ?></td>
    <td><? echo $num_orc[$y1][7] ?></td>
    <td><? echo $num_orc[$y1][8] ?></td>
    <td><? echo $num_orc[$y1][9] ?></td>
    <td><? echo $num_orc[$y1][10] ?></td>
    <td><? echo $num_orc[$y1][11] ?></td>
    <td><? echo $num_orc[$y1][12] ?></td>
  </tr>
 <?}?>

</table>




