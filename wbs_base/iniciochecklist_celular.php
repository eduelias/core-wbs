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

 if ($reimp == 1){
 	
 	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, dataped, tipo_vge", "pedido", "codped=$codped");
 }else{
 	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, dataped, tipo_vge", "pedidotemp", "codped=$codped");
 }
 

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



		//DADOS DO USUARIO
	$prod->listProd("vendedor", "codvend='$codvend'");

		$nome_vend = $prod->showcampo1();
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

		


$title = "CHECK LIST CELULAR";

//include("sif-topolimpo.php");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.text {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
	font-style: normal;
}
.textb {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-style: normal;
	font-weight: bolder;
}
.titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-style: normal;
	font-weight: bold;
	text-transform: uppercase;
	color: #000000;
}
.textesp {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
}
.style6 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; font-style: normal; font-weight: bold; }
.style10 {font-size: 9px; font-style: normal; font-family: Arial, Helvetica, sans-serif;}
.style11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; }
.style12 {font-family: Arial, Helvetica, sans-serif; font-size: 8px; font-style: normal; font-weight: bold; }
.style13 {font-size: 12px; font-style: normal; font-family: Arial, Helvetica, sans-serif;}
-->
</style>
<script>
function printPage()
{
    document.getElementById('print').style.visibility = 'hidden';
	// Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
        document.getElementById('print_celular').value = 1;
       
    }
    document.getElementById('print').style.visibility = '';
    
   
 }

</script>
</head>
<body bgcolor='#FFFFFF' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' >
<center><input type='button' style='visibility: ; width: 300px; height: 25px' id='print' value='IMPRIMIR CHECK-LIST CELULAR' onclick='printPage()'>
</center>
<input id = "print_celular" name="print_celular" value="0" type="hidden" >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">&nbsp;</td>
    <td width="3%" align="center">&nbsp;</td>
    <td colspan="3"><table width="100%" border="0">
      <tr>
        <td colspan="2" align="center" class="titulo">PROCEDIMENTO DE CONFER&Ecirc;NCIA DA DOCUMENTA&Ccedil;&Atilde;O DE PLANOS </td>
         <td align="center" class="titulo"></td>
      </tr>
      <tr>
        <td width="52%"><strong><span class="style10">NOME : </span><span class="text"><? echo $xnome; ?></span> </strong></td>
        <td width="33%"><strong><span class="style10">CPF/CNPJ : </span><span class="text"><? echo $xdoc; ?></span></strong></td>
        <td width="15%"><strong><span class="style10">VENDEDOR : </span><span class="text"><? echo $nome_vend; ?></span> </strong></td>
      </tr>
      <tr>
        <td colspan="3" class="style6">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" class="style6">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb"><hr size="1" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td colspan="4"><p class="textb">Plano </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" class="textb"><span class="text">(&nbsp;&nbsp; ) Controle 40 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;  ) Controle 80 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Controle 120 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Controle 160  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; )Ideal 15 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;  )Ideal 30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Ideal 75 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; )  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ideal 150  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; ) Ideal 300 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; ) Ideal 600&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; ) Idea l900&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" class="textb">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="638" height="7" /></span></td>
  </tr>
  <tr>
    <td width="3%" align="center">&nbsp;</td>
    <td colspan="4"><p class="textb">Verificar se o cliente j&aacute; e ativo na telemig celular em planos p&oacute;s pago (ideal ou controle) </p></td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="638" height="7" /></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" class="textb">Cliente ativo:</td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td width="3%" class="textesp" >&nbsp;</td>
    <td width="3%" class="textesp">&nbsp;</td>
    <td ><p class="text">Anexei a este procedimento a c&oacute;pia do comprovante de  Identidade:<br />
    (&nbsp;&nbsp; ) RG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;  ) CNH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Cart. Trabalho&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Ident. Profissional</p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text">Anexei a este procedimento a copia do  comprovante de CPF:<br />
    (&nbsp;&nbsp; ) CPF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;  ) CNH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Ident. Profissional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) RG</td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="638" height="7" /></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" class="textb">Cliente novo :</td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="text"><span class="textb">Anexei a este procedimento a c&oacute;pia do comprovante de  Identidade:</span><br />
(&nbsp;&nbsp; ) RG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;  ) CNH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Cart. Trabalho&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Ident. Profissional</td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="text"><span class="textb">Anexei a este procedimento a copia do  comprovante de CPF:</span><br />
(&nbsp;&nbsp; ) CPF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;  ) CNH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Ident. Profissional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) RG</td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td colspan="2"><span class="textb">Comprovante de resid&ecirc;ncia: </span></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td ><p class="text"><span class="textb">Anexei a este procedimento a  seguinte c&oacute;pia do comprovante de resid&ecirc;ncia orginal (primeira via), com data de  emiss&atilde;o inferior &agrave; 90 dias e quitada: </span><br />
      (&nbsp;&nbsp; ) Conta de luz&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;&nbsp; ) Conta de &aacute;gua &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; ) Conta de telefone &nbsp;&nbsp;(&nbsp;&nbsp; ) Fatura de cart&atilde;o de cr&eacute;dito&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;(&nbsp;&nbsp; )  Boleto banc&aacute;rio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;(&nbsp;&nbsp; )  DUT do ano corrente e quitado</p>    </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td ><p class="text"><span class="textb">Conferi que a conta est&aacute; em nome do: </span><br />
      (&nbsp;&nbsp; ) Cliente  
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp; ) Pai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        (&nbsp;&nbsp; )  M&atilde;e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        (&nbsp;&nbsp; ) Av&oacute;s acompanhado  da certid&atilde;o de nascimento do cliente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    (&nbsp;&nbsp; ) Irm&atilde;os,  acompanhado da identidade do irm&atilde;o que comprove a filia&ccedil;&atilde;o&nbsp;&nbsp;&nbsp;&nbsp;    (&nbsp;&nbsp; ) <span class="text">Marido/Esposa com certid&atilde;o de casamento </span></p>      </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td ><span class="textb">Verifiquei que o comprovante &eacute;:</span><br />
        <span class="text">(&nbsp;&nbsp; ) do m&ecirc;s corrente  pago&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;&nbsp; ) do m&ecirc;s corrente  n&atilde;o vencido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;&nbsp; ) do m&ecirc;s anterior  pago</span> </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td ><span class="textb"><br />
    A data do comprovante &eacute;: ____ /____ / ____<br />
    </span></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td colspan="2"><span class="textb">Comprovante de renda para os planos controle  (todos) e Ideal 15, 30, 75 e 150:</span></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td ><p><span class="textb"> Anexei a este procedimento a seguinte c&oacute;pia do  comprovante de renda orginal (com renda m&iacute;nima de R$ 350,00):</span><span class="text"><br />
      (&nbsp;&nbsp; ) Carteira de  trabalho assinada&nbsp;&nbsp;&nbsp;<br />
  &nbsp;&nbsp;      <br />
      (&nbsp;&nbsp; ) Comprovante de  renda envelopado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
      <br />
      (&nbsp;&nbsp; ) Extrato banc&aacute;rio  comprovando recebimento do sal&aacute;rio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
      <br />
      (&nbsp;&nbsp; ) Fatura de cart&atilde;o  de cr&eacute;dito&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <br />
      <br />
      (&nbsp;&nbsp; ) C&oacute;pia do cart&atilde;o  de cr&eacute;dito ou d&eacute;bito + comprovante assinado de venda do aparelho emitido pela  maquina com data atual&nbsp;&nbsp; 
      <br />
      <br />
      (&nbsp;&nbsp; ) Duas contas  pagas de outra operadora (m&ecirc;s atual e anterior) <br />
      <br />
    </span><span class="text">
(&nbsp;&nbsp; ) Comprovante de benef&iacute;cio do inss + cartao de benef&iacute;cio </span></p>
    </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td colspan="2" class="textb">Comprovante de renda para os planos Ideal  300,600 e 900</td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td ><span class="textb">Anexei a este procedimento a seguinte c&oacute;pia do  comprovante de renda orginal (com renda m&iacute;nima de R$ 800,00):</span> <span class="text"><br />
    (&nbsp;&nbsp; ) Carteira de  trabalho assinada com valor igual ou superior ao acima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <br />
    <br />
    (&nbsp;&nbsp; ) Comprovante de  renda envelopado com valor igual ou superior ao acima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <br />
    <br />
    (&nbsp;&nbsp; ) Extrato banc&aacute;rio  comprovando recebimento do sal&aacute;rio com valor igual ou superior ao acima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <br />
    <br />
    (&nbsp;&nbsp; ) Duas contas  pagas de outra operadora (m&ecirc;s atual e anterior)<br />
    <br />
    (&nbsp;&nbsp; ) Comprovante de benef&iacute;cio do inss + cartao de benef&iacute;cio, com valor igual ou superior ao acima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="638" height="7" /></span></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td colspan="3" class="textb">Contratos e Regulamentos </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Anexei a folha  de rosto do contrato assinada conforme assinatura do documento de identidade</p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Anexei as  clausulas contratuais assinadas (todas as folhas) conforme assinatura do  documento de identidade</p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Anexei o  regulamento de promo&ccedil;&atilde;o em vigor assinada (todas as folhas) conforme assinatura  do documento de identidade</p>    </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Fotografei o  cliente com autoriza&ccedil;&atilde;o do mesmo</p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Conferi que todos as copias de documentos, referentes a esta habilit&ccedil;&atilde;o est&atilde;o legiveis.</p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td colspan="3" class="textb">Menu de Ofertas - Preenchimento obrigat&oacute;rio somente para planos controle 120 e 160 e ideal 75, 150, 300,, 600, 900 </td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Habilitei no sistema CRM Telemig Celular a promo&ccedil;&atilde;o Menu de Ofertas (Promo&ccedil;&atilde;o pre&ccedil;o na primeira habilita&ccedil;&atilde;o) na pagina de promo&ccedil;&atilde;o</p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" ><p class="textb">(&nbsp;&nbsp; ) Anexei regulamento do Menu de Oferta (Promo&ccedil;&atilde;o Pre&ccedil;o na Primeira Habilita&ccedil;&atilde;o) assinado conforme assinatura do documento de identidade </p></td>
  </tr>
  <tr>
    <td align="center" class="textesp">&nbsp;</td>
    <td align="center" class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="textb" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center" class="textesp"><table width="100%" border="0">
        <tr>
          <td align="center" class="textb" >_______________________________<br />
             <? echo $nome_vend ?> </td>
          <td align="center" class="textb" >_______________________________<br />
            GERENTE </td>
        </tr>
    </table></td>
  </tr>
</table>
<blockquote>&nbsp;</blockquote>
</body>
</html>


