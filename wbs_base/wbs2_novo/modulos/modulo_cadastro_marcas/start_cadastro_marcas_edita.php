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
|  arquivo:     start_cadastro_marcas_edita.php
|  template:    cadastro_marcas_edita.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

$rs_linha = $db->query_db("SELECT marca FROM produtos_marcas WHERE codmarca = '$codmarca_select'","SQL_NONE","N");

$db->disconnect();

include ("templates/cadastro_marcas_edita.htm");

?>
