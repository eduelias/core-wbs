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
|  arquivo:     start_controle_malote_admin_enviar.php
|  template:    controle_malote_admin_enviar.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Envia" :
        $libera_insert = 0;
        
        // Se Destino for uma Empresa
        if(($_POST['tipo_dest'] == "E") AND ($_POST['codempresa'] <> -1) AND ($_POST['nmalote'] <> ""))
        {
            $sql_insert = "INSERT INTO controle_malote (num_malote, cod_remet, resp_remet, cod_dest, datahoraenvio, tipo_remet, tipo_dest, descricao) VALUES ('".$_POST['nmalote']."', '$codemp_vend', '$login', '".$_POST['codempresa']."', NOW(), 'E', 'E', '".$_POST['descricao']."')";
            $libera_insert = 1;
            //echo "Se Destino for uma Empresa";
        }
        
        // Se Destino for uma Revenda
        if(($_POST['tipo_dest'] == "R") AND ($_POST['codrevenda'] <> -1) AND ($_POST['nmalote'] <> ""))
        {
            $sql_insert = "INSERT INTO controle_malote (num_malote, cod_remet, resp_remet, cod_dest, datahoraenvio, tipo_remet, tipo_dest, descricao) VALUES ('".$_POST['nmalote']."', '$codemp_vend', '$login', '".$_POST['codrevenda']."', NOW(), 'E', 'R', '".$_POST['descricao']."')";
            $libera_insert = 1;
            //echo "Se Destino for uma Revenda";
        }
        
        // Se tudo estiver OK, grava no banco
        if($libera_insert == 1)
        {
            $rs_insert = $db->query_db($sql_insert, "SQL_NONE", "S");
        }
    break;
}

$rs_empresas = $db->query_db("SELECT * FROM empresa WHERE nome <> '' AND malote = 'S' ORDER BY nome","SQL_NONE","N");

$rs_revendas = $db->query_db("SELECT * FROM vendedor WHERE tipo = 'R' AND block = 'N' AND malote = 'S' ORDER BY nome","SQL_NONE","N");

$db->disconnect();

include ("templates/controle_malote_admin_enviar.htm");

?>