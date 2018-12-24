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
|  arquivo:     start_assistencia_tecnica_admin_produtos.php
|  template:    assistencia_tecnica_admin_produtos.htm
+--------------------------------------------------------------
*/

$fatorusertabela = 1;

$db->connect_wbs();

$db->$conn->debug = true;

switch ($Action)
{
    case "Pesquisar" :
        $nomprodpesq = strtolower($nomprodpesq);
        
        if ($codprodpesq <> "")
        {
            $condicaopesq = " produtos.codprod = $codprodpesq ";
            $condicaopesq .= " AND produtos.hist <> 'Y' ";
            $condicaopesq .= " AND categoria.codcat = produtos.codcat";
            $condicaopesq .= " AND subcategoria.codsubcat = produtos.codsubcat";
            $condicaopesq .= " AND produtos.codprod = estoque.codprod";
            $condicaopesq .= " AND estoque.codemp = 1";
        }

        if ($nomprodpesq <> "")
        {
            $condicaopesq = " LCASE(nomeprod) like '%$nomprodpesq%' ";
            $condicaopesq .= " AND produtos.hist <> 'Y' ";
            $condicaopesq .= " AND categoria.codcat = produtos.codcat";
            $condicaopesq .= " AND subcategoria.codsubcat = produtos.codsubcat";
            $condicaopesq .= " AND produtos.codprod = estoque.codprod";
            $condicaopesq .= " AND estoque.codemp = 1";
        }

        if ($condicaopesq <> "")
        {
            $rs_pesquisa = $db->query_db("SELECT produtos.codcat, produtos.codsubcat, produtos.codprod, SUM(qtde-reserva) as est, lib_linha, descres, nomeprod, (pvacj*fatorata*$fatorusertabela), (pva*fatorata*$fatorusertabela), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela), restricao_pl, n_prod_int, n_prod_ext, nomecat, nomesubcat, ordem, cor1_prod, cor2_prod, reserva, produtos.gar_um, produtos.gar_cj, garext_12, garext_24 FROM produtos, estoque, categoria, subcategoria WHERE $condicaopesq GROUP BY produtos.codprod  ORDER BY nomecat, nomesubcat, nomeprod","SQL_NONE","N");
        }
    break;
}

include ("templates/assistencia_tecnica_admin_produtos.htm");

$db->disconnect();

?>
