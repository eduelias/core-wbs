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
    		
    	$nomepesqf = strtolower($nomepesq);
    	
    	$condicao3 = " and ocorr_pesq = 'OK' ";
    	
    	if ($numdias){

			$condicao3 .= " and DATE_SUB( CURDATE( ) , INTERVAL $numdias DAY) >= datahorafim ";
		}
		
		if ($nomepesqf){

			$condicao3 .= " and LCASE(clientenovo.nome) like '%$nomepesqf%' ";
		}
		
		if ($hist == 'N'){

			$condicao2 = " hist <> 'S' ";
		}else{
			$condicao2 = " hist = 'S' ";
		}
		
		#echo $condicao3;
		#echo $sol;
				
        $prod->clear();
        $prod->listProdSum("coddetalhe, codmodel, pesquisa_detalhes.codcliente, codped, datahorafim, solucionado, codos_at, ocorr_pesq, nome, dddtel1, tel1, enc, solucionado, hist", "pesquisa_detalhes, clientenovo", $condicao2." and pesquisa_detalhes.codcliente=clientenovo.codcliente ".$condicao3, $arrayx, $array_campox, "ORDER BY datahorafim ASC");
        
        #echo"<PRE>";
        #print_r($arrayx);
		#echo"</PRE>";
        
        for($i = 0; $i < count($arrayx); $i++ ){
        	$prod->mostraProd( $arrayx, $array_campox, $i );

            $cod_view[$i] = $prod->showcampo0();
            $codmodel_view[$i] = $prod->showcampo1();
            $codcliente_view[$i] = $prod->showcampo2();
            $codped_view[$i] = $prod->showcampo3();
            $datapesq_view[$i] = $prod->showcampo4();
            $datapesqf_view[$i] = $prod->fdata($datapesq_view[$i]);
            #$status_view[$i] = $prod->fdata($dataentrega_view[$i]);
            
            $sol_view[$i] = $prod->showcampo5();
            $codos_at_view[$i] = $prod->showcampo6();
            $ocorr_pesq_view[$i] = $prod->showcampo7();
            $nomecli_view[$i] = $prod->showcampo8();
            $dddtel_view[$i] = $prod->showcampo9();
            $tel_view[$i] = $prod->showcampo10();
            $enc_view[$i] = $prod->showcampo11();
            $sol_view[$i] = $prod->showcampo12();
            $hist_view[$i] = $prod->showcampo13();
            
            $difdias[$i] = $prod->numdias( $datapesq_view[$i], $datahoraatual);
            
           
           
           if ($sol_view[$i] == 'N' and ($hist_view[$i] == 'N' or $hist_view[$i] == '')){$status[$i] = "PEND";}
           if ($sol_view[$i] == 'S' and ($hist_view[$i] == 'N' or $hist_view[$i] == '')){$status[$i] = "SOL";}
           if ($sol_view[$i] == 'S' and $hist_view[$i] == 'S'){$status[$i] = "FIM";}
            
            $prod->clear();
            $prod->listProdU("codbarra_os_at, onsite","os_at", "codos_at = '$codos_at_view[$i]'");
            $codbarra_at_view[$i] = $prod->showcampo0();
            $onsite_view[$i] = $prod->showcampo1();
            
            
        }
     break;
}     

include ("templates/auditoria_at_ocorr.htm");

?>
