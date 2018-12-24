<?php

include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicaoex = " idicj = 'Y'";			// condicao extra para a pesquisa -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "ADMINISTRAÇÃO DE PRODUTO";
$nomeformsec=" ADICIONAR PRODUTOS AO CONJUNTO";


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

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
		for($i = 0; $i < $cont; $i++ ){
		
		$prod->listProd("relacoes", "codprod=$codprodselect and codsubprod=$codprod[$i]");
		$numreg = $prod->listProdgeral("relacoes", "codprod=$codprodselect and codsubprod=$codprod[$i]", $array, $array_campo, "" );

		$qtdeold = $prod->showcampo3();

		$prod->setcampo1($codprodselect);
		$prod->setcampo2($codprod[$i]);
		if($qtde[$i] <> "0"):
			$qtdenew=$qtdeold+$qtde[$i];
			$prod->setcampo3($qtdenew);
			
			if ($numreg):
			$prod->upProd("relacoes", "codprod=$codprodselect and codsubprod=$codprod[$i]");
			else:
			$prod->setcampo0("");
			$prod->addProd("relacoes", $ureg);
			endif;
		endif;
		$prod->setcampo3(0);
		}

		$Actionsec="list";
				
        break;

 

	 case "list":
		
	
		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		$prod->delProd("relacoes", "codrel=$codrel");

		$Actionsec="list";
		
		 break;

}


// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		if ($palavrachave == ""):
			
			$condicao2 = "";
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq'";
				$condicao3 = $condicao2 . "and unidade not like 'CJ'  ";
				$condicao3 .= " and hist <> 'Y'  ";
			else:
				$condicao3 = $condicao2 . " unidade not like 'CJ'  ";
				$condicao3 .= " and hist <> 'Y'  ";
			endif;

		else:
			
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq'";
			endif;
			$condicao3 =  " unidade not like 'CJ' and " . $condicao2 ;
			$condicao3 .= " and hist <> 'Y'  ";
		endif;

		
		#$numreg = $prod->listProdgeral($tabela, $condicao3, $array, $array_campo, "" );
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		#echo "A!UI";
		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral($tabela, $condicao3, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

include("sif-topo.php");



/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

	$prod->listProd($tabela, "codprod=$codprodselect");
				
		$nomeprodold = $prod->showcampo19();
				
		$descresold = $prod->showcampo4();
		$descdetold = $prod->showcampo5();
		$unidadeold = $prod->showcampo7();


echo("

<div align='center'>
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>ADMINISTRAÇÃO</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=update&amp;codempselect=$codemp&amp;codprod=$codprodselect&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgold&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a></font></td>
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
</div>
<br>
<a name='dadosadd'></a>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS ADICIONADOS AO CONJUNTO</font></b></td>
  </tr>
</table>


<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='$bgcortopo'> 
    <td colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font size='1'  color='#FFFFFF'>PRODUTO</font></b></font></td>
  </tr>
  <tr bgcolor='$bgcorlinha'>
    <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>COD.:<font size='2'> $codprodselect - 
      </font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF9933'><b><font size='2'>$nomeprodold</font></b></font></td>
    <td width='120'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>UNID.: 
      </font></b><font size='2'><b>$unidadeold</b> </font></font></td>
  </tr>
  
</table>

<br>
<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='$bgcortopo'> 
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b></b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS DO CONJUNTO</b></font></td>
   <td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PVV(R$)</b></font></td>
    <td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PVA(R$)</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
  ");

	  $prod->listProdgeral("relacoes", "codprod=$codprodselect", $array3, $array_campo3 , "");

	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codrel = $prod->showcampo0();
			$codsubprod = $prod->showcampo2();
			$qtde = $prod->showcampo3();
		
			$prod->listProdgeral("produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
			$prod->mostraProd( $array1, $array_campo1, 0 );

			$nomeprod = $prod->showcampo19();
			$pvvcj = $prod->showcampo13();
			$pvacj = $prod->showcampo15();
	
		$k=$i+1;

			 $pvvcjf = number_format($pvvcj,2,',','.'); 
			 $pvacjf = number_format($pvacj,2,',','.'); 


echo(" 
	<table border='0' width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
  <tr bgcolor='$bgcorlinha'> 
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$k</b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
    <td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$pvvcjf</font></td>
	 <td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$pvacjf</font></td>
	 <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' ><b>$qtde</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codrel=$codrel&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodselect=$codprodselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
  </tr>
		
  ");

	$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
	$pvacjtotal = $pvacjtotal + ($pvacj*$qtde);
	 }

	 $pvvcjtotal = number_format($pvvcjtotal,2,',','.'); 
	$pvacjtotal = number_format($pvacjtotal,2,',','.'); 
	 
echo("
 <tr bgcolor='#ffffff'> 
	<td width='10%' height='0' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
    <td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b> </b></font></td>
	 <td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b></b></font></td>
	 <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
  <tr bgcolor='$bgcorlinha'> 
	<td width='10%' height='0' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b> TOTAL</b></font></td>
    <td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b> $pvvcjtotal</b></font></td>
	 <td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pvacjtotal</b></font></td>
	 <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>

</table>

	<br>
<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
      <form name='form1' method='post' action='$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pgold'>
        <div align='right'>
          <table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
             
              <td width='100%'>
                <p align='right'>
          <input class='sbttn' type='submit' name='Submit' value='Finalizar => Inclusão dos produtos do conjunto'>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </td>
  </tr>
</table>


     <hr width='80%' align='center' id='1' size='1'>
<br>
<a name='produtos'></a>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTA DE PRODUTOS</font></b></td>
  </tr>
</table>

	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codprodselect' value='$codprodselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
		<input type='hidden' name='connectok' value='$connectok'>
        <input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='pgold' value='$pgold'>

	  </p>
	</form>
<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr> 
    <td width='95'> 
      <div align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> 
        &nbsp; </b> </font></div>
    </td>
    <td width='455'> 
      <div align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></div>
    </td>
  </tr>
  <tr> 
    <td colspan='2'>&nbsp;</td>
  </tr>
</table>


<table border='0' width='550'>
  <tr>
    <td width='100%'>
          <form method='POST' action='$PHP_SELF?Action=insert' >
            <table border='0' width='100%'>
              <tr bgcolor='#93BEE2'> 
                <td width='10%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>COD.&nbsp;</font></b></td>
				<td width='50%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>NOME PRODUTO&nbsp;</font></b></td>
				<td width='10%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>UNID.</font></b></td>
                <td width='8' align='center' nowrap height='5' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></td>
                <td width='22%' nowrap height='5' ><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>&nbsp;</b> 
                  </font></td>
              </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nomeprod = $prod->showcampo19();
			$codprod[$i] = $prod->showcampo0();
			$unidade = $prod->showcampo7();


		echo("
		 <tr bgcolor='#d6e7ef'> 
				<td width='10%' align = 'center'><font face='Verdana' size='1'>$codprod[$i]</font></td>
				<td width='50%' ><font face='Verdana' size='1'>$nomeprod</font></td>
				<td width='10%' align='center' ><font face='Verdana' size='1'>$unidade</font></td>
                <td width='8%' align='center' ><font face='Verdana' size='1'> 
                 <input type='text' name='qtde[$i]' size='4' maxlength='3' value='0'>

	</font></td>
                <td width='22%' >&nbsp; </td>
              </tr>
			  <input type='hidden' name='codprod[$i]' value='$codprod[$i]'>
		");
	 }
	 #}
		echo(" 

 <tr> 
              
                <td width='100%' colspan='5'> <br>
                  <p align='right'><font face='Verdana' size='1'><b><font size='2'>
                    <input  class='sbttn' type='submit' name='Submit' value='Adicionar => Produtos ao conjunto'>
                    </font></b></font></p>
                </td>
              </tr>
            </table>

				  <input type='hidden' name='cont' value='$i'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codprodselect' value='$codprodselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
				  <input type='hidden' name='pgold' value='$pgold'>
      </form>
    </td>
  </tr>
</table>


  </center>
</div>
		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

if ($Action== "list"){
/// CONTADOR DE PAGINAS ////

/// Complemento para a parte de mudanca de pagina
$compl= "codprodselect=$codprodselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold#produtos";   

include("numcontg.php");
}

include ("sif-rodape.php");


?>
       
