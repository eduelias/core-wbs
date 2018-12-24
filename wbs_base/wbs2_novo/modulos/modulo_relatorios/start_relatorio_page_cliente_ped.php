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
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    	// Pesquisar Cliente
	case "pesquisa":

        $db->connect_wbs();
        #$db->$conn->debug = true;

        $rs = $db->query_db("SELECT codped, codbarra , dataped, dataentrega, status, codvend  FROM pedido WHERE codcliente = '$codcliente_pesq' and cancel <> 'OK'","SQL_NONE","N");
        
        $rs_cliente = $db->query_db("SELECT nome FROM clientenovo WHERE codcliente = '$codcliente_pesq'","SQL_NONE","N");
        
        

        
        $db->disconnect();
        
        include ("templates/relatorio_page_cliente_ped.htm");

		break;
}



?>
