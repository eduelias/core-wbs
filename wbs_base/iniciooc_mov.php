

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
$titulo = "ORDEM DE MOVIMENTAÇÃO";
$titulo1 = "CRIAR NOVA ORDEM DE MOVIMENTAÇÃO";

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
		$codemp_transf = $prod->showcampo34();
        $codgrp_transf = $prod->showcampo3();

    	if (($codgrp_transf == 32 or $codgrp_transf == 53) and $codemp_transf <> 0){$block_transf = 1;$allemp = 'N';$codempvend = $codemp_transf;}


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
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
				
				#$prod->listProd("ocprodtemp", "codoc=$codocnew and codprod=$codprod[$i]");
				#$numreg = $prod->listProdgeral("ocprodtemp", "codoc=$codocnew and codprod=$codprod[$i] ", $array, $array_campo, "" );

				#$qtdeold = $prod->showcampo3();
				#$precoold = $prod->showcampo5();

				#$prod->setcampo1($codocnew);
				#$prod->setcampo2($codprod[$i]);
				#$preco[$i] = str_replace('.','',$preco[$i]);
				#$preco[$i] = str_replace(',','.',$preco[$i]);

				#if ($precoold == 0){$precoold = $preco[$i];}
		
			#echo("precoold = $precoold - p[$i] = $preco[$i]");

		
		
			#if($qtde[$i] <> 0 and $preco[$i]==$precoold):

				

				$qtdenew=$qtdeold+$qtde[$i];

		#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - pr=$preco[$i] - tp=$tipoprod[$i] - po=$precoold | ");

			#$preconew=$precoold+($qtde[$i]*$preco[$i]);
			#$prod->setcampo5($preconew);
				$prod->clear();
				$prod->setcampo0("");
				$prod->setcampo1($codocnew);
				$prod->setcampo2($codempselect);
				$prod->setcampo3($codprod[$i]);
				$prod->setcampo4($tipo_nf[$i]);
				$prod->setcampo5($numnf);
				$prod->setcampo6($datanf);
				$prod->setcampo7($icms[$i]);
				$prod->setcampo8($ipi[$i]);
				$prod->setcampo11($qtdenew);
				$preco[$i] = str_replace('.','',$preco[$i]);
				$preco[$i] = str_replace(',','.',$preco[$i]);
				$prod->setcampo12($preco[$i]);
				$st1[$i] = str_replace('.','',$st1[$i]);
				$st1[$i] = str_replace(',','.',$st1[$i]);
				$prod->setcampo13($st1[$i]);
				$st2[$i] = str_replace('.','',$st2[$i]);
				$st2[$i] = str_replace(',','.',$st2[$i]);
				$prod->setcampo14($st2[$i]);
				$st3[$i] = str_replace('.','',$st3[$i]);
				$st3[$i] = str_replace(',','.',$st3[$i]);
				$prod->setcampo15($st3[$i]);
				$prod->setcampo16($cfop[$i]);
				$v_icms[$i] = str_replace('.','',$v_icms[$i]);
				$v_icms[$i] = str_replace(',','.',$v_icms[$i]);
				$prod->setcampo19($v_icms[$i]);
				$v_desp[$i] = str_replace('.','',$v_desp[$i]);
				$v_desp[$i] = str_replace(',','.',$v_desp[$i]);
				$prod->setcampo20($v_desp[$i]);
				$v_frete[$i] = str_replace('.','',$v_frete[$i]);
				$v_frete[$i] = str_replace(',','.',$v_frete[$i]);
				$prod->setcampo21($v_frete[$i]);
				$v_ficms[$i] = str_replace('.','',$v_ficms[$i]);
				$v_ficms[$i] = str_replace(',','.',$v_ficms[$i]);
				$prod->setcampo22($v_ficms[$i]);
				$v_seg[$i] = str_replace('.','',$v_seg[$i]);
				$v_seg[$i] = str_replace(',','.',$v_seg[$i]);
				$prod->setcampo23($v_seg[$i]);
				
				$prod->addProd("omov_prod_temp", $ureg);
				
				
				

					
			#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - ct=$cont - j=$j | ");
			  /*
				if ($numreg):
					if ($qtdenew > 0 ):
					$prod->upProd("ocprodtemp", "codoc=$codocnew and codprod=$codprod[$i]");
					else:
					$prod->delProd("ocprodtemp", "codoc=$codocnew and codprod=$codprod[$i]");
					endif;
				else:
					if ($qtdenew > 0 ):
					$prod->setcampo0("");
					$prod->addProd("ocprodtemp", $ureg);
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
		}
		$Actionsec="list";
			
        break;


	case "update":
		
		$Actionsec="list";
				
		 break;

	 case "list":
		
	
		$Actionsec="seclist";
	
		
		 break;

	 case "start":

		if ($ex <> 1){
		$prod->clear();
		$prod->setcampo16($codempselect);
		$prod->setcampo14($codforselect);
		$prod->setcampo0("");
		
		$prod->addProd("omov_temp", $ureg);
		$codocnew = $ureg;

		$palavrachave="";
		}
		
		$Actionsec="list";
	
		
		 break;

	 case "delete":
		
		
		if ($ex==1){
			$prod->delProd("omov_prod_temp", "codomov=$codocnew");
			$Actionsec="list";
		}else{
			if ($ex==2){
				$prod->delProd("omov_prod_temp", "codomov=$codocnew");
				$prod->delProd("omov_temp", "codomov=$codocnew");
				$Actionsec="seclist";
			}else{
				$prod->delProd("omov_prod_temp", "codomovp=$codpoc");
				$Actionsec="list";
			}
		}
		
	

		
		
		 break;

	 case "check":
		
		$dataatual = date("Y-m-d H:m:s");   
		
		$prod->clear(); 
		$prod->listProdU("SUM((pcu*qtde)+(pcu*qtde*ipi/100)+(st1))", "omov_prod_temp", "codomov=$codocnew");
		$ptotal = $prod->showcampo0();
		

		$prod->listProd("omov_temp", "codomov=$codocnew");
		$prod->setcampo2($operacao);
		$prod->setcampo3($numnf);
		$prod->setcampo4("$anf-$mnf-$dnf");
		$prod->setcampo5($dataatual);
		$prod->setcampo6($ptotal);
		$prod->setcampo17($obsoc);
		$prod->setcampo19($tipo_rma);
				
		$prod->upProd("omov_temp", "codomov=$codocnew");

		$Actionter="lock";
		$Actionfour="unlock";
		
		$condicao_ped = "numnf = '$numnf', ";
		$condicao_ped .= "datanf = '$anf-$mnf-$dnf' ";
			
 		$prod->upProdU("omov_prod_temp",$condicao_ped, "codomov='$codocnew'");
		
		
		 break;

	#-- COPIA tabela OCPRODTEMP para OCPROD
	case "end":
	
		$prod->clear();
		$prod->listProd("omov_temp", "codomov=$codocnew");
		$prod->setcampo0("");
		$prod->addProd("omov", $uregoc);
		$prod->clear();
		$numreg = $prod->listProdgeral("omov_prod_temp", "codomov=$codocnew", $array, $array_campo, "" );
		for($i = 0; $i < $numreg; $i++ ){
		$prod->mostraProd( $array, $array_campo, $i );
		$prod->setcampo0("");
		$prod->setcampo1($uregoc);
		$prod->addProd("omov_prod", $ureg);
		}
		
		$prod->delProd("omov_temp", "codomov=$codocnew");
		$prod->delProd("omov_prod_temp", "codomov=$codocnew");
		
		$Actionsec="seclist";

		$Actionter = "lock";
		$prod->msggeral("A ordem de movimentação foi inserida corretamente ", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg", 0);
		
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
	if (!(consisteVazioTamanho(form, form.codmoeda.name, 21)))
    {
        return false;
    }
    if (!(consisteVazioTamanho(form, form.dprev.name, 2)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.mprev.name, 2)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.aprev.name, 4)))
    {
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


</script>

");


#echo("Acao = $Action");

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

	$prod->listProd("fornecedor", "codfor=$codforselect");
				
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



		$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	

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
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$moedaoc</font></td>
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
            </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsentrega</font></td>
        </center>
        <td width='217' bgcolor='#F0F0F0'>
          <p align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>DATA PREV CHEGADA:<br>
          </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dataprevcheg</font></td>
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

	  <br>
	 
<a name='lista'></a>
<table width='100%' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ETAPA 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTA DE PRODUTOS ADICIONADOS AO PEDIDO</font></td>
  </tr>
</table>

<table border='0' width='100%'  cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='38%' height='0' align='center'><b><font color='#ffffff' size='1' face='Verdana, Arial, Helvetica, sans-serif'>PRODUTOS</font></b></td>
	<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='9%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br /> 
    UNIT&Aacute;RIO </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR TOTAL </b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>ICMS<br />
	(%)</b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>IPI<br />
	(%)</b></font></td>
	<td width='9%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br /> 
    DO IPI </b></font></td>
	<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>GAR<br />
	(M&Ecirc;S)</b></font></td>
	<td align='center' width='4%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>TIPO<br />
	</b></font></td>
	<td align='center' width='3%' height='0'><font size='1'></font></td>
  </tr>
  ");

	  $prod->listProdgeral("omov_prod_temp", "codomov=$codocnew", $array3, $array_campo3 , "order BY codprod");

	 $padd = count($array3);
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo3();
			$qtde = $prod->showcampo11();
			#$codprodcj = $prod->showcampo8();
			$pcu = $prod->showcampo12();
			$icms = $prod->showcampo7();
			$ipi = $prod->showcampo8();
			$st1 = $prod->showcampo13();
			$st2 = $prod->showcampo14();
			$st3 = $prod->showcampo15();
			$v_icms_un = $prod->showcampo19();
			$v_desp = $prod->showcampo20();
			$v_frete = $prod->showcampo21();
			$v_ficms = $prod->showcampo22();
			$v_seg = $prod->showcampo23();
			
			$tipo_nf = $prod->showcampo4();
			$put= $qtde*$pcu;
			
			$v_st1f = $prod->fpreco($st1);
			$v_st2f = $prod->fpreco($st2);
			$v_st3f = $prod->fpreco($st3);
			$v_icmsf = $prod->fpreco($v_icms_un);
			$v_despf = $prod->fpreco($v_desp);
			$v_fretef = $prod->fpreco($v_frete);
			$v_ficmsf = $prod->fpreco($v_ficms);
			$v_segf = $prod->fpreco($v_seg);
			
			
			$v_desp_t = ($v_desp);
			$v_frete_t = ($v_frete);
			$v_ficms_t = ($v_ficms);
			$v_seg_t = ($v_seg);
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

		

echo(" 
	
   <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$codprodoc</b></font></td>
	<td width='38%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
    <td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='9%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$fpcu</font>
	<BR><BR><BR><font color = '#0000FF'>ST1:</font>$v_st1f<br><font color = '#66CC33'>ST2:</font>$v_st2f<br><font color = '#FFCC33'>ST3:</font>$v_st3f</font>
	</td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$fput</b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$icms<br><br><font color = '#0000FF'>VALOR:
				</font>$v_icmsf</font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ipi</font></td>
	<td width='9%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipif</font></td>
	<td width='8%' height='0' align='center'> <BR><font color = '#66CC33'>DESP:</font>$v_despf
				   <BR><font color = '#66CC33'>FRETE:</font>$v_fretef
				    <BR><font color = '#66CC33'>FICMS:</font>$v_ficmsf
					 <BR><font color = '#66CC33'>SEG:</font>$v_segf
				  </font>		</td>
    <td align='center' width='4%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong>$tipo_nf </strong></font></td>
    <td align='center' width='3%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg#lista'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
  </tr>
	
  ");

	$ptotal = $ptotal + $put;
	$v_icmst = $v_icmst + $v_icms;
	$v_stt = $v_stt + $st1;
	$v_outras = $v_outras + ($v_desp_t + $v_frete_t + $v_ficms_t + $v_seg_t);
	$v_ipit = $v_ipit + $v_ipi;
	 }
	$ptotalf = $prod->fpreco($ptotal);
	$v_icmstf = $prod->fpreco($v_icmst);
	$v_sttf = $prod->fpreco($v_stt);
	$v_outrasf = $prod->fpreco($v_outras);
	$v_ipitf = $prod->fpreco($v_ipit);
	
	
	$ptotal_notaf = $prod->fpreco($ptotal+$v_ipit + $v_stt +$v_outras);
echo(" 
  <tr bgcolor='#FFFFFF'> 
	<td height='0' align='center' colspan = '12'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b></font></td>
  </tr>
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='38%' height='0' align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS:</b></font></td>
    <td width='8%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'> $v_icmstf</font></td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL DOS PRODUTOS:</b></font></td>
	<td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ptotalf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td width='0% height='0' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL IPI:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipitf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS SUBST(ST):</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_sttf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
    <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OUTRAS DESPESAS:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_outrasf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL DA NOTA:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong>$ptotal_notaf</strong></font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
	
  ");
	


	echo("
		</table>
	<br>
<table width='80%' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
            <div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='28'><img border='0' src='images/bt-cancelaped.gif' width='26' height='27'></td>
      <td width='126'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&ex=2&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CENCELAR OC</a></b></font></td>
      <td width='29'><font size='1' face='Verdana'><b><img border='0' src='images/bt-recalculaped.gif' width='27' height='27'></b></font></td>
      <td width='198'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pg#lista'>EXCLUIR TODOS PRODUTOS</a></b></font></td>
      <td width='198'></td>
    </tr>
  </table>
  </center>
</div>
 
    </td>
  </tr>
</table>

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
		<input type='hidden' name='codocnew' value='$codocnew'>
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
                <input type='text' name='qtde[$i]' size='5' maxlength='4' value='0'></font>		
				</td>
                <td width='17%' align = 'center' > 
			    <input type='text' name='preco[$i]' size='10' maxlength='10' value='0' onKeyUp='this.value = adjust(this);'>
				<BR><BR><BR><font color = '#0000FF'>ST1</font><input type='text' name='st1[$i]' size='6' maxlength='10' value='$fst1' id = 'st1_$i' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" ><br><font color = '#66CC33'>ST2</font><input type='text' name='st2[$i]' size='6' maxlength='10' value='$fst2' id = 'st2_$i' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" ><br><font color = '#FFCC33'>ST3</font><input type='text' name='st3[$i]' size='6' maxlength='10' value='$fst3' id = 'st3_$i' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" ></font>
				</td>
				<td width='15%' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
				  <select name='icms[$i]' id='icms[$i]'>
				    <option value='0'>0</option>
				    <option value='7'>7</option>
				    <option value='12'>12</option>
				    <option value='18'>18</option>
				    <option value='25'>25</option>
				    <option value='30'>30</option>
                                    </select>
					<BR><font color = '#0000FF'>VALOR</font><input type='text' name='v_icms[$i]' size='6' maxlength='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" ><br>
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
				   <BR><font color = '#66CC33'>DESP</font><input type='text' name='v_desp[$i]' size='6' maxlength='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" >
				   <BR><font color = '#66CC33'>FRETE</font><input type='text' name='v_frete[$i]' size='6' maxlength='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" >
				    <BR><font color = '#66CC33'>FICMS</font><input type='text' name='v_ficms[$i]' size='6' maxlength='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" >
					 <BR><font color = '#66CC33'>SEG</font><input type='text' name='v_seg[$i]' size='6' maxlength='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" >
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
                <td width='100%' colspan = '7'><br>
								<p align='right'><font face='Verdana' size='1'><b><font size='2'>
                    <input  class='sbttn' type='submit' name='Submit' value='Adicionar iten(s) escolhido(s)'>
                    </font></b></font></p>                </td>
              </tr>
            </table>

				  <input type='hidden' name='cont' value='$numreg'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codocnew' value='$codocnew'>
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
      <td width='112'><b><font face='Verdana' size='1' color='#FF0000'>ESCOLHA
        DO FORNECEDOR</font></b></td>
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
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$moedaoc</font></td>
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
            </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsentrega</font></td>
        </center>
        <td width='217' bgcolor='#F0F0F0'>
          <p align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>DATA PREV CHEGADA:<br>
          </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dataprevcheg</font></td>
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
echo("
	<a name='forn'></a>

	<form method='POST' action='$PHP_SELF?Action=$Action#forn' name='Form'>
			<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='codempselect' value='$codempselect'>
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
	<table width='100%' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='50%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME FORNECEDOR</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONTATO</font></b></div>
    </td>
	 <td align='center' width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
   
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codfor = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$contato = $prod->showcampo17();


		echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codfor</font></td>
			<td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='20%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$contato</font></b></td>
");
		if ($codempselect==""):
		echo("
			
		<td align='center' width='10%' height='0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></font></td>
		");
		else:
		echo("
			<td align='center' width='10%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=start&codforselect=$codfor&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg#forn'><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></a></font></td>
		");
		endif;
		echo("
	   </tr>
		");

			
	 }

		echo("
				</table>
		");
		

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

#if ($Action== "list" or $Action== "update"){
/// CONTADOR DE PAGINAS ////

$compl= "codocnew=$codocnew&codforselect=$codforselect&codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg";   
/// Complemento para a parte de mudanca de pagina
include("numcontg.php");

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
#}
if ($Action <> "list"){
	echo("


	
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
	  <td colSpan='3'>
		<div align='center'>
		  <font face='Verdana, Arial, Helvetica, sans-serif'><b><font color='#ffffff' size='1'>DADOS
		  DA ORDEM DE COMPRA</font></b></font>
		</div>
	  </td>
	</tr>
	<tr bgColor='$bgcorlinha'>
	  <td width='26'>&nbsp;</td>
	  <td width='227'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='2'><b><font size='1'><font color='#336699'>TIPO MOVIMENTAÇÃO</font><br>
		<select class='drpdwn' size='1' name='operacao'>
		                       
						  
	
		<option selected value=''>ESCOLHA O TIPO</option>
		<option  value='E'>ENTRADA</option>
		<option  value='S'>SAIDA</option>
						  </select></font></b></font><BR><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='2'><b><font size='1'><font color='#336699'>TIPO RMA</font><br>
		<select class='drpdwn' size='1' name='tipo_rma'>
		                       
						  
	
		<option  value='S'>S</option>
		<option  value='N'>N</option>
						  </select></font></b></font></td>
	  <td width='281'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>NOTA FISCAL:</b></font><br>
		<input name='numnf' size='20'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b><br>
		DATA NOTA FISCAL:</b></font><br>
		<font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><input maxLength='2' size='2' name='dnf'>
		/ <input maxLength='2' size='2' name='mnf'> / <input maxLength='4' size='4' name='anf'></font></td>
	</tr>
	<tr bgColor='$bgcorlinha'>
	  <td width='26'></td>
	  <td colSpan='2'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>OBS:</b></font><br>
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

		$prod->listProd("omov_temp", "codomov=$codocnew");

		$codoc = $prod->showcampo0();
		$codemp = $prod->showcampo16();
		$codfor = $prod->showcampo14();
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

<a name='lista'></a>
<table width='100%' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ETAPA 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTA DE PRODUTOS ADICIONADOS AO PEDIDO</font></td>
  </tr>
</table>

<table border='0' width='100%'  cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='38%' height='0' align='center'><b><font color='#ffffff' size='1' face='Verdana, Arial, Helvetica, sans-serif'>PRODUTOS</font></b></td>
	<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='9%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br /> 
    UNIT&Aacute;RIO </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR TOTAL </b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>ICMS<br />
	(%)</b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>IPI<br />
	(%)</b></font></td>
	<td width='9%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br /> 
    DO IPI </b></font></td>
	<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>GAR<br />
	(M&Ecirc;S)</b></font></td>
	<td align='center' width='4%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>TIPO<br />
	</b></font></td>
	<td align='center' width='3%' height='0'><font size='1'></font></td>
  </tr>
  ");

	  $prod->listProdgeral("omov_prod_temp", "codomov=$codoc", $array3, $array_campo3 , "order BY codprod");

	 $padd = count($array3);
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo3();
			$qtde = $prod->showcampo11();
			#$codprodcj = $prod->showcampo8();
			$pcu = $prod->showcampo12();
			$icms = $prod->showcampo7();
			$ipi = $prod->showcampo8();
			$st1 = $prod->showcampo13();
			$st2 = $prod->showcampo14();
			$st3 = $prod->showcampo15();
			$v_icms_un = $prod->showcampo19();
			$v_desp = $prod->showcampo20();
			$v_frete = $prod->showcampo21();
			$v_ficms = $prod->showcampo22();
			$v_seg = $prod->showcampo23();
			
			$tipo_nf = $prod->showcampo4();
			$put= $qtde*$pcu;
			
			$v_st1f = $prod->fpreco($st1);
			$v_st2f = $prod->fpreco($st2);
			$v_st3f = $prod->fpreco($st3);
			$v_icmsf = $prod->fpreco($v_icms_un);
			$v_despf = $prod->fpreco($v_desp);
			$v_fretef = $prod->fpreco($v_frete);
			$v_ficmsf = $prod->fpreco($v_ficms);
			$v_segf = $prod->fpreco($v_seg);
			
			
			$v_desp_t = ($v_desp);
			$v_frete_t = ($v_frete);
			$v_ficms_t = ($v_ficms);
			$v_seg_t = ($v_seg);
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

		

echo(" 
	
   <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$codprodoc</b></font></td>
	<td width='38%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
    <td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='9%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$fpcu</font>
	<BR><BR><BR><font color = '#0000FF'>ST1:</font>$v_st1f<br><font color = '#66CC33'>ST2:</font>$v_st2f<br><font color = '#FFCC33'>ST3:</font>$v_st3f</font>
	</td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$fput</b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$icms<br><br><font color = '#0000FF'>VALOR:
				</font>$v_icmsf</font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ipi</font></td>
	<td width='9%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipif</font></td>
	<td width='8%' height='0' align='center'> <BR><font color = '#66CC33'>DESP:</font>$v_despf
				   <BR><font color = '#66CC33'>FRETE:</font>$v_fretef
				    <BR><font color = '#66CC33'>FICMS:</font>$v_ficmsf
					 <BR><font color = '#66CC33'>SEG:</font>$v_segf
				  </font>		</td>
    <td align='center' width='4%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong>$tipo_nf </strong></font></td>
    <td align='center' width='3%' height='0'></td>
  </tr>
	
  ");

	$ptotal = $ptotal + $put;
	$v_icmst = $v_icmst + $v_icms;
	$v_stt = $v_stt + $st1;
	$v_outras = $v_outras + ($v_desp_t + $v_frete_t + $v_ficms_t + $v_seg_t);
	$v_ipit = $v_ipit + $v_ipi;
	 }
	$ptotalf = $prod->fpreco($ptotal);
	$v_icmstf = $prod->fpreco($v_icmst);
	$v_sttf = $prod->fpreco($v_stt);
	$v_outrasf = $prod->fpreco($v_outras);
	$v_ipitf = $prod->fpreco($v_ipit);
	
	
	$ptotal_notaf = $prod->fpreco($ptotal+$v_ipit + $v_stt +$v_outras);
echo(" 
  <tr bgcolor='#FFFFFF'> 
	<td height='0' align='center' colspan = '12'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b></font></td>
  </tr>
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='38%' height='0' align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS:</b></font></td>
    <td width='8%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'> $v_icmstf</font></td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL DOS PRODUTOS:</b></font></td>
	<td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ptotalf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td width='0% height='0' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL IPI:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipitf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS SUBST(ST):</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_sttf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
    <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OUTRAS DESPESAS:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_outrasf</font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='2' align='right'>&nbsp;</td>
    <td height='0' colspan='5' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR TOTAL DA NOTA:</b></font></td>
    <td height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong>$ptotal_notaf</strong></font></td>
    <td align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
  </tr>
	
  ");
	


	echo("
		</table>
	<br>

		   <div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='18'><img border='0' src='images/bt-cancelaped.gif' ></td>
      <td width='172'><font size='1' face='Verdana'><b><a href=' $PHP_SELF?Action=delete&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codforselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&ex=2&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CANCELAR OC</a></b></font></td>
	   <td width='18'><img border='0' src='images/bt-recalculaped.gif' ></td>
      <td width='168'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=start&codpoc=$codpoc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codocnew=$codocnew&codforselect=$codfor&codempselect=$codemp&codvendselect=$codvend&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CORRIGIR OC</a></b></font></td>
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
       
