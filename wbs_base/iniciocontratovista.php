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
		


$title = "CONTRATO DE COMPRA  E VENDA COM RESERVA DE DOM�NIO";

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
	<td width='85%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000' class = 'textoleg'><b>DESCRI��O DETALHADA</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000' class = 'textoleg'><b>QTDE</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff' class = 'textoleg'><b>GARANTIA<br>(M�S)</b></font></td>
	
    
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O Objeto deste Termo poder� sofrer altera��es, desde que com o
consentimento pr�vio do contratante, bastando para tanto uma simples
autoriza��o verbal, observada as seguintes circunst�ncias:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a)
Constatada a incompatibilidade entre alguns de seus componentes;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b)
Descontinuidade na produ��o de quaisquer um dos itens relacionados as
equipamento:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c)
Dificuldade na aquisi��o destes produtos no mercado.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No caso de altera��o, passar� a vigorar
como Objeto do presente Termo os itens relacionados no documento fiscal
emitido pela contratada.</FONT><FONT SIZE=1 face='Verdana' class = 'textoleg'>
<BR>
<b><font size='1'>&nbsp;</font></b><font size='1' face='Verdana' class = 'textoleg'><b>Garantia do(s) 
equipamento(s):</b><br>
1 - O(s) Equipamento(s) 
citado(s) neste termo ter�o garantia conforme a descri��o acima:</font><br>
&nbsp;&nbsp;&nbsp; 1.1 - A obriga&ccedil;&atilde;o da Contratada, nos
			termos desta garantia, consiste na substitui&ccedil;&atilde;o
			gratuita, em empresas de Assist�ncia T�cnica Autorizada pelo fabricante, de pe&ccedil;as que
			sejam por ela reconhecidas como defeituosas.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.2 - A
empresa de Assist�ncia T�cnica Autorizada se reserva no direito de cobrar taxa
de deslocamento t�cnico, conforme tabela vigente, caso seja solicitado pelo
cliente atendimento a domic�lio.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.3
			- Junto a nota fiscal, ser� fornecido um impresso com a rela��o
dos fabricantes dos produtos, bem como o endere�o e telefone das empresas
pertencentes � rede de Assist�ncia T�cnica Autorizada.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.4
			- Qualquer d�vida referente ao local para onde dever� ser
encaminhado o equipamento em garantia, poder� ser esclarecida pelo telefone
(32) 3229-5940 Servi�o de Atendimento ao Consumidor &nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.5
			- O equipamento dever� ser enviado para a assist�ncia t�cnica
autorizada junto com o documento fiscal (nota fiscal ou cupom fiscal), conforme
rela��o de seus fabricantes.<br>
&nbsp;&nbsp;&nbsp;&nbsp;1.6
			- Para maior seguran�a entre as partes contratantes, os equipamentos fornecidos pela Contratada, s�o controlados pelo C�DIGO DE BARRAS e possuem LACRE DE GARANTIA que asseguram o seu manuseio somente por t�cnicos credenciados, e em hip�tese alguma o LACRE ou o C�DIGO DE BARRAS poder�o ser removidos ou conter sinais de viola��o.<br>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
<b>
2 - Ser�o 
motivo para cancelamento da garantia:</b><br>
&nbsp;&nbsp;&nbsp; 
2.1 - Instala��es el�tricas com flutua��o superior a 5%.<br>
&nbsp;&nbsp;&nbsp; 
2.2 - Rompimento de lacre de garantia ou qualquer etiqueta identificadora.<br>
&nbsp;&nbsp;&nbsp; 2.3 - Conex�o de forma indevida a outros equipamentos.<br>
&nbsp;&nbsp;&nbsp; 
2.4 - Danos causados por agentes da natureza (Rel�mpagos, chuvas, descargas 
el�tricas na rede telef�nica, etc).<br>
&nbsp;&nbsp;&nbsp; 2.5 - 
Ambiente de utiliza��o agressivo (poeira, sol, temperatura elevada, etc).<br>
&nbsp;&nbsp;&nbsp; 2.6 - Quedas ou outros agentes externos.<br>
&nbsp;&nbsp;&nbsp; 
2.7 - Mau uso.<br>
&nbsp;&nbsp;&nbsp; 
2.8 - Ser� automaticamente cancelada a garantia do produto, cujo LACRE DE GARANTIA ou C�DIGO DE BARRA estiverem adulterados (rasgados, riscados, rasurados ou removidos).<br>
&nbsp;&nbsp;&nbsp; 
2.9 - Produto que tiver o n�mero de s�rie adulterado.<br>
<b>
3- Itens 
n�o cobertos pela garantia:</b><br>
&nbsp;&nbsp;&nbsp; 3.1 - 
Problemas de software de qualquer natureza.<br>
&nbsp;&nbsp;&nbsp; 3.2 - 
Danos causados por v�rus.<br>
&nbsp;&nbsp;&nbsp; 3.3 - Danos 
causados por sujeira (mau contatos, teclas agarrando, travamento de carro 
impressor, desgastes de eixos e mancais, roletes de mouse, ventiladores de 
fontes, sujeira de unidades de leitura magn�tica ou �ptica, etc).<br>
&nbsp;&nbsp;&nbsp; 3.4 - 
Danos causados por materiais de consumo (fitas, cartuchos, papel, etiquetas, 
disquetes e cds de m� qualidade).<br>
&nbsp;&nbsp;&nbsp; 3.5 - 
Pe�as de desgaste natural como cabe�as de impressora, eixos, teclados, mouses, 
etc.<br>
<b>
4- 
Limita��es da garantia:</b><br>
&nbsp;&nbsp;&nbsp; 4.1 - Esta garantia n�o cobre 
desembolsos referentes a deslocamento t�cnico, lucros cessantes e danos 
indiretos.<br>
<b>
5- Garantias nos casos de compra de pe�as e acess�rios avulsos:</b><br>
&nbsp;&nbsp;&nbsp; 5.1 - No 
ato de assinatura termo de garantia, o comprador esta ciente de que s�o 
colocadas a sua disposi��o 2 (duas) op��es para instala��o de pe�as e acess�rios 
avulsos.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
a) Instala��o da pe�a e/ou acess�rio avulso em Posto Credenciado , onde ser� cobrada uma taxa de instala��o no valor 
de R$ 10,00 ( dez reais), sendo a cobran�a deste valor de inteira 
responsabilidade do Posto Credenciado, que responde tamb�m pelos servi�os por 
ele executados.&nbsp;&nbsp;&nbsp; Caso seja constatada pela equipe t�cnica a incompatibilidade 
da pe�a e/ou acess�rio adquirido com o equipamento do comprador, a Vendedora se 
compromete a reembolsar ao Comprador o valor da pe�a e/ou acess�rio adquirido, 
ficando este dispensado da cobran�a da taxa de instala��o.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A taxa cobrada 
refere-se somente a instala��o f�sica da pe�a e/ou acess�rio adquirido e seu 
respectivo driver (programa). Para a instala��o do Sistema Operacional ou outros 
aplicativos ser� cobrado um valor a parte, a ser fixado pelo Posto Credenciado.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
b) Instala��o da pe�a e/ou acess�rio avulso pelo pr�prio comprador, por sua 
conta e risco.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nesta modalidade o 
comprador assume plena responsabilidade pela instala��o da pe�a e/ou acess�rio 
adquirido, estando ciente de que a Vendedora n�o se responsabiliza pela troca ou 
reembolso de quaisquer valores, mesmo que seja verificada incompatibilidade da 
pe�a e/ou acess�rio com o equipamento do comprador, levando se em considera��o 
de que esta instala��o ser� feita em Posto n�o Credenciado, por profissional n�o 
qualificado e em condi��es t�cnicas fora dos padr�es exigidos pelo fabricante, 
permanecendo os demais termos da garantia.<br>
&nbsp;&nbsp;&nbsp; 
5.2 - Neste ato, o Comprador faz a op��o pela modalidade de instala��o descrita 
no item _____ da cl�usula 5.<br>
<b>
6 - 
Considera��es gerais:</b><br>
&nbsp;&nbsp;&nbsp; 6.1 - A 
vendedora n�o se responsabiliza por software instalado no microcomputador, salvo 
no caso de compra do mesmo, devidamente discriminada na nota fiscal de compra.<br>
7- Neste ato o comprador 
declara ter ci�ncia e estar de acordo com os termos da garantia.</font>
<p align='center' style='text-align:center'><b>
ATEN��O<br>
Os aparelhos que 
se encontrarem dentro de seu prazo de garantia correspondente, dever�o ser 
enviados somente aos postos de assist�ncia devidamente autorizados, acompanhados 
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
