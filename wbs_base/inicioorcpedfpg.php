

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "orcprodtemp";					// Tabela EM USO
$condicao1 = "cod=$cod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by ordem limit $desloc,$acrescimo ";								// order by nome
$campopesq = "descr";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "ORÇAMENTO";
$titulo1 = "CRIAR NOVO ORÇAMENTO";

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
		
		// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='inicioorcped.php'");
		$pgorc = $prod->showcampo0();
		
		if ($fpgstart==1){
		// ATUALIZA DADOS NA TABELA PEDTEMP
		#$prod->listProd("pedidotemp", "codped=$codpedselect");
				
		
		

		#$prod->upProd("pedidotemp", "codped=$codpedselect");
		}

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$Actionsec="list";
		$desloc=0;

		 break;

    case "update":

		$prod->listProd("empresa", "codemp=$codempselect");
		$descmax = $prod->showcampo18();
		$fatorvista = $prod->showcampo20();
		$taxa = $prod->showcampo21();
		#echo("t=$taxa");
		$prod->listProd("vendedor", "nome='$login'");
		$fatorcusto = $prod->showcampo6(); 

		$dataatual = $prod->gdata();

		
		

		// CALCULO DO VALOR DE TABELA A VISTA
		$valortotaltabela = $vpvt;
		

			// ATUALIZA BANCO DE DADOS DE ORÇAMENTOS
			$prod->listProd("orctemp", "codped=$codpedselect");
			
			
			$prod->setcampo9($valortotaltabela);
			
			$prod->setcampo11($dataatual);

			$condicaop = urlencode($condicaop);
			$obsorcamento = urlencode($obsorcamento);
			
			
			$prod->setcampo29($condicaop);
			$prod->setcampo30($garantia);
			$prod->setcampo31($pentrega);
			$prod->setcampo32($impostos);
			$prod->setcampo33($frete);
			$prod->setcampo34($validade);
			$prod->setcampo35($obsorcamento);
			
			
			$prod->setcampo14("NOVO");
			$prod->upProd("orctemp", "codped=$codpedselect");
			
		

				
		 break;

	 case "recalc":


		// INSERE VALORES ALTERNATIVOS DOS CONJUNTOS
					
			$prod->listProdgeral("orcprodtemp", "codped=$codpedselect and tipoprod = 'CJ'", $array77, $array_campo77, "group by tipocj" );

			$reg = count ($array77);
			#echo("reg=$reg  ");

				for($y = 0; $y < count($array77); $y++ ){

					$prod->mostraProd( $array77, $array_campo77, $y );

					$codprodcj = $prod->showcampo7();
					$tipocj = $prod->showcampo9();
					$prodextra = $prod->showcampo10();

					$prod->listProdgeral("orcprodtemp", "codped=$codpedselect and codprodcj=$codprodcj and tipocj=$tipocj ", $array771, $array_campo771, "" );

					$prod->listProdSum("SUM(ppu*qtde)", "orcprodtemp", "codped=$codpedselect and codprodcj=$codprodcj and tipocj=$tipocj ", $array69, $array_campo69, "" );
					$prod->mostraProd($array69, $array_campo69, 0 );
					$valorcjold = $prod->showcampo0();

					$reg1 = count ($array771);
					#echo("reg1=$reg1  ");

					for($ya = 0; $ya < count($array771); $ya++ ){

						$prod->mostraProd( $array771, $array_campo771, $ya );

						#echo("dformat=$valor[$codprodcj][$tipocj]");

						#$valor[$codprodcj][$tipocj] = str_replace('.','',$valor[$codprodcj][$tipocj]);
						#$valor[$codprodcj][$tipocj] = str_replace(',','.',$valor[$codprodcj][$tipocj]);
						$valorcj = $valor[$codprodcj][$tipocj];
						$valorcj = str_replace('.','',$valorcj);
						$valorcj = str_replace(',','.',$valorcj);

						if ($valorcj <> ""){
							#echo("valorcj=$valorcj - vcj=$valorcjold");

							$codpped = $prod->showcampo0();
							$precoold = $prod->showcampo4();
							$qtdeold = $prod->showcampo3();
							
							#echo("vt=$valorcjold");
													

							$preconew = ($precoold * ($valorcj/$valorcjold))*$qtdeold;
							$preconew = $preconew / $qtdeold;
											
							$prod->setcampo4($preconew);
							$prod->upProd("orcprodtemp", "codpped=$codpped");
						}

					}

				}

			

	


		// INSERE VALORES ALTERNATIVOS DOS PRODUTOS UNITARIOS


		$prod->listProdgeral("orcprodtemp", "codped=$codpedselect and tipoprod = 'UM' ", $array77, $array_campo77, "" );

			$reg = count ($array77);
			#echo("regun=$reg  ");

				for($y = 0; $y < count($array77); $y++ ){

					$prod->mostraProd( $array77, $array_campo77, $y );

					$codpped = $prod->showcampo0();
					$precoold = $prod->showcampo4();
					$qtdeold = $prod->showcampo3();
					$codprod = $prod->showcampo2();
					$prodextra = $prod->showcampo10();

					#echo("codprod = $codprod");
					

						$valorun = str_replace('.','',$valoru[$codprod]);
						$valorun = str_replace(',','.',$valoru[$codprod]);
						#$valorun = $valoru[$codprod];
						$valorunold = $precoold;

						#echo("valoru=$valorun - vcj=$valorunold");

						if ($valorun <> ""){

							#echo("vt=$valorcjold");
											
							$preconew = $precoold * $qtdeold * ($valorun/$valorunold);
							$preconew = $preconew / $qtdeold;
											
							$prod->setcampo4($preconew);
							$prod->upProd("orcprodtemp", "codpped=$codpped");
						}

				}

				


		#$Actionsec="list";
	
		

	 case "list":


		if ($ex==1){
			
			$prod->delProd("orcprodalttemp", "codped=$codpedselect");

		}
		
		$Actionsec="list";
	
		
		 break;


	  case "delete":

		$Actionsec="list";
		
		 break;
		
	  case "end":
		
			$dataatual = $prod->gdata();
    	
			// ATUALIZA BANCO DE DADOS DE ORÇAMENTOS
			$prod->listProd("orctemp", "codped=$codpedselect");
			$codempped = $prod->showcampo1();
			$prod->setcampo0("");
			$prod->setcampo11($dataatual);
			$prod->setcampo15(0);
			$prod->setcampo42('NO');
			$prod->addProd("orc", $uregped);
			$prod->listProd("orc", "codped=$uregped");
			$codbarra = $prod->codbarra($codempped,$uregped, "ORC");
			$prod->setcampo39($codbarra);
			$prod->upProd("orc", "codped=$uregped");

			$numreg = $prod->listProdgeral("orcprodtemp", "codped=$codpedselect", $array, $array_campo, "" );
			for($i = 0; $i < $numreg; $i++ ){
			$prod->mostraProd( $array, $array_campo, $i );
			$codprodped = $prod->showcampo2();
			$qtdepedold = $prod->showcampo3();
			$prod->setcampo0("");
			$prod->setcampo1($uregped);
			$prod->addProd("orcprod", $ureg);
			
			}
			
			// ATUALIZA TABELA ALTERNATIVA
			#$numreg1 = $prod->listProdgeral("orcprodalttemp", "codped=$codpedselect", $array1, $array_campo1, "" );
			#for($i = 0; $i < $numreg1; $i++ ){
			#$prod->mostraProd( $array1, $array_campo1, $i );
			#$prod->setcampo0($uregped);
			#$prod->setcampo7("");
			#$prod->addProd("orcprodalt", $ureg);
			
			#}


			// INSERE STATUS AVAL
			$prod->setcampo0("");
			$prod->setcampo1($uregped);
			$prod->setcampo2($dataatual);
			$prod->setcampo3("NOVO");
			$prod->addProd("orcstatus", $uregstatus);

			
			
			$prod->delProd("orctemp", "codped=$codpedselect");
			$prod->delProd("orcprodtemp", "codped=$codpedselect");

			$Actionter = "lock";
			$prod->msggeral("O orçamento foi inserido corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pgold", 0);

	
		
		 break;


		 case "importacao":

		
		
			// IMPORTA BANCO DE DADOS DE ORÇAMENTOS
			$prod->listProd("orc", "codped=$codpedimport");
				$prod->setcampo0("");
				$codempselect = $prod->showcampo1();
				$codclienteselect = $prod->showcampo2();
				$codvendold = $prod->showcampo3();
				$prod->addProd("orctemp", $uregped);
				$codpedselect = $uregped;
				$palavrachave="";

			$numreg = $prod->listProdgeral("orcprod", "codped=$codpedimport", $array, $array_campo, "" );
			for($i = 0; $i < $numreg; $i++ ){
				$prod->mostraProd( $array, $array_campo, $i );
				$prod->setcampo0("");
				$prod->setcampo1($uregped);
				$prod->addProd("orcprodtemp", $ureg);
			}

			// ATUALIZA TABELA ALTERNATIVA
			#$numreg1 = $prod->listProdgeral("orcprodalt", "codped=$codpedimport", $array1, $array_campo1, "" );
			#for($i = 0; $i < $numreg1; $i++ ){
			#$prod->mostraProd( $array1, $array_campo1, $i );
			#$prod->setcampo0($uregped);
			#$prod->setcampo7("");
			#$prod->addProd("orcprodalttemp", $ureg);
			
			#}

			$Action="update";
			#$Actionsec="list";
		
		
		 break;



}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){

		 $prod->listProd("orctemp", "codped=$codpedselect");

	    	$codpped = $prod->showcampo0();
			$codemp = $prod->showcampo1();
			$codcliente = $prod->showcampo2();
			$codvend = $prod->showcampo3();
			$endentrega = $prod->showcampo4();
			$refentrega = $prod->showcampo5();
			$obsentrega = $prod->showcampo6();
			$obsmontagem = $prod->showcampo16();
			$dataprevent = $prod->showcampo12();
			$dataprevent = $prod->fdata($dataprevent);
			$horaprevent = $prod->showcampo17();
			$modoentr = $prod->showcampo25();
			$obsfinanceiro = $prod->showcampo18();
			$nomeclienteold = $prod->showcampo36();
			$telold = $prod->showcampo37();
			$emailold = $prod->showcampo38();
			$acold = $prod->showcampo40();

			
		
		 $prod->listProdgeral("orcprodtemp", "codped=$codpedselect", $array3, $array_campo3 , "order by tipocj");
		

		$Action = "list";

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

include("sif-topo.php");

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

	if (!(consisteVazioTamanho(form, form.nomeprod.name, 100)))
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

</script>

<script language=");echo('"Javascript1.2"><!-- // load htmlarea
_editor_url = "textarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);');echo("
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src=");echo('"');echo("' +_editor_url+ 'editor.js");echo('"');echo("');
  document.write(' language=");echo('"Javascript1.2"');echo("></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update"):

$codped=$codpedselect;

		 $prod->listProd("orctemp", "codped=$codped");
		
		$codemp = $prod->showcampo1();
		$codcliente = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$endentrega = $prod->showcampo4();
		$refentrega = $prod->showcampo5();
		$obsentrega = $prod->showcampo6();
		$dataped = $prod->showcampo11();
		$dataprev = $prod->showcampo12();
		$datapedf = $prod->fdata($dataped);
		$dataprevf = $prod->fdata($dataprev);
		$mlb = $prod->showcampo7();
		$mcv = $prod->showcampo19();
		$vpv = $prod->showcampo8();
		$vt = $prod->showcampo9();
		$vpp = $prod->showcampo10();
		$mlbf = number_format($mlb,2,',','.'); 
		$mcvf = number_format($mcv,5,',','.'); 
		$vpvf = number_format($vpv,2,',','.'); 
		$vtf = number_format($vt,2,',','.'); 
		$vppf = number_format($vpp,2,',','.'); 
		$obsmontagem = $prod->showcampo16();
		$dataprevent = $prod->showcampo12();
		$dataprevent = $prod->fdata($dataprevent);
		$horaprevent = $prod->showcampo17();
		$obsfinanceiro = $prod->showcampo18();
		$modoentr = $prod->showcampo25();
		$condicaop = $prod->showcampo29();
		$garantia = $prod->showcampo30();
		$pentrega = $prod->showcampo31();
		$impostos = $prod->showcampo32();
		$frete = $prod->showcampo33();
		$validade = $prod->showcampo34();
		$obsorcamento = $prod->showcampo35();
		$nomeclienteold = $prod->showcampo36();
		$telold = $prod->showcampo37();
		$emailold = $prod->showcampo38();
		$acold = $prod->showcampo40();

		$condicaop = urldecode($condicaop);
		$obsorcamento = urldecode($obsorcamento);
		

		
	$prod->listProdU("nome","empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	$prod->listProdU("nome","vendedor", "codvend=$codvend");
				
		$nomevendold = $prod->showcampo0();
		
	

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
      <td width='112'><b><font face='Verdana' size='1' >DADOS
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' ><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FORMA DE PAGAMENTO</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n4c.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'  color='#FF0000'><b>FINALIZAR</b></font></td>
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

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 



<div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
     
    <center>
     
   	  <tr>
        <td width='50%' bgcolor='#000000'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PROPOSTA COMERCIAL:</b></font></td>
      </center>
      <td width='50%' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
    </tr>

	


      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>VENDEDOR:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
      </center>
      <td width='50%' bgcolor='#F0F0F0'>
        <p align='right'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font face=' Verdana, Arial, Helvetica, sans-serif'>
       $nomeempold</font></font></td>
    </tr>
    <center>
    <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        CLIENTE</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>CLIENTE:<br>
        </font><font color='#000000'>$nomeclienteold</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>A/C:<br>
      </font></b><font color='#000000'>$acold</font></font></td>
    </tr>
	<tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>TELEFONE:<br></b>
        </font><font color='#000000'>$telold</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>EMAIL:<br>
      </font></b><font color='#000000'>$emailold</font></font></td>
    </tr>
    <tr>
      <td width='100%' colspan='3' bgcolor='#FFFFFF' valign='top'>
        <hr size='0'>
      </td>
    </tr>
    </table>
  </div>

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 



");

       
		


echo("
	


<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO ORÇAMENTO</b> </font></td>
  </tr>
</table>


<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>CONJUNTO</b></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS DO ORÇAMENTO</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PU(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PT(R$)</b></font></td>
   
  </tr>

  ");

	
	  $prod->listProdgeral("orcprodtemp", "codped=$codped", $array3, $array_campo3 , "order by tipocj,codprodcj");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS DE CONJUNTOS</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
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
			$nomeprod = $prod->showcampo11();

			$descres = "";
			if ($nomeprod == ""){
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			
			}

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

			
			if ($tipocj == $contcjshow){
				$tipocjold = $tipocj;
				$codprodcjold = $codprodcj;
				$qtdecjold = $qtdecj[$codprodped];
			}

		

	if ($tipocj <> $contcjshow){

		

			echo(" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
  </tr>
		
  ");
	
	  $ptotal = $ptotal + $pmtotal;
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
  </tr>
		
  ");
		
			// SUBSTITUI PRECOS DA TABELA POR PRECOS ALTERADOS
			$prod->listProdgeral("orcprodalttemp", "codped=$codped and codprodcj=$codprodcj", $array211, $array_campo211 , "");
			$prod->mostraProd( $array211, $array_campo211, 0 );
			$pcj = $prod->showcampo2();
			$qtde = $prod->showcampo6();
			
			if (count($array211) == 0){
		
				$putotal = $putotal +$puu;
				$pmtotal = $pmtotal +$put;
				
			}else{
				
				$putotal = $pcj/$qtde;
				$pmtotal = $pcj;

			}

		
		$putotalf = number_format($putotal,2,',','.'); 
		$pmtotalf = number_format($pmtotal,2,',','.'); 

		}
		
	}

		$ptotal = $ptotal + $pmtotal;
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
   
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");
  
  $pmtotalu = 0.00;	

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
			$nomeprod = $prod->showcampo11();
		
			$descres = "";
			if ($nomeprod == ""){
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			
			}

			
			$k=$i+1;

			$nomeprodcj = "";

			
			
		
			// SUBSTITUI PRECOS DA TABELA POR PRECOS ALTERADOS
			$prod->listProdgeral("orcprodalttemp", "codped=$codped and codprod=$codprodped", $array212, $array_campo212 , "");
			$prod->mostraProd( $array212, $array_campo212, 0 );
			$pun = $prod->showcampo2();
			$qtdeun = $prod->showcampo6();
			
			if (count($array212) == 0){
		
				$put = $puu*$qtde;
				
			}else{
				
				$puu = $pun/$qtdeun;
				$put = $pun;

			}

		
		$puuf = number_format($puu,2,',','.'); 
		$putf = number_format($put,2,',','.'); 
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
  </tr>
		
  ");

		$ptotal = $ptotal + $put;
		$pmtotalu = $pmtotalu +$put;
		$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 
	 
if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
	
	echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotaluf</b></font></td>
   
  </tr>
		
  ");


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotal = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
  
  </tr>
		
</table>

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
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - DADOS COMPLEMENTARES</font></b></td>
  </tr>
</table>



		 <br><br>
	<center>	
 <table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
    <tr bgcolor='#FFFFFF'> 
      <td width='540' colspan='2'><p align ='center'><b><font color='#336699'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONDIÇÕES
        DE PAGAMENTO:</font></font></b><br><br></p>
      <font size='1' face='Verdana'>$condicaop</font><br><br>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='115'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>GARANTIA:</font></b></td>
      <td width='419'><pre>  <font size='1' face='Verdana'>$garantia</font></pre></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='115'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>PRAZO
        DE ENTREGA:</font></b></td>
      <td width='419'>  <font size='1' face='Verdana'>até<b> $pentrega </b>dia(s)</font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='115'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>IMPOSTOS:</font></b></td>
      <td width='419'>  <font size='1' face='Verdana'>$impostos</font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='115'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>FRETE:</font></b></td>
      <td width='419'>  <font size='1' face='Verdana'>$frete</font></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='115'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#336699'>VALIDADE
        DA PROPOSTA:</font></b></td>
      <td width='419'>  <font size='1' face='Verdana'><b>$validade </b>dia(s)</font></td>
    </tr>
	 <tr bgcolor='#FFFFFF'> 
      <td width='540' colspan='2' ><br><p align ='center'><b><font color='#336699'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OBSERVAÇÕES:</font></font></b><br><br></p>
      <font size='1' face='Verdana'>$obsorcamento</font><br><br>
    </tr>
    
  </table>
 </center>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>

    <div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='18'><img border='0' src='images/bt-cancelaped.gif' ></td>
      <td width='172'><font size='1' face='Verdana'><b><a href=' $PHP_SELF?Action=start&amp;codpped=$codpped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codpednew=$codped&amp;codclienteselect=$codcliente&amp;codempselect=$codemp&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgold'>CANCELAR ORÇAMENTO</a></b></font></td>
	   <td width='18'><img border='0' src='images/bt-recalculaped.gif' ></td>
      <td width='168'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=list&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codpedselect=$codped&amp;codcliente=$codcliente&amp;codemp=$codemp&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&pgold=$pgold'>CORRIGIR ORÇAMENTO</a></b></font></td>
      <td width='18'><font size='1' face='Verdana'><b><img border='0' src='images/bt-fechaped.gif'></b></font></td>
      <td width='151'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=end&amp;codpedselect=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&pgold=$pgold'>FINALIZAR ORÇAMENTO</a></b></font></td>
     </tr>
  </table>
  </center>
</div>

		  <br><br>
		  <br>

		");


endif;

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "delete" or $Action == "list"):
	
		
	$prod->listProdU("nome","vendedor", "codvend=$codvend");
		
		$nomevendold = $prod->showcampo0();


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);

echo("
<a name='topo'></a>

 
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
      <td width='112'><b><font face='Verdana' size='1' >DADOS
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' ><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3c.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1' color='#FF0000'><b>FORMA DE PAGAMENTO</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n4.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
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


<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 


<div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
     
    <center>
     
   	  <tr>
        <td width='50%' bgcolor='#000000'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PROPOSTA COMERCIAL:</b></font></td>
      </center>
      <td width='50%' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
    </tr>

	 <tr>
        <td width='100%' bgcolor='#FFFFFF' colspan='2'>
		 
	        <table border='0' width='100%' cellspacing='1' cellpadding='2'>
            <tr>
              <td width='5%'>
                <p align='right'><img border='0' src='images/seta_laranja.gif' ></p>
              </td>
    <center>
              <td width='19%'><font size='1' face='Verdana'><b><a href='#lista'>VERIFICA <br>
               ESTOQUE</a></b></font></td>
  </center>
              <td width='8%'>
                <p align='right'><img border='0' src='images/seta_laranja.gif' ></p>
              </td>
    <center>
              <td width='16%'><b><font size='1' face='Verdana'><a href='#fpg'>FORMA PAGAMENTO</a></font></b></td>
  </center>
              <td width='8%'>
                <p align='right'><img border='0' src='images/seta_laranja.gif' ></p>
              </td>
    <center>
              <td width='18%'><b><font size='1' face='Verdana'><a href='#obsfin'>DADOS COMPLEMENTARES</a></font></b></td>
              <td width='8%'>
                <p align='center'><img border='0' src='images/seta.gif' ></p>
              </td>
              <td width='18%'><b><font size='1' face='Verdana'><a href='#obsfin'>PRÓXIMA<br>
                ETAPA</a></font></b></td>
            </tr>
          </table>
 </td>
	 </tr>


      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>VENDEDOR:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
      </center>
      <td width='50%' bgcolor='#F0F0F0'>
        <p align='right'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font face=' Verdana, Arial, Helvetica, sans-serif'>
       $nomeempold</font></font></td>
    </tr>
    <center>
    <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        CLIENTE</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>CLIENTE:<br>
        </font><font color='#000000'>$nomeclienteold</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>A/C:<br>
      </font></b><font color='#000000'>$acold</font></font></td>
    </tr>
	<tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>TELEFONE:<br></b>
        </font><font color='#000000'>$telold</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>EMAIL:<br>
      </font></b><font color='#000000'>$emailold</font></font></td>
    </tr>
    <tr>
      <td width='100%' colspan='3' bgcolor='#FFFFFF' valign='top'>
        <hr size='0'>
      </td>
    </tr>
    </table>
  </div>



<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 

 
 
 <a name='lista'></a>
		<br>

<form method='POST' action='$PHP_SELF?Action=recalc'  name='Form'>

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - VERIFICA QUANTIDADES NO ESTOQUE</b> </font></td>
  </tr>
</table>



<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>CONJUNTO</b></font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS DO ORÇAMENTO</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PREVISÃO</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>LIMT</b></font></td>
    
  </tr>

  ");

	
if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=6><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color ='#D6B778'><b>PRODUTOS DE CONJUNTOS</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO DE PRODUTOS UNITARIOS
     $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){
			
			$lmt="";
			$datapreventant = "0000-00-00";
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtdecj[$codprodped] = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$nomeprod = $prod->showcampo11();

			

				//VERIFICA ESTOQUES
				$prod->clear();
				$prod->listProdU("qtde, reserva","estoque", "codprod=$codprodped and codemp=$codemp");
				
				$qtde_est[$codprodped] = $prod->showcampo0();
				$reserva_est[$codprodped] = $prod->showcampo1();

				if ($reserva_est[$codprodped] < 0 ){$reserva_est[$codprodped] = 0;}
				if ($qtde_est[$codprodped] < 0 ){$qtde_est[$codprodped] = 0;}

				$estoque = $qtde_est[$codprodped]-($qtde_uso[$codprodped]+$reserva_est[$codprodped]);
						#echo("est[$codprodped]= $est[$codprodped]");
								

					// VERIFICA SE O ESTOQUE ESTA COMPATIVEL
					if ($qtdecj[$codprodped] <= $estoque):

						$statusest = "<IMG SRC='images/est_ok.gif'  BORDER=0 >";
						$datapreventcj = "0000-00-00";
						$statusfinal = "OK";
						$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
											
												
					else: // NAO TEM ESTOQUE

					
						//VERIFICA OC
						$prod->clear();
						$prod->listProdU("SUM(qtdecomp)","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc");
						
						$qtde_oc[$codprodped] = $prod->showcampo0();

						$estoque_oc = $qtde_oc[$codprodped] - ($qtde_uso[$codprodped]+$reserva_est[$codprodped] + $qtdecj[$codprodped]);
							
						// ESTOQUE_OC <= QTDE_PED		
						if ($qtdecj[$codprodped] <= ($estoque_oc + $qtdecj[$codprodped])){

						// DATA PREVCHEGADA
						$prod->clear();
						$prod->listProdSum("dataprevcheg","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc", $array77, $array_campo77, "ORDER BY dataprevcheg LIMIT 0,1" );
						$prod->mostraProd( $array77, $array_campo77, 0 );
						$dataprevcheg[$codprodped] = $prod->showcampo0();
						
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = $dataprevcheg[$codprodped];
							$statusfinal = "PREV";
							$dataprevcjf = $prod->fdata($dataprevcheg[$codprodped]);
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
							$lmt[$codprodped] = "<IMG SRC='images/est_prev.gif'  BORDER=0 > <br>".$estoque_oc;
						}
							
						// ESTOQUE_OC > QTDE_PED		
						if ($qtdecj[$codprodped] > ($estoque_oc + $qtdecj[$codprodped])){
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = "0000-00-00";
							$statusfinal = "S/PREV";
							$dataprevcjf = "<IMG SRC='images/est_no.gif'  BORDER=0 > ";
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
						}
							
																			
						$statusest = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corstatus'>$dataprevcjf</font>";
						
					endif;

				$qtdeestold[$codprodped]++;
				
				#echo("   -    qtdeestold[$codprodped] = $qtdeestold[$codprodped]");
			
			$descres = "";
			if ($nomeprod == ""){
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			
			}

			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
		
			$k=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}
			
			$put = $puu*$qtdecj[$codprodped];
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

			if ($tipocj == $contcjshow){
				$tipocjold = $tipocj;
				$codprodcjold = $codprodcj;
				$qtdecjold = $qtdecj[$codprodped];
			}
	
	
	if ($tipocj <> $contcjshow){
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=8>
 <div align='center'>
    <center>
    <table border='0' width='500' cellspacing='1' cellpadding='2'>
      <tr>
        <td width='92'><font size='1' face='Verdana' color='#800000'><b>UNITÁRIO:</b></font></td>
        <td width='93'><font size='1' face='Verdana'><b>R$ $putotalf</b></font></td>
        <td width='77'><font size='1' face='Verdana' color='#800000'><b>SUBTOTAL:</b></font></td>
        <td width='91'><b><font size='1' face='Verdana'>R$ $pmtotalf</font></b></td>
		<td width='105'><font size='1' face='Verdana'><b>R$ <input type='text' name='valor[$codprodcjold][$tipocjold]' size='9'    onKeyUp='this.value = adjust(this);'></b></font></td>
      </tr>
    </table>
			<input type='hidden' name='valorcjold[$codprodcjold][$tipocjold]' value='$pmtotal'>
	</center>
  </div>

		
		<td>
		<tr>
				");

	 $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtdecj[$codprodped]</b></font></td>
	
	<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>$statusest</b></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>$lmt[$codprodped]</b></font></td>
    
  </tr>
		
  ");
	
	$ptotal = $ptotal + $put;

	
		
		// ATUALIZACAO DO STATUS DO PRODUTO
		$prod->listProd("orcprodtemp", "codpped=$codpped");

		$prod->setcampo5($datapreventcj);
		$prod->setcampo6($statusfinal);
		$prod->upProd("orcprodtemp", "codpped=$codpped");

		}
		
	$putotal = $putotal +$puu;
	$pmtotal = $pmtotal +$put;
	$putotalf = number_format($putotal,2,',','.'); 
	$pmtotalf = number_format($pmtotal,2,',','.'); 
	#$qtdecjant1[$codprodped] = $qtdecjant1[$codprodped] + $qtdecjant[$codprodped];
	}

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=8>
 <div align='center'>
    <center>
    <table border='0' width='500' cellspacing='1' cellpadding='2'>
      <tr>
        <td width='92'><font size='1' face='Verdana' color='#800000'><b>UNITÁRIO:</b></font></td>
        <td width='93'><font size='1' face='Verdana'><b>R$ $putotalf</b></font></td>
        <td width='77'><font size='1' face='Verdana' color='#800000'><b>SUBTOTAL:</b></font></td>
        <td width='91'><b><font size='1' face='Verdana'>R$ $pmtotalf</font></b></td>
		<td width='105'><font size='1' face='Verdana'><b>R$ <input type='text' name='valor[$codprodcjold][$tipocjold]' size='9'   onKeyUp='this.value = adjust(this);' ></b></font></td>
      </tr>
    </table>
			<input type='hidden' name='codprodcjnv[$tipocjold]' value='$codprodcjold'>
			<input type='hidden' name='valorcjold[$codprodcjold][$tipocjold]' value='$pmtotal'>
			<input type='hidden' name='qtdecjold[$tipocjold]' value='$qtdecjold'>
			<input type='hidden' name='contcj' value='$tipocjold'>
    </center>
  </div>

		
		<td>
		<tr>
				");

	
	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=6><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color ='#D6B778'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");
		 $pmtotalu = 0.00;	

	 // PRODUTOS UNITARIO
	 for($i = 0; $i < count($array3); $i++ ){

			$lmt="";
			
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtdecj[$codprodped] = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$nomeprod = $prod->showcampo11();
			$prodextra = $prod->showcampo10();

			

				//VERIFICA ESTOQUES
				$prod->clear();
				$prod->listProdU("qtde, reserva","estoque", "codprod=$codprodped and codemp=$codemp");
				
				$qtde_est[$codprodped] = $prod->showcampo0();
				$reserva_est[$codprodped] = $prod->showcampo1();

				if ($reserva_est[$codprodped] < 0 ){$reserva_est[$codprodped] = 0;}
				if ($qtde_est[$codprodped] < 0 ){$qtde_est[$codprodped] = 0;}

				$estoque = $qtde_est[$codprodped]-($qtde_uso[$codprodped]+$reserva_est[$codprodped]);
						#echo("est[$codprodped]= $est[$codprodped]");
								

					// VERIFICA SE O ESTOQUE ESTA COMPATIVEL
					if ($qtdecj[$codprodped] <= $estoque):

						$statusest = "<IMG SRC='images/est_ok.gif'  BORDER=0 >";
						$datapreventcj = "0000-00-00";
						$statusfinal = "OK";
						$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
											
												
					else: // NAO TEM ESTOQUE

					
						//VERIFICA OC
						$prod->clear();
						$prod->listProdU("SUM(qtdecomp)","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc");
						
						$qtde_oc[$codprodped] = $prod->showcampo0();

						$estoque_oc = $qtde_oc[$codprodped] - ($qtde_uso[$codprodped]+$reserva_est[$codprodped] + $qtdecj[$codprodped]);
							
						// ESTOQUE_OC <= QTDE_PED		
						if ($qtdecj[$codprodped] <= ($estoque_oc + $qtdecj[$codprodped])){

						// DATA PREVCHEGADA
						$prod->clear();
						$prod->listProdSum("dataprevcheg","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc", $array77, $array_campo77, "ORDER BY dataprevcheg LIMIT 0,1" );
						$prod->mostraProd( $array77, $array_campo77, 0 );
						$dataprevcheg[$codprodped] = $prod->showcampo0();
						
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = $dataprevcheg[$codprodped];
							$statusfinal = "PREV";
							$dataprevcjf = $prod->fdata($dataprevcheg[$codprodped]);
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
							$lmt[$codprodped] = "<IMG SRC='images/est_prev.gif'  BORDER=0 > <br>".$estoque_oc;
						}
							
						// ESTOQUE_OC > QTDE_PED		
						if ($qtdecj[$codprodped] > ($estoque_oc + $qtdecj[$codprodped])){
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = "0000-00-00";
							$statusfinal = "S/PREV";
							$dataprevcjf = "<IMG SRC='images/est_no.gif'  BORDER=0 > ";
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
						}
							
																			
						$statusest = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corstatus'>$dataprevcjf</font>";
						
					endif;

				$qtdeestold[$codprodped]++;
				
				#echo("   -    qtdeestold[$codprodped] = $qtdeestold[$codprodped]");
				
			
			$descres = "";
			if ($nomeprod == ""){
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			}

			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtdecj[$codprodped];
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtdecj[$codprodped]</b></font></td>
	
    <td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>$statusest</b></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>$lmt[$codprodped]</b></font></td>
 
  </tr>


		
  ");

  	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=8>
 <div align='center'>
    <center>
    <table border='0' width='500' cellspacing='1' cellpadding='2'>
      <tr>
        <td width='92'><font size='1' face='Verdana' color='#800000'><b></b></font></td>
        <td width='93'><font size='1' face='Verdana'><b></b></font></td>
        <td width='77'><font size='1' face='Verdana' color='#800000'><b>SUBTOTAL:</b></font></td>
        <td width='91'><b><font size='1' face='Verdana'>R$ $putf</font></b></td>
		<td width='105'>
		");
		if ($prodextra == 0){
		echo("
		<font size='1' face='Verdana'><b>R$ <input type='text' name='valoru[$codprodped]' size='9'    onKeyUp='this.value = adjust(this);'></b></font>
		");
		}
		echo("
		
		</td>
      </tr>
    </table>
			
    </center>
  </div>

		<input type='hidden' name='valorunold[$codprodped]' value='$put'>
				<td>
		<tr>
				");
	
	
	$ptotal = $ptotal + $put;
	$pmtotalu = $pmtotalu + $put;
	$pmtotaluf = number_format($pmtotalu,2,',','.'); 
		
	


		// ATUALIZACAO DO STATUS DO PRODUTO
		$prod->listProd("orcprodtemp", "codpped=$codpped");

		$prod->setcampo5($dataprevent);
		$prod->setcampo6($statusfinal);
		$prod->upProd("orcprodtemp", "codpped=$codpped");

		}
		
	 }
 if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
echo("
		
			<input type='hidden' name='contun' value='$k'>
				");

		


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=6><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotalf = number_format($ptotal,2,',','.'); 

  
	echo("
		</table>
	<br>
<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
           <div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='28'><font size='1' face='Verdana'><b><img border='0' src='images/bt-recalculaped.gif' width='27' height='27'></b></font></td>
      <td width='126'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=update&codpped=$codpped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpednew=$codpedselect&codclienteselect=$codcliente&codempselect=$codemp&codvendselect=$codvend&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pgorc'>CORRIGIR ORÇAMENTO</a></b></font></td>
      <td width='29'></td>
      <td width='198'><input class='sbttn' type='submit' value='Recalcular Valores' name='B1'></td>
      <td width='198'><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font size='1' color='#336699'>VALOR 
                ORÇAMENTO:</font><font size='2'><br>
                R$</font></b><font size='2'><b> $ptotalf </b></font></font></td>
    </tr>
  </table>
  </center>
</div>

		  	<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codpedselect' value='$codpedselect'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='pgold' value='$pgold'>


</form>
 
  
    </td>
  </tr>
</table>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td width='60%' align= 'right'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#FF0000'>SIMULADOR DE ORÇAMENTOS:</b> </font>
  </td>
   <td width='10%'><font size='1' face='Verdana'><b><p align='center'><img border='0' src='images/orcamento.gif' ></b></font></td>
   <td width='30%'><font size='1' face='Verdana'><b>
	<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('inicioorc.php?Action=list&vt=$ptotal&&loginselect=$login&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pgorc','name','450','400','yes');return 
false");echo('"');echo(">FAZER<br>ORÇAMENTO</a></b></font>
</td>
 </tr>
</table>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
  </table>
  </center>
</div>

<a name='obsfin'></a>


<br>
<form method='POST' action='$PHP_SELF?Action=update'  name='Form'>
<a name='dadoscompl'></a>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - DADOS COMPLEMENTARES</font></b></td>
  </tr>
</table>



 <table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
    <tr bgcolor='#86ACB5'> 
      <td  colspan='2' width='540'  ><font face='Verdana, Arial, Helvetica, sans-serif'><b></b></font> 
        <div align='center'>
          <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font size='1' color='#FFFFFF'>DADOS
          </font></b><font size='1' color='#FFFFFF'><b>COMPLEMENTARES</b></font></font></div>
      </td>
    </tr>
    <tr bgcolor='#F3F8FA' align='center'> 
    
      <td width='540' colspan ='2'>
		  <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>CONDIÇÕES
        DE PAGAMENTO:</b></font><br><br>
   <textarea rows='5' name='condicaop' cols='60' rows='200'  style='height:200 '>- À vista R$
- Entrada de R$     +   parcelas iguais de R$
- Entrada de R$     +   parcelas iguais de R$</textarea>
                              </font>
	<script language='javascript1.2'>
	editor_generate('condicaop');
	</script>		 
 
 </td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='108'><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><b>GARANTIA:</b></font></td>
      <td width='424'><textarea rows='4' name='garantia' cols='50'>Regido conforme contrato de compra e venda ;
</textarea></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='108'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PRAZO
        DE </b></font><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>ENTREGA:</font></b></font></td>
      <td width='424'><font color='#000000' face='Verdana' size='1'>ATÉ <input type='text' name='pentrega' size='2' maxlength='2'>
        DIA(S)</font></td>
    </tr>
	 <tr bgcolor='#F3F8FA'> 
      <td width='108'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>IMPOSTOS:</b></font><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>:</font></b></font></td>
      <td width='424'><textarea rows='2' name='impostos' cols='50'>Todos os impostos, estão inclusos nos preços</textarea></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='108'><b><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>FRETE:&nbsp;</font></b></td>
      <td width='424'><input type='text' name='frete' size='46' value='CIF ou FOB'></td>
    </tr>
    <tr bgcolor='#F3F8FA'> 
      <td width='108'><b><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>VALIDADE
        DA PROPOSTA:</font></b></td>
      <td width='424'><font color='#000000' face='Verdana' size='1'><input type='text' name='validade' size='2' maxlength='2'>
        DIA(S)</font></td>
    </tr>
	<tr bgcolor='#F3F8FA' align='center'> 
    
      <td width='540' colspan ='2'>
		  <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBSERVAÇÕES:</b></font><br><br>
   <textarea rows='5' name='obsorcamento' cols='60' rows='200'  style='height:200 '></textarea>
                             
	<script language='javascript1.2'>
	editor_generate('obsorcamento');
	</script>		 
 
 </td>
    </tr>
	
  </table>
			<br>
  <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Próxima Etapa => Finalizar' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>


			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codpedselect' value='$codpedselect'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='pgold' value='$pgold'>


</form>

	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
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
endif;

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////


/// INICIO - CONTADOR DE PAGINAS ////

if ($Action == "list"){

#-- CASO TENHA ALGUMA VARIAVEL EXTRA PARA PASSAR PARA OUTRA PAGINA --#
#$compl="codpesq=$codpesq&retlogin=$retlogin&connectok=$connectok"; 
#include("numcontg.php");
}

/// FIM - CONTADOR DE PAGINAS ////


/// INCLUSÃO DO RODAPE ////
include ("sif-rodape.php");


}
?>
       
