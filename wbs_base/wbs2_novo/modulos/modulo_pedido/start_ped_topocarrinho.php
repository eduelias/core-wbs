<?php

// WBS
// arquivo:		ped_topocarrinho.php
// template:	ped_topocarrinho.htm

// inicio da classe
$prod = new operacao();

// Rotina Default
$prod->listProdSum("codcat, nomecat", "categoria", "", $array_menu, $array_campo_menu, "ORDER BY nomecat");
for ($i = 0; $i < count($array_menu); $i++ )
{
	$prod->mostraProd( $array_menu, $array_campo_menu, $i );
	
	$codcatm[$i] = $prod->showcampo0();
	$nomecatm[$i] = $prod->showcampo1();
	
	$prod->clear();
	$prod->listProdSum("codsubcat, nomesubcat", "subcategoria", "codcat = $codcatm[$i]", $array_menu1, $array_campo_menu1, "ORDER BY nomesubcat");
	
	for ($j = 0; $j < count($array_menu1); $j++ )
	{
		$prod->mostraProd( $array_menu1, $array_campo_menu1, $j );
		
		$codsubcatm[$i][$j] = $prod->showcampo0();
		$nomesubcatm[$i][$j] = $prod->showcampo1();
		
		$codsubcat_alpha[$i] .= "'".$codsubcatm[$i][$j].":".$codcatm[$i]."'".", ";
		$nomesubcat_alpha[$i] .= "'".$nomesubcatm[$i][$j]."'".", ";
	}
	$sub_array[$i] = $j;
	$codsubcat_alpha[$i] .= "''";
	$nomesubcat_alpha[$i] .= "''";
}


	include ("templates/ped_topocarrinho.htm");

?>
