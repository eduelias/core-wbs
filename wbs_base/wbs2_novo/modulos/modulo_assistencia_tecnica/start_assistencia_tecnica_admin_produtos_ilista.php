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
|  arquivo:     start_assistencia_tecnica_admin_produtos.php
|  template:    assistencia_tecnica_admin_produtos.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "Criar" :
        $db->connect_wbs();

        // Pesquisa dados do pedido
        $rs_pedido = $db->query_db("SELECT codcliente, codvend, codbarra FROM pedido WHERE codped = '$codped_select'","SQL_NONE","N");

        // grava
        $rs_grava = $db->query_db("INSERT INTO os_at (codemp, codcliente, codvend, codped, codbarra_ped, codtipo_serv, hist, status, dataos_at_ini) VALUES ('1', '".$rs_pedido->fields['codcliente']."', '".$rs_pedido->fields['codvend']."', '$codped_select', '".$rs_pedido->fields['codbarra']."', '1', 'N', 'ABERTO', '".$db->datahoraatual()."')","SQL_NONE","S");
        $codgravado = $db->$conn->Insert_ID();

        // funcao codbarra
        $codbarra_grava = $db->func_codbarra(1, $codgravado, "OS_AT");

        $rs_atualiza = $db->query_db("UPDATE os_at SET codbarra_os_at = '$codbarra_grava' WHERE codos_at = '$codgravado'","SQL_NONE","N");

        $rs_analise = $db->query_db("INSERT INTO os_at_analise (codos_at) VALUES ('$codgravado')","SQL_NONE","N");

        $db->disconnect();
    break;
}

// INICIO TMP
$rs_tmp0 = $db->query_db("SELECT codcliente, codvend FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$rs_dados_cliente = $db->query_db("SELECT * FROM clientenovo WHERE codcliente = '".$rs_tmp0->fields['codcliente']."'","SQL_NONE","N");

//$rs_tmp1 = $db->query_db("INSERT INTO","SQL_NONE","N");

$rs_sintomas = $db->query_db("SELECT * FROM os_at_sintomas WHERE hist = 'N'","SQL_NONE","N");
$rs_laudos = $db->query_db("SELECT * FROM os_at_laudos WHERE hist = 'N'","SQL_NONE","N");
$rs_srv_exec = $db->query_db("SELECT * FROM os_at_srv_exec WHERE hist = 'N'","SQL_NONE","N");

$db->disconnect();

include ("templates/assistencia_tecnica_admin_produtos_ilista.htm");

?>
