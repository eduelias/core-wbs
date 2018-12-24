                	if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
						$codconta = $prod->showcampo0();
					}

     				#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.03");
					$prod->setcampo3("Malote Sedex");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf); // CREDITO
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf); // DEBITO
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);
					$prod->setcampo13($obs);

					$prod->addProd("fin_bcomov", $uregbcomov);
