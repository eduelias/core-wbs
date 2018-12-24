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
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    	// Pesquisar Cliente
    	case "Pesquisar" :
        $prod->clear();
        $prod->listProdSum("codbarra, dataped, dataentrega, codped", "pedido", "codcliente = '$pesqcodcliente'", $arrayx, $array_campox, "ORDER BY codped ASC");

        for($i = 0; $i < count($arrayx); $i++ ){
        	$prod->mostraProd( $arrayx, $array_campox, $i );

            $codbarra_view[$i] = $prod->showcampo0();
            $dataped_view[$i] = $prod->showcampo1();
            $dataentrega_view[$i] = $prod->showcampo2();
            $codped_view[$i] = $prod->showcampo3();
        }
        break;
}

include ("templates/saci_admin_codbarra.htm");

?>
