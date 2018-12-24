<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

		$codempselect = 8; // LOJA INHELP COMERCIAL

		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, codprod, ppu, codcb, codpos_troca, tipo_estoque, codpos", "os_prod", "codos = $codos and tipo_estoque = 'D'", $array, $array_campo, "ORDER BY codos");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			//DADOS DO PRODUTO DA OS
			$codos = $prod->showcampo0();
			$codprod_os = $prod->showcampo1();
			$codppu = $prod->showcampo2();
			$codcb_os = $prod->showcampo3();
			$codpos_troca = $prod->showcampo4();
			$tipo_estoque = $prod->showcampo5();
			$codpos_os = $prod->showcampo6();

			$prod->clear();
			$prod->listProdU("codbarra_pedref ","os", "codos=$codos");
			$codbarra_pedref = $prod->showcampo0(); 

			$prod->clear();			
			$prod->listProdU("codped, codemp","pedido", "codbarra = '$codbarra_pedref'");
			$codped_t = $prod->showcampo0();
			$codemp_t = $prod->showcampo1();

			$prod->listProdU("codcb, codprod, codpos","os_prod", "codpos='$codpos_troca'");
			$codcb_ped = $prod->showcampo0();
			$codprod_ped = $prod->showcampo1();
			$codpos_ped = $prod->showcampo2();
			
			  $dataatual = $prod->gdata();

			  $prod->clear();
			  $prod->listProdU("codpped, codcb","pedidoprod", "codprod = '$codprod_ped' and codped = '$codped_t' and codcb like '%$codcb_ped%'");
			  $codp_ped = $prod->showcampo0();
			  $codcb_pedprod = $prod->showcampo1();


			  //CODBARRA PEDIDO
			  $prod->clear();
			  $prod->listProd("codbarra", "codcb='$codcb_ped'");
			  $codprodcj = $prod->showcampo5();
			  $tipocj = $prod->showcampo6();
			  $prod->setcampo4(0);
			  $prod->setcampo5(0);
			  $prod->setcampo6(0);
			  $prod->setcampo7(0);
			  $prod->setcampo8($codempselect);  //IHELP COMERCIAL
			  $prod->upProd("codbarra", "codcb='$codcb_ped'");

			  //CODBARRA OS
			  $prod->clear();
			  $prod->listProd("codbarra", "codcb='$codcb_os'");
			  $prod->setcampo4($codped_t);
			  $prod->setcampo5($codprodcj);
			  $prod->setcampo6($tipocj);
			  $prod->setcampo7(1);
			  $prod->setcampo8($codemp_t);
			  $prod->upProd("codbarra", "codcb='$codcb_os'");
			
				// MODIFICA CODBARRA DO PEDIDO PROD
				$codcb_array = explode(":", $codcb_pedprod);
				for($j = 0; $j < count($codcb_array); $j++ ){
					if ($codcb_array[$j] == $codcb_ped){$codcb_array[$j] = $codcb_os;}
				}
				$codcb_pedprod_atual = implode(":", $codcb_array);

				$prod->clear();
				$prod->listProd("pedidoprod", "codpped = '$codp_ped'");
					$prod->setcampo10($codcb_pedprod_atual);	
					$prod->setcampo2($codprod_os);	
				$prod->upProd("pedidoprod", "codpped = '$codp_ped'");

				echo("$codped_t - $codemp_t - $codprod_os - $codcb_os - $codpos_os - $codprod_ped - $codcb_ped - $codpos_ped - $codcb_pedprod - $codcb_pedprod_atual<br>");
							
					//MODIFICACOES NO PEDIDO
					//EXCLUI
					$prod->setcampo0("");
					$prod->setcampo1($codped_t);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_ped);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("EX");
					$prod->addProd("pedidomod", $ureg);
					//ADICIONA	
					$prod->setcampo0("");
					$prod->setcampo1($codped_t);
					$prod->setcampo2($codprod_os);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_os);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");
					$prod->addProd("pedidomod", $ureg);

				
					// ATUALIZA ESTOQUE
					$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod_ped");
					$qtdeold = $prod->showcampo3();
					$reserva = $prod->showcampo4();
					$qtdenovo = $qtdeold + 1;
					$prod->setcampo3($qtdenovo);
					$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod_ped");

								
					//MODIFICACOES NO PEDIDO
					//EXCLUI
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_ped);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("TR-PED");
					$prod->addProd("os_mod", $ureg);
					//ADICIONA	
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($codprod_os);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_os);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("TR-OS");
					$prod->addProd("os_mod", $ureg);


					// DELETE PRODUTO DA OS
					$prod->delProd("os_prod", "codpos=$codpos_os");
					
					// DELETE PRODUTO DA OS
					$prod->delProd("os_prod", "codpos=$codpos_ped");
			
					
			#echo("$codos - $codpos - $codprod - $nomeprod - $codbarra - $tipo_estoque - $codpos_troca<br>");				

		}

echo("TOTAL DE PEDIDOS MODIFICADOS : $i");