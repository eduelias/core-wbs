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
|  arquivo:     start_home_ipopup.php
|  template:    home_ipopup.htm
+--------------------------------------------------------------
*/

if ($codpopupselect <> "") {

    $prod->clear();
    $prod->listProdU("tipo, titulo, subtitulo, conteudo, codpopup, datahorainicio, datahorafim","popup", "codpopup='$codpopupselect' AND status = 'HAB'");

    $tipo_view = $prod->showcampo0();
    $titulo_view = $prod->showcampo1();
    $subtitulo_view = $prod->showcampo2();
    $conteudo_view = $prod->showcampo3();

    $conteudo_view = html_entity_decode($conteudo_view);
    
    $codpopup_view = $prod->showcampo4();
    $datahorainicio_view = $prod->showcampo5();
    $datahorafim_view = $prod->showcampo6();
    
    // DATA INICIO
    $frmdatainiciodd = substr($datahorainicio_view, 8, 2);
    $frmdatainiciomm = substr($datahorainicio_view, 5, 2);
    $frmdatainicioaaaa = substr($datahorainicio_view, 0, 4);
    $frmdatainiciohh = substr($datahorainicio_view, 11, 2);
    $frmdatainiciomin = substr($datahorainicio_view, 14, 2);
    $frmdatainicioss = substr($datahorainicio_view, 17, 2);
    $datainicio_view  = "$frmdatainiciodd/$frmdatainiciomm/$frmdatainicioaaaa $frmdatainiciohh:$frmdatainiciomin:$frmdatainicioss";

    // DATA FIM
    $frmdatafimdd = substr($datahorafim_view, 8, 2);
    $frmdatafimmm = substr($datahorafim_view, 5, 2);
    $frmdatafimaaaa = substr($datahorafim_view, 0, 4);
    $frmdatafimhh = substr($datahorafim_view, 11, 2);
    $frmdatafimmin = substr($datahorafim_view, 14, 2);
    $frmdatafimss = substr($datahorafim_view, 17, 2);
    $datafim_view = "$frmdatafimdd/$frmdatafimmm/$frmdatafimaaaa $frmdatafimhh:$frmdatafimmin:$frmdatafimss";

    if($tipo_view == "0") {
        $css1 = "titulo_noticia";
        $css2 = "subtitulo_noticia";
        $css3 = "conteudo_noticia";
        $css4 = "rodape_noticia";
    } elseif($tipo_view == "1") {
        $css1 = "titulo_procedimento";
        $css2 = "subtitulo_procedimento";
        $css3 = "conteudo_procedimento";
        $css4 = "rodape_procedimento";
    } elseif($tipo_view == "2") {
        $css1 = "titulo_promocao";
        $css2 = "subtitulo_promocao";
        $css3 = "conteudo_promocao";
        $css4 = "rodape_promocao";
    }
    include ("templates/home_ipopup.htm");
} else {
    $prod->clear();
    $prod->listProdU("tipo, titulo, subtitulo, conteudo, codpopup, datahorainicio, datahorafim","popup", "(codgrp like '%:$codgrp:%' OR codgrp like '%:-1:%') AND status = 'HAB' AND NOW() > datahorainicio AND datahorafim > NOW() ORDER BY prioridade, datahorainicio");

    $tipo_view = $prod->showcampo0();
    $titulo_view = $prod->showcampo1();
    $subtitulo_view = $prod->showcampo2();
    $conteudo_view = $prod->showcampo3();

    $conteudo_view = html_entity_decode($conteudo_view);

    $codpopup_view = $prod->showcampo4();
    $datahorainicio_view = $prod->showcampo5();
    $datahorafim_view = $prod->showcampo6();

    // DATA INICIO
    $frmdatainiciodd = substr($datahorainicio_view, 8, 2);
    $frmdatainiciomm = substr($datahorainicio_view, 5, 2);
    $frmdatainicioaaaa = substr($datahorainicio_view, 0, 4);
    $frmdatainiciohh = substr($datahorainicio_view, 11, 2);
    $frmdatainiciomin = substr($datahorainicio_view, 14, 2);
    $frmdatainicioss = substr($datahorainicio_view, 17, 2);
    $datainicio_view  = "$frmdatainiciodd/$frmdatainiciomm/$frmdatainicioaaaa $frmdatainiciohh:$frmdatainiciomin:$frmdatainicioss";

    // DATA FIM
    $frmdatafimdd = substr($datahorafim_view, 8, 2);
    $frmdatafimmm = substr($datahorafim_view, 5, 2);
    $frmdatafimaaaa = substr($datahorafim_view, 0, 4);
    $frmdatafimhh = substr($datahorafim_view, 11, 2);
    $frmdatafimmin = substr($datahorafim_view, 14, 2);
    $frmdatafimss = substr($datahorafim_view, 17, 2);
    $datafim_view = "$frmdatafimdd/$frmdatafimmm/$frmdatafimaaaa $frmdatafimhh:$frmdatafimmin:$frmdatafimss";

    if($tipo_view == "0") {
        $css1 = "titulo_noticia";
        $css2 = "subtitulo_noticia";
        $css3 = "conteudo_noticia";
        $css4 = "rodape_noticia";
    } elseif($tipo_view == "1") {
        $css1 = "titulo_procedimento";
        $css2 = "subtitulo_procedimento";
        $css3 = "conteudo_procedimento";
        $css4 = "rodape_procedimento";
    } elseif($tipo_view == "2") {
        $css1 = "titulo_promocao";
        $css2 = "subtitulo_promocao";
        $css3 = "conteudo_promocao";
        $css4 = "rodape_promocao";
    }
    include ("templates/home_ipopup.htm");
}

?>
