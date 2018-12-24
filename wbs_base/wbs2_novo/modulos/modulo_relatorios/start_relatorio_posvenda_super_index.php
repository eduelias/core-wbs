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
            $condicaopesq = "codsuper = '$super' AND datahorainicio between '$datainicio' and '$datafim' AND solucionado = '$sol' ";
            $condicaopesq2 = "codsuper = '$super' AND datahorainicio between '$datainicio' and '$datafim' AND solucionado = '$sol' ";

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

include ("templates/relatorio_posvenda_super_index.htm");

?>
