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
|  arquivo:     start_produtos_usados_index.php
|  template:    produtos_usados_index.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    // Pesquisar
	case "Pesquisar" :
        if ($pesqcod <> "") {
    		$condicaopesq = "codusado = '$pesqcod' AND ";
        }
        if ($pesqproduto <> "") {
            $condicaopesq .= "nome like '%$pesqproduto%' AND ";
        }
		break;
		
	// Adiciona Solicitação
	case "AddSol" :
		$datahoraatual = gmDate("Y-m-d H:i:s");
		
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codusadoselect);
		$prod->setcampo2($codvend);
		$prod->setcampo3($nomecliente);
		$prod->setcampo4($dddtel);
		$prod->setcampo5($tel);
		$prod->setcampo6($datahoraatual);
		$prod->setcampo7($obs);
		$prod->addProd("produtos_usados_sol", $uregcodsol);
		break;
}

// Produtos
$prod->clear();
$prod->listProdSum("codusado, nome, descricao, ppu, img_height, img_width", "produtos_usados", "$condicaopesq hist = 'N'", $arrayx, $array_campox, "");

for($i = 0; $i < count($arrayx); $i++ )
{
	$prod->mostraProd( $arrayx, $array_campox, $i );
	
	$codusado_list[$i] = $prod->showcampo0();
	$nomeprod_list[$i] = $prod->showcampo1();
	$descricaoprod_list[$i] = $prod->showcampo2();
	$ppuprod_list[$i] = $prod->showcampo3();
	$imgaltura_list[$i] = $prod->showcampo4();
	$imglargura_list[$i] = $prod->showcampo5();
}

include ("templates/produtos_usados_index.htm");

?>