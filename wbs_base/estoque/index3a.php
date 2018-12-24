<?php

require("../classprod.php" );

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

<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber1' height='97'>
  <tr>
    <td width='70%' align='center' height='26'><b><font size='1' face='Verdana'>NOME PROD</font></b></td>
    <td width='5%' align='center' height='26'><b><font size='1' face='Verdana'>OC</font></b></td>
    <td width='5%' align='center' height='26'><b><font size='1' face='Verdana'>
    PEDIDO</font></b></td>
    <td width='5%' align='center' height='26'><b><font size='1' face='Verdana'>
    ESTOQUE</font></b></td>
  </tr>
  <tr>
    <td width='70%' align='center' height='26'>&nbsp;</td>
    <td width='5%' align='center' height='26'><b><font face='Verdana' size='1'>CB</font></b></td>
    <td width='5%' align='center' height='26'><b><font size='1' face='Verdana'>QTDE</font></b></td>
    <td width='5%' align='center' height='26'><b><font size='1' face='Verdana'>QTDE</font></b></td>
  </tr>


");



			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod", "produtos", "unidade not like 'CJ' and hist <> 'Y'", $array, $array_campo, "order by nomeprod" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$nomeprod= strtoupper($nomeprod);

						
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

			/*
			$prod->listProdSum("codbarra.codbarra", "codbarra, produtos", "codbarra.codprod = $codprod and codbarra.codemp=$codempselect and codbarra.codped = 0 and codbarra.codprod=produtos.codprod and chkcb ='Y'", $array1, $array_campo1, "" );
			*/
			
			$prod->listProdSum("codbarra", "codbarra", "codprod = $codprod and codemp=$codempselect and codped = 0", $array1, $array_campo1, "" );
 
		
		
		
		
$cor ="#F2F2F2";
$alarm ="";

$est_real = ($qtdebarra_insert)-$qtdevend_usado;

if ($est_real <> 0 ){

echo("
 <tr bgcolor ='$cor'>
    <td width='70%' height='39'><font size='1' face='Verdana'><b>$codprod - $nomeprod<br>
      </b></font>
      <hr size='1'>
");
 for($j = 0; $j < count($array1); $j++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $j );
			
			$codbarra = $prod->showcampo0();
echo("
<font face='Verdana' size='1'>$codbarra</font>

");
 }
 echo("

    </td>
    <td width='5%' align='center' height='39'><font face='Verdana' size='1'>$qtdebarra_insert</font></td>
    <td width='5%' align='center' height='39'><font size='1' face='Verdana'>$qtdevend_usado</font></td>
    <td width='5%' align='center' height='39'><b><font size='1' face='Verdana'>$est_real</font></b></td>
  </tr>


");

		
}
		}

echo("


</table>

</body>

</html>

");

?>
