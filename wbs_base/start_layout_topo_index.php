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
|  arquivo:     start_layout_topo_index.php
|  template:    start_layout_topo.htm
+--------------------------------------------------------------
*/

// Calcula tempo de processamento da pagina - inicio
$d_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());

// $codgrp = 2;

// ACOES PRINCIPAIS DA PAGINA

// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
$prod->listProdSum("codmenu, menu, image", "seguranca_menu", "", $array_menu, $array_campo_menu, "ORDER BY codmenu");

for($i = 0; $i < count($array_menu); $i++ ){

	$prod->mostraProd( $array_menu, $array_campo_menu, $i );

	// DADOS //
	$codmenu[$i] = $prod->showcampo0();
	$menu[$i] = $prod->showcampo1();
	$image[$i] = $prod->showcampo2();

	$div_name[$i] = "popup".$menu[$i]."Items";
	$div_name_m[$i] = "popup".$menu[$i];
	
 	$prod->listProdSum("seguranca.codpg, nomem, arquivo, actionpg, novo", "segurancaacesso,seguranca", "codmenu=$codmenu[$i] AND codgrp = '$codgrp' AND actionpg = 'S' AND visivel = 'S' AND habilitado = 'S' AND segurancaacesso.codpg=seguranca.codpg", $array_menu1, $array_campo_menu1, "ORDER BY nomem");

	for($j = 0; $j < count($array_menu1); $j++ ){

		$prod->mostraProd( $array_menu1, $array_campo_menu1, $j );

		// DADOS //
		$codpg_menu[$i][$j] = $prod->showcampo0();
		$nomem_menu[$i][$j] = $prod->showcampo1();
		$arquivo_menu[$i][$j] = $prod->showcampo2();
		$actionpg_menu[$i][$j] = $prod->showcampo3();
		$novo_menu[$i][$j] = $prod->showcampo4();
		
	}//FOR
	$sub_array[$i] = $j;
}//FOR

// SELECIONA PAGINA PARA REDIRECIONAMENTO
$prod->clear();
$prod->listProdU("codpg","seguranca", "arquivo='iniciomsg.php'");
$pg_sel = $prod->showcampo0();

// Verifica msg
$prod->clear();
$prod->listProdSum("COUNT(*)", "msg", "codvend = '$codvend' and status = 'NO'", $array78, $array_campo78, "" );
$prod->mostraProd($array78, $array_campo78, 0 );
$cont78 = $prod->showcampo0();

if ($cont78 > 0 )
{
	$img_msg = "images/msg_nova.gif";
}
else
{
	$img_msg = "images/msg.gif";
}

// Chama template
include("templates/start_layout_topo.htm");

?>
