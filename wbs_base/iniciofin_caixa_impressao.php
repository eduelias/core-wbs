

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

	
		
	
        break;

		

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "fechar":


		

	    break;


}


/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "EXTRATO DO CAIXA";

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

	if (!(consisteValor(form, form.troco.name, 10)))
    {
        return false;
    }
	
	if (!(consisteVazioTamanho(form, form.troco.name, 10)))
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


		
				
			if ($opcaixa == "" ){
							
				$condicao3 .= " codcxsaldo='$codcxsaldoselect'";
				
			
			}else{
				
				#$condicao3 .= " opcaixa = '$opcaixa'";
				$condicao3 .= " and codcxsaldo='$codcxsaldoselect'";
			

			}
			

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "fin_cxlanc", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcxlanc, codcxopera, opcaixa, descricao, datacxlanc, credito, debito, codformagrupo, codped, obs, login", "fin_cxlanc", $condicao3, $array, $array_campo, "order by datacxlanc " );
		
	

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
		$opcaixa_cx = $prod->showcampo2();
		$descricao = $prod->showcampo3();
		$datacxlanc = $prod->showcampo4();
		$credito = $prod->showcampo5();
		$debito = $prod->showcampo6();
		$codformagrupo = $prod->showcampo7();
		$codped = $prod->showcampo8();
		$obs = $prod->showcampo9();
		$login_lanc = $prod->showcampo10();


		$prod->clear();
		$prod->listProdU("codbarra, codcliente", "pedido", "codped=$codped");
		$codbarra = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		

		$prod->clear();
		$prod->listProdU("nome", "clientenovo", "codcliente='$codcliente'");
		$nomecliente = $prod->showcampo0();

		$prod->clear();
		$prod->listProdU("nome", "fornecedor, fin_cap", "fornecedor.codfor=fin_cap.codfor and codcxlanc = $codcxlanc");
		$nomefor = $prod->showcampo0();
		
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
size='1'>$opcaixa_cx</font></td>
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
<b>$descricao</b><br>$codbarra<br>$nomecliente<br>$nomefor<br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT>
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

				</table>

					<center>
<br><br>&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'>

		");



	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
