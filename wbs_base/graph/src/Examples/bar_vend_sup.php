<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../../classprod.php" );

 $hoje = getdate();
 $ano_hoje = $hoje[year];
 $mes_hoje = $hoje[mon];
 #$dia = $hoje[mday];

 #if (strlen($mes)==1){$mes = '0'.$mes;}

 
 if ($mes_hoje == $mes and $ano_hoje == $ano){$dia = $hoje[mday];}else{$dia = 31;}
 if (strlen($dia)==1){$dia = '0'.$dia;}

#$ano = date("Y");
#$mes = date("n");
#$tipo = "R";
$meta = $metauser;
$udia = date("t");
#$udia = "31";
#$mes = "04";
#$ano = "2004";
#$dia = "31";


#echo("udia = $udia");

// INICIO DA CLASSE
$prod = new operacao();

#if($dia == ""){$dia = "%";}

# if (strlen($mes)==1){$u1 = '0'.$mes;}else{$u1 = $mes;}

		// CLIENTES
		// 148 - TV JUIZ DE FORA LTDA
		// 187 - MAXXFORM LTDA ME
		// 323 - Ipasoft Tecnologia e Informática LTDA
		// VENDEDOR
		// 108 - ipasoft
		// 22 - giovanni
	

		
		$prod->listProdSum("nome, SUM( vpv )","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped  like '$ano-$mes%' and cancel <>  'OK' AND codcliente <> 148 AND codcliente <> 187 AND codcliente <> 323 and pedido.codvend <> 108 AND pedido.codvend <> 22 AND vendedor.codproj='$codproj'", $array, $array_campo , "GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC");
	 for($i = 0; $i < count($array); $i++ ){
		$prod->mostraProd( $array, $array_campo, $i );

				
		$y[$i] = $prod->showcampo1();
		$x[$i] = $prod->showcampo0();
		$y1[$i] = $prod->showcampo2();
		$y1[$i] = $databary1[$i]*100;
		$m[$i] = $meta;
		#$metauserdia[$i] = ($meta/$udia)*$dia;
		$yh[$i] = 0;

				$prod->listProdSum("SUM( vpv )","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped  like '$ano-$mes-$dia%' and cancel <>  'OK' AND codcliente <> 148 AND codcliente <> 187 AND codcliente <> 323 and pedido.codvend <> 108 AND pedido.codvend <> 22 AND vendedor.codproj='$codproj' and vendedor.nome ='$x[$i]'", $array1, $array_campo1 , "");
				$prod->mostraProd( $array1, $array_campo1, 0 );
				$yh[$i] = $prod->showcampo0();

		#$databary[$i] = $databary[$i] - $databary_hoje[$i];

		#echo("$databarx[$i] - $databary[$i] -  $databary_hoje[$i]<br>");

		$arqy[$mes] .= "y[$i]=$y[$i]&";
		$arqy_hoje[$mes] .= "yh[$i]=$yh[$i]&";
		$arqy1[$mes] .= "y1[$i]=$y1[$i]&";
		$arqy2[$mes] .= "m[$i]=$m[$i]&";
		#$arqy3[$mes] .= "metauserdia[$i]=$metauserdia[$i]&";
		$arqx[$mes] .= "x[$i]=$x[$i]&";
		
		


	 }
	    $numuser = count($array);
		$values .= "dia=$dia&mes=$mes&ano=$ano&cont=$numuser&udia=$udia";

#$GLOBALS["arq"] = $arq;
#echo("$arqx[$mes]<br>");
#echo("$arqy[$mes]<br>");
#echo("$arqy1[$mes]<br>");
#echo("$arqy2[$mes]<br>");


echo("
<img src='bar_vend_sup_1.php?$arqx[$mes]$arqy[$mes]$arqy_hoje[$mes]$arqy1[$mes]$arqy2[$mes]$values'> 

");

?>