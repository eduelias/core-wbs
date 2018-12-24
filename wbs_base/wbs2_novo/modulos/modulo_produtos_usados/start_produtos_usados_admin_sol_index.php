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
|  arquivo:     start_produtos_usados_admin_sol_index.php
|  template:    produtos_usados_admin_sol_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // Pesquisar
	case "Pesquisar" :
        if ($pesqcod <> "") {
    		$condicaopesq .= "produtos_usados_sol.codusado = '$pesqcod' AND ";
        }
        if ($pesqvendedor <> "") {
            $condicaopesq .= "login like '%$pesqvendedor%' AND ";
        }
        if ($pesqcliente <> "") {
            $condicaopesq .= "nome_interessado like '%$pesqcliente%' AND ";
        }
        break;

	// Exclui Solicitação
	case "Excluir" :
		// Solicitação
		$prod->clear();
		$prod->delProd("produtos_usados_sol", "codsol = '$codsolselect'");
		break;
}

// Solicitações
$prod->clear();
$prod->listProdSum("login, nome_interessado, dddtel, tel, produtos_usados_sol.datahora, produtos_usados.nome, obs, codsol", "produtos_usados_sol, produtos_usados", "$condicaopesq produtos_usados.codusado = produtos_usados_sol.codusado", $arraya, $array_campoa, "ORDER BY produtos_usados_sol.codusado, login");

for($b = 0; $b < count($arraya); $b++ )
{
	$prod->mostraProd( $arraya, $array_campoa, $b );
	
	$vendedor_list[$b] = $prod->showcampo0();
	$cliente_list[$b] = $prod->showcampo1();
	$dddtel_list[$b] = $prod->showcampo2();
	$tel_list[$b] = $prod->showcampo3();
	$datahora_list[$b] = $prod->showcampo4();
	$produto_list[$b] = $prod->showcampo5();
	$obs_list[$b] = $prod->showcampo6();
	$codsol_list[$b] = $prod->showcampo7();
	
	$prod->clear();
	$prod->listProdU("nome", "vendedor", "codvend = '$vendedor_list[$b]'");
	$vendedor_list[$b] = $prod->showcampo0();
}

include ("templates/produtos_usados_admin_sol_index.htm");

?>