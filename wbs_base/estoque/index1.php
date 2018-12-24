<?php

require("../classprod.php" );

$codempselect = 2;

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
    <td width='12%' align='center' colspan='3'><b><font size='1' face='Verdana'>OC</font></b></td>
    <td width='15%' colspan='4' align='center'><b><font size='1' face='Verdana'>
    PEDIDO<br>
&nbsp;</font></b></td>
    <td width='20%' colspan='2' align='center'><b><font size='1' face='Verdana'>
    ESTOQUE</font></b></td>
  </tr>
  <tr>
    <td width='53%' align='center'>&nbsp;</td>
    <td width='6%' align='center'><b><font size='1' face='Verdana'>QTDE<br>
    COMP</font></b></td>
    <td width='3%' align='center'><b><font size='1' face='Verdana'>QTDE<br>
    REC</font></b></td>
    <td width='3%' align='center'><b><font face='Verdana' size='1'>CB</font></b></td>
    <td width='3%' align='center'><b><font size='1' face='Verdana'>QTDE<br>
    CBOK</font></b></td>
    <td width='3%' align='center'><b><font face='Verdana' size='1'>CB</font></b></td>
    <td width='5%' align='center'><b><font size='1' face='Verdana'>QTDE<br>
    CBNO</font></b></td>
    <td width='4%' align='center'><b><font face='Verdana' size='1'>PED<br>
    OK</font></b></td>
    <td width='10%' align='center'><b><font size='1' face='Verdana'>QTDE <br>
    ESTOQUE</font></b></td>
    <td width='10%' align='center'><b><font size='1' face='Verdana'>QTDE <br>
    RESERVA</font></b></td>
  </tr>

");



			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod", "produtos", "unidade not like 'CJ' and hist <> 'Y'", $array, $array_campo, "order by nomeprod" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
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
			$prod->listProdU("SUM(qtdecomp)", "ocprod", "codprod = $codprod and codemp=$codempselect ");
			$qtdecomp = $prod->showcampo0();

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtderec)", "ocprod, oc", "codprod = $codprod and ocprod.codemp=$codempselect and hist=1 and oc.codoc=ocprod.codoc");
			$qtderec = $prod->showcampo0();
			
			// VERIFICA QUANTIDADES VENDIDAS DESSE PRODUTO
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and codcb ='' and cancel <> 'OK'");
			$qtdevend_reserva = $prod->showcampo0();

			/*
			// VERIFICA QUANTIDADES VENDIDAS DESSE PRODUTO
			$prod->listProdU("codcb", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and codcb <>'' and cancel <> 'OK'");
			$codcb = $prod->showcampo0();
			$codcb_array = explode(":", $codcb);
			*/


			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("COUNT(*)", "codbarra", "codprod = $codprod and codemp=$codempselect");
			$qtdebarra_insert = $prod->showcampo0();
			
		
			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("COUNT(*)", "codbarra", "codprod = $codprod and codemp=$codempselect and codped <> 0");
			$qtdebarra_usado = $prod->showcampo0();
			$qtdevend_usado = $qtdebarra_usado;

		

			// VERIFICA QUANTIDADES VENDIDAS DESSE PRODUTO
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and pedido.cb = 'OK'");
			$qtdeped_fechado = $prod->showcampo0();
		
$cor ="#D9F9DA";
$alarm ="";

$res_real = ($qtdebarra_insert)-$qtdevend_usado;
$est = ($qtderec)-$qtdeped_fechado;
$est_real = ($qtdebarra_insert)-$qtdevend_usado;


if (($qtde - $reserva) < $qtdemin){$cor ="#F2E4C4"; $alarm = "E.C.";}
if (($qtde - $reserva) < 0){$cor="#F7BBC4"; $alarm = "S.E.";} // SEM ESTOQUE
if (($qtde - $reserva) == $qtdemin){$cor ="#FFFFEA"; $alarm = "E.L.";}
if ($qtdecomp <> $qtderec){$cor="#D4D4D4";}
if ($qtdecomp <> $qtderec){$cor="#D4D4D4";}
if ($qtdecomp == 0){$cor="#FFFFFF";}




echo("
 <tr bgcolor ='$cor'>
    <td width='53%'><font size='1' face='Verdana'><b>$codprod - $nomeprod</b></font></td>
    <td width='6%' align='center'><font size='1' face='Verdana'>$qtdecomp</font></td>
    <td width='3%' align='center'><font size='1' face='Verdana'>$qtderec</font></td>
    <td width='3%' align='center'><font face='Verdana' size='1'>$qtdebarra_insert</font></td>
    <td width='3%' align='center'><font size='1' face='Verdana'>$qtdevend_usado</font></td>
    <td width='3%' align='center'><font face='Verdana' size='1'>$qtdebarra_usado</font></td>
    <td width='5%' align='center'><font size='1' face='Verdana'>$qtdevend_reserva</font></td>
    <td width='4%' align='center'><font face='Verdana' size='1'>$qtdeped_fechado</font></td>
    <td width='10%' align='center'><font size='1' face='Verdana'><b>$qtde</b> | $est_real</font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF6600'> | $alarm</font></b></td>
    <td width='10%' align='center'><font size='1' face='Verdana'><b>$reserva</b> | $qtdevend_reserva</font></td>
  </tr>

");

		
		
		}

echo("


</table>

</body>

</html>

");

?>
