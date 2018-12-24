

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
$titulo = "RECEBIMENTO DE PEDIDO";
$subtitulo = "FINANCEIRO";

$tipopesq="for";

$Actionter = "unlock";


// CONFIGURA��O DE COR

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
		$codempvend_fat = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$allcx = $prod->showcampo18();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp =="N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
			if ($codcxvend <> 0){$codcxselect = $codcxvend;}
		}

		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$dataatual = $prod->gdata();

		// LISTA TODOS OS REGISTROS
		$prod->listProdU("codcx, hist", "fin_cxsaldo", "codcxsaldo = $codcxsaldoselect");
		$codcxselect = $prod->showcampo0();
		$hist_saldo = $prod->showcampo1();
		
    if ($hist_saldo <> 1){
		
		$prod->clear();
        $prod->listProdU("COUNT(*)", "pedidoparcelas", "codped=$codped and tipo = '02.44' and parcpg <> 'OK'");
        $num_finasa = $prod->showcampo0();

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
			$numch = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$numdoc[$codparcped] = $prod->showcampo11();

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

			#if ($tipoparc == "CX" ){

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG

				if ($caixa) {

					if ($errof <> 0){
				
						if (!$uregopera){
							//INSERE NOVA OPERACAO
							$prod->clear();
							$prod->setcampo0("");
							$prod->setcampo1($dataatual);
							$prod->setcampo2($codcxsaldoselect);
							$prod->addProd("fin_cxopera", $uregopera);
						}

						//INSERE NO CAIXA
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($uregopera);
						$prod->setcampo2($codcxsaldoselect);
						$prod->setcampo3($opcaixa);
						$prod->setcampo4($descricao);
						$prod->setcampo5($dataatual);
						if ($caixa =="C"){
							$prod->setcampo6($valorp);
						}
                        if ($caixa =="D"){
							$prod->setcampo7($valorp);
						}
						if ($caixa =="CD"){
                           	$prod->setcampo6($valorp);
                        	$prod->setcampo7($valorp);
						}
						$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


					} //ERRO
				}

				if ($car) {

					if ($errof <> 0) {
				
					if ($pnumdoc == "S" and $numdoc[$codparcped] == ""){
						
						$erro[$i] = 0;
						$msg[$i] = "O NUM. DOCUMENTO da Parcela $i n�o foi preenchido";

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

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvendped");
						$codconta = $prod->showcampo0();
					}
					

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
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

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
					$prod->setcampo13($codcxselect);
					$prod->setcampo16('NO');
					$prod->setcampo18('NO');
					$prod->setcampo20($codcxsaldoselect);

					$prod->addProd("fin_cheques", $uregcheq);

					} //ERRO
			

				}

				if ($errof <> 0 and $erro[$i] <> 0){
				
					$prod->clear();
					$prod->listProd("pedidoparcelas", "codparcped=$codparcped");
					$prod->setcampo10("OK");
					$prod->setcampo11("$numdoc[$codparcped]");

					$prod->upProd("pedidoparcelas", "codparcped=$codparcped");
				}						
				
			} // ESTA PARCELA JA FOI PAGA 


			#} //TIPO PARCELA == FT
		
		$errof = $errof*$erro[$i];

		#echo("e=$errof");

		} //FOR
		
     }else{
      $errof = 0; $msgf = "CAIXA FECHADO - N�O PODE RECEBER LAN�AMENTOS";
     }// CAIXA FECHADO

						
			if ($errof <> 0){

				//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
				$prod->listProdSum("COUNT(*) as pg", "pedidoparcelas", "codped=$codped and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
				$prod->mostraProd( $array613, $array_campo613, 0 );
				$numparcpg = $prod->showcampo0();

				
					// ATUALIZA STATUS DO PEDIDO
					$prod->listProd("pedido", "codped=$codped");
					$pontos_ped = $prod->showcampo66();
					if ($num_finasa > 0){$pontos_ped = 2*$pontos_ped;}
					#$prod->setcampo14($statuspeds);
					#$prod->setcampo24($nf);
					$prod->setcampo27($contratoselect);
					$prod->setcampo67($declaraselect); // DECLARACAO
					$prod->setcampo66($pontos_ped); // PONTOS_PED
					if ($numparcpg == 0 ){
						$prod->setcampo31("OK"); //CAIXA
						$prod->setcampo61("OK"); // INICIO SEPARACAO
						$inicio_sep = 1;
						$prod->setcampo62($dataatual);
						
					}
					$prod->upProd("pedido", "codped=$codped");

					// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
					$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='CAIXA'", $array614, $array_campo614 , "");

					// MODIFICA��O DO PEDIDO
					$prod->listProdU("modped","pedido", "codped=$codped");
					$modped = $prod->showcampo0();

					if (count($array614) == 0){

						// ATUALIZA STATUS DA TABELA
						$prod->setcampo0("");
						$prod->setcampo1($codped);
						$prod->setcampo2($dataatual);
						$prod->setcampo3("CAIXA");
						$prod->setcampo4($login);

						$prod->addProd("pedidostatus", $ureg);

						if ($modped == "OK"){

							// ATUALIZA STATUS DA TABELA
							$prod->setcampo0("");
							$prod->setcampo1($codped);
							$prod->setcampo2($dataatual);
							$prod->setcampo3("CAIXA MOD");
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

				if ($contratoselect == "OK" or $contratoselect == "DC"){

				// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
				$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='CONTRATO'", $array614, $array_campo614 , "");

					if (count($array614) == 0){

						
					
						// ATUALIZA STATUS DA TABELA
						$prod->setcampo0("");
						$prod->setcampo1($codped);
						$prod->setcampo2($dataatual);
						$prod->setcampo3("CONTRATO");
						$prod->setcampo4($login);
							
						$prod->addProd("pedidostatus", $ureg);
					
					
					}
				
				}
                
					if ($declaraselect == "OK" or $declaraselect == "DD"){

						// ATUALIZA STATUS DA TABELA
						$prod->setcampo0("");
						$prod->setcampo1($codped);
						$prod->setcampo2($dataatual);
						$prod->setcampo3("DECLARA");
						$prod->setcampo4($login);

						$prod->addProd("pedidostatus", $ureg);

    			}
               

				$prod->listProdU("IF( ckmlb = 'NO' and (contrato ='OK' or contrato ='DC'), 'S', 'N' ) ", "pedido", "codped=$codped ");
				$comissao_ok = $prod->showcampo0();

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
					$prod->setcampo3("Comiss�o Pedido");
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
					$prod->setcampo3("Comiss�o Pedido");
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
					$prod->setcampo3("Comiss�o Pedido");
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
            		
 
					

					// ATUALIZA STATUS DO PEDIDO
					$prod->listProd("pedido", "codped=$codped");
					$prod->setcampo38("OK"); // COMISSAO PAGA
					$prod->upProd("pedido", "codped=$codped");

				}

				//  LIBERA PEDIDO PARA ENTREGA
				$prod->listProdU("IF( caixa = 'OK' and fat ='OK' and contrato <> 'NO' and reavalfpg = 'NO' , 'S', 'N' ) ", "pedido", "codped=$codped ");
				$pedidoliberado = $prod->showcampo0();

				if ($pedidoliberado == 'S'){

						$prod->listProd("pedido", "codped=$codped");
						$prod->setcampo21("OK");  // LIB. ENTREGA
						$prod->upProd("pedido", "codped=$codped");
				}
				
				//ATUALIZA DATA DE PREVISAO DE ENTREGA
				if ($altera_data == 1){
				
						#if ($pedido_cestoque == 1){$nday = 2;}else{$nday = 5;}
						$prod->upProdU("pedido", "dataprevent = DATE_ADD(NOW(), INTERVAL $interval DAY)", "codped=$codped");
				}
				
					//PRONTA ENTREGA AUTOMATICA
				#$prod->listProdU("IF( caixa = 'OK' AND dataprevent = DATE_FORMAT( dataped, '%Y-%m-%d') AND  dataprevent = DATE_FORMAT( NOW(), '%Y-%m-%d') AND modoentr = 'RETIRA', 1, 0 ) ", "pedido", "codped=$codped ");
				$prod->listProdU("IF( caixa = 'OK' , 1, 0 ) * IF( dataprevent = DATE_FORMAT( dataped, '%Y-%m-%d' ) , 1, 0 ) * if( dataprevent = DATE_FORMAT( NOW( ) , '%Y-%m-%d' ) , 1, 0 ) * if( modoentr = 'RETIRA', 1, 0 ) ", "pedido", "codped=$codped  ");
				$auto_pronta = $prod->showcampo0();
				
				if ($auto_pronta  == 1){
				
						#if ($pedido_cestoque == 1){$nday = 2;}else{$nday = 5;}
						$prod->upProdU("pedido", "prontaentr = 'OK'", "codped=$codped");
				}

			}else{

				for($i = 0; $i < count($array612); $i++ ){

					$msgf .= "<p>$msg[$i]</p>";
				}

				$Actionter = "lock";
				$prod->msggeral("$msgf", "ERRO", "$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pgold=$pgold&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect", 0);

			}
		
		

		
		$Action = "update";
        break;

		 case "insnf":

		 //  VERIFICA SE NF PREENCHIDA
		$prod->listProdU("IF( nf = 'NO', 'S', 'N' ) ", "pedido", "codped=$codped");
		$falta_nf = $prod->showcampo0();

		// MODIFICA��O DO PEDIDO
		$prod->listProdU("modped","pedido", "codped=$codped");
		$modped = $prod->showcampo0();

		#echo("falta_nf= $falta_nf");
		
		if ($falta_nf == "N"){

				// DELETE NOTA FISCAL ANTIGA
				$prod->delProd("pedidonf", "codped=$codped");
		}

	
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

		if ($falta_nf == 'S'){

			
			 $dataatual = $prod->gdata();

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3("FAT");
				$prod->setcampo4($login);

				$prod->addProd("pedidostatus", $ureg);

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3("FAT MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);
				}
					
			

			// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo24("OK");  // NOTA FISCAL
				$prod->setcampo39("OK");  // FAT -> FATURADO
				$prod->upProd("pedido", "codped=$codped");

			//  LIBERA PEDIDO PARA ENTREGA
				$prod->listProdU("IF( caixa = 'OK' and fat ='OK' and contrato <> 'NO' and reavalfpg = 'NO' , 'S', 'N' ) ", "pedido", "codped=$codped ");
				$pedidoliberado = $prod->showcampo0();

				if ($pedidoliberado == 'S'){

						$prod->listProd("pedido", "codped=$codped");
						$prod->setcampo21("OK");  // LIB. ENTREGA
						$prod->upProd("pedido", "codped=$codped");
				}

		}

		$Action="update";
				
		 break;

    case "update":

				
		 break;

	case "inscb":

			// VERIFICA EXISTENCIA DE CODBARRAS 


	$cond_pesq = " and tipo_fab <> 'P' ";

		#echo "cond_pesq=".$cond_pesq;

	$prod->clear();
	 $prod->listProdSum("codpped, codprod, codprodcj, tipocj, qtde", "pedidoprod", "codped=$codped", $array3, $array_campo3 , "ORDER by tipocj, ordem");

	for($i = 0; $i < count($array3); $i++ ){

			$prod->mostraProd( $array3, $array_campo3, $i );

			$codpped = $prod->showcampo0();
			$codprod = $prod->showcampo1();
			$codprodcj = $prod->showcampo2();
			$tipocj = $prod->showcampo3();
			$qtdeped = $prod->showcampo4();
			
			
			#echo "<b>qtdeped = $qtdeped - i=$i - cpp = $codpped</b><br>";
		
			

		for($j = 0; $j < $qtdeped; $j++ ){

		$codbarra_prod = $codbarra[$codpped][$j]; // CODBARRA PRODUTO PEDIDO
						
		//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
		$prod->clear();
        $prod->listProdU("codcb", "codbarra", "codbarra = '$codbarra_prod' and codbarraped <> '1' and codprod=$codprod and codemp=$codempselect $cond_pesq LIMIT 0,1");
		$codcb = $prod->showcampo0(); 
		 
			#echo("$codcb - $codprod - cb=$codbarra_prod - $codempselect - j= $j<br>");
							
			if ($codcb){
				
				$prod->clear();
				$prod->listProdU("COUNT(*)", "codbarra", "codbarra = '$codbarra_prod' and codbarraped = '1' and codprod=$codprod and codped = $codped and codprodcj = $codprodcj and tipocj=$tipocj and codemp=$codempselect and codpped = $codpped ");
				$cont_cbusados = $prod->showcampo0(); 

				#echo("control = $cont_cbusados - $qtdeped<br>");

			  if ($cont_cbusados < $qtdeped ){
			
				
				#echo "codcb = $codcb<BR>";
				
				// ATUALIZA TABELA CODBARRA
				$prod->upProdU("codbarra", "codped = $codped, codprodcj = $codprodcj , tipocj = $tipocj, codpped = $codpped, codbarraped = 1", "codcb='$codcb'");


				// COMO PRODUTOS IGUAIS DE UM MESMO MICRO SAO CONTADOS COMO QUANTIDADE, FOI NECESSARIO CRIAR UM CAMPO COM O CODCB NA TABELA PEDIDOPROD.
				
				$prod->clear();
				$prod->listProdU("codcb" , "pedidoprod", "codpped='$codpped'");
				$codcbold = $prod->showcampo0();
				
				   if ($codcbold == ""){
					$codcbnew = $codcb;
				   }else{
					$codcbnew = $codcbold . ":" . $codcb;
				   }
				#echo "old=$codcbold -  new=$codcbnew<BR>";
				 
				// ATUALIZA TABELA PEDIDOPROD
				$prod->upProdU("pedidoprod", "codcb = '$codcbnew' ", "codpped='$codpped'");

										
				// ATUALIZA ESTOQUE
				$prod->upProdU("estoque", "qtde = qtde - 1, reserva = reserva - 1", "codemp=$codempselect and codprod=$codprod");

			  }
			
			}

		} // FOR 2
	}// FOR 1
	
	
		$Action="update";

		//VERIFICA A QTDE DE PRODUTOS
		$prod->listProdSum("SUM(qtde) as qtde", "pedidoprod", "codped = $codped", $array613, $array_campo613, "" );
		$prod->mostraProd( $array613, $array_campo613, 0 );
		$qtde_prodped = $prod->showcampo0();

		#echo("qt=$qtde_prodped");
		
		//VERIFICA SE TODOS OS CODBARRAS FORAM INSERIDOS
		$prod->listProdSum("COUNT(*) as cbok", "codbarra", "codbarraped = '1' and codped = $codped", $array613, $array_campo613, "" );
		$prod->mostraProd( $array613, $array_campo613, 0 );
		$numcbok = $prod->showcampo0();

		// MODIFICA��O DO PEDIDO
		$prod->listProdU("modped","pedido", "codped=$codped");
		$modped = $prod->showcampo0();

		#echo("ncb=$numcbok");
		
		// FINALIZA��O - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
		if ($numcbok == $qtde_prodped){
		
				$prod->listProd("pedido", "codped='$codped'");
				$prod->setcampo22("OK");  // CODBARRA OK
				$prod->upProd("pedido", "codped='$codped'");

					// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3("LIB");
				$prod->setcampo4($login);
					
				$prod->addProd("pedidostatus", $ureg);

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3("LIB MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);
				}


			// CRIA OC PARA PEDIDO TRANSFERENCIA
			$prod->listProdU("ped_transf, codemp_transf, codvend, vpp, vt","pedido", "codped=$codped");
			$ped_transf = $prod->showcampo0();
			$codemp_t = $prod->showcampo1();
			$codvend_t = $prod->showcampo2();
			$vpp_t = $prod->showcampo3();
			$vt_t = $prod->showcampo4();

			$dataatual = $prod->gdata();
			$anopar = substr($dataatual,0,4);
			$mespar = substr($dataatual,4,2);
			$diapar = substr($dataatual,6,2);

			if ($ped_transf == "OK"){
				
				// CRIACAO DA OC
				$prod->listProd("moeda", "padrao = 'S'");
				$codmoeda = $prod->showcampo0();
				
				$prod->setcampo0("");
				$prod->setcampo1($codemp_t);
				$prod->setcampo2(113);  // SISTEMA ANTIGO (MUDAR)
				$prod->setcampo3($codmoeda);
				$prod->setcampo4($codvend_t);
				$prod->setcampo5("");  // CONTATO
				$prod->setcampo6(""); // NUMNF
				$prod->setcampo7($dataatual);  //DATA COMPRA
				$prod->setcampo10("OC DE TRANFER�NCIA");
			
				$prod->setcampo11($anopar.$mespar.$diapar);
				$prod->setcampo12($vpp_t); // VALOR TOTAL OC
				$prod->setcampo14($codped);
				$prod->addProd("oc", $ureg_oc);

				// ADICAO DE PRODUTOS
				 $prod->listProdgeral("pedidoprod", "codped=$codped", $array333, $array_campo333 , "");

				 for($i = 0; $i < count($array333); $i++ ){
				
					$prod->mostraProd( $array333, $array_campo333, $i );
					$codprod_ped = $prod->showcampo2();
					$qtde_ped = $prod->showcampo3();
					$puu_ped = $prod->showcampo4();
					$puu_ped = $puu_ped * ($vpp_t/$vt_t);

					$garantia = 12;

					$prod->setcampo0("");
					$prod->setcampo1($ureg_oc);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3($qtde_ped);  //QTDE COMP
					$prod->setcampo4($qtde_ped);  //QTDE REC
					$prod->setcampo5($puu_ped);
					$prod->setcampo6($garantia);
					$prod->setcampo7($codemp_t);
					$prod->setcampo8("");
					$prod->setcampo9($anopar.$mespar.$diapar);

							// CALCULO DA DATA DE PREV DE CHEGADA
							$dpm = $mespar;
							$dpa = $anopar;
							$dpm = $dpm + $garantia;
							$dpmresto=0;
							$dpmresto = $dpm%12;
							if ($dpmresto==0){
								$dpmresto=$nfm[$i];
								$difdpa = (floor($dpm/12))-1;
							}else{
								$difdpa = floor($dpm/12);
							}
							$dpa = $dpa + $difdpa;
							if (strlen($dpmresto)==1){$dpmresto = '0'.$dpmresto;}


					$prod->setcampo10($dpa.$dpmresto.$diapar);
					$prod->setcampo11("");  // CBOK
					$prod->addProd("ocprod", $ureg);

				 }//FOR
					
			}

		}

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":
		
		$Actionsec="list";
	    break;


	case "entregue":

	
		if ($statuspeds <> "ESCOLHA"){

			$dataatual = $prod->gdata();

			// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");

			// MODIFICA��O DO PEDIDO
			$prod->listProdU("modped","pedido", "codped=$codped");
			$modped = $prod->showcampo0();

			if (count($array614) == 0){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($statuspeds);
				$prod->setcampo4($login);

				$prod->addProd("pedidostatus", $ureg);

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);

					$prod->listProd("pedido", "codped=$codped");
					$status_ped = $prod->showcampo14();
					if ($status_ped == "ENTR"){
						$prod->setcampo15(1);  // HISTORICO
					}
					$prod->setcampo44("NO"); // MODIFICA��O - PEDIDO
					$prod->upProd("pedido", "codped=$codped");

				}
								

				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo14($statuspeds);
				$prod->setcampo32($dataatual);
				if ($statuspeds == "ENTR"){
					$prod->setcampo13($dataatual);
					$prod->setcampo30("OK");
					$prod->setcampo15(1);
				}


				$prod->upProd("pedido", "codped=$codped");

			}else{
				
				
				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);

					$prod->listProd("pedido", "codped=$codped");
					$status_ped = $prod->showcampo14();
					if ($status_ped == "ENTR"){
						$prod->setcampo15(1);  // HISTORICO
					}
					$prod->setcampo44("NO"); // MODIFICA��O - PEDIDO
					$prod->upProd("pedido", "codped=$codped");
				}


			}
		}

		
			$Actionsec = "list";
        break;
        
        

	case "reajuste":


			// INSERE PARCELAS NO BANCO DE DADOS
			 $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array612, $array_campo612 , "order by datavenc");
			 $pendfpg=1;
			 for($i = 0; $i < count($array612); $i++ ){

				$prod->mostraProd( $array612, $array_campo612, $i );
				$codparcped = $prod->showcampo0();
				$xtipoopcaixa = $prod->showcampo4();

				$prod->mostraProd( $array612, $array_campo612, $i );
				$prod->setcampo5($numch[$i]);
				$prod->setcampo6($banco[$i]);
				$prod->setcampo7($agencia[$i]);
				$prod->setcampo8($conta[$i]);
                $prod->setcampo11("$numdoc[$codparcped]");

				if(($xtipoopcaixa =='02.01') and (($numch[$i] == "") or ($banco[$i] == "") or ($agencia[$i] == "") or ($conta[$i] == ""))){

					$prod->setcampo9("OK");
				}else{
					$prod->setcampo9("NO");
				}
				
				$prod->setcampo12($loja_fin[$i]);

				$prod->upProd("pedidoparcelas", "codparcped=$codparcped");

			 }

				// ATUALIZA BANCO DE DADOS DE PEDIDOS
				
				$prod->listProdU("codemp", "pedido", "codped=$codped");
				$codemp = $prod->showcampo0();
				
				if ($codemp_fat == 0){$codemp_fat = $codemp;}
				if ($codemp_fat != $codemp){$datasol_fat = "NOW()";}else{$datasol_fat = 0;}
				
				$prod->upProdU("pedido","confirm_fpg = 'OK', codemp_pis ='$codemp' , datasol_nf = $datasol_fat", "codped='$codped'");
				#$prod->upProdU("pedido","confirm_fpg = 'OK', codemp_pis ='$codemp_fat' , datasol_nf = $datasol_fat", "codped='$codped'"); // ANTIGO



	#echo("cfpg=$confere_fpg");

	$Action = "update";

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
			$condicao4 = " (pedido.status = 'LIB' or pedido.status = 'DESP' or pedido.status = 'ENTR') and pedido.reavalfpg <>'OK' and ";
		}else{
			$condicao4 = " ((pedido.status <> 'AVAL' and pedido.reavalfpg <>'OK') and pedido.cancel <> 'OK' ) and ";
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
		
		//PESQUISA POR CPF ou CNPJ
		if ($tipocliente == 'F')
	    {
	        if ($cpf <> "")
	        {
	            $condicao3 .= " cpf='$cpf' and ";
	        }
		}
	    if ($tipocliente == 'J')
	    {
	        if ($cnpj <> "")
	        {
	            $condicao3 .= " cnpj='$cnpj' and ";
	        }
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
		$prod->listProdSum("codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome, pendfpg, reavalfpg, ckmlb, fat, modped, cpf, cnpj, clientenovo.tipocliente, prontaentr, modelo_ped", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, $parm );

		
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

/// INCLUS�O DO TOPO ////

if ($Actionter == "unlock"){

$title = "RECEBIMENTO DE PEDIDO";

include("sif-topolimpo.php");


		$prod->clear(); 		
		$prod->listProdU("codemp", "pedido", "codped='$codped'");
		$codemp_op = $prod->showcampo0();	
		
		// VERIFICA SE O PEDIDO FOI � VISTA E EM DINHEIRO , FINANCIAMNETO BANCARIO ou CARTAO VISA
		$prod->listProdSum("opcaixa, loja", "empresa_formapg", "codemp='$codemp_op' and tipo_op = 'FN' ", $array56, $array_campo56, "" );
		
		// VERIFICA SE O PEDIDO FOI � VISTA E EM DINHEIRO , FINANCIAMNETO BANCARIO ou CARTAO VISA
		$prod->listProdSum("opcaixa, loja, codemp ", "empresa_formapg", "codemp='$codemp_op' and tipo_op = 'CT' ", $array57, $array_campo57, "" );
						
	


echo("
<script language='JavaScript'>


//***************************************************************************************
//  Fun��o para verifica��o de campos obrigat�rios e consist�ncia
//  Retorno:  false = erro de consist�ncia
//            true  = ok
//***************************************************************************************

function verificaObrig (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	if (!(consisteVazioTamanho(form, form.nomeprod.name, 100)))
    {
        return false;
    }
   
	
	   

	return true;
      	
}


//***************************************************************************************
//  Fun��o para obten��o de descri��o do campo
//  Retorno: Uma descri��o para o campo que corresponde
//           ao que � mostrado no browser
//***************************************************************************************

function retornaNmCampo (campo)
{
	
    if (campo == 'valor')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo n�o cadastrado';
}

function adjust(element) {

	return element.value.replace ('.', ',');

}

function verificaObrigFPG (form, qtde, cadErro) 
{

 var o;
 var cont;
 var cname;
 var strValor;
 var strTipo;
 var strBanco;
 var strAgencia;
 var strConta;
 var strNum;
 var strXBanco;
 var strXAgencia;
 var strXConta;
 var strXNum;
 var strXNumdoc;
 var oini;

 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+12); o++)
  {
   strTipo = oini;
   strXBanco = oini + 1;
   strXAgencia = oini + 2;
   strXConta = oini + 3;
   strXNum = oini + 4;
   strXNumdoc = oini + 5;
   strBanco = oini + 6;
   strAgencia = oini + 7;
   strConta = oini + 8;
   strNum = oini + 9;
   strLoja = oini + 11;

 		
		if ((form.elements[strTipo].value == '02.01') && (cadErro == 1))
		{
			alert ('O cadastro do cliente est� incompleto, atualize as informa��es para que possa continuar o pedido.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		} 
		
		
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1))
		{
			alert ('Banco e Num Cheque da Parcela ' + cont + ' formato inv�lido');
			eval ('form.elements[strBanco].focus ()');

		return false;
		}

    	if ((form.elements[strTipo].value == '02.01') && ((form.elements[strBanco].value == '') ||  (form.elements[strNum].value == '') ))
		{
			alert ('Banco e Num Cheque da Parcela ' + cont + ' preenchimento obrigat�rio');
			eval ('form.elements[strBanco].focus ()');

		return false;
		}
		");
		for($k = 0; $k < count($array56); $k++ ){
	
				$prod->mostraProd( $array56, $array_campo56, $k);
				$opcaixa_emp = $prod->showcampo0();
				$loja_emp = $prod->showcampo1();
				
		echo("
	
		if ((form.elements[strTipo].value == '$opcaixa_emp') && ((form.elements[strLoja].value == '') ))
		{
			alert ('O CODIGO DA FINANCEIRA  ' + cont + ' preenchimento obrigat�rio');
			eval ('form.elements[strLoja].focus ()');

		return false;
		}
		if ((form.elements[strTipo].value == '$opcaixa_emp') && ((form.elements[strLoja].value != '$loja_emp') ))
		{
			if (form.elements[strLoja].value != '_OK_'){
			alert ('O CODIGO DA FINANCEIRA  ' + cont + ' EST� INCORRETO');
			eval ('form.elements[strLoja].focus ()');

			return false;
			}
		}
		
		
		");
		}//FOR

		for($k = 0; $k < count($array57); $k++ ){
	
				$prod->mostraProd( $array57, $array_campo57, $k);
				$opcaixa_emp = $prod->showcampo0();
				$loja_emp = $prod->showcampo1();
				$codemp_emp = $prod->showcampo2();
				
		echo("
		

		if ((form.elements[strTipo].value == '$opcaixa_emp') && ((form.elements[strLoja].value == '') ))
		{
			alert ('O P.O.S./TERM. DO CART�O ' + cont + ' preenchimento obrigat�rio');
			eval ('form.elements[strLoja].focus ()');

		return false;
		}
		if ((form.elements[strTipo].value == '$opcaixa_emp') && ((form.elements[strLoja].value != '$loja_emp' ) || (form.codemp_fat.value != '$codemp_emp' )))
		{
			if (form.elements[strLoja].value != '_OK_'){
			alert ('O n�mero do P.O.S./TERM. DO CART�O ou a EMPRESA DO CART�O ' + cont + ' EST� INCORRETO');
			
			eval ('form.elements[strLoja].focus ()');

			return false;
			}	
		}
		
		
		");
		}//FOR

		
		echo("
		
		if ((form.codemp_fat.value != '$codemp_op') && (form.elements[strTipo].value == '02.30' || form.elements[strTipo].value == '02.31' || form.elements[strTipo].value == '02.32' || form.elements[strTipo].value == '02.33' || form.elements[strTipo].value == '02.34' || form.elements[strTipo].value == '02.35' || form.elements[strTipo].value == '02.36'))
		{
			alert ('Este PEDIDO s� poder� ser recebido pelo CAIXA da EMPRESA DO PEDIDO.  ');
			

		return false;
		}
		

		if (form.elements[strXBanco].value != '')
		{
			if (form.elements[strBanco].value != form.elements[strXBanco].value)
			{
				alert ('O BANCO da Parcela ' + cont + ' n�o confere ');
				eval ('form.elements[strBanco].focus ()');

			return false;
			}
		}

		if (form.elements[strXNum].value != '')
		{
			if (form.elements[strNum].value != form.elements[strXNum].value)
			{
				alert ('O NUM.CHEQUE da Parcela ' + cont + ' n�o confere ');
				eval ('form.elements[strNum].focus ()');

			return false;
			}
		}
	
  }
	  oini = oini + 12; 
 }

	
	return true;
}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strPValor;
	var strPBanco;
	var strPAgencia;
	var strPConta;
	var strPNum;
	var valor;

	cpos = (posicao*12) + 12;
	
    strPBanco = cpos - 6;
    strPAgencia = cpos - 5;
    strPConta = cpos - 4;
    strPNum = cpos - 3;
	strPValor = cpos - 2;
	
	valor = form.elements[strPValor].value;

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do C�digo de Barra do cheque est� incorreto.');
				eval ('form.elements[strPValor].focus ()');
				
	}else{
	
	form.elements[strPBanco].value = valor.substring (1,4);
	form.elements[strPAgencia].value = valor.substring (4,8);
	form.elements[strPConta].value = valor.substring (23,32);
	form.elements[strPNum].value = valor.substring (13,19);

	form.elements[strPValor].disabled=true;
	
	}

	}
 
}

function verificaObrigRec(form)
{

		var d2 = form.d2.value;
		var dprevisao = form.dprevisao.value;

		if (form.contratoselect.value == 'ESCOLHA')
		{
			alert ('Recebimento de contrato: escolha obrigat�ria');
			eval ('form.contratoselect.focus ()');

		return false;
		}
		if (form.declaraselect.value == 'ESCOLHA')
		{
			alert ('Recebimento da DECLARA��O: escolha obrigat�ria');
			eval ('form.declaraselect.focus ()');

		return false;
		}

		if ((form.conf_fpg.value == '') || (form.conf_fpg.value == 'NO'))
		{
			alert ('Confirma��o da Forma de Pagamento: opera��o obrigat�ria');

		return false;
		}
		
		if (form.altera_data.value == 1)
		{
		alert ('AVISAR PARA O CLIENTE QUE A DATA DE ENTREGA DO PEDIDO VAI SER ALTERADA DE '+ dprevisao + ' PARA AT� '+ d2 + '');
		}

	return true;

}


function mascara_cpf(form, campo, cpf)
{
	var mycpf = '';
    mycpf = mycpf + cpf;
    if (mycpf.length == 3) {
        mycpf = mycpf + '.';
        document.getElementById(campo).value = mycpf;
    }
    if (mycpf.length == 7) {
        mycpf = mycpf + '.';
        document.getElementById(campo).value = mycpf;
    }
    if (mycpf.length == 11) {
        mycpf = mycpf + '-';
        document.getElementById(campo).value = mycpf;
    }
    if (mycpf.length == 14) {
    }
}


function mascara_cnpj(form, campo, cnpj)
{
	var mycpf = '';
    mycpf = mycpf + cnpj;
    if (mycpf.length == 2) {
        mycpf = mycpf + '.';
        document.getElementById(campo).value = mycpf;
    }
    if (mycpf.length == 6) {
        mycpf = mycpf + '.';
        document.getElementById(campo).value = mycpf;
    }
    if (mycpf.length == 10) {
        mycpf = mycpf + '/';
        document.getElementById(campo).value = mycpf;
    }
	  if (mycpf.length == 15) {
        mycpf = mycpf + '-';
        document.getElementById(campo).value = mycpf;
    }
    if (mycpf.length == 18) {
    }
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
			
			
			if (days < -1 ){alert('A DATA do DOCUMENTO '+j+' n�o pode ser inferior a DATA ATUAL');return false; }
			
			if (document.getElementById(_objnumnf).value == '' ){alert('O NUMERO do DOCUMENTO '+u+' deve ser preenchido corretamente.');return false; }
			if (ValidaCampoNumerico(document.getElementById(_objnumnf).value) != true ){alert('O NUMERO do DOCUMENTO '+u+' deve ser preenchido somente com NUMEROS.');return false; }
			
			if (document.getElementById(_objvalornf).value == ''){alert('O VALOR do DOCUMENTO '+u+' deve ser preenchido corretamente.');return false; }
			
			
			
			
			}	
						
		}
			
		document.Form33.submit();
		

    return true;
}



</script>

<script language=");echo('"Javascript1.2"><!-- // load htmlarea
_editor_url = "textarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);');echo("
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src=");echo('"');echo("' +_editor_url+ 'editor.js");echo('"');echo("');
  document.write(' language=");echo('"Javascript1.2"');echo("></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>


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
		$reavalfpg = $prod->showcampo36();
		$serasaold = $prod->showcampo37();
		$xckmlb = $prod->showcampo38();
		$fat = $prod->showcampo39();
		$cb_ok = $prod->showcampo22();
		$conf_fpg = $prod->showcampo51();
		$aguard_comp = $prod->showcampo52();
		$declara = $prod->showcampo67();
		$onsite = $prod->showcampo83();
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


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();
		
	// PESQUISA SE O PEDIDO POSSUI ESTOQUE ATUALMENTE 0 - NAO POSSUE  1 - POSSUI
    $prod->clear();
    $prod->listProdU("if( COUNT( * ) = SUM( if( (estoque.qtde - reserva) >= pedidoprod.qtde, 1, 0 ) ) , 1, 0 ) AS restricao","pedidoprod LEFT JOIN estoque ON pedidoprod.codprod = estoque.codprod", "codped='$codped' and codemp = '$codemp' GROUP by codped");
    $pedido_cestoque = $prod->showcampo0();
	
	if ($pedido_cestoque == 1 and $aguard_comp != 'OK'){$interval = 2;}else{$interval = 5;}
		
	// PESQUISA PARA ALTERACAO DA DATA DE PREVISAO DE ENTREGA
    $prod->clear();
    $prod->listProdU("if( DATE_FORMAT( NOW( ) , '%Y-%m-%d' ) > dataped AND inicio_sep != 'OK', if( dataprevent < DATE_ADD( NOW( ) , INTERVAL  ".$interval." DAY ) , 1, 0 ) , 0 ) AS block, DATE_FORMAT( DATE_ADD( NOW( ) , INTERVAL ".$interval." DAY ) , '%d-%m-%Y' ) AS nova_data ","pedido", "codped='$codped'");
    $altera_data = $prod->showcampo0();
	$nova_data = $prod->showcampo1();
		
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj'><img border='0' src='images/bt-continuaped.gif' ><br>
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
          EMISS�O PEDIDO:<br>
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
      $xcnpj</font></font>
        <BR><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>IE:<br>
      </font></b><font color='#000000'>$xie</font></font>
      </td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDERE�O:<br>
        </font>
        </b><font color='#000000'>$xendereco - $xnumero - $xcomplemento - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
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
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFER�NCIA
        BANC�RIA </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>BANCO:<br>
        </font></b><font color='#000000'>$xrb_banco</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>AG�NCIA:<br>
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
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b><font color='#336699'>CLIENTE
        DESDE:<br>
        </font></b><font color='#000000'>$xrb_clientedesde</font></font></td>
    </tr>
  </table>
  </center>
</div>



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

<form method='POST' action='$PHP_SELF?Action=inscb&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'  name='Form45'>



  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>
<BR>
<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
<tr bgcolor='#FFFFFF'>
		<td width='5%' height='0' align='right' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>VALORES DA NOTA FISCAL</b><td>
		</tr>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>&nbsp;</b></font></td>
	<td width='70%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>DESCRI��O DETALHADA</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>UNIT.(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>TOTAL(R$)</b></font></td>
   
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj, ordem");

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
			$descplano = $prod->showcampo14();
			if ($vt <> 0){$fator_ped = $vpp/$vt;$descplano = 0;}else{$fator_ped = 0;}
  			$puu_fat = ($puu * ($fator_ped))+$descplano;
			$puu = $puu * ($fator_ped);
			
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			
			$prod->listProdU("nomeprod, unidade, chkcb", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$chkcb = $prod->showcampo2();
			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();


			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
			
			
		
			$k=$i+1;
			$u=$i+1;

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

	  if ($chkcb == "N" or $chkcb == ""){$corcampo="#CBF5CD";}else{$corcampo="#F2E4C4";}
	
echo(" 
	
  <tr bgcolor='$corcampo'> 
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
<td width='40%' height='0'  align='center'>
	");

	for($o = 0; $o < $qtde; $o++ ){

  		if ($codcb_array[$o] == ""){
		
		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b><input type='text' name='codbarra[$codpped][$o]' ></b></font><bR>
		");
		}else{

		$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$o]");
		$codbarra_ok = $prod->showcampo0();

		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$codbarra_ok</b></font><br>

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
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>PRODUTOS UNIT�RIOS</b><td>
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
			$descplano = $prod->showcampo14();
			if ($vt <> 0){$fator_ped = $vpp/$vt;$descplano = 0;}else{$fator_ped = 0;}
  			$puu_fat = ($puu * ($fator_ped))+$descplano;
			$puu = $puu * ($fator_ped);

            $tipoprod = $prod->showcampo8();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			$tipocj = 0;

			
			$prod->listProdU("nomeprod, unidade, chkcb", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$chkcb = $prod->showcampo2();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
					
			$k=$i+1;
			$u=$u+1;


			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.');
			$put_fat = $puu_fat*$qtde;
			$puu_fatf = number_format($puu_fat,2,',','.');
			$put_fatf = number_format($put_fat,2,',','.');

	  if ($chkcb == "N" or $chkcb == ""){$corcampo="#CBF5CD";}else{$corcampo="#F2E4C4";}
			
echo(" 
	
  <tr bgcolor='$corcampo'> 
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
<td width='40%' height='0'  align='center'>
	");

	for($o = 0; $o < $qtde; $o++ ){

  		if ($codcb_array[$o] == ""){
		
		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b><input type='text' name='codbarra[$codpped][$o]' ></b></font><bR>
		");
		}else{

		$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$o]");
		$codbarra_ok = $prod->showcampo0();

		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$codbarra_ok</b></font><br>

		");
		}
	}
	echo("
	  </td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>$codprodped</b> - $nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><!--$puuf-->$puu_fatf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><!--$puuf-->$puu_fatf</font></td>
   
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

	$ptotalf = number_format($ptotal,2,',','.'); 

  
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
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotalf</b></font></td>
  
  </tr>
		

		</table>
	<br>	
 ");

$prod->listProdSum("codcb","pedidoprod, produtos", "codped=$codped and pedidoprod.codprod=produtos.codprod and chk_ppb = 'S'", $array37, $array_campo37 , "");

if ( count($array37) > 0 ){
	

	echo("
		
	<center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
	

 	<tr>
      <td width='100%'  colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b><BR></b></font></td>
    </tr>
       <tr>
      <td width='100%' bgcolor='#FF0000' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b></b></font></td>
    </tr>
     <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2' align = 'center'><font size='6' face='Verdana' color='#FF0000' ><b>ATEN��O</b></font></td>
    </tr>
   
    <tr>
      <td width='100%' bgcolor='#FDDCDB' ><b><center><font face='Verdana, Arial, Helvetica, sans-serif' size='3' color='#000000'>OBSERVA��ES PARA CONSTAR NO DOCUMENTO FISCAL:<br></font><BR><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>NOTA FISCAL DE ORIGEM DE F�BRICA<br></b></font><hr>
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

	#echo "</pre>";
	
	
	
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

<BR>
<BR>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Inserir Codbarra' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>
	<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codped' value='$codped'>
			<input type='hidden' name='codcliente' value='$codcliente'>
			<input type='hidden' name='codvendped' value='$codvend'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			


		</form>
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
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - CONDI��ES DE PAGAMENTO</font></b></td>
  </tr>
</table>
");

	  $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");

		$nump = count($array61);
		$cadErro = 0;

echo("

<form method='POST' action='$PHP_SELF?Action=reajuste&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&nomevendpesq=$nomevendpesq&pedlib=$pedlib'  name='Form' onSubmit = 'if (verificaObrigFPG(Form, $nump, $cadErro)==false) return false'>


 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>AG</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>C.C.</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.CH</b></font></td>
		<td width='5%'><font size='1' face='Verdana' color='#ffffff'><b>PG</b></font></td>
      </tr>
");


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
	<input type='hidden' name='tipo[$ji]' value='$tipo'>
	<input type='hidden' name='xbanco[$ji]' value='$banco'>
	<input type='hidden' name='xagencia[$ji]' value='$agencia'>
	<input type='hidden' name='xconta[$ji]' value='$conta'>
	<input type='hidden' name='xnumch[$ji]' value='$numchec'>
	<tr bgcolor='$bgcorlinha'>
		<td width='20%' rowspan='3'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%' ><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%' ><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
        <td width='10%'><font size='1' face='Verdana' >$numchec</font></td>
		<td width='5%' rowspan='3' ><font size='1' face='Verdana' color ='$cor1'><b>$parcpg</B></font></td>
      </tr>
");
if ($tipo <> "02.01" or $parcpg == "OK"){

if ($pnumdoc == "S"){

	if ($numdoc == ""){
echo("

	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>NUM. DOCUMENTO</b></font></td>
	      <td width='40%' colspan='4'><input type='text' name='numdoc[$codparcped]' size='30'></td>
    </tr>
		<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'>&nbsp;</font></td>
	      <td width='40%' colspan='4'>&nbsp;</td>
    </tr>
		<input type='hidden' name='banco[$ji]' size='3' maxlength='3'>
		<input type='hidden' name='agencia[$ji]' size='4' maxlength='4'>
		<input type='hidden' name='conta[$ji]' size='6' maxlength='10'>
		<input type='hidden' name='numch[$ji]' size='6' maxlength='6'>
		<input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'>
		<input type='hidden' name='loja_fin[$ji]' size='15' >
");
	$errofat = $errofat*0;
	}else{
echo("

	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>NUM. DOCUMENTO</b></font></td>
	      <td width='40%' colspan='4' align ='center'><b>$numdoc</b></td>
    </tr>
		<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'>&nbsp;</font></td>
	      <td width='40%' colspan='4'>&nbsp;</td>
    </tr>
		<input type='hidden' name='numdoc[$codparcped]' size='30'>
		<input type='hidden' name='banco[$ji]' size='3' maxlength='3'>
		<input type='hidden' name='agencia[$ji]' size='4' maxlength='4'>
		<input type='hidden' name='conta[$ji]' size='6' maxlength='10'>
		<input type='hidden' name='numch[$ji]' size='6' maxlength='6'>
		<input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'>
		<input type='hidden' name='loja_fin[$ji]' size='15' >
");
	$errofat = $errofat*1;
	}

}else{
	
	if (($tipo == "02.53" or $tipo == "02.54" or $tipo == "02.46" or $tipo == "02.47" or $tipo == "02.44" or $tipo == "02.48" or $tipo == "02.52" or $tipo == '02.30' or $tipo == '02.31' or $tipo == '02.32' or $tipo == '02.33' or $tipo == '02.34' or $tipo == '02.35' or $tipo == '02.36') and $parcpg == 'NO' ){
	
if ($tipo == '02.30' or $tipo == '02.31' or $tipo == '02.32' or $tipo == '02.33' or $tipo == '02.34' or $tipo == '02.35' or $tipo == '02.36' ){$descr_tipo = "P.O.S./TERM.";$src_help = 'images/cartao_help.jpg';}else{$descr_tipo = "COD FINANCEIRA";$src_help = 'financeira.php';}
	
	#echo "a=$tipo - $parcpg";
	
	echo("
	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>&nbsp;</b></font></td>
	      <td width='40%' colspan='4'>&nbsp;</td>
    </tr>
		
		<input type='hidden' name='numdoc[$codparcped]' size='30'>
		<input type='hidden' name='banco[$ji]' size='3' maxlength='3' value = '$banco'>
		<input type='hidden' name='agencia[$ji]' size='4' maxlength='4' value = '$agencia'>
		<input type='hidden' name='conta[$ji]' size='6' maxlength='10' value = '$conta'>
		<input type='hidden' name='numch[$ji]' size='6' maxlength='6' value = '$numchec'>
		<input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'>
		<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>$descr_tipo</b></font></td>
	      <td width='40%' colspan='4'><input type='text' name='loja_fin[$ji]' size='15' ><a href='javascript:void(0)' onclick=\"NewWindow('$src_help','name1','650','400','yes');return 
false\"> <img border='0' src='images/help.gif' ></a></td>
    </tr>
");
}else{
	
	echo("
	<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>&nbsp;</b></font></td>
	      <td width='40%' colspan='4'>&nbsp;</td>
    </tr>
		<tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'>&nbsp;</font></td>
	      <td width='40%' colspan='4'>&nbsp;</td>
    </tr>
		<input type='hidden' name='numdoc[$codparcped]' size='30'>
		<input type='hidden' name='banco[$ji]' size='3' maxlength='3' value = '$banco'>
		<input type='hidden' name='agencia[$ji]' size='4' maxlength='4' value = '$agencia'>
		<input type='hidden' name='conta[$ji]' size='6' maxlength='10' value = '$conta'>
		<input type='hidden' name='numch[$ji]' size='6' maxlength='6' value = '$numchec'>
		<input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'>
		<input type='hidden' name='loja_fin[$ji]' size='15' value = '_OK_'>
");
	
}
}


}else{
	echo("
		<input type='hidden' name='numdoc[$ji]' size='30'>
		 <tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF0000'><b>CONFER�NCIA</b></font></td>
	     <td width='10%' ><input type='text' name='banco[$ji]' size='3' maxlength='3'></td>
        <td width='10%' ><input type='text' name='agencia[$ji]' size='4' maxlength='4'></td>
        <td width='10%' ><input type='text' name='conta[$ji]' size='6' maxlength='10'></td>
	    <td width='10%' ><input type='text' name='numch[$ji]' size='6' maxlength='6'></td>
		
    </tr>
		 <tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>CODBARRA CHEQUE:</b></font></td>
	      <td width='40%' colspan='4'><input type='text' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'><input type='hidden' name='loja_fin[$ji]' size='15' ></td>
    </tr>
");
}
	}

if ($conf_fpg == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}

$prod->listProdU("SUM( if( tipo = '02.30' and parcpg = 'NO', 1, 0 ) ) + SUM( if( tipo = '02.31' and parcpg = 'NO', 1, 0 ) ) + SUM( if( tipo = '02.32' and parcpg = 'NO', 1, 0 ) )+ SUM( if( tipo = '02.33' and parcpg = 'NO', 1, 0 ) ) + SUM( if( tipo = '02.34' and parcpg = 'NO', 1, 0 ) ) + SUM( if( tipo = '02.35' and parcpg = 'NO', 1, 0 ) ) + SUM( if( tipo = '02.36' and parcpg = 'NO', 1, 0 ) ) ", "pedidoparcelas", " codped=$codped GROUP by tipo");
		$existe_cartao = $prod->showcampo0();


echo("
    </table>

		<br>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr><td width='33%'>
        <p align='center'><font size='1' face='Verdana' color='#FF9933'><b>:: CONFER�NCIA FORMA
        PG: <font color='$cor1'>$conf_fpg</font></b></font></td>
         <td width='33%' align='center'>
		 ");
		 
		 #echo"PIS - $existe_cartao - ".$codemp_pis;
		 if ($existe_cartao > 0 ){
		 
		 // EMPRESA FAT == EMPRESA DO CAIXA
		 echo("<input type='hidden' name='codemp_fat' value='$codempvend_fat'>");
		   echo ("
		");
		 /*
		 echo ("
		 <b> Empresa do pagamento do CART�O</b><select size='1' class=drpdwn name='codemp_fat'>
                                                
	");

	$prod->listProdgeral("empresa", "hist_emp <> 'S' and codemp <> 14", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$codemp'>$nomeemp</option>
		");
	
}
	echo("	
		<option value='-1' selected>Escolha a Empresa</option>
	  </select>
	  
	  ");
	  */
	  }else{
	  echo("<input type='hidden' name='codemp_fat' value='$codempvend_fat'>");
	  }
	  echo ("
	  </td>
        <td width='34%' align='center'><input class='sbttn' type='submit' value='Conferir Forma Pagamento' name='B1'></td>
      </tr>
    </table>


				<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codped' value='$codped'>
			<input type='hidden' name='codcliente' value='$codcliente'>
			<input type='hidden' name='codvendped' value='$codvend'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			 <input type='hidden' name='retira' value ='$modoentr'>




		</form>

			");

// VERIFICA SE O PEDIDO FOI � VISTA E EM DINHEIRO , FINANCIAMNETO BANCARIO ou CARTAO VISA
		$prod->listProdSum("IF((tipo like '02.00' or tipo like '02.08' or tipo like '02.4%' or tipo like '02.30' or tipo like '02.31'), 1, 0)", "pedidoparcelas", "codped=$codped ", $array56, $array_campo56, "" );
		$vvista=1;

		for($k = 0; $k < count($array56); $k++ ){

			$prod->mostraProd( $array56, $array_campo56, $k);
			$nr = $prod->showcampo0();
			#echo("nr=$nr");
			$vvista=$vvista*$nr;

		}

		if ($vvista == 0 ){$arqcontrato="iniciocontrato.php";$reserva=1;}else{$arqcontrato="iniciocontrato.php";$reserva=0;}
		if ($contrato == "DC"){$arqcontrato="iniciocontrato.php";$reserva=0;}

		$arqcontrato_garantia="iniciocontrato_garantia.php";

		// PARA PAGINA DE SEGURANCA SECUNDARIA
		#$prod->listProdU("COUNT(*)", "pedidoprod", "codped='$codped' AND tipoprod = 'CJ'");
		#$control_leite = $prod->showcampo0();
		$control_leite = 0;

		$arqleite="iniciocontrato_leite.php";

			echo("

			<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
				 <tr>
      <td width='524' colspan='6'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='38'><img border='0' src='images/print.gif' width='36' height='21'></td>
		<td width='136'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name1','650','400','yes');return
false");echo('"');echo(">CONTRATO&nbsp;<br>
        RESERVA DOM�NIO</a></font></b></td>
		<td width='38'><img border='0' src='images/print.gif' width='36' height='21'></td>
     <td width='136'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato_garantia?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name1','650','400','yes');return
false");echo('"');echo(">CONTRATO <br>
        GARANTIA</a></font></b></td>
	<td width='38'><img border='0' src='images/print.gif' width='36' height='21'></td>
		<td width='136'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
");
if ($control_leite > 0){
echo("
		<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqleite?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name1','650','400','yes');return
false");echo('"');echo(">DOA��O DO&nbsp;<br>
        LEITE</a>
");
}
echo("
		</font></b></td>
    </tr>
    <tr>
      <td width='524' colspan='6'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>


");

if ($onsite == 'OK'){
echo("
<table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr><td>
        <p align='center'><font size='3' face='Verdana' color='#FF0000'><b>GARANTIA ONSITE:<BR></b><font color='#000000' size='2'>Este pedido possui contrato de garantia OnSite.</font></font></td>
      </tr>
    </table>
");
}
echo("

<form method='POST' action='$PHP_SELF?Action=insert&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&nomevendpesq=$nomevendpesq&pedlib=$pedlib'  name='Form19' onSubmit = 'if (verificaObrigRec(Form19)==false) return false'>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='25%' bgcolor='#FFCC66'><font face='Verdana' size='1'><b>RECEBIMENTO DE CONTRATO:</b></font></td>
      <td width='25%' bgcolor='#FFCC66'>
  <select size='1' class=drpdwn name='contratoselect'>

	<option value='OK'>OK</option>
    <option value='NO'>NO</option>
		");
	if ($contrato == 'NO'){$contrato_old = 'ESCOLHA';}else{$contrato_old = $contrato;}
echo("
   	<option value='$contrato_old' selected>$contrato_old</option>

  </select>
      </td>
      <td width='25%' bgcolor='#FFCC66'><font face='Verdana' size='1'><b>AGUARDAR<br>
        COMPENSA��O:</b></font></td>
      <td width='25%' bgcolor='#FFCC66'><select size='1' class=drpdwn name='aguard_compselect'>

	<option value='OK'>OK</option>
    <option value='NO'>NO</option>
   	<option value='$aguard_comp' selected>$aguard_comp</option>

  </select>
      </td>
    </tr>
    <tr>
      <td width='25%' bgcolor='#FFCC66'><font face='Verdana' size='1'><b>RECEBIMENTO DE DECLARA&Ccedil;&Atilde;O:</b></font></td>
      <td width='25%' bgcolor='#FFCC66'><select size='1' class=drpdwn name='declaraselect'>
        <option value='OK'>OK</option>
        <option value='NO'>NO</option>
        <option value='$declara_old'>$declara_old</option>
        ");
	if ($declara == 'NO'){$declara_old = 'ESCOLHA';}else{$declara_old = $declara;}
echo("
	<option value='$declara_old' selected>$declara_old</option>
       </select></td>
      <td width='50%' bgcolor='#FFCC66' colspan='2'><b><font size='1' face='Verdana'><font color='#008000'>OK</font>
        - </font></b><font size='1' face='Verdana'>AGUARDAR COMPENSA��O<b><br>
        <font color='#FF0000'>NO</font> - </b>N�O AGUARDAR </font></td>
    </tr>
  </table>
  </center>
</div>
		<br>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Receber Pedido' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>
");

#}
	echo("

			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codped' value='$codped'>
			<input type='hidden' name='codcliente' value='$codcliente'>
			<input type='hidden' name='codvendped' value='$codvend'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
			<input type='hidden' name='conf_fpg' value='$conf_fpg'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='palavrachave' value ='$palavrachave'>
	        <input type='hidden' name='nomevendpesq' value ='$nomevendpesq'>
			<input type='hidden' name='altera_data' value ='$altera_data' id = 'altera_data'>
		   	<input type='hidden' name='interval' value ='$interval' id = 'interval'>
	   	   	<input type='hidden' name='d2' value ='$nova_data' id = 'd2'>
		    <input type='hidden' name='dprevisao' value ='$datapreventf' id = 'dprevisao'>
			




		</form>

  </div>
			<div align='center'>
  <center>

	<table border='0' width='550' cellspacing='1' cellpadding='3' >
 	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='70%' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
    </tr>
		<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR � VISTA:</b></font></td>
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
        - MODIFICA��O DO PEDIDO</font></b></td>
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
        
        <td width='80' ><b><font face='Verdana' color='#FFFFFF' size='1'>OPERA��O</font></b></td>
        
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
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        III</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOTA FISCAL</font></b></td>
    </tr>
  </tbody>
</table>
	 <form method='POST' action='$PHP_SELF?Action=insnf&codcxsaldoselect=$codcxsaldoselect'  name='Form33' >
<div align='center'>
  <center>
 
 <table cellSpacing='1' cellPadding='3' width='550' border='0'>

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
	  	      <option value='NF'>NF</option>
	  	      <option value='CF'>CF</option>
	  	      ");
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
	  	      <option value='NF'>NF</option>
	  	      <option value='CF'>CF</option>
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
  </form>
 

   


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


<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
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
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. SOBRE O CR�DITO DO CLIENTE</font></b></td>
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
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. APROVA��O DE CR�DITO</font></b></td>
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
	<tr>
      <td width='100%' colspan='4'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>


<br>
	<form method='POST' action='$PHP_SELF?Action=entregue&codcxsaldoselect=$codcxsaldoselect'  name='Form48' >
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'></td>
        <td width='554'>
 
  


            </td>
        <td width='55' rowspan='2'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ENTREGAR PEDIDO</b></font></td>
        <td width='554'>
		    <select size='1' class=drpdwn name='statuspeds'>
       ");
if ($cb_ok == "OK" and $libentr == "OK"){
echo("
		<option value='ENTR'>ENTR</option>
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





<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>I</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

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
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>



</form>

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
        <p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=list&codempselect=$codemp&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'>VOLTAR</a></font>
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
  <table width='550'>
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
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b></font></p> 
	   <table width='100%' border='0'>
         <tr>
           <td rowspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>COD:<br />
               <input type='text' name='codpedpesq' size='14' maxlength='13' />
               <br />
               CLIENTE:<br /> 
		       <input type='text' name='palavrachave' size='20' />
               <br />
               VENDEDOR: 
		       <br />
		       <input type='text' name='nomevendpesq' size='20' />
		<br />
           </font></td>
           <td><input name='tipocliente' type='radio' value='F' checked='checked' /></td>
           <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>CPF</font><br />
             <input id='cpf' name='cpf' type='text' class='campo3' size='16' maxlength='14' onkeyup=\"mascara_cpf(this.form, 'cpf', this.value)\"></td>
         </tr>
         <tr>
           <td><input name='tipocliente' type='radio' value='J' checked='checked' /></td>
           <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>CNPJ</font><br />
             <input id='cnpj' name='cnpj' type='text' class='campo3' size='21' maxlength='18' onkeyup=\"mascara_cnpj(this.form, 'cnpj', this.value)\"></td>
         </tr>
         <tr>
           <td colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>RECEBIMENTOS CR�TICOS:
               <input type='checkbox' name='pedlib' value='OK' />
           </font>
             <input class='sbttn' type='submit' name='Submit' value='OK' />
             <input type='hidden' name='desloc' value='0' />
             <input type='hidden' name='operador' value='OR' />
             <input type='hidden' name='codpednew' value='$codpednew' />
             <input type='hidden' name='codempselect' value='$codempselect' />
             <input type='hidden' name='retlogin' value='$retlogin' />
             <input type='hidden' name='connectok' value='$connectok' />
             <input type='hidden' name='pg' value='$pg' />
             <input type='hidden' name='hist' value='$hist' /></td>
           </tr>
       </table>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><br>
	   </font></p>
      </form>
	   </td>
		 
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
</div>
	

");

# Pesquisa pela Empresa do OC

	

//<!-- ESCOLHA DE EMPRESAS - INICIO --> 



if ($allemp == "Y"){


echo("
<br>
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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
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
}else{

$codempselect = $codempvend;

}


//<!-- ESCOLHA DE EMPRESAS - FIM --> 

 
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
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
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
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>P�GINA<b> 
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

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PED</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>D/H:M:S</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PD</font></b></div>
    </td>
		<td width='3%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RCR</font></b></div>
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
			$pendfpg = $prod->showcampo13();
			$reavalfpg = $prod->showcampo14();
			$ckmlb = $prod->showcampo15();
			$fat = $prod->showcampo16();
			$modped = $prod->showcampo17();
			$cpf_pesq = $prod->showcampo18();
			$cnpj_pesq = $prod->showcampo19();
			$tipocliente_pesq = $prod->showcampo20();
			$pronta = $prod->showcampo21();
			$modelo_ped = $prod->showcampo22();
			$doc = "";
			if ($tipocliente_pesq == "F"){$doc_pesq = $cpf_pesq;}else{$doc_pesq = $cnpj_pesq;}
	
			// FORMATACAO //
			$datapedf = $prod->fdata($dataped);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataatual,$dataprevent);
			$difhoras = $prod->numdatahoras($dataped,$dataatual);
			
			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();
			
			// VERIFICA CAIXA 
			$prod->listProdU("codcx", "fin_cxsaldo", "codcxsaldo=$codcxsaldoselect");
			$codcx_atual = $prod->showcampo0();
			#echo "CX - $modelo_ped = ".$codcx_atual;

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
			if ($reavalfpg == "OK"){$bgcorlinha="#FCDCBC";}

if ($pendfpg == "OK"){$pendfpglogo = "<IMG SRC='images/est_prev.gif'  BORDER=0 >";}else{$pendfpglogo="";}
if ($reavalfpg== "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}

if ($modped == "OK"){$mod ="MOD";}else{$mod="";}


		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>");
if ($modelo_ped <> "DSTE"){ 
echo("
<a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj'>$codbarra</font></b></a>
");
}else{
	if ($codcx_atual == 127){
	echo("
	<a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj'>$codbarra</font></b></a>
	");
	}else{
	echo("
	$codbarra
	");
	}
}
echo("</td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b><br>$doc_pesq</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapreventf $horaprevent </font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br>$mod</font></td>
	");

$d = substr($difhoras,0,2);
$h = substr($difhoras,3,2);
$m = substr($difhoras,6,2);
if ($m >= 30 and $h >= 0 and $d >= 0){$cor = "#FF0000";}else{$cor="000000";}
if ($m <= 30 and $h ==0 and $d==0){$cor = "#000000";}else{$cor="#FF0000";}

echo("
			<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor'><b>$difhoras</b></font></td>
			<td align='center' width='3%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor'><b>$pendfpglogo</b></font></td>
			<td align='center' width='2%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor4'><b>$reavalfpg</b></font></td>
			
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
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&pedlib=$pedlib&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj";
include("numcontg.php");
}


/// INCLUS�O DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
