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

$prod->clear();
$prod->listProdU("codvend", "vendedor", "nome = '$login'");
$codvend = $prod->showcampo0();
$ponto = 0;
 for($i = 1; $i <= 12; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
		 if (strlen($i)==1){$g = '0'.$i+1;}else{$g = $i+1;}
	 $prod->clear();
     $prod->listProdU("codvend , SUM(ponto_ped) as ponto","pedido, pedidostatus", "dataped >= '$ano-$u-01 00:00:00' AND dataped <= '$ano-$u-31 23:59:59' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND (statusped =  'CAIXA' or statusped =  'CAIXA FAT') AND datastatus <=  '$ano-$g-05' and codvend='$codvend' GROUP by codvend HAVING ponto >0 ORDER by datastatus");
		$ponto = $prod->showcampo1();

         $prod->clear();
         $prod->listProdU("meta", "vendedor", "codvend = '$codvend'");
         $metax = $prod->showcampo0();
		 		
		// MODIFICACAO INI
		$ponto = $ponto * (70000 / $metax);
		// MODIFICACAO FIM
		
		$t= $i-1;
		$databary_mes[$i] = $ponto;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqy_mes[$k] .= "databary_mes[$i]=$databary_mes[$i]&";

}//FOR
	$values .= "mes=$mes&ano=$ano";



#$GLOBALS["arq"] = $arq;
#echo("$arqy1[$k]<br>");
#echo("$arqy[$k]<br>");

echo("
<br>
<img src='pontos_vend_1.php?$arqy_mes[$k]$values'>



");


?>
