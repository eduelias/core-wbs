<?php

require("classprod.php");

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA



switch ($Action) {

 case "insert":

	  	for($i = 0; $i < $cont; $i++ ){

			
			// PARA PAGINA DE SEGURANCA SECUNDARIA
			$prod->listProdU("COUNT(*)", "fornecedor_relacao_marca", "codfor='$codfornselect' AND codmarca='$codmarca[$i]'");
			$control = $prod->showcampo0();

			if ($control <> 0){ //EXISTE NA TABELA

				if ($ckprd[$i] <> "OK"){ //PRODUTO NAO CHECADO

					//DELETE
					$prod->delProd("fornecedor_relacao_marca", "codfor='$codfornselect' AND codmarca='$codmarca[$i]'");

				}

				$chk[$i] = "checked";

			}else{ // NAO EXISTE TABELA

				if ($ckprd[$i] == "OK"){ //PRODUTO CHECADO

					// ADICIONA
					$prod->setcampo0($codfornselect);
					$prod->setcampo1($codmarca[$i]);
					$prod->addProd("fornecedor_relacao_marca", $ureg1);

				}
			
				$chk[$i] = "";

			}

		}//FOR
				
	 break;

} //SWITCH


// ROTINA DEFAULT

			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
				$prod->listProdSum("codmarca, marca ", "produtos_marcas", "hist <> 'S'" , $array, $array_campo, "ORDER BY  marca");

				for($i = 0; $i < count($array); $i++ ){
					
					$prod->mostraProd( $array, $array_campo, $i );

					// DADOS //
					$codmarca[$i] = $prod->showcampo0();
					$marca[$i] = $prod->showcampo1();
					
					// PARA PAGINA DE SEGURANCA SECUNDARIA
					$prod->listProdU("COUNT(*)", "fornecedor_relacao_marca", "codfor='$codfornselect' AND codmarca='$codmarca[$i]'");
					$control = $prod->showcampo0();

					if ($control <> 0 ){$chk[$i] = "checked";}else{$chk[$i] = "";}
					
				}//FOR


			// TEMPLATE DO MENU
			include ("templates/forn_select_relacao.html");





?>