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
|  arquivo:     start_arquivos_inserir.php
|  template:    arquivos_inseriro.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    case "Inserir" :
		$rs_insert = $db->query_db("INSERT INTO seguranca (nomem, arquivo, actionpg, descr, codmenu, modulo, habilitado, manutencao, senha) VALUES ('".$_POST['nome']."', '".$_POST['arquivo']."', '".$_POST['visivel']."', '".$_POST['descricao']."', '".$_POST['menu']."', '".$_POST['modulo']."', '".$_POST['habilitado']."', '".$_POST['manutencao']."', '".$_POST['senha']."')","SQL_NONE","S");
    break;
}

$rs_menu_show = $db->query_db("SELECT codmenu, menu FROM seguranca_menu","SQL_NONE","N");

$db->disconnect();

include ("templates/arquivos_inserir.htm");

?>