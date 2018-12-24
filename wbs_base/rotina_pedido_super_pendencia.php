<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codsuper", "relacaohierarquia", "1", $array5, $array_campo5, "GROUP by codsuper");

		for($k = 0; $k < count($array5); $k++ ){
			
			$prod->mostraProd( $array5, $array_campo5, $k );

			// DADOS //
			$codsuper = $prod->showcampo0();

			$prod->clear();
				$prod->listProdU("codgrp, msg_fin", "vendedor", "codvend='$codsuper'");
				$codgrp = $prod->showcampo0();
				$msg_fin = $prod->showcampo1();

			$html = "Relação de pendência no financeiro por usuário<br><br>";

	if ($msg_fin == "Y"){


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("nome, tipo", "vendedor", "block <> 'Y' and codsuper= $codsuper", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$login = $prod->showcampo0();
			$tipo = $prod->showcampo1();
			

			if ($tipo == 'R'){$difd_lib = 0;}else{$difd_lib = 0;}
			if ($tipo == 'R'){$difd_desp = 2;}else{$difd_desp = 0;}

			$html .= "<font size=1 face=Verdana, Arial, Helvetica, sans-serif>";
			$html .= "<b>USUARIO : $login</b><br>";

			$vpp = 0;
			$vppt = 0;

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS PROD
			$prod->listProdSum("pedido.codbarra, vpp, TO_DAYS(NOW()) - TO_DAYS(datastatus) as atraso, codcliente ", "pedidostatus, pedido, vendedor", "pedido.codped = pedidostatus.codped and pedido.codvend = vendedor.codvend and status = 'PROD' and statusped=status and vendedor.nome='$login' and (pedido.caixa ='NO' or pedido.contrato = 'NO') and TO_DAYS(NOW()) - TO_DAYS(datastatus) >= $difd_lib and pedido.cancel <>'OK'", $array71, $array_campo71, "" );


			#$html .= "CODPEDIDO - VALOR - ATRASO<br><br>";
			
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$codbarra = $prod->showcampo0();
				$vpp = $prod->showcampo1();
				$atraso = $prod->showcampo2();
				$codcliente = $prod->showcampo3();
				$vppf = number_format($vpp,2,',','.'); 

				$prod->clear();
		        	$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
				$nomecli = $prod->showcampo0();
				$nomecli = strtoupper($nomecli);


				if (count($array71) <> 0){

					$html .= "$codbarra - $nomecli - R$ $vppf - $atraso dias<br>";				

				}

				$vppt = $vppt + $vpp;

			}//FOR

				$vpptf = number_format($vppt,2,',','.'); 

				if (count($array71) <> 0){

					$html .= "PRODUÇÃO(PROD): $j pedidos - R$ $vpptf<br>";	

				}
			

			$vpp = 0;
			$vppt = 0;

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("pedido.codbarra, vpp, TO_DAYS(NOW()) - TO_DAYS(datastatus) as atraso, codcliente ", "pedidostatus, pedido, vendedor", "pedido.codped = pedidostatus.codped and pedido.codvend = vendedor.codvend and status = 'LIB' and statusped=status and vendedor.nome='$login' and (pedido.caixa ='NO' or pedido.contrato = 'NO') and TO_DAYS(NOW()) - TO_DAYS(datastatus) >= $difd_lib and pedido.cancel <>'OK'", $array71, $array_campo71, "" );


			#$html .= "CODPEDIDO - VALOR - ATRASO<br><br>";
			
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$codbarra = $prod->showcampo0();
				$vpp = $prod->showcampo1();
				$atraso = $prod->showcampo2();
				$codcliente = $prod->showcampo3();
				$vppf = number_format($vpp,2,',','.'); 

				$prod->clear();
		        	$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
				$nomecli = $prod->showcampo0();
				$nomecli = strtoupper($nomecli);


				if (count($array71) <> 0){

					$html .= "$codbarra - $nomecli - R$ $vppf - $atraso dias<br>";				

				}

				$vppt = $vppt + $vpp;

			}//FOR

				$vpptf = number_format($vppt,2,',','.'); 

				if (count($array71) <> 0){

					$html .= "EXPEDIÇÃO(LIB): $j pedidos - R$ $vpptf<br>";	

				}
			

			$vpp = 0;
			$vppt = 0;
			
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS DESP
			$prod->listProdSum("pedido.codbarra, vpp, TO_DAYS(NOW()) - TO_DAYS(datastatus) as atraso, codcliente ", "pedidostatus, pedido, vendedor", "pedido.codped = pedidostatus.codped and pedido.codvend = vendedor.codvend and status = 'DESP' and statusped=status and vendedor.nome='$login' and (pedido.caixa ='NO') and TO_DAYS(NOW()) - TO_DAYS(datastatus) >= $difd_desp and pedido.cancel <>'OK'", $array72, $array_campo72, "" );

			#$html .= "2) Os Pedidos abaixo foram DESPACHADOS e consta pendência de pagamento:<br><br>";	
			#$html .= "CODPEDIDO - VALOR - ATRASO<br><br>";
			
			for($j = 0; $j < count($array72); $j++ ){
		
				$prod->mostraProd($array72, $array_campo72, $j );

				$codbarra = $prod->showcampo0();
				$vpp = $prod->showcampo1();
				$atraso = $prod->showcampo2();
				$codcliente = $prod->showcampo3();
				$vppf = number_format($vpp,2,',','.'); 
				
				$prod->clear();
		        	$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
				$nomecli = $prod->showcampo0();
				$nomecli = strtoupper($nomecli);


				if (count($array72) <> 0){

					$html .= "$codbarra - $nomecli - R$ $vppf - $atraso dias<br>";					

				}

				$vppt = $vppt + $vpp;

			}//FOR

				$vpptf = number_format($vppt,2,',','.'); 

			if (count($array72) <> 0){

				$html .= "DESPACHADOS(DESP): $j pedidos - R$ $vpptf<br>";

			}

							
				$html .= "<br></font>";
				

		}//FOR

					
					// ENVIA MENSAGEM 
					$prod->clear();
					$prod->setcampo1($codgrp);
					$prod->setcampo2($codsuper);
					$prod->setcampo3($dataatual);
					$prod->setcampo4("(SUPERVISOR) PENDÊNCIA NO FINANCEIRO");
					$prod->setcampo5($html);
					$prod->setcampo6("N");  // HISTORICO
					$prod->setcampo7("NO");      // STATUS
					$prod->setcampo9($codvendold);  
					$prod->setcampo10("NO"); // ENVIADA
											
					$prod->addProd("msg", $ureg);


					
					// ENVIA MENSAGEM SUPERVISOR
					$prod->clear();
					$prod->setcampo1(2);
					$prod->setcampo2(22);  //GIOVANNI
					$prod->setcampo3($dataatual);
					$prod->setcampo4("(SUPERVISOR) PENDÊNCIA NO FINANCEIRO");
					$prod->setcampo5($html);
					$prod->setcampo6("N");  // HISTORICO
					$prod->setcampo7("NO");      // STATUS
					$prod->setcampo9($codvendold);  
					$prod->setcampo10("NO"); // ENVIADA
											
					$prod->addProd("msg", $ureg);
					
					#$html .= "EMAIL ENVIADO<br>";
	}

				#$html .="<hr>";

		}//FOR


echo("$html");