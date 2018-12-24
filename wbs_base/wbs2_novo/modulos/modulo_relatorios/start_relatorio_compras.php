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
|  arquivo:     start_relatorio_celular_produtos_list.php
|  template:    relatorio_celular_produtos_list.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    case "Pesquisar" :
    	$discover_empresa = $db->discover_method("empresa");
        if ($discover_empresa)
        {
            if ($discover_empresa == -1) {
			  	$condicaopesq = "  ";
			}
			else
			{
			  	$condicaopesq = " AND oc.codemp = '$discover_empresa' ";
			}
            $libera_sql = 1;
        }
        
        $discover_codprod = $db->discover_method("codprod_pesq");
       if (($discover_codprod) )
        {
			$condicaopesq .= " AND (codprod = '$discover_codprod') ";
			$libera_sql = $libera_sql + 1;
        }
        
        if($libera_sql == 2)
        {
	        $rs_lista = $db->query_db("SELECT oc.codoc, codfor, datacompra, dataprevcheg, codprod, qtdecomp, pcu, icms, ipi, custo_ger  FROM oc, ocprod WHERE oc.codoc = ocprod.codoc and hist <> '1' $condicaopesq and cb <> 'OK' ORDER BY oc.datacompra","SQL_NONE","N");
			
			 $rs_lista1 = $db->query_db("SELECT oc.codoc, codfor, datacompra, dataprevcheg, codprod, qtdecomp, pcu, icms, ipi , custo_ger FROM oc, ocprod WHERE oc.codoc = ocprod.codoc and hist = '1' $condicaopesq  ORDER BY oc.datacompra DESC LIMIT 0,10","SQL_NONE","N");
	        //$numRows = $rs_lista->_numOfRows;
		}
    break;
}

$rs_empresas = $db->query_db("SELECT * FROM empresa","SQL_NONE","N");

$db->disconnect();


include ("templates/relatorio_compras.htm");

?>