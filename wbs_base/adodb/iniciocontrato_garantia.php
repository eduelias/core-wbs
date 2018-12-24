<?

require("classprod.php" );


// INICIO DA CLASSE
$prod = new operacao();

 $hoje = getdate();
 $ano = $hoje[year];
 $mes = $hoje[mon];
 $dia = $hoje[mday];
 if (strlen($dia)==1){$dia = '0'.$dia;}
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
	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, tipo_vge", "pedido", "codped=$codped");
		
		$codemp = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		$codvend = $prod->showcampo2();
		$vpp = $prod->showcampo3();
		$vppf = number_format($vpp,2,',','.'); 
		$nf = $prod->showcampo4();
		$codbarra = $prod->showcampo5();
		$tipo_vge = $prod->showcampo6();

	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProdU("nome, tipocliente, cpf, cnpj, rg, rgemissor, endereco, bairro, cidade, cep, estado", "clientenovo", "codcliente=$codcliente");
				
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


		$prod->listProdU("razaosocial, endereco, bairro, cidade, estado, cep, tipo, cpf, cgc, tel1","empresa", "codemp=$codemp");

		$xxnome = $prod->showcampo0();
		#$xxnome = "IPASOFT TECNOLOGIA E INFORMÁTICA";
		$xxendereco = $prod->showcampo1();
		$xxbairro = $prod->showcampo2();
		$xxcidade = $prod->showcampo3();
		$xxestado = $prod->showcampo4();
		$xxcep = $prod->showcampo5();
		$xxtipo = $prod->showcampo6();
		$xxtel1 = $prod->showcampo7();
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
			$vxdddtel=		$prod->showcampo11();
			$vxtel=			$prod->showcampo12();

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
			$vxtel=			$xxtel1;

		}


$title = "CONTRATO DE COMPRA  E VENDA COM RESERVA DE DOMÍNIO";

include("sif-topolimpo.php");

echo("
<style type='text/css'>
<!--
.style1 {font-size: xx-small}
-->
</style>

<BODY>
<center>
&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'><br><br>
<div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='14%'><!--<img border='0' src='images/grupoipa.gif' width='114' height='48'>--><br>
      <b><font face='Verdana' size='4'></font></b></td>
    </center>
    <td width='74%'>
      <p align='center'><b><font size='3' face='Verdana' color='#000000'><B>ANEXO I&nbsp;<br>CONTRATO DE GARANTIA DE EQUIPAMENTOS DE INFORM&Aacute;TICA </B></font></b></td>
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

<FONT SIZE=1 face='Verdana' class = 'textoleg'><strong>CL&Aacute;USULA PRIMEIRA: DO OBJETO</strong><br>1.1 - O presente Contrato tem por objeto os equipamentos descritos no CONTRATO DE COMPRA E VENDA, firmado entre as partes. <br>
  <strong>CLAUSULA SEGUNDA: DO PAGAMENTO </strong><br>
2.1 - Nenhum pagamento ser&aacute; devido pela <strong>CONTRATANTE </strong> pela execu&ccedil;&atilde;o da garantia, desde que observadas as condi&ccedil;&otilde;es previstas neste contrato. <br>
<strong>CL&Aacute;USULA TERCEIRA: DAS OBRIGA&Ccedil;&Otilde;ES DA CONTRATADA <br>
</strong>3.1 - Os Equipamentos citados neste contrato ter&atilde;o garantia conforme descrito no item 1.1. <br>
3.2 - A obriga&ccedil;&atilde;o da Contratada, nos termos desta garantia, consiste na substitui&ccedil;&atilde;o gratuita, em empresas de Assist&ecirc;ncia T&eacute;cnica Autorizada por ela ou pelo fabricante, de pe&ccedil;as que sejam reconhecidas como defeituosas. <br>
3.3 - A empresa de Assist&ecirc;ncia T&eacute;cnica Autorizada se reserva no direito de cobrar taxa de deslocamento t&eacute;cnico, conforme tabela vigente, caso seja solicitado pelo cliente atendimento a domic&iacute;lio. <br>
3.4 - Junto a nota fiscal, ser&aacute; fornecido um impresso com a rela&ccedil;&atilde;o dos fabricantes dos produtos, bem como o endere&ccedil;o e telefone das empresas pertencentes &agrave; rede de Assist&ecirc;ncia T&eacute;cnica Autorizada, o que também poderá ser obtido junto ao serviço de atendimento ao consumidor, conforme dispõe a clausula 3.5.<br>
3.5 – As d&uacute;vidas referentes ao local para onde dever&aacute; ser encaminhado o equipamento em garantia, poder&atilde;o ser esclarecida pelo telefone (32) 2101-5940 Servi&ccedil;o de Atendimento ao Consumidor Ipasoft (SACI) dentro do hor&aacute;rio comercial , ou pelo site <a href='http://www.ipasoft.com.br'>www.ipasoft.com.br </a>&nbsp;<br>
<strong>CL&Aacute;USULA QUARTA: DAS OBRIGA&Ccedil;&Otilde;ES DO CONTRATANTE <br>
</strong>4.1 - O Contratante se obriga a encaminhar o equipamento para a assist&ecirc;ncia t&eacute;cnica autorizada junto com o documento fiscal (nota fiscal ou cupom fiscal), conforme rela&ccedil;&atilde;o de seus fabricantes. <br>
4.2 – Caso solicite o atendimento a domic&iacute;lio, o Contratante se compromete a pagar os encargos decorrentes deste atendimento. <br>
<strong>CL&Aacute;USULA QUINTA: DO CANCELAMENTO DA GARANTIA </strong><br>
5.1 - Ser&atilde;o motivos para cancelamento da garantia: <br>
	5.1.1 - Instala&ccedil;&otilde;es el&eacute;tricas com flutua&ccedil;&atilde;o superior &agrave; 5%. <br>5.1.2 - Rompimento de lacre de garantia ou qualquer etiqueta identificadora. <br>
5.1.3 - Conex&atilde;o de forma indevida a outros equipamentos. <br>
5.1.4 - Danos causados por agentes da natureza (Rel&acirc;mpagos, chuvas, descargas el&eacute;tricas na rede telef&ocirc;nica, etc). <br>
5.1.5 - Ambiente de utiliza&ccedil;&atilde;o agressivo (poeira, sol, temperatura elevada, etc), queda ou outros agentes externos que configurem mau uso. <br>
5.1.6 - Para maior seguran&ccedil;a entre as partes contratantes, os equipamentos fornecidos pela Contratada, s&atilde;o controlados pelo C&Oacute;DIGO DE BARRAS e possuem LACRE DE GARANTIA que asseguram o seu manuseio somente por t&eacute;cnicos credenciados, em hip&oacute;tese alguma o LACRE ou o C&Oacute;DIGO DE BARRAS poder&atilde;o ser removidos ou conter sinais de viola&ccedil;&atilde;o, sendo automaticamente cancelada a garantia do produto, cujo LACRE DE GARANTIA ou C&Oacute;DIGO DE BARRA estiverem adulterados (rasgados, riscados, rasurados ou removidos). <br>
5.1.7 - Produto que tiver o n&uacute;mero de s&eacute;rie adulterado. <br>
<strong>CL&Aacute;USULA SEXTA: DOS ITENS N&Atilde;O COBERTOS PELA GARANTIA </strong><br>
6.1 – As partes ajustam entre si, que o(s) equipamento(s) adquirido(s) n&atilde;o est&atilde;o amparados pela garantia nas seguintes condi&ccedil;&otilde;es: <br>6.1.1 - Problemas de software de qualquer natureza. <br>
6.1.2 - Danos causados por v&iacute;rus, spyware ou instalação incorreta de programas. <br>
6.1.3 - Danos causados por sujeira (mau contatos, teclas agarrando, travamento de carro impressor, desgastes de eixos e mancais, roletes de mouse, Ventiladores de fontes, sujeira de unidades de leitura magn&eacute;tica ou &oacute;ptica, etc).<br> 
6.1.4 - Danos causados por materiais de consumo (fitas, cartuchos, papel, etiquetas, disquetes e cds de m&aacute; qualidade). <br>
6.1.5 - Pe&ccedil;as de desgaste natural como cabe&ccedil;as de impressora, eixos, teclados, mouses, etc. <br>
6.1.6 - Baterias recarregáveis de equipamentos portáteis, uma vez que elas tendem a segurar cada vez menos a sua carga na medida em que são utilizadas. <br>
<strong>CL&Aacute;USULA S&Eacute;TIMA: DAS PE&Ccedil;AS E ACESS&Oacute;RIOS AVULSOS </strong><br>
7.1 - No ato de assinatura do presente contrato, o Contratante esta ciente de que foram colocadas &agrave; sua disposi&ccedil;&atilde;o 2 (duas) op&ccedil;&otilde;es para instala&ccedil;&atilde;o de pe&ccedil;as e acess&oacute;rios avulsos. <br>
A) Instala&ccedil;&atilde;o da pe&ccedil;a e/ou acess&oacute;rio avulso em Posto Credenciado pela IPASOFT TECNOLOGIA INFORM&Aacute;TICA LTDA., GRATUITAMENTE. Op&ccedil;&atilde;o, em que, caso seja constatada pela equipe t&eacute;cnica a incompatibilidade da pe&ccedil;a e/ou acess&oacute;rio adquirido com o equipamento do comprador, a Contratada se compromete a reembolsar ao Contratante o valor da pe&ccedil;a e/ou acess&oacute;rio adquirido. <br>
B) Instala&ccedil;&atilde;o da pe&ccedil;a e/ou acess&oacute;rio avulso pelo pr&oacute;prio comprador, por sua conta e risco. Nesta modalidade o comprador assume plena responsabilidade pela instala&ccedil;&atilde;o da pe&ccedil;a e/ou acess&oacute;rio adquirido, estando ciente de que a Contratada n&atilde;o se responsabiliza pela troca ou reembolso de quaisquer valores, mesmo sendo verificado incompatibilidade da pe&ccedil;a e/ou acess&oacute;rio com o equipamento do comprador. <br>
7.2 - Neste ato  o contratante opta pela opção ( B ) da cláusula 7.1. <br>
<strong>CLAUSULA OITAVA: DAS CONDI&Ccedil;&Otilde;ES GERAIS <br>
</strong>8.1 - A Contratante está ciente que a garantia n&atilde;o cobre desembolsos referentes a deslocamento t&eacute;cnico, lucros cessantes e danos indiretos. <br>
8.2 - A Contratada n&atilde;o se responsabiliza pelos softwares (programas) instalados no microcomputador, salvo no caso de compra dos mesmos, devidamente discriminado na nota fiscal de compra. <br>
8.3 - A Contratada não se responsabiliza pela cópia (backup) ou integridade dos dados  armazenados no computador, estando o Contratante ciente de que deverá sempre manter cópias atualizadas de seus dados.<br>
<strong>CLAUSULA NONA: DO SOFTWARE PRÉ-INSTALADO<br>
</strong>9.1 - Adquirindo o Contratante junto a Contratada o sistema operacional
Windows, ou qualquer outro programa, conforme descritos no Contrato de Compra e
Venda e / ou na nota fiscal de compra, os equipamentos serão entregues com os
referidos softwares (programas) instalados. <br>
9.2 - Caso o Contratante não adquira os programas(softwares), conforme descrito
na clausula 9.1, estará ciente de que os equipamentos fornecidos pela
Contratada serão entregues com os seguintes programas pré-instalados:<br>
- Sistema operacional GNU com kernel LINUX (software livre);<br>
- OPenOffice distribuído por OPenOffice.org Organization (software livre); <br>
9.3 - Caso o Contratante opte pela instalação de programas diversos dos
descritos na clausula 9.1 e 9.2, estes serão de inteira responsabilidade do
Contratante que deverá fornecer as mídias e manuais para sua instalação.<br>
9.4 - A Contratada não se responsabiliza por falhas no funcionamento de
quaisquer software (programa), instalados nos equipamentos descritos na clausula
1.1 do Contrato de Compra e Venda. A falha no funcionamento destes softwares
são de inteira responsabilidade de seus fabricantes.
<br>
");
if ($tipo_vge > 0){
echo("
<strong>CLAUSULA DÉCIMA: DA EXTENSÃO DE GARANTIA<br>
</strong>10.1 - Fica contratada nste ato a extensão de garntia dos equipamentos/produtos adquiridos conforme descritos no item 1.1 do Contrato de Compra e Venda. <br>
10.2 - A extensão de garantia será fixada em meses na coluna GARANTIA ADICIONAL CONTRATADA, e será adcional a coluna GARANTIA DO PRODUTO, sendo o período total o que consta da coluna GARANTIA TOTAL.<br>
10.3 - A extensão da garantia não se aplica a todos os equipamentos/produtos adquiridos, mas apenas àqueles cujo número de meses consta da coluna GARANTIA ADICIONAL CONTRATADA.
");
}
echo("
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

<font face='Verdana' size='1' class = 'textoleg'><b>Postos 
Credenciados $empresa</b></font>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber6'>
  <tr>
    <td width='50%'><font face='Verdana' size='1' class = 'textoleg'>$vxnome<br>
      $vxendereco<br>
      $vxcidade - $vxbairro - $vxestado<br>
(32)21015900</font></td>
    <td width='50%'><!--<font face='Verdana' size='1' class = 'textoleg'>Nucleo Linux.<br>
    Av. Rio Branco, 2872/1706<br>
    Juiz de Fora - MG<br>
    (32) 32166821 - (32) 32168340</font>--></td>
  </tr>
</table>



      </td>
    </tr>
  </table>
  </center>
</div>

</BODY>
</HTML>

");

?>
