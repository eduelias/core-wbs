<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../../classprod.php" );

$udia = date("t");
$diahoje = date("j");
#$diahoje = 15;
#$login = "joao";
$meta = $metauser/$udia;
$k= $mes;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;

#echo("$mes - $k - $ano - $udia - $login - $meta - $metauser");


// INICIO DA CLASSE
$prod = new operacao();


 if (strlen($k)==1){$u1 = '0'.$k;}else{$u1 = $k;}
 $metadia = 0;
 $valordiat = 0;
 $metadia = $meta;
 for($i = 0; $i <= $udia; $i++ ){
	 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	$prod->listProdSum("SUM( vpv ), SUM(mlb)","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped like '$ano-$u1-$u%' and cancel <>  'OK' AND codcliente <> 148 AND codcliente <> 187 and vendedor.nome='$login'", $array, $array_campo , "GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC");
		$prod->mostraProd( $array, $array_campo, 0 );
		$valordia = $prod->showcampo0();
		$mlbdia = $prod->showcampo1();
		$valordiat = $valordiat + $valordia;
		$valort = $valort + $valordia;
		$mlbdiat = $mlbdiat +$mlbdia;
		if ($i > $diahoje){$valordiat = 0;}
		$t= $i-1;
		$databary[$t] = $valordiat;
		$databary1[$t] = $metadia;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqy[$k] .= "databary[$t]=$databary[$t]&";
		$arqy1[$k] .= "databary1[$t]=$databary1[$t]&";

		$metadia = $metadia + $meta;
}//FOR

	$ef = ($mlbdiat/$valort)*1000;
	#echo("mlb = $mlbdia - vt= $valort");
	
	
	$values .= "mes=$mes&ano=$ano&ef=$ef";



#$GLOBALS["arq"] = $arq;
#echo("$arqy1[$k]<br>");
#echo("$arqy[$k]<br>");

echo("
<img src='line_vend_1.php?$arqy1[$k]$arqy[$k]$arqy_mes[$k]$values'> 




");


?>