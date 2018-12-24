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
|  arquivo:     start_vitrine_new.php
|  template:    vitrine_new.htm
+--------------------------------------------------------------
*/

// inicio da classe
$prod = new operacao();

// Busca codvend
$prod->listProdU("codvend, allemp, codemp, codemp_transf , codgrp", "vendedor", "nome = '$login'");
$var_codvend = $prod->showcampo0();
$var_allemp = $prod->showcampo1();
$var_codemp_transf = $prod->showcampo3();
$var_codgrp = $prod->showcampo4();

if ($var_allemp <> 'Y'){
	$var_codemp = $prod->showcampo2();
}

if (($var_codgrp == 32 or $var_codgrp == 51 or $var_codgrp = 56 or $var_codgrp == 53 or $var_codgrp == 22) and $var_codemp_transf <> 0){$condicao_transf = "codemp = '$var_codemp_transf'";}else{$condicao_transf = "";}

$dataatual = $prod->gdata();

switch ($Action)
{

	case "criar_vitrine":
	
        // CRIA ORCAMENTO
        if ($codemp_select<> "" and $nome_vitrine <> ""){
        $prod->clear();
        $prod->setcampo0("");
        $nome_vitrine = strtoupper($nome_vitrine);
        $prod->setcampo1($nome_vitrine);
        $prod->setcampo2("");
        $prod->setcampo3($codemp_select);
        $prod->setcampo4("N");
        $prod->addProd("codbarra_vitrine", $uregped);
        }
		break;
		
	case "hist_vitrine":

        // ENVIA PARA O HISTORICO
         #$prod->clear();
        $prod->upProdU("codbarra_vitrine", "hist = 'S'", "codvitrine='$codvitrine_select'");

		break;
		
	case "lib_vitrine":

        // ENVIA PARA O HISTORICO
         #$prod->clear();
        $prod->upProdU("codbarra_vitrine", "hist = 'N'", "codvitrine='$codvitrine_select'");

		break;
}

$prod->clear();
$prod->listProdSum("codvitrine, nomevitrine, codemp, hist", "codbarra_vitrine", $condicao_transf, $array_pesq, $array_campo_pesq, "ORDER BY nomevitrine");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codvitrine_pesq[$i] = $prod->showcampo0();
	$nomevitrine_pesq[$i] = $prod->showcampo1();
	$codemp_pesq[$i] = $prod->showcampo2();
    $hist_pesq[$i] = $prod->showcampo3();

$prod->clear();
$prod->listProdU("nome", "empresa", "codemp = '$codemp_pesq[$i]'");
$nomeemp_pesq[$i] = $prod->showcampo0();

}//FOR


$prod->clear();
$prod->listProdSum("codemp, nome", "empresa", $condicao_transf, $array_pesq1, $array_campo_pesq1, "ORDER BY nome");
for ($i = 0; $i < count($array_pesq1); $i++ )
{
	$prod->mostraProd( $array_pesq1, $array_campo_pesq1, $i );

	$codemp_pesq1[$i] = $prod->showcampo0();
	$nomeemp_pesq1[$i] = $prod->showcampo1();

}



include ("templates/vitrine_page_new.htm");

?>
