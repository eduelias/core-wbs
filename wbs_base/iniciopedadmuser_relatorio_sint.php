

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " GROUP by codvend_user order by dataped DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "RELATÓRIO PEDIDOS";
$subtitulo = "REVENDA";

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
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codgrpselect = $codgrp;
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}
	$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

   

	 case "list":
	 
	 	$prod->clear();
		$prod->listProdU("COUNT(*)","vendedor_usuario", "codvend_user = '$codvend_user_select' and  senha_user = MD5('$senha_user')");
		$verif = $prod->showcampo0();
		$prod->clear();
		$prod->listProdU("tipo_supervisor","vendedor_usuario", "codvend_user = '$codvend_user_select'");
		$tipo_supervisor = $prod->showcampo0();
		
		
		
		
		if ($verif > 0){
			$_SESSION['chave_vend'][$pg] = true;
			$_SESSION['codvend_sess_user'][$pg] = $codvend_user_select;
			$_SESSION['tipo_user'][$pg] = $tipo_supervisor;
		}else{
			
			#$_SESSION['chave_vend'][$pg] = false;
			#$_SESSION['codvend_sess_user'][$pg] = false;
			#$_SESSION['tipo_user'][$pg] = false;
		}
		
		#echo "$verif - $codvend_user_select - $senha_user - $tipo_supervisor - ".$_SESSION['tipo_user'][$pg];
		
		$Actionsec="list";
			
		 break;


	
}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		
		
		//PESQUISA POR CODBARRA

			
				if ($mesped <> "" and anoped <>"" ){
					$condicao3 .= " pedido.dataped like '$anoped-$mesped%' and";
			
				}
								
		
		
		
			
				
			
			$condicao3 .= " pedido.codvend='$codvendselect'";
			$condicao3 .= " and pedido.modelo_ped = 'RDD'  ";
			#$condicao3 .= " and pedido.hist = '$hist'  ";
			#$condicao3 .= " and pedido.codcliente=clientenovo.codcliente ";
			#$condicao3 .= " and pedido.codvend_user=vendedor_usuario.codvend_user ";
		
			
			#echo $condicao3;
		

		// BLOQUEIA PESQUISA DO HISTORICO
		if ($mesped <> "" and anoped <>"" ){
	        	$controle = 0;
	  		
  		}else{
				$controle = 1;
  		}

		if ( $controle == 0){
		// LISTA TODOS OS REGISTROS
		#$prod->listProdSum("COUNT(*) as numreg", "pedido, clientenovo", $condicao3, $array, $array_campo, "GROUP by codvend_user" );
		#$prod->mostraProd( $array, $array_campo, 0 );
		#$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codvend_user, SUM(vpp), SUM(mlb*(1-(porc_cm)/100)) as porc, ((SUM((mlb*(1-(porc_cm)/100))))/ SUM(vpp))*100 as lucrativ, SUM(vpp)/COUNT(*) as ticket, COUNT(*) ", "pedido", $condicao3, $array, $array_campo, $parm );
		}
		
		$Action="list";

		if ($desloc <> 0):
		  #$totalpagina= ceil($numreg /$acrescimo);  
		else:
		 # $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

if ($impressao <> 1){ include("sif-topo.php"); }



echo("

<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************


// FUNCAO TESTA FORMA DE PAGAMENTO
function verificaObrigFPG (form, qtde, cadErro) 
{

 var o;
 var cont;
 var cname;
 var strDia;
 var strMes;
 var strAno;
 var strValor;
 var strTipo;
 var strBanco;
 var strAgencia;
 var strConta;
 var strNum;
 var oini;
 var maxx_block = 0;
 var status_maxx = document.getElementById('status_maxx').value;

 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+10); o++)
  {
   strDia = oini + 0;
   strMes = oini + 1;
   strAno = oini + 2;
   strValor = oini + 3;
   strTipo = oini + 4;
   strBanco = oini + 5;
   strAgencia = oini + 6;
   strConta = oini + 7;
   strNum = oini + 8;

 	eval ('cname = form.elements[o].name');
 	
 	var dateparc = new Date(form.elements[strAno].value, form.elements[strMes].value, form.elements[strDia].value);
    var dateped = new Date(form.adataped.value, form.mdataped.value, form.ddataped.value);
    var diff5 = dateparc.getTime() - dateped.getTime()
    var daysparc = Math.floor(diff5 / (1000 * 60 * 60 * 24));
    if (daysparc <= -1)
	{
		alert ('Data da parcela ' + cont +' INFERIOR a data do pedido.');
		eval ('form.elements[strDia].focus ()');
		return false;
	}
	
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
		if ((form.elements[strTipo].value == '02.04') && (daysparc < 20))
		{
			alert ('DATA DA BOLETA da PARCELA '+cont+' inferior A 20 DIAS da DATA DO PEDIDO.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		}
			if ((form.elements[strTipo].value == '02.49') || (form.elements[strTipo].value == '02.50'))
		{
			maxx_block = 1;
			
		} 
		/*
		if ((form.elements[strTipo].value == '02.01') && ((form.elements[strBanco].value == 0) || (form.elements[strAgencia].value == 0) || (form.elements[strNum].value == 0) || (form.elements[strConta].value == 0)))
		{
			
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' : preenchimento obrigatório.');
			eval ('form.elements[strBanco].focus ()');
			return false;
		}
		*/
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strAgencia].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1) || (verificaNumerico (form.elements[strConta].value, 1) != 1))
		{
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' formato inválido');
			eval ('form.elements[strValor].focus ()');

		return false;
		}
   }else {
	
		alert ('Forma de Pagamento' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strTipo].focus ()');
		return false;

	}	
	
	
  }
	  oini = oini + 10; 
 }

		if (maxx_block != 1 && status_maxx > 0)
    {
        alert('IMPORTANTE! Você possui um COMPUTADOR PARA TODOS no seu carrinho! Esse produto so poderá ser vendido através do FINANCIAMENTO CEF para todos ou FINANCIAMENTO BCO BRASIL para todos. ');
       
        return false;
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
	
    if (campo == 'valor')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}


function adjust(element) {

	return element.value.replace ('.', ',');
}

function mostrajanela(text) {

	alert ('PREVISAO DE ENTREGA: ' + text );
}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strXValor;
	var strXBanco;
	var strXAgencia;
	var strXConta;
	var strXNum;
	var xvalor;

	cpos = (posicao*10) + 10; 
	
    strXBanco = cpos - 5;
    strXAgencia = cpos - 4;
    strXConta = cpos - 3;
    strXNum = cpos - 2;
	strXValor = cpos - 1;
	
	xvalor = form.elements[strXValor].value;

	if (xvalor != ''){

	if ((xvalor.indexOf(':') != -1) || (xvalor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strXValor].focus ()');
				
	}else{
	
	form.elements[strXBanco].value = xvalor.substring (1,4);
	form.elements[strXAgencia].value = xvalor.substring (4,8);
	form.elements[strXConta].value = xvalor.substring (23,32);
	form.elements[strXNum].value = xvalor.substring (13,19);

	form.elements[strXValor].disabled=true;
	
	}

	}
 
}


// FUNCAO TESTA FORMA DE PAGAMENTO
function OpenPopup() 
{
	alert ('Modificação no Sistema: O CONTRATO DE COMPRA E VENDA MUDOU, se você ainda não recebeu as instruções, entrar em contato com o gerente responsável');
			
}



// FUNCAO TESTA FORMA DE PAGAMENTO
function ControleImbecil() 
{
	
	alert ('O contrato não poderá ser impresso, pois algum cheque não foi preenchido');
		
			
}

var duplaSubmissao = 0;

function Envia(tipo)
{
    if (duplaSubmissao > 0)
    {
        alert('Por favor, aguarde. Proposta já enviada ao sistema.');
        return false;
    }

 	
	var dia = document.getElementById('dprev').value; 
	var mes = document.getElementById('mprev').value;
	var ano = document.getElementById('aprev').value;
	var diax = document.getElementById('dprevx').value; 
	var mesx = document.getElementById('mprevx').value;
	var anox = document.getElementById('aprevx').value;
			
	var date2 = new Date(ano, mes-1, dia);
	var now = new Date(anox, mesx-1, diax);
	var diff = date2.getTime() - now.getTime();
	var days = Math.floor(diff / (1000 * 60 * 60 * 24));
	
	if (days <= -1){
		alert('DATA DE PREVISÃO DE ENTREGA inferior a DATA ORIGINAL DE ENTREGA');
        document.Form33.dprev.focus();
        return false;
	}

     if (tipo == 0)
    {
        document.Form33.submit();
    }

    duplaSubmissao++;

    return true;
}


// FUNCAO TESTA FORMA DE PAGAMENTO
function sel( valor)
{


document.form77.action = '$PHP_SELF?Action=inicio_sep&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codped=$codped&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&inicio_sep='+valor+'';
document.form77.target = '';
document.form77.submit();


}

function sel1( valor)
{

document.form79.action = '$PHP_SELF?Action=declara&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codped=$codped&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&declara='+valor+'';
document.form79.target = '';
document.form79.submit();

}




</script>


<body bgcolor='#FFFFFF' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'    >
");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////



/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"){

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
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		
               PERÍODO: <input type='text' name='mesped' size='2' maxlength = '2'>/<input type='text' name='anoped' size='4' maxlength = '4'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codpednew' value='$codpednew'>
		<input type='hidden' name='codempselect' value='$codempselect'>
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

/*
# Pesquisa pela Empresa do OC

//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

if ($allemp == "Y"){

echo("
<br>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&diaspg=$diaspg#cliente'>$nomeemp</option>
		");
	
}
	echo("	
		<option value='' selected>Escolha a Empresa</option>
	  </select>
  </td>
  </form>
 </tr>
</table>
	
");
}else{

$codempselect = $codempvend;

}


//<!-- ESCOLHA DE EMPRESAS - FIM --> 


 */
 
 #echo "chave=".$_SESSION['chave_vend'][$pg];
 
 if ($_SESSION['chave_vend'][$pg] == false){
 
 echo ("
 
 <table  border='0' cellspacing='2' cellpadding='2'>
 <form action='$PHP_SELF?pg=$pg&Action=list' method='post' name = 'form1'>
      <tr valign='top'>
        <td><fieldset>
          <legend class='titulos_itens'> LOGIN DO VENDEDOR</legend>
          <table width='100%'  border='0' cellspacing='4' cellpadding='4'>

            <tr class='negrito10preto'>
              <td align='center'>LOGIN
                <select name='codvend_user_select' class='cmp1'>
 
 
 ");
 
 
		 $prod->clear();
		$prod->listProdSum("codvend_user, login_user","vendedor_usuario", "hist <> 'Y' and codvend = $codvend and tipo_supervisor = 'S'", $array6, $array_campo6 , "order by login_user");
		for($j = 0; $j < count($array6); $j++ ){
	
			$prod->mostraProd( $array6, $array_campo6, $j );
			$codvend_list_user = $prod->showcampo0();
			$nome_user = $prod->showcampo1();
 
 echo ("
 
  <option value='$codvend_list_user'>$nome_user</option>
 ");
 }//FOR
 
  echo ("
 
          <option value='-1' selected>ESCOLHA</option>
                </select></td>
              <td align='center'>SENHA:
                <input name='senha_user' type='password' class='cmp1' id='senha_user' size='8' maxlength='8'><input name='OK' type='submit' value='OK' ></td>
            </tr>
          </table>
        </fieldset></td>
      </tr>
	  </form>
    </table>
 ");
 
  }// CHAVE
 
if ($_SESSION['chave_vend'][$pg] == true){

/*
	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$contatoold = $prod->showcampo16();

		$nomeempold = strtoupper($nomeempold);
*/
echo("
<br>
		

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%'>
      <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
          <tr>
             <td width='5%'><img border='0' src='images/empresa.gif' width='25' height='26'></td>
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PERÍODO:<br>
        </b>$mesped/$anoped</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='25%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&mesped=$mesped&anoped=$anoped'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='40%'>
         </td>
        </tr>
          <tr>
            <td width='100%' colspan='5'>
      <hr size='1'>
            </td>
        </tr>
      </table>
       
    </td>
  </tr>
  <center>
  <tr>
    <td width='100%'>
    
    </td>
  </tr>
  </table>
  </center>
</div>

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
   
    <td width='30%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR VENDIDO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COMISSÃO</font></b></div>
    </td>
	<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LUCRATIVIDADE</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE PED</font></b></div>
    </td>
		<td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TICKET MÉDIO</font></b></div>
    </td>
	
		
  </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			
			$codvend_user_ped = $prod->showcampo0();
			$vpp = $prod->showcampo1();
			$comissao = $prod->showcampo2();
			$lucrativ = $prod->showcampo3();
			$ticket_medio = $prod->showcampo4();
			$num_ped = $prod->showcampo5();
			$vppf = number_format($vpp,2,',','.'); 
			$ticket_mediof = number_format($ticket_medio,2,',','.'); 
			$comissaof = number_format($comissao,2,',','.'); 
			$lucrativf = number_format($lucrativ,2,',','.'); 
			
			#echo "venbd=".$_SESSION['codvend_sess_user'][$pg];
			$prod->clear();
			$prod->listProdU("login_user","vendedor_usuario", "codvend_user = '$codvend_user_ped'");
			$nome_vend_user = $prod->showcampo0();
			if($nome_vend_user){$nome_vend_user = "(".$nome_vend_user.")";}
	
			

		echo("
			<tr bgcolor='#FFFFFF'> 
		
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevendselect <font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>$nome_vend_user</b></font></font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$vppf</b></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color ='$cor45'>$comissaof</font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$lucrativf %</font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$num_ped</font></b></td>
			<td align='center' width='20%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$ticket_mediof</font></b></td>
		
			</tr>
");
		
	
	 }//FOR

		echo("
				</table>
		");




/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////



if ($Action == "list" ){

/// CONTADOR DE PAGINAS ////
#$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codvend_user_pesq=$codvend_user_pesq&mesped=$mesped&anoped=$anoped&hist_todos=$hist_todos";   
#include("numcontg.php");
}

}//LOGIN

}//LIST


/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 

/*
	
	echo("

<br><br><br>
	<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>LEGENDA - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>

	<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='3' cellpadding='3'>
    <tr>
      <td width='11%' bgcolor='#FFCC66' align='center'><font size='1' face='Verdana' class='texto'>
        AVALIAÇÃO DE CRÉDITO</font></td>
      <td width='11%' bgcolor='#CFFCC7' align='center'><font size='1' face='Verdana' class='texto'><b>PEDIDO
        APROVADO</b></font></td>
      <td width='11%' bgcolor='#D6B778' align='center'><font size='1' face='Verdana' class='texto'><b>AGUARDA
        PEÇA</b></font></td>
      <td width='11%' align='center' bgcolor='#F2E4C4'><font size='1' face='Verdana' class='texto'><b>EM <br>
        PRODUÇÃO</b></font></td>
      <td width='11%' align='center' bgcolor='#EDE763'><font size='1' face='Verdana' class='texto'><b>LIBERADO
        PARA EXPEDIÇÃO</b></font></td>
      <td width='11%' align='center' bgcolor='#339966'><font size='1' face='Verdana' class='texto'><b>DESPACHADO
        PARA TRANSPORTADORA</b></font></td>
      <td width='11%' align='center' bgcolor='#BFD9F9'><font size='1' face='Verdana' class='texto'><b>PEDIDO
        ENTREGUE</b></font></td>
      <td width='11%' align='center'><font size='1' face='Verdana' class='texto'><b>CRÉDITO
        REPROVADO</b></font></td>
      <td width='12%' align='center' bgcolor='#E1AFAA'><font size='1' face='Verdana' class='texto'><b>PEDIDO
        CANCELADO</b></font></td>
    </tr>
  </table>

  </center>
</div>
");
	
	*/
	
	include ("sif-rodape.php");}
}

?>
       
