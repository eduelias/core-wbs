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
|  arquivo:     start_cadastro_marcas_index.php
|  template:    cadastro_marcas_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    case "Pesquisar" :
        $condicaopesq = " WHERE hist = '$histpesq' ";
        if ($codmarcapesq)
        {
            $condicaopesq .= " AND codmarca = '$codmarcapesq' ";
        }
        if ($marcapesq)
        {
            $condicaopesq .= " AND marca LIKE '%$marcapesq%' ";
        }
    break;
    // Adicionar novo sintoma
    case "Adicionar" :
        $db->connect_wbs();

        if($marca_insert <> "")
        {
            $rs_insert = $db->query_db("INSERT INTO produtos_marcas (marca) VALUES (UCASE('$marca_insert'))","SQL_NONE","S");
        }

        $db->disconnect();
    break;
    case "Editar" :
        $db->connect_wbs();
        $rs_atualiza = $db->query_db("UPDATE produtos_marcas SET marca = '$marca' WHERE codmarca = '$codmarca_select'","SQL_NONE","S");
        $db->disconnect();
    break;
    // Seta o Histórico do sintoma
    case "Hist" :
        $db->connect_wbs();

        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codmarca[$i] <> "")
            {
                $rs_what = $db->query_db("SELECT hist FROM produtos_marcas WHERE codmarca = '$rows_codmarca[$i]'","SQL_NONE","N");
                $hist_view[$i] = $rs_what->fields[0];

                if ($hist_view[$i] == "S") { $hist_troca[$i] = "N"; } else { $hist_troca[$i] = "S"; }

                $rs_troca = $db->query_db("UPDATE produtos_marcas SET hist = '$hist_troca[$i]' WHERE codmarca = '$rows_codmarca[$i]'","SQL_NONE","S");
            }
        }
        
        $db->disconnect();
    break;
}

$db->connect_wbs();

//$db->$conn->debug = true;

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM produtos_marcas $condicaopesq","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM produtos_marcas $condicaopesq ORDER BY marca LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/cadastro_marcas_index.htm");

?>
