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
|  arquivo:     start_pesquisa_posvenda_pedidos.php
|  template:    pesquisa_posvenda_pedidos.htm
+--------------------------------------------------------------
*/

 $datahoraatual = gmDate("Y-m-d H:i:s");
switch ($Action)
{
    	// Pesquisar Cliente
    	case "Pesquisar" :

        $prod->clear();
        $prod->listProdSum("codbarra_os_at, codemp, codcliente, codped, status, dataos_at_ini, dataos_at_entr, onsite, codos_at , dddtel1, tel1", "os_at", "status = 'ENTREGUE' AND DATE_SUB( CURDATE( ) , INTERVAL $numdias DAY) >= dataos_at_entr and pesquisa <> 'OK'", $arrayx, $array_campox, "ORDER BY dataos_at_entr ASC");

        for($i = 0; $i < count($arrayx); $i++ ){
        	$prod->mostraProd( $arrayx, $array_campox, $i );

            $codbarra_view[$i] = $prod->showcampo0();
            $codemp_view[$i] = $prod->showcampo1();
            $codcliente_view[$i] = $prod->showcampo2();
            $codped_view[$i] = $prod->showcampo3();
            $status_view[$i] = $prod->showcampo4();
            #$codcliente_view[$i] = $prod->fdata($dataped_view[$i]);
            #$status_view[$i] = $prod->fdata($dataentrega_view[$i]);
            $dataos_view[$i] = $prod->showcampo5();
            $dataentr_view[$i] = $prod->showcampo6();
            $onsite_view[$i] = $prod->showcampo7();
            $codos_at_view[$i] = $prod->showcampo8();
            $dddtel_at_view[$i] = $prod->showcampo9();
            $tel_at_view[$i] = $prod->showcampo10();
            
            $difdias[$i] = $prod->numdias( $dataentr_view[$i], $datahoraatual);
            
            
            $prod->clear();
            $prod->listProdU("nome, dddtel1, tel1","clientenovo", "codcliente = '$codcliente_view[$i]'");
            $nomecli_view[$i] = $prod->showcampo0();
            $dddtel_view[$i] = $prod->showcampo1();
            $tel_view[$i] = $prod->showcampo2();
            
            
        }
     break;
}     

include ("templates/pesquisa_posvenda_at_os.htm");

?>
