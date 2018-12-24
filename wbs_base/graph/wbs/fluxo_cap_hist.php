<?php

// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../classprod.php" );

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

$udia = date('t');
#$diahoje = date("j");
$udia = 31;

if ($mes_hoje == $mes and $ano_hoje == $ano){$diahoje = $hoje[mday];}else{$diahoje = 31;}
if (strlen($dia)==1){$dia = '0'.$dia;}

#$diahoje = 15;
#$login = "joao";
#$meta = $metauser/$udia;
$k= $mes;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;

#echo("$mes - $k - $ano - $udia - $login - $meta - $metauser");


// INICIO DA CLASSE
$prod = new operacao();


 for($r = 0; $r < 3; $r++ ){
	
 if (strlen($k)==1){$u1 = '0'.$k;}else{$u1 = $k;}
 $metadia = 0;
 $valordiat = 0;
 $yt = 0;
 $pt = 0;
 $metadia = $meta;
 for($i = 1; $i <= $udia; $i++ ){
	 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	$prod->listProdSum("SUM(valordevido)", "fin_cap", "codemp = $codemp AND datapg like '$ano-$u1-$u%' AND hist = 'S'", $array, $array_campo, "" );

		$prod->mostraProd( $array, $array_campo, 0 );
		$valordia = $prod->showcampo0();
		$y[$t] = $valordia;
		$yt = $yt + $valordia;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqy[$k] .= "y[$t]=$y[$t]&";
		
    $prod->listProdSum("SUM(valordevido)", "fin_cap", "codemp = $codemp AND datavenc like '$ano-$u1-$u%' and valorpago = 0.00 and hist <> 'S'", $array1, $array_campo1, "" );

		$prod->mostraProd( $array1, $array_campo1, 0 );
		$valordia_p = $prod->showcampo0();
		$p[$t] = $valordia_p;
		$pt = $pt + $valordia_p;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqp[$k] .= "p[$t]=$p[$t]&";
		

}//FOR

        $tt = $pt+$yt;

	
	//k = mes
	$values = "mes=$k&ano=$ano&ef=$ef&yt=$yt&pt=$pt&tt=$tt";



#$GLOBALS["arq"] = $arq;
#echo("$arqy1[$k]<br>");
#echo("$arqy[$k]<br>");

echo("
<img src='fluxo_cap_hist1.php?$arqy[$k]$arqp[$k]$values'>




");

if ($k == 12){$ano = $ano +1;$k=0;}
$k=$k+1;


}//FOR



?>
