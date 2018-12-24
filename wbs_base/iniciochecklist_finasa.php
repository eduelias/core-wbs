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

		


$title = "CHECK LIST FINASA";

//include("sif-topolimpo.php");

#echo "aqui=$tipo_finasa_cel - codped = $codped";

if ($tipo_finasa_cel <> 1){
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
          document.getElementById('print_finasa').value = 1;
    }
    document.getElementById('print').style.visibility = '';
 }

</script>
</head>
<body bgcolor='#FFFFFF' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' >

<center><input type='button' style='visibility: ; width: 300px; height: 25px' id='print' value='IMPRIMIR CHECK-LIST FINASA' onclick='printPage()'>
</center>
<input id = "print_finasa" name="print_finasa" value="0" type="hidden" >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="textb"><p class="textb"><strong>V<br />
      E<br />
      N<br />
      D<br />
    E<br />
    D<br />
    O<br />
    R</strong></p>      </td>
    <td align="center" class="textb"><span >C<br />
    A<br />
      I<br />
      X<br />
      A</span></td>
    <td colspan="3"><table width="100%" border="0">
      <tr>
        <td colspan="2" align="center" class="titulo">Check-List para Confer&Ecirc;Ncia de Financiamento Finasa </td>
       <td align="center" class="titulo"></td>
      </tr>
      <tr>
        <td width="52%"><strong><span class="style10">NOME : </span><span class="text"><? echo $xnome; ?></span> </strong></td>
        <td width="33%"><strong><span class="style10">CPF/CNPJ : </span><span class="text"><? echo $xdoc; ?></span></strong></td>
        <td width="15%"><strong><span class="style10">VENDEDOR : </span><span class="text"> <? echo $nome_vend ?></span> </strong></td>
      </tr>
      <tr>
        <td colspan="3" >&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" >&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Conferi que o nome e o CPF/CNPJ do Cliente &eacute;  mesmo do pedido do WBS.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Conferi o tempo de abertura da conta com o  cheque do cliente.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O vendedor assinou a(s) ficha(s) do Finasa no  campo <u>ASSINATURA DO LOJISTA</u> (por extenso).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O  vendedor preencheu o campo <u>LOCAL E DATA</u> na(s) ficha(s) do Finasa. </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb"><img src="images/tborange2.gif" width="560" height="7" /></td>
  </tr>
  <tr>
    <td width="3%" align="center">&nbsp;</td>
    <td width="3%" align="center">&nbsp;</td>
    <td colspan="3" class="textb"><strong>Verifiquei  se havia entrada no financiamento (campo <u>PRAZO</u> da ficha) :</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="3%" class="textesp">&nbsp;</td>
    <td colspan="2" class="textb" >Tem entrada :</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td width="3%" class="textesp" >&nbsp;</td>
    <td class="text" >A forma de pagamento do WBS possui <em>entrada separada da parte financiada</em>.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Calculei a parte financiada para o WBS  subtraindo o campo <u>TAC</u> do campo <u>VALOR FINANCIADO</u>. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td colspan="2" class="textb" >N&atilde;o tem entrada :</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="text" >Calculei a parte financiada para o WBS  subtraindo o campo <u>TAC</u> do campo <u>VALOR FINANCIADO</u>. </td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="638" height="7" /></span></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb" >Marque as op&ccedil;&otilde;es abaixo de acordo com o tipo de cliente: </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td colspan="2" class="textb"><strong>Pessoa  f&iacute;sica cheque :</strong></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td rowspan="19"><span ><img src="images/tborangea6.gif" width="6" height="290" class="style13" /></span></td>
    <td align="center" class="textesp"><span ><img src="images/pag_pro.gif" width="17" height="17" /></span></td>
    <td class="text"><span class="textb" >N&atilde;o tem avalista:</span></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O cliente assinou na sua ficha no campo <u>FINANCIADO</u>.</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center" class="textesp"><span ><img src="images/pag_pro.gif" width="17" height="17" /></span></td>
    <td class="text"><span class="textb" >Tem avalista:</span></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O cliente assinou na sua ficha e na  do avalista no campo <u>FINANCIADO</u>.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O avalista assinou na ficha do Cliente  e na sua ficha no campo <u>DEVEDOR SOLID&Aacute;RIO</u>.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><span class="textb"><img src="images/tborange2.gif" width="628" height="6" /></span></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="textb">Pessoa  jur&iacute;dica cheque ou carn&ecirc; :</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O respons&aacute;vel pela PJ assinou a ficha do Cliente no  campo <u>FINANCIADO</u> e no campo <u>DEVEDOR SOLID&Aacute;RIO</u>.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O respons&aacute;vel pela PJ assinou a NOTA PROMISS&Oacute;RIA  no campo <u>FINANCIADO</u> e no campo <u>INTERVENIENTE AVALISTA</u>.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><span class="textb"><img src="images/tborange2.gif" width="628" height="7" /></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="textb" > Pessoa  f&iacute;sica carn&ecirc; :</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center" class="textesp"><span ><img src="images/pag_pro.gif" width="17" height="17" /></span></td>
    <td class="text"><span class="textb" >N&atilde;o tem avalista:</span></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O Cliente assinou a ficha no campo <u>FINANCIADO</u></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;O Cliente  a NOTA PROMISS&Oacute;RIA no campo <u>FINANCIADO</u> .</td>
  </tr>
  <tr>
    <td align="center" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" class="textesp"><span ><img src="images/pag_pro.gif" width="17" height="17" /></span></td>
    <td class="text"><span class="textb" >Tem avalista:</span></td>
  </tr>
  <tr>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O cliente assinou na sua ficha e na do avalista no  campo <u>FINANCIADO</u>.</td>
  </tr>
  <tr>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O avalista assinou na ficha do Cliente  e na sua ficha no campo <u>DEVEDOR SOLID&Aacute;RIO.</u></td>
  </tr>
  <tr>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text"><p><strong>O Cliente  assinou a NOTA PROMISS&Oacute;RIA no campo <u>FINANCIADO</u> .</strong></p></td>
  </tr>
  <tr>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center" class="textesp"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O Avalista assinou a NOTA PROMISS&Oacute;RIA no campo <u>INTERVENIENTE  AVALISTA</u></td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="645" height="6" /></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="textb"><strong>Conferi  os cheques emitidos pelo Cliente :</strong></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Todos os cheques est&atilde;o com assinatura conferindo  com o documento de identidade.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Todos os cheques est&atilde;o com o mesmo  valor do campo <u>VALOR DA PRESTA&Ccedil;&Atilde;O</u>.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Conferi todos os extensos dos  cheques (dever&atilde;o incluir os centavos).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Nenhum  cheque possui rasura (n&atilde;o &eacute; permitido retifica&ccedil;&atilde;o no verso) .</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;As datas de vencimento dos cheques dever&atilde;o  iniciar com campo <u>1&ordm; VENCIMENTO</u> e terminar com o campo <u>&Uacute;LTIMO  VENCIMENTO</u>.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >chequei a quantidade de cheques com o campo <u>PRAZO</u>.</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb"><img src="images/tborange2.gif" width="577" height="8" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="textb"><strong>Os  itens abaixo est&atilde;o devidamente conferidos conforme procedimento acima :</strong></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Ficha do Cliente.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Ficha do avalista.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;&nbsp;____&nbsp; Cheques  (preencher a quantidade de cheques).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;&nbsp;Contrato social e &uacute;ltima altera&ccedil;&atilde;o  contratual (no caso de Pessoa Jur&iacute;dica).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Contrato Ipasoft de compra e venda (assinado  pelo Cliente em todas as vias)</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Contrato Ipasoft de Garantia  (assinado pelo Cliente em todas as vias).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;&nbsp;Afirmo que as fichas do Cliente e do Avalista  est&atilde;o com prazo inferior &agrave; 10 dia da emiss&atilde;o das mesmas (campo <u>DATA DO  CONTRATO</u>).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;&nbsp;Aten&ccedil;&atilde;o  : se faltar algum dos itens acima o processo ir&aacute; aguardar at&eacute; que esteja  completo</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td >&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center"><table width="100%" border="0">
      <tr>
        <td align="center" class="textb" >_______________________________<br />
           <? echo $nome_vend ?> </td>
        <td align="center" class="textb" >_______________________________<br />
CAIXA </td>
      </tr>
    </table></td>
  </tr>
</table>
<blockquote>&nbsp;</blockquote>
</body>
</html>

<?
}else{

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
          document.getElementById('print_finasa').value = 1;
    }
    document.getElementById('print').style.visibility = '';
 }

</script>
</head>
<body bgcolor='#FFFFFF' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' >

<center><input type='button' style='visibility: ; width: 300px; height: 25px' id='print' value='IMPRIMIR CHECK-LIST FINASA' onclick='printPage()'>
</center>
<input id = "print_finasa" name="print_finasa" value="0" type="hidden" >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="textb"><p class="textb"><strong>V<br />
      E<br />
      N<br />
      D<br />
    E<br />
    D<br />
    O<br />
    R</strong></p>      </td>
    <td align="center" class="textb"><span >C<br />
    A<br />
      I<br />
      X<br />
      A</span></td>
    <td colspan="3"><table width="100%" border="0">
      <tr>
        <td colspan="2" align="center" class="titulo">Check-List para Confer&Ecirc;Ncia de Financiamento Finasa </td>
       <td align="center" class="titulo"></td>
      </tr>
      <tr>
        <td width="52%"><strong><span class="style10">NOME : </span><span class="text"><? echo $xnome; ?></span> </strong></td>
        <td width="33%"><strong><span class="style10">CPF/CNPJ : </span><span class="text"><? echo $xdoc; ?></span></strong></td>
        <td width="15%"><strong><span class="style10">VENDEDOR : </span><span class="text"> <? echo $nome_vend ?></span> </strong></td>
      </tr>
      <tr>
        <td colspan="3" >&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" >&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Conferi que o nome e o CPF/CNPJ do Cliente &eacute;  mesmo do pedido do WBS.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Conferi o tempo de abertura da conta com o  cheque do cliente e digitei corretamente na tela do FINASA </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb"><img src="images/tborange2.gif" width="560" height="7" /></td>
  </tr>
  <tr>
    <td width="3%" align="center">&nbsp;</td>
    <td width="3%" align="center">&nbsp;</td>
    <td colspan="3" class="textb"><strong>Verifiquei  se havia entrada no financiamento (campo <u>PRAZO</u> da ficha) :</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="3%" class="textesp">&nbsp;</td>
    <td colspan="2" class="textb" >Tem entrada :</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td width="3%" class="textesp" >&nbsp;</td>
    <td class="text" >A forma de pagamento do WBS possui <em>entrada separada da parte financiada</em>.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Calculei a parte financiada para o WBS  subtraindo o campo <u>TAC</u> do campo <u>VALOR EMPRESTIMO </u>. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td colspan="2" class="textb" >N&atilde;o tem entrada :</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp">&nbsp;</td>
    <td class="textesp">&nbsp;</td>
    <td class="text" >Calculei a parte financiada para o WBS  subtraindo o campo <u>TAC</u> do campo <u>VALOR EMPRESTIMO </u>. </td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="638" height="7" /></span></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb" >Verifique se a ficha foi aprovada com avalista: </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td rowspan="5" class="textesp"><img src="images/tborangea6.gif" width="6" height="96" class="style13" /></td>
    <td align="center" class="textesp"><span ><img src="images/pag_pro.gif" width="17" height="17" /></span></td>
    <td class="text"><span class="textb" >N&atilde;o tem avalista:</span></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O cliente assinou na sua ficha no campo <u>MUTU&Aacute;RIO</u></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center" class="textesp"><span ><img src="images/pag_pro.gif" width="17" height="17" /></span></td>
    <td class="text"><span class="textb" >Tem avalista:</span></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O cliente assinou na sua ficha  no campo <u>MUTU&Aacute;RIO</u></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >O avalista assinou na ficha do Cliente   no campo <u>AVALISTA</u></td>
  </tr>
  <tr>
    <td colspan="5"><span class="textb"><img src="images/tborange2.gif" width="645" height="6" /></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="textb"><strong>Conferi  os cheques emitidos pelo Cliente :</strong></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Todos os cheques est&atilde;o com assinatura conferindo  com o documento de identidade.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Conferi todos os cheques  com o CONTRATO DE MUTUO, verificando os campos banco, ag&ecirc;ncia, cheque, dt. vencto. e valor </td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >Conferi todos os extensos dos  cheques (dever&atilde;o incluir os centavos).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Nenhum  cheque possui rasura (n&atilde;o &eacute; permitido retifica&ccedil;&atilde;o no verso) .</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >chequei a quantidade de cheques no contrato de MUTUO ( se tiver entrada somar + 1 cheque) <u></u>.</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="3" class="textb"><img src="images/tborange2.gif" width="577" height="8" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="textb"><strong>Os  itens abaixo est&atilde;o devidamente conferidos conforme procedimento acima :</strong></td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;Ficha do Cliente.</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;&nbsp;____&nbsp; Cheques  (preencher a quantidade de cheques).</td>
  </tr>
  <tr>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td align="center"><img src="images/barbutton.gif" width="11" height="10" /></td>
    <td class="textesp" >&nbsp;</td>
    <td class="textesp" >&nbsp;</td>
    <td class="text" >&nbsp;&nbsp;Afirmo que as fichas do Cliente esta com prazo inferior &agrave; 10 dia da emiss&atilde;o da mesma (campo <u>DATA DO  CONTRATO</u>).</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td >&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center"><table width="100%" border="0">
      <tr>
        <td align="center" class="textb" >_______________________________<br />
           <? echo $nome_vend ?> </td>
        <td align="center" class="textb" >_______________________________<br />
CAIXA </td>
      </tr>
    </table></td>
  </tr>
</table>
<blockquote>&nbsp;</blockquote>
</body>
</html>

<? }?>