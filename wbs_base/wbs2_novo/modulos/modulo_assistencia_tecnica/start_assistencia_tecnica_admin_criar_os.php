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
|  arquivo:     start_assistencia_tecnica_admin_criar_os.php
|  template:    assistencia_tecnica_admin_criar_os.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    case "Criar" :

        // Pesquisa dados do pedido
        $rs_pedido = $db->query_db("SELECT codcliente, codvend, codbarra FROM pedido WHERE codped = '$codped_select'","SQL_NONE","N");

        // grava
        $rs_grava = $db->query_db("INSERT INTO os_at_temp (codemp, codcliente, codvend, codped, codbarra_ped, codtipo_serv, hist, status, dataos_at_ini) VALUES ('1', '".$rs_pedido->fields['codcliente']."', '$codvend', '$codped_select', '".$rs_pedido->fields['codbarra']."', '1', 'N', 'ABERTO', '".$db->datahoraatual()."')","SQL_NONE","N");
        $codgravado = $db->conn->Insert_ID();

        // funcao codbarra
        $codbarra_grava = $db->func_codbarra(1, $codgravado, "OS_AT");

        $rs_atualiza = $db->query_db("UPDATE os_at_temp SET codbarra_os_at = '$codbarra_grava' WHERE codos_at = '$codgravado'","SQL_NONE","N");

        $rs_analise = $db->query_db("INSERT INTO os_at_analise_temp (codos_at) VALUES ('$codgravado')","SQL_NONE","N");
        
        //$rs_status = $db->query_db("INSERT INTO os_at_status_temp (codos_at, datahorastatus, status, login) VALUES ('$codgravado', NOW(), 'ABERTO', UCASE('$login'))","SQL_NONE","N");
        
        $codos_at_select = $codgravado;
    break;
}

//echo "codos_at_select: $codos_at_select<br />";

// TECNICO
$rs_tecnico = $db->query_db("SELECT codtecnico, tecnico FROM os_at_tecnicos WHERE codvend = '$codvend' and  habilitado = 'S'","SQL_NONE","N");
// INICIO TMP
$rs_tmp0 = $db->query_db("SELECT codcliente, codvend, codped FROM os_at_temp WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

// Dados PEDIDO
$rs_dados_ped = $db->query_db("SELECT onsite FROM pedido WHERE codped = '".$rs_tmp0->fields['codped']."'","SQL_NONE","N");

$rs_dados_cliente = $db->query_db("SELECT * FROM clientenovo WHERE codcliente = '".$rs_tmp0->fields['codcliente']."'","SQL_NONE","N");

//$rs_tmp1 = $db->query_db("INSERT INTO","SQL_NONE","N");

//$rs_sintomas = $db->query_db("SELECT * FROM os_at_sintomas WHERE hist = 'N'","SQL_NONE","N");
//$rs_laudos = $db->query_db("SELECT * FROM os_at_laudos WHERE hist = 'N'","SQL_NONE","N");
//$rs_srv_exec = $db->query_db("SELECT * FROM os_at_srv_exec WHERE hist = 'N'","SQL_NONE","N");

//$codos_at_select = $db->discover_method("codos_at_select");

include ("templates/assistencia_tecnica_admin_criar_os.htm");

$db->disconnect();

?>
