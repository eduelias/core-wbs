

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datatransf DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "TRANSFERENCIA DE CAIXA";
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

			if($retorno){

			

		   // GERA UM CAIXA PARA A NOVA EMPRESA CRIADA
			
			$prod->clear();
			$prod->setcampo1($codempnew);
			$nomecxnew = strtoupper($nomecxnew);
			$prod->setcampo2($nomecxnew);
			$prod->addProd("fin_cx", $uregcx);

			//INSERE UM SALDO INICIAL
			$prod->clear();
			$prod->setcampo1($dataatual);
			$prod->setcampo2(0);
			$prod->setcampo4($codempnew);
			$prod->setcampo5($uregcx);
			$prod->addProd("fin_cxsaldo", $uregsaldo);

			$Actionsec = "list";
			}
		
	
        break;

		

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "fechar":


		 // LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdU("codcxtransf, codcxsaldo, datatransf, valortransf, qcaixa, troco , login, hist", "fin_cxtransf", "codcxtransf = $codcxtransfselect");
		$codcxtransf = $prod->showcampo0();
		$codcxsaldo = $prod->showcampo1();
		$datatransf = $prod->showcampo2();
		$valortransf = $prod->showcampo3();
		$qcaixa = $prod->showcampo4();
		$troco = $prod->showcampo5();
		$login_transf = $prod->showcampo6();
		$hist = $prod->showcampo7();
		
		$prod->listProdU("codcx, codemp", "fin_cxsaldo", "codcxsaldo = $codcxsaldo");
		$codcx_transf = $prod->showcampo0();
		$codemp_transf = $prod->showcampo1();
		
		$prod->listProdU("codproj, codvend", "fin_cx", "codcx = $codcx_transf");
		$codproj_transf = $prod->showcampo0();
		$codvend_transf = $prod->showcampo1();

		$prod->listProdU("codconta", "projeto_nome", "codproj = $codproj_transf");
		$codconta_transf = $prod->showcampo0();

		$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvend_transf");
		$codconta_vend = $prod->showcampo0();


		 $prod->listProdSum("codch, bco, numcheq, valor, datavenc, valorvista", "fin_cxtransf_forma", "codcxtransf=$codcxtransfselect", $array, $array_campo, "ORDER BY DATAVENC" );
	 
	 for($i = 0; $i < count($array); $i++ ){
			
		$prod->mostraProd( $array, $array_campo, $i );

		$codch = $prod->showcampo0();
		$bco = $prod->showcampo1();
		$numcheq = $prod->showcampo2();
		$valor_ch = $prod->showcampo3();
		$datavenc = $prod->showcampo4();
		$valor_chv = $prod->showcampo5();


		//INSERE CHEQUES
			$prod->clear();
			$prod->listProd("fin_cheques", "codch=$codch");
				$prod->setcampo9("CO");
				$prod->setcampo12($codempselect);
				$prod->setcampo13($codcxselect);
			$prod->upProd("fin_cheques", "codch=$codch");

		$valort_ch = $valort_ch + $valor_ch;
		$valort_chv = $valort_chv + $valor_chv;
	 }
		
		$valort_d = $valortransf - $valort_ch;
	
	  //INSERE NOVA OPERACAO
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($dataatual);
		$prod->setcampo2($codcxsaldoselect);
		$prod->addProd("fin_cxopera", $uregopera);
		

	  //INSERE NO CAIXA SAIDA DE DINHEIRO
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($uregopera);
		$prod->setcampo2($codcxsaldoselect);
		$prod->setcampo3("02.00");
		$prod->setcampo4("Dinheiro - Transferência");
		$prod->setcampo5($dataatual);
		// CREDITO
			$prod->setcampo6($valort_d);
		$prod->setcampo10($obs);
		$prod->setcampo11($login);
		$prod->addProd("fin_cxlanc", $ureglanc);


		// ROTINA GERAL

			if ($codempselect <> $codemp_transf){

			// CONTA DA EMPRESA
			
				if ($valort_d >=0){

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_transf);  //
					$prod->setcampo2("02.00");
					$prod->setcampo3("Dinheiro - Transferência");
							$prod->setcampo4($valort_d); // CREDITO
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($codcxtransf . " - Data: ".$datatransf);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);
				}

				if ($valor_vista >=0){

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_transf);  //
					$prod->setcampo2("02.01");
					$prod->setcampo3("Cheque valor à vista - Transferência");
							$prod->setcampo4($valort_chv); // CREDITO
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($codcxtransf . " - Data: ".$datatransf);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);
				}
			}

			if ($qcaixa > 0){

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_vend);  //
					$prod->setcampo2("02.00");
					$prod->setcampo3("Quebra de Caixa");
							$prod->setcampo5($qcaixa); // DEBITO
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo12($codcxtransf . " - Data: ".$datatransf);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);
				}
			
			$prod->clear();
			$prod->listProd("fin_cxtransf", "codcxtransf = $codcxtransfselect");
				$prod->setcampo6("S");
			$prod->upProd("fin_cxtransf", "codcxtransf = $codcxtransfselect");

$Actionsec="list";
		
	    break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		
		
		if ($codempselect <> ""):
		
			if ($acx == "" and $mcx == "" and $dcx == ""){
							
				if ($hist == 'S'){
					$condicao3 .= " hist = 'S'";
				}else{
					$condicao3 .= " hist = 'N'";
				}
			
			}else{
				
				$datacx = $acx."-".$mcx."-".$dcx;
				$condicao3 .= " datatransf like '$datacx%'";
				if ($hist == 'S'){
					$condicao3 .= " and hist = 'S'";
				}else{
					$condicao3 .= " and hist = 'N'";
				}
					

			}


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_cxtransf", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codcxtransf, codcxsaldo, datatransf, valortransf, qcaixa, troco , login, hist, num_env", "fin_cxtransf", $condicao3, $array, $array_campo, $parm );

		

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

$title = "TRANSFERENCIA DE CAIXA ";

include("sif-topolimpo.php");

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

	if (!(consisteValor(form, form.qcaixa.name, 10)))
    {
        return false;
    }
	
	if (!(consisteVazioTamanho(form, form.qcaixa.name, 10)))
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
	
    if (campo == 'qcaixa')
        return 'Quebra de Caixa';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}

function adjust(element) {

	return element.value.replace ('.', ',');

}

</script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdU("codcxtransf, codcxsaldo, datatransf, valortransf, qcaixa, troco , login, hist, num_env", "fin_cxtransf", "codcxtransf = $codcxtransfselect");
		$codcxtransf = $prod->showcampo0();
		$codcxsaldo = $prod->showcampo1();
		$datatransf = $prod->showcampo2();
		$valortransf = $prod->showcampo3();
		$qcaixa = $prod->showcampo4();
		$troco = $prod->showcampo5();
		$login_transf = $prod->showcampo6();
		$hist = $prod->showcampo7();
		$num_env = $prod->showcampo8();
		
		$prod->listProdU("codemp, saldoini, saldofin, datacxsaldo, codcx, hist", "fin_cxsaldo", "codcxsaldo=$codcxsaldo");
		$codemp = $prod->showcampo0();
		$saldoini = $prod->showcampo1();
		$saldofin = $prod->showcampo2();
		$codcx = $prod->showcampo4();
		$hist = $prod->showcampo5();
		$datacxsaldo = $prod->showcampo3();
		
		// FORMATACAO //
		$datacxsaldof = $prod->fdata($datacxsaldo);
		$saldoinif = number_format($saldoini,2,',','.'); 
		$saldofinf = number_format($saldofin,2,',','.');

		$prod->listProdU("nome", "empresa", "codemp=$codemp");
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);

		$prod->listProdU("nomecx", "fin_cx", "codemp=$codemp and codcx = $codcx");
				
		$nomecxold = $prod->showcampo0();
		$nomecxold = strtoupper($nomecxold);
	

echo("


	<center>
 
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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxselect=$codcxselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><img border='0' src='images/bt-continuaped.gif' ><br>
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
<form method='POST' action='$PHP_SELF?Action=fechar' name='Form1' onSubmit = 'if (verificaObrig(document.Form1)==false) return false'>	

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 



<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 

<div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
      <tr>
     <td width='100%' bgcolor='#000000' valign='top' colspan ='2'></td>
    </tr>
    <center>
      <tr>
      <td width='50%' bgcolor='#F3F3F3' valign='top'><font face='Verdana'><b>
      <font size='1'><font color='#800000'>EMPRESA:</font><br>
        </b>$nomeempold</font></font></td>
    <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='right'><font face='Verdana'><b>
      <font size='2'><font color='#800000'>SALDO FINAL CAIXA:<br>
        </font>R$ $saldofinf</font></b></font></td>
      </tr>
    <tr>
      <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='left'><font face='Verdana'><b><font size='1'>
      <font color='#800000'>CAIXA:</font><br>
         </b> $nomecxold  - NUM  ENVELOPE: <b>$num_env</font></font></td>
    </center>
    <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='right'><font face='Verdana'>
      <font size='1'><font color='#800000'>DATA CAIXA:<br>
          </font>$datacxsaldof</font></font></td>
    </tr>
  <tr>
     <td width='100%' bgcolor='#000000' valign='top' colspan ='2'></td>
    </tr>
    </table>
  </div>
<br>


<table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
  <tbody>
    <tr bgColor='#d6b778'>
      <td width='46' height='0' align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO</font></b></td>
      <td width='129' height='0' align='center'>
        <div align='center'>
          <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUM.
          CHEQUE</font></b>
        </div>
      </td>
      <td width='112' height='0'>
        <div align='center'>
          <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA
          VENC.</font></b>
        </div>
      </td>
      <td width='123' height='0'>
        <div align='center'>
          <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><br>
          (R$)</font></b>
        </div>
      </td>
      <td width='123' height='0'>
        <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR
        VISTA<br>
        (R$)</font></b></td>
    </tr>


	");
	
	// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
				
	$prod->listProdSum("codch, bco, numcheq, valor, datavenc, valorvista", "fin_cxtransf_forma", "codcxtransf=$codcxtransfselect", $array, $array_campo, "ORDER BY DATAVENC" );
	 
	 for($i = 0; $i < count($array); $i++ ){
			
		$prod->mostraProd( $array, $array_campo, $i );

		$codch = $prod->showcampo0();
		$bco = $prod->showcampo1();
		$numcheq = $prod->showcampo2();
		$valor_ch = $prod->showcampo3();
		$datavenc = $prod->showcampo4();
		$valor_chv = $prod->showcampo5();


		#echo("$n");
		// FORMATACAO
		$valor_chf = number_format($valor_ch,2,',','.');
		$valor_chvf = number_format($valor_chv,2,',','.');
		$datavencf = $prod->fdata($datavenc);


		#if ($saldofin == 0){$status ="ABERTO";}else{$status="FECHADO";}			

		$bgcorlinha="#F2E4C4";
		#if ($status == "ABERTO"){$bgcorlinha="#FFCC66";}
		#if ($status == "FECHADO"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgColor='#f2e4c4'>
      <td align='center' width='46' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$bco</b></font></td>
      <td width='129' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$numcheq</b></font></td>
      <td width='112' height='0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datavencf</font></p>
      </td>
      <td align='middle' width='123' height='0' bgcolor='#D6B778'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$valor_chf</font></p>
      </td>
      <td align='middle' width='123' height='0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$valor_chvf</font></p>
      </td>
    </tr>
    


		
		");
		$valort_ch = $valort_ch + $valor_ch;
		$valort_chv = $valort_chv + $valor_chv;
		
	 }
		
	
		$valort_d = $valortransf - $valort_ch;
		if ($valort_d < 0){$troco = $troco + $valort_d;$valort_d = 0;}
		$valort_cx = $valortransf;
				
		$valort_chf = number_format($valort_ch,2,',','.'); 
		$valort_chvf = number_format($valort_chv,2,',','.'); 
		$valort_df = number_format($valort_d,2,',','.'); 
		$trocof = number_format($troco,2,',','.'); 
		$qcaixaf = number_format($qcaixa,2,',','.'); 
		$valort_cxf = number_format($valort_cx,2,',','.');

		$contcheq = count ($array);


		echo("
		<tr bgColor='#ffffff'>
      <td align='middle' width='46' height='0'></td>
      <td align='middle' width='129' height='0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='1'><b>TOTAL&nbsp;<br>
        CHEQUES</b></font></p>
      </td>
      <td width='112' height='0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>NUMCH: </b>$contcheq</font></td>
      <td align='middle' width='123' height='0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$
        $valort_chf</b></font></p>
      </td>
      <td align='middle' width='123' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$
        $valort_chvf</b></font></td>
    </tr>
		<tr>
      <td align='middle' width='46' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
      <td align='middle' width='129' height='0' bgcolor='#F3F3F3'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='1'><b>TOTAL<br>
        DINHEIRO</b></font></td>
      <td width='112' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
      <td align='middle' width='111' height='0' bgcolor='#F3F3F3'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$
        $valort_df</b></font></p>
      </td>
      <td align='middle' width='110' height='0' bgcolor='#F3F3F3'>
        &nbsp;
      </td>
    </tr>
    <tr>
      <td align='middle' width='46' height='0' bgcolor='#C0C0C0'></td>
      <td align='middle' width='129' height='0' bgcolor='#C0C0C0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='1'><b>TOTAL&nbsp;<br>
        TRANSFERIDO</b></font></p>
      </td>
      <td width='112' height='0' bgcolor='#C0C0C0'></td>
      <td align='middle' width='111' height='0' bgcolor='#C0C0C0'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$
        $valort_cxf</b></font></p>
      </td>
      <td align='middle' width='110' height='0' bgcolor='#C0C0C0'>
        &nbsp;
      </td>
    </tr>
    <tr>
      <td align='middle' width='508' height='0' bgcolor='#FFFFFF' colspan='5'>
        <hr size='0' align='center'>
      </td>
    </tr>
    <tr bgColor='#f3f3f3'>
      <td align='middle' width='46' height='0' bgcolor='#FFFFCC'>&nbsp;</td>
      <td align='middle' width='129' height='0' bgcolor='#FFFFCC'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='1'><b>QUEBRA&nbsp;<br>
        DE CAIXA</b></font></p>
      </td>
      <td width='112' height='0' bgcolor='#FFFFCC'>&nbsp;</td>
      <td align='middle' width='111' height='0' bgcolor='#FFFFCC'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$
        $qcaixaf</font></p>
      </td>
      <td align='middle' width='110' height='0' bgcolor='#FFFFCC'>
        &nbsp;
      </td>
    </tr>
    <tr bgColor='#f3f3f3'>
      <td align='middle' width='46' height='0' bgcolor='#FFFFCC'>&nbsp;</td>
      <td align='middle' width='129' height='0' bgcolor='#FFFFCC'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='1'><b>TROCO</b></font></td>
      <td width='112' height='0' bgcolor='#FFFFCC'>&nbsp;</td>
      <td align='middle' width='111' height='0' bgcolor='#FFFFCC'>
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$
        $trocof</font></p>
      </td>
      <td align='middle' width='110' height='0' bgcolor='#FFFFCC'>
        &nbsp;
      </td>
    </tr>


					</table>
	
<br><br>
 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Transferir caixa' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='codcxtransfselect' value='$codcxtransfselect'>
		<input type='hidden' name='qcaixa' value='$qcaixa'>
		<input type='hidden' name='valort_cx' value='$valort_cx'>
		<input type='hidden' name='troco' value='$troco'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		</form>
			
		");

	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



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
		DATA TRANSF.: <input type='text' name='dcx' size='2' maxlength='2'> <input type='text' name='mcx' size='2' maxlength='2'> <input type='text' name='acx' size='4' maxlength='4'> 
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='codcxtransfselect' value='$codcxtransfselect'>
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

	 
if ($codempselect<>""){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	$prod->listProdU("nomecx", "fin_cx", "codemp=$codempselect and codcx = $codcxselect");
				
		$nomecxold = $prod->showcampo0();
		$nomecxold = strtoupper($nomecxold);
		

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
	 <td width='5%'><img border='0' src='images/empresa.gif' width='25' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAIXA ATUAL<br>
        </b>$nomecxold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='20%'><b><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>TRANSFERÊNCIA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>TRANSFERÊNCIA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S'><br>
              HISTÓRICO</a></font></b></td>
          </center>
        </tr>
				 <tr>
    <td width='100%' colspan ='5'>
      <hr size='1'>
    </td>
  </tr>
      </table>

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUM ENV</font></b></div>
    </td>    
<td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAIXA</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA CAIXA</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA TRANF.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR TRANSF.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codcxtransf = $prod->showcampo0();
			$codcxsaldo = $prod->showcampo1();
			$datatransf = $prod->showcampo2();
			$valortransf = $prod->showcampo3();
			$qcaixa = $prod->showcampo4();
			$troco = $prod->showcampo5();
			$login_transf = $prod->showcampo6();
			$hist = $prod->showcampo7();
			$num_env = $prod->showcampo8();

			$prod->listProdU("datacxsaldo, codcx", "fin_cxsaldo", "codcxsaldo = $codcxsaldo");
			$datacxsaldo = $prod->showcampo0();
			$codcx_saldo = $prod->showcampo1();
			
			$prod->listProdU("nomecx, codemp", "fin_cx", "codcx = $codcx_saldo");
			$nomecx_saldoold = $prod->showcampo0();
			$codempcx_saldo = $prod->showcampo1();
			$nomecx_saldoold = strtoupper($nomecx_saldoold);

			$prod->listProdU("nome", "empresa", "codemp=$codempcx_saldo");
			$nomeempcxold = $prod->showcampo0();
			$nomeempcxold = strtoupper($nomeempcxold);


			// FORMATACAO //
			$datatransff = $prod->fdata($datatransf);
			$datacxsaldof = $prod->fdata($datacxsaldo);
			$valortransff = number_format($valortransf,2,',','.'); 
			$saldofinf = number_format($saldofin,2,',','.');

			#if ($hist == "S"){$status ="ABERTO";}else{$status="FECHADO";}			

			$bgcorlinha="#E5E5E5";
			if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$num_env</font></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomeempcxold</b><br>$nomecx_saldoold</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datacxsaldof</b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datatransff</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>R$ $valortransff</font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codcxtransfselect=$codcxtransf&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>Ver Detalhes</a></b></font></td>
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
$compl= "codempselect=$codempselect&codcxselect=$codcxselect&acx=$acx&mcx=$mcx&dcx=$dcx&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";   
include("numcontg.php");
}



/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
