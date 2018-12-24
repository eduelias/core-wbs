

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 10;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicaoex = " idicj = 'Y'";			// condicao extra para a pesquisa -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$codvendselect=1;
#$codempselect=1;
$titulo = "ORDEM DE COMPRA";
$titulo1 = "MODIFICAR ORDEM DE COMPRA";

$Actionter = "unlock";
$Actionfour = "lock";

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

$dataatual = $prod->gdata();

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		#if ($codempvend <> 0){$codempselect = $codempvend;}


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":
    
   		 $prod->listProdU("codemp","oc", "codoc=$codocnew");
   		 $codempselect = $prod->showcampo0();

		
		#-- Separa os produtos do Conjunto
		$nprod= $cont;
		
				
		#-- UP/ADD os produtos na tabela OCPRODTEMP
		for($i = 0; $i < $nprod; $i++ ){

			if ($codprod[$i] <> "" and $qtde[$i] <> 0){

				#$prod->setcampo3(0);	
				#$prod->setcampo4(0);
				#$prod->setcampo8(0);
				#$prod->setcampo5(0);
				#$prod->setcampo11(0);
				
				#$prod->listProd("ocprod", "codoc=$codocnew and codprod=$codprod[$i]");
				#$numreg = $prod->listProdgeral("ocprod", "codoc=$codocnew and codprod=$codprod[$i] ", $array, $array_campo, "" );

				#$qtdeold = $prod->showcampo3();
				#$precoold = $prod->showcampo5();
				

				

				#$prod->setcampo1($codocnew);
				#$prod->setcampo2($codprod[$i]);
				#$preco[$i] = str_replace('.','',$preco[$i]);
				#$preco[$i] = str_replace(',','.',$preco[$i]);
				
				#$preco_novo = (($precoold*$qtdeold) + ($preco[$i]*$qtde[$i]))/($qtdeold+$qtde[$i]);

				#if ($precoold == 0){$precoold = $preco[$i];}
		
			#echo("precoold = $precoold - p[$i] = $preco[$i] - oc=$codocnew - cp=$codprod[$i]");

		
		
			#if($qtde[$i] <> 0):

				

				$qtdenew=$qtdeold+$qtde[$i];

		#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - pr=$preco[$i] - tp=$tipoprod[$i] - po=$precoold | ");

			#$preconew=$precoold+($qtde[$i]*$preco[$i]);
			#$prod->setcampo5($preconew);
				$prod->clear();
				$prod->setcampo0("");
				$prod->setcampo1($codocnew);
				$prod->setcampo2($codprod[$i]);
				$preco[$i] = str_replace('.','',$preco[$i]);
				$preco[$i] = str_replace(',','.',$preco[$i]);
				$prod->setcampo5($preco[$i]);
				$prod->setcampo3($qtdenew);
				$prod->setcampo6($garantia[$i]); 
				$prod->setcampo7($codempselect);
				$prod->setcampo12($tipo_nf[$i]);
				$prod->setcampo13($icms[$i]);
				$prod->setcampo14($ipi[$i]);
				$prod->setcampo15($dataatual);
				
				$prod->addProd("ocprod", $ureg);
				
					// INSERE MODIFICACAO
					$prod->setcampo0("");
					$prod->setcampo1($codocnew);
					$prod->setcampo2($codprod[$i]);
					$prod->setcampo3($qtde[$i]);
					$prod->setcampo4("");
					$prod->setcampo5("");
					$prod->setcampo6("");
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");
     				$prod->addProd("ocmod", $ureg);

					
			#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - ct=$cont - j=$j | ");
			/*
				if ($numreg):
					if ($qtdenew > 0 ):
					$prod->upProd("ocprod", "codoc=$codocnew and codprod=$codprod[$i]");
					
					// INSERE MODIFICACAO
					$prod->setcampo0("");
					$prod->setcampo1($codocnew);
					$prod->setcampo2($codprod[$i]);
					$prod->setcampo3($qtde[$i]);
					$prod->setcampo4("");
					$prod->setcampo5("");
					$prod->setcampo6("");
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");
     					$prod->addProd("ocmod", $ureg);
					
					else:
					#$prod->delProd("ocprod", "codoc=$codocnew and codprod=$codprod[$i]");
					endif;
				else:
					if ($qtdenew > 0 ):
					$prod->setcampo0("");
					$prod->addProd("ocprod", $ureg);
					
    					 // INSERE MODIFICACAO
					$prod->setcampo0("");
					$prod->setcampo1($codocnew);
					$prod->setcampo2($codprod[$i]);
					$prod->setcampo3($qtde[$i]);
					$prod->setcampo4("");
					$prod->setcampo5("");
					$prod->setcampo6("");
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("AD");
     					$prod->addProd("ocmod", $ureg);
				endif;
			endif;
			*/
		#endif;
		#$prod->setcampo3(0);
		#$prod->setcampo5(0);
		#$prod->setcampo4(0);
		#$prod->setcampo8(0);
		#$prod->setcampo11(0);
		
			}
		}//FOR
		$codocpesq = $codocnew;
		$Actionsec="list";
			
        break;


	case "update":
	
		$prod->listProdU("hist","oc", "codoc=$codocpesq");
		$hist = $prod->showcampo0();
		
		if ($hist == 0){
			$Actionsec="list";
		}else{
			$Action = "list";
		}
				
		 break;

	 case "list":
		
	
		$Actionsec="seclist";
	
		
		 break;

	 case "start":


		$Actionsec="list";
	
		
		 break;

	 case "delete":
		
		echo("$qtdeselect - $qtdemax - $qtdetotal");
		
		if ($ex==1){
			$prod->delProd("ocprod", "codoc=$codocnew");
			$Actionsec="list";
		}else{
			if ($ex==2){
				$prod->delProd("ocprod", "codoc=$codocnew");
				$prod->delProd("oc", "codoc=$codocnew");
				$Actionsec="seclist";
			}else{

				if ($qtdeselect == $qtdetotal){
			        
					if ($qtdeselect == $qtdemax){

					echo("DELETE");
	    				$prod->delProd("ocprod", "codpoc=$codpoc");
	    				
	    				// INSERE MODIFICACAO
					$prod->setcampo0("");
					$prod->setcampo1($codocnew);
					$prod->setcampo2($codprodoc);
					$prod->setcampo3($qtdeselect);
					$prod->setcampo4("");
					$prod->setcampo5("");
					$prod->setcampo6("");
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("EX");
     					$prod->addProd("ocmod", $ureg);

					$Actionsec="list";
					}
				
				}else{
				  
				  	if ($qtdeselect <= $qtdemax){

                                       	echo("UPDATE");
					$qn = $qtdetotal - $qtdeselect;

                              		$prod->listProd("ocprod", "codpoc=$codpoc");
					$prod->setcampo3($qn);
					$prod->setcampo4($qn);
					if ($qtdeselect == $qtdemax){
					echo("UPDATE TOTAL");
						$prod->setcampo11("OK");
					}
					$prod->upProd("ocprod", "codpoc=$codpoc");

                                        // INSERE MODIFICACAO
					$prod->setcampo0("");
					$prod->setcampo1($codocnew);
					$prod->setcampo2($codprodoc);
					$prod->setcampo3($qtdeselect);
					$prod->setcampo4("");
					$prod->setcampo5("");
					$prod->setcampo6("");
					$prod->setcampo7($dataatual);
					$prod->setcampo8($login);
					$prod->setcampo9("EX");
     					$prod->addProd("ocmod", $ureg);

					$Actionsec="list";
					}

   				}
			}
		}
		
		
		$codocpesq = $codocnew;
		
		
		 break;

	 case "check":
		
		$dataatual = date("Y-m-d H:m:s");    

               	$prod->clear();
		$prod->listProd("oc", "codoc=$codocnew");
		$prod->setcampo5($contato);
		$prod->setcampo10($obsoc);
		$prod->upProd("oc", "codoc=$codocnew");

               	$codocpesq = $codocnew;
		$Actionter="lock";
		$Actionfour="unlock";
		
		
		 break;

	#-- COPIA tabela OCPRODTEMP para OCPROD
	case "end":
		
		$prod->clear();
		$prod->listProdU("SUM((pcu*qtdecomp)+(pcu*qtdecomp*ipi/100))", "ocprod", "codoc=$codocnew");
		$voc = $prod->showcampo0();
		$prod->clear();
		$prod->listProd("oc", "codoc=$codocnew");
		$prod->setcampo15("OK");  //OC MOD
		$prod->setcampo12($voc);
		$prod->upProd("oc", "codoc=$codocnew");


		$Actionsec="seclist";

		$Actionter = "lock";
		$prod->msggeral("A ordem de compra foi modificada corretamente ", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg", 0);
		
		 break;
		 
         case "altdata":

		// ALTERA DATA DE CHEGADA
		$datavencnew = $avenc.$mvenc.$dvenc;
		$prod->listProd("oc", "codoc=$codocnew");
		$prod->setcampo11($datavencnew);
		$prod->upProd("oc", "codoc=$codocnew");

                $codocpesq = $codocnew;
		$Action = "update";


		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' ";
		
		if ($palavrachave == ""):
			
			$condicao2 = "";
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq' ";
				$condicao3 = $condicao2 . "and unidade not like 'CJ'  ";
			else:
				$condicao3 = $condicao2 . " unidade not like 'CJ'  ";
			endif;

		else:
			
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq' ";
			endif;
			$condicao3 =  " unidade not like 'CJ' and " . $condicao2 ;
		endif;

		
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, unidade, hist ", $tabela, $condicao3, $array, $array_campo, $parm );
			
		#$Action="list";


		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

if ($Actionsec == "seclist"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE(nome) like '%$palavrachave1%'";
		
		$numreg = $prod->listProdgeral("fornecedor", $condicao2, $array, $array_campo, "" );
		if ($palavrachave == ""){$condicao2 = "";}
		
		if ($codclientepesq <>""){$condicao2 = "codfor=$codforpesq";}

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral("fornecedor", $condicao2, $array, $array_campo, "order by nome limit $desloc,$acrescimo");
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}


// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");


// INCLUI CONSISTENCIA DO JAVA SCRIPT PARA O FORMULARIO
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
    //  Verifica dupla submissao  *******************************************************
    //***********************************************************************************
    //if (cond == OK)
    //{
    //    return false;
    //}


	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente
	
	if((document.form1.padd.value==0))
    {
		alert('Nenhum Produto Adicionado');
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
	if (campo == 'padd')
        return 'Prudutos';
	if (campo == 'codmoeda')
        return 'Moeda da Ordem de Compra';
    if (campo == 'dprev')
        return 'Dia da Data de Previsão';
    if (campo == 'mprev')
        return 'Mês da Data de Previsão';
    if (campo == 'aprev')
        return 'Ano da Data de Previsão';

}

//***************************************************************************************
// Função formata valores 
//***************************************************************************************

function adjust(element) {

	return element.value.replace ('.', ',');
}

function doTwo(form7, codpoc, qtdetotal, qtdemax, codprodoc)
{

var qtde= document.getElementById(\"qtde[\"+codpoc+\"]\").value;

document.form7.action = '$PHP_SELF?Action=delete&codpoc='+ codpoc +'&codprodoc='+codprodoc+'&qtdetotal='+qtdetotal+'&qtdemax='+qtdemax+'&qtdeselect='+qtde+'';
document.form7.submit();

}


</script>

");


#echo("Acao = $Action");

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

	$prod->listProd("oc", "codoc=$codocpesq");

		$codoc = $prod->showcampo0();
		$codemp = $prod->showcampo1();
		$codfor = $prod->showcampo2();
		$codmoeda = $prod->showcampo3();
		$codvend = $prod->showcampo4();
		$contato = $prod->showcampo5();
		$dtoc = $prod->showcampo7();
		$obs = $prod->showcampo10();
		$dtoc = $prod->fdata($dtoc);
		$dprevcheg = $prod->showcampo11();
		$codped_transf = $prod->showcampo14();
		$cb = $prod->showcampo15();

		$dprevcheg = str_replace('-','',$dprevcheg);
		$anopar = substr($dprevcheg,0,4);
		$mespar = substr($dprevcheg,4,2);
		$diapar = substr($dprevcheg,6,2);

		#$dprevcheg = $prod->fdata($dprevcheg);
		$hist = $prod->showcampo13();

 $prod->listProd("empresa", "codemp=$codemp");

		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);

$prod->listProd("fornecedor", "codfor=$codfor");

		$nomeforold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$tel1old = $prod->showcampo7();
		$tel2old = $prod->showcampo8();
		$cgcold = $prod->showcampo14();
		$ieold = $prod->showcampo16();
		$contatoold = $prod->showcampo17();
		$emailold = $prod->showcampo19();

 $prod->listProd("moeda", "codmoeda=$codmoeda");

		$tipomoeda = $prod->showcampo1();
		$cotacao = $prod->showcampo2();
		$datacot = $prod->showcampo3();
		$datacot = $prod->fdata($datacot);

echo("

<a name='topo'></a>
<div align='center'>
  <center>
  <table width='100%'>
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

                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo1</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'></font></td>
                      </tr>
                    </tbody>
                  </table>

<div align='center'>
  <center>
  <table border='0' width='500' cellspacing='0' cellpadding='2'>
    <tr>
      <td width='27'><img border='0' src='images/n1.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' >ESCOLHA
        DO FORNECEDOR</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2c.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' color='#FF0000'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
	 <td width='27'><font face='Verdana' size='1'><b></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b></b></font></td>
    </tr>
  </table>
  </center>
</div>

	 </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </center>
</div>
<form method='POST' name='Form54' action='$PHP_SELF?Action=altdata'>
 <div align='center'>
      <center>
      <table border='0' width='100%' cellspacing='1' cellpadding='2'>
        <tr>
          <td width='315' bgcolor='#000000'><b><font face=' Verdana, Arial, Helvetica, sans-serif' color='#F0F0F0' size='3'>$titulo:&nbsp;$codocpesq</font></b></td>
          <td width='217' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='2' color='#86ACB5'><b>
       $nomeempold </b></font></td>
        </tr>
      </center>
      <tr>
        <td width='318' bgcolor='#F0F0F0'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MOEDA DA OC:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$tipomoeda</font></td>
        <center>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>COMPRADOR:<br>
          </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        FORNECEDOR</b></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>FORNECEDOR:<br>
        </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeforold</font></b></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CNPJ:<br>
      </font></b><font color='#000000'>$cgcold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$enderecoold
        - $cidadeold - $bairroold - $estadoold - $cepold</font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>INSC. EST.:<br>
      </font></b><font color='#000000'>$ieold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br>
        </font></font></b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>$emailold</font></font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>&nbsp;$tel1old<br>&nbsp;$tel2old</font></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES</b></font></td>
        </tr>
        <tr>
          <td width='315' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS:<br>
            </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obs</font></td>
        </center>
        <td width='217' bgcolor='#F0F0F0'>
		<p align='right'><font size='1'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
      PREV. CHEGADA:<br>
      </font><font face=' Verdana, Arial, Helvetica, sans-serif'><input type='text' name='dvenc' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc' value='$anopar'  size='4' maxlength='4'></font></b></font>
        </td>
      </tr>
      <center>
      <tr>
        <td width='540' colspan='2'>
        <hr size='0'>
        </td>
      </tr>
      </table>
      </center>
    </div>

			  <p align='center'><input type='submit' value='Alterar Data OC.' name='B1' class='sbttn'></p>

	<input type='hidden' name='codocnew' value='$codocpesq'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='retorno' value='1'>
		<input type='hidden' name='desloc' value='$desloc'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
	</form>
	  <br>

<a name='lista'></a>
<table width='100%' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ETAPA 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTA DE PRODUTOS ADICIONADOS AO PEDIDO</font></td>
  </tr>
</table>
	<form method='POST' action='$PHP_SELF?Action=delete#insert' name='form7'>
<table border='0' width='100%'  cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'>
    <td width='4%'>&nbsp;</td>
	<td width='29%' height='29'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS</b></font></td>
	<td width='4%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='8%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br /> 
    UNIT&Aacute;RIO </b></font></td>
	<td width='8%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR <br />
    TOTAL </b></font></td>
	<td width='7%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>ICMS<br />
(%)</b></font></td>
	<td width='7%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>IPI<br />
(%)</b></font></td>
	<td width='7%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br />
DO IPI </b></font></td>
	<td width='7%' height='29' align='center'>
	<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>GAR<br>
	(MÊS)</b></font></td>
	<td width='4%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>TIPO</b></font></td>
	<td width='4%' height='29' align='center'>
	<p align='center'><b>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'>
	MOD<br>
	MAX.</font></b></td>
	<td width='4%' height='29' align='center'>
	<p align='center'><b>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'>
	QTDE<br>
	MOD</font></b></td>
	<td align='center' width='7%' height='29'>&nbsp;</td>
  </tr>


  ");
$qtdemax = 0;
$qtde = 0;
	  $prod->listProdgeral("ocprod", "codoc=$codocpesq", $array3, $array_campo3 , "");

	 $padd = count($array3);
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			#$codprodcj = $prod->showcampo8();
			$pcu = $prod->showcampo5();
			$garantia = $prod->showcampo6();
			$icms = $prod->showcampo13();
			$ipi = $prod->showcampo14();
			$tipo_nf = $prod->showcampo12();
			$put= $qtde*$pcu;
			
			
			$v_icms = ($qtde*$pcu*$icms)/100;
			$v_ipi = ($qtde*$pcu*$ipi)/100;
			$v_ipif = $prod->fpreco($v_ipi);
			
			$prod->listProdgeral("produtos", "codprod=$codprodoc", $array11, $array_campo11 , "");
			$prod->mostraProd( $array11, $array_campo11, 0 );

			$nomeprod = $prod->showcampo19();
			$unidadeold = $prod->showcampo7();
			
			/*
			$prod->listProdgeral("produtos", "codprod=$codprodcj", $array12, $array_campo12 , "");
			$prod->mostraProd( $array12, $array_campo12, 0 );

			$nomeprodcj = $prod->showcampo19();
			*/
			
		

		$k=$i+1;

		$fput = $prod->fpreco($put);
		$fpcu = $prod->fpreco($pcu);

		$prod->listProdSum("COUNT(*)", "codbarra", "codoc = $codocpesq and codprod = $codprodoc", $array99, $array_campo99, "" );
		$prod->mostraProd( $array99, $array_campo99, 0 );
		$qtdeinserida = $prod->showcampo0();
		$qtdemax = $qtde - $qtdeinserida;
		

echo(" 
	
  <tr bgcolor='#F2E4C4'>
   <td width='4%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$codprodoc</b></font></td>
	<td width='29%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
    <td width='4%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$fpcu</font></td>
	<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$fput</b></font></td>
	<td align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$icms</font></td>
	<td align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ipi</font></td>
	<td align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipif</font></td>
	<td width='7%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$garantia</font></td>
	<td width='4%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong>$tipo_nf</strong></font></td>
	<td width='4%' height='0' align='center'><font color='#FF0000'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$qtdemax</font></b></font></td>
	<td width='4%' height='0' align='center'>
	<input type='text' name='qtde[$codpoc]' id='qtde[$codpoc]' size='3' value='0'></td>
    <td align='center' width='7%' height='0'>
	<input name='imageField' type='image' src='images/bteliminar.png' width='16' height='16' alt='Modificar Produto'  border='0' onClick=\"doTwo(form7, $codpoc, $qtde, $qtdemax, $codprodoc)\">	</td>
  </tr>
	
  ");

	$ptotal = $ptotal + $put;
	$v_icmst = $v_icmst + $v_icms;
	$v_ipit = $v_ipit + $v_ipi;
	 }
	$ptotalf = $prod->fpreco($ptotal);
	
	$v_icmstf = $prod->fpreco($v_icmst);
	$v_ipitf = $prod->fpreco($v_ipit);
	
	$ptotal_notaf = $prod->fpreco($ptotal+$v_ipit);
echo(" 
 <tr bgcolor='#FFFFFF'>
    <td width='4%'>&nbsp;</td>
	<td width='29%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	</font></td>
    <td width='4%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='8%' height='0' align='center'>&nbsp;</td>
	<td width='8%' height='0' align='center'>&nbsp;</td>
	<td width='7%' align='center'>&nbsp;</td>
	<td width='7%' align='center'>&nbsp;</td>
	<td width='7%' align='center'>&nbsp;</td>
	<td width='7%' height='0' align='center'>&nbsp;</td>
	<td width='4%' align='center'>&nbsp;</td>
	<td width='4%' height='0' align='center'>&nbsp;</td>
	<td width='4%' height='0' align='center'>	</td>
    <td align='center' width='7%' height='0'>	</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_icmstf</font></td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL DOS PRODUTOS:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ptotalf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'></td>
    <td align='center' height='0'></td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL IPI:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipitf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'></td>
    <td align='center' height='0'></td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL DA NOTA:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong>$ptotal_notaf</strong></font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'></td>
    <td align='center' height='0'></td>
  </tr>

		</table>
			<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codocnew' value='$codocpesq'>
		<input type='hidden' name='codforselect' value='$codforselect'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	        <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>

	  </p>




	</form>
");
	/*
	<br>
<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
            <div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='28'><img border='0' src='images/bt-cancelaped.gif' width='26' height='27'></td>
      <td width='126'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocpesq&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&ex=2&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CENCELAR OC</a></b></font></td>
      <td width='29'><font size='1' face='Verdana'><b><img border='0' src='images/bt-recalculaped.gif' width='27' height='27'></b></font></td>
      <td width='198'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocpesq&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pg#lista'>EXCLUIR TODOS PRODUTOS</a></b></font></td>
      <td width='198'></td>
    </tr>
  </table>
  </center>
</div>
 
    </td>
  </tr>
</table>
*/
echo("
<table border='0' width='100%' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>





<a name='insert'></a>

	<table width='100%' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - ESCOLHA DE PRODUTOS</font></b></td>
  </tr>
</table>



	<form method='POST' action='$PHP_SELF?Action=update#insert' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codocpesq' value='$codocpesq'>
		<input type='hidden' name='codforselect' value='$codforselect'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
				<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>

	  </p>




	</form>
	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
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
	
<table border='0' width='100%' align='center'>
  <tr>
    <td width='100%'>
          <form method='POST' action='$PHP_SELF?Action=insert#lista' >
            <table border='0' width='100%'>
              <tr bgcolor='#93BEE2'> 
                <td width='10%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>COD.&nbsp;</font></b></td>
				<td width='40%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>PRODUTO</font></b></td>
				<td width='8' align='center' nowrap height='5' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></td>
                <td width='17%' nowrap height='5' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PC + ICMS </b> 
                  </font></td>
				<td width='15%' align='center' nowrap ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ICMS(%)</b></font></td>
				<td width='15%' align='center' nowrap ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>IPI(%)</font></b></td>
				<td width='15%' height='5' align='center' nowrap ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>GARANTIA (MÊS)</font></b></td>
				<td width='10%' height='5' align='center' nowrap ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>TIPO</font></b></td>
				</tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codprod[$i] = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$unidade[$i] = $prod->showcampo2();
			$hist_prod = $prod->showcampo3();

		if ($hist_prod  == Y){$cor = "#F9EAC6";}else{$cor = "#D6E7EF";}

		echo("
		 <tr bgcolor='$cor'> 
				<td width='10%' align = 'center'><font face='Verdana' size='1'>$codprod[$i]</font></td>
				<td width='40%' ><font face='Verdana' size='1'>$nomeprod</font></td>
				<td width='8%' align='center' ><font face='Verdana' size='1'> 
                <input type='text' name='qtde[$i]' size='5' maxlength='4' value='0'></font></td>
                <td width='17%' align = 'center' > 
			    <input type='text' name='preco[$i]' size='10' maxlength='10' value='0' onKeyUp='this.value = adjust(this);'></td>
				<td width='15%' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
				  <select name='icms[$i]' id='icms[$i]'>
				    <option value='0'>0</option>
				    <option value='7'>7</option>
				    <option value='12'>12</option>
				    <option value='18'>18</option>
				    <option value='25'>25</option>
				    <option value='30'>30</option>
                                    </select>
				</font></td>
				<td width='15%' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
				  <select name='ipi[$i]' id='ipi[$i]'>
				     <option value='0'>0</option>
					<option value='0.75'>0.75</option>
				    <option value='1'>1</option>
				    <option value='2'>2</option>
				    <option value='3'>3</option>
				    <option value='5'>5</option>
				    <option value='8'>8</option>
				    <option value='10'>10</option>
				    <option value='15'>15</option>
				    <option value='20'>20</option>
				    <option value='25'>25</option>
					<option value='40'>40</option>
                                    </select>
				</font></td>
				<td width='15%' align='center' >
				<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
				   <input type='text' name='garantia[$i]' size='10' maxlength='10' value='0'>
				  </font>				</td>
				<td width='10%' align='center' >
				<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'> 
				   <select name='tipo_nf[$i]'>
				     <option value='P'>P</option>
				     <option value='V' SELECTED>V</option>
				   </select>
				  </font>				</td>
		</tr>
		
		
		<input type='hidden' name='codprod[$i]' value='$codprod[$i]'>
		<input type='hidden' name='unidade[$i]' value='$unidade[$i]'>
		
		");
	 }
	
		echo(" 

 <tr> 
                <td width='100%' colspan = '5'><br>
								<p align='right'><font face='Verdana' size='1'><b><font size='2'>
                    <input  class='sbttn' type='submit' name='Submit' value='Adicionar iten(s) escolhido(s)'>
                    </font></b></font></p>
                </td>
              </tr>
            </table>

				  <input type='hidden' name='cont' value='$numreg'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codocnew' value='$codocpesq'>
				  <input type='hidden' name='codforselect' value='$codforselect'>
                  <input type='hidden' name='codvendselect' value='$codvendselect'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='retorno' value='$retorno'>
				  <input type='hidden' name='pagina' value='$pagina'>
					  	<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
				  
      </form>
    </td>
  </tr>
</table>



  </center>
</div>


	");

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


$compl= "codocpesq=$codocpesq&codocnew=$codocpesq&codforselect=$codforselect&codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg";
/// Complemento para a parte de mudanca de pagina
include("numcontg.php");

else:

/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if ($codempselect <>""){

	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
}
	echo("
<a name='topo'></a>
<div align='center'>
  <center>
  <table width='100%'>
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
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo1</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'></font></td>
                      </tr>
                    </tbody>
                  </table>

<div align='center'>
  <center>
  <table border='0' width='500' cellspacing='0' cellpadding='2'>
    <tr>
      <td width='27'><img border='0' src='images/n1c.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' color='#FF0000'>COD. OC</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
	 <td width='27'><font face='Verdana' size='1'><b></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b></b></font></td>
    </tr>
  </table>
  </center>
</div>

	 </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </center>
</div>
 	


<form method='POST' action='$PHP_SELF?Action=update#cliente' name='FormPesq' >

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
	 <tr>
      <td width='100%' colspan='2' >
      <p align='center'>

<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>CODOC: <input type='text' name='codocpesq' size='14' > </font>
<input class='sbttn' type='submit' name='cond' value='OK'></p>
      </td>


		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>

    </tr>
  </table>
	</form>

");
		

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

echo("
<table border='0' width='100%' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>
");

if ($Action <> "list"){
	echo("


<table cellSpacing='0' cellPadding='0' width='100%' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>V</font>
        - MODIFICAÇÃO DO OC</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='555' border='0'>

      <tr bgColor='#D6B778'>
        <td width='86' ><b><font face='Verdana' color='#FFFFFF' size='1'>DATA</font></b></td>
        <td width='263' ><b><font face='Verdana' color='#FFFFFF' size='1'>PRODUTO</font></b></td>

        <td width='44' ><b><font face='Verdana' color='#FFFFFF' size='1'>QTDE</font></b></td>

        <td width='100' ><b><font face='Verdana' color='#FFFFFF' size='1'>CODBARRA</font></b></td>

        <td width='80' ><b><font face='Verdana' color='#FFFFFF' size='1'>OPERAÇÃO</font></b></td>

      </tr>



");

	$prod->listProdgeral("ocmod", "codoc=$codocpesq", $array612, $array_campo612 , "order by datamod");
	for($j = 0; $j < count($array612); $j++ ){

			$prod->mostraProd( $array612, $array_campo612, $j );

			$codprod_mod = $prod->showcampo2();
			$qtde_mod = $prod->showcampo3();
			$codcb_mod = $prod->showcampo4();
			$codprodcj_mod = $prod->showcampo5();
			$tipocj_mod = $prod->showcampo6();
			$datamod = $prod->showcampo7();
			$login = $prod->showcampo8();
			$statusmod = $prod->showcampo9();
			$datamodf = $prod->fdata($datamod);

			$prod->clear();
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_mod");
			$nomeprod_mod = $prod->showcampo0();


		$codbarra_troca = "";

	echo("
     <tr bgColor='#F2E4C4'>
        <td width='86' ><font face='Verdana' size='1'>$datamodf</font></td>
        <td width='263' ><font face='Verdana' size='1'><b>$nomeprod_mod<br>
          </b></font></td>
        <td width='44' ><font face='Verdana' size='1'>$qtde_mod</font></td>
        <td width='100' ><font face='Verdana' size='1'>$codbarra_troca</font></td>
        <td width='80'><font face='Verdana' size='1'><b>$statusmod</b></font></td>
      </tr>



");
	}
echo("
  </table>

	
<br>
 <form name='form1' method='post' action='$PHP_SELF?Action=check&desloc=0' onSubmit = 'if (verificaObrig(document.form1)==false) return false'>

<table width='100%' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ETAPA 
      III</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - DADOS COMPLEMENTARES</font></b></td>
  </tr>
</table>
 <table cellSpacing='1' cellPadding='2' width='100%' align='center' border='0'>
  <tbody>
	<tr bgColor='$bgcortopo'>
	  <td colSpan='2'>
		<div align='center'>
		  <font face='Verdana, Arial, Helvetica, sans-serif'><b><font color='#ffffff' size='1'>DADOS
		  DA ORDEM DE COMPRA</font></b></font>
		</div>
	  </td>
	</tr>
	<tr bgColor='$bgcorlinha'>
	  <td width='26'>&nbsp;</td>
	  <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>CONTATO:</b></font><br>
		<input name='contato' size='20'></td>
	</tr>
	<tr bgColor='$bgcorlinha'>
	  <td width='26'></td>
	  <td><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>OBS:</b></font><br>
		<textarea rows='3' name='obsoc' cols='55'></textarea></td>
	</tr>
  </tbody>
</table>



<br>
<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
      <div align='right'>
          <table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='58%' align = 'right'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' ></font></td>
              
              <td width='22%'>
                <p align='right'>
          <input class='sbttn' type='submit' name='Submit' value='Próxima Etapa => Finalizar'>

              </td>
            </tr>
          </table>
        </div>
      
    </td>
  </tr>
</table>

		<input type='hidden' name='padd' value='$padd'>
		<input type='hidden' name='ptotal' value='$ptotal'>	
		<input type='hidden' name='codocnew' value='$codocnew'>	
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>

</form>
	<table border='0' width='100%' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>


");
}

include ("sif-rodape.php");

}




if ($Actionfour == "unlock"){

include("sif-topo.php");

	#-- Mostra dados da tabela OCTEMP

		$prod->listProd("oc", "codoc=$codocnew");

		$codoc = $prod->showcampo0();
		$codemp = $prod->showcampo1();
		$codfor = $prod->showcampo2();
		$codmoeda = $prod->showcampo3();
		$codvend = $prod->showcampo4();
		$contato = $prod->showcampo5();
		$dtoc = $prod->showcampo7();
		$obs = $prod->showcampo10();
		$dtoc = $prod->fdata($dtoc);
		$dprevcheg = $prod->showcampo11();
		$dprevcheg = $prod->fdata($dprevcheg);
		
 $prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		$descmax = $prod->showcampo18();
		$fatorvista = $prod->showcampo20();
		$taxa = $prod->showcampo21();
		

 $prod->listProd("fornecedor", "codfor=$codfor");
				
		$nomeforold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$tel1old = $prod->showcampo7();
		$tel2old = $prod->showcampo8();
		$cgcold = $prod->showcampo14();
		$ieold = $prod->showcampo16();
		$contatoold = $prod->showcampo17();
		$emailold = $prod->showcampo19();

 $prod->listProd("moeda", "codmoeda=$codmoeda");
				
		$tipomoeda = $prod->showcampo1();
		$cotacao = $prod->showcampo2();
		$datacot = $prod->showcampo3();
		$datacot = $prod->fdata($datacot);

echo("


<div align='center'>
  <center>
  <table width='100%'>
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
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo1</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'></font></td>
                      </tr>
                    </tbody>
                  </table>

<div align='center'>
  <center>
  <table border='0' width='500' cellspacing='0' cellpadding='2'>
    <tr>
      <td width='27'><img border='0' src='images/n1.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' >ESCOLHA
        DO FORNECEDOR</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3c.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1' color='#FF0000'><b>FINALIZAR</b></font></td>
    </tr>
  </table>
  </center>
</div>

	 </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </center>
</div>


<div align='center'>
      <center>
      <table border='0' width='100%' cellspacing='1' cellpadding='2'>
        <tr>
          <td width='315' bgcolor='#000000'><b><font face=' Verdana, Arial, Helvetica, sans-serif' color='#F0F0F0' size='3'>$titulo:&nbsp;</font></b></td>
          <td width='217' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='2' color='#86ACB5'><b>
       $nomeempold </b></font></td>
        </tr>
      </center>
      <tr>
        <td width='318' bgcolor='#F0F0F0'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MOEDA DA OC:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$tipomoeda</b></font></td>
        <center>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>COMPRADOR:<br>
          </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        FORNECEDOR</b></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>FORNECEDOR:<br>
        </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeforold</font></b></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CNPJ:<br>
      </font></b><font color='#000000'>$cgcold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$enderecoold
        - $cidadeold - $bairroold - $estadoold - $cepold</font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>INSC. EST.:<br>
      </font></b><font color='#000000'>$ieold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br>
        </font></font></b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>$emailold</font></font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>&nbsp;$tel1old<br>&nbsp;$tel2old</font></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES</b></font></td>
        </tr>
        <tr>
          <td width='315' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS:<br>
            </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obs</font></td>
        </center>
        <td width='217' bgcolor='#F0F0F0'>
          <p align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>DATA PREV CHEGADA:<br>
          </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dprevcheg</font></td>
      </tr>
      <center>
      <tr>
        <td width='540' colspan='2'>
        <hr size='0'>
        </td>
      </tr>
      </table>
      </center>
    </div>

<table width='556' border='0' cellspacing='1' cellpadding='0' align='center'>

  <tr> 
    <td colspan='2' width='100%'>&nbsp;
      <table cellSpacing='0' cellPadding='0' width='100%' align='center' border='0'>
        <tbody>
          <tr>
            <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
              PRODUTOS</font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
              <b>DA ORDEM DE COMPRA</b></font></td>
          </tr>
        </tbody>
      </table>
      <table cellSpacing='1' cellPadding='2' width='100%' align='center' border='0'>
        <tbody>
     <tr bgColor='#D6B778'>
            <td width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></td>
            <td width='30%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PRODUTOS
              DA OC</font></b></td>
            <td width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></td>
            <td width='10%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>P.UNID</font></b></td>
            <td width='10%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>P.TOTAL</font></b></td>
            <td width='7%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>GARANTIA</font></b></td>
            <td width='12%' height='0' align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PV</font></b></td>
            <td width='11%' height='0' align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PA</font></b></td>
          </tr>

");

			  $prod->listProdgeral("ocprod", "codoc=$codoc", $array3, $array_campo3 , "");
	$ptotal=0;
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			#$codprodcj = $prod->showcampo8();
			$pcu = $prod->showcampo5();
			$garantia = $prod->showcampo6();
			$put= $qtde*$pcu;
			

			$prod->listProdSum("nomeprod, pvv, pva, mtv, mta", "produtos", "codprod=$codprodoc", $array11, $array_campo11 , "");		
			$prod->mostraProd( $array11, $array_campo11, 0 );

			$nomeprod = $prod->showcampo0();
			$pvv = $prod->showcampo1();
			$pva = $prod->showcampo2();
			$mtv = $prod->showcampo3();
			$mta = $prod->showcampo4();


			//CAMBIO DE MOEDAS

			$prod->listProd("moeda", "padrao='S'");		
			$tipomoedaprod = $prod->showcampo1();
			$cotacaopadrao = $prod->showcampo2();


			// ESTOQUE MINIMO
			$prod->listProd("estoque", "codprod=$codprodoc and codemp=$codemp");
				
			$qtdemin = $prod->showcampo5();
			$fatorata = $prod->showcampo6();
			$fatorvar = $prod->showcampo7();
			$pcm = $prod->showcampo11();
			
					// FAZ O CAMBIO DE MOEDA PARA A MOEDA PADRAO DO SISTEMA
					$pcucambio = ($pcu*$cotacao)/$cotacaopadrao;
					$pcmcambio = ($pcm*$cotacao)/$cotacaopadrao;

			$pvvnovo = ($pvv*$fatorvista) * $fatorvar;
			$pvanovo = ($pva*$fatorvista) * $fatorata;


			// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS

					$prod->listProdSum("COUNT(*)*(SUM(qtde)-SUM(reserva)) as estoque", "estoque" , "codprod = $codprodoc and codemp = $codemp", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
	
										
					//CALCULA O PCM NOVO
					if (($estoque) > 0 ):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtde))/($estoque+$qtde);
					else:
						$pcmnovo = $pcucambio;
					endif;
			
			
			//CHECAGEM DO MARGEM DE TRABALHO
					
			if ($pvvnovo > ($pcmnovo+($pcmnovo*$mtv)/100)){
				$cotavar = $pvvnovo - ($pcmnovo+($pcmnovo*$mtv)/100);
				$cotavar = $prod->fpreco($cotavar);
				$cotavar = "-" . $cotavar;
				$corvar = "#33CC00";
			}else{
				$cotavar =($pcmnovo+($pcmnovo*$mtv)/100) - $pvvnovo;
				$cotavar = $prod->fpreco($cotavar);
				$cotavar = "+" . $cotavar;
				$corvar = "#FF0000";
			}
			if ($pvanovo > ($pcmnovo+($pcmnovo*$mta)/100)){
				$cotaata =$pvanovo - ($pcmnovo+($pcmnovo*$mtv)/100);
				$cotaata = $prod->fpreco($cotaata);
				$cotaata = "-" . $cotaata;
				$corata = "#33CC00";
			}else{
				$cotaata =($pcmnovo+($pcmnovo*$mtv)/100) - $pvanovo;
				$cotaata = $prod->fpreco($cotaata);
				$cotaata = "+" . $cotaata;
				$corata = "#FF0000";
			}
			
			/*
			$prod->listProdgeral("produtos", "codprod=$codprodcj", $array12, $array_campo12 , "");
			$prod->mostraProd( $array12, $array_campo12, 0 );

			$nomeprodcj = $prod->showcampo19();
			*/
			
		

		$k=$i+1;

		$fput = $prod->fpreco($put);
		$fpcu = $prod->fpreco($pcu);
		
		


echo("


        <tr bgColor='#F2E4C4'>
            <td align='middle' width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$k</b></font></td>
            <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
            <td align='middle' width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
            <td align='middle' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$fpcu</font></td>
            <td align='middle' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$fput</b></font></td>
            <td align='middle' width='7%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$garantia</font></td>
            <td align='middle' width='12%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corvar'>$cotavar</font></b></td>
            <td align='middle' width='11%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corata'><b>$cotaata</b></font></td>
          </tr>


 ");

	$ptotal = $ptotal + $put;

	 }
	
	$ptotalf = $prod->fpreco($ptotal);


	echo("
		
        </tbody>
      </table>
      <br>
      <table cellSpacing='0' cellPadding='0' width='100%' align='center' border='0'>
        <tbody>
          <tr>
            <td>
              <div align='right'>
                <table cellSpacing='0' cellPadding='0' width='100%' border='0'>
                  <tbody>
                    <tr>
                      <td width='58%'>
                      </td>
");
if ($tipomoeda == "Dolar"){$caractmoeda = "U$";}else{$caractmoeda = "R$";}
echo("
                      <td width='20%'><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font color='#336699' size='1'>VALOR
                        TOTAL:</font><font size='2'><br>
                        $caractmoeda</font></b><font size='2'><b>  $ptotalf</b></font></font></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
  <tr> 
    <td colspan='2' width='100%'> &nbsp;<br><br></td>
  </tr>

  <tr> 
    <td colspan='2' width='100%'>&nbsp;</td>
  </tr>
</table>

		   <div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='18'><!--<img border='0' src='images/bt-cancelaped.gif' >--></td>
      <td width='172'><font size='1' face='Verdana'><b><!--<a href=' $PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&ex=2&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CANCELAR OC</a>--></b></font></td>
	   <td width='18'><!--<img border='0' src='images/bt-recalculaped.gif' >--></td>
      <td width='168'><font size='1' face='Verdana'><b><!--<a href='$PHP_SELF?Action=start&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codfor&codempselect=$codemp&codvendselect=$codvend&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CORRIGIR OC</a>--></b></font></td>
      <td width='18'><font size='1' face='Verdana'><b><img border='0' src='images/bt-fechaped.gif'></b></font></td>
      <td width='151'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=end&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codoc&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>FINALIZAR OC</a></b></font></td>
     </tr>
  </table>
  </center>
</div>

");

include ("sif-rodape.php");

}




?>
       
