

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datavenc DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "PEDIDO CAIXA";
$subtitulo = "FINANCEIRO";

$tipopesq="for";

$Actionter = "unlock";


// CONFIGURAÇÃO DE COR

$bgcortopo = "#86ACB5";
$bgcortopo1 = "#93BEE2";
$bgcorlinha = "#F3F8FA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();


	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$codcxvend = $prod->showcampo13();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($codempvend <> 0){$codempselect = $codempvend;}
		if ($codcxvend <> 0){$codcxselect = $codcxvend;}

		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		

			$Actionsec = "list";
			

	
        break;

		

    case "update":

				
		 break;

	 case "list":

		$prod->clear();
		$prod->setcampo1($codempselect);
		$prod->setcampo2($codclienteselect);
		$prod->setcampo0("");
		$prod->setcampo3($codvendold);

		$prod->addProd("pedidotemp", $ureg);
		$codpednew = $ureg;

		$Actionsec="list";
			
		 break;


	 case "newreg":

	
		
		$Actionsec="list";
		 
	    break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		
		if ($codempselect <> ""):
		
			if ($opcaixaselect == ""){
							
				$condicao3 .= " codemp='$codempselect'";
				if ($hist == "S"){
					$condicao3 .= " and hist = 'S'";
				}else{
					$condicao3 .= " and hist = 'N'";
				}
			
			}else{
				
				$condicao3 .= " opcaixa = '$opcaixaselect'";
				$condicao3 .= " and codemp='$codempselect'";
				if ($hist == "S"){
					$condicao3 .= " and hist = 'S'";
				}else{
					$condicao3 .= " and hist = 'N'";
				}
					

			}


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_car", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, opcaixa, codcliente, valordevido, hist, descricao, nf, codcar, codped, datapg, valorpago, juros", "fin_car", $condicao3, $array, $array_campo, $parm );

		

			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg /$acrescimo);  
			  $pagina = 1;
			endif; 


		endif;
	
		
		$Action="list";
		

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "NOVOPED - CRIAR PEDIDO CAIXA";

include("sif-topolimpo.php");

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************

function verificaObrig (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente


	if (form.opcaixarec.value == '03.01')
	{
		if ((form.banco.value == 0) || (form.agencia.value == 0) || (form.conta.value == 0) || (form.numch.value == 0))
		{	
			alert ('Banco, Agencia, Conta e Num Cheque : preenchimento obrigatório.');
			eval ('form.banco.focus ()');
			return false;
		}
		if ((verificaNumerico (form.banco.value, 1) != 1) || (verificaNumerico (form.agencia.value, 1) != 1) || (verificaNumerico (form.conta.value, 1) != 1) || (verificaNumerico (form.numch.value, 1) != 1))
		{
			alert ('Banco, Agencia, Conta e Num Cheque : formato inválido');
			eval ('form.banco.focus ()');
			return false;
		}
	}
	
	if ((form.opcaixarec.value == '03.04') || (form.opcaixarec.value == '03.05'))
	{

		if (form.bcorec.value == '')
		{	
			alert ('C.C Banco  : preenchimento obrigatório.');
			eval ('form.bcorec.focus ()');
			return false;

		}

	}

	if (!(consisteVazioTamanho(form, form.valorrec.name, 10)))
    {
        return false;
    }
   
	if (!(consisteValor(form, form.valorrec.name, true)))
	{
        return false;
    }
	if (!(consisteVazioTamanho(form, form.juros.name, 10)))
    {
        return false;
    }
   
	if (!(consisteValor(form, form.juros.name, true)))
	{
        return false;
    }

	return true;
      	
}


// FNCAO TESTA FORMA DE PAGAMENTO
function verificaObrigFPG (form, qtde, cadErro) 
{

 var o;
 var cont;
 var cname;
 var strValor;
 var strTipo;
 var strBanco;
 var strAgencia;
 var strConta;
 var strNum;
 var oini;

 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+10); o++)
  {
   strValor = oini + 3;
   strTipo = oini + 4;
   strBanco = oini + 5;
   strAgencia = oini + 6;
   strConta = oini + 7;
   strNum = oini + 8;

 	eval ('cname = form.elements[o].name');
	
	if (form.elements[strValor].value == 0)
	{
		alert ('Valor da Parcela ' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strValor].focus ()');
		return false;
	}
	if (verificaNumerico (form.elements[strValor].value, 2) != 1)
	{
		alert ('Valor da Parcela ' + cont + ' formato inválido');

		eval ('form.elements[strValor].focus ()');

		return false;
	}
	
	if (form.elements[strTipo].value != 0)
	{
	
		if ((form.elements[strTipo].value == '02.01') && (cadErro == 1))
		{
			alert ('O cadastro do cliente está incompleto, atualize as informações para que possa continuar o pedido.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		} 
		
		
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strAgencia].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1) || (verificaNumerico (form.elements[strConta].value, 1) != 1))
		{
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' formato inválido');
			eval ('form.elements[strValor].focus ()');

		return false;
		}
   }else {
	
		alert ('Forma de Pagamento ' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strTipo].focus ()');
		return false;

	}	
	
	
  }
	  oini = oini + 10; 
 }


	


	return true;
}


//***************************************************************************************
//  Função para obtenção de descrição do campo
//  Retorno: Uma descrição para o campo que corresponde
//           ao que é mostrado no browser
//***************************************************************************************

function retornaNmCampo (campo)
{
	
   	if (campo == 'valornew')
        return 'Valor';
	if (campo == 'codcliente')
        return 'Cod Cliente';
	if (campo == 'codped')
        return 'Cod. Pedido';
	if (campo == 'juros')
        return 'Juros';
	if (campo == 'valorrec')
        return 'Valor Recebido';
	if (campo == 'opcaixanew')
        return 'OP CAIXA';
	if (campo == 'dvenc')
        return 'Dia Vencimento';
	if (campo == 'mvenc')
        return 'Mes Vencimento';
	if (campo == 'avenc')
        return 'Ano Vencimento';
	if (campo == 'nfnew')
        return 'Nota Fiscal';

	else
        return 'Campo não cadastrado';
}

function adjust(element) {

	return element.value.replace ('.', ',');

}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form)
{
	var valor;
	valor = form.cbch.value;
	

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strValor].focus ()');
				
	}else{
	
	form.banco.value = valor.substring (1,4);
	form.agencia.value = valor.substring (4,8);
	form.conta.value = valor.substring (23,32);
	form.numch.value = valor.substring (13,19);

	form.cbch.disabled=true;
	
	}

	}
 
}





</script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):


		
	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"):

	echo("
	
		<center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
  </center>
	

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width='30%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933'  >$titulo</font></font></b><br>
<font color='#336699' face=' Verdana, Arial, Helvetica, sans-serif' size='2'>$subtitulo</font></td>
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

	  </p>
	   </td>
		  </form>
    </tr>
  </table>
      </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>


");



 
 
if ($codempselect<>""){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	
echo("
	<br>	
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>



 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BANCO</b></font></td>
      	<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.CHEQUE</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>C3</b></font></td>
      </tr>
");


  $prod->listProdgeral("pedidoparcelastemp", "codped=$codpednew", $array61, $array_campo61 , "order by datavenc");
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
			
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='20%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='20%'><font size='1' face='Verdana' >$numchec</font></td>
		<td width='10%'><font size='1' face='Verdana' >$c3</font></td>
      </tr>
");

	}

echo("

				</table>

<a name='fpg'></a>
	 <form name='form1' method='post' action='$PHP_SELF?Action=list&desloc=0'>

<br>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
	   <td colspan ='2'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PREENCHIMENTO DA FORMA DE PAGAMENTO</b> </font></td>	 
  </tr>
  <tr><form>
    <td width='60%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>  <select size='1' class=drpdwn name='nump' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                             
						  
	");

	for($j = 1; $j < 13; $j++ ){
			
		echo("		
		<option value='$PHP_SELF?Action=list&desloc=$desloc&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgcx=$pgcx&nump=$j#fpg'>$j</option>
		");
	
	}
	

	echo("	

		<option value='' selected>Número de Parcelas</option>
		
						  </select><br>
  </td></form>
   <td width='10%'><font size='1' face='Verdana'><b><p align='center'><img border='0' src='images/orcamento.gif' ></b></font></td>
   <td width='30%'><font size='1' face='Verdana'><b>
	<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('inicioorc.php?Action=list&vt=$ptotal&loginselect=$login&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pgorc','name','450','400','yes');return 
false");echo('"');echo(">FAZER<br>ORÇAMENTO</a></b></font>
</td>
 </tr>
</table>
");

/*
/// PESQUISA SE O CLIENTE SELECIONADO ESTA COM O CADASTRO INCOMPLETO
	$prod->listProdgeral("clientenovo", "(c_ocupacao ='' or c_descricao ='' or c_rendamensal = '' or rb_banco ='' or rb_agencia ='' or rb_conta = '' or rb_clientedesde ='') and codcliente = $codcliente", $array145, $array_campo145 , "");
	
	$cadErro = count($array145);

*/
$cadErro = 0;
echo("

		

<form method='POST' action='$PHP_SELF?Action=update'  name='Form' onSubmit = 'if (verificaObrigFPG(Form, $nump, $cadErro)==false) return false'>
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='25%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='25%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>BCO</b></font></td>
		<td width='20%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>NO.CHQ</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>C3</b></font></td>
      </tr>
");

$dataatual = $prod->gdata();
$anopar = substr($dataatual,0,4);
$mespar = substr($dataatual,4,2);
$diapar = substr($dataatual,6,2);

for($op = 0; $op < $nump; $op++ ){

$valorold=$ptotal/$nump;
$valorold = number_format($valorold,3,'.','.'); 
if ($mespar > 12){$mespar=1;$anopar++;}
if (strlen($mespar)==1){$mespar = '0'.$mespar;}


		
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='25%' rowspan='2'><input type='text' name='dvenc[$op]' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc[$op]' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc[$op]' value='$anopar'  size='4' maxlength='4'></td>
        <td width='10%' rowspan='2'><input type='text' name='valor[$op]'  size='8' onKeyUp='this.value = adjust(this);' ></td>
        <td width='25%' ><select size='1' name='tipoopcaixa[$op]'>

            <option value='02.01'>Cheque</option>
            <option value='02.00'>Dinheiro</option>
          
		  <option selected>Escolha</option>
          </select></td>
        <td width='10%' ><input type='text' name='banco[$op]' size='3' maxlength='3'></td>
	    <td width='20%' ><input type='text' name='numch[$op]' size='6' maxlength='6'></td>
        <td width='10%' ><input type='text' name='c3[$op]' size='3' maxlength='1'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
    		 <td width='20%' align='right' ><font size='1' face='Verdana' color='#FF9933'><b>CODBARRA CHEQUE:</b></font></td>
	      <td width='45%' colspan='4'><input type='text' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $op);'></td>
    </tr>


");
$mespar++;
}
echo("
    </table>
    </center>
  </div>
		");


}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;




/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
