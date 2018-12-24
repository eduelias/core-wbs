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
|  arquivo:     start_sedex_index.php
|  template:    sedex_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/cep.class.php");
$cep = new CEP();

switch ($Action)
{
    // Inserir
    case "Inserir" :

        $db->connect_wbs();
        
        #$db->$conn->debug = true;

        $datahoraatual = gmDate("Y-m-d H:i:s");
        #echo "debitar: $debitar / codrevendadeb: $codrevendadeb<br>";
        // financeiro
        if ($codrevendadeb > 0)
        {
            $rs1 = $db->query_db("SELECT codconta FROM fin_bcoconta WHERE codvend = '$codrevendadeb'", "SQL_NONE", "N");
            $codconta = $rs1->fields[0];

            $debito = abs($preco_sedex);
            $obs = $conteudo;

            $rs2 = $db->query_db("INSERT INTO fin_bcomov (codmov, codconta, opcaixa, descricao, debito, datamov, dataini, consolida, obs, login) VALUES ('', '$codconta', '00.04', 'SEDEX (MALOTE)', '$debito', '$datahoraatual', '$datahoraatual', 'N', '$obs', '$login')", "SQL_NONE", "N");
            
            $valor_cobrado = $debito;
        }

        // Grava Sedex
        $rs_inserir = $db->query_db("INSERT INTO sedex_lista (codsedex, codvend, cep_origem, cep_destino, numsedex, codpeso, data_envio, data_rec, tipo_sedex, status, valor_sedex, valor_receb, valor_cobrado, conteudo, codfuncionario) VALUES ('', '$codrevenda', '$cep_origem', '$cep_destino', '$nsedex', '$codpeso', '$dataenvio', '$data_rec', '$tipo_sedex', 'NO', '$preco_sedex', '$valor_receb', '$valor_cobrado', '$conteudo', '$codvend')","SQL_NONE","S");
        
        $codrevenda = "";

        $db->disconnect();

    break;
    
    case "Espera" :
        // CEP de 36000-000 a 36099-999 eh JF
        if (($frmCEP >= 36000000) AND ($frmCEP <= 36099999))
        {
            $uf_cep = "JF";
        }
        else
        {
            // Pesquisa UF do CEP
            $rs_cep = $cep->busca($frmCEP, $erro);
            $uf_cep = $rs_cep['uf'];
        }

        $db->connect_wbs();
        
        #$db->$conn->debug = true;

        // Calcula Preço do Sedex
        $rs_precosedex = $db->query_db("SELECT $uf_cep FROM sedex_valor WHERE codpeso = '$codpeso'","SQL_NONE","Y");
        $preco_sedex = $rs_precosedex->fields[0];
        
        $rs_revendas_list = $db->query_db("SELECT vendedor.codvend AS codvend, vendedor.nome AS login, clientenovo.nome AS nome FROM vendedor, clientenovo WHERE tipo = 'R' AND block = 'N' AND cep = '$frmCEP' AND ((doc = cnpj) OR (doc = cpf))","SQL_NONE","N");
        
        $codrevenda = "-1";

        $db->disconnect();
    break;
}

include ("templates/sedex_envia_iframe.htm");

?>
