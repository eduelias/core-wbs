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
|  arquivo:     start_arquivos_inserir_arquivo.php
|  template:    arquivos_inserir_arquivo.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

#$db->$conn->debug = true;

$rs = $db->$conn->Execute("SELECT codmenu, menu FROM seguranca_menu");

$db->disconnect();

include ("templates/arquivos_inserir_arquivo.htm");

?>
