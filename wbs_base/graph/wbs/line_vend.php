<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../classprod.php" );

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

$udia = date("t");
#$diahoje = date("j");

if ($mes_hoje == $mes and $ano_hoje == $ano){$diahoje = $hoje[mday];}else{$diahoje = 31;}
if (strlen($dia)==1){$dia = '0'.$dia;}

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

$prod->clear();
$prod->listProdU("codvend", "vendedor", "nome = '$login'");
$codvend = $prod->showcampo0();


if ($tipovend == "R"){$cond = "SUM(vc)";}else{$cond = "SUM(vpv)";}

 if (strlen($k)==1){$u1 = '0'.$k;}else{$u1 = $k;}
 $metadia = 0;
 $valordiat = 0;
 $metadia = $meta;
 for($i = 0; $i <= $udia; $i++ ){
	 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	$prod->listProdSum( $cond.", SUM(mlb), SUM(tipo_vge)/12 as gar","pedido", "dataped like '$ano-$u1-$u%' and cancel <>  'OK' and codvend='$codvend'", $array, $array_campo , "GROUP  BY pedido.codvend ");
		$prod->mostraProd( $array, $array_campo, 0 );
		$valordia = $prod->showcampo0();
		$mlbdia = $prod->showcampo1();
		$numgar = $prod->showcampo2();
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

    $prod->clear();
    $prod->listProdU("SUM(credito-debito) ", "fin_bcomov, fin_bcoconta", "datamov like '$ano-$u1%' and (opcaixa = '00.01' or opcaixa = '00.02' or opcaixa = '00.03') and nomebco = '$login' and fin_bcoconta.codconta = fin_bcomov.codconta");
	$c = $prod->showcampo0();

	$ef = ($mlbdiat/$valort)*1000;
	$q=$numgar;
	

	$values .= "mes=$mes&ano=$ano&ef=$ef&c=$c&q=$q&w=$w";



#$GLOBALS["arq"] = $arq;
#echo("$arqy1[$k]<br>");
#echo("$arqy[$k]<br>");

#echo("$values - $countt - $codvend");


echo("
<img src='line_vend_1.php?$arqy1[$k]$arqy[$k]$arqy_mes[$k]$values'> 




");


?>
