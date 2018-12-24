<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTOS RMA";
$nomeformsec = "Troca de Produtos RMA";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		#if ($codempvend <> 0){$codempselect = $codempvend;}

	$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarraant' and codbarraped = '1' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		$codped_kit = $prod->showcampo12();
		#echo("codped=$codped");

		if ($codped == 0){$codped = $codped_kit;}
		
		if($reg <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprod");
			$chkcb_ant = $prod->showcampo0();
			if ($chkcb_ant == "N"){$reg = 0;}
		}
		
		$prod->clear();
		// EMPRESTIMO DE PECA	
		$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarranovo' and codbarraped = 1 and codemp=$codempselect and codped = -5000 ");

		$codcbnovo = $prod->showcampo0();
		$codprodnovo = $prod->showcampo2();
		$codpednovo = -5000;

		if($reg1 == 0){

			// PESQUISA PELO CODBARRA NOVO
			$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarranovo' and codbarraped <> 1 and codemp=$codempselect");

			$codcbnovo = $prod->showcampo0();
			$codprodnovo = $prod->showcampo2();

		}
		
		if($reg1 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprodnovo");
			$chkcb_novo = $prod->showcampo0();
			if ($chkcb_novo == "N"){$reg1 = 0;}
		}
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0 and $reg1 <> 0){
		
		#if ($codprod == $codprodnovo){

			//PESQUISA POR COD DE CODBARRA NA TABELA CODBARRA
			if ($codped_kit <> 0){$tabelap = "pedidoprod_kit";}else{$tabelap = "pedidoprod";}

			if ($codped <> -10){
	
			$prod->listProd($tabelap, "codped=$codped and codprod=$codprod and codprodcj = $codprodcj and tipocj='$tipocj'");

			$codpped = $prod->showcampo0();
			$codcbped = $prod->showcampo10();
			$codcb_array = explode(":", $codcbped);

				for($i = 0; $i < count($codcb_array); $i++ ){
					if ($codcb_array[$i] == $codcb){$codcb_array[$i] = $codcbnovo;}
				}
			$codcbatual = implode(":", $codcb_array);

			}

			if ($codped <> -10){

			$prod->listProd($tabelap, "codpped=$codpped");
				$prod->setcampo10($codcbatual);
				if ($codprod <> $codprodnovo){
					$prod->setcampo2($codprodnovo);
				}
				$prod->upProd($tabelap, "codpped='$codpped'");
			}

		
			if ($codpednovo <> -5000){
			
			/*
				
				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodnovo");

				$qtdeold = $prod->showcampo3();
								
				$qtdenovo = $qtdeold - 1;
				$prod->setcampo3($qtdenovo);
								
				$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprodnovo");
			*/
				
			}

			if ($codped == -10){

				$codped = -2000;
			}

			if ($codped_kit <> 0){

				$codped = 0;
			}

			// GRAVA LOG
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($codped);
			$prod->setcampo2($codcb);
			$prod->setcampo3($codcbnovo);
			$prod->setcampo4($dataatual);
			$prod->setcampo5($login);
			$prod->setcampo6(1);  // RMA TROCA
			$prod->addProd("rma_log", $uregopera);

			// ALTERA VALORES NA TABELA PEDIDO
			$prod->listProd("codbarra", "codcb=$codcb");
				
				#$prod->setcampo4(-2000);
				$prod->setcampo4(0);
				$prod->setcampo5(0);
				$prod->setcampo6(0);
				$prod->setcampo7(0);
				$prod->setcampo13("S1");
				$prod->upProd("codbarra", "codcb='$codcb'");

			$prod->listProd("codbarra", "codcb=$codcbnovo");
				
				$prod->setcampo4($codped);
				$prod->setcampo5($codprodcj);
				$prod->setcampo6($tipocj);
				$prod->setcampo7(1);
				$prod->setcampo12($codped_kit);
				$prod->setcampo13("S1");
				$prod->upProd("codbarra", "codcb='$codcbnovo'");

        $prod->listProdU("nomeprod","produtos", "codprod=$codprodnovo");
	$nomeprod_novo = $prod->showcampo0();
	$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
	$nomeprod = $prod->showcampo0();
	$prod->listProdU("codbarra","pedido", "codped=$codped");
	$codbarra_ped_troca = $prod->showcampo0();
	
	$assunto = " SUBSTITUIÇÃO RMA ";
	$msg = "<b>PEDIDO:</b> ".$codbarra_ped_troca."<br><b>FORA DO ESTOQUE:</B> ".$codprodnovo."-".$nomeprod_novo."-".$codbarranovo."<br><b>EM ESTOQUE(COM DEFEITO):</B> ".$codprod."-".$nomeprod."-".$codbarraant;

				// MANSAGEM PARA O ESTOQUE
				$prod->clear();
				$prod->setcampo1(4); // GRUPO
				$prod->setcampo2(238); // COD DESTINATARIO
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("N");  // HISTORICO
				$prod->setcampo7("NO");      // STATUS
				$prod->setcampo9(11);  // COD REMETENTE
				$prod->setcampo10("NO"); // ENVIADA

				$prod->addProd("msg", $ureg);

			$Action="end";

			$Actionter = "lock";
			$prod->msggeral("O CÓDIGO DE BARRA foi substituido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);

		#}else{

			#$erro = "PRODUTOS NÃO COINCIDEM";
			#$Action="list";
		#}

		}else{

			$erro = "CÓDIGO DE BARRA INCORRETO";
			$Action="list";

		}
		#echo("codcb = $codcb");
		#echo("codcbped = $codcbped");
		#echo("codcbnovo = $codcbnovo");
		#echo("codcbatual = $codcbatual");

		$Action="list";
		
		}
		$desloc=0;

		
        break;

	 case "update":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarraant' and codbarraped = '1' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		echo("codped=$codped - codbarra= $codbarraant");
		
		if($reg <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprod");
			$chkcb_ant = $prod->showcampo0();
			if ($chkcb_ant == "N"){$reg = 0;}
		}

		$prod->clear();
		// EMPRESTIMO DE PECA	
		$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarranovo' and codbarraped = 1 and codemp=$codempselect and codped = -5000 ");

		$codcbnovo = $prod->showcampo0();
		$codprodnovo = $prod->showcampo2();

		if($reg1 == 0){

			// PESQUISA PELO CODBARRA NOVO
			$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarranovo' and codbarraped <> 1 and codemp=$codempselect");

			$codcbnovo = $prod->showcampo0();
			$codprodnovo = $prod->showcampo2();

		}
		
		if($reg1 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprodnovo");
			$chkcb_novo = $prod->showcampo0();
			if ($chkcb_novo == "N"){$reg1 = 0;}
		}

		echo("r=$reg - r1= $reg1");
		if ($reg <> 0 and $reg1 <>0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
			$nomeprod_ant = $prod->showcampo0();

			$prod->listProdU("nomeprod","produtos", "codprod=$codprodnovo");
			$nomeprod_novo = $prod->showcampo0();

			$confer = 1;

	
		}else{

			$erro = "CÓDIGO DE BARRA INCORRETO";
			$Action="list";

		}
		#echo("codcb = $codcb");
		#echo("codcbped = $codcbped");
		#echo("codcbnovo = $codcbnovo");
		#echo("codcbatual = $codcbatual");

		$Action="list";
		
		}
		 
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "check":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrarma' and codbarraped = '1' and codemp=$codempselect and (codped = -2000 or codped = -5000)");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
			$nomeprod_rma = $prod->showcampo0();

			$confer1 = 1;

	
		}else{

			$erro1 = "CÓDIGO DE BARRA NÃO FOI USADO COMO RMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "checkfim":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrarma' and codbarraped = '1' and codemp=$codempselect and (codped = -2000 or codped = -5000)");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0){

			// GRAVA LOG
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1(0);
			$prod->setcampo2($codcb);
			$prod->setcampo3($codcb);
			$prod->setcampo4($dataatual);
			$prod->setcampo5($login);
			$prod->setcampo6(2);  // RETORNO RMA

			$prod->addProd("rma_log", $uregopera);

			// ALTERA VALORES NA TABELA PEDIDO
			$prod->listProd("codbarra", "codcb=$codcb");
				
				$prod->setcampo4(0);
				$prod->setcampo5(0);
				$prod->setcampo6(0);
				$prod->setcampo7("");
				$prod->setcampo10("N"); // FLAG RMA
				$prod->setcampo11("N"); // FLAG PECA ANTIGA
				$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
				$prod->upProd("codbarra", "codcb='$codcb'");
				
   	$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
	$nomeprod = $prod->showcampo0();

	$assunto = " RETORNO DE PRODUTO RMA ";
	$msg = "<b>EM ESTOQUE:</B> ".$codprod."-".$nomeprod."-".$codbarrarma;

				// MANSAGEM PARA O ESTOQUE
				$prod->clear();
				$prod->setcampo1(4); // GRUPO
				$prod->setcampo2(238); // COD DESTINATARIO
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("N");  // HISTORICO
				$prod->setcampo7("NO");      // STATUS
				$prod->setcampo9(11);  // COD REMETENTE
				$prod->setcampo10("NO"); // ENVIADA

				$prod->addProd("msg", $ureg);

			// ATUALIZA ESTOQUE
			$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod");

			$qtdeold = $prod->showcampo3();
							
			$qtdenovo = $qtdeold + 1;
			$prod->setcampo3($qtdenovo);
							
			$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod");
				

			$Action="end";

			$Actionter = "lock";
			$prod->msggeral("O CÓDIGO DE BARRA inserido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);

	
		}else{

			$erro1 = "CÓDIGO DE BARRA NÃO FOI USADO COMO RMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "check_ant":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrasant' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg == 0){

			if ($codprodsant <> 0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprodsant");
			$nomeprod_sant = $prod->showcampo0();

			$confer2 = 1;

			}else{

				$erro2 = "CÓDIGO DO PRODUTO INCORRETO";
				$Action="list";

			}


	
		}else{

			$erro2 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "checkfim_ant":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrasant' and codemp=$codempselect ");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg == 0){

			if ($codprodsant <> 0){

			// GRAVA LOG
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1(-10);
			$prod->setcampo2($codbarrasant);
			$prod->setcampo3($codbarrasant);
			$prod->setcampo4($dataatual);
			$prod->setcampo5($login);
			$prod->setcampo6(3);  // RETORNO RMA

			$prod->addProd("rma_log", $uregopera);

							
				$prod->clear();
				$prod->setcampo2($codprodsant);
				$prod->setcampo3($codbarrasant);
				$prod->setcampo4(-10);
				$prod->setcampo7(1);
				$prod->setcampo8($codempselect);
				$prod->setcampo9(1); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
				$prod->setcampo10("N"); // FLAG RMA
				$prod->setcampo11("N"); // FLAG PECA ANTIGA
				$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
				$prod->addProd("codbarra", $ureg);

			$Action="end";

			$Actionter = "lock";
			$prod->msggeral("O CÓDIGO DE BARRA inserido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);


			}else{

				$erro2 = "CÓDIGO DO PRODUTO INCORRETO";
				$Action="list";

			}

	
		}else{

			$erro2 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;

	 case "check_ihelp":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarraihelp' and codemp=$codempselect and codbarraped <> 1");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
			$nomeprod_ihelp = $prod->showcampo0();

			$confer3 = 1;

	
		}else{

			$erro3 = "CÓDIGO DE BARRA INCORRETO";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;
	
	case "checkfim_ihelp":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarraihelp' and codemp=$codempselect and codbarraped <> 1");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0){

		
			// GRAVA LOG
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1(-2000);
			$prod->setcampo2($codbarraihelp);
			$prod->setcampo3("");
			$prod->setcampo4($dataatual);
			$prod->setcampo5($login);
			$prod->setcampo6(4);  // RETORNO RMA

			$prod->addProd("rma_log", $uregopera);

			// ALTERA VALORES NA TABELA PEDIDO
			$prod->listProd("codbarra", "codcb=$codcb");
				
				$prod->setcampo4(-2000);
				$prod->setcampo5(0);
				$prod->setcampo6(0);
				$prod->setcampo7(1);
				$prod->upProd("codbarra", "codcb='$codcb'");
				
	$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
	$nomeprod = $prod->showcampo0();

	$assunto = " PRODUTO NA RMA ";
	$msg = "<b>FORA DO ESTOQUE:</B> ".$codprod."-".$nomeprod."-".$codbarraihelp;

				// MANSAGEM PARA O ESTOQUE
				$prod->clear();
				$prod->setcampo1(4); // GRUPO
				$prod->setcampo2(238); // COD DESTINATARIO
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("N");  // HISTORICO
				$prod->setcampo7("NO");      // STATUS
				$prod->setcampo9(11);  // COD REMETENTE
				$prod->setcampo10("NO"); // ENVIADA

				$prod->addProd("msg", $ureg);

				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprod");

				$qtdeold = $prod->showcampo3();
								
				$qtdenovo = $qtdeold - 1;
				$prod->setcampo3($qtdenovo);
								
				$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprod");

			$Action="end";

			$Actionter = "lock";
			$prod->msggeral("O CÓDIGO DE BARRA inserido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);

	
		}else{

			$erro3 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "check_ant2":
			
		if ($retorno){

		
		$prod->clear();
		

			// PESQUISA PELO CODBARRA NOVO
			$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarras2novo' and codbarraped <> 1 and codemp=$codempselect and codprod = $codprods2novo");

			$codcbnovo = $prod->showcampo0();
			#$codprodnovo = $prod->showcampo2();

				
		if($reg1 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprods2novo");
			$chkcb_novo = $prod->showcampo0();
			if ($chkcb_novo <> "N"){$reg1 = 0;}
		}

		echo("r=$reg - r1= $reg1");
		if ($reg1 <> 0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprods2novo");
			$nomeprod_s2novo = $prod->showcampo0();

			$confer4 = 1;

	
		}else{

			$erro4 = "CÓDIGO DE BARRA INCORRETO OU NÃO É LIBERADO DO CODBARRA";
			$Action="list";

		}

		
		
		#echo("codcb = $codcb");
		#echo("codcbped = $codcbped");
		#echo("codcbnovo = $codcbnovo");
		#echo("codcbatual = $codcbatual");

		$Action="list";
		
		}
		 break;


	case "checkfim_ant2":
			
		if ($retorno){
		
		
		
		$prod->clear();
		
			// PESQUISA PELO CODBARRA NOVO
			$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarras2novo' and codbarraped <> 1 and codemp=$codempselect and codprod = $codprods2novo");

			$codcbnovo = $prod->showcampo0();
			#$codprodnovo = $prod->showcampo2();
			
		if($reg1 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprods2novo");
			$chkcb_novo = $prod->showcampo0();
			if ($chkcb_novo <> "N"){$reg1 = 0;}
		}
		echo("r=$reg - r1= $reg1");
		if ($reg1 <> 0){
		
		#if ($codprod == $codprodnovo){

										
				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprods2novo");

				$qtdeold = $prod->showcampo3();
								
				$qtdenovo = $qtdeold - 1;
				$prod->setcampo3($qtdenovo);
								
				$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprods2novo");
			

			if ($codped == -10){

				$codped = -2000;
			}

			// GRAVA LOG
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1(-2000);
			$prod->setcampo2("");
			$prod->setcampo3($codcbnovo);
			$prod->setcampo4($dataatual);
			$prod->setcampo5($login);
			$prod->setcampo6(5);  // RMA TROCA
			$prod->addProd("rma_log", $uregopera);

			// ALTERA VALORES NA TABELA PEDIDO
			$prod->listProd("codbarra", "codcb=$codcbnovo");
				
				$prod->setcampo4(-2000);
				$prod->setcampo5(0);
				$prod->setcampo6(0);
				$prod->setcampo7(1);
				$prod->upProd("codbarra", "codcb=$codcbnovo");
				
   	$prod->listProdU("nomeprod","produtos", "codprod=$codprods2novo");
	$nomeprod = $prod->showcampo0();

	$assunto = " PRODUTO NA RMA ";
	$msg = "<b>FORA DO ESTOQUE:</B> ".$codprods2novo."-".$nomeprod."-".$codbarras2novo;

				// MANSAGEM PARA O ESTOQUE
				$prod->clear();
				$prod->setcampo1(4); // GRUPO
				$prod->setcampo2(238); // COD DESTINATARIO
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("N");  // HISTORICO
				$prod->setcampo7("NO");      // STATUS
				$prod->setcampo9(11);  // COD REMETENTE
				$prod->setcampo10("NO"); // ENVIADA

				$prod->addProd("msg", $ureg);

			$Action="end";

			$Actionter = "lock";
			$prod->msggeral("O CÓDIGO DE BARRA foi substituido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);

		#}else{

			#$erro = "PRODUTOS NÃO COINCIDEM";
			#$Action="list";
		#}

		}else{

			$erro4 = "CÓDIGO DE BARRA INCORRETO OU NÃO É LIBRADO DO CODBARRA";
			$Action="list";

		}


		
		#echo("codcb = $codcb");
		#echo("codcbped = $codcbped");
		#echo("codcbnovo = $codcbnovo");
		#echo("codcbatual = $codcbatual");

		$Action="list";
		
		}
		$desloc=0;
		 break;

	


}

// ACOES SECUNDARIAS DA PAGINA
/*if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		$numreg = $prod->listProdgeral($tabela, $condicao2, $array, $array_campo, "" );
		if ($palavrachave == ""){$condicao2 = "";}

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral($tabela, $condicao2, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}
*/
// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////


	echo("

<html>

<head>
<title>CONFERÊNCIA DE COD BARRA</title>
	<script language='javascript'>
<!--
function Link(url) 
{ 
path = url;
 opener.top.frames['Main'].location.href=path

}
//-->



</script>

</head>

<body >
<div align='center'>
  <center>
  <table border='0' width='350' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%' bgcolor='#336699'>
 <table width='350' border='0' cellspacing='1' cellpadding='2' align='center'>
			 <tr bgcolor='#F3F8FA'> 
			 <td bgcolor='#336699'>
			  <p align='left'><font face='Verdana' size='3' color='#FFFFFF'>MENSAGEM
              DE<b> CONFIRMAÇÃO</b></font></p>
			 </td>
             </tr>
			 <tr bgcolor='#F3F8FA'> 
			 <td>
              &nbsp;
			  <p align='center'><b><font face='Verdana' size='3' color='#FF0000'>CÓDIGO DE BARRA INSERIDO CORRETAMENTE</font></b></p>&nbsp;
			 </td>
             </tr>
			 <tr bgcolor='#F3F8FA'> 
			 <td bgcolor='#F3F3F3'>
<!--

              <p align='center'><b><a href='#' onclick=");echo('"javascript:Link(');echo("'restrito.php?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'");echo(')" onmouseup="javascript:window.close()"');echo("><font face='Verdana' color='#870C0C' size='1'>FINALIZAR</font></a></p>
-->
           <p align='center'><b><a href='restrito.php?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg' onmouseup='javascript:window.close()' target='Main'><font face='Verdana' color='#870C0C' size='1'>FECHAR</font></a></p>

			  
			  </td>
             </tr>
			 </table>
        </td>
      </tr>
    </table>
  </center>
  </div>
</body>

</html>



	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	


	echo("
	<head>
<title> SUBSTITUIÇÃO DE CÓDIGO BARRA</title>


</head>
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br></font><font color='#FF9933' size='3' face='Verdana'>SUBSTITUIÇÃO</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></font></b></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><br>
                          </a></font></td>
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

");
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


	$prod->listProdU("nome","empresa", "codemp=$codempselect");
				
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='7%'>
              <p align='center'></td>
            <td width='30%'></td>
          </center>
          <td width='35%'>
            </td>
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
");

if ($confer == 1){$Action="insert";}else{$Action="update";}
if ($confer == 1){$b1="Confirma Substituição?";}else{$b1="Troca de Produtos";}
if ($confer1 == 1){$Action1="checkfim";}else{$Action1="check";}
if ($confer1 == 1){$b2="Confirma Inclusão?";}else{$b2="Inserir Produto";}
if ($confer2 == 1){$Action2="checkfim_ant";}else{$Action2="check_ant";}
if ($confer2 == 1){$b3="Confirma Inclusão?";}else{$b3="Inserir Produto";}
if ($confer3 == 1){$Action3="checkfim_ihelp";}else{$Action3="check_ihelp";}
if ($confer3 == 1){$b4="Confirma envio para RMA?";}else{$b4="Inserir Produto para RMA";}
if ($confer4 == 1){$Action4="checkfim_ant2";}else{$Action4="check_ant2";}
if ($confer4 == 1){$b5="Confirma Inclusão?";}else{$b5="Inserir Produto";}

echo("
<!--<a name='a1'></a>
<form method='POST' action='$PHP_SELF?Action=$Action#a1'>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#93BEE2' height='31' colspan='3'><b><font size='2' face='Verdana' color='#000000'>TROCAS DE PRODUTOS RMA DEFEITUOSOS<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(O produto novo substituirá o produto antigo no seu respsctivo pedido. O produto antigo ira para o estoque.)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='3'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF'>&nbsp;</td>
      </center>
      <td width='215' height='21' bgcolor='#FFFFFF'>
        <p align='left'><b><font size='2' face='Verdana' color='#800000'>&nbsp; CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    <tr>
      <td width='76' height='21' bgcolor='#93BEE2'><b><font face='Verdana' size='1'>PRODUTO
        ANTERIOR:</font></b></td>
    </center>
    <td width='215' height='21' bgcolor='#93BEE2'>
      <p align='left'><font face='Verdana' size='1'><input type='text' name='codbarraant' value = '$codbarraant' size='28'> </font></td>
    <td width='245' height='21' bgcolor='#93BEE2'>
      <b> <font face='Verdana' size='1'>$nomeprod_ant</font></b></td>
    </tr>
    <center>
    <tr>
      <td width='76' height='21' bgcolor='#D6E7EF'><b><font face='Verdana' size='1'>NOVO&nbsp;<br>
        PRODUTO:</font></b></td>
    </center>
    <td width='215' height='21' bgcolor='#D6E7EF'>
      <p align='left'><font face='Verdana' size='1'><input type='text' name='codbarranovo' value='$codbarranovo' size='28'></font></td>
    <td width='245' height='21' bgcolor='#D6E7EF'>
      <b>  <font face='Verdana' size='1'>$nomeprod_novo</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='3'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='3'>


        <p align='center'><input type='submit' value='$b1'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
-->
<a name='a2'></a>
<form method='POST' action='$PHP_SELF?Action=$Action1#a2'>
  <hr>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#379427' height='31' colspan='3'><font color='#000000'><b><font size='2' face='Verdana'>INSERIR
          PRODUTO NO ESTOQUE (RMA CONCERTO)<br>
          </font></b><font face='Verdana' size='1'>(Produtos que entraram com
          defeito mas foi constatado que o mesmo estava funcionando corretamente.)</font></font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='3'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF'>&nbsp;</td>
      </center>
      <td width='215' height='21' bgcolor='#FFFFFF'>
        <p align='left'><b><font size='2' face='Verdana' color='#800000'>&nbsp; CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
    <tr>
      <td width='76' height='21' bgcolor='#C6EEBF'><b><font face='Verdana' size='1'>PRODUTO&nbsp;<br>
        RMA:</font></b></td>
    </center>
    <td width='215' height='21' bgcolor='#C6EEBF'>
      <p align='left'><font face='Verdana' size='1'><input type='text' name='codbarrarma' value='$codbarrarma' size='28'></font></td>
    <td width='245' height='21' bgcolor='#C6EEBF'>
      <b>  <font face='Verdana' size='1'>$nomeprod_rma</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='3'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro1</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='3'>


        <p align='center'><input type='submit' value='$b2'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
");
/*
<a name='a3'></a>
<form method='POST' action='$PHP_SELF?Action=$Action2#a3'>
  <hr>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#C48035' height='31' colspan='4'><b><font size='2' face='Verdana' color='#000000'>INSERIR
          PRODUTOS DO SISTEMA ANTIGO NO ESTOQUE<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(Produtos que
          vieram de pedidos feitos no sistema antigo devem ser incluídos na
          tabela de codbarras.)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='4'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF' align='center'>&nbsp;</td>
      </center>
      <td width='108' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'>COD.<br>
        PROD</font></b></td>
      <td width='107' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'> CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF' align='center'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
    <tr>
      <td width='76' height='21' bgcolor='#F5DF9C'><b><font face='Verdana' size='1'>PRODUTO<br>
        ANTIGO:</font></b></td>
    </center>
    <td width='108' height='21' bgcolor='#F5DF9C'>
      <p align='center'><font face='Verdana' size='1'><input type='text' name='codprodsant' value='$codprodsant' size='5'></font></td>
    <td width='107' height='21' bgcolor='#F5DF9C'>
      <font face='Verdana' size='1'><input type='text' name='codbarrasant' value='$codbarrasant' size='23'></font></td>
    <td width='245' height='21' bgcolor='#F5DF9C'>
      <b>  <font face='Verdana' size='1'>$nomeprod_sant</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='4'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro2</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='4'>


        <p align='center'><input type='submit' value='$b3'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
*/
echo("
<a name='a4'></a>
<form method='POST' action='$PHP_SELF?Action=$Action3#a4'>
  <hr>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#FFFF99' height='31' colspan='3'><font color='#000000'><b><font size='2' face='Verdana'>RMA DE PRODUTOS<br>
          </font></b><font face='Verdana' size='1'>(Produtos que nao liberam codbarra, com defeito, encaminhados pelo estoque)</font></font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='3'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF'>&nbsp;</td>
      </center>
      <td width='215' height='21' bgcolor='#FFFFFF'>
        <p align='left'><b><font size='2' face='Verdana' color='#800000'>&nbsp; CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
    <tr>
      <td width='76' height='21' bgcolor='#FFFFCC'><b><font face='Verdana' size='1'>NOVO<BR>PRODUTO:</font></b></td>
    </center>
    <td width='215' height='21' bgcolor='#FFFFCC'>
      <p align='left'><font face='Verdana' size='1'><input type='text' name='codbarraihelp' value='$codbarraihelp' size='28'></font></td>
    <td width='245' height='21' bgcolor='#FFFFCC'>
      <b>  <font face='Verdana' size='1'>$nomeprod_ihelp</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='3'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro3</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='3'>


        <p align='center'><input type='submit' value='$b4'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
<!--
<a name='a5'></a>
<form method='POST' action='$PHP_SELF?Action=$Action4#a5'>
  <hr>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#C48035' height='31' colspan='4'><b><font size='2' face='Verdana' color='#000000'>TROCA DE 
          PRODUTOS QUE DISPENSAM CODBARRAS<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(Produtos que
          possuem liberação de codbarra.)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='4'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF' align='center'>&nbsp;</td>
      </center>
     
       <td width='108' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'>COD.<br>
        PROD</font></b></td>
      <td width='107' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'> CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF' align='center'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
   
    <tr>
      <td width='76' height='21' bgcolor='#F5DF9C'><b><font face='Verdana' size='1'>NOVO&nbsp;<br>
        PRODUTO:</font></b></td>
	<td width='108' height='21' bgcolor='#F5DF9C'>
      <p align='center'><font face='Verdana' size='1'><input type='text' name='codprods2novo' value='$codprods2novo' size='5'></font></td>
    <td width='107' height='21' bgcolor='#F5DF9C'>
      <font face='Verdana' size='1'><input type='text' name='codbarras2novo' value='$codbarras2novo' size='23'></font></td>
    <td width='245' height='21' bgcolor='#F5DF9C'>
      <b>  <font face='Verdana' size='1'>$nomeprod_s2novo</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='4'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro4</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='4'>


        <p align='center'><input type='submit' value='$b5'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
-->
		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////
}
endif;

include ("sif-rodape.php");
}

?>
       
