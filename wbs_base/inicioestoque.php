 

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codest=$codest";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "ESTOQUE";
$titulo = "ADMINISTRAÇÃO ESTOQUE";


$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();

// ACOES PRINCIPAIS DA PAGINA
	
	/*if ($Action=="insert" and $codemp<>""):
	$numreginsert = $prod->listProdgeral("estoque", "codprod=$codprod and codemp=$codemp", $array33, $array_campo33, "" );
	if ($numreginsert <> ""):
			$prod->listProdgeral("estoque", "codprod=$codprod and codemp=$codemp", $array32, $array_campo32 , "");
			$prod->mostraProd( $array32, $array_campo32, 0 );
			$codest = $prod->showcampo0();
			
			$Action = "update";
			$retorno="";
	endif;
	/*else:
		$Action = "list";
		$retorno="";
	endif;
*/
switch ($Action) {

	    case "insert":
		
		$Actionsec="list";
	
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

		break;

    case "update":

		$prod->listProd("estoque", "codest=$codest");
		
		
		$codestold = $prod->showcampo0();
		$codempold = $prod->showcampo1();
		$codprodold = $prod->showcampo2();
		$qtdeold = $prod->showcampo3();
		$reservaold = $prod->showcampo4();
		$estoqueminold = $prod->showcampo5();
		$fatorataold = $prod->showcampo6();
		$fatorvarold = $prod->showcampo7();
		$codmoedaold = $prod->showcampo8();
		$pucold = $prod->showcampo9();
		$pucold = number_format($pucold, 2,',', '.');
		$dataucold = $prod->showcampo10();
		$pcmold = $prod->showcampo11();
		$pcmold = number_format($pcmold, 2,',', '.');

		$dataucold = str_replace('-','',$dataucold);

		$anoucold = substr($dataucold,0,4);
		$mesucold = substr($dataucold,4,2);
		$diaucold = substr($dataucold,6,2);

			
		if ($retorno){
		
		$datauc = $anouc . $mesuc . $diauc;

		$prod->setcampo5($estoquemin);
		$prod->setcampo6($fatorata);
		$prod->setcampo7($fatorvar);
		$prod->setcampo8($codmoeda);
		$puc = str_replace('.','',$puc);
		$puc = str_replace(',','.',$puc);
		$prod->setcampo9($puc);
		$pcm = str_replace('.','',$pcm);
		$pcm = str_replace(',','.',$pcm);
		$prod->setcampo11($pcm);
		$prod->setcampo10($datauc);
		
		
						
		$prod->upProd("estoque",  "codest=$codest");
		
		$Actionsec="list";
		
		$codempselect=$codempold;

		}
		$nomeformsec=" ATUALIZAR $nomeform ";
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

	
		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);

		$campopesq = "nomeprod";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";

		if ($palavrachave == ""):
							
			$condicao2 = "";
			if ($codempselect <> ""):

				if ($codpesq <>""):
					$condicao3 .= "estoque.codemp='$codempselect' ";
					$condicao3 .= "and estoque.codprod='$codpesq' ";
					$condicao3 .= "and estoque.codprod=produtos.codprod ";
					$condicao3 .= "and produtos.unidade not like 'CJ'  ";
				else:
					$condicao3 = "estoque.codemp='$codempselect' and estoque.codprod=produtos.codprod and produtos.unidade not like 'CJ'";
				endif;
			
			else:

				$condicao3 = " estoque.codprod=produtos.codprod and produtos.unidade not like 'CJ' ";
		
			endif;
		

		else:
			
			if ($codempselect <> ""):

				if ($codpesq <>""):
					$condicao3 .= "estoque.codemp='$codempselect' ";
					$condicao3 .= "and estoque.codprod='$codpesq' ";
					$condicao3 .= "and estoque.codprod=produtos.codprod ";
					$condicao3 .= "and produtos.unidade not like 'CJ'  ";
				else:
					$condicao3 = "estoque.codemp='$codempselect' and estoque.codprod=produtos.codprod and produtos.unidade not like 'CJ' and " . $condicao2 ;
				endif;
							
			else:

				$condicao3 = " estoque.codprod=produtos.codprod and produtos.unidade not like 'CJ' ";
			
			endif;

		endif;

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "estoque, produtos", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("estoque.codest, estoque.codemp, estoque.codprod,  estoque.qtde, estoque.reserva, estoque.estoquemin, produtos.nomeprod, produtos.hist, produtos.unidade ", "estoque, produtos", $condicao3, $array, $array_campo, $parm );
		
		$Action="list";

		
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 


		/*
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		if ($palavrachave == ""):
			
			$condicao2 = "";
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq'";
				$condicao3 = $condicao2 . "and unidade not like 'CJ'  ";
			else:
				$condicao3 = $condicao2 . " unidade not like 'CJ'  ";
			endif;

		else:
			
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq'";
			endif;
			$condicao3 =  " unidade not like 'CJ' and " . $condicao2 ;
		endif;

		$numreg = $prod->listProdgeral($tabela, $condicao3, $array, $array_campo, "" );
		
		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral($tabela, $condicao3, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 
				
		*/
}

// OCULTAR TODO O RESTO DA PÁGINA ////

if ($Actionter == "unlock"){

include("sif-topo.php");

if($Action <> "list" ):


/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////
	
	$prod->listProd("produtos", "codprod=$codprod");
	$nomeprod = $prod->showcampo19();

	$prod->listProd("empresa", "codemp=$codempold");
	$nomeemp = $prod->showcampo1();
	
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
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
  </center>
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>ADMINISTRAÇÃO</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempold&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
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

	<div align='center'>
<center>
    <div align='left'></div>
    <table border=0 cellpadding=0 cellspacing=0 width=550>
      <tbody> 
      <tr bgcolor='#93BEE2'> 
        <td width='100%' colspan='2'> 
          
          </td>
      </tr>
      <tr bgcolor='#93BEE2'> 
        <td colspan=2 width='100%'> 
          <div align=center> 
            <table border=0 cellpadding=0 cellspacing=0 width=548>
              <tbody> 
              <tr> 
                <td bgcolor=#ffffff width='100%' align='center'> &nbsp; 
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='1' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Produto Selecionado: <b>$nomeprod</b><br><br></font></td>
                          </tr>
					  
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Empresa:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>$nomeemp</b>
                              </font></td>
                          </tr>
                           				
						 
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Qtde:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> <font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>$qtdeold</b>
                              </font>
							  <!--
                              <input type='text' value='$qtdeold' name='qtde' size='5' maxlength='3'>-->
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Reserva:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> <font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>$reservaold</b>
                              </font><!--
                              <input type='text' value='$reservaold' name='reserva' size='5' maxlength='3'>-->
                              </font></td>
                          </tr>
						
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Estoque Mínimo:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                               <input type='text' value='$estoqueminold' name='estoquemin' size='5' maxlength='3'>
                              </font></td>
                          </tr>
							<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Moeda</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1'  class=drpdwn name='codmoeda'>
                             
						  
	");

	$prod->listProdgeral("moeda", $condicao2, $array, $array_campo , "order by tipo");
	for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$tipo = $prod->showcampo1();
			$codmoeda = $prod->showcampo0();
	echo("		
		<option selected value='$codmoeda'>$tipo</option>
	");
	}
	
	if ($Action=="update"){

		$prod->listProdgeral("moeda", "codmoeda=$codmoedaold", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );

			$tipo = $prod->showcampo1();
			
	echo("		
		<option selected value='$codmoedaold'>$tipo</option>
	");
	
	}
	
	echo("	
						  </select>
						  </font></td>
                          </tr>
						 <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Preço Última Compra:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$pucold' name='puc' size='10' onChange='consisteValor(this.form, this.form.puc.name, true)'>
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Data Última Compra:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' name='diauc' value='$diaucold' size='2'  maxlength='2'>
                              / 
                              <input type='text' name='mesuc' value='$mesucold' size='2'  maxlength='2'>
                              / 
                              <input type='text' name='anouc' value='$anoucold' size='4'  maxlength='4'>
                              </font></td>
                          </tr>
						  
						  <tr bgcolor='#D6E7EF''> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Preco Custo Médio:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$pcmold' name='pcm' size='10' onChange='consisteValor(this.form, this.form.pcm.name, true)'>
                              </font></td>
                          </tr>
							
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fator Atacado:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$fatorataold' name='fatorata' size='20' >
                              </font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fator Varejo:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$fatorvarold' name='fatorvar' size='20' >
                              </font></td>
                          </tr>
						  						 
	                      <tr> 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
				");
			if ($Action=='update'):$value="Atualizar";else:$value="Adicionar";endif;
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
					
                   </p>
					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codprod' value='$codprodold'>
                  <input type='hidden' name='codest' value='$codestold'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>


                 <br> </form>
                </td>
              </tr>
              <tr> 
                <td bgcolor=#FFFFFF width='100%'> 
                  <p align='center'><font size='1' face='Verdana'></font></p>
                </td>
              </tr>
              </tbody> 
            </table>
          </div>
        </td>
      </tr>
      <tr> 
        <td bgcolor='#93BEE2' width='50%'><img height=11 
                  src='images/inf-esq.gif' width=11></td>
        <td align=right bgcolor='#93BEE2' width='50%'><img height=11 
                  src='images/inf-dir.gif' 
            width=11></td>
      </tr>
      </tbody> 
    </table>
    <p>&nbsp;</p>
  </center>
</div>
	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

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
  </center>

		<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width=' 223' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width=' 327' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>

	  <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
	  </p>
			  </td>
				</form>
    </tr>
			
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

	

	<br><div align='left'>
 
 
</div>
//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

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

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq#cliente'>$nomeemp</option>
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


	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$contatoold = $prod->showcampo16();

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
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></td>
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


<br>
<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='40%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME PROD</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RESERVA</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>EST MIN</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    
  </tr> 
	");

	
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codest = $prod->showcampo0();
			$codemp = $prod->showcampo1();
			$codprod = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$reserva = $prod->showcampo4();
			$estoquemin = $prod->showcampo5();
			$nomeprod = $prod->showcampo6();
			$hist = $prod->showcampo7();
			$unidade = $prod->showcampo8();		
				
			if ($unidade == "UM"){$cor ="#D6E7EF";}else{$cor="#F3F8FA";}
			if ($hist == "Y"){$cor ="#F2E4C4";}
		

echo(" 
	<tr bgcolor='$cor'> 
			 <td width='10%' height='0'> 
      <div align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codprod</font></div>
		 </td>
		<td width='40%' height='0'> 
      <div align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></div>
		 </td>
		 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$qtde</font></b></div>
		 </td>
		  <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$reserva</font></b></div>
		  </td>
		 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$estoquemin</font></b></div>
		 </td>

			<td align='center' width='10%' height='0'>
");

if ($hist <> "Y"){
echo("
			<font size='1'><b><a href='$PHP_SELF?Action=update&codprod=$codprod&codest=$codest&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font>
");		
}
echo("
</td>
	   </tr>
  ");

	 }
echo("
	</table>
	");
}




/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" and $codempselect <>""){
/// CONTADOR DE PAGINAS ////

$compl= "codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg'";   /// Complemento para a parte de mudanca de pagina
include("numcontg.php");



}


echo("<br><br>");
include ("sif-rodape.php");

}
?>
       
