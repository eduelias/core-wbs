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
|  arquivo:     start_noticias_edit.php
|  template:    noticias_edit.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
	case "Editar" :
        // DATA INICIO
        if (strlen($frmdatainiciodd)==1){$frmdatainiciodd = '0'.$frmdatainiciodd;}else{$frmdatainiciodd = $frmdatainiciodd;}
        if (strlen($frmdatainiciomm)==1){$frmdatainiciomm = '0'.$frmdatainiciomm;}else{$frmdatainiciomm = $frmdatainiciomm;}
    	$frmdatainicio = "$frmdatainicioaaaa-$frmdatainiciomm-$frmdatainiciodd $frmdatainiciohh:$frmdatainiciomin:$frmdatainicioss";

        // DATA FIM
        if (strlen($frmdatafimdd)==1){$frmdatafimdd = '0'.$frmdatafimdd;}else{$frmdatafimdd = $frmdatafimdd;}
        if (strlen($frmdatafimmm)==1){$frmdatafimmm = '0'.$frmdatafimmm;}else{$frmdatafimmm = $frmdatafimmm;}
    	$frmdatafim = "$frmdatafimaaaa-$frmdatafimmm-$frmdatafimdd $frmdatafimhh:$frmdatafimmin:$frmdatafimss";

    	// CONTEUDO
        //$frmconteudo = str_replace("\r", '', $frmconteudo);
    	//$frmconteudo = str_replace( "\n", '<br />', $frmconteudo);
    	$frmconteudo = htmlentities($frmconteudo);

        $prod->upProdU("popup", "codgrp = '$frmgrupo', tipo = '$frmtipo', prioridade = '$frmprioridade', titulo = '$frmtitulo', subtitulo = '$frmsubtitulo', datahorainicio = '$frmdatainicio', datahorafim = '$frmdatafim', status = '$frmstatus', conteudo = '$frmconteudo', pg_ini = '$frmpg_ini'", "codpopup = '$codpopupselect'");
        //$sucesso = "1";
        if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
        echo "<meta http-equiv='refresh' content='0;URL=http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=1&tiposucesso=edit'>";
		break;
}

$prod->clear();
$prod->listProdSum("codgrp, nomegrp", "segurancagrp", "", $arrayx, $array_campox, "ORDER BY nomegrp ASC");
for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );

	$codgrp_list[$i] = $prod->showcampo0();
	$nomegrp_list[$i] = $prod->showcampo1();
}//FOR

$prod->clear();
$prod->listProdU("codpopup, codgrp, tipo, titulo, subtitulo, conteudo, datahorainicio, datahorafim, status, prioridade, pg_ini","popup", "codpopup='$codpopupselect'");
$codpopup_edit = $prod->showcampo0();
$codgrp_edit = $prod->showcampo1();
$tipo_edit = $prod->showcampo2();
$titulo_edit = $prod->showcampo3();
$subtitulo_edit = $prod->showcampo4();
$conteudo_edit = $prod->showcampo5();
$datainicio_edit = $prod->showcampo6();
$datafim_edit = $prod->showcampo7();
$status_edit = $prod->showcampo8();
$prioridade_edit = $prod->showcampo9();
$pg_ini_edit = $prod->showcampo10();

// DATA INICIO
$frmdatainiciodd = substr($datainicio_edit, 8, 2);
$frmdatainiciomm = substr($datainicio_edit, 5, 2);
$frmdatainicioaaaa = substr($datainicio_edit, 0, 4);
$frmdatainiciohh = substr($datainicio_edit, 11, 2);
$frmdatainiciomin = substr($datainicio_edit, 14, 2);
$frmdatainicioss = substr($datainicio_edit, 17, 2);

// DATA FIM
$frmdatafimdd = substr($datafim_edit, 8, 2);
$frmdatafimmm = substr($datafim_edit, 5, 2);
$frmdatafimaaaa = substr($datafim_edit, 0, 4);
$frmdatafimhh = substr($datafim_edit, 11, 2);
$frmdatafimmin = substr($datafim_edit, 14, 2);
$frmdatafimss = substr($datafim_edit, 17, 2);

// TIPO DE NOTÍCIA
if ($tipo_edit == "0") {
    $tiposelect_edit = "Notícia";
}
if ($tipo_edit == "1") {
    $tiposelect_edit = "Procedimento";
}
if ($tipo_edit == "2") {
    $tiposelect_edit = "Promoção";
}

// STATUS
if ($status_edit == "HAB") {
    $statusselect_edit = "Habilitado";
}
if ($status_edit == "HIST") {
    $statusselect_edit = "Histórico";
}

// PRIORIDADE
if ($prioridade_edit == "0") {
    $prioridade_show = "Nenhuma";
}
if ($prioridade_edit == "1") {
    $prioridade_show = "Baixa";
}
if ($prioridade_edit == "2") {
    $prioridade_show = "Média";
}
if ($prioridade_edit == "3") {
    $prioridade_show = "Alta";
}

// GRUPO
if($codgrp_edit == "-1") {
	$nomegrp_edit = "TODOS";
} else {
	// Pesquisa por noe do grupo
	$prod->clear();
    $prod->listProdU("nomegrp","segurancagrp", "codgrp='$codgrp_edit'");
    $nomegrp_edit = $prod->showcampo0();
}

include ("templates/noticias_edit.htm");

?>
