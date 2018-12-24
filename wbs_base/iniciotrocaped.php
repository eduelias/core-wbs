<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTOS";
$nomeformsec = "Troca e Adição de Produtos no pedido";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($codempvend <> 0){$codempselect = $codempvend;}


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){

		// PESQUISA PELO CODBARRA ANTERIOR
		$reg = $prod->listProd("codbarra", "codbarra = '$codbarraant' and codbarraped = '1' and codemp=$codempselect");

		$codcb = $prod->showcampo0();
		$codprod = $prod->showcampo2();
		$codped = $prod->showcampo4();
		$codprodcj = $prod->showcampo5();
		$tipocj = $prod->showcampo6();
		#echo("codped=$codped");
		
		if($reg <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprod");
			$chkcb_ant = $prod->showcampo0();
			if ($chkcb_ant == "N"){$reg = 0;}
		}

		// PESQUISA PELO CODBARRA NOVO
		$reg1 = $prod->listProd("codbarra", "codbarra = '$codbarranovo' and codbarraped <> 1 and codemp=$codempselect");

		$codcbnovo = $prod->showcampo0();
		$codprodnovo = $prod->showcampo2();
		
		if($reg1 <> 0){
			$prod->listProdU("chkcb","produtos", "codprod=$codprodnovo");
			$chkcb_novo = $prod->showcampo0();
			if ($chkcb_novo == "N"){$reg1 = 0;}
		}

		if ($reg <> 0 and $reg1 <>0){
		
		if ($codprod == $codprodnovo){
		
			$prod->listProd("pedidoprod", "codped=$codped and codprod=$codprod and codprodcj = $codprodcj and tipocj='$tipocj'");

			$codpped = $prod->showcampo0();
			$codcbped = $prod->showcampo10();
			$codcb_array = explode(":", $codcbped);

				for($i = 0; $i < count($codcb_array); $i++ ){
					if ($codcb_array[$i] == $codcb){$codcb_array[$i] = $codcbnovo;}
				}
			$codcbatual = implode(":", $codcb_array);

			// ALTERA VALORES NA TABELA PEDIDO
			$prod->listProd("codbarra", "codcb=$codcb");
				
				$prod->setcampo4(0);
				$prod->setcampo5(0);
				$prod->setcampo6(0);
				$prod->setcampo7("");
				$prod->upProd("codbarra", "codcb='$codcb'");

			$prod->listProd("codbarra", "codcb=$codcbnovo");
				
				$prod->setcampo4($codped);
				$prod->setcampo5($codprodcj);
				$prod->setcampo6($tipocj);
				$prod->setcampo7(1);
				$prod->upProd("codbarra", "codcb='$codcbnovo'");

			$prod->listProd("pedidoprod", "codpped=$codpped");
				$prod->setcampo10($codcbatual);
				$prod->upProd("pedidoprod", "codpped='$codpped'");


			$Action="end";

			$Actionter = "lock";
			$prod->msggeral("O CÓDIGO DE BARRA foi substituido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);

		}else{

			$erro = "PRODUTOS NÃO COINCIDEM";
			$Action="list";
		}

		}else{

			$erro = "CÓDIGO DE BARRA INCORRETO";
			$Action="list";

		}
		#echo("codcb = $codcb");
		#echo("codcbped = $codcbped");
		#echo("codcbnovo = $codcbnovo");
		#echo("codcbatual = $codcbatual");

		$Action="list";
		
		}
		$desloc=0;

		
        break;

	 case "update":

	
		 
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		
		$Actionsec="list";
		
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br></font><font color='#FF9933' size='3' face='Verdana'>SUBSTITUIÇÃO</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
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

if ($codempvend == "0"){

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


<form method='POST' action='$PHP_SELF?Action=troca'>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
        <td width='542' bgcolor='#93BEE2' height='31' colspan='2'><b><font size='2' face='Verdana' color='#000000'>SUBSTITUIÇÃO
          DE PRODUTO<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(Os produtos só
          poderão ser substituídos ou adicionados se o PEDIDO não estiver PAGO.)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='2'></td>
      </tr>
      <tr>
        <td width='171' height='21' bgcolor='#93BEE2'><font size='1' face='Verdana'><b>
        CÓDIGO DO PEDIDO:</b></font></td>
      <td width='365' height='21' bgcolor='#93BEE2'>
       <input type='text' name='codbarra' size='13' maxlength='13'>
       <font face='Verdana' size='1'>ex: 7890100001234</font></td>
    </tr>
      <tr>
        <td width='171' height='21' bgcolor='#FFFFFF'>&nbsp;</td>
      </center>
      <td width='365' height='21' bgcolor='#FFFFFF'>
        <p align='left'><b><font size='2' face='Verdana'>&nbsp; CÓDIGO DO 
        PRODUTO</font></b></td>
    </tr>
    <center>
    
    <tr>
      <td width='171' height='21' bgcolor='#F5DF9C'><font size='1' face='Verdana'><b>PRODUTO
        ANTERIOR:</b></font></td>
    </center>
    <td width='365' height='21' bgcolor='#F5DF9C'>
      <p align='left'><input type='text' name='codprodant' size='10'></td>
    </tr>
    <center>
    <tr>
      <td width='171' height='21' bgcolor='#D6E7EF'><font size='1' face='Verdana'><b>NOVO
        PRODUTO:</b></font></td>
    </center>
    <td width='365' height='21' bgcolor='#D6E7EF'>
      <p align='left'><input type='text' name='codprodnovo' size='10'></td>
    </tr>
		<tr>
      <td width='542' height='21' colspan='2'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro</font></b></td>
    </tr>

    <center>
    <tr>
      <td width='542' height='21' colspan='2'>
        <p align='center'><input type='submit' value='Substituir Produto'></td>
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

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
    <td width='100%'>
      <hr>
    </td>
  </tr>
  </table>
  </center>
</div>


<form method='POST' action='$PHP_SELF?Action=insert'>
  <div align='center'>
    <center>
    <table border='0' width='550' height='128' cellpadding='3'>
      <tr>
      </center>
    </tr>
    <center>
    
    <tr>
    </center>
    </tr>
    <center>
    <tr>
    </center>
    </tr>

    <center>
      <tr>
        <td width='542' bgcolor='#93BEE2' height='31' colspan='2'><b><font size='2' face='Verdana' color='#000000'>
        ADIÇÃO DE PRODUTO<br>
          </font></b><font face='Verdana' color='#000000' size='1'>(Os produtos só
          poderão ser substituídos ou adicionados se o PEDIDO não estiver PAGO.)</font></td>
      </tr>
      <tr>
        <td width='542' height='21' colspan='2'></td>
      </tr>
      <tr>
        <td width='171' height='21' bgcolor='#93BEE2'><font size='1' face='Verdana'><b>
        CÓDIGO DO PEDIDO:</b></font></td>
      <td width='365' height='21' bgcolor='#93BEE2'>
       <input type='text' name='codbarra' size='13' maxlength='13'>
       <font face='Verdana' size='1'>ex: 7890100001234</font></td>
      </tr>
      <tr>
        <td width='171' height='21' bgcolor='#FFFFFF'>&nbsp;</td>
      <td width='365' height='21' bgcolor='#FFFFFF'>
        <p align='left'><b><font size='2' face='Verdana'>&nbsp; CÓDIGO DO 
        PRODUTO</font></b></td>
      </tr>
      <tr>
      <td width='171' height='21' bgcolor='#D6E7EF'><font size='1' face='Verdana'><b>NOVO
        PRODUTO:</b></font></td>
    <td width='365' height='21' bgcolor='#D6E7EF'>
      <p align='left'><input type='text' name='codprodnovo' size='10'></td>
      </tr>
      <tr>
      <td width='542' height='21' colspan='2'>
        <p align='center'><b><font size='2' face='Verdana' color='#FF0000'>$erro</font></b></td>
      </tr>
      <tr>
      <td width='542' height='21' colspan='2'>
        <p align='center'><input type='submit' value='Adicionar Produto'></td>
      </tr>
      <tr>
      <td width='542' height='21' colspan='2'>
        &nbsp;</td>
      </tr>
      <tr>
      <td width='542' height='21' colspan='2'>
        &nbsp;</td>
      </tr>
    <tr>
      <td width='542' height='21' colspan='2'>
        &nbsp;</td>
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
       
