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
 if ($mes == 3){$mes = "Mar�o";}
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
		#$xxnome = "IPASOFT TECNOLOGIA E INFORM�TICA";
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


$title = "TERMO DE GARANTIA DO EQUIPAMENTO ON-SITE";

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
      <td width='14%'><br>
      <b><font face='Verdana' size='4'></font></b></td>
    </center>
    <td width='74%'>
      <p align='center'><b><font size='2' face='Verdana' color='#000000'><B>TERMO DE GARANTIA DO EQUIPAMENTO ON-SITE<br>

</B></font></b></td>
    <td width='14%'>
      <font face='Verdana' color='#000000' size='1'>CONTRATO No<b><br>
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

<P STYLE='margin-bottom: 0cm'><FONT SIZE=1 face='Verdana' class = 'textoleg'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por este TERMO as partes contratantes, j� qualificadas no contrato de compra e venda de n�mero $codbarra, entabularam entre si condi��es especiais de garantia denominada GARANTIA ON-SITE, mediante as seguintes condi��es:<br>
<b>CL�USULA PRIMEIRA: DA GARANTIA ON-SITE<br>
</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <FONT SIZE=1 face='Verdana' class = 'textoleg'>1.1 -
		A garantia ON-SITE consiste no atendimento personalizado da CONTRATADA ao CONTRATANTE diretamente em seu domic�lio, sem a necessidade de deslocamento do CONTRATANTE at� a assist�ncia t�cnica autorizada. No caso de problema, o t�cnico se desloca at� o local para a resolu��o e at� a substitui��o de algum perif�rico caso necess�rio.<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2 -
		O atendimento previsto neste termo abrange somente os equipamentos descritos no item 2.1 deste instrumento.<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3 -
		Os equipamentos aqui n�o relacionados, possuem garantia conforme descrito no ANEXO I ? CONTRATO DE GARANTIA DE EQUIPAMENTOS DE INFORM�TICA.<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.4 -
		O TERMO DE GARANTIA DO EQUIPAMENTO ON-SITE em hip�tese alguma abrange os servi�os de suporte telef�nico ou a domicilio, apenas ao reparo de pe�as com defeito de fabrica��o.<br>
<FONT SIZE=1 face='Verdana' class = 'textoleg'>
<b>CL�USULA SEGUNDA: DOS EQUIPAMENTOS AMPARADOS PELA GARANTIA ON-SITE<br>
</b></font><FONT SIZE=1 face='Verdana' class = 'textoleg'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.1- O CONTRATANTE escolheu livremente os equipamentos que ser�o atendidos pelas condi��es especiais da GARANTIA ON-SITE, contra defeitos de fabrica��o, que neles venham apresentar, durante o per�odo descrito no CONTRATO DE COMPRA E VENDA. a contar da data de emiss�o do documento fiscal, conforme abaixo relacionados:<br>
</FONT>
      <div align='center'>
        <center>
<table width='100%'  border='0' cellspacing='0' cellpadding='2'>
  <tr class='style11'>
    <td colspan='2'>DESCRI&Ccedil;&Atilde;O DETALHADA </td>
    <td align='center'>QTDE</td>
    <td align='center'>PRAZO DA<BR>GARANTIA ONSITE<BR>(m�s) </td>
 
   
  </tr>");


	 $prod->listProdSum("pedidoprod.codprod, nomeprod, qtde, gos_12, gos_24", "pedidoprod, produtos", "codped = '$codped' and pedidoprod.codprod = produtos.codprod and tipoprod = 'UM'", $array1, $array_campo1, "ORDER BY tipoprod, tipocj");


for ($j = 0; $j < count($array1); $j++)
			{
				$prod->mostraProd($array1, $array_campo1, $j);
				$codprod_os = $prod->showcampo0();
				$nomeprod_os = $prod->showcampo1();
				$qtde = $prod->showcampo2();
				$gos_12 = $prod->showcampo3();
				$gos_24 = $prod->showcampo4();
				
							
				if ($gos_12 == 'OK' or $gos_24 == 'OK'){
			if ($gos_12 == 'OK'){$gos = 12;}
			if ($gos_24 == 'OK'){$gos = 24;}

echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td>$nomeprod_os</td>
    <td align='center'><strong>$qtde</strong></td>
    <td align='center'>$gos</td>
   
  </tr>
");

			}
	}
	echo("
 
    ");
	
	$prod->listProdSum("codprodcj , tipocj, SUM(qtde), gos_12, gos_24", "pedidoprod, produtos", "codped = '$codped' and tipocj <> 0 and pedidoprod.codprod=produtos.codprod ", $array1, $array_campo1, "GROUP BY tipocj ORDER BY tipoprod, tipocj");

	 // PRODUTOS UNITARIO
	 for ($j = 0; $j < count($array1); $j++)
			{
				$prod->mostraProd($array1, $array_campo1, $j);
				$codprodcj_os = $prod->showcampo0();
				$tipocj_os = $prod->showcampo1();
				$qtde = 1;
				$goscj_12 = $prod->showcampo3();
				$goscj_24 = $prod->showcampo4();
				
				$prod->clear();
				$prod->listProdU("nomeprod", "produtos", "codprod = '$codprodcj_os'");
				$nomeprod_os = $prod->showcampo0();
				
					if ($goscj_12 == 'OK' or $goscj_24 == 'OK'){
			if ($goscj_12 == 'OK'){$gos = 12;}
			if ($goscj_24 == 'OK'){$gos = 24;}

            echo("
  <tr class='style12'>
    <td>&nbsp;</td>
    <td>$nomeprod_os</td>
    <td align='center'><strong>$qtde</strong></td>
    <td align='center'>$gos</td>
   
  </tr>
            ");

		}
	 }



	echo("
		</table>

			</FONT></td>
          </tr>
        </table>
        </center>
</div>
<P STYLE='margin-bottom: 0cm'><font size='1' face='Verdana' class='textoleg'>&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.2-
		Apenas os produtos relacionados no item 2.1, e livremente escolhidos pelo CONTRATANTE, � que ser�o atendidos em car�ter especial, por for�a do termo de GARANTIA ON-SITE, firmado pelas partes.<br>
</font>
<FONT SIZE=1 face='Verdana' class = 'textoleg'>
<b>CL�USULA
TERCEIRA: DAS CONDI��ES DE ATENDIMENTO<br>
</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
3.1 - Durante a vig�ncia deste termo, profissionais autorizados pela CONTRATADA far�o a substitui��o sem �nus para o CONTRATANTE de todas as pe�as e componentes descritos no item 2.1, que apresentarem defeitos comprovados de fabrica��o, respeitando as demais condi��es j� descritas no ANEXO I ? CONTRATO DE GARANTIA DE EQUIPAMENTOS DE INFORM�TICA.<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2
		-
O atendimento ON-SITE, ser� feito diretamente no domicilio do CONTRATANTE, no endere�o indicado no CONTRATO DE COMPRA E VENDA.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.3 -
     Caso ocorra � mudan�a de endere�o do CONTRATANTE, esta dever� ser comunicado a CONTRATADA, que preservara as mesmas condi��es de atendimento estabelecidas no presente termo, desde que o novo domic�lio seja na mesma cidade. Sendo o domic�lio em outra cidade, a CONTRATADA automaticamente se desobriga a presta��o dos servi�os nas condi��es estabelecidas no presente termo.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.4 - Havendo a mudan�a de endere�o do CONTRATANTE para outra cidade, fica automaticamente rescindido o TERMO DE GARANTIA ON-SITE, que poder� ser renovado mediante novos termos e condi��es.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.5 - O hor�rio para atendimento da garantia ON-SITE � de segunda-feira a sexta-feira, das 9:00 as 17:00 horas, exceto feriados e finais de semana;<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.6 - A abertura de chamados para solu��o de defeitos comprovados de fabrica��o deve ser feita atrav�s do telefone (32) 3216-6821, neste momento, � imprescind�vel ter em m�os o n�mero do CONTRATO DE COMPRA E VENDA que se encontra na primeira p�gina no canto superior direito.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.7 - Em m�dia, o 1� (primeiro) atendimento a um chamado aberto ocorre dentro de dois dias �teis.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.8 - N�o existe prazo m�nimo pr�-determinado para resolu��o do problema.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.9 - A GARANTIA ON-SITE n�o exclui a eventual necessidade de remo��o do equipamento para laborat�rio, o que ser� feito sem custo ao CONTRATANTE, desde que o problema seja relacionado a defeito de fabrica��o e esteja amparado pela garantia.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.10 - A garantia ON-SITE se tornar� inv�lida se os problemas encontrados nos  equipamentos objetos deste termo decorrerem das situa��es previstas nas clausulas QUINTA e SEXTA do ANEXO I - CONTRATO DE GARANTIA DE EQUIPAMENTOS DE INFORM�TICA.<BR>
<strong>CL&Aacute;USULA QUARTA: DOS DOCUMENTOS INTEGRANTES AO TERMO</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1- Este termo s� produzir� seus efeitos quando acompanhado do CONTRATO DE COMPRA E VENDA e do ANEXO I - CONTRATO DE GARANTIA DE EQUIPAMENTOS DE INFORM�TICA ambos de n�mero $codbarra, e documento fiscal original, ou c�pia do mesmo. <br>
<strong>CLAUSULA QUINTA: DOS CHAMADOS POR DEFEITOS N�O AMPARADOS PELA GARANTIA <br>
</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.1 - Nos atendimentos t�cnicos onde se constate que o defeito apresentado n�o se enquadra naqueles amparados pela garantia, ser� cobrado pela CONTRATADA ao CONTRATANTE os valores correspondentes � execu��o dos servi�os.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2 - Para que sejam executados os servi�os n�o amparados pela GARANTIA ON-SITE, o mesmo dever� ser previamente aprovado pelo CONTRATANTE verbalmente ou por escrito, mediante a apresenta��o do or�amento.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.3 - O CONTRATANTE se compromete a pagar pela execu��o dos servi�os fora da garantia, logo ap�s a entrega do equipamento pela CONTRATADA.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.4 - Caso se constate a inadimpl�ncia do CONTRATANTE no tocante aos servi�os n�o amparados pela garantia, fica automaticamente rescindido o presente TERMO DE GARANTIA ON-SITE, se desobrigando a CONTRATADA a prestar quaisquer servi�os ao CONTRATANTE por for�a deste instrumento..
<br>
<strong>CLAUSULA SEXTA: DA VIG�NCIA <br>
</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.1 - O presente TERMO DE GARANTIA ON-SITE ter� vig�ncia conforme cl�usula 2.1 deste termo, a contar da data de sua assinatura.<br>
<strong>CLAUSULA S�TIMA: DO FORO<br>
</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.1 - 
Fica eleito o foro da comarca de Juiz de Fora, com expressa ren&uacute;ncia de qualquer outro, por mais privilegiado que seja, para dirimir quaisquer d&uacute;vidas oriundas deste contrato. <br>
E, por se acharem justas e contratadas, as partes assinam o presente, diante das testemunhas abaixo, em duas vias de igual teor e forma, para que se produzam os devidos efeitos legais.
<p>
  </font>

<table border='0' width='100%' cellspacing='0'>
  <tr>
    <td width='100%'>
      <p align='center'><font face='Verdana' size='1' class = 'textoleg'>
<br>
______________________________________________________
<br>
$vxcidade, $dia de $mes de $ano
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
