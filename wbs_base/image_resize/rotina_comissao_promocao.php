<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA


		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("pedido.codped", "pedido, pedidostatus", "dataped > '2005-04-01' AND dataped <  '2005-04-31' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND statusped =  'CAIXA' AND datastatus <=  '2005-05-04'", $array, $array_campo, "order by datastatus");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();

			$prod->listProdU("COUNT(*)", "pedidoparcelas", "codped=$codped");
			$num_parcelas = $prod->showcampo0();

			if ($num_parcelas >= 10){

			$prod->listProdU("mlb, vc, fatorcomissao, tipo, pedido.codvend, codbarra, vpv, nome, mcv", "pedido, vendedor", "codped=$codped and pedido.codvend=vendedor.codvend");
			$ped_mlb = $prod->showcampo0();
			$ped_vc = $prod->showcampo1();
			$ped_fatorcomissao = $prod->showcampo2();
			$ped_tipo = $prod->showcampo3();
			$ped_codvend = $prod->showcampo4();
			$ped_codbarra = $prod->showcampo5();
			$ped_vpv = $prod->showcampo6();
			$ped_nomevend = $prod->showcampo7();
			$ped_mcv = $prod->showcampo8();
			$fator_corr = 0.033;

		if ($ped_mcv <= 50){

			if ($ped_tipo == 'R'){$valorp = $ped_vpv*$fator_corr;}
			if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_vpv*$fator_corr;}
			if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_vpv*$fator_corr;}
			#if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_vc;}


			/*
			//CORRECAO DE COMISSAO
			if ($ped_codvend == 35 OR $ped_codvend == 97 OR $ped_codvend == 89 OR $ped_codvend == 141 OR $ped_codvend == 138){
				
				$valorp = $valorp/2;

			}	
			*/
				
					$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
					$codconta = $prod->showcampo0();
								
					#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao
				
					
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Correção da Comissão referente a Promoção 10x");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf);
						}
				if ($ped_tipo == 'R'){
					$prod->setcampo6("2005-05-05 00:00:00");
					$prod->setcampo7("2005-05-05 00:00:00");
				}else{// padrao dia 30 do mes da pesquisa
					$prod->setcampo6("2005-05-05 00:00:00");
					$prod->setcampo7("2005-05-05 00:00:00");
				}	
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13("felipe");

					$prod->addProd("fin_bcomov", $uregbcomov);
					
			
			echo("$ped_codbarra - $num_parcelas - $ped_nomevend - $ped_tipo - $ped_mlb - $ped_mcv%- $ped_vpv - $valorp - $uregbcomov<br>");
			

		}//MCV

			$p++;
			}//PARCELAS
		
				
			
			$valorpt = $valorpt + $valorp; 

				#echo("$codmov - $ped_mlb - $valorp<br>");

		}

echo("TOTAL DE PEDIDOS MODIFICADOS : $p ");
