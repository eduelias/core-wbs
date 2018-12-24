

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 10;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicaoex = " idicj = 'Y'";			// condicao extra para a pesquisa -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$codvendselect=1;
#$codempselect=1;
$titulo = "PEDIDO";
$titulo1 = "CRIAR NOVO PEDIDO";

$Actionter = "unlock";


// CONFIGURAÇÃO DE COR

$bgcortopo = "#86ACB5";
$bgcortopo1 = "#93BEE2";
$bgcorlinha = "#F3F8FA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();

	// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProd("seguranca", "arquivo='iniciopedtrocafpg.php'");
		$codpgtrocasec = $prod->showcampo0();

	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplca o preco de tabela
	
	
    	function logar($dataatual, $codped, $codprod, $qtdeold, $reserva, $qtdenovo, $reservanovo, $qtdeped, $tipo){

        if ($tipo == 0 ){if (($reservanovo-$reserva) <> $qtdeped){$erro_est = 1;}else{$erro_est=0;}}
        if ($tipo == 1){if (($qtdeold - $qtdenovo) <> $qtdeped or ($reserva-$reservanovo) <> $qtdeped){$erro_est = 1;}else{$erro_est=0;}}
        
         if ($tipo == 2){if (($qtdeold - $qtdenovo) <> $qtdeped ){$erro_est = 1;}else{$erro_est=0;}}
         if ($tipo == 3 ){if (($reservanovo-$reserva) <> $qtdeped){$erro_est = 1;}else{$erro_est=0;}}
            $arquivo = "log/estoque_log_troca.txt";
			$abre = fopen($arquivo, "a");
			if($abre){
				fwrite ($abre, "$dataatual\tPED:$codped\tPRD:$codprod\tA:$qtdeold\t$reserva\tN:$qtdenovo\t$reservanovo\tQP:$qtdeped\tERRO:$erro_est\t\n");
				$gravou = TRUE;
			} else {
				$gravou = FALSE;
			}
			return $gravou;
			}
	

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":
		
		#-- Separa os produtos do Conjunto
		
		$nprod= $cont;
		$contcj=1;
		$contcjold=0;
		for($k = 0; $k < $cont; $k++ ){

		$tipo = explode(":", $tipoprodt[$k]);
		$tipoprod[$k] = "$tipo[0]";
		$codprodcj[$k] = "$tipo[1]";
		$tipocj[$k] = "$tipo[2]";

		$desc = explode(":", $descplano[$k]);
		$desc_plano[$k] = "$desc[0]";
		$codplano[$k] = "$desc[1]";

		#echo("tcjs=$tipocj[$k]:$codprodcj[$k]:$qtde[$k]<br>");

	
		#echo("$tipocj[$k]");
				
		#echo("$unidade[$k]");
	
		if ($unidade[$k] == "CJ" and $qtde[$k] <> 0 ):
			$prod->listProdgeral("relacoes", "codprod=$codprod[$k]", $array88, $array_campo88 , "");
			
			for($j = 0; $j < count($array88); $j++ ){
			
			$prod->mostraProd( $array88, $array_campo88, $j );
			
			$codprod[$nprod] = $prod->showcampo2();
			$qtde[$nprod] = $qtde[$k];
			$codprodcj[$nprod] = $codprod[$k];
			$tipoprod[$nprod] = "CJ";
			
			if ($tipocj[$k] == 0){
				$prod->listProdgeral("pedidoprod", "codped=$codpedselect group by tipocj order by tipocj", $array312, $array_campo312 , "");
				for($ou = 0; $ou < count($array312); $ou++ ){
					$prod->mostraProd( $array312, $array_campo312, $ou );
					$tipocjold = $prod->showcampo9();
					#echo("ccj = $contcj - tcj=$tipocjold - ccjold=$contcjold");
				if($contcj==$tipocjold){$contcj++;}
				}
			
			$tipocj[$nprod] = $contcj;
			}else{
			$tipocj[$nprod] = $tipocj[$k];
			}	
				
			#echo("cp=$nprod - qt=$qtde[$nprod] - j=$j - unid=$unidade[$k]");
			$nprod = $nprod+1;
			}	

			$codprod[$k] = 0;
			$qtde[$k] = 0;
		endif;
		}
		
        $prod->clear();
    	$prod->listProdU("tipo_vge, onsite","pedido", "codped='$codpedselect'");
		$tipo_vge = $prod->showcampo0();
		$onsite = $prod->showcampo1();
		
		
		#-- UP/ADD os produtos na tabela PEDPRODTEMP
		for($i = 0; $i < $nprod; $i++ ){

		
		if ($codprod[$i] <> 0 and $qtde[$i] <> 0){

		#echo("np=$nprod - i=$i - cp=$codprod[$i] - qt=$qtde[$i] - tp=$tipoprod[$i] <br>");
		
		$prod->setcampo7(0);
		$prod->setcampo13(0);
		$prod->setcampo6(0);
		$prod->setcampo12(0);
		$prod->setcampo15(0);
		$prod->setcampo14(0);
	
		#-- CALCULA PRECOS - INICIO
		switch ($tipovend) {

			// PRECO DE TABELA : $PRECO[$I] = $PRECOPADRAO[$I] * FATORMULT[$I]
			// PRECO DE VENDA : $PRECO[$I] * $FATORUSERTABELA
 
			case "A":
				if ($tipoprod[$i] =="CJ"):
					#-- Conjunto
					$prod->listProdU("pvacj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo15();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");					
				else:
					#-- Unidade
					$prod->listProdU("pva", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo14();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;

			break;

			default:
			
				if ($tipoprod[$i] =="CJ"):
					#-- Conjunto
					$prod->listProdU("pvvcj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo13();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");
					
				else:
					#-- Unidade
					$prod->listProdU("pvv", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo12();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;
			
		}
		// INSERE DESCONTO DO PLANO TELEMIG CELULAR
		$preco[$i] = $preco[$i] - $desc_plano[$i];

		#-- CALCULA PRECOS - FIM

		if ($codprodcj[$i] == ""){$codprodcj[$i]=0;}
		$prod->setcampo3(0);	
		$prod->setcampo4(0);
		$prod->setcampo8(0);
		$prod->setcampo6(0);

		    // VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
			 $prod->clear();
			 $prod->listProdU("gar_um, gar_cj, garext_12, garext_24, porc_garext_12, porc_garext_24, codcat, ponto","produtos", "codprod = '$codprod[$i]'");
			 $gar_um = $prod->showcampo0();
			 $gar_cj = $prod->showcampo1();
			 $garext_12[$i] = $prod->showcampo2();
       		 $garext_24[$i] = $prod->showcampo3();
	       	 $porc_garext_12[$i] = $prod->showcampo4();
             $porc_garext_24[$i] = $prod->showcampo5();
             $codcat[$i] = $prod->showcampo6();
             $ponto[$i] = $prod->showcampo7();
             $gar_um_or=$gar_um;
             $gar_cj_or=$gar_cj;
             
             $prod->listProdU("ordem","categoria", "codcat = '$codcat[$i]'");
    		 $ordem[$i] = $prod->showcampo0();
             
             if ($tipo_vge == 12){
              if (($garext_12[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_12[$i]== "OK" and $codcat[$i] == 73)){$vvge = $vvge + ($porc_garext_12[$i]/100)*$preco[$i];}
             }
            if ($tipo_vge == 24){
             if (($garext_24[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_24[$i]== "OK" and $codcat[$i] == 73)){$vvge = $vvge + ($porc_garext_24[$i]/100)*$preco[$i];}
             }
             
	        
             // CALCULA ESTOQUE
             $prod->listProdU("(SUM(qtde-reserva) - $qtde[$i]) as est, pcm", "estoque", "codprod='$codprod[$i]' and codemp = '$codempselect' group by codprod");
			$est_real = $prod->showcampo0();
			$pcm = $prod->showcampo1();
					
			$prod->listProdU("(SUM(qtdecomp)+$est_real) as qtdeoc","ocprod, oc", "codprod='$codprod[$i]' and ocprod.codemp=$codempselect and oc.hist <> 1 and oc.codoc=ocprod.codoc");
			$qtde_ocreal = $prod->showcampo0();
			
			if ($est_real < 0){
				if ($qtde_ocreal <= 0){$status_prod = "SE";}//SEM ESTOQUE 
				if ($qtde_ocreal > 0){$status_prod = "PC";}//PREVISAO COMPRA 
			}
			if ($est_real >= 0){$status_prod = "CE";}// COM ESTOQUE


        $prod->clear();
		$prod->listProdgeral("pedidoprod", "codped=$codpedselect and codprod=$codprod[$i] and codprodcj=$codprodcj[$i] and tipoprod='$tipoprod[$i]' and tipocj='$tipocj[$i]'", $array77, $array_campo77, "" );
		$numreg = count($array77);

		if ($numreg <> 0):

			$prod->mostraProd( $array77, $array_campo77, 0 );

			$codpped = $prod->showcampo0();
			$qtdeold = $prod->showcampo3();
			$precoold = $prod->showcampo4();
			$tipoprodold = $prod->showcampo8();
			
			$qtdenew=$qtdeold+$qtde[$i];
			#$preconew=$precoold+($qtde[$i]*$preco[$i]);

			$preconew = $preco[$i];
			if ($tipo_vge == 12){
             if (($garext_12[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_12[$i]== "OK" and $codcat[$i] == 73)){$preconew = $preconew + ($porc_garext_12[$i]/100)*$preconew;$gar_um_or=$gar_um;$gar_um = $gar_um + $tipo_vge;$gar_cj_or=$gar_cj;$gar_cj = $gar_cj + $tipo_vge;}
             }
            if ($tipo_vge == 24){
               if (($garext_24[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_24[$i]== "OK" and $codcat[$i] == 73)){$preconew = $preconew + ($porc_garext_24[$i]/100)*$preconew;$gar_um_or=$gar_um;$gar_um = $gar_um + $tipo_vge;$gar_cj_or=$gar_cj;$gar_cj = $gar_cj + $tipo_vge;}
             }
			#echo("$preco[$i] - $preconew - $vgarext");
			
		
			
	        if ($tipoprod[$i] == "UM"){$prod_add[$i] == 'OK';}
            if ($codcat[$i] == 4){$prod_placa[$i] == 'OK';}
            

			$prod->setcampo4($preconew);
			$prod->setcampo3($qtdenew);
			$prod->setcampo6($status_prod); // STATUS PROD
			$prod->setcampo5($dataatual); // DATA STATUS
			$prod->setcampo11($gar_um);
			$prod->setcampo12($gar_cj);
			$prod->setcampo19($gar_um_or);
    		$prod->setcampo20($gar_cj_or);
    		$prod->setcampo21($ponto[$i]);
    		$prod->setcampo23($pcm);
    		
			#echo("tpold=$tipoprodold - tpi=$tipoprod[$i]");

		else:
			$qtdenew=$qtde[$i];
			#$preconew=($qtde[$i]*$preco[$i]);
			$preconew = $preco[$i];
			if ($tipo_vge == 12){
              if (($garext_12[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_12[$i]== "OK" and $codcat[$i] == 73)){$preconew = $preconew + ($porc_garext_12[$i]/100)*$preconew;$gar_um_or=$gar_um;$gar_um = $gar_um + $tipo_vge;$gar_cj_or=$gar_cj;$gar_cj = $gar_cj + $tipo_vge;}
             }
            if ($tipo_vge == 24){
               if (($garext_24[$i]== "OK" and $tipoprod[$i] == "CJ") or ($garext_24[$i]== "OK" and $codcat[$i] == 73)){$preconew = $preconew + ($porc_garext_24[$i]/100)*$preconew;$gar_um_or=$gar_um;$gar_um = $gar_um + $tipo_vge;$gar_cj_or=$gar_cj;$gar_cj = $gar_cj + $tipo_vge;}
             }
	echo("$preco[$i] - $preconew - $vgarext");
            if ($tipoprod[$i] == "UM"){$prod_add[$i] = 'OK';}
            if ($codcat[$i] == 4){$prod_placa[$i] = 'OK';}
            
            	//GARANTIA ONSITE 
			if ($onsite == 'OK'){
               if (($tipoprod[$i] == "CJ")){

               	$prod->listProdU("gos_12, gos_24", "pedidoprod", "codped = '$codped' and tipocj = '$tipocj[$i]' and codprodcj = '$codprodcj[$i]' GROUP BY tipocj ORDER BY tipoprod, tipocj");
               	$goscj_12 = $prod->showcampo0();
               	$goscj_24 = $prod->showcampo1();
               	         	
               	$prod->setcampo24($goscj_12);
    			$prod->setcampo25($goscj_24);
               
               }else{	
               	$prod->setcampo24("NO");
    			$prod->setcampo25("NO");
    			$prod->setcampo26(0);
               }
             }
	
			$prod->setcampo1($codpedselect);
			$prod->setcampo2($codprod[$i]);
			$prod->setcampo7($codprodcj[$i]);
			$prod->setcampo8($tipoprod[$i]);
			$prod->setcampo9($tipocj[$i]);
			$prod->setcampo4($preconew);
			$prod->setcampo3($qtdenew);
			$prod->setcampo6($status_prod); // STATUS PROD
			$prod->setcampo5($dataatual); // DATA STATUS
			$prod->setcampo10("");
			$prod->setcampo11($gar_um);
			$prod->setcampo12($gar_cj);
			$prod->setcampo13($codplano[$i]);
			$prod->setcampo14($desc_plano[$i]);
			$prod->setcampo15($prod_add[$i]);
			$prod->setcampo16($prod_placa[$i]);
         	$prod->setcampo17(1);
         	$prod->setcampo18($ordem[$i]);
			$prod->setcampo19($gar_um_or);
    		$prod->setcampo20($gar_cj_or);
    		$prod->setcampo21($ponto[$i]);
    		$prod->setcampo23($pcm);
		endif;

		
		
		#if($qtde[$i] <> 0):

			#if ($tipoprod[$i]=="$tipoprodold"):
			
			#$qtdenew=$qtdeold+$qtde[$i];
			#$preconew=$precoold+($qtde[$i]*$preco[$i]);
			#else:
			#$qtdenew=$qtde[$i];
			#$preconew=($qtde[$i]*$preco[$i]);
			#$numreg=0;
			#endif;

			#$prod->setcampo4($preconew);
			#$prod->setcampo3($qtdenew);


		#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - pr=$preco[$i] - tp=$tipoprod[$i] - po=$precoold | ");
			
			
			#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - ct=$cont - j=$j  - tp=$tipoprod[$i] <br>");
			
			if ($numreg):
				if ($qtdenew > 0 ):
				// ATUALIZA PEDIDO

				$prod->upProd("pedidoprod", "codpped=$codpped");

				$dataatual = $prod->gdata();
				// INSERE MODIFICACAO
				$prod->setcampo0("");
				$prod->setcampo1($codpedselect);
				$prod->setcampo2($codprod[$i]);
				$prod->setcampo3($qtde[$i]);
				$prod->setcampo4("");
				$prod->setcampo5($codprodcj[$i]);
				$prod->setcampo6($tipocj[$i]);
				$prod->setcampo7($dataatual);
				$prod->setcampo8($login);
				if ($qtde[$i] > 0 ){
					$prod->setcampo9("AD");
				}else{
					$prod->setcampo9("EX");
				}
				$prod->addProd("pedidomod", $ureg);

					$qtdenovo = 0;
					$reservanovo = 0;
					// ATUALIZA ESTOQUE
					$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");

					$qtdeold = $prod->showcampo3();
					$reserva = $prod->showcampo4();
					
						$reservanovo = $reserva + $qtde[$i];
						$prod->setcampo4($reservanovo);
					
					#$logar = logar($dataatual, $codpedselect, $codprodped, $qtdeold, $reserva, $qtdeold, $reservanovo, $qtde[$i], 0);
					
					$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");
				
				else:
					/*
				// EXCLUI PRODUTO
			
				$dataatual = $prod->gdata();

					$prod->listProd("pedidoprod", "codpped=$codpped");

					$codcbped = $prod->showcampo10();
					$codprodcj = $prod->showcampo7();
					$codprodped = $prod->showcampo2();
					$qtde = $prod->showcampo3();
					$tipocj = $prod->showcampo9();
					$codcb_array = explode(":", $codcbped);
					$qtdenew_abs = abs($qtdenew);

						for($k = 0; $k < count($codcb_array); $k++ ){

							for($u = 0; $u < $qtdenew_abs; $u++ ){

							// LIBERA CODE BARRA
							$prod->listProd("codbarra", "codcb='$codcb_array[$k]'");
							
							$prod->setcampo4(0);
							$prod->setcampo5(0);
							$prod->setcampo6(0);
							$prod->setcampo7(0);
							$prod->upProd("codbarra", "codcb='$codcb_array[$k]'");
							
								if ($codcb_troca == ""){
									$codcb_troca = $codcb_array[$k];
								}else{
									$codcb_troca .= ":".$codcb_array[$k];
								}

							}
						}

						
						// INSERE MODIFICACAO
						$prod->setcampo0("");
						$prod->setcampo1($codpedselect);
						$prod->setcampo2($codprodped);
						$prod->setcampo3($qtde);
						$prod->setcampo4($codcb_array[$k]);
						$prod->setcampo5($codprodcj);
						$prod->setcampo6($tipocj);
						$prod->setcampo7($dataatual);
						$prod->setcampo8($login);
						$prod->setcampo9("EX");
								
						$prod->addProd("pedidomod", $ureg);

							$qtdenovo = 0;
							$reservanovo = 0;
							// ATUALIZA ESTOQUE
							$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");

							$qtdeold = $prod->showcampo3();
							$reserva = $prod->showcampo4();
							
							if ($codcb_array[$k] <> ""){
								#$qtde = abs($qtde);
								$qtdenovo = $qtdeold + $qtde;
								$prod->setcampo3($qtdenovo);
							}else{
								#$qtde = abs($qtde);
								$reservanovo = $reserva - $qtde;
								$prod->setcampo4($reservanovo);
							}
										
							$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");


						}
				$prod->delProd("pedidoprod", "codpped=$codpped");
					*/

				endif;
			else:
				if ($qtdenew > 0 ):
				// ADICIONA PRODUTO
				$prod->setcampo0("");
			    $prod->addProd("pedidoprod", $ureg);

					$dataatual = $prod->gdata();
					// INSERE MODIFICACAO
					$prod->setcampo0("");
					$prod->setcampo1($codpedselect);
					$prod->setcampo2($codprod[$i]);
					$prod->setcampo3($qtdenew);
					$prod->setcampo4("");
					$prod->setcampo5($codprodcj[$i]);
					$prod->setcampo6($tipocj[$i]);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");

					$prod->addProd("pedidomod", $ureg);

					$qtdenovo = 0;
					$reservanovo = 0;
					// ATUALIZA ESTOQUE
					$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");

					$qtdeold = $prod->showcampo3();
					$reserva = $prod->showcampo4();
					
						$reservanovo = $reserva + $qtde[$i];
						$prod->setcampo4($reservanovo);
					
					#$logar = logar($dataatual, $codpedselect, $codprod[$i], $qtdeold, $reserva, $qtdeold, $reservanovo, $qtde[$i], 0);
					$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");
				
				endif;
			endif;
			
		#endif;
		$prod->setcampo3(0);
		$prod->setcampo4(0);
		$prod->setcampo8(0);
		
		}
        }
        $prod->clear();
      	$prod->listProdU("SUM(ponto_prod*qtde)","pedidoprod", "codped=$codpedselect");
		$pontot_prod = $prod->showcampo0();
		if ($tipo_vge == 12){$ponto_gar = 50;}
        if ($tipo_vge == 24){$ponto_gar = 30;}
        if ($onsite == 'OK'){$ponto_gar_onsite = 50;}
        
        $prod->listProdU("codvend","pedido", "codped=$codpedselect");
		$codvend_ped = $prod->showcampo0();
        $prod->listProdU("(70000/ if (meta = 0, 70000, meta)) as fator","vendedor", "codvend=$codvend_ped");
		$fator_meta = $prod->showcampo0();
        
        $ponto_final = ($ponto_gar + $pontot_prod + $ponto_gar_onsite)*$fator_meta;
        
        echo("pf = $ponto_final");

        $prod->upProdU("pedido", "vge = $vvge, ponto_ped = '$ponto_final'", "codped=$codpedselect");

		$Actionsec="list";
			
        break;

	case "update":
		

		if(!$codpedselect){ 
			$prod->clear();
			$prod->listProdU("codped, modped, ped_transf,  modelo_ped", "pedido", "codbarra='$codpedpesq'");
		}else{
			$prod->clear();
			$prod->listProdU("codped, modped, ped_transf, modelo_ped", "pedido", "codped='$codpedselect'");
		}
	

		
		#$prod->listProdU("codped, modped", "pedido", "codbarra='$codpedpesq'");
		$ped_ok = $prod->showcampo0();
		$modped = $prod->showcampo1();
		$ped_transf = $prod->showcampo2();
		$modelo_ped = $prod->showcampo3();
		
		
	
		if ($ped_ok == ""){

			$Actionter = "lock";
			$prod->msggeral("Codbarra Incorreto !", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}

		if ($modped == "OK"){

			$Actionter = "lock";
			$prod->msggeral("Pedido em processo de Alteração! Não poderá ser modificado.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}

		if ($ped_transf == "OK"){

			$Actionter = "lock";
			$prod->msggeral("Pedido de Transferência! Não poderá ser modificado.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}
			if ($modelo_ped == "ATA"){

			$Actionter = "lock";
			$prod->msggeral("Pedido Atacado! Não poderá ser modificado.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}
		
		if ($modelo_ped == "DST"){

			$Actionter = "lock";
			$prod->msggeral("Pedido Distribuidor! Não poderá ser modificado.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}
		
		if ($modelo_ped == "RDD"){

			$Actionter = "lock";
			$prod->msggeral("Pedido Distribuidor FAT DIRETO! Não poderá ser modificado.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}
		
		if ($modelo_ped == "RDST"){

			$Actionter = "lock";
			$prod->msggeral("Pedido Distribuidor FAT REVENDA! Não poderá ser modificado.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}
				
		$Actionsec="list";
	
		
		 break;

	 case "list":
		
	
		$Actionsec="seclist";
	
		
		 break;

	 case "end":

		
		
		 break;


	 case "delete":
		
			$dataatual = $prod->gdata();

			$prod->listProd("pedidoprod", "codpped=$codpped");

			$codcbped = $prod->showcampo10();
			$codprodcj = $prod->showcampo7();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
    		$preco_prod = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$codcb_array = explode(":", $codcbped);
			
			$prod->clear();
    	    $prod->listProdU("tipo_vge","pedido", "codped='$codpedselect'");
	       	$tipo_vge = $prod->showcampo0();
			
			// VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
			 $prod->clear();
			 $prod->listProdU("gar_um, gar_cj, garext_12, garext_24, porc_garext_12, porc_garext_24, codcat","produtos", "codprod = '$codprodped'");
			 $gar_um = $prod->showcampo0();
			 $gar_cj = $prod->showcampo1();
			 $garext_12 = $prod->showcampo2();
       		 $garext_24 = $prod->showcampo3();
	       	 $porc_garext_12 = $prod->showcampo4();
             $porc_garext_24 = $prod->showcampo5();
             $codcat = $prod->showcampo6();
             
           # echo("vvge = $vvge - preco=$preco_prod");
             if ($tipo_vge == 12){
              if (($garext_12== "OK" and $tipoprod == "CJ") or ($garext_12== "OK" and $codcat == 73)){$vvge = $vvge - ($preco_prod/(1+$porc_garext_12/100))*$porc_garext_12/100;}
             }
            if ($tipo_vge == 24){
             if (($garext_24== "OK" and $tipoprod == "CJ") or  ($garext_24== "OK" and $codcat == 73)) {$vvge = $vvge - ($preco_prod/(1+$porc_garext_24/100))*$porc_garext_12/100;}
           }


    			$numcb = count($codcb_array);
				#echo("ncb=$numcb");

				for($i = 0; $i < count($codcb_array); $i++ ){

				// LIBERA CODE BARRA
				$prod->listProd("codbarra", "codcb='$codcb_array[$i]'");
				
				$prod->setcampo4(0);
				$prod->setcampo5(0);
				$prod->setcampo6(0);
				$prod->setcampo7(0);
				$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
				$prod->upProd("codbarra", "codcb='$codcb_array[$i]'");

				}

				// INSERE MODIFICACAO
				$prod->setcampo0("");
				$prod->setcampo1($codpedselect);
				$prod->setcampo2($codprodped);
				$prod->setcampo3($qtde);
				$prod->setcampo4($codcbped);
				$prod->setcampo5($codprodcj);
				$prod->setcampo6($tipocj);
				$prod->setcampo7($dataatual);
				$prod->setcampo8($login);
				$prod->setcampo9("EX");
						
				$prod->addProd("pedidomod", $ureg);

				
					$qtdenovo = 0;
					$reservanovo = 0;
					// ATUALIZA ESTOQUE
					$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodped");

					$qtdeold = $prod->showcampo3();
					$reserva = $prod->showcampo4();
					
					if ($codcbped <> ""){
						$qtdenovo = $qtdeold + $qtde;
						$prod->setcampo3($qtdenovo);

                        #$logar = logar($dataatual, $codpedselect, $codprodped, $qtdeold, $reserva, $qtdenovo, $reserva, $qtde, 2);
					}else{
						$reservanovo = $reserva - $qtde;
						if ($reservanovo < 0){$reservanovo =0;}
						$prod->setcampo4($reservanovo);
						
						#$logar = logar($dataatual, $codpedselect, $codprodped, $qtdeold, $reserva, $qtdeold, $reservanovo, $qtde, 3);
					}
					
					
								
					$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprodped");

				// DELETE PRODUTO DO PEDIDO
				$prod->delProd("pedidoprod", "codpped=$codpped");

        $prod->clear();
      	$prod->listProdU("SUM(ponto_prod*qtde)","pedidoprod", "codped=$codpedselect");
		$pontot_prod = $prod->showcampo0();
		if ($tipo_vge == 12){$ponto_gar = 20;}
        if ($tipo_vge == 24){$ponto_gar = 30;}
        
         
        $prod->listProdU("codvend","pedido", "codped=$codpedselect");
		$codvend_ped = $prod->showcampo0();
        $prod->listProdU("(70000/ if (meta = 0, 70000, meta)) as fator","vendedor", "codvend=$codvend_ped");
		$fator_meta = $prod->showcampo0();
        
        $ponto_final = ($ponto_gar + $pontot_prod)*$fator_meta;
        
        echo("pf = $ponto_final");

         $prod->upProdU("pedido", "vge = '$vvge', ponto_ped = '$ponto_final'", "codped=$codpedselect");
		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		if ($palavrachave == ""){$condicao2 = "";}
		
		if ($codprodpesq <>""){$condicao2 = "codprod=$codprodpesq ";}

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao2, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, unidade, descres, kit, pvv, lib_linha, hist ", $tabela, $condicao2, $array, $array_campo, $parm );
			


		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

		if($numreg-($desloc+$acrescimo)>0){
			$numregpg=$acrescimo;
		}else{
			$numregpg=$numreg-$desloc;
		}
}

if ($Actionsec == "seclist"){
		   
			if ($tipocliente==""){$tipocliente='F';}

			$condicao2 = "";
			if ($tipocliente == 'F'):

				if ($CPFCLI <>""):
					$condicao2 = "cpf='$CPFCLI'";
					$condicao3 = $condicao2 ;
				else:
					$condicao3 = $condicao2 ;
				endif;
			endif;
			if ($tipocliente == 'J'):
				
				if ($CGCCLI <>""):
					$condicao2 = "cnpj='$CGCCLI'";
					$condicao3 = $condicao2 ;
				else:
					$condicao3 = $condicao2 ;
				endif;
			endif;

		if ($CGCCLI <> "" or $CPFCLI <> ""){

		$prod->listProdSum("COUNT(*) as numreg", "clientenovo", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral("clientenovo", $condicao3, $array, $array_campo, "order by nome limit $desloc,$acrescimo" );
		}

		$Action="list";
		
	
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

		
}


// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");


// INCLUI CONSISTENCIA DO JAVA SCRIPT PARA O FORMULARIO
echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************

function verificaObrig (form)
{

	//***********************************************************************************
    //  Verifica dupla submissao  *******************************************************
    //***********************************************************************************
    //if (cond == OK)
    //{
    //    return false;
    //}


	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

    
    if (!(consisteCPF (form, form.CPFCLI.name, true)))
    {
        return false;
    }
	 if (!(consisteCGC (form, form.CGCCLI.name, true)))
    {
        return false;
    }

	return true;
      	
}

function verificaObrig1 (form)
{
	
	if((document.form1.padd.value==0))
    {
		alert('Nenhum Produto Adicionado');
        return false;
    }

	return true;
      	
}
//***************************************************************************************
//  Função para obtenção de descrição do campo
//  Retorno: Uma descrição para o campo que corresponde
//           ao que é mostrado no browser
//***************************************************************************************

function retornaNmCampo (campo)
{
	

    if (campo == 'CPFCLI')
        return 'CPF do Titular';
	if (campo == 'CGCCLI')
        return 'CNPJ da Empresa';
   
}


</script>

<script>
// AO SELECIONAR UM CAMPO RADIO RECARREGA A MESMA PAGINA
function getMessage(who)
{
    
     loc = who.value
     top.location=loc

}
</script>

");


if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

	// MOSTRA DADOS DO PEDIDO - INICIO

	
	if(!$codpedselect){ 
	
		$prod->listProd("pedido", "codbarra='$codpedpesq'");
	}else{
		$prod->listProd("pedido", "codped='$codpedselect'");	
	}
		$codpedselect = $prod->showcampo0();
		$codempselect = $prod->showcampo1();
		$codclienteselect = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$endentrega = $prod->showcampo4();
		$refentrega = $prod->showcampo5();
		$obsentrega = $prod->showcampo6();
		$dataped = $prod->showcampo11();
		$datapedf = $prod->fdata($dataped);
		$mlb = $prod->showcampo7();
		$mcv = $prod->showcampo19();
		$vpv = $prod->showcampo8();
		$vt = $prod->showcampo9();
		$vpp = $prod->showcampo10();
		$mlbf = number_format($mlb,2,',','.'); 
		$mcvf = number_format($mcv,5,',','.'); 
		$vpvf = number_format($vpv,2,',','.'); 
		$vtf = number_format($vt,2,',','.'); 
		$vppf = number_format($vpp,2,',','.'); 
		$obsmontagem = $prod->showcampo16();
		$dataprevent = $prod->showcampo12();
		$datapreventf  = $prod->fdata($dataprevent);
		$horaprevent = $prod->showcampo17();
		$obsfinanceiro = $prod->showcampo18();
		$modoentr = $prod->showcampo25();
		$obsapcredito = $prod->showcampo26();
		$nf = $prod->showcampo24();
		$contrato = $prod->showcampo27();
		$libentr = $prod->showcampo21();
		$notafin = $prod->showcampo28();
		$codbarra = $prod->showcampo29();
		$caixa = $prod->showcampo31();
		$fat = $prod->showcampo39();
		$vvge = $prod->showcampo63();

	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProd("clientenovo", "codcliente=$codclienteselect");
				
		$xcodcliente=	$prod->showcampo0();
		$xnome=			$prod->showcampo1();
		$xdatacad=		$prod->showcampo2();
		$xtipocliente=	$prod->showcampo3();
		$xcpf=			$prod->showcampo4();
		$xcnpj=			$prod->showcampo5();
		$xrg=			$prod->showcampo6();
		$xrgemissor=	$prod->showcampo7();
		$xie=			$prod->showcampo8();
		$xdatanasc=		$prod->showcampo9();
		$xdataativ=		$prod->showcampo10();
		$xsexo=			$prod->showcampo11();
		$xecivil=		$prod->showcampo12();
		$xnacionalidade=$prod->showcampo13();
		$xendereco=		$prod->showcampo14();
		$xbairro=		$prod->showcampo15();
		$xcidade=		$prod->showcampo16();
		$xcep=			$prod->showcampo17();
		$xestado=		$prod->showcampo18();
		$xtempolocal=	$prod->showcampo19();
		$xtipolocal=	$prod->showcampo20();
		$xdddtel1=		$prod->showcampo21();
		$xtel1=			$prod->showcampo22();
		$xdddtel2=		$prod->showcampo23();
		$xtel2=			$prod->showcampo24();
		$xramal=		$prod->showcampo25();
		$xfatmensal=	$prod->showcampo26();
		$xatividade=	$prod->showcampo27();
	// Dados da Empresa Cliente
		$xc_empresa=	$prod->showcampo28();
		$xc_cnpj=		$prod->showcampo29();
		$xc_tempoemp=	$prod->showcampo30();
		$xc_ocupacao=	$prod->showcampo31();
		$xc_descricao=	$prod->showcampo32();
		$xc_rendamensal=$prod->showcampo33();
		$xc_outrasrendas=$prod->showcampo34();
		$xc_endereco=	$prod->showcampo35();
		$xc_bairro=		$prod->showcampo36();
		$xc_cidade=		$prod->showcampo37();
		$xc_cep=		$prod->showcampo38();
		$xc_estado=		$prod->showcampo39();
		$xc_dddtel=		$prod->showcampo40();
		$xc_tel=		$prod->showcampo41();
		$xc_ramal=		$prod->showcampo42();
		$xc_endcorresp=	$prod->showcampo43();
	// Dados do Conjuge
		$xcj_nome=		$prod->showcampo44();
		$xcj_cpf=		$prod->showcampo45();
		$xcj_rg=		$prod->showcampo46();
		$xcj_rgemissor=	$prod->showcampo47();
		$xcj_datanasc=	$prod->showcampo48();
		$xcj_empresa=	$prod->showcampo49();
		$xcj_ocupacao=	$prod->showcampo50();
		$xcj_descricao=	$prod->showcampo51();
		$xcj_rendamensal=$prod->showcampo52();
		$xcj_dddtel=	$prod->showcampo53();
		$xcj_tel=		$prod->showcampo54();
		$xcj_ramal=		$prod->showcampo55();
	// Referencia Bancaria
		$xrb_banco=		$prod->showcampo56();
		$xrb_agencia=	$prod->showcampo57();
		$xrb_conta=		$prod->showcampo58();
		$xrb_tipo=		$prod->showcampo59();
		$xrb_dddtel=	$prod->showcampo60();
		$xrb_tel=		$prod->showcampo61();
		$xrb_clientedesde=$prod->showcampo62();
	// Referencia Pessoal
		$xrp_nome1=		$prod->showcampo63();
		$xrp_dddtel1=	$prod->showcampo64();
		$xrp_tel1=		$prod->showcampo65();
		$xrp_nome2=		$prod->showcampo66();
		$xrp_dddtel2=	$prod->showcampo67();
		$xrp_tel2=		$prod->showcampo68();
	// Referencia Comercial
		$xrc_nome1=		$prod->showcampo69();
		$xrc_dddtel1=	$prod->showcampo70();
		$xrc_tel1=		$prod->showcampo71();
		$xrc_nome2=		$prod->showcampo72();
		$xrc_dddtel2=	$prod->showcampo73();
		$xrc_tel2=		$prod->showcampo74();
	// Outros
		$xobsvend=		$prod->showcampo75();
		$xobscredito=	$prod->showcampo76();
		$xemail=		$prod->showcampo77();
		$xopcaixa=		$prod->showcampo79();
		$xopcaixashow = explode(":", $xopcaixa);
		$xasscontrato=	$prod->showcampo80();
		

	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		$codemp = $codempselect;

	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();
	

echo("
<a name='topo'></a>


<div align='center'>
  <center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo1</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'></font></td>
                      </tr>
                    </tbody>
                  </table>

<div align='center'>
  <center>
  <table border='0' width='500' cellspacing='0' cellpadding='2'>
    <tr>
      <td width='27'><img border='0' src='images/n1.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' >ESCOLHA
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2c.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' color='#FF0000'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FORMA DE PAGAMENTO</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n4.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
    </tr>
  </table>
  </center>
</div>
 </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </center>
</div>

	

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 


<div align='center'>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
	 

    <tr>
      <td width='50%' bgcolor='#000000'>
        <p align='left'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PEDIDO:
        </b></font><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
      <center>
      <td width='50%' bgcolor='#000000'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='1'><b>VENDEDOR PEDIDO:</b></font><font size='1'><b><font color='#86ACB5' face='Verdana, Arial, Helvetica, sans-serif'>:</font><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><br>
      </font><font color='#FFFFFF' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
      </tr>
		 
      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          EMISSÃO PEDIDO:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datapedf</font></b></font></td>
      </center>
      <td width='50%' bgcolor='#F0F0F0'>
        <p align='right'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font face=' Verdana, Arial, Helvetica, sans-serif'>
       $nomeempold</font></font></td>
    </tr>
    <center>
    <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        CLIENTE</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>CLIENTE:<br>
        </font><font color='#000000'>$xnome</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CPF/CNPJ:<br>
      </font></b><font color='#000000'>$xcpf
      $xcgc</font></font></td>
    </tr>

    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDEREÇO:<br>
        </font>
        </b><font color='#000000'>$xendereco - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
    </tr>
			  <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br></b>
        </font><font color='#000000'>$xemail</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>($xdddtel1) $xtel1<br>($xdddtel2) $xtel2 <br>RAMAL: $xramal<br></font></td>
    </tr>
		
		  <!--
		     <tr>
        <td width='100%' bgColor='#FFFFFF' colspan='2'>
          <p align='right'><img src='cbshow.php?ean=9782212110333'></td>
      </tr>
		  -->
    </table>
  </center>
</div>

<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' colspan='2' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS ENTREGA</b></font></td>
    </tr>
    <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$endentrega</font></td>
      <td width='304' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>REF.
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$refentrega</font></td>
    </tr>
    <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MODO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$modoentr</font></td>
      <td width='304' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PREVISÃO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datapreventf - $horaprevent</font></td>
    </tr>
    
      <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top' colspan ='2'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS PARA
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsentrega</font></td>
	
    </tr>
    
    </table>
  </center>
</div>

<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS FINANCEIRO</b></font></td>
    </tr>
    <tr>
      <td width='540' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS PARA
        FINANCEIRO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsfinanceiro</font></td>
    </tr>
    </table>
  </center>
</div>
	<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS MONTAGEM</b></font></td>
    </tr>
    <tr>
      <td width='540' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS PARA
        MONTAGEM:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsmontagem</font></td>
    </tr>
    </table>
  </center>
</div>


<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 
<a name='lista'></a>

		<br>


<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTA DE PRODUTOS ADICIONADOS AO PEDIDO</b> </font></td>
  </tr>
</table>



<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>CB</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>CONJUNTO</b></font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS DO PEDIDO</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PU(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PT(R$)</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codpedselect", $array3, $array_campo3 , "order by tipocj");
 $padd = count($array3);
if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=8><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS DE CONJUNTOS</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){

		  $lmt="";
			$datapreventant = "0000-00-00";
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			
			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$qtdecj[$codprodped] = $qtde;
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			//VERIFICA ESTOQUES
				$prod->listProd("estoque", "codprod=$codprodped and codemp=$codemp");
				
				$qtdeest[$codprodped] = $prod->showcampo3();
				$reservaest[$codprodped] = $prod->showcampo4();

				

				$est[$codprodped] = ($qtdeest[$codprodped]-$qtdeestold[$codprodped])-($reservaest[$codprodped]);
						#echo("est[$codprodped]= $est[$codprodped]");

								
					if ((($qtdeest[$codprodped]-$qtdeestold[$codprodped])-$reservaest[$codprodped]) >= $qtdecj[$codprodped]):

						$statusest = "<IMG SRC='images/est_ok.gif'  BORDER=0 >";
						$datapreventcj = "0000-00-00";
						$statusfinal = "OK";
						


												
					else:

					

						//VERIFICA OC
						$prod->listProdgeral("ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc", $array111, $array_campo111 , "order by dataprevcheg");
						
						if (count($array111)<>0){

						if ($qtdeocusado[$codprodped] == 0){

						  for($iab = 0; $iab < count($array111); $iab++ ){

							$prod->mostraProd( $array111, $array_campo111, $iab );
							$qtdeoc[$codprodped] = $prod->showcampo3();
							$dataprevcj[$codprodped] = $prod->showcampo23();

							$qtdeoct[$codprodped] = $qtdeoct[$codprodped] + $qtdeoc[$codprodped];
							
						  }
						}
								
							if (($qtdeoct[$codprodped]-$qtdeocusado[$codprodped]) >= $qtdecj[$codprodped]):
								
								#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

								$lmt[$codprodped] = ($qtdecj[$codprodped]-($qtdecj[$codprodped]-($qtdeoct[$codprodped]-$qtdeocusado[$codprodped])));
						
								$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];
								$datapreventcj = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$lmt[$codprodped];
								$statusfinal = "PREV";
								$dataprevcjf = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$lmt[$codprodped];
								$corstatus = "#3366CC";
								
							
							else:

								#echo(" NAO ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

								if (($qtdeoct[$codprodped]-$qtdeocusado[$codprodped]) <= 0){
									$dataprevcjf ="<IMG SRC='images/est_no.gif'  BORDER=0 >";
									$datapreventcj = "0000-00-00";
									$statusfinal = "S/PREV";
									$corstatus = "#FF0000";
									$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];

								


								}else{
								
									$lmt[$codprodped] = ($qtdecj[$codprodped]-($qtdecj[$codprodped]-($qtdeoct[$codprodped]-$qtdeocusado[$codprodped])));
									if ($qtdecj[$codprodped] <= $lmt[$codprodped]) {

										$datapreventcj = $dataprevcj[$codprodped];
										$dataprevcjf = "<IMG SRC='images/est_prev.gif' BORDER=0 > ".$lmt[$codprodped];
										$statusfinal = "PREV";
										$corstatus = "#FFCC00";
										
										$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];
										


									}else{

										$dataprevcjf = "<IMG SRC='images/est_no.gif'  BORDER=0 > ".$lmt[$codprodped];
										$datapreventcj = "0000-00-00";
										$statusfinal = "S/PREV";
										$corstatus = "#FF0000";
										$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];
										


									}
								}

								

							endif;

																			
						$statusest = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corstatus'>$dataprevcjf</font>";

						}else{
						$statusest = "<IMG SRC='images/est_no.gif'  BORDER=0 >" ;
						$statusfinal = "S/PREV";
						}
						
					endif;

				$qtdeestold[$codprodped]++;
				
				#echo("   -    qtdeestold[$codprodped] = $qtdeestold[$codprodped]");
			
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();


			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
			
			
		
			$k=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

		

	if ($tipocj <> $contcjshow){
		
			
			echo(" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
		
  ");
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
	
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$statusest</b></font></td>
	<td width='5%' height='0' align='center'>
	  ");
for($o = 0; $o < $qtde; $o++ ){

  	if ($codcb_array[$o] == ""){
		$cb="NO";
		$cor1 ="#FF0000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}else{
		$cb="OK";
		$cor1="#008000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}
}
echo("
</td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
    <td align='center' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codpped=$codpped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpedselect=$codpedselect&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&vvge=$vvge#lista'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
  </tr>
		
  ");

	

	$ptotal = $ptotal + $put;
		}
	$putotal = $putotal +$puu;
	$pmtotal = $pmtotal +$put;
	$putotalf = number_format($putotal,2,',','.'); 
	$pmtotalf = number_format($pmtotal,2,',','.'); 

		}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=8><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");
  
  $pmtotalu = 0.00;	

	 // PRODUTOS UNITARIO
	 for($i = 0; $i < count($array3); $i++ ){

		  $lmt="";
			$datapreventant = "0000-00-00";
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$qtdecj[$codprodped] = $qtde;
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			//VERIFICA ESTOQUES
				$prod->listProd("estoque", "codprod=$codprodped and codemp=$codemp");
				
				$qtdeest[$codprodped] = $prod->showcampo3();
				$reservaest[$codprodped] = $prod->showcampo4();
				#$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];

				


				$est[$codprodped] = ($qtdeest[$codprodped]-$qtdeestold[$codprodped])-($reservaest[$codprodped]);
						#echo("est[$codprodped]= $est[$codprodped]");
				
					if ((($qtdeest[$codprodped]-$qtdeestold[$codprodped])-$reservaest[$codprodped]) >= $qtdecj[$codprodped]):

						

						$statusest = "<IMG SRC='images/est_ok.gif'  BORDER=0 >" ;
						$datapreventcj = "0000-00-00";
						$statusfinal = "OK";

					
						

												
					else:

					

						//VERIFICA OC
						$prod->listProdgeral("ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc", $array111, $array_campo111 , "order by dataprevcheg");
						
						if (count($array111)<>0){

						if ($qtdeocusado[$codprodped] == 0){

						  for($iab = 0; $iab < count($array111); $iab++ ){

							$prod->mostraProd( $array111, $array_campo111, $iab );
							$qtdeoc[$codprodped] = $prod->showcampo3();
							$dataprevcj[$codprodped] = $prod->showcampo23();

							$qtdeoct[$codprodped] = $qtdeoct[$codprodped] + $qtdeoc[$codprodped];
							
						  }
						}
								
							if (($qtdeoct[$codprodped]-$qtdeocusado[$codprodped]) >= $qtdecj[$codprodped]):
								
								#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");
						
								$lmt[$codprodped] = ($qtdecj[$codprodped]-($qtdecj[$codprodped]-($qtdeoct[$codprodped]-$qtdeocusado[$codprodped])));
						
								$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];
								$datapreventcj = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$lmt[$codprodped];
								$statusfinal = "PREV";
								$dataprevcjf = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$lmt[$codprodped];
								$corstatus = "#3366CC";
								
							
							else:

								#echo(" NAO ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

								if (($qtdeoct[$codprodped]-$qtdeocusado[$codprodped]) <= 0){
									$dataprevcjf ="<IMG SRC='images/est_no.gif'  BORDER=0 >";
									$datapreventcj = "0000-00-00";
									$statusfinal = "S/PREV";
									$corstatus = "#FF0000";
									$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];
								

								}else{

									$lmt[$codprodped] = ($qtdecj[$codprodped]-($qtdecj[$codprodped]-($qtdeoct[$codprodped]-$qtdeocusado[$codprodped])));
									if ($qtdecj[$codprodped] <= $lmt[$codprodped]) {

										$datapreventcj = $dataprevcj[$codprodped];
										$dataprevcjf = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$lmt[$codprodped];
										$statusfinal = "PREV";
										$corstatus = "#FFCC00";
										
										$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];
										

									}else{

										$dataprevcjf = "<IMG SRC='images/est_no.gif'  BORDER=0 > " . $lmt[$codprodped];
										$datapreventcj = "0000-00-00";
										$statusfinal = "S/PREV";
										$corstatus = "#FF0000";
										$qtdeocusado[$codprodped] = $qtdeocusado[$codprodped] + $qtdecj[$codprodped];

										

									}
								}

								

							endif;

																			
						$statusest = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corstatus'>$dataprevcjf</font>";

						}else{
						$statusest = "<IMG SRC='images/est_no.gif'  BORDER=0 >";
						$statusfinal = "S/PREV";
					
						}
						
					endif;

				$qtdeestold[$codprodped]++;
				
				#echo("   -    qtdeestold[$codprodped] = $qtdeestold[$codprodped]");

			
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 
			
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$statusest</b></font></td>
	<td width='5%' height='0' align='center'>
	  ");
for($o = 0; $o < $qtde; $o++ ){

  	if ($codcb_array[$o] == ""){
		$cb="NO";
		$cor1 ="#FF0000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}else{
		$cb="OK";
		$cor1="#008000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}
}
echo("
</td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
    <td align='center' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codpped=$codpped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpedselect=$codpedselect&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&vvge=$vvge#lista'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
  </tr>
		
  ");

	
	$ptotal = $ptotal + $put;
	$pmtotalu = $pmtotalu + $put;
	$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotaluf</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
		
  ");


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=8><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotal = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>R$</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
		
  ");

	echo("
		</table>
	<br>
<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
     
 

      
    </td>
  </tr>
</table>

<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>

  <div align='center'>
    <center>

   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='70%' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
    </tr>
		<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR À VISTA:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vpvf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
    </tr>

	 </table>
</center>
  </div>
		 <br>
		 <br>




	<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - ESCOLHA DE PRODUTOS</font></b></td>
  </tr>
</table>



	<form method='POST' action='$PHP_SELF?Action=update#adicionar' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codpedselect' value='$codpedselect'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		    <input type='hidden' name='vvge' value='$vvge'>

	  </p>
	</form>
	<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr> 
    <td width='95'> 
      <div align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> 
        &nbsp; </b> </font></div>
    </td>
    <td width='455'> 
      <div align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></div>
    </td>
  </tr>
  <tr> 
    <td colspan='2'>&nbsp;</td>
  </tr>
</table>
	
	
<a name='adicionar'></a>
<table border='0' width='550' align='center'>
  <tr>
    <td width='100%'>
          <form method='POST' action='$PHP_SELF?Action=insert#lista' >
            <table border='0' width='100%'>
              <tr bgcolor='$bgcortopo1'> 
                <td width='5%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'></font></b></td>
				<td width='50%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>NOME PRODUTO&nbsp;</font></b></td>
				<td width='5%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>UN</font></b></td>
                <td width='10%' align='center' nowrap height='5' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></td>
                <td width='10%' align='center' nowrap ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>PU(R$)</font></b></td>
                <td width='20%' nowrap height='5' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>TIPO PROD.</b> 
                  </font></td>
              </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codprod[$i] = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$unidade[$i] = $prod->showcampo2();
			$descres = $prod->showcampo3();
			$kit = $prod->showcampo4();
			$ppu = $prod->showcampo5();
			$ppuf = number_format($ppu,2,',','.'); 
			$lib_linha = $prod->showcampo6();
			$hist_prod = $prod->showcampo7();

			if ($unidade[$i] == "CJ"){

				$pvvcjtotal = 0;

			$prod->listProdgeral("relacoes", "codprod=$codprod[$i]", $array3, $array_campo3 , "");

				for($u = 0; $u < count($array3); $u++ ){
				
				$prod->mostraProd( $array3, $array_campo3, $u );
				$codsubprod = $prod->showcampo2();
				$qtde = $prod->showcampo3();

				$prod->listProdSum("pvvcj", "produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
				$prod->mostraProd( $array1, $array_campo1, 0 );
				$pvvcj = $prod->showcampo0();
			
				$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
				} // FOR

			$ppuf = number_format($pvvcjtotal,2,',','.'); 

			#if ($unidade[$i] == "CJ"){
			#	if ($contcj==0){$contcj=1;}else{$contcj++;}
			#}

			}

			// CALCULA TODO O ESTOQUE
			$prod->clear();
			$prod->listProdU("qtde, reserva", "estoque" , "codprod = $codprod[$i] and codemp = $codempselect GROUP BY codprod");
			$qtde = $prod->showcampo0();
			$reserva = $prod->showcampo1();

			if ($reserva < 0 ){$reserva = 0;}
			if ($qtde < 0 ){$qtde = 0;}
			$estoque = $qtde - $reserva;

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod, oc ", "codprod = $codprod[$i] and ocprod.codemp=$codempselect and hist<>1 and oc.codoc=ocprod.codoc");
			$qtdecomp = $prod->showcampo0();
			$qtdecomp = $qtdecomp - $reserva;

	$kit_no = 0;$linha_no=0;
	if ($estoque > 0){
		$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
	}else{
		if ($qtdecomp > 0 ){
			$alarm = "<IMG SRC='images/est_prev.gif' BORDER=0 ><br>$qtdecomp"; //PREVISAO DE COMPRA
			
		}else{
			if ($unidade[$i] <> "CJ"){
				$alarm = "<IMG SRC='images/est_no.gif'  BORDER=0 >"; // SEM ESTOQUE
				if ($kit == "Y"){$kit_no = 1;}else{$kit_no = 0;}
				if ($lib_linha == "Y"){$linha_no = 0;}else{$linha_no = 1;}
			}else{
				$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
			}
		} 
	}
	
        if ($hist_prod  == Y){$cor = "#F9EAC6";}else{$cor = "#D6E7EF";}
	if ($unidade[$i] == "CJ"){$cor="#F3F8FA";}
	if ($kit == "Y"){$cor ="#C7E9C0";}

	#if ($kit_no <> 1 and $linha_no <> 1){
					
		echo("
		 <tr bgcolor='$cor'> 
				<td width='5%' align = 'center'><font face='Verdana' size='1'>$alarm</font></td>
				<td width='50%' ><font face='Verdana' size='1' color='#990000'>$codprod[$i] - $nomeprod</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font>
	
		");
			$prod->listProdSum("desconto, codplano","produtos_planos_relacao", "codprod=$codprod[$i]", $array38, $array_campo38 , "");

// EXISTE RELACAO DE PLANOS
if (count($array38) <> 0 ){
	
echo("
	<select name='descplano[$i]' class=drpdwn>
");
	 for($oq = 0; $oq < count($array38); $oq++ ){
			
			$prod->mostraProd( $array38, $array_campo38, $oq );
			$desc = $prod->showcampo0();
			$codplano = $prod->showcampo1();
						
			$prod->listProdU("plano", "produtos_planos", "codplano=$codplano");
			$nomeplano = $prod->showcampo0();


			
			echo("
				<option value='$desc:$codplano'>$nomeplano</option>
				
				");
	 }//FOR
}// EXISTE RELACAO DE PLANOS
echo("
		 
		 </td>
				<td width='5%' align='center' ><font face='Verdana' size='1'>$unidade[$i]</font></td>
                <td width='10%' align='center' ><font face='Verdana' size='1'> 
                 <input type='text' name='qtde[$i]' size='4' maxlength='3' value='0'>

	</font></td>
                <td width='10%' align='center' ><font face='Verdana' size='1'><strong>$ppuf</strong></font></td>
                <td width='20%' align = 'center' > 
	");
	#if ($unidade[$i] <> "CJ"){
		echo("
		<select name='tipoprodt[$i]' class=drpdwn>
		");
		$prod->listProdgeral("pedidoprod", "codped=$codpedselect and codprodcj <> 0 group by tipocj", $array31, $array_campo31 , "");

	 for($o = 0; $o < count($array31); $o++ ){
			
			$prod->mostraProd( $array31, $array_campo31, $o );
			
			$codprodcj = $prod->showcampo7();
			$tipocj = $prod->showcampo9();
						
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}

		if ($unidade[$i] == "CJ"){
			if ($codprodcj == $codprod[$i]){
			echo("
				<option value='CJ:$codprodcj:$tipocj'>$nomeprodcj</option>
				
				");
			}
		}else{
		echo("
			<option value='CJ:$codprodcj:$tipocj'>$nomeprodcj</option>
			
			");
		} // UNIDADE  == CJ
	 } //FOR
	if ($unidade[$i] == "CJ"){
		
		echo("
			<option selected value='CJ:0:0'>Novo Conjunto</option>
        </select> 
		");
	}else{
		echo("
			<option selected value='UM:0:0'>Unidade</option>
        </select> 
	");
	} // UNIDADE  == CJ
		#}
				
		echo(" 
		</td>
              </tr>
			  <input type='hidden' name='codprod[$i]' value='$codprod[$i]'>
				<input type='hidden' name='unidade[$i]' value='$unidade[$i]'>
		");
	 #}
	 
		echo(" 

 <tr> 
	 ");
	 } // KIT SEM ESTOQUE
	 echo("
                <td  colspan='6' ><br>
                  <p align='right'><font face='Verdana' size='1'><b><font size='2'>
                    <input  class='sbttn' type='submit' name='Submit' value='Adicionar iten(s) escolhido(s)'>
                    </font></b></font></p>
                </td>
              </tr>
            </table>

				  <input type='hidden' name='cont' value='$numregpg'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>

				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codpedselect' value='$codpedselect'>
				  <input type='hidden' name='codclienteselect' value='$codclienteselect'>
                  <input type='hidden' name='codvendselect' value='$codvendselect'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='retorno' value='$retorno'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
			      <input type='hidden' name='connectok' value='$connectok'>
                <input type='hidden' name='pg' value='$pg'>
                  <input type='hidden' name='vvge' value='$vvge'>
				  
      </form>
    </td>
  </tr>
</table>


  </center>
</div>


	");

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



else:

/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

	echo("
	<a name='topo'></a>

<div align='center'>
  <center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo1</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'></font></td>
                      </tr>
                    </tbody>
                  </table>

<div align='center'>
  <center>
  <table border='0' width='500' cellspacing='0' cellpadding='2'>
    <tr>
      <td width='27'><img border='0' src='images/n1c.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' color='#FF0000'>ESCOLHA
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FORMA DE PAGAMENTO</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n4.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
    </tr>
  </table>
  </center>
</div>

	 </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </center>
</div>




<form method='POST' action='$PHP_SELF?Action=update#cliente' name='FormPesq' >

	<table width='550' border='0' cellspacing='0' cellpadding='0' align='center' >
	 <tr> 
      <td width='550' colspan='2' > 
      <p align='center'>

<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>CODPED: <input type='text' name='codpedpesq' size='14' maxlength='13'> </font>
<input class='sbttn' type='submit' name='cond' value='OK'></p>
      </td>
     
	  
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		
    </tr>
  </table>
	</form>

");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action<> "list" ){
/// CONTADOR DE PAGINAS ////
$Action= "update";
$compl= "codpedselect=$codpedselect&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg";   
/// Complemento para a parte de mudanca de pagina
include("numcontg.php");
}



echo("
<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>

");
if ($Action <> "list"){

	echo("

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>


<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>V</font>
        - MODIFICAÇÃO DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='555' border='0'>

      <tr bgColor='#D6B778'>
        <td width='86' ><b><font face='Verdana' color='#FFFFFF' size='1'>DATA</font></b></td>
        <td width='263' ><b><font face='Verdana' color='#FFFFFF' size='1'>PRODUTO</font></b></td>
        
        <td width='44' ><b><font face='Verdana' color='#FFFFFF' size='1'>QTDE</font></b></td>
        
        <td width='100' ><b><font face='Verdana' color='#FFFFFF' size='1'>CODBARRA</font></b></td>
        
        <td width='80' ><b><font face='Verdana' color='#FFFFFF' size='1'>OPERAÇÃO</font></b></td>
        
      </tr>



");

	$prod->listProdgeral("pedidomod", "codped=$codpedselect", $array612, $array_campo612 , "order by datamod");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codprod_mod = $prod->showcampo2();
			$qtde_mod = $prod->showcampo3();
			$codcb_mod = $prod->showcampo4();
			$codprodcj_mod = $prod->showcampo5();
			$tipocj_mod = $prod->showcampo6();
			$datamod = $prod->showcampo7();
			$login = $prod->showcampo8();
			$statusmod = $prod->showcampo9();
			$datamodf = $prod->fdata($datamod);

			$prod->clear();			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_mod");
			$nomeprod_mod = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj_mod");
			$nomeprodcj_mod = $prod->showcampo0();

		$codbarra_troca = "";
		if ($codcb_mod <> ""){
			
			$codcb_array = explode(":", $codcb_mod);

		   for($y = 0; $y < count($codcb_array); $y++ ){

			$prod->clear();
			$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$y]");
			$codbarra_mod = $prod->showcampo0();

					if ($y == 0){
						$codbarra_troca = $codbarra_mod;
					}else{
						$codbarra_troca .= ", ".$codbarra_mod;
					}

			}
		}
			
	echo("
     <tr bgColor='#F2E4C4'>
        <td width='86' ><font face='Verdana' size='1'>$datamodf</font></td>
        <td width='263' ><font face='Verdana' size='1'><b>$nomeprod_mod<br>
          </b>$nomeprodcj_mod - $tipocj_mod</font></td>
        <td width='44' ><font face='Verdana' size='1'>$qtde_mod</font></td>
        <td width='100' ><font face='Verdana' size='1'>$codbarra_troca</font></td>
        <td width='80'><font face='Verdana' size='1'><b>$statusmod</b></font></td>
      </tr>



");		
	}
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>





<br>
<a name='finalizar'></a>

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      III</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRÓXIMA ETAPA </font></b></td>
  </tr>
</table>
 <form name='form1' method='post' action='$PHP_SELF?Action=endtroca&desloc=0&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$codpgtrocasec' >



<br>

<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
      <div align='right'>
          <table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='58%'><b></td>
              
              <td width='22%'>
                <p align='right'>
          <input class='sbttn' type='submit' name='Submit' value='Próxima Etapa => Forma de Pagamento'>
              </td>
            </tr>
          </table>
        </div>
      
    </td>
  </tr>
</table>
<input type='hidden' name='padd' value='$padd'>

</form>
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>

	");
}



include ("sif-rodape.php");

}
?>
       
