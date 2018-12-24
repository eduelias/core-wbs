<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	
echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellpadding='2' height='43'>
   <tr>
      <td width='479' height='14' bgcolor='#FFFFFF' colspan='2'><font size='2' face='Verdana'><b><font color='#008080'>COD.
        PEDIDO:</font> $codbarra_pedref</b></font></td>
      <td width='45' height='14' bgcolor='#FFFFFF'>&nbsp;</td>
    </tr>

    <tr>
      <td width='327' height='14' bgcolor='#008080'><font size='1' face='Verdana' color='#FFFFFF'><b>NOME
        PRODUTO</b></font></td>
      <td width='152' height='14' bgcolor='#008080'><font size='1' face='Verdana' color='#FFFFFF'><b>CODBARRA</b></font></td>
      <td width='45' height='14' bgcolor='#008080'><font size='1' face='Verdana' color='#FFFFFF'><b>QTDE</b></font></td>
    </tr>
");


// ACOES PRINCIPAIS DA PAGINA

		 $prod->clear();
	     $prod->listProdU("codped, codemp","pedido", "codbarra = '$codbarra_pedref'");
	     $codped_t = $prod->showcampo0();
	     $codemp_t = $prod->showcampo1();


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, codcb, qtde", "pedidoprod", "codped = '$codped_t' ", $array, $array_campo, "order by codprod");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codprod = $prod->showcampo0();
			$codcb = $prod->showcampo1();
			$qtde = $prod->showcampo2();

			$prod->listProdU("nomeprod", "produtos", "codprod = $codprod");
			$nomeprod = $prod->showcampo0();
			
			$codcb_array = explode(":", $codcb);
			
		

			
			for($o = 0; $o < count($codcb_array); $o++ ){

			$prod->listProdU("codbarra", "codbarra", "codcb = '$codcb_array[$o]'");
			$codbarra = $prod->showcampo0();

			echo("
			<tr>
      <td width='327' height='17' bgcolor='#DCF5E7'><font size='1' face='Verdana'><b>$codprod
        </b>- $nomeprod</font></td>
      <td width='152' height='17' bgcolor='#DCF5E7'><font size='1' face='Verdana'><b>$codbarra</b></font></td>
      <td width='45' height='17' bgcolor='#DCF5E7'><font size='1' face='Verdana'>1</font></td>
    </tr>
");
			}//FOR O

		} //FOR I

echo(" 
</table>
  </center>
</div>
");