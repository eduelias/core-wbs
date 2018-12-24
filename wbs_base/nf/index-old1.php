<?php

$codempselect =1;
require("../classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;

// INICIO DA CLASSE
$prod = new operacao();

		// CABEÇALHO
		echo("
		INICIOARQ;
		");


		$condicao4 = " (pedido.status <> 'AVAL' and pedido.reavalfpg <> 'OK')";
		#$condicao4 = " (pedido.status = 'DESP' and pedido.caixa <> 'NO')";

		$condicao3 .= "pedido.codemp='$codempselect'";
		$condicao3 .= " and pedido.codcliente=clientenovo.codcliente";
		$condicao3 .= " and " . $condicao4;
					

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, tipocliente, cpf, cnpj, nome, endereco, bairro, cidade, cep, estado, ie, dddtel1, tel1, endentrega, pedido.codcliente, codvend, datasaidaest , codbarra, vt, vpp", "pedido, clientenovo", $condicao3, $array, $array_campo, $parm );

		

	 for($i = 0; $i < count($array); $i++ ){
		
		$prod->mostraProd( $array, $array_campo, $i );

		// DADOS CLIENTE //

		$codped = $prod->showcampo0();
		$codbarraped = $prod->showcampo17();
		$tipocli = $prod->showcampo1();
			if ($tipocli == "F"){
				$cpf_cnpj = $prod->showcampo2();
			}else{
				$cpf_cnpj = $prod->showcampo3();
			}
		$nomecli = $prod->showcampo4();
		$enderecocli = $prod->showcampo5();
		$bairrocli = $prod->showcampo6();
		$cidadecli = $prod->showcampo7();
		$cepcli = $prod->showcampo8();
		$estadocli = $prod->showcampo9();
		$iecli = $prod->showcampo10();
		$dddcli = $prod->showcampo11();
		$telcli = $prod->showcampo12();
		$enderecocob = $enderecocli;
		$cepcob = $cepcli;
		$cidadecob = $cidadecli;
		$estadocob = $estadocli;
		$bairrocob = $bairrocli;
		$endentrega = $prod->showcampo13();
		$cpf_cnpjentrega = "";
		$ieentrega = "";
		$codcli = $prod->showcampo14();

		
		// DADOS TRANPORTADORA

		$nometrans = "";
		$ceptrans = "";
		$nomemotorista = "";
		$cartahabilitacao = "";
		$nomeredespachador = "";

		// DADOS VOLUME

		$marcavol = "";
		$especievol = "";
		$numerovol = "";
		$qtdevol = "";

		// DADOS GERAIS

		$codvend = $prod->showcampo15();
		$datasaida = $prod->showcampo16();
		$codfiscalopera = "" ;
		$descrfiscalopera = "";
		$obsnota = "";

		//EXTRAS
		
		$vt = $prod->showcampo18();
		$vpp = $prod->showcampo19();


		// MONTAGEM DOS DADOS
			
		// CABECALHO
		echo("
		INICIOPED;
		$codbarraped;
		1;					
		$i;					
		");

		// DADOS CLIENTE
		echo ("
		$cpf_cnpj;
		$tipocli;
		$nomecli;
		$enderecocli;
		$cepcli;
		$cidadecli;
		$estadocli;
		$bairrocli;
		$iecli;
		$enderecocob;
		$cepcob;
		$cidadecob;
		$estadocob;
		$bairrocob;
		$dddcli;
		$telcli;
		$endentrega;
		$cpf_cnpjentrega;
		$ieentrega;
		");

		// DADOS TRANPORTADORA
		echo("
		$nometrans;
		$ceptrans;
		$nomemotorista;
		$cartahabilitacao;
		$nomeredespachador;
		");

		// DADOS VOLUME
		echo("
		$marcavol;
		$especievol;
		$numerovol;
		$qtdevol;
		");

		// DADOS GERAIS
		echo("
		$codvend;
		$datasaida;
		$codfiscalopera;
		$descrfiscalopera;
		$obsnota;
		");
		
// ****************************  PRODUTOS DO PEDIDO *************************************

			// CABECALHO
			echo("
			INICIOPROD;
			");

			$condicao7 .= "pedidoprod.codped='$codped'";
			$condicao7 .= " and produtos.codprod=pedidoprod.codprod";
			
			// LISTA OS REGISTROS DE PRODUTOS DO PEDIDO
			$prod->listProdSum("produtos.codprod, produtos.nomeprod, qtde, ppu", "pedidoprod, produtos", $condicao7, $array1, $array_campo1, $parm );

			for($j = 0; $j < count($array1); $j++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $j );


			// DADOS DOS PRODUTOS

			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$qtde = $prod->showcampo2();
			$unidade = "";
			$codtribut = 1;  // 1 - PRODUTO 2- SERVIÇO
			$ppu = $prod->showcampo3();
			$impostoretido = "";
			$perc_iss_estado = "";
			$perc_icms = "";
			$flag_imprime_fracao = "N"; 

			$ppu = $ppu * ($vpp/$vt);
			$ppuf = number_format($ppu,2,'.','.'); 


// MONTAGEM DOS DADOS

			// CABECALHO
			echo("
			$codbarraped;
			2;				
			$j;				
			");

			// DADOS DOS PRODUTOS

			echo("
			$codprod;
			$nomeprod;
			$qtde;
			$unidade;
			$codtribut;
			$ppuf
			$impostoretido;
			$perc_iss_estado;
			$perc_icms;
			$flag_imprime_fracao; 
			");

		$condicao7 = "";
		 } // FOR DOS PRODUTOS

		 // RODAPE
			echo("
			FIMPROD;
			");

// ****************************  PRODUTOS DO PEDIDO *************************************
	
	// RODAPE
	echo("
	FIMPED;
	");

	 } // FOR DO PEDIDO

	
	// RODAPE
	echo("
	FIMARQ;
	");
	

?>
