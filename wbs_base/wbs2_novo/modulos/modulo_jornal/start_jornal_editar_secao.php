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
|  arquivo:     start_jornal_editar_secao.php
|  template:    jornal_editar_secao.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // Inserir Seção
    case "Editar" :

        $db->connect_ipa();

        $campo_nome = $_POST['nome'];
        $campo_descricao = $_POST['descricao'];
        $campo_habilitado = $_POST['habilitado'];
        $campo_codsecao = $_POST['codsecao_select'];

        #$db->$conn->debug = true;
        $rs_update = $db->conn->Execute("UPDATE jornal_secao SET nome = '$campo_nome', descricao = '$campo_descricao', habilitado = '$campo_habilitado', ordem = '0' WHERE codsecao = '$campo_codsecao'");

        $db->retorno_db($rs_update, "S");

        $db->disconnect();

    break;
}

$db->connect_ipa();

$rs_secao = $db->conn->Execute("SELECT * FROM jornal_secao WHERE codsecao = '$codsecao_select'");
$db->retorno_db($rs_secao, "N");

$db->disconnect();

include("templates/jornal_editar_secao.htm");

?>
