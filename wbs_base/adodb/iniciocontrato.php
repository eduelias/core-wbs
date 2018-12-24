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


$title = "CONTRATO DE COMPRA  E VENDA COM RESERVA DE DOMÍNIO";

include("sif-topolimpo.php");


echo("<style type='text/css'>
<!--
.style11 {
	color: #000000;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	background-color: #D4D4D4;
	padding: 3px;
	margin: 1px;
}
.style12 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	background-color: #F7F7F7;
	padding: 2px;
	margin: 1px;
}
.style13 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
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
      <p align='center'><b><font size='3' face='Verdana' color='#000000'><B>CONTRATO
DE COMPRA  E VENDA&nbsp;<br>
");
if ($reserva == 1){
echo("
      COM RESERVA DE DOM&Iacute;NIO
");
}
echo("
</B></font></b></td>
    <td width='14%'>
      <font face='Verdana' color='#000000' size='3'>CONTRATO No<b><br>
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

<P STYLE='margin-bottom: 0cm'><FONT SIZE=1 face='Verdana' class = 'textoleg'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelo
presente instrumento particular de contrato de compra e venda ");
if ($reserva == 1){
echo("
      com reserva de domínio
");
}
echo(", as
partes <b>$xxnome</b>, $xxdoc, situada à $xxendereco, $xxcidade - $xxbairro - $xxestado,
<B>ora denominada contratada e, </B><b>$xnome</B>, $xdoc , situado(a) à $xendereco,
$xcidade, $xynumero - $xycomplemento - $xbairro - $xestado, ora <B>denominado contratante, </B>tem, entre si,
justo e contratado, na melhor forma de direito o seguinte:<br>
<b>CLÁUSULA PRIMEIRA: DO OBJETO<br>
</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <FONT SIZE=1 face='Verdana' class = 'textoleg'>1.1 -
		O Objeto deste contrato &eacute; o fornecimento do(s)
		equipamento(s) descrito(s) abaixo :
      <div align='center'>
        <center>
<table width='100%'  border='0' cellspacing='3' cellpadding='2'>
  <tr class='style11'>
    <td colspan='2'>DESCRI&Ccedil;&Atilde;O DETALHADA </td>
    <td align='center'>QTDE</td>
    <td align='center'>GARANTIA<br>
    LEGAL<BR>(mês) </td>
    <td align='center'>GARANTIA<br>
      CONTRATUAL<BR>(mês)</td>
    <td align='center'>TÉRMINO<br>
    DA GARANTIA<BR>(mês)</td>
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

			$prod->listProdU("nomeprod, unidade, gar_um, gar_cj, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo4();
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
		
		$gar_legal = 3;
		$gar_contrato =  $garantia - $gar_legal + $gar_ext;
		$gar_total = $gar_contrato + $gar_legal;

echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td><b>$nomeprod</b> $nomeplano<br>$descres</td>
    <td align='center'><strong>$qtde</strong></td>
    <td align='center'>$gar_legal</td>
    <td align='center'>$gar_contrato</td>
    <td align='center'><strong>$gar_total</strong></td>
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

			$prod->listProdU("nomeprod, unidade, gar_um, gar_cj, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo4();
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
		if ($garum_orig == 0){$garantia = 12;}else{$garantia = $garum_orig;}
		if ($garum == 0){$garum = 12;}
		$gar_ext = $garum - $garantia;
		
		$gar_legal = 3;
		$gar_contrato =  $garantia - $gar_legal + $gar_ext;
		$gar_total = $gar_contrato + $gar_legal;
		#$gar_tot = $gar_ext + $garantia;

            echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td><b>$nomeprod</b> $nomeplano<br>$descres</td>
    <td align='center'><strong>$qtde</strong></td>
    <td align='center'>$gar_legal</td>
    <td align='center'>$gar_contrato</td>
    <td align='center'><strong>$gar_total</strong></td>
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
<P STYLE='margin-bottom: 0cm'>&nbsp;&nbsp;&nbsp;<font size='1' face='Verdana' class='textoleg'>&nbsp;&nbsp;
1.2 -
		O prazo de garantia em meses descrito na coluna GARANTIA LEGAL é aquele previsto pelo Artigo 26, inciso II do Código de Defesa Do Consumidor, o prazo de garantia descrito na coluna GARANTIA CONTRATUAL é aquele complementar previsto pelo Artigo 50 do CDC, a coluna TERMINO DE GARANTIA representa a soma dos dois prazos e indica o prazo de encerramento da garantia.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3 -
		O Objeto deste contrato poderá sofrer alterações, desde que com o
consentimento prévio do contratante, bastando para tanto uma simples
autorização verbal, observada as seguintes circunstâncias:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a)
Constatada a incompatibilidade entre alguns de seus componentes;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b)
Descontinuidade na produção de quaisquer um dos itens relacionados as
equipamento:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c)
Dificuldade na aquisição destes produtos no mercado.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.4 -
		O Contratante esta ciente e de acordo, de que no caso de alteração, conforme previsto no item 1.3, passará a vigorar como Objeto do presente Contrato, os itens conforme relacionados no documento fiscal emitido pela contratada, com o respectivo aceite por parte do contratante.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.5 - As partes contratantes ajustam entre si, que em nenhuma circunstância será exigida a troca de todos os produtos objetos do presente instrumento, quando constatado o defeito em um dos itens adquiridos; exceto na hipótese do item defeituoso vir a danificar todo o conjunto, tendo em vista que os acessórios adquiridos possuem fabricantes distintos, e que respondem isoladamente pelos defeitos de fabricação de seus produtos.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.6 - Na eventualidade de ocorrer ação judicial por hipotética infração ao Código de Defesa do Consumidor, assume o Contratante a responsabilidade de acionar conjuntamente à Contratada o fabricante do produto supostamente defeituoso, conforme estabelece o artigo 12, observado o artigo 13 do CDC.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.7 - O Contratante declara que por ocasião da assinatura do presente instrumento foi colocado a sua disposição uma cópia do Código de Defesa do Consumidor para efeito de consulta dos artigos citados neste instrumento.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.8 - Ao adquirir um computador da contratada e assinar o presente instrumento, declara o contratante, estar ciente de que teclado, mouse e caixa de som, serão entregues de acordo com os modelos disponíveis em estoque, preservando-se suas características técnicas, não estando vinculada a compra dos computadores Ipasoft aos modelos expostos em Show Room em virtude de eventualmente estarem desatualizados.<br>
</font><FONT SIZE=1 face='Verdana' class = 'textoleg'>
<b>CLÁUSULA SEGUNDA: DO VALOR E FORMA DE PAGAMENTO<br>
</b></font><FONT SIZE=1 face='Verdana' class = 'textoleg'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.1- O valor total deste contrato é de <b>R$ $vppf</B>.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.2-
		O comprador se compromete a pagar o objeto deste contrato no prazo e condiçoes descritas abaixo :
&nbsp;</FONT>
      <div align='center'>
        <center>
        <table border='0' cellpadding='0' cellspacing='0'
style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber3'>
          <tr>
            <td width='100%'><font size='1' face='Verdana'>
			 <div align='center'>
    <center>
    <table border='0' width='100%' cellspacing='1' cellpadding='0'>
      <tr bgcolor='#D4D4D4'>
		<td width='65%'><font size='1' face='Verdana' color='#000000' class = 'textoleg'><b>TIPO</b></font></td>
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

			if ($tipo == "02.30" or $tipo == "02.31" or $tipo == "02.33" or $tipo == "02.34" or $tipo == "02.35" or $tipo == "02.36"){
				$datavencf = "DATA OPERADORA";
			}

echo("

	<tr bgcolor='#F7F7F7'>
		<td width='65%'><font size='1' face='Verdana' class = 'textoleg' ><b>$descricao</b></font></td>
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
");

			// VERIFICA PRESENCA DE CONJUNTO
			$prod->listProdSum("COUNT(*)", "pedidoprod", "codped = $codped and tipoprod = 'CJ'" , $array12, $array_campo12, "" );
			$prod->mostraProd( $array12, $array_campo12, 0 );
			$control_prod = $prod->showcampo0();

			$prod->listProdMY("DATE_FORMAT('$dataped' + INTERVAL 3 DAY, '%Y-%m-%d')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$datafinal = $prod->showcampo0();

			// VERIFICA CONSITENCIA DE DATAS
			$prod->listProdSum("COUNT(*)", "pedidoparcelas", "codped = $codped and (datavenc >= '$datafinal')" , $array12, $array_campo12, "" );
			$prod->mostraProd( $array12, $array_campo12, 0 );
			$promo = $prod->showcampo0();


if ($promo == 0 and $control_prod <> 0){
echo("
<!--
<br>
<FONT SIZE=1 face='Verdana' class = 'textoleg'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.3- Nos produtos descritos na cláusula primeira deste contrato já está incluso o bônus, conforme publicidade veiculada no período de 10/09/2004 a 19/09/2004, sendo o valor deste dado em forma de desconto distribuido proporcionalmente entre os demais produtos.</FONT>-->
");
}

	
			// VERIFICA SE O PEDIDO CARTAO VISA 
		$prod->listProdU("COUNT(*)", "pedidoparcelas", " (tipo ='02.35' or tipo = '02.36') and codped=$codped ");
		$cartao = $prod->showcampo0();

if ($cartao > 0){
echo("

<br>
<FONT SIZE=1 face='Verdana' class = 'textoleg'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2.1 – O CONTRATANTE no ato da assinatura deste instrumento, reconhece a compra junto a CONTRATADA, dos produtos descritos no item 1.1,  utilizando como forma de pagamento do seu pedido o cartão de credito conforme AUTORIZAÇÃO DE DÉBITO em anexo, que passará a fazer parte integrante do presente contrato, devendo ser debitado do cartão de crédito a importância descrita na clausula 2.1, e na forma prevista pela clausula 2.2.<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.2 – A CONTRATADA esta devidamente autorizada a debitar o valor acima mencionado, pelo sistema de assinatura em arquivo (venda não presencial), devidamente licenciado pela operadora do cartão de crédito constante da AUTORIZAÇÃO,<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.3 – O CONTRATANTE esta ciente de que a CONTRATADA não possui nenhuma responsabilidade sobre o uso indevido e não autorizado do cartão supra mencionado, ficando o titular do cartão responsável pelas penas previstas em lei sobre a eventual recusa por parte da operadora dos valores mencionados.<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.4 – Caso ocorra a recusa por parte da operadora dos valores aqui contratados, fica automaticamente rescindido o presente contrato, e na hipótese de já ter ocorrido a entrega dos bens descritos no item 1.1, responderá o CONTRANTE pelo pagamento ou devolução do bem, nos termos da clausula quarta deste mesmo instrumento.<br></FONT>
");
}
echo("

<br><FONT SIZE=1 face='Verdana' class = 'textoleg'>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.3-
		Caso a forma de pagamento escolhida pelo CONTRATANTE seja por intermédio de financiamento através de instituição financeira, o CONTRATANTE esta ciente de que toda documentação bem como os cheques utilizados como forma de pagamento serão encaminhados diretamente à instituição, logo após a assinatura do presente contrato;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.4-
		O CONTRATANTE tem o conhecimento de que deverá se dirigir diretamente ao agente financeiro de sua escolha, para tratar de questões referentes à rescisão,  atraso, bem como a antecipação no pagamento de suas parcelas, ou quaisquer outras relacionadas ao financiamento, sendo de exclusiva responsabilidade do órgão financiador a renegociação  do contrato de financiamento, isentando-se a CONTRATATADA de toda e qualquer responsabilidade referente à estas questões.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.5-
		Tendo o CONTRATANTE realizado o financiamento diretamente com a CONTRATADA por intermédio de cheques, desejando pagar antecipado, está ciente de que a CONTRATADA deverá ser comunicada com antecedência mínima de 15 (quinze) dias.<br>
<b>CLÁUSULA
TERCEIRA: DAS CONDIÇÕES GERAIS<br>
</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
3.1 - Havendo financiamento próprio pela Contratada, no caso de atraso de pagamento de qualquer parcela, pelo comprador, incidirá multa de 2%, acrescida de juros diários de 0,2 %, além dos encargos de cobrança e honorários advocatícios, sem prejuízo do disposto na cláusula 4.<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2
		-
A contratada poderá rescindir unilateralmente o presente contrato caso se
verifique inconsistência nas informações cadastrais fornecidas pelo
contratante, devolvendo ao contratante os valores aqui ajustados, não sendo
devido a qualquer das partes nenhuma multa ou indenização.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.3 -
     Faz parte integrante do presente contrato o <b>ANEXO I, </b>cujo teor é de
    inteiro conhecimento das partes contratantes, que se comprometem a seguir e
    cumprir&nbsp; todas as instruções e
demais disposições ali contidas.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.4 - A assinatura do presente Contrato, automaticamente substitui o contrato assinado com data anterior, caso exista.
<br>
");
if ($reserva == 1){
echo("
<strong>CL&Aacute;USULA QUARTA: DA RESERVA DE DOM&Iacute;NIO </strong><br>
4.1- Por for&ccedil;a do pacto de reserva de dom&iacute;nio, aqui expressamente institu&iacute;do e aceito pelas partes, fica reservada &agrave; vendedora a propriedade do(s) equipamento(s) objeto deste contrato, at&eacute; que sejam liquidadas todas as parcelas, conforme disposto na cl&aacute;usula 2.2. <br>
4.2- Conforme disp&otilde;e o item 2.1 da Cl&aacute;usula 2, caso n&atilde;o ocorra o pagamento de qualquer uma das parcelas, ficar&aacute; o comprador desde logo constitu&iacute;do de mora e obrigado sob as penas da lei, a restituir “incontinente” o(s) equipamento(s) condicionalmente adquiridos, restitui&ccedil;&atilde;o que se far&aacute; amigavelmente ou conforme o disposto nos art. 1070 e seguintes, do C&oacute;digo de Processo Civil, e com altera&ccedil;&otilde;es trazidas a partir da vig&ecirc;ncia da lei 10.406, de 10 de janeiro de 2002, em seus artigos 521 a 528 C&oacute;digo Civil Brasileiro. <br>
4.3- Ficar&aacute; facultado &agrave; vendedora, no caso de mora ou arrependimento do comprador, optar pela rescis&atilde;o deste contrato ou pela cobran&ccedil;a judicial dos t&iacute;tulos assinados. <br>
4.4- Este contrato n&atilde;o poder&aacute; ser objeto de cess&atilde;o, sujeitando as partes a cumpri-lo fielmente, por si ou por seus sucessores. <br>
4.5- O comprador responde pelos riscos da coisa, bem como pela sua deprecia&ccedil;&atilde;o. Havendo a retomada do objeto do contrato por inadimplemento do comprador, o vendedor poder&aacute; retomar a posse do bem, al&eacute;m de cobrar os encargos da mora e danos oriundos, podendo, inclusive, reter parcelas j&aacute; pagas para o referido reembolso. <br>
");
	$prod->listProdgeral("relacaocli", "codcliente_pri = $codcliente", $array4, $array_campo4, "" );

	if (count($array4) <> 0 ){
echo("
<strong>CLAUSULA QUINTA: DOS FIADORES <br>
</strong>5.1 – Ao final assina(m) como FIADOR(es) ou devedor(es) solid&aacute;rios, doravante designados simplesmente como FIADOR(es). <br>
5.2 – O(s) fiador(es) firmam o presente instrumento respondendo subsidi&aacute;ria e solidariamente ao contratante, por todas as obriga&ccedil;&otilde;es relativas ao presente instrumento, renunciando ao benef&iacute;cio de ordem previsto nos artigos 827 e 829 do C&oacute;digo Civil Brasileiro, na forma do artigo 828 do j&aacute; mencionado C&oacute;digo Civil Brasileiro, ciente(s) de que a fian&ccedil;a aqui prestada &eacute; concedida em car&aacute;ter irrevog&aacute;vel e irretrat&aacute;vel, pelo per&iacute;odo total que durar o contrato.
<br>
");
}
echo("
Fica eleito o foro da comarca de Juiz de Fora, com expressa ren&uacute;ncia de qualquer outro, por mais privilegiado que seja, para dirimir quaisquer d&uacute;vidas oriundas deste contrato. <br>
E, por se acharem justas e contratadas, as partes assinam o presente, diante das testemunhas abaixo, em duas vias de igual teor e forma, para que se produzam os devidos efeitos legais.
<p>
  </font>
	");
}
echo("
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber5'>
  <tr>
    <td width='25%'>
    <P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
____________________________________<br>
                                               Comprador</font></P>
    </td>
    <td width='25'>&nbsp;</td>
    <td width='25%'>
<P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
____________________________________<br>
Vendedora</font></P>
    </td>
  </tr>
  <tr>
    <td width='25%'>
<P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
___________________________________<br>
                                              Testemunha 1</font></P>
    </td>
    <td width='25'>&nbsp;</td>
    <td width='25%'>
<P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
___________________________________<br>
                                              Testemunha 2</font></P>
    </td>
  </tr>
");
	$prod->clear();
	$prod->listProdgeral("relacaocli", "codcliente_pri = $codcliente", $array4, $array_campo4, "" );

	if (count($array4) <> 0 ){

	 for($i = 0; $i < count($array4); $i++ ){

			$prod->mostraProd( $array4, $array_campo4, $i );

			$codrelcli = $prod->showcampo0();
			$codcliente_sec = $prod->showcampo2();


			// MOSTRA DADOS DO VENDEDOR - INICIO
		$prod->clear();
	$prod->listProdU("nome, tipocliente, cpf, cnpj, rg, rgemissor, endereco, bairro, cidade, cep, estado ,dddtel1 , tel1, cj_nome, cj_cpf", "clientenovo", "codcliente=$codcliente_sec");

			$vxxnome=			$prod->showcampo0();
			$vxxtipocliente=	$prod->showcampo1();
			if ($vxxtipocliente == "F"){
				$vxxdoc=			$prod->showcampo2(); // CPF
			}else{
				$vxxdoc=			$prod->showcampo3(); // CNPJ
			}
			$vxxrg=			$prod->showcampo4();
			$vxxrgemissor=	$prod->showcampo5();
			$vxxendereco=	$prod->showcampo6();
			$vxxbairro=		$prod->showcampo7();
			$vxxcidade=		$prod->showcampo8();
			$vxxcep=			$prod->showcampo9();
			$vxxestado=		$prod->showcampo10();
			$vxxcj_nome=		$prod->showcampo13();
			$vxxcj_cpf=		$prod->showcampo14();
echo("
   <tr>
    <td width='25%'>
<P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
___________________________________<br>
                                              <b>FIADOR</b><br>$vxxnome/$vxxdoc<br>$vxxendereco - $vxxbairro - $vxxcidade - $vxxestado - $vxxcep</font></P>
    </td>
	   <td width='25'>&nbsp;</td>
");
  if ($vxxcj_nome <> ""){
	echo("
    <td width='25%'>
<P STYLE='margin-bottom: 0cm' align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
___________________________________<br>
                                              <b>FIADOR</b><br>$vxxcj_nome/$vxxcj_cpf<br>$vxxendereco - $vxxbairro - $vxxcidade - $vxxestado - $vxxcep</font></P>
    </td>
		");
  }
  echo("
  </tr>
");

	 }//FOR

	}
echo("
</table>
<table border='0' width='100%' cellspacing='0'>
  <tr>
    <td width='100%'>
      <p align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
$vxcidade, $dia de $mes de $ano<br>$h:$m:$s
      </font></td>
  </tr>
</table>




      </td>
    </tr>
  </table>
  </center>
</div>

</BODY>
</HTML>");

?>
