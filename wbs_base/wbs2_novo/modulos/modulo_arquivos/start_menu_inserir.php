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
|  arquivo:     start_menu_inserir.php
|  template:    menu_inseriro.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Inserir" :
        $rs_insert = $db->query_db("INSERT INTO seguranca_menu (menu, image, habilitado) VALUES ('".$_POST['nome']."', '".$_POST['imagem']."', '".$_POST['habilitado']."')","SQL_NONE","S");
    break;
}

$db->disconnect();

include ("templates/menu_inserir.htm");

?>
