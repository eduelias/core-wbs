

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

	case "insmov":

	
		$Action="update";
		
	
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


}


/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "BANCO - EXTRATO SINTÉTICO";

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


		// PARA PAGINA DE TRANFERENCIA DE CAIXA
		$prod->listProd("seguranca", "arquivo='iniciofin_bco_pessoal_impressao.php'");
		$pgextr= $prod->showcampo0();

				
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
		$prod->listProdSum("COUNT(*) as numreg", "fin_bcomov", $condicao3, $array, $array_campo, "GROUP BY opcaixa" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codmov, codconta, codcxlanc, codcxopera, opcaixa, descricao, datamov, dataini, SUM(credito), SUM(debito), consolida, codped, obs, codos", "fin_bcomov", $condicao3, $array, $array_campo, "GROUP BY opcaixa order by credito DESC, opcaixa DESC " );
		
	

		// CRIA AS PAGINAS
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 


		
		
		$prod->listProdU("codemp, saldoini, dataini, nomebco, tipoconta, codvend", "fin_bcoconta", "codconta=$codcontaselect");
		$codemp = $prod->showcampo0();
		$saldoini = $prod->showcampo1();
		$datainiconta = $prod->showcampo2();
		$nomebco = $prod->showcampo3();
		$tipoconta = $prod->showcampo4();
		$codvend = $prod->showcampo5();

		$prod->listProdU("nome, tipocliente, doc, codproj", "vendedor", "codvend=$codvend");
		$nomevend_list= $prod->showcampo0();
		$tipocliente_list= $prod->showcampo1();
		$docold = $prod->showcampo2();
		$codproj = $prod->showcampo3();
		$nomevend_list = strtoupper($nomevend_list);

			if ($tipocliente_list == "F"){
				$prod->listProdU("nome","clientenovo", "cpf='$docold'");
				$nomecliente=	$prod->showcampo0();
			}else{
				$prod->listProdU("nome","clientenovo", "cnpj='$docold'");
				$nomecliente=	$prod->showcampo0();
			}

			$nomecliente = strtoupper($nomecliente);

		$prod->listProdU("nomeproj", "projeto_nome", "codproj=$codproj");
		$nomeprojold = $prod->showcampo0();
		$nomeprojold = strtoupper($nomeprojold);
		
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

<div align='center' style='visibility: ; ' id='topo'>
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
     <td width='100%' bgcolor='#000000' valign='top' colspan ='2'></td>
    </tr>
    <center>
      <tr>
      <td width='50%' bgcolor='#F3F3F3' valign='top'><font face='Verdana'><b>
      <font size='1'><font color='#800000'>USUÁRIO:</font><br>
        </b>$nomecliente</font></font></td>
    <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='right'>
      <font size='1'><font color='#800000'>DATA ATUAL:<br>
          </font>$dataatualf</font></td>
      </tr>
    <tr>
      <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='left'><font color='#800000' size='1' face='Verdana'><b>EMPRESA</b></font><font face='Verdana'><b><font size='1'>
      <br>
      </font>
         </b> <font size='1'>$nomeprojold</font></font></td>
    </center>
    <td width='50%' bgcolor='#F3F3F3' valign='top'>
      <p align='right'><font color='#800000' size='1' face='Verdana'><b>PERÍODO</b></font><font face='Verdana'><b><font size='1'>
      <br>
      </font>
         </b><b><font face='Verdana' size='1'>DE</font></b><font size='1' face='Verdana'><b>
      </b>$datainicialf <b>ATÉ </b>$datafinalf</font></font></td>
    </tr>
  <tr>
     <td width='100%' bgcolor='#000000' valign='top' colspan ='2'></td>
    </tr>
    </table>
  </div>

<br>



	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr>
    <td width='20%' height='0' bgcolor='#F3F3F3'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
    $datainicialf</font></b></td>
    <td width='50%' height='0' bgcolor='#F3F3F3'>
    <p align='center'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
    SALDO ANTERIOR</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$ $saldoiniperiodof</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
  </tr>

	<tr bgcolor='#D6B778'> 
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='50%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
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
		$codosforma = $prod->showcampo13();
		$codcliente = 0;
		$codbarra = "";

		if ($codosforma <> 0){
		$codos = "";
		$prod->clear();
		$prod->listProdSum("codbarra, codcliente", "os", "codformagrupo = $codosforma", $array48, $array_campo48, "" );
		for($u = 0; $u < count($array48); $u++ ){
			$prod->mostraProd( $array48, $array_campo48, $u );
			$codbarra_os = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codos .= "$codbarra_os<br>";
		}
		}

		if ($codped <> 0){
		$prod->clear();
		$prod->listProdU("codbarra, codcliente", "pedido", "codped=$codped");
		$codbarra = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		}

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
		<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$opcaixa</font></td>
			<td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'><b>$descricao</b></td>
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
		

		$total = $subcredito - $subdebito + $saldoiniperiodo;
		$totalf = number_format($total,2,',','.'); 

		echo("
		<tr bgColor='#ffffff'>
			<td align='middle' width='20%' height='0'>&nbsp;</td>
			<td width='50%' height='0'>
			<p align='center'><b>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
			SALDO MOVIMENTAÇÃO</font></b></td>
			<td align='middle' width='10%' height='0'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $subcreditof</b></font></td>
			<td align='middle' width='10%' height='0'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $subdebitof</b></font></td>
			
		</tr>
		<tr bgColor='#d6b778'>
			<td align='middle' width='20%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td width='50%' height='0' bgcolor='#F3F3F3'>
			<p align='center'><b>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
			SALDO NO PERIODO</font></b></td>
			<td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $totalf</b></font></td>
			<td width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
  </tr>

		

				</table>
					<br><BR>
					
		<center>
<br><br>&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage1()'>
		
		");

	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INCLUSÃO DO RODAPE ////

#include ("sif-rodapelimpo.php");
}

?>
       
