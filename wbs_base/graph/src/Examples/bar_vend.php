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
    <table border='0' width='600' cellspacing='1'>
      <tr>
        <td width='58%' align='left' colspan='2'><b><font size='2' face='Verdana'>DE
          <!--webbot bot='Validation' B-Value-Required='TRUE'
          I-Maximum-Length='2' --><input type='text' name='dia' size='2' maxlength='2'>/<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='mes' size='2' maxlength='2'>/<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='4' --><input type='text' name='ano' size='4' maxlength='4'>
          ATE <!--webbot bot='Validation' B-Value-Required='TRUE'
          I-Maximum-Length='2' --><input type='text' name='diaf' size='2' maxlength='2'>/<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='mesf' size='2' maxlength='2'>/<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='4' --><input type='text' name='anof' size='4' maxlength='4'></font></b></td>
        <td width='42%'><input type='submit' value='ENVIAR' name='B1'></td>
      </tr>
      <tr>
        <td width='58%' align='left' colspan='2'><b><font size='2' face='Verdana'>DE
          <!--webbot bot='Validation' B-Value-Required='TRUE'
          I-Maximum-Length='2' --><input type='text' name='h' size='2' maxlength='2' value='00'>:<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='m' size='2' maxlength='2' value='00'>:<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='s' size='2' maxlength='2' value='00'>
          ATE <!--webbot bot='Validation' B-Value-Required='TRUE'
          I-Maximum-Length='2' --><input type='text' name='hf' size='2' maxlength='2' value='23'>:<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='mf' size='2' maxlength='2' value='59'>:<!--webbot
          bot='Validation' B-Value-Required='TRUE' I-Maximum-Length='2' --><input type='text' name='sf' size='2' maxlength='2' value='59'>&nbsp;</font></b></td>
        <td width='42%'></td>
      </tr>
      <tr>
        <td width='16%' align='center'><b><font size='2' face='Verdana'>TIPO
          VEND:</font></b></td>
        <td width='42%'><select size='1' name='tipo'>
            <option selected value='V'>VAREJO</option>
            <option value='A'>ATACADO</option>
			<option value='C'>CORPORATIVO</option>
            <option value='R'>REVENDA</option>
          </select></td>
        <td width='42%'></td>
      </tr>
      <tr>
        <td width='16%' align='center'><b><font size='2' face='Verdana'>COD VEND</font></b></td>
        <td width='42%'><font size='2' face='Verdana'><b><input type='text' name='codvendpesq' size='5'></b></font></td>
        <td width='42%'></td>
      </tr>
      <tr>
        <td width='16%' align='center'></td>
        <td width='42%'><select size='1' name='mod'>
            <option selected value='vpp'>VPP (VALOR PEDIDO PRAZO)</option>
            <option value='vpv'>VPV (VALOR PEDIDO À VISTA)</option>
            <option value='vc'>VC ( VALOR CUSTO)</option>
            <option value='mlb'>MLB</option>
            <option value='ef_real'>EFICIÊNCIA REAL</option>
            <option value='ef'>EFICIÊNCIA PEDIDO</option>
          </select></td>
        <td width='42%'></td>
      </tr>
    </table>
    </center>
  </div>
</form>



");

if ($retorno){

// INICIO DA CLASSE
$prod = new operacao();

#if($dia == ""){$dia = "%";}

# if (strlen($mes)==1){$u1 = '0'.$mes;}else{$u1 = $mes;}

		// VENDEDORES
		// 108 - IPASOFT
		// 120 - INFOHELP
		// 124 - GBA
		// 95  - MAXXFORM
		
	
if ($codvend <> ""){
	$condicao1 = " and pedido.codvend = $codvendpesq ";
}else{
	$condicao1 = " AND vendedor.tipo='$tipo'";
}

if ($mod == "ef"){
	$condicao2 = " (SUM(mlb)/SUM(vpv))*1000 ";
}
if ($mod == "ef_real"){
	$condicao2 = " (SUM(mlb_real)/SUM(vpv))*1000 ";
}
if ($mod <> "ef" and $mod <> "ef_real")
{
	$condicao2 = " SUM( $mod )";
}

		
		$prod->listProdSum("nome, $condicao2 ","pedido, vendedor", "pedido.codvend = vendedor.codvend AND dataped > '$ano-$mes-$dia $h:$m:$s' and dataped < '$anof-$mesf-$diaf $hf:$mf:$sf' and cancel <>  'OK' AND (pedido.codvend <> 124 and pedido.codvend <> 95 and pedido.codvend <> 120 and pedido.codvend <> 108)  ".$condicao1, $array, $array_campo , "GROUP  BY pedido.codvend ORDER  BY  `nome`  ASC");
	 for($i = 0; $i < count($array); $i++ ){
		$prod->mostraProd( $array, $array_campo, $i );
		$y[$i] = $prod->showcampo1();
		$x[$i] = $prod->showcampo0();
		#echo("$databarx[$i] - $databary[$i]<br>");

		$arqy[$mes] .= "y[$i]=$y[$i]&";
		$arqx[$mes] .= "x[$i]=$x[$i]&";
		
#echo(" $x[$i] - $y[$i]<br>");

	 }
		$values .= "dia=$dia&mes=$mes&ano=$ano&h=$h&m=$m&s=$s&diaf=$diaf&mesf=$mesf&anof=$anof&hf=$hf&mf=$mf&sf=$sf";

#$GLOBALS["arq"] = $arq;
#echo("$arqx[$k]<br>");
#echo("$arqy[$k]<br>");
	

echo("
<img src='bar_vend_1.php?$arqx[$mes]$arqy[$mes]$values'> 

");

} // RETORNO
?>
