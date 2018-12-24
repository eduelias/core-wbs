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
|  arquivo:     start_assistencia_tecnica_admin_criar_idados.php
|  template:    assistencia_tecnica_admin_criar_idados.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();
//$db->$conn->debug = true;

// PESQUISA NOME CLIENTE E CODBARRA DO PEDIDO
$rs_dados1 = $db->query_db("SELECT nome, codbarra FROM pedido, clientenovo WHERE codped = '$codped_select' AND clientenovo.codcliente = pedido.codcliente","SQL_NONE","N");

// PESQUISA PRODUTOS
$rs = $db->query_db("SELECT pedidoprod.codprod, produtos.nomeprod, pedidoprod.qtde, codprodcj, tipoprod, tipocj, descres, codcb, pedidoprod.gar_um AS gar_um1, pedidoprod.gar_cj AS gar_cj1 FROM pedidoprod, produtos WHERE codped = '$codped_select' AND pedidoprod.codprod = produtos.codprod ORDER BY tipoprod, tipocj, ordem, nomeprod","SQL_NONE","N");

$db->disconnect();

//include("templates/assistencia_tecnica_tec_index.htm");
include("templates/assistencia_tecnica_tec_criar_idados.htm");

?>
