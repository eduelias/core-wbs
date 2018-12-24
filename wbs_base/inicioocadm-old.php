

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "oc";					// Tabela EM USO
$condicao1 = "codoc=$codoc";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by codoc limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codoc";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "ORDEM DE COMPRA";
$titulo = "ADMINISTRAÇÃO ORDEM DE COMPRA";
$titulo1 = "ORDEM DE COMPRA";

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
		#if ($codempvend <> 0){$codempselect = $codempvend;}

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$dataatual = $prod->gdata();

		// ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
		$codempoc = $prod->showcampo1();
		$prod->setcampo9($dataatual);
		$prod->setcampo13(1);
		
		$prod->upProd("oc", $condicao1);

		

		$Actionter = "lock";
		$prod->msggeral("Ordem de Compra registrada corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg", 0);
		
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";
		$codemp="";

        break;

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;

	 case "recalc":

		 // ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
					

		// VERIFICA COTACAO OC
		$prod->listProd("moeda", "codmoeda=$codmoedaoc");
		$cotacao = $prod->showcampo2();
		$datacotacao = $prod->showcampo3();

		$prod->clear();
		$prod->listProdgeral("ocprod", "codoc=$codoc", $array98, $array_campo98 , "");

		for($i = 0; $i < count($array98); $i++ ){
			
			$prod->mostraProd( $array98, $array_campo98, $i );

			// ATUALIZA DADOS DA TABELA OCPROD

			$codprodoc = $prod->showcampo2();
			$cbok = $prod->showcampo11();
			
			$prod->setcampo4($qtderec[$i]);
			$pcu[$i] = str_replace('.','',$pcu[$i]);
			$pcu[$i] = str_replace(',','.',$pcu[$i]);
			$prod->setcampo5($pcu[$i]);
			$prod->setcampo6($garantia[$i]);
			$prod->setcampo8($nf[$i]);
			$prod->setcampo9($nfa[$i].$nfm[$i].$nfd[$i]);
			
			// CALCULO DA DATA DE PREV DE CHEGADA
			$dpm = $nfm[$i];
			$dpa = $nfa[$i];
			$dpm = $dpm + $garantia[$i];
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

			$prod->setcampo10($dpa.$dpmresto.$nfd[$i]);

			$prod->upProd("ocprod", "codoc=$codoc and codprod = $codprodoc");

			
			if ($qtderec[$i] < 0 ){

				$prod->clear();
				$prod->listProd("ocprod", "codoc=$codoc and codprod=$codprodoc");
				$valorocprod = $prod->showcampo5();

				// ATUALIZAR VALOR DA OC
				$prod->clear();
				$prod->listProd("oc", "codoc=$codoc");
				$valoroc = $prod->showcampo12();
				$valortoc = $valoroc-$valorocprod;
				$prod->setcampo12($valortoc);
				$prod->upProd("oc", "codoc=$codoc");

				$prod->delProd("ocprod", "codoc=$codoc and codprod = $codprodoc");
			}


			if ($qtderec[$i] > 0 and $scb[$i] <> ""){
	
			if ($cbok <> "OK"){

			// VERIFICA LIBERACAO DO CODBARRA
			$prod->listProdU("IF (chkcb = 'N' , 'S', 'N')", "produtos", "codprod = $codprodoc");
			$libcb = $prod->showcampo0();
			
			if ($libcb == "S"){

				for($p = 0; $p < $qtderec[$i]; $p++ ){

					$prod->clear();
					$prod->setcampo1($codoc);
					$prod->setcampo2($codprodoc);
					$prod->setcampo3($scb[$i]);
					$prod->setcampo8($codempselect);
					$prod->setcampo9($p); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
					$prod->setcampo10("N"); // FLAG RMA
					$prod->setcampo11("N"); // FLAG PECA ANTIGA
					$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
					
					$prod->addProd("codbarra", $ureg);

				}
				

				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodoc");

				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				$codmoedaprod = $prod->showcampo8();
				#$puc = $prod->showcampo9();
				#$datauc = $prod->showcampo10();
				$pcm = $prod->showcampo11();
				
								
				//CAMBIO DE MOEDAS
					
					// MODIFICA A COTACAO DO PRODUTO ORIGINAL PARA A MOEDA DO PRODUTO DA OC
					// PASSA TODOS OS VALORES PARA MESMA BASE

					$prod->listProd("moeda", "codmoeda=$codmoedaprod");		
					$tipomoedaprod = $prod->showcampo1();
					$cotacaoprod = $prod->showcampo2();

					$pcucambio = ($pcu[$i]*$cotacaoprod)/$cotacao;	
					$pcmcambio = ($pcm*$cotacaoprod)/$cotacao;	
			
								
				// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS

					$prod->listProdSum("COUNT(*)*(SUM(qtde)-SUM(reserva)) as estoque", "estoque", "codprod=$codprodoc and codemp = $codempselect", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
	
										
					//CALCULA O PCM NOVO
					if (($estoque) > 0 ):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtderec[$i]))/($estoque+$qtderec[$i]);
					else:
						$pcmnovo = $pcucambio;
					endif;


				$qtdenovo = $qtdeold + $qtderec[$i];
				$prod->clear();
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodoc");
				$prod->setcampo3($qtdenovo);
				$prod->setcampo8($codmoedaoc);
				$prod->setcampo9($pcucambio);
				$prod->setcampo10($dataatual);
				$prod->setcampo11($pcmnovo);

				$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprodoc");


				// FINALIZAÇÃO - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
				$prod->clear();
				$prod->listProd("ocprod", "codoc=$codoc and codprod=$codprodoc");
				$prod->setcampo11("OK");
				$prod->upProd("ocprod", "codoc=$codoc and codprod = $codprodoc");

				


			}

			} // CBOK

			} // QTDEREC
	
			

		}
			
		 break;


	 case "delete":

		$prod->delProd("oc", "codoc=$codoc");

		$prod->delProd("ocprod", "codoc=$codoc");
		

		$Actionsec="list";
		
		 break;

	 case "altdata":
			
			// ATUALIZA CAR

				$datavencnew = $avenc.$mvenc.$dvenc;
				$prod->listProd("oc", "codoc=$codoc");
				$prod->setcampo11($datavencnew);
				$prod->upProd("oc", "codoc=$codoc");
			
				$Action = "update";
		
				
		 break;


	case "importcb":

		$erro = 1;

		$prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

		for($i = 0; $i < count($array3); $i++ ){
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprod_ped = $prod->showcampo2();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			for($j = 0; $j < count($codcb_array); $j++ ){

				$prod->listProdU("codbarra", "codbarra", "codcb = $codcb_array[$j]");
				$codbarra = $prod->showcampo0();

				//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
				$prod->listProdSum("COUNT(*) as numreg", "codbarra", "codbarra = '$codbarra' and codbarraped <> '1' and codprod=$codprod_ped and codemp=$codempselect", $array, $array_campo, "" );
				$prod->mostraProd( $array, $array_campo, 0 );
				$numreg = $prod->showcampo0();

				// VERIFICA LIBERACAO DO CODBARRA
				$prod->listProdU("IF (chkcb = 'N' , 'S', 'N')", "produtos", "codprod = $codprod_ped");
				$libcb = $prod->showcampo0();
			
				if ($libcb == "S"){$numreg = 0;}

				if ($numreg <> 0){
					$erro = $erro *0;
				}else{
					$erro = $erro *1;
				}//NUMREG

			}//FOR

		}//FOR

		// INSERE CODBARRA
		if ( $erro == 1){

		$prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

		for($i = 0; $i < count($array3); $i++ ){
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprod_ped = $prod->showcampo2();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			for($j = 0; $j < count($codcb_array); $j++ ){
			
				$prod->listProdU("codbarra", "codbarra", "codcb = $codcb_array[$j]");
				$codbarra = $prod->showcampo0();

				// CRIA CODBARRA
					$prod->clear();
					$prod->setcampo1($codoc);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3($codbarra);
					$prod->setcampo8($codempselect);
					$prod->setcampo9($j); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
					$prod->setcampo10("N"); // FLAG RMA
					$prod->setcampo11("N"); // FLAG PECA ANTIGA
					$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
					
					$prod->addProd("codbarra", $ureg);

			}//FOR

		}//FOR


		// ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
		$codempoc = $prod->showcampo1();

		// VERIFICA COTACAO OC
		$prod->listProd("moeda", "codmoeda=$codmoedaoc");
		$cotacao = $prod->showcampo2();
		$datacotacao = $prod->showcampo3();
		
		
		// ATUALIZA DADOS DA TABELA ESTOQUE
		$prod->listProdgeral("ocprod", "codoc=$codoc", $array99, $array_campo99 , "");

		for($i = 0; $i < count($array99); $i++ ){
			
			$prod->mostraProd( $array99, $array_campo99, $i );

			$codprodoc = $prod->showcampo2();
			$qtderec = $prod->showcampo4();
			$pcu = $prod->showcampo5();

					
				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempoc and codprod=$codprodoc");

				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				$codmoedaprod = $prod->showcampo8();
				#$puc = $prod->showcampo9();
				#$datauc = $prod->showcampo10();
				$pcm = $prod->showcampo11();
				
								
				//CAMBIO DE MOEDAS
					
					// MODIFICA A COTACAO DO PRODUTO ORIGINAL PARA A MOEDA DO PRODUTO DA OC
					// PASSA TODOS OS VALORES PARA MESMA BASE

					$prod->listProd("moeda", "codmoeda=$codmoedaprod");		
					$tipomoedaprod = $prod->showcampo1();
					$cotacaoprod = $prod->showcampo2();

					$pcucambio = ($pcu*$cotacaoprod)/$cotacao;	
					$pcmcambio = ($pcm*$cotacaoprod)/$cotacao;	
			
								
				// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS

					$prod->listProdSum("COUNT(*)*(SUM(qtde)-SUM(reserva)) as estoque", "estoque", "codprod=$codprodoc and codemp = $codempoc", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
	
										
					//CALCULA O PCM NOVO
					if (($estoque) > 0 ):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtderec))/($estoque+$qtderec);
					else:
						$pcmnovo = $pcucambio;
					endif;


				$qtdenovo = $qtdeold + $qtderec;
				echo("$qtdenovo");
				$prod->listProd("estoque", "codemp=$codempoc and codprod=$codprodoc");
				
				$prod->setcampo3($qtdenovo);
				$prod->setcampo8($codmoedaoc);
				$prod->setcampo9($pcucambio);
				$prod->setcampo10($dataatual);
				$prod->setcampo11($pcmnovo);

				$prod->upProd("estoque", "codemp=$codempoc and codprod=$codprodoc");

				// FINALIZAÇÃO - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
				$prod->listProd("ocprod", "codoc=$codoc and codprod=$codprodoc");
				$prod->setcampo11("OK");
				$prod->upProd("ocprod", "codoc=$codoc and codprod = $codprodoc");
				
		}

			$msg_erro = "IMPORTAÇÃO COMPLETA";
			$lib_end = 1;

		}else{

			$msg_erro = "ERRO NA IMPORTAÇÃO DO CODBARRAS";

		}
		
		$Action = "update";
				
		 break;



}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";

		if ($palavrachave == ""):
							
			$condicao2 = "";
			if ($codempselect <> ""):

				if ($codocpesq <>""):
					$condicao3 .= "oc.codemp='$codempselect'";
					$condicao3 .= "and oc.codoc='$codocpesq'";
					$condicao3 .= "and oc.codfor=fornecedor.codfor";
				else:
					$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor";
				endif;
			
			else:

				$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor";
		
			endif;
		

		else:
			
			if ($codempselect <> ""):

				if ($codocpesq <>""):
					$condicao3 .= "oc.codemp='$codempselect'";
					$condicao3 .= "and oc.codoc='$codocpesq'";
					$condicao3 .= "and oc.codfor=fornecedor.codfor";
				else:
					$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor and" . $condicao2 ;
				endif;
			
			else:

				$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor";
			
			endif;

		endif;


		break;


		
		}

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "oc, fornecedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codoc, oc.codfor, codmoeda, datacompra, dataprevcheg, voc, fornecedor.nome", "oc, fornecedor", $condicao3, $array, $array_campo, $parm );
		
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


function adjust(element) {

	return element.value.replace ('.', ',');
}




</script>

");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "recalc" ):
	
#-- Mostra dados da tabela OCTEMP

 	$prod->listProd("oc", "codoc=$codoc");

		$codoc = $prod->showcampo0();
		$codemp = $prod->showcampo1();
		$codfor = $prod->showcampo2();
		$codmoeda = $prod->showcampo3();
		$codvend = $prod->showcampo4();
		$contato = $prod->showcampo5();
		$dtoc = $prod->showcampo7();
		$obs = $prod->showcampo10();
		$dtoc = $prod->fdata($dtoc);
		$dprevcheg = $prod->showcampo11();
		$codped_transf = $prod->showcampo14();
		$cb = $prod->showcampo15();

		$dprevcheg = str_replace('-','',$dprevcheg);
		$anopar = substr($dprevcheg,0,4);
		$mespar = substr($dprevcheg,4,2);
		$diapar = substr($dprevcheg,6,2);

		#$dprevcheg = $prod->fdata($dprevcheg);
		$hist = $prod->showcampo13();
		
 $prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);

$prod->listProd("fornecedor", "codfor=$codfor");
				
		$nomeforold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$tel1old = $prod->showcampo7();
		$tel2old = $prod->showcampo8();
		$cgcold = $prod->showcampo14();
		$ieold = $prod->showcampo16();
		$contatoold = $prod->showcampo17();
		$emailold = $prod->showcampo19();

 $prod->listProd("moeda", "codmoeda=$codmoeda");
				
		$tipomoeda = $prod->showcampo1();
		$cotacao = $prod->showcampo2();
		$datacot = $prod->showcampo3();
		$datacot = $prod->fdata($datacot);

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>ADMINISTRAÇÃO</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></b></td>
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
<form method='POST' name='Form54' action='$PHP_SELF?Action=altdata'>							
 <div align='center'>
      <center>
      <table border='0' width='550' cellspacing='1' cellpadding='2'>
        <tr>
          <td width='315' bgcolor='#000000'><b><font face=' Verdana, Arial, Helvetica, sans-serif' color='#F0F0F0' size='3'>$titulo1:&nbsp;</font></b></td>
          <td width='217' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='2' color='#86ACB5'><b>
       $nomeempold </b></font></td>
        </tr>
      </center>
      <tr>
        <td width='318' bgcolor='#F0F0F0'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MOEDA DA OC:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$tipomoeda</font></td>
        <center>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>COMPRADOR:<br>
          </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        FORNECEDOR</b></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>FORNECEDOR:<br>
        </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeforold</font></b></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CNPJ:<br>
      </font></b><font color='#000000'>$cgcold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$enderecoold
        - $cidadeold - $bairroold - $estadoold - $cepold</font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>INSC. EST.:<br>
      </font></b><font color='#000000'>$ieold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br>
        </font></font></b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>$emailold</font></font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>&nbsp;$tel1old<br>&nbsp;$tel2old</font></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES</b></font></td>
        </tr>
        <tr>
          <td width='315' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS:<br>
            </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obs</font></td>
        </center>
        <td width='217' bgcolor='#F0F0F0'>
		<p align='right'><font size='1'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA 
      PREV. CHEGADA:<br>
      </font><font face=' Verdana, Arial, Helvetica, sans-serif'><input type='text' name='dvenc' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc' value='$anopar'  size='4' maxlength='4'></font></b></font>
        </td>
      </tr>
      <center>
      <tr>
        <td width='540' colspan='2'>
        <hr size='0'>
        </td>
      </tr>
      </table>
      </center>
    </div>

			  <p align='center'><input type='submit' value='Alterar Data OC.' name='B1' class='sbttn'></p>

	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='retorno' value='1'>
		<input type='hidden' name='desloc' value='$desloc'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
	</form>
	  <br>

");
if ($codped_transf <> 0){
$valorcampo = "IMPORTAR CODBARRAS";
echo("
<form name='form1' method='post' action='$PHP_SELF?Action=importcb&desloc=0'>

");
}else{
$valorcampo = "RECALCULAR VALORES";	
echo("
<form name='form1' method='post' action='$PHP_SELF?Action=recalc&desloc=0'>

");
}
echo("




	 <table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
        <tbody>
          <tr>
            <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
              PRODUTOS</font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
              <b>DA ORDEM DE COMPRA</b></font></td>
          </tr>
        </tbody>
      </table>
      <table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
        <tbody>
          <tr bgColor='#336699'>
            <td width='16' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>&nbsp;</b></font></td>
            <td width='67' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>PRODUTO</b></font></td>
			  <td width='36' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>QTDE CHEG.</b></font></td>
            <td width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>QTDE COMP.</b></font></td>
            <td width='130' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>PREÇOS ($tipomoeda)</b></font></td>
            <td width='35' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>GAR<br>(MÊS)</b></font></td>
			<td width='80' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>DATA<br>
              GAR</b></font></td>
			<td width='227' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>NF</b></font></td>
			<td width='33' height='0' align ='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>CB</b></font></td>
          </tr>
		 ");

			  $prod->listProdgeral("ocprod", "codoc=$codoc", $array3, $array_campo3 , "");

	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$qtderec = $prod->showcampo4();
			$garantia = $prod->showcampo6();
			$nf = $prod->showcampo8();
			$datanf = $prod->showcampo9();
			$nfa = substr($datanf,0,4);
			$nfm = substr($datanf,5,2);
			$nfd = substr($datanf,8,2);
			$cb = $prod->showcampo11();
			if ($cb=="OK"){$corcb="#339900";}else{$cb="NO";$corcb="#FF0000";}

					

			#$codprodcj = $prod->showcampo8();
			$pcu = $prod->showcampo5();
			$dtprev = $prod->showcampo10();
			$dtprev = $prod->fdata($dtprev);
			if ($qtde<>$qtderec){
			$put= $qtde*$pcu;
			}else{
			$put= $qtderec*$pcu;
			}

			$prod->listProdU("nomeprod, unidade, chkcb", "produtos", "codprod=$codprodoc");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$chkcb = $prod->showcampo2();
			
						
			/*
			$prod->listProdgeral("produtos", "codprod=$codprodcj", $array12, $array_campo12 , "");
			$prod->mostraProd( $array12, $array_campo12, 0 );

			$nomeprodcj = $prod->showcampo19();
			*/
			
		

		$k=$i+1;

		$fput = $prod->fpreco($put);
		$fpcu = $prod->fpreco($pcu);


echo("


          <tr bgColor='#d6e7ef'>
            <td align='middle' width='16' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$k</b></font></td>
            <td width='67' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
			 ");
			if ($cb=="OK" or $hist==1 or $codped_transf <> 0){
				echo("
				<td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b>$qtderec</b></font></td>
				");
            }else{
				echo("
				<td align='middle' width='36' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><input type='text' name='qtderec[$i]' size='3' value='$qtderec'></b></font></td>
				");
			}
			echo("
	        <td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
			");
			if ($hist<>1 and $codped_transf == 0){
				echo("
				<td width='130' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>UNITÁRIO<br> <input type='text' name='pcu[$i]' size='8' value='$fpcu' onKeyUp='this.value = adjust(this);'><br> TOTAL<br>
          </b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b> $fput</b></font></td>
				");
			}else{
				echo("
				<td width='130' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>UNITÁRIO<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b> $fpcu</b></font><br> TOTAL<br>
          </b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b> $fput</b></font></td>
				");
			}
			
			if ($hist<>1 and $codped_transf == 0){ 
				echo("
				<td align='middle' width='35' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><input type='text' name='garantia[$i]' size='4' value='$garantia'></b></font></td>
				");
			}else{
				echo("
				<td align='middle' width='35' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$garantia</b></font></td>
				");
			}
			echo("
            <td align='middle' width='80' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$dtprev</font></td>
			");
			if ($hist<>1 and $codped_transf == 0){ 
				echo("
				<td align='middle' width='227' height='0'>
				<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><input type='text' name='nf[$i]' size='15' value='$nf'></b></font><br><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA NF</b></font><br>
				<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><input type='text' name='nfd[$i]' size='2' value='$nfd' maxLength='2'>/<input type='text' name='nfm[$i]' size='2' value='$nfm' maxLength='2'>/</b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><input type='text' name='nfa[$i]' size='4' value='$nfa' maxLength='4'></b></font></td>
				");
			}else{
				echo("
				<td align='middle' width='227' height='0'>
				<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$nf</b></font><br><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA NF</b></font><br>
				<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$nfd/$nfm/$nfa</b></font></td>
				");
			}
if ($qtderec <> 0){

		  if ($cb=="OK" or $hist==1){

			
		 echo("
			<td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciocb.php?Action=list&desloc=$desloc&codemp=$codemp&codprod=$codprodoc&codoc=$codoc&cont=$qtderec&codempselect=$codemp&retlogin=$retlogin&connectok=$connectok&pg=$pg&cb_ok=1','name','500','400','yes');return 
false");echo('"');echo(">$cb</a></b></font></td>

		 ");
			  
		  }else{

			 if ($codped_transf == 0){

			    if ($chkcb <>'Y'){
			 echo("
			<td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>SCB</b><br>
				<input type='text' name='scb[$i]' size='8' ></font></td>
		 ");
			  }else{
		echo("
		  <td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciocb.php?Action=list&desloc=$desloc&codemp=$codemp&codprod=$codprodoc&codoc=$codoc&cont=$qtderec&codempselect=$codemp&retlogin=$retlogin&connectok=$connectok&pg=$pg','name','500','400','yes');return 
false");echo('"');echo(">$cb</a></b></font></td>
");
			   }

			 }else{

				  echo("
			<td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b>$cb</b></font></td>

				 ");
			 }



		  }
}else{
	 echo("
			<td align='middle' width='33' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb' align='center'>PREENCHER<bR>QTDE CHEG.</font></td>

		 ");
	
}// QTDEREC = 0

		  echo("
          </tr>
			   ");

	$ptotal = $ptotal + $put;
	if($cb=="OK"){echo("<input type='hidden' name='qtderec[$i]' value='$qtderec'>");}
	 }
	
	$ptotalf = $prod->fpreco($ptotal);

	//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
	$prod->listProdSum("COUNT(*) as numreg", "ocprod", "codoc=$codoc and cb not like 'OK'", $array99, $array_campo99, "" );
	$prod->mostraProd( $array99, $array_campo99, 0 );
	$numregcb = $prod->showcampo0();

if ($hist<>1 ){

	echo("
		

		
        </tbody>
      </table>
			<br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					  <td width='58%'>&nbsp;
                        <table border='0' width='100%' cellspacing='0' cellpadding='2'>
                          <tr>
                            <td width='5%'><img border='0' src='images/bt-continuaped.gif' ></td>
                            <td width='32%'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR
                              A LISTAGEM</a></b></font></td>
                            <td width='5%'><img border='0' src='images/bt-recalculaped.gif' ></td>
                            <td width='58%'><font size='1' face='Verdana'><b>
				");
							if ($codped_transf <> 0 and $numregcb == 0){
							echo("$msg_erro");
							}else{
							echo("
								<input class='sbttn' type='submit' name='Submit' value='$valorcampo'><BR>$msg_erro</b></font>
							");
							}
							echo("
                            </td>
                          </tr>
                        </table>
                        &nbsp;</td>
");
if ($tipomoeda == "Dolar"){$caractmoeda = "U$";}else{$caractmoeda = "R$";}
echo("
                      <td width='20%'><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font color='#336699' size='1'>VALOR
                        OC:</font><font size='2'><br>
                        $caractmoeda</font></b><font size='2'><b>  $ptotalf</b></font></font></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>

						  				 <br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					        
                            <td width='100%'> <p><font size='1' face='Verdana'><font color='#FF0000'>
                      IMPORTANTE:</font> Para que possa FINALIZAR A ORDEM DE COMPRA é necessário preencher os CODIGOS DE BARRA no campo <b>CB</b>. </font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>
");
if ($codped_transf == 0){
	$show_end = 1;
}else{
	if ($numregcb == 0){
			$show_end = 1;
	}else{
			$show_end = 0;
	}
}

 $prod->listProdgeral("ocprod", "codoc=$codoc and cb not like 'OK'", $array313, $array_campo313 , "");
 if (count($array313) == 0 and $show_end == 1){	
	 
	 $reg_cancel = $prod->listProd("ocprod", "codoc=$codoc");
	 if ($reg_cancel <> 0){
echo("
          <br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					        <td width='50%' align='right'><img border='0' src='images/bt-fechaped.gif' ></td>
                            <td width='50%'><font size='1' face='Verdana'><b>&nbsp;<a href='$PHP_SELF?Action=insert&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codoc=$codoc&retorno=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>FINALIZA ORDEM DE COMPRA</a></b></font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>

");
	 }else{
		 echo("
		  <br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					        <td width='50%' align='right'><img border='0' src='images/bt-fechaped.gif' ></td>
                            <td width='50%'><font size='1' face='Verdana'><b>&nbsp;<a href='$PHP_SELF?Action=delete&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codoc=$codoc&retorno=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CANCELAR ORDEM DE COMPRA</a></b></font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>

			");
	 }
 }
}else{
echo("
			  <p><div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
				  <tr>
					        <td width='40%' align='right'>&nbsp;</td>
                            <td width='60%'><font size='1' face='Verdana'><b>&nbsp;</b></font></td>
                    </tr>
                    <tr>
					        <td width='40%' align='right'><img border='0' src='images/bt-continuaped.gif' ></td>
                            <td width='60%'><font size='1' face='Verdana'><b>&nbsp;<a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR A LISTAGEM</a></b></font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>
				
");
}

 echo("


        
 	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='codped' value='$codped_transf'>
	<input type='hidden' name='retorno' value='1'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
	




	");
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "delete" or $Action == "list"):

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
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='for'>Fornecedor</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->
		COD OC: <input type='text' name='codocpesq' size='5'> 
		NOME FOR: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codocnew' value='$codocnew'>
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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>$nomeemp</option>
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
            <td width='26%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
              ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='27%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='41%'>
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ORDEM
              DE COMPRA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ORDEM
              DE COMPRA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1'><br>
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


	<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME FORNEC.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA OC</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MOEDA</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
	<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV CHEG</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codoc = $prod->showcampo0();
			$codfor = $prod->showcampo1();
			$codmoeda = $prod->showcampo2();
			$dataoc = $prod->showcampo3();
			$dataoc = $prod->fdata($dataoc);
			$dataprevcheg = $prod->showcampo4();
			$dataprevcheg = $prod->fdata($dataprevcheg);
			$valor = $prod->showcampo5();
			$valorf = $prod->fpreco($valor);
			$nomefor = $prod->showcampo6();

			$prod->listProd("moeda", "codmoeda=$codmoeda");
			$tipomoeda = $prod->showcampo1();

			if ($hist==1){$bgcorlinha="#99CCFF";}
			if ($hist==1){$botao="Detalhes";}else{$botao="Alterar";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codoc</font></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomefor</b></font></td>
	<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$dataoc</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$tipomoeda</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$valorf</font></b></td>
			
			<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$dataprevcheg</font></td>
			
			<td align='center' width='10%' height='0'><font size='1'><b><a
href='$PHP_SELF?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>$botao 
			  </font></b></a></font></td>
	");
if($hist<>1){
echo("
			<td align='center' width='10%' height='0'><font size='1'><b><!--<a
href='$PHP_SELF?Action=delete&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a>--></font></td>
	");
}else{
	echo("
<td align='center' width='10%' height='0'><font size='1'><b>&nbsp;</font></td>
	");
}
echo("
	   </tr>
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
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

echo("<br><br>");
include ("sif-rodape.php");
}

?>
       
