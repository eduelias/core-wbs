<?

require("classprod.php" );


// INICIO DA CLASSE
$prod = new operacao();

 $hoje = getdate();
 $ano = $hoje[year];
 $mes = $hoje[mon];
 $dia = $hoje[mday];
 $h = $hoje[hours];
 $m = $hoje[minutes];
 $s = $hoje[seconds];
 if (strlen($dia)==1){$dia = '0'.$dia;}
 if (strlen($m)==1){$m = '0'.$m;}
 if ($mes == 1){$mes = "Janeiro";}
 if ($mes == 2){$mes = "Fevereiro";}
 if ($mes == 3){$mes = "Março";}
 if ($mes == 4){$mes = "Abril";}
 if ($mes == 5){$mes = "Maio";}
 if ($mes == 6){$mes = "Junho";}
 if ($mes == 7){$mes = "Julho";}
 if ($mes == 8){$mes = "Agosto";}
 if ($mes == 9){$mes = "Setembro";}
 if ($mes == 10){$mes = "Outubro";}
 if ($mes == 11){$mes = "Novembro";}
 if ($mes == 12){$mes = "Dezembro";}


 	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, dataped, tipo_vge", "pedido", "codped=$codped");

		$codemp = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		$codvend = $prod->showcampo2();
		$vpp = $prod->showcampo3();
		$vppf = number_format($vpp,2,',','.');
		$nf = $prod->showcampo4();
		$codbarra = $prod->showcampo5();
		$dataped = $prod->showcampo6();
		$tipo_vge = $prod->showcampo7();

	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProdU("nome, tipocliente, cpf, cnpj, rg, rgemissor, endereco, bairro, cidade, cep, estado, numero, complemento", "clientenovo", "codcliente=$codcliente");

		$xnome=			$prod->showcampo0();
		$xtipocliente=	$prod->showcampo1();
		if ($xtipocliente == "F"){
		$xdoc=			$prod->showcampo2(); // CPF
		}else{
		$xdoc=			$prod->showcampo3(); // CNPJ
		}
		$xrg=			$prod->showcampo4();
		$xrgemissor=	$prod->showcampo5();
		$xendereco=		$prod->showcampo6();
		$xbairro=		$prod->showcampo7();
		$xcidade=		$prod->showcampo8();
		$xcep=			$prod->showcampo9();
		$xestado=		$prod->showcampo10();
        $xynumero = $prod->showcampo11();
        $xycomplemento = $prod->showcampo12();


		$prod->listProdU("razaosocial, endereco, bairro, cidade, estado, cep, tipo, cpf, cgc","empresa", "codemp=$codemp");

		$xxnome = $prod->showcampo0();
		#$xxnome = "IPASOFT TECNOLOGIA E INFORMÁTICA";
		$xxendereco = $prod->showcampo1();
		$xxbairro = $prod->showcampo2();
		$xxcidade = $prod->showcampo3();
		$xxestado = $prod->showcampo4();
		$xxcep = $prod->showcampo5();
		$xxtipo = $prod->showcampo6();
		if ($xxtipo == "F"){
		$xxdoc=			$prod->showcampo7(); // CPF
		}else{
		$xxdoc=			$prod->showcampo8(); // CNPJ
        }

		//DADOS DO USUARIO
		/*
	$prod->listProd("vendedor", "nome='$login'");

		$tipovend = $prod->showcampo2();
		$tipoclienteold = $prod->showcampo7();
		$docold = $prod->showcampo8();
		if ($tipoclienteold == "F"){
			$prod->listProd("clientenovo", "cpf='$docold'");
			$xcodcliente=	$prod->showcampo0();
		}else{
			$prod->listProd("clientenovo", "cnpj='$docold'");
			$xcodcliente=	$prod->showcampo0();
		}
		*/
		if ($tipovend == 'R'){

		// MOSTRA DADOS DO VENDEDOR - INICIO
	$prod->listProdU("nome, tipocliente, cpf, cnpj, rg, rgemissor, endereco, bairro, cidade, cep, estado ,dddtel1 , tel1", "clientenovo", "codcliente=$xcodcliente");

			$vxnome=			$prod->showcampo0();
			$vxtipocliente=	$prod->showcampo1();
			if ($vxtipocliente == "F"){
				$vxdoc=			$prod->showcampo2(); // CPF
			}else{
				$vxdoc=			$prod->showcampo3(); // CNPJ
			}
			$vxrg=			$prod->showcampo4();
			$vxrgemissor=	$prod->showcampo5();
			$vxendereco=	$prod->showcampo6();
			$vxbairro=		$prod->showcampo7();
			$vxcidade=		$prod->showcampo8();
			$vxcep=			$prod->showcampo9();
			$vxestado=		$prod->showcampo10();
			

		}else{

			$vxnome=        $xxnome;
			$vxtipocliente=	$xxtipocliente;
			$vxdoc=			$xxdoc;
			$vxrg=			$xxrg;
			$vxrgemissor=	$xxrgemissor;
			$vxendereco=	$xxendereco;
			$vxbairro=		$xxbairro;
			$vxcidade=		$xxcidade;
			$vxcep=			$xxcep;
			$vxestado=		$xxestado;
		}


$title = "AUTORIZAÇÃO DE FATURAMENTO";

include("sif-topolimpo.php");


echo("<style type='text/css'>
<!--
.style11 {
	color: #000000;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8px;
	background-color: #D4D4D4;
	padding: 3px;
	margin: 1px;
}
.style12 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8px;
	color: #000000;
	background-color: #F7F7F7;
	padding: 2px;
	margin: 1px;
}
.style13 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8px;
	color: #000000;
	background-color: #FFFFFF;
	padding: 3px;
	font-weight: bold;
	margin: 1px;
}
-->
</style>
<BODY>
<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'>
<div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='14%'><!--<img border='0' src='images/grupoipa.gif' width='114' height='48'>--><br>
      <b><font face='Verdana' size='4'></font></b></td>
    </center>
    <td width='74%'>
      <p align='center'><b><font size='2' face='Verdana' color='#000000'><B>AUTORIZAÇÃO DE FATURAMENTO<br>
</B></font></b></td>
    <td width='14%'>
      <font face='Verdana' color='#000000' size='1'>AUTORIZAÇÃO<BR> DO PEDIDO No<b><br>
      $codbarra</b></font></td>
  </tr>
  </table>
</div>


<div align='center'>
  <center>
  <table border='0' cellpadding='0' cellspacing='0' bordercolor='#111111'
width='100%'>
    <tr>
      <td>

<P STYLE='margin-bottom: 0cm'><FONT SIZE=1 face='Verdana' class = 'textoleg1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O cliente </B><b>$xnome</B>, $xdoc , situado(a) à $xendereco,
$xcidade, $xynumero - $xycomplemento - $xbairro - $xestado autoriza a <b>$xxnome</b>, $xxdoc, situada à $xxendereco, $xxcidade - $xxbairro - $xxestado,
<B> a emitir o(s) seguinte(s) boleto(s) bancário(s) para cobrança:</FONT><br><BR>
<div align='center'>
        <center>
        <table border='0' cellpadding='0' cellspacing='0'
style='border-collapse: collapse' bordercolor='#111111' width='90%' id='AutoNumber3'>
          <tr>
            <td width='100%'><font size='1' face='Verdana'>
			 <div align='center'>
    <center>
    <table border='0' width='100%' cellspacing='1' cellpadding='0'>
      <tr bgcolor='#D4D4D4'>
		<td width='20%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>VALOR</b></font></td>
	<!--	<td width='10%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>BANCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>AGENCIA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>CONTA</b></font></td>
		<td width='15%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>NUM.CHEQUE</b></font></td>-->
      </tr>
	   <tr bgcolor='#ffffff'>
		<td width='100%' colspan ='7'><font size='1' face='Verdana' color='#ffffff' class = 'textoleg'><b>&nbsp;</b></font></td>
              </tr>
");


  $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){

			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$datavencf = $prod->fdata($datavenc);
			$valorparcelaf = number_format($valorparcela,2,',','.');
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricao = $prod->showcampo1();

			if ($tipo == "02.30" or $tipo == "02.31"){
				$datavencf = "DATA OPERADORA";
			}

echo("

	<tr bgcolor='#F7F7F7'>
		<td width='20%'><font size='1' face='Verdana' class = 'textoleg' ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' class = 'textoleg'>$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana' class = 'textoleg'><b>R$ $valorparcelaf</b></font></td>
       <!--<td width='10%'><font size='1' face='Verdana' class = 'textoleg'>$banco</font></td>
       <td width='10%'><font size='1' face='Verdana' class = 'textoleg'>$agencia</font></td>
	 <td width='10%'><font size='1' face='Verdana' class = 'textoleg' >$conta</font></td>
        <td width='15%'><font size='1' face='Verdana' class = 'textoleg'>$numchec</font></td>-->
      </tr>
");

	}

echo("
    </table>


			</font></td>
          </tr>
        </table>
        </center>
</div>      
</b>
<P STYLE='margin-bottom: 0cm'><font size='1' face='Verdana' class='textoleg1'>&nbsp;&nbsp;
Referente ao produto(s) relacionado(s) abaixo:</FONT>



<div align='center'>
        <center>
<table width='100%'  border='0' cellspacing='0' cellpadding='2'>
  <tr class='style11'>
    <td colspan='2'>DESCRI&Ccedil;&Atilde;O DETALHADA </td>
    <td align='center'>QTDE</td>
    <td align='center'>GARANTIA<br>
    DO PRODUTO<BR>(mês) </td>
    <td align='center'>GARANTIA<br>
      ADICIONAL<br>
      CONTRATADA<BR>(mês)</td>
    <td align='center'>GARANTIA<br>
    TOTAL<BR>(mês)</td>
  </tr>");


	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj, ordem");


if (count($array3)<>0){

	 // SEPARA PRODUTOS DO CONJUNTO DE PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){

			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();

		if ($codprodcj <> 0){

            $xxtipocj = $tipocj;
            
			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$garum = $prod->showcampo11();
			$garcj = $prod->showcampo12();
			$garum_orig = $prod->showcampo19();
			$garcj_orig = $prod->showcampo20();
			$codplano = $prod->showcampo13();

			$prod->listProdU("nomeprod, unidade, gar_um, gar_cj", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			#$garum = $prod->showcampo2();
			# $garcj = $prod->showcampo3();
			
			if ($codplano <> 0){
			$prod->clear();
        	$prod->listProdU("plano","produtos_planos", "codplano = $codplano");
            $nomeplano = " - ".$prod->showcampo0();
            }

			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

			if ($tipocj <> 0 or $tipocj <> ""){
                $nomeprodcj = $nomeprodcj . " - " . $tipocj;
            }
            
            # TITULO
            if ($xxtipocj <> $tipocj) {
                $xyz = $xyz + 1;
                echo ("
                      <tr class='style13'>
                        <td colspan='6'>MICROCOMPUTADOR $xyz </td>
                      </tr>
                ");
            }

			$k=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.');
			$putf = number_format($put,2,',','.');

			if ($tipocj <> $contcjshow){
                echo("

                ");
        
		$contcjshow++;
}
        $gar_ext = 0;
        $gar_tot = 0;
        
        if ($garcj == 0){$garcj = 12;}
       	if ($garcj_orig == 0){$garantia = 12;}else{$garantia = $garcj_orig;}

        #echo("$control - $garcj_orig - $garantia - $garcj<br>");
		$gar_ext = $garcj - $garantia;
		$gar_tot = $gar_ext + $garantia;

echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td>$nomeprod $nomeplano</td>
    <td align='center'><strong>$qtde</strong></td>
    <td align='center'>$garantia</td>
    <td align='center'>$gar_ext</td>
    <td align='center'><strong>$gar_tot</strong></td>
  </tr>
");

	$ptotal = $ptotal + $put;
		}
	}
	echo("
  <tr>
    <td colspan='6'><hr size='1'></td>
  </tr>
  <tr class='style13'>
    <td colspan='6'>PRODUTOS UNIT&Aacute;RIOS </td>
  </tr>
    ");

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
			$garum = $prod->showcampo11();
			$garcj = $prod->showcampo12();
			$garum_orig = $prod->showcampo19();
			$garcj_orig = $prod->showcampo20();
			$codplano = $prod->showcampo13();

			$prod->listProdU("nomeprod, unidade, gar_um, gar_cj", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			#$garum = $prod->showcampo2();
			#$garcj = $prod->showcampo3();
			
			if ($codplano <> 0){
			$prod->clear();
        	$prod->listProdU("plano","produtos_planos", "codplano = '$codplano'");
            $nomeplano = " - ".$prod->showcampo0();
            }

			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();


			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.');
			$putf = number_format($put,2,',','.');

			#if ($garum == 0){$garantia = 12;}else{$garantia = $garum;}
			
        $gar_ext = 0;
        $gar_tot = 0;
		if ($garcj_orig == 0){$garantia = 12;}else{$garantia = $garcj_orig;}
		if ($garcj == 0){$garcj = 12;}
		#$gar_ext = $garcj - $garantia;
		$gar_tot = $gar_ext + $garantia;

            echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td>$nomeprod $nomeplano</td>
    <td align='center'><strong>$qtde</strong></td>
    <td align='center'>$garantia</td>
    <td align='center'>$gar_ext</td>
    <td align='center'><strong>$gar_tot</strong></td>
  </tr>
            ");

	$ptotal = $ptotal + $put;

		}
	 }

}else{
	echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td colspan='5'>NENHUM PRODUTO ADICIONADO</td>
  </tr>
    ");
}

	$ptotal = number_format($ptotal,2,',','.');


	echo("
		</table>

			</FONT></td>
          </tr>
        </table>
        </center>
</div>
	
<BR><BR>	
<hr>
	
	
<P STYLE='margin-bottom: 0cm'>&nbsp;&nbsp;&nbsp;<font size='1' face='Verdana' class='textoleg1'>&nbsp;&nbsp;
Caso alguma boleta não chegue ao endereço especificado acima até 48h antes do seu vencimento, o cliente deverá entrar em contato com o departamento financeiro pelo telefone (32) 2101-5900, afim de obter maiores informações sobre os procedimentos para o pagamento.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>N&atilde;o ser&atilde;o aceitos, em hip&oacute;tese alguma, dep&oacute;sitos banc&aacute;rios para a quita&ccedil;&atilde;o de qualquer boleta mesmo sendo estes efetuados antes do vencimento previsto nas boletas.</b><br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Caso algum t&iacute;tulo seja encaminhado para cart&oacute;rio por falta de observ&acirc;ncia de algum dos itens acima ou em fun&ccedil;&atilde;o de atraso no pagamento, os juros e emolumentos cobrados ser&atilde;o de responsabilidade exclusiva do devedor.<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Declaro estar ciente das normas e orienta&ccedil;&otilde;es aqui estabelecidas e comprometo-me a cumpri-las, servindo a assinatura da presente como <b>termo de aceite</b> e reconhecimento das minhas responsabilidades.</font>
	
	
	
<table width='100%' border='0' cellspacing='0' style='margin-bottom: 0cm'>
  <tr>
    <td width='100%'>
      <p align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
$vxcidade, $dia de $mes de $ano<br>$h:$m:$s
      </font></td>
  </tr>
</table>

<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber5'>
<tr>
    <td width='25%'>
    <P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg1'>
<br>
____________________________________<br>
NOME :<BR>CARGO:<BR>CPF:<BR>     </font>
    </P>
    </td>
</tr>
</table>
<BR>
<center><span class='style1' style='margin-bottom: 0cm'><font size='1' face='Verdana' class='textoleg'><font size='1' face='Verdana' class='textoleg'>&nbsp; </font>OBS: DEVER&Aacute; SER ASSINADO EXCLUSIVAMENTE PELO RESPONS&Aacute;VEL PELO DEPARTAMENTO FINANCEIRO </font></span>
</center>
</BODY>
</HTML>
	
	");

?>
