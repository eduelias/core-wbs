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
|  arquivo:     start_relatorio_posvenda_index.php
|  template:    relatorio_posvenda_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    case "Pesquisar" :
        $db->connect_wbs();

        #$db->$conn->debug = true;

        if ($datainicio AND $datafim)
        {
        
        if ($datainicio AND $datafim)
        {
            $condicaopesq = "datahorainicio between '$datainicio' and '$datafim' AND solucionado = '$sol' ";
            $condicaopesq2 = "datahorainicio between '$datainicio' and '$datafim' AND solucionado = '$sol' ";

        }
        else
        {
            $condicaopesq = "solucionado = '$sol' ";
        }

        if ($ocorrencia <> "-1")
        {
            $condicaopesq .= " AND codocorrencia = '$ocorrencia'";
        }
        else
        {
            $condicaopesq .= " AND codocorrencia <> '0'";
        }

        $rs_pesq = $db->query_db("SELECT * FROM pesquisa_detalhes WHERE $condicaopesq ORDER BY coddetalhe","SQL_NONE","N");
        
        $numRows = $rs_pesq->_numOfRows;

        // Calcula numeros e porcentagem de pesquisas
        $rs_total = $db->query_db("SELECT count(*) AS total FROM pesquisa_detalhes WHERE $condicaopesq2","SQL_NONE","N");

        $rs_resp = $db->query_db("SELECT count(*) AS resp FROM pesquisa_detalhes WHERE resp = 'S' AND $condicaopesq2","SQL_NONE","N");

        $rs_nresp = $db->query_db("SELECT count(*) AS nresp FROM pesquisa_detalhes WHERE resp = 'N' AND $condicaopesq2","SQL_NONE","N");

        $rs_ocorrencia = $db->query_db("SELECT count(*) AS ocorrencia FROM pesquisa_detalhes WHERE codocorrencia <> '0' AND $condicaopesq2","SQL_NONE","N");
        
        // Calcula numeros e porcentagem de cada ocorrencia
        $rs_total2 = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia <> '0' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_geral = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '5' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_produto = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '1' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_vendas = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '2' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_entrega = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '3' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_saci = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '4' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_manutencao = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '6' AND $condicaopesq2","SQL_NONE","N");
        
        $rs_producao = $db->query_db("SELECT count(*) FROM pesquisa_detalhes WHERE codocorrencia = '7' AND $condicaopesq2","SQL_NONE","N");
        
        }
        else
        {
            $Action = "";
        }
        
        $db->disconnect();

    break;
    
    case "Solucionar" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codpesq[$i] <> "")
            {
                $db->connect_wbs();

                $rs_update = $db->query_db("UPDATE pesquisa_detalhes SET solucionado = 'S' WHERE coddetalhe = '$rows_codpesq[$i]'","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";

                $db->disconnect();
            }
        }
    break;
}

include ("templates/relatorio_posvenda_index.htm");

?>
