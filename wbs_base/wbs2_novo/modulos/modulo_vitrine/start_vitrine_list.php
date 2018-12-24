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

// ROTINA DEFAULT

        // LISTA OS REGISTROS
		$prod->listProdSum("codbarra.codemp, codbarra.codbarra, codbarra.codprod, nomeprod, hist", "codbarra, produtos", "codbarraped <> 1 and codvitrine = '$placaSelect' and codbarra.codemp = '$cjSelect' and codbarra.codprod=produtos.codprod", $arrayx, $array_campox, "order by nomeprod");

		for($i = 0; $i < count($arrayx); $i++ ){

			$prod->mostraProd( $arrayx, $array_campox, $i );

			$codemp_vitrine[$i] = $prod->showcampo0();
			$codbarra_vitrine[$i] = $prod->showcampo1();
			$codprod_vitrine[$i] = $prod->showcampo2();
			$nomeprod_vitrine[$i] = $prod->showcampo3();
			$histprod_vitrine[$i] = $prod->showcampo4();
			
			if ($histprod_vitrine[$i] == 'Y'){$hist_prod[$i] = '<b>SIM</b>';}else{$hist_prod[$i] = 'NÃO';}

    
		}//FOR
		

    $prod->clear();
    $prod->listProdU("nome", "empresa", "codemp = '$cjSelect'");
    $nomeemp_pesq= $prod->showcampo0();

    $prod->clear();
    $prod->listProdU("nomevitrine", "codbarra_vitrine", "codvitrine = '$placaSelect'");
    $nomevitrine_pesq = $prod->showcampo0();




include ("templates/vitrine_page_list.htm");


?>
