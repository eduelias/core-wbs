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
|  arquivo:     start_grupos_arquivos.php
|  template:    grupos_arquivos.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

$discover_codgrp_select = $db->discover_method("codgrp_select");
$discover_codpg_select = $db->discover_method("codpg_select");

switch ($Action)
{
    case "Gravar" :

        $rs_find_home = $db->query_db("SELECT codpg FROM segurancaacesso WHERE codgrp = '$discover_codgrp_select' AND inicio = 'S'","SQL_NONE","N");
        $codpg_home = $rs_find_home->fields['codpg'];
        
        $rs_delete = $db->query_db("DELETE FROM segurancaacesso WHERE codgrp = '$discover_codgrp_select'","SQL_NONE","N");

        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codlista[$i] <> "")
            {
                //$rs_update = $db->query_db("UPDATE seguranca SET habilitado = 'N' WHERE codpg = '$rows_codlista[$i]'","SQL_NONE","N");
                if($rows_codlista[$i] == $codpg_home) { $set_inicio = "S"; } else { $set_inicio = "N"; }
                $rs_insert = $db->query_db("INSERT INTO segurancaacesso (codgrp, codpg, inicio) VALUES ('$discover_codgrp_select', '$rows_codlista[$i]', '$set_inicio')","SQL_NONE","N");
            }
        }
        
        //$rs_set_home = $db->query_db("UPDATE segurancaacesso SET inicio = 'S' WHERE codgrp = '$discover_codgrp_select' AND codpg = '$codpg_home'","SQL_NONE","N");
    break;

    case "Home" :

        $rs_update1 = $db->query_db("UPDATE segurancaacesso SET inicio = 'N' WHERE codgrp = '$discover_codgrp_select'","SQL_NONE","N");
        $rs_update2 = $db->query_db("UPDATE segurancaacesso SET inicio = 'S' WHERE codgrp = '$discover_codgrp_select' AND codpg = '$discover_codpg_select'","SQL_NONE","N");

    break;
}

$rs_grupo = $db->query_db("SELECT * FROM segurancagrp WHERE codgrp = '$discover_codgrp_select'","SQL_NONE","N");

$rs_lista = $db->query_db("SELECT * FROM seguranca WHERE habilitado = 'S' ORDER BY codmenu, nomem","SQL_NONE","N");
$numRowsX = $rs_lista->_numOfRows;

$db->disconnect();

include ("templates/grupos_arquivos.htm");

?>
