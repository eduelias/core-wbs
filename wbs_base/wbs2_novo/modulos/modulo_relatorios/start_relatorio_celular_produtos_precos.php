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
|  arquivo:     start_relatorio_celular_produtos_precos.php
|  template:    relatorio_celular_produtos_precos.htm
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
			  	$condicaopesq = " AND codemp = '$discover_empresa' ";
			}
            $libera_sql = 1;
        }
        
        $discover_datainicio = $db->discover_method("datainicio");
        $discover_datafim = $db->discover_method("datafim");
        if (($discover_datainicio) AND ($discover_datafim))
        {
			$condicaopesq .= " AND (dataped between '$discover_datainicio 00:00:00' and '$discover_datafim 23:59:59') ";
			$libera_sql = $libera_sql + 1;
        }
        
        if($libera_sql == 2)
        {
        	
        	
        	
	        $rs_lista = $db->query_db("SELECT produtos.codprod AS codigoprod, nomeprod,  SUM(if (codplano = 4,qtde, 0)) as controle, SUM(if (codplano = 5,qtde, 0)) as ideal, SUM(if (codplano = 6, qtde, 0)) as ideal_micro, SUM(if (codplano = 7, qtde, 0)) as cartao, SUM(if (codplano = 13, qtde, 0)) as ideal_75, SUM(if (codplano = 14, qtde, 0)) as ideal_150, SUM(if (codplano = 15, qtde, 0)) as ideal_300, SUM(if (codplano = 16, qtde, 0)) as controle_120, SUM(if (codplano = 17, qtde, 0)) as controle_160 FROM pedido, pedidoprod, produtos WHERE pedido.codped = pedidoprod.codped and  pedidoprod.codprod = produtos.codprod and cancel <> 'OK' $condicaopesq and codsubcat = 203 group by pedidoprod.codprod ORDER BY nomeprod","SQL_NONE","N");
	        //$numRows = $rs_lista->_numOfRows;
		}
    break;
}


 $rs_lista = $db->query_db("SELECT codprod , nomeprod, pvv  FROM produtos WHERE codsubcat = 203 and hist <> 'Y' ORDER BY nomeprod","SQL_NONE","N");


$db->disconnect();

include ("templates/relatorio_celular_produtos_precos.htm");

?>