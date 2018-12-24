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
|  arquivo:     start_noticias_add.php
|  template:    noticias_add.htm
+--------------------------------------------------------------
*/

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


// ROTINA DEFAULT


		// LISTA OS REGISTROS
		$prod->listProdSum("codemp, nome", "empresa", $condicao_transf, $arrayx, $array_campox, "ORDER BY nome");

		for($i = 0; $i < count($arrayx); $i++ ){

			$prod->mostraProd( $arrayx, $array_campox, $i );

			$codemp_plat[$i] = $prod->showcampo0();
			$nomeemp_plat[$i] = $prod->showcampo1();

  			$prod->clear();
			$prod->listProdSum("codvitrine , nomevitrine", "codbarra_vitrine", "codemp = '$codemp_plat[$i]' and hist <>'S'", $array1, $array_campo1, "ORDER BY nomevitrine");

			for($j = 0; $j < count($array1); $j++ ){

				$prod->mostraProd( $array1, $array_campo1, $j );

			    $codvitrine_placam[$i][$j] = $prod->showcampo0();
				$nomevitrine_placam[$i][$j] = $prod->showcampo1();

				$n_placam[$i] .= "'".$nomevitrine_placam[$i][$j]."'".", ";
				$c_placam[$i] .= "'".$codvitrine_placam[$i][$j]."'".", ";

			}//FOR

			$sub_array[$i] = $j;
			$n_placam[$i] .= "''";
			$c_placam[$i] .= "''";

		}//FOR



switch ($Action)
{

	case "excluir":


		// VERIFICA EXISTENCIA DE CAMPO VAZIO

		for($i = 0; $i < $cont; $i++ ){

		echo("ckvitrine[$i]= $ckvitrine[$i]<br>");

		if ($ckvitrine[$i] <> ""){

           	$prod->clear();
            $prod->upProdU("codbarra", "codvitrine = '0'", "codcb='$ckvitrine[$i]'");

        }
        }//FOR

    $Action_pesq = "pesquisa";

	break;
}

if ($Action_pesq == "pesquisa"){


// LISTA OS REGISTROS
		$prod->listProdSum("codbarra.codemp, codbarra.codbarra, codbarra.codprod, nomeprod, codcb", "codbarra, produtos", "codbarraped <> 1 and codvitrine = '$placaSelect' and codbarra.codemp = '$cjSelect' and codbarra.codprod=produtos.codprod", $arrayx1, $array_campox1, "order by nomeprod");

		for($i = 0; $i < count($arrayx1); $i++ ){

			$prod->mostraProd( $arrayx1, $array_campox1, $i );

			$codemp_vitrine[$i] = $prod->showcampo0();
			$codbarra_vitrine[$i] = $prod->showcampo1();
			$codprod_vitrine[$i] = $prod->showcampo2();
			$nomeprod_vitrine[$i] = $prod->showcampo3();
			$codcb_vitrine[$i] = $prod->showcampo4();


		}//FOR

	$prod->clear();
    $prod->listProdU("nome", "empresa", "codemp = '$cjSelect'");
    $nomeemp_pesq= $prod->showcampo0();

    $prod->clear();
    $prod->listProdU("nomevitrine", "codbarra_vitrine", "codvitrine = '$placaSelect'");
    $nomevitrine_pesq = $prod->showcampo0();

}



include ("templates/vitrine_page_ex.htm");


?>
