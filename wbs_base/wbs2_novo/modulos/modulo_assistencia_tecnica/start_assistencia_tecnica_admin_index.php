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
|  arquivo:     start_assistencia_tecnica_admin_index.php
|  template:    assistencia_tecnica_admin_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 30;

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    // Pesquisa
    case "Pesquisar" :
        $condicaopesq = " hist = '$hist' AND ";
        if ($status)
        {
            $condicaopesq .= " os_at.status = '$status' AND ";
        }
        if ($codospesq)
        {
            $condicaopesq .= " codbarra_os_at = '$codospesq' AND ";
        }
        if ($nomeclientepesq)
        {
            $condicaopesq .= " clientenovo.nome LIKE '%$nomeclientepesq%' AND ";
        }
        if ($codtecnico)
        {
            $condicaopesq .= " (codtecnico = '$codtecnico' or codtecnico = '-1') AND ";
        }
            
        if ($numdias)
        {
            $condicaopesq .= " (DATE_SUB( CURDATE( ) , INTERVAL $numdias DAY ) >= dataos_at_ini) AND ";
        }
        
        break;

    case "CancelarTemp" :
         // Deleta Analises
         $rs_excluir_analiases = $db->query_db("DELETE FROM os_at_analise WHERE codos_at = '".$db->discover_method('codos_at_temp_select')."'","SQL_NONE","N");

         // Deleta OS_AT
         $rs_excluir_os_at = $db->query_db("DELETE FROM os_at WHERE codos_at = '".$db->discover_method('codos_at_temp_select')."'","SQL_NONE","N");

         // Deleta OS_AT
         $rs_excluir_status = $db->query_db("DELETE FROM os_at_status WHERE codos_at = '".$db->discover_method('codos_at_temp_select')."'","SQL_NONE","N");
         break;

    case "LiberaGarantia" :
         $rs_atualiza_os_at = $db->query_db("UPDATE os_at SET os_lib = 'S' WHERE codos_at = '".$db->discover_method('codos_at_select')."'","SQL_NONE","N");
         $rs_atualiza_analises = $db->query_db("UPDATE os_at_analise SET libgar = 'S' WHERE codos_at = '".$db->discover_method('codos_at_select')."'","SQL_NONE","N");
         break;

    case "CriarP1" :
    	if ($db->discover_method('onsite') == 'OK'){$onsite_novo = 'OK';}else{$onsite_novo = 'NO';}
    	
         // Insere dados na OS_AT temporaria
         $rs_inserir_os_at_temp = $db->query_db("UPDATE os_at_temp SET contato = '".$db->discover_method('contato')."', dddtel1 = '".$db->discover_method('dddtel1')."', tel1 = '".$db->discover_method('tel1')."', dddtel2 = '".$db->discover_method('dddtel2')."', tel2 = '".$db->discover_method('tel2')."', datanf = '".$db->discover_method('datanf')."', nf = '".$db->discover_method('nf')."', codtecnico = '".$db->discover_method('tecnico')."', os_at_descricao_equip = UCASE('".$db->discover_method('descricao_equip')."'), os_obs = UCASE('".$db->discover_method('os_obs')."'), os_obs_srv_exec = UCASE('".$db->discover_method('os_obs_srv_exec')."'), onsite = '".$onsite_novo."' WHERE codos_at = '".$db->discover_method('codos_at_temp_select')."'","SQL_NONE","N");

         // Pega os dados da OS_AT temporaria
         $rs_select_os_at_temp = $db->query_db("SELECT * FROM os_at_temp WHERE codos_at = '".$db->discover_method('codos_at_temp_select')."'","SQL_NONE","N");

         // Pega os dados da analise da OS_AT temporaria
         $rs_select_os_at_analise_temp = $db->query_db("SELECT * FROM os_at_analise_temp WHERE codos_at = '".$db->discover_method('codos_at_temp_select')."'","SQL_NONE","N");
         
         // Pega quantidade de analiases
         $numRows_analiases = $rs_select_os_at_analise_temp->_numOfRows;

         // Insere os dados da temporaria na real
         $rs_inserir_os_at = $db->query_db("INSERT INTO os_at (codemp, codcliente, codvend, codped, codbarra_ped, codtipo_serv, codtecnico, status, os_at_descrisao_equip, cancel, os_obs, contato, dddtel1, tel1, dddtel2, tel2, caixa, conf_cb, valor_dif_produto, valor_garantia, dataos_at_ini, datanf, nf, os_lib, os_obs_srv_exec, onsite) VALUES ('".$rs_select_os_at_temp->fields['codemp']."', '".$rs_select_os_at_temp->fields['codcliente']."', '".$rs_select_os_at_temp->fields['codvend']."', '".$rs_select_os_at_temp->fields['codped']."', '".$rs_select_os_at_temp->fields['codbarra_ped']."', '".$rs_select_os_at_temp->fields['codtipo_serv']."', '".$rs_select_os_at_temp->fields['codtecnico']."', '".$rs_select_os_at_temp->fields['status']."', '".$rs_select_os_at_temp->fields['os_at_descricao_equip']."', '".$rs_select_os_at_temp->fields['cancel']."', '".$rs_select_os_at_temp->fields['os_obs']."', '".$rs_select_os_at_temp->fields['contato']."', '".$rs_select_os_at_temp->fields['dddtel1']."', '".$rs_select_os_at_temp->fields['tel1']."', '".$rs_select_os_at_temp->fields['dddtel2']."', '".$rs_select_os_at_temp->fields['tel2']."', '".$rs_select_os_at_temp->fields['caixa']."', '".$rs_select_os_at_temp->fields['conf_cb']."', '".$rs_select_os_at_temp->fields['valor_dif_produto']."', '".$rs_select_os_at_temp->fields['valor_garantia']."', '".$rs_select_os_at_temp->fields['dataos_at_ini']."', '".$rs_select_os_at_temp->fields['datanf']."', '".$rs_select_os_at_temp->fields['nf']."', '".$rs_select_os_at_temp->fields['os_lib']."', '".$rs_select_os_at_temp->fields['os_obs_srv_exec']."', '".$rs_select_os_at_temp->fields['onsite']."')","SQL_NONE","S");

         // Pega codigo da OS_AT gravada
         $codos_at_insert = $db->conn->Insert_ID();
         
         // Gera codbarra da OS_AT
         $codbarra_grava = $db->func_codbarra(1, $codos_at_insert, "OS_AT");
         
         // Grava o codbarra na tabela
         $rs_atualiza_os_at = $db->query_db("UPDATE os_at SET codbarra_os_at = '$codbarra_grava', status = 'ABERTA' WHERE codos_at = '$codos_at_insert'","SQL_NONE","N");

         // GRAVA STATUS 
         $rs_inserir_os_at_status = $db->query_db("INSERT INTO os_at_status (codos_at, datahorastatus, status, login) VALUES ($codos_at_insert, NOW(), UCASE('ABERTA'), UCASE('$login'))","SQL_NONE","N");
          

         // Insere as analises temporarias e grava na real
         while (!$rs_select_os_at_analise_temp->EOF)
         {
               $rs_inserir_os_at_analise = $db->query_db("INSERT INTO os_at_analise (codsintoma, codlaudo, codsrv_exec, codos_at, datasintoma, datalaudo, datasrv_exec, cancel, datacancel, libgar) VALUES ('".$rs_select_os_at_analise_temp->fields['codsintoma']."', '".$rs_select_os_at_analise_temp->fields['codlaudo']."', '".$rs_select_os_at_analise_temp->fields['codsrv_exec']."', '$codos_at_insert', '".$rs_select_os_at_analise_temp->fields['datasintoma']."', '".$rs_select_os_at_analise_temp->fields['datalaudo']."', '".$rs_select_os_at_analise_temp->fields['datasrv_exec']."', '".$rs_select_os_at_analise_temp->fields['cancel']."', '".$rs_select_os_at_analise_temp->fields['datacancel']."', '".$rs_select_os_at_analise_temp->fields['libgar']."')","SQL_NONE","N");
               $rs_select_os_at_analise_temp->MoveNext();
         }

        
         break;
}

$rs_count = $db->query_db("SELECT count(*) AS total_reg FROM os_at, clientenovo WHERE $condicaopesq clientenovo.codcliente = os_at.codcliente","SQL_NONE","N");
$total_reg = $rs_count->fields[0];

$rs_tecnico = $db->query_db("SELECT codtecnico, tecnico FROM os_at_tecnicos WHERE  habilitado = 'S'","SQL_NONE","N");

// PARTICULARIDADES DO PAGINADOR
// select ou numero
$paginator->define_var($acrescimo, $PHP_SELF, $total_reg, "select");
$inicio_pesq = $pagina * $acrescimo;

$rs_lista = $db->query_db("SELECT codos_at, codbarra_os_at, nome, codtecnico, dataos_at_ini, status, caixa, os_lib FROM os_at, clientenovo WHERE $condicaopesq clientenovo.codcliente = os_at.codcliente ORDER BY dataos_at_ini DESC LIMIT $inicio_pesq, $acrescimo","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

include("templates/assistencia_tecnica_admin_index.htm");

$db->disconnect();

?>
