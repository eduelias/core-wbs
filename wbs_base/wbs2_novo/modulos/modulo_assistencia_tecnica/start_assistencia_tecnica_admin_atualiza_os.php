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
    case "Atualizar" :
    	
    	if ($db->discover_method('onsite') == 'OK'){$onsite_novo = 'OK';}else{$onsite_novo = 'NO';}
    	
         // Atualiza dados na OS_AT 
         $rs_atualiza_os_at = $db->query_db("UPDATE os_at SET contato = '".$db->discover_method('contato')."', dddtel1 = '".$db->discover_method('dddtel1')."', tel1 = '".$db->discover_method('tel1')."', dddtel2 = '".$db->discover_method('dddtel2')."', tel2 = '".$db->discover_method('tel2')."', datanf = '".$db->discover_method('datanf')."', nf = '".$db->discover_method('nf')."', codtecnico = '".$db->discover_method('tecnico')."', os_at_descrisao_equip = UCASE('".$db->discover_method('descricao_equip')."'), os_obs = UCASE('".$db->discover_method('os_obs')."'), os_obs_srv_exec = UCASE('".$db->discover_method('os_obs_srv_exec')."'),  onsite = '".$onsite_novo."' WHERE codos_at = '".$db->discover_method('codos_at_select')."'","SQL_NONE","S");

/////////////////////////////// NUMERO ANALISES ///////////////////////////////////////
         $rs_num_analises = $db->query_db("SELECT COUNT(*) as total_analises FROM os_at_analise WHERE codos_at = '$codos_at_select' AND cancel = 'N' ","SQL_NONE","N");
         
         $rs_numsrv_exec = $db->query_db("SELECT COUNT(*) as total_serv FROM os_at_analise WHERE codos_at = '$codos_at_select' AND cancel = 'N' AND codsrv_exec != '0'","SQL_NONE","N");
                 
/////////////////////////////// NUMERO DE LAUDOS ///////////////////////////////////////
        $rs_dados_os_at = $db->query_db("SELECT os_lib FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
		$rs_laudos_lib_s = $db->query_db("SELECT count(*) as total_laudos FROM os_at_analise WHERE codos_at = '$codos_at_select' AND cancel = 'N' AND codlaudo != '0'","SQL_NONE","N");
		
		echo "srv exec s: ".$rs_numsrv_exec->fields['total_serv']."<br />";
		echo "analise : ".$rs_num_analises->fields['total_analises']."<br />";
		if ((($rs_laudos_lib_s->fields['total_laudos'] > 0) AND ($rs_dados_os_at->fields['os_lib'] == "S")) and ($rs_numsrv_exec->fields['total_serv'] != $rs_num_analises->fields['total_analises']))
		{
		   $rs_os_lib = $db->query_db("UPDATE os_at SET status = 'DIAG' WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
		   // GRAVA STATUS 
           $rs_inserir_os_at_status = $db->query_db("INSERT INTO os_at_status (codos_at, datahorastatus, status, login) VALUES ($codos_at_select, NOW(), UCASE('DIAG'), UCASE('$login'))","SQL_NONE","N");
		}
		if ((($rs_laudos_lib_s->fields['total_laudos'] > 0) AND ($rs_dados_os_at->fields['os_lib'] == "N")) and ($rs_numsrv_exec->fields['total_serv'] != $rs_num_analises->fields['total_analises']))
		{
		   $rs_os_lib = $db->query_db("UPDATE os_at SET status = 'AGUARDA ANALISE' WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
		   // GRAVA STATUS 
		   $rs_inserir_os_at_status = $db->query_db("INSERT INTO os_at_status (codos_at, datahorastatus, status, login) VALUES ($codos_at_select, NOW(), UCASE('AGUARDA ANALISE'), UCASE('$login'))","SQL_NONE","N");
		}
	
/////////////////////////////// NUMERO DE SERVICOS EXECUTADOS //////////////////////////
		
	
		
		if ((($rs_numsrv_exec->fields['total_serv'] == $rs_num_analises->fields['total_analises'])) and ($rs_laudos_lib_s->fields['total_laudos'] == $rs_num_analises->fields['total_analises']))
		{
		   $rs_os_lib = $db->query_db("UPDATE os_at SET status = 'LIB ENTR', dataos_at_lib = NOW() WHERE codos_at = '$codos_at_select'","SQL_NONE","N");
		   // GRAVA STATUS 
		   $rs_inserir_os_at_status = $db->query_db("INSERT INTO os_at_status (codos_at, datahorastatus, status, login) VALUES ($codos_at_select, NOW(), UCASE('LIB ENTR'), UCASE('$login'))","SQL_NONE","N");
		}

/////////////////////////////// ENTREGUE //////////////////////////	
         if ($db->discover_method('status_fim') == "ENTREGUE")
         {
         	 $rs_analises = $db->query_db("SELECT SUM(minutos) as tempo_srv FROM os_at_analise,os_at_srv_exec, os_at_srv_exec_tipo   WHERE os_at_srv_exec.codsrv_exec= os_at_analise.codsrv_exec and os_at_srv_exec_tipo.codtipo= os_at_srv_exec.codtipo and  cancel = 'N' AND codos_at = '".$db->discover_method('codos_at_select')."' AND os_at_analise.codsrv_exec != '0'","SQL_NONE","N");   
         	 $rs_atualiza = $db->query_db("UPDATE os_at SET tempo_srv = '".$rs_analises->fields['tempo_srv']."', status = '".$db->discover_method('status_fim')."', dataos_at_entr = NOW() WHERE codos_at = '".$db->discover_method('codos_at_select')."'","SQL_NONE","N");  
          	 // GRAVA STATUS 
		 	 $rs_inserir_os_at_status = $db->query_db("INSERT INTO os_at_status (codos_at, datahorastatus, status, login) VALUES ($codos_at_select, NOW(), UCASE('ENTREGUE'), UCASE('$login'))","SQL_NONE","N");
         	
         }
                      
    break;
}

// INICIO TMP
$rs_tmp0 = $db->query_db("SELECT codcliente, codvend FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$rs_dados_cliente = $db->query_db("SELECT * FROM clientenovo WHERE codcliente = '".$rs_tmp0->fields['codcliente']."'","SQL_NONE","N");

// Dados OS_AT
$rs_dados_os_at = $db->query_db("SELECT * FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

// Dados Pedido
$rs_dados_ped = $db->query_db("SELECT onsite FROM pedido WHERE codped = '".$rs_dados_os_at->fields['codped']."'","SQL_NONE","N");

// TECNICO
$rs_tecnico = $db->query_db("SELECT codtecnico, tecnico FROM os_at_tecnicos WHERE habilitado = 'S'","SQL_NONE","N");
$rs_tecnico_select = $db->query_db("SELECT codtecnico, tecnico FROM os_at_tecnicos WHERE codtecnico = '".$rs_dados_os_at->fields['codtecnico']."'","SQL_NONE","N");

// status
$rs_status = $db->query_db("SELECT * FROM os_at_status_temp WHERE codos_at = '".$db->discover_method('codos_at_select')."'","SQL_NONE","N");
include ("templates/assistencia_tecnica_admin_atualiza_os.htm");

$db->disconnect();

?>
