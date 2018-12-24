

<?php

#if ($impressao == 1){require("classprod.php" );}

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

		#$Actionsec="list";
			
		 break;


	 case "fechar":

		
	    break;


}


/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

if ($impressao <> 1){ include("sif-topo.php"); }else{ include("sif-topolimpo.php");}

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


var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
if(win.window.focus){win.window.focus();}
}

</script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "list"):


	
	
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
	
		// CALCULO DO SALDO FINAL
		$prod->listProdSum("SUM(credito) -  SUM(debito)", "fin_cxlanc", "codcxsaldo = $codcxsaldoselect", $array88, $array_campo88, "" );
		$prod->mostraProd( $array88, $array_campo88, 0 );
		$saldoatual = $prod->showcampo0();
		$saldoatual = $saldoini + $saldoatual;
		
			// CALCULO DO SALDO FINAL TRNAFERIDO
		$prod->listProdSum("SUM(debito)", "fin_cxlanc", "codcxsaldo = $codcxsaldoselect ", $array88, $array_campo88, "GROUP BY codcxopera ORDER by datacxlanc DESC limit 0,3" );
		$prod->mostraProd( $array88, $array_campo88, 0 );
		$saldoatual_trans = $prod->showcampo0();
		#echo "aqui=".$saldoatual_trans;

		
			// CALCULO DA QUEBRA DE CAIXA
		$prod->listProdSum("SUM(debito)", "fin_cxlanc", "codcxsaldo = $codcxsaldoselect and descricao = 'Quebra de Caixa'", $array88, $array_campo88, "GROUP BY codcxopera ORDER by datacxlanc DESC limit 0,3" );
		$prod->mostraProd( $array88, $array_campo88, 0 );
		$saldoatual_quebra = $prod->showcampo0();
		#echo "aqui=".$saldoatual_quebra;

		// FORMATACAO //
		$dataatualf = $prod->fdata($dataatual);
		$saldoatualf = number_format($saldoatual,2,',','.'); 
				
if ($impressao == 1 ){ 

echo("
 <center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='5' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
  </center>
                        <td width='320'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>TRANSFERÊNCIA DE CAIXA</font></b></td>
                        <td width='100' bgcolor='#FFFFFF' align = 'rigth'><font face=' Verdana, Arial, Helvetica, sans-serif' size='2' ></font>
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



");


}else{
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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=update&amp;codempselect=$codempselect&codcxselect=$codcxselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgcaixa&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><img border='0' src='images/bt-continuaped.gif' ><br>
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

	

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 



<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 

<div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <form method='POST' action='$PHP_SELF?Action=fechar' name='Form1' onSubmit = 'if (verificaObrig(document.Form1)==false) return false'>
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
         </b> $nomecxold - NUM  ENVELOPE: <b>$num_env</b></font></font></td>
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
	
	if ($reimp == 1){$cond7 = " ";}else{$cond7 = " and posfin = 'CX' and codcx=$codcx ";}
	
	#echo "aqui".$cond7;
	
				
	$prod->listProdSum("codch, bco, numcheq, valor, datavenc, posfin", "fin_cheques", " codcxsaldo=$codcxsaldoselect".$cond7, $array, $array_campo, "ORDER BY DATAVENC" );
	 
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
		
		$qcaixa = str_replace('.','',$qcaixa);
		$qcaixa = str_replace(',','.',$qcaixa);
		$troco = str_replace('.','',$troco);
		$troco = str_replace(',','.',$troco);
		
		if ($reimp == 1){$troco = $saldofin;}
		if ($reimp == 1){$quebra = $saldoatual_quebra;}

		if($reimp == 1){$valort_d = $saldoatual+$saldoatual_trans - $valort_ch - ($qcaixa + $troco);}else{$valort_d = $saldoatual - $valort_ch - ($qcaixa + $troco);}
		
		if ($valort_d < 0){$troco = $troco + $valort_d;$valort_d = 0;}
		$valort_cx = $valort_ch + $valort_d;
				
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

	<table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
  <tbody>
   <tr align='left'>
      <td height='0' colspan='4'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>CONTRATOS A SEREM TRANSFERIDOS PARA O JURÍDICO</font></b></td>
    </tr>
    
");
	$prod->listProdSum("codped", "fin_cxlanc", "codcxsaldo='$codcxsaldoselect' and codped <> 0  ", $array, $array_campo, " group by codped ORDER BY codped" );

 for($i = 0; $i < count($array); $i++ ){

		$prod->mostraProd( $array, $array_campo, $i );
		
		$codped_ch = $prod->showcampo0();
		#echo("codped = $codped_ch");
		
  		$prod->listProdU("codbarra, codcliente, contrato, onsite","pedido", "codped='$codped_ch'");
		$codbarraped_ch = $prod->showcampo0();
		$codcliente_ch = $prod->showcampo1();
		$contrato_ch = $prod->showcampo2();
		$onsite_ch = $prod->showcampo3();
		
		if ( $onsite_ch == 'OK'){$flagon = "<b>(ONSITE)</b>";}else{$flagon = "";}
		
		$prod->listProdU("nome","clientenovo", "codcliente='$codcliente_ch'");
		$nomecliente = $prod->showcampo0();
		
   		if ($contrato_ch == "OK"){
          $u=$u+1;

echo("
		<tr bgColor='#f2e4c4'>
		<td align='center' width = '5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$u</font></td>
      <td align='center' width = '25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codbarraped_ch</font></td>
      <td  height='0' width = '60%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomecliente</font></td>
      <td  height='0' width = '10%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$flagon</font></td>
    </tr>

");

}
}
echo("

    </table>

	<table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
  <tbody>
   <tr align='left'>
      <td height='0' colspan='5'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>CARTAO DE CREDITO</font></b></td>
    </tr>

");
	$prod->listProdSum("codped, opcaixa, descricao, sum(credito)", "fin_cxlanc", "codcxsaldo='$codcxsaldoselect' and codped <> 0 and (opcaixa = '02.30' or opcaixa = '02.31' or opcaixa = '02.32' or opcaixa = '02.33' or opcaixa = '02.34' or opcaixa = '02.35' or opcaixa = '02.36' or opcaixa = '02.37' or opcaixa = '02.38')", $array, $array_campo, " group by opcaixa, codped ORDER BY codped" );

 for($i = 0; $i < count($array); $i++ ){

		$prod->mostraProd( $array, $array_campo, $i );

		$codped_ch = $prod->showcampo0();
		$opcaixa = $prod->showcampo1();
		$descricao = $prod->showcampo2();
		$valor_cartao = $prod->showcampo3();
		$valor_cartaof = number_format($valor_cartao,2,',','.'); 
		#echo("codped = $codped_ch");

  		$prod->listProdU("codbarra, codcliente, declara","pedido", "codped='$codped_ch'");
		$codbarraped_ch = $prod->showcampo0();
		$codcliente_ch = $prod->showcampo1();
		$declara_ch = $prod->showcampo2();

		$prod->listProdU("nome","clientenovo", "codcliente='$codcliente_ch'");
		$nomecliente = $prod->showcampo0();

   		#if ($declara_ch == "OK"){
          $u=$u+1;

echo("
		<tr bgColor='#f2e4c4'>
		<td align='center' width = '5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$u</font></td>
      <td align='center' width = '15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codbarraped_ch</font></td>
     <td  height='0' width = '40%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomecliente</font></td>
 <td  height='0' width = '20%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$opcaixa - $descricao</font></td>
<td  height='0' width = '20%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$ $valor_cartaof</font></td>
    </tr>

");

#}
}
echo("

    </table>
    
    <table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
  <tbody>
   <tr align='left'>
      <td height='0' colspan='5'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>FINANCIAMENTO BANCÁRIO</font></b></td>
    </tr>

");
	$prod->listProdSum("codped, opcaixa, descricao, sum(credito)", "fin_cxlanc", "codcxsaldo='$codcxsaldoselect' and codped <> 0 and (opcaixa = '02.40' or opcaixa = '02.42' or opcaixa = '02.43' or opcaixa = '02.44' or opcaixa = '02.46' or opcaixa = '02.47' or opcaixa = '02.48' or opcaixa = '02.49' or opcaixa = '02.50' or opcaixa = '02.51' or opcaixa = '02.52' or opcaixa = '02.53' or opcaixa = '02.54' or  opcaixa = '02.55' or  opcaixa = '02.56' or  opcaixa = '02.61')", $array, $array_campo, " group by opcaixa, codped ORDER BY codped" );

 for($i = 0; $i < count($array); $i++ ){

		$prod->mostraProd( $array, $array_campo, $i );

		$codped_ch = $prod->showcampo0();
		$opcaixa = $prod->showcampo1();
		$descricao = $prod->showcampo2();
		$valor_cartao = $prod->showcampo3();
		$valor_cartaof = number_format($valor_cartao,2,',','.'); 
		#echo("codped = $codped_ch");

  		$prod->listProdU("codbarra, codcliente, declara","pedido", "codped='$codped_ch'");
		$codbarraped_ch = $prod->showcampo0();
		$codcliente_ch = $prod->showcampo1();
		$declara_ch = $prod->showcampo2();

		$prod->listProdU("nome","clientenovo", "codcliente='$codcliente_ch'");
		$nomecliente = $prod->showcampo0();

   		#if ($declara_ch == "OK"){
          $u=$u+1;

echo("
		<tr bgColor='#f2e4c4'>
		<td align='center' width = '5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$u</font></td>
      <td align='center' width = '15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codbarraped_ch</font></td>
     <td  height='0' width = '40%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomecliente</font></td>
 <td  height='0' width = '20%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$opcaixa - $descricao</font></td>
<td  height='0' width = '20%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$ $valor_cartaof</font></td>
    </tr>

");

#}
}
echo("

    </table>

");
if ($impressao == 1 ){ 

echo("
<center>
<br><br>&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'>

	");

}



if ($impressao <> 1 ){ 
	if ($reimp <> 1){
echo("
<BR><BR>
	<center>
  <table border='0' width='50%' cellspacing='0' cellpadding='0'>
          <tr>
           
            <td width='10%'><img border='0' src='images/print.gif'></td>
            <td width='90%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'> <a href='javascript:void(0);' onclick=");echo('"');echo("NewWindow('restrito.php?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgcx=$pg&impressao=1&qcaixa=$qcaixaf&troco=$trocof&valort_cx=$valort_cx&num_env=$num_env','FICHA','600','400','yes');return false");echo('"');echo("> IMPRIMIR ESTE RELATÓRIO</a>
				
		</font></td>
          </center>
          
        </tr>
      </table>
<br><br>
 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Fechar Caixa' name='B1' onClick=");echo('"MM_changeProp(');echo("'camada','','style.visibility','hidden','LAYER')");echo('"');echo("></td>
      </tr>
    </table>
    </center>
  </div>
");
	}
}
echo("

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxselect' value='$codcx'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='qcaixa' value='$qcaixa'>
		<input type='hidden' name='valort_cx' value='$valort_cx'>
		<input type='hidden' name='troco' value='$troco'>
		<input type='hidden' name='num_env' value='$num_env'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pgcaixa'>
		<input type='hidden' name='hist' value='$hist'>
		</form>
			
		");

	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){include ("sif-rodape.php");}
}

?>
       
