<?php

include ("classprod.php");
$prod = new operacao();

$prod->clear();
$prod->listProdSum("codvend, count(codped)", "orc", "codemp = '1' AND dataped > '2005-05-24 00:00:00'", $arrayx, $array_campox, "GROUP BY codvend");
for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );
	
	$codvendlist[$i] = $prod->showcampo0();
	$qtdeorcvendlist[$i] = $prod->showcampo1();
	
	$prod->clear();
	$prod->listProdU("nome","vendedor", "codvend = '$codvendlist[$i]' and codgrp = '13' and codsuper = '55'");
	$nomevendlist[$i] = $prod->showcampo0();
}

echo "Número de orçamentos realizados a partir do dia 24/05/2005";
echo "<table  border='1' cellspacing='1' cellpadding='1'>";
echo "  <tr>";
//echo "    <td><strong>cod</strong></td>";
echo "    <td><strong>vendedor</strong></td>";
echo "    <td><strong>quantidade</strong></td>";
echo "  </tr>";
for($i = 0; $i < count($arrayx); $i++ ){
echo "  <tr>";
//echo "    <td>$codvendlist[$i]</td>";
echo "    <td>$nomevendlist[$i]</td>";
echo "    <td>$qtdeorcvendlist[$i]</td>";
echo "  </tr>";
}
echo "</table>";

?>
