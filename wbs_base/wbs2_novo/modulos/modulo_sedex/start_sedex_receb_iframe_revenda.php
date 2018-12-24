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
|  arquivo:     start_sedex_receb_iframe_revenda.php
|  template:    sedex_receb_iframe_revenda.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();



$rs_revendas = $db->query_db("SELECT vendedor.codvend AS codvend, vendedor.nome AS login, clientenovo.nome AS nome FROM vendedor, clientenovo WHERE tipo = 'R' AND block = 'N' AND cep = '$frmCEP' AND ((doc = cnpj) OR (doc = cpf))","SQL_NONE","N");

$db->disconnect();

include ("templates/sedex_receb_iframe_revenda.htm");

?>
