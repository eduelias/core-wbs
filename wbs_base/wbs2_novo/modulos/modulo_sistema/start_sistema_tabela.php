<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_tabela.php
|  template:    sistema_tabela.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

$rs_tabela = $db->query_db("SELECT codvend, nome, seed FROM vendedor WHERE codvend = '".$_POST['codvend_select']."'","SQL_NONE","N");
$id_vend = $rs_tabela->fields['codvend'];
$loginseed= $rs_tabela->fields['nome'];
$seed = $rs_tabela->fields['seed'];
	
function gera_codigo($id_vend, $seed, $pos)
{
	$i= $pos;

	$valor1 = abs((int)(ceil(pow($i*$seed,4))+pow($id_vend,2) + log($seed*$i)));
	$valor2 = abs((int)(ceil(pow($id_vend,3))+pow($seed*$i,2) + log($i)*pi));

	$valor_t = substr($valor1 + $valor2,0,4); 

	return $valor_t;
}

$rs_lista = $db->query_db("SELECT codvend, nome FROM vendedor ORDER BY nome","SQL_NONE","N");

$db->disconnect();

include ("templates/sistema_tabela.htm");

?>