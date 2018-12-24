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

$prod->clear();
$prod->listProdSum("codatend, clientenovo.nome, dtagenda, hratend", "saci_atend, clientenovo", "tipo = 'EXT' AND status = '0' AND hist = 'N' AND saci_atend.codcliente = clientenovo.codcliente", $arrayx, $array_campox, "ORDER BY dtagenda, hratend ASC LIMIT 0,150");

for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );
	
	$codatend_list[$i] = $prod->showcampo0();
	$nomecliente_list[$i] = $prod->showcampo1();
	$dtagenda_list[$i] = $prod->showcampo2();
	$hragenda_list[$i] = $prod->showcampo3();

	// DATA ATEND
    $frmdatadd_atend[$i] = substr($dtagenda_list[$i], 8, 2);
    $frmdatamm_atend[$i] = substr($dtagenda_list[$i], 5, 2);
    $frmdataaaaa_atend[$i] = substr($dtagenda_list[$i], 0, 4);
    $frmdata_atend[$i] = "$frmdatadd_atend[$i]/$frmdatamm_atend[$i]/$frmdataaaaa_atend[$i]";
}

include ("templates/saci_admin_agenda.htm");

?>
