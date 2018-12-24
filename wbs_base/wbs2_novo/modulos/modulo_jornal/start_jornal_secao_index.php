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

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    // Inserir Seção
    case "HistSecao" :

        $db->connect_ipa();

        #$db->$conn->debug = true;
        $rs_update = $db->conn->Execute("UPDATE jornal_secao SET habilitado = 'N' WHERE codsecao = '$codsecao_select' ORDER BY codsecao");

        if (!$rs_update) { $retorno = "erro"; $retorno_log = $db->$conn->ErrorMsg(); } else { $retorno = "sucesso"; }

        $db->disconnect();

    break;
}

$db->connect_ipa();

#$db->$conn->debug = true;

$rs_count = $db->conn->Execute("SELECT count(*) AS total_reg FROM jornal_secao");
$total_reg = $rs_count->fields[0];

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_secao = $db->conn->Execute("SELECT * FROM jornal_secao LIMIT $inicio_pesq, $acrescimo");

$db->disconnect();

include ("templates/jornal_secao_index.htm");

?>
