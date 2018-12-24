 

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datavenc DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "CONTAS A RECEBER";
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

// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='iniciofin_car_boletalist.php'");
		$pglistbol = $prod->showcampo0();



	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$codcxvend = $prod->showcampo13();
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

		$prod->clear();
		$prod->listProdU("opcaixa, codped","fin_car_temp", "codformagrupo=$codfgruposelect");
		$opcaixa_geral = $prod->showcampo0();
		$codped_geral = $prod->showcampo1();
		$cop = substr($opcaixa_geral,3,2);
		
		// ATUALIZA FORMA PG
		$prod->clear();
		$prod->listProdgeral("fin_car_forma_temp", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );
		
		

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("fin_car_forma_grupo", $uregfgrupo);
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codpgforma = $prod->showcampo0();
			$banco = $prod->showcampo2();
			$agencia = $prod->showcampo3();
			$conta = $prod->showcampo4();
			$numcheq = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			if ($opcaixa <> '03.00' and $opcaixa <> '03.01'){
				$opcaixa = '03.'.$cop;
			}
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			$codch = $prod->showcampo10();
			$datavenc = $prod->showcampo11();

				 $hoje = getdate();
				 $h = $hoje[hours];
				 $m = $hoje[minutes];
				 $s = $hoje[seconds];
				 if (strlen($h)==1){$h = '0'.$h;}
				 if (strlen($m)==1){$m = '0'.$m;}
				 if (strlen($s)==1){$s = '0'.$s;}
			     $datapg = $apg.$mpg.$dpg.$h.$m.$s;
				 if ($datapg == "0000-00-00 00:00:00"){$datapg = $dataatual;}

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

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG

				if ($caixa) {

					
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
						}else{
							$prod->setcampo7($valorp);
						}
						$prod->setcampo8($uregfgrupo);
						$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA

				if ($bco) { 

					
					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend");
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
					$prod->setcampo6($datapg);
					$prod->setcampo7($datapg);
					$prod->setcampo8("N");
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

							

				} // BCO

				

				if ($inschtab == "S") {
					
					
					if (!$codcxselect){
						$prod->listProdU("codcx", "fin_cxsaldo", "codcxsaldo=$codcxsaldoselect");
						$codcxselect = $prod->showcampo0();
					}

											
					//INSERE CHEQUES
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codped);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($banco);
					$prod->setcampo4($agencia);
					$prod->setcampo5($conta);
					$prod->setcampo6($numcheq);
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
					$prod->setcampo22($uregfgrupo);

					$prod->addProd("fin_cheques", $uregcheq);

					
				} // INSERE CHEQUE

										
			//INSERE FORMA PG PARA AS CAR
			$prod->clear();
		
			$prod->setcampo1($uregfgrupo);
			$prod->setcampo2($banco);
			$prod->setcampo3($agencia);
			$prod->setcampo4($conta);
			$prod->setcampo5($numcheq);
			$prod->setcampo6($opcaixa);
			$prod->setcampo7($valorp);
			$prod->setcampo8($descricao);
			$prod->setcampo9($codconta);
			$prod->setcampo10($codch);
			$prod->setcampo11($datavenc);

			$prod->addProd("fin_car_forma", $uregf);

			//DELETA FORMA PG TEMPORARIA
			$prod->delProd("fin_car_forma_temp", "codpgforma=$codpgforma");
			$prod->delProd("fin_car_forma_grupo_temp", "codformagrupo=$codfgruposelect");


		} // FOR

		
		// ATUALIZA PAGAMENTOS
		$prod->clear();
		$prod->listProdgeral("fin_car_temp", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codcar = $prod->showcampo0();
			$opcaixa = $prod->showcampo2();
			$valorp = $prod->showcampo8();
			$codped = $prod->showcampo14();
		

			$porc = ($valorp/$valortpg)*$jurost;
		 	$cont = count($array21);
			#echo("$i- $cont - $porct");
			if ($i == (count($array21)-1)){
				$porc = $jurost - $porct;
			}
			$porct = $porct + $porc;

			#echo("porc=$porc");
					
			// ATUALIZA CAR
			$prod->clear();
			$prod->listProd("fin_car", "codcar=$codcar");
			$prod->setcampo9($porc);
			$prod->setcampo10($valorp);
			$prod->setcampo11($datapg);
			$prod->setcampo12($uregopera);
			$prod->setcampo13("S");
			$prod->setcampo15($ureglanc);
			$prod->setcampo16($opcaixa);
			$prod->setcampo18($codconta);
			$prod->setcampo19($uregfgrupo); 

			$prod->upProd("fin_car", "codcar=$codcar");

				
			//DELETA PAGAMENTO TEMPORARIO
			$prod->delProd("fin_car_temp", "codcar=$codcar");


		} // FOR

			$prod->clear();
			$prod->listProd("formapg", "opcaixa='$opcaixa_geral'");
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
			$bco_vend = $prod->showcampo13();

			if ($bco_vend) { 

					
					$prod->listProdU("codvend", "pedido", "codped=$codped_geral");
					$codvend = $prod->showcampo0();

					$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend");
					$codconta = $prod->showcampo0();
									

					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco_vend == "C"){
							$prod->setcampo4($valortf);
						}else{
							$prod->setcampo5($valortf);
						}
					$prod->setcampo6($datapg);
					$prod->setcampo7($datapg);
					$prod->setcampo8("N");
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

							

			} // BCO_VEND

		
		$Actionsec = "list";
			

	
        break;

		 case "altdata":
			
			// ATUALIZA CAR

				$datavencnew = $avenc.$mvenc.$dvenc;
				$prod->listProd("fin_car", "codcar=$codcar");
				$prod->setcampo6($datavencnew);
				$prod->setcampo1($numdoc_new);
				$prod->upProd("fin_car", "codcar=$codcar");

					$Actionsec = "list";
		
				
		 break;

		

    case "update":

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("fin_car_forma_grupo_temp", $uregfgrupo);

		$codfgruposelect = $uregfgrupo;
	
		// COPIA CODFGRUPO PARA CADA CONTA A SER PAGA
		$prod->clear();
		$prod->listProdgeral("fin_car_temp", "codemp=$codempselect and codcxsaldo = $codcxsaldoselect", $array21, $array_campo21, "" );

					
		for($i = 0; $i < count($array21); $i++ ){
			
			
			$prod->mostraProd( $array21, $array_campo21, $i );

			$codcartemp = $prod->showcampo0();
					
			$prod->setcampo19($uregfgrupo);

			$prod->upProd("fin_car_temp", "codcar=$codcartemp");
		
		}

				
		 break;

	case "insformapg":

			$valorfpg = str_replace('.','',$valorfpg);
			$valorfpg = str_replace(',','.',$valorfpg);
			
			$prod->listProd("formapg", "opcaixa='$opcaixarec'");
			$descricao = $prod->showcampo1();
				
				
			//INSERE FORMA PG PARA AS CAP
			$prod->clear();
		
			$prod->setcampo1($codfgruposelect);
			$prod->setcampo2($banco);
			$prod->setcampo3($agencia);
			$prod->setcampo4($conta);
			$prod->setcampo5($numch);
			$prod->setcampo6($opcaixarec);
			$prod->setcampo7($valorfpg);
			$prod->setcampo8($descricao);
			$prod->setcampo9($bcorec);
			$prod->setcampo10($codch);
			$prod->setcampo11($arec.$mrec.$drec);
			
			$prod->addProd("fin_car_forma_temp", $uregf);

			$banco ="";$conta="";$agencia="";$numcheq="";
			

		$Action="update";
				
		 break;

		 case "insformapgch":

				

		$Action="update";
				
		 break;

  case "detalhes":

				
		 break;

	case "inscontapg":

		
			//INSERE NO CAP
			$prod->clear();
			$regnum = $prod->listProd("fin_car_temp", "codcar=$codcar");
			if ($regnum == 0){  
				$regnum1 = $prod->listProd("fin_car_temp", "opcaixa <> '$opcaixarec' and codcxsaldo = $codcxsaldoselect");
				$regnum_visa = $prod->listProd("fin_car_temp", "(opcaixa = '02.30' or opcaixa = '02.35') and codcxsaldo = $codcxsaldoselect");
				$regnum_master = $prod->listProd("fin_car_temp", "(opcaixa = '02.33' or opcaixa = '02.36') and codcxsaldo = $codcxsaldoselect");
				#echo "REG_VISA=".$regnum_visa."<BR>";
				#echo "REG_MASTER=".$regnum_master."<BR>";
				#echo "OPCAIXA=".$opcaixarec."<BR>";
				#if (($opcaixarec == '02.30' or $opcaixarec == '02.35' ) and $regnum_visa <> 0){$regnum1 = 0;}
				#if (($opcaixarec == '02.33' or $opcaixarec == '02.36' ) and $regnum_master <> 0){$regnum1 = 0;}
				if (($opcaixarec == '02.30' or $opcaixarec == '02.31' or $opcaixarec == '02.32' or $opcaixarec == '02.33' or$opcaixarec == '02.34' or $opcaixarec == '02.35' or $opcaixarec == '02.36')) { $regnum1 = 0; }
				#echo "REG1=".$regnum1."<BR>";
				if ($regnum1 == 0){ 
					$prod->listProdU("codped","fin_car", "codcar=$codcar");
					$codped = $prod->showcampo0();
					$prod->listProdU("codvend","pedido", "codped=$codped");
					$codvend = $prod->showcampo0();
					$prod->listProdU("COUNT(*)","fin_car_temp, pedido ", "fin_car_temp.codped=pedido.codped and pedido.codvend<>$codvend and opcaixa = '02.09' and codcxsaldo = $codcxsaldoselect");
					$regnum2 = $prod->showcampo0();
					#echo "REG2=".$regnum2."<BR>";
					if ($regnum2 == 0){ 
						$prod->listProd("fin_car", "codcar=$codcar");
						$prod->setcampo19($codfgruposelect);
						$prod->setcampo21($codcxsaldoselect);
						$prod->addProd("fin_car_temp", $uregcap);
					}
				}
			}

		$Actionsec="list";
				
		 break;
	
	case "delcontapg":

			//INSERE NO CAP
			$prod->delProd("fin_car_temp", "codcar=$codcar and codcxsaldo = $codcxsaldoselect");
			
		$Actionsec="list";
				
		 break;

	case "delcar":

			//INSERE NO CAP
			#echo "AQUI=".$codcar;
			$prod->delProd("fin_car", "codcar=$codcar");
			
		$Actionsec="list";
				
		 break;

	case "delformapg":

			//INSERE NO CAP
			$prod->delProd("fin_car_forma_temp", "codpgforma=$codpgformaselect ");
			
		$Action="update";
				
		 break;
		 
		 
	case "delformagrupo":
	
	
		$dataatual = $prod->gdata();

		$prod->clear();
		$prod->listProdU("opcaixa, codped","fin_car", "codformagrupo=$codfgruposelect");
		$opcaixa_geral = $prod->showcampo0();
		$codped_geral = $prod->showcampo1();
		$cop = substr($opcaixa_geral,3,2);
		
		// ATUALIZA FORMA PG
		$prod->clear();
		$prod->listProdgeral("fin_car_forma", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );
		
		

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("fin_car_forma_grupo", $uregfgrupo);
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codpgforma = $prod->showcampo0();
			$banco = $prod->showcampo2();
			$agencia = $prod->showcampo3();
			$conta = $prod->showcampo4();
			$numcheq = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			if ($opcaixa <> '03.00' and $opcaixa <> '03.01'){
				$opcaixa = '03.'.$cop;
			}
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			$codch = $prod->showcampo10();
			$datavenc = $prod->showcampo11();

				 $hoje = getdate();
				 $h = $hoje[hours];
				 $m = $hoje[minutes];
				 $s = $hoje[seconds];
				 if (strlen($h)==1){$h = '0'.$h;}
				 if (strlen($m)==1){$m = '0'.$m;}
				 if (strlen($s)==1){$s = '0'.$s;}
			     $datapg = $apg.$mpg.$dpg.$h.$m.$s;
				 if ($datapg == "0000-00-00 00:00:00"){$datapg = $dataatual;}

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

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG

				if ($caixa) {

					
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
						$prod->setcampo4("CANCEL - ".$descricao);
						$prod->setcampo5($dataatual);
						if ($caixa =="D"){
							$prod->setcampo6($valorp);
						}else{
							$prod->setcampo7($valorp);
						}
						$prod->setcampo8($uregfgrupo);
						$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA

				if ($bco) { 

					
					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend");
						$codconta = $prod->showcampo0();
					}
					

					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3("CANCEL - ".$descricao);
					if ($bco =="D"){
							$prod->setcampo4($valorp);
						}else{
							$prod->setcampo5($valorp);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

							

				} // BCO

				

				

					// DELETA TABELA DE CHEQUES						
					$prod->delProd("fin_cheques", "codformagrupo=$codfgruposelect ");
	
					
				


		} // FOR
		
		$prod->clear();
			$prod->listProd("formapg", "opcaixa='$opcaixa_geral'");
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
			$bco_vend = $prod->showcampo13();

			if ($bco_vend) { 

					$prod->clear();
					$prod->listProdU("codvend", "pedido", "codped=$codped_geral");
					$codvend = $prod->showcampo0();
					
					$prod->clear();
					$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend");
					$codconta = $prod->showcampo0();
			
					$prod->clear();
					$prod->listProdU("SUM(valorpago+juros)","fin_car", "codformagrupo=$codfgruposelect");
					$valortf = $prod->showcampo0();
									

					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3("CANCEL - ".$descricao);
					if ($bco_vend == "D"){
							$prod->setcampo4($valortf);
						}else{
							$prod->setcampo5($valortf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

							

			} // BCO_VEND
		
		
	
			//DELETE FORMA GRUPO
			#$prod->delProd("fin_car_forma_grupo", "codformagrupo=$codfgruposelect ");
			//DELETE FORMA
			$prod->delProd("fin_car_forma", "codformagrupo=$codfgruposelect ");
			// ATUALIZA CAP
			$prod->upProdU("fin_car", "juros = 0, valorpago = '0', datapg = 0, codconta = 0, codformagrupo = '$uregfgrupo', hist = 'N'", "codformagrupo=$codfgruposelect");
			
			
		$Actionsec="list";
				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "newreg":

		 if($retorno){

		 $dataatual = $prod->gdata();
		 
		

			// ADAPTACAO DE VALORES
			$valornew = str_replace('.','',$valornew);
			$valornew = str_replace(',','.',$valornew);
			$valorp = $valornew;
			$opcaixa = $opcaixanew;
			#$codped = substr($codpednew,6,6);
			$codped = $codpednew;
			$datavenc = $avenc.$mvenc.$dvenc;

							
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

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG

				if ($caixa) {

					
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
						}else{
							$prod->setcampo7($valorp);
						}
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA


				if ($inschtab == "S") { 

											
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

					
				} // INSERE CHEQUE


			if ($car) {

				
					//INSERE NO CAR
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($numdocnew);
					$prod->setcampo2($opcaixa);
					$prod->setcampo4($codclientenew);
					$prod->setcampo5($descricao);
					$prod->setcampo6($datavenc);
					$prod->setcampo7($nfnew);
					$prod->setcampo13("N");  // HISTORICO
					$prod->setcampo14($codped);  
					$prod->setcampo8($valorp);
					$prod->setcampo17($codempselect);
				
					$prod->addProd("fin_car", $uregcar);
			
					
				}

		
		$Actionsec="list";
		 }
	    break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);

		if ($codempselect <> ""):
			
			$campopesq = "nome";
			$condicao2 = " LCASE(clientenovo.$campopesq) like '%$palavrachave1%' and ";
			if ($pedlib =="OK"){
				$condicao4 = " fin_car.numdoc = '' and (fin_car.opcaixa = '02.04' OR fin_car.opcaixa ='02.60') and ";
			}else{
				$condicao4 = "";
			}

				$condicao3 .= $condicao4;

			if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){
									
				//$condicao3 .= "TO_DAYS(NOW()) - TO_DAYS(datavenc) <= 5 and ";
							
			}else{
				
				$datainicial = $ade."-".$mde."-".$dde." 00:00:00";
				$datafinal = $aate."-".$mate."-".$date." 23:59:59"; 
				$condicao3 .= "(datavenc >= '$datainicial' and datavenc <= '$datafinal') and ";
					
			}
			
			if ($adeped == "" and $mdeped == "" and $ddeped == "" and $aateped == "" and $mateped == "" and $dateped == ""){
									
				//$condicao3 .= "TO_DAYS(NOW()) - TO_DAYS(datavenc) <= 5 and ";
							
			}else{
				
				$datainicialped = $adeped."-".$mdeped."-".$ddeped." 00:00:00";
				$datafinalped = $aateped."-".$mateped."-".$dateped." 23:59:59"; 
				$condicao3 .= "(dataped >= '$datainicialped' and dataped <= '$datafinalped') and ";
					
			}
							
			if ($opcaixaselect){

				$condicao3 .= "(fin_car.opcaixa = '$opcaixaselect' OR fin_car.opcaixa = '$opcaixaselect1') and ";				

			}
			
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
			
			//PESQUISA POR NOME CLIENTE
			if ($palavrachave){
							
				$condicao3 .= $condicao2;
			}		
				
			$condicao3 .= "fin_car.codemp='$codempselect' and ";
			$condicao3 .= "fin_car.codcliente=clientenovo.codcliente and ";
			$condicao3 .= "fin_car.codped=pedido.codped and ";
			if ($hist == "0"){$hist = "N";}
			if ($hist <> "S"){
				$condicao3 .= "fin_car.hist = 'N'";
			}else{
				$condicao3 .= "fin_car.hist = 'S'";
			}
		
			

			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_car, clientenovo, pedido", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, fin_car.opcaixa, fin_car.codcliente, valordevido, fin_car.hist, descricao, fin_car.nf, codcar, fin_car.codped, datapg, valorpago, juros, codos, cnpj, cpf, tipocliente, dataped", "fin_car, clientenovo, pedido", $condicao3, $array, $array_campo, $parm );

			#echo $condicao3;

			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg /$acrescimo);  
			  $pagina = 1;
			endif; 


		endif;
	
		
		$Action="list";
		

}

/// INCLUS�O DO TOPO ////

if ($Actionter == "unlock"){

$title = "CAR - CONTAS A RECEBER";

include("sif-topolimpo.php");

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

			if ((form.numformapg.value == 0) )
		{
			alert ('Formas de Recebimento  : preenchimento obrigat�rio.');
			eval ('form.dpg.focus ()');
			return false;
		}
	
		if ((form.dpg.value == 0) || (form.mpg.value == 0) || (form.apg.value == 0) )
		{
			alert ('Data de Recebimento : preenchimento obrigat�rio.');
			eval ('form.dpg.focus ()');
			return false;
		}

		
	
	

	return true;
      	
}


function verificaObrigCheque (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente


	
		if ((form.drec.value == 0) || (form.mrec.value == 0) || (form.arec.value == 0) )
		{
			alert ('Data do Cheque : preenchimento obrigat�rio.');
			eval ('form.drec.focus ()');
			return false;
		}
		

	
	

	return true;
      	
}

function verificaObrigInsert (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente
	
		if ((form.opcaixarec.value == '03.03') || (form.opcaixarec.value == '03.07') || (form.opcaixarec.value == '03.04') || (form.opcaixarec.value == '03.05') || (form.opcaixarec.value == '03.08') || (form.opcaixarec.value == '03.09'))
	{

		if (form.bcorec.value == '')
		{	
			alert ('C.C Banco  : preenchimento obrigat�rio.');
			eval ('form.bcorec.focus ()');
			return false;

		}

		
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
	
   	if (campo == 'valornew')
        return 'Valor';
	if (campo == 'codcliente')
        return 'Cod Cliente';
	if (campo == 'codped')
        return 'Cod. Pedido';
	if (campo == 'juros')
        return 'Juros';
	if (campo == 'valorrec')
        return 'Valor Recebido';
	if (campo == 'opcaixanew')
        return 'OP CAIXA';
	if (campo == 'dvenc')
        return 'Dia Vencimento';
	if (campo == 'mvenc')
        return 'Mes Vencimento';
	if (campo == 'avenc')
        return 'Ano Vencimento';
	if (campo == 'nfnew')
        return 'Nota Fiscal';

	else
        return 'Campo n�o cadastrado';
}

function adjust(element) {

	return element.value.replace ('.', ',');

}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form)
{
	var valor;
	valor = form.cbch.value;
	

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do C�digo de Barra do cheque est� incorreto.');
				eval ('form.elements[strValor].focus ()');
				
	}else{
	
	form.banco.value = valor.substring (1,4);
	form.agencia.value = valor.substring (4,8);
	form.conta.value = valor.substring (23,32);
	form.numch.value = valor.substring (13,19);

	form.cbch.disabled=true;
	
	}

	}
 
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



</script>


");


if($Action == "detalhes"):


		

		/*
		
		$prod->listProdU("codemp, saldoini, saldofin, datacxsaldo, codcx", "fin_cxsaldo", "codcxsaldo=$codcxsaldoselect");
		$codemp = $prod->showcampo0();
		$saldoini = $prod->showcampo1();
		$saldofin = $prod->showcampo2();
		$codcx = $prod->showcampo4();
		$datacxsaldo = $prod->showcampo3();
		
		// FORMATACAO //
		$datacxsaldof = $prod->fdata($datacxsaldo);
		$saldoinif = number_format($saldoini,2,',','.'); 
		$saldofinf = number_format($saldofin,2,',','.');

		$prod->listProdU("nome", "empresa", "codemp=$codemp");
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);

		$prod->listProdU("nomecx", "fin_cx", "codemp=$codempselect and codcx = $codcx");
				
		$nomecxold = $prod->showcampo0();
		$nomecxold = strtoupper($nomecxold);
	
		*/

		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->clear();
		$prod->listProd("fin_car", "codcar=$codcar", $array, $array_campo, $parm );

		$prod->mostraProd( $array, $array_campo, 0 );

		// DADOS //
		$numdoc = $prod->showcampo1();
		$opcaixa = $prod->showcampo2();
		$codcliente = $prod->showcampo4();
		$descricao = $prod->showcampo5();
		$datavenc = $prod->showcampo6();
		$nf = $prod->showcampo7();
		$valordevido = $prod->showcampo8();
		$xjuros = $prod->showcampo9();
		$xvalorpg = $prod->showcampo10();
		$xdatapg = $prod->showcampo11();
		$xcodcxopera = $prod->showcampo12();
		$hist = $prod->showcampo13();
		$codped = $prod->showcampo14();
		$xcodcxlanc = $prod->showcampo15();
		$xopcaixarec = $prod->showcampo16();
		$xcodconta  = $prod->showcampo18();
		$xcodfgrupo  = $prod->showcampo19();
		if($codped <> 0){
			$codbarra = $prod->codbarra($codempselect,$codped, "PED");
		}

		$datavenc = str_replace('-','',$datavenc);

		$anopar = substr($datavenc,0,4);
		$mespar = substr($datavenc,4,2);
		$diapar = substr($datavenc,6,2);
				
		// FORMATACAO //
		$datavencf = $prod->fdata($datavenc);
		$xdatapgf = $prod->fdata($xdatapg);
		$valordevidof = number_format($valordevido,2,',','.'); 
		$xvalorpgf = number_format($xvalorpg,2,',','.'); 
		$xjurosf = number_format($xjuros,2,',','.'); 

		if($codped <> 0){
		$prod->clear();
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
		}

		$prod->clear();
		$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'><img border='0' src='images/bt-continuaped.gif' ><br>
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

<form method='POST' name='Form54' action='$PHP_SELF?Action=altdata&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'>
	<center>
<div align='center'>
  <table cellSpacing='1' cellPadding='2' width='550' border='0' height='131'>
    <tr>
      <td width='50%' bgColor='#000000' height='22'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#86ACB5'>
      RECEBIMENTO</font></b><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86acb5' size='4'><b>:</b></font></td>
      <td width='50%' bgColor='#000000' height='22'>&nbsp;</td>
    </tr>
    <tr>
      <td width='50%' bgColor='#f0f0f0' height='24'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
      <font color='#336699'>COD PEDIDO:<br>
      </font>$codbarra</font></b></td>
      <td width='50%' bgColor='#f0f0f0' height='24'>
      <p align='right'><font size='1'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>
      EMPRESA:<br>
      </font></b><font face=' Verdana, Arial, Helvetica, sans-serif'>$nomeempold</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgColor='#808080' colSpan='2' height='12'>
      <font face='Verdana' color='#ffffff' size='1'><b>DADOS DO TITULO</b></font></td>
    </tr>
");
if ($hist <> 'S'){
echo("
    <tr>
      <td width='50%' bgColor='#f0f0f0' height='24'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
      <font color='#336699'>NUM. DOCUMENTO:<br>
      </font><input type='text' name='numdoc_new' value='$numdoc'  size='30' ></font></b></td>
      <td width='50%' bgColor='#f0f0f0' height='24'>
      <p align='right'><font size='1'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA 
      VENCIMENTO:<br>
      </font><font face=' Verdana, Arial, Helvetica, sans-serif'><input type='text' name='dvenc' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc' value='$anopar'  size='4' maxlength='4'></font></b></font></td>
    </tr>
");
}else{
echo("
	<tr>
      <td width='50%' bgColor='#f0f0f0' height='24'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
      <font color='#336699'>NUM. DOCUMENTO:<br>
      </font>$numdoc</font></b></td>
      <td width='50%' bgColor='#f0f0f0' height='24'>
      <p align='right'><font size='1'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA 
      VENCIMENTO:<br>
      </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$diapar/$mespar/$anopar</font></b></font></td>
    </tr>
");
}
echo("
    <tr>
      <td width='50%' bgColor='#f0f0f0' height='24'>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>
      <font color='#336699'>OPCAIXA:<br>
      </font></b>$opcaixa</font></td>
      <td width='50%' bgColor='#f0f0f0' height='24'>
      <p align='right'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#336699'>
      DESCRI��O</font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'><b>:<br>
      </b></font>$descricao</font></td>
    </tr>
    <tr>
      <td width='50%' bgColor='#f0f0f0' height='24'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
      <font color='#336699'>
      </font></font></b></td>
      <td width='50%' bgColor='#f0f0f0' height='24'>
      <p align='right'>
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#336699'>
      <b>NOTA FISCAL:<br>
      </b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
");
$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 	
echo("
		$nf_ped<br>
			");
	}
	echo("
	
</font></td>
    </tr>
  </table>
</div>

	<div align='center'>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
	 

   
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
      $xcnpj</font></font></td>
    </tr>

    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDERE�O:<br>
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

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --></center>

");
if ($hist <> 'S'){

echo("

  <p align='center'><input type='submit' value='Alterar Data Vencimento' name='B1'></p>
");
}
echo("


<br><br>


		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='codcar' value='$codcar'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		</form>
			

	");


	if ($xcodfgrupo <> 0 and $xcodfgrupo <> ''){ 
		// LISTA OS REGISTROS DOS PAGAMENTOS SELECIONADOS
		$prod->listProdSum("datavenc, numdoc, fin_car.opcaixa, fin_car.codcliente, valordevido, hist, descricao, nf, codcar, codped, datapg, valorpago, juros", "fin_car", "codformagrupo='$xcodfgrupo'", $array78, $array_campo78, "" );

	}

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codpgforma, codformagrupo, bco, ag, cc, numcheq, opcaixa, valor, descricao, codconta", "fin_car_forma", "codformagrupo='$xcodfgrupo'", $array79, $array_campo79, "" );
	
	

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
                         </td>
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


	<center>
<div align='center'>
			

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PAGAMENTO(S) SELECIONADO(S)</font></b></td>
    </tr>
  </tbody>
</table>

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
	<table width='500' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#D6B778'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='35%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OC/FORNECEDOR</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array78); $i++ ){
			
			$prod->mostraProd( $array78, $array_campo78, $i );

			// DADOS //
			$datavenc = $prod->showcampo0();
			$numdoc = $prod->showcampo1();
			$opcaixa = $prod->showcampo2();
			$codfor = $prod->showcampo3();
			$valordevido = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$descricao = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$codcap = $prod->showcampo8();
			$codoc = $prod->showcampo9();
			$datapg = $prod->showcampo10();
			$valorpago = $prod->showcampo11();
			$juros = $prod->showcampo12();

			
			
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 
			
			if($codfor <> 0){
			$prod->listProdU("nome", "fornecedor", "codfor=$codfor");
			$nomefor = $prod->showcampo0();
			}
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#F2E4C4'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codoc</b><br>$nomeforn</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valordevidof</B></font></font></td>
			
		");

	$valortotal = $valortotal + $valordevido;
	$jurost = $jurost + $juros;

	 }

	$valortotalf = number_format($valortotal,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalf</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
				</table>
					 </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>FORMAS DE PAGAMENTO DAS CONTAS</font></b></td>
    </tr>
  </tbody>
</table>
	<br>	
  </center>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
     <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>AG.</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>C.C.</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
	
    
  </tr>
	");
	 $prod->clear();
	 for($i = 0; $i < count($array79); $i++ ){
			
			$prod->mostraProd( $array79, $array_campo79, $i );

			// DADOS //
			$codpgforma = $prod->showcampo0();
			$codformagrupo = $prod->showcampo1();
			$bco = $prod->showcampo2();
			$ag = $prod->showcampo3();
			$cc = $prod->showcampo4();
			$numchfpg = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			
			$prod->clear();
			$prod->listProdU("nomebco", "fin_bcoconta", "codconta=$codconta");
			$nomebco = $prod->showcampo0();
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#D6E7EF'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao<br><b>$nomebco</b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$ag</font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$cc</font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numchfpg</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></font></td>
		
		");

	$valortotalfpg = $valortotalfpg + $valorp;

	 }

	$valortotalfpgf = number_format($valortotalfpg,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalfpgf</B></font></font></td>
			
				</table>
<br>

					<div align='center'>
  <center>
  <table border='0' width='550'>
    <tr>
      <td width='50%' bgcolor='#FFC58A'>
  <p align='center'><b><font face='Verdana' color='#800000' size='1'>JUROS/DESCONTO:<br>
  </font><FONT face=Verdana size=1>$jurost</FONT><FONT face=Verdana color='#800000' size=1><br>
  </FONT></b></td>
      <td width='50%' bgcolor='#FFC58A'>
  <p align='center'><B><FONT face=Verdana color='#800000' size=1>DATA RECEBIMENTO:<br>
  </FONT></B>
 $datapgf
 
      </td>
    </tr>
  </table>
  </center>
</div>
<BR>
<BR>

"); 
	  
	 // VERIFICA CONSITENCIA DE DATAS
		$prod->listProdMY("IF ('$datapg' > '2010-11-24' , 'S', 'N')", "" , $array129, $array_campo129, "" );
		$prod->mostraProd( $array129, $array_campo129, 0 );
		$control = $prod->showcampo0();
		#$control = "S"; // RETIRADA DA TRAVA 06/08/2004 (TEMPORARIO)

	 if ($control == 'S' and ($codgrp_vend == 2 or $codgrp_vend == 52 or $codgrp_vend == 15)){
echo ("
	<form method='POST' name ='Form89' action='$PHP_SELF?Action=delformagrupo&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate' onclick=\" return confirm('Deseja cancelar o Recebimento?')\" >
	

 <p align='center'><B><FONT face=Verdana color='#800000' size=1>IMPORTANTE:</B> Todos as FORMAS DE PAGAMENTOS relacionados com esse Recebimento ser�o CANCELADAS<br>
  </FONT>
	<CENTER><input class='sbttn' type='submit' name='OK' value='CANCELAR RECEBIMENTO'></CENTER>
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codformagrupo'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	
		  <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				  		  		   <input type='hidden' name='dde' value='$ddeped'>
				  <input type='hidden' name='mde' value='$mdeped'>
				  <input type='hidden' name='ade' value='$adeped'>
				  <input type='hidden' name='date' value='$dateped'>
				  <input type='hidden' name='mate' value='$mateped'>
				  <input type='hidden' name='aate' value='$aateped'> 
		
		<input type='hidden' name='valortpg' value='$valortotal'>	
		<input type='hidden' name='valor_cc' value='$soma_cc_total'>	
		<input type='hidden' name='valortf' value='$valortotalfpg'>	
		<input type='hidden' name='jurost' value='$jurost'>	
		<input type='hidden' name='numformapg' value='$numformapg'>	
							 </form>



");

 }//IF

endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):


		$codformagruposelect = 1;

		// LISTA OS REGISTROS DOS PAGAMENTOS SELECIONADOS
		$prod->listProdSum("datavenc, numdoc, fin_car_temp.opcaixa, fin_car_temp.codcliente, valordevido, hist, descricao, nf, codcar, codped, datapg, valorpago, juros", "fin_car_temp", "codemp=$codempselect and codcxsaldo = $codcxsaldoselect ", $array78, $array_campo78, "" );

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codpgforma, codformagrupo, bco, ag, cc, numcheq, opcaixa, valor, descricao, codconta, datavenc", "fin_car_forma_temp", "codformagrupo=$codfgruposelect ", $array79, $array_campo79, "" );
	
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'><img border='0' src='images/bt-continuaped.gif' ><br>
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


	<center>
<div align='center'>
			

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RECEBIMENTO(S) SELECIONADO(S)</font></b></td>
    </tr>
  </tbody>
</table>

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
	<table width='500' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#D6B778'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='35%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OC/FORNECEDOR</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
	
    
  </tr>
	");
	 
	 $erro_cap = 1;
	 for($i = 0; $i < count($array78); $i++ ){
			
			$prod->mostraProd( $array78, $array_campo78, $i );

			$datavenc = $prod->showcampo0();
			$numdoc = $prod->showcampo1();
			$opcaixa = $prod->showcampo2();
			$codcliente = $prod->showcampo3();
			$valordevido = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$descricao = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$codcar = $prod->showcampo8();
			$codped = $prod->showcampo9();
			$datapg = $prod->showcampo10();
			$valorpago = $prod->showcampo11();
			$juros = $prod->showcampo12();
			$codbarra = "";
			if($codped <> 0){
			$codbarra = $prod->codbarra($codempselect,$codped, "PED");
			}
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 
			
			$nomecliente = "";
			if($codped <> 0){
			$prod->clear();
			$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
			}

			if($codcliente <> 0){
			$prod->clear();
			$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
			}
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

			
			#echo("ec=$erro_cap");

			#echo($erro_cap_total);

		echo("
		<tr bgcolor='#F2E4C4'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codoc</b><br>$nomeforn</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valordevidof</B></font></font></td>
			
		");

	$valortotal = $valortotal + $valordevido;
	$soma_cc_total = $soma_cc_total + $soma_cc;

	 }

	$valortotalf = number_format($valortotal,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalf</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
				</table>
					 </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>FORMAS DE RECEBIMENTO DAS CONTAS</font></b></td>
    </tr>
  </tbody>
</table>
	<br>	
  </center>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
     <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA VENC.</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
		 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 $prod->clear();
	 for($i = 0; $i < count($array79); $i++ ){
			
			$prod->mostraProd( $array79, $array_campo79, $i );

			// DADOS //
			$codpgforma = $prod->showcampo0();
			$codformagrupo = $prod->showcampo1();
			$bco = $prod->showcampo2();
			$ag = $prod->showcampo3();
			$cc = $prod->showcampo4();
			$numchfpg = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			$datavenc = $prod->showcampo10();


			$prod->clear();
			$prod->listProdU("nomebco", "fin_bcoconta", "codconta=$codconta");
			$nomebco = $prod->showcampo0();
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
			$datavencf = $prod->fdata($datavenc);
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#D6E7EF'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao<br><b>$nomebco</b></font></td>
	<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datavencf</font></td>	
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numchfpg</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=delformapg&codpgformaselect=$codpgforma&codcxselect=$codcxselect&codfgruposelect=$codfgruposelect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped#contapg'>Excluir</a></B></font></font></td>
		");

	$valortotalfpg = $valortotalfpg + $valorp;

	 }

	$valortotalfpgf = number_format($valortotalfpg,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalfpgf</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
				</table>
<br>

	<form method='POST' name ='Form89' action='$PHP_SELF?Action=insert&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate' onSubmit = 'if (verificaObrig(Form89)==false) return false'>
");

		$jurost = $valortotalfpg - $valortotal;
		$jurostf = number_format($jurost,2,',','.');
		
		$numformapg =  count($array79);


echo("


<div align='center'>
  <center>
  <table border='0' width='550'>
    <tr>
      <td width='50%' bgcolor='#FFC58A'>
  <p align='center'><b><font face='Verdana' color='#800000' size='1'>JUROS/DESCONTO:<br>
  </font><FONT face=Verdana size=1>$jurostf</FONT><FONT face=Verdana color='#800000' size=1><br>
  </FONT></b></td>
      <td width='50%' bgcolor='#FFC58A'>
  <p align='center'><B><FONT face=Verdana color='#800000' size=1>DATA RECEBIMENTO:<br>
  </FONT></B>
 <input type='text' name='dpg' size='2' maxlength='2'>/<input type='text' name='mpg' size='2' maxlength='2'>/<input type='text' name='apg' size='4' maxlength='4'>
 
      </td>
    </tr>
  </table>
  </center>
</div>
<br>

	<CENTER><input class='sbttn' type='submit' name='OK' value='RECEBER CONTAS SELECIONADAS'></CENTER>
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	
		  <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				  		  		   <input type='hidden' name='dde' value='$ddeped'>
				  <input type='hidden' name='mde' value='$mdeped'>
				  <input type='hidden' name='ade' value='$adeped'>
				  <input type='hidden' name='date' value='$dateped'>
				  <input type='hidden' name='mate' value='$mateped'>
				  <input type='hidden' name='aate' value='$aateped'> 
		
		<input type='hidden' name='valortpg' value='$valortotal'>	
		<input type='hidden' name='valor_cc' value='$soma_cc_total'>	
		<input type='hidden' name='valortf' value='$valortotalfpg'>	
		<input type='hidden' name='jurost' value='$jurost'>	
		<input type='hidden' name='numformapg' value='$numformapg'>	
							 </form>


 
<p>&nbsp;</p>
<div align='center'>
  <center>
  <form method='POST' name ='Form3' action='$PHP_SELF?Action=insformapg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber3'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA REC<br>
      </font><font face='Verdana' color='#800000' size='3'>DINHEIRO</font></b></td>
      <td width='286' height='111'>
      <div align='right'>
<table border='0' width='231' cellspacing='0' cellpadding='3' style='border-collapse: collapse' bordercolor='#111111' height='1'>
      <tr bgcolor='#F3F3F3'>
        <td width='231' height='1' bgcolor='#FFFFFF' >
        <font face='Verdana' size='1'><b>VALOR:&nbsp; R$
        <input type='text' name='valorfpg' size='9' onKeyUp='this.value = adjust(this);'>
        </b></font></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1'></td>
			  </tr>

    </table>



      </div>
      </td>
    </tr>
  </table>
  </center>
</div>

		  		 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
					 <input type='hidden' name='opcaixarec' value='03.00'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
					   <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				  		  		   <input type='hidden' name='dde' value='$ddeped'>
				  <input type='hidden' name='mde' value='$mdeped'>
				  <input type='hidden' name='ade' value='$adeped'>
				  <input type='hidden' name='date' value='$dateped'>
				  <input type='hidden' name='mate' value='$mateped'>
				  <input type='hidden' name='aate' value='$aateped'> 
  </form>
  </center>
</div>

<div align='center'>
  <center>
  <form method='POST' name ='Form2' action='$PHP_SELF?Action=insformapg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped' onSubmit = 'if (verificaObrigCheque(Form2)==false) return false'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber2'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA REC<br>
      </font><font face='Verdana' color='#800000' size='3' >CHEQUE </font></b></td>
      <td width='286' height='111'>
      <div align='right'>
<table border='0' width='231' cellspacing='0' cellpadding='3' style='border-collapse: collapse' bordercolor='#111111' height='1'>
      <tr bgcolor='$bgcortopo'>
		<td width='57' align='center' height='12' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'><b>BCO</b></font></td>
        <td width='58' align='center' height='12' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'><b>AG</b></font></td>
		<td width='58' align='right' height='12' bgcolor='#FFFFFF'>
        <p align='center'>
        <font size='1' face='Verdana'><b>CONTA</b></font></td>
		<td width='58' align='center' height='12' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'><b>NO.CHQ</b></font></td>
		<td width='58' align='center' height='12' bgcolor='#FFFFFF'>
        &nbsp;</td>
      </tr>
      <tr bgcolor='$bgcorlinha'>
        <td width='57' height='1' bgcolor='#FFFFFF' >
        <input type='text' name='banco' size='3' maxlength='3'></td>
        <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='text' name='agencia' size='4' maxlength='4'></td>
        <td width='58' height='1' align='right' bgcolor='#FFFFFF' >
        <input type='text' name='conta' size='6' maxlength='10'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='text' name='numch' size='6' maxlength='6'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><input type='text' name='cbch' size='30' onChange='CopiaCodBarraCheque(this.form);'></td>
    </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><b>
          <font face='Verdana' size='1'>DATA</font></b><font face='Verdana' size='1'><b>:
         <input type='text' name='drec' size='2' maxlength='2'>/<input type='text' name='mrec' size='2' maxlength='2'>/<input type='text' name='arec' size='4' maxlength='4'></b></font></td>
    </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'>
          <font face='Verdana' size='1'><b>VALOR:&nbsp; R$
          <input type='text' name='valorfpg' size='9' onKeyUp='this.value = adjust(this);'>
          </b></font></td>
    </tr>
</table>



      </div>
      </td>
    </tr>
  </table>
  </center>
</div>
		  	 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='opcaixarec' value='03.01'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	 
		    <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				  		  		   <input type='hidden' name='dde' value='$ddeped'>
				  <input type='hidden' name='mde' value='$mdeped'>
				  <input type='hidden' name='ade' value='$adeped'>
				  <input type='hidden' name='date' value='$dateped'>
				  <input type='hidden' name='mate' value='$mateped'>
				  <input type='hidden' name='aate' value='$aateped'> 
  </form>
  </center>
</div>

<div align='center'>
  <center>
  <form method='POST' name ='Form4' action='$PHP_SELF?Action=insformapg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped' onSubmit = 'if (verificaObrigInsert(Form4)==false) return false'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber2'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA REC<br>
      </font><font face='Verdana' color='#800000' size='3' >DEP�SITO BANC�RIO</font></b></td>
      <td width='286' height='111'>
      <div align='right'>
<table border='0' width='231' cellspacing='0' cellpadding='3' style='border-collapse: collapse' bordercolor='#111111' height='1'>
     

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><b>
          <font face='Verdana' size='1'>BANCO:</font></b>
         <select name='bcorec'>


            
            ");
	if ($codsuper <> 0){$condicao87 = " and codemp = $codempselect";}

	$prod->listProdSum("codconta, nomebco", "fin_bcoconta", "tipoconta = 'B' " . $condicao87, $array2, $array_campo2, "" );

	for($l = 0; $l < count($array2); $l++ ){
	
			$prod->mostraProd( $array2, $array_campo2, $l );

			$codcontasel = $prod->showcampo0();
			$nomebco = $prod->showcampo1();

			echo("
            <option value='$codcontasel'>$codcontasel - $nomebco</option>
           ");

		}

	echo("
				  
		<option value='' selected></option>	

        </select></td>
    </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'>
          <font face='Verdana' size='1'><b>VALOR:&nbsp; R$
          <input type='text' name='valorfpg' size='9' onKeyUp='this.value = adjust(this);'><input type='submit' value='OK' name='B1'>
          </b></font></td>
    </tr>
</table>



      </div>
      </td>
    </tr>
  </table>
  </center>
</div>
		  	 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='opcaixarec' value='03.02'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	 
		    <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				  		  		   <input type='hidden' name='dde' value='$ddeped'>
				  <input type='hidden' name='mde' value='$mdeped'>
				  <input type='hidden' name='ade' value='$adeped'>
				  <input type='hidden' name='date' value='$dateped'>
				  <input type='hidden' name='mate' value='$mateped'>
				  <input type='hidden' name='aate' value='$aateped'> 
  </form>
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
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b></font></p>  
	   <table width='200' border='0'>
         <tr>
           <td rowspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>OPCAIXA:<br>
               <input type='text' name='opcaixaselect' size='6' maxlength='6' /> OU <input type='text' name='opcaixaselect1' size='6' maxlength='6' />
               <br />
               CLIENTE:
<input type='text' name='palavrachave' size='20' />
           </font></td>
           <td><input name='tipocliente' type='radio' value='F' checked='checked' /></td>
           <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>CPF</font><br />
             <input id='cpf' name='cpf' type='text' class='campo3' size='16' maxlength='14' onkeyup=\"mascara_cpf(this.form, 'cpf', this.value)\" /></td>
         </tr>
         <tr>
           <td><input name='tipocliente' type='radio' value='J' checked='checked' /></td>
           <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>CNPJ</font><br />
             <input id='cnpj' name='cnpj' type='text' class='campo3' size='21' maxlength='18' onkeyup=\"mascara_cnpj(this.form, 'cnpj', this.value)\" /></td>
         </tr>
         <tr>
           <td colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>DE:
               <input type='text' name='dde' size='2' maxlength='2' />
/
<input type='text' name='mde' size='2' maxlength='2' />
/
<input type='text' name='ade' size='4' maxlength='4' />

ATE:
<input type='text' name='date' size='2' maxlength='2' />
/
<input type='text' name='mate' size='2' maxlength='2' />
/
<input type='text' name='aate' size='4' maxlength='4' />
<br />PED:
<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>DE:
               <input type='text' name='ddeped' size='2' maxlength='2' />
/
<input type='text' name='mdeped' size='2' maxlength='2' />
/
<input type='text' name='adeped' size='4' maxlength='4' />

ATE:
<input type='text' name='dateped' size='2' maxlength='2' />
/
<input type='text' name='mateped' size='2' maxlength='2' />
/
<input type='text' name='aateped' size='4' maxlength='4' />
<br />
           BOLETAS ABERTAS:
           <input type='checkbox' name='pedlib' value='OK'>
           <input class='sbttn' type='submit' name='Submit' value='OK' />
</font>
             <input type='hidden' name='desloc' value='0' />
             <input type='hidden' name='operador' value='OR' />
             <input type='hidden' name='codempselect' value='$codempselect' />
             <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect' />
             <input type='hidden' name='codcxselect' value='$codcxselect' />
             <input type='hidden' name='retlogin' value='$retlogin' />
             <input type='hidden' name='connectok' value='$connectok' />
             <input type='hidden' name='pg' value='$pg' />
             <input type='hidden' name='hist' value='$hist' /></td>
           </tr>
       </table>
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


");

# Pesquisa pela Empresa do OC

	
//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

/*
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
		<option value='$PHP_SELF?Action=list&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#cliente'>$nomeemp</option>
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
*/

//<!-- ESCOLHA DE EMPRESAS - FIM --> 

 
 
if ($codempselect<>""){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
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
            <td width='15%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA ATUAL<br>
        </b>$nomeempold</font></td>
			 <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='15%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=newreg&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=$desloc&hist=$hist&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&pedlib=$pedlib'>INSERIR
              NOVA CONTA</a></b></font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='15%'><b><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&pedlib=$pedlib'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
			 <td width='5%'><img border='0' src='images/print.gif'></td>
            <td width='15%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'> <a href='$PHP_SELF?Action=update&pedlib=$pedlib&codempselect=$codempselect&&retlogin=$retlogin&connectok=$connectok&pg=$pglistbol&desloc=$desloc'>BOLETAS ABERTAS</a></font></td>
          </center>
          <td width='20%'>
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

				 <table border='0' width='550' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='21%'></td>
            <td width='6%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAR:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAR:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'><br>
              HIST�RICO</a></font></b></td>
          </center>
        </tr>
				 <tr>
    <td width='100%' colspan ='5'>
      <hr size='1'>
    </td>
  </tr>
      </table>
<form method='POST' action='$PHP_SELF?Action=update&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'  name='Form7' enctype='multipart/form-data' >
	<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTAGEM DE RECEBIMENTOS</b> </font></td>
  </tr>
</table>
				<br>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PEDIDO/<BR>CLIENTE</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	 

    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

				// DADOS //
			$datavenc = $prod->showcampo0();
			$numdoc = $prod->showcampo1();
			$opcaixa = $prod->showcampo2();
			$codcliente = $prod->showcampo3();
			$valordevido = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$descricao = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$codcar = $prod->showcampo8();
			$codped = $prod->showcampo9();
			$datapg = $prod->showcampo10();
			$valorpago = $prod->showcampo11();
			$juros = $prod->showcampo12();
			$codbarra = "";
			if($codped <> 0){
			$codbarra = $prod->codbarra($codempselect,$codped, "PED");
			}
			$codosforma = $prod->showcampo13();
			$cpf_pesq = $prod->showcampo15();
			$cnpj_pesq = $prod->showcampo14();
			$tipocliente_pesq = $prod->showcampo16();
			$dataped = $prod->showcampo17();
			
			$doc = "";
			if ($tipocliente_pesq == "F"){$doc_pesq = $cpf_pesq;}else{$doc_pesq = $cnpj_pesq;}
			#$codcliente = 0;
			#echo "$tipocliente_pesq - $doc_pesq";
		
			if ($codosforma <> 0){
			$codos = "";
			$prod->clear();
			$prod->listProdSum("codbarra, codcliente", "os", "codformagrupo = $codosforma", $array48, $array_campo48, "" );
			for($u = 0; $u < count($array48); $u++ ){
				$prod->mostraProd( $array48, $array_campo48, $u );
				$codbarra_os = $prod->showcampo0();
				$codcliente = $prod->showcampo1();
				$codos .= "$codbarra_os<br>";
			}
			}
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$datapedf = $prod->fdata($dataped);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 
			
			$nomecliente = "";
			if($codped <> 0){
			$prod->clear();
			$prod->listProdU("nome, dddtel1, tel1", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
			$dddtel1= $prod->showcampo1();
			$tel1 = $prod->showcampo2();
			$prod->clear();
			$prod->listProdU("codvend, cancel", "pedido", "codped=$codped");
			$codvend = $prod->showcampo0();
			$cancel = $prod->showcampo1();
			
			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();
			}

			if($codcliente <> 0){
			$prod->clear();
			$prod->listProdU("nome, dddtel1, tel1", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
			$dddtel1= $prod->showcampo1();
			$tel1 = $prod->showcampo2();
			}
			$count_insert = 0;
			$prod->clear();
			$prod->listProdU("COUNT(*)", "fin_car_temp", "codcar = '$codcar' and codcxsaldo = $codcxsaldoselect");
			$count_insert = $prod->showcampo0();
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($count_insert > 0){$bgcorlinha="#FF9933";}else{$bgcorlinha="#F3F8FA";}
			
			if ($cancel == "OK"){$status_ped = "<BR><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF0000'><b>CANCEL</b></FONT>";}else{$status_ped = "";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}
		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$descricao</b>$status_ped<br>$numdoc<br>$nomefor</font><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT></td>
			");
if ($codosforma == 0){
echo("
				<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciopedadmuser_sup.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&fin=1','name','600','400','yes');return 
false");echo('"');echo(">$codbarra</a><br></b>$datapedf<br><b>$nomevend</b></font><br>$nomecliente<br>$doc_pesq<br><b>($dddtel1)$tel1</b></font></td>
");
}else{
echo("
<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b>$codos</b></font><br>$nomecliente<br>$doc_pesq</font></td>
");
}
echo("
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>DEV: <b>R$ $valordevidof</B><BR>REC: R$ $valorpagof<BR><font color='#FF6600'>JUR: R$ $jurosf</font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>");
if ($hist == "N"){
if ($cancel <> 'OK'){
echo("
<a
href='$PHP_SELF?Action=inscontapg&codcar=$codcar&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&opcaixarec=$opcaixa&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj#contapg'>Inserir</a>
");
}else{
echo("

<a
href='$PHP_SELF?Action=delcar&codcar=$codcar&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&opcaixarec=$opcaixa&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj#contapg'>DELETAR CAR</a>
");
}
}else{
echo("
PG
");
}
echo("</b></font></td>
<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=detalhes&codcar=$codcar&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&pedlib=$pedlib&codcxselect=$codcxselect'>Detalhes</a></b></font></td>
	</tr>
		");
	 }
	 echo("
				</table>
	");

if ($Action == "list" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&codcxselect=$codcxselect&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&pedlib=$pedlib&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj";   
include("numcontg.php");
}



		echo("

					<BR><BR><bR>
 <a name='contapg'></a>
		");
			
						
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, fin_car_temp.opcaixa, fin_car_temp.codcliente, valordevido, hist, descricao, nf, codcar, codped, datapg, valorpago, juros, codos", "fin_car_temp", "codemp=$codempselect and codcxsaldo = $codcxsaldoselect", $array78, $array_campo78, "" );

echo("
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - RECEBIMENTO(S) SELECIONADO(S)</b> </font></td>
  </tr>
</table>
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
	<table width='500' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#D6B778'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
     <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PEDIDO/<BR>CLIENTE</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array78); $i++ ){
			
			$prod->mostraProd( $array78, $array_campo78, $i );

			// DADOS //
			$datavenc = $prod->showcampo0();
			$numdoc = $prod->showcampo1();
			$opcaixa = $prod->showcampo2();
			$codcliente = $prod->showcampo3();
			$valordevido = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$descricao = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$codcar = $prod->showcampo8();
			$codped = $prod->showcampo9();
			$datapg = $prod->showcampo10();
			$valorpago = $prod->showcampo11();
			$juros = $prod->showcampo12();
			$codbarra = "";
			if($codped <> 0){
			$codbarra = $prod->codbarra($codempselect,$codped, "PED");
			}
			$codosforma = $prod->showcampo13();
			
			
				
			#$codcliente = 0;

		
			if ($codosforma <> 0){
			$codos = "";
			$prod->clear();
			$prod->listProdSum("codbarra, codcliente", "os", "codformagrupo = $codosforma", $array48, $array_campo48, "" );
			for($u = 0; $u < count($array48); $u++ ){
				$prod->mostraProd( $array48, $array_campo48, $u );
				$codbarra_os = $prod->showcampo0();
				$codcliente = $prod->showcampo1();
				$codos .= "$codbarra_os<br>";
			}
			}
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 
			
			$nomecliente = "";
			
			if($codcliente <> 0){
			$prod->clear();
			$prod->listProdU("nome, dddtel1, tel1", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
		
			}
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#F2E4C4'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$descricao</b><br>$nomefor</font><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF0000'>$nf</FONT><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT></td>
");
if ($codosforma == 0){
echo("
				<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciopedadmuser_sup.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&fin=1','name','600','400','yes');return 
false");echo('"');echo(">$codbarra</a></b></font><br>$nomecliente</font></td>
");
}else{
echo("
<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b>$codos</b></font><br>$nomecliente</font></td>
");
}
echo("
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valordevidof</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=delcontapg&codcar=$codcar&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&tipocliente=$tipocliente&cpf=$cpf&cnpj=$cnpj#contapg'>Excluir</a></B></font></font></td>
		");

	$valortotal = $valortotal + $valordevido;

	 }

	$valortotalf = number_format($valortotal,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$i</font></b></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalf</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
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
if ($valortotal <> 0){
echo("
					<CENTER><input class='sbttn' type='submit' name='OK' value='RECEBER CONTAS SELECIONADAS'></CENTER>
");
}
echo("
						 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
							   <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				  		   <input type='hidden' name='dde' value='$ddeped'>
				  <input type='hidden' name='mde' value='$mdeped'>
				  <input type='hidden' name='ade' value='$adeped'>
				  <input type='hidden' name='date' value='$dateped'>
				  <input type='hidden' name='mate' value='$mateped'>
				  <input type='hidden' name='aate' value='$aateped'> 
							 </form>
	");


}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;




if ($Action == "newreg"){

	if ($opcaixaselect <> ""){
	$prod->clear();
	$prod->listProdU("descricao", "formapg", "opcaixa='$opcaixaselect'");
		$descricao = $prod->showcampo0();
		if ($descricao == ""){$descricao = "N�o existe esta OPCAIXA";}
		
	}


/// CONTADOR DE PAGINAS ////
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'></font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          $titulo</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>INSERIR NOVA CONTA</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped'><img border='0' src='images/bt-continuaped.gif' ><br>
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

	<div align='center'>
<center>
    <div align='left'></div>
    <table border=0 cellpadding=0 cellspacing=0 width=550>
      <tbody> 
      <tr bgcolor='#93BEE2'> 
        <td width='100%' colspan='2'> 
          
          </td>
      </tr>
      <tr bgcolor='#93BEE2'> 
        <td colspan=2 width='100%'> 
          <div align=center> 
            <table border=0 cellpadding=0 cellspacing=0 width=548>
              <tbody> 
              <tr> 
                <td bgcolor=#ffffff width='100%' align='center'> &nbsp; 
                  <form method='POST' action='$PHP_SELF?Action=$Action&opcaixaselect=$opcaixaselectopcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'  name='Form' enctype='multipart/form-data' onSubmit = 'if (verificaObrigInsert(Form)==false) return false'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
					  

							 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Num. Documento:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='numdocnew' size='40' >
			                          
                              </font></td>
								  </tr>
										  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OP CAIXA</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='opcaixanew'>
                             
						  
	
	  ");
	$prod->listProdSum("opcaixa, descricao", "formapg", "opcaixa like '02%' and tipoparc = 'FT'", $array1, $array_campo1, "" );

	for($l = 0; $l < count($array1); $l++ ){
	
			$prod->mostraProd( $array1, $array_campo1, $l );

			$opcaixasel = $prod->showcampo0();
			$descricaosel = $prod->showcampo1();

			echo("
            <option value='$opcaixasel'>$descricaosel</option>
          
	
	        ");

		}

	echo("
			<option value='' selected>Escolha</option>
						  </select>
						  </font></td>
							  </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod Cliente:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='codclientenew' size='10' onChange='verificaNumerico(this.form, this.form.codcliente.name, 1)' ><br>(OBS.: Este campo n�o � obrigatorio, torna-se necess�rio o seu preenchimento somente quando a CONTA A RECEBER estiver relacionada com um CLIENTE) 
			                          
                              </font></td>
                          </tr>
						 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Data Vencimento:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                               <input type='text' name='dvenc' size='2' maxlength='2'>/ <input type='text' name='mvenc' size='2' maxlength='2'>/ <input type='text' name='avenc' size='4' maxlength='4'>
			                          
                              </font></td>
                          </tr>
							<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Valor:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                R$ <input type='text' name='valornew' size='12' onChange='consisteValor(this.form, this.form.valornew.name, true)'>
			                          
                              </font></td>
                          </tr>
						<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nota Fiscal:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' name='nfnew' size='20' >
			                          
                              </font></td>
                          </tr>
							<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod Pedido:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='codpednew' size='13' maxlength='13' onChange='verificaNumerico(this.form, this.form.codped.name, 1)'><br>(OBS.: Este campo n�o � obrigatorio, torna-se necess�rio o seu preenchimento somente quando a CONTA A RECEBER estiver relacionada com um PEDIDO) 
			                          
                              </font></td>
                          </tr>
	                      <tr> 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
				");
			if ($Action=='update'):$value="Atualizar";else:$value="Adicionar";endif;
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
				
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>

                 <br> </form>
                </td>
              </tr>
              <tr> 
                <td bgcolor=#FFFFFF width='100%'> 
                  <p align='center'><font size='1' face='Verdana'></font></p>
                </td>
              </tr>
              </tbody> 
            </table>
          </div>
        </td>
      </tr>
      <tr> 
        <td bgcolor='#93BEE2' width='50%'></td>
        <td align=right bgcolor='#93BEE2' width='50%'></td>
      </tr>
      </tbody> 
    </table>
    <p>&nbsp;</p>
  </center>
</div>
	");
}


/// INCLUS�O DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
