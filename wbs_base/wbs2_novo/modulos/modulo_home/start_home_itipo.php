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
|  arquivo:     start_home_itipo.php
|  template:    home_itipo.htm
+--------------------------------------------------------------
*/

//echo "<b>CODGRP:</b> $codgrp<br>";

switch ($Action)
{
	case "Pesquisar" :
        // pesquisa de acordo com o clicado
        // (codgrp = '$codgrp' OR codgrp = '-1')
        $condicaopesq = "(codgrp like '%:$codgrp:%' OR codgrp like '%:-1:%') AND tipo = '$codtiposelect' AND NOW() > datahorainicio AND datahorafim > NOW()";
        break;
    default :
        // pesquisa normal
        // (codgrp = '$codgrp' OR codgrp = '-1')
        $condicaopesq = "(codgrp like '%:$codgrp:%' OR codgrp like '%:-1:%') AND NOW() > datahorainicio AND datahorafim > NOW()";
        break;
}

//echo "<b>CONDIÇÂO:</b> $condicaopesq<br>";

$prod->clear();
$prod->listProdSum("codpopup, codgrp, tipo, titulo, subtitulo, datahorainicio, datahorafim, status", "popup", "$condicaopesq AND status = 'HAB'", $arrayx, $array_campox, "ORDER BY prioridade DESC, datahorainicio DESC");
for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );

	$codpopup_list[$i] = $prod->showcampo0();
	$codgrp_list[$i] = $prod->showcampo1();
	$tipo_list[$i] = $prod->showcampo2();
	$titulo_list[$i] = $prod->showcampo3();
	$subtitulo_list[$i] = $prod->showcampo4();
	$datainicio_list[$i] = $prod->showcampo5();
	$datafim_list[$i] = $prod->showcampo6();
	$status_list[$i] = $prod->showcampo7();
	
	// TIPO
	if ($tipo_list[$i] == "0") {
        $tipoimg_list[$i] = "btnoticias2";
    }
    if ($tipo_list[$i] == "1") {
        $tipoimg_list[$i] = "btprocedimentos2";
    }
    if ($tipo_list[$i] == "2") {
        $tipoimg_list[$i] = "btptomocoes2";
    }

    // DATA INICIO
    $frmdatainiciodd = substr($datainicio_list[$i], 8, 2);
    $frmdatainiciomm = substr($datainicio_list[$i], 5, 2);
    $frmdatainicioaaaa = substr($datainicio_list[$i], 0, 4);
    $frmdatainiciohh = substr($datainicio_list[$i], 11, 2);
    $frmdatainiciomin = substr($datainicio_list[$i], 14, 2);
    $frmdatainicioss = substr($datainicio_list[$i], 17, 2);
    $datainicio_list[$i] = "$frmdatainiciodd/$frmdatainiciomm/$frmdatainicioaaaa $frmdatainiciohh:$frmdatainiciomin:$frmdatainicioss";

    // DATA FIM
    $frmdatafimdd = substr($datafim_list[$i], 8, 2);
    $frmdatafimmm = substr($datafim_list[$i], 5, 2);
    $frmdatafimaaaa = substr($datafim_list[$i], 0, 4);
    $frmdatafimhh = substr($datafim_list[$i], 11, 2);
    $frmdatafimmin = substr($datafim_list[$i], 14, 2);
    $frmdatafimss = substr($datafim_list[$i], 17, 2);
    $datafim_list[$i] = "$frmdatafimdd/$frmdatafimmm/$frmdatafimaaaa $frmdatafimhh:$frmdatafimmin:$frmdatafimss";

/*
	if($codgrp_list[$i] == "-1") {
		$nomegrp_list[$i] = "TODOS";
	} else {
		// Pesquisa por nome do grupo
		$prod->clear();
		$prod->listProdU("nomegrp","segurancagrp", "codgrp='$codgrp_list[$i]'");
		$nomegrp_list[$i] = $prod->showcampo0();
	}
*/
}// FOR

include ("templates/home_itipo.htm");

?>
