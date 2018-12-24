<?php

require("classprod.php");

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA



switch ($Action) {

 case "insert":

	  	for($i = 0; $i < $cont; $i++ ){

			
			// PARA PAGINA DE SEGURANCA SECUNDARIA
			$prod->listProdU("COUNT(*)", "fornecedor_relacao_cat", "codfor='$codfornselect' AND codcat='$codcat[$i]'");
			$control = $prod->showcampo0();

			if ($control <> 0){ //EXISTE NA TABELA

				if ($ckprd[$i] <> "OK"){ //PRODUTO NAO CHECADO

					//DELETE
					$prod->delProd("fornecedor_relacao_cat", "codfor='$codfornselect' AND codcat='$codcat[$i]'");

				}

				$chk[$i] = "checked";

			}else{ // NAO EXISTE TABELA

				if ($ckprd[$i] == "OK"){ //PRODUTO CHECADO

					// ADICIONA
					$prod->setcampo0($codfornselect);
					$prod->setcampo1($codcat[$i]);
					$prod->addProd("fornecedor_relacao_cat", $ureg1);

				}
			
				$chk[$i] = "";

			}

		}//FOR
				
	 break;

} //SWITCH


// ROTINA DEFAULT

			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
				$prod->listProdSum("codcat, nomecat", "categoria", "" , $array, $array_campo, "ORDER BY  nomecat");

				for($i = 0; $i < count($array); $i++ ){
					
					$prod->mostraProd( $array, $array_campo, $i );

					// DADOS //
					$codcat[$i] = $prod->showcampo0();
					$nomecat[$i] = $prod->showcampo1();
					
					// PARA PAGINA DE SEGURANCA SECUNDARIA
					$prod->listProdU("COUNT(*)", "fornecedor_relacao_cat", "codfor='$codfornselect' AND codcat='$codcat[$i]'");
					$control = $prod->showcampo0();

					if ($control <> 0 ){$chk[$i] = "checked";}else{$chk[$i] = "";}
					
				}//FOR


			// TEMPLATE DO MENU
			include ("templates/forn_select_relacao_cat.htm");





?>