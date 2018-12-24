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
|  arquivo:     start_home_index.php
|  template:    home_index.htm
+--------------------------------------------------------------
*/

/*
Grava
$cond_orc = str_replace("\r", '', $cond_orc);
$cond_orc = str_replace( "\n", '<br />', $cond_orc );
$cond_orc = htmlentities($cond_orc); // GRAVA CODIGOS HTML

Lê
$cond_orc = html_entity_decode($cond_orc);
*/

/*
+--------------------------------------------------------------
|  CÓDIGOS ANTIGOS
|  INÍCIO
+--------------------------------------------------------------
*/

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";                                   // Tabela EM USO
$condicao1 = "codcat=$codcat";                          // condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL
$condicao2 = "";                                        // condicao sem WHERE e separadas por AND or OR -> LISTAR
$parm = " order by nomecat limit $desloc,$acrescimo ";  // order by nome
$campopesq = "nomecat";                                 // Campo a ser pesquisado -> LISTAR
$nomeform = "CATEGORIA";
$titulo = "HOME";

$Actionter = "unlock";

// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();

//DADOS DO USUARIO
$prod->listProd("vendedor", "nome='$login'");

$nomevendselect = $prod->showcampo1();
$codvendselect = $prod->showcampo0();
$tipovend = $prod->showcampo2();
$codgrpold = $prod->showcampo3();
$tipoclienteold = $prod->showcampo7();
$docold = $prod->showcampo8();
$codproj = $prod->showcampo25();
$tipouserproj = $prod->showcampo26();
$meta = $prod->showcampo27();

if ($tipoclienteold == "F") {
	$prod->listProd("clientenovo", "cpf='$docold'");
	$xcodcliente=	$prod->showcampo0();
} else {
	$prod->listProd("clientenovo", "cnpj='$docold'");
	$xcodcliente=	$prod->showcampo0();
}

$prod->listProd("clientenovo", "codcliente=$xcodcliente");

// Dados do Cliente
$xcodcliente=	$prod->showcampo0();
$xnome=			$prod->showcampo1();
$xcpf=			$prod->showcampo4();
$xcnpj=			$prod->showcampo5();
$xendereco=		$prod->showcampo14();
$xbairro=		$prod->showcampo15();
$xcidade=		$prod->showcampo16();
$xcep=			$prod->showcampo17();
$xestado=		$prod->showcampo18();
$xdddtel1=		$prod->showcampo21();
$xtel1=			$prod->showcampo22();
$xdddtel2=		$prod->showcampo23();
$xtel2=			$prod->showcampo24();
$xramal=		$prod->showcampo25();
$xemail=		$prod->showcampo77();
$xNumero = 		$prod->showcampo90();
$xComplemento = $prod->showcampo91();

/*
+--------------------------------------------------------------
|  CÓDIGOS ANTIGOS
|  FIM
+--------------------------------------------------------------
*/

// Votação
$prod->clear();
$prod->listProdU("count(*)","vot_votos", "");
$totalvotos = $prod->showcampo0();

$prod->clear();
$prod->listProdSum("codcandidato, (count(*)/$totalvotos)*100 as porc", "vot_votos", "", $arrayx, $array_campox, "GROUP BY codcandidato ORDER BY porc DESC");
for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );

	$codcandidato_list[$i] = $prod->showcampo0();
	$porccandidato_list[$i] = $prod->showcampo1();
	
	$prod->clear();
	$prod->listProdU("doc","vendedor", "codvend = '$codcandidato_list[$i]'");
	$doccandidato_list[$i] = $prod->showcampo0();

	$prod->clear();
	$prod->listProdU("nome","clientenovo", "cpf = '$doccandidato_list[$i]' and tipocliente = 'F'");
	$nomecandidato_list[$i] = $prod->showcampo0();
	$nomecandidato_list[$i] = explode(" ", $nomecandidato_list[$i]);
	$nomecandidato_list[$i] = $nomecandidato_list[$i][0];
	$nomecandidato_list[$i] = strtoupper($nomecandidato_list[$i]);
}

include ("templates/home_index.htm");

?>
