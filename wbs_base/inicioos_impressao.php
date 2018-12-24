

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataos DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "RECEPÇÃO";
$subtitulo = "ORDEM DE SERVIÇO";

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
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}

$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
	
		
        break;

    case "update":

		$Actionsec="seclist";
						
		 break;

	 case "list":

		    $hoje = getdate();
			$ano = $hoje[year];
			$mes = $hoje[mon];
			$dia = $hoje[mday];
			$h = $hoje[hours];
			$m = $hoje[minutes];
			$s = $hoje[seconds];
			if (strlen($dia)==1){$dia = '0'.$dia;}
			if (strlen($m)==1){$m = '0'.$m;}
			if ($mes == 1){$mes = "Janeiro";}
			if ($mes == 2){$mes = "Fevereiro";}
			if ($mes == 3){$mes = "Março";}
			if ($mes == 4){$mes = "Abril";}
			if ($mes == 5){$mes = "Maio";}
			if ($mes == 6){$mes = "Junho";}
			if ($mes == 7){$mes = "Julho";}
			if ($mes == 8){$mes = "Agosto";}
			if ($mes == 9){$mes = "Setembro";}
			if ($mes == 10){$mes = "Outubro";}
			if ($mes == 11){$mes = "Novembro";}
			if ($mes == 12){$mes = "Dezembro";}


		#$Actionsec="list";
			
		 break;

	

}




/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

include("sif-topolimpo.php"); 

echo("
<style type='text/css'>
<!--
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	text-decoration: none;
	background-color: #FFFFFF;
	margin: 2px;
}
.topo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.topo_preto_g {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #000000;
	font-weight: bold;
}
.topo_preto_m {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}
.condicoes {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8px;
	color: #000000;
}
-->
</style>

");


echo("

<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************


// FUNCAO TESTA FORMA DE PAGAMENTO
function verificaObrig (form) 
{

	
	if (form.statusos.value == '')
	{
		alert ('Escolha o STATUS da ORDEM DE SERVIÇO');
		return false;
	}


	return true;
}


function ajustqtde(form ,element) {

	if (element.value != 0){
		return 1;
	}
	if (element.value == '' || element.value == 0){
		return 0;
	}
}



</script>



");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "list"):


	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProd("os", "codos=$codos");
		
		$codemp = $prod->showcampo1();
		$codcliente = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$xcodtipo_serv = $prod->showcampo4();
		$mlb = $prod->showcampo5();
		$vpv = $prod->showcampo6();
		$vt = $prod->showcampo7();
		$vpp = $prod->showcampo8();
		$mcv = $prod->showcampo9();
		$vc = $prod->showcampo10();
		$xvs = $prod->showcampo11();
		$xvd = $prod->showcampo47();
			$mlbf = number_format($mlb,2,',','.'); 
			$mcvf = number_format($mcv,5,',','.'); 
			$vpvf = number_format($vpv,2,',','.'); 
			$vtf = number_format($vt,2,',','.'); 
			$vppf = number_format($vpp,2,',','.'); 
			$vcf = number_format($vc,2,',','.'); 
			$vsf = number_format($xvs,2,',','.'); 
			$vdf = number_format($xvd,2,',','.');
		$xdataos = $prod->showcampo12();
		$xdataosf = $prod->fdata($xdataos);
		$dataprevent = $prod->showcampo13();
		$datapreventf  = $prod->fdata($dataprevent);
		$dataprevent = str_replace('-','',$dataprevent);
			$xaprev = substr($dataprevent,0,4);
			$xmprev = substr($dataprevent,4,2);
			$xdprev = substr($dataprevent,6,2);
		$horaprevent = $prod->showcampo15();
		$status = $prod->showcampo16();
		$xcontato = $prod->showcampo17();
		$xxdddtel1 = $prod->showcampo18();
		$xxtel1 = $prod->showcampo19();
		$xxdddtel2 = $prod->showcampo20();
		$xxtel2 = $prod->showcampo21();
		$xos_descricao_equip = $prod->showcampo22();
		$xos_defeito_apres = $prod->showcampo23();
		$xos_laudo = $prod->showcampo24();
		$xos_servico_execut = $prod->showcampo25();
		$xserv_coletar = $prod->showcampo26();
		$xserv_entregar = $prod->showcampo27();
		$xserv_onsite = $prod->showcampo28();
		$xhist = $prod->showcampo29();
		$xxobs = $prod->showcampo40();
		$codbarra = $prod->showcampo38();
		$libentr = $prod->showcampo36();
		$xcodbarra_pedref = $prod->showcampo43();
		$xcodbarra_osref = $prod->showcampo44();
		$xcodvend_tec = $prod->showcampo45();
		$xos_orcamento = $prod->showcampo46();
		$datanota = $prod->showcampo50();
		$datanota = str_replace('-','',$datanota);
			$xanota = substr($datanota,0,4);
			$xmnota = substr($datanota,4,2);
			$xdnota = substr($datanota,6,2);
		$xnota = $prod->showcampo51();

			$prod->clear();
			$prod->listProdU("tipo", "os_tipo", "codtipo_serv='$xcodtipo_serv'");
			$tipo_serv = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$xcodvend_tec'");
			$nomevend_tec = $prod->showcampo0();
			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codvend'");
			$nomevend_ate = $prod->showcampo0();

if ($xserv_coletar == "OK"){$cor1="#008000";}else{$cor1 ="#FF0000";$xserv_coletar = "NO";}
if ($xserv_entregar == "OK"){$cor2="#008000";}else{$cor2 ="#FF0000";$xserv_entregar = "NO";}
if ($xserv_onsite == "OK"){$cor3="#008000";}else{$cor3 ="#FF0000";$xserv_onsite="NO";}



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
		
    	$frmNumero = $prod->showcampo90();
    	$frmComplemento = $prod->showcampo91();


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();

if ($xhist == 1){$tipo_imp =0;}
if ($tipo_imp == 1){
echo("
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td width='100%'><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr>
                <td colspan='2'><strong></strong>
                  <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td width='33%'><img src='images/logo_infohelp.gif' width='129' height='56'></td>
                      <td align='center'><strong><span class='topo_preto_g'><font face='Verdana' size='4'>ORDEM DE SERVI&Ccedil;O<br>
                        </font><font face='Verdana' size='2'>(via da empresa)</font></span></strong></td>
                      <td width='33%' align='right'><strong class='topo_preto_m'><font face='Verdana' size='3'>$codbarra</font></strong></td>
                    </tr>
                </table></td>
              </tr>
              <tr valign='top'>
                <td width='50%' align='left'><font face='Verdana' size='1'><strong>DATA OS:</strong> $xdataosf</font></td>
                <td align='right'><font face='Verdana' size='1'><strong>ATENDENTE:</strong> $nomevend_ate / <strong>T&Eacute;CNICO:</strong> $nomevend_tec</font></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>

<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
      <tr>
        <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
            <tr bgcolor='#F3B94B'>
              <td colspan='3' class='topo'><font face='Verdana' size='2'><b>DADOS CLIENTE</b></font></td>
            </tr>
            <tr valign='top'>
              <td width='50%' align='left'><font face='Verdana' size='1'><strong>CLIENTE:</strong><br>
                  <strong>$xnome</strong></font></td>
              <td colspan='2' align='right'><font face='Verdana' size='1'><strong>CPF/CNPJ:</strong><br>
            $xcpf $xcnpj</font> </td>
            </tr>
            <tr>
              <td valign='top'><font face='Verdana' size='1'><strong>ENDERE&Ccedil;O:</strong><br>
            $xendereco, $frmNumero - $frmComplemento - $xbairro - $xcidade - $xestado - $xcep</font> </td>
              <td width='25%' valign='top'><font face='Verdana' size='1'><strong>TELEFONE:</strong><br>
                </font>
                <table width='250'  border='0' cellspacing='2' cellpadding='0'>
                  <tr>
                    <td width='50%'><font face='Verdana' size='1'>($xxdddtel1) $xxtel1</font></td>
                    <td width='50%'><font face='Verdana' size='1'>($xxdddtel2) $xxtel2</font></td>
                  </tr>
                </table></td>
              <td valign='top'><font face='Verdana' size='1'><strong>CONTATO:</strong><br>
                $xcontato</font></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td colspan='4' class='topo'><font face='Verdana' size='2'><b>DADOS DA OS</b></font></td>
              </tr>
              <tr valign='top'>
                <td width='25%'><font face='Verdana' size='1'><strong>TIPO:</strong>
                <font color = '#FF0000'><b>$tipo_serv</b></font></font></td>
                <td width='25%'><font face='Verdana' size='1'><strong>PEDIDO:</strong> $xcodbarra_pedref</font></td>
                <td width='25%'><font face='Verdana' size='1'><strong>NOTA FISCAL :</strong>  $xnota</font></td>
                <td width='25%'><font face='Verdana' size='1'><strong>DATA NF :</strong>$dxnota/$xmnota/$xanota</font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'>COLETAR NO CLIENTE : <font color = '$cor1'>$xserv_coletar</font> -  ENTREGAR NO CLIENTE:<font color = '$cor2'>$xserv_entregar</font> -  MANUTEN&Ccedil;&Atilde;O ON SITE:<font color = '$cor3'> $xserv_onsite </font></font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DESCRI&Ccedil;&Atilde;O DO EQUIPAMENTO:</strong><br>
$xos_descricao_equip</font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DEFEITO RELATADO PELO CLIENTE:</strong><br>
$xos_defeito_apres</font></td>
              </tr>
");
if ($xos_orcamento <> "" and $xserv_onsite == "OK"){
echo("
				<tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>ORÇAMENTO:</strong><br>
$xos_orcamento</font></td>
              </tr>
");
}
echo("
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td class='topo'><b><font face='Verdana' size='2'>CONDI&Ccedil;&Otilde;ES ACEITAS PELO CLIENTE</font></b> </td>
              </tr>
              <tr valign='top'>
                <td class='condicoes'>1) Ser&aacute; analisado somente o defeito relatado pelo cliente.<br>
                  2) A Infohelp n&atilde;o se responsabiliza pelos dados no equipamento em manuten&ccedil;&atilde;o, o respons&aacute;vel deve manter c&oacute;pias adequadas de seus arquivos.<br>
                  3) Para equipamentos em garantia os servi&ccedil;os ser&atilde;o executados conforme contrato ou certificado.<br>
                  4) O cliente se responsabilizar&aacute; pela falta de documenta&ccedil;&atilde;o e autenticidade do software.<br>
                  5) Para servi&ccedil;os fora da garantia, ser&atilde;o cobradas as seguintes taxas no valor de R$15,00 cada: Taxa de or&ccedil;amento para servi&ccedil;os n&atilde;o aprovados e taxa de teste para devolu&ccedil;&atilde;o sem reparo (equipamento funcionando normalmente).<br>
                  6) O cliente deve verificar atentamente o check-list inteiro, pois os equipamentos e acess&oacute;rios mencionados ser&atilde;o os &uacute;nicos itens a serem devolvidos na conclus&atilde;o dos servi&ccedil;os.<br>
                  7) Os equipamentos que permanecerem na Empresa por um per&iacute;odo superior a 90 dias executando-se ou n&atilde;o o servi&ccedil;o ser&atilde;o usados como forma de ressarcimento de despesas de pe&ccedil;as, armazenamento e/ou horas t&eacute;cnicas.<br>
                8) &Eacute; de inteira responsabilidade do cliente o funcionamento das pe&ccedil;as avulsas entregues para instala&ccedil;&atilde;o.
");
if ($xos_orcamento <> "" and $xserv_onsite == "OK"){
echo("
<br>
                9) Autorizo a execução dos serviços conforme ajustados no campo Orçamento acima.

");
}
echo("
</td>
              </tr>
              <tr>
                <td align='center' class='condicoes'>Juiz de Fora, $dia de $mes de $ano<br>$h:$m:$s <br>
                __________________________________________________<br>
                Assinatura</td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>

<br>
<hr size='1' noshade>
<br>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td width='100%'><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr>
                <td colspan='2'><strong></strong>
                  <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td width='33%'><img src='images/logo_infohelp.gif' width='129' height='56'></td>
                      <td align='center'><strong><span class='topo_preto_g'><font face='Verdana' size='4'>ORDEM DE SERVI&Ccedil;O<br>
                        </font><font face='Verdana' size='2'>(via do cliente)</font></span></strong></td>
                      <td width='33%' align='right'><strong class='topo_preto_m'><font face='Verdana' size='3'>$codbarra</font></strong></td>
                    </tr>
                </table></td>
              </tr>
              <tr valign='top'>
                <td width='50%' align='left'><font face='Verdana' size='1'><strong>DATA OS:</strong> $xdataosf</font></td>
                <td align='right'><font face='Verdana' size='1'><strong>ATENDENTE:</strong> $nomevend_ate / <strong>T&Eacute;CNICO:</strong> $nomevend_tec</font></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>

<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
      <tr>
        <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
            <tr bgcolor='#F3B94B'>
              <td colspan='3' class='topo'><font face='Verdana' size='2'><b>DADOS CLIENTE</b></font></td>
            </tr>
            <tr valign='top'>
              <td width='50%' align='left'><font face='Verdana' size='1'><strong>CLIENTE:</strong><br>
                  <strong>$xnome</strong></font></td>
              <td colspan='2' align='right'><font face='Verdana' size='1'><strong>CPF/CNPJ:</strong><br>
            $xcpf $xcnpj</font> </td>
            </tr>
            <tr>
              <td valign='top'><font face='Verdana' size='1'><strong>ENDERE&Ccedil;O:</strong><br>
            $xendereco, $frmNumero - $frmComplemento - $xbairro - $xcidade - $xestado - $xcep</font> </td>
              <td width='25%' valign='top'><font face='Verdana' size='1'><strong>TELEFONE:</strong><br>
                </font>
                <table width='250'  border='0' cellspacing='2' cellpadding='0'>
                  <tr>
                    <td width='50%'><font face='Verdana' size='1'>($xxdddtel1) $xxtel1</font></td>
                    <td width='50%'><font face='Verdana' size='1'>($xxdddtel2) $xxtel2</font></td>
                  </tr>
                </table></td>
              <td valign='top'><font face='Verdana' size='1'><strong>CONTATO:</strong><br>
                $xcontato</font></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td colspan='4' class='topo'><font face='Verdana' size='2'><b>DADOS DA OS</b></font></td>
              </tr>
               <tr>
                <td colspan='4'><font face='Verdana' size='1'>COLETAR NO CLIENTE : <font color = '$cor1'>$xserv_coletar</font> -  ENTREGAR NO CLIENTE:<font color = '$cor2'>$xserv_entregar</font> -  MANUTEN&Ccedil;&Atilde;O ON SITE:<font color = '$cor3'> $xserv_onsite </font></font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DESCRI&Ccedil;&Atilde;O DO EQUIPAMENTO:</strong><br>
$xos_descricao_equip</font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DEFEITO RELATADO PELO CLIENTE:</strong><br>
$xos_defeito_apres</font></td>
              </tr>
");
if ($xos_orcamento <> "" and $xserv_onsite == "OK"){
echo("
				<tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>ORÇAMENTO:</strong><br>
$xos_orcamento</font></td>
              </tr>
");
}
echo("

          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td class='topo'><b><font face='Verdana' size='2'>CONDI&Ccedil;&Otilde;ES ACEITAS PELO CLIENTE</font></b> </td>
              </tr>
              <tr valign='top'>
                <td class='condicoes'>1) Ser&aacute; analisado somente o defeito relatado pelo cliente.<br>
                  2) A Infohelp n&atilde;o se responsabiliza pelos dados no equipamento em manuten&ccedil;&atilde;o, o respons&aacute;vel deve manter c&oacute;pias adequadas de seus arquivos.<br>
                  3) Para equipamentos em garantia os servi&ccedil;os ser&atilde;o executados conforme contrato ou certificado.<br>
                  4) O cliente se responsabilizar&aacute; pela falta de documenta&ccedil;&atilde;o e autenticidade do software.<br>
                  5) Para servi&ccedil;os fora da garantia, ser&atilde;o cobradas as seguintes taxas no valor de R$15,00 cada: Taxa de or&ccedil;amento para servi&ccedil;os n&atilde;o aprovados e taxa de teste para devolu&ccedil;&atilde;o sem reparo (equipamento funcionando normalmente).<br>
                  6) O cliente deve verificar atentamente o check-list inteiro, pois os equipamentos e acess&oacute;rios mencionados ser&atilde;o os &uacute;nicos itens a serem devolvidos na conclus&atilde;o dos servi&ccedil;os.<br>
                  7) Os equipamentos que permanecerem na Empresa por um per&iacute;odo superior a 90 dias executando-se ou n&atilde;o o servi&ccedil;o ser&atilde;o usados como forma de ressarcimento de despesas de pe&ccedil;as, armazenamento e/ou horas t&eacute;cnicas.<br>
                8) &Eacute; de inteira responsabilidade do cliente o funcionamento das pe&ccedil;as avulsas entregues para instala&ccedil;&atilde;o.
");
if ($xos_orcamento <> "" and $xserv_onsite == "OK"){
echo("
<br>
                9) Autorizo a execução dos serviços conforme ajustados no campo Orçamento acima.

");
}
echo("
</td>
              </tr>
              <tr>
                <td align='center' class='condicoes'>Juiz de Fora, $dia de $mes de $ano<br>$h:$m:$s<br>
                __________________________________________________<br>
                Assinatura</td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>




	");

}else{

echo("

 <table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td width='100%'><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr>
                <td colspan='2'><strong></strong>
                  <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td width='33%'><img src='images/logo_infohelp.gif' width='129' height='56'></td>
                      <td align='center'><strong><span class='topo_preto_g'><font face='Verdana' size='4'>ORDEM DE SERVI&Ccedil;O</font></span></strong></td>
                      <td width='33%' align='right'><strong class='topo_preto_m'><font face='Verdana' size='3'>$codbarra</font></strong></td>
                    </tr>
                </table></td>
              </tr>
              <tr valign='top'>
                <td width='50%' align='left'><font face='Verdana' size='1'><strong>DATA OS:</strong> $xdataosf</font></td>
                <td align='right'><font face='Verdana' size='1'><strong>ATENDENTE:</strong> $nomevend_ate / <strong>T&Eacute;CNICO:</strong> $nomevend_tec</font></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
      <tr>
        <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
            <tr bgcolor='#F3B94B'>
              <td colspan='3' class='topo'><font face='Verdana' size='2'><b>DADOS CLIENTE</b></font></td>
            </tr>
            <tr valign='top'>
              <td width='50%' align='left'><font face='Verdana' size='1'><strong>CLIENTE:</strong><br>
                  <strong>$xnome</strong></font></td>
              <td colspan='2' align='right'><font face='Verdana' size='1'><strong>CPF/CNPJ:</strong><br>
            $xcpf $xcnpj</font> </td>
            </tr>
            <tr>
              <td valign='top'><font face='Verdana' size='1'><strong>ENDERE&Ccedil;O:</strong><br>
            $xendereco, $frmNumero - $frmComplemento - $xbairro - $xcidade - $xestado - $xcep</font> </td>
              <td width='25%' valign='top'><font face='Verdana' size='1'><strong>TELEFONE:</strong><br>
                </font>
                <table width='250'  border='0' cellspacing='2' cellpadding='0'>
                  <tr>
                    <td width='50%'><font face='Verdana' size='1'>($xxdddtel1) $xxtel1</font></td>
                    <td width='50%'><font face='Verdana' size='1'>($xxdddtel2) $xxtel2</font></td>
                  </tr>
                </table></td>
              <td valign='top'><font face='Verdana' size='1'><strong>CONTATO:</strong><br>
                $xcontato</font></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td colspan='4' class='topo'><font face='Verdana' size='2'><b>DADOS DA OS</b></font></td>
              </tr>
              <tr valign='top'>
                <td width='25%'><font face='Verdana' size='1'><strong>TIPO:</strong>
                <font color = '#FF0000'><b>$tipo_serv</b></font></font></td>
                <td width='25%'><font face='Verdana' size='1'><strong>PEDIDO:</strong> $xcodbarra_pedref</font></td>
                <td width='25%'><font face='Verdana' size='1'><strong>NOTA FISCAL :</strong> $xxx</font></td>
                <td width='25%'><font face='Verdana' size='1'><strong>DATA NF :</strong> $xxx</font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'>COLETAR NO CLIENTE : <font color = '$cor1'>$xserv_coletar</font> -  ENTREGAR NO CLIENTE:<font color = '$cor2'>$xserv_entregar</font> -  MANUTEN&Ccedil;&Atilde;O ON SITE:<font color = '$cor3'> $xserv_onsite </font></font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DESCRI&Ccedil;&Atilde;O DO EQUIPAMENTO:</strong><br>
$xos_descricao_equip</font></td>
              </tr>
              <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DEFEITO RELATADO PELO CLIENTE:</strong><br>
$xos_defeito_apres</font></td>
              </tr>
	 <tr>
                <td colspan='4'><font face='Verdana' size='1'><strong>DETALHAMENTO DO SERVIÇO EXECUTADO:</strong><br>
$xos_servico_execut</font></td>
              </tr>
			
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>

<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
            <tr bgcolor='#F3B94B'>
              <td width='100%' class='topo'><b><font face='Verdana' size='2'>PE&Ccedil;AS UTILIZADAS NA OS</font></b> </td>
            </tr>
            <tr>
              <td><table width='100%'  border='0' cellspacing='2' cellpadding='1'>
                  <tr>
                    <td width='10%'><strong><font face='Verdana' size='1'>COD</font></strong></td>
                    <td><strong><font face='Verdana' size='1'>PRODUTO</font></strong></td>
                  </tr>
	");
$prod->listProdSum("codprod, datastatus, qtde, ppu, tipo_estoque, login, codpos, codcb", "os_prod", "codos=$codos and tipo_estoque <> 'D'", $array1, $array_campo1, "order by codprod" );


 for($i = 0; $i < count($array1); $i++ ){
			
			$prod->mostraProd( $array1, $array_campo1, $i );

			$codprod_lista = $prod->showcampo0();
			$datareq = $prod->showcampo1();
			$qtde = $prod->showcampo2();
			$valor = $prod->showcampo3();
			$tipo_estoque = $prod->showcampo4();
			$login_resp = $prod->showcampo5();
			$codpos = $prod->showcampo6();
			$codcb = $prod->showcampo7();
			$datareqf = $prod->fdata($datareq);

			$prod->clear();			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprod_lista");
			$nomeprod_lista = $prod->showcampo0();


			$valorf = number_format($valor,2,',','.'); 

			if ($tipo_estoque == "D"){$cor1 = '#FF9866';}else{$cor1 = '#FEF7E9';}
echo("
                  <tr>
                    <td><font face='Verdana' size='1'>$codpos</font></td>
                    <td><font face='Verdana' size='1'>$nomeprod_lista</font></td>
                  </tr>
");
		
 }
 echo("
	
              </table></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td colspan='2' class='topo'><font face='Verdana' size='2'><b>VALOR</b></font></td>
              </tr>
	");
$vprodt = $vt + $xvd;
$vprodtf = number_format($vprodt,2,',','.');
 echo("

              <tr>
                <td width='24%'><strong><font face='Verdana' size='1'>VALOR TOTAL DE PE&Ccedil;AS</font></strong></td>
                <td width='76%'><font face='Verdana' size='1'>R$ $vprodtf</font></td>
              </tr>
              <tr>
                <td><strong><font face='Verdana' size='1'>VALOR SERVI&Ccedil;O</font> </strong></td>
                <td><font face='Verdana' size='1'>R$ $vsf</font> </td>
              </tr>
              <tr>
                <td><strong><font face='Verdana' size='1'>TOTAL ORDEM DE SERVI&Ccedil;O</font> </strong></td>
                <td><strong><font face='Verdana' size='1'>R$ $vppf</font> </strong></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td width='100%' class='topo'><font face='Verdana' size='2'><b>FORMA DE PAGAMENTO</b></font> </td>
              </tr>
              <tr>
                <td><table width='100%'  border='0' cellspacing='2' cellpadding='1'>
                  <tr>
                    <td width='20%'><strong><font face='Verdana' size='1'>DATA VENCIMENTO</font> </strong></td>
                    <td width='20%'><strong><font face='Verdana' size='1'>VALOR</font></strong></td>
                    <td><strong><font face='Verdana' size='1'>FORMA DE PAGAMENTO</font></strong></td>
                  </tr>
");
	  $prod->listProdgeral("os_parcelas", "codos=$codos", $array61, $array_campo61 , "order by datavenc");

	  for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparc = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipo'");
			$tarifa = $prod->showcampo0();
			#$valorparc = $valorparc + $tarifa;
			$valorparcf = number_format($valorparc,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricaoold = $prod->showcampo1();

			$datavenc = str_replace('-','',$datavenc);
			$xanopar = substr($datavenc,0,4);
			$xmespar = substr($datavenc,4,2);
			$xdiapar = substr($datavenc,6,2);

			$xtipo = $tipo;

echo("
                  <tr>
                    <td><font face='Verdana' size='1'>$xdiapar/$xmespar/$xanopar</font></td>
                    <td><font face='Verdana' size='1'>R$ $valorparcf</font></td>
                    <td><font face='Verdana' size='1'>$descricaoold</font></td>
                  </tr>
 ");
	}//FOR

echo("
	
                </table></td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>


<table width='95%'  border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>
  <tr>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
        <tr>
          <td><table width='100%'  border='0' cellspacing='2' cellpadding='2'>
              <tr bgcolor='#F3B94B'>
                <td class='topo'>DECLARA&Ccedil;&Atilde;O</td>
              </tr>
              <tr valign='top'>
                <td class='condicoes'>Declaro para todos os fins estar recebendo nesta data o equipamento conforme descrito no checklist da ordem de servi&ccedil;os acima. </td>
              </tr>
              <tr>
                <td align='center' class='condicoes'> 
<!--Juiz de Fora, $dia de $mes de $ano<br>$h:$m:$s-->
      </font><br>
                  __________________________________________________<br>
                  Assinatura</td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>


 
 ");

}


//  FIM - FIM DA PARTE DE IMPRESSAO ///

echo("
<center>
<br><br>&nbsp;<input type='button' style='visibility: ; width: 100px; height: 25px' id='print' value='IMPRIMIR' onclick='printPage()'>
");


endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 


	
	include ("sif-rodape.php");}
}

?>
       
