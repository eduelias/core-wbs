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
|  arquivo:     start_saci_admin_index.php
|  template:    saci_admin_index.htm
+--------------------------------------------------------------
*/


// categoria
$prod->clear();
$prod->listProdSum("saci_cat.idcat, saci_cat.titulo", "saci_cat", "saci_cat.habilitado = 'S' AND saci_cat.tipo = 'EXT'", $arrayx, $array_campox, "ORDER BY saci_cat.titulo");
for($i = 0; $i < count($arrayx); $i++ ){
    $prod->mostraProd( $arrayx, $array_campox, $i);

    $cat_id[$i] = $prod->showcampo0();
    $cat_titulo[$i] = $prod->showcampo1();

    // subcategoria
    $prod->clear();
    $prod->listProdSum("saci_subcat.idsubcat, saci_subcat.titulo", "saci_subcat", "saci_subcat.idcat = '$cat_id[$i]' AND saci_subcat.habilitado = 'S'", $array1, $array_campo1, "ORDER BY saci_subcat.titulo");
    for($j = 0; $j < count($array1); $j++ ){
        $prod->mostraProd( $array1, $array_campo1, $j);

        $subcat_subid[$i][$j] = $prod->showcampo0();
        $subcat_titulo[$i][$j] = $prod->showcampo1();

        $x_subcat_subid[$i] .= "'".$subcat_subid[$i][$j]."', ";
        $x_subcat_titulo[$i] .= "'".$subcat_titulo[$i][$j]."', ";
    }// FOR

$sub_array[$i] = $j;
$x_subcat_subid[$i] .= "''";
$x_subcat_titulo[$i] .= "''";

}// FOR


// atendimento
$prod->clear();
$prod->listProdU("codcliente, codcat, codsubcat, codbarraped, contato, dddtel, tel, dtatendinicio, dtagenda, hratend, solucao, solucaostatus, tipo, obs, status, hist, humor","saci_atend", "codatend='$codatendselect'");

$codcliente_view = $prod->showcampo0();
$codcat_view = $prod->showcampo1();
$codsubcat_view = $prod->showcampo2();
$codbarraped_view = $prod->showcampo3();
$contato_view = $prod->showcampo4();
$dddtel_view = $prod->showcampo5();
$tel_view = $prod->showcampo6();
$dtatendinicio_view = $prod->showcampo7();
$dtagenda_view = $prod->showcampo8();
$hratend_view = $prod->showcampo9();
$solucao_view = $prod->showcampo10();
$solucaostatus_view = $prod->showcampo11();
$tipo_view = $prod->showcampo12();
$obs_view = $prod->showcampo13();
$status_view = $prod->showcampo14();
$hist_view = $prod->showcampo15();
$humor_view = $prod->showcampo16();
if ($humor_view == "0") {
    $humor1_view = "icon_biggrin";
    $humor2_view = "Satisfeito";
}
if ($humor_view == "1") {
    $humor1_view = "icon_neutral";
    $humor2_view = "Normal";
}
if ($humor_view == "2") {
    $humor1_view = "icon_mad";
    $humor2_view = "Insatisfeito";
}

// DATA ATEND
$frmdatadd_atend = substr($dtagenda_view, 8, 2);
$frmdatamm_atend = substr($dtagenda_view, 5, 2);
$frmdataaaaa_atend = substr($dtagenda_view, 0, 4);
$frmdata_atend = "$frmdatadd_atend/$frmdatamm_atend/$frmdataaaaa_atend";

// solucao status
if ($solucaostatus_view == "OK") {
    $solucaostatus2_view = "Solucionado";
}
if ($solucaostatus_view == "NO") {
    $solucaostatus2_view = "Não Solucionado";
}

// Status
if ($status_view == "0") {
    $status2_view = "Aberto";
}
if ($status_view == "1") {
    $status2_view = "Fechado";
}
if ($status_view == "2") {
    $status2_view = "Cancelado Cliente";
}
if ($status_view == "3") {
    $status2_view = "Cancelado Operador";
}

// Consulta Motivo
$prod->clear();
$prod->listProdU("titulo, tipo","saci_cat", "idcat='$codcat_view'");
$titulocat_view = $prod->showcampo0();
$tipointext_view = $prod->showcampo1();

//echo "titulocat_view = $titulocat_view<br>";

if ($tipointext_view == "INT") {
    $tipointext2_view = "Interno";
}
if ($tipointext_view == "EXT") {
    $tipointext2_view = "Externo";
}

// Consulta Submotivo
$prod->clear();
$prod->listProdU("titulo","saci_subcat", "idsubcat='$codsubcat_view'");
$titulosubcat_view = $prod->showcampo0();

//echo "titulosubcat_view = $titulosubcat_view<br>";

// Consulta Nome do Cliente
$prod->clear();
$prod->listProdU("nome, endereco, bairro, cep, numero, complemento, tipocliente, cpf, cnpj, dddtel1, tel1","clientenovo", "codcliente='$codcliente_view'");
$nomecliente_view = $prod->showcampo0();
$endereco_view = $prod->showcampo1();
$bairro_view = $prod->showcampo2();
$cep_view = $prod->showcampo3();
$numero_view = $prod->showcampo4();
$complemento_view = $prod->showcampo5();
$tipocliente_view = $prod->showcampo6();
$cpf_view = $prod->showcampo7();
$cnpj_view = $prod->showcampo8();
$dddtel1_view = $prod->showcampo9();
$tel1_view = $prod->showcampo10();

if ($tipocliente_view == "F") {
    $doccliente = $cpf_view;
}
if ($tipocliente_view == "J") {
    $doccliente = $cnpj_view;
}

// status
$prod->clear();
$prod->listProdSum("codstatus, datahorastatus, status, login", "saci_atend_status", "codatend = '$codatendselect'", $array6, $array_campo6, "ORDER BY codstatus");
for($i = 0; $i < count($array6); $i++ ){
    $prod->mostraProd( $array6, $array_campo6, $i);

    $codstatus_view[$i] = $prod->showcampo0();
    $dthrstatus_view[$i] = $prod->showcampo1();
    $statusstatus_view[$i] = $prod->showcampo2();
    $loginstatus_view[$i] = $prod->showcampo3();

    if ($statusstatus_view[$i]== "0") {
        $statusstatus2_view[$i] = "ABERTO";
    }
    if ($statusstatus_view[$i]== "1") {
        $statusstatus2_view[$i] = "EDITADO";
    }
    if ($statusstatus_view[$i]== "2") {
        $statusstatus2_view[$i] = "CANCELADO";
    }
    if ($statusstatus_view[$i]== "3") {
        $statusstatus2_view[$i] = "FINALIZADO";
    }
}

// HIST N ou S
if ($hist_view == "N") {
    include ("templates/saci_infohelp_edit.htm");
}
if ($hist_view == "S") {
    include ("templates/saci_infohelp_view.htm");
}

?>
