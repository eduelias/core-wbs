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


$title = "CONTRATO DE COMPRA  E VENDA COM RESERVA DE DOMÍNIO";

include("sif-topolimpo.php");

echo("
<style type='text/css'>
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<body>
<center>
&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'><br><br>
<div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='14%'><br>
      <b><font face='Verdana' size='4'></font></b></td>
    </center>
    <td width='74%'>
      <p align='center'><b><font size='2' face='Verdana' color='#000000'><B>DECLARA&Ccedil;&Atilde;O</B></font></b></td>
    <td width='14%'>
      <font face='Verdana' color='#000000' size='1'></font></td>
  </tr>
  </table>
</div>


<div align='center'>
  <center>
  <table border='0' cellpadding='0' cellspacing='0' bordercolor='#111111'
width='100%'>
    <tr>
      <td><span class='style1'><BR><BR>Eu, <b>$xnome</b>, residente à $xendereco,
$xcidade, $xynumero - $xycomplemento - $xbairro - $xestado, CPF número $xdoc, documento de identidade número $xrg, declaro para os fins que se fizerem necessários que:<BR><BR>
1. Ao adquirir o microcomputador da empresa<b> NET EXPRESS LTDA.</b>, recebi orientação clara e segura quanto à questão do que é software (programa) pirata e as sanções penais aplicadas ao seu uso, tais como pagamento de multa de até 3 mil vezes o valor de cada cópia irregular encontrada pela Justiça; conforme dispõe a Lei do Software (9.609/98) e a Lei do Direito Autoral (9.610/98) que prevêem ainda pena de até dois anos de detenção para quem piratear programas no País, além do que, o software ilegal, não possibilita a atualização de versões pela internet ficando sujeito a erros e travamento do seu equipamento. <BR><BR>
2. Nesta oportunidade, declaro que, me foi oferecido a preço de mercado o software Windows (marca pertencente a Microsoft Co.) original e seus aplicativos, contudo, declaro, não ter interesse em adquirir o original destes softwares (programas) junto a esta empresa, razão pela qual, solicitei neste ato, que o equipamento objeto do contrato de compra e venda, me fosse entregue sem a instalação deste e de quaisquer outros programas e ou aplicativos.<BR><BR>
3. Isento totalmente a empresa descrita no item 1, e seu representante comercial de qualquer responsabilidade referente aos programas, que posteriormente venham a ser instalados por mim ou a meu pedido, e estou ciente de que a mesma não se responsabiliza pelo suporte e funcionamento destes programas; e nem por problemas causados por vírus ou spyware, sendo a garantia relacionada apenas ao hardware (computador e acessórios) adquiridos junto à empresa, conforme descrito na nota fiscal e não a softwares (programas).<BR><BR>
        Por ser verdade, firmo a presente declara&ccedil;&atilde;o.</span>
        <table border='0' width='100%' cellspacing='0'>
  <tr>
    <td width='100%'>
      <p align='center'>
      <BR>
      $vxcidade,  $mes de $ano<br>
<br>
______________________________________________________
<br>

<b>$xnome</b><br>
$xdoc

      </td>
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
