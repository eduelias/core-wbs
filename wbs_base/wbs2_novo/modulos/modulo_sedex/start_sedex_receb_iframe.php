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

        // 36000-000 a 36099-999
        
        if (($cep_origem >= 36000000) AND ($cep_origem <= 36099999))
        {
            $uf_cep = "JF";
        }
        else
        {
            // Pesquisa UF do CEP
            $rs_cep = $cep->busca($cep_origem, $erro);
            $uf_cep = $rs_cep['uf'];
        }
        
        #echo "<b>UF do CEP:</b> $uf_cep<br>";
        
        $db->connect_wbs();
        
        // Calcula Preço do Sedex
        $rs_precosedex = $db->query_db("SELECT $uf_cep FROM sedex_valor WHERE codpeso = '$codpeso'","SQL_NONE","N");
        $preco_sedex = $rs_precosedex->fields[0];
        
         // Verifica se ja existe o sedex
        $rs_numsedex = $db->query_db("SELECT COUNT(*) FROM sedex_lista WHERE numsedex = '$nsedex'","SQL_NONE","N");
        $controle_sedex = $rs_numsedex->fields[0];
        
        if (!$controle_sedex){
        
        
        #echo "<b>preco_sedex:</b> $preco_sedex<br>";
        
        #echo "valorconteudo (ANTES): $valorconteudo<br>";
        
        $valorconteudo = $db->fvalorbd($valorconteudo);
        
        #echo "valorconteudo (DEPOIS): $valorconteudo";
        
        // valor cobrado
        if ($valorconteudo <= 500)
        {
            $valor_cobrado = $preco_sedex;
        }
        if (($valorconteudo >= 501) AND ($valorconteudo <= 1000))
        {
            $valor_cobrado = $preco_sedex * 0.5;
        }
        if ($valorconteudo >= 1001)
        {
            $valor_cobrado = 0;
        }

        // FINANCEIRO
        if ($valor_cobrado <> 0)
        {
            $db->func_grava_bcomov ("00.04", $db->func_show_contabco ($codrevenda) ,$valor_cobrado, "Malote fora da expecificação mínima" );

        }
        
        /*
        $datahoraatual = gmDate("Y-m-d H:i:s");
        
        // financeiro
        if ($valor_cobrado <> 0)
        {
            $rs1 = $db->query_db("SELECT codconta FROM fin_bcoconta WHERE codvend = '$codrevenda'", "SQL_NONE", "N");
            $codconta = $rs1->fields[0];

            $debito = abs($valor_cobrado);
            $obs = "Malote fora da expecificação mínima";

            $rs2 = $db->query_db("INSERT INTO fin_bcomov (codmov, codconta, opcaixa, descricao, debito, datamov, dataini, consolida, obs, login) VALUES ('', '$codconta', '00.04', 'SEDEX (MALOTE)', '$debito', '$datahoraatual', '$datahoraatual', 'N', '$obs', '$login')", "SQL_NONE", "N");
        }
        */
        #echo "<b>Preço cobrado:</b> $valor_cobrado<br>";
        
        // Grava Sedex
        #$db->$conn->debug = true;
        $rs_inserir = $db->query_db("INSERT INTO sedex_lista (codsedex, codvend, cep_origem, cep_destino, numsedex, codpeso, data_envio, data_rec, tipo_sedex, status, valor_sedex, valor_receb, valor_cobrado, conteudo, codfuncionario) VALUES ('', '$codrevenda', '$cep_origem', '$cep_destino', '$nsedex', '$codpeso', '$dataenvio', '$datareceb', '$tipo_sedex', 'NO', '$preco_sedex', '$valorconteudo', '$valor_cobrado', '$conteudo', '$codvend')","SQL_NONE","S");
        $codgravado = $db->conn->Insert_ID();
        
        #echo "<b>codgravado:</b> $codgravado<br>";

        // Grava pedidos
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($codpedido[$i] <> "")
            {
                if(!$ck_contrato[$i]) { $ck_contrato[$i] = "NO"; }
                if(!$ck_caixa[$i]) { $ck_caixa[$i] = "NO"; }
                
                $rs_inserir = $db->query_db("INSERT INTO sedex_pedidos (codsedex, codpedido, caixa, contrato) VALUES ($codgravado, $codpedido[$i], '$ck_caixa[$i]', '$ck_contrato[$i]')","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
            }
        }
        
        $codrevenda = "";
        
        }// NAO EXISTE SEDEX JA INSERIDO
        
        $db->disconnect();
        
    break;

}

$db->connect_wbs();

$rs_peso = $db->query_db("SELECT * FROM sedex_valor","SQL_NONE","N");

$rs_pedido = $db->query_db("SELECT codped, codbarra, caixa, contrato FROM pedido WHERE codvend = '$codrevenda' AND   (caixa = 'NO' OR contrato = 'NO' OR contrato = 'EP') AND cancel <> 'OK' GROUP BY codped","SQL_NONE","N");

$numRows = $rs_pedido->_numOfRows;

$db->disconnect();

include ("templates/sedex_receb_iframe.htm");

?>
