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
|  arquivo:     start_assistencia_tecnica_admin_criar_ipedidos.php
|  template:    assistencia_tecnica_admin_criar_ipedidos.htm
+--------------------------------------------------------------
*/

if (($codpedpesq <> "") AND (($nomeclientepesq <> "") OR ($codbarrapecapesq <> "")))
{
    $Action = "";
}
if (($codpedpesq <> "")  AND (($nomeclientepesq  == "") OR ($codbarrapecapesq == "")))
{
    $Action = "PesquisarA";
}
if (($codpedpesq == "")  AND (($nomeclientepesq <> "") AND ($codbarrapecapesq <> "")))
{
    $Action = "PesquisarB";
}

//echo "<b>Action:</b> $Action<br>";

switch ($Action)
{

	// Pesquisa por código de barra pedido
    case "PesquisarA":
            $db->connect_wbs();

            //$db->$conn->debug = true;
            
            $rs_lista = $db->query_db("SELECT codped, codbarra, nome, dataped, onsite FROM pedido, clientenovo WHERE codbarra ='$codpedpesq' AND pedido.codcliente = clientenovo.codcliente","SQL_NONE","N");
 
            $db->disconnect();
		break;

    // Pesquisa por código de barra peça e nome cliente
	case "PesquisarB":

            if (($nomeclientepesq <> "") AND ($codbarrapecapesq <> ""))
            {
                $condicaopesq = " codbarra.codbarra = '$codbarrapecapesq' AND";

                $condicaopesq .= " clientenovo.nome LIKE '%$nomeclientepesq%' AND";
                
                $db->connect_wbs();

                //$db->$conn->debug = true;

                $rs_lista = $db->query_db("SELECT pedido.codped, pedido.codbarra, nome, dataped, onsite FROM codbarra, pedido, clientenovo WHERE $condicaopesq pedido.codcliente = clientenovo.codcliente AND pedido.codped = codbarra.codped","SQL_NONE","N");

                $db->disconnect();
            }
		break;
}

include ("templates/assistencia_tecnica_tec_criar_ipedidos.htm");

?>
