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
|  arquivo:     start_noticias_add.php
|  template:    noticias_add.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
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
		$prod->setcampo10($frmpg_ini);

    	$prod->addProd("popup", $uregpopup);
    	$sucesso = "1";
	break;
}

$prod->clear();
$prod->listProdSum("codgrp, nomegrp", "segurancagrp", "", $arrayx, $array_campox, "ORDER BY nomegrp ASC");
for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );
	
	$codgrp_list[$i] = $prod->showcampo0();
	$nomegrp_list[$i] = $prod->showcampo1();
}//FOR

include ("templates/noticias_add.htm");

?>
