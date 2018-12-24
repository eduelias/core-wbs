<?php

if ($chave == "1SIRPUE"){

$codempselect = 1;
require("../classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;

// INICIO DA CLASSE
$prod = new operacao();

		// CABEÇALHO
		#echo("INICIOARQ;");

		$dataatual = $prod->gdata();
		$dataf = $prod->fdata($dataatual);

		#echo("

		# SCRIPT NOTA FISCAL - EMPRESA: $codempselect<BR>
		# DATA EMISSÃO: $dataf<BR>
		# --------------------------------------------------------<BR>
		
		#");


		$condicao4 = " (pedido.status <> 'AVAL' and pedido.reavalfpg <> 'OK' and nf <> 'OK')";
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
		$endentr = $prod->showcampo13();
		$endentrf = explode(";",$endentr);
		$endentrega = $endentrf[0];
		$cepentrega = $endentrf[1];
		$cidadeentrega = $endentrf[2];
		$estadoentrega = $endentrf[3];
		$bairroentrega = $endentrf[4];
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
		$datasaida = "";
		$codfiscalopera = "" ;
		$descrfiscalopera = "";
		$obsnota = "";
		$tiponota = "";  // TIPO DE NOTA QUE SERA IMPRESSA

		//EXTRAS
		
		$vt = $prod->showcampo18();
		$vpp = $prod->showcampo19();


		// MONTAGEM DOS DADOS
			
		// CABECALHO
		#echo("INICIOPED;$codbarraped;1;$i;");

		// DADOS CLIENTE
		#echo("$cpf_cnpj;$tipocli;$nomecli;$enderecocli;$cepcli;$cidadecli;$estadocli;$bairrocli;$iecli;$enderecocob;$cepcob;$cidadecob;$estadocob;$bairrocob;$dddcli;$telcli;$endentrega;$cpf_cnpjentrega;$ieentrega;");

		// DADOS TRANPORTADORA
		#echo("$nometrans;$ceptrans;$nomemotorista;$cartahabilitacao;$nomeredespachador;");

		// DADOS VOLUME
		#echo("$marcavol;$especievol;$numerovol;$qtdevol;");

		// DADOS GERAIS
		#echo("$codvend;$datasaida;$codfiscalopera;$descrfiscalopera;$obsnota;");


	
		// SQL CABECALHO

		echo("INSERT INTO NOTAFISCAL VALUES (");

		//SQL CORPO

		echo("'$codbarraped','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','$nomecli','$tipocli','$enderecocli','$cepcli','$cidadecli','$estadocli','$bairrocli','$iecli','$enderecocob','$cepcob','$cidadecob','$estadocob','$bairrocob','$dddcli','$telcli','$endentrega','$cpf_cnpjentrega','$ieentrega','$nometrans','$ceptrans','$nomemotorista','$cartahabilitacao','$nomeredespachador','$marcavol','$especievol','$numerovol',$qtdevol,'$codvend','$datasaida','$codfiscalopera','$descrfiscalopera','$obsnota','$cpf_cnpj','$cepentrega','$cidadeentrega','$estadoentrega','$bairroentrega','$tiponota'");

		//SQL RODAPE

		echo("); ");

		
// ****************************  PRODUTOS DO PEDIDO *************************************

			// CABECALHO
			#echo("INICIOPROD;");

			$condicao7 .= "pedidoprod.codped='$codped' ";
			$condicao7 .= " and produtos.codprod=pedidoprod.codprod ";
			
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
			$impostoretido = 0.00;
			$perc_iss_estado = 0.00;
			$perc_icms = 0.00;
			$flag_imprime_fracao = "N"; 

			$ppu = $ppu * ($vpp/$vt);
			$ppuf = number_format($ppu,2,'',''); 
			#$ppuf = $ppu;

// MONTAGEM DOS DADOS

			// CABECALHO
			#echo("$codbarraped;2;$j;");

			// DADOS DOS PRODUTOS

			#echo("$codprod;$nomeprod;$qtde;$unidade;$codtribut;$ppuf;$impostoretido;$perc_iss_estado;$perc_icms;$flag_imprime_fracao;");

			// SQL CABECALHO
			
			echo("INSERT INTO ITENSNOTAFISCAL VALUES (");


			//SQL CORPO

			echo("'$codbarraped','$codprod',$j,'$nomeprod','','$codtribut',$qtde,'$unidade',$ppuf,$impostoretido,$perc_iss_estado,$perc_icms,'$flag_imprime_fracao',0.00,0,0,0.00,''");
	
			//SQL RODAPE

			echo("); ");

		$condicao7 = "";
		 } // FOR DOS PRODUTOS

		 // RODAPE
			#echo("FIMPROD;");

	
		echo("");


// ****************************  PRODUTOS DO PEDIDO *************************************
	
	// RODAPE
	#echo("FIMPED;");

	echo("");

	 } // FOR DO PEDIDO

	
	// RODAPE
	#echo("FIMARQ;");


}else{

	echo("CHAVE INCORRETA");
}

?>
