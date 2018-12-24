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
|  arquivo:     start_jornal_inserir_secao.php
|  template:    jornal_inserir_secao.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // Inserir Seção
    case "Inserir" :

        $db->connect_ipa();

        $datahoraatual = gmDate("Y-m-d H:i:s");
        $campo_nome = $_POST['nome'];
        $campo_descricao = $_POST['descricao'];
        $campo_habilitado = $_POST['habilitado'];

        #$db->$conn->debug = true;
        $rs_insert = $db->conn->Execute("INSERT INTO jornal_secao (codsecao, nome, descricao, datahoraadd, habilitado, ordem) VALUES ('', '$campo_nome', '$campo_descricao', '$datahoraatual', '$campo_habilitado', '0')");
        
        $db->retorno_db($rs_insert, "S");

        $db->disconnect();

    break;
}

include ("templates/jornal_inserir_secao.htm");

?>
