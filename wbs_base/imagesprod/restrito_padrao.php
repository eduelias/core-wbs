<?
##############################################################
# ARQUIVO: RESTRITO.PHP
# DATA: 22/03/2005
# DESCRICAO: VERIFICA SE O USUARIO ESTA LOGADO
##############################################################

//set the start time so we can calculate how long it takes to load the page.
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];


function check_root_session ()
{
   session_start ();
   if (!session_is_registered ("login"))
   {
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "start_login_page.php?erro=1");
		exit;
   }
   $ROOTID_USERNAME = $_SESSION['login'];
   return $ROOTID_USERNAME;
}
	//VERIFICA LOGOUT
	if ($stoplog == 1){
		session_start();
	        session_unset();
	        session_destroy();
	}

	// VERIFICA SE EXISTE A SESSAO

	session_start();
	$login_vend = check_root_session ();

	require("classprod.php" );
	$prod = new operacao();


	// INICIO LOGIN - GRAVA LOG DE ENTRADA
	if ($startlog == 1):

		$dataatual = $prod->gdata();
		$prod->setcampo1($login);
		$prod->setcampo2($dataatual);
		$prod->setcampo4($REMOTE_ADDR);
		$prod->addProd("logacesso", $ureg);
		$codlog=$ureg;
		$datastart=$dataatual;
		$datastart = $prod->fdata($datastart);
	else:
		$prod->listProdgeral("logacesso", "login='$login'", $array08, $array_campo08, "ORDER BY datastart DESC LIMIT 1" );
		$prod->mostraProd($array08, $array_campo08, 0 );
		$codlog = $prod->showcampo0();
		$datastart = $prod->showcampo2();
		$ipremote = $prod->showcampo4();
		$datastart = $prod->fdata($datastart);
	endif;

	// INICIO PESQUISA POR PAGINA SELECIONADA
 	$prod->listProdSum("codvend, tipo, codgrp, block, msg", "vendedor", "nome='$login'", $array01, $array_campo01, "" );

	if (count($array01) == 1){

	$prod->mostraProd($array01, $array_campo01, 0 );
		$codvend = $prod->showcampo0();
		$tipo = $prod->showcampo1();
		$codgrp = $prod->showcampo2();
		$blockuser = $prod->showcampo3();
		$msguser = $prod->showcampo4();
	}
	$prod->listProd("segurancagrp", "codgrp = '$codgrp'");
	$nomegrp = $prod->showcampo1();

	$prod->listProdgeral("segurancaacesso", "codgrp = '$codgrp' and codpg = '$pg'", $array02, $array_campo02, "" );
	
	if (count($array02) <> 0){

		#echo("Exite PG");

		$prod->listProd("seguranca", "codpg='$pg'");
		$nomem = $prod->showcampo1();
		$arquivo = $prod->showcampo2();

	}else{
		#echo("Nao Exite PG");

		$prod->listProd("segurancaacesso", "codgrp='$codgrp' and inicio='S'");
		$codpginicio = $prod->showcampo2();

		$prod->listProd("seguranca", "codpg='$codpginicio'");
		$nomem = $prod->showcampo1();
		$arquivo = $prod->showcampo2();
		$Action = "list";
	}
	
	$retlogin=1; // VARIAVEL DE RETORNO PARA PROGRAMAS ANTIGOS

	// VARIAVEIS DO GERAIDREMOTO.PHP - ACESSO DE FORA DA IPASOFT
	$iplocal = $REMOTE_ADDR;
	$id = "ky5d6";
	$id = md5($id);

	# 2 => ADMIN  14 => REVENDAS  27 => CORPORATIVO  21 => SUPERVISOR  30 => COMPRAS

	if (($iplocal <> "200.195.14.10" and $iplocal <> "200.202.216.12" and $iplocal <> "200.202.216.13" and $iplocal <> "200.251.60.7" and $iplocal <> "127.0.0.1" and $iplocal <> "10.10.0.113")){
		if ($codgrp <> 2 and $codgrp <> 14 and $codgrp <> 27 and $codgrp <> 21 and $codgrp <> 30){
                       	if ($idremoto <> $id){
				$restricao_user = 1;
			}//IF ID REMOTO
		}//IF GRUPOS
	}//IF IP'S

	if ($restricao_user == 1){
		header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "start_login_page.php?erro=1");
		exit;
 	}else{
 	        // INCLUI ARQUIVO SOLICITADO
 		include ("$arquivo");
 	}
 	

?>
