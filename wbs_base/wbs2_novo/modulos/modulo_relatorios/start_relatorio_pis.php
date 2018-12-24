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
			  	$condicaopesq = " AND codemp = '$discover_empresa' ";
			}
            $libera_sql = 1;
        }
        
        $discover_mes = $db->discover_method("mes");
        $discover_ano = $db->discover_method("ano");
        if (($discover_mes) AND ($discover_ano))
        {
			$condicaopesq .= " AND (datanf like '$discover_ano-$discover_mes%') ";
			$libera_sql = $libera_sql + 1;
        }
        
        if($libera_sql == 2)
        {
	        $rs_lista = $db->query_db("SELECT pedido.codped,  pedido.codbarra, (vpp/vt) as fator, dataped, codvend, codcliente FROM pedido, pedidoprod, produtos, pedidonf WHERE pedido.codped = pedidoprod.codped and  pedidoprod.codprod = produtos.codprod and pedidonf.codped = pedido.codped and cancel <> 'OK' $condicaopesq and chk_pis_confins = 'S'   and pedido.ped_transf <> 'OK' and fat = 'OK' group by pedidoprod.codped ORDER BY pedido.codped","SQL_NONE","N");
	        //$numRows = $rs_lista->_numOfRows;
		}
    break;
}

$rs_empresas = $db->query_db("SELECT * FROM empresa","SQL_NONE","N");

$db->disconnect();

include ("templates/relatorio_pis.htm");

?>