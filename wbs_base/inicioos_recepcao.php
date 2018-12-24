

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

		

		if ($retorno){


		
				// ATUALIZA BANCO DE DADOS DE PEDIDOS
				
				$prod->clear();
				$prod->listProd("os", "codos=$codos");
				$libentr = $prod->showcampo36();

				
				$prod->setcampo14($dataatual);  // DATA ENTREGA
				$prod->setcampo16($statusos);  // STATUS
								
				if ($statusos == "ENTR" and $libentr == "OK"){
					$prod->setcampo36("OK");  // LIB. ENTREGA
					$prod->setcampo29(1);  // HISTORICO
				}
				

				$prod->upProd("os", "codos=$codos");


					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codos);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statusos);
					$prod->setcampo4($login);

					$prod->addProd("os_status", $ureg);


			
			

			#$Actionsec="seclist";

		}

		
        break;

    case "update":

		$Actionsec="seclist";
						
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
	$palavrachave1 = strtolower($palavrachave);
		$statuspesq1 = strtolower($statuspesq);
		
		$campopesq = "nome";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and ";
		

		//PESQUISA POR NOME CLIENTE
		if ($statuspesq1){
							
			$condicao3 .= " LCASE(os.status) like '%$statuspesq1%' and ";
		}

		//PESQUISA POR STATUS
		if ($palavrachave1){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR CODVEND_TEC
		if ($codvend_tecpesq){
							
			$condicao3 .= " os.codvend_tec = '$codvend_tecpesq' and ";
		}

		//PESQUISA POR TIPO GAR
		if ($tipo_servpesq){
							
			$condicao3 .= " os.codtipo_serv = '$tipo_servpesq' and ";
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " os.codbarra='$codpedpesq' and";
		}
		
	
				$condicao3 .= " os.codemp='$codempselect'";
				$condicao3 .= " and os.hist = '$hist'  ";
				$condicao3 .= " and os.codcliente=clientenovo.codcliente ";
				#$condicao3 .= " and os.codvend_tec=vendedor.codvend ";


		#echo("$condicao3");
		

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "os, clientenovo", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, os.codcliente, os.codvend, dataos, dataprevent, status, horaprevent, nf, libentr, codbarra, caixa, clientenovo.nome, fat, modped, codtipo_serv, codvend_tec", "os, clientenovo", $condicao3, $array, $array_campo, $parm );

		
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

if ($impressao <> 1){ include("sif-topo.php"); }



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

if($Action == "insert" or $Action == "update" or $Action == "delete"):


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
		$xxobs = $prod->showcampo40();
		$codbarra = $prod->showcampo38();
		$libentr = $prod->showcampo36();
		$caixa = $prod->showcampo35();
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


if ($impressao <> 1){

echo("
 
<a name='topo'></a>
");
if ($impressao <> 1){

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codos=$codos&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
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

");
}
echo("


<form method='POST' action='$PHP_SELF?Action=insert#geral' name='Form77' onSubmit = 'if (verificaObrig(Form77)==false) return false'>

 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='geral'><img border='0' src='images/n1c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>DADOS GERAIS DA O.S.</font></b></td>
      </tr>
    </table>
    </center>
  </div>
	 <br>
  <div align='center'>
    <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
	 
    <tr>
      <td width='50%' bgcolor='#800000'><b><font face='Verdana' color='#FFFFFF' size='2'>ORDEM
        DE SERVIÇO&nbsp;&nbsp;</font></b></td>
    </center>
      <td width='50%' bgcolor='#800000'>
        <p align='right'><b><font face='Verdana' size='3' color='#FBE6BF'>$codbarra</font> </b></td>
    </tr>
    <center>
    <tr>
      <td width='50%' bgcolor='#F3B94B'><b><font color='#800000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA
        OS</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#800000'>:</font><font color='#336699'><br>
        </font><font color='#000000'>$xdataos</font></font></b></td>
      <td width='50%' bgcolor='#F3B94B'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>TÉCNICO:<br>
      </font></b></font><font color='#800000'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>
	                  
	");

	
if ($xcodvend_tec){

	$prod->listProdU("codvend, nome","vendedor", "codvend= $xcodvend_tec");
	$codvend_tec = $prod->showcampo0();
	$tipo_tec = $prod->showcampo1();

echo("	
		$tipo_tec 
");
}else{
echo("
		NENHUM ESCOLHIDO

");
}
echo("

	</font></font></td>
    </tr>

			  <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2'>
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
      <td width='100%' bgcolor='#800000' colspan='2'><b><font face='Verdana' color='#FFFFFF' size='2'>DADOS
        CLIENTE</font></b></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#F2F2F2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#800000'>CLIENTE:</font><font color='#336699'><br>
        </font><font color='#000000'>$xnome</font></font></b></td>
      <td width='50%' bgcolor='#F2F2F2'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>CPF/CNPJ:<br>
      </font></b><font color='#000000'>$xcpf $xcnpj</font></font></td>
    </tr>

    <tr>
      <td width='100%' bgcolor='#F2F2F2' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>ENDEREÇO:</font><font color='#336699'><br>
        </font>
        </b><font color='#000000'>$xendereco - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
    </tr>
			  <tr>
      <td width='50%' bgcolor='#F2F2F2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#800000'>EMAIL:</font><font color='#336699'><br>
        </font></font></b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>$xemail</font></font></td>
      <td width='50%' bgcolor='#F2F2F2'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#800000'>TELEFONE<br>
      </font></b><font color='#000000'>($xdddtel1) $xtel1<br>($xdddtel2) $xtel2 <br>RAMAL: $xramal<br></font></font></td>
    </tr>
		
			  <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='2'>
        <hr size='1'>
      </td>
    </tr>
		
    </table>
    </center>
  </div>

	");
if ($erro_ped){
echo("
<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100'>
        <p align='right'><b><font size='1' face='Verdana' color='#FF0000'><img border='0' src='images/errop.gif' width='25' height='24'></font></b>
      </td>
  <center>
      <td width='450'>
        <b><font size='1' face='Verdana' color='#FF0000'>$erro_ped</font></b>
      </td>
      </tr>
  </table>
  </center>
</div>
");
}
echo("
  <div align='center'>
    <center>
    <table border='0' width='550' cellpadding='2'>
      <tr>
        <td width='536' bgcolor='#800000' colspan='3'><b><font face='Verdana' color='#FFFFFF' size='2'>DADOS
          DA OS</font></b></td>
      </tr>
      <tr>
        <td width='131' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'>TIPO:</font></b></td>
        <td width='203' bgcolor='#F3B94B'><font color='#800000'>
		<select size='1' class=drpdwn name='tipo_serv' >                         
	");

	$prod->listProdgeral("os_tipo", "", $array6, $array_campo6 , "order by tipo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$tipo_serv = $prod->showcampo1();
			$codtipo_serv = $prod->showcampo0();

	echo("		
		<option value='$codtipo_serv'>$tipo_serv</option>
		");
	
	}
if ($xcodtipo_serv)
{
	$prod->listProdU("codtipo_serv, tipo","os_tipo", "codtipo_serv= $xcodtipo_serv");
	$codtipo_serv = $prod->showcampo0();
	$tipo_serv = $prod->showcampo1();

echo("	
		<option value='$codtipo_serv' selected>$tipo_serv</option>
");
}else{
echo("	
		<option value='' selected>ESCOLHA</option>
");
}
echo("
	  </select></font></td>
        <td width='202' bgcolor='#F3B94B'><font color='#800000'><b><font size='1' face='Verdana'>PEDIDO</font></b><font size='1' face='Verdana'><b>:<br>
          </b><input type='text' name='codbarra_pedref' size='14' value='$xcodbarra_pedref' maxlength='13'><B>&nbsp;&nbsp;<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('inicioos_codbarraped.php?Action=list&desloc=$desloc&codos=$codos&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&codbarra_pedref=$xcodbarra_pedref','name','650','400','yes');return false");echo('"');echo(">CODBARRA</a></B></font></font></td>
      </tr>
      <tr>
        <td width='131' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>CONTATO:</font></b></td>
        <td width='203' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='contato' size='20' value='$xcontato'></font></td>
        <td width='202' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>DATA
          NOTA:</font><font size='1' face='Verdana' color='#800000'><br>
        <input type='text' name='dnota' value = '$xdnota' size='2' maxlength='2'>/</font></b><font size='1' face='Verdana'><b><input type='text' name='mnota' value = '$xmnota' size='2' maxlength='2'>/</b></font><font size='1' face='Verdana'><b><input type='text' name='anota' value = '$xanota' size='4' maxlength='4'>
          <br>
          NOTA:<br>
          </b></font><font size='1' face='Verdana' color='#000000'><input type='text' name='nota' size='20' value='$xnota'></font></td>
      </tr>
      <tr>
        <td width='131' rowspan='2' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>TELEFONE:</font></b></td>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='dddtel1' size='3' value='$xxdddtel1'><input type='text' name='tel1' size='10' value='$xxtel1'></font></td>
      </tr>
      <tr>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='dddtel2' size='3' value='$xxdddtel2'><input type='text' name='tel2' size='10' value='$xxtel2'></font></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'>
          <table border='0' width='100%' cellspacing='1'>
            <tr>
			<td width='33%'><b><font size='1' face='Verdana' color='#800000'>
		");
		  if ($xserv_coletar){
	echo("<input type='checkbox' name='serv_coletar' value='OK' checked>COLETAR NO CLIENTE</font></b>");
		 }else{
	echo("<input type='checkbox' name='serv_coletar' value='OK'>COLETAR NO CLIENTE</font></b>");
		  }
		  echo("
        </td>
              <td width='33%'><b><font size='1' face='Verdana' color='#800000'> 
			");
		  if ($xserv_entregar){
	echo("<input type='checkbox' name='serv_entregar' value='OK' checked>ENTREGAR NO CLIENTE</font></b>");
		  }else{
	echo("<input type='checkbox' name='serv_entregar' value='OK'>ENTREGAR NO CLIENTE</font></b>");
		  }
		  echo("
		  </td>
              <td width='34%'><b><font size='1' face='Verdana' color='#800000'> 
			  ");
		  if ($xserv_onsite){
	echo("<input type='checkbox' name='serv_onsite' value='OK' checked>MANUTENÇÃO ON SITE</font></b>");
		
		  }else{
	echo("<input type='checkbox' name='serv_onsite' value='OK'>MANUTENÇÃO ON SITE</font></b>");
		  }
		  echo("</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td width='131' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'>REINCIDÊNCIA:</font></b></td>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='codbarra_osref' size='14' value='$xcodbarra_osref' maxlength='13'>
          (colocar o código da última OS deste cliente)</font></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DESCRIÇÃO DO EQUIPAMENTO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='3' name='os_descricao_equip' cols='65'>$xos_descricao_equip</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DEFEITO RELATADO PELO CLIENTE:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='3' name='os_defeito_apres' cols='65'>$xos_defeito_apres</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          LAUDO TÉCNICO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='7' name='os_laudo' cols='65'>$xos_laudo</textarea></font></b></td>
      </tr>
	 <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'><br>
          DETALHES SOBRE O ORÇAMENTO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#000000'><textarea rows='4' name='os_orcamento' cols='65'>$xos_orcamento</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DETALHAMENTO DO SERVIÇO EXECUTADO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='7' name='os_servico_execut' cols='65'>$xos_servico_execut</textarea></font></b></td>
      </tr>
				<tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'><br>
          OBSERVAÇÕES:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#000000'><textarea rows='4' name='obs' cols='65'>$xxobs</textarea></font></b></td>
      </tr>

  

    </table>
    </center>
  </div>

<br>
");
if ($hist == 0){
 echo("
  <div align='center'>
    <center>
    <table border='0' width='550' cellpadding='2'>
      <tr>
        <td width='536' colspan='3' bgcolor='#800000'>
          <b><font size='1' face='Verdana' color='#800000'>
          </font><font size='2' face='Verdana' color='#FFFFFF'>STATUS DA OS:</font></b></td>
      </tr>
      <tr>
        <td width='268' bgcolor='#FFFFAA'>
          <font face='Verdana' size='1'></font></td>
        <td width='134' bgcolor='#FFFFAA'>
        </td>
        <td width='134' bgcolor='#FFFFAA' rowspan='2'>
          <input type='submit' value='GRAVAR OS' name='B1'></td>
      </tr>
      <tr>
        <td width='268' bgcolor='#FFFFAA'>
          <font face='Verdana' size='1'><b>ALTERAR STATUS</b></font></td>
        <td width='134' bgcolor='#FFFFAA'>
          <select size='1' class=drpdwn name='statusos'>
                             
						  

		
		<option selected>ESCOLHA</option>
		
        ");
if ($libentr == "OK"){
echo("
        <option value='ENTR'>ENTR</option>
");
}
echo("
       
		
						  </select></td>
      </tr>
    </table>
    </center>
  </div>






		 <input type='hidden' name='retorno' value='1'>
		 <input type='hidden' name='desloc' value='0'>
		 <input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		 <input type='hidden' name='codos' value='$codos'>
		 <input type='hidden' name='tipocliente' value='$tipocliente'>
		 <input type='hidden' name='codempselect' value='$codempselect'>
		 <input type='hidden' name='codclienteselect' value='$codcliente'>



</form>
");
} // HISTORICO
echo("
 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='orc'><img border='0' src='images/n2c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>ORÇAMENTO
          DA O.S.</font></b></td>
      </tr>
    </table>
    </center>
  </div>

	<form method='POST' action='$PHP_SELF?Action=verifnserie#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
      <tr>
        <td width='542' colspan='7' bgcolor='#F3B94B'>
          <p align='left'><font face='Verdana' size='2'><b>LISTA DE PEÇAS UTILIZADAS NA
          O.S.<br>
          </b></font><font face='Verdana' size='1'>Lista de peças que estão
          sendo usados na Ordem de Serviço.</font></td>
      </tr>
    <center>
      <tr>
		 <td width='13' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'></font></b></td>
		 <td width='30' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>COD<br>ITEM.</font></b></td>
        <td width='131' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>DATA<br>
          REQ.</font></b></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='69' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='75' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>VALOR<br>
          (R$)</font></b></td>
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
      <tr bgcolor = '$cor1'>
        <td width='13'  align='center'>

</td>
	 <td width='30'  align='center'><font size='1' face='Verdana'>$codpos</font></td>
        <td width='131' align='center'><b><font size='1' face='Verdana'>$nomeprod_lista</font></b></td>
        <td width='78'  align='center'><font size='1' face='Verdana'>$datareqf</font></td>
        <td width='122'  align='center'>
");
if ($codcb <> ""){

	$prod->clear();			
	$prod->listProdU("codbarra", "codbarra", "codcb='$codcb'");
	$codbarra_prod = $prod->showcampo0();

echo("
	<b><font size='1' face='Verdana' color = '#339900'>$codbarra_prod</font></b>
");
}else{
echo("
		&nbsp;
");
}
echo("


		</td>
        <td width='69'  align='center'><font size='1' face='Verdana'>$login_resp</font></td>
        <td width='75'  align='center'><b><font size='1' face='Verdana'>$valorf</font></b></td>
      </tr>
			<input type='hidden' name='codprod[$i]' value='$codprod_lista'>
			<input type='hidden' name='codpos[$i]' value='$codpos'>
");
		$valortprod = $valortprod + $valor;
 }
 echo("
      
     <tr>
        <td width='542' colspan='7' bgcolor='#F3B94B'>
          <p align='left'><font face='Verdana' size='2'><b>LISTA DE PEÇAS DEVOLVIDAS (somente garantia)<br>
          </b></font><font face='Verdana' size='1'>Lista de peças que foram devolvida de algum pedido por estar com defeito.</font></td>
      </tr>
    <center>
      <tr>
		 <td width='13' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'></font></b></td>
		 <td width='30' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>COD<br>ITEM.</font></b></td>
        <td width='131' bgcolor='#FBE6BF' align='center' ><b><font size='1' face='Verdana' color='#800000'>PRODUTO</font></b></td>
        <td width='78' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>DATA<br>
          REQ.</font></b></td>
        <td width='122' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>NUM.
          <br>
          SÉRIE</font></b></td>
        <td width='69' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>RESP.</font></b></td>
        <td width='75' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#800000'>VALOR<br>
          (R$)</font></b></td>
      </tr>
");
$prod->listProdSum("codprod, datastatus, qtde, ppu, tipo_estoque, login, codpos, codcb", "os_prod", "codos=$codos and tipo_estoque ='D'", $array1, $array_campo1, "order by codprod" );


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

			if ($tipo_estoque == "D"){$cor1 = '#FDFCCE';}else{$cor1 = '#FEF7E9';}

echo("
      <tr bgcolor = '$cor1'>
        <td width='13'  align='center'>

</td>
	 <td width='30'  align='center'><font size='1' face='Verdana'>$codpos</font></td>
        <td width='131' align='center'><b><font size='1' face='Verdana'>$nomeprod_lista</font></b></td>
        <td width='78'  align='center'><font size='1' face='Verdana'>$datareqf</font></td>
        <td width='122'  align='center'>
");
if ($codcb <> ""){

	$prod->clear();			
	$prod->listProdU("codbarra", "codbarra", "codcb='$codcb'");
	$codbarra_prod = $prod->showcampo0();

echo("
	<b><font size='1' face='Verdana' color = '#339900'>$codbarra_prod</font></b>
");
}else{
echo("
		&nbsp;
");
}
echo("


		</td>
        <td width='69'  align='center'><font size='1' face='Verdana'>$login_resp</font></td>
        <td width='75'  align='center'><b><font size='1' face='Verdana'>$valorf</font></b></td>
      </tr>
			<input type='hidden' name='codprod[$i]' value='$codprod_lista'>
			<input type='hidden' name='codpos[$i]' value='$codpos'>
");
		$valortprod = $valortprod + $valor;
 }
 echo("
    </table>
    </center>
  </div>
		
	

</form>
");
if ($erro_cb){
echo("
<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100'>
        <p align='right'><b><font size='1' face='Verdana' color='#FF0000'><img border='0' src='images/errop.gif' width='25' height='24'></font></b>
      </td>
  <center>
      <td width='450'>
        <b><font size='1' face='Verdana' color='#FF0000'>$erro_cb</font></b>
      </td>
      </tr>
  </table>
  </center>
</div>
");
}
echo("
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <hr size='0'>
      </td>
    </tr>
  </table>
  </center>
</div>
");
	if ($valortprod < 0 ){$valortprod = 0;}
	$valortprodf = number_format($valortprod,2,',','.'); 
	

echo("
<form method='POST' action='$PHP_SELF?Action=atualizaval#orc'>
  <div align='center'>
    <table border='0' width='550' cellspacing='1'>
    <center>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#000000'>VALOR&nbsp;<br>
          PRODUTOS</font></b></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $valortprodf</b></font></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><b><font size='1' face='Verdana' color='#000000'>DESCONTO/ACRESCIMO</font></b></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $vdf</b></font></td>
      </tr>
");
$valorfprod = $xvd + $valortprod;
$valorfprodf = number_format($valorfprod,2,',','.'); 

echo("
      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#808080'>SUBTOTAL<br>
          ORDEM SERVIÇO</font></b></td>
        <td width='130' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#808080'>R$
          $valorfprodf</font></b></td>
      </tr>
      <tr>
        <td width='388' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana' color='#000000'><b>VALOR
          SERVIÇOS</b></font></td>
        <td width='130' bgcolor='#FBE6BF' align='center'><font size='1' face='Verdana'><b>R$
          $vsf</b></font></td>
      </tr>
");
$valortotal = $xvs + $valorfprod;
$valortotalf = number_format($valortotal,2,',','.'); 

echo("

      <tr>
        <td width='388' bgcolor='#FFFFFF' align='center'><b><font size='1' face='Verdana' color='#800000'>TOTAL<br>
          ORDEM SERVIÇO</font></b></td>
        <td width='130' bgcolor='#FFFFFF' align='center'><b><font size='2' face='Verdana' color='#800000'>R$
          $valortotalf</font></b></td>
      </tr>
      
    </table>
    </center>
  </div>

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codos' value='$codos'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='vprod' value='$valortprod'>
</form>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <hr size='0'>
      </td>
    </tr>
  </table>
  </center>
</div>



<br><br>
 <div align='center'>
    <center>
    <table border='0' width='550'>
      <tr>
        <td width='29'><a name='formapg'><img border='0' src='images/n3c.gif' width='27' height='27'></a></td>
        <td width='507' bgcolor='#000000'>&nbsp;<b><font size='2' face='Verdana' color='#ffffff'>FORMA DE PAGAMENTO</font></b></td>
      </tr>
    </table>
    </center>
  </div>

	

	 <form name='form1' method='post' action='$PHP_SELF?Action=update&desloc=0'>



<form method='POST' action='$PHP_SELF?Action=addforma#formapg'  name='Form' >
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='40%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='40%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		
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
			$valorparc = $valorparc + $tarifa;
			$valorparcf = number_format($valorparc,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricaoold = $prod->showcampo1();

			$datavenc = str_replace('-','',$datavenc);
			$xanopar = substr($datavenc,0,4);
			$xmespar = substr($datavenc,4,2);
			$xdiapar = substr($datavenc,6,2);

			$xtipo = $tipo;


		
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='40%'><font size='1' face='Verdana' color='#000000'>$xdiapar/$xmespar/$xanopar
		  </font></td>
        <td width='20%' ><font size='1' face='Verdana' color='#000000'><b>$valorparcf</b></font></td>
        <td width='40%' ><font size='1' face='Verdana' color='#000000'>$descricaoold</font></td>
       </tr>

 ");
	}//FOR

echo("

	
    </table>
    </center>
  </div>
	


			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
 		    <input type='hidden' name='codos' value='$codos'>
			<input type='hidden' name='codpedselect' value='$codpedselect'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='pgold' value='$pgold'>



 <div align='center'>
    <center>
   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='274'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='274' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='274' align='right'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='274' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
    </tr>

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
    
  </table>
  </center>
</div>


<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DA OS</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#F3B94B'>
        <td width='30%'><font face='Verdana' color='#000000' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='35%'><font face='Verdana' color='#000000' size='1'><b>STATUS</b></font></td>
		<td width='35%'><font face='Verdana' color='#000000' size='1'><b>MODIFICADO POR</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("os_status", "codos=$codos", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$modpor = $prod->showcampo4();
			$datastatusf = $prod->fdata($datastatus);


echo("
      <tr bgColor='#f3f8fa'>
        <td width='30%'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='35%'><font face='Verdana' size='1'><b>$statusped</b></font></td>
		<td width='35%'><font face='Verdana' size='1'><b>$modpor</b></font></td>
      </tr>
");		
	}//FOR
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>




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
}


//  FIM - FIM DA PARTE DE IMPRESSAO ///


endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"):

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
  </center>
	

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width='30%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933'  >$titulo</font></font></b><br>
<font color='#336699' face=' Verdana, Arial, Helvetica, sans-serif' size='2'>$subtitulo</font></td>
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=list' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'>
		STATUS: <input type='text' name='statuspesq' size='20'>
		<select size='1' class=drpdwn name='tipo_servpesq' >                         
	");

	$prod->listProdgeral("os_tipo", "", $array6, $array_campo6 , "order by tipo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$tipo_serv = $prod->showcampo1();
			$codtipo_serv = $prod->showcampo0();

	echo("		
		<option value='$codtipo_serv'>$tipo_serv</option>
		");
	
	}

echo("	
		<option value='' selected>ESCOLHA</option>

	  </select>
		   <select size='1' class=drpdwn name='codvend_tecpesq' >                         
		&nbsp;");

	$prod->listProdSum("codvend, nome","vendedor", "block <> 'Y' and codgrp = 38", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nome_tec = $prod->showcampo1();
			$codvend_tec = $prod->showcampo0();

	echo("
	<option value='$codvend_tec'>$nome_tec</option>
    
	");
	
	}
echo("	
		<option value='' selected>ESCOLHA</option>

	  </select>	</font>
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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&diaspg=$diaspg#cliente'>$nomeemp</option>
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
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='25%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='40%'>
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>O.S.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>O.S.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'><br>
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
    <td width='27%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='14%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME TÉCNICO</font></b></div>
    </td>
		<td width='12%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA OS</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONT</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LE</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PG</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
  </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

		
			// DADOS //
			$codos = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataos = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$libentr = $prod->showcampo8();
			$codbarra = $prod->showcampo9();
			$caixa = $prod->showcampo10();
			$nomecliente = $prod->showcampo11();
			$fat = $prod->showcampo12();
			$modped = $prod->showcampo13();
			$codtipo = $prod->showcampo14();
			$codvend_tec = $prod->showcampo15();
	
			// FORMATACAO //
			$dataosf = $prod->fdata($dataos);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataos,$dataatual);
			
			$prod->clear();
			$prod->listProdU("tipo", "os_tipo", "codtipo_serv='$codtipo'");
			$tipo_serv = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codvend_tec'");
			$nomevend_tec = $prod->showcampo0();

			$bgcorlinha="#E5E5E5";
			if ($status == "ABERTA"){$bgcorlinha="#FFCC66";}
			if ($status == "DIAG"){$bgcorlinha="#D0FDF3";}
			if ($status == "MAN"){$bgcorlinha="#D6B778";}
			if ($status == "MAN APROV"){$bgcorlinha="#D6B778";}
			if ($status == "MAN REPROV"){$bgcorlinha="#E1AFAA";}
			if ($status == "LIB"){$bgcorlinha="#EDE763";}
			if ($status == "ORC"){$bgcorlinha="#339966";}
			if ($status == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}
			
							

if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}

		$arqimp_os="inicioos_impressao.php";
		if ($status <> "LIB"){$tipo_imp = 1;}else{$tipo_imp = 0;}

		echo("
			<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codos=$codos&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&'>$codbarra</font></b></a><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'></font></td>
			<td width='27%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend_tec</font></td>
			<td align='center' width='12%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'>$tipo_serv</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$dataosf</font></td>
			
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br></font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$libentr</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor4'>$caixa</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqimp_os?Action=list&desloc=$desloc&codos=$codos&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&tipo_imp=$tipo_imp','name','650','400','yes');return false");echo('"');echo(">IO</a></font></b></td>
			
			</tr>
");
			 }//FOR
	
	echo("

				</table>
		");

	
}

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" ){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&statuspesq=$statuspesq&tipo_servpesq=$tipo_servpesq&codvend_tecpesq=$codvend_tecpesq&";   
include("numcontg.php");
}




/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 


	
	include ("sif-rodape.php");}
}

?>
       
