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
|  arquivo:     start_assistencia_tecnica_admin_laudo.php
|  template:    assistencia_tecnica_admin_laudo.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    case "Pesquisar" :
        $condicaopesq = " WHERE hist = '$histpesq' ";
        if ($codlaudopesq)
        {
            $condicaopesq .= " AND codlaudo = '$codlaudopesq' ";
        }
        if ($descricaopesq)
        {
            $condicaopesq .= " AND descricao LIKE '%$descricaopesq%' ";
        }
    break;
    // Adicionar novo sintoma
    case "Adicionar" :
        $db->connect_wbs();

        if($descricao_insert <> "")
        {
            $rs_insert = $db->query_db("INSERT INTO os_at_laudos (descricao, libgar, troca_peca) VALUES (UCASE('".$db->discover_method('descricao_insert')."'), '".$db->discover_method('libgar_insert')."', '".$db->discover_method('trocapeca_insert')."')","SQL_NONE","S");
            $codlaudo_insert = $db->conn->Insert_ID();
            $rs_insert = $db->query_db("INSERT INTO os_at_rel_laudos_srv_exec (codlaudo, codsrv_exec, datahoracriacao) VALUES ('$codlaudo_insert', '-1', NOW())","SQL_NONE","S");
        }

        $db->disconnect();
    break;

    case "Editar" :
        $db->connect_wbs();
        $rs_atualiza = $db->query_db("UPDATE os_at_laudos SET descricao = '$descricao' WHERE codlaudo = '$codlaudo_select'","SQL_NONE","S");
        $db->disconnect();
    break;

    // Seta o Histórico do sintoma
    case "Hist" :
        $db->connect_wbs();

        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlaudo[$i] <> "")
            {
                $rs_what = $db->query_db("SELECT hist FROM os_at_laudos WHERE codlaudo = '$rows_codlaudo[$i]'","SQL_NONE","N");
                $hist_view[$i] = $rs_what->fields[0];

                if ($hist_view[$i] == "S") { $hist_troca[$i] = "N"; } else { $hist_troca[$i] = "S"; }

                $rs_troca = $db->query_db("UPDATE os_at_laudos SET hist = '$hist_troca[$i]' WHERE codlaudo = '$rows_codlaudo[$i]'","SQL_NONE","N");
            }
        }
        
        $db->disconnect();
    break;

    // Seta o Histórico do sintoma
    case "LibGar" :
        $db->connect_wbs();

        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlaudo[$i] <> "")
            {
                $rs_what = $db->query_db("SELECT libgar FROM os_at_laudos WHERE codlaudo = '$rows_codlaudo[$i]'","SQL_NONE","N");
                $hist_view[$i] = $rs_what->fields[0];

                if ($hist_view[$i] == "S") { $hist_troca[$i] = "N"; } else { $hist_troca[$i] = "S"; }

                $rs_troca = $db->query_db("UPDATE os_at_laudos SET libgar = '$hist_troca[$i]' WHERE codlaudo = '$rows_codlaudo[$i]'","SQL_NONE","N");
            }
        }
        
        $db->disconnect();
    break;
   
    // Troca Peça
    case "TrocaPeca" :
        $db->connect_wbs();

        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlaudo[$i] <> "")
            {
                $rs_what = $db->query_db("SELECT troca_peca FROM os_at_laudos WHERE codlaudo = '$rows_codlaudo[$i]'","SQL_NONE","N");
                $hist_view[$i] = $rs_what->fields[0];

                if ($hist_view[$i] == "S") { $hist_troca[$i] = "N"; } else { $hist_troca[$i] = "S"; }

                $rs_troca = $db->query_db("UPDATE os_at_laudos SET troca_peca = '$hist_troca[$i]' WHERE codlaudo = '$rows_codlaudo[$i]'","SQL_NONE","N");
            }
        }

        $db->disconnect();
    break;
}

$db->connect_wbs();

//$db->conn->debug = true;

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM os_at_laudos $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM os_at_laudos $condicaopesq ORDER BY descricao LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$rs_sintomas = $db->query_db("SELECT * FROM os_at_sintomas WHERE hist = 'N'","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_laudo.htm");

?>
