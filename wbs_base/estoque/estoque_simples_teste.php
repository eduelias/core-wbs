<?php

require("../classprod.php" );

#$codempselect = 1;
$codempselect = $codemp;

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
    <td width='40%' align='center'>&nbsp;</td>
	<td width='15%' align='center'><b><font size='1' face='Verdana'>GIRO<br>
    |15|30|45|ME|</font></b></td>
    <td width='5%' align='center'><b><font size='1' face='Verdana'>QTDE<br>
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
		$prod->listProdSum("codprod, nomeprod, pvvcj ", "produtos", "unidade not like 'CJ' and hist <> 'Y'", $array, $array_campo, "order by nomeprod" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$pvvcj = $prod->showcampo2();
			$nomeprod= strtoupper($nomeprod);

			// ESTOQUE MINIMO
			$prod->listProdU("estoquemin", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$qtdemin = $prod->showcampo0();
			

			// CALCULA TODO O ESTOQUE
			$prod->listProdU("SUM(qtde)", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$qtde = $prod->showcampo0();

			$prod->listProdU("SUM(reserva)", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$reserva = $prod->showcampo0();

			/*
			// VERIFICA QUANTIDADES DESSE PRODUTO QUE ESTAO EM PEDIDOS NAO CANCELADOS = RESERVA
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and codcb = '' and pedido.cancel <>'OK'");
			$qtdevend_usado = $prod->showcampo0();
			*/

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
			// CALCULO DE DATAS
			$prod->listProdMY("DATE_FORMAT(NOW() - INTERVAL 15 DAY, '%Y-%m-%d')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data15 = $prod->showcampo0();
			
			$prod->listProdMY("DATE_FORMAT(NOW() - INTERVAL 30 DAY, '%Y-%m-%d')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data30 = $prod->showcampo0();

			$prod->listProdMY("DATE_FORMAT(NOW() - INTERVAL 45 DAY, '%Y-%m-%d')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data45 = $prod->showcampo0();
			
			
			$prod->listProdMY("CURDATE()", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$datacur = $prod->showcampo0();

			// VERIFICA QUANTIDADES DESSE PRODUTO QUE FORAM VENDIDOS
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and codcb <> '' and pedido.cancel <>'OK' and dataped <'$datacur' and dataped > '$data15'");
			$qtdevend_usado15 = $prod->showcampo0();

			// VERIFICA QUANTIDADES DESSE PRODUTO QUE FORAM VENDIDOS
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and codcb <> '' and pedido.cancel <>'OK' and dataped <'$data15' and dataped > '$data30'");
			$qtdevend_usado30 = $prod->showcampo0();

			// VERIFICA QUANTIDADES DESSE PRODUTO QUE FORAM VENDIDOS
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and codcb <> '' and pedido.cancel <>'OK' and dataped <'$data30' and dataped > '$data45'");
			$qtdevend_usado45 = $prod->showcampo0();

		
$qtdevend_media = ($qtdevend_usado15 + $qtdevend_usado30 + $qtdevend_usado45)/45;
$qtdevend_mediaf = number_format($qtdevend_media,2,',','.'); 

$cor ="#D9F9DA";
$alarm ="";

$res = ($qtdevend_usado + $qtdevend_reserva)-$qtdeped_fechado;
$est = ($qtderec)-$qtdeped_fechado;
$est_real = ($qtdebarra_livre)-$reserva;
$estoque = $qtde - $reserva;

if ($codemp == 1){
$valor_est = ($est_real*$pvvcj)/1.4;
}else{
$valor_est = ($est_real*$pvvcj)/1.21;
}

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
    <td width='40%'><font size='1' face='Verdana'><b>$codprod - $nomeprod</b></font></td>
	<td width='15%'><font size='1' face='Verdana'>| $qtdevend_usado15 | $qtdevend_usado30 | $qtdevend_usado45 | <b>$qtdevend_mediaf</b> | </font></td>
    <td width='5%' align='center'><font size='1' face='Verdana'>$qtdecomp</font></td>
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
