

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataos DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "ADMINISTRAÇÃO";
$subtitulo = "ORDEM DE SERVIÇO";

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
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}

$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		

		if ($retorno){


			if ($tipo_serv == 2){
				$prod->clear();
				$prod->listProdU("codcliente","pedido", "codbarra = '$codbarra_pedref'");
				$codcliente_ped = $prod->showcampo0();
			
			if ($codclienteselect <> $codcliente_ped){$verif = 1;}else{$verif = 0;}

			}else{

				$verif = 0;

			}

			if ($verif == 0){

				// ATUALIZA BANCO DE DADOS DE PEDIDOS
				
				$prod->clear();
				$prod->listProd("os", "codos=$codos");
				$libentr = $prod->showcampo36();
				$cb = $prod->showcampo34();
				$caixa = $prod->showcampo35();
                $codoco_sist = $prod->showcampo53();
                
				$prod->setcampo4($tipo_serv);
				$dataprevent = $aprev.$mprev.$dprev;
				$prod->setcampo13($dataprevent);
				$prod->setcampo16($statusos);  // STATUS
				$prod->setcampo17($contato);
				$prod->setcampo18($dddtel1);
				$prod->setcampo19($tel1);
				$prod->setcampo20($dddtel2);
				$prod->setcampo21($tel2);
				$prod->setcampo22($os_descricao_equip);
				$prod->setcampo23($os_defeito_apres);
				$prod->setcampo24($os_laudo);
				$prod->setcampo25($os_servico_execut);
				$prod->setcampo26($serv_coletar);
				$prod->setcampo27($serv_entregar);
				$prod->setcampo28($serv_onsite);
				$prod->setcampo43($codbarra_pedref);  // CODBARRA PEDIDO REFERENCIA
				$prod->setcampo44($codbarra_osref);  // CODBARRA OS REFERENCIA
				$prod->setcampo40($obs);
				$prod->setcampo45($codvend_tec); // TIPO OS
				$prod->setcampo46($os_orcamento);
				$datanota = $anota.$mnota.$dnota;
				$prod->setcampo50($datanota);
				$prod->setcampo51($nota);
				$prod->setcampo53($codocoselect);
				if ($statusos == "LIB" and $caixa == "OK"){
					$prod->setcampo36("OK");  // LIB. ENTREGA
				}else{
					if ($xlibentr == "OK"){
						$prod->setcampo36("OK");  // LIB. ENTREGA
					}else{
						$prod->setcampo36("NO");  // LIB. ENTREGA
					}
				}
				if ($statusos == "ENTR" and $libentr == "OK"){
					$prod->setcampo36("OK");  // LIB. ENTREGA
					$prod->setcampo29(1);  // HISTORICO
					$prod->setcampo14($dataatual);  // DATA ENTREGA
				}
				if ($statusos == "CANCEL" and $cb == "NO"){
					$prod->setcampo29(1);  // HISTORICO
					$prod->setcampo37("OK");  // CANCEL - TOTAL
				}

				$prod->upProd("os", "codos=$codos");


					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statusos);
					$prod->setcampo4($login);

					$prod->addProd("os_status", $ureg);
					
					
               


				$Actionsec="list";
				
			}else{

				$erro_ped = "O CODIGO DO PEDIDO não pertence ao CLIENTE escolhido.";

					$Actionsec="seclist";
			}

			

		}

		
        break;

    case "update":

		$Actionsec="seclist";
						
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;

	 case "atualizaval":


		 // ATUALIZA BANCO DE DADOS DE PEDIDOS
				
				$prod->clear();
				$prod->listProd("os", "codos=$codos");

				$vs = str_replace(',','.',$vs);
				$vd = str_replace(',','.',$vd);
				#$vprod = str_replace(',','.',$vprod);
				
				$prod->setcampo7($vprod);	// VALOR TABELA
				$prod->setcampo11($vs);		// VALOR SERVICO
				$prod->setcampo47($vd);		// VALOR DESCONTO/ACRESCIMO
				$prod->setcampo48($vprod);  // VALOR PROD
			
				$prod->upProd("os", "codos=$codos");

		$Actionsec="seclist";
			
		 break;


	 case "addproduto":

		#-- Separa os produtos do Conjunto
		
		$nprod= $cont;
		$contcj=1;
		$contcjold=0;
			
		#-- UP/ADD os produtos na tabela PEDPRODTEMP
		for($i = 0; $i < $cont; $i++ ){

		
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
					$prod->clear();
					$prod->listProdU("pvacj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo15();
					$prod->clear();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");					
				else:
					#-- Unidade
					$prod->clear();
					$prod->listProdU("pva", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo14();
					$prod->clear();
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
					$prod->clear();
					$prod->listProdU("pvvcj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo13();
					$prod->clear();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");
					
				else:
					#-- Unidade
					$prod->clear();
					$prod->listProdU("pvv", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo12();
					$prod->clear();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;
			
		}

		#-- CALCULA PRECOS - FIM

			if ($codprodcj[$i] == ""){$codprodcj[$i]=0;}
		
			$qtdenew=$qtde[$i];
			$preconew = $preco[$i];

			$prod->clear();
			$prod->setcampo1($codos);
			$prod->setcampo2($codprod[$i]);
			$prod->setcampo7($codprodcj[$i]);
			$prod->setcampo8($tipoprod[$i]);
			$prod->setcampo9($tipocj[$i]);
			$prod->setcampo4($preconew);
			$prod->setcampo5($dataatual);
			$prod->setcampo3($qtdenew);
			$prod->setcampo10("");
			$prod->setcampo11("NV");
					
				if ($qtdenew > 0 ):
					$prod->setcampo0("");
					$prod->addProd("os_prod", $ureg);
				endif;

			// ATUALIZA ESTOQUE
			$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");
			$reserva = $prod->showcampo4();
	
			$reservanovo = $reserva + 1;
			$prod->setcampo4($reservanovo);
			$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");
			
		}// FOR
		}
		$Actionsec="seclist";
		
	
		
	    break;

	   case "delprod":

			$prod->listProdU("codprod","os_prod", "codpos= $codpos");
			$codprod = $prod->showcampo0();
	
			// ATUALIZA ESTOQUE
			$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod");
			$reserva = $prod->showcampo4();
	
			$reservanovo = $reserva - 1;
			$prod->setcampo4($reservanovo);
			$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod");


			// DELETE PRODUTO DO PEDIDO
				$prod->delProd("os_prod", "codpos=$codpos");

				
				$Actionsec="seclist";

	    break;

	case "verifnserie":

		$erro_cb = "";
		
		$prod->clear();
		$senha = base64_encode("$senha_tec");
		$prod->listProdU("IF (senha = '$senha' , 'S', 'N')","vendedor", "codvend='$codlogin_tec'");
		$verif_senha = $prod->showcampo0();

		echo("vs=$verif_senha - $nserie[0] - $codprod[0]- $cont");
		
	 //	VERIFICA SE LOGIN DO TECNICO ESTÁ CORRETO
 	 if ($verif_senha == 'S'){
		
		for($i = 0; $i < $cont; $i++ ){

			#echo("A = $reg - $codcb - $nserie[$i] - $codprod[$i] - $codempselect<br>");

		if ($nserie[$i] <> ""){
		
			//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
			$prod->clear();
			$reg = $prod->listProdU("codcb","codbarra", "codbarra = '$nserie[$i]' and codbarraped <> '1' and codprod=$codprod[$i] and codemp=$codempselect");
			$codcb = $prod->showcampo0();

			#echo("$reg - $codcb - $nserie[$i] - $codprod[$i] - $codempselect<br>");

			if ($codcb <> ""){

				$prod->clear();
				$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
				$login_tec = $prod->showcampo0();

				//GRAVAR DADOS NA TABELA OS_PROD
				$prod->clear();
				$prod->listProd("os_prod", "codpos=$codpos[$i]");
				$prod->setcampo10($codcb);
				$prod->setcampo12($login_tec);
				$prod->upProd("os_prod", "codpos=$codpos[$i]");

				//BLOQUEIA CODBARRA PARA USO
				$prod->clear();
				$prod->listProd("codbarra", "codcb='$codcb'");
				$prod->setcampo14($codos);
				$prod->setcampo7(1);
				$prod->upProd("codbarra", "codcb='$codcb'");

				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");
				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				
				$qtdenovo = $qtdeold - 1;
				$reservanovo = $reserva - 1;
				$prod->setcampo3($qtdenovo);
				$prod->setcampo4($reservanovo);
				$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod[$i]");

				$prod->clear();
				$prod->listProd("os", "codos=$codos");
					$prod->setcampo34("OK");  // PRODUTO FOI RETIRADO DO ESTOQUE
				$prod->upProd("os", "codos=$codos");

					//MODIFICACOES NA OS
					//ADICIONAR
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($codprod[$i]);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb);
					$prod->setcampo5("");
					$prod->setcampo6("");
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");
					$prod->addProd("os_mod", $ureg);

			 }

		} // NSERIE VAZIO

		}//FOR


	 }else{ 

		$erro_cb = "LOGIN ou SENHA: incorretos";

	 } //LOGIN CORRETO

	 	$Actionsec="seclist";

	    break;


	case "verifnseriedev":

		$erro_cb = "";
		
		$prod->clear();
		$senha = base64_encode("$senha_tec");
		$prod->listProdU("IF (senha = '$senha' , 'S', 'N')","vendedor", "codvend='$codlogin_tec'");
		$verif_senha = $prod->showcampo0();
		
	 //	VERIFICA SE LOGIN DO TECNICO ESTÁ CORRETO
 	 if ($verif_senha == 'S'){

	 if ($exclui_all <> "S"){

	  // VERIFICA O PRODUTO ESCOLHIDO ATRAVES DO CODBARRA FORNECIDO
	  if ($verif_opera == 1){ 
				
		if ($nserie_dev <> ""){

			//IDENTIFICA CODPROD
			$prod->clear();
			$prod->listProdU("codprod","os_prod", "codpos = '$codpos_dev_verif'");
			$codprod = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("codtipo_serv, codbarra_pedref","os", "codos = '$codos'");
			$codtipo_serv = $prod->showcampo0();
			$codbarra_pedref = $prod->showcampo1();

			$prod->clear();
			$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
			$login_tec = $prod->showcampo0();
			$login_resp_dev = $login_tec;
		
			//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
			#$prod->clear();
			#$reg = $prod->listProdU("codcb","codbarra", "codbarra = '$nserie_dev' and codos = '$codos' and codprod = '$codprod'");
			#$codcb = $prod->showcampo0();
			#$codprod = $prod->showcampo1();

			#echo("$reg - $codcb - $nserie_dev - $codprod - $codpos_dev_verif - $codos - td= $tipo_dev<br>");

			#if ($codcb <> ""){
			if ($tipo_dev <> "OK"){ // DEVOLUCAO NORMAL

				$prod->clear();
				$reg = $prod->listProdU("codcb","codbarra", "codbarra = '$nserie_dev' and codos = '$codos' and codprod = '$codprod'");
				$codcb = $prod->showcampo0();
				#$codprod = $prod->showcampo1();

				$prod->clear();
				$prod->listProdU("codpos","os_prod", "codcb = '$codcb'");
				$codpos_dev_t = $prod->showcampo0();

				#echo("$codpos_dev_t - $codpos_dev_verif");
				if ($codpos_dev_t == $codpos_dev_verif){

					//DESBLOQUEIA CODBARRA PARA USO
					$prod->clear();
					$prod->listProd("codbarra", "codcb='$codcb'");
					$prod->setcampo14("");
					$prod->setcampo7("");
					$prod->upProd("codbarra", "codcb='$codcb'");

					// ATUALIZA ESTOQUE
					$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod");
					$qtdeold = $prod->showcampo3();
		
					$qtdenovo = $qtdeold + 1;
					$prod->setcampo3($qtdenovo);
					$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod");

					//DELETA DADOS NA TABELA OS_PROD
					$prod->clear();
					$prod->delProd("os_prod", "codpos=$codpos_dev_verif");
					$verif_opera = 0;
					$nserie_dev = "";
					$codpos_dev_verif = "";

					
					$prod->clear();
					$prod->listProdU("COUNT(*)","os_prod", "codos = '$codos'");
					$num_prod = $prod->showcampo0();

					if ($num_prod == 0 ){
						
						$prod->clear();
						$prod->listProd("os", "codos=$codos");
							$prod->setcampo34("NO");  // PRODUTO FOI RETIRADO DO ESTOQUE
						$prod->upProd("os", "codos=$codos");

					}

						//MODIFICACOES NA OS
						//EXCLUI
						$prod->setcampo0("");
						$prod->setcampo1($codos);
						$prod->setcampo2($codprod);
						$prod->setcampo3(1);
						$prod->setcampo4($codcb);
						$prod->setcampo5("");
						$prod->setcampo6("");
						$prod->setcampo7($dataatual);
						$prod->setcampo8($login);
						$prod->setcampo9("DV");
						$prod->addProd("os_mod", $ureg);


				}else{

					$erro_dev = "CODBARRA não corresponde ao COD ITEM.";

				}

			 }else{ // DEVOLUCAO USADOS

				
				if ($codtipo_serv == 2){

					  $prod->clear();
					  $prod->listProdU("codped, codemp","pedido", "codbarra = '$codbarra_pedref'");
					  $codped_t = $prod->showcampo0();
  					  $codemp_t = $prod->showcampo1();

					  //DADOS DO PRODUTO DO PEDIDO
					  $prod->clear();
					  $prod->listProdU("codcb, codprod","codbarra", "codbarra = '$nserie_dev' and codped = '$codped_t'");
					  $codcb_ped = $prod->showcampo0();
					  $codprod_ped = $prod->showcampo1();
  					
						  $prod->clear();
						  $prod->listProdU("ppu, codcb","pedidoprod", "codprod = '$codprod_ped' and codped = '$codped_t'");
						  $ppu = $prod->showcampo0();
						  $ppu = (-1)*$ppu;
						  
						  $prod->clear();
						  $prod->listProdU("codpped, codcb","pedidoprod", "codprod = '$codprod_ped' and codped = '$codped_t' and codcb like '%$codcb_ped%'");
  						  $codp_ped = $prod->showcampo0();
						  $codcb_pedprod = $prod->showcampo1();


					  //DADOS DO PRODUTO DA OS
					  $prod->clear();
					  $prod->listProdU("codcb, codprod, ppu","os_prod", "codpos = '$codpos_dev_verif' and codos = '$codos'");
					  $codcb_os = $prod->showcampo0();
  					  $codprod_os = $prod->showcampo1();
   					  $ppu_os = $prod->showcampo2();

										
					  //CODBARRA PEDIDO
					  $prod->clear();
					  $prod->listProd("codbarra", "codcb='$codcb_ped'");
					  $codprodcj = $prod->showcampo5();
					  $tipocj = $prod->showcampo6();
					  $prod->setcampo4(-8000);
					  $prod->setcampo5(0);
					  $prod->setcampo6(0);
					  $prod->setcampo7(1);
					  $prod->setcampo8($codempselect);
					  $prod->upProd("codbarra", "codcb='$codcb_ped'");

					  //CODBARRA OS
					  $prod->clear();
					  $prod->listProd("codbarra", "codcb='$codcb_os'");
					  $prod->setcampo4($codped_t);
					  $prod->setcampo5($codprodcj);
					  $prod->setcampo6($tipocj);
					  $prod->setcampo7(1);
  					  $prod->setcampo8($codemp_t);
					  $prod->upProd("codbarra", "codcb='$codcb_os'");
					
						// MODIFICA CODBARRA DO PEDIDO PROD
						$codcb_array = explode(":", $codcb_pedprod);
						for($i = 0; $i < count($codcb_array); $i++ ){
							if ($codcb_array[$i] == $codcb_ped){$codcb_array[$i] = $codcb_os;}
						}
						$codcb_pedprod_atual = implode(":", $codcb_array);

						$prod->clear();
						$prod->listProd("pedidoprod", "codpped = '$codp_ped'");
							$prod->setcampo10($codcb_pedprod_atual);	
							$prod->setcampo2($codprod_os);	
						$prod->upProd("pedidoprod", "codpped = '$codp_ped'");
  						
					
							//MODIFICACOES NO PEDIDO
							//EXCLUI
							$prod->setcampo0("");
							$prod->setcampo1($codped_t);
							$prod->setcampo2($codprod_ped);
							$prod->setcampo3(1);
							$prod->setcampo4($codcb_ped);
							$prod->setcampo5($codprodcj);
							$prod->setcampo6($tipocj);
							$prod->setcampo7($dataatual);
							$prod->setcampo8($login);
							$prod->setcampo9("EX");
							$prod->addProd("pedidomod", $ureg);
							//ADICIONA	
							$prod->setcampo0("");
							$prod->setcampo1($codped_t);
							$prod->setcampo2($codprod_os);
							$prod->setcampo3(1);
							$prod->setcampo4($codcb_os);
							$prod->setcampo5($codprodcj);
							$prod->setcampo6($tipocj);
							$prod->setcampo7($dataatual);
							$prod->setcampo8($login);
							$prod->setcampo9("AD");
							$prod->addProd("pedidomod", $ureg);

						
					  // ATUALIZA TABELA DE PROD OS	
					  $prod->clear();
					  $prod->setcampo0("");
					  $prod->setcampo1($codos);
					  $prod->setcampo2($codprod_ped);
					  $prod->setcampo4($ppu);
					  $prod->setcampo5($dataatual);
					  $prod->setcampo3(1);
					  $prod->setcampo10($codcb_ped);
					  $prod->setcampo11("D");
					  $prod->setcampo12($login_tec);
  					  $prod->setcampo13($ppu_os);
					  $prod->setcampo14($codpos_dev_verif);
					  $prod->addProd("os_prod", $ureg);

							//MODIFICACOES NO PEDIDO
							//EXCLUI
							$prod->setcampo0("");
							$prod->setcampo1($codos);
							$prod->setcampo2($codprod_ped);
							$prod->setcampo3(1);
							$prod->setcampo4($codcb_ped);
							$prod->setcampo5($codprodcj);
							$prod->setcampo6($tipocj);
							$prod->setcampo7($dataatual);
							$prod->setcampo8($login);
							$prod->setcampo9("TR-PED");
							$prod->addProd("os_mod", $ureg);
							//ADICIONA	
							$prod->setcampo0("");
							$prod->setcampo1($codos);
							$prod->setcampo2($codprod_os);
							$prod->setcampo3(1);
							$prod->setcampo4($codcb_os);
							$prod->setcampo5($codprodcj);
							$prod->setcampo6($tipocj);
							$prod->setcampo7($dataatual);
							$prod->setcampo8($login);
							$prod->setcampo9("TR-OS");
							$prod->addProd("os_mod", $ureg);
					
					

					$verif_opera = 0;
					$nserie_dev = "";
					$codpos_dev_verif = "";


				}else{
					
					$erro_dev = "Operação não permitida : O.S. não é de GARANTIA";

				}


			 }

		} // NSERIE VAZIO

	  }else{ // VERIFICACAO DA DEVOLUCAO

			  $prod->clear();
	   	 	  $prod->listProdU("codtipo_serv, codbarra_pedref","os", "codos = '$codos'");
			  $codtipo_serv = $prod->showcampo0();
			  $codbarra_pedref = $prod->showcampo1();
  			
				if ($codtipo_serv == 2){
					
	  		      $prod->clear();
 			      $prod->listProdU("codped,  dataped","pedido", "codbarra = '$codbarra_pedref'");
			      $codped_t = $prod->showcampo0();
  			      $dataped_t = $prod->showcampo1();

				  //VERIFICA SE CODBARRA PERTENCE AO PEDIDO
				  $prod->clear();
				  $prod->listProdU("codcb, codprod, codprodcj","codbarra", "codbarra = '$nserie_dev' and codped = $codped_t");
				  $codcb_t = $prod->showcampo0();
				  $codprod_t = $prod->showcampo1();
				  $codprodcj_t = $prod->showcampo2();

 			      #echo("$codbarra_pedref - $codped_t <br>");

				  #echo("cb = $codcb_t");

				
				  if ($codcb_t <> ""){
					
					 // VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
				     $prod->clear();
					 $prod->listProdU("gar_um, gar_cj","pedidoprod", "codcb like '%$codcb_t%' and codprod = '$codprod_t' and codped = '$codped_t'");
					 $gar_um = $prod->showcampo0();
 					 $gar_cj = $prod->showcampo1();

					 if ($gar_um == 0){$gar_um = 12;}
 					 if ($gar_cj == 0){$gar_cj = 12;}

					 if ($codprodcj_t <> 0){$gar = $gar_cj;}else{$gar = $gar_um;}

					$prod->listProdMY("'$dataped_t' + INTERVAL $gar MONTH ", "" , $array129, $array_campo129, "" );
					$prod->mostraProd( $array129, $array_campo129, 0 );
					$data_limite = $prod->showcampo0();

					$prod->listProdMY("IF ('$data_limite' > NOW() , 'S', 'N')", "" , $array128, $array_campo128, "" );
					$prod->mostraProd( $array128, $array_campo128, 0 );
					$garantia = $prod->showcampo0();

					$garantia = "S"; // DESBLOQUEIO DA GARANTIA 11/04/2005
					 if ($garantia == "S"){

						// VERIFICA A EXITENCIA DO CODPOS
						$prod->clear();
						$prod->listProdU("COUNT(*)","os_prod", "codpos = '$codpos_dev_verif' and codos = '$codos'");
						$pos_existe = $prod->showcampo0();

						$prod->clear();
						$prod->listProdU("tipo_estoque","os_prod", "codpos = '$codpos_dev_verif' and codos = '$codos'");
						$tipo_estoque = $prod->showcampo0();

						// VERIFICA A EXITENCIA DO CODPOS_TROCA
						$prod->clear();
						$prod->listProdU("COUNT(*)","os_prod", "codpos_troca = '$codpos_dev_verif' and codos = '$codos'");
						$postroca_existe = $prod->showcampo0();

						if ($pos_existe <> 0 ){

						 if ($postroca_existe == 0 and $tipo_estoque <> "D"){

							//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
							$prod->clear();
							$prod->listProdU("codprod","codbarra", "codbarra = '$nserie_dev' and codped = '$codped_t'");
							$codprod_v = $prod->showcampo0();

							$prod->clear();
							$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
							$login_resp_dev = $prod->showcampo0();

							if($codprod_v <> ""){
								$prod->clear();
								$prod->listProdU("nomeprod","produtos", "codprod = '$codprod_v'");
								$nomeprod_dev = $prod->showcampo0();
								$verif_opera = 1;
							}else{
								$nomeprod_dev = "Nenhum Produto";
							}
							

							//MOSTRA GARANTIA
							#$prod->clear();
							#$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
							#$login_resp_dev = $prod->showcampo0();

						 }else{

							$erro_dev = "COD ITEM foi trocado em um PEDIDO";

						 }


						}else{

							$erro_dev = "COD ITEM não consta na lista de produtos da O.S.";

						}
						
					 }else{


						//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
							$prod->clear();
							$prod->listProdU("codprod","codbarra", "codbarra = '$nserie_dev' and codped = '$codped_t'");
							$codprod_v = $prod->showcampo0();

							$prod->clear();
							$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
							$login_resp_dev = $prod->showcampo0();

							if($codprod_v <> ""){
								$prod->clear();
								$prod->listProdU("nomeprod","produtos", "codprod = '$codprod_v'");
								$nomeprod_dev = $prod->showcampo0();
								$verif_opera = 0;
							}else{
								$nomeprod_dev = "Nenhum Produto";
							}

						$erro_dev = "PRODUTO fora de GARANTIA.";

					 }

					

				  }else{ //CODABARRA NAO PERTENCE AO PEDIDO
					
					// VERIFICA A EXITENCIA DO CODPOS
					$prod->clear();
					$prod->listProdU("COUNT(*)","os_prod", "codpos = '$codpos_dev_verif' and codos = '$codos'");
					$pos_existe = $prod->showcampo0();

					$prod->clear();
					$prod->listProdU("tipo_estoque","os_prod", "codpos = '$codpos_dev_verif' and codos = '$codos'");
					$tipo_estoque = $prod->showcampo0();

					// VERIFICA A EXITENCIA DO CODPOS_TROCA
					$prod->clear();
					$prod->listProdU("COUNT(*)","os_prod", "codpos_troca = '$codpos_dev_verif' and codos = '$codos'");
					$postroca_existe = $prod->showcampo0();

					echo("$postroca_existe - $codpos_dev_verif");
				
					if ($pos_existe <> 0){

					 if ($postroca_existe == 0 and $tipo_estoque <> "D"){

						//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
						$prod->clear();
						$prod->listProdU("codprod","codbarra", "codbarra = '$nserie_dev'");
						$codprod_v = $prod->showcampo0();

						$prod->clear();
						$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
						$login_resp_dev = $prod->showcampo0();

						if($codprod_v <> ""){
							$prod->clear();
							$prod->listProdU("nomeprod","produtos", "codprod = '$codprod_v'");
							$nomeprod_dev = $prod->showcampo0();
							$verif_opera = 1;
						}else{
							$nomeprod_dev = "Nenhum Produto";
						}


						//MOSTRA GARANTIA
						#$prod->clear();
						#$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
						#$login_resp_dev = $prod->showcampo0();


					 }else{

							$erro_dev = "COD ITEM foi trocado em um PEDIDO";

					 }


					}else{

						$erro_dev = "COD ITEM não consta na lista de produtos da O.S.";

					}
					

				  }



				}else{//NAO E GARANTIA

					// VERIFICA A EXITENCIA DO CODPOS
					$prod->clear();
					$prod->listProdU("COUNT(*)","os_prod", "codpos = '$codpos_dev_verif' and codos = '$codos'");
					$pos_existe = $prod->showcampo0();

				
					if ($pos_existe <> 0){

						//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
						$prod->clear();
						$prod->listProdU("codprod","codbarra", "codbarra = '$nserie_dev'");
						$codprod_v = $prod->showcampo0();

						$prod->clear();
						$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
						$login_resp_dev = $prod->showcampo0();

						if($codprod_v <> ""){
							$prod->clear();
							$prod->listProdU("nomeprod","produtos", "codprod = '$codprod_v'");
							$nomeprod_dev = $prod->showcampo0();
							$verif_opera = 1;
						}else{
							$nomeprod_dev = "Nenhum Produto";
						}


						//MOSTRA GARANTIA
						#$prod->clear();
						#$prod->listProdU("nome","vendedor", "codvend = '$codlogin_tec'");
						#$login_resp_dev = $prod->showcampo0();


					}else{

						$erro_dev = "COD ITEM não consta na lista de produtos da O.S.";

					}
					

				}

			
	  }

	 }else{ // EXCLUI ALL





				


	 }
		
	 }else{ 

		$erro_dev = "LOGIN ou SENHA: incorretos";
		$verif_opera = 0;

	 } //LOGIN CORRETO

	 	$Actionsec="seclist";

	    break;


	case "addforma":

		// DELETE PRODUTO DO PEDIDO
		$prod->delProd("os_parcelas", "codos=$codos");

		//DADOS DA OS
		$prod->listProdU("vs, vt, codvend_tec, dataos, vdesc, vprod","os", "codos=$codos");
		$vs = $prod->showcampo0();
		$vt = $prod->showcampo1();
		$codvend_tec = $prod->showcampo2();
		$dataos = $prod->showcampo3();
		$vdesc = $prod->showcampo4();
		$vprod = $prod->showcampo5();
		if ($vprod < 0 ){$vprod = 0;}

		$valortotalprod = $vprod + $vdesc;
		$valortotalos = $vs + $valortotalprod;

		#echo("$valortotalprod - $valortotalos<br>");

		$prod->listProd("empresa", "codemp=$codempselect");
		$descmax = $prod->showcampo18();
		$fatorvista = $prod->showcampo20();
		$taxa = $prod->showcampo21();
		$tac = $prod->showcampo22();
		#echo("t=$taxa");
		$prod->listProd("vendedor", "codvend='$codvend_tec'");
		$fatorcusto = $prod->showcampo6(); 

		#echo("$fatorcusto<br>cv=$codvend_tec");
		
		$dataatual = $prod->gdata();

		for($p = 0; $p < $nump; $p++ ){

			#if ($valor[$p] <> 0){
		
				$datap[$p] = $avenc[$p].$mvenc[$p].$dvenc[$p];
				$difdias = $prod->numdias($dataos,$datap[$p]); 
				$n = ($difdias/30);
				$valor[$p] = str_replace('.','',$valor[$p]);
				$valor[$p] = str_replace(',','.',$valor[$p]);
				#if ($valortotalos <> 0){
					$valori[$p] = $valor[$p]*($valortotalprod/$valortotalos);
				#}
				$valorp[$p] = $valori[$p]/(pow((1+($taxa/100)),$n));

			#}

			#echo("v=$valor[$p] - vp=$valorp[$p] - v=$valori[$p] - df=$difdias - n=$n<br>");

		// CALCULO DO VALOR DE VENDA A VISTA ( SOMATORIO DAS PARCELAS CONVERTIDAS PARA VALOR PRESENTE )
			$valorvendavista = $valorvendavista + $valorp[$p];
			$valorvenda = $valorvenda + $valor[$p];
		}
		#echo("vvista = $valorvendavista<br>");
		#$valorvendavista = $valorvendavista - $vs;
		// CALCULO DO VALOR DE TABELA A VISTA
		$valortotaltabela = $vprod;
		$valortotaltabelavista = $valortotaltabela*$fatorvista;

		$valorcustovista = ($valortotaltabelavista*$fatorcusto);
			
		#echo(" vvista(vpv)=$valorvista - ");

		$valorminimovenda = $valortotaltabelavista*($descmax/100);
		#if ($valortotaltabelavista == 0){$valorminimovenda = $vs + $vdesc;}

		#echo("vmin=$valorminimovenda<br>");
		
		$impostodif = $valorvendavista - $valortotaltabelavista;
				if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

		
		// CALCULO DA COMISSAO

			// MARGEM DE LUCRO BRUTO
			$mlb = $valorvendavista - $valorcustovista - $impostodif;
			//MARGEM DE CONTRIBUICAO DE VENDA
			if ($valortotaltabelavista <> 0){
				$mcv = (1000*($mlb)/$valortotaltabelavista); 
			}

		#echo("valortotaltabela = $valortotaltabela<br> valortotaltabelavista = $valortotaltabelavista <br> valorcustovista = $valorcustovista <br> valorvendavista = $valorvendavista <br> impostodif = $impostodif - vs = $vs<BR>");

		// CONSISTENCIA DO PEDIDO
		#echo("vppt(vt)=$valorparceladototal - vpvtabela=$valorvistatabela - vpvminimo=$valorvistaminimo - c=$cota");
		#if ($valorparceladototal > $valorvistaminimo){
		
		
		if ($vdesc <= $valorminimovenda){
		
			
			// INSERE PARCELAS NO BANCO DE DADOS
			$pendfpg=1;
			$dindim =1;
			for($i = 0; $i < $nump; $i++ ){

				#if ($valor[$i] <> 0){
					$prod->clear();
			
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($datap[$i]);
					$prod->setcampo3($valor[$i]);
					$prod->setcampo4($tipoopcaixa[$i]);
					$prod->setcampo5($numch[$i]);
					$prod->setcampo6($banco[$i]);
					$prod->setcampo7($agencia[$i]);
					$prod->setcampo8($conta[$i]);
					$prod->setcampo10("NO");
					$prod->setcampo11("");
					$prod->addProd("os_parcelas", $uregparc);

				#}
			}

		
			
			// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->clear();
			$prod->listProd("os", "codos=$codos");

			$prod->setcampo5($mlb);
			$prod->setcampo6($valorvendavista);
			$prod->setcampo7($valortotaltabela);
			$prod->setcampo8($valorvenda);
			$prod->setcampo9($mcv);
			$prod->setcampo10($valorcustovista);
			$prod->setcampo41($fatorvista);  // FATOR VENDA VISTA - OS
			$prod->setcampo42($taxa);  // FATOR VENDA VISTA - OS

			$prod->upProd("os", "codos=$codos");

	
				$Actionsec="seclist";
							
		}else{
			$Actionter = "lock";
			$prod->msggeral("A ORDEM DE SERVIÇO não foi aceita !", "ERRO", "$PHP_SELF?Action=update&desloc=$desloc&codos=$codos&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}

				
		 break;

		case "insnf":

		 //  VERIFICA SE NF PREENCHIDA
		$prod->listProdU("IF( nf = 'NO', 'S', 'N' ) ", "os", "codos=$codos");
		$falta_nf = $prod->showcampo0();

		#echo("falta_nf= $falta_nf");

		if ($falta_nf == 'S'){

			for($i = 0; $i < $qtdenf; $i++ ){

				$vnf[$i] = str_replace(',','.',$vnf[$i]);

				#echo("nf=$nf[$i] , vnf=$vnf[$i]");
				
				if ($nf[$i] <> "" and $vnf[$i] <> ""){

				// DADOS DA NOTA FISCAL //

				$prod->clear();
				$prod->setcampo1($codos);
				$prod->setcampo2("$nf[$i]");
				$prod->setcampo3($vnf[$i]);
				$prod->addProd("os_nf", $uregnf);

				#echo("cp=$codped_original");

				}

			 }

			// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("os", "codos=$codos");
				$prod->setcampo33("OK");  // NOTA FISCAL
				$prod->upProd("os", "codos=$codos");

		}

		$Actionsec="seclist";
				
		 break;
		 
              	case "cancelprod":
		 
		 // LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, codprod, ppu, codcb, codpos_troca, tipo_estoque, codpos", "os_prod", "codos = $codos and tipo_estoque = 'D'", $array, $array_campo, "ORDER BY codos");

		for($i = 0; $i < count($array); $i++ ){

			$prod->mostraProd( $array, $array_campo, $i );

			//DADOS DO PRODUTO DA OS
			$codos = $prod->showcampo0();
			$codprod_os = $prod->showcampo1();
			$codppu = $prod->showcampo2();
			$codcb_os = $prod->showcampo3();
			$codpos_troca = $prod->showcampo4();
			$tipo_estoque = $prod->showcampo5();
			$codpos_os = $prod->showcampo6();

			$prod->clear();
			$prod->listProdU("codbarra_pedref ","os", "codos=$codos");
			$codbarra_pedref = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("codped, codemp","pedido", "codbarra = '$codbarra_pedref'");
			$codped_t = $prod->showcampo0();
			$codemp_t = $prod->showcampo1();

			$prod->listProdU("codcb, codprod, codpos","os_prod", "codpos='$codpos_troca'");
			$codcb_ped = $prod->showcampo0();
			$codprod_ped = $prod->showcampo1();
			$codpos_ped = $prod->showcampo2();

			  $dataatual = $prod->gdata();

			  $prod->clear();
			  $prod->listProdU("codpped, codcb","pedidoprod", "codprod = '$codprod_ped' and codped = '$codped_t' and codcb like '%$codcb_ped%'");
			  $codp_ped = $prod->showcampo0();
			  $codcb_pedprod = $prod->showcampo1();


			  //CODBARRA PEDIDO
			  $prod->clear();
			  $prod->listProd("codbarra", "codcb='$codcb_ped'");
			  $codprodcj = $prod->showcampo5();
			  $tipocj = $prod->showcampo6();
			  $prod->setcampo4(0);
			  $prod->setcampo5(0);
			  $prod->setcampo6(0);
			  $prod->setcampo7(0);
			  $prod->setcampo8($codempselect);  //IHELP COMERCIAL
			  $prod->upProd("codbarra", "codcb='$codcb_ped'");

			  //CODBARRA OS
			  $prod->clear();
			  $prod->listProd("codbarra", "codcb='$codcb_os'");
			  $prod->setcampo4($codped_t);
			  $prod->setcampo5($codprodcj);
			  $prod->setcampo6($tipocj);
			  $prod->setcampo7(1);
			  $prod->setcampo8($codemp_t);
			  $prod->upProd("codbarra", "codcb='$codcb_os'");

				// MODIFICA CODBARRA DO PEDIDO PROD
				$codcb_array = explode(":", $codcb_pedprod);
				for($j = 0; $j < count($codcb_array); $j++ ){
					if ($codcb_array[$j] == $codcb_ped){$codcb_array[$j] = $codcb_os;}
				}
				$codcb_pedprod_atual = implode(":", $codcb_array);

				$prod->clear();
				$prod->listProd("pedidoprod", "codpped = '$codp_ped'");
					$prod->setcampo10($codcb_pedprod_atual);
					$prod->setcampo2($codprod_os);
				$prod->upProd("pedidoprod", "codpped = '$codp_ped'");

				echo("$codped_t - $codemp_t - $codprod_os - $codcb_os - $codpos_os - $codprod_ped - $codcb_ped - $codpos_ped - $codcb_pedprod - $codcb_pedprod_atual<br>");

					//MODIFICACOES NO PEDIDO
					//EXCLUI
					$prod->setcampo0("");
					$prod->setcampo1($codped_t);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_ped);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("EX");
					$prod->addProd("pedidomod", $ureg);
					//ADICIONA
					$prod->setcampo0("");
					$prod->setcampo1($codped_t);
					$prod->setcampo2($codprod_os);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_os);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");
					$prod->addProd("pedidomod", $ureg);


					// ATUALIZA ESTOQUE
					$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod_ped");
					$qtdeold = $prod->showcampo3();
					$reserva = $prod->showcampo4();
					$qtdenovo = $qtdeold + 1;
					$prod->setcampo3($qtdenovo);
					$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod_ped");


					//MODIFICACOES NO PEDIDO
					//EXCLUI
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_ped);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("TR-PED");
					$prod->addProd("os_mod", $ureg);
					//ADICIONA
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($codprod_os);
					$prod->setcampo3(1);
					$prod->setcampo4($codcb_os);
					$prod->setcampo5($codprodcj);
					$prod->setcampo6($tipocj);
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("TR-OS");
					$prod->addProd("os_mod", $ureg);


					// DELETE PRODUTO DA OS
					$prod->delProd("os_prod", "codpos=$codpos_os");

					// DELETE PRODUTO DA OS
					$prod->delProd("os_prod", "codpos=$codpos_ped");


		}
		$Actionsec="seclist";
		
		break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$statuspesq1 = strtolower($statuspesq);
		
		$campopesq = "nome";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and";
				

		//PESQUISA POR NOME CLIENTE
		if ($statuspesq1){
							
			$condicao3 .= " LCASE(os.status) like '%$statuspesq1%' and ";
		}

	
		//PESQUISA POR STATUS
		if ($palavrachave1){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR CODVEND_TEC
		if ($codvend_tecpesq){
							
			$condicao3 .= " os.codvend_tec = '$codvend_tecpesq' and ";
		}

		//PESQUISA POR TIPO GAR
		if ($tipo_servpesq){
							
			$condicao3 .= " os.codtipo_serv = '$tipo_servpesq' and ";
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " os.codbarra='$codpedpesq' and";
		}
		
	
				$condicao3 .= " os.codemp='$codempselect'";
				$condicao3 .= " and os.hist = '$hist'  ";
				$condicao3 .= " and os.codcliente=clientenovo.codcliente ";
				#$condicao3 .= " and os.codvend_tec=vendedor.codvend ";


		#echo("$condicao3");
		

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "os, clientenovo", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, os.codcliente, os.codvend, dataos, dataprevent, status, horaprevent, nf, libentr, codbarra, caixa, clientenovo.nome, fat, modped, codtipo_serv, codvend_tec", "os, clientenovo", $condicao3, $array, $array_campo, $parm );

		
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "seclist"){

		$acrescimo = 10;
		$tabela = "produtos";					
		$condicao1 = "codprod=$codprod";		
		$condicaoex = " idicj = 'Y'";			
		$parm = " order by nomeprod limit $desloc,$acrescimo ";					

		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE(nomeprod) like '%$palavrachave1%' and unidade not like 'CJ'";
		
		if ($palavrachave == ""){$condicao2 = "unidade not like 'CJ'";}
		
		if ($codprodpesq <> ""){$condicao2 = "codprod=$codprodpesq  and unidade not like 'CJ'";}


		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao2, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, unidade, descres, kit, pvv, lib_linha", $tabela, $condicao2, $array, $array_campo, $parm );
			
			$Action="update";

	

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
function verificaObrig (form) 
{

	if (form.codvend_tec.value == '')
	{
		alert ('Escolha o TÉCNICO responsável pela ORDEM DE SERVIÇO');
		return false;
	}

	if (form.statusos.value == '')
	{
		alert ('Escolha o STATUS da ORDEM DE SERVIÇO');
		return false;
	}


	return true;
}


function ajustqtde(form ,element) {

	if (element.value != 0){
		return 1;
	}
	if (element.value == '' || element.value == 0){
		return 0;
	}
}


function adjust(element) {

	return element.value.replace ('.', ',');
}



</script>



");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "delete"):


	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProd("os", "codos=$codos");
		
		$codemp = $prod->showcampo1();
		$codcliente = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$xcodtipo_serv = $prod->showcampo4();
		$mlb = $prod->showcampo5();
		$vpv = $prod->showcampo6();
		$vt = $prod->showcampo7();
		$vpp = $prod->showcampo8();
		$mcv = $prod->showcampo9();
		$vc = $prod->showcampo10();
		$xvs = $prod->showcampo11();
		$xvd = $prod->showcampo47();
			$mlbf = number_format($mlb,2,',','.'); 
			$mcvf = number_format($mcv,5,',','.'); 
			$vpvf = number_format($vpv,2,',','.'); 
			$vtf = number_format($vt,2,',','.'); 
			$vppf = number_format($vpp,2,',','.'); 
			$vcf = number_format($vc,2,',','.'); 
			$vsf = number_format($xvs,2,',','.'); 
			$vdf = number_format($xvd,2,',','.');
		$xdataos = $prod->showcampo12();
		$xdataosf = $prod->fdata($xdataos);
		$dataprevent = $prod->showcampo13();
		$datapreventf  = $prod->fdata($dataprevent);
		$dataprevent = str_replace('-','',$dataprevent);
			$xaprev = substr($dataprevent,0,4);
			$xmprev = substr($dataprevent,4,2);
			$xdprev = substr($dataprevent,6,2);
		$horaprevent = $prod->showcampo15();
		$status = $prod->showcampo16();
		$xcontato = $prod->showcampo17();
		$xxdddtel1 = $prod->showcampo18();
		$xxtel1 = $prod->showcampo19();
		$xxdddtel2 = $prod->showcampo20();
		$xxtel2 = $prod->showcampo21();
		$xos_descricao_equip = $prod->showcampo22();
		$xos_defeito_apres = $prod->showcampo23();
		$xos_laudo = $prod->showcampo24();
		$xos_servico_execut = $prod->showcampo25();
		$xserv_coletar = $prod->showcampo26();
		$xserv_entregar = $prod->showcampo27();
		$xserv_onsite = $prod->showcampo28();
		$xxobs = $prod->showcampo40();
		$codbarra = $prod->showcampo38();
		$libentr = $prod->showcampo36();
		$caixa = $prod->showcampo35();
		$cb = $prod->showcampo34();
		$nf = $prod->showcampo33();
		$xcodbarra_pedref = $prod->showcampo43();
		$xcodbarra_osref = $prod->showcampo44();
		$xcodvend_tec = $prod->showcampo45();
		$xos_orcamento = $prod->showcampo46();
		$datanota = $prod->showcampo50();
		$datanota = str_replace('-','',$datanota);
			$xanota = substr($datanota,0,4);
			$xmnota = substr($datanota,4,2);
			$xdnota = substr($datanota,6,2);
		$xnota = $prod->showcampo51();
		$cancel = $prod->showcampo37();
		$xcodoco = $prod->showcampo53();

        $prod->clear();
        $prod->listProdU("ocorrencia","pedido_ocorrencia", "codoco='$xcodoco'");
		$xocorrencia=	$prod->showcampo0();
	
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


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();


if ($impressao <> 1){

echo("
 
<a name='topo'></a>
");
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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codos=$codos&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
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
echo("


<form method='POST' action='$PHP_SELF?Action=insert#geral' name='Form77' onSubmit = 'if (verificaObrig(Form77)==false) return false'>

 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='geral'><img border='0' src='images/n1c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>DADOS GERAIS DA O.S.</font></b></td>
      </tr>
    </table>
    </center>
  </div>
	 <br>
  <div align='center'>
    <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
	 
    <tr>
      <td width='50%' bgcolor='#800000'><b><font face='Verdana' color='#FFFFFF' size='2'>ORDEM
        DE SERVIÇO&nbsp;&nbsp;</font></b></td>
    </center>
      <td width='50%' bgcolor='#800000'>
        <p align='right'><b><font face='Verdana' size='3' color='#FBE6BF'>$codbarra</font> </b></td>
    </tr>
    <center>
    <tr>
      <td width='50%' bgcolor='#F3B94B'><b><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA
        OS</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#800000'>:</font><font color='#336699'><br>
        </font><font color='#000000'>$xdataos</font></font></b></td>
      <td width='50%' bgcolor='#F3B94B'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>TÉCNICO:<br>
      </font></b></font><font color='#800000'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>
	                  
	");

	
if ($xcodvend_tec){

	$prod->listProdU("codvend, nome","vendedor", "codvend= $xcodvend_tec");
	$codvend_tec = $prod->showcampo0();
	$tipo_tec = $prod->showcampo1();

echo("	
		$tipo_tec 
");
}else{
echo("
		NENHUM ESCOLHIDO

");
}
echo("

	</font></font></td>
    </tr>

			  <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2'>
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
      <td width='100%' bgcolor='#800000' colspan='2'><b><font face='Verdana' color='#FFFFFF' size='2'>DADOS
        CLIENTE</font></b></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F2F2F2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#800000'>CLIENTE:</font><font color='#336699'><br>
        </font><font color='#000000'>$xnome</font></font></b></td>
      <td width='50%' bgcolor='#F2F2F2'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>CPF/CNPJ:<br>
      </font></b><font color='#000000'>$xcpf $xcnpj</font></font></td>
    </tr>

    <tr>
      <td width='100%' bgcolor='#F2F2F2' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>ENDEREÇO:</font><font color='#336699'><br>
        </font>
        </b><font color='#000000'>$xendereco - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
    </tr>
			  <tr>
      <td width='50%' bgcolor='#F2F2F2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#800000'>EMAIL:</font><font color='#336699'><br>
        </font></font></b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>$xemail</font></font></td>
      <td width='50%' bgcolor='#F2F2F2'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>TELEFONE<br>
      </font></b><font color='#000000'>($xdddtel1) $xtel1<br>($xdddtel2) $xtel2 <br>RAMAL: $xramal<br></font></font></td>
    </tr>
		
			  <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2'>
        <hr size='1'>
      </td>
    </tr>
		
    </table>
    </center>
  </div>

	");
if ($erro_ped){
echo("
<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100'>
        <p align='right'><b><font size='1' face='Verdana' color='#FF0000'><img border='0' src='images/errop.gif' width='25' height='24'></font></b>
      </td>
  <center>
      <td width='450'>
        <b><font size='1' face='Verdana' color='#FF0000'>$erro_ped</font></b>
      </td>
      </tr>
  </table>
  </center>
</div>
");
}
echo("
  <div align='center'>
    <center>
    <table border='0' width='550' cellpadding='2'>
      <tr>
        <td width='536' bgcolor='#800000' colspan='3'><b><font face='Verdana' color='#FFFFFF' size='2'>DADOS
          DA OS</font></b></td>
      </tr>
      <tr>
        <td width='131' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'>TIPO:</font></b></td>
        <td width='203' bgcolor='#F3B94B'><font color='#800000'>
		<select size='1' class=drpdwn name='tipo_serv' >                         
	");

	$prod->listProdgeral("os_tipo", "", $array6, $array_campo6 , "order by tipo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$tipo_serv = $prod->showcampo1();
			$codtipo_serv = $prod->showcampo0();

	echo("		
		<option value='$codtipo_serv'>$tipo_serv</option>
		");
	
	}
if ($xcodtipo_serv)
{
	$prod->listProdU("codtipo_serv, tipo","os_tipo", "codtipo_serv= $xcodtipo_serv");
	$codtipo_serv = $prod->showcampo0();
	$tipo_serv = $prod->showcampo1();

echo("	
		<option value='$codtipo_serv' selected>$tipo_serv</option>
");
}else{
echo("	
		<option value='' selected>ESCOLHA</option>
");
}
echo("
	  </select></font></td>
        <td width='202' bgcolor='#F3B94B'><font color='#800000'><b><font size='1' face='Verdana'>PEDIDO</font></b><font size='1' face='Verdana'><b>:<br>
          </b><input type='text' name='codbarra_pedref' size='14' value='$xcodbarra_pedref' maxlength='13'><B>&nbsp;&nbsp;<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('inicioos_codbarraped.php?Action=list&desloc=$desloc&codos=$codos&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&codbarra_pedref=$xcodbarra_pedref','name','650','400','yes');return false");echo('"');echo(">CODBARRA</a></B></font></font></td>
      </tr>
     <tr>
        <td width='131' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>CONTATO:</font></b></td>
        <td width='203' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='contato' size='20' value='$xcontato'></font></td>
        <td width='202' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>DATA
          NOTA:</font><font size='1' face='Verdana' color='#800000'><br>
        <input type='text' name='dnota' value = '$xdnota' size='2' maxlength='2'>/</font></b><font size='1' face='Verdana'><b><input type='text' name='mnota' value = '$xmnota' size='2' maxlength='2'>/</b></font><font size='1' face='Verdana'><b><input type='text' name='anota' value = '$xanota' size='4' maxlength='4'>
          <br>
          NOTA:<br>
          </b></font><font size='1' face='Verdana' color='#000000'><input type='text' name='nota' size='20' value='$xnota'></font></td>
      </tr>

      <tr>
        <td width='131' rowspan='2' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>TELEFONE:</font></b></td>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='dddtel1' size='3' value='$xxdddtel1'><input type='text' name='tel1' size='10' value='$xxtel1'></font></td>
      </tr>
      <tr>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='dddtel2' size='3' value='$xxdddtel2'><input type='text' name='tel2' size='10' value='$xxtel2'></font></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'>
          <table border='0' width='100%' cellspacing='1'>
            <tr>
			<td width='33%'><b><font size='1' face='Verdana' color='#800000'>
		");
		  if ($xserv_coletar){
	echo("<input type='checkbox' name='serv_coletar' value='OK' checked>COLETAR NO CLIENTE</font></b>");
		 }else{
	echo("<input type='checkbox' name='serv_coletar' value='OK'>COLETAR NO CLIENTE</font></b>");
		  }
		  echo("
        </td>
              <td width='33%'><b><font size='1' face='Verdana' color='#800000'> 
			");
		  if ($xserv_entregar){
	echo("<input type='checkbox' name='serv_entregar' value='OK' checked>ENTREGAR NO CLIENTE</font></b>");
		  }else{
	echo("<input type='checkbox' name='serv_entregar' value='OK'>ENTREGAR NO CLIENTE</font></b>");
		  }
		  echo("
		  </td>
              <td width='34%'><b><font size='1' face='Verdana' color='#800000'> 
			  ");
		  if ($xserv_onsite){
	echo("<input type='checkbox' name='serv_onsite' value='OK' checked>MANUTENÇÃO ON SITE</font></b>");
		
		  }else{
	echo("<input type='checkbox' name='serv_onsite' value='OK'>MANUTENÇÃO ON SITE</font></b>");
		  }
		  echo("</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td width='131' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>REINCIDÊNCIA:</font></b></td>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='codbarra_osref' size='14' value='$xcodbarra_osref' maxlength='13'>
          (colocar o código da última OS deste cliente)</font></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DESCRIÇÃO DO EQUIPAMENTO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='3' name='os_descricao_equip' cols='65' onKeyDown = 'liberaEnter();'>$xos_descricao_equip</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DEFEITO RELATADO PELO CLIENTE:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='3' name='os_defeito_apres' cols='65' onKeyDown = 'liberaEnter();'>$xos_defeito_apres</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          LAUDO TÉCNICO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='7' name='os_laudo' cols='65' onKeyDown = 'liberaEnter();'>$xos_laudo</textarea></font></b></td>
      </tr>
     
      <tr>
        <td width='131' bgcolor='#FFD230'><b><font size='1' face='Verdana' color='#000000'>OCORRÊNCIA DE ERROS DE MONTAGEM:</font></b></td>
        <td width='405' colspan='2' bgcolor='#FFD230'><select name='codocoselect' id='codocoselect'>
");
            $prod->clear();
            $prod->listProdSum("codoco, ocorrencia","pedido_ocorrencia", "hist<>'S' and tipo ='PROD'", $array6, $array_campo6 , "order by ocorrencia");
	for($j = 0; $j < count($array6); $j++ ){

			$prod->mostraProd( $array6, $array_campo6, $j );

			$codoco_list = $prod->showcampo0();
			$ocorrencia_list = $prod->showcampo1();
			echo("

		<option value='$codoco_list'>$ocorrencia_list</option>
		");

}
	echo("
		<option value='0' selected>Escolha a Ocorrência</option>
		");
		if ($xcodoco <> 0){echo("<option value='$xcodoco' selected>$xocorrencia</option>");}
		echo("
             </select></td>
      </tr>
    
       
	 <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'><br>
          DETALHES SOBRE O ORÇAMENTO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#000000'><textarea rows='4' name='os_orcamento' cols='65' onKeyDown = 'liberaEnter();'>$xos_orcamento</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DETALHAMENTO DO SERVIÇO EXECUTADO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='7' name='os_servico_execut' cols='65' onKeyDown = 'liberaEnter();'>$xos_servico_execut</textarea></font></b></td>
      </tr>
				<tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'><br>
          OBSERVAÇÕES:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#000000'><textarea rows='4' name='obs' cols='65' onKeyDown = 'liberaEnter();'>$xxobs</textarea></font></b></td>
      </tr>

  

    </table>
    </center>
  </div>

<br>
");
if ($hist == 0){
 echo("
  <div align='center'>
    <center>
    <table border='0' width='550' cellpadding='2'>
      <tr>
        <td width='536' colspan='3' bgcolor='#800000'>
          <b><font size='1' face='Verdana' color='#800000'>
          </font><font size='2' face='Verdana' color='#FFFFFF'>STATUS DA OS:</font></b></td>
      </tr>
      <tr>
        <td width='268' bgcolor='#FFFFAA' >
          <font face='Verdana' size='1'><b>ESCOLHA DO TÉCNICO</b></font></td>
        <td width='134' bgcolor='#FFFFAA' >
        <select size='1' class=drpdwn name='codvend_tec' >                         
		&nbsp;");

	$prod->listProdSum("codvend, nome","vendedor", "block <> 'Y' and codgrp = 38", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nome_tec = $prod->showcampo1();
			$codvend_tec = $prod->showcampo0();

	echo("
	<option value='$codvend_tec'>$nome_tec</option>
    
	");
	
	}
if ($xcodvend_tec){

	$prod->listProdU("codvend, nome","vendedor", "codvend= $xcodvend_tec");
	$codvend_tec = $prod->showcampo0();
	$tipo_tec = $prod->showcampo1();

echo("	
		<option value='$codvend_tec' selected>$tipo_tec</option>
");
}else{
echo("	
		<option value='' selected>ESCOLHA</option>
");
}
echo("

	  </select></td>
        <td width='134' bgcolor='#FFFFAA' rowspan='3'>
          <input type='submit' value='GRAVAR OS' name='B1'></td>
      </tr>
      <tr>
        <td width='268' bgcolor='#FFFFAA' >
          <font face='Verdana' size='1'><b>ALTERAR STATUS</b></font></td>
        <td width='134' bgcolor='#FFFFAA' >
          <select size='1' class=drpdwn name='statusos'>
                             
						  
		<option value='DIAG'>DIAG</option>
		<option value='MAN APROV'>MAN APROV</option>
		<option value='MAN REPROV'>MAN REPROV</option>
		<option value='ORC'>ORC</option>
		<option value='LIB'>LIB</option>
");
if ($libentr == "OK"){
echo("
        <option value='ENTR'>ENTR</option>
");
}
if ($cb <> "OK"){
echo("
        <option value='CANCEL'>CANCEL</option>
");
}
echo("
		<option selected>ESCOLHA</option>

						  </select></td>
      </tr>

  <tr>
        <td width='402' bgcolor='#FFFFAA' colspan='2'>
        <p><font face='Verdana' size='1' color='#800000'><b><input type='checkbox' name='xlibentr' value='OK'>AUTORIZAR
  A ENTREGA SEM PAGAMENTO</b></font></p>
</td>
      </tr>
    </table>
    </center>
  </div>






		 <input type='hidden' name='retorno' value='1'>
		 <input type='hidden' name='desloc' value='0'>
		 <input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		 <input type='hidden' name='codos' value='$codos'>
		 <input type='hidden' name='tipocliente' value='$tipocliente'>
		 <input type='hidden' name='codempselect' value='$codempselect'>
		 <input type='hidden' name='codclienteselect' value='$codcliente'>



</form>
");
} // HISTORICO
echo("
 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='orc'><img border='0' src='images/n2c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>ORÇAMENTO
          DA O.S.</font></b></td>
      </tr>
    </table>
    </center>
  </div>
");
if (($caixa <> "OK" OR $cancel <> 'OK') and $hist == 0){
 echo("
	<form method='POST' action='$PHP_SELF?Action=verifnserie#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
      <tr>
        <td width='542' colspan='7' bgcolor='#F3B94B'>
          <p align='left'><font face='Verdana' size='2'><b>LISTA DE PEÇAS UTILIZADAS NA
          O.S.<br>
          </b></font><font face='Verdana' size='1'>Lista de peças que estão
          sendo usados na Ordem de Serviço.</font></td>
      </tr>
    <center>
      <tr>
		 <td width='13' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'></font></b></td>
		 <td width='30' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>COD<br>ITEM.</font></b></td>
        <td width='131' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>DATA<br>
          REQ.</font></b></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='69' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='75' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>VALOR<br>
          (R$)</font></b></td>
      </tr>
");
$prod->listProdSum("codprod, datastatus, qtde, ppu, tipo_estoque, login, codpos, codcb", "os_prod", "codos=$codos and tipo_estoque <> 'D'", $array1, $array_campo1, "order by codprod" );


 for($i = 0; $i < count($array1); $i++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $i );

			$codprod_lista = $prod->showcampo0();
			$datareq = $prod->showcampo1();
			$qtde = $prod->showcampo2();
			$valor = $prod->showcampo3();
			$tipo_estoque = $prod->showcampo4();
			$login_resp = $prod->showcampo5();
			$codpos = $prod->showcampo6();
			$codcb = $prod->showcampo7();
			$datareqf = $prod->fdata($datareq);

			$prod->clear();			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_lista");
			$nomeprod_lista = $prod->showcampo0();


			$valorf = number_format($valor,2,',','.'); 

			if ($tipo_estoque == "D"){$cor1 = '#FF9866';}else{$cor1 = '#FEF7E9';}

echo("
      <tr bgcolor = '$cor1'>
        <td width='13'  align='center'>
");
if ($codcb == ""){
echo("
	  <a href='$PHP_SELF?Action=delprod&codos=$codos&codpos=$codpos&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=0&codempselect=$codemp#orc'><img border='0' src='images/msg_empty.png' width='11' height='13'></a>
");
}
echo("
</td>
	 <td width='30'  align='center'><font size='1' face='Verdana'>$codpos</font></td>
        <td width='131' align='center'><b><font size='1' face='Verdana'>$nomeprod_lista</font></b></td>
        <td width='78'  align='center'><font size='1' face='Verdana'>$datareqf</font></td>
        <td width='122'  align='center'>
");
if ($codcb <> ""){

	$prod->clear();			
	$prod->listProdU("codbarra", "codbarra", "codcb='$codcb'");
	$codbarra_prod = $prod->showcampo0();

echo("
	<b><font size='1' face='Verdana' color = '#339900'>$codbarra_prod</font></b>
");
}else{
echo("
		<input type='text' name='nserie[$i]' size='16'>
");
}
echo("
		</td>
        <td width='69'  align='center'><font size='1' face='Verdana'>$login_resp</font></td>
        <td width='75'  align='center'><b><font size='1' face='Verdana'>$valorf</font></b></td>
      </tr>
			<input type='hidden' name='codprod[$i]' value='$codprod_lista'>
			<input type='hidden' name='codpos[$i]' value='$codpos'>
");

		$valortprod = $valortprod + $valor;
 }//FOR
 $cont1 = $i;
 $cont1a = $i;
 echo("
  <tr>
        <td width='542' colspan='7' bgcolor='#F3B94B'>
          <p align='left'><font face='Verdana' size='2'><b>LISTA DE PEÇAS DEVOLVIDAS (somente garantia)<br>
          </b></font><font face='Verdana' size='1'>Lista de peças que foram devolvida de algum pedido por estar com defeito.</font></td>
      </tr>
    <center>
      <tr>
		 <td width='13' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'></font></b></td>
		 <td width='30' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>COD<br>ITEM.</font></b></td>
        <td width='131' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>DATA<br>
          REQ.</font></b></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='69' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='75' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>VALOR<br>
          (R$)</font></b></td>
      </tr>
");
$prod->listProdSum("codprod, datastatus, qtde, ppu, tipo_estoque, login, codpos, codcb", "os_prod", "codos=$codos and tipo_estoque = 'D'", $array1, $array_campo1, "order by codprod" );


 for($i = 0; $i < count($array1); $i++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $i );

			$codprod_lista = $prod->showcampo0();
			$datareq = $prod->showcampo1();
			$qtde = $prod->showcampo2();
			$valor = $prod->showcampo3();
			$tipo_estoque = $prod->showcampo4();
			$login_resp = $prod->showcampo5();
			$codpos = $prod->showcampo6();
			$codcb = $prod->showcampo7();
			$datareqf = $prod->fdata($datareq);

			$prod->clear();			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_lista");
			$nomeprod_lista = $prod->showcampo0();

			


			$valorf = number_format($valor,2,',','.'); 

			if ($tipo_estoque == "D"){$cor1 = '#FDFCCE';}else{$cor1 = '#FEF7E9';}

echo("
      <tr bgcolor = '$cor1'>
        <td width='13'  align='center'>
");
if ($codcb == ""){
echo("
	  <a href='$PHP_SELF?Action=delprod&codos=$codos&codpos=$codpos&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=0&codempselect=$codemp#orc'><img border='0' src='images/msg_empty.png' width='11' height='13'></a>
");
}
echo("
</td>
	 <td width='30'  align='center'><font size='1' face='Verdana'>$codpos</font></td>
        <td width='131' align='center'><b><font size='1' face='Verdana'>$nomeprod_lista</font></b></td>
        <td width='78'  align='center'><font size='1' face='Verdana'>$datareqf</font></td>
        <td width='122'  align='center'>
");
if ($codcb <> ""){

	$prod->clear();			
	$prod->listProdU("codbarra", "codbarra", "codcb='$codcb'");
	$codbarra_prod = $prod->showcampo0();

echo("
	<b><font size='1' face='Verdana' color = '#339900'>$codbarra_prod</font></b>
");
}else{
echo("
		<input type='text' name='nserie[$cont1]' size='16'>
");
}
echo("
		</td>
        <td width='69'  align='center'><font size='1' face='Verdana'>$login_resp</font></td>
        <td width='75'  align='center'><b><font size='1' face='Verdana'>$valorf</font></b></td>
      </tr>
			<input type='hidden' name='codprod[$cont1]' value='$codprod_lista'>
			<input type='hidden' name='codpos[$cont1]' value='$codpos'>
");

		$valortprod = $valortprod + $valor;
		$cont1 = $cont1 +1;	
 }//FOR
 $cont2 = $i;
 echo("
      <tr>
        <td width='174' bgcolor='#FEF7E9' colspan='3'>&nbsp;</td>
        <td width='78' bgcolor='#FEF7E9'>&nbsp;</td>
        <td width='122' bgcolor='#FEF7E9'>&nbsp;</td>
        <td width='69' bgcolor='#FEF7E9'>&nbsp;</td>
        <td width='75' bgcolor='#FEF7E9'>&nbsp;</td>
      </tr>
      <tr>
        <td width='174' bgcolor='#FBE6BF' colspan='3'>&nbsp;</td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana'>LOGIN TEC.</font></b><br>
          <select size='1' class=drpdwn name='codlogin_tec' >                         
		&nbsp;");

	$prod->listProdSum("codvend, nome","vendedor", "block <> 'Y' and codgrp = 38", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nome_tec = $prod->showcampo1();
			$codvend_tec = $prod->showcampo0();

	echo("
	<option value='$codvend_tec'>$nome_tec</option>
    
	");
	
	}
echo("	
		<option value='' selected>ESCOLHA</option>

	  </select></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana'>SENHA</font></b><br>
         <input type='password' name='senha_tec' size='7' maxlength='8'></td>
        <td width='69' bgcolor='#FBE6BF'>
          <p align='center'><input type='submit' value='OK' name='B1'></td>
        <td width='75' bgcolor='#FBE6BF'>&nbsp;</td>
      </tr>
    </table>
    </center>
  </div>
");
$cont = $cont1a+$cont2;
echo("
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='cont' value='$cont'>
		<input type='hidden' name='pg' value='$pg'>


</form>
");
if ($erro_cb){
echo("
<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100'>
        <p align='right'><b><font size='1' face='Verdana' color='#FF0000'><img border='0' src='images/errop.gif' width='25' height='24'></font></b>
      </td>
  <center>
      <td width='450'>
        <b><font size='1' face='Verdana' color='#FF0000'>$erro_cb</font></b>
      </td>
      </tr>
  </table>
  </center>
</div>
");
}
echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <hr size='0'>
      </td>
    </tr>
  </table>
  </center>
</div>
");
	if ($valortprod < 0 ){$valortprod = 0;}
	$valortprodf = number_format($valortprod,2,',','.'); 
	
echo("
<form method='POST' action='$PHP_SELF?Action=atualizaval#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
    <center>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#000000'>VALOR&nbsp;<br>
          PRODUTOS</font></b></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $valortprodf</b></font></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#000000'>DESCONTO/ACRESCIMO</font></b></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          <input type='text' name='vd' value='$vdf' size='11' onKeyUp='this.value = adjust(this);' ></b></font></td>
      </tr>
");
$valorfprod = $xvd + $valortprod;
$valorfprodf = number_format($valorfprod,2,',','.'); 

echo("
      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#808080'>SUBTOTAL<br>
          ORDEM SERVIÇO</font></b></td>
        <td width='130' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#808080'>R$
          $valorfprodf</font></b></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana' color='#000000'><b>VALOR
          SERVIÇOS</b></font></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          <input type='text' name='vs' value='$vsf' size='11' onKeyUp='this.value = adjust(this);' ></b></font></td>
      </tr>
");
$valortotal = $xvs + $valorfprod;
$valortotalf = number_format($valortotal,2,',','.'); 

echo("

      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#800000'>TOTAL<br>
          ORDEM SERVIÇO</font></b></td>
        <td width='130' bgcolor='#FFFFFF' align='center'><b><font size='2' face='Verdana' color='#800000'>R$
          $valortotalf</font></b></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'>&nbsp;</td>
        <td width='130' bgcolor='#FFFFFF' align='center'><input type='submit' value='INSERIR VALORES' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='vprod' value='$valortprod'>
</form>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <hr size='0'>
      </td>
    </tr>
  </table>
  </center>
</div>
");
$data_limitef = $prod->fdata($data_limite);
echo("

<form method='POST' action='$PHP_SELF?Action=verifnseriedev#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
      <tr>
        <td width='100%' bgcolor='#800000' colspan='5'>
          <p align='left'><font face='Verdana' color='#FFFFFF' size='2'><b>DEVOLUÇÃO:<br>
          </b></font><font face='Verdana' color='#FFFFFF' size='1'>Devolução
          de produtos da lista acima ou de produtos usados, diferentes da lista
          acima e que sejam garantia.</font></td>
      </tr>
    <center>
      <tr>
        <td width='33%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='17%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='16%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana' color='#800000'>COD.<br>
          ITEM.</font></b></td>
        <td width='17%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='17%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana' color='#800000'>GARANTIA</font></b></td>
      </tr>
      <tr>
        <td width='33%' bgcolor='#FEF7E9' align='center'><b><font size='1' face='Verdana'>$nomeprod_dev</font></b></td>
        <td width='17%' bgcolor='#FEF7E9' align='center'>
          <p align='center'><input type='text' name='nserie_dev' size='16' value ='$nserie_dev'></td>
        <td width='16%' bgcolor='#FEF7E9' align='center'>
          <input type='text' name='codpos_dev_verif' size='4' value = '$codpos_dev_verif'></td>
        <td width='17%' bgcolor='#FEF7E9' align='center'><font size='1' face='Verdana'>$login_resp_dev</font></td>
        <td width='17%' bgcolor='#FEF7E9' align='center'>$data_limitef</td>
      </tr>
      <tr>
        <td width='33%' bgcolor='#E3AEAE' align='center'><font size='1' face='Verdana'><b>&nbsp;<input type='checkbox' name='tipo_dev' value='OK' ");if ($tipo_dev == 'OK'){echo("checked");}echo(">
            PRODUTO USADO</b></font></td>
        <td width='17%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana'>LOGIN</font></b><br>
            <select size='1' class=drpdwn name='codlogin_tec' >                         
		&nbsp;");

	$prod->listProdSum("codvend, nome","vendedor", "block <> 'Y' and codgrp = 38", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nome_tec = $prod->showcampo1();
			$codvend_tec = $prod->showcampo0();

	echo("
	<option value='$codvend_tec'>$nome_tec</option>
    
	");
	
	}
echo("	
		<option value='' selected>ESCOLHA</option>

	  </select></td>
        <td width='16%' bgcolor='#E3AEAE' align='center'><b><font size='1' face='Verdana'>SENHA</font></b><br>
         <input type='password' name='senha_tec' size='7' maxlength='8'></td>
        <td width='34%' bgcolor='#E3AEAE' align='center' colspan='2'>
		 ");
if ($verif_opera == 1){
echo("
	<input type='submit' value='EFETUAR DEVOLUÇÃO' name='B1'>
");
}else{
echo("
	  <input type='submit' value='VERIFICAR' name='B1'>
");
}
echo("
	  </td>
      </tr>
    </table>
    </center>
  </div>

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='verif_opera' value='$verif_opera'>
		<input type='hidden' name='pg' value='$pg'>
</form>



");
if ($erro_dev){
echo("
<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100'>
        <p align='right'><b><font size='1' face='Verdana' color='#FF0000'><img border='0' src='images/errop.gif' width='25' height='24'></font></b>
      </td>
  <center>
      <td width='450'>
        <b><font size='1' face='Verdana' color='#FF0000'>$erro_dev</font></b>
      </td>
      </tr>
  </table>
  </center>
</div>
");
}
echo("

<form method='POST' action='$PHP_SELF?Action=cancelprod'>
	<p align='center'><input type='submit' value='CANCELAR PRODUTOS' name='B1' onclick=\" return confirm ('Deseja excluir todos os produtos?')\" ></p>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
</form>



 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='addprod'><img border='0' src='images/n3c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>ESCOLHA DE PRODUTOS</font></b></td>
      </tr>
    </table>
    </center>
  </div>



	<form method='POST' action='$PHP_SELF?Action=update#addprod' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>

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

<table border='0' width='550' align='center'>
  <tr>
    <td width='100%'>
          <form method='POST' name = 'form88' action='$PHP_SELF?Action=addproduto#orc' >
            <table border='0' width='100%'>
              <tr bgcolor='$bgcortopo1'> 
                <td width='5%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'></font></b></td>
				<td width='60%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>NOME PRODUTO&nbsp;</font></b></td>
				<td width='5%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>UN</font></b></td>
                <td width='10%' align='center' nowrap height='5' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></td>
                <td width='20%' align='center' nowrap ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>PU(R$)</font></b></td>
                
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

			
			// CALCULA TODO O ESTOQUE
			$prod->clear();
			$prod->listProdU("qtde, reserva", "estoque" , "codprod = $codprod[$i] and codemp = $codemp GROUP BY codprod");
			$qtde = $prod->showcampo0();
			$reserva = $prod->showcampo1();

			if ($reserva < 0 ){$reserva = 0;}
			if ($qtde < 0 ){$qtde = 0;}
			$estoque = $qtde - $reserva;

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod, oc ", "codprod = $codprod[$i] and ocprod.codemp=$codemp and hist<>1 and oc.codoc=ocprod.codoc");
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
	

	if ($unidade[$i] == "UM"){$cor ="#D6E7EF";}else{$cor="#F3F8FA";}
	if ($kit == "Y"){$cor ="#C7E9C0";}


	if ($kit_no <> 1 and $linha_no <> 1){
					
		echo("
		 <tr bgcolor='$cor'> 
				<td width='5%' align = 'center'><font face='Verdana' size='1'>$alarm</font></td>
				<td width='60%' ><font face='Verdana' size='1' color='#990000'>$codprod[$i] - $nomeprod</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></td>
				<td width='5%' align='center' ><font face='Verdana' size='1'>$unidade[$i]</font></td>
                <td width='10%' align='center' ><font face='Verdana' size='1'> 
                 <input type='text' name='qtde[$i]' size='4' maxlength='3' value='0' onKeyUp='this.value = ajustqtde(form88, this);'>

	</font></td>
                <td width='20%' align='center' ><font face='Verdana' size='1'><strong>$ppuf</strong></font></td>
              
              </tr>
			  <input type='hidden' name='codprod[$i]' value='$codprod[$i]'>
				<input type='hidden' name='unidade[$i]' value='$unidade[$i]'>
		");
	 }
	 
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
				  <input type='hidden' name='codos' value='$codos'>
				  <input type='hidden' name='codclienteselect' value='$codcliente'>
                  <input type='hidden' name='codvendselect' value='$codvend'>
				  <input type='hidden' name='codempselect' value='$codemp'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='retorno' value='$retorno'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
			      <input type='hidden' name='connectok' value='$connectok'>
                <input type='hidden' name='pg' value='$pg'>
				  
      </form>
    </td>
  </tr>
</table>


  </center>
</div>



  </center>
</div>
");
if ($Action == "update" ){
/// CONTADOR DE PAGINAS ////
$Action= "update";
$compl= "codos=$codos&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg#addprod";   
/// Complemento para a parte de mudanca de pagina
include("numcontg.php");
}


echo("
<br><br>
 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='formapg'><img border='0' src='images/n4c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>FORMA DE PAGAMENTO</font></b></td>
      </tr>
    </table>
    </center>
  </div>
");

 $prod->listProdgeral("os_parcelas", "codos=$codos", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparc = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipo'");
			$tarifa = $prod->showcampo0();
			#$valorparc = $valorparc + $tarifa;
			$valorparcf[$ji] = number_format($valorparc,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricaoold[$ji] = $prod->showcampo1();

			$datavenc = str_replace('-','',$datavenc);
			$xanopar[$ji] = substr($datavenc,0,4);
			$xmespar[$ji] = substr($datavenc,4,2);
			$xdiapar[$ji] = substr($datavenc,6,2);

			$xtipo[$ji] = $tipo;

			

	}//FOR

	$xnump = count($array61);

echo("

	
		

	 <form name='form1' method='post' action='$PHP_SELF?Action=update&desloc=0'>

<br>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
 
  <tr><form>
    <td width='60%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>  <select size='1' class=drpdwn name='nump' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                             
						  
	");
	if ($nump == 0){$nump=1;}
	if ($xnump <> 0 and $libparc == 0){$nump=$xnump;}

	for($j = 1; $j < 13; $j++ ){
			
		echo("		
		<option value='$PHP_SELF?Action=update&desloc=0&codos=$codos&nump=$j&retlogin=$retlogin&connectok=$connectok&pg=$pg&libparc=1#formapg'>$j</option>
		");
	
	}
	

	echo("	

		<option value='' selected>Número de Parcelas</option>
		
						  </select><br>
  </td></form>
   <td width='40%'><font size='1' face='Verdana'><b><p align='center'></b></font></td>
   
 </tr>
</table>


<form method='POST' action='$PHP_SELF?Action=addforma#formapg'  name='Form' >
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='40%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='40%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		
      </tr>
");

if ($xnump == 0){
	$dataatual = $prod->gdata();
	$anopar = substr($dataatual,0,4);
	$mespar = substr($dataatual,4,2);
	$diapar = substr($dataatual,6,2);
}
for($op = 0; $op < $nump; $op++ ){

if ($xnump == 0){
	if ($mespar > 12){$mespar=1;$anopar++;}
	if (strlen($mespar)==1){$mespar = '0'.$mespar;}
}

		
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='40%'>
		 <input type='text' name='dvenc[$op]'");if ($xnump <> 0){echo("value='$xdiapar[$op]'");}else{echo("value='$diapar'");}echo(" size='2' maxlength='2'>/
	  <input type='text' name='mvenc[$op]'  ");if ($xnump <> 0){echo("value='$xmespar[$op]'");}else{echo("value='$mespar'");}echo(" size='2' maxlength='2'>/
		  <input type='text' name='avenc[$op]'   ");if ($xnump <> 0){echo("value='$xanopar[$op]'");}else{echo("value='$anopar'");}echo(" size='4' maxlength='4'>
		  </td>
        <td width='20%' ><input type='text' name='valor[$op]'  value='$valorparcf[$op]' size='8' onKeyUp='this.value = adjust(this);' ></td>
        <td width='40%' ><select size='1' name='tipoopcaixa[$op]'>
");
		 for($l = 0; $l < count($xopcaixashow); $l++ ){

			  
			if ($xopcaixashow[$l] <> ""){
				$prod->listProd("formapg", "opcaixa='$xopcaixashow[$l]'");
					
				$descricao = $prod->showcampo1();
			
			
		 

echo("
            <option value='$xopcaixashow[$l]'>$descricao</option>
          
");
			}
		 }
echo("
		  <option selected>Escolha</option>
		   <option value='$xtipo[$op]' selected>$descricaoold[$op]</option>
          </select></td>
      
			  </tr>

   


");
$mespar++;
}
echo("

	<tr >
        <td width='40%'><font size='1' face='Verdana' ></font></td>
        <td width='20%'><font size='1' face='Verdana' ></font></td>
        <td width='40%' align='center'><font size='1' face='Verdana' color='#ffffff'><input  type='submit' value='INSERIR FORMA PG' name='B1'></font></td>
		
      </tr>
    </table>
    </center>
  </div>
	


			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
 		    <input type='hidden' name='codos' value='$codos'>
			<input type='hidden' name='codpedselect' value='$codpedselect'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='pgold' value='$pgold'>



 <div align='center'>
    <center>
   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='274'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='274' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
    </tr>

	 </table>

 </center>
  </div>

</form>
");
}else{ // CAIXA OK
echo("

	<form method='POST' action='$PHP_SELF?Action=verifnserie#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
      <tr>
        <td width='542' colspan='7' bgcolor='#F3B94B'>
          <p align='left'><font face='Verdana' size='2'><b>LISTA DE PEÇAS UTILIZADAS NA
          O.S.<br>
          </b></font><font face='Verdana' size='1'>Lista de peças que estão
          sendo usados na Ordem de Serviço.</font></td>
      </tr>
    <center>
      <tr>
		 <td width='13' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'></font></b></td>
		 <td width='30' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>COD<br>ITEM.</font></b></td>
        <td width='131' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>DATA<br>
          REQ.</font></b></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='69' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='75' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>VALOR<br>
          (R$)</font></b></td>
      </tr>
");
$prod->listProdSum("codprod, datastatus, qtde, ppu, tipo_estoque, login, codpos, codcb", "os_prod", "codos=$codos and tipo_estoque <> 'D'", $array1, $array_campo1, "order by codprod" );


 for($i = 0; $i < count($array1); $i++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $i );

			$codprod_lista = $prod->showcampo0();
			$datareq = $prod->showcampo1();
			$qtde = $prod->showcampo2();
			$valor = $prod->showcampo3();
			$tipo_estoque = $prod->showcampo4();
			$login_resp = $prod->showcampo5();
			$codpos = $prod->showcampo6();
			$codcb = $prod->showcampo7();
			$datareqf = $prod->fdata($datareq);

			$prod->clear();			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_lista");
			$nomeprod_lista = $prod->showcampo0();


			$valorf = number_format($valor,2,',','.'); 

			if ($tipo_estoque == "D"){$cor1 = '#FF9866';}else{$cor1 = '#FEF7E9';}

echo("
      <tr bgcolor = '$cor1'>
        <td width='13'  align='center'>

</td>
	 <td width='30'  align='center'><font size='1' face='Verdana'>$codpos</font></td>
        <td width='131' align='center'><b><font size='1' face='Verdana'>$nomeprod_lista</font></b></td>
        <td width='78'  align='center'><font size='1' face='Verdana'>$datareqf</font></td>
        <td width='122'  align='center'>
");
if ($codcb <> ""){

	$prod->clear();			
	$prod->listProdU("codbarra", "codbarra", "codcb='$codcb'");
	$codbarra_prod = $prod->showcampo0();

echo("
	<b><font size='1' face='Verdana' color = '#339900'>$codbarra_prod</font></b>
");
}else{
echo("
		&nbsp;
");
}
echo("


		</td>
        <td width='69'  align='center'><font size='1' face='Verdana'>$login_resp</font></td>
        <td width='75'  align='center'><b><font size='1' face='Verdana'>$valorf</font></b></td>
      </tr>
			<input type='hidden' name='codprod[$i]' value='$codprod_lista'>
			<input type='hidden' name='codpos[$i]' value='$codpos'>
");
		$valortprod = $valortprod + $valor;
 }
 echo("
      
     <tr>
        <td width='542' colspan='7' bgcolor='#F3B94B'>
          <p align='left'><font face='Verdana' size='2'><b>LISTA DE PEÇAS DEVOLVIDAS (somente garantia)<br>
          </b></font><font face='Verdana' size='1'>Lista de peças que foram devolvida de algum pedido por estar com defeito.</font></td>
      </tr>
    <center>
      <tr>
		 <td width='13' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'></font></b></td>
		 <td width='30' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>COD<br>ITEM.</font></b></td>
        <td width='131' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>DATA<br>
          REQ.</font></b></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='69' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='75' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>VALOR<br>
          (R$)</font></b></td>
      </tr>
");
$prod->listProdSum("codprod, datastatus, qtde, ppu, tipo_estoque, login, codpos, codcb", "os_prod", "codos=$codos and tipo_estoque ='D'", $array1, $array_campo1, "order by codprod" );


 for($i = 0; $i < count($array1); $i++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $i );

			$codprod_lista = $prod->showcampo0();
			$datareq = $prod->showcampo1();
			$qtde = $prod->showcampo2();
			$valor = $prod->showcampo3();
			$tipo_estoque = $prod->showcampo4();
			$login_resp = $prod->showcampo5();
			$codpos = $prod->showcampo6();
			$codcb = $prod->showcampo7();
			$datareqf = $prod->fdata($datareq);

			$prod->clear();			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_lista");
			$nomeprod_lista = $prod->showcampo0();


			$valorf = number_format($valor,2,',','.'); 

			if ($tipo_estoque == "D"){$cor1 = '#FDFCCE';}else{$cor1 = '#FEF7E9';}

echo("
      <tr bgcolor = '$cor1'>
        <td width='13'  align='center'>

</td>
	 <td width='30'  align='center'><font size='1' face='Verdana'>$codpos</font></td>
        <td width='131' align='center'><b><font size='1' face='Verdana'>$nomeprod_lista</font></b></td>
        <td width='78'  align='center'><font size='1' face='Verdana'>$datareqf</font></td>
        <td width='122'  align='center'>
");
if ($codcb <> ""){

	$prod->clear();			
	$prod->listProdU("codbarra", "codbarra", "codcb='$codcb'");
	$codbarra_prod = $prod->showcampo0();

echo("
	<b><font size='1' face='Verdana' color = '#339900'>$codbarra_prod</font></b>
");
}else{
echo("
		&nbsp;
");
}
echo("


		</td>
        <td width='69'  align='center'><font size='1' face='Verdana'>$login_resp</font></td>
        <td width='75'  align='center'><b><font size='1' face='Verdana'>$valorf</font></b></td>
      </tr>
			<input type='hidden' name='codprod[$i]' value='$codprod_lista'>
			<input type='hidden' name='codpos[$i]' value='$codpos'>
");
		$valortprod = $valortprod + $valor;
 }
 echo("
    </table>
    </center>
  </div>
		
	

</form>
");
if ($erro_cb){
echo("
<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100'>
        <p align='right'><b><font size='1' face='Verdana' color='#FF0000'><img border='0' src='images/errop.gif' width='25' height='24'></font></b>
      </td>
  <center>
      <td width='450'>
        <b><font size='1' face='Verdana' color='#FF0000'>$erro_cb</font></b>
      </td>
      </tr>
  </table>
  </center>
</div>
");
}
echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <hr size='0'>
      </td>
    </tr>
  </table>
  </center>
</div>
");
	$valortprodf = number_format($valortprod,2,',','.'); 

echo("
<form method='POST' action='$PHP_SELF?Action=atualizaval#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
    <center>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#000000'>VALOR&nbsp;<br>
          PRODUTOS</font></b></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $valortprodf</b></font></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#000000'>DESCONTO/ACRESCIMO</font></b></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $vdf</b></font></td>
      </tr>
");
$valorfprod = $xvd + $valortprod;
$valorfprodf = number_format($valorfprod,2,',','.'); 

echo("
      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#808080'>SUBTOTAL<br>
          ORDEM SERVIÇO</font></b></td>
        <td width='130' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#808080'>R$
          $valorfprodf</font></b></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana' color='#000000'><b>VALOR
          SERVIÇOS</b></font></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $vsf</b></font></td>
      </tr>
");
$valortotal = $xvs + $valorfprod;
$valortotalf = number_format($valortotal,2,',','.'); 

echo("

      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#800000'>TOTAL<br>
          ORDEM SERVIÇO</font></b></td>
        <td width='130' bgcolor='#FFFFFF' align='center'><b><font size='2' face='Verdana' color='#800000'>R$
          $valortotalf</font></b></td>
      </tr>
      
    </table>
    </center>
  </div>

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='vprod' value='$valortprod'>
</form>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <hr size='0'>
      </td>
    </tr>
  </table>
  </center>
</div>



<br><br>
 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='formapg'><img border='0' src='images/n3c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>FORMA DE PAGAMENTO</font></b></td>
      </tr>
    </table>
    </center>
  </div>

	

	 <form name='form1' method='post' action='$PHP_SELF?Action=update&desloc=0'>



<form method='POST' action='$PHP_SELF?Action=addforma#formapg'  name='Form' >
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='40%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='40%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		
      </tr>
");
	  $prod->listProdgeral("os_parcelas", "codos=$codos", $array61, $array_campo61 , "order by datavenc");

	  for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparc = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipo'");
			$tarifa = $prod->showcampo0();
			#$valorparc = $valorparc + $tarifa;
			$valorparcf = number_format($valorparc,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricaoold = $prod->showcampo1();

			$datavenc = str_replace('-','',$datavenc);
			$xanopar = substr($datavenc,0,4);
			$xmespar = substr($datavenc,4,2);
			$xdiapar = substr($datavenc,6,2);

			$xtipo = $tipo;


		
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='40%'><font size='1' face='Verdana' color='#000000'>$xdiapar/$xmespar/$xanopar
		  </font></td>
        <td width='20%' ><font size='1' face='Verdana' color='#000000'><b>$valorparcf</b></font></td>
        <td width='40%' ><font size='1' face='Verdana' color='#000000'>$descricaoold</font></td>
       </tr>

 ");
	}//FOR

echo("

	
    </table>
    </center>
  </div>
	


			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
 		    <input type='hidden' name='codos' value='$codos'>
			<input type='hidden' name='codpedselect' value='$codpedselect'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='pgold' value='$pgold'>



 <div align='center'>
    <center>
   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='274'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='274' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
    </tr>

	 </table>

 </center>
  </div>

</form>
");

} // CAIXA

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
	
		 <form method='POST' action='$PHP_SELF?Action=insnf#formapg'  name='Form' >
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#86acb5'>
        <td width='65%'><font face='Verdana' color='#ffffff' size='1'><b>NOTA FISCAL</b></font></td>
       <td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>VALOR</b></font></td>
        
      </tr>
");
if ($nf == "OK" or $hist == 1){


	$prod->listProdgeral("os_nf", "codos=$codos", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 
echo("
      <tr bgColor='#f3f8fa'>
        <td width='65%'><font face='Verdana' size='1'><b>$nf_ped</b></font></td>
		<td width='35%'><font face='Verdana' size='1'>R$ $valornff</font></td>
      </tr>
		 
");		
	}
	echo("
</table>
	");
}else{
$j=0;

	for($k = $j; $k < 5; $k++ ){
echo("
      <tr bgColor='#f3f8fa'>
        <td width='65%'><font face='Verdana' size='1'><b><input type='text' name='nf[$k]' size='30'></b></font></td>
		<td width='35%'><font face='Verdana' size='1'><b>R$ </b><input type='text' name='vnf[$k]' size='10' onKeyUp='this.value = adjust(this);' ></font></td>
      </tr>
");		
	}

	echo("
</table>
	<br>

	<input class='sbttn' type='submit' value='Inserir Nota Fiscal' name='B1'>


	

	");

}
	
echo("

	<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codcliente' value='$codcliente'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		<input type='hidden' name='qtdenf' value='5'>
  </form>
 
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
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DA OS</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#F3B94B'>
        <td width='30%'><font face='Verdana' color='#000000' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='35%'><font face='Verdana' color='#000000' size='1'><b>STATUS</b></font></td>
		<td width='35%'><font face='Verdana' color='#000000' size='1'><b>MODIFICADO POR</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("os_status", "codos=$codos", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$modpor = $prod->showcampo4();
			$datastatusf = $prod->fdata($datastatus);


echo("
      <tr bgColor='#f3f8fa'>
        <td width='30%'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='35%'><font face='Verdana' size='1'><b>$statusped</b></font></td>
		<td width='35%'><font face='Verdana' size='1'><b>$modpor</b></font></td>
      </tr>
");		
	}//FOR
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

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
    <tr>
      <td width='100%'>
        <p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=list&codempselect=$codemp&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR</a></font>
      </td>
    </tr>
  </table>
  </center>
</div>




	");
}


//  FIM - FIM DA PARTE DE IMPRESSAO ///


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
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=list' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'>
		STATUS: <input type='text' name='statuspesq' size='20'>
		<select size='1' class=drpdwn name='tipo_servpesq' >                         
	");

	$prod->listProdgeral("os_tipo", "", $array6, $array_campo6 , "order by tipo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$tipo_serv = $prod->showcampo1();
			$codtipo_serv = $prod->showcampo0();

	echo("		
		<option value='$codtipo_serv'>$tipo_serv</option>
		");
	
	}

echo("	
		<option value='' selected>ESCOLHA</option>

	  </select>
	   <select size='1' class=drpdwn name='codvend_tecpesq' >                         
		&nbsp;");

	$prod->listProdSum("codvend, nome","vendedor", "block <> 'Y' and codgrp = 38", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nome_tec = $prod->showcampo1();
			$codvend_tec = $prod->showcampo0();

	echo("
	<option value='$codvend_tec'>$nome_tec</option>
    
	");
	
	}
echo("	
		<option value='' selected>ESCOLHA</option>

	  </select>	 
	  </font>
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

//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

if ($allemp == "Y"){

echo("
<br>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&diaspg=$diaspg#cliente'>$nomeemp</option>
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
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='25%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='40%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b>  $totalpagina</b></font></td>
        </tr>
          <tr>
            <td width='100%' colspan='5'>
      <hr size='1'>
            </td>
        </tr>
      </table>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='21%'></td>
            <td width='6%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>O.S.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>O.S.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'><br>
              HISTÓRICO</a></font></b></td>
          </center>
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
    <td width='27%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='14%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME TÉCNICO</font></b></div>
    </td>
		<td width='12%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA OS</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONT</font></b></div>
    </td>
	<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LE</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PG</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
  </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

		
			// DADOS //
			$codos = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataos = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$libentr = $prod->showcampo8();
			$codbarra = $prod->showcampo9();
			$caixa = $prod->showcampo10();
			$nomecliente = $prod->showcampo11();
			$fat = $prod->showcampo12();
			$modped = $prod->showcampo13();
			$codtipo = $prod->showcampo14();
			$codvend_tec = $prod->showcampo15();
	
			// FORMATACAO //
			$dataosf = $prod->fdata($dataos);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataos,$dataatual);
			
			$prod->clear();
			$prod->listProdU("tipo", "os_tipo", "codtipo_serv='$codtipo'");
			$tipo_serv = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codvend_tec'");
			$nomevend_tec = $prod->showcampo0();

			$bgcorlinha="#E5E5E5";
			if ($status == "ABERTA"){$bgcorlinha="#FFCC66";}
			if ($status == "DIAG"){$bgcorlinha="#D0FDF3";}
			if ($status == "MAN"){$bgcorlinha="#D6B778";}
			if ($status == "MAN APROV"){$bgcorlinha="#D6B778";}
			if ($status == "MAN REPROV"){$bgcorlinha="#E1AFAA";}
			if ($status == "LIB"){$bgcorlinha="#EDE763";}
			if ($status == "ORC"){$bgcorlinha="#339966";}
			if ($status == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}
			
							

if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}
		
		$arqimp_os="inicioos_impressao.php";
		if ($status <> "LIB"){$tipo_imp = 1;}else{$tipo_imp = 0;}


		echo("
			<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codos=$codos&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&codempselect=$codempselect&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'>$codbarra</font></b></a><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'></font></td>
			<td width='27%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend_tec</font></td>
			<td align='center' width='12%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'>$tipo_serv</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$dataosf</font></td>
			
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br></font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias</font></b></td>
				<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$libentr</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor4'>$caixa</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqimp_os?Action=list&desloc=$desloc&codos=$codos&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&tipo_imp=$tipo_imp','name','650','400','yes');return false");echo('"');echo(">IO</a></font></b></td>
			
			</tr>
");
			 }//FOR
	
	echo("

				</table>
		");

	
}

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" ){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&";   
include("numcontg.php");
}




/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 


	
	include ("sif-rodape.php");}
}

?>
       
