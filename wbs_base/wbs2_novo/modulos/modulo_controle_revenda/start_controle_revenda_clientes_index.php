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
|  arquivo:     start_controle_revenda_index.php
|  template:    controle_revenda_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 100;

//$db->connect_wbs();
$db->connect_data();


//$db->$conn->debug = true;


switch ($Action)
{
    case "Pesquisar" :
        $discover_revendapesq = $db->discover_method("revendapesq");
		if ($discover_revendapesq)
        {
            $condicaopesq = " (nome LIKE '%$discover_revendapesq%' or nome_fantasia LIKE '%$discover_revendapesq%') AND ";
        }
    break;

}

if ($codvend == 11 or $codvend == 24 or $codvend == 22 or $codvend == 199){$condicao_user = "datareg = DATE_SUB( NOW( ) , INTERVAL 1 DAY ) ";}else{$condicao_user = " codvend_resp = '$codvend' and datareg = DATE_SUB( NOW( ) , INTERVAL 1 DAY ) ";}


$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM distribuicao_geral WHERE $condicaopesq $condicao_user ","SQL_NONE","N");
$total_reg = $rs_count->fields[0];


// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

#$rs_lista = $db->query_db("SELECT vendedor.codvend AS codlogin, vendedor.nome AS login, doc, clientenovo.nome AS nome, cidade, estado, block, email, cep, dddtel1, tel1, dddtel2, tel2, malote FROM vendedor, clientenovo WHERE $condicaopesq tipo = 'R' AND ((doc = cnpj) OR (doc = cpf))  ORDER BY vendedor.nome LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");
#$rs_lista = $db->query_db("SELECT vendedor.codvend AS codlogin, vendedor.nome AS login, doc, tipocliente, block, malote FROM vendedor WHERE $condicaopesq tipo = 'R' ORDER BY vendedor.nome LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$rs_lista = $db->query_db("SELECT *  FROM distribuicao_geral WHERE $condicaopesq $condicao_user  ORDER by  nome ASC ","SQL_NONE","N");


$rs_lista_dist = $db->query_db("SELECT sum(vendas_mes), sum(projetado_mes), sum(meta), codvend_resp  FROM distribuicao_geral WHERE $condicao_user  GROUP by codvend_resp ","SQL_NONE","N");

#print_r($rs_lista);

#echo "login = $login_vend";

$numRows = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/controle_revenda_clientes_index.htm");

?>
