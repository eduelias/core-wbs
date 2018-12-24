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
	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra", "pedido", "codped=$codped");
		
		$codemp = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		$codvend = $prod->showcampo2();
		$vpp = $prod->showcampo3();
		$vppf = number_format($vpp,2,',','.'); 
		$nf = $prod->showcampo4();
		$codbarra = $prod->showcampo5();

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


		$prod->listProdU("nome, endereco, bairro, cidade, estado, cep, tipo, cpf, cgc","empresa", "codemp=$codemp");

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
		


$title = "CONTRATO DE COMPRA  E VENDA COM RESERVA DE DOMÍNIO";

include("sif-topolimpo.php");

echo("


<BODY>
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='50%'><!--<img border='0' src='images/grupoipa.gif' width='200' height='85'>--><br>
      <b><font face='Verdana' size='4'></font></b></td>
    </center>
    <td width='50%'>
      <p align='right'><b><font size='3' face='Verdana' color='#000000' ><B>TERMO DE GARANTIA</B></td>
  </tr>
  </table>
</div>

<div align='center' class = 'textoleg'>
  <center>
  <table border='0' cellpadding='0' cellspacing='0' bordercolor='#111111'
width='550'>
    <tr>
      <td>
<font size='1' face='Verdana' class = 'textoleg'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelo presente Termo fica assegurado ao comprador 
<b>$xnome</B>, CPF: $xdoc, residente a $xendereco, $xcidade - $xbairro- $xestado,&nbsp; a garantia dos seguintes bens:</font>
<br>
<table border='0' width='550' border='0' cellspacing='1' cellpadding='0' align='center'>
  <tr bgcolor='#D4D4D4'> 
	<td width='85%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000' class = 'textoleg'><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000' class = 'textoleg'><b>QTDE</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff' class = 'textoleg'><b>GARANTIA<br>(MÊS)</b></font></td>
	
    
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

	  
if (count($array3)<>0){		


		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=4><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000' class = 'textoleg'><b>&nbsp;</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO DE PRODUTOS UNITARIOS
	 $contcjshow=1;
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
			
			$prod->listProdU("nomeprod, unidade, gar_um, gar_cj", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$garum = $prod->showcampo2();
			$garcj = $prod->showcampo3();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
		
			$k=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

			if ($tipocj <> $contcjshow){
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=4><hr size='0'><td>
		<tr>
				");
		$contcjshow++;
		}

		if ($garcj == 0){$garantia = 12;}else{$garantia = $garcj;}

echo(" 
	
  <tr bgcolor='#F7F7F7'> 
	
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000' class = 'textoleg'><b>$nomeprodcj </b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' class = 'textoleg'>
	$nomeprod</font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' class = 'textoleg'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' class = 'textoleg'>$garantia</font></td>
	
    
  </tr>
		
  ");

	$ptotal = $ptotal + $put;
		}
	}
	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=4><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000' class = 'textoleg'><b>&nbsp;</b><td>
		<tr>
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

			
			$prod->listProdU("nomeprod, unidade, gar_um, gar_cj", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$garum = $prod->showcampo2();
			$garcj = $prod->showcampo3();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

			
			if ($garum == 0){$garantia = 12;}else{$garantia = $garum;}

echo(" 
	
  <tr bgcolor='#F7F7F7'> 
	
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000' class = 'textoleg'><b>$nomeprodcj </b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' class = 'textoleg'>
	$nomeprod</font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' class = 'textoleg'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' class = 'textoleg'>$garantia</font></td>
    
		
  ");

	$ptotal = $ptotal + $put;

		}
	 }

}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=4><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300' class = 'textoleg'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotal = number_format($ptotal,2,',','.'); 

  
	echo("
		</table>
			
</div>
<div class = 'textoleg'>
<span style='font-family: Verdana' class = 'textoleg'>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O Objeto deste Termo poderá sofrer alterações, desde que com o
consentimento prévio do contratante, bastando para tanto uma simples
autorização verbal, observada as seguintes circunstâncias:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a)
Constatada a incompatibilidade entre alguns de seus componentes;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b)
Descontinuidade na produção de quaisquer um dos itens relacionados as
equipamento:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c)
Dificuldade na aquisição destes produtos no mercado.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No caso de alteração, passará a vigorar
como Objeto do presente Termo os itens relacionados no documento fiscal
emitido pela contratada.</FONT><FONT SIZE=1 face='Verdana' class = 'textoleg'>
<BR>
<b><font size='1'>&nbsp;</font></b><font size='1' face='Verdana' class = 'textoleg'><b>Garantia do(s) 
equipamento(s):</b><br>
1 - O(s) Equipamento(s) 
citado(s) neste termo terão garantia conforme a descrição acima:</font><br>
&nbsp;&nbsp;&nbsp; 1.1 - A obriga&ccedil;&atilde;o da Contratada, nos
			termos desta garantia, consiste na substitui&ccedil;&atilde;o
			gratuita, em empresas de Assistência Técnica Autorizada pelo fabricante, de pe&ccedil;as que
			sejam por ela reconhecidas como defeituosas.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.2 - A
empresa de Assistência Técnica Autorizada se reserva no direito de cobrar taxa
de deslocamento técnico, conforme tabela vigente, caso seja solicitado pelo
cliente atendimento a domicílio.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.3
			- Junto a nota fiscal, será fornecido um impresso com a relação
dos fabricantes dos produtos, bem como o endereço e telefone das empresas
pertencentes à rede de Assistência Técnica Autorizada.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.4
			- Qualquer dúvida referente ao local para onde deverá ser
encaminhado o equipamento em garantia, poderá ser esclarecida pelo telefone
(32) 3229-5940 Serviço de Atendimento ao Consumidor &nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.5
			- O equipamento deverá ser enviado para a assistência técnica
autorizada junto com o documento fiscal (nota fiscal ou cupom fiscal), conforme
relação de seus fabricantes.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.6
			- Para maior segurança entre as partes contratantes, os equipamentos fornecidos pela Contratada, são controlados pelo CÓDIGO DE BARRAS e possuem LACRE DE GARANTIA que asseguram o seu manuseio somente por técnicos credenciados, e em hipótese alguma o LACRE ou o CÓDIGO DE BARRAS poderão ser removidos ou conter sinais de violação.<br>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
<b>
2 - Serão 
motivo para cancelamento da garantia:</b><br>
&nbsp;&nbsp;&nbsp; 
2.1 - Instalações elétricas com flutuação superior a 5%.<br>
&nbsp;&nbsp;&nbsp; 
2.2 - Rompimento de lacre de garantia ou qualquer etiqueta identificadora.<br>
&nbsp;&nbsp;&nbsp; 2.3 - Conexão de forma indevida a outros equipamentos.<br>
&nbsp;&nbsp;&nbsp; 
2.4 - Danos causados por agentes da natureza (Relâmpagos, chuvas, descargas 
elétricas na rede telefônica, etc).<br>
&nbsp;&nbsp;&nbsp; 2.5 - 
Ambiente de utilização agressivo (poeira, sol, temperatura elevada, etc).<br>
&nbsp;&nbsp;&nbsp; 2.6 - Quedas ou outros agentes externos.<br>
&nbsp;&nbsp;&nbsp; 
2.7 - Mau uso.<br>
&nbsp;&nbsp;&nbsp; 
2.8 - Será automaticamente cancelada a garantia do produto, cujo LACRE DE GARANTIA ou CÓDIGO DE BARRA estiverem adulterados (rasgados, riscados, rasurados ou removidos).<br>
&nbsp;&nbsp;&nbsp; 
2.9 - Produto que tiver o número de série adulterado.<br>
<b>
3- Itens 
não cobertos pela garantia:</b><br>
&nbsp;&nbsp;&nbsp; 3.1 - 
Problemas de software de qualquer natureza.<br>
&nbsp;&nbsp;&nbsp; 3.2 - 
Danos causados por vírus.<br>
&nbsp;&nbsp;&nbsp; 3.3 - Danos 
causados por sujeira (mau contatos, teclas agarrando, travamento de carro 
impressor, desgastes de eixos e mancais, roletes de mouse, ventiladores de 
fontes, sujeira de unidades de leitura magnética ou óptica, etc).<br>
&nbsp;&nbsp;&nbsp; 3.4 - 
Danos causados por materiais de consumo (fitas, cartuchos, papel, etiquetas, 
disquetes e cds de má qualidade).<br>
&nbsp;&nbsp;&nbsp; 3.5 - 
Peças de desgaste natural como cabeças de impressora, eixos, teclados, mouses, 
etc.<br>
<b>
4- 
Limitações da garantia:</b><br>
&nbsp;&nbsp;&nbsp; 4.1 - Esta garantia não cobre 
desembolsos referentes a deslocamento técnico, lucros cessantes e danos 
indiretos.<br>
<b>
5- Garantias nos casos de compra de peças e acessórios avulsos:</b><br>
&nbsp;&nbsp;&nbsp; 5.1 - No 
ato de assinatura termo de garantia, o comprador esta ciente de que são 
colocadas a sua disposição 2 (duas) opções para instalação de peças e acessórios 
avulsos.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
a) Instalação da peça e/ou acessório avulso em Posto Credenciado , onde será cobrada uma taxa de instalação no valor 
de R$ 10,00 ( dez reais), sendo a cobrança deste valor de inteira 
responsabilidade do Posto Credenciado, que responde também pelos serviços por 
ele executados.&nbsp;&nbsp;&nbsp; Caso seja constatada pela equipe técnica a incompatibilidade 
da peça e/ou acessório adquirido com o equipamento do comprador, a Vendedora se 
compromete a reembolsar ao Comprador o valor da peça e/ou acessório adquirido, 
ficando este dispensado da cobrança da taxa de instalação.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A taxa cobrada 
refere-se somente a instalação física da peça e/ou acessório adquirido e seu 
respectivo driver (programa). Para a instalação do Sistema Operacional ou outros 
aplicativos será cobrado um valor a parte, a ser fixado pelo Posto Credenciado.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
b) Instalação da peça e/ou acessório avulso pelo próprio comprador, por sua 
conta e risco.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nesta modalidade o 
comprador assume plena responsabilidade pela instalação da peça e/ou acessório 
adquirido, estando ciente de que a Vendedora não se responsabiliza pela troca ou 
reembolso de quaisquer valores, mesmo que seja verificada incompatibilidade da 
peça e/ou acessório com o equipamento do comprador, levando se em consideração 
de que esta instalação será feita em Posto não Credenciado, por profissional não 
qualificado e em condições técnicas fora dos padrões exigidos pelo fabricante, 
permanecendo os demais termos da garantia.<br>
&nbsp;&nbsp;&nbsp; 
5.2 - Neste ato, o Comprador faz a opção pela modalidade de instalação descrita 
no item _____ da cláusula 5.<br>
<b>
6 - 
Considerações gerais:</b><br>
&nbsp;&nbsp;&nbsp; 6.1 - A 
vendedora não se responsabiliza por software instalado no microcomputador, salvo 
no caso de compra do mesmo, devidamente discriminada na nota fiscal de compra.<br>
7- Neste ato o comprador 
declara ter ciência e estar de acordo com os termos da garantia.</font>
<p align='center' style='text-align:center'><b>
ATENÇÃO<br>
Os aparelhos que 
se encontrarem dentro de seu prazo de garantia correspondente, deverão ser 
enviados somente aos postos de assistência devidamente autorizados, acompanhados 
deste certificado e da nota fiscal, datado e assinado pelo vendedor.<br>
</b>
<br>
</b>

<table border='0' width='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%' colspan='2'>
<span style='font-family: Verdana' class = 'textoleg'>
<p align='center'>
$cidrevenda, $dia de $mes de $ano.</span></p>
    </td>
  </span>
  </tr>
  <tr>
    <td width='50%'></td>
    <td width='50%'></td>
  </tr>
  <tr>
    <td width='50%'>
      <p align='center'>________________________<br>
      <span style='font-family: Verdana' class = 'textoleg'>Carimbo e assinatura
      do<br>
      &nbsp;Revendedor autorizado</span></td>
    <td width='50%'>
      <p align='center'>______________________<br>
       <span style='font-family: Verdana' class = 'textoleg'>Assinatura do comprador</td>
  </tr>
</table>


  </td>
    </tr>
  </table>
  </center>
</div>
</font>
</span>

</BODY>
</HTML>

");

?>
