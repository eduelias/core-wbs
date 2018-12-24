

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataped DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "FATURAMENTO";
$subtitulo = "PEDIDO";

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
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}
		#if ($codempvend <> 0){$codempselect = $codempvend;}

$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":


		$dataatual = $prod->gdata();
		
			$prod->listProdU("dataped", "pedido", "codped=$codped");
			$dateped = $prod->showcampo0();

		// INSERE PARCELAS NO BANCO DE DADOS
		$prod->listProdgeral("pedidoparcelas", "codped=$codped", $array612, $array_campo612 , "order by datavenc");
		
		$errof = 1;
		$contador = count($array612);
		#echo("c=$contador<bR>");
		for($i = 0; $i < count($array612); $i++ ){

			$erro[$i]=1;
			$prod->mostraProd( $array612, $array_campo612, $i );
			$codparcped = $prod->showcampo0();
			$opcaixa = $prod->showcampo4();
			$valorp = $prod->showcampo3();
			$datavenc = $prod->showcampo2();
			$parcpg = $prod->showcampo10();
			#$datavenc_old = $datavenc;
			
			#echo("opcx=$opcaixa<br>");

			if ($parcpg <> "OK"){
							
			$prod->listProd("formapg", "opcaixa='$opcaixa'");
			$descricao = $prod->showcampo1();
			$bco = $prod->showcampo3();
			$pbco = $prod->showcampo4();
			$caixa = $prod->showcampo5();
			$car = $prod->showcampo6();
			$cap = $prod->showcampo7();
			$cofre = $prod->showcampo8();
			$inschtab = $prod->showcampo9();
			$tipoparc = $prod->showcampo11();
			$pnumdoc = $prod->showcampo12();
			
					
			#echo("cx=$caixa<br>bco=$bco<br>car=$car<br>cap=$cap<br>tipoparc=$tipoparc<bR>");

			if ($tipoparc == "FT" ){

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG
			
				
				$difdias = $prod->numdias($dateped, $dataatual);
				
				$prod->listProdMY("DATE_ADD('$datavenc', INTERVAL $difdias DAY)", "" , $array129, $array_campo129, "" );
				$prod->mostraProd( $array129, $array_campo129, 0 );
				$datavenc =  $prod->showcampo0();
				
				#echo "$difdias - $datavenc_old - $datavenc_nova <br>";
					

				if ($caixa) {

					if ($errof <> 0){
				
					//VERIFICA CAIXA ABERTO
					$prod->listProdU("COUNT(*) as aberto","fin_cxsaldo", "saldofin = 0 and codemp=codempselect");
					$cxaberto = $prod->showcampo0();
					
					if ($cxaberto == 0 ){

						$erro[$i] = 0;
						$msg[$i] = "Nenhum CAIXA está aberto. Abra um novo CAIXA para poder efetuar a operação";

					}else{
						
						$prod->listProdU("codcxsaldo","fin_cxsaldo", "saldofin = 0 and codemp=codempselect");
						$codcxsaldo = $prod->showcampo0();
										
						if (!$uregopera){
							//INSERE NOVA OPERACAO
							$prod->clear();
							$prod->setcampo0("");
							$prod->setcampo1($dataatual);
							$prod->setcampo2($codempselect);
							$prod->addProd("fin_cxopera", $uregopera);
						}

						//INSERE NO CAIXA
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($uregopera);
						$prod->setcampo2($codcxsaldo);
						$prod->setcampo3($opcaixa);
						$prod->setcampo4($descricao);
						$prod->setcampo5($dataatual);
						if ($caixa =="C"){
							$prod->setcampo6($valorp);
						}else{
							$prod->setcampo7($valorp);
						}
						$prod->setcampo9($codped);
						$prod->addProd("fin_cxlanc", $ureglanc);


					}

					} //ERRO
				}

				if ($car) {

					if ($errof <> 0) {
				
					if ($pnumdoc == "S" and $numdoc[$codparcped] == "" and $opcaixa == "02.60"){
						
						$erro[$i] = 0;
						$msg[$i] = "O NUM. DOCUMENTO (DTI) da Parcela $i não foi preenchido";

					}else{
						//INSERE NO CAR
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($numdoc[$codparcped]);
						$prod->setcampo2($opcaixa);
						$prod->setcampo4($codcliente);
						$prod->setcampo5($descricao);
						$prod->setcampo6($datavenc);
						$prod->setcampo7($nf);
						$prod->setcampo13("N");  // HISTORICO
						$prod->setcampo14($codped);  
						$prod->setcampo8($valorp);
						$prod->setcampo17($codempselect);
					
						$prod->addProd("fin_car", $uregcar);
					}

					} //ERRO
					
				}

				if ($bco) { 

					if ($errof <> 0) {

					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valorp);
						}else{
							$prod->setcampo5($valorp);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);

					$prod->addProd("fin_bcoconta", $uregbcomov);

					} //ERRO
			

				}

				if ($inschtab == "S") { 

					if ($errof <> 0) {

											
					//INSERE CHEQUES
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codped);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($banco);
					$prod->setcampo4($agencia);
					$prod->setcampo5($conta);
					$prod->setcampo6($numch);
					$prod->setcampo7($valorp);
					$prod->setcampo8($datavenc);
					$prod->setcampo9("CX");
					$prod->setcampo10($uregopera);
					$prod->setcampo11($ureglanc);
					$prod->setcampo12($codempselect);

					$prod->addProd("fin_cheques", $uregcheq);

					} //ERRO
			

				}

				if ($errof <> 0 and $erro[$i] <> 0){
				
					$prod->clear();
					$prod->listProd("pedidoparcelas", "codparcped=$codparcped");
					$prod->setcampo10("OK");
					$prod->setcampo2($datavenc);
					$prod->setcampo11("$numdoc[$codparcped]");

					$prod->upProd("pedidoparcelas", "codparcped=$codparcped");

				

				}						
				
			} // ESTA PARCELA JA FOI PAGA 


			} //TIPO PARCELA == FT
		
		$errof = $errof*$erro[$i];

		#echo("e=$errof");

		} //FOR

					
			if ($errof <> 0){
			
				//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
				$prod->listProdSum("COUNT(*) as pg", "pedidoparcelas", "codped=$codped and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
				$prod->mostraProd( $array613, $array_campo613, 0 );
				$numparcpg = $prod->showcampo0();

				if ($numparcpg == 0 ){
					// ATUALIZA STATUS DO PEDIDO
    	               $prod->listProd("pedido", "codped=$codped");
					   $codemp_fatura = $prod->showcampo1();
					#$prod->setcampo14($statuspeds);
					#$prod->setcampo24($nf);
					

						$prod->setcampo31("OK"); // CAIXA
						$prod->setcampo61("OK"); // INICIO SEPARACAO
						$prod->setcampo94($codemp_fatura); // INICIO SEPARACAO
						$inicio_sep = 1;
						$prod->setcampo62($dataatual);

    	               $prod->upProd("pedido", "codped=$codped");
				}

				// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
					$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='CAIXA FAT'", $array614, $array_campo614 , "");

					// MODIFICAÇÂO DO PEDIDO
					$prod->listProdU("modped","pedido", "codped=$codped");
					$modped = $prod->showcampo0();

					if (count($array614) == 0){

						// ATUALIZA STATUS DA TABELA
						$prod->setcampo0("");
						$prod->setcampo1($codped);
						$prod->setcampo2($dataatual);
						$prod->setcampo3("CAIXA FAT");
						$prod->setcampo4($login);

						$prod->addProd("pedidostatus", $ureg);

						if ($modped == "OK"){

							// ATUALIZA STATUS DA TABELA
							$prod->setcampo0("");
							$prod->setcampo1($codped);
							$prod->setcampo2($dataatual);
							$prod->setcampo3("CAIXA FAT MOD");
							$prod->setcampo4($login);

							$prod->addProd("pedidostatus", $ureg);

							
						}
					}
					
						if ($inicio_sep == 1){

							// ATUALIZA STATUS DA TABELA
							$prod->setcampo0("");
							$prod->setcampo1($codped);
							$prod->setcampo2($dataatual);
							$prod->setcampo3("INICIO SEP");
							$prod->setcampo4($login);

							$prod->addProd("pedidostatus", $ureg);


						}

				
				$prod->listProdU("IF( ckmlb = 'NO' and (contrato ='OK' or contrato ='DC'), 'S', 'N' ) ", "pedido", "codped=$codped ");
				$comissao_ok = $prod->showcampo0();

				#echo("comissao_ok=$comissao_ok");

				if ($comissao_ok == 'S'){

					$prod->listProdU("mlb, vc, fatorcomissao, tipo, pedido.codvend, codbarra, codvend_cm, porc_cm, pedido.codemp, vendedor.codemp as codemp_vend", "pedido, vendedor", "codped=$codped and pedido.codvend=vendedor.codvend");
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

					$prod->addProd("fin_bcomov", $uregbcomov);

					}
					

 //////////////////////////ACERTA VALORES NO CENTRO DE CUSTO
 					    //DATA INICIO 12/07/2006
            		if ($ped_codemp <> $ped_codemp_vend){
            		
            			
	            		// CREDITO MLB NA EMPRESA DO VENDEDOR		
	            		$prod->clear();	
						$prod->listProdU("codconta", "fin_bcoconta, empresa", "fin_bcoconta.codvend=empresa.codvend_fin and empresa.codemp = $ped_codemp_vend");
						$codconta = $prod->showcampo0();
							
						
						#echo("codcont2=$codconta");
						//OBS: o codconta tem que ser passado para se efetuar a operacao
							
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
						
						// DEBITA MLB NA EMPRESA DO PEDIDO	
						$prod->clear();	
	            		$prod->listProdU("codconta", "fin_bcoconta, empresa", "fin_bcoconta.codvend=empresa.codvend_fin and empresa.codemp = $ped_codemp");
						$codconta = $prod->showcampo0();
						
						#echo("codcont2=$codconta");
						//OBS: o codconta tem que ser passado para se efetuar a operacao
							
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
            							

					#echo("bcomov=$uregbcomov");

					// ATUALIZA STATUS DO PEDIDO
					$prod->listProd("pedido", "codped=$codped");
					$prod->setcampo38("OK"); // COMISSAO PAGA
					$prod->upProd("pedido", "codped=$codped");

				}

			
			}else{

				for($i = 0; $i < count($array612); $i++ ){

					$msgf .= "<p>$msg[$i]</p>";
				}

				$Actionter = "lock";
				$prod->msggeral("$msgf", "ERRO", "$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pgold=$pgold", 0);

			}
		
		$Action = "update";
        break;

    case "update":

				
		 break;

		 /*
	 case "insnf":

		 //  VERIFICA SE NF PREENCHIDA
		$prod->listProdU("IF( nf = 'NO', 'S', 'N' ) ", "pedido", "codped=$codped");
		$falta_nf = $prod->showcampo0();

		#echo("falta_nf= $falta_nf");

		if ($modped == "OK"){

				// DELETE NOTA FISCAL ANTIGA
				$prod->delProd("pedidonf", "codped=$codped");
		}

		if ($falta_nf == 'S'){

			for($i = 0; $i < $qtdenf; $i++ ){

				$vnf[$i] = str_replace(',','.',$vnf[$i]);

				#echo("nf=$nf[$i] , vnf=$vnf[$i]");
				
				if ($nf[$i] <> "" and $vnf[$i] <> ""){

				// DADOS DA NOTA FISCAL //

				$prod->clear();
				$prod->setcampo1($codped);
				$prod->setcampo2("$nf[$i]");
				$prod->setcampo3($vnf[$i]);
				$prod->setcampo4($modo_nf);
				$prod->addProd("pedidonf", $uregnf);

				#echo("cp=$codped_original");

				}

			 }

			// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo24("OK");  // NOTA FISCAL
				$prod->setcampo80($modo_nf);  // MODO NF
				$prod->upProd("pedido", "codped=$codped");
				
			

		}

		$Action="update";
				
		 break;
		 */
		  case "insnf":

		 //  VERIFICA SE NF PREENCHIDA
		$prod->listProdU("IF( nf = 'NO', 'S', 'N' ) ", "pedido", "codped=$codped");
		$falta_nf = $prod->showcampo0();

		#echo("falta_nf= $falta_nf");

		if ($falta_nf == "N"){

				// DELETE NOTA FISCAL ANTIGA
				$prod->delProd("pedidonf", "codped=$codped");
		}

		#if ($falta_nf == 'S'){

			for($i = 0; $i < $qtdenf; $i++ ){
				
				$valornf[$i] = str_replace('.','',$valornf[$i]);
				$valornf[$i] = str_replace(',','.',$valornf[$i]);

				#echo("numnf=$numnf[$i] , vnf=$valornf[$i]");
				
				if ($tiponf[$i] <> "ESCOLHA"){

				// DADOS DA NOTA FISCAL //
				
				$datanf = $anf[$i].$mnf[$i].$dnf[$i];

				$prod->clear();
				$prod->setcampo1($codped);
				$prod->setcampo2("$numnf[$i]");
				$prod->setcampo3($valornf[$i]);
				$prod->setcampo4($tiponf[$i]);
				$prod->setcampo5($datanf);
				
				$prod->addProd("pedidonf", $uregnf);

				#echo("cp=$codped_original");

				}

			 }

			// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo24("OK");  // NOTA FISCAL
				#$prod->setcampo80($modo_nf);  // MODO NF
				$prod->upProd("pedido", "codped=$codped");
				
				$prod->listProdU("SUM(if(modo_nf = 'FA', 1, 0)), SUM(if(modo_nf != 'FA', 1, 0)) ", "pedidonf", "codped='$codped'");
				if ($prod->showcampo0() > 0 and $prod->showcampo1() == 0){
				
					$prod->upProdU("pedido","datasol_nf = 0", "codped='$codped'");
					
					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3("FATURAMENTO ANTECIPADO");
					$prod->setcampo4($login);
			
					$prod->addProd("pedidostatus", $ureg);
				}
				
			

		#}
			


		$Action="update";
				
		 break;


	 case "fat":

		if ($statuspeds <> "ESCOLHA"){

			$dataatual = $prod->gdata();

			// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");
						
			// MODIFICAÇÂO DO PEDIDO
			$prod->listProdU("modped, dataped","pedido", "codped=$codped");
			$modped = $prod->showcampo0();
			$dataped = $prod->showcampo1();

			#if (count($array614) == 0){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($statuspeds);
				$prod->setcampo4($login);

				#$prod->addProd("pedidostatus", $ureg);

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					#$prod->addProd("pedidostatus", $ureg);
				}

				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo39("OK");  // FAT -> FATURADO
    			$prod->upProd("pedido", "codped=$codped");

			/*}else{
				
				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);

					// ATUALIZA OUTROS DADOS DO PEDIDO
						$prod->listProd("pedido", "codped=$codped");
						$prod->setcampo39("OK");  // FAT -> FATURADO
						$prod->upProd("pedido", "codped=$codped");
				}
				
			}
			*/
		}
		
				//  LIBERA PEDIDO PARA ENTREGA
				$prod->listProdU("IF( caixa = 'OK' and fat = 'OK' and contrato <> 'NO' and reavalfpg = 'NO' , 'S', 'N' ) ", "pedido", "codped=$codped ");
				$pedidoliberado = $prod->showcampo0();

				if ($pedidoliberado == 'S'){

						$prod->listProd("pedido", "codped=$codped");
						$prod->setcampo21("OK");  // LIB. ENTREGA
						$prod->upProd("pedido", "codped=$codped");
				}
				
			
		

		$Actionsec="list";
			
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;
		 
	 case "cancel_sol":
	 
	 	 
	 	$prod->upProdU("pedido","datasol_nf = 0", "codped='$codped'");
		
		// ATUALIZA STATUS DA TABELA
		$prod->setcampo0("");
		$prod->setcampo1($codped);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("CANCEL SOLICITAÇÃO FAT");
		$prod->setcampo4($login);

		$prod->addProd("pedidostatus", $ureg);

		$Action="update";
			
		 break;


	 case "delete":

				
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
		if ($pedlib =="OK"){
			$condicao4 = " (pedido.status = 'LIB' and pedido.fat = 'NO' and pedido.caixa = 'OK' and (pedido.contrato = 'OK' or  pedido.contrato = 'EP' or  pedido.contrato = 'DC' ) or ((pedido.status = 'LIB' or pedido.status = 'DESP') and pedido.libentr = 'OK' and pedido.fat = 'NO' and (pedido.contrato = 'OK' or  pedido.contrato = 'EP' or  pedido.contrato = 'DC' )) )  and ";
		}else{
			$condicao4 = " ((pedido.status <> 'AVAL' and pedido.reavalfpg <>'OK') and pedido.fat = 'NO' ) and ";
		}
	
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

		
		
			// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome, fat, modped, modoentr, dataprevent_old, aguard_comp, prontaentr", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, $parm );

		
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

include("sif-topo.php");

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
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	if (!(consisteVazioTamanho(form, form.nf.name, 200)))
    {
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
	if (campo == 'nf')
        return 'Nº NOTA FISCAL';
	else
        return 'Campo não cadastrado';
}


function adjust(element) {

	return element.value.replace ('.', ',');
}



function EnviaNF()
{
  		
		
		for (var j=0; j < 5; j++)
		{
			
			var _objtipo ='tipo_'+j+'';
			var _objvalornf ='valornf_'+j+'';
			var _objdnf ='dnf_'+j+'';
			var _objmnf ='mnf_'+j+'';
			var _objanf ='anf_'+j+'';
			var _objnumnf ='numnf_'+j+'';
			var u=j+1;
			
			
			
			
			if (document.getElementById(_objtipo).value != 'ESCOLHA'){ 
			
			if ((document.getElementById(_objdnf).value == '' || document.getElementById(_objmnf).value == '' || document.getElementById(_objanf).value == '')){alert('A DATA do DOCUMENTO '+u+' deve ser preenchido corretamente.');return false; }
			
			
				var date2 = new Date(document.getElementById(_objanf).value, document.getElementById(_objmnf).value-1, document.getElementById(_objdnf).value);
				var now = new Date();
				var diff = date2.getTime() - now.getTime()
				var days = Math.floor(diff / (1000 * 60 * 60 * 24));
			
			
			//if (days < -1 ){alert('A DATA do DOCUMENTO '+j+' não pode ser inferior a DATA ATUAL');return false; }
			
			if (document.getElementById(_objnumnf).value == '' ){alert('O NUMERO do DOCUMENTO '+u+' deve ser preenchido corretamente.');return false; }
			if (ValidaCampoNumerico(document.getElementById(_objnumnf).value) != true ){alert('O NUMERO do DOCUMENTO '+u+' deve ser preenchido somente com NUMEROS.');return false; }
			
			if (document.getElementById(_objvalornf).value == ''){alert('O VALOR do DOCUMENTO '+u+' deve ser preenchido corretamente.');return false; }
			
			
			}	
		
						
		}
		
		
			
		document.Form33.submit();
		

    return true;
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
		$refentrega = $prod->showcampo5();
		$obsentrega = $prod->showcampo6();
		$dataped = $prod->showcampo11();
		$dataprev = $prod->showcampo12();
		$datapedf = $prod->fdata($dataped);
		$dataprevf = $prod->fdata($dataprev);
		$dataprevent_old = $prod->showcampo48();
		$dataprevent_oldf  = $prod->fdata($dataprevent_old);
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
		$dataprevent = $prod->fdata($dataprevent);
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
		$modped = $prod->showcampo44();
		$datasol_nf = $prod->showcampo92();
		$codemp_pis = $prod->showcampo94();
	
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
		$xopcaixashow = explode(":", $xopcaixa);
		$xasscontrato=	$prod->showcampo80();
		$xnumero = $prod->showcampo90();
    		$xcomplemento = $prod->showcampo91();

	$prod->listProdU("nome, cor, codgrupo","empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
		$corempold = $prod->showcampo1();
		$codgrupo_pedido = $prod->showcampo2();
		
	
	$prod->listProdU("nome, codemp", "vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo0();
		$codemp_vend = $prod->showcampo1();
		
		
		$prod->listProd("empresa", "codemp='$codemp_pis'");
				
		$emp_endereco=		$prod->showcampo2();
		$emp_bairro=		$prod->showcampo3();
		$emp_cidade=		$prod->showcampo4();
		$emp_estado=		$prod->showcampo5();
		$emp_cep=			$prod->showcampo6();
		$emp_cnpj=			$prod->showcampo13();
		$emp_ie=			$prod->showcampo15();
		$emp_razao =		$prod->showcampo23();
		$codgrupo_emppis =		$prod->showcampo31();	
		$cor_emppis =		$prod->showcampo33();	
		
		
		#$prod->listProdU("COUNT(*)", "pedidoparcelas", "codped='$codped' and (tipo = '02.30' or tipo = '02.32' or tipo = '02.33') ");
		#$cartao=		$prod->showcampo0();
		
		#echo "$codemp - $codemp_pis - $corempold";
		
		if ($codemp == $codemp_pis or $codemp_pis == 0){
			$coremp_cliente = "#FFFFFF";
			$cartao = 0;
			
			
		}else{
			$coremp_cliente = $cor_emppis;
			if ($codgrupo_emppis == $codgrupo_pedido){$tipo_nota = "TRANFERÊNCIA";}else{$tipo_nota = "VENDA";}
			$prod->listProdU("COUNT(*)", "pedidonf", "modo_nf = 'FA' and codped='$codped'");
			if ($prod->showcampo0() > 0){$cartao = 1;$fa=0;}else{$cartao=0;$fa=1;}
			
		}
	

echo("

  <center>
  <table width='90%'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
                  <table cellSpacing='0' cellPadding='2' width='100%' border='0'>
                    <tbody>
                      <tr>
                        
  </center>
                        <td width='80%'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></b></td>
                        <td width='20%' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&nomevendpesq=$nomevendpesq&pedlib=$pedlib'><img border='0' src='images/bt-continuaped.gif' ><br>
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

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 


<div align='center'>
  <table border='0' width='90%' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='50%' bgcolor='#000000'>
        <p align='left'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PEDIDO:
        </b></font><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
      
      <td width='50%' bgcolor='#000000'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='1'><b>USUÁRIO</b></font><font size='1'><b><font color='#86ACB5' face='Verdana, Arial, Helvetica, sans-serif'>:</font><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><br>
      </font><font color='#FFFFFF' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
      </tr>
      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          EMISSÃO PEDIDO:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datapedf</font></b></font></td>
      
      <td width='50%' bgcolor='#F0F0F0'>
        <p align='right'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font><font face=' Verdana, Arial, Helvetica, sans-serif' size = '4'>
       $nomeempold</font></b></font></td>
    </tr>
    
    
 ");
if ($cartao == 1){
echo("
    <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'><font size='4' face='Verdana' color='#F77673' ><b>NOTA FISCAL(M1) DE $tipo_nota</b></font></td>
    </tr>
	
	<tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'>
	  <table border='0' width='100%' cellspacing='1' cellpadding='0'>
	  	
		<tr>
		<td width='10%' bgcolor='$corempold' colspan='2' align = 'center'></td>
		<td width='90%' bgcolor='#FFFFFF' colspan='2' align = 'center'>
		 <table border='0' width='100%' cellspacing='0' cellpadding='0'>
     <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        EMPRESA</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>NOME/ RAZÃO SOCIAL:<br>
        </font><font color='#000000'>$emp_razao</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CPF/CNPJ:<br>
      </font></b><font color='#000000'>$emp_cnpj
      $xcnpj</font></font> <BR><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>IE:<br>
      </font></b><font color='#000000'>$emp_ie</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDEREÇO:<br>
        </font>
        </b><font color='#000000'>$emp_endereco - $emp_numero - $emp_complemento - $emp_bairro - $emp_cidade - $emp_estado - $emp_cep</font></font></td>
    </tr>
			  <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br></b>
        </font><font color='#000000'>$xemail</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>($xdddtel1) $xtel1<br>($xdddtel2) $xtel2 <br>RAMAL: $xramal<br></font></td>
    </tr>
		
	</tr>
	</table>
		
		</td>
				
		</tr>
	  </table>
	
	 <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'><font size='4' face='Verdana' color='#F77673' ><b>NOTA FISCAL DE SIMPLES REMESSA</b></font></td>
    </tr>
");
}
if ($fa == 1){
	echo "
		 <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'><font size='4' face='Verdana' color='#F77673' ><b>NOTA FISCAL FATURAMENTO ANTECIPADO</b></font></td>
    </tr>
	";
}
echo("

 <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'>
	  <table border='0' width='100%' cellspacing='1' cellpadding='0'>
	  	
		<tr>
		<td width='10%' bgcolor='$coremp_cliente' colspan='2' align = 'center'></td>
		<td width='90%' bgcolor='#FFFFFF' colspan='2' align = 'center'>
		 <table border='0' width='100%' cellspacing='0' cellpadding='0'>
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
      $xcnpj</font></font> <BR><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>IE:<br>
      </font></b><font color='#000000'>$xie</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDEREÇO:<br>
        </font>
        </b><font color='#000000'>$xendereco - $xnumero - $xcomplemento - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
    </tr>
			  <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br></b>
        </font><font color='#000000'>$xemail</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>($xdddtel1) $xtel1<br>($xdddtel2) $xtel2 <br>RAMAL: $xramal<br></font></td>
    </tr>
		
	</table>
		
		</td>
				
		</tr>
	  </table>
	  </td>
	  </tr>
	

  
    </table>



 </table>
  </center>
</div>





");
/*
if ($xtipocliente == "F"){

echo("
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#808080'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES&nbsp;</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>RG:<br>
        </font></b><font color='#000000'>$xrg</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>EMISSOR:<br>
        </font></b><font color='#000000'>$xrgemissor</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>DATA
        NASCIMENTO:<br>
        </font></b><font color='#000000'>$xdatanasc</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>SEXO:<br>
        </font></b><font color='#000000'>$xsexo</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ESTADO
        CIVIL:<br>
        </font></b><font color='#000000'>$xecivil</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>NACIONALIDADE:<br>
        </font></b><font color='#000000'>$xnacionalidade</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TEMPO
        RESIDÊNCIA:<br>
        </font></b><font color='#000000'>$xtempolocal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO
        RESIDÊNCIA:<br>
        </font></b><font color='#000000'>$xtipolocal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel1)$xtel1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel2)$xtel2</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_empresa</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>CNPJ:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_cnpj</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>TEMPO
        EMPRESA:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_tempoemp</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>OCUPAÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_ocupacao</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DESCRIÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_descricao</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NACIONALIDADE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xnacionalidade</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>ENDEREÇO
        COMERCIAL:<br>
        </font>
        </b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>$xc_endereco - $xc_bairro - $xc_cidade - $xc_estado - $xc_cep</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xc_dddtel)$xc_tel</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RAMAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_ramal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ENDEREÇO
        CORRESP:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_endcorresp</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'>&nbsp;</td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RENDA
        MENSAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_rendamensal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>OUTRAS
        RENDAS:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_outrasrendas</font></font></td>
    </tr>
  </table>
  </center>
</div>
");

}else{

//INICIO _ PESSOA JURIDICA
echo("
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES&nbsp;</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>INSCRIÇÃO
        ESTADUAL</b></font><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xie</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>DATA
        ATIVAÇÃO:<br>
        </font></b><font color='#000000'>$xdataativ</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TEMPO
        LOCAL:<br>
        </font></b><font color='#000000'>$xtempolocal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO
        LOCAL:<br>
        </font></b><font color='#000000'>$xtipolocal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel1)$xtel1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RAMAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xramal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel2)$xtel2</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>FATURAMENTO</b></font><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>
        MENSAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xfatmensal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ATIVIDADE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xatividade</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'>&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
");
}
echo("
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        DO CÔNJUGE </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_nome</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>CPF:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_cpf</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RG:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_rg</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMISSOR:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_rgemissor</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
        NASCIMENTO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_datanasc</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_empresa</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>OCUPAÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_ocupacao</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DESCRIÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_descricao</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RENDA
        MENSAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_rendamensal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xcj_dddtel)$xcj_tel</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RAMAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_ramal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'>&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        BANCÁRIA </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>BANCO:<br>
        </font></b><font color='#000000'>$xrb_banco</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>AGÊNCIA:<br>
        </font></b><font color='#000000'>$xrb_agencia</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CONTA:<br>
        </font></b><font color='#000000'>$xrb_conta</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO:<br>
        </font></b><font color='#000000'>$xrb_tipo</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrb_dddtel)$xrb_tel</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CLIENTE
        DESDE:<br>
        </font></b><font color='#000000'>$xrb_clientedesde</font></font></td>
    </tr>
  </table>
  </center>
</div>


<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        PESSOAL </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrp_nome1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrp_dddtel1)$xrp_tel1</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrp_nome2</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrp_dddtel2)$xrp_tel2</font></font></td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        COMERCIAL </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrc_nome1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrc_dddtel1)$xrc_tel1</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrc_nome2</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrc_dddtel2)$xrc_tel2</font></font></td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>SÓCIO
        SOLIDÁRIO</b></font></td>
    </tr>
");

  $prod->listProdgeral("relacaocli", "codcliente_pri=$codcliente", $array311, $array_campo311 , "");


		for($i = 0; $i < count($array311); $i++ ){
			
			$prod->mostraProd( $array311, $array_campo311, $i );

			$codcliente_sec = $prod->showcampo2();

		$prod->listProd("clientenovo", "codcliente=$codcliente_sec");
				
		$xcodcliente=	$prod->showcampo0();
		$xnomesocio=	$prod->showcampo1();
		
		$xcpf=			$prod->showcampo4();

echo("
    <tr>
      <td width='100%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'><B>COD:</B> $xcodcliente - $xnomesocio - $xcpf </font></font></td>
    </tr>
");
		}
	echo("
    
  </table>
  </center>
</div>
");
*/


echo("

  <center>
    <table border='0' width='90%' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#808080' valign='top'>
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
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datapreventf - $horaprevent</font><BR>
		 <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PREVISÃO
        ENTREGA ORIGINAL:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dataprevent_oldf</font></td>
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
    <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' bgcolor='#808080' valign='top'>
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
<BR>
<BR>
");
if ($datasol_nf <> 0 and $fa == 0){
echo("
<center>
<form method='POST' action='$PHP_SELF?Action=cancel_sol'  name='Form77' >
  <div align='center'>
   
    <table cellSpacing='1' cellPadding='3' width='90%' border='0'>
      <tr bgColor='#f3f8fa'>
        <td>  <input type='submit' value='CANCELAR SOLICITAÇÃO DE NOTA' name='B1'></td>
      </tr>
    </table>
   
  </div>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codcliente' value='$codcliente'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
	    
</form>
</center>

");
}
echo("

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 


<br>
<table border='0' width='90%' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>

<table width='90%' border='0' cellspacing= '0' cellpadding='0' align='center'>

  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>
<BR>
<table border='0' width='90%' border='0' cellspacing='1' cellpadding='2' align='center'>
<tr bgcolor='#FFFFFF'>
		<td width='5%' height='0' align='right' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>VALORES DA NOTA FISCAL</b><td>
		</tr>
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

            $descplano = 0;
            $codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();

			$puu = $prod->showcampo4();
			$descplano = $prod->showcampo14();

			if ($vt <> 0){$fator_ped = $vpp/$vt;$descplano = 0;}else{$fator_ped = 0;}
			$puu_fat = ($puu * ($fator_ped))+$descplano;
			$puu = $puu * ($fator_ped);

            $tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			

			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			
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
			$put_fat = $puu_fat*$qtde;
			$puu_fatf = number_format($puu_fat,2,',','.');
			$put_fatf = number_format($put_fat,2,',','.');

		

	if ($tipocj <> $contcjshow){
			echo(" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
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
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font><BR>
	");

	for($o = 0; $o < $qtde; $o++ ){

  		if ($codcb_array[$o] == ""){
		
		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'>VAZIO</font><bR>
		");
		}else{

		$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$o]");
		$codbarra_ok = $prod->showcampo0();

		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'><b>$codbarra_ok</b></font><br>

		");
		}
	}
	echo("	
	</td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>$codprodped</b> - $nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><!--$puuf--><BR>$puu_fatf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><!--$putf-->$put_fatf</font></td>
   
  </tr>
		
  ");

	

	$ptotal = $ptotal + $put_fat;
		}
	
	$putotal = $putotal +$puu_fat;
	$pmtotal = $pmtotal +$put_fat;
	$putotalf = number_format($putotal,2,',','.'); 
	$pmtotalf = number_format($pmtotal,2,',','.'); 
		}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
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

            $descplano = 0;
			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();

			$puu = $prod->showcampo4();
			$descplano = $prod->showcampo14();
			if ($vt <> 0){$fator_ped = $vpp/$vt;$descplano = 0;}else{$fator_ped = 0;}
			$puu_fat = ($puu * ($fator_ped))+$descplano;
			$puu = $puu * ($fator_ped);
			
			$tipoprod = $prod->showcampo8();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
        
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			
						
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 
			$put_fat = $puu_fat*$qtde;
			$puu_fatf = number_format($puu_fat,2,',','.');
			$put_fatf = number_format($put_fat,2,',','.');
			
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font><BR>
	");

	for($o = 0; $o < $qtde; $o++ ){

  		if ($codcb_array[$o] == ""){
		
		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'>VAZIO</font><bR>
		");
		}else{

		$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$o]");
		$codbarra_ok = $prod->showcampo0();

		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'><b>$codbarra_ok</b></font><br>

		");
		}
	}
	echo("	</td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>$codprodped</b> - $nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><!--$puuf-->$puu_fatf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><!--$putf-->$put_fatf</font></td>
   
  </tr>
		
  ");

	
	$ptotal = $ptotal + $put_fat;
	$pmtotalu = $pmtotalu + $put_fat;
	$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
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

	$ptotal = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
  
  </tr>
		</table>
	<br>		
  ");

$prod->listProdSum("codcb, codcat","pedidoprod, produtos", "codped=$codped and pedidoprod.codprod=produtos.codprod and chk_ppb = 'S'", $array37, $array_campo37 , "");

if ( count($array37) > 0 ){
	

	echo("
		
	<center>
    <table border='0' width='90%' cellspacing='1' cellpadding='2'>
	

 	<tr>
      <td width='100%'  colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b><BR></b></font></td>
    </tr>
       <tr>
      <td width='100%' bgcolor='#FF0000' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b></b></font></td>
    </tr>
     <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'><font size='6' face='Verdana' color='#FF0000' ><b>ATENÇÃO</b></font></td>
    </tr>
   
    <tr>
      <td width='100%' bgcolor='#FDDCDB' ><b><center><font face='Verdana, Arial, Helvetica, sans-serif' size='3' color='#000000'>OBSERVAÇÕES PARA CONSTAR NO DOCUMENTO FISCAL:<br></font><BR><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>NOTA FISCAL DE ORIGEM DE FÁBRICA<br></b></font><hr>
    ");
$array_ppb =array();
$result =array();
$u=0;
for($i = 0; $i < count($array37); $i++ ){
				
	$prod->mostraProd( $array37, $array_campo37, $i );
	
	$codcb_fat = $prod->showcampo0();
	$codcat_prod = $prod->showcampo1();
	$codcb_fat_array = explode(":", $codcb_fat);
	
	#echo"$codcb_fat_array";
	
	for($o = 0; $o < count($codcb_fat_array); $o++ ){
		
		#echo $codcb_fat_array[$o]."<BR>";
		
		$prod->clear();
		$prod->listProdU("codbarra", "codbarra", "codcb='$codcb_fat_array[$o]' ORDER BY codoc LIMIT 0,1");
		$codbarra_fat = $prod->showcampo0();
		
		$prod->clear();
		$prod->listProdU("codprod, codoc", "codbarra", "codbarra='$codbarra_fat' and codoc <> 0 ORDER BY codoc LIMIT 0,1");
		$codprod_comp = $prod->showcampo0();
		$codoc_comp = $prod->showcampo1();
		
		#echo "$codbarra_fat - $codprod_comp - $codoc_comp<BR>";
				
		$prod->clear();
		$prod->listProdU("codfab, tipo_port, port, port_comp, dataport, numnf_fab, datanf_fab, obs_fab","ocprod", "codoc ='$codoc_comp' and codprod ='$codprod_comp' ");
		
		$xcodfab = $prod->showcampo0();
		$xtipo_port = $prod->showcampo1();
		$xport = $prod->showcampo2();
		$xport_comp = $prod->showcampo3();
		$xdataport = $prod->showcampo4();
		$xnf_fab = $prod->showcampo5();
		$xdatanf_fab = $prod->showcampo6();
		$obs_fab = $prod->showcampo7();
		
		#echo "$codfab - $xtipo_port - $xport - $xport_comp - $xdataport - $xnf_fab - $datanf_fab - $obs_fab<br>";
		
	
		$array_ppb_nf[$codprod_comp][$xcodfab][$xtipo_port][$xport][$xport_comp][$xdataport][$xnf_fab] = array(nf_fab =>$xnf_fab, codprod_comp => $codprod_comp, obs_fab => $obs_fab);
		//ANTIGO FUNCIONAL => $array_ppb_nf[$codprod_comp][$xcodfab][$xtipo_port][$xport][$xport_comp][$xdataport][$xnf_fab][$xdatanf_fab] = array(nf_fab =>$xnf_fab, datanf_fab=>$xdatanf_fab, codprod_comp => $codprod_comp);
		
		
		$array_ppb[$codprod_comp][$xcodfab][$xtipo_port][$xport][$xport_comp][$xdataport] = array( codprod =>$codprod_comp,  fab =>$xcodfab, tipo_port => $xtipo_port,port =>$xport, port_comp => $xport_comp, dataport=>$xdataport);
		
	
	
		
	}//FOR
	
	
	
}//FOR

	//echo "<pre>";
	//print_r($array_ppb);
	
	//print_r($array_ppb_nf);

	//echo "</pre>";
	
	
	
	foreach ($array_ppb as $codprod) {
 		   foreach ($codprod as $codfab) {
		   	foreach ($codfab as $tipo_port) {
		   		foreach ($tipo_port as $port) {
					foreach ($port as $port_comp) {
						foreach ($port_comp as $result) {
							
								
				//echo "<pre>";
       			 //print_r ($result);
				// echo $result[fab]."<BR>";
				 
				 $wcodprod = $result[codprod];
				 $wfab = $result[fab];
				 $wtipo_port = $result[tipo_port];
				 $wport = $result[port];
				 $wport_comp = $result[port_comp];
				 $wdataport = $result[dataport];
				 
				 #echo "$wcodprod -  $wfab - $wtipo_port - $wport - $wport_comp -   $wdataport";
				 
				 
				 				
				  //print_r ($nffab);
				 
				 $prod->clear();
				 $prod->listProdU("nome, endereco, bairro, cidade, estado, cgc, ie", "fornecedor", "codfor = '".$result[fab]."'");

					$nome_fab = $prod->showcampo0();
					$endereco_fab = $prod->showcampo1();
					$bairro_fab = $prod->showcampo2();
					$cidade_fab = $prod->showcampo3();
					$estado_fab = $prod->showcampo4();
					$cnpj_fab = $prod->showcampo5();
					$ie_fab = $prod->showcampo6();
					
					if($result[tipo_port] == 'SUFRAMA'){$compl = "/".$result[port_comp];}else{$compl = " DE ".$result[dataport];}  
					
					
					echo "<br></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>".$result[codprod]."</b> - ADQ. DE $nome_fab, CNPJ $cnpj_fab<BR>IE $ie_fab, END. $endereco_fab-$cidade_fab-$estado_fab<br>PORT. ".$result[tipo_port]." ".$result[port].$compl." NF ";
					
				
					//print_r($array_ppb_nf[$wcodprod][$wfab][$wtipo_port][$wport][$wport_comp][$wdataport]);
					
					
				
					
					foreach ($array_ppb_nf[$result[codprod]][$result[fab]][$result[tipo_port]][$result[port]][$result[port_comp]][$result[dataport]] as $result_nf) {
					  		///ANTIGO FUNCIONAL => foreach ($dataport1 as $result_nf) {
										
										
										 echo $result_nf[nf_fab].", ";
										//ANTIGO FUNCIONAL => echo $result_nf[nf_fab]." - ".$result_nf[datanf_fab].", ";
										//$result_nff[$result_nf[codprod_comp]] = array ($result_nf[nf_fab] => $result_nf[nf_fab]);
										
					}//ANTIGO FUNCIONAL =>}
					
					echo "<BR>";
					
					foreach ($array_ppb_nf[$result[codprod]][$result[fab]][$result[tipo_port]][$result[port]][$result[port_comp]][$result[dataport]] as $result_nf) {
					  		///ANTIGO FUNCIONAL => foreach ($dataport1 as $result_nf) {
										
										
										 echo $result_nf[obs_fab]." ";
										//ANTIGO FUNCIONAL => echo $result_nf[nf_fab]." - ".$result_nf[datanf_fab].", ";
										//$result_nff[$result_nf[codprod_comp]] = array ($result_nf[nf_fab] => $result_nf[nf_fab]);
										
					}//ANTIGO FUNCIONAL =>}
					
					
					echo "<BR>B.C. REDUZIDO CONF. ITEM 56 DA PARTE 1 ANEXO IV RICMS/2002.</font><bR><br>";
					
				 	echo"<hr>";
				 
    		}}}}}}
			
			
			
			
			

echo("
    </center></td>    </tr>
      <tr>
      <td width='100%' bgcolor='#FF0000' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b></b></font></td>
    </tr> 
    </table>
  </center>
");
}// EXISTE PPB

echo("
<form method='POST' action='$PHP_SELF?Action=insert'  name='Form' onSubmit = 'if (verificaObrig(document.Form)==false) return false'>
		
	<table border='0' width='90%' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
<table width='90%' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>


 <div align='center'>
    <center>
    <table border='0' width='90%' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BANCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>AGENCIA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.CHEQUE</b></font></td>
		<td width='5%'><font size='1' face='Verdana' color='#ffffff'><b>PG</b></font></td>
      </tr>
");

$errofat = 1;
  $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$codparcped = $prod->showcampo0();
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
				$pnumdoc = $prod->showcampo12();

				
if ($parcpg == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}

			
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%' rowspan='2'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
       <td width='10%'><font size='1' face='Verdana' >$numchec</font></td>
		<td width='5%' rowspan='2' ><font size='1' face='Verdana' color ='$cor1'><b>$parcpg</B></font></td>
      </tr>
");
if ($pnumdoc == "S"){

	if ($numdoc == ""){
echo("

	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>NUM. DOCUMENTO</b></font></td>
	      <td width='40%' colspan='4'><input type='text' name='numdoc[$codparcped]' size='30'></td>
    </tr>
");
	if ($tipo == "02.60"){
		$errofat = $errofat*0;
	}
	}else{
echo("

	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>NUM. DOCUMENTO</b></font></td>
	      <td width='40%' colspan='4' align ='center'><b>$numdoc</b></td>
    </tr>
");
	$errofat = $errofat*1;
	}

}else{
	echo("
	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>&nbsp;</b></font></td>
	      <td width='40%' colspan='4'>&nbsp;</td>
    </tr>
");
}
	}

echo("
    </table>
<br>

		");
		if ($caixa == "NO"){
			echo("
		<input class='sbttn' type='submit' value='Receber Pedido' name='B1'>
");
		}
		echo("

			<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codcliente' value='$codcliente'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

	</form>
   	<table border='0' width='90%' cellspacing='1' cellpadding='3'>
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
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>


<table cellSpacing='0' cellPadding='0' width='90%' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>I</font>
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
  <table cellSpacing='1' cellPadding='3' width='90%' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>
<form method='POST' action='nf/geranota.php?codped=$codped'  name='Form' TARGET ='_BLANK'>
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='90%' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>OBS. NOTA:</b></font></td>
        <td width='554'>
 <input type='text' name='obsnota' size='50' maxlength='50'>
  


            </td>
        <td width='55' rowspan='2'>
  <input type='submit' value='GERAR NOTA' name='B1'>
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>OBS. NOTA 1</b></font></td>
        <td width='554'>
 <input type='text' name='obsnota1' size='50' maxlength='50'>
  

            </td>
      </tr>
    </table>
    </center>
  </div>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

		
			</form>


<br>
<table cellSpacing='0' cellPadding='0' width='90%' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        III</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOTA FISCAL</font></b></td>
    </tr>
  </tbody>
</table>
		 <form method='POST' action='$PHP_SELF?Action=insnf'  name='Form33' >
<div align='center'>
  <center>
 
 <table cellSpacing='1' cellPadding='3' width='90%' border='0'>

        <tr bgColor='#86acb5'>
        <td width='12%'><font face='Verdana' color='#ffffff' size='1'><b>TIPO</b></font></td>
        <td width='28%'><b><font color='#ffffff' size='1' face='Verdana'>DATA NOTA </font></b></td>
        <td width='38%'><font face='Verdana' color='#ffffff' size='1'><b>NUMERO NOTA </b></font></td>
        <td width='22%'><font face='Verdana' color='#ffffff' size='1'><b>VALOR</b></font></td>
	  </tr>
	<tr bgColor='#f3f8fa'>
	  <td width='12%'>&nbsp;</td>
        <td width='28%'>&nbsp;</td>
        <td width='38%'><font face='Verdana' color='#ffffff' size='1'><b></b></font></td>
        <td width='22%'><font face='Verdana' color='#ffffff' size='1'><b></b></font></td>
	  </tr>
");
if ($nf == "OK"){


	$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < 5; $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$numnf = $prod->showcampo2();
			$valornf = $prod->showcampo3();
			$tiponf = $prod->showcampo4();
			$datanf = $prod->showcampo5();
			if ($tiponf == ""){$tiponf = "ESCOLHA";}
			
			$anf = substr($datanf, 0, 4);
			$mnf = substr($datanf, 5, 2);
			$dnf = substr($datanf, 8, 2);
			
			$valornff = number_format($valornf,2,',','.'); 
		
			
echo("
    <tr bgColor='#f3f8fa'>
	  	  <td width='12%'><font face='Verdana' color='#ffffff' size='1'><b>
	  	    <select name='tiponf[$j]' id='tipo_$j'>
	  	      ");
			  if ($fa == 1){
			  echo("
			  <option value='FA'>FA</option>
	  	      ");
			  }else{
			  echo("
			  <option value='NF'>NF</option>
	  	      <option value='CF'>CF</option>
			  <option value='SR'>SR</option>
			  <option value='RO'>RO</option>
			  <option value='FA'>FA</option>
			  ");
			  }
				if ($tiponf <> ""){
	  	      echo("
	  	      <option value='ESCOLHA' selected>ESCOLHA</option>
	  	      ");
				}
	  	      echo("
	  	      <option value='$tiponf' selected>$tiponf</option>
                                                </select>
	  	  </b></font></td>
          <td width='28%'><font face='Verdana' size='1'><b>
            <input name='dnf[$j]' type='text' id='dnf_$j' value = '$dnf' size='2' maxlength='2' />
            /
  <input name='mnf[$j]' type='text' id='mnf_$j' value = '$mnf' size='2' maxlength='2' />
            /
  <input name='anf[$j]' type='text' id='anf_$j' value = '$anf' size='4' maxlength='4' />
          </b></font></td>
          <td width='38%'><font face='Verdana' size='1'><b><input type='text' name='numnf[$j]' id='numnf_$j' size='15' value = '$numnf'></b></font></td>
		<td width='22%'><font face='Verdana' size='1'><b>R$ </b><input type='text' name='valornf[$j]' id='valornf_$j' size='10' value = '$valornff'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\"></font></td>
	  </tr>
		 
");		
	}//FOR
	
	echo("
	</table>
	<br>
	<input type='hidden' name='modped' size='30' value = '$modped'>
	
	<input class='sbttn' type='button' value='Atualizar Nota Fiscal' name='B1' onClick='javascript:EnviaNF();'>
	
	");
	
}else{
$j=0;


	for($k = $j; $k < 5; $k++ ){
echo("
    	<tr bgColor='#f3f8fa'>
	  	  <td width='12%'><font face='Verdana' color='#ffffff' size='1'><b>
	  	    <select name='tiponf[$k]' id='tipo_$k'>
	  	     ");
			  if ($fa == 1){
			  echo("
			  <option value='FA'>FA</option>
	  	      ");
			  }else{
			  echo("
			  <option value='NF'>NF</option>
	  	      <option value='CF'>CF</option>
			  <option value='SR'>SR</option>
			  <option value='RO'>RO</option>
			  <option value='FA'>FA</option>
			  ");
			  }
			  echo("
	  	      <option value='ESCOLHA' selected>ESCOLHA</option>
                                                </select>
	  	  </b></font></td>
          <td width='28%'><font face='Verdana' size='1'><b>
            <input name='dnf[$k]' type='text' id='dnf_$k' value = '$dnf[$k]' size='2' maxlength='2' />
            /
  <input name='mnf[$k]' type='text' id='mnf_$k' value = '$mnf[$k]' size='2' maxlength='2' />
            /
  <input name='anf[$k]' type='text' id='anf_$k' value = '$anf[$k]' size='4' maxlength='4' />
          </b></font></td>
          <td width='38%'><font face='Verdana' size='1'><b><input type='text' name='numnf[$k]' id='numnf_$k' size='15'></b></font></td>
		<td width='22%'><font face='Verdana' size='1'><b>R$ </b><input type='text' name='valornf[$k]' id='valornf_$k' size='10' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" ></font></td>
	  </tr>
");		
	}//FOR
	
	echo("
	</table>
	<br>
	<input type='hidden' name='modped' size='30' value = '$modped'>
	
	<input class='sbttn' type='button' value='Inserir Nota Fiscal' name='B1' onClick='javascript:EnviaNF();'>
	
	");

}
	
echo("




	<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codcliente' value='$codcliente'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		<input type='hidden' name='qtdenf' value='5'>
		<input type='hidden' name='vpp_fat' value='$vpp' id = 'vpp_fat'>
  </form>
 
<br>
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>

<div align='center'>
  <center>
    <table border='0' width='90%' cellspacing='1' cellpadding='2'>
	<tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='766' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. DO FINANCEIRO</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$notafin</font></b></td>
    </tr>
   <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='766' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. SOBRE O CRÉDITO DO CLIENTE</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$xobscredito</font></b></td>
    </tr>
		 <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='1028' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. APROVAÇÃO DE CRÉDITO</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$obsapcredito</font></b></td>
    </tr>
    
    </table>
  </center>
</div>
");


if ($contrato == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($contrato == "EP"){$cor1 ="#FF6600";}
if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}



echo("

<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
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
	<tr>
      <td width='100%' colspan='4'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>


<br>
	<form method='POST' action='$PHP_SELF?Action=fat'  name='Form' >
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='90%' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'></td>
        <td width='554'>
 
  


            </td>
        <td width='55' rowspan='2'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>FATURAR PEDIDO</b></font></td>
        <td width='554'>
		    <select size='1' class=drpdwn name='statuspeds'>
       ");


	//VERIFICA SE TODAS AS PARCELAS SAO FAT
	$prod->listProdSum("COUNT(*) as fat", "pedidoparcelas, formapg", "codped=$codped and tipoparc ='FT' AND parcpg <> 'OK' and pedidoparcelas.tipo = formapg.opcaixa", $array613, $array_campo613, "order by datavenc" );
	$prod->mostraProd( $array613, $array_campo613, 0 );
	$numparcfat = $prod->showcampo0();

	if ($numparcfat <> 0){$errocaixa=0;}else{$errocaixa=1;}



if ($errofat == 1 and $nf == "OK" and $errocaixa == 1){
echo("
		<option value='FAT'>FAT</option>
");
}

echo("

		<option selected>ESCOLHA</option>
		
						  </select>

  


  

            </td>
      </tr>
    </table>
    </center>
  </div>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codcliente' value='$codcliente'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
	    
</form>

<table cellSpacing='0' cellPadding='0' width='90%' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        IV</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='90%' border='0'>

      <tr bgColor='#86acb5'>
        <td width='30%'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>STATUS</b></font></td>
		<td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>MODIFICADO POR</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("pedidostatus", "codped=$codped", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$modpor = $prod->showcampo4();
			$datastatusf = $prod->fdata($datastatus);

if ($statusped == "ENTR"){$apgdata =1;}

echo("
      <tr bgColor='#f3f8fa'>
        <td width='30%'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='35%'><font face='Verdana' size='1'><b>$statusped</b></font></td>
		<td width='35%'><font face='Verdana' size='1'><b>$modpor</b></font></td>
      </tr>
");		
	}
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='90%' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>



</form>

<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='0'>
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




	");
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"):

	echo("
<center>
  <table width='90%'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
  </center>
	

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width='30%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933'  >$titulo</font></font></b><br>
<font color='#336699' face=' Verdana, Arial, Helvetica, sans-serif' size='2'>$subtitulo</font></td>
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='cli'>Cliente</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'>
		VENDEDOR: <input type='text' name='nomevendpesq' size='20'><br>LIBERADOS:<input type='checkbox' name='pedlib' value='OK'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codpednew' value='$codpednew'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

	  </p>
	   </td>
		  </form>
    </tr>
  </table>
      </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
	

");

# Pesquisa pela Empresa do OC



echo("
<br>
	<div align='left'>
 
 
</div>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                             
						  
	");

	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'>$nomeemp</option>
		");
	
	}
	

	echo("	

		<option value='' selected>Escolha a Empresa</option>
		
						  </select>
  
  
  </td>
	 
	  </form>
 </tr>
</table>
	
");


 
if ($codempselect<>""){


	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$contatoold = $prod->showcampo16();

		$nomeempold = strtoupper($nomeempold);

echo("
<br>
<div align='center'>
  <center>
  <table border='0' width='90%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%'>
      <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='5%'><img border='0' src='images/empresa.gif' width='25' height='26'></td>
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></td>
        </tr>
      </table>
    </td>
  </tr>
  <center>
  <tr>
    <td width='100%'>
      <hr size='1'>
    </td>
  </tr>
  </table>
  </center>
</div>



	<table width='90%' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='18%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='14%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PED</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONT</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CTR</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LIB</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>FAT</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CX</font></b></div>
    </td>
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataped = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$contrato = $prod->showcampo8();
			$libentr = $prod->showcampo9();
			$codbarra = $prod->showcampo10();
			$caixa = $prod->showcampo11();
			$nomecliente = $prod->showcampo12();
			$fat = $prod->showcampo13();
			$modped = $prod->showcampo14();
			$modoentr = $prod->showcampo15();
			$dataprevent_old = $prod->showcampo16();
			$aguard_comp = $prod->showcampo17();
			$pronta = $prod->showcampo18();
	
			// FORMATACAO //
			$datapedf = $prod->fdata($dataped);
			$datapreventf = $prod->fdata($dataprevent);
			$dataprevent_olff = $prod->fdata($dataprevent_old);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataatual,$dataprevent);
			
			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();


			//VERIFICA SE TODAS AS PARCELAS SAO FAT
			$prod->listProdSum("COUNT(*) as fat", "pedidoparcelas, formapg", "codped=$codped and tipoparc ='FT' and pedidoparcelas.tipo = formapg.opcaixa", $array613, $array_campo613, "order by datavenc" );
			$prod->mostraProd( $array613, $array_campo613, 0 );
			$numparcfat = $prod->showcampo0();

			if ($numparcfat <> 0){$descfat="FAT";}else{$descfat="";}

			$bgcorlinha="#E5E5E5";
			if ($status == "AVAL"){$bgcorlinha="#FFCC66";}
			if ($status == "APROV"){$bgcorlinha="#CFFCC7";}
			if ($status == "PECA"){$bgcorlinha="#D6B778";}
			if ($status == "PROD"){$bgcorlinha="#F2E4C4";}
			if ($status == "LIB"){$bgcorlinha="#EDE763";}
			if ($status == "DESP"){$bgcorlinha="#339966";}
			if ($status == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}

if ($aguard_comp == "OK"){$aguard ="AGUARDA<br>COMPENSAÇÃO";}else{$aguard ="";}			
if ($contrato == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($contrato == "EP"){$cor1 ="#FF6600";}
if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}
if ($modped == "OK"){$mod ="MOD";}else{$mod="";}
if ($modoentr == "MOTOBOY"){$moto ="MOTOBOY";}else{$moto="";}
if ($pronta == "OK" ){$pronta_logo = "<IMG SRC='images/prontap.png'  BORDER=0 >";}else{$pronta_logo="";}

		if ($dataprevent <> $dataprevent_old){$cor45 = "#FF0000";}else{$cor45 = "#000000";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>$codbarra</b></a><br>$descfat</font><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'>$aguard</font></td>
			<td width='18%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color ='$cor45'>$datapreventf<BR>$horaprevent<br><b>$moto</b> </font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br>$mod<BR>$pronta_logo</font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$contrato</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$libentr</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor3'>$fat</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor4'>$caixa</font></b></td>
			
			
		");
	 }

		echo("
				</table>
		");

}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&pedlib=$pedlib";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
