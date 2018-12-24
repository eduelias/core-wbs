<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("nome, tipo, codvend, codgrp, codsuper", "vendedor", "block <> 'Y'", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$login = $prod->showcampo0();
			$tipo = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$codgrp = $prod->showcampo3();
			$codsuper = $prod->showcampo4();

			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codsuper'");
			$codgrp_super = $prod->showcampo0();

			if ($tipo == 'R'){$difd_lib = 0;}else{$difd_lib = 0;}
			if ($tipo == 'R'){$difd_desp = 2;}else{$difd_desp = 0;}

			$html = "<font size=1 face=Verdana, Arial, Helvetica, sans-serif>";
			$html .= "<b>USUÁRIO : $login</b><br><br>";

			$vpp = 0;
			$vppt = 0;

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS PROD
			$prod->listProdSum("pedido.codbarra, vpp, TO_DAYS(NOW()) - TO_DAYS(datastatus) as atraso, codcliente ", "pedidostatus, pedido, vendedor", "pedido.codped = pedidostatus.codped and pedido.codvend = vendedor.codvend and status = 'PROD' and statusped=status and vendedor.nome='$login' and (pedido.caixa ='NO' or pedido.contrato = 'NO') and TO_DAYS(NOW()) - TO_DAYS(datastatus) >= $difd_lib and pedido.cancel <>'OK'", $array71, $array_campo71, "" );

			$html .= "1) Os Pedidos abaixo estão na PRODUÇÃO e consta pendência de pagamento ou de contrato:<br><br>";	
			$html .= "CODPEDIDO - VALOR - ATRASO<br><br>";
			
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

				$html .="TOTAL $j pedidos - R$ $vpptf<br><br>";

			$vpp = 0;
			$vppt = 0;

			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("pedido.codbarra, vpp, TO_DAYS(NOW()) - TO_DAYS(datastatus) as atraso, codcliente ", "pedidostatus, pedido, vendedor", "pedido.codped = pedidostatus.codped and pedido.codvend = vendedor.codvend and status = 'LIB' and statusped=status and vendedor.nome='$login' and (pedido.caixa ='NO' or pedido.contrato = 'NO') and TO_DAYS(NOW()) - TO_DAYS(datastatus) >= $difd_lib and pedido.cancel <>'OK'", $array71, $array_campo71, "" );

			$html .= "1) Os Pedidos abaixo estão na EXPEDIÇÃO e consta pendência de pagamento ou de contrato:<br><br>";	
			$html .= "CODPEDIDO - VALOR - ATRASO<br><br>";
			
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

				$html .="TOTAL $j pedidos - R$ $vpptf<br><br>";

			$vpp = 0;
			$vppt = 0;
			
			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS DESP
			$prod->listProdSum("pedido.codbarra, vpp, TO_DAYS(NOW()) - TO_DAYS(datastatus) as atraso, codcliente ", "pedidostatus, pedido, vendedor", "pedido.codped = pedidostatus.codped and pedido.codvend = vendedor.codvend and status = 'DESP' and statusped=status and vendedor.nome='$login' and (pedido.caixa ='NO') and TO_DAYS(NOW()) - TO_DAYS(datastatus) >= $difd_desp and pedido.cancel <>'OK'", $array72, $array_campo72, "" );

			$html .= "2) Os Pedidos abaixo foram DESPACHADOS e consta pendência de pagamento:<br><br>";	
			$html .= "CODPEDIDO - VALOR - ATRASO<br><br>";
			
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


				if (count($array71) <> 0){

					$html .= "$codbarra - $nomecli - R$ $vppf - $atraso dias<br>";					

				}

				$vppt = $vppt + $vpp;

			}//FOR

				$vpptf = number_format($vppt,2,',','.'); 

				$html .="TOTAL $j pedidos - R$ $vpptf<br><br>";


				$html .= "</font>";
				
				
				if (count($array71) <> 0 or count($array72) <> 0){

					
					// ENVIA MENSAGEM 
					$prod->clear();
					$prod->setcampo1($codgrp);
					$prod->setcampo2($codvend);
					$prod->setcampo3($dataatual);
					$prod->setcampo4("PENDÊNCIA NO FINANCEIRO");
					$prod->setcampo5($html);
					$prod->setcampo6("N");  // HISTORICO
					$prod->setcampo7("NO");      // STATUS
					$prod->setcampo9($codvendold);  
					$prod->setcampo10("NO"); // ENVIADA
											
					$prod->addProd("msg", $ureg);
					
					#$html .= "EMAIL ENVIADO<br>";
				}


		}//FOR

echo("$html");