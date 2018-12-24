<?php

require("classprod.php");

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA

switch ($Action) {

 case "insert":

	  	for($i = 0; $i < $cont; $i++ ){

				if ($codcatselect == 4){ // CATEGORIA PLACA MAE
					$codplaca = $codprodselect;
					$codprod_restricao = $codprod[$i];
				}else{
					$codplaca = $codprod[$i];
					$codprod_restricao = $codprodselect;
				}

			// PARA PAGINA DE SEGURANCA SECUNDARIA
			$prod->listProdU("COUNT(*)", "produtos_relacao_restricao", "codplaca='$codplaca' AND codprod_restricao='$codprod_restricao'");
			$control = $prod->showcampo0();

			if ($control <> 0){ //EXISTE NA TABELA

				if ($ckprd[$i] <> "OK"){ //PRODUTO NAO CHECADO

					//DELETE
					$prod->delProd("produtos_relacao_restricao", "codplaca='$codplaca' AND codprod_restricao='$codprod_restricao'");

				}

				$chk[$i] = "checked";

			}else{ // NAO EXISTE TABELA

				if ($ckprd[$i] == "OK"){ //PRODUTO CHECADO

					// ADICIONA
					$prod->setcampo0($codplaca);
					$prod->setcampo1($codprod_restricao);
					$prod->addProd("produtos_relacao_restricao", $ureg1);

				}
			
				$chk[$i] = "";

			}

		}//FOR
				
	 break;

} //SWITCH


// ROTINA DEFAULT

			// PARA PAGINA DE SEGURANCA SECUNDARIA
			$prod->listProdU("restricao_pl", "categoria", "codcat='$codcatselect'");
			$control = $prod->showcampo0();

			if ($control == 'OK' or $codcatselect == 4){ // CATEGORIA 4 -> placa mae

			if ($codcatselect <> 4){$condicao = "AND produtos.codcat = 4";}else{$condicao =  "AND categoria.restricao_pl = 'OK'";}

			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
				$prod->listProdSum("nomecat, nomesubcat, nomeprod, produtos.codcat, produtos.codsubcat, produtos.codprod, lib_linha, hist, descres, restricao_pl ", "produtos, categoria, subcategoria", "categoria.codcat=produtos.codcat AND subcategoria.codsubcat=produtos.codsubcat " .$condicao , $array, $array_campo, "GROUP BY produtos.codprod ORDER BY  nomecat, nomesubcat, nomeprod");

				for($i = 0; $i < count($array); $i++ ){
					
					$prod->mostraProd( $array, $array_campo, $i );

					// DADOS //
					$nomecat[$i] = $prod->showcampo0();
					$nomesubcat[$i] = $prod->showcampo1();
					$nomeprod[$i] = $prod->showcampo2();
					$codcat[$i] = $prod->showcampo3();
					$codsubcat[$i] = $prod->showcampo4();
					$codprod[$i] = $prod->showcampo5();
					$lib_linha[$i] = $prod->showcampo6();
					$hist[$i] = $prod->showcampo7();
					$descres[$i] = $prod->showcampo8();

					#print_r(array_values ($array));echo"<BR>";

					if ($codcatselect == 4){ // CATEGORIA PLACA MAE
						$codplaca = $codprodselect;
						$codprod_restricao = $codprod[$i];
					}else{
						$codplaca = $codprod[$i];
						$codprod_restricao = $codprodselect;
					}

					// PARA PAGINA DE SEGURANCA SECUNDARIA
					$prod->listProdU("COUNT(*)", "produtos_relacao_restricao", "codplaca='$codplaca' AND codprod_restricao='$codprod_restricao'");
					$control = $prod->showcampo0();

					if ($control <> 0 ){$chk[$i] = "checked";}else{$chk[$i] = "";}
					
				}//FOR


			// TEMPLATE DO MENU
			include ("templates/prod_select_relacao.htm");

			}




?>