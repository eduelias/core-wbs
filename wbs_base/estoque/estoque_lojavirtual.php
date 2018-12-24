<?php

require("../classprod.php" );


// INICIO DA CLASSE
$prod = new operacao();

		#echo("cb=$codped");
		
		
		echo "
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>Untitled Document</title>
		<style type='text/css'>
		<!--
		.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 10px; }
		.style11 {font-family: Verdana, Arial, Helvetica, sans-serif;  font-size: 10px; text-transform: uppercase; }
		
		-->
		</style>
		</head>
		
		<body>
		<table width='100%' border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td align='center'><span class='style7'>CODPROD</span></td>
    <td align='center'><span class='style7'>PRODUTO</span></td>
    <td align='center'><span class='style7'>ESTOQUE</span></td>
  </tr>";


			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("produtos.codprod, nomeprod, (qtde-reserva) as est", "produtos, estoque", "produtos.codprod= estoque.codprod and codemp = 15 and (produtos.codprod =  2993 or produtos.codprod =  3012 or produtos.codprod =  3014 or produtos.codprod =  3010 or produtos.codprod =  3079 or produtos.codprod =  3089 or produtos.codprod =  2997 or produtos.codprod =  3011 or produtos.codprod =  2245 or produtos.codprod =  3013 or produtos.codprod =  3080 or produtos.codprod =  2987 or produtos.codprod =  2988 or produtos.codprod =  3020 or produtos.codprod =  2768 or produtos.codprod =  2738 or produtos.codprod =  1828 or produtos.codprod =  1830 or produtos.codprod =  2983 or produtos.codprod =  2770 or produtos.codprod =  3047 or produtos.codprod =  2945 or produtos.codprod =  2766 or produtos.codprod =  2926 or produtos.codprod =  2918 or produtos.codprod =  212  or produtos.codprod =  2071 or produtos.codprod =  1229 or produtos.codprod =  3104 or produtos.codprod =  2570 or
produtos.codprod =  2007 or produtos.codprod =  2608 or produtos.codprod =  2889 or produtos.codprod =  2814 or produtos.codprod =  2858 or produtos.codprod =  2948 or produtos.codprod =  2950 or produtos.codprod =  2951 or produtos.codprod =  2944 or produtos.codprod =  2713 or produtos.codprod =  2386 or produtos.codprod =  2384 or produtos.codprod =  2385 or produtos.codprod =  2388 or produtos.codprod =  2387 or produtos.codprod =  1470 or produtos.codprod =  245  or produtos.codprod =  246  or produtos.codprod =  2954 or produtos.codprod =  2992 or produtos.codprod =  2941 or produtos.codprod =  2940 or produtos.codprod =  2972 or produtos.codprod =  2999 or produtos.codprod =  3034 or produtos.codprod =  3146 or produtos.codprod =  3035 or produtos.codprod =  2869 or produtos.codprod =  2741 or produtos.codprod =  2914 or
produtos.codprod =  2736 or produtos.codprod =  2735 or produtos.codprod =  3038 or produtos.codprod =  2925 or produtos.codprod =  2982 or produtos.codprod =  2956 or produtos.codprod =  3037 or produtos.codprod =  2973 or produtos.codprod =  3001 or produtos.codprod =  3066 or produtos.codprod =  2952 or produtos.codprod =  2810 or produtos.codprod =  3039 or produtos.codprod =  1738 or produtos.codprod =  2167 or produtos.codprod =  2894 or produtos.codprod =  1287 or produtos.codprod =  2899 or produtos.codprod =  1615 or produtos.codprod =  2830 or produtos.codprod =  2765 or produtos.codprod =  2896 or produtos.codprod =  2981 or produtos.codprod =  2851 or produtos.codprod =  2542 or produtos.codprod =  2543 or produtos.codprod =  2967 or produtos.codprod =  2968 or produtos.codprod =  2969 or produtos.codprod =  2963 or
produtos.codprod =  2744 or produtos.codprod =  2564 or produtos.codprod =  3040 or produtos.codprod =  2704 or produtos.codprod =  3015 or produtos.codprod =  2994 or produtos.codprod =  2989 or produtos.codprod =  2990 or produtos.codprod =  2348 or produtos.codprod =  3046 or produtos.codprod =  2661 or produtos.codprod =  3048 or produtos.codprod =  2542 or produtos.codprod =  2939 or produtos.codprod =  3052 or  produtos.codprod =  2720 or produtos.codprod =  2879 or produtos.codprod =  2485 or produtos.codprod =  3111 or produtos.codprod =  3102 or produtos.codprod =  2636 or produtos.codprod =  3112 or produtos.codprod =  3113 or produtos.codprod =  3056 or produtos.codprod =  3090 or produtos.codprod =  2835 or produtos.codprod =  3070 or produtos.codprod =  3114 or produtos.codprod =  3031 or produtos.codprod =  3154 or
produtos.codprod =  3152 or produtos.codprod =  3151 or produtos.codprod =  3149 or produtos.codprod =  3145 or produtos.codprod =  3120 or produtos.codprod =  3112 or produtos.codprod =  3109 or produtos.codprod =  3101 or produtos.codprod =  3083 or produtos.codprod =  3082 or produtos.codprod =  3081 or produtos.codprod =  3064 or produtos.codprod =  3059 or produtos.codprod =  3058)  ", $array, $array_campo, "order by nomeprod" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$nomeprod= strtoupper($nomeprod);
			$est = $prod->showcampo2();
			
			if ($est > 0){$cor = "#FFFFFF";}else{$cor = "#FFCC66";}
			
			echo "
			<tr bgcolor='$cor'>
    <td align='center' class='style11'><span class='style13'>$codprod</span></td>
    <td align='left' class='style11'><span class='style13'>$nomeprod</span></td>
    <td align='center' class='style11'><span class='style13'>$est</span></td>
  </tr>
  ";
		
			
		}//FOR
		
	echo "</table>";	
		
?>
