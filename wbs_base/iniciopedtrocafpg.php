

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataped DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "ADMINISTRAÇÃO USUÁRIO";
$subtitulo = "PEDIDOS";

$tipopesq="for";

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

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($codempvend <> 0){$codempselect = $codempvend;}

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "endtroca":

		$prod->listProdU("codemp, codvend, fatorvista, sj10x","pedido", "codped='$codpedselect'");

		$codempselect = $prod->showcampo0();
		$codvendselect = $prod->showcampo1();
		$fatorvista = $prod->showcampo2();
		$sj10x_fim = $prod->showcampo3();
		
		
		if ($sj10x_fim == 'OK'){
		  $fatorvista = 1;
		  $taxa = 0.01;
		  $tac = 0;
		  $num_parc_calc = 10;
		  #if ($nump >10){$nump=10;}
  
		}
        
		
		
		#$prod->listProdU("fatorvista","empresa", "codemp=$codempselect");
		#$fatorvista = $prod->showcampo0();
		#echo("t=$taxa");
		$prod->listProdU("fatorcusto","vendedor", "codvend=$codvendselect");
		$fatorcusto = $prod->showcampo0(); 
		
		
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("SUM(qtde*ppu) as vt", "pedidoprod", "codped=$codpedselect", $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$vt = $prod->showcampo0();

		#echo("vt=$vt");

		$valortotaltabela = $vt;
		$valortotaltabelavista = $valortotaltabela*$fatorvista;
		$valorcustovista = $valortotaltabelavista*$fatorcusto;


		// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedido", "codped=$codpedselect");
			
			$prod->setcampo9($valortotaltabela);
			$prod->setcampo20($valorcustovista);
			$prod->setcampo63($valorvge);
			#$prod->setcampo14($statusped);
			
			$prod->upProd("pedido", "codped=$codpedselect");

		$Action="update";

		$codped = $codpedselect;

		#echo("AQUI");

		
        break;

    case "update":

						
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;

     case "insertparc":

	 	for($p = 0; $p < $numpar_add; $p++ ){

		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codped);
		$prod->setcampo4("02.00");
		$prod->setcampo9("NO");
		$prod->setcampo10("NO");
		$prod->addProd("pedidoparcelas", $uregparc);

		}
		
		$prod->upProdU("pedido","confirm_fpg = 'NO'", "codped='$codped'");

		$Action="update";
			
		 break;

	 case "end":

			$dataatual = $prod->gdata();

			$prod->listProdU("dataped","pedido", "codped=$codped");
			$data_ped = $prod->showcampo0();
			
			// VERIFICA CONSITENCIA DE DATAS
			$prod->listProdMY("IF ('$data_ped' < '2003-12-12 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$control = $prod->showcampo0();

			//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
			$prod->listProdSum("COUNT(*) as pg", "pedidoparcelas", "codped=$codped and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
			$prod->mostraProd( $array613, $array_campo613, 0 );
			$numparcpg = $prod->showcampo0();
			
			$prod->clear();
            $prod->listProdU("COUNT(*)", "pedidoparcelas", "codped=$codped and tipo = '02.44' and parcpg = 'OK'");
            $num_finasa = $prod->showcampo0();

		 	// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedido", "codped=$codped");
			$hist_ped = $prod->showcampo15();
			$comissao_ped = $prod->showcampo38();
			$transf_ped = $prod->showcampo49();
			$pontos_ped = $prod->showcampo66();
			
			$prod->setcampo44("OK");  // MODIFICAÇÃO - PEDIDO
			if ($control == "S"){
				#$prod->setcampo27("NO");  // CONTRATO				
			}

			$prod->setcampo22("NO");  // COD BARRA
			if ($transf_ped <> 'OK'){
				$prod->setcampo21("NO");  // LIB. ENTREGA
			}
			if ($hist_ped == 1){
				$prod->setcampo15(0);  // HISTORICO
			}
			
			$prod->setcampo24("NO");  // NOTA FISCAL
			$prod->setcampo39("NO");  // FAT - FATURAMENTO
		
			if ($condpg == 1){
					#$prod->setcampo24("NO");  // NOTA FISCAL
					#$prod->setcampo39("NO");  // FAT - FATURAMENTO
				if ($numparcpg <> 0){
					$prod->setcampo31("NO");  // CAIXA
					$prod->setcampo51("NO"); // CONFIRMACAO DA FORMA DE PAGAMENTO
				}

			}	
			//CONTROLE FINASA
			if ($num_finasa > 0){$pontos_ped = 2*$pontos_ped;}
            $prod->setcampo66($pontos_ped); // PONTOS_PED
            
			$prod->upProd("pedido", "codped=$codped");

			// ATUALIZA STATUS DA TABELA
			$prod->setcampo0("");
			$prod->setcampo1($codped);
			$prod->setcampo2($dataatual);
			$prod->setcampo3("MOD INICIO");
			$prod->setcampo4($login);

			$prod->addProd("pedidostatus", $ureg);

			if ($condpg == 1 and $comissao_ped == "OK"){

			
					$prod->listProdU("mlb, vc, fatorcomissao, tipo, pedido.codvend, codbarra, codvend_cm, porc_cm, pedido.codemp , vendedor.codemp as codemp_vend", "pedido, vendedor", "codped=$codped and pedido.codvend=vendedor.codvend");
					$ped_mlb = $prod->showcampo0();
					$ped_vc = $prod->showcampo1();
					$ped_fatorcomissao = $prod->showcampo2();
					$ped_tipo = $prod->showcampo3();
					$ped_codvend = $prod->showcampo4();
					$ped_codbarra = $prod->showcampo5();
					$ped_codvend_cm = $prod->showcampo6();
					$ped_porc_cm = $prod->showcampo7();
					$ped_codemp = $prod->showcampo8();
					$ped_codemp_vend = $prod->showcampo9();

					if ($ped_porc_cm <> 0 and $ped_codvend_cm <> 0){

					$porc_vend = (100 - $ped_porc_cm)/100;
					$porc_vend_cm = ($ped_porc_cm)/100;
					
					$prod->listProdU("fatorcomissao", "vendedor", "codvend = $ped_codvend_cm");
					$ped_fatorcomissao_cm = $prod->showcampo0();

					if ($ped_tipo == 'R'){$valorp = $ped_mlb*$porc_vend;}
					if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_mlb*$porc_vend;}
					if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_mlb*$porc_vend;}
					if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_vc*$porc_vend;}
					if ($ped_tipo == 'V'){$valorp_cm = $ped_fatorcomissao_cm*$ped_mlb*$porc_vend_cm;}
					if ($ped_tipo == 'C'){$valorp_cm = $ped_fatorcomissao_cm*$ped_mlb*$porc_vend_cm;}
					if ($ped_tipo == 'R'){$valorp_cm = $ped_mlb*$porc_vend_cm;}
					if ($ped_tipo == 'A'){$valorp_cm = $ped_fatorcomissao_cm*$ped_vc*$porc_vend_cm;}


					#echo("codconta1=$codconta <br> mlb = $ped_mlb");

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
						$codconta = $prod->showcampo0();
					}

						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend_cm");
						$codconta_cm = $prod->showcampo0();

					#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->listProd("fin_bcomov", "codconta=$codconta and codped = $codped");
					$valorp_credito = $prod->showcampo4();
					$valorp_debito = $prod->showcampo5();
					
						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}
				
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Estorno Comissão Pedido");
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

					
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Comissão Pedido");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);


					//INSERE NO BCO (DIVISAO DE COMISSAO)
					$prod->clear();
					$prod->listProd("fin_bcomov", "codconta=$codconta_cm and codped = $codped");
					$valorp_credito = $prod->showcampo4();
					$valorp_debito = $prod->showcampo5();
					
						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}
				
					$prod->setcampo0("");
					$prod->setcampo1($codconta_cm);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Estorno Comissão Pedido");
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

					
					//INSERE NO BCO (DIVISAO DE COMISSAO)
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_cm);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Comissão Pedido");
					if ($valorp >= 0){
							$valorpf = abs($valorp_cm);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp_cm);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

			// NAO POSSUI DIVISAO DE COMISSAO COM OUTRO VENDEDOR
					}else{

					if ($ped_tipo == 'R'){$valorp = $ped_mlb;}
					if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_mlb;}
					if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_mlb;}
					if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_vc;}

					#echo("codconta1=$codconta <br> mlb = $ped_mlb");

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
						$codconta = $prod->showcampo0();
					}
					
					#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->listProd("fin_bcomov", "codconta=$codconta and codped = $codped");
					$valorp_credito = $prod->showcampo4();
					$valorp_debito = $prod->showcampo5();
					
						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}
				
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Estorno Comissão Pedido");
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

				
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Comissão Pedido");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

					}
					
//////////////////////////ACERTA VALORES NO CENTRO DE CUSTO
            		if ($ped_codemp <> $ped_codemp_vend){
            		
            			
	            		// CREDITA MLB NA EMPRESA DO VENDEDOR		
	            		$prod->clear();	
						$prod->listProdU("codconta", "fin_bcoconta, empresa", "fin_bcoconta.codvend=empresa.codvend_fin and empresa.codemp = $ped_codemp_vend");
						$codconta = $prod->showcampo0();
							
						
						//INSERE NO BCO
						$prod->clear();
						$prod->listProd("fin_bcomov", "codconta=$codconta and codped = $codped");
						$valorp_credito = $prod->showcampo4();
						$valorp_debito = $prod->showcampo5();
						
						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}
									
						$prod->setcampo0("");
						$prod->setcampo1($codconta);  //
						$prod->setcampo2("00.05");
						$prod->setcampo3("Estorno Acerto MLB Pedido");
						$prod->setcampo6($dataatual);
						$prod->setcampo7($dataatual);
						$prod->setcampo8("N");
						$prod->setcampo11($codped);
						$prod->setcampo13($login);	
						
						$prod->addProd("fin_bcomov", $uregbcomov);
						
							//INSERE NO BCO
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($codconta);  //
						$prod->setcampo2("00.05");
						$prod->setcampo3("Acerto MLB Pedido");
						if ($ped_mlb >= 0){
								$valorpf = abs($ped_mlb);
								$prod->setcampo4($ped_mlb);
							}else{
								$valorpf = abs($ped_mlb);
								$prod->setcampo5($ped_mlb);
							}
						$prod->setcampo6($dataatual);
						$prod->setcampo7($dataatual);
						$prod->setcampo8("N");
						$prod->setcampo11($codped);
						$prod->setcampo13($login);
	
						$prod->addProd("fin_bcomov", $uregbcomov);
            			
						
						// CREDITA MLB NA EMPRESA DO PEDIDO	
						$prod->clear();	
	            		$prod->listProdU("codconta", "fin_bcoconta, empresa", "fin_bcoconta.codvend=empresa.codvend_fin and empresa.codemp = $ped_codemp");
						$codconta = $prod->showcampo0();
						
						//INSERE NO BCO
						$prod->clear();
						$prod->listProd("fin_bcomov", "codconta=$codconta and codped = $codped");
						$valorp_credito = $prod->showcampo4();
						$valorp_debito = $prod->showcampo5();
						
						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}
									
						$prod->setcampo0("");
						$prod->setcampo1($codconta);  //
						$prod->setcampo2("00.05");
						$prod->setcampo3("Estorno Acerto MLB Pedido");
						$prod->setcampo6($dataatual);
						$prod->setcampo7($dataatual);
						$prod->setcampo8("N");
						$prod->setcampo11($codped);
						$prod->setcampo13($login);	
						
						$prod->addProd("fin_bcomov", $uregbcomov);
						
							//INSERE NO BCO
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($codconta);  //
						$prod->setcampo2("00.05");
						$prod->setcampo3("Acerto MLB Pedido");
						if ($ped_mlb >= 0){
								$valorpf = abs($ped_mlb);
								$prod->setcampo5($ped_mlb);
							}else{
								$valorpf = abs($ped_mlb);
								$prod->setcampo4($ped_mlb);
							}
						$prod->setcampo6($dataatual);
						$prod->setcampo7($dataatual);
						$prod->setcampo8("N");
						$prod->setcampo11($codped);
						$prod->setcampo13($login);
	
						$prod->addProd("fin_bcomov", $uregbcomov);
            			
            		}
  //////////////////////////ACERTA VALORES NO CENTRO DE CUSTO          		
            		
            		
					
					
				
			}

			$Actionter = "lock";
			$prod->msggeral("Modificação efetuada com sucesso !", "OK", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pgtroca&pgold=$pgold", 0);
			
		 break;


	 case "reajuste":
			
	 $prod->listProd("empresa", "codemp=$codempselect");
		$descmax = $prod->showcampo18();
		$fatorvista_transf = $prod->showcampo20();
		$tac = $prod->showcampo22();
		#$taxa = $prod->showcampo21();
		#echo("t=$taxa");
		$prod->listProd("vendedor", "nome='$login'");
		$fatorcusto_transf = $prod->showcampo6(); 
		
		$dataatual = $prod->gdata();
		
		// PESQUISA POR PRODUTOS QUE NAO POSSUEM PRODUTOS DE CELULAR
	    $prod->clear();
	    $prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codpedselect' and (produtos.codcat <> 46 and produtos.codcat <> 71) and pedidoprod.codprod=produtos.codprod ");
	    $count_prod = $prod->showcampo0();
	    
	    if ($count_prod == 0){
	      $tac = 0;
	      $num_parc_calc = 6;
	    }else{
	      $num_parc_calc = 6;
	    }

	    
		// VERIFICA CAMPOS DOS PEDIDOS
		$prod->clear();
		$prod->listProdU("vpv, vt, vc, dataped, fatorvista, taxa, modoentr,ped_transf, md5_parc, mcv_prot, mcv_aplic, meia_mcv, tipo_vge, codcliente, sj10x, contrato", "pedido", "codped=$codpedselect");
		$vpv = $prod->showcampo0();
		$vt = $prod->showcampo1();
		$vc = $prod->showcampo2();
		$dataped = $prod->showcampo3();
		$fatorvista = $prod->showcampo4();
		$taxa = $prod->showcampo5();
		$modoentrf = $prod->showcampo6();
		$ped_transf = $prod->showcampo7();
		$md5_parc = $prod->showcampo8();
        $mcv_prot = $prod->showcampo9();
        $mcv_aplic = $prod->showcampo10();
        $meia_mcv = $prod->showcampo11();
		$tipo_vge = $prod->showcampo12();
		$codcliente = $prod->showcampo13();
		$sj10x = $prod->showcampo14();
		$contrato = $prod->showcampo15();
		
		if ($sj10x == 'OK'){
		  $fatorvista = 1;
		  $taxa = 0.01;
		  $tac = 0;
		  $num_parc_calc = 10;
		  #if ($nump >10){$nump=10;}
  
		}
        

		if ($ped_transf == 'OK'){
			$pt = $nump-1;
			$valor[$pt] = $vt*$fatorvista_transf*$fatorcusto_transf;
		}

		for($p = 0; $p < $nump; $p++ ){
		
			$datap[$p] = $avenc[$p].$mvenc[$p].$dvenc[$p];
			$difdias = $prod->numdias($dataped,$datap[$p]); 
			$n = ($difdias/30);
			if ($ped_transf <> 'OK'){
				$valor[$p] = str_replace('.','',$valor[$p]);
				$valor[$p] = str_replace(',','.',$valor[$p]);
			}
			
			#if ($nump > 6 and $p==0){$valor[0] = $valor[0] - $tac;}
			$valorp[$p] = $valor[$p]/(pow((1+($taxa/100)),$n));

			#echo("v=$valor[$p] - vp=$valorp[$p] - df=$difdias - n=$n");

			// CALCULO DO VALOR DE VENDA A VISTA ( SOMATORIO DAS PARCELAS CONVERTIDAS PARA VALOR PRESENTE )
			$valorvendavista = $valorvendavista + $valorp[$p];
			$valorvenda = $valorvenda + $valor[$p];
		}//FOR
		
		if ($nump > $num_parc_calc ){
			$valorvendavista = $valorvendavista - $tac;
			#$valor[0] = $valor[0] + $tac;
		}else{
			$valorvendavista = $valorvendavista;
		}
		

		// CALCULO DO VALOR DE TABELA A VISTA
		$valortotaltabela = $vt;
		$valortotaltabelavista = $valortotaltabela*$fatorvista;
        $valorcustovista = $vc;
	    #if ($nump > 6 ){$valorcustovista = $valorcustovista + $tac;}
		#if ($modoentrf == "MOTOBOY" and $mentr == "MOTOBOY" ){$valorcustovista = $valorcustovista - 5;}
		if ($modoentrf == "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista - 5;}
		if ($modoentrf == "MOTOBOY" and $mentr <> "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista;}
		if ($mentr == "MOTOBOY" and $modoentrf <> "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista - 5;}
		#echo(" vvista(vpv)=$valorvista - ");
		#echo(" vt=$vt - ");

		$valorminimovenda = ($valortotaltabelavista - ($valorcustovista*($descmax/100)));

		$impostodif = $valorvendavista - $valortotaltabelavista;
				if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

		#$impostodif = 0;

		// CALCULO DA COMISSAO

			// MARGEM DE LUCRO BRUTO
			$mlb = $valorvendavista - $valorcustovista - $impostodif;
			//MARGEM DE CONTRIBUICAO DE VENDA
			$mcv = (1000*($mlb)/$valortotaltabelavista);  
			$mlb_real = $mlb;
            $mcv_real = $mcv;


        //////////////////////////////// MODULO MCV PROTEGIDO
		#$mcv_prot = 30;
		#$mcv_aplic = 50;
		#$meia_mcv = "S";

		if ($mcv_prot <> 0){

      	     if ($mcv < $mcv_prot and $mcv >= 0)
            {
                if ($meia_mcv == "S"){
                    $mcv = (($mcv_prot-$mcv_real)/2)+$mcv_real;
                    $mlb = ($mcv*$valortotaltabelavista)/1000;
                }else{
                    $mcv = $mcv_aplic;
                    $mlb = ($mcv_aplic*$valortotaltabelavista)/1000;
                }
            }
        }
        ////////////////////////////////FIM -  MODULO MCV PROTEGIDO


		// CALCULO DA COTA
		/*
		if ($valorparceladototal < $valorvista){
				$cota = (1-((1-($valorparceladototal/$valorvista))/($descmax/100)))*$valorvista;
		}else{
				$cota = (1-((1-($valorparceladototal/$valorvista))/(2*$descmax/100)))*$valorvista;
		}
		*/

		// CONSISTENCIA DO PEDIDO
		#echo("vppt(vt)=$valorparceladototal - vpvtabela=$valorvistatabela - vpvminimo=$valorvistaminimo - c=$cota");
		#if ($valorparceladototal > $valorvistaminimo){
		if ($valorvendavista > $valorminimovenda){
			
			// PEGA A ULTIMA DATA PARA PREVISAO ENTREGA
			/*
			$prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array77, $array_campo77, "order by datastatus DESC" );
			$prod->mostraProd( $array77, $array_campo77, 0 );
			$dataprevent = $prod->showcampo5();
			*/


			// INSERE PARCELAS NO BANCO DE DADOS
			 $prod->listProdgeral("pedidoparcelas", "codped=$codpedselect", $array612, $array_campo612 , "order by datavenc");
			 $pendfpg=1;
			 $dindim = 1;
			 $ctr_parc = 1; 
			 for($i = 0; $i < count($array612); $i++ ){
			
				$prod->mostraProd( $array612, $array_campo612, $i );
				$codparcped = $prod->showcampo0();
				$xtipoopcaixa = $prod->showcampo4();
				$datap[$i] = $avenc[$i].'-'.$mvenc[$i].'-'.$dvenc[$i];
				 

				//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
				$prod->listProdU("tarifa", "formapg", "opcaixa='$tipoopcaixa[$i]'");
				$tarifa = $prod->showcampo0();
			
				$prod->mostraProd( $array612, $array_campo612, $i );
				$prod->setcampo2($datap[$i]);
				$valornovo[$i] = $valor[$i] + $tarifa;
				#$valornovo[$i] = $valor[$i];
				$valornovo[$i] = number_format($valornovo[$i],2,'.','');
				$prod->setcampo3($valornovo[$i]);
				$prod->setcampo4($tipoopcaixa[$i]);
				$prod->setcampo5($numch[$i]);
				$prod->setcampo6($banco[$i]);
				$prod->setcampo7($agencia[$i]);
				$prod->setcampo8($conta[$i]);

				if(($tipoopcaixa[$i] =='02.01') and (($numch[$i] == "") or ($banco[$i] == "") or ($agencia[$i] == "") or ($conta[$i] == ""))){
					
					$pendfpg = $pendfpg*0;
					$prod->setcampo9("OK");
				}else{
					$pendfpg = $pendfpg*1;
					$prod->setcampo9("NO");
				}


				

			$prod->upProd("pedidoparcelas", "codparcped=$codparcped");

			$vppnovo = $vppnovo + $valornovo[$i];

			
			//STRING DO MD5 DAS PARCELAS
			$string_md5 .= $datap[$i].$tipoopcaixa[$i].$valornovo[$i];
			
			// VERIFICA SE DENTRE AS PARCELAS EXISTE ALGUMA QUE POSSUI DINHEIRO OU CARTAO OU VISAELECTRON OU FINANCIAMENTO
			#if (($tipoopcaixa[$i] =='02.00' or $tipoopcaixa[$i] =='02.30' or $tipoopcaixa[$i] =='02.31' or  $tipoopcaixa[$i] =='02.32' or  $tipoopcaixa[$i] =='02.33' or  $tipoopcaixa[$i] =='02.34' or $tipoopcaixa[$i] =='02.40' or $tipoopcaixa[$i] =='02.41' or $tipoopcaixa[$i] =='02.42' or $tipoopcaixa[$i] =='02.43' or $tipoopcaixa[$i] =='02.44' or $tipoopcaixa[$i] =='02.45' or $tipoopcaixa[$i] =='02.46' or $tipoopcaixa[$i] =='02.47' or $tipoopcaixa[$i] =='02.48' or $tipoopcaixa[$i] =='02.49' or $tipoopcaixa[$i] =='02.50' or $tipoopcaixa[$i] =='02.51' or $tipoopcaixa[$i] =='02.52'  or $tipoopcaixa[$i] =='02.53'  or $tipoopcaixa[$i] =='02.54' or $tipoopcaixa[$i] =='02.55' or  $tipoopcaixa[$i] =='02.56') and $mcv >= 0){$dindim = $dindim*1;}else{$dindim = $dindim*0;}
				
			//VERIFICA SE A FORMA DE PAGAMENTO NECESSITA DE APROVACAO
			$prod->clear();
			$prod->listProdU("lib_aprov","formapg", "opcaixa = '".$tipoopcaixa[$i]."'");
			$lib_aprov = $prod->showcampo0();
			#echo "lib_aprov=$lib_aprov";
			if ($lib_aprov == 'S' and $mcv >= 0){$dindim = $dindim*1;}else{$dindim = $dindim*0;}
			
			// VERIFICA SE A FORMA DE PAGAMENTO LIBERA CONTRATO
			$prod->clear();
			$prod->listProdU("lib_contrato","formapg", "opcaixa = '".$tipoopcaixa[$i]."'");
			$lib_contrato = $prod->showcampo0();
			if ($lib_contrato == 'S'){$ctr_parc = $ctr_parc*1;}else{$ctr_parc = $ctr_parc*0;}

			}

			if ($pendfpg == 1){$pendfpgf = "NO";}else{$pendfpgf = "OK";}

			$endentrega = "$endentr;$numentr;$complementoentr;$cepentr;$bairroentr;$cidadeentr;$estadoentr;";

			
			// GERA MD5 DAS PARCELAS
			$md5 = $prod->geraMD5($string_md5);

			// VERIFICA CONSITENCIA DE DATAS
			$prod->listProdMY("IF ('$dataped' > '2004-08-11 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$control = $prod->showcampo0();
			
			if ($dindim == 1){
				$reavalfpg = "NO";
			}else{
				if ($control == 'S' and ($md5 <> $md5_parc)){
					$reavalfpg = "OK";
				}else{
					if ($mcv > 0){
						$reavalfpg = "NO";
					}else{
						$reavalfpg = "OK";
					}
					if ($control == 'N'){
						$reavalfpg = "OK";
					}
				}
			}

			$prod->clear();
			$prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codpedselect' and produtos.lib_contrato !='S' and pedidoprod.codprod=produtos.codprod ");
			$count_naolibcrt = $prod->showcampo0();
			#echo "ctr_parc = $ctr_parc  - nlib= $count_naolibcrt - statusped = $statusped - asscort = $asscontrato - tvge = $tipo_vge"; 
			
				if ($ctr_parc == 1  and $count_naolibcrt == 0){
				
					$contrato = "DC";
					
				}else{
					
					$prod->clear();
					$prod->listProdU("asscontrato", "clientenovo", "codcliente='$codcliente'");
					$asscontrato = $prod->showcampo0();
					
					if ($asscontrato <> "S" and $tipo_vge == 0){$contrato = "DC";}else{$contrato= "NO";}
					if ($count_prod == 0) {$contrato = "DC";} // LIBERA CONTRATO CELULAR
					#if ($vpp_ped > 100 and $dindim == 0 and $asscontrato == "S") {$contrato = "NO";} // EXIGE CONTRATO POR RESTRICAO DE VALORES
				}

			
			// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedido", "codped=$codpedselect");
			$codcliente = $prod->showcampo2();

			$prod->setcampo7($mlb);
			$prod->setcampo27($contrato);
			$prod->setcampo18($obsfinanceiro);
			$prod->setcampo4($endentrega);
			$prod->setcampo5($refentrega);
			$prod->setcampo16($obsmontagem);
			$prod->setcampo6($obsentrega);
			$dataprevent = $aprev.$mprev.$dprev;
			$prod->setcampo12($dataprevent);
			$prod->setcampo25($mentr);
			$prod->setcampo8($valorvendavista);
			#$prod->setcampo9($valortotaltabela);
			$prod->setcampo10($vppnovo);
			$prod->setcampo19($mcv);
			#$prod->setcampo20($valorcustovista);
			$prod->setcampo35($pendfpgf);  // PENDENCIA DE FORMA PG
			$prod->setcampo36($reavalfpg);  // REAVALIACAO DO PEDIDO
			$prod->setcampo73($mlb_real);  // MLB REAL
			$prod->setcampo74($mcv_real);  // MCV_REAL

			$prod->upProd("pedido", "codped=$codpedselect");
					
			$codped = $codpedselect;
			$Action= "update";
			$condpg = 1;
							
		}else{
			$Actionter = "lock";
			$prod->msggeral("O pedido não foi aceito !", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}

	
		
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$condicao2 = " LCASE(clientenovo.$campopesq) like '%$palavrachave1%' and ";
		$condicao5 = " LCASE(vendedor.$campopesq) like '%$nomevendpesq1%' and ";

		if ($codsuperselect == 0){
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvendselect", $array98, $array_campo98, "" );

			$condicao4 .= " (";

		 for($k = 0; $k < count($array98); $k++ ){
			
			$prod->mostraProd( $array98, $array_campo98, $k );

			// DADOS //
			$codvend_sub = $prod->showcampo0();

			$condicao4 .= " pedido.codvend=$codvend_sub or ";

		 }
		    $condicao4 .= " pedido.codvend=$codvendselect) and ";

		}

		// ADMINISTRADOR DO SISTEMA
		if ($codgrpselect == 2 or $codgrpselect == 20 or $codgrpselect == 24 or $codgrpselect == 15){
			$condicao4 = "";
		}


		
		#echo("cgrp=$codgrpselect");


		$condicao3 = $condicao4;

		//PESQUISA POR NOME CLIENTE
		if ($palavrachave){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR NOME VENDEDOR
		if ($nomevendpesq){
							
			$condicao3 .= $condicao5;
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " pedido.codbarra='$codpedpesq' and";
		}

		
			
	
				$condicao3 .= " pedido.codemp='$codempselect'";
				$condicao3 .= " and pedido.hist = '$hist'  ";
				$condicao3 .= " and pedido.codcliente=clientenovo.codcliente ";
				$condicao3 .= " and pedido.codvend=vendedor.codvend ";


		break;

		
		
		}

		#echo("c=$condicao3 - c4=$condicao4");

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome, pendfpg, reavalfpg, fat, vendedor.nome", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, $parm );

		
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

if ($impressao <> 1){ include("sif-topo.php"); }

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************


// FUNCAO TESTA FORMA DE PAGAMENTO
function verificaObrigFPG (form, qtde, cadErro) 
{

 var o;
 var cont;
 var cname;
 var strDia;
 var strMes;
 var strAno;
 var strValor;
 var strTipo;
 var strBanco;
 var strAgencia;
 var strConta;
 var strNum;
 var oini;
 var AnoAtual;
 var DiaAtual;
 var MesAtual;
 var DataAtual;
 var m_prev = form.mprev.value;
 var d_prev = form.dprev.value;
 var a_prev = form.aprev.value;
 var prazo_medio = 0;
 var prazo_medio_parc = 0;
 var prazo_medio_total = 0;
 var valor_parc = 0;

 var date2 = new Date(a_prev, m_prev, d_prev);
 //var now = new Date();
 var now = new Date(form.adataped.value, form.mdataped.value, form.ddataped.value);
 var diff1 = now.getTime();
 var diff2 = date2.getTime();
 var diff = date2.getTime() - now.getTime()
 var days = Math.floor(diff / (1000 * 60 * 60 * 24));

 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+10); o++)
  {
   strDia = oini + 0;
   strMes = oini + 1;
   strAno = oini + 2;
   strValor = oini + 3;
   strTipo = oini + 4;
   strBanco = oini + 5;
   strAgencia = oini + 6;
   strConta = oini + 7;
   strNum = oini + 8;

 	eval ('cname = form.elements[o].name');
 	
    var dateparc = new Date(form.elements[strAno].value, form.elements[strMes].value, form.elements[strDia].value);
    var dateped = new Date(form.adataped.value, form.mdataped.value, form.ddataped.value);
    var diff5 = dateparc.getTime() - dateped.getTime()
    var daysparc = Math.floor(diff5 / (1000 * 60 * 60 * 24));
	
	prazo_medio_parc = daysparc * parseInt(form.elements[strValor].value);
	
    if (daysparc < -1)
	{
		alert ('Data da parcela ' + cont +' INFERIOR a data do pedido.');
		eval ('form.elements[strDia].focus ()');
		return false;
	}

	
	if (form.elements[strValor].value == 0)
	{
		alert ('Valor da Parcela ' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strValor].focus ()');
		return false;
	}
	if (verificaNumerico (form.elements[strValor].value, 2) != 1)
	{
		alert ('Valor da Parcela ' + cont + ' formato inválido');

		eval ('form.elements[strValor].focus ()');

		return false;
	}
	
	if (form.elements[strTipo].value != 0)
	{
	/*
		if ((form.elements[strTipo].value == '02.01') && (cadErro == 1))
		{
			alert ('O cadastro do cliente está incompleto, atualize as informações para que possa continuar o pedido.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		} 
		
		if ((form.elements[strTipo].value == '02.01') && ((form.elements[strBanco].value == 0) || (form.elements[strAgencia].value == 0) || (form.elements[strNum].value == 0) || (form.elements[strConta].value == 0)))
		{
			
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' : preenchimento obrigatório.');
			eval ('form.elements[strBanco].focus ()');
			return false;
		}
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strAgencia].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1) || (verificaNumerico (form.elements[strConta].value, 1) != 1))
		{
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' formato inválido');
			eval ('form.elements[strValor].focus ()');

		return false;
		}
*/
   }else {
	
		alert ('Forma de Pagamento' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strTipo].focus ()');
		return false;

	}	
	
	 prazo_medio_total = prazo_medio_total + prazo_medio_parc;
	 //alert ('prazo_medio_total' + prazo_medio_total + ' : preenchimento obrigatório.');
	 
	 valor_parc = valor_parc + parseInt(form.elements[strValor].value);
	
  }
	  oini = oini + 10; 
 }
 
 	prazo_medio = prazo_medio_total/valor_parc;

	if ((form.dprev.value == 0) || (form.mprev.value == 0) || (form.aprev.value == 0) )
	{
		alert ('Data de Previsao de Entrega : preenchimento obrigatório.');
		eval ('form.dprev.focus ()');
		return false;
	}

	
	if (days < -1) {
		alert ('Data de Previsao de Entrega : Incorreto - Data inferior a data do pedido.');
		eval ('form.dprev.focus ()');
		return false;
	}

		if (prazo_medio > 170)
    {
        alert('As PARCELAS NAO PODERAO SER ALTERADAS! O prazo medio(' + prazo_medio + ')  das parcelas e superior a 150 dias. ');
       
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
	
    if (campo == 'valor')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}


function adjust(element) {

	return element.value.replace ('.', ',');
}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strXValor;
	var strXBanco;
	var strXAgencia;
	var strXConta;
	var strXNum;
	var xvalor;

	cpos = (posicao*10) + 10; 
	
    strXBanco = cpos - 5;
    strXAgencia = cpos - 4;
    strXConta = cpos - 3;
    strXNum = cpos - 2;
	strXValor = cpos - 1;
	
	xvalor = form.elements[strXValor].value;

	if (xvalor != ''){

	if ((xvalor.indexOf(':') != -1) || (xvalor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strXValor].focus ()');
				
	}else{
	
	form.elements[strXBanco].value = xvalor.substring (1,4);
	form.elements[strXAgencia].value = xvalor.substring (4,8);
	form.elements[strXConta].value = xvalor.substring (23,32);
	form.elements[strXNum].value = xvalor.substring (13,19);

	form.elements[strXValor].disabled=true;
	
	}

	}
 
}




</script>

");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "delete"):


	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProd("pedido", "codped=$codped");
		

		$codemp = $prod->showcampo1();
		$codcliente = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$endentrega = $prod->showcampo4();
		$endentrf = explode(";",$endentrega);
		$endentr = trim($endentrf[0]);
		$numentr = trim($endentrf[1]);
		$complementoentr = trim($endentrf[2]);
		$cepentr = trim($endentrf[3]);
		$cidadeentr = trim($endentrf[5]);
		$estadoentr = trim($endentrf[6]);
		$bairroentr = trim($endentrf[4]);
		$refentrega = $prod->showcampo5();
		$obsentrega = $prod->showcampo6();
		$dataped = $prod->showcampo11();
		$adataped = substr($dataped,0,4);
		$mdataped = substr($dataped,5,2);
		$ddataped = substr($dataped,8,2);
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
		$aprev = substr($dataprevent,0,4);
		$mprev = substr($dataprevent,5,2);
		$dprev = substr($dataprevent,8,2);
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
		$mlb_real = $prod->showcampo73();
   		$mcv_real = $prod->showcampo74();
		$mlb_realf = number_format($mlb_real,2,',','.');
		$mcv_realf = number_format($mcv_real,5,',','.');
		$sj10x = $prod->showcampo87();
	
	
	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProd("clientenovo", "codcliente=$codcliente");
				
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
		
		if ($sj10x ==  'OK'){
		    // PESQUISA OPCAIXA 10x
		    
		    $prod->clear();
		    $prod->listProdSum("opcaixa10x","pedidoprod, produtos", "codped='$codped' and opcaixa10x <> '' and pedidoprod.codprod = produtos.codprod", $array64, $array_campo64 , "group by produtos.codprod");
			   for($j = 0; $j < count($array64); $j++ ){
					
					$prod->mostraProd( $array64, $array_campo64, $j );
					$opcaixa10x[$j] = $prod->showcampo0();
					$array_prod[$j] = explode(":", $opcaixa10x[$j]);
					if($j==0){$xopcaixashow = $array_prod[0];}
					$xopcaixashow = array_intersect($xopcaixashow, $array_prod[$j]);
					#echo $codprod_t." - ".$opcaixa10x[$j]."<BR> - $j - $x - $codpedselect";
					#echo"<PRE>";
					#print_r($array_prod);
					#print_r($xopcaixashow);
					#echo"</PRE>";
				
				}//FOR

    }else{
		$xopcaixashow = explode(":", $xopcaixa);
    }
		$xasscontrato=	$prod->showcampo80();


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();


if ($impressao <> 1){

echo("
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
                        
  </center>
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a></font></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

");
}

if ($impressao == 1){
	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);

echo("
<body bgcolor='#FFFFFF'>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='50%'><img border='0' src='images/grupoipa.gif' width='200' height='85'><br>
      <b><font face='Verdana' size='4'></font></b></td>
    </center>
    <td width='50%'>
      <p align='right'><b><font size='1' face='Verdana' color='#800000'>DATA 
      EMISSÃO<br>
      </font></b><font size='1' face='Verdana'>$datainstf<br>
      </font> <p align='right'><img src='barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
  </tr>
  </table>
</div>
	<br>
	
");

}

echo("

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
");
if ($impressao <> 1 or $fin ==1){

echo("

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

	");
}

echo("

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 




<br>
<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>

  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>
<BR>
<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>&nbsp;</b></font></td>
	<td width='70%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>UNIT.(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>TOTAL(R$)</b></font></td>
   
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>MICROCOMPUTADORES</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			
			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj");
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
  </tr>
		
  ");
	
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
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
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>$codprodped</b> - $nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' >
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
   
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");
  
  $pmtotalu = 0.00;	

	 // PRODUTOS UNITARIO
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 
			
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
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
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>$codprodped</b> - $nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' >
	<b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotaluf</b></font></td>
   
  </tr>
		
  ");


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotalf = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotalf</b></font></td>
  
  </tr>
		
  ");

	echo("
		</table>
	<br>	

		
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>



 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BANCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>AGENCIA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.<br>CHEQUE</b></font></td>
	    <td width='5%'><font size='1' face='Verdana' color='#ffffff'><b>CX</b></font></td>
      </tr>
");


  $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$parcpg = $prod->showcampo10();
			$numdoc = $prod->showcampo11();
			$datavencf = $prod->fdata($datavenc);
			$valorparcelaf = number_format($valorparcela,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricao = $prod->showcampo1();

			


	if ($parcpg == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}

if ($numdoc == ""){
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
        <td width='10%'><font size='1' face='Verdana' >$numchec</font></td>
		<td width='5%' align='center'><font size='1' face='Verdana' color='$cor1' >$parcpg</font></td>
      </tr>
");
}else{
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='40%' colspan ='4' align='center'><font size='1' face='Verdana' >$numdoc</font></td>
        <td width='5%' align='center'><font size='1' face='Verdana' color='$cor1' >$parcpg</font></td>
      </tr>
");
}

	}

echo("
    </table>


		<br>


			<div align='center'>

<form action='$PHP_SELF?Action=insertparc&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codped=$codped&amp;codempselect=$codempselect&amp;codvendselect=$codvendselect&amp;retorno=$retorno&amp;retlogin=$retlogin&amp;connectok=$connectok&condpg=$condpg&amp;pg=$pg#lista' name='form66' method='post'>
<table width='550' border='0' cellspacing='0' cellpadding='0'>
  <tr bgcolor='$bgcorlinha'>
    <td width='4%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
    <td width='63%'><b> ADICIONAR PARCELA</b> </td>
    <td width='33%'>NUM. PARCELAS <select name='numpar_add'>
      <option value='1' selected='selected'>1</option>
      <option value='2'>2</option>
      <option value='3'>3</option>
      <option value='4'>4</option>
      <option value='5'>5</option>
      <option value='6'>6</option>
      <option value='7'>7</option>
      <option value='8'>8</option>
      <option value='9'>9</option>
      <option value='10'>10</option>
    </select>
    </td>
    <td width='33%'><input type='submit' name='Submit' value='ADICIONAR' /></td>
  </tr>
</table>
<input type='hidden' name='desloc' value='0'>
<input type='hidden' name='operador' value='OR'>
<input type='hidden' name='codpedselect' value='$codped'>
<input type='hidden' name='codempselect' value='$codemp'>
<input type='hidden' name='vpvt' value='$ptotal'>
<input type='hidden' name='nump' value='$nump'>
<input type='hidden' name='retlogin' value='$retlogin'>
<input type='hidden' name='connectok' value='$connectok'>
<input type='hidden' name='pg' value='$pg'>
</form>

</div>
  
</div>

	");


	//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
	$prod->listProdSum("COUNT(*) as pg", "pedidoparcelas", "codped=$codped and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
	$prod->mostraProd( $array613, $array_campo613, 0 );
	$numparcpg = $prod->showcampo0();

	#echo"np= $numparcpg ";

if ($impressao <> 1 ){

	#if ($numparcpg <> 0){
	echo("
	<br>
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
	

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      III</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - ALTERAR CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>

		
		");

/// PESQUISA SE O CLIENTE SELECIONADO ESTA COM O CADASTRO INCOMPLETO
	$prod->listProdgeral("clientenovo", "(c_ocupacao ='' or c_descricao ='' or c_rendamensal = '' or rb_banco ='' or rb_agencia ='' or rb_conta = '' or rb_clientedesde ='') and codcliente = $codcliente", $array145, $array_campo145 , "");
	
	$cadErro = count($array145);
	$nump = count($array61);
	$cadErro = 0;

echo("

<form method='POST' action='$PHP_SELF?Action=reajuste'  name='Form' onSubmit = 'if (verificaObrigFPG(Form, $nump, $cadErro)==false) return false'>
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='25%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>BCO</b></font></td>
        <td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>AG</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='15%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>NO.CHQ</b></font></td>
      </tr>
");

 $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");

	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipo'");
			$tarifa = $prod->showcampo0();
			$valorparcela = $valorparcela - $tarifa;
			
			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$pendfpg = $prod->showcampo9();
			$parcpg = $prod->showcampo10();
			#$datavencf = $prod->fdata($datavenc);
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricaoold = $prod->showcampo1();
			
			$valorparcelaf = number_format($valorparcela,2,',','.');
			$valorparcelaf = str_replace('.','',$valorparcelaf);
			

			$datavenc = str_replace('-','',$datavenc);
			$anopar = substr($datavenc,0,4);
			$mespar = substr($datavenc,4,2);
			$diapar = substr($datavenc,6,2);
			
			$bgcorlinha = "#F3F8FA";
			if ($pendfpg == "OK"){$bgcorlinha="#FCDCBC";}

if ($parcpg <> "OK"){
		
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='25%' rowspan='2'><input type='text' name='dvenc[$ji]' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc[$ji]' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc[$ji]' value='$anopar'  size='4' maxlength='4'></td>
        <td width='10%' rowspan='2'><input type='text' name='valor[$ji]' value='$valorparcelaf' size='8' onKeyUp='this.value = adjust(this);' ></td>
        <td width='20%' >

	  <select size='1' name='tipoopcaixa[$ji]'>
");
		for($l = 0; $l < count($xopcaixashow); $l++ ){

			  
			if ($xopcaixashow[$l] <> ""){
				$prod->listProdU("descricao, tipo, fabrica","formapg", "opcaixa='$xopcaixashow[$l]'");
				$descricao = $prod->showcampo0();
				$tipo_cel = $prod->showcampo1();
				$fabrica = $prod->showcampo2();	
				
				#echo $xopcaixashow[$l];	
			
			#if (($xopcaixashow[$l] == '02.35' or $xopcaixashow[$l] == '02.36') and ($codemp <> 1 or $tipovendold <> 'R')){$flag = 1;}else{$flag=0;}
			if ($fabrica <> 'S' and ($codemp == 15 or $codemp == 16 or $codemp == 17)){$flag = 1;}else{$flag=0;}
			if (($xopcaixashow[$l] <> '02.35'  and $xopcaixashow[$l] <> '02.00' and $xopcaixashow[$l] <> '02.01'  and $xopcaixashow[$l] <> '02.46' and $xopcaixashow[$l] <> '02.47' and $xopcaixashow[$l] <> '02.51') and ($codemp == 1)){$flag = 1;}
			
			if ($flag == 0){
		 

echo("
            <option value='$xopcaixashow[$l]'>$descricao</option>
          
");
			}
			}
		 }
echo("
		  <option selected>Escolha</option>
		  <option value='$tipo' selected>$descricaoold</option>
		  </select>
	
		  </td>
        <td width='10%' ><input type='text' name='banco[$ji]' value='$banco' size='3' maxlength='3'></td>
        <td width='10%' ><input type='text' name='agencia[$ji]' value='$agencia' size='4' maxlength='4'></td>
        <td width='10%' ><input type='text' name='conta[$ji]' value='$conta' size='6' maxlength='10'></td>
	    <td width='15%' ><input type='text' name='numch[$ji]' value='$numchec' size='6' maxlength='6'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
    		 <td width='20%' align='right' ><font size='1' face='Verdana' color='#FF9933'><b>CODBARRA CHEQUE:</b></font></td>
	      <td width='45%' colspan='4'><input type='text' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'></td>
    </tr>


");

}else{ // PARCPG

	echo("
      <input type='hidden' name='dvenc[$ji]' value='$diapar'  size='2' maxlength='2'>
	  <input type='hidden' name='mvenc[$ji]' value='$mespar' size='2' maxlength='2'>
	  <input type='hidden' name='avenc[$ji]' value='$anopar'  size='4' maxlength='4'>
      <input type='hidden' name='valor[$ji]' value='$valorparcelaf' size='8' onKeyUp='this.value = adjust(this);' >
  	  <input type='hidden' name='tipoopcaixa[$ji]' value='$tipo'  size='4' maxlength='4'>
	 
	

        <input type='hidden' name='banco[$ji]' value='$banco' size='3' maxlength='3'>
        <input type='hidden' name='agencia[$ji]' value='$agencia' size='4' maxlength='4'>
        <input type='hidden' name='conta[$ji]' value='$conta' size='6' maxlength='10'>
	    <input type='hidden' name='numch[$ji]' value='$numchec' size='6' maxlength='6'>
	
	    <input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'>


");

} // PARCPG
	} // FOR

echo("
    </table>
    </center>
		  <div align='center'>
    <center>

<br>
<a name='dadoscompl'></a>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - DADOS COMPLEMENTARES</font></b></td>
  </tr>
</table>



 <table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
    <tr bgcolor='#86ACB5'> 
      <td  colspan='2'  ><font face='Verdana, Arial, Helvetica, sans-serif'><b></b></font> 
        <div align='center'>
          <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font size='1' color='#FFFFFF'>DADOS 
          DA ENTREGA</font></b></font></div>
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>END. 
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='endentr' value='$endentr' size='50'>
        </font></b></font></td>
    </tr>
     <tr bgcolor='#F3F8FA'>
      <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>NUMERO:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='numentr' value='$numentr' size='50'>
        </font></b></font></td>
    </tr>
     <tr bgcolor='#F3F8FA'>
      <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>COMPLEMENTO:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='complementoentr' value='$complementoentr' size='50'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>BAIRRO 
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='bairroentr' value='$bairroentr' size='20'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>CIDADE 
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='cidadeentr' value='$cidadeentr' size='40'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>ESTADO 
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='estadoentr' value='$estadoentr' size='3'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>CEP 
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='cepentr' value='$cepentr' size='10'>
        </font></b></font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='31'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size=' 1' color='#336699'>REF. 
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        	<input type='text' name='refentrega'  value ='$refentrega' size='50'>
        </font></b></font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='31'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>PREV.
        ENTREGA:</font></b></font></td>
      <td width='508'><b><font color='#000000' face='Verdana' size='1'><input type='text' name='dprev' size='2' maxlength='2' value='$dprev'>/<input type='text' name='mprev' size='2' maxlength='2' value='$mprev'>/<input type='text' name='aprev' size='4' maxlength='4' value='$aprev'>&nbsp;
        </font></b></font></td>
    </tr>
");
if ($modoentr == "RETIRA"){$ch1 = "checked";}
if ($modoentr == "ENTREGA"){$ch2 = "checked";}
if ($modoentr == "MOTOBOY"){$ch3 = "checked";}

echo("
	 <tr bgcolor='#F3F8FA'> 
      <td width='31'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>MODO
        ENTREGA:</font></b></font></td>
      <td width='508'><font size='1' face='Verdana'><input type='radio' name='mentr' value='RETIRA' $ch1><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>RETIRA
        </font>
		 ");
		// CONSIDERADO O VALOR DE TABELA
		if ($ptotal > 250){
	echo("
	   <input type='radio' name='mentr' value='ENTREGA' $ch2><font color='#000000'>ENTREGA (TRANPORTADORA)</font>
	");
		}
		if ($tipovend <> "R"){
	 echo("
	   <input type='radio' name='mentr' value='MOTOBOY' $ch3><font color='#000000'>MOTOBOY</font></font>
	  </td>
	");
		}
	echo("
	</font></td>
	
    </tr>

    <tr bgcolor='#F3F8FA'> 
      <td width='31'><b><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>OBS
        ENTREGA</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'>:</font></b></td>
      <td width='508'><textarea rows='2' name='obsentrega' cols='43'>$obsentrega</textarea></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='31'><b><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>OBS
        MONTAGEM:</font></b></td>
      <td width='508'><textarea rows='2' name='obsmontagem' cols='43'>$obsmontagem</textarea></td>
    </tr>
	  <tr bgcolor='#F3F8FA'> 
      <td width='31'><b><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>OBS
        FINANCEIRO:</font></b></td>
      <td width='508'><textarea rows='2' name='obsfinanceiro' cols='43'>$obsfinanceiro</textarea></td>
    </tr>
  </table>
			<br>



    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Alterar Condições de Pagamento' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>


			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codpedselect' value='$codped'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
	     	<input type='hidden' name='adataped' value='$adataped' id='adataped' >
	     	<input type='hidden' name='mdataped' value='$mdataped' id='mdataped'>
	     	<input type='hidden' name='ddataped' value='$ddataped' id='ddataped'>
			


		</form>
  </div>
");

	#} // NUMPARC
} //IMPRESSAO

if ($impressao <> 1 ){

echo("

 <div align='center'>
    <center>
   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='39%' ><font size='1' face='Verdana'>&nbsp;</font></td>
        <td width='15%' >&nbsp;</td>
 	    <td width='19%' >&nbsp;</td>
 	</tr>

	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
        <td width='15%' >&nbsp;</td>
	    <td width='19%' >&nbsp;</td>
	</tr>
		<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>VALOR À VISTA:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>R$ $vpvf</b></font></td>
        <td width='15%' >&nbsp;</td>
	    <td width='19%' >&nbsp;</td>
	  </tr>
	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#666666'><b>MLB_REAL:</b></font></td>
        <td width='19%' ><font color='#666666' size='1' face='Verdana'><b>R$ $mlb_realf</b></font></td>
	</tr>
	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#666666'><b>MCV_REAL:</b></font></td>
        <td width='19%' ><font color='#666666' size='1' face='Verdana'><b>$mcv_realf %</b></font></td>
	</tr>

	 </table>

 </center>
  </div>
");
}
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

<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        III</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOTA FISCAL</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#86acb5'>
        <td width='65%'><font face='Verdana' color='#ffffff' size='1'><b>NOTA FISCAL</b></font></td>
       <td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>VALOR</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$nf = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 
			

echo("
      <tr bgColor='#f3f8fa'>
        <td width='65%'><font face='Verdana' size='1'><b>$nf</b></font></td>
		<td width='35%'><font face='Verdana' size='1'>R$ $valornff</font></td>
      </tr>
");		
	}
echo("
  </table>
 
<br>

	");

if ($impressao <> 1 or $fin == 1){



if ($contrato == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($contrato == "EP"){$cor1 ="#FF6600";}
if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}



echo("

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='4'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: CONTRATO: <font color='$cor1'>$contrato</font></b></font></td>
      <td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: LIB. ENTREGA: <font color='$cor2'>$libentr</font></b></font></td>
      <td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: FATURADO: </b></font><font size='1' face='Verdana' color='$cor3'><b>$fat</b></font></td> 
	<td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: PAGO: <font color='$cor4'>$caixa</font></b></font></td>
    </tr>
  </table>
  </center>
</div>



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
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#86acb5'>
        <td width='186'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='382'><font face='Verdana' color='#ffffff' size='1'><b>STATUS</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("pedidostatus", "codped=$codped", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$datastatusf = $prod->fdata($datastatus);



echo("
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='382'><font face='Verdana' size='1'><b>$statusped</b></font></td>
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


	");
}

echo("
<!--
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=list&codempselect=$codemp&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR</a></font>
      </td>
    </tr>
  </table>
  </center>
</div>
			-->
");







//  FIM - FIM DA PARTE DE IMPRESSAO ///


endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


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

	$prod->listProdgeral("pedidomod", "codped=$codped", $array612, $array_campo612 , "order by datamod");
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


<a name='finalizar'></a>
 <form name='Form32' method='post' action='$PHP_SELF?Action=end&desloc=0&codped=$codped&fpgstart=1&retlogin=$retlogin&connectok=$connectok&pg=$pg&condpg=$condpg' >
	


<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      III</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRÓXIMA ETAPA </font></b></td>
  </tr>
</table>




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
          <input class='sbttn' type='submit' name='Submit' value='Próxima Etapa => Finalizar Alteração'>
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




/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 

	
	include ("sif-rodape.php");}
}

?>
       
