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
|  arquivo:     start_sistema_idremoto.php
|  template:    sistema_idremoto.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    case "AdicionarGRP" :
        if($_POST['addgrp'] <> -1)
        {
            $rs_insert = $db->query_db("INSERT INTO idremoto_grps (codgrp, datahorainsercao) VALUES ('".$_POST['addgrp']."', now())","SQL_NONE","S");
        }
    break;

    case "AdicionarIP" :
        if(($_POST['addip'] <> -1) AND ($_POST['addlocal'] <> ""))
        {
            $rs_insert = $db->query_db("INSERT INTO idremoto_ips (ip, local, datahorainsercao) VALUES ('".$_POST['addip']."', '".$_POST['addlocal']."', now())","SQL_NONE","S");
        }
    break;

    case "DeletarGRP" :
        $rs_deleta = $db->query_db("DELETE FROM idremoto_grps WHERE codid = '".$_GET['codid_select']."'","SQL_NONE","S");
    break;

    case "DeletarIP" :
        $rs_deleta = $db->query_db("DELETE FROM idremoto_ips WHERE codid = '".$_GET['codid_select']."'","SQL_NONE","S");
    break;
}

$rs_listgrp = $db->query_db("SELECT codgrp, nomegrp FROM segurancagrp ORDER BY nomegrp","SQL_NONE","N");

$rs_lista_grps = $db->query_db("SELECT idremoto_grps.codid, idremoto_grps.codgrp, idremoto_grps.datahorainsercao, segurancagrp.nomegrp FROM idremoto_grps, segurancagrp WHERE idremoto_grps.codgrp = segurancagrp.codgrp ORDER BY segurancagrp.nomegrp","SQL_NONE","N");

$rs_lista_ips = $db->query_db("SELECT * FROM idremoto_ips ORDER BY local","SQL_NONE","N");

$db->disconnect();

include ("templates/sistema_idremoto.htm");

?>