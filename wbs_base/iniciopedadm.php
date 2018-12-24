

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataped DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "ADMINISTRAÇÃO DE PEDIDOS";

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

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='ENTR'", $array616, $array_campo616 , "");

		if (count($array616) == 0){

		$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");

		if (count($array614) == 0){

		$dataatual = $prod->gdata();

		// ATUALIZA STATUS DA TABELA
		
		$prod->setcampo1($codped);
		$prod->setcampo2($dataatual);
		$prod->setcampo3($statuspeds);
			
		$prod->addProd("pedidostatus", $ureg);

		$prod->listProd("pedido", "codped=$codped");
		$prod->setcampo14($statuspeds);
		if ($statuspeds == "ENTR" or $statuspeds == "CANCEL"){
		$prod->setcampo13($dataatual);
		$prod->setcampo15(1);
		}

		$prod->upProd("pedido", "codped=$codped");
		}
		}
		
        break;

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":

		$prod->delProd("pedidostatus", "codpstatus=$codpstatus");

		$prod->listProdgeral("pedidostatus", "codped=$codped", $array615, $array_campo615 , "order by datastatus DESC");
		$prod->mostraProd( $array615, $array_campo615, 0 );
		$statuspedant = $prod->showcampo3();

		$prod->listProd("pedido", "codped=$codped");
		$prod->setcampo14($statuspedant);
		
		if ($apgdata == 1){
		$prod->setcampo13("");
		$prod->setcampo15("");
		}
		
		$prod->upProd("pedido", "codped=$codped");
		
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";

		if ($palavrachave == ""):
							
			$condicao2 = "";
			if ($codempselect <> ""):

				if ($codpedpesq <>""):
					$condicao3 .= "pedido.codemp='$codempselect'";
					$condicao3 .= "and pedido.codbarra='$codpedpesq'";
					$condicao3 .= "and pedido.codcliente=clientenovo.codcliente";
				else:
					$condicao3 = "pedido.hist = '$hist' and pedido.codemp='$codempselect' and pedido.codcliente=clientenovo.codcliente";
				endif;
			
			else:

				$condicao3 = "pedido.hist = '$hist' and pedido.codcliente=clientenovo.codcliente";
		
			endif;
		

		else:
			
			if ($codempselect <> ""):

				if ($codpedpesq <>""):
					$condicao3 .= "pedido.codemp='$codempselect'";
					$condicao3 .= "and pedido.codbarra='$codpedpesq'";
					$condicao3 .= "and pedido.codcliente=clientenovo.codcliente";
				else:
					$condicao3 = "pedido.hist = '$hist' and pedido.codemp='$codempselect' and pedido.codcliente=clientenovo.codcliente and" . $condicao2 ;
				endif;
			
			else:

				$condicao3 = "pedido.hist = '$hist' and pedido.codcliente=clientenovo.codcliente ";
			
			endif;

		endif;


		break;


		
		}

		
		
		$numreg = $prod->listProdgeral("pedido, clientenovo", $condicao3, $array, $array_campo, "" );

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral("pedido, clientenovo", $condicao3, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

include("sif-topo.php");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "delete"):


	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProd("pedido", "codped=$codped");
		
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
		$obsapcredito = $prod->showcampo26();
		$nf = $prod->showcampo24();
		$contrato = $prod->showcampo27();
		$libentr = $prod->showcampo21();
		$notafin = $prod->showcampo28();
		$codbarra = $prod->showcampo29();
	
	
	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProd("clientenovo", "codcliente=$codcliente");
				
		$xcodcliente=	$prod->showcampo0();
		$xnome=			$prod->showcampo1();
		$xdatacad=		$prod->showcampo2();
		$xtipocliente=	$prod->showcampo3();
		$xcpf=			$prod->showcampo4();
		$xcnpj=			$prod->showcampo5();
		$xrg=			$prod->showcampo6();
		$xrgemissor=	$prod->showcampo7();
		$xie=			$prod->showcampo8();
		$xdatanasc=		$prod->showcampo9();
		$xdataativ=		$prod->showcampo10();
		$xsexo=			$prod->showcampo11();
		$xecivil=		$prod->showcampo12();
		$xnacionalidade=$prod->showcampo13();
		$xendereco=		$prod->showcampo14();
		$xbairro=		$prod->showcampo15();
		$xcidade=		$prod->showcampo16();
		$xcep=			$prod->showcampo17();
		$xestado=		$prod->showcampo18();
		$xtempolocal=	$prod->showcampo19();
		$xtipolocal=	$prod->showcampo20();
		$xdddtel1=		$prod->showcampo21();
		$xtel1=			$prod->showcampo22();
		$xdddtel2=		$prod->showcampo23();
		$xtel2=			$prod->showcampo24();
		$xramal=		$prod->showcampo25();
		$xfatmensal=	$prod->showcampo26();
		$xatividade=	$prod->showcampo27();
	// Dados da Empresa Cliente
		$xc_empresa=	$prod->showcampo28();
		$xc_cnpj=		$prod->showcampo29();
		$xc_tempoemp=	$prod->showcampo30();
		$xc_ocupacao=	$prod->showcampo31();
		$xc_descricao=	$prod->showcampo32();
		$xc_rendamensal=$prod->showcampo33();
		$xc_outrasrendas=$prod->showcampo34();
		$xc_endereco=	$prod->showcampo35();
		$xc_bairro=		$prod->showcampo36();
		$xc_cidade=		$prod->showcampo37();
		$xc_cep=		$prod->showcampo38();
		$xc_estado=		$prod->showcampo39();
		$xc_dddtel=		$prod->showcampo40();
		$xc_tel=		$prod->showcampo41();
		$xc_ramal=		$prod->showcampo42();
		$xc_endcorresp=	$prod->showcampo43();
	// Dados do Conjuge
		$xcj_nome=		$prod->showcampo44();
		$xcj_cpf=		$prod->showcampo45();
		$xcj_rg=		$prod->showcampo46();
		$xcj_rgemissor=	$prod->showcampo47();
		$xcj_datanasc=	$prod->showcampo48();
		$xcj_empresa=	$prod->showcampo49();
		$xcj_ocupacao=	$prod->showcampo50();
		$xcj_descricao=	$prod->showcampo51();
		$xcj_rendamensal=$prod->showcampo52();
		$xcj_dddtel=	$prod->showcampo53();
		$xcj_tel=		$prod->showcampo54();
		$xcj_ramal=		$prod->showcampo55();
	// Referencia Bancaria
		$xrb_banco=		$prod->showcampo56();
		$xrb_agencia=	$prod->showcampo57();
		$xrb_conta=		$prod->showcampo58();
		$xrb_tipo=		$prod->showcampo59();
		$xrb_dddtel=	$prod->showcampo60();
		$xrb_tel=		$prod->showcampo61();
		$xrb_clientedesde=$prod->showcampo62();
	// Referencia Pessoal
		$xrp_nome1=		$prod->showcampo63();
		$xrp_dddtel1=	$prod->showcampo64();
		$xrp_tel1=		$prod->showcampo65();
		$xrp_nome2=		$prod->showcampo66();
		$xrp_dddtel2=	$prod->showcampo67();
		$xrp_tel2=		$prod->showcampo68();
	// Referencia Comercial
		$xrc_nome1=		$prod->showcampo69();
		$xrc_dddtel1=	$prod->showcampo70();
		$xrc_tel1=		$prod->showcampo71();
		$xrc_nome2=		$prod->showcampo72();
		$xrc_dddtel2=	$prod->showcampo73();
		$xrc_tel2=		$prod->showcampo74();
	// Outros
		$xobsvend=		$prod->showcampo75();
		$xobscredito=	$prod->showcampo76();
		$xemail=		$prod->showcampo77();
		$xopcaixa=		$prod->showcampo79();
		$xopcaixashow = explode(":", $xopcaixa);
		$xasscontrato=	$prod->showcampo80();


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();
		
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
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

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 


<div align='center'>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='50%' bgcolor='#000000'>
        <p align='left'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PEDIDO:
        </b></font><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
      <center>
      <td width='50%' bgcolor='#000000'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='1'><b>USUÁRIO</b></font><font size='1'><b><font color='#86ACB5' face='Verdana, Arial, Helvetica, sans-serif'>:</font><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><br>
      </font><font color='#FFFFFF' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
      </tr>
      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          EMISSÃO PEDIDO:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datapedf</font></b></font></td>
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
        </font><font color='#000000'>$xnome</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CPF/CNPJ:<br>
      </font></b><font color='#000000'>$xcpf
      $xcgc</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDEREÇO:<br>
        </font>
        </b><font color='#000000'>$xendereco - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
    </tr>
    </table>
  </center>
</div>
");

if ($xtipocliente == "F"){

echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#808080'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES&nbsp;</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>RG:<br>
        </font></b><font color='#000000'>$xrg</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>EMISSOR:<br>
        </font></b><font color='#000000'>$xrgemissor</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>DATA
        NASCIMENTO:<br>
        </font></b><font color='#000000'>$xdatanasc</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>SEXO:<br>
        </font></b><font color='#000000'>$xsexo</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ESTADO
        CIVIL:<br>
        </font></b><font color='#000000'>$xecivil</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>NACIONALIDADE:<br>
        </font></b><font color='#000000'>$xnacionalidade</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TEMPO
        RESIDÊNCIA:<br>
        </font></b><font color='#000000'>$xtempolocal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO
        RESIDÊNCIA:<br>
        </font></b><font color='#000000'>$xtipolocal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel1)$xtel1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel2)$xtel2</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_empresa</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>CNPJ:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_cnpj</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>TEMPO
        EMPRESA:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_tempoemp</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>OCUPAÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_ocupacao</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DESCRIÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_descricao</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NACIONALIDADE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xnacionalidade</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>ENDEREÇO
        COMERCIAL:<br>
        </font>
        </b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>$xc_endereco - $xc_bairro - $xc_cidade - $xc_estado - $xc_cep</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xc_dddtel)$xc_tel</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RAMAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_ramal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ENDEREÇO
        CORRESP:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_endcorresp</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'>&nbsp;</td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RENDA
        MENSAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_rendamensal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>OUTRAS
        RENDAS:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xc_outrasrendas</font></font></td>
    </tr>
  </table>
  </center>
</div>
");

}else{

//INICIO _ PESSOA JURIDICA
echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES&nbsp;</b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>INSCRIÇÃO
        ESTADUAL</b></font><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xie</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>DATA
        ATIVAÇÃO:<br>
        </font></b><font color='#000000'>$xdataativ</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TEMPO
        LOCAL:<br>
        </font></b><font color='#000000'>$xtempolocal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO
        LOCAL:<br>
        </font></b><font color='#000000'>$xtipolocal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel1)$xtel1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RAMAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xramal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel2)$xtel2</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>FATURAMENTO</b></font><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>
        MENSAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xfatmensal</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ATIVIDADE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xatividade</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'>&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
");
}
echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        DO CÔNJUGE </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_nome</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>CPF:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_cpf</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RG:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_rg</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMISSOR:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_rgemissor</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
        NASCIMENTO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_datanasc</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>EMPRESA:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_empresa</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>OCUPAÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_ocupacao</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DESCRIÇÃO:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_descricao</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RENDA
        MENSAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_rendamensal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xcj_dddtel)$xcj_tel</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>RAMAL:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xcj_ramal</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'>&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        BANCÁRIA </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>BANCO:<br>
        </font></b><font color='#000000'>$xrb_banco</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>AGÊNCIA:<br>
        </font></b><font color='#000000'>$xrb_agencia</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CONTA:<br>
        </font></b><font color='#000000'>$xrb_conta</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO:<br>
        </font></b><font color='#000000'>$xrb_tipo</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrb_dddtel)$xrb_tel</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CLIENTE
        DESDE:<br>
        </font></b><font color='#000000'>$xrb_clientedesde</font></font></td>
    </tr>
  </table>
  </center>
</div>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        PESSOAL </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrp_nome1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrp_dddtel1)$xrp_tel1</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrp_nome2</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrp_dddtel2)$xrp_tel2</font></font></td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='2' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        COMERCIAL </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrc_nome1</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        1:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrc_dddtel1)$xrc_tel1</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$xrc_nome2</font></font></td>
      <td width='50%' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE
        2:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrc_dddtel2)$xrc_tel2</font></font></td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' bgcolor='#C0C0C0'><font size='1' face='Verdana' color='#FFFFFF'><b>SÓCIO
        SOLIDÁRIO</b></font></td>
    </tr>
");

  $prod->listProdgeral("relacaocli", "codcliente_pri=$codcliente", $array311, $array_campo311 , "");


		for($i = 0; $i < count($array311); $i++ ){
			
			$prod->mostraProd( $array311, $array_campo311, $i );

			$codcliente_sec = $prod->showcampo2();

		$prod->listProd("clientenovo", "codcliente=$codcliente_sec");
				
		$xcodcliente=	$prod->showcampo0();
		$xnomesocio=	$prod->showcampo1();
		
		$xcpf=			$prod->showcampo4();

echo("
    <tr>
      <td width='100%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>NOME:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'><B>COD:</B> $xcodcliente - $xnomesocio - $xcpf </font></font></td>
    </tr>
");
		}
	echo("
    
  </table>
  </center>
</div>
<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' colspan='2' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS DE ENTREGA</b></font></td>
    </tr>
    <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$endentrega</font></td>
      <td width='304' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>REF.
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$refentrega</font></td>
    </tr>
    <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MODO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$modoentr</font></td>
      <td width='304' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PREVISÃO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dataprevent - $horaprevent</font></td>
    </tr>
    
      <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsentrega</font></td>
	<td width='304' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>NOTA FINANCEIRO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$notafin</font></td>
    </tr>
    
    </table>
  </center>
</div>
<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS DE MONTAGEM</b></font></td>
    </tr>
    <tr>
      <td width='540' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS
        MONTAGEM:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsmontagem</font></td>
    </tr>
    </table>
  </center>
</div>

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 




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
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>
<BR>
<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>&nbsp;</b></font></td>
	<td width='70%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>UNIT.(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>TOTAL(R$)</b></font></td>
   
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>MICROCOMPUTADORES</b><td>
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
			
			$prod->listProdgeral("produtos", "codprod=$codprodped", $array11, $array_campo11 , "");
			$prod->mostraProd( $array11, $array_campo11, 0 );

			$nomeprod = $prod->showcampo19();
			$unidadeold = $prod->showcampo7();
			
			$prod->listProdgeral("produtos", "codprod=$codprodcj", $array12, $array_campo12 , "");
			$prod->mostraProd( $array12, $array_campo12, 0 );

			$nomeprodcj = $prod->showcampo19();
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
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
  </tr>
		
  ");
	
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
  </tr>
		
  ");

	

	$ptotal = $ptotal + $put;
		}
	
	$putotal = $putotal +$puu;
	$pmtotal = $pmtotal +$put;
	$putotalf = number_format($putotal,2,',','.'); 
	$pmtotalf = number_format($pmtotal,2,',','.'); 
		}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
   
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>PRODUTOS UNITÁRIOS</b><td>
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

			
			$prod->listProdgeral("produtos", "codprod=$codprodped", $array11, $array_campo11 , "");
			$prod->mostraProd( $array11, $array_campo11, 0 );

			$nomeprod = $prod->showcampo19();
			$unidadeold = $prod->showcampo7();
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 
			
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
  </tr>
		
  ");

	
	$ptotal = $ptotal + $put;
	$pmtotalu = $pmtotalu + $put;
	$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
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
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
  
  </tr>
		
  ");

	echo("
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
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>


 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BANCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>AGENCIA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.CHEQUE</b></font></td>
      </tr>
");


  $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricao = $prod->showcampo1();
			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$datavencf = $prod->fdata($datavenc);
			$valorparcelaf = number_format($valorparcela,2,',','.'); 
			
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
        <td width='15%'><font size='1' face='Verdana' >$numchec</font></td>
      </tr>
");

	}

echo("
    </table>
   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='70%' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
    </tr>
		<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR À VISTA:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vpvf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
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

<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='766' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. PARA O FINANCEIRO</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$obsfinanceiro</font></b></td>
    </tr>
		 <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='1028' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. APROVAÇÃO DE CRÉDITO</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$obsapcredito</font></b></td>
    </tr>
			 <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='1028' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>NOTA FISCAL</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$nf</font></b></td>
    </tr>
    
    </table>
  </center>
</div>
");

if ($contrato == ""){$contratof = "NO";$cor1 ="#FF0000";}else{$contratof = "OK";$cor1="#008000";}
if ($libentr == ""){$libentrf = "NO";$cor2 ="#FF0000";}else{$libentrf = "OK";$cor2="#008000";}
if ($nf == ""){$fat = "NO";$cor3 ="#FF0000";}else{$fat="OK";$cor3="#008000";}


echo("

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='3'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='33%'>
        <p align='center'><font size='1' face='Verdana'><b>:: CONTRATO: <font color='$cor1'>$contratof</font></b></font></td>
      <td width='33%'>
        <p align='center'><font size='1' face='Verdana'><b>:: LIB. ENTREGA: <font color='$cor2'>$libentrf</font></b></font></td>
      <td width='34%'>
        <p align='center'><font size='1' face='Verdana'><b>:: FATURADO: </b></font><font size='1' face='Verdana' color='$cor3'><b>$fat</b></font></td> 
    </tr>
  </table>
  </center>
</div>



<form >
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>INSERIR STATUS</b></font></td>
        <td width='289'>
  <select size='1' class=drpdwn name='statuspedselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                             
						  
	");

#	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
#	for($j = 0; $j < count($array6); $j++ ){
#			
#			$prod->mostraProd( $array6, $array_campo6, $j );
#
#			$nomeemp = $prod->showcampo1();
#			$codemp = $prod->showcampo0();
/*
	echo("
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=AVAL&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>AVAL</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=APROV&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>APROV</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=REPR&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>REPR</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=CANCEL&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>CANCEL</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=PECA&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>PECA</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=PROD&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>PROD</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=LIB&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>LIB</option>
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=ENTR&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>ENTR</option>
		");
*/
	echo("
		<option value='$PHP_SELF?Action=insert&codped=$codped&statuspeds=CANCEL&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>CANCEL</option>
	");
	
#	}
	

	echo("	

		<option selected>ESCOLHA</option>
		
						  </select>
  


            </td>
      </tr>
    </table>
    </center>
  </div>
</form>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>I</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#86acb5'>
        <td width='186'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='289'><font face='Verdana' color='#ffffff' size='1'><b>STATUS</b></font></td>
        <td width='93'></td>
      </tr>
");

	$prod->listProdgeral("pedidostatus", "codped=$codped", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$datastatusf = $prod->fdata($datastatus);

if ($statusped == "ENTR"){$apgdata =1;}

echo("
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='289'><font face='Verdana' size='1'><b>$statusped</b></font></td>
");
if ($statusped <> "AVAL"){


/*
echo("
        <td width='93'><p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=delete&codpstatus=$codpstatus&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&apgdata=$apgdata&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>Excluir</a></font></p>
        </td>
");
*/
echo("
        <td width='93'><p align='center'><font face='Verdana' size='1'></p>
        </td>
");

}
echo("
      </tr>
");		
	}
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>



</form>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
    <tr>
      <td width='100%'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=list&codempselect=$codemp&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR</a></font>
      </td>
    </tr>
  </table>
  </center>
</div>




	");
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"):

	echo("<div align='center'>
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
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width='70%' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='cli'>Cliente</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'></font>
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
		  </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
	

");

# Pesquisa pela Empresa do OC



echo("
<br>
	<div align='left'>
 
 
</div>
<table width='142' border='0' cellspacing='0' cellpadding='0' align='center' >
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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>$nomeemp</option>
		");
	
	}
	

	echo("	

		<option value='' selected>Escolha a Empresa</option>
		
						  </select>
  
  
  </td></form>
 </tr>
</table>
	
");


 
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
            <td width='26%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
              ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='27%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='41%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b>  $totalpagina</b></font></td>
        </tr>
          <tr>
            <td width='100%' colspan='5'>
      <hr size='1'>
            </td>
        </tr>
      </table>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='21%'></td>
            <td width='6%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PEDIDO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PEDIDO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1'><br>
              HISTÓRICO</a></font></b></td>
          </center>
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

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='14%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PED</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONT</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CTR</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LIB</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>FAT</font></b></div>
    </td>
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codped = $prod->showcampo0();
			$codcliente = $prod->showcampo2();
			$codvend = $prod->showcampo3();
			$dataped = $prod->showcampo11();
			$dataprevent= $prod->showcampo12();
			$status= $prod->showcampo14();
			$datapedf = $prod->fdata($dataped);
			$datapreventf = $prod->fdata($dataprevent);
			$horaprevent = $prod->showcampo17();
			$nf = $prod->showcampo24();
			$contrato = $prod->showcampo27();
			$libentr = $prod->showcampo21();
			$codbarra = $prod->showcampo29();

			$dataatual = $prod->gdata();
			$datapedold = str_replace('-','',$dataped);
			$ano = substr($datapedold,0,4);
			$mes = substr($datapedold,4,2);
			$dia = substr($datapedold,6,2);
			$datap = $ano.$mes.$dia;
			$difdias = $prod->numdias($dataatual,$datap);
			
			$prod->listProd("clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo1();

			$prod->listProd("vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo1();

			$bgcorlinha="#E5E5E5";
			if ($status == "AVAL"){$bgcorlinha="#FFCC66";}
			if ($status == "APROV"){$bgcorlinha="#CFFCC7";}
			if ($status == "PECA"){$bgcorlinha="#D6B778";}
			if ($status == "PROD"){$bgcorlinha="#F2E4C4";}
			if ($status == "LIB"){$bgcorlinha="#EDE763";}
			if ($status == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}

			
if ($contrato == ""){$contratof = "NO";$cor1 ="#FF0000";}else{$contratof = "OK";$cor1="#008000";}
if ($libentr == ""){$libentrf = "NO";$cor2 ="#FF0000";}else{$libentrf = "OK";$cor2="#008000";}
if ($nf == ""){$fat = "NO";$cor3 ="#FF0000";}else{$fat="OK";$cor3="#008000";}




		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a title = 'VER DETALHES'
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>$codbarra</font></a></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapreventf $horaprevent </font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b></font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$contratof</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$libentrf</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor3'>$fat</font></b></td>
			
			  </font></b></font></td>
			
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
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
