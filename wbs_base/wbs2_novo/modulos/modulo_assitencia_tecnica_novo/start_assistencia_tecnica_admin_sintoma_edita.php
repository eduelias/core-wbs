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
|  arquivo:     start_assistencia_tecnica_admin_sintoma_edita.php
|  template:    assistencia_tecnica_admin_sintoma_edita.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

$rs_linha = $db->query_db("SELECT descricao FROM os_at_sintomas WHERE codsintoma = '$codsintoma_select'","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_sintoma_edita.htm");

?>
