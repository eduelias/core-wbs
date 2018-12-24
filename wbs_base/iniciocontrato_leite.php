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
	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, dataped", "pedido", "codped=$codped");
		
		$codemp = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		$codvend = $prod->showcampo2();
		$vpp = $prod->showcampo3();
		$vppf = number_format($vpp,2,',','.'); 
		$nf = $prod->showcampo4();
		$codbarra = $prod->showcampo5();
		$dataped = $prod->showcampo6();

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

	


$title = "CONTRATO DE COMPRA  E VENDA COM RESERVA DE DOMÍNIO";

include("sif-topolimpo.php");


echo("


<style type='text/css'>
<!--
.nomecliente {
	font-family: Verdana;
	font-size: 30px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
	line-height: 70px;
}
.corpo {
	font-family: Verdana;
	font-size: 18px;
	line-height: 50px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
.ass {
	font-family: Verdana;
	font-size: 14px;
	line-height: 20px;
	color: #000000;
	text-decoration: none;
}
-->
</style>
</head>

<body>
<table width='750' height='880'  border='0' align='center' cellpadding='3' cellspacing='0'>
  <tr>
    <td valign='top'><img src='images/logoipa.gif' width='211' height='65'></td>
  </tr>
  <tr>
    <td height='550' align='center'  class='corpo'> O Grupo Ipasoft est&aacute; doando em nome de:<br>
      <span class='nomecliente'>$xnome</span><br>
      10 litros de leite para o Centro de Apoio e Solidaried'aids.<br><img src='images/logocasa.gif' width='363' height='210'></td>
  </tr>
  <tr>
    <td align='center' valign='bottom' class='ass'>Juiz de Fora, $dia de $mes de $ano<br>
    <br>
    _____________________________<br>
    $xnome<br>$codbarra </td>
  </tr>
</table>

<center>
<br><br>&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'>
</BODY>
</HTML>

");

?>
