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
|  arquivo:     start_assistencia_tecnica_admin_criar_pesquisa.php
|  template:    assistencia_tecnica_admin_criar_pesquisa.htm
+--------------------------------------------------------------
*/


 $db->connect_wbs();
 #$db->conn->debug = true;

 $rs_lista = $db->query_db("SELECT idop, nomeprod, op.codprod, op.qtde, datainicio, op.codprod, (SELECT nome FROM clientenovo WHERE codcliente = op.codcliente) as cli  FROM op, produtos WHERE op.codprod = produtos.codprod and op.hist <> 'S' order by idop","SQL_NONE","N");
 
 $rs_modelo = $db->query_db("SELECT idop_mod, codprod, descr  FROM op_mod WHERE  op_mod.hist <> '1' order by descr","SQL_NONE","N");

include ("templates/fabrica_relatorio.htm");

?>