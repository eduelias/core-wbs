<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../classprod.php" );

$udia = date("t");
#$diahoje = date("j");
#$diahoje = 15;
#$login = "joao";
$meta = $metauser/$udia;
$k= $mes;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;


// INICIO DA CLASSE
$prod = new operacao();

if ($tipovend == "R"){$cond = "SUM(vc)";}else{$cond = "SUM(vpv)";}
 
	
// CALCULO DO SEGUNDO GRAFICO DE FATURAMENTO MENSAL

	 for($i = 1; $i <= 12; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	$prod->listProdSum($cond,"pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped like '$ano-$u%' and cancel <>  'OK' and vendedor.nome='$login'", $array, $array_campo , "GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC");
		$prod->mostraProd( $array, $array_campo, 0 );
		$valormes = $prod->showcampo0();
		$t= $i-1;
		$databary_mes[$t] = $valormes;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqy_mes[$k] .= "databary_mes[$t]=$databary_mes[$t]&";

}//FOR
	
	
	$values .= "mes=$mes&ano=$ano&ef=$ef";



#$GLOBALS["arq"] = $arq;
#echo("$arqy1[$k]<br>");
#echo("$arqy[$k]<br>");

echo("
<br>
<img src='line_vend_2.php?$arqy_mes[$k]$values'> 


");


?>