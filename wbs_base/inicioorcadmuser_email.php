

<?php


if ($impressao == 1){require("classprod.php" );}


// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "orc";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by codped limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "ORÇAMENTO";
$titulo = "ADMINISTRAÇÃO USUÁRIO";
$subtitulo = "ORÇAMENTO";

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

	// PARA PAGINA DE IMPORTACAO
		$prod->listProd("seguranca", "arquivo='inicioorcadmuser.php'");
		$pgorc = $prod->showcampo0();
		

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":
			
				
		
        break;

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":

	
		
	    break;

}


/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "delete"):


	// MOSTRA DADOS DO ORÇAMENTO - INICIO
	 $prod->listProd("orc", "codped=$codped");
		
		$codemp = $prod->showcampo1();
		$codcliente = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$dataped = $prod->showcampo11();
		$datapedf = $prod->fdata($dataped);
		$vt = $prod->showcampo9();
		$vtf = number_format($vt,2,',','.'); 
		$condicaop = $prod->showcampo29();
		$garantia = $prod->showcampo30();
		$pentrega = $prod->showcampo31();
		$impostos = $prod->showcampo32();
		$frete = $prod->showcampo33();
		$validade = $prod->showcampo34();
		$obsorcamento = $prod->showcampo35();
		$xnomecliente = $prod->showcampo36();
		$xtel = $prod->showcampo37();
		$xemail = $prod->showcampo38();
		$codbarra = $prod->showcampo39();
		$xac = $prod->showcampo40();
	
	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		
		$tipocliente = $prod->showcampo7();
		$doc = $prod->showcampo8();

	if ($tipocliente == "F")
		{$condicao78 = "cpf='$doc'";}else{$condicao78 = "cnpj='$doc'";}


		// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProd("clientenovo", $condicao78);
				
		$xnomevend=			$prod->showcampo1();
		$xemail=		$prod->showcampo77();
		


	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);

$url = $PATH_INFO;
$url2 = $HTTP_HOST;

$html="
<body bgcolor='#FFFFFF'>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='50%'><img border='0' src='http://$url2/images/grupoipa.gif' width='200' height='85'><br>
      <b><font face='Verdana' size='3'>&nbsp;&nbsp;&nbsp;&nbsp;(32) 3229-5900</font></b></td>
    </center>
    <td width='50%'>
      <p align='right'><b><font size='1' face='Verdana' color='#800000'>DATA 
      EMISSÃO<br>
      </font></b><font size='1' face='Verdana'>$datainstf<br>
      </font> <p align='right'><img src='http://$url2/barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
  </tr>
  </table>
</div>
	<br>
	

	

";

$html.="
				


<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 


<div align='center'>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    
		  <tr>
        <td width='50%' bgcolor='#000000'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PROPOSTA COMERCIAL:</b></font></td>
      </center>
      <td width='50%' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
    </tr>
      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          PROPOSTA:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datapedf</font></b></font></td>
      </center>
      <td width='50%' bgcolor='#F0F0F0'>
        <p align='right'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font face=' Verdana, Arial, Helvetica, sans-serif'>
       $nomeempold</font></font></td>
    </tr>
    <center>
    <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        CLIENTE</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>CLIENTE:<br>
        </font><font color='#000000'>$xnomecliente</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>A/C:<br>
      </font></b><font color='#000000'>$xac</font></font></td>
    </tr>
	<tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>TELEFONE:<br></b>
        </font><font color='#000000'>$xtel</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>EMAIL:<br>
      </font></b><font color='#000000'>$xemail</font></font></td>
    </tr>
		
    
    </table>
  </center>
</div>



	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 




<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO ORÇAMENTO</b> </font></td>
  </tr>
</table>


<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>&nbsp;</b></font></td>
	<td width='70%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>UNIT.(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>TOTAL(R$)</b></font></td>
   
  </tr>

  ";

	
	  $prod->listProdgeral("orcprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj,codprodcj");

if (count($array3)<>0){		
		
		$html.="
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>MICROCOMPUTADORES</b><td>
		<tr>
		";


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			
			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$nomeprod = $prod->showcampo11();

			if ($nomeprod == ""){
			$prod->listProdgeral("produtos", "codprod=$codprodped", $array11, $array_campo11 , "");
			$prod->mostraProd( $array11, $array_campo11, 0 );

			$nomeprod = $prod->showcampo19();
			$unidadeold = $prod->showcampo7();
			}

			$prod->listProdgeral("produtos", "codprod=$codprodcj", $array12, $array_campo12 , "");
			$prod->mostraProd( $array12, $array_campo12, 0 );

			$nomeprodcj = $prod->showcampo19();
			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
			
			
		
			$k=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

			
			if ($tipocj == $contcjshow){
				$tipocjold = $tipocj;
				$codprodcjold = $codprodcj;
				$qtdecjold = $qtdecj[$codprodped];
			}

		

	if ($tipocj <> $contcjshow){

		

			$html.=" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
  </tr>
		
  ";
	
	  $ptotal = $ptotal + $pmtotal;
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
$html.="
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
   
  </tr>
		
  ";
		
			// SUBSTITUI PRECOS DA TABELA POR PRECOS ALTERADOS
			$prod->listProdgeral("orcprodalt", "codped=$codped and codprodcj=$codprodcj", $array211, $array_campo211 , "");
			$prod->mostraProd( $array211, $array_campo211, 0 );
			$pcj = $prod->showcampo2();
			$qtde = $prod->showcampo6();
			
			if (count($array211) == 0){
		
				$putotal = $putotal +$puu;
				$pmtotal = $pmtotal +$put;
				
			}else{
				
				$putotal = $pcj/$qtde;
				$pmtotal = $pcj;

			}

		
		$putotalf = number_format($putotal,2,',','.'); 
		$pmtotalf = number_format($pmtotal,2,',','.'); 

		}
		
	}

		$ptotal = $ptotal + $pmtotal;
		$html.="
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
   
  </tr>
		
  ";
   
   

	$html.="
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>PRODUTOS UNITARIOS</b><td>
		<tr>
		";
  
  $pmtotalu = 0.00;	

	 // PRODUTOS UNITARIO
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$nomeprod = $prod->showcampo11();

			if ($nomeprod == ""){
			
			$prod->listProdgeral("produtos", "codprod=$codprodped", $array11, $array_campo11 , "");
			$prod->mostraProd( $array11, $array_campo11, 0 );

			$nomeprod = $prod->showcampo19();
			$unidadeold = $prod->showcampo7();
			}
					
			$k=$i+1;

			$nomeprodcj = "";

			
			
		
			// SUBSTITUI PRECOS DA TABELA POR PRECOS ALTERADOS
			$prod->listProdgeral("orcprodalt", "codped=$codped and codprod=$codprodped", $array212, $array_campo212 , "");
			$prod->mostraProd( $array212, $array_campo212, 0 );
			$pun = $prod->showcampo2();
			$qtdeun = $prod->showcampo6();
			
			if (count($array212) == 0){
		
				$put = $puu*$qtde;
				
			}else{
				
				$puu = $pun/$qtdeun;
				$put = $pun;

			}

		
		$puuf = number_format($puu,2,',','.'); 
		$putf = number_format($put,2,',','.'); 
		

$html.=" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
  </tr>
		
  ";

		$ptotal = $ptotal + $put;
		$pmtotalu = $pmtotalu +$put;
		$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 
	 
if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
	
	$html.="
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotaluf</b></font></td>
   
  </tr>
		
  ";


}else{
	$html.="
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	";
}

	$ptotal = number_format($ptotal,2,',','.'); 

  
		$html.="
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
  
  </tr>
		
 
		</table>

		
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>


	<center>
	
<table width='532' border='0' cellspacing='1' cellpadding='2' align='center'>
    <tr bgcolor='#F3F8FA'> 
      <td width='532' bgcolor='#FFFFFF' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>::
        CONDIÇÕES
        DE PAGAMENTO:</font></b></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='532' bgcolor='#F3F8FA' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>

       $condicaop</font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>::
        GARANTIA:</font></b>
      </td>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>:: PRAZO
        DE ENTREGA:</font></b>  
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='266' bgcolor='#F3F8FA'>
  <font size='1' face='Verdana'>$garantia</font></td>
      <td width='266' bgcolor='#F3F8FA'>  <font size='1' face='Verdana'>até<b> $pentrega </b>dia(s)</font></td>
    </tr>
    <tr>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>::
        IMPOSTOS:</font></b>  
      </td>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>:: FRETE:</font></b>  
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='266' bgcolor='#F3F8FA'>  <font size='1' face='Verdana'>$impostos</font></td>
      <td width='266' bgcolor='#F3F8FA'>  <font size='1' face='Verdana'>$frete</font></td>
    </tr>
    <tr>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana' size='1'>:: VALIDADE DA PROPOSTA:</font></b>  
      </td>
      <td width='266' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'>&nbsp;</font>
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='266' bgcolor='#F3F8FA'><font face='Verdana'><b><font size='1'>$validade
        </font> </b><font size='1'>dia(s)</font></font></td>
      <td width='266' bgcolor='#F3F8FA'><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='532' bgcolor='#FFFFFF' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>::
        OBS.:</font></b>
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='532' bgcolor='#F3F8FA' colspan='2'><font size='1' face='Verdana'>$obsorcamento</font></td>
    </tr>
  </table>
";


	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);

	$html.="
<br>
<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%'><b><font face='Verdana' color='#000000' size='1'>Colocando-nos a disposição para quaisquer esclarecimento, subscrevemo-nos,</font>
        </b></td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><font color='#800000'><br>
        &nbsp;</font><b><font size='1' face='Verdana' color='#000000'>Cordialmente,</font>
        </b></p>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><b><font size='2' face='Verdana' color='#000000'>______________________________<br>
        </font></b><font face='Verdana' color='#000000' size='1'><b>$xnomevend</b><br>
        e-mail: $xemail</font><b><font size='2' face='Verdana' color='#000000'><br>
        </font><font face='Verdana' color='#000000' size='1'>
        $nomeempold</font></b></td>
    </tr>
  </table>
  </center>
</div>


	";


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

#echo("$html");

$html = "teste";


/**
* Project........: HTML Mime Mail class
*/

        #error_reporting(E_ALL);
        include('email/htmlMimeMail.php');

/**
* Example of usage. This example shows
* how to use the class to send Bcc: 
* and/or Cc: recipients.
*
* Create the mail object.
*/
	$mail = new htmlMimeMail();

/**
* Add the text, html and embedded images.
* Here we're using the third argument of
* setHtml(), which is the path to the
* directory that holds the images. By
* adding this third argument, the class
* will try to find all the images in the
* html, and auto load them in. Not 100%
* accurate, and you MUST enclose your
* image references in quotes, so src="img.jpg"
* and NOT src=img.jpg. Also, where possible,
* duplicates will be avoided.
*/
	$text = "";
	$mail->setHtml($html,$text,'/');
	
/**
* Send the email using smtp method. The setSMTPParams()
* method simply changes the HELO string to example.com
* as localhost and port 25 are the defaults.
*/
	$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
	$mail->setFrom($xnomevend.'<'.$xemail.'>');
	$mail->setSubject('GRUPO IPASOFT - '.$assunto);
	#$mail->setReturnPath('felipe@jfnet.com.br');
	#$mail->setBcc('bcc@example.com');
	#$mail->setCc('Carbon Copy <cc@example.com>');

	$result = $mail->send(array($email), 'smtp');

	// These errors are only set if you're using SMTP to send the message
	if (!$result) {

		
		echo("r= $result<br> em= $email<br>html = $html<br> ");
		#$prod->msgpopup("Ocoorreu um erro ao enviar o email", "ERRO");
		print_r($mail->errors);

	} else {
	   
	   $prod->msgpopup("O email foi enviado corretamente", "OK");
		
		// GRAVA INDICACAO DE ENVIO DE EMAIL
		$prod->listProd("orc", "codped=$codped");
		$prod->setcampo42('OK');
		$prod->upProd("orc", "codped=$codped");


	}


?>
       
