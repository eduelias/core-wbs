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
|  arquivo:     start_assistencia_tecnica_admin_sintoma.php
|  template:    assistencia_tecnica_admin_sintoma.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Pesquisar" :
        $condicaopesq = " WHERE hist = '$histpesq' ";
        if ($codsintomapesq)
        {
            $condicaopesq .= " AND codsintoma = '$codsintomapesq' ";
        }
        if ($descricaopesq)
        {
            $condicaopesq .= " AND descricao LIKE '%$descricaopesq%' ";
        }
    break;
    // Adicionar novo sintoma
    case "Adicionar" :
        if($descricao_insert <> "")
        {
            $rs_insert = $db->query_db("INSERT INTO os_at_sintomas (descricao) VALUES (UCASE('$descricao_insert'))","SQL_NONE","S");
        }
    break;
    case "Editar" :
        $rs_atualiza = $db->query_db("UPDATE os_at_sintomas SET descricao = '$descricao' WHERE codsintoma = '$codsintoma_select'","SQL_NONE","S");
    break;
    // Seta o Histórico do sintoma
    case "Hist" :
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codsintoma[$i] <> "")
            {
                $rs_what = $db->query_db("SELECT hist FROM os_at_sintomas WHERE codsintoma = '$rows_codsintoma[$i]'","SQL_NONE","N");
                $hist_view[$i] = $rs_what->fields[0];

                if ($hist_view[$i] == "S") { $hist_troca[$i] = "N"; } else { $hist_troca[$i] = "S"; }

                $rs_troca = $db->query_db("UPDATE os_at_sintomas SET hist = '$hist_troca[$i]' WHERE codsintoma = '$rows_codsintoma[$i]'","SQL_NONE","S");
            }
        }
    break;
}

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM os_at_sintomas $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM os_at_sintomas $condicaopesq ORDER BY descricao LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

include ("templates/assistencia_tecnica_admin_sintoma.htm");

$db->disconnect();

?>
