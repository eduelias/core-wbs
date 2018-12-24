<?php

$codempselect = 1;
require("../classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;


function espaco($tammax, $variavel){

$ne = $tammax-strlen($variavel);

 for($i = 0; $i < $ne; $i++ ){
		
	$esp .= " ";
	
 }

return $esp;

}

function linha($nl){


 for($i = 0; $i < $nl; $i++ ){
		
	$linha .= "\n";
	
 }

return $linha;

}

	/// Funcao GERA DATA ATUAL
	function gdata()
    {

		 $hoje = getdate();
		 $ano = $hoje[year];
		 $mes = $hoje[mon];
		 $dia = $hoje[mday];
		

		 if (strlen($mes)==1){$mes = '0'.$mes;}
		 if (strlen($dia)==1){$dia = '0'.$dia;}
		

		 $dataatual = $ano.$mes.$dia;

	return $dataatual;
		
	}



// INICIO DA CLASSE
$prod = new operacao();

		$dataatual = gdata();
		$dataatualf = $prod->fdata($dataatual);


		// CABEÇALHO
		#echo("INICIOARQ;");

		$condicao3 = "pedido.codped = $codped"; 
		#$condicao4 = " (pedido.status <> 'AVAL' and pedido.reavalfpg <> 'OK' and nf <> 'OK')";
		#$condicao4 = " (pedido.status = 'DESP' and pedido.caixa <> 'NO')";

		#$condicao3 .= "pedido.codemp='$codempselect'";
		$condicao3 .= " and pedido.codcliente=clientenovo.codcliente";
		#$condicao3 .= " and " . $condicao4;
		
					

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, tipocliente, cpf, cnpj, nome, endereco, bairro, cidade, cep, estado, ie, dddtel1, tel1, endentrega, pedido.codcliente, codvend, datasaidaest , codbarra, vt, vpp,numero, complemento", "pedido, clientenovo", $condicao3, $array, $array_campo, $parm );

		

	 for($i = 0; $i < count($array); $i++ ){
		
		$prod->mostraProd( $array, $array_campo, $i );

		// TAM MAX DOS CAMPOS

		$tc1 = 42; // NATUREZA OP
		$tc2 = 86; // NOMECLI
		$tc3 = 32; // CNPJ/CPF
		$tc4 = 70; // ENDERECOCLI
		$tc5 = 30; // BAIRRO
		$tc6 = 50; // CIDADECLI
		$tc7 = 24; // TELCLI
		$tc8 = 5; // ESTADOCLI
		$tc9 = 25; // BASE ICMS
		$tc10 = 80; // VALOR ICMS


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
		$nomecli = substr($nomecli,0,$tc2-4);
		$enderecocli_old = $prod->showcampo5();
		$numerocli = $prod->showcampo20();
		$complementocli = $prod->showcampo21();
		$enderecocli = $enderecocli_old." ".$numerocli." ".$complementocli;
		$enderecocli = substr($enderecocli,0,$tc4-4);
		$bairrocli = $prod->showcampo6();
		$cidadecli = $prod->showcampo7();
		$cepcli = $prod->showcampo8();
		$estadocli = $prod->showcampo9();
		$iecli = $prod->showcampo10();
		if ($iecli == ""){$iecli = "ISENTO";}
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
		#$obsnota = "CONDICOES DE PAGAMNETO:";
		$obsnota = substr($obsnota,0,50);
		#$obsnota1 = "ALIENAÇÃO FIDUCIARIAMENTE ABN ANRO-REAL";
		$obsnota1 = substr($obsnota1,0,50);
		$naturezaop = "VENDAS MERCADORIAS ADQ. TERCEIROS";
		$cfop = 6102;
		
		
		//EXTRAS
		
		$vt = $prod->showcampo18();
		$vpp = $prod->showcampo19();


		// MONTAGEM DOS DADOS


		// CABECALHO
		#echo("INICIOPED;$codbarraped;1;$i;");
		
		$texto .= linha(10); 
		$texto .= "$naturezaop";$texto .= espaco($tc1, $naturezaop);$texto .= "$cfop\n"; //L1
		$texto .= linha(2); 
		$texto .= "$nomecli";$texto .= espaco($tc2, $nomecli);$texto .= "$cpf_cnpj";$texto .= espaco($tc3, $cpf_cnpj);$texto .= "$dataatualf\n"; //L1
		$texto .= linha(1); 
		$texto .= "$enderecocli";$texto .= espaco($tc4, $enderecocli);$texto .= "$bairrocli";$texto .= espaco($tc5, $bairrocli);$texto .= "$cepcli\n"; //L1
		$texto .= linha(1); 
		$texto .= "$cidadecli";$texto .= espaco($tc6, $cidadecli);$texto .= "($dddcli)$telcli";$texto .= espaco($tc7, $telcli);$texto .= "$estadocli";$texto .= espaco($tc8, $estadocli);$texto .= "$iecli\n"; //L1
		$texto .= linha(3); 

		// DADOS CLIENTE
		#echo("$cpf_cnpj;$tipocli;$nomecli;$enderecocli;$cepcli;$cidadecli;$estadocli;$bairrocli;$iecli;$enderecocob;$cepcob;$cidadecob;$estadocob;$bairrocob;$dddcli;$telcli;$endentrega;$cpf_cnpjentrega;$ieentrega;");

		// DADOS TRANPORTADORA
		#echo("$nometrans;$ceptrans;$nomemotorista;$cartahabilitacao;$nomeredespachador;");

		// DADOS VOLUME
		#echo("$marcavol;$especievol;$numerovol;$qtdevol;");

		// DADOS GERAIS
		#echo("$codvend;$datasaida;$codfiscalopera;$descrfiscalopera;$obsnota;");


		
// ****************************  PRODUTOS DO PEDIDO *************************************

			// CABECALHO
			#echo("INICIOPROD;");

			$condicao7 .= "pedidoprod.codped='$codped'";
			$condicao7 .= " and produtos.codprod=pedidoprod.codprod";
			
			// LISTA OS REGISTROS DE PRODUTOS DO PEDIDO
			$prod->listProdSum("produtos.codprod, produtos.nomeprod, qtde, ppu", "pedidoprod, produtos", $condicao7, $array1, $array_campo1, $parm );

			for($j = 0; $j < count($array1); $j++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $j );

			//TAM MAX DOS CAMPOS

			$tp1 = 12; // CODPROD
			$tp2 = 66; // NOMEPROD
			$tp3 = 10; // UNIDADE
			$tp4 = 9; // QTDE
			$tp5 = 16; // VALOR UNIT
			$tp6 = 16; // VALOR TOTAL
			$tp7 = 4; // ICMS


			// DADOS DOS PRODUTOS

			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$nomeprod = substr($nomeprod,0,$tp2-10);
			$qtde = $prod->showcampo2();
			$unidade = "UN";
			$codtribut = 1;  // 1 - PRODUTO 2- SERVIÇO
			$ppu = $prod->showcampo3();
			$impostoretido = "";
			$perc_iss_estado = "";
			$perc_icms = "12";
			$flag_imprime_fracao = "N"; 

			$ppu = $ppu * ($vpp/$vt);
			$ppt = $qtde*$ppu;
			$ppuf = number_format($ppu,2,',','.'); 
			$pptf = number_format($ppt,2,',','.'); 
			#$ppuf = $ppu;
			
			


// MONTAGEM DOS DADOS

			// CABECALHO
			#echo("$codbarraped;2;$j;");

		
		$texto .= "$codprod";$texto .= espaco($tp1, $codprod);$texto .= "$nomeprod";$texto .= espaco($tp2, $nomeprod);$texto .= "$unidade";$texto .= espaco($tp3, $unidade);$texto .= "$qtde";$texto .= espaco($tp4, $qtde);$texto .= "$ppuf";$texto .= espaco($tp5, $ppuf);$texto .= "$pptf";$texto .= espaco($tp6, $pptf);$texto .= "$perc_icms\n"; //L1

			// DADOS DOS PRODUTOS

			#echo("$codprod;$nomeprod;$qtde;$unidade;$codtribut;$ppuf;$impostoretido;$perc_iss_estado;$perc_icms;$flag_imprime_fracao;");

		$vnf = $vnf + $ppt;

		$condicao7 = "";
		 } // FOR DOS PRODUTOS

		 $nl = 17 - ($j -1);

		$vnff = number_format($vnf,2,',','.');
		$icms = $vnf*0.12;
		$icmsf = number_format($icms,2,',','.');
		

		 // RODAPE
			#echo("FIMPROD;");

// ****************************  PRODUTOS DO PEDIDO *************************************
	
	// RODAPE
	#echo("FIMPED;"); 
	
		 $texto .= linha($nl); 
		 $texto .= linha(8); // SERVICOS
		 $texto .= "$vnff";$texto .= espaco($tc9, $vnnff);$texto .= "$icmsf";$texto .= espaco($tc10, $icmsf);$texto .= "$vnff\n";
		 $texto .= linha(1); 
		 $texto .= espaco(112, "");$texto .= "$vnff\n";
		 $texto .= linha(10); 
		 $texto .= "$obsnota\n";
 		 $texto .= "$obsnota1\n";


	 } // FOR DO PEDIDO

	
	// RODAPE
	#echo("FIMARQ;");


#echo("$texto");
$filename = 'nf.txt';

// Tendo certeza que o arquivo existe e que há permissão de escrita primeiro.
if (is_writable($filename)) {

   // Em nosso exemplo, nós estamos abrindo $filename em modo de append (acréscimo).
   // O ponteiro do arquivo estará no final dele desde
   // que será aqui que $somecontent será escrito com fwrite().
   if (!$handle = fopen($filename, 'w')) {
         print "Erro abrindo arquivo ($filename)";
         exit;
   }

   
   // Escrevendo $somecontent para o arquivo aberto.
   if (!fwrite($handle, $texto)) {
       print "Erro escrevendo no arquivo ($filename)";
       exit;
   }

   print "Sucesso: escrito no arquivo ($filename)";

   fclose($handle);

} else {
   print "The file $filename is not writable";
}
	

	$prod->msgpopup("NOTA FISCAL GERADA CORRETAMENTE", "OK");

?>
