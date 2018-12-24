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
|  arquivo:     start_assistencia_tecnica_admin_srv_exec.php
|  template:    assistencia_tecnica_admin_srv_exec.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    case "Pesquisar" :
        $condicaopesq = " WHERE hist = '$histpesq' ";
        if ($codsrv_execpesq)
        {
            $condicaopesq .= " AND codsrv_exec = '$codsrv_execpesq' ";
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
            $rs_insert = $db->query_db("INSERT INTO os_at_srv_exec (descricao, codtipo) VALUES (UCASE('$descricao_insert'), '".$db->discover_method('tipo_insert')."')","SQL_NONE","S");
        }

        $db->disconnect();
    break;
    case "Editar" :
        $db->connect_wbs();
        $rs_atualiza = $db->query_db("UPDATE os_at_srv_exec SET descricao = '$descricao' WHERE codsrv_exec = '$codsrv_exec_select'","SQL_NONE","S");
        $db->disconnect();
    break;

    // Seta o Histórico do sintoma
    case "Hist" :
        $db->connect_wbs();

        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlaudo[$i] <> "")
            {
                $rs_what = $db->query_db("SELECT hist FROM os_at_srv_exec WHERE codsrv_exec = '$rows_codsrv_exec[$i]'","SQL_NONE","N");
                $hist_view[$i] = $rs_what->fields[0];

                if ($hist_view[$i] == "S") { $hist_troca[$i] = "N"; } else { $hist_troca[$i] = "S"; }

                $rs_troca = $db->query_db("UPDATE os_at_srv_exec SET hist = '$hist_troca[$i]' WHERE codlaudo = '$rows_codsrv_exec[$i]'","SQL_NONE","S");
            }
        }
        
        $db->disconnect();
    break;
}

$db->connect_wbs();

//$db->$conn->debug = true;

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM os_at_srv_exec $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM os_at_srv_exec $condicaopesq ORDER BY descricao LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$rs_laudos = $db->query_db("SELECT * FROM os_at_laudos WHERE hist = 'N'","SQL_NONE","N");
$rs_srv_exec = $db->query_db("SELECT * FROM os_at_srv_exec WHERE hist = 'N'","SQL_NONE","N");

$rs_tipo = $db->query_db("SELECT * FROM os_at_srv_exec_tipo","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_srv_exec.htm");

?>
