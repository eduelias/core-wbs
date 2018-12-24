<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../../classprod.php" );

// INICIO DA CLASSE
$prod = new operacao();


 for($k = 1; $k <= 12; $k++ ){
 if (strlen($k)==1){$u1 = '0'.$k;}else{$u1 = $k;}
	 for($i = 1; $i <= 31; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
		$databary[$i] = 0;
		$prod->listProdSum("SUM( vpp )","pedido", "dataped like '2004-$u1-$u%' and cancel <>  'OK' AND codcliente <> 148 AND codcliente <> 187 AND codcliente <> 323 and codvend <> 108 AND codvend <> 22", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
		$databary[$i] = $prod->showcampo0();
		$databarx[$i] = $i;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arq[$k] .= "databary[$i]=$databary[$i]&";
	 }
#$GLOBALS["arq"] = $arq;
#echo("$arq[$k]");
 }

 for($k = 1; $k <= 12; $k++ ){
echo("
<img src='bartutex12a.php?$arq[$k]'> 

");
 }

?>