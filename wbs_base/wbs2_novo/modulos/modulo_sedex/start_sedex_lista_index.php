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

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    case "Pesquisar" :
    	$discover_pgto = $db->discover_method("pgto");
    	
        $condicaopesq = " sedex_lista.status = '$discover_pgto' AND ";
        
        $discover_nsedex = $db->discover_method("nsedex");
		if ($discover_nsedex)
        {
            $condicaopesq .= " sedex_lista.numsedex LIKE '%$discover_nsedex%' AND ";
        }
        
		$discover_revenda = $db->discover_method("revenda");
		if ($discover_revenda)
        {
            $condicaopesq .= " vendedor.nome LIKE '%$discover_revenda%' AND ";
        }
    break;

    case "PagarSelect" :
        $condicaopesq = " sedex_lista.status = 'NO' AND";
        #
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codsedex[$i] <> "")
            {
                $db->connect_wbs();

                $rs_update = $db->query_db("UPDATE sedex_lista SET status = 'PG', codfuncionario = '$codvend' WHERE codsedex = '$rows_codsedex[$i]'","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
                
                $db->disconnect();
            }
        }
    break;
    
    default :
        $condicaopesq = " sedex_lista.status = 'NO' AND";
    break;
}

$db->connect_wbs();

#$db->$conn->debug = true;

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM sedex_lista, vendedor WHERE $condicaopesq sedex_lista.codvend = vendedor.codvend","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT * FROM sedex_lista, vendedor WHERE $condicaopesq sedex_lista.codvend = vendedor.codvend LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/sedex_lista_index.htm");

?>
