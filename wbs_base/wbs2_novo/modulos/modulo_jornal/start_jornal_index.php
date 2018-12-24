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
|  arquivo:     start_jornal_index.php
|  template:    jornal_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // Inserir Seção
    case "HistSecao" :

        $db->connect_ipa();

        #$db->$conn->debug = true;
        $rs_update = $db->$conn->Execute("UPDATE jornal_secao SET habilitado = 'N' WHERE codsecao = '$codsecao_select' ORDER BY codsecao");

        if (!$rs_update) { $retorno = "erro"; $retorno_log = $db->$conn->ErrorMsg(); } else { $retorno = "sucesso"; }

        $db->disconnect();

    break;
}

$db->connect_ipa();

#$db->$conn->debug = true;
$rs_secao = $db->$conn->Execute("SELECT * FROM jornal_secao");

$rs_noticia = $db->$conn->Execute("SELECT nome, codnoticia, titulo, edicao, ano, destaque, status, jornal_noticia.datahoraadd, datahorapublic_ini FROM jornal_noticia, jornal_secao WHERE jornal_secao.codsecao = jornal_noticia.codsecao AND jornal_secao.habilitado = 'S' ORDER BY codnoticia");

$db->disconnect();

include ("templates/jornal_index.htm");

?>
