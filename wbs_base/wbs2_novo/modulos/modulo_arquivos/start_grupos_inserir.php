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
|  arquivo:     start_grupos_inserir.php
|  template:    grupos_inseriro.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Inserir" :
        $rs_insert = $db->query_db("INSERT INTO segurancagrp (nomegrp, obs, habilitado) VALUES ('".$_POST['nome']."', '".$_POST['obs']."', '".$_POST['habilitado']."')","SQL_NONE","S");
    break;
}

$db->disconnect();

include ("templates/grupos_inserir.htm");

?>
