

<?php

if ($impressao == 1){require("classprod.php" );}


// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "orc";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataped DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "ORÇAMENTO";
$titulo = "ADMINISTRAÇÃO TELEMARKETING";
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
		$prod->listProd("seguranca", "arquivo='inicioorcpedfpg.php'");
		$pgorc = $prod->showcampo0();

	// PARA PAGINA DE IMPORTACAO PEDIDO
		$prod->listProd("seguranca", "arquivo='inicioped.php'");
		$pgped = $prod->showcampo0();
		

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		#if ($codempvend <> 0){$codempselect = $codempvend;}


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($statuspeds <> "ESCOLHA"){
			
			$prod->listProdgeral("orcstatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");

			if (count($array614) == 0){

			$dataatual = $prod->gdata();

			// ATUALIZA STATUS DA TABELA
			
			$prod->setcampo0("");
			$prod->setcampo1($codped);
			$prod->setcampo2($dataatual);
			$prod->setcampo3($statuspeds);
				
			$prod->addProd("orcstatus", $ureg);

			$prod->listProd("orc", "codped=$codped");
			$prod->setcampo14($statuspeds);
			$prod->setcampo41($obsorc);
			if ($statuspeds == "FECHADO" or $statuspeds == "PERDIDO" or $statuspeds == "CANCEL"){
			$prod->setcampo13($dataatual);
			$prod->setcampo15(1);
			}

			$prod->upProd("orc", "codped=$codped");
			}

		}else{

				// ATUALIZA OUTROS DADOS DO PEDIDO
				$prod->listProd("orc", "codped=$codped");
				$prod->setcampo41($obsorc);
				$prod->upProd("orc", "codped=$codped");
		}
		
        break;

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":

	
		
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$campopesq1 = "nomecliente";
		$condicao2 = " LCASE($campopesq1) like '%$palavrachave1%' and ";
		$condicao5 = " LCASE(vendedor.$campopesq) like '%$nomevendpesq1%' and ";

		$condicao4 .= " (orc.codvend=109 OR orc.codvend=111 OR orc.codvend=110 OR orc.codvend=52) and ";

		
		#echo("cgrp=$codgrpselect");


		$condicao3 = $condicao4;

		//PESQUISA POR NOME CLIENTE
		if ($palavrachave){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR NOME VENDEDOR
		if ($nomevendpesq){
							
			$condicao3 .= $condicao5;
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " orc.codbarra='$codpedpesq' and";
		}

		
			
	
				$condicao3 .= " orc.codemp='$codempselect'";
				$condicao3 .= " and orc.hist = '$hist'  ";
				#$condicao3 .= " and orc.codcliente=clientenovo.codcliente ";
				$condicao3 .= " and orc.codvend=vendedor.codvend ";


		break;

		
		
		}
		#echo("$condicao3");

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "orc, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, orc.codvend, vt, dataped, status, validade, codbarra, nomecliente, emailenv", "orc, vendedor", $condicao3, $array, $array_campo, $parm );

		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

if ($impressao <> 1){ include("sif-topo.php"); }

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
		$xobsorc = $prod->showcampo41();

		
		$condicaop = urldecode($condicaop);
		$obsorcamento = urldecode($obsorcamento);

	
	
	$prod->listProdU("razaosocial, endereco, bairro, cidade,estado, cep, tel1","empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
		$xendereco = $prod->showcampo1();
		$xbairro = $prod->showcampo2();
		$xcidade = $prod->showcampo3();
		$xestado = $prod->showcampo4();
		$xcep = $prod->showcampo5();
		$xtel1 = $prod->showcampo6();

		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		
		$tipocliente = $prod->showcampo7();
		$tipo = $prod->showcampo2();
		$doc = $prod->showcampo8();

	
	if ($tipocliente == "F")
		{$condicao78 = "cpf='$doc'";}else{$condicao78 = "cnpj='$doc'";}


		
	// MOSTRA DADOS DO CLIENTE - INICIO

	$prod->listProdU("nome, email, endereco, bairro, cidade, estado, cep, dddtel1, tel1", "clientenovo", $condicao78);
				
		$xnomevend=		$prod->showcampo0();
		$xemail=		$prod->showcampo1();
		$xr_endereco = $prod->showcampo2();
		$xr_bairro = $prod->showcampo3();
		$xr_cidade = $prod->showcampo4();
		$xr_estado = $prod->showcampo5();
		$xr_cep = $prod->showcampo6();
		$xr_dddtel1 = $prod->showcampo7();
		$xr_tel1 = $prod->showcampo8();
	
	
if ($impressao <> 1){

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
");
}

if ($impressao == 1){
	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);
	 include("sif-topolimpo.php");

echo("
<body bgcolor='#FFFFFF'>

");

if ($tipo <> "R"){
echo("

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='265'><img border='0' src='images/grupoipa.gif' width='200' height='85'><br>
        <b><font face=' Verdana, Arial, Helvetica, sans-serif' size='4'>PROPOSTA COMERCIAL:</font></b></td>
    </center>
      <td width='171'>
        <p align='center'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          PROPOSTA:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datapedf<br>
        </font></b></font><font size='1' face='Verdana'><br>
        Av. Independência 988, Centro, 36016-320,<br>
        Juiz de Fora - MG<br>
        <b>(32) 3229-5900</b></font></td>
    <td width='108'>
      <p align='right'> <img src='barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
  </tr>
  </table>
</div>

");
}else{
echo("

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='265'><img border='0' src='images/grupoipa.gif' width='200' height='85'><br>
        <b><font face=' Verdana, Arial, Helvetica, sans-serif' size='4'>PROPOSTA COMERCIAL:</font></b></td>
    </center>
      <td width='171'>
        <p align='center'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          PROPOSTA:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datapedf<br>
        </font></b></font><font size='1' face='Verdana'><br>
        $xr_endereco, $xr_bairro, $xr_cep,<br>
        $xr_cidade - $xr_estado<br>
        <b>($xr_dddtel1) $xr_tel1</b></font></td>
    <td width='108'>
      <p align='right'> <img src='barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
  </tr>
  </table>
</div>

");
}

}

if ($impressao == 1){$classe = "textoleg";}else{$classe = "textoleg1";}

echo("
				


<div align='center'>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    
    <center>
    <tr>
      <td width='540' bgcolor='#808080' colspan='4'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        CLIENTE</b></font></td>
    </tr>
  </center>
    <tr>
      <td width='84' bgcolor='#F0F0F0'>
      <p align='left'><font face='Verdana'><b><font color='#336699' size='1'>A/C:<br>
      </font></b><font color='#000000' size='1'>$xac</font></font></td>
    <center>
      <td width='176' bgcolor='#F0F0F0'><b><font face='Verdana' size='1'><font color='#336699'>CLIENTE:<br>
        </font><font color='#000000'>$xnomecliente</font></font></b></td>
      <td width='128' bgcolor='#F0F0F0'>
      <font size='1' face='Verdana'>
      <b><font color='#336699'>TELEFONE:<br>
        </font></b>
      <font color='#000000'>$xtel</font></font></td>
      <td width='128' bgcolor='#F0F0F0'>
      <font face='Verdana'><b><font color='#336699' size='1'>EMAIL:<br>
      </font></b><font color='#000000' size='1'>$xemail</font></font></td>
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


<div >


<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center' class = '$classe'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO ORÇAMENTO</b> </font></td>
  </tr>
</table>


<table border='0' width='550' border='0' cellspacing='1' cellpadding='0' align='center' class = '$classe'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font color='#000000'><b>&nbsp;</b></font></td>
	<td width='70%' height='0' colspan='2'><font color='#000000' ><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='10%' height='0'><font color='#000000'><b>UNIT.(R$)</b></font></td>
    <td width='5%' height='0'><font color='#000000'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font color='#000000'><b>TOTAL(R$)</b></font></td>
   
  </tr>

  ");

	
	  $prod->listProdgeral("orcprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj,codprodcj");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font color ='#800000'><b>MICROCOMPUTADORES</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 $sov = 1 ;
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
			$prod->listProdU("nomeprod, unidade, descres, codsubcat", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			$codsubcat = $prod->showcampo3();
			}

			if ($codsubcat == 111){$sov = $sov * 0;}

			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
				
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

		

			echo(" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font color='#800000'></font></td>
    <td width='50%' height='0'><font color='#800000'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font><b></b></font></td>
	<td width='10%' height='0' align='center'><font><b>$pmtotalf</b></font></td>
  </tr>
		
  ");
	
	  $ptotal = $ptotal + $pmtotal;
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font ><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'>
	$nomeprod</font><br><font color='#808080' face='Verdana, Arial, Helvetica, sans-serif'>$descres</font></td>
	<td width='10%' height='0' align='center'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>");if ($impressao <> 1){echo("$puuf");}echo("</font></td>
    <td width='5%' height='0' align='center'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>");if ($impressao <> 1){echo("$putf");}echo("</font></td>
   
   </tr>
		
  ");
		
			$putotal = $putotal +$puu;
			$pmtotal = $pmtotal +$put;
		
		$putotalf = number_format($putotal,2,',','.'); 
		$pmtotalf = number_format($pmtotal,2,',','.'); 

		}
		
	}

		$ptotal = $ptotal + $pmtotal;
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'></td>
	<td width='20%' height='0'  align='center'></td>
    <td width='50%' height='0'><b>SUBTOTAL </b></td>
	<td width='10%' height='0' align='center'><b>$putotalf</b></td>
    <td width='5%' height='0' align='center'><b></b></td>
	<td width='10%' height='0' align='center'><b>$pmtotalf</b></td>
   
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font color ='#800000'><b>PRODUTOS UNITARIOS</b></font><td>
		<tr>
		");
  
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
			$prod->listProdU("nomeprod, unidade, descres, codsubcat", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			$codsubcat = $prod->showcampo3();
			}

			if ($codsubcat == 111){$sov = $sov * 0;}
			
					
			$k=$i+1;

			$nomeprodcj = "";

			
					
				$put = $puu*$qtde;

		$puuf = number_format($puu,2,',','.'); 
		$putf = number_format($put,2,',','.'); 
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font ><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'>
	$nomeprod</font><br><font color='#808080' face='Verdana, Arial, Helvetica, sans-serif'>$descres</font></td>
	<td width='10%' height='0' align='center'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>");if ($impressao <> 1){echo("$puuf");}echo("</font></td>
    <td width='5%' height='0' align='center'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>");if ($impressao <> 1){echo("$putf");}echo("</font></td>
   
  </tr>
		
  ");

		$ptotal = $ptotal + $put;
		$pmtotalu = $pmtotalu +$put;
		$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 
	 
if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
	
	echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font ><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'></font></td>
    <td width='50%' height='0'><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'><b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><b></b></td>
    <td width='5%' height='0' align='center'><b></b></td>
	<td width='10%' height='0' align='center'><b>$pmtotaluf</b></td>
   
  </tr>
		
  ");


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=7><font color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b></font><td>
		<tr>
	");
}

	$ptotal = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font color='#800000'></font></td>
    <td width='50%' height='0'><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font ><b></b></font></td>
    <td width='5%' height='0' align='center'><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif'><b>$ptotal</b></font></td>
  
  </tr>
		
 
		</table>

		
</div>		
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
	
");
if ($sov == 1){
echo("
    	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center' class = '$classe'>
	<tr>
      <td>
        <font color='#FF0000' face='Verdana, Arial, Helvetica, sans-serif' ><b>A IPASOFT RECOMENDA O USO DO SISTEMA OPERACIONAL&nbsp;
        MICROSOFT WINDOWS ®</b></font>
      </td>
    </tr>
    </table>

    	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center' class = '$classe'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
");
}
echo("

	<center>
	
<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'  class = '$classe'>
    <tr bgcolor='#F3F8FA'> 
      <td width='532' bgcolor='#FFFFFF' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' >::
        CONDIÇÕES
        DE PAGAMENTO:<br>
        </font></b><font face='Verdana, Arial, Helvetica, sans-serif'  color='#800000' size ='2'>

       <b>$condicaop</b></font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif'>::
        GARANTIA:<br>
        </font></b>
        <font  face='Verdana'>$garantia</font>
      </td>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif' >:: PRAZO
        DE ENTREGA:<br>
        </font></b>  
        <font  face='Verdana'>até<b> $pentrega </b>dia(s)</font>  
      </td>
    </tr>
    <tr>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif' >::
        IMPOSTOS:<br>
        </font></b>  
        <font  face='Verdana'>$impostos</font>  
      </td>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana, Arial, Helvetica, sans-serif'>:: FRETE:<br>
        </font></b>  
        <font face='Verdana'>$frete</font>  
      </td>
    </tr>
    <tr>
      <td width='266' bgcolor='#FFFFFF'>
        <b><font face='Verdana' >:: VALIDADE DA PROPOSTA:<br>
        </font></b>  
        <font face='Verdana'><b>$validade
         </b>dia(s)</font>
      </td>
      <td width='266' bgcolor='#FFFFFF'>
        <font  face='Verdana'>&nbsp;</font>
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='532' bgcolor='#FFFFFF' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' >::
        OBS.:<br>
        </font></b>
        <font  face='Verdana'>$obsorcamento</font>
      </td>
    </tr>
  </table>
");
if ($sov == 1){
	/*
echo("
		  <div align='center'>
      <center>
      <table border='0' width='550' cellspacing='1'  class = '$classe'>
        <tr>
          <td width='100%' bgcolor='#FFFFFF' colspan='3'>
            <hr size='1'>
          </td>
        </tr>
        <tr>
          <td width='100%' bgcolor='#FFFFFF' colspan='3'><b><font face='Verdana' color='#336699'>A
            IPASOFT RECOMENDA A COMPRA DOS SISTEMAS OPERACIONAIS MICROSOFT
            WINDOWS ® ABAIXO:</font></b></td>
        </tr>
        <tr>
          <td width='60%' bgcolor='#FFFFFF'>&nbsp;</td>
          <td width='20%' align='center' bgcolor='#FFFFFF'><b><font  face='Verdana' color='#800000'>À
            VISTA</font></b></td>
          <td width='20%' align='center' bgcolor='#FFFFFF'><b><font  face='Verdana' color='#800000'>1+5
            vezes</font></b></td>
        </tr>
");
		 $prod->listProdSum("nomeprod , pvv","produtos", "codsubcat=111", $array3, $array_campo3 , "order by nomeprod");

for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$nomeprodcat = $prod->showcampo0();
				$pvvcat = $prod->showcampo1();

		$prod->listProdU("fatorvista","empresa", "codemp=$codemp");
		$fatorvistacat = $prod->showcampo0();
			
				$pvvcatv = $pvvcat * $fatorvistacat;

				#$pvvcatvf = number_format($pvvcatv,2,',','.'); 
				#$pvvcatf = number_format($pvvcat,2,',','.'); 
		
echo("
		<tr>
          <td width='60%' bgcolor='#FFFFFF'><font face='Verdana' color='#800000'>$nomeprodcat</font></td>
           <td width='20%' bgcolor='#FFFFFF' align='center'>consulte</td>
          <td width='20%' bgcolor='#FFFFFF' align='center'>consulte</td>
        </tr>
	");
}
echo("
        <tr>
          <td width='100%' bgcolor='#FFFFFF' colspan='3'><font  face='Verdana' color='#336699'>CONSULTE
            OUTRAS FORMAS DE FINANCIAMENTO</font></td>
        </tr>
      </table>
      </center>
    </div>

");
*/
}


if ($impressao == 1){

	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);

	echo("
<table border='0' width='550' cellspacing='0' cellpadding='0' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2' class = '$classe'>
    <tr>
      <td width='100%'><b><font face='Verdana' color='#000000' >Colocando-nos a disposição para quaisquer esclarecimento, subscrevemo-nos,</font>
        </b></td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><font color='#800000'>
        &nbsp;</font><b><font  face='Verdana' color='#000000'>Cordialmente,</font>
        </b></p>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><b><font  face='Verdana' color='#000000'>______________________________<br>
        </font></b><font face='Verdana' color='#000000' ><b>$xnomevend</b><br>
        e-mail: $xemail</font><b><font  face='Verdana' color='#000000'><br>
        </font><font face='Verdana' color='#000000' >
        $nomeempold</font></b></td>
    </tr>
  </table>
  </center>
</div>


	");

}






if ($impressao <> 1){
	echo("


			 	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
 <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr >
	    <td align='right' width='18'><font face='Verdana' size='1' color='#FF6600'><b><img border='0' src='images/impressora.gif'></b></font></td>
        <td align='left' width='143' height='0'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('inicioorcadmuser.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1','name','600','400','yes');return 
false");echo('"');echo(">IMPRIMIR PROPOSTA</a></b></font>
        <td align='left' width='18' height='0'>
    <font face='Verdana' size='1' color='#FF6600'><b><img border='0' src='images/bt-recalculaped.gif'></b></font>
     <td align='left' width='143' height='0'>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='$PHP_SELF?Action=importacao&amp;codpedimport=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codempselect=$codempselect&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgorc&pgold=$pg'>ALTERAR
    ORÇAMENTO</a></b></font>
        <td align='left' width='22' height='0'>
    <font face='Verdana' size='1' color='#FF6600'><b><img border='0' src='images/bt-fechaped.gif'></b></font>
        <td align='left' width='154' height='0'>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='$PHP_SELF?Action=list&amp;codpedimport=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codempselect=$codempselect&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgped&pgold=$pg&orcimp=1'>CRIAR
    PEDIDO</a></b></font>
 </tr>
  </table>
      </center>
 <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>

<form method='POST' action='inicioorcadmuser_email.php?Action=update'  name='Form' target='_new'>
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
	<tr bgColor='#f3f8fa'>
        <td width='186' bgcolor='#FFFFFF'><font size='2' face='Verdana' color='#800000'><b><img border='0' src='images/email.gif' width='30' height='30'></b></font></td>
        <td width='554' bgcolor='#FFFFFF'>
  <font size='1' face='Verdana' color='#800000'><b>ENVIAR EMAIL PARA O CLIENTE</b></font>
  


            </td>
        <td width='55' bgcolor='#FFFFFF'>
  &nbsp;
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ASSUNTO:</b></font></td>
        <td width='554'>
  <input type='text' name='assunto' size='33'>
  


            </td>
        <td width='55' rowspan='2'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>&nbsp;EMAIL:</b></font></td>
        <td width='554'>
 <input type='text' name='email' size='33'>
  

            </td>
      </tr>
    </table>
    </center>
  </div>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		<input type='hidden' name='impressao' value='1'>
</form>





");

if ($hist <> 1){

echo("

  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>

<form method='POST' action='$PHP_SELF?Action=insert'  name='Form'>
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ALTERAR STATUS</b></font></td>
        <td width='554'>
  <select size='1' class=drpdwn name='statuspeds'>

		<option value='ANDAMENTO'>ANDAMENTO</option>
		<option value='PENDENCIA'>PENDENCIA</option>
		<option value='FECHADO'>FECHADO</option>
		<option value='PERDIDO'>PERDIDO</option>
		<option value='CANCEL'>CANCEL</option>
		<option selected>ESCOLHA</option>
		
						  </select>
  


            </td>
        <td width='55' rowspan='2'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>OBS.:</b></font></td>
        <td width='554'>  <textarea rows='2' name='obsorc' cols='38'>$xobsorc</textarea>

  

            </td>
      </tr>
    </table>
    </center>
  </div>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
</form>


");

}
			echo("
<br>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>I</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO ORÇAMENTO</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#86acb5'>
        <td width='186'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='382'><font face='Verdana' color='#ffffff' size='1'><b>STATUS</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("orcstatus", "codped=$codped", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$datastatusf = $prod->fdata($datastatus);



echo("
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='382'><font face='Verdana' size='1'><b>$statusped</b></font></td>
      </tr>
");		
	}
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>



</form>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=list&codempselect=$codemp&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR</a></font>
      </td>
    </tr>
  </table>
  </center>
</div>




	");
}// FIM DA PARTE NAO IMPRIMIVEL!!

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
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='cli'>Cliente</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'>
		VENDEDOR: <input type='text' name='nomevendpesq' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codpednew' value='$codpednew'>
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
      </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
	
	

");

//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

if ($allemp == "Y"){

echo("
<br>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq#cliente'>$nomeemp</option>
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
           
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='54%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ORÇAMENTO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ORÇAMENTO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1'><br>
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
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='14%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='16%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA ORC</font></b></div>
    </td>
	 <td width='17%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='6%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VAL(DIAS)</font></b></div>
    </td>
		<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONT</font></b></div>
    </td>
		<td width='2%' height='0' > 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><IMG SRC='images/email-y.gif'  BORDER=0 ></font></b></div>
    </td>
	
    
  </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS // 
			$codped = $prod->showcampo0();
			$codvend = $prod->showcampo1();
			$valor = $prod->showcampo2();
			#$valorp = $prod->showcampo10();
			$dataped = $prod->showcampo3();
			$status= $prod->showcampo4();
			$validade = $prod->showcampo5();
			$codbarra = $prod->showcampo6();
			$xnomecliente = $prod->showcampo7();
			$xemailenv = $prod->showcampo8();

			// FORMATACOES //
			$valorf = number_format($valor,2,',','.'); 
			$datapedf = $prod->fdata($dataped);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataped,$dataatual);
			

			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();

			$bgcorlinha="#E5E5E5";
			if ($status == "NOVO"){$bgcorlinha="#FFCC66";}
			if ($status == "ANDAMENTO"){$bgcorlinha="#CFFCC7";}
			if ($status == "PENDENCIA"){$bgcorlinha="#F2E4C4";}
			if ($status == "FECHADO"){$bgcorlinha="#BFD9F9";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}

			if ($xemailenv == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}


		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'><font
face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$codbarra</font></b></a></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$xnomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend</font></td>
			<td width='16%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='17%' height='0' ><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>R$ $valorf</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b></font></td>
			<td align='center' width='6%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#008000'>$validade</font></b></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#FF0000'>$difdias</font></b></td>
			<td align='center' width='2%' height='0' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$xemailenv</font></b></td>
			
			
	</tr>
			
		");
	 }

		echo("
				</table>
		");

}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" ){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ include ("sif-rodape.php");}
}

?>
       
