<?php

require("../classprod.php" );

// INICIO DA CLASSE
$prod = new operacao();

		#echo("cb=$codped");

	//  VERIFICA SE NF PREENCHIDA
		$prod->listProdU("IF( nf_cupom = 'NO', 'S', 'N' ) ", "pedido", "codbarra=$codped");
		$falta_nf = $prod->showcampo0();

		if ($falta_nf == 'S'){

			// LISTA OS REGISTROS
			$prod->listProdU("codped", "pedido", "codbarra=$codped");
			$codped_original = $prod->showcampo0();
				
			 for($i = 1; $i <= $qtdenf; $i++ ){
				
				// DADOS DA NOTA FISCAL //

				$prod->clear();
				$prod->setcampo0("");
				$prod->setcampo1($codped_original);
				$prod->setcampo2("$nf[$i]");
				$prod->setcampo3($vnf[$i]);
				$prod->addProd("pedidonf_cupom", $uregnf);

				#echo("cp=$codped_original");

			 }

			// ATUALIZA STATUS DO PEDIDO
   			$prod->upProdU("pedido","nf_cupom = 'OK'", "codped=$codped_original");

			$erro = 1; 			// OPERACAO OK

		}else{
			

			$erro = 0; 			// NOTA FISCAL JA FOI INSERIDA

		}

	echo("$erro");

?>
