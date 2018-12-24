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
|  arquivo:     start_noticias_view.php
|  template:    noticias_view.htm
+--------------------------------------------------------------
*/
switch ($Action)
{
	case "Gravar" :
    	$prod->clear();
    	$prod->setcampo0("");
    	$prod->setcampo1($frmcodpopup);
    	$prod->setcampo2($codvend);
    	$prod->setcampo3($datahoraatual);
  
    	$prod->addProd("popup_confirm", $uregpopup);
    	$sucesso = "1";
	break;
}

$prod->listProdU("tipo, titulo, subtitulo, conteudo, codpopup, datahorainicio, datahorafim, pg_ini","popup", "codpopup='$codpopupselect'");

$tipo_view = $prod->showcampo0();
$titulo_view = $prod->showcampo1();
$subtitulo_view = $prod->showcampo2();
$conteudo_view = $prod->showcampo3();

$conteudo_view = html_entity_decode($conteudo_view);

$codpopup_view = $prod->showcampo4();
$datahorainicio_view = $prod->showcampo5();
$datahorafim_view = $prod->showcampo6();
$pg_ini_view = $prod->showcampo7();
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


if($Action == "Gravar")
{
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar ."start_login_page.php?erro=2");
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar ."restrito.php?erro=2");
	#header("Location:". DIR_HOME . "/wbs_base/start_home_index.php");

}else{
	include ("templates/noticias_view.htm");

}

?>
