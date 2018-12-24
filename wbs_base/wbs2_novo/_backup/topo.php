<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:	topo.php
|  template:    layout_topo.php
+--------------------------------------------------------------
*/

// Calcula tempo de processamento da pagina - inicio
$d_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());

//require("../classprod.php");

$codgrp = 2;

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA

// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
$prod->listProdSum("codmenu, menu", "seguranca_menu", "", $array, $array_campo, "ORDER BY menu");

for($i = 0; $i < count($array); $i++ ){

	$prod->mostraProd( $array, $array_campo, $i );

	// DADOS //
	$codmenu[$i] = $prod->showcampo0();
	$menu[$i] = $prod->showcampo1();

	$div_name[$i] = "popup".$menu[$i]."Items";
	$div_name_m[$i] = "popup".$menu[$i];

	$prod->listProdSum("seguranca.codpg, nomem, arquivo, actionpg", "segurancaacesso,seguranca", "codmenu=$codmenu[$i] AND codgrp = '$codgrp' AND segurancaacesso.codpg=seguranca.codpg", $array1, $array_campo1, "ORDER BY nomem");

	for($j = 0; $j < count($array1); $j++ ){

		$prod->mostraProd( $array1, $array_campo1, $j );

		// DADOS //
		$codpg[$i][$j] = $prod->showcampo0();
		$nomem[$i][$j] = $prod->showcampo1();
		$arquivo[$i][$j] = $prod->showcampo2();
		$actionpg[$i][$j] = $prod->showcampo3();

	}//FOR

	$sub_array[$i] = $j;

}//FOR

// INCLUI TEMPLATE
include("templates/layout_topo.htm");

?>
