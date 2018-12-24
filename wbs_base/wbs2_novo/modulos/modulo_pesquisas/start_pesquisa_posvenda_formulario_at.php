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
            $prod->listProdU("count(*)","pesquisa_resp", "codcliente = '$codcliente_view' AND codos_at = '$codos_at_pesq' AND codperg <> '0'");
            $jarespondeu_view = $prod->showcampo0();
            
            if ($jarespondeu_view == 0)
            {
                include ("templates/pesquisa_posvenda_formulario_at.html");
            }
            else
            {
                include ("templates/pesquisa_posvenda_formulario_jarespondeu.htm");
            }

        break;

    	// Gravar Pesquisa
    	case "Gravar" :
    		
    		 $prod->clear();
           	$prod->listProdU("codped","os_at", "codos_at = '$codos_at_pesq'");
            $codped_pesq = $prod->showcampo0();

            $datahoraatual = gmDate("Y-m-d H:i:s");
            
            // Grava os resultados da Pesquisa
            $oc = 1;
            for($i = 19; $i < 27; $i++ )
            {
                $prod->clear();
                $prod->setcampo0("");
                $prod->setcampo1($codcliente_pesq);
                $prod->setcampo2($codped_pesq);
                $prod->setcampo3($i); // codigo da pergunta
                $prod->setcampo4($resp[$i]); // resposta
                $prod->setcampo5($datahoraatual);
                $prod->setcampo6($codos_at_pesq);
                
                  if (($i == 20 and ($resp[$i] == "PS" or $resp[$i] == "I" )) or ($i == 23 and $resp[$i] == "N") or ($i == 24 and ($resp[$i] == "PS" or $resp[$i] == "I" )) or  ($i == 26 and $resp[$i] <> "")){$oc = $oc *0;}else{$oc = $oc *1;}

                $prod->addProd("pesquisa_resp", $uregpesq);
            }

            // Grava Detalhes da Pesquisa
            
            $prod->clear();
            $prod->listProdU("codvend, dataped, dataentrega, dataprevent, datainst_ini, datainst_fim, codbarra","pedido", "codped = '$codped_pesq'");
            $codvend_view = $prod->showcampo0();
            $dataped_view = $prod->showcampo1();
            $dataentrega_view = $prod->showcampo2();
            $dataprevent_view = $prod->showcampo3();
            $datainst_ini_view = $prod->showcampo4();
            $datainst_fim_view = $prod->showcampo5();
            $codbarra_view = $prod->showcampo6();
            
            $prod->clear();
            $prod->listProdU("codsuper","vendedor", "codvend = '$codvend_view'");
            $codsuper_view = $prod->showcampo0();

            $prod->clear();
            $prod->setcampo0("");
            $prod->setcampo1("2"); // codigo modelo pesquisa
            $prod->setcampo2($codcliente_pesq); // codigo do cliente
            $prod->setcampo3($codped_pesq); // codigo do pedido
            $prod->setcampo4($datainicio); // datahora do inicio da pesquisa
            $prod->setcampo5($datahoraatual); // datahora do fim da pesquisa
            $prod->setcampo6($dataped_view); // datahora do pedido
            $prod->setcampo7($dataentrega_view); // datahora de entrega
            $prod->setcampo8($datainst_ini_view); // datahora inicio de instalaçao
            $prod->setcampo9($datainst_fim_view); // datahora fim de instalaçao
            $prod->setcampo10($dataprevent_view); // datahora previsao de entrega
            $prod->setcampo11($codvend_view); // codigo do vendedor
            $prod->setcampo12($codvend); // codigo do pesquisador
            $prod->setcampo13($ocorrencia);
            $prod->setcampo14("S");
            $prod->setcampo15("N"); // nao solucionado
            $prod->setcampo16($codsuper_view); // codigo supervisor
            $prod->setcampo17($codos_at_pesq); // codos
             if ($oc == 0){$ocorr_pesq =  "OK";}else{$ocorr_pesq = "NO";}
            $prod->setcampo18($ocorr_pesq); // ocorrencia

            $prod->addProd("pesquisa_detalhes", $uregpesq_detalhes);
                      
            $prod->upProdU("os_at", "pesquisa='OK'","codos_at = '$codos_at_pesq'");

             include ("templates/pesquisa_posvenda_formulario_respondido.htm");

        break;
        
            
            
    	// O Cliente nao respondeu
    	case "Nao" :
    		
    		
    		$prod->clear();
           	$prod->listProdU("codped","os_at", "codos_at = '$codos_at_pesq'");
            $codped_pesq = $prod->showcampo0();


            $datahoraatual = gmDate("Y-m-d H:i:s");
            $oc = 1;

            $prod->clear();
            $prod->setcampo0("");
            $prod->setcampo1($codcliente_pesq);
            $prod->setcampo2($codped_pesq);
            $prod->setcampo3("0"); // codigo da pergunta
            $prod->setcampo4("N"); // resposta
            $prod->setcampo5($datahoraatual);
            $prod->setcampo6($codos_at_pesq);
        

            $prod->addProd("pesquisa_resp", $uregpesq);

            $prod->clear();
            $prod->listProdU("codvend, dataped, dataentrega, dataprevent, datainst_ini, datainst_fim, codbarra","pedido", "codped = '$codped_pesq'");
            $codvend_view = $prod->showcampo0();
            $dataped_view = $prod->showcampo1();
            $dataentrega_view = $prod->showcampo2();
            $dataprevent_view = $prod->showcampo3();
            $datainst_ini_view = $prod->showcampo4();
            $datainst_fim_view = $prod->showcampo5();
            $codbarra_view = $prod->showcampo6();

            $prod->clear();
            $prod->listProdU("codsuper","vendedor", "codvend = '$codvend_view'");
            $codsuper_view = $prod->showcampo0();

            $prod->clear();
            $prod->setcampo0("");
            $prod->setcampo1("2"); // codigo modelo pesquisa
            $prod->setcampo2($codcliente_pesq); // codigo do cliente
            $prod->setcampo3($codped_pesq); // codigo do pedido
            $prod->setcampo4($datahoraatual); // datahora do inicio da pesquisa
            $prod->setcampo5($datahoraatual); // datahora do fim da pesquisa
            $prod->setcampo6($dataped_view); // datahora do pedido
            $prod->setcampo7($dataentrega_view); // datahora de entrega
            $prod->setcampo8($datainst_ini_view); // datahora inicio de instalaçao
            $prod->setcampo9($datainst_fim_view); // datahora fim de instalaçao
            $prod->setcampo10($dataprevent_view); // datahora previsao de entrega
            $prod->setcampo11($codvend_view); // codigo do vendedor
            $prod->setcampo12($codvend); // codigo do pesquisador
            $prod->setcampo13("0");
            $prod->setcampo14("N");
            $prod->setcampo15("N");
            $prod->setcampo16($codsuper_view); // codigo supervisor
            $prod->setcampo17($codos_at_pesq); // codos
             if ($oc == 0){$ocorr_pesq =  "OK";}else{$ocorr_pesq = "NO";}
            $prod->setcampo18($ocorr_pesq); // ocorrencia

            $prod->addProd("pesquisa_detalhes", $uregpesq_det);
            
            $prod->upProdU("os_at", "pesquisa='OK'","codos_at = '$codos_at_pesq'");
            
            include ("templates/pesquisa_posvenda_formulario_naorespondido.htm");

        break;
}

?>
