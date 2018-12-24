

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
$titulo = "CONTAS A PAGAR";
$subtitulo = "FINANCEIRO";

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

		
		// ATUALIZA FORMA PG
		$prod->clear();
		$prod->listProdgeral("fin_cap_forma_temp", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("fin_cap_forma_grupo", $uregfgrupo);
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codpgforma = $prod->showcampo0();
			$banco = $prod->showcampo2();
			$agencia = $prod->showcampo3();
			$conta = $prod->showcampo4();
			$numcheq = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			$codch = $prod->showcampo10();


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

			if ($opcaixa == '01.01'){

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
						#$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA

				if ($bco) { 

					
					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend ");
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
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

							

				} // BCO

			} // OPCAIXA 01.01


			if ($opcaixa == '01.06'){

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
						#$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA


			} // OPCAIXA 01.06

				if ($inschtab == "S") { 

											
					//INSERE CHEQUES
					$prod->clear();
					$prod->listProd("fin_cheques", "codch=$codch");
					$prod->setcampo9("PG");
        			$prod->upProd("fin_cheques", "codch=$codch");

					
				} // INSERE CHEQUE

			

			
			//INSERE FORMA PG PARA AS CAP
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

			$prod->addProd("fin_cap_forma", $uregf);

			//DELETA FORMA PG TEMPORARIA
			$prod->delProd("fin_cap_forma_temp", "codpgforma=$codpgforma");
			$prod->delProd("fin_cap_forma_grupo_temp", "codformagrupo=$codfgruposelect");


		} // FOR

		
		// ATUALIZA PAGAMENTOS
		$prod->clear();
		$prod->listProdgeral("fin_cap_temp", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codcap = $prod->showcampo0();
			$opcaixa = $prod->showcampo2();
			$valorp = $prod->showcampo8();
			$obs = $prod->showcampo18();


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
						$prod->setcampo10($obs);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA

			
			//INSERE FORMA PG PARA AS CAP
			$prod->clear();
			$prod->listProd("fin_cap", "codcap=$codcap");

			$prod->setcampo9(0);
			$prod->setcampo10($valorp);
			$prod->setcampo11($dataatual);
			$prod->setcampo12($uregopera);
			$prod->setcampo13("S"); // HISTORICO
			$prod->setcampo15($ureglanc); 
			$prod->setcampo17($uregfgrupo); 


			$prod->upProd("fin_cap", "codcap=$codcap");

		
			
			// DIRECIONAR DESPESAS PARA AS DEVIDAS CONTAS
			$prod->listProdSum("codcusto, codproj, codsubproj, datavenc, valor, valortotal, datacc, codvend, opcaixa", "projeto_relacao_custo", "codcap='$codcap'", $array79, $array_campo79, "" );
			
			for($tt = 0; $tt < count($array79); $tt++ ){
			
				$prod->mostraProd( $array79, $array_campo79, $tt );

				// DADOS //
				$codcusto = $prod->showcampo0();
				$codproj = $prod->showcampo1();
				$codsubproj = $prod->showcampo2();
				$datavenc = $prod->showcampo3();
				$valor = $prod->showcampo4();
				$valortotal = $prod->showcampo5();
				$datacc = $prod->showcampo6();
				$codvend_cc = $prod->showcampo7();
				$opcaixa = $prod->showcampo8();

				$prod->listProdU("descricao","formapg", "opcaixa='$opcaixa'");
				$descricao = $prod->showcampo0();

				$prod->listProdU("nome, tipo","vendedor", "codvend='$codvend_cc'");
				$nomevend = $prod->showcampo0();
				$tipo_vend_cc = $prod->showcampo1();

				$prod->clear();
				$prod->listProdU("codemp, codconta", "projeto_nome", "codproj=$codproj");
				$codemp_proj_cc = $prod->showcampo0();
				$codconta_proj_cc = $prod->showcampo1();

				if ($valor < 0){
					$valor = $valor*(-1);
					$bco = "C"; // OPERACAO DE BANCO (CREDITA)
				}else{
					$bco = "D"; // OPERACAO DE BANCO (DEBITA)
				}


			if ($codvend_cc <> 0){

				// ROTINA DEPARTAMENTO PESSOAL

					// CONTA DO FUNCIONARIO
					$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend_cc ");
					$codconta_vend = $prod->showcampo0();


					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_vend);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valor);
						}else{
							$prod->setcampo5($valor);
						}
					if ($tipo_vend_cc == 'R'){
						$prod->setcampo6($dataatual);
						$prod->setcampo7($dataatual);
					}else{
						$prod->setcampo6($datacc);
						$prod->setcampo7($datacc);
					}
					$prod->setcampo8("N");
					if ($tipo_vend_cc == 'R'){
						$prod->setcampo12($obs);
					}else{
						$prod->setcampo12($obs." - Competência: ".$datacc);
					}
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

				if ($codempselect <> $codemp_proj_cc){

					
					// CONTA DA EMPRESA

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_proj_cc);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valor);
						}else{
							$prod->setcampo5($valor);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($nomevend . $obs." - Competência: ".$datacc);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

				}

			}else{
					
					// ROTINA GERAL

					if ($codempselect <> $codemp_proj_cc){

					// CONTA DA EMPRESA

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_proj_cc);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valor);
						}else{
							$prod->setcampo5($valor);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($nomevend . $obs." - Competência: ".$datacc);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

					}

			}

			}//FOR

			//DELETA PAGAMENTO TEMPORARIO
			$prod->delProd("fin_cap_temp", "codcap=$codcap");


		} // FOR
					
			
			
	

			$Actionsec = "list";
			

	
        break;

		

    case "update":

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("fin_cap_forma_grupo_temp", $uregfgrupo);

		$codfgruposelect = $uregfgrupo;
	
		// COPIA CODFGRUPO PARA CADA CONTA A SER PAGA
		$prod->clear();
		$prod->listProdgeral("fin_cap_temp", "codemp=$codempselect", $array21, $array_campo21, "" );

					
		for($i = 0; $i < count($array21); $i++ ){
			
			
			$prod->mostraProd( $array21, $array_campo21, $i );

			$codcaptemp = $prod->showcampo0();
					
			$prod->setcampo17($uregfgrupo);

			$prod->upProd("fin_cap_temp", "codcap=$codcaptemp");
		
		}

				
		 break;

	case "insformapg":

			$valorfpg = str_replace('.','',$valorfpg);
			$valorfpg = str_replace(',','.',$valorfpg);

			if ($insch == 1){

				$prod->listProd("fin_cheques", "codch='$codch'");
				$opcaixa = $prod->showcampo2();
				$banco = $prod->showcampo3();
				$agencia = $prod->showcampo4();
				$conta = $prod->showcampo5();
				$numcheq = $prod->showcampo6();
				$valorfpg = $prod->showcampo7();
				$posfin = $prod->showcampo9();
				
			}

			if ($posfin =="CO"){$opcaixa = "01.06";}

			$prod->listProd("formapg", "opcaixa='$opcaixa'");
			$descricao = $prod->showcampo1();
						
			
			//INSERE FORMA PG PARA AS CAP
			$prod->clear();
		
			$prod->setcampo1($codfgruposelect);
			$prod->setcampo2($banco);
			$prod->setcampo3($agencia);
			$prod->setcampo4($conta);
			$prod->setcampo5($numcheq);
			$prod->setcampo6($opcaixa);
			$prod->setcampo7($valorfpg);
			$prod->setcampo8($descricao);
			$prod->setcampo9($bcofpg);
			$prod->setcampo10($codch);
			
			$prod->addProd("fin_cap_forma_temp", $uregf);

			$banco ="";$conta="";$agencia="";$numcheq="";
			

		$Action="update";
				
		 break;

		 case "insformapgch":

				

		$Action="update";
				
		 break;

	case "inscontapg":

		
			//INSERE NO CAP
			$prod->listProd("fin_cap", "codcap=$codcap");
			$opcaixa_conta = $prod->showcampo2();
			$prod->clear();
			$regnum = $prod->listProd("fin_cap_temp", "codcap=$codcap");
			$teste = stristr($opcaixa_conta, "100.");
			if (stristr($opcaixa_conta, "100.") <> FALSE){$erro_cap_c = 0;}else{$erro_cap_c = 1;}
			if ($regnum == 0){ 
				$prod->clear();
				$prod->listProdU("(SUM(valor)/valortotal) ","projeto_relacao_custo", "codcap = $codcap");
				$regnum2 = $prod->showcampo0();
				if ($regnum2 >= 0.97 and $regnum2 <= 1.03){ 
					$prod->clear();
					$prod->listProd("fin_cap", "codcap=$codcap");
					$prod->setcampo17($codfgruposelect);
					$prod->addProd("fin_cap_temp", $uregcap);
				}else{
					if ($erro_cap_c == 0){
						$prod->clear();
						$prod->listProd("fin_cap", "codcap=$codcap");
						$prod->setcampo17($codfgruposelect);
						$prod->addProd("fin_cap_temp", $uregcap);
					}else{
						$erro_cap = "O VALOR TOTAL da CONTA A PAGAR não foi distribuido totalmente nos CENTROS DE CUSTOS. Antes de pagar é necessario editar a CONTA A PAGAR e definir os valores corretamente.";
					}
				}
			}

		$Actionsec="list";
				
		 break;
	
	case "delcontapg":

			//INSERE NO CAP
			$prod->delProd("fin_cap_temp", "codcap=$codcap");
			
		$Actionsec="list";
				
		 break;

	case "delcap":

			//DELETE CAP
			$prod->delProd("fin_cap", "codcap=$codcap");
			//DELETE CENTRO DE CUSTOS
			$prod->delProd("projeto_relacao_custo", "codcap=$codcap");
			
		$Actionsec="list";
				
		 break;

	case "delformapg":

			//INSERE NO CAP
			$prod->delProd("fin_cap_forma_temp", "codpgforma=$codpgformaselect");
			
		$Action="update";
				
		 break;
		 
		 
	case "delformagrupo":
	
	
		$dataatual = $prod->gdata();

		
		// ATUALIZA FORMA PG
		$prod->clear();
		$prod->listProdgeral("fin_cap_forma", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("fin_cap_forma_grupo", $uregfgrupo);
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codpgforma = $prod->showcampo0();
			$banco = $prod->showcampo2();
			$agencia = $prod->showcampo3();
			$conta = $prod->showcampo4();
			$numcheq = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			$codch = $prod->showcampo10();


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

			if ($opcaixa == '01.01'){

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
						#$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA

				if ($bco) { 

					
					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend ");
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

			} // OPCAIXA 01.01


			if ($opcaixa == '01.06'){

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
						#$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA


			} // OPCAIXA 01.06

				if ($inschtab == "S") { 

											
					//INSERE CHEQUES
					$prod->clear();
					$prod->listProd("fin_cheques", "codch=$codch");
					$prod->setcampo9("NO");
        			$prod->upProd("fin_cheques", "codch=$codch");

					
				} // INSERE CHEQUE

			
			

		} // FOR


		
		// ATUALIZA PAGAMENTOS
		$prod->clear();
		$prod->listProdgeral("fin_cap", "codformagrupo=$codfgruposelect", $array21, $array_campo21, "" );
		
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codcap = $prod->showcampo0();
			$opcaixa = $prod->showcampo2();
			$valorp = $prod->showcampo8();
			$obs = $prod->showcampo18();


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
						$prod->setcampo10($obs);
						$prod->setcampo11($login);
						
						$prod->addProd("fin_cxlanc", $ureglanc);


				} // CAIXA

			
			//INSERE FORMA PG PARA AS CAP
			$prod->clear();
			$prod->listProd("fin_cap", "codcap=$codcap");

			$prod->setcampo9(0);
			$prod->setcampo10(0);
			$prod->setcampo11(0);
			$prod->setcampo12($uregopera);
			$prod->setcampo13("N"); // HISTORICO
			$prod->setcampo15($ureglanc); 
			$prod->setcampo17($uregfgrupo); 


			$prod->upProd("fin_cap", "codcap=$codcap");

		
			
			// DIRECIONAR DESPESAS PARA AS DEVIDAS CONTAS
			$prod->listProdSum("codcusto, codproj, codsubproj, datavenc, valor, valortotal, datacc, codvend, opcaixa", "projeto_relacao_custo", "codcap='$codcap'", $array79, $array_campo79, "" );
			
			for($tt = 0; $tt < count($array79); $tt++ ){
			
				$prod->mostraProd( $array79, $array_campo79, $tt );

				// DADOS //
				$codcusto = $prod->showcampo0();
				$codproj = $prod->showcampo1();
				$codsubproj = $prod->showcampo2();
				$datavenc = $prod->showcampo3();
				$valor = $prod->showcampo4();
				$valortotal = $prod->showcampo5();
				$datacc = $prod->showcampo6();
				$codvend_cc = $prod->showcampo7();
				$opcaixa = $prod->showcampo8();

				$prod->listProdU("descricao","formapg", "opcaixa='$opcaixa'");
				$descricao = $prod->showcampo0();

				$prod->listProdU("nome, tipo","vendedor", "codvend='$codvend_cc'");
				$nomevend = $prod->showcampo0();
				$tipo_vend_cc = $prod->showcampo1();

				$prod->clear();
				$prod->listProdU("codemp, codconta", "projeto_nome", "codproj=$codproj");
				$codemp_proj_cc = $prod->showcampo0();
				$codconta_proj_cc = $prod->showcampo1();

				if ($valor < 0){
					$valor = $valor*(-1);
					$bco = "C"; // OPERACAO DE BANCO (CREDITA)
				}else{
					$bco = "D"; // OPERACAO DE BANCO (DEBITA)
				}


			if ($codvend_cc <> 0){

				// ROTINA DEPARTAMENTO PESSOAL

					// CONTA DO FUNCIONARIO
					$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend_cc ");
					$codconta_vend = $prod->showcampo0();


					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_vend);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3("CANCEL - ".$descricao);
					if ($bco =="D"){
							$prod->setcampo4($valor);
						}else{
							$prod->setcampo5($valor);
						}
					if ($tipo_vend_cc == 'R'){
						$prod->setcampo6($dataatual);
						$prod->setcampo7($dataatual);
					}else{
						$prod->setcampo6($datacc);
						$prod->setcampo7($datacc);
					}
					$prod->setcampo8("N");
					if ($tipo_vend_cc == 'R'){
						$prod->setcampo12($obs);
					}else{
						$prod->setcampo12($obs." - Competência: ".$datacc);
					}
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

				if ($codempselect <> $codemp_proj_cc){

					
					// CONTA DA EMPRESA

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_proj_cc);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3("CANCEL - ".$descricao);
					if ($bco =="D"){
							$prod->setcampo4($valor);
						}else{
							$prod->setcampo5($valor);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($nomevend . $obs." - Competência: ".$datacc);
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

				}

			}else{
					
					// ROTINA GERAL

					if ($codempselect <> $codemp_proj_cc){

					// CONTA DA EMPRESA

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_proj_cc);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3("CANCEL - ".$descricao);
					if ($bco =="D"){
							$prod->setcampo4($valor);
						}else{
							$prod->setcampo5($valor);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($nomevend . $obs." - Competência: ".$datacc);
					$prod->setcampo13($login);
					$prod->setcampo15($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

					}

			}

			}//FOR

			


		} // FOR
					
			
		
	
			//DELETE FORMA GRUPO
			#$prod->delProd("fin_cap_forma_grupo", "codformagrupo=$codfgruposelect ");
			//DELETE FORMA
			$prod->delProd("fin_cap_forma", "codformagrupo=$codfgruposelect ");
			// ATUALIZA CAP
			#$prod->upProdU("fin_cap", "juros = 0, valorpago = '0', datapg = 0, codconta = 0, codformagrupo = '$uregfgrupo', hist = 'N'", "codformagrupo=$codfgruposelect");
			
			
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

			
			if ($cap) {

				
					//INSERE NO CAP
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($numdocnew);
					$prod->setcampo2($opcaixa);
					$prod->setcampo4($codfornew);
					$prod->setcampo5($descricao);
					$prod->setcampo6($datavenc);
					$prod->setcampo7($nfnew);
					$prod->setcampo13("N");  // HISTORICO
					$prod->setcampo14($codocnew);  
					$prod->setcampo8($valorp);
					$prod->setcampo16($codempselect);
					$prod->setcampo18($obs);
				
					$prod->addProd("fin_cap", $uregcar);
			
					
				}

		
		$Actionsec="list";
		 }
	    break;
		
		case "detalhes":

				
		 break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	

		

		if ($codempselect <> ""):


			if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){
									
				#$condicao3 .= "TO_DAYS(NOW()) - TO_DAYS(datavenc) <= 5 and ";
							
			}else{
				
				$datainicial = $ade."-".$mde."-".$dde." 00:00:00";
				$datafinal = $aate."-".$mate."-".$date." 23:59:59"; 
				$condicao3 .= "(datavenc >= '$datainicial' and datavenc <= '$datafinal') and ";
					
			}
			
			if ($adepg == "" and $mdepg == "" and $ddepg == "" and $aatepg == "" and $matepg == "" and $datepg == ""){
									
				#$condicao3 .= "TO_DAYS(NOW()) - TO_DAYS(datavenc) <= 5 and ";
							
			}else{
				
				$datainicialpg = $adepg."-".$mdepg."-".$ddepg." 00:00:00";
				$datafinalpg = $aatepg."-".$matepg."-".$datepg." 23:59:59"; 
				$condicao3 .= "(datapg >= '$datainicialpg' and datapg <= '$datafinalpg') and ";
					
			}
				
			if ($opcaixaselect){

				$condicao3 .= "opcaixa = '$opcaixaselect' and ";				

			}
			if ($codforselect){
				
				$condicao3 .= "codfor='$codforselect' and ";
			}
				
				
			$condicao3 .= "codemp='$codempselect' and ";
			#echo "aqui=".$hist;
			if ($hist == "0"){$hist = "N";}
			#echo "aqui2=".$hist;
			if ($hist == "S"){
				$condicao3 .= "hist = 'S'";
			}else{
				$condicao3 .= "hist = 'N'";
			}
					
			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_cap", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros, obs, previsao, codformagrupo", "fin_cap", $condicao3, $array, $array_campo, $parm );

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

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "CAP - CONTAS A PAGAR";

include("sif-topolimpo.php");

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************

function verificaObrig (form, erro)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente


	if (form.valortpg.value > form.valortf.value)
	{
			alert ('Valor Total dos PAGAMENTOS não coincidem com o Valor Total das FORMAS DE PAGAMENTOS.');
			return false;
	}

		if ((Math.abs(form.valor_cc.value - form.valortpg.value) > 1) && (erro == 0))
	{
			alert ('O VALOR TOTAL da CONTA A PAGAR não foi distribuido totalmente nos CENTROS DE CUSTOS. Antes de pagar é necessario editar a CONTA A PAGAR e definir os valores corretamente.');
			return false;
	}

	return true;
      	
}


function verificaObrigInsert (form, erro)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente


	if ((erro == '1') )
	{
			alert ('OPRERACAO DE CAIXA : incorreta');
			return false;
	}
	
	if ((form.opcaixanew.value == '') )
	{
			alert ('OPERACAO DE CAIXA  : preenchimento obrigatório');
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
	
   	if (campo == 'valornew')
        return 'Valor';
	if (campo == 'codfor')
        return 'Cod. Fornecedor';
	if (campo == 'codoc')
        return 'Cod. OC';
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
        return 'Campo não cadastrado';
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
				alert('O formato do Código de Barra do cheque está incorreto.');
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





</script>


");



/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "detalhes"){


	

		// LISTA OS REGISTROS DOS PAGAMENTOS SELECIONADOS
		$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros", "fin_cap", "codformagrupo=$codfgruposelect", $array78, $array_campo78, "" );

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codpgforma, codformagrupo, bco, ag, cc, numcheq, opcaixa, valor, descricao, codconta", "fin_cap_forma", "codformagrupo=$codfgruposelect", $array79, $array_campo79, "" );
	
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'><img border='0' src='images/bt-continuaped.gif' ><br>
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
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
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

			// PAU NO MYSQL
			#$prod->listProdU("SUM(valor)", "projeto_relacao_custo", "codcap='$codcap'");
			#$soma_cc = $prod->showcampo0();

			$prod->listProdSum("valor", "projeto_relacao_custo","codcap='$codcap'", $array45, $array_campo45, "" );
			$soma_pt = 0;
			for($uy = 0; $uy < count($array45); $uy++ ){
				$prod->mostraProd( $array45, $array_campo45, $uy );
				$soma_p = $prod->showcampo0();
				$soma_pt = $soma_pt + $soma_p;
			}
			
			$soma_cc = $soma_pt;
				
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

			if (stristr($opcaixa, "100.") <> FALSE){$erro_cap = $erro_cap *0;}else{$erro_cap = $erro_cap *1;}

			// O CONTADOR TEM QUE SER IGUAL A UM POIS NAO SE PODE TER MAIS DE UMA CONTA COM OPCAIXA 100.
			if (count($array78) == 1 and $erro_cap == 0){$erro_cap_total = 1;}else{$erro_cap_total = 0;}

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
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
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
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#D6E7EF'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
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
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
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
	<div align='center'>
  <center>
  <table border='0' width='550'>
    <tr>
      <td width='50%' bgcolor='#FFC58A'>
  <p align='center'><b><font face='Verdana' color='#800000' size='1'>JUROS/DESCONTO:<br>
  </font><FONT face=Verdana size=1>$jurost</FONT><FONT face=Verdana color='#800000' size=1><br>
  </FONT></b></td>
      <td width='50%' bgcolor='#FFC58A'>
  <p align='center'><B><FONT face=Verdana color='#800000' size=1>DATA PAGAMENTO:<br>
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
	<form method='POST' name ='Form89' action='$PHP_SELF?Action=delformagrupo&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate' onclick=\" return confirm('Deseja cancelar o Pagamento?')\"  >

 <p align='center'><B><FONT face=Verdana color='#800000' size=1>IMPORTANTE:</B> Todos as FORMAS DE PAGAMENTOS relacionados com esse Pagamento serão CANCELADAS<br>
  </FONT>
	<CENTER><input class='sbttn' type='submit' name='OK' value='CANCELAR PAGAMENTO'></CENTER>
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
}

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):


		$codformagruposelect = 1;

		// LISTA OS REGISTROS DOS PAGAMENTOS SELECIONADOS
		$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros", "fin_cap_temp", "codemp=$codempselect", $array78, $array_campo78, "" );

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codpgforma, codformagrupo, bco, ag, cc, numcheq, opcaixa, valor, descricao, codconta", "fin_cap_forma_temp", "codformagrupo=$codfgruposelect", $array79, $array_campo79, "" );
	
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'><img border='0' src='images/bt-continuaped.gif' ><br>
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
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
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

			// PAU NO MYSQL
			#$prod->listProdU("SUM(valor)", "projeto_relacao_custo", "codcap='$codcap'");
			#$soma_cc = $prod->showcampo0();

			$prod->listProdSum("valor", "projeto_relacao_custo","codcap='$codcap'", $array45, $array_campo45, "" );
			$soma_pt = 0;
			for($uy = 0; $uy < count($array45); $uy++ ){
				$prod->mostraProd( $array45, $array_campo45, $uy );
				$soma_p = $prod->showcampo0();
				$soma_pt = $soma_pt + $soma_p;
			}
			
			$soma_cc = $soma_pt;
				
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

			if (stristr($opcaixa, "100.") <> FALSE){$erro_cap = $erro_cap *0;}else{$erro_cap = $erro_cap *1;}

			// O CONTADOR TEM QUE SER IGUAL A UM POIS NAO SE PODE TER MAIS DE UMA CONTA COM OPCAIXA 100.
			if (count($array78) == 1 and $erro_cap == 0){$erro_cap_total = 1;}else{$erro_cap_total = 0;}

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
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
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
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#D6E7EF'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
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
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=delformapg&codpgformaselect=$codpgforma&codcxselect=$codcxselect&codfgruposelect=$codfgruposelect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#contapg'>Excluir</a></B></font></font></td>
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

	<form method='POST' name ='Form89' action='$PHP_SELF?Action=insert&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg' onSubmit = 'if (verificaObrig(Form89, $erro_cap_total)==false) return false'>

	<CENTER><input class='sbttn' type='submit' name='OK' value='PAGAR CONTAS SELECIONADAS'></CENTER>
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
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

		
		<input type='hidden' name='valortpg' value='$valortotal'>	
		<input type='hidden' name='valor_cc' value='$soma_cc_total'>	
		<input type='hidden' name='valortf' value='$valortotalfpg'>	
							 </form>
");
			

			echo("

<br><bR>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tr>
    <td><hr size='1'></td>
  </tr>
</table>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        III</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ADICIONAR FORMAS DE PAGAMENTO DAS CONTAS</font></b></td>
    </tr>
  </tbody>
</table>
<br>	
<div align='center'>
  <center>
  <form method='POST' name ='Form1' action='$PHP_SELF?Action=insformapgch&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#formapg'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber1'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA PG<br>
      </font><font face='Verdana' color='#800000' size='3'>CHEQUE DE 3º</font></b></td>
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
        <td width='57' height='1' bgcolor='#FFFFFF' ><input type='text' name='banco'  size='3' maxlength='3'></td>
        <td width='58' height='1' bgcolor='#FFFFFF' ><input type='text' name='agencia'  size='4' maxlength='4'></td>
        <td width='58' height='1' align='right' bgcolor='#FFFFFF' ><input type='text' name='conta'  size='6' maxlength='10'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' ><input type='text' name='numch'  size='6' maxlength='6'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1' class='sbttn'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><input type='text' name='cbch' size='30' onChange='CopiaCodBarraCheque(this.form);'></td>
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
				  <input type='hidden' name='desloc' value='0'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				   <input type='hidden' name='opcaixa' value='02.01'>
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
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

  </form>
  </center>
</div>

	");

			
			if ($banco == ""  and $numch == ""){
							
				$condicao3 = " codemp='$codempselect'";
				$condicao3 .= " and codcx='$codcxselect'";
				$condicao3 .= " and posfin = 'CX'";
				
			
			}else{
				
				$condicao3 = " (bco like '$banco' AND numcheq like '%$numch%') ";
				$condicao3 .= " and codemp='$codempselect'";
				$condicao3 .= " and codcx='$codcxselect'";
				$condicao3 .= " and posfin = 'CX'";
					

			}
			#echo("$condicao3");


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_cheques", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codch, bco, ag, cc, numcheq, valor, posfin", "fin_cheques", $condicao3, $array, $array_campo, " limit $desloc,$acrescimo " );

			
			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg /$acrescimo);  
			  $pagina = 1;
			endif; 


	echo("
 <a name='formapg'></a>

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>AG.</font></b></div>
    </td>
	  <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>C.C.</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>

	");
	 $prod->clear();
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codch = $prod->showcampo0();
			$bco = $prod->showcampo1();
			$ag = $prod->showcampo2();
			$cc = $prod->showcampo3();
			$numcheq = $prod->showcampo4();
			$valorp = $prod->showcampo5();
			
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
		<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$ag</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$cc</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numcheq</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=insformapg&codch=$codch&codfgruposelect=$codfgruposelect&codcxsaldoselect=$codcxsaldoselect&codcxselect=$codcxselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&insch=1&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#formapg'>Adicionar</a></B></font></font></td>
	</tr>
		");

	

	 }

echo("
				</table>
			
");

if ($Action == "update" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "opcaixaselect=$opcaixaselect&codcxselect=$codcxselect&codfgruposelect=$codfgruposelect&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg";   
include("numcontg.php");
}


		echo("

<div align='center'>
  <center>
  <form method='POST' name ='Form2' action='$PHP_SELF?Action=insformapg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber2'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA PG<br>
      </font><font face='Verdana' color='#800000' size='3' >CHEQUE DE EMPRESA</font></b></td>
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
        <input type='text' name='numcheq' size='6' maxlength='6'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><input type='text' name='cbch' size='30' onChange='CopiaCodBarraCheque(this.form);'></td>
    </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><b>
          <font face='Verdana' size='1'>BANCO</font></b><font face='Verdana' size='1'><b>:
         <select size='1' name='bcofpg'>


            
            ");
	if ($codsuper <> 0){$condicao87 = " and codemp = $codempselect";}

	$prod->listProdSum("codconta, nomebco", "fin_bcoconta", "tipoconta = 'B' " . $condicao87, $array2, $array_campo2, "" );

	for($l = 0; $l < count($array2); $l++ ){
	
			$prod->mostraProd( $array2, $array_campo2, $l );

			$codcontasel = $prod->showcampo0();
			$nomebco = $prod->showcampo1();

			echo("
            <option value='$codcontasel'>$nomebco</option>
           ");

		}

	echo("
				  <option value='' selected></option>	


        </select></b></font></td>
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
				  <input type='hidden' name='opcaixa' value='01.01'>
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
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

  </form>
  </center>
</div>
<p>&nbsp;</p>
<div align='center'>
  <center>
  <form method='POST' name ='Form3' action='$PHP_SELF?Action=insformapg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber3'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA PG<br>
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
					 <input type='hidden' name='opcaixa' value='02.00'>
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
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

  </form>
  </center>
</div>


<br>	
<div align='center'>
  <center>
  <form method='POST' name ='Form4' action='$PHP_SELF?Action=insformapgch&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#formapg1'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber1'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>FORMA PG<br>
      </font><font face='Verdana' color='#800000' size='3'>CHEQUE DO COFRE</font></b></td>
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
        <td width='57' height='1' bgcolor='#FFFFFF' ><input type='text' name='banco'  size='3' maxlength='3'></td>
        <td width='58' height='1' bgcolor='#FFFFFF' ><input type='text' name='agencia'  size='4' maxlength='4'></td>
        <td width='58' height='1' align='right' bgcolor='#FFFFFF' ><input type='text' name='conta'  size='6' maxlength='10'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' ><input type='text' name='numch'  size='6' maxlength='6'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1' class='sbttn'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><input type='text' name='cbch' size='30' onChange='CopiaCodBarraCheque(this.form);'></td>
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
				  <input type='hidden' name='desloc' value='0'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				   <input type='hidden' name='opcaixa' value='02.01'>
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
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

  </form>
  </center>
</div>

	");

			
			if ($banco == ""  and $numch == ""){
							
				$condicao31 = " codemp='$codempselect'";
				#$condicao31 .= " and codcx='$codcxselect'";
				$condicao31 .= " and posfin = 'CO'";
				
			
			}else{
				
				$condicao31 = " (bco like '$banco' AND numcheq like '%$numch%') ";
				$condicao31 .= " and codemp='$codempselect'";
				#$condicao31 .= " and codcx='$codcxselect'";
				$condicao31 .= " and posfin = 'CO'";
					

		
			#echo("$condicao31");

			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_cheques", $condicao31, $array1, $array_campo1, "" );
			$prod->mostraProd( $array1, $array_campo1, 0 );
			$numreg1 = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codch, bco, ag, cc, numcheq, valor, posfin", "fin_cheques", $condicao31, $array1, $array_campo1, " limit $desloc,$acrescimo " );
			}
			
			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg1 /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg1 /$acrescimo);  
			  $pagina = 1;
			endif; 
			

	echo("

 <a name='formapg1'></a>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>AG.</font></b></div>
    </td>
	  <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>C.C.</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 $prod->clear();
	 for($i = 0; $i < count($array1); $i++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $i );

			// DADOS //
			$codch = $prod->showcampo0();
			$bco = $prod->showcampo1();
			$ag = $prod->showcampo2();
			$cc = $prod->showcampo3();
			$numcheq = $prod->showcampo4();
			$valorp = $prod->showcampo5();
			
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
		<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$ag</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$cc</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numcheq</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=insformapg&codch=$codch&codfgruposelect=$codfgruposelect&codcxsaldoselect=$codcxsaldoselect&codcxselect=$codcxselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&insch=1&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#formapg1'>Adicionar</a></B></font></font></td>
	</tr>
		");

	

	 }

echo("
				</table>
			
");

if ($Action == "update" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "opcaixaselect=$opcaixaselect&codcxselect=$codcxselect&codfgruposelect=$codfgruposelect&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg";   
include("numcontg.php");
}


		echo("



			
						
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
		<b>PESQUISA POR:</b><br>
		OPCAIXA: <input type='text' name='opcaixaselect' size='6' maxlength='6'><br>
		CODFOR: <input type='text' name='codforselect' size='6' maxlength='6'>
		<br>
		DE: <input type='text' name='dde' size='2' maxlength='2'>/ <input type='text' name='mde' size='2' maxlength='2'>/ <input type='text' name='ade' size='4' maxlength='4'><br> ATE: <input type='text' name='date' size='2' maxlength='2'>/ <input type='text' name='mate' size='2' maxlength='2'>/ <input type='text' name='aate' size='4' maxlength='4'> 
		<br>
		PAGO DE: <input type='text' name='ddepg' size='2' maxlength='2'>/ <input type='text' name='mdepg' size='2' maxlength='2'>/ <input type='text' name='adepg' size='4' maxlength='4'><br> ATE: <input type='text' name='datepg' size='2' maxlength='2'>/ <input type='text' name='matepg' size='2' maxlength='2'>/ <input type='text' name='aatepg' size='4' maxlength='4'> 
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
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
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA ATUAL<br>
        </b>$nomeempold</font></td>
			
			 <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=newreg&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=$desloc&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'>INSERIR
              NOVA CONTA</a></b></font></td>
				
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='20%'><b><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='25%'>
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

				 <table border='0' width='550' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='21%'></td>
            <td width='6%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAP:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAP:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'><br>
              HISTÓRICO</a></font></b></td>
          </center>
        </tr>
				 <tr>
    <td width='100%' colspan ='5'>
      <hr size='1'>
    </td>
  </tr>
      </table>
<form method='POST' action='$PHP_SELF?Action=update&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'  name='Form7' enctype='multipart/form-data' >
	<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTAGEM DE PAGAMENTOS</b> </font></td>
  </tr>
</table>
				<br>
	<table width='80%' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OC</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	 <td width='15%' height='0'> 
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
			$obs = $prod->showcampo13();
    		$previsao = $prod->showcampo14();
			$codformagrupo = $prod->showcampo15();
			
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 

			$prod->clear();
			$nomefor = "";
			if($codfor <> 0){
			$prod->listProdU("nome", "fornecedor", "codfor=$codfor");
			$nomefor = $prod->showcampo0();
			}
			$count_insert = 0;
			$prod->clear();
			$prod->listProdU("COUNT(*)", "fin_cap_temp", "codcap = '$codcap' ");
			$count_insert = $prod->showcampo0();
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			
			if ($count_insert > 0){$bgcorlinha="#FF9933";}else{$bgcorlinha="#F3F8FA";}
			if ($previsao == "S"){$bgcorlinha = "#FFEC9F";}
			
			
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$descricao</b><br>$nomefor</font><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codoc</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>DEV: <b>R$ $valordevidof</B><BR>REC: R$ $valorpagof<BR><font color='#FF6600'>JUR: R$ $valorjurosf</font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>");
if ($hist == "N"){
echo("
<a
href='$PHP_SELF?Action=inscontapg&codcap=$codcap&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#contapg'>Inserir</a>
");
}else{
echo("

<font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#000000'><b>$datapgf</b><br></font>
PG
");
}
echo("</b></font></td>
<td width='15%' height='0' align='center'>");
	 if ($hist == "N"){
echo("
<font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>
<a
href='$PHP_SELF?Action=delcap&codcap=$codcap&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg'>Excluir</a>
");
}else{
	
	echo ("
		  <font face='Verdana, Arial, Helvetica, sans-serif'
size='-1px' color='000000'>
		<b><a
href='$PHP_SELF?Action=detalhes&codcap=$codcap&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&opcaixaselect=$opcaixaselect&opcaixaselect1=$opcaixaselect1&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddeped=$ddeped&mdeped=$mdeped&adeped=$adeped&dateped=$dateped&mateped=$mateped&aateped=$aateped&pedlib=$pedlib&codcxselect=$codcxselect&codfgruposelect=$codformagrupo'>Detalhes</a></b><br>
 </font>
		  
		  ");
/*
$prod->listProdSum("descricao", "fin_cap_forma", "codformagrupo = $codformagrupo", $array56, $array_campo56, "GROUP by opcaixa" );

 for($u = 0; $u < count($array56); $u++ ){
			
			$prod->mostraProd( $array56, $array_campo56, $u );

			// DADOS //
			$descricao_forma = $prod->showcampo0();

echo("
<font face='Verdana, Arial, Helvetica, sans-serif'
size='-1px' color='000000'>

<li>$descricao_forma</li><br>

</font>
");

}//FOR
*/
}
echo("</b></font></td>
	</tr>
		");
	 }
	 echo("
				</table>
	");

if ($Action == "list" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "opcaixaselect=$opcaixaselect&codcxselect=$codcxselect&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg";   
include("numcontg.php");
}


		echo("

					<BR><BR><bR>
 <a name='contapg'></a>
		");

			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros, obs", "fin_cap_temp", "codemp=$codempselect", $array78, $array_campo78, "" );

echo("
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PAGAMENTO(S) SELECIONADO(S)</b> </font></td>
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
    <td width='35%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OC</font></b></div>
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
			$obs = $prod->showcampo13();
			
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 

			$prod->clear();
			$nomefor = "";
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
size='1'><b>$descricao</b><br>$nomefor</font><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF0000'>$nf</FONT><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codoc</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valordevidof</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=delcontapg&codcap=$codcap&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate&ddepg=$ddepg&mdepg=$mdepg&adepg=$adepg&datepg=$datepg&matepg=$matepg&aatepg=$aatepg#contapg'>Excluir</a></B></font></font></td>
		");

	$valortotal = $valortotal + $valordevido;

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

");
if($erro_cap){
echo("
					 <table border='0' width='100%' cellspacing='1'>
  <tr>
    <td width='100%'>
      <p align='center'><img border='0' src='images/erro.gif' width='35' height='33'><font face='Verdana' size='1' color='#FF0000'><b><br>
      $erro_cap</b></font></td>
  </tr>
</table>
");
}

if ($valortotal <> 0){
echo("
					<CENTER><input class='sbttn' type='submit' name='OK' value='PAGAR CONTAS SELECIONADAS'></CENTER>
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
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

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
		if ($descricao == ""){$descricao = "Não existe esta OPCAIXA";$erro_opcaixa = 1;}else{$erro_opcaixa = 0;}
		
	}else{
		$erro_opcaixa = 1;

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
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
                  
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='1' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
					   <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form3' enctype='multipart/form-data' >
					   <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'></font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='opcaixaselect' size='6' >
			                          
                              </font> <input class='sbttn' type='submit' name='OK' value='Selecionar => OPCAIXA'>
							 <input type='hidden' name='retorno' value=''>
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
								    <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				    <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

							 </td> </form>
							<form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data' onSubmit = 'if (verificaObrigInsert(Form, $erro_opcaixa)==false) return false'>
						 <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></td>
                          </tr>
							 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Num. Documento:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='numdocnew' size='40' >
			                          
                              </font></td>
								<tr bgcolor='#D6E7EF'> 
                             <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OPCAIXA</font></b></td>
                            <td width='74%' ><font color='#FF3300' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text'  name='opcaixanew' value ='$opcaixaselect' size='6' > <b>:: $descricao</B>
			                          
                              </font> </td>
							  </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod. Fornecedor:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='codfornew' size='10' onChange='verificaNumerico(this.form, this.form.codfor.name, 1)' > <br>(OBS.: Este campo não é obrigatorio, torna-se necessário o seu preenchimento somente quando a CONTA A PAGAR estiver relacionada com um FORNECEDOR) 
			                          
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
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod. OC:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='codocnew' size='13'  onChange='verificaNumerico(this.form, this.form.codoc.name, 1)'><br>(OBS.: Este campo não é obrigatorio, torna-se necessário o seu preenchimento somente quando a CONTA A PAGAR estiver relacionada com uma ORDEM DE COMPRA) 
			                          
                              </font></td>
                          </tr>
								  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OBS.:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' name='obs' size='40' >
			                          
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
					    <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
				   <input type='hidden' name='ddepg' value='$ddepg'>
				  <input type='hidden' name='mdepg' value='$mdepg'>
				  <input type='hidden' name='adepg' value='$adepg'>
				  <input type='hidden' name='datepg' value='$datepg'>
				  <input type='hidden' name='matepg' value='$matepg'>
				  <input type='hidden' name='aatepg' value='$aatepg'> 

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


/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
