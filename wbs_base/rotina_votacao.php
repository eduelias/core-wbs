<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

require ("classprod.php" );
$udia = date("t");
#$diahoje = date("j");
#$diahoje = 15;
#$login = "joao";
$meta = $metauser/$udia;
$k= $mes;
$g= $mes+1;
#$ano=2004;
#$ano = date("Y");
#$mes = date("n");
#$mes = 4;


// INICIO DA CLASSE
$prod = new operacao();

echo("
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<title>Untitled Document</title>
<style type='text/css'>
<!--
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; }
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; font-weight: bold; }
-->
</style>
</head>

<body>
<table width='740' border='0' align='center' cellpadding='3' cellspacing='3'>
  <tr>
    <td width='40' align='center'><span class='style5'>POS</span></td>
    <td width='500'><span class='style5'>NOME</span></td>
    <td width='100' align='center'><span class='style5'>OK</span></td>
    <td width='100' align='center'><span class='style5'>VOTOS</span></td>
  </tr>
  
  ");


	 $prod->clear();
     $prod->listProdSum("codvend, nome","vendedor", "eleitor = 'S'", $array, $array_campo, "ORDER by nome");
     
     for($i = 0; $i < count($array); $i++ ){

         $prod->mostraProd( $array, $array_campo, $i );
         $codvend = $prod->showcampo0();
         $nome = $prod->showcampo1();

         $prod->clear();
         $prod->listProdU("COUNT(*)", "vot_votos", "codeleitor = '$codvend'");
         $cont = $prod->showcampo0();
         
         $prod->clear();
         $prod->listProdU("COUNT(*)", "vot_votos", "codcandidato = '$codvend'");
         $cont1 = $prod->showcampo0();
         
         $t= $i+1;
 if ($cont == 0){$cor = "#f4f4f4";}else{$cor="#FFFFFF";}
         echo("
  <tr bgcolor = '$cor'>
    <td align='center'><span class='style3'>$t</span></td>
    <td><span class='style3'>$nome</span></td>
    <td align='center'><span class='style3'>$cont</span></td>
    <td align='center'><span class='style3'>$cont1</span></td>
  </tr>
  ");

     }//FOR

echo("
</table>
</body>
</html>
");


?>
