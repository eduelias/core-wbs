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
    <td width='10%' colspan='8' align='center'><b><font size='1' face='Verdana'>
    ESTOQUE</font></b></td>
  </tr>
  <tr>
    <td width='40%' align='center'>&nbsp;</td>
	<td width='15%' align='center'><b><font size='1' face='Verdana'>GIRO<br>
    |15|30|45|ME|</font></b></td>
    <td width='5%' align='center' bgcolor='#0066FF'><b><font size='1' face='Verdana'>QTDE<br>
    COMP</font></b></td>
    <td width='5%' align='center' bgcolor='#FF6633'><b><font face='Verdana' size='1'>SALDO<br />
    REAL</font></b></td>
    <td width='5%' align='center' bgcolor='#FFFFFF'><b><font face='Verdana' size='1'>SALDO<br />
    SIS</font></b></td>
    <td width='5%' align='center' bgcolor='#FFCC33'><b><font size='1' face='Verdana'>QTDE<br />
    REAL</font></b></td>
    <td width='5%' align='center'><b><font size='1' face='Verdana'>QTDE<br />
      SIS
    </font></b></td>
    <td width='10%' align='center' bgcolor='#FFCC33'><span class='style1'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font size='1' face='Verdana'>RESERVA<br />
REAL</font></font></span></td>
    <td width='5%' align='center' bgcolor='#FFFFFF'><b><font size='1' face='Verdana'>RESERVA<br />
SIS </font></b></td>
	<td width='5%' align='center' bgcolor='#FFFFFF'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF6600'>ALARM</font></td>
	<td width='10%' align='center' bgcolor='#66CC66'><b><font size='1' face='Verdana'>VALOR <br>
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
			
			/*
			// ESTOQUE MINIMO
			$prod->listProdU("estoquemin", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$qtdemin = $prod->showcampo0();
			

			// CALCULA TODO O ESTOQUE
			$prod->listProdU("SUM(qtde)", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$qtde = $prod->showcampo0();

			$prod->listProdU("SUM(reserva)", "estoque" , "codprod = $codprod and codemp = $codempselect");
			$reserva = $prod->showcampo0();
			*/
			
			if ($codempselect == 15){$cond = "(codemp = 14 or codemp = 15)";}else{$cond = "(codemp = $codempselect)";}
			
			// ESTOQUE MINIMO
			$prod->listProdU("SUM(qtde-reserva) as est , SUM(reserva), estoquemin, SUM(qtde)", "estoque" , "codprod = $codprod and ".$cond." GROUP by codprod");
			$estoque_sis = $prod->showcampo0();
			$reserva_sis = $prod->showcampo1();
			$qtdemin_sis = $prod->showcampo2();
			$qtde_sis = $prod->showcampo3();
			
			
						
			
			// VERIFICA QUANTIDADES DESSE PRODUTO QUE ESTAO EM PEDIDOS NAO CANCELADOS = RESERVA
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and ".$cond." and pedidoprod.codped=pedido.codped and codcb = '' and pedido.cancel <>'OK'");
			$qtdevend_usado = $prod->showcampo0();
			

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("COUNT(*)", "codbarra", "codprod = $codprod and ".$cond." and codbarraped <> 1 and tipo_fab <> 'P'");
			$qtdebarra_livre = $prod->showcampo0();

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			//$prod->listProdU("SUM(qtdecomp)", "ocprod ", "codprod = $codprod and ".$cond." and cb <> 'OK' ");
			//$qtdecomp = $prod->showcampo0();
 			
			if ($codempselect == 15){$cond1 = "(ocprod.codemp = 14 or ocprod.codemp = 15)";$cond2 = " and codped_transf = 0";}else{$cond1 = "(ocprod.codemp = $codempselect)";$cond2 = "";}
			
			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod, oc", "codprod = $codprod and ".$cond1." and hist <>1 and oc.codoc=ocprod.codoc and tipo_nf <> 'P'".$cond2);
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
			
			
			if ($codempselect == 15){$cond3 = " and ped_transf <> 'OK'";}else{$cond3 = "";}
			

			// VERIFICA QUANTIDADES DESSE PRODUTO QUE FORAM VENDIDOS
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and ".$cond." and pedidoprod.codped=pedido.codped and codcb <> '' and pedido.cancel <>'OK' and dataped <'$datacur' and dataped > '$data15' ".$cond3);
			$qtdevend_usado15 = $prod->showcampo0();

			// VERIFICA QUANTIDADES DESSE PRODUTO QUE FORAM VENDIDOS
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and ".$cond." and pedidoprod.codped=pedido.codped and codcb <> '' and pedido.cancel <>'OK' and dataped <'$data15' and dataped > '$data30' ".$cond3);
			$qtdevend_usado30 = $prod->showcampo0();

			// VERIFICA QUANTIDADES DESSE PRODUTO QUE FORAM VENDIDOS
			$prod->listProdU("SUM(qtde)", "pedidoprod, pedido", "codprod = $codprod and ".$cond." and pedidoprod.codped=pedido.codped and codcb <> '' and pedido.cancel <>'OK' and dataped <'$data30' and dataped > '$data45' ".$cond3);
			$qtdevend_usado45 = $prod->showcampo0();

// CALCULO DO GIRO		
$qtdevend_media = ($qtdevend_usado15 + $qtdevend_usado30 + $qtdevend_usado45)/45;
$qtdevend_mediaf = number_format($qtdevend_media,2,',','.'); 



$cor ="#D9F9DA";
$alarm ="";

#$res = ($qtdevend_usado + $qtdevend_reserva)-$qtdeped_fechado;
#$est = ($qtderec)-$qtdeped_fechado;
$est_real = ($qtdebarra_livre)-$qtdevend_usado;


if ($codemp == 1 or $codemp == 15){
#$valor_est = ($est_real*$pvvcj)/1.4;
$valor_est = ($estoque_sis*$pvvcj)/1.4;
}else{
$valor_est = ($estoque_sis*$pvvcj)/1.21;
#$valor_est = ($est_real*$pvvcj)/1.21;
}

if ($valor_est < 0 ){$valor_est=0;}
$valor_estf = number_format($valor_est,2,',','.'); 


if (($estoque_sis) < $qtdemin_sis){$cor ="#F2E4C4"; $alarm = "E.C.";}
if (($estoque_sis) < 0){$cor="#F7BBC4"; $alarm = "S.E.";} // SEM ESTOQUE
if (($estoque_sis) == $qtdemin_sis){$cor ="#FFFFEA"; $alarm = "E.L.";}
#if ($qtdecomp <> $qtderec){$cor="#D4D4D4";}
#if ($qtdecomp <> $qtderec){$cor="#D4D4D4";}
if ($qtdecomp == 0){$cor="#FFFFFF";}


if ($qtdevend_media <> 0 or $estoque_sis <> 0 or $qtdecomp <>0){

echo("
    <tr bgcolor ='$cor'>
    <td width='40%'><font size='1' face='Verdana'><b>$codprod - $nomeprod</b></font></td>
	<td width='15%'><font size='1' face='Verdana'>| $qtdevend_usado15 | $qtdevend_usado30 | $qtdevend_usado45 | <b>$qtdevend_mediaf</b> | </font></td>
    <td width='5%' align='center' bgcolor='#0066FF'><font size='1' face='Verdana'>$qtdecomp</font></td>
	<td width='5%' align='center' bgcolor='#FF6633'><font face='Verdana' size='1'><b>$est_real</B></font></td>
    <td width='5%' align='center' bgcolor='#FFFFFF'><font face='Verdana' size='1'>$estoque_sis</font></td>
    <td width='0%' align='center' bgcolor='#FFCC33'><font size='1' face='Verdana'><b>$qtdebarra_livre</B></font></td>
    <td width='0%' align='center'><font size='1' face='Verdana'>$qtde_sis</font></td>
    <td width='10%' align='center' bgcolor='#FFCC33'><font size='1' face='Verdana'>$qtdevend_usado</font></td>
    <td width='5%' align='center' bgcolor='#FFFFFF'><font size='1' face='Verdana'>$reserva_sis</font></td>
    <td width='5%' align='center' bgcolor='#FFFFFF'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF6600'>$alarm</font></td>
    <td width='10%' align='center' bgcolor='#66CC66'><font size='1' face='Verdana'>$valor_estf</font></td>
  </tr>

");

	$valor_est_total = $valor_est_total + $valor_est;	
		
		}
		
}//if

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
