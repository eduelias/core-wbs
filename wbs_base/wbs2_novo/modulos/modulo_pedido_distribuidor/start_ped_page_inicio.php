<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN


// Busca codvend
$prod->listProdU("codvend, allemp, codemp, codgrp, tipo", "vendedor", "nome = '$login'");
$var_codvend = $prod->showcampo0();
$var_allemp = $prod->showcampo1();
$var_codgrp = $prod->showcampo3();
$var_tipo = $prod->showcampo4();

if ($var_allemp <> 'Y'){
	$var_codemp = $prod->showcampo2();
}

echo $Action;

switch ($Action)
{
	case "start":
	
		if ($ck == "NO") {
		
          		// DELETE PEDIDO TEMPORARIO
		        $prod->delProd("pedidotemp", "codped = '$id_session'");
		        
			// Adicionando Pedido Temporário
			$prod->clear();
			$prod->setcampo1($var_codemp);
			#$prod->setcampo3($var_codvend);
			$prod->setcampo2($codcliente_cli);
			$prod->setcampo3($codvend_cli);
			
	 		$prod->addProd("pedidotemp", $ureg);
	 		#$ureg=1;

			// Cria cookie
			$prod->begin_id("id_session", $ureg);
			if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
			header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=2&codpedselect=$ureg");

		}else{
		        if ($id_session == ""){

		        	// Adicionando Pedido Temporário
				$prod->clear();
				$prod->setcampo1($var_codemp);
				#$prod->setcampo3($var_codvend);
				$prod->setcampo2($codcliente_cli);
				$prod->setcampo3($codvend_cli);
		 		$prod->addProd("pedidotemp", $ureg);

				// Cria cookie
				$prod->begin_id("id_session", $ureg);

				$id_novo = $ureg;
			}else{

				$id_novo = $id_session;
			}
			if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
		        header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=2&codpedselect=$id_novo");

		}
		break;
		
	
		
		
	default:
	
		if ($var_codvend == 542 or $var_codvend == 543){$cond_emp = "codemp = 14";}else{$cond_emp = "(codemp = 14 or codemp = 20)";}
	
		$prod->listProdSum("codemp, nome", "empresa", $cond_emp, $arrayemp, $arrayemp_campo, "ORDER BY nome DESC");
		for($i = 0; $i < count($arrayemp); $i++ ){
			$prod->mostraProd( $arrayemp, $arrayemp_campo, $i );

			$codemp[$i] = $prod->showcampo0();
			$nomeemp[$i] = $prod->showcampo1();
		}
		
		// PESQUISA POR CLIENTE
		if ($frmDOC <> ""){
		
		if ($tipo_cli == "F"){$cond = "cpf = '$frmDOC' and tipocliente = '$tipo_cli'";}else{$cond = "cnpj = '$frmDOC' and tipocliente = '$tipo_cli'";}
		
		$prod->clear();
        $prod->listProdU("codcliente, nome, logincad, cidade, estado ", "clientenovo", "$cond");
			$codcliente_cli = $prod->showcampo0();
			$nome_cli = $prod->showcampo1();
			$logincad_cli = $prod->showcampo2();
			$cidade_cli = $prod->showcampo3();
			$estado_cli = $prod->showcampo4();
			 
			$prod->listProdU("codvend", "vendedor", "nome = '$logincad_cli'");
			$codvend_cli = $prod->showcampo0();
		
		
		#echo "AQUI - $frmDOC - $tipo_cli - $codcliente_cli - $nome_cli - $logincad_cli - $codvend_cli";
		
		}else{
			$codcliente_cli = "";
			$codvend_cli = "";
		}
		
		
		
		if ($var_allemp <> "Y"){
		
			if ($id_session <> ""){
				// Chama a Template
				include ("templates/ped_page_inicio.htm");
			} else {
				// Adicionando Pedido Temporário
				$prod->clear();
				$prod->setcampo1($var_codemp);
				#$prod->setcampo3($var_codvend);
				$prod->setcampo2($codcliente_cli);
				$prod->setcampo3($codvend_cli);
		 		$prod->addProd("pedidotemp", $ureg);

    				// Cria cookie
				$prod->begin_id("id_session", $ureg);

			// Chama a Template
			if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
			header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=2&codpedselect=$ureg");
   
			}
		} else {
		
		        #include("topo.php");
		
		       	include("templates/ped_page_inicio.htm");
		       	
		       	#include("rodape.php");

		}
		break;
}



?>
