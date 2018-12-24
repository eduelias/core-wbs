

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datacxsaldo DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "CAIXA";
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
		$xcaixa=		$prod->showcampo30();
		$xcaixashow = explode(":", $xcaixa);
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp =="N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
			#if ($codcxvend <> 0){$codcxselect = $codcxvend;}
		}

		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

			if($retorno){

	
			 // GERA UM CAIXA PARA A NOVA EMPRESA CRIADA

		   $prod->listProdU("codemp", "projeto_nome", "codproj = $codprojnew");
		   $codempnew = $prod->showcampo0();
			
			$prod->clear();
			$prod->setcampo1($codempnew);
			$nomecxnew = strtoupper($nomecxnew);
			$prod->setcampo2($nomecxnew);
			$prod->setcampo3($codprojnew);
			$prod->setcampo4($codvendnew);
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

	 	$prod->clear();
		$prod->listProdU("hist","fin_cxsaldo", "codcxsaldo='$codcxsaldoselect'");	
		$hist_cx = $prod->showcampo0();

if ($hist_cx == 0){
	
				
		//INSERE NOVA OPERACAO
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($dataatual);
		$prod->setcampo2($codcxsaldoselect);
		$prod->addProd("fin_cxopera", $uregopera);
		
		//INSERE NOVA TRANFERENCIA
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codcxsaldoselect);
		$prod->setcampo2($dataatual);
		$prod->setcampo3($valort_cx);
		$prod->setcampo4($qcaixa);
		$prod->setcampo5($troco);
		$prod->setcampo6("N");
		$prod->setcampo7($login);
		$prod->setcampo8($num_env);
		$prod->addProd("fin_cxtransf", $uregtransf);
		

		// PESQUISA POR CHEQUES			
			$prod->listProdSum("codch, bco, numcheq, valor, datavenc, posfin", "fin_cheques", "codcx=$codcxselect and posfin = 'CX' and codcxsaldo=$codcxsaldoselect", $array, $array_campo, "ORDER BY DATAVENC" );
			 
			 for($i = 0; $i < count($array); $i++ ){
					
				$prod->mostraProd( $array, $array_campo, $i );

				$codch = $prod->showcampo0();
				$bco = $prod->showcampo1();
				$numcheq = $prod->showcampo2();
				$valor_ch = $prod->showcampo3();
				$datavenc = $prod->showcampo4();

				$prod->listProdU("taxa","empresa", "codemp=$codempselect");
				$taxa = $prod->showcampo0();

				$difdias = $prod->numdias($dataatual,$datavenc); 
				$n = ($difdias/30);
				if ($n > 0 ){
					$valor_chv = $valor_ch/(pow((1+($taxa/100)),$n));
				}else{
					$valor_chv = $valor_ch;
				}

				$valort_ch = $valort_ch + $valor_ch;
				$valort_chv = $valort_chv + $valor_chv;

				
				//INSERE NOVA TRANFERENCIA FORMA
				$prod->clear();
				$prod->setcampo0($uregtransf);
				$prod->setcampo1($codch);
				$prod->setcampo2($bco);
				$prod->setcampo3($numcheq);
				$prod->setcampo4($datavenc);
				$prod->setcampo5($valor_ch);
				$prod->setcampo6($valor_chv);
				$prod->addProd("fin_cxtransf_forma", $uregtransf_forma);
				
				/*
				//INSERE CHEQUES
				$prod->clear();
				$prod->listProd("fin_cheques", "codch=$codch");
					$prod->setcampo9("TR");
				$prod->upProd("fin_cheques", "codch=$codch");
				*/

			 }//FOR

		$valort_d = $valort_cx - $valort_ch;

		
		 //INSERE NO CAIXA SAIDA DE CHEQUE
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($uregopera);
		$prod->setcampo2($codcxsaldoselect);
		$prod->setcampo3("02.01");
		$prod->setcampo4("Cheque - Transferência");
		$prod->setcampo5($dataatual);
		// DEBITO
			$prod->setcampo7($valort_ch);
		$prod->setcampo10($obs);
		$prod->setcampo11($login);
		$prod->addProd("fin_cxlanc", $ureglanc);

		$valort_d = $valort_cx - $valort_ch;

		 //INSERE NO CAIXA SAIDA DE DINHEIRO
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($uregopera);
		$prod->setcampo2($codcxsaldoselect);
		$prod->setcampo3("02.00");
		$prod->setcampo4("Dinheiro - Transferência");
		$prod->setcampo5($dataatual);
		// DEBITO
			$prod->setcampo7($valort_d);
		$prod->setcampo10($obs);
		$prod->setcampo11($login);
		$prod->addProd("fin_cxlanc", $ureglanc);


		 //INSERE NO CAIXA A QUEBRA DE CAIXA
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($uregopera);
		$prod->setcampo2($codcxsaldoselect);
		$prod->setcampo3($opcaixa);
		$prod->setcampo4("Quebra de Caixa");
		$prod->setcampo5($dataatual);
		// DEBITO
			$prod->setcampo7($qcaixa);
		$prod->setcampo10($obs);
		$prod->setcampo11($login);
		$prod->addProd("fin_cxlanc", $ureglanc);

	
						
		// CALCULO DO SALDO FINAL
		$prod->listProdSum("SUM(credito) -  SUM(debito)", "fin_cxlanc", "codcxsaldo = $codcxsaldoselect", $array88, $array_campo88, "" );
		$prod->mostraProd( $array88, $array_campo88, 0 );
		$soma = $prod->showcampo0();
		
		
		$prod->clear();
		$prod->listProd("fin_cxsaldo", "codcxsaldo='$codcxsaldoselect'");	
		$saldoini = $prod->showcampo2();

		$saldofin = $saldoini + $soma;


		$prod->setcampo3($saldofin);
		$prod->setcampo6(1);
		$prod->setcampo7($num_env);
		$prod->upProd("fin_cxsaldo", "codcxsaldo='$codcxsaldoselect'");
	

		// CRIACAO DE UM NOVO SALDO PARA O CAIXA
		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->setcampo2($saldofin);
		$prod->setcampo4($codempselect);
		$prod->setcampo5($codcxselect);
		$prod->addProd("fin_cxsaldo", $uregsaldo);
		
}
		
	
		$Actionsec="list";
	    break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		
		if ($codempselect <> ""):
		
			if ($acx == "" and $mcx == "" and $dcx == ""){
							
				$condicao3 .= " codemp='$codempselect'";
				$condicao3 .= " and codcx='$codcxselect'";
				if ($hist == 1){
					$condicao3 .= " and hist = 1";
				}else{
					$condicao3 .= " and hist = 0";
				}
			
			}else{
				
				$datacx = $acx."-".$mcx."-".$dcx;
				$condicao3 .= " datacxsaldo like '$datacx%'";
				$condicao3 .= " and codemp='$codempselect'";
				$condicao3 .= " and codcx='$codcxselect'";
				if ($hist == 1){
					$condicao3 .= " and hist = 1";
				}else{
					$condicao3 .= " and hist = 0";
				}
					

			}


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_cxsaldo", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codcxsaldo, datacxsaldo, saldoini, saldofin, hist", "fin_cxsaldo", $condicao3, $array, $array_campo, $parm );

		

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

include("sif-topo.php");

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

	if (!(consisteValor(form, form.troco.name, 10)))
    {
        return false;
    }
	
	if (!(consisteVazioTamanho(form, form.troco.name, 10)))
    {
        return false;
    }
   
	if (!(consisteVazioTamanho(form, form.num_env.name, 10)))
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


		// PARA PAGINA DE RECEBIMENTO DE PEDIDO
		$prod->listProd("seguranca", "arquivo='iniciofin_recped.php'");
		$pgrecped = $prod->showcampo0();

		// PARA PAGINA DO CONTAS A RECEBER
		$prod->listProd("seguranca", "arquivo='iniciofin_car.php'");
		$pgcar = $prod->showcampo0();

		// PARA PAGINA DO BANCO
		$prod->listProd("seguranca", "arquivo='iniciofin_bco.php'");
		$pgbco = $prod->showcampo0();

		// PARA PAGINA DO CONTAS A PAGAR
		$prod->listProd("seguranca", "arquivo='iniciofin_cap.php'");
		$pgcap = $prod->showcampo0();

		// PARA PAGINA DO FORMA PG
		$prod->listProd("seguranca", "arquivo='iniciofin_cap_forma_grupo.php'");
		$pgfpg = $prod->showcampo0();

		// PARA PAGINA DO COFRE
		$prod->listProd("seguranca", "arquivo='iniciofin_cofre.php'");
		$pgcofre = $prod->showcampo0();

		// PARA PAGINA DE TRANFERENCIA DE CAIXA
		$prod->listProd("seguranca", "arquivo='iniciofin_caixa_transf.php'");
		$pgtrcaixa = $prod->showcampo0();
		
		
			// PARA PAGINA DE TRANFERENCIA DE CAIXA
		$prod->listProd("seguranca", "arquivo='iniciofin_recped_os.php'");
		$pgrecos= $prod->showcampo0();
		
				
			if ($opcaixa == "" ){
							
				$condicao3 .= " codcxsaldo='$codcxsaldoselect'";
				
			
			}else{
				
				$condicao3 .= " opcaixa = '$opcaixa'";
				$condicao3 .= " and codcxsaldo='$codcxsaldoselect'";
			

			}
			

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "fin_cxlanc", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcxlanc, codcxopera, opcaixa, descricao, datacxlanc, credito, debito, codformagrupo, codped, obs, login, codos", "fin_cxlanc", $condicao3, $array, $array_campo, "order by datacxlanc DESC limit $desloc,$acrescimo" );
		
	

		// CRIA AS PAGINAS
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

	
		$prod->listProdU("codemp, saldoini, saldofin, datacxsaldo, codcx, hist", "fin_cxsaldo", "codcxsaldo=$codcxsaldoselect");
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

		$prod->listProdU("nomecx", "fin_cx", "codemp=$codempselect and codcx = $codcx");
				
		$nomecxold = $prod->showcampo0();
		$nomecxold = strtoupper($nomecxold);
	
		// CALCULO DO SALDO FINAL
		$prod->listProdSum("SUM(credito) -  SUM(debito)", "fin_cxlanc", "codcxsaldo = $codcxsaldoselect", $array88, $array_campo88, "" );
		$prod->mostraProd( $array88, $array_campo88, 0 );
		$saldoatual = $prod->showcampo0();
		$saldoatual = $saldoini +$saldoatual;

		// FORMATACAO //
		$dataatualf = $prod->fdata($dataatual);
		$saldoatualf = number_format($saldoatual,2,',','.'); 
				
	
	

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
		OPCAIXA: <input type='text' name='opcaixa' size='6' maxlength='6'>
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
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
		  <form method='POST' action='$PHP_SELF?Action=list' name='Form1' onSubmit = 'if (verificaObrig(document.Form1)==false) return false'>

");
	if ($hist == 0){
	echo("

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
            <td width='16%' align='center'><img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgrecped&pgcx=$pg','RECPED','600','400','yes');return 
false");echo('"');echo("> RECEBER<br>
            PEDIDO</a>
           </b></font></td>
		<!--
            <td width='16%' align='center'><img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgcap&pgcx=$pg','CAP','600','400','yes');return 
false");echo('"');echo("> PGTO<br>
            CONTAS</a>
            </b></font></td>
			
            <td width='16%' align='center'><img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgcar&pgcx=$pg','CAR','600','400','yes');return 
false");echo('"');echo("> RECEBER<br>
            CONTAS</a>
           </b></font></td>
			
            <td width='17%' align='center'><img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgbco&pgcx=$pg','BANCO','600','400','yes');return 
false");echo('"');echo("> OPERAÇÕES<br>
            BANCÁRIAS</a>
            </b></font></td>
          </center>
          <td width='17%' align='center'>
            <img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br>
        </b></font><b>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgcofre&pgcx=$pg','COFRE','600','400','yes');return 
false");echo('"');echo("> SAÍDA<br>
            COFRE</a></font></b></td>
            -->
          <td width='17%' align='center'>
	
            <p><input type='image' name='fechar' src='images/errop.gif' alt='Fechar'  border='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br>
            FECHAR<br>
            CAIXA</b></font>
	
		</td>
			
			 <td width='14%' align='center'><img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgrecos&pgcx=$pg','RECOS','600','400','yes');return 
false");echo('"');echo("> RECEBER<br>
            O.S.</a>
           </b></font></td>
        </tr>
			
      </table>
    </td>
  </tr>
			
  <center>

  </table>
  </center>
</div>
	  	");
	}
	if ($hist <> 0){
	echo("	
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
            <td width='16%' align='center'><img border='0' src='images/empresa.gif' width='25' height='26'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgtrcaixa&pgcx=$pg&reimp=1','RECPED','600','400','yes');return 
false");echo('"');echo("> RE-IMPRESSAO<br>
            CAIXA</a>
           </b></font></td>
           </tr>
			
      </table>
    </td>
  </tr>
			
  <center>

  </table>
  </center>
</div>
	  	");
		
	}
	
	echo("
<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 



<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 

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
           
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='58%'><b><a href='$PHP_SELF?Action=update&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
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
      <font size='2'><font color='#800000'>SALDO CAIXA:<br>
        </font>R$ $saldoatualf</font></b></font></td>
      </tr>
    <tr>
      <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='left'><font face='Verdana'><b><font size='1'>
      <font color='#800000'>CAIXA:</font><br>
         </b> $nomecxold</font></font></td>
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


	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr>
    <td width='10%' height='0' bgcolor='#F3F3F3'> 
      &nbsp;</td>
	<td width='10%' height='0' bgcolor='#F3F3F3'> 
      &nbsp;</td>
    <td width='10%' height='0' bgcolor='#F3F3F3'> 
      &nbsp;</td>
    <td width='25%' height='0' bgcolor='#F3F3F3'> 
      <div align='center'><b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
        SALDO CAIXA ANTERIOR</font></b></div>
    </td>
	 <td width='15%' height='0' bgcolor='#F3F3F3'> 
      <div align='center'>&nbsp;</div>
    </td>
	 <td width='15%' height='0' bgcolor='#F3F3F3'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        R$ $saldoinif</font></b></div>
    </td>
	 <td width='15%' height='0' bgcolor='#F3F3F3'> 
      &nbsp;</td>
	
    
  </tr>

	<tr bgcolor='#D6B778'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.<bR>LANC.</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.<bR>OPERA.</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA LANC.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CRÉDITO<BR>(R$)</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DÉBITO<BR>(R$)</font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
		$prod->mostraProd( $array, $array_campo, $i );

		$codcxlanc = $prod->showcampo0();
		$codcxopera = $prod->showcampo1();
		$opcaixa = $prod->showcampo2();
		$descricao = $prod->showcampo3();
		$datacxlanc = $prod->showcampo4();
		$credito = $prod->showcampo5();
		$debito = $prod->showcampo6();
		$codformagrupo = $prod->showcampo7();
		$codped = $prod->showcampo8();
		$obs = $prod->showcampo9();
		$login_lanc = $prod->showcampo10();
		$codosforma = $prod->showcampo11();
		$codcliente = 0;

		
		$codos = "";
		if ($codosforma <> 0){
		$prod->clear();
		$prod->listProdSum("codbarra, codcliente", "os", "codformagrupo = $codosforma", $array48, $array_campo48, "" );
		for($u = 0; $u < count($array48); $u++ ){
			$prod->mostraProd( $array48, $array_campo48, $u );
			$codbarra_os = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codos .= "$codbarra_os<br>";
			
		}
		}

		$codbarra = "";
		if ($codped <> 0){
		$prod->clear();
		$prod->listProdU("codbarra, codcliente", "pedido", "codped=$codped");
		$codbarra = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		}


		$prod->clear();
		$prod->listProdU("nome", "clientenovo", "codcliente='$codcliente'");
		$nomecliente = $prod->showcampo0();
		
		// FORMATACAO
		$datacxlancf = $prod->fdata($datacxlanc);
		$creditof = number_format($credito,2,',','.'); 
		$debitof = number_format($debito,2,',','.'); 


		#if ($saldofin == 0){$status ="ABERTO";}else{$status="FECHADO";}			

		$bgcorlinha="#F2E4C4";
		#if ($status == "ABERTO"){$bgcorlinha="#FFCC66";}
		#if ($status == "FECHADO"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codcxlanc</font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codcxopera</b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$opcaixa</font></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'>
");
if ($codformagrupo <> 0){
echo("
<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codfgruposelect=$codformagrupo&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgfpg&pgcx=$pg','FORMAPG','600','400','yes');return 
false");echo('"');echo(" alt='FORMA DE PAGAMENTO'><b>$descricao</B></a><br>$codbarra<br>$nomecliente<br>$nomefor<br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT>
");
}else{
echo("
<b>$descricao</b><br>$codbarra $codos<br>$nomecliente<br>$nomefor<br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT>
	");
}
echo("

</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'>$datacxlancf<br><b>$login_lanc</b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$creditof</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$debitof</font></td>
	</tr>
		
		");
		$subcredito = $subcredito + $credito;
		$subdebito = $subdebito + $debito;
		$subcreditof = number_format($subcredito,2,',','.'); 
		$subdebitof = number_format($subdebito,2,',','.'); 
	 }
		

		$total = $subcredito - $subdebito;
		$totalf = number_format($total,2,',','.'); 

		echo("
		<tr bgcolor='#FFFFFF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'><b>SUBTOTAL CAIXA LANC.</b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'><b></b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $subcreditof</b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $subdebitof</b></font></td>
	</tr>
	<tr bgcolor='#F3F3F3'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'><b>TOTAL CAIXA <BR>LANC.</b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $totalf</b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	</tr>
	<tr bgcolor='#FFFFFF'> 
		<td width='100%' height='0' align='center' colspan ='7'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>&nbsp;</font></b></td>
	</tr>
	");
	if ($hist == 0){
	echo("
			
	<tr bgcolor='#F5F8C2'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'><b>QUEBRA DE <bR>CAIXA</b></font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#000000'><b>R$</b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><input name='qcaixa' size='10' onChange='consisteValor(this.form, this.form.qcaixa.name, true)'></b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	</tr>
	<tr bgcolor='#F3DBB6'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'><b>TROCO</b></font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#000000'><b>R$</b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><input name='troco' size='10' onChange='consisteValor(this.form, this.form.troco.name, true)'></b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	</tr>
	<tr bgcolor='#F3DBB6'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#800000'><b>NUM. ENVELOPE</b></font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1' color='#000000'><b></b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><input name='num_env' size='10' ></b></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	</tr>
	");
	}
	echo("
</table>
		");


if ($Action == "update" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";   
include("numcontg.php");
}


echo("	


		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pgtrcaixa'>
		<input type='hidden' name='pgcaixa' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		</form>
			
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
		DATA CAIXA: <input type='text' name='dcx' size='2' maxlength='2'> <input type='text' name='mcx' size='2' maxlength='2'> <input type='text' name='acx' size='4' maxlength='4'> 
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
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

#if ($allemp == "Y"){

echo("
<br>
<table width='550' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form>
		<td width='5%'></td>
        <td width='25%'>&nbsp;</td>
	
		<td align='center' valign='top' width='70%'>
 
<font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ESCOLHA O CAIXA:</b><br> 
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");
	#if ($allcx <> "Y"){$condcx = "codemp = $codempvend";}else{$condcx = "";}
	 for($l = 1; $l < count($xcaixashow); $l++ ){

			if ($xcaixashow[$l] <> ""){
				$condcx .= "codcx = '$xcaixashow[$l]' or ";
			}
			
	 }
				$condcx .= "codcx = ''";

	$prod->listProdSum("codcx, nomecx, codemp", "fin_cx", $condcx, $array6, $array_campo6 , "order by nomecx");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$codemp = $prod->showcampo2();
			$nomecx = $prod->showcampo1();
			$codcx = $prod->showcampo0();
			
			$prod->listProdU("nome", "empresa", "codemp=$codemp");
			$nomeemp = $prod->showcampo0();
			$nomeemp = strtoupper($nomeemp);


	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&codcxselect=$codcx&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>EMP: $nomeemp / CX: $nomecx</option>
		");
	
}
	echo("	
		<option value='' selected>EMP: Empresa / CX: Caixa</option>
	  </select>
  </td>
  </form>
 </tr>
</table>
	
");
#}else{

#$codempselect = $codempvend;
#$codcxselect = $codcxvend;

#}



//<!-- ESCOLHA DE EMPRESAS - FIM --> 

 
if ($codempselect<>""){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	$prod->listProdU("nomecx", "fin_cx", "codemp=$codempselect and codcx = '$codcxselect'");
				
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA ATUAL<br>
        </b>$nomeempold</font></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAIXA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAIXA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1'><br>
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
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA SALDO</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SALDO INICIAL</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SALDO FINAL</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codcxsaldo = $prod->showcampo0();
			$datacxsaldo = $prod->showcampo1();
			$saldoini = $prod->showcampo2();
			$saldofin = $prod->showcampo3();
			$hist = $prod->showcampo4();
				
			// FORMATACAO //
			$datacxsaldof = $prod->fdata($datacxsaldo);
			$saldoinif = number_format($saldoini,2,',','.'); 
			$saldofinf = number_format($saldofin,2,',','.');

			if ($hist== 0){$status ="ABERTO";}else{$status="FECHADO";}			

			$bgcorlinha="#E5E5E5";
			if ($status == "ABERTO"){$bgcorlinha="#F2E4C4";}
			if ($status == "FECHADO"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecxold</font></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datacxsaldof</b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>R$ $saldoinif</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>R$ $saldofinf</font></td>
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codcxsaldoselect=$codcxsaldo&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>Ver Detalhes</a></b></font></td>
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



if ($Action == "insert"){

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
                          CAIXA</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>INSERIR NOVO CAIXA</font></b></td>
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
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Projeto</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                               <select size='1' class=drpdwn name='codprojnew'> 
                            ");

	$prod->listProdgeral("projeto_nome", "", $array, $array_campo , "order by nomeproj");
	for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$nomeproj = $prod->showcampo1();
			$nomeproj = strtoupper($nomeproj);
			$codproj= $prod->showcampo0();

	echo("		
		<option value='codproj'>$nomeproj</option>
		");
	
	}
echo("										
                                    </select>
						  </font></td>
                          <tr bgcolor='#FFFFFF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome Caixa:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$nomecxold' name='nomecxnew' size='20' >
			                          
                              </font></td>
                          </tr>
						 
								   <tr bgcolor='#FFFFFF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Usuario Resp.:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                              <select size='1' class=drpdwn name='codvendnew'> 
                            ");

	$prod->listProdgeral("vendedor", "block <> 'Y'", $array, $array_campo , "order by nome");
	for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$nomevend = $prod->showcampo1();
			$nomevend = strtoupper($nomevend);
			$codvend= $prod->showcampo0();

	echo("		
		<option value='codvend'>$nomevend</option>
		");
	
	}
echo("										
                                    </select>
			                          
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
				  <input type='hidden' name='codsubcat' value='$codsubcatold'>
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


/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
