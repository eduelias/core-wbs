<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("../../../classprod.php" );

echo("
<form method='POST' action='$PHP_SELF?retorno=1'>
  <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1'>
      <tr>
        <td width='16%' align='center'><b><font size='2' face='Verdana' color='#800000'>ANO:</font></b></td>
        <td width='42%'><b><font size='2' face='Verdana'><!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='4' --><input type='text' name='ano' size='4' maxlength='4'></font></b></td>
        <td width='42%' rowspan='2'><input type='submit' value='ENVIAR' name='B1'></td>
      </tr>
      <tr>
        <td width='16%' align='center'><b><font size='2' face='Verdana' color='#800000'>MÊS:</font></b></td>
        <td width='42%'><b><font size='2' face='Verdana'><!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='mes' size='2' maxlength='2'></font></b></td>
      </tr>
    </table>
    </center>
  </div>
</form>
");

if ($retorno){

// INICIO DA CLASSE
$prod = new operacao();

		// VENDEDORES
		// 108 - IPASOFT
		// 120 - INFOHELP
		// 124 - GBA
		// 95  - MAXXFORM
		// 170 - BRETAS
		// 203 - IHELPCOM
		// 277 - IHALFELD
		// 326 - IPAMINAS
		// 323 - IPAESTRELASUL
		// 364 - IPABHSHOPPPING
		// 364 - IPABHSHOPPPING
		// 364 - IPABHSHOPPPING
		// CLIENTE
		// 323 - IPASOFT


 if (strlen($mes)==1){$u1 = '0'.$mes;}else{$u1 = $mes;}
	 for($i = 0; $i <= 31; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
		#$databary[$i] = 0;
		#$prod->listProdSum("SUM( vpv ), SUM( vpp )","pedido", "dataped like '$ano-$u1-$u%' and cancel <>  'OK' and (inicio_sep = 'OK' or inicio_sep = '') and (pedido.codvend <> 124 and pedido.codvend <> 95 and pedido.codvend <> 120 and pedido.codvend <> 108 and codcliente <> 323 and pedido.codvend <> 170 and pedido.codvend <> 203 and pedido.codvend <> 277 and pedido.codvend <> 326 and pedido.codvend <> 323 and pedido.codvend <> 364 and codcliente <> 1708 and codcliente <> 27985 and codcliente <> 40030) and codemp <> 14 and modelo_ped <> 'ATA' and modelo_ped <> 'DST' and modelo_ped <> 'RDST' and modelo_ped <> 'RDD' ", $array, $array_campo , "");
		$prod->listProdSum("SUM( vpv ), SUM( vpp )","pedido", "dataped like '$ano-$u1-$u%' and cancel <>  'OK' and (inicio_sep = 'OK' or inicio_sep = '') and (pedido.codvend <> 124 and pedido.codvend <> 95 and pedido.codvend <> 120 and pedido.codvend <> 108 and ped_transf <> 'OK' and codcliente <> 1708 and codcliente <> 27985 and codcliente <> 40030) and codemp <> 14 and modelo_ped <> 'ATA' and modelo_ped <> 'DST' and modelo_ped <> 'RDST' and modelo_ped <> 'RDD' and modelo_ped <> 'DSTE' ", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
		$databary[$i] = $prod->showcampo0();
		$databaryp[$i] = $prod->showcampo1();
		$databarx[$i] = $i;
		$vt = $vt + $databary[$i];
		$vtp = $vtp + $databaryp[$i];
		#echo("$i - $databarx[$i] - $databary[$i]<br>");

		$arq[$mes] .= "databary[$i]=$databary[$i]&";
	 }
	 
	 // PEDIDOS QUE NAO FORAM LIBERADOS PARA MONTAGEM
	 	 for($i = 0; $i <= 31; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
		#$databary[$i] = 0;
		$prod->listProdSum("SUM( vpv ), SUM(vpp)","pedido", "dataped like '$ano-$u1-$u%' and cancel <>  'OK' and inicio_sep = 'NO' and (pedido.codvend <> 124 and pedido.codvend <> 95 and pedido.codvend <> 120 and pedido.codvend <> 108 and ped_transf <> 'OK' and codcliente <> 1708 and codcliente <> 27985 and codcliente <> 40030) and codemp <> 14 and modelo_ped <> 'ATA' and modelo_ped <> 'DST'  and modelo_ped <> 'RDST' and modelo_ped <> 'RDD' and modelo_ped <> 'DSTE'", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
		$databary1[$i] = $prod->showcampo0();
		$databaryp1[$i] = $prod->showcampo0();
		#echo("$i - $databarx[$i] - $databary[$i]<br>");
		$vtc = $vtc + $databary1[$i];
		$vtc1 = $vtc1 + $databaryp1[$i];
		$arq1[$mes] .= "databary1[$i]=$databary1[$i]&";
	 }
		
		$vvt = $vt + $vtc;
	 	$vpt = $vtp + $vtc1;
		$values .= "mes=$mes&ano=$ano&vvt=$vvt&vpt=$vpt";

#$GLOBALS["arq"] = $arq;
#echo("$arq[$k]");
 

echo("
<img src='bartutex12a.php?$arq[$mes]$arq1[$mes]$values'>

");

}
?>
