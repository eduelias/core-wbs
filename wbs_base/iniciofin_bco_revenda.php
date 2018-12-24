

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomebco limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "BANCO";
$subtitulo = "USUÁRIO";

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
		$codsuper = $prod->showcampo9();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($codempvend <> 0){$codempselect = $codempvend;}
		if ($codcxvend <> 0){$codcxselect = $codcxvend;}

		#$prod->listProdU("codconta","fin_bcoconta", "codvend='$codvendold'");
		#$codcontaselect = $prod->showcampo0();

		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

			if($retorno){

			

		
			$Actionsec = "list";
			}
		
	
        break;

		

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){

		$campopesq = "nomebco";
		$palavrachave1 = strtolower($palavrachave);
	    $condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
	
		
		if ($codempselect <> ""):
		
			if ($palavrachave == "" ){

				$condicao3 .= " tipo='R'";
				$condicao3 .= " and vendedor.codvend=fin_bcoconta.codvend";
					
								
			
			}else{
				
				$condicao3 .= $condicao2;
				$condicao3 .= " and tipo='R'";
				$condicao3 .= " and vendedor.codvend=fin_bcoconta.codvend";

									

			}


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_bcoconta, vendedor", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codconta, bco, ag, cc, saldoini, fin_bcoconta.dataini, fin_bcoconta.codvend, tipoconta, nomebco, codforn", "fin_bcoconta, vendedor", $condicao3, $array, $array_campo, $parm );

		

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

$title = "BANCO - OPERACOES BANCÁRIAS";

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

	if (!(consisteVazioTamanho(form, form.qcaixa.name, 10)))
    {
        return false;
    }
   
	if (!(consisteValor(form, form.qcaixa.name, true)))
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

				
		if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){

									
				$condicao3 .= " codconta='$codcontaselect'";
				$condicao3 .= " and TO_DAYS(NOW()) - TO_DAYS(datamov) <= 15";
							
			}else{
				
				$datainicial = $ade."-".$mde."-".$dde." 00:00:00";
				$datafinal = $aate."-".$mate."-".$date." 23:59:59"; 
				$condicao3 .= " codconta='$codcontaselect'";
				$condicao3 .= " and (datamov >= '$datainicial' and datamov <= '$datafinal')";

					
			}
			

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "fin_bcomov", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codmov, codconta, codcxlanc, codcxopera, opcaixa, descricao, datamov, dataini, credito, debito, consolida, codped, obs", "fin_bcomov", $condicao3, $array, $array_campo, "order by datamov " );
		
	

		// CRIA AS PAGINAS
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 


		
		
		$prod->listProdU("codemp, saldoini, dataini, nomebco, tipoconta", "fin_bcoconta", "codconta=$codcontaselect");
		$codemp = $prod->showcampo0();
		$saldoini = $prod->showcampo1();
		$datainiconta = $prod->showcampo2();
		$nomebco = $prod->showcampo3();
		$tipoconta = $prod->showcampo4();
		
		
		// FORMATACAO //
		$datainicontaf = $prod->fdata($datainiconta);
		$saldoinif = number_format($saldoini,2,',','.'); 
		
		$prod->listProdU("nome", "empresa", "codemp=$codemp");
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);

		// CALCULA O SALDO ATUAL
		$prod->listProdSum("(SUM(credito)-SUM(debito))", "fin_bcomov", "codconta = $codcontaselect" , $array12, $array_campo12, "" );
		$prod->mostraProd( $array12, $array_campo12, 0 );
		$saldoatual = $prod->showcampo0();

		// FORMATACAO //
		$dataatualf = $prod->fdata($dataatual);
		$saldoatualf = number_format($saldoatual,2,',','.'); 




		// CALCULA O SALDO INICIAL DO PERIODO
		if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){

			$prod->listProdMY("DATE_FORMAT(NOW() - INTERVAL 15 DAY, '%Y-%m-%d')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$datainicial = $prod->showcampo0();
			$datafinal = $dataatual;

		}
		
			$prod->listProdSum("(SUM(credito)-SUM(debito)) as saldo", "fin_bcomov", "codconta = $codcontaselect  and (datamov >= '$datainiconta' and datamov < '$datainicial')" , $array125, $array_campo125, "" );
			$prod->mostraProd( $array125, $array_campo125, 0 );
			$saldoiniperiodo = $prod->showcampo0();

			// FORMATACAO //
			$datainicialf = $prod->fdata($datainicial);
			$datafinalf = $prod->fdata($datafinal);
			$saldoiniperiodof = number_format($saldoiniperiodo,2,',','.'); 

		#echo("dini = $datainiconta s = $saldoiniperiodof d = $datainicial");

		

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
      <td width='50%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA DATA:</b><br>
		DE: <input type='text' name='dde' size='2' maxlength='2'>/ <input type='text' name='mde' size='2' maxlength='2'>/ <input type='text' name='ade' size='4' maxlength='4'><br> ATE: <input type='text' name='date' size='2' maxlength='2'>/ <input type='text' name='mate' size='2' maxlength='2'>/ <input type='text' name='aate' size='4' maxlength='4'> 
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcontaselect' value='$codcontaselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

	  </p>
	   </td>
		   <td width='20%' bgcolor='#FFFFFF'>
           <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codcontaselect=$codcontaselect&codempselect=$codempselect&amp;codcxsaldoselect=$codcxsaldoselect&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a></font></td>
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
			
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='55%'><b><a href='$PHP_SELF?Action=update&codcontaselect=$codcontaselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='40%'>
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
      <p align='right'><font size='2' face='Verdana'><font color='#800000'><b>
      SALDO ATUAL<br>
      </b></font><b>R$ $saldoatualf<br>
      </b></font><font size='1' face='Verdana'></font></td>
      </tr>
    <tr>
      <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='left'><font face='Verdana'><b><font size='1'>
      <font color='#800000'>BANCO / TIPOCONTA:</font><br>
         </b> $nomebco / $tipoconta <BR> $datainicontaf</font></font></td>
    </center>
    <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='right'><font face='Verdana'>
      <font size='1'><font color='#800000'>DATA ATUAL:<br>
          </font>$dataatualf</font></font></td>
    </tr>
  <tr>
     <td width='100%' bgcolor='#000000' valign='top' colspan ='2'></td>
    </tr>
    </table>
  </div>
<br>
<div align='center'>
  <center>
  <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber1'>
    <tr>
      <td width='100%'>
      <p align='right'><b><font face='Verdana' size='1'>DE</font></b><font size='1' face='Verdana'><b>
      </b>$datainicialf <b>ATÉ </b>$datafinalf</font></td>
    </tr>
  </table>
  </center>
</div>


	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr>
    <td width='15%' height='0' bgcolor='#F3F3F3'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
    $datainicialf</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
    <td width='20%' height='0' bgcolor='#F3F3F3'>
    <p align='center'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
    SALDO ANTERIOR</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$ $saldoiniperiodof</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
    <td align='middle' width='5%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
    <td align='middle' width='20%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
  </tr>

	<tr bgcolor='#D6B778'> 
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA MOV.</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CRÉDITO<BR>(R$)</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DÉBITO<BR>(R$)</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CS</font></b></div>
    </td>
	<td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA<bR>CS.</font></b></div>
    </td>
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
		$prod->mostraProd( $array, $array_campo, $i );

		$codmov = $prod->showcampo0();
		$codconta = $prod->showcampo1();
		$codcxlanc = $prod->showcampo2();
		$codcxopera = $prod->showcampo3();
		$opcaixa = $prod->showcampo4();
		$descricao = $prod->showcampo5();
		$datamov = $prod->showcampo6();
		$dataini = $prod->showcampo7();
		$credito = $prod->showcampo8();
		$debito = $prod->showcampo9();
		$consolida = $prod->showcampo10();
		$codped = $prod->showcampo11();
		$obs = $prod->showcampo12();
		
		$prod->clear();
		$prod->listProdU("codbarra, codcliente", "pedido", "codped=$codped");
		$codbarra = $prod->showcampo0();
		$codcliente = $prod->showcampo1();

		$nomecli = "";
		if ($codcliente <> 0){
		$prod->clear();
		$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
		$nomecli = $prod->showcampo0();
		}
		
		
		// FORMATACAO
		$datamovf = $prod->fdata($datamov);
		$datainif = $prod->fdata($dataini);
		$creditof = number_format($credito,2,',','.'); 
		$debitof = number_format($debito,2,',','.'); 


		#if ($saldofin == 0){$status ="ABERTO";}else{$status="FECHADO";}			

		$bgcorlinha="#F2E4C4";
		#if ($status == "ABERTO"){$bgcorlinha="#FFCC66";}
		#if ($status == "FECHADO"){$bgcorlinha="#E1AFAA";}

		

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'>$datamovf</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$opcaixa</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'><b>$descricao</b><bR>$codbarra<br>$nomecli<br></font><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$creditof</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$debitof</font></td>
		<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>
");
if ($consolida == "N"){
echo("
</font>
</td>
	<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>NO</font></b></td>
");
}else{
echo("
$consolida</font>
</td>
	<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color ='#336600'><b>Consolidado</font></b></td>
");
}
echo("


	</tr>
		
		");
		$subcredito = $subcredito + $credito;
		$subdebito = $subdebito + $debito;
		$subcreditof = number_format($subcredito,2,',','.'); 
		$subdebitof = number_format($subdebito,2,',','.'); 
	 }
		

		$total = $subcredito - $subdebito + $saldoiniperiodo;
		$totalf = number_format($total,2,',','.'); 

		echo("
		<tr bgColor='#ffffff'>
			<td width='15%' height='0'>&nbsp;</td>
			<td align='middle' width='10%' height='0'>&nbsp;</td>
			<td width='20%' height='0'>
			<p align='center'><b>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
			SALDO MOVIMENTAÇÃO</font></b></td>
			<td align='middle' width='10%' height='0'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $subcreditof</b></font></td>
			<td align='middle' width='10%' height='0'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $subdebitof</b></font></td>
			<td align='middle' width='5%' height='0'>&nbsp;</td>
			<td align='middle' width='20%' height='0'>&nbsp;</td>
		</tr>
		<tr bgColor='#d6b778'>
			<td width='15%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td width='20%' height='0' bgcolor='#F3F3F3'>
			<p align='center'><b>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
			SALDO NO PERIODO</font></b></td>
			<td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $totalf</b></font></td>
			<td width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td align='middle' width='5%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td align='middle' width='20%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
  </tr>

		

				</table>
					<br><BR>
					
		");







echo("	


		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcontaselect' value='$codcontaselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='datainicc' value='$datainiconta'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
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
		NOME BANCO: <input type='text' name='palavrachave' size='20'> 
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


if ($codempvend == "0" or $tipovend == "V"){

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
		<option value='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
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
			
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='55%'><b><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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

			

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.CONTA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME BCO</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SALDO INICIAL</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA INICIAL</font></b></div>
		 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SALDO ATUAL</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codconta = $prod->showcampo0();
			$bco = $prod->showcampo1();
			$ag = $prod->showcampo2();
			$cc = $prod->showcampo3();
			$saldoini = $prod->showcampo4();
			$dataini = $prod->showcampo5();
			$codvend = $prod->showcampo6();
			$tipoconta = $prod->showcampo7();
			$nomebco = $prod->showcampo8();
			$codforn = $prod->showcampo9();
				
			// FORMATACAO //
			$datainif = $prod->fdata($dataini);
			$saldoinif = number_format($saldoini,2,',','.'); 

				// CALCULA O SALDO ATUAL
			$prod->listProdSum("(SUM(credito)-SUM(debito))", "fin_bcomov", "codconta = $codconta" , $array12, $array_campo12, "" );
			$prod->mostraProd( $array12, $array_campo12, 0 );
			$saldoatual = $prod->showcampo0();

			// FORMATACAO //
			$dataatualf = $prod->fdata($dataatual);
			$saldoatualf = number_format($saldoatual,2,',','.'); 

			$bgcorlinha="#E5E5E5";

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codconta</font></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomebco</b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$tipoconta</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>R$ $saldoinif</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datainif</font></td>
				<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $saldoatualf</B></font></td>

			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codcontaselect=$codconta&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>Detalhes</a></b></font></td>
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
$compl= "codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";  
include("numcontg.php");
}



if ($Action == "insmov"){

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
                         BANCO</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>INSERIR NOVA MOVIMENTAÇÃO</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=update&amp;codcontaselect=$codcontaselect&codempselect=$codempselect&amp;codcxsaldoselect=$codcxsaldoselect&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$histdesloc=$desloc'><img border='0' src='images/bt-continuaped.gif' ><br>
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
                  <form method='POST' action='$PHP_SELF?Action=insmov'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OP CAIXA</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='opcaixanew'>
                             
						  
	
	  ");
	$prod->listProdSum("opcaixa, descricao", "formapg", "opcaixa like '01%'", $array1, $array_campo1, "" );

	for($l = 0; $l < count($array1); $l++ ){
	
			$prod->mostraProd( $array1, $array_campo1, $l );

			$opcaixasel = $prod->showcampo0();
			$descricaosel = $prod->showcampo1();

			echo("
            <option value='$opcaixasel'>$descricaosel</option>
          
	
	        ");

		}

	echo("
						  </select>
						  </font></td>
							  </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>VALOR:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='valornew' size='20'  onKeyUp='this.value = adjust(this);'>
			                          
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OBS.:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='obs' size='20'>
			                          
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
		<input type='hidden' name='codcontaselect' value='$codcontaselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
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





if ($Action == "insconta"){

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
                          BANCO</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>INSERIR NOVA CONTA</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codcontaselect=$codcontaselect&codempselect=$codempselect&amp;codcxsaldoselect=$codcxsaldoselect&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&desloc=$desloc'><img border='0' src='images/bt-continuaped.gif' ><br>
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
                  <form method='POST' action='$PHP_SELF?Action=insconta'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>NOME BANCO:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='nomebconew' size='40' >
			                          
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>SALDO INICIAL:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='valornew' size='20'  onKeyUp='this.value = adjust(this);'>
			                          
                              </font></td>
                          </tr>
							<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>TIPO CONTA:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                              <select size='1' name='tipocontaselect'>
							  <option selected value='B'>Banco</option>
							  <option value='F'>Fornecedor</option>
							  </select><font size='1' face='Verdana'> <br>(</font><font color='#FF0000'><b><font size='1' face='Verdana'>
  Importante:</font></b></font><font size='1' face='Verdana'> se o tipo de conta 
  for FORNECEDOR, é necessário escolher o FORNECEDOR respectivo abaixo )</font>
			                          
                              </font></td>
                          </tr>
						 	  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>FORNECEDOR</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codforselect'>
                             
						  
	
	  ");
	$prod->listProdSum("codfor, nome", "fornecedor", "", $array1, $array_campo1, "" );

	for($l = 0; $l < count($array1); $l++ ){
	
			$prod->mostraProd( $array1, $array_campo1, $l );

			$codfor = $prod->showcampo0();
			$nomefor = $prod->showcampo1();

			echo("
            <option value='$codfor'>$nomefor</option>
          
	
	        ");

		}

	echo("
			<option value='0' selected>Nenhum</option>
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
				 <input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcontaselect' value='$codcontaselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
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
       
