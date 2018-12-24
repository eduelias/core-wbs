<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     restrito.php
+--------------------------------------------------------------
*/

header('Content-Type: text/html; charset=ISO-8859-1');
////////////////// EDITADO POR KICO -> ELEVADO POR EDUARDO  ///////////////////////
	
	
	#include("../wbs_vortex/include/var.php");
	include("../wbs_vortex/include/class.php");
	include("../wbs_vortex/include/functions.php");
	include("include/classes/vendedor.class.php");
	include("include/classes/segurancagrp.class.php");

////////////////////////////////////////////////////////////////////////////////////

// set the start time so we can calculate how long it takes to load the page.
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];

// Inclue as classes
include("config.inc.php");
include("classprod.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

// Estancia as classes
$prod = new operacao();
$db = new Padrao();

#echo"AQUI";

// Inicializa conexões de banco de dados
$db->connect_wbs();

// Degub ADODB (true/false)
$db->conn->debug = false;

// Pega datahora atual do sistema
$datahoraatual = $db->datahoraatual();

	if(isset($_POST['campousuario'])){
	
		$starter = $_POST;
	
	} else {
	
		@session_start();
		$starter = $_SESSION;	
	}
	//pre($starter);

	$login = new login($starter);
	$login->checklogin();

	/////////////////////////////////////////
	// PEGA TODOS OS DADOS DO USUÁRIO LOGADO
	/////////////////////////////////////////
	$userlogged = new vendedor();
	$userlogged->getdadosfromid($login->getid());
	/////////////////////////////////////////

	$login = $userlogged->getnome();

	$codvend = $userlogged->getcodvend();
	$tipo = $userlogged->gettipo();
	$codgrp = $userlogged->getcodgrp();
	$codgrp_vend = $userlogged->getcodgrp();
	$blockuser = $userlogged->getblock();
	$msguser = $userlogged->getmsg();
	$codemp_vend = $userlogged->getcodemp();
	$codemp_transf_vend = $userlogged->getcodemp_transf();
	$codproj_vend = $userlogged->getcodproj();
	$allemp_vend = $userlogged->getallemp();
	$tipouserproj_vend = $userlogged->gettipouserproj();
	$tipo_celular_vend = $userlogged->gettipo_celular();
	$tipo_info_vend = $userlogged->gettipo_info();

	// código usuário rodapé
	$tipegueiprint = "[$codvend]"; 
/*
// Função para checar se o usuário esta logado
function check_root_session()
{
   session_start ();
   if (!session_is_registered("rootid"))
   {
        if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
        header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar ."start_login_page.php?erro=1");
		exit;
   }
   $ROOTID_USERNAME = $_SESSION['rootid'];
   return $ROOTID_USERNAME;
}

// Inicializa a sessão e verifica se usuário esta logado
session_start();
$login_vend = check_root_session();
$login = $login_vend;

// Dados do Usuário
$rs_usuario = $db->query_db("SELECT codvend, tipo, codgrp, block, msg, codemp, codemp_transf, codproj, allemp, tipouserproj, tipo_celular, tipo_info FROM vendedor WHERE nome = '$login_vend'","SQL_NONE","N");
$codvend = $rs_usuario->fields['codvend'];
$tipo = $rs_usuario->fields['tipo'];
$codgrp = $rs_usuario->fields['codgrp'];
$codgrp_vend = $codgrp;
$blockuser = $rs_usuario->fields['block'];
$msguser = $rs_usuario->fields['msg'];
$codemp_vend = $rs_usuario->fields['codemp'];
$codemp_transf_vend = $rs_usuario->fields['codemp_transf'];
$codproj_vend = $rs_usuario->fields['codproj'];
$allemp_vend = $rs_usuario->fields['allemp'];
$tipouserproj_vend = $rs_usuario->fields['tipouserproj'];
$tipo_celular_vend = $rs_usuario->fields['tipo_celular'];
$tipo_info_vend = $rs_usuario->fields['tipo_info'];

// código usuário rodapé
$tipegueiprint = "[$codvend]"; 


*/


// Dados do Grupo
$rs_ngrupo = $db->query_db("SELECT nomegrp, hsenha FROM segurancagrp WHERE codgrp = '$codgrp'","SQL_NONE","N");
$nomegrp = $rs_ngrupo->fields['nomegrp'];
$hsenhagrp = $rs_ngrupo->fields['hsenha'];

$rs_pg = $db->query_db("SELECT * FROM segurancaacesso WHERE codgrp = '$codgrp' AND codpg = '$pg'","SQL_NONE","N");
$verifica_pg = $rs_pg->_numOfRows;

if($verifica_pg <> 0)
{
	// Existe PG
	$rs_s_pg = $db->query_db("SELECT * FROM seguranca WHERE codpg = '$pg'","SQL_NONE","N");
	$nomem = $rs_s_pg->fields['nomem'];
	$arquivo = $rs_s_pg->fields['arquivo'];
	$visivel_pg = $rs_s_pg->fields['actionpg'];
	$codmenu_pg = $rs_s_pg->fields['codmenu'];
	$modulo_pg = $rs_s_pg->fields['modulo'];
	$manutencao_pg = $rs_s_pg->fields['manutencao'];
	$senha_pg = $rs_s_pg->fields['senha'];
}
else
{
	// Não existe PG
	$rs_n_pg1 = $db->query_db("SELECT * FROM segurancaacesso WHERE codgrp = '$codgrp' AND inicio = 'S'","SQL_NONE","N");
	$codpginicio = $rs_n_pg1->fields['codpg'];
	
	$rs_n_pg2 = $db->query_db("SELECT * FROM seguranca WHERE codpg = '$codpginicio'","SQL_NONE","N");
	$nomem = $rs_n_pg2->fields['nomem'];
	$arquivo = $rs_n_pg2->fields['arquivo'];
	$visivel_pg = $rs_n_pg2->fields['actionpg'];
	$codmenu_pg = $rs_n_pg2->fields['codmenu'];
	$modulo_pg = $rs_n_pg2->fields['modulo'];
	$manutencao_pg = $rs_n_pg2->fields['manutencao'];
	$senha_pg = $rs_n_pg2->fields['senha'];

	$pg = $codpginicio;
	$Action = "list";
}
/*
// Usuários OnLine
define("TIMEOUT", 5);
$rs_online_r = $db->query_db("SELECT count(*) as retorno FROM usuarios_online WHERE codusuario = '$codvend'","SQL_NONE","N");
if($rs_online_r->fields['retorno'] == 0)
{
  	$rs_online_i = $db->query_db("INSERT INTO usuarios_online (codusuario, login, ip, horaacesso, pg, pg_ped, datahoraacesso) VALUES ('$codvend', UCASE('$login'), '".$_SERVER["REMOTE_ADDR"]."', NOW(), '".$db->discover_method("pg")."', '".$db->discover_method("pg_ped")."', '$datahoraatual')","SQL_NONE","N");
} else {
  	$rs_online_u = $db->query_db("UPDATE usuarios_online SET ip = '".$_SERVER["REMOTE_ADDR"]."', horaacesso = NOW(), pg = '".$db->discover_method("pg")."', pg_ped = '".$db->discover_method("pg_ped")."', datahoraacesso = '$datahoraatual' WHERE codusuario = '$codvend'","SQL_NONE","N");
}
$inativo = "2006-06-29 12:10:10";
//echo "inativo: $inativo<br />";
//echo "atual: ".$db->datahoraatual()."<br />";
//$rs_online_d = $db->query_db("DELETE FROM usuarios_online WHERE horaacesso < '$inativo'","SQL_NONE","N");
*/
// Variáveis de programas antigos
$retlogin = 1;
if($desloc == "") { $desloc = 0; }
if($hist == "") { $hist = 0; }

// Variáveis ID Remoto
$iplocal = $REMOTE_ADDR;
$id = "ky5d6";
$id = md5($id);
$restricao_user = 0; // Restrinção de usuário para ID Remoto
$servico = 0;  // 0 - Sistema em funcionamento 1 - Sistema em Manutençao

//MENSAGEM PAGINA INICIAL
$rs_msg_ini = $db->query_db("SELECT codpopup, (SELECT COUNT(*) FROM popup_confirm WHERE (codvend = '$codvend') and codpopup = popup.codpopup) as cont FROM popup WHERE (codgrp like '%:$codgrp:%' OR codgrp like '%:-1:%') AND NOW() > datahorainicio AND datahorafim > NOW() AND status = 'HAB' and pg_ini = 1 having cont = 0  ","SQL_NONE","N");

if ($rs_msg_ini->fields[0]){
$codpup_pg_ini = $rs_msg_ini->fields[0];
	$msg_inicial = 1; // MOSTRA MSG
}else{
	$msg_inicial = 0; // NAO POSSUI MSG
}

// ID Remoto - Verificação de Grupos e de IPs
// Verificação Grupo
$rs_idremoto_grps = $db->query_db("SELECT count(*) FROM idremoto_grps WHERE codgrp = '$codgrp'","SQL_NONE","N");
$numRows_grp = $rs_idremoto_grps->fields[0];
#echo "ngrp=".$numRows_grp;

// Verificação IP
$rs_idremoto_ips = $db->query_db("SELECT count(*) FROM idremoto_ips WHERE ip = '$iplocal' ","SQL_NONE","N");
$numRows_ip = $rs_idremoto_ips->fields[0];
#echo "nip=".$numRows_ip;

if($numRows_ip <> 1)
{
	#echo $iplocal;
	if($numRows_grp <> 1)
	{
		#echo $codgrp;
		if($_COOKIE['idremoto'] <> $id)
		{
			#echo $_COOKIE['idremoto'];
			$restricao_user = 1;
		}// IF Cookie ID Remoto
	}// IF Grupo
}// IF IP
 
 
 
 if($restricao_user == 1)
{
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	#header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar ."start_login_page.php?erro=2");
	header("Location:". DIR_HOME . "/wbs_vortex/index.php?erro=2");

	exit();
}
else
{

	if($arquivo == "start_ped_index.php"){$menu_not = 1;} //USA COOKIE
	if($arquivo == "start_ped_atacado_index.php"){$menu_not = 1;} //USA COOKIE
	if($arquivo == "start_ped_distribuidor_index.php"){$menu_not = 1;} //USA COOKIE
	if($arquivo == "start_ped_rev_distribuidor_index.php"){$menu_not = 1;} //USA COOKIE
	if($arquivo == "start_ped_distribuidor_especial_index.php"){$menu_not = 1;} //USA COOKIE
	if($arquivo == "start_ped_distribuidor_direto_index.php"){$menu_not = 1;} //USA COOKIE
	if($visivel_pg == "N" and $codmenu_pg == 2){$menu_not = 1;} //ARQUIVOS OCULTOS
	if($modulo_pg == "S"){$dir_arq = DIR_SISTEMA."/";} else	{$dir_arq = "";} // Se Arquivo for Módulo
	if(MODULOS_ACTIVE == "N"){$dir_arq = "";}// Ativar Módulos
	
	if($servico == 0 and $msg_inicial == 0){
	
	// MONTAGEM DO ARQUIVO
	// topo
	if($menu_not <> 1){include("start_layout_topo_index.php");}
	
		// Manutencao
		if($manutencao_pg == "S") {
			include($dir_arq."start_manutencao_index.php");
		} else {
			// Securitykey
			if(($senha_pg == "S") AND ($_SESSION['secure_ch'][$pg] <> true)) {
				## Com Normal
				if($hsenhagrp == "S"){
					include($dir_arq."start_securitykey_index.php");
				} else {
					#echo "aqui";
					include($dir_arq.$arquivo);
				}
			} else {
				## Sem Senha
				include($dir_arq.$arquivo);
			}
		} 
	
	//rodape
	if($menu_not <> 1) {include ("start_layout_rodape_index.php");}
	
  }else{

	if ($servico == 1){
  		include($dir_arq."start_manutencao_index.php");

	//MSG_inicial
	}else{
		$pg_ped = 4;
		$menu_not=1;
		$codpopupselect=$codpup_pg_ini;
		include($dir_arq."start_noticias_index.php");
		#echo 'felipe - $codpup_pg_ini';
	}
  }
}

$db->disconnect();

/*

// Grava Log de acesso
// Variáveis
$pg_log = $db->discover_method("pg");
$pg_ped_log = $db->discover_method("pg_ped");
$ip_log = $_SERVER["REMOTE_ADDR"];
$so_nav = $_SERVER["HTTP_USER_AGENT"];
$url_log = $_SERVER["HTTP_REFERER"];

// Inicializa conexões de banco de dados
#$db->connect_data();

// Grava Log
$rs_insert_log = $db->query_db("INSERT INTO log_sistema (codvend, login, datahoraacesso, pg, pg_ped, ip, so_nav, url) VALUES ('$codvend', UCASE('$login'), NOW(), '$pg_log', '$pg_ped_log', '$ip_log', '$so_nav', '$url_log')","SQL_NONE","N");

// Fecha todas as conexões de banco de dados
$db->disconnect();
*/
?>