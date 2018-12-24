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
    	$liberapesq = strlen($pesqnomecliente);
    	if ($liberapesq >= "3") {

            $prod->clear();
            $prod->listProdSum("codcliente, nome, tipocliente, cpf, cnpj, dddtel1, tel1, endereco, numero, complemento, bairro, cep, cidade, estado", "clientenovo", "nome like '%$pesqnomecliente%'", $arrayx, $array_campox, "ORDER BY codcliente, nome ASC");

            for($i = 0; $i < count($arrayx); $i++ ){
            	$prod->mostraProd( $arrayx, $array_campox, $i );

                $codcliente_view[$i] = $prod->showcampo0();
                $nomecliente_view[$i] = $prod->showcampo1();
                $tipocliente_view[$i] = $prod->showcampo2();
                $cpf_view[$i] = $prod->showcampo3();
                $cnpj_view[$i] = $prod->showcampo4();
                $dddtel1_view[$i] = $prod->showcampo5();
                $tel1_view[$i] = $prod->showcampo6();

                $endereco_view[$i] = $prod->showcampo7();
                $numero_view[$i] = $prod->showcampo8();
                $complemento_view[$i] = $prod->showcampo9();
                $bairro_view[$i] = $prod->showcampo10();
                $cep_view[$i] = $prod->showcampo11();
                $cidade_view[$i] = $prod->showcampo12();
                $uf_view[$i] = $prod->showcampo13();

                if ($tipocliente_view[$i] == "F") {
                    $doccliente_view[$i] = $cpf_view[$i];
                }
                if ($tipocliente_view[$i] == "J") {
                    $doccliente_view[$i] = $cnpj_view[$i];
                }
            }
        }
        break;
}

include ("templates/saci_admin_cliente.htm");

?>
