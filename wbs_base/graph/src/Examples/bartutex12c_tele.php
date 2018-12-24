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



 if (strlen($mes)==1){$u1 = '0'.$mes;}else{$u1 = $mes;}
	 for($i = 1; $i <= 31; $i++ ){
		 if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
		$databary[$i] = 0;
		$prod->listProdSum("COUNT(*)","orc", "dataped like '$ano-$u1-$u%' AND (codvend = 52 OR codvend = 119 OR codvend = 111)", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
		$databary[$i] = $prod->showcampo0();
		$databarx[$i] = $i;
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arq[$mes] .= "databary[$i]=$databary[$i]&";
	 }

		$values .= "mes=$mes&ano=$ano";

#$GLOBALS["arq"] = $arq;
#echo("$arq[$k]");
 

echo("
<img src='bartutex12a.php?$arq[$mes]$values'> 

");

}
?>