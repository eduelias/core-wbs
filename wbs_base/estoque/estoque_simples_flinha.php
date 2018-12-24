<?php

require("../classprod.php" );

$codempselect = 1;

// INICIO DA CLASSE
$prod = new operacao();

		#echo("cb=$codped");

echo("
<html>

<head>
<meta http-equiv='Content-Language' content='pt-br'>
<meta name='GENERATOR' content='Microsoft FrontPage 5.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<title>Nova pagina 1</title>
</head>

<body>

<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber1'>
  <tr>
    <td width='53%' align='center'><b><font size='1' face='Verdana'>NOME PROD</font></b></td>
    <td width='10%' align='center' ><b><font size='1' face='Verdana'>OC</font></b></td>
    <td width='10%' colspan='4' align='center'><b><font size='1' face='Verdana'>
    ESTOQUE</font></b></td>
  </tr>
  <tr>
    <td width='50%' align='center'>&nbsp;</td>
    <td width='10%' align='center'><b><font size='1' face='Verdana'>QTDE<br>
    COMP</font></b></td>
    <td width='10%' align='center'><b><font face='Verdana' size='1'>ESTOQUE<br>
    OK</font></b></td>
    <td width='10%' align='center'><b><font size='1' face='Verdana'>QTDE <br>
    ESTOQUE</font></b></td>
    <td width='10%' align='center'><b><font size='1' face='Verdana'>QTDE <br>
    RESERVA</font></b></td>
	<td width='10%' align='center'><b><font size='1' face='Verdana'>VALOR <br>
    ESTOQUE</font></b></td>
  </tr>

");



			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, pvvcj, hist", "produtos", "unidade not like 'CJ' and hist = 'Y'", $array, $array_campo, "order by nomeprod" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$pvvcj = $prod->showcampo2();
			$hist = $prod->showcampo3();
    		$nomeprod= strtoupper($nomeprod);

			// ESTOQUE MINIMO
			$prod->listProdU("estoquemin", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$qtdemin = $prod->showcampo0();
			

			// CALCULA TODO O ESTOQUE
			$prod->listProdU("SUM(qtde)", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$qtde = $prod->showcampo0();

			$prod->listProdU("SUM(reserva)", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$reserva = $prod->showcampo0();

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("COUNT(*)", "codbarra", "codprod = $codprod and codemp=$codempselect and codbarraped <> 1");
			$qtdebarra_livre = $prod->showcampo0();

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod ", "codprod = $codprod and ocprod.codemp=$codempselect and cb <> 'OK'");
			$qtdecomp = $prod->showcampo0();
 /*
			
			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtderec)", "ocprod, oc", "codprod = $codprod and ocprod.codemp=$codempselect and hist=1 and oc.codoc=ocprod.codoc");
			$qtderec = $prod->showcampo0();
			
	*/		
		
$cor ="#D9F9DA";
$alarm ="";

$res = ($qtdevend_usado + $qtdevend_reserva)-$qtdeped_fechado;
$est = ($qtderec)-$qtdeped_fechado;
$est_real = ($qtdebarra_livre)-$reserva;
$estoque = $qtde - $reserva;

$valor_est = ($est_real*$pvvcj)/1.4;
if ($valor_est < 0 ){$valor_est=0;}
$valor_estf = number_format($valor_est,2,',','.'); 


if (($qtde - $reserva) < $qtdemin){$cor ="#F2E4C4"; $alarm = "E.C.";}
if (($qtde - $reserva) < 0){$cor="#F7BBC4"; $alarm = "S.E.";} // SEM ESTOQUE
if (($qtde - $reserva) == $qtdemin){$cor ="#FFFFEA"; $alarm = "E.L.";}
if ($qtdecomp <> $qtderec){$cor="#D4D4D4";}
if ($qtdecomp <> $qtderec){$cor="#D4D4D4";}
if ($qtdecomp == 0){$cor="#FFFFFF";}




echo("
 <tr bgcolor ='$cor'>
    <td width='50%'><font size='1' face='Verdana'><b>$codprod - $nomeprod</b></font></td>
    <td width='10%' align='center'><font size='1' face='Verdana'>$qtdecomp</font></td>
	<td width='10%' align='center'><font face='Verdana' size='1'><b>$est_real</B> | $estoque</font></td>
    <td width='10%' align='center'><font size='1' face='Verdana'><b>$qtdebarra_livre</B> | $qtde</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF6600'> | $alarm</font></td>
    <td width='10%' align='center'><font size='1' face='Verdana'>$reserva</font></td>
    <td width='10%' align='center'><font size='1' face='Verdana'>$valor_estf</font></td>
  </tr>

");

	$valor_est_total = $valor_est_total + $valor_est;	
		
		}

		$valor_est_totalf = number_format($valor_est_total,2,',','.'); 

echo("

<table border='1' width='100%'>
  <tr>
    <td width='64%'><b><font size='3' face='Verdana'>VALOR TOTAL</font></b></td>
    <td width='36%'>
      <p align='right'><b><font size='3' face='Verdana'>$valor_est_totalf</font></b></td>
  </tr>
</table>

</table>

</body>

</html>

");

?>
