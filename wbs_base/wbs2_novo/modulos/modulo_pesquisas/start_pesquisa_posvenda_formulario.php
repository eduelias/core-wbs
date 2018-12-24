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
            $prod->listProdU("codcliente, dataped, codped","pedido", "codped = '$pesqcodped'");
            $codcliente_view = $prod->showcampo0();
            $dataped_view = $prod->showcampo1();
            $dataped_view = $prod->fdata($dataped_view);
            $codped_view = $prod->showcampo2();

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
            $prod->listProdU("count(*)","pesquisa_resp", "codcliente = '$codcliente_view' AND codped = '$codped_view' AND codperg <> '0'");
            $jarespondeu_view = $prod->showcampo0();
            
            if ($jarespondeu_view == 0)
            {
                include ("templates/pesquisa_posvenda_formulario.htm");
            }
            else
            {
                include ("templates/pesquisa_posvenda_formulario_jarespondeu.htm");
            }

        break;

    	// Gravar Pesquisa
    	case "Gravar" :

            $datahoraatual = gmDate("Y-m-d H:i:s");
            
            // Grava os resultados da Pesquisa
            
            for($i = 1; $i < 19; $i++ )
            {
                $prod->clear();
                $prod->setcampo0("");
                $prod->setcampo1($codcliente_pesq);
                $prod->setcampo2($codped_pesq);
                $prod->setcampo3($i); // codigo da pergunta
                $prod->setcampo4($resp[$i]); // resposta
                $prod->setcampo5($datahoraatual);

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
            $prod->setcampo1("1"); // codigo modelo pesquisa
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

            $prod->addProd("pesquisa_detalhes", $uregpesq_detalhes);

            //  Mensagem

            switch ($ocorrencia)
            {
                // 1 - Produto
                case "1" :
                    // MSG Bruno : 24
                    $iduser = 24;
                    $grpuser = 2;
                    $tp_ocorrencia = "(Ocorrência: Produto)";
                break;

                // 2 - Vendas
                case "2" :
                    // Pesquisar no cadastro de vendedor o cod supervisor
                    $prod->clear();
                    $prod->listProdU("codsuper","vendedor", "codvend = '$codvend_view'");
                    $codsuper_view = $prod->showcampo0();
                    
                    $prod->clear();
                    $prod->listProdU("codgrp","vendedor", "codvend = '$codsuper_view'");
                    $codgrp_view = $prod->showcampo0();

                    $iduser = $codsuper_view;
                    $grpuser = $codgrp_view;
                    $tp_ocorrencia = "(Ocorrência: Vendas)";
                break;

                // 3 - Entrega
                case "3" :
                    // MSG Jair
                    $iduser = 28;
                    $grpuser = 20;
                    $tp_ocorrencia = "(Ocorrência: Entrega)";
                break;

                // 4 - Saci
                case "4" :
                    // Luciano
                    $iduser = 20;
                    $grpuser = 22;
                    $tp_ocorrencia = "(Ocorrência: SACI)";
                break;

                // 5 - Geral
                case "5" :
                    // Magno
                    $iduser = 27;
                    $grpuser = 39;
                    $tp_ocorrencia = "(Ocorrência: Geral)";
                break;

                // 6 - Manutenção
                case "6" :
                    // Luciano
                    $iduser = 20;
                    $grpuser = 22;
                    $tp_ocorrencia = "(Ocorrência: Manutenção)";
                break;

                // 7 - Produção
                case "7" :
                    // Antônio
                    $iduser = 26;
                    $grpuser = 24;
                    $tp_ocorrencia = "(Ocorrência: Produção)";
                break;
            }

            // Vendedor
            $prod->clear();
            $prod->listProdU("nome","vendedor", "codvend = '$codvend_view'");
            $nomevend_view = $prod->showcampo0();
            
            // Cliente
            $prod->clear();
            $prod->listProdU("nome, dddtel1, tel1, dddtel2, tel2","clientenovo", "codcliente = '$codcliente_pesq'");
            $nomecliente_view = $prod->showcampo0();
            $dddtel1_view = $prod->showcampo1();
            $tel1_view = $prod->showcampo2();
            $dddtel2_view = $prod->showcampo3();
            $tel2_view = $prod->showcampo4();
            
            $html_msg .= "Pedido: <b>$codbarra_view</b> - Vendedor: <b>$nomevend_view</b><br>";
            $html_msg .= "Cliente: <b>$nomecliente_view</b><br>";
            $html_msg .= "Telefone: <b>($dddtel1_view) $tel1_view / ($dddtel2_view) $tel2_view</b><hr>";
            for($i = 1; $i < 19; $i++ )
            {
                $prod->clear();
                $prod->listProdU("pergunta","pesquisa_perg", "codperg = '$i'");
                $pergunta_view = $prod->showcampo0();
                
                // Pergunta
                $html_msg .= "$pergunta_view";
                
                // Resposta
                if ($resp[$i])
                {
                    $html_msg .= " R: <b>$resp[$i]</b><hr>";
                }
                else
                {
                    $html_msg .= " R: <b>Sem resposta</b><hr>";
                }
            }
            $html_msg .= "";

            #echo "<b>ocorrencia:</b> $ocorrencia<br>";
            #echo "$html_msg";
            
            if ($ocorrencia <> 0)
            {
                // Envia msg
                $datahoraatual = gmDate("Y-m-d H:i:s");
                
                $prod->clear();
                $prod->setcampo0("");
                $prod->setcampo1($grpuser);
                $prod->setcampo2($iduser);
                $prod->setcampo3($datahoraatual); //datatime msg
                $prod->setcampo4("Pesquisa Pós Venda $tp_ocorrencia");
                $prod->setcampo5($html_msg);
                $prod->setcampo6("N"); // hist
                $prod->setcampo7("NO"); // status
                $prod->setcampo8("0000-00-00 00:00:00"); // datastatus
                $prod->setcampo9(""); // codvend resposta
                $prod->setcampo10("NO"); // msg
                
                $prod->addProd("msg", $uregmsg);
            }

            include ("templates/pesquisa_posvenda_formulario_respondido.htm");

        break;
        
    	// O Cliente nao respondeu
    	case "Nao" :

            $datahoraatual = gmDate("Y-m-d H:i:s");

            $prod->clear();
            $prod->setcampo0("");
            $prod->setcampo1($codcliente_pesq);
            $prod->setcampo2($codped_pesq);
            $prod->setcampo3("0"); // codigo da pergunta
            $prod->setcampo4("N"); // resposta
            $prod->setcampo5($datahoraatual);

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
            $prod->setcampo1("1"); // codigo modelo pesquisa
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

            $prod->addProd("pesquisa_detalhes", $uregpesq_det);
            
            include ("templates/pesquisa_posvenda_formulario_naorespondido.htm");

        break;
}

?>
