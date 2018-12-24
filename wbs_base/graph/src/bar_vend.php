<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../../classprod.php" );

// INICIO DA CLASSE
$prod = new operacao();

if($dia == ""){$dia = "%";}

 for($k = 1; $k <= 12; $k++ ){
 if (strlen($k)==1){$u1 = '0'.$k;}else{$u1 = $k;}

		
		$prod->listProdSum("nome, SUM( vpv )","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped like '2003-$u1-26%' and cancel <>  'OK' AND codcliente <> 148 AND codcliente <> 187 AND codcliente <> 323 and pedido.codvend <> 108 AND pedido.codvend <> 22", $array, $array_campo , "GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC");
	 for($i = 1; $i < count($array); $i++ ){
		$prod->mostraProd( $array, $array_campo, $i );
		$databary[$i] = $prod->showcampo1();
		$databarx[$i] = $prod->showcampo0();
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqy[$k] .= "databary[$i]=$databary[$i]&";
		$arqx[$k] .= "databarx[$i]=$databarx[$i]&";
	 }

#$GLOBALS["arq"] = $arq;
#echo("$arqx[$k]<br>");
#echo("$arqy[$k]<br>");
	 }

 for($k = 1; $k <= 12; $k++ ){
if ($arqx[$k] <> "" and $arqy[$k] <> ""){
echo("
<img src='bar_vend_1.php?$arqx[$k]$arqy[$k]'> 

");
}
 }

?>