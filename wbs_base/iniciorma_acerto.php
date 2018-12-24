<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CONFERÊNCIA DE CODBARRAS";
$nomeformsec = "Acerto do estoque";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}
		//if ($codempvend <> 0){$codempselect = $codempvend;}

	$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    


	 case "check":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrarma' and codbarraped <> '1' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
				
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprod");
			$nomeprod_rma = $prod->showcampo0();

			$confer1 = 1;

	
		}else{

			$erro1 = "CÓDIGO DE BARRA NÃO ENCONTRADO OU JÁ ESTÁ EM UM PEDIDO";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "checkfim":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrarma' and codbarraped <> '1' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		echo("r=$reg - r1= $reg1");
		if ($reg <> 0){

			// ALTERA VALORES NA TABELA PEDIDO
			$prod->listProd("codbarra", "codcb=$codcb");
				
				$prod->setcampo13("S");
				$prod->upProd("codbarra", "codcb='$codcb'");


			#$Action="end";

			$erro1 = "CÓDIGO DE BARRA ==> OK";
			$Action="list";

	
		}else{

			$erro1 = "CÓDIGO DE BARRA NÃO FOI USADO COMO RMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;

	case "check_ant":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrasant' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg == 0){

			if ($codprodsant <> 0){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprodsant");
			$nomeprod_sant = $prod->showcampo0();

			$confer2 = 1;

			}else{

				$erro2 = "CÓDIGO DO PRODUTO INCORRETO";
				$Action="list";

			}


	
		}else{

			$erro2 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "checkfim_ant":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarrasant' and codemp=$codempselect ");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg == 0){

			if ($codprodsant <> 0){

										
				$prod->clear();
				$prod->setcampo2($codprodsant);
				$prod->setcampo3($codbarrasant);
				$prod->setcampo4(0);
				$prod->setcampo7("");
				$prod->setcampo8($codempselect);
				$prod->setcampo9(1); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
				$prod->setcampo10("N"); // FLAG RMA
				$prod->setcampo11("N"); // FLAG PECA ANTIGA
				$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
				$prod->addProd("codbarra", $ureg);

					// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodsant");

				$qtdeold = $prod->showcampo3();
								
				$qtdenovo = $qtdeold + 1;
				$prod->setcampo3($qtdenovo);
								
				$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprodsant");

			$Action="end";

			$erro2 = "CÓDIGO DE BARRA INSERIDO ==> OK";
			$Action="list";


			}else{

				$erro2 = "CÓDIGO DO PRODUTO INCORRETO";
				$Action="list";

			}

	
		}else{

			$erro2 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "check_scod":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg32 = $prod->listProd("codbarra", "codbarra = '$codbarrasanta' and codemp=$codempselect and codprod = $codprodsanta and codbarraped <> 1");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");
		echo("r=$reg32 - r1= $reg1");

		if($reg32 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprodsanta");
			$chkcb_ant = $prod->showcampo0();
			if ($chkcb_ant <> "N"){$reg32 = 0;}
		}
		
		
		echo("r=$reg32 - r1= $reg1");
		if ($reg32 <> 0){

			if ($qtdeprod <= $reg32){

			$prod->listProdU("nomeprod","produtos", "codprod=$codprodsanta");
			$nomeprod_santa = $prod->showcampo0();

			$confer3 = 1;

			}else{

				$erro3 = "QUANTIDADE INCORRETA";
				$Action="list";

			}


	
		}else{

			$erro3 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;


	case "checkfim_scod":
			
		if ($retorno){

		$prod->clear();
		// PESQUISA PELO CODBARRA ANTERIOR
		$reg32 = $prod->listProd("codbarra", "codbarra = '$codbarrasanta' and codemp=$codempselect and codprod = $codprodsanta and codbarraped <> 1");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped - codbarra= $codbarraant");

		if($reg32 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprodsanta");
			$chkcb_ant = $prod->showcampo0();
			if ($chkcb_ant <> "N"){$reg32 = 0;}
		}
		
		
		echo("r=$reg - r1= $reg1");
		if ($reg32 <> 0){

			if ($qtdeprod <= $reg32){

						
		 		// ALTERA VALORES NA TABELA PEDIDO
				$prod->listProdgeral("codbarra", "codbarra = '$codbarrasanta' and codemp=$codempselect and codprod = $codprodsanta and codbarraped <> 1", $array, $array_campo , "");
		
		for($j = 0; $j < $qtdeprod; $j++ ){
				$prod->mostraProd( $array, $array_campo, $j );
				$codcb_novo = $prod->showcampo0();
					
				$prod->setcampo13("S");
				$prod->upProd("codbarra", "codcb = $codcb_novo");
		 }


			#$Action="end";

			$erro3 = "CÓDIGO DE BARRA ==> OK";
			$Action="list";


			}else{

				$erro3 = "CÓDIGO DO PRODUTO INCORRETO";
				$Action="list";

			}

	
		}else{

			$erro3 = "CÓDIGO DE BARRA JÁ EXISTE NO SISTEMA";
			$Action="list";

		}
		
		$Action="list";
		
		}
		 break;



}

// ACOES SECUNDARIAS DA PAGINA
/*if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		$numreg = $prod->listProdgeral($tabela, $condicao2, $array, $array_campo, "" );
		if ($palavrachave == ""){$condicao2 = "";}

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral($tabela, $condicao2, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}
*/
// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////


	echo("

<html>

<head>
<title>CONFERÊNCIA DE COD BARRA</title>
	<script language='javascript'>
<!--
function Link(url) 
{ 
path = url;
 opener.top.frames['Main'].location.href=path

}
//-->



</script>

</head>

<body >
<div align='center'>
  <center>
  <table border='0' width='350' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%' bgcolor='#336699'>
 <table width='350' border='0' cellspacing='1' cellpadding='2' align='center'>
			 <tr bgcolor='#F3F8FA'> 
			 <td bgcolor='#336699'>
			  <p align='left'><font face='Verdana' size='3' color='#FFFFFF'>MENSAGEM
              DE<b> CONFIRMAÇÃO</b></font></p>
			 </td>
             </tr>
			 <tr bgcolor='#F3F8FA'> 
			 <td>
              &nbsp;
			  <p align='center'><b><font face='Verdana' size='3' color='#FF0000'>CÓDIGO DE BARRA INSERIDO CORRETAMENTE</font></b></p>&nbsp;
			 </td>
             </tr>
			 <tr bgcolor='#F3F8FA'> 
			 <td bgcolor='#F3F3F3'>
<!--

              <p align='center'><b><a href='#' onclick=");echo('"javascript:Link(');echo("'restrito.php?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'");echo(')" onmouseup="javascript:window.close()"');echo("><font face='Verdana' color='#870C0C' size='1'>FINALIZAR</font></a></p>
-->
           <p align='center'><b><a href='restrito.php?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg' onmouseup='javascript:window.close()' target='Main'><font face='Verdana' color='#870C0C' size='1'>FECHAR</font></a></p>

			  
			  </td>
             </tr>
			 </table>
        </td>
      </tr>
    </table>
  </center>
  </div>
</body>

</html>



	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	


	echo("
	<head>
<title> SUBSTITUIÇÃO DE CÓDIGO BARRA</title>


</head>
	<center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
  </center>
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br></font><font color='#FF9933' size='3' face='Verdana'></font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><font size='3' face='Verdana'><font color='#FF9933'>
                          $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></font></b></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><br>
                          </a></font></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

");
//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

if ($allemp == "Y"){

echo("
<br>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");

	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
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
if ($codempselect<>""){


	$prod->listProdU("nome","empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);

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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='7%'>
              <p align='center'></td>
            <td width='30%'></td>
          </center>
          <td width='35%'>
            </td>
        </tr>
      </table>
    </td>
  </tr>
  <center>
  <tr>
    <td width='100%'>
      <hr size='1'>
    </td>
  </tr>
  </table>
  </center>
</div>
");

if ($confer1 == 1){$Action1="checkfim";}else{$Action1="check";}
if ($confer1 == 1){$b2="Confirma Codbarra?";}else{$b2="Pesquisar Codbarra";}
if ($confer2 == 1){$Action2="checkfim_ant";}else{$Action2="check_ant";}
if ($confer2 == 1){$b3="Confirma Inclusão?";}else{$b3="Inserir Produto";}
if ($confer3 == 1){$Action3="checkfim_scod";}else{$Action3="check_scod";}
if ($confer3 == 1){$b4="Confirma Codbarra?";}else{$b4="Pesquisar Codbarra";}

echo("

<a name='a2'></a>
<form method='POST' action='$PHP_SELF?Action=$Action1#a2'>
 
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#379427' height='31' colspan='3'><font color='#000000'><b><font size='2' face='Verdana'>CONFERÊNCIA DE CODBARRA<br>
          </font></b><font face='Verdana' size='1'>(Verifica a existencia do codbarra e marca o codbarra)</font></font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='3'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF'>&nbsp;</td>
      </center>
      <td width='215' height='21' bgcolor='#FFFFFF'>
        <p align='left'><b><font size='2' face='Verdana' color='#800000'>&nbsp; CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
    <tr>
      <td width='76' height='21' bgcolor='#C6EEBF'><b><font face='Verdana' size='1'>PRODUTO:</font></b></td>
    </center>
    <td width='215' height='21' bgcolor='#C6EEBF'>
      <p align='left'><font face='Verdana' size='1'><input type='text' name='codbarrarma' value='$codbarrarma' size='28'></font></td>
    <td width='245' height='21' bgcolor='#C6EEBF'>
      <b>  <font face='Verdana' size='1'>$nomeprod_rma</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='3'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro1</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='3'>


        <p align='center'><input type='submit' value='$b2'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
");
/*
echo("
<a name='a3'></a>
<form method='POST' action='$PHP_SELF?Action=$Action2#a3'>
  <hr>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#C48035' height='31' colspan='4'><b><font size='2' face='Verdana' color='#000000'>INSERIR
          PRODUTOS DO SISTEMA ANTIGO NO ESTOQUE<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(Produtos que
          vieram de pedidos feitos no sistema antigo devem ser incluídos na
          tabela de codbarras.)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='4'></td>
      </tr>
      <tr>
        <td width='76' height='21' bgcolor='#FFFFFF' align='center'>&nbsp;</td>
      </center>
      <td width='108' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'>COD.<br>
        PROD</font></b></td>
      <td width='107' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'> CÓDIGO DE BARRA</font></b></td>
      <td width='245' height='21' bgcolor='#FFFFFF' align='center'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
    <tr>
      <td width='76' height='21' bgcolor='#F5DF9C'><b><font face='Verdana' size='1'>PRODUTO<br>
        ANTIGO:</font></b></td>
    </center>
    <td width='108' height='21' bgcolor='#F5DF9C'>
      <p align='center'><font face='Verdana' size='1'><input type='text' name='codprodsant' value='$codprodsant' size='5'></font></td>
    <td width='107' height='21' bgcolor='#F5DF9C'>
      <font face='Verdana' size='1'><input type='text' name='codbarrasant' value='$codbarrasant' size='23'></font></td>
    <td width='245' height='21' bgcolor='#F5DF9C'>
      <b>  <font face='Verdana' size='1'>$nomeprod_sant</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='4'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro2</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='4'>


        <p align='center'><input type='submit' value='$b3'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>
");
*/
echo("
<a name='a4'></a>
<form method='POST' action='$PHP_SELF?Action=$Action3#a4'>
  <hr>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#FFFF99' height='31' colspan='5'><b><font size='2' face='Verdana' color='#000000'>CONFERÊNCIA DE PRODUTOS QUE DISPENSAM CODBARRA<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(Conferencia de produtos que dispensam codbarra)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='5'></td>
      </tr>
      <tr>
        <td width='70' height='21' bgcolor='#FFFFFF' align='center'>&nbsp;</td>
      </center>
      <td width='100' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'>QTDE</font></b></td>
	  <td width='100' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'>COD<br>
        PROD</font></b></td>
      <td width='142' height='21' bgcolor='#FFFFFF' align='center'>
        <p align='center'><b><font size='2' face='Verdana' color='#800000'> CÓDIGO DE BARRA</font></b></td>
      <td width='130' height='21' bgcolor='#FFFFFF' align='center'>
        <b><font size='2' face='Verdana' color='#800000'>&nbsp;NOME PRODUTO</font></b></td>
    </tr>
    <center>
    
    </center>
    <center>
    <tr>
      <td width='70' height='21' bgcolor='#FFFFCC'><b><font face='Verdana' size='1'>PRODUTO<br>
        S/CODBARRA:</font></b></td>
    </center>
   
	 <td width='100' height='21' bgcolor='#FFFFCC'>
      <p align='center'><font face='Verdana' size='1'><input type='text' name='qtdeprod' value='$qtdeprod' size='5'> :: <b>$reg32</B></font></td>
	 <td width='100' height='21' bgcolor='#FFFFCC'>
      <p align='center'><font face='Verdana' size='1'><input type='text' name='codprodsanta' value='$codprodsanta' size='5'></font></td>
    <td width='142' height='21' bgcolor='#FFFFCC'>
      <font face='Verdana' size='1'><input type='text' name='codbarrasanta' value='$codbarrasanta' size='23'></font></td>
    <td width='130' height='21' bgcolor='#FFFFCC'>
      <b>  <font face='Verdana' size='1'>$nomeprod_santa</font></b></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='4'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro3</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='5'>


        <p align='center'><input type='submit' value='$b4'></td>
    </tr>
    </table>
    </center>
  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>

		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////
}
endif;

include ("sif-rodape.php");
}

?>
       
