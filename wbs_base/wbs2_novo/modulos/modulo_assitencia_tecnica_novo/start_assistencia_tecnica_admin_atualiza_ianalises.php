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
|  arquivo:     start_assistencia_tecnica_admin_criar_ianalises.php
|  template:    assistencia_tecnica_admin_criar_ianalises.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

switch ($Action)
{
    case "NovaAnalise" :
        $rs_nova = $db->query_db("INSERT INTO os_at_analise (codos_at) VALUES ('$codos_at_select')","SQL_NONE","N");
    break;
    
    case "Gravar" :
        if ($codsintoma_save <> "-1" AND $codsintoma_save <> "")
        {
            $condicaosql = " codsintoma = '$codsintoma_save', datasintoma = NOW() ";
        }
        if ($codlaudo_save <> "-1" AND $codlaudo_save <> "")
        {
            if ($condicaosql <> "") { $condicaosql .= " , "; }
            $condicaosql .= " codlaudo = '$codlaudo_save', datalaudo = NOW() ";
        }
        if ($codsrvexec_save <> "-1" AND $codsrvexec_save <> "")
        {
            if ($condicaosql <> "") { $condicaosql .= " , "; }
            $condicaosql .= " codsrv_exec = '$codsrvexec_save', datasrv_exec = NOW() ";
        }
        //echo "<b>condicaosql:</b> $condicaosql<br>";
        $rs_gravar = $db->query_db("UPDATE os_at_analise SET $condicaosql WHERE codanalise = '$codos_at_analise_select'","SQL_NONE","N");
    break;
    
    case "Cancelar" :
        $rs_cancela = $db->query_db("UPDATE os_at_analise SET cancel = 'S', datacancel = NOW() WHERE codanalise = '$codos_at_analise_select'","SQL_NONE","N");
    break;
    
    case "Excluir" :
        $rs_excluir = $db->query_db("DELETE FROM os_at_analise WHERE codanalise = '$codos_at_analise_select'","SQL_NONE","N");
    break;
}

$rs_analises = $db->query_db("SELECT codanalise, codsintoma, codlaudo, codsrv_exec, cancel, datacancel FROM os_at_analise WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$rs_sintomas = $db->query_db("SELECT * FROM os_at_sintomas WHERE hist = 'N'","SQL_NONE","N");
$rs_laudos = $db->query_db("SELECT * FROM os_at_laudos WHERE hist = 'N'","SQL_NONE","N");
$rs_srv_exec = $db->query_db("SELECT * FROM os_at_srv_exec WHERE hist = 'N'","SQL_NONE","N");

include ("templates/assistencia_tecnica_admin_atualiza_ianalises.htm");

$db->disconnect();

?>
