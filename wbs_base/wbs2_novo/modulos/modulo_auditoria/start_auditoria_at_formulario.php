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
|  arquivo:     start_pesquisa_posvenda_formulario.php
|  template:    pesquisa_posvenda_formulario.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    	// Pesquisar Cliente
    	case "Pesquisar" :

            $prod->clear();
            $prod->listProdU("codcliente, dataos_at_entr, codbarra_os_at, contato","os_at", "codos_at = '$codos_at_pesq'");
            $codcliente_view = $prod->showcampo0();
            $dataped_view = $prod->showcampo1();
            $ncodpedido = $prod->showcampo2();
            $contato = $prod->showcampo3();
            $dataped_view = $prod->fdata($dataped_view);
            
            $prod->clear();
            $prod->listProdU("nome, sexo","clientenovo", "codcliente = '$codcliente_view'");
            $nomecliente_view = $prod->showcampo0();
            $sexocliente_view = $prod->showcampo1();

            if ($sexocliente_view == "F")
            {
                $tratamento = "a Sra. ";
                $tratamento1 = "Sra. ";
            }
            else
            {
                $tratamento = "o Sr. ";
                $tratamento1 = "Sr. ";
            }
            
            $prod->clear();
            $prod->listProdSum("codperg, resposta","pesquisa_resp", "codcliente = '$codcliente_view' AND codos_at = '$codos_at_pesq' ", $arrayx, $array_campox, "");
            
               for($i = 0; $i < count($arrayx); $i++ ){
        	$prod->mostraProd( $arrayx, $array_campox, $i );
            
            $codperg = $prod->showcampo0();
            $resp1[$codperg] = $prod->showcampo1();
            
            #echo "resp=$resp[$codperg] per=$codperg<BR>";
            
            
            $resp[$codperg] = $resp1[$codperg];
            if ($resp1[$codperg] == ""){$resp[$codperg] = "R: Sem Resposta";}
            if ($resp1[$codperg] == "S"){$resp[$codperg] = "R: Sim";}
			if ($resp1[$codperg] == "N"){$resp[$codperg] = "<span class='style1'>R: Não</span>";}
			if ($resp1[$codperg] == "TS"){$resp[$codperg] = "R: Totalmente Satisfeito";}
			if ($resp1[$codperg] == "S" and ($codperg == 20 or $codperg == 24)){$resp[$codperg] = "R: Satisfeito";}
			if ($resp1[$codperg] == "PS"){$resp[$codperg] = "<span class='style1'>R: Parcialmente Satisfeito</span>";}
			if ($resp1[$codperg] == "I"){$resp[$codperg] = "<span class='style1'>R: Insatisfeito</span>";}
                           
               }//FOR
               
           
            $prod->clear();
            $prod->listProdSum("codocorr, setor","pesquisa_ocorr", "coddetalhe = '$coddetalhe'", $arrayx1, $array_campox1, "");
            
            #print_r($arrayx1);
            
               for($i = 0; $i < count($arrayx1); $i++ ){
        	$prod->mostraProd( $arrayx1, $array_campox1, $i );
        	          
            $codocorr = $prod->showcampo0();
                       
            if ($codocorr){
            	$ck_ocorr[$codocorr] = "checked";
            	$setor = $prod->showcampo1();
            	
            	if ($setor == "I"){
            		$ck_setor_i[$codocorr] = "checked";
            	}else{
            		$ck_setor_e[$codocorr] = "checked";
            	}
            	
            	
            }
            
            $prod->clear();
            $prod->listProdU("solucao, hist","pesquisa_detalhes", "coddetalhe = '$coddetalhe'");
            $solucao_view = $prod->showcampo0();
            $hist_view = $prod->showcampo1();
            
            if ($hist_view == 'S'){$block_hist = "disabled";}
                      
               }//FOR
            
            
            
            if ($codperg == 0)
            {
                include ("templates/pesquisa_posvenda_formulario_naorespondido");
            }
            else
            {
                 include ("templates/auditoria_at_formulario.html");
            }

        break;

    	// Gravar Pesquisa
    	case "Gravar" :
    		
    		$prod->clear();
           	$prod->listProdU("codped","os_at", "codos_at = '$codos_at_pesq'");
            $codped_pesq = $prod->showcampo0();

            $datahoraatual = gmDate("Y-m-d H:i:s");
            
            $prod->delProd("pesquisa_ocorr", "coddetalhe = '$coddetalhe'");
            
            // Grava os resultados da Pesquisa
            $oc = 1;
            for($i = 1; $i < 7; $i++ )
            {
            	if ($ocorr[$i] == 1){
            	
                $prod->clear();
                $prod->setcampo0("");
                $prod->setcampo1($coddetalhe);
                $prod->setcampo2($i); // codigo 
                $prod->setcampo3($detalhes); 
                $prod->setcampo4($setor[$i]); // setor
                $prod->setcampo5($datahoraatual);
                $prod->setcampo6($codos_at_pesq);
                $oc = $oc*0;
                
                
                $prod->addProd("pesquisa_ocorr", $uregpesq);
                
            	}
            }

           if ($oc == 0){
            		$cond = "enc = 'S' ";
            }else{
            	    $cond = "enc = 'N' ";
            }
            
            if ($solucao <> "" and $oc ==0){     	            
            		$cond .= " , solucao='$solucao' ";
            		$cond .= " , solucionado='S' ";
            }else{
            		$cond .= " , solucao='' ";
            		$cond .= " , solucionado='N' ";
            }
            
              if ($hist_pesq == "S" and $solucao <> "" and $oc ==0){     	            
            		$cond .= " , hist='S' ";
            }       
            
            echo $cond;
            
            $prod->upProdU("pesquisa_detalhes", $cond,"coddetalhe = '$coddetalhe'");
            
            
         	  include ("templates/auditoria_confirma.html");

        break;
        
            
            
}

?>
