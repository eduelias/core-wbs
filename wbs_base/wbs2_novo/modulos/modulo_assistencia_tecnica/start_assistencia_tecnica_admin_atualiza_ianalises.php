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

//$db->conn->debug = true;

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
            $rs_laudo_libgar = $db->query_db("SELECT libgar FROM os_at_laudos WHERE codlaudo = '$codlaudo_save'","SQL_NONE","N");    
            $condicaosql .= " codlaudo = '$codlaudo_save', datalaudo = NOW(), libgar = '".$rs_laudo_libgar->fields['libgar']."' ";
        }
        if ($codsrvexec_save <> "-1" AND $codsrvexec_save <> "")
        {
            if ($condicaosql <> "") { $condicaosql .= " , "; }
            $rs_srv_exec_tipo = $db->query_db("SELECT codtipo FROM os_at_srv_exec WHERE codsrv_exec = '$codsrvexec_save'","SQL_NONE","N"); 
            $condicaosql .= " codsrv_exec = '$codsrvexec_save', datasrv_exec = NOW(), codtipo_srv_exec = '".$rs_srv_exec_tipo->fields['codtipo']."' ";
        }
        //echo "<b>condicaosql:</b> $condicaosql<br>";
        if ($condicaosql <> "")
        {
           $rs_gravar = $db->query_db("UPDATE os_at_analise SET $condicaosql WHERE codanalise = '$codos_at_analise_select'","SQL_NONE","N");
        }
    break;
    
    case "Cancelar" :
        $rs_cancela = $db->query_db("UPDATE os_at_analise SET cancel = 'S', datacancel = NOW() WHERE codanalise = '$codos_at_analise_select'","SQL_NONE","N");
    break;
    
    case "Excluir" :
        $rs_excluir = $db->query_db("DELETE FROM os_at_analise WHERE codanalise = '$codos_at_analise_select'","SQL_NONE","N");
    break;
}

$rs_analises = $db->query_db("SELECT codanalise, codsintoma, codlaudo, codsrv_exec, cancel, datacancel FROM os_at_analise WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$rs_sintomas = $db->query_db("SELECT * FROM os_at_sintomas WHERE hist = 'N' ORDER BY descricao","SQL_NONE","N");
$rs_laudos = $db->query_db("SELECT * FROM os_at_laudos WHERE hist = 'N' ORDER BY descricao","SQL_NONE","N");

$rs_status_os = $db->query_db("SELECT status FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

// PESQUISA NUMERO DE LAUDOS COM LIBGAR = N
$rs_qtde_libgar = $db->query_db("SELECT COUNT(*) as qtde FROM os_at_analise WHERE codos_at = '$codos_at_select' and libgar = 'N' and codlaudo <> '0'","SQL_NONE","N");

/*
$rs_qtde_libgar = $db->query_db("SELECT * FROM os_at_analise WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
$numRows_qtde_libgar = $rs_qtde_libgar->_numOfRows;
if ($rs_analises_status)
{
   while (!$rs_qtde_libgar->EOF)
   {
       if ($rs_qtde_libgar->fields['libgar'] == "S")
       {
          $qtde_libgar_s = $qtde_libgar_s + 1;
       }
       else
       {
          $qtde_libgar_n = $qtde_libgar_n + 1;
       }   
       $rs_qtde_libgar->MoveNext();
   }
   */
   if ($rs_qtde_libgar->fields['qtde'] >= 2 )
   {
   	 
      $rs_os_lib = $db->query_db("UPDATE os_at SET os_lib = 'N' WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
   }
   if ($rs_qtde_libgar->fields['qtde'] < 2 )
   {
   
      $rs_os_lib = $db->query_db("UPDATE os_at SET os_lib = 'S' WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
   }
//}

include ("templates/assistencia_tecnica_admin_atualiza_ianalises.htm");

$db->disconnect();

?>
