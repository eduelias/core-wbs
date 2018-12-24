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

$key = "descobre essa!!";
function encrypt($key, $plain_text) {
  $plain_text = trim($plain_text);
  $iv = substr(md5($key), 0,mcrypt_get_iv_size (MCRYPT_CAST_256,MCRYPT_MODE_CFB));
  $c_t = mcrypt_cfb (MCRYPT_CAST_256, $key, $plain_text, MCRYPT_ENCRYPT, $iv);
  return base64_encode($c_t);
}

function decrypt($key, $c_t) {
  $c_t = base64_decode($c_t);
  $iv = substr(md5($key), 0,mcrypt_get_iv_size (MCRYPT_CAST_256,MCRYPT_MODE_CFB));
  $p_t = mcrypt_cfb (MCRYPT_CAST_256, $key, $c_t, MCRYPT_DECRYPT, $iv);
  return trim($p_t);
}

if ($visa == 1){$campo_crypt = "crypt_v";$opcaixa = '02.35';$opera = "VISA";$opera1 = "visa";}else{$campo_crypt = "crypt_m";$opcaixa = '02.36';$opera = "MASTERCARD";$opera1 = "mastercard";}


$prod->listProdU("$campo_crypt, codemp ", "pedido", " codped=$codped ");
	$crypt_v = $prod->showcampo0();
	$codemp_select = $prod->showcampo1();
	$crypt_v = decrypt($key,$crypt_v);

	
	$prod->listProdU("nome ", "empresa", " codemp=$codemp_select ");
	$nomeemp_select = $prod->showcampo0();

 	$crypt_v1 = explode(":", $crypt_v);
        $c1x =  $crypt_v1[0]; 
		$c2x =  $crypt_v1[1]; 
	    $c3x =  $crypt_v1[2]; 
	    $c4x =  $crypt_v1[3]; 
		$digitox =  $crypt_v1[4]; 
		$dt_mesx =  $crypt_v1[5];
		if (strlen($ean) < 2){$dt_mesx = "0".$dt_mesx;}
		$dt_anox =  $crypt_v1[6]; 
		$nomecarx =  $crypt_v1[7];
		$dddtelx =  $crypt_v1[8]; 
		$telx =  $crypt_v1[9]; 
		
		
		// VERIFICA SE O PEDIDO CARTAO VISA 
		$prod->listProdU("COUNT(*), SUM(vp), vp", "pedidoparcelas", " tipo ='$opcaixa' and codped=$codped GROUP by tipo ");
		$num_parc = $prod->showcampo0();
		$sum_parc = $prod->fpreco($prod->showcampo1());
		$v_parc = $prod->fpreco($prod->showcampo2());
		
		// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProdU("codcliente, codbarra", "pedido", "codped=$codped");

		$codbarra = $prod->showcampo1();
		$codcliente = $prod->showcampo0();
		
		
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



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: x-small;
}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
-->
</style>
</head>

<body>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td class="style1"><p align="center"><strong>Autorizaçao de Débito - Contrato <? echo $codbarra;?></strong></p>    </td>
  </tr>
</table>
<span class="style1"><br />
</span>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td align="center" class="style1"><p align="center"><strong>Autorizo e reconheço débito em minha conta do    cart&atilde;o de crédito abaixo:</strong></p></td>
  </tr>
</table>
<span class="style1"><br />
</span>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="210" rowspan="5" align="center" valign="middle" class="style1"><p><img src="images/<? echo $opera1;?>.jpg" width="146" height="91" /></p></td>
    <td width="254" class="style1"><p><strong>&nbsp;Cart&atilde;o Número: </strong></p></td>
    <td width="742" class="style1"> <? echo $c1x;?> <? echo $c2x;?> <? echo $c3x;?> <? echo $c4x;?></td>
  </tr>
  <tr>
    <td class="style1"><p><strong>&nbsp;Nome do Titular do    Cart&atilde;o: </strong></p></td>
    <td class="style1"><? echo $nomecarx;?></td>
  </tr>
  <tr>
    <td class="style1"><p><strong>&nbsp;Validade (mm/aa)</strong></p></td>
    <td class="style1"><? echo $dt_mesx;?>/<? echo $dt_anox;?></td>
  </tr>
  <tr>
    <td class="style1"><div class="style2">
      <p>&nbsp;Código de segurança</p>
    </div></td>
    <td class="style1"><? echo $digitox;?></td>
  </tr>
  <tr>
    <td class="style1"><div class="style3">
      <p>&nbsp;Telefone para contato: </p>
    </div></td>
    <td class="style1">(<b><? echo $dddtelx;?>) <? echo $telx;?></b></td>
  </tr>
</table>
<br />
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td valign="top" class="style1"><p align="center"><strong>Operadora</strong></p></td>
    <td valign="top" class="style1"><p align="center"><strong>Nr. Parcelas</strong></p></td>
    <td valign="top" class="style1"><p align="center"><strong>Valor da Parcela</strong></p></td>
    <td valign="top" class="style1"><p align="center"><strong>Total da Venda no    Cart&atilde;o</strong></p></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="style1"><p><? echo $opera;?></p></td>
    <td align="center" valign="middle" class="style1"><p><? echo $num_parc;?></p></td>
    <td align="center" valign="middle" class="style1"><p><? echo $v_parc;?></p></td>
    <td align="center" valign="middle" class="style1"><p><b><? echo $sum_parc;?></b></p></td>
  </tr>
</table>
<br />
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td align="center" class="style1"><p align="center"><strong>ATENÇ&Atilde;O</strong></p></td>
  </tr>
  <tr>
    <td class="style1"><p>Qualquer    transaçao realizada fora dos padroes contratuais das Administradoras    implicará em sançoes legais, tanto para o Estabelecimento e seus    intermediários, quanto para o Associado.<br />
      <br />
      Ao Autorizar o débito no cartao de crédito, Associado e Estabelecimento    declaram estar cientes e concordar com seguintes condiçoes:<br />
      1.    Questionamento ou Cancelamento dos serviços adquiridos devem ser resolvidos    entre as partes de acordo com as condiçoes gerais do contrato entre o    estabelecimento e cliente.<br />
      2.    O Estabelecimento e seus intermediários sao responsáveis pela correta    aceitaçao, conferindo na apresentaçao do cartao, sua validade, autenticidade    e assinatura do Titular do Cartao.<br />
      3.    Esta autorizaçao é válida por 15 dias e sua transmissao por fax é permitida    apenas para agilizar o processo de Venda. Em caso de contestaçao por parte do    Associado, o estabelecimento é responsável pela apresentaçao deste original,    cópia de documento oficial que comprove a assinatura do cliente e cópia do    contrato. Estes documentos podem ser solicitados a qualquer momento pelas administradoras. <br />
      4.    Caso os serviços sejam prestados em nome de outras pessoa que nao o titular    do cartao, seus nomes deverao ser listados abaixo, para maior segurança do    associado;<br />
      5.    Nao serao permitidos cartoes CORPORATE ou emitidos fora do Brasil.<br />
      6.    Os formulários de assinatura em arquivo devem ser apresentados de maneira    legível, isentos de qualquer rasura.<br />
      7.    O valor do pacote a ser cobrado em assinatura em arquivo, tem de ser igual ao    somatório das parcelas.<br />
    8.    Nao esquecer de conferir as assinaturas dos clientes se conferem com as do    cartao de credito e da carteira de identidade.<br />
    </p></td>
  </tr>
</table>
<br />
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td rowspan="3" valign="top" class="style1"><p>Obs.: A conferencia e a Assinatura do Cartao é    responsabilidade da Contratada<br />
      IMPORTANTE<br />
      Enviar anexo cópias dos seguintes documentos<br />
      - Documento de Identidade (Carteira de identidade ou    carteira de motorista)<br />
      - C.P.F<br />
    - Cartao de Credito frente e verso</p></td>
    <td width="307" valign="top" class="style1"><p>&nbsp;Contratante: </p>
      <p><? echo "<b>$xnome</B>, $xdoc , situado(a) a $xendereco,
$xcidade, $xynumero - $xycomplemento - $xbairro - $xestado";?></p>
      <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="307" class="style1"><p>&nbsp;Local e Data: <? echo"<b>Juiz de Fora, $dia de $mes de $ano</b>";?></p></td>
  </tr>
  <tr>
    <td width="307" class="style1"><p><br />
      ___________________________________<br />
      Assinatura do Titular do Cart&atilde;o<br />
    </p></td>
  </tr>
</table>
</body>
</html>
