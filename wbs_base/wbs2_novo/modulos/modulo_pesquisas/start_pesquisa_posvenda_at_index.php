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
|  arquivo:     start_pesquisa_posvenda_index.php
|  template:    pesquisa_posvenda_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    	// Pesquisar Cliente
    	case "PesquisarCli" :
            // Consulta Nome do Cliente
            $prod->clear();
            $prod->listProdU("nome, endereco, bairro, cep, numero, complemento, tipocliente, cpf, cnpj, dddtel1, tel1","clientenovo", "codcliente='$pesqcodcliente'");
            
            $nomecliente_view = $prod->showcampo0();
            $endereco_view = $prod->showcampo1();
            $bairro_view = $prod->showcampo2();
            $cep_view = $prod->showcampo3();
            $numero_view = $prod->showcampo4();
            $complemento_view = $prod->showcampo5();
            $tipocliente_view = $prod->showcampo6();
            $cpf_view = $prod->showcampo7();
            $cnpj_view = $prod->showcampo8();
            $dddtel1_view = $prod->showcampo9();
            $tel1_view = $prod->showcampo10();

            if ($tipocliente_view == "F") {
                $doccliente = $cpf_view;
            }
            if ($tipocliente_view == "J") {
                $doccliente = $cnpj_view;
            }
            
            // pedidos
            $prod->clear();
            $prod->listProdSum("codbarra", "pedido", "codcliente='$pesqcodcliente'", $array_2, $array_campo_2, "ORDER BY codped");
            for($i = 0; $i < count($array_2); $i++ ){
                $prod->mostraProd( $array_2, $array_campo_2, $i);

                $codped_view[$i] = $prod->showcampo0();
            }// FOR
            
            break;
}

include ("templates/pesquisa_posvenda_at_index.html");

?>
