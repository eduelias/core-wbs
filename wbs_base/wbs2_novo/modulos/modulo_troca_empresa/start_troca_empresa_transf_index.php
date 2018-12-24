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
|  arquivo:     start_troca_empresa_transf_index.php
|  template:    troca_empresa_transf_index.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
	case "Troca":
		$rs_troca = $db->query_db("UPDATE vendedor SET codemp_transf = '$codemp_transf_select' WHERE codvend = '$codvend'","SQL_NONE","S");
	break;
}

$rs_lib = $db->query_db("SELECT * FROM lib_empresa_transf, empresa WHERE codvend = '$codvend' AND lib_empresa_transf.codemp_transf = empresa.codemp","SQL_NONE","N");

// Cod empresa atual e cod empresa transferencia Atual
$rs_emp_atual = $db->query_db("SELECT codemp , codemp_transf FROM vendedor WHERE codvend = '$codvend'","SQL_NONE","N");

// nome emp atual
$rs_emp1 = $db->query_db("SELECT nome FROM empresa WHERE codemp = '".$rs_emp_atual->fields['codemp']."'","SQL_NONE","N");

// nome emp transf atual
$rs_emp2 = $db->query_db("SELECT nome FROM empresa WHERE codemp = '".$rs_emp_atual->fields['codemp_transf']."'","SQL_NONE","N");

$db->disconnect();

include ("templates/troca_empresa_transf_index.htm");

?>
