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
|  arquivo:     start_noticias_list.php
|  template:    noticias_list.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // PESQUISAR
	case "Pesquisar" :
        if ($pesqcod <> "") {
    		$condicaopesq = "codpopup = '$pesqcod'";
        }
        if ($pesqtitulo <> "") {
            if ($condicaopesq <> ""){$condicaopesq .=" AND ";}
            $condicaopesq .= "titulo like '%$pesqtitulo%'";
        }
        if ($pesqtipo == "0") {
            if ($condicaopesq <> ""){$condicaopesq .=" AND ";}
            $condicaopesq .= "tipo = '0'";
        }
        if ($pesqtipo == "1") {
            if ($condicaopesq <> ""){$condicaopesq .=" AND ";}
            $condicaopesq .= "tipo = '1'";
        }
        if ($pesqtipo == "2") {
            if ($condicaopesq <> ""){$condicaopesq .=" AND ";}
            $condicaopesq .= "tipo = '2'";
        }
		
		break;

    // HISTÓRICO
	case "Historico" :
        $prod->upProdU("popup", "status = 'HIST'", "codpopup = '$codpopupselect'");
		break;

	// EDITAR
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

        $prod->upProdU("popup", "codgrp = '$frmgrupo', tipo = '$frmtipo', prioridade = '$frmprioridade', titulo = '$frmtitulo', subtitulo = '$frmsubtitulo', datahorainicio = '$frmdatainicio', datahorafim = '$frmdatafim', status = '$frmstatus', conteudo = '$frmconteudo', pg_ini= '$frmpg_ini'", "codpopup = '$codpopupselect'");
		break;

    // GRAVAR
	case "Gravar" :
    	$prod->clear();
    	$prod->setcampo0("");
    	$prod->setcampo1($frmgrupo);
    	$prod->setcampo2($frmtipo);
    	$prod->setcampo3($frmprioridade);
    	$prod->setcampo4($frmtitulo);
    	$prod->setcampo5($frmsubtitulo);
    	//$frmconteudo = str_replace("\r", '', $frmconteudo);
    	//$frmconteudo = str_replace( "\n", '<br />', $frmconteudo);
    	$frmconteudo = htmlentities($frmconteudo);
    	$prod->setcampo6($frmconteudo);
        if (strlen($frmdatainiciodd)==1){$frmdatainiciodd = '0'.$frmdatainiciodd;}else{$frmdatainiciodd = $frmdatainiciodd;}
        if (strlen($frmdatainiciomm)==1){$frmdatainiciomm = '0'.$frmdatainiciomm;}else{$frmdatainiciomm = $frmdatainiciomm;}
    	$frmdatainicio = "$frmdatainicioaaaa-$frmdatainiciomm-$frmdatainiciodd $frmdatainiciohh:$frmdatainiciomin:$frmdatainicioss";
    	$prod->setcampo7($frmdatainicio);
        if (strlen($frmdatafimdd)==1){$frmdatafimdd = '0'.$frmdatafimdd;}else{$frmdatafimdd = $frmdatafimdd;}
        if (strlen($frmdatafimmm)==1){$frmdatafimmm = '0'.$frmdatafimmm;}else{$frmdatafimmm = $frmdatafimmm;}
    	$frmdatafim = "$frmdatafimaaaa-$frmdatafimmm-$frmdatafimdd $frmdatafimhh:$frmdatafimmin:$frmdatafimss";
    	$prod->setcampo8($frmdatafim);
    	$prod->setcampo9($frmstatus);

    	$prod->addProd("popup", $uregpopup);
	break;
}

$prod->clear();
$prod->listProdSum("codpopup, codgrp, tipo, titulo, subtitulo, datahorainicio, datahorafim, status, pg_ini", "popup", "$condicaopesq", $arrayx, $array_campox, "ORDER BY codpopup DESC LIMIT 0,50");
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
	$pg_ini_list[$i] = $prod->showcampo8();
	
	if ($status_list[$i] == "HAB") {
        $status_img_list[$i] = "leg_hab.gif";
    }
	if ($status_list[$i] == "HIST") {
        $status_img_list[$i] = "leg_hist.gif";
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


	if($codgrp_list[$i] == "-1") {
		$nomegrp_list[$i] = "TODOS";
	} else {
		// Pesquisa por nome do grupo
		$prod->clear();
		$prod->listProdU("nomegrp","segurancagrp", "codgrp='$codgrp_list[$i]'");
		$nomegrp_list[$i] = $prod->showcampo0();
	}

}//FOR

include ("templates/noticias_list.htm");

?>
