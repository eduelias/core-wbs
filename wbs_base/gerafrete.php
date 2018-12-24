<?

require("classprod.php" );

// INICIO DA CLASSE
$prod = new operacao();


function fdata($data)
    {

	$datanew = str_replace('-','',$data);
	$ano = substr($datanew,0,4);
	$mes = substr($datanew,4,2);
	$dia = substr($datanew,6,2);
	$hora = substr($datanew,8,10);
	$hora = str_replace(':','',$hora);
	$hora = str_replace(' ','',$hora);
	$h = substr($hora,0,2);
	$min = substr($hora,2,2);
	$seg = substr($hora,4,2);

	if ($hora <> 0):
	$data = $dia . '/' . $mes . '/' . $ano . " " . $h . ':' . $min . ':' . $seg;
	else:
	$data = $dia . '/' . $mes . '/' . $ano;
	endif;


	return $data;
		
	}

	/// Funcao FORMATA PREÇOS
	function fpreco($preco)
    {

	$pnew = number_format($preco,2,',','.'); 

	return $pnew;
		
	}

		/// Funcao GERA DATA ATUAL
	function gdata()
    {

		 $hoje = getdate();
		 $ano = $hoje[year];
		 $mes = $hoje[mon];
		 $dia = $hoje[mday];
		 $h = $hoje[hours];
		 $m = $hoje[minutes];
		 $s = $hoje[seconds];

		 if (strlen($mes)==1){$mes = '0'.$mes;}
		 if (strlen($dia)==1){$dia = '0'.$dia;}
		 if (strlen($h)==1){$h = '0'.$h;}
		 if (strlen($m)==1){$m = '0'.$m;}
		 if (strlen($s)==1){$s = '0'.$s;}

		 $dataatual = $ano.$mes.$dia.$h.$m.$s;

	return $dataatual;
		
	}


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
		$cbped = $prod->showcampo22();
		$impped = $prod->showcampo23();
		$codbarra = $prod->showcampo29();
		$caixa = $prod->showcampo31();
		$fat = $prod->showcampo39();

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

		$dataatual = $prod->gdata();
		$dataatualf = fdata($dataatual);

$titulo1 = "Lista de Pedidos";

echo("

<html>
<head>
  <title>Testing HTML_ToPDF</title>
  <style type='text/css'>
  div.noprint {
    display: none;
  }
  h6 {
    font-style: italic;
    font-weight: bold;
    font-size: 14pt;
    font-family: Courier;
    color: blue;
  }
  /** Change the paper size, orientation, and margins */
  @page {
    size: 8.5in 14in;
    orientation: landscape;
  }
  /** This is a bit redundant, but its works ;) */
  /** odd pages */
  @page:right {
    margin-right: 1.0cm;
    margin-left: 1.0cm;
    margin-top: 1.0cm;
    margin-bottom: 1.0cm;
  }
  /** even pages */
  @page:left {
    margin-right: 1.0cm;
    margin-left: 1.0cm;
    margin-top: 1.0cm;
    margin-bottom: 1.0cm;
  }
  </style>
</head>
<body>


<table border='0' width='100%' cellspacing='0' cellpadding='0' height='950'>
  <tr>
    <td width='1%' valign='top'><img border='0' src='images/hbranco.gif' width='1' height='842'></td>
    <td width='99%' valign='top'>
      <div align='center'>
        <center>
        <table cellSpacing='0' cellPadding='0' width='550' border='0'>
          <tbody>
            <tr>
              <td width='50%'><img src='images/grupoipa.gif' border='0' width='139' height='60'><br>
                <b><font face='Verdana' size='3'>&nbsp;&nbsp;&nbsp;</font><font face='Verdana' size='2'>&nbsp;(32)
                3229-5900</font></b></td>
            </center>
            <td width='50%'>
              <p align='right'><b><font face='Verdana' color='#800000' size='1'>DATA
              EMISSÃO<br>
              </font></b><font face='Verdana' size='1'>$dataatualf<br>
              </font><b><font face='Verdana' color='#800000' size='1'><br>
              PEDIDO<br>
              </font></b><b><font face='Verdana' size='4'>$codbarra</font></b></td>
          </tr>
        </tbody>
        </table>
      </div>
      <div align='center'>
        <table cellSpacing='1' cellPadding='2' width='550' border='0'>
          <tbody>
            <tr>
              <td width='100%' bgColor='#FFFFFF' colSpan='2'>
                <p align='center'><b><font face='Verdana' size='2'>VIA IPASOFT</font></b></td>
            </tr>
            <center>
            <tr>
              <td width='100%' bgColor='#808080' colSpan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                CLIENTE</b></font></td>
            </tr>
            <tr>
              <td width='50%' bgColor='#f0f0f0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>CLIENTE:<br>
                </font><font color='#000000'>$xnome</font></font></b></td>
              <td width='50%' bgColor='#f0f0f0'>
                <p align='right'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>TELEFONE:<br>
                </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel1)$xtel1<br>($xdddtel2)$xtel2</font></p>
              </td>
            </tr>
			
            <tr>
              <td width='100%' bgColor='#808080' colspan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                ENTREGA</b></font></td>
            </tr>
			 <tr>
              <td width='50%' bgColor='#f0f0f0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>ENDEREÇO:<br>
                </font><font color='#000000'>$endentrega</font></font></b></td>
              <td width='50%' bgColor='#f0f0f0'>
                <p align='right'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>REF. ENTREGA:<br>
                </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$refentrega</font></p>
              </td>
            </tr>
            
            <tr>
              <td width='100%' bgColor='#FFFFFF' colspan='2'>
                <hr size='1'>
              </td>
            </tr>
            </tbody>
          </table>
        </center>
      </div>
      <table cellSpacing='1' width='550' align='center' border='0' cellpadding='2'>
        <tbody>
");
$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 

	echo("
          <tr bgColor='#f3f8fa'>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>NOTA
              FISCAL: $i</font></b></td>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='2'>$nf_ped</font></b></td>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>VALOR:
              $i</font></b></td>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>R$ $valornff</font></b></td>
          </tr>
");
	$valort = $valort + $valornf;
	}
	$valortf = number_format($valort,2,',','.'); 
			echo("
			
    <tr bgColor='#f3f8fa'>
      <td width='133' bgColor='#f3f8fa'>&nbsp;</td>
      <td width='133' bgColor='#f3f8fa'>&nbsp;</td>
      <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>TOTAL:</font></b></td>
      <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>R$
        $valortf</font></b></td>
    </tr>

          <tr bgColor='#f3f8fa'>
            <td width='532' bgColor='#ffffff' colspan='4'>&nbsp;</td>
          </tr>
          <tr bgColor='#f3f8fa'>
            <td width='266' bgColor='#f3f8fa' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>
              NÚMERO DE VOLUMES:</font></b></td>
            <td width='266' bgColor='#f3f8fa' colspan='2'>
              <p align='center'><b><font face='Verdana' size='2'>$numvol</font></b></td>
          </tr>
          <tr>
            <td width='532' bgColor='#ffffff' colspan='4'>
              <hr size='1'>
            </td>
          </tr>
          <tr bgColor='#f3f8fa'>
            <td width='532' bgColor='#FFFFFF' colspan='4'>
              <p align='center'><font face='Verdana' size='1'>DECLARO PARA OS
              DEVIDOS FINS QUE RECEBI OS PRODUTOS RELACIONADOS CONFORME NOTAS
              FISCAIS ACIMA</font></p>
              <p align='center'><font face='Verdana' size='1'>_____/_____/______&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              _____________________________<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              ASS.&nbsp; TRANSPORTADORA</font></td>
          </tr>
          <tr bgColor='#f3f8fa'>
            <td width='532' bgColor='#FFFFFF' colspan='4'><font face='Verdana' size='3'>&nbsp;</font></td>
          </tr>
        </tbody>
      </table>
      <hr size='1'>
      <div align='center'>
        <center>
        <table cellSpacing='0' cellPadding='0' width='550' border='0'>
          <tbody>
            <tr>
              <td width='50%'><img src='images/grupoipa.gif' border='0' width='141' height='60'><br>
                <b><font face='Verdana' size='3'>&nbsp;</font><font face='Verdana' size='2'>&nbsp;&nbsp;&nbsp;(32)
                3229-5900</font></b></td>
            </center>
            <td width='50%'>
              <p align='right'><b><font face='Verdana' color='#800000' size='1'>DATA
              EMISSÃO<br>
              </font></b><font face='Verdana' size='1'>$dataatualf<br>
              </font><b><font face='Verdana' color='#800000' size='1'><br>
              PEDIDO<br>
              </font></b><b><font face='Verdana' size='4'>$codbarra</font></b></td>
          </tr>
        </tbody>
        </table>
      </div>
      <div align='center'>
        <table cellSpacing='1' cellPadding='2' width='550' border='0'>
          <tbody>
            <tr>
              <td width='100%' bgColor='#FFFFFF' colSpan='2'>
                <p align='center'><b><font face='Verdana' size='2'>VIA </font><font face='Verdana' size='2'>TRANSPORTADORA</font></b></td>
            </tr>
            <center>
            <tr>
              <td width='100%' bgColor='#808080' colSpan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                CLIENTE</b></font></td>
            </tr>
            <tr>
              <td width='50%' bgColor='#f0f0f0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>CLIENTE:<br>
                </font><font color='#000000'>$xnome</font></font></b></td>
              <td width='50%' bgColor='#f0f0f0'>
                <p align='right'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>TELEFONE:<br>
                </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xdddtel1)$xtel1<br>($xdddtel2)$xtel2</font></p>
              </td>
            </tr>
            <tr>
              <td width='100%' bgColor='#808080' colspan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                ENTREGA</b></font></td>
            </tr>
          <tr>
              <td width='50%' bgColor='#f0f0f0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>ENDEREÇO:<br>
                </font><font color='#000000'>$endentrega</font></font></b></td>
              <td width='50%' bgColor='#f0f0f0'>
                <p align='right'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'>REF. ENTREGA:<br>
                </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$refentrega</font></p>
              </td>
            </tr>
            <tr>
              <td width='100%' bgColor='#FFFFFF' colspan='2'>
                <hr size='1'>
              </td>
            </tr>
            </tbody>
          </table>
        </center>
      </div>
      <table cellSpacing='1' width='550' align='center' border='0' cellpadding='2'>
        <tbody>
");
$valort = 0;
$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 

	echo("
          <tr bgColor='#f3f8fa'>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>NOTA
              FISCAL: $i</font></b></td>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='2'>$nf_ped</font></b></td>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>VALOR:
              $i</font></b></td>
            <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>R$ $valornff</font></b></td>
          </tr>
");
	$valort = $valort + $valornf;
	}
	$valortf = number_format($valort,2,',','.'); 
			echo("
		
    <tr bgColor='#f3f8fa'>
      <td width='133' bgColor='#f3f8fa'>&nbsp;</td>
      <td width='133' bgColor='#f3f8fa'>&nbsp;</td>
      <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>TOTAL:</font></b></td>
      <td width='133' bgColor='#f3f8fa'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>R$
        $valortf</font></b></td>
    </tr>       
		<tr bgColor='#f3f8fa'>
            <td width='532' bgColor='#ffffff' colspan='4'>&nbsp;</td>
          </tr>
          <tr bgColor='#f3f8fa'>
            <td width='266' bgColor='#f3f8fa' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>
              NÚMERO DE VOLUMES:</font></b></td>
            <td width='266' bgColor='#f3f8fa' colspan='2'>
              <p align='center'><b><font face='Verdana' size='2'>$numvol</font></b></td>
          </tr>
          <tr>
            <td width='532' bgColor='#ffffff' colspan='4'>
              <hr size='1'>
            </td>
          </tr>
          <tr bgColor='#f3f8fa'>
            <td width='532' bgColor='#FFFFFF' colspan='4'>
              <p align='center'><font face='Verdana' size='1'>DECLARO PARA OS
              DEVIDOS FINS QUE RECEBI OS PRODUTOS RELACIONADOS CONFORME NOTAS
              FISCAIS ACIMA</font></p>
              <p align='center'><font face='Verdana' size='1'>_____/_____/______&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              _____________________________<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              ASS.&nbsp; CLIENTE</font></td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
</table>
");
		
 $totalpagina= ceil($numvol /6);  


	 $numvolt=$numvol;

$h=0;
 for($i = 0; $i < $totalpagina; $i++ ){

	 echo("

	 <table border='0' width='100%' cellspacing='0' cellpadding='0' height='950'>
  <tr>
    <td width='1%' valign='top'><img border='0' src='images/hbranco.gif' width='1' height='842'></td>
    <td width='99%' valign='top'>
      &nbsp;
<table border='1' width='100%' cellspacing='10' cellpadding='2' >

	");


 $numlinhas = ceil($numvol/2);
 if ($numlinhas > 3){
	 $numvol = ($numvol-6);
	 $numlinhas = 3;
	 $h=6*$i;
 }
#echo("nl=$numlinhas - nv=$numvol");


  for($j = 0; $j < $numlinhas; $j++ ){
	
  $h=$h+1;

	echo("

	<tr>
    <td valign='top' width='441'>
      <p class='MsoNormal'><b><font face='Verdana' size='2'><span style='mso-bidi-font-size: 12.0pt; font-weight: bold; font-size: 10pt'><o:p>
      </o:p>
      </span></font></b></p>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='50%' bgcolor='#F3F3F3'>
            <p align='right'><font face='Verdana'><font size='2'>PEDIDO<br>
            <b>$codbarra</b>
            </font></font></td>
          <td width='50%' bgcolor='#F3F3F3'>
		   <p align='right'><font face='Verdana'><font size='2'>NOTA FISCAL<br>
            </font>
		  ");
	  $prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($y = 0; $y < count($array612); $y++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $y );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 
echo("
           <b><font size='3'>$nf_ped</font></b><BR>
				");
	}
	echo("
	</font></p>
          </td>
        </tr>
        <tr>
          <td width='100%' colspan='2'><font size='2' face='Verdana'><font color='#800000'>CLIENTE:</font><br>
            <b>$xnome</b></font></td>
        </tr>
        <tr>
          <td width='100%' colspan='2'>
            <hr size='1'>
          </td>
        </tr>
         <tr>
          <td width='50%'><font face='Verdana'><font size='1' color='#800000'>DADOS.
            ENTREGA</font><font size='1'><br>
            <b>$endentrega</b></font></font></td>
          <td width='50%'>
            <p align='right'><font face='Verdana'><font size='1' color='#800000'>REF.
            ENTREGA</font><font size='1'><br>
            <b>$refentrega</b></font></font></td>
        </tr>

        <tr>
          <td width='100%' colspan='2'>
            <p align='center'><font size='2' face='Verdana'><br>
            </font><font face='Verdana' size='5'>$h/$numvolt</font></td>
        </tr>
      </table>
    </td>
	");
	    $h=$h+1;
	  echo("
    <td width='442' valign='top'>
      <p class='MsoNormal'><b><font face='Verdana' size='2'><span style='mso-bidi-font-size: 12.0pt; font-weight: bold; font-size: 10pt'><o:p>
      </o:p>
      </span></font></b></p>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='50%' bgcolor='#F3F3F3'>
            <p align='right'><font face='Verdana'><font size='2'>PEDIDO<br>
            <b>$codbarra</b>
            </font></font></td>
          <td width='50%' bgcolor='#F3F3F3'>
		    <p align='right'><font face='Verdana'><font size='2'>NOTA FISCAL<br>
            </font>
          ");
	
	  $prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($y = 0; $y < count($array612); $y++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $y );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 
echo("
          <b><font size='3'>$nf_ped</font></b><BR>
				");
	}
	echo("
	</font></p>
          </td>
        </tr>

        <tr>
          <td width='100%' colspan='2'><font size='2' face='Verdana'><font color='#800000'>CLIENTE:</font><br>
            <b>$xnome</b></font></td>
        </tr>
        <tr>
          <td width='100%' colspan='2'>
            <hr size='1'>
          </td>
        </tr>
         <tr>
          <td width='50%'><font face='Verdana'><font size='1' color='#800000'>DADOS.
            ENTREGA</font><font size='1'><br>
            <b>$endentrega</b></font></font></td>
          <td width='50%'>
            <p align='right'><font face='Verdana'><font size='1' color='#800000'>REF.
            ENTREGA</font><font size='1'><br>
            <b>$refentrega</b></font></font></td>
        </tr>

        <tr>
          <td width='100%' colspan='2'>
            <p align='center'><font size='2' face='Verdana'><br>
            </font><font face='Verdana' size='5'>$h/$numvolt</font></td>
        </tr>
      </table>
    </td>
  </tr>
");
  }

echo("

</table>
    </td>
  </tr>
</table>


");


 }



