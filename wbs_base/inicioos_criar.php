

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 10;
$tabela = "clientenovo";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicaoex = " idicj = 'Y'";			// condicao extra para a pesquisa -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$codvendselect=1;
#$codempselect=1;
$titulo = "OS";
$titulo1 = "CRIAR NOVA OS";

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
	$prod->listProd("seguranca", "arquivo='iniciopedfpg.php'");
		$codpgsec = $prod->showcampo0();

	$prod->listProd("seguranca", "arquivo='inicioclientenovoped.php'");
		$codpgclienteped = $prod->showcampo0();

	$prod->listProd("seguranca", "arquivo='inicioclienteform.php'");
		$codpgclientesec = $prod->showcampo0();

	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplca o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}
	
		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){

			if ($tipo_serv == 2){
				$prod->clear();
				$prod->listProdU("codcliente","pedido", "codbarra = '$codbarra_pedref'");
				$codcliente_ped = $prod->showcampo0();
				
				if ($codclienteselect <> $codcliente_ped){$verif = 1;}else{$verif = 0;}

			}else{

				$verif = 0;

			}

			if ($verif == 0){

				// ATUALIZA BANCO DE DADOS DE PEDIDOS

				$statusos = "ABERTA";
				
				$prod->clear();
				$prod->setcampo1($codempselect);
				$prod->setcampo2($codclienteselect);
				$prod->setcampo3($codvend);
				$prod->setcampo4($tipo_serv);
				$prod->setcampo12($dataatual); //DATA OS 
				$dataprevent = $aprev.$mprev.$dprev;
				$prod->setcampo13($dataprevent);
				$prod->setcampo16($statusos);
				$prod->setcampo17($contato);
				$prod->setcampo18($dddtel1);
				$prod->setcampo19($tel1);
				$prod->setcampo20($dddtel2);
				$prod->setcampo21($tel2);
				$prod->setcampo22($os_descricao_equip);
				$prod->setcampo23($os_defeito_apres);
				$prod->setcampo46($os_orcamento);
				$prod->setcampo26($serv_coletar);
				$prod->setcampo27($serv_entregar);
				$prod->setcampo28($serv_onsite);
				$prod->setcampo30("NO");  // MODIFICAÇÃO - OS
				$prod->setcampo31("NO");  // COMISSAO PAGA
				$prod->setcampo32("NO");  // FAT - FATURAMENTO
				$prod->setcampo33("NO");  // NOTA FISCAL
				$prod->setcampo34("NO");  // CODBARRA
				$prod->setcampo35("NO");  // CAIXA
				$prod->setcampo36("NO");  // LIB. ENTREGA
				$prod->setcampo37("NO");  // CANCEL - TOTAL
				$prod->setcampo43($codbarra_pedref);  // CODBARRA PEDIDO REFERENCIA
				$prod->setcampo44($codbarra_osref);  // CODBARRA OS REFERENCIA
				$datanota = $anota.$mnota.$dnota;
				$prod->setcampo50($datanota);
				$prod->setcampo51($nota);

				$prod->addProd("os", $ureg);

				$prod->clear();
				$prod->listProd("os", "codos=$ureg");
				$codbarra_os = $prod->codbarra($codempselect,$ureg, "OS");
				$prod->setcampo38($codbarra_os);  // CODBARRA OS
				$prod->upProd("os", "codos=$ureg");

				#echo("OS = $ureg");

				// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
						$prod->listProdgeral("os_status", "codos=$ureg and statusped='$statusos'", $array614, $array_campo614 , "");

						if (count($array614) == 0){

							// ATUALIZA STATUS DA TABELA
							$prod->setcampo0("");
							$prod->setcampo1($ureg);
							$prod->setcampo2($dataatual);
							$prod->setcampo3($statusos);
							$prod->setcampo4($login);

							$prod->addProd("os_status", $ureg);
						}
				
				$Actionsec="seclist";

			}else{

				$erro_ped = "O CODIGO DO PEDIDO não pertence ao CLIENTE escolhido.";
			}



		}
		
		
		
			
        break;

	case "update":
		
				
		$Actionsec="list";
	
		
		 break;

	 case "list":
		
	
		$Actionsec="seclist";
	
		
		 break;

	 case "start":

		if ($ex==1){
			$prod->delProd("pedidotemp", "codped=$codpednew");
			$prod->delProd("pedidoprodtemp", "codped=$codpednew");
			$prod->delProd("pedidoparcelastemp", "codped=$codpednew");

		}

		if ($ex <> 1){
		$prod->clear();
		$prod->setcampo1($codempselect);
		$prod->setcampo2($codclienteselect);
		$prod->setcampo0("");
		$prod->setcampo3($codvendold);

		$prod->addProd("pedidotemp", $ureg);
		$codpednew = $ureg;

		$palavrachave="";
		}

		if ($ex==1){
		$Actionsec="seclist";
		}else{
		$Actionsec="list";
		}
		
		 break;

		
	 case "importacao":

			break;

		 break;


	 case "delete":
		
	

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA

if ($Actionsec == "seclist"){

	$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE(nome) like '%$palavrachave1%' ";

		#if (strlen($palavrachave1) < 3){$condicao2 = "";} 

		if ($palavrachave <> ""){
				$condicao3 = $condicao2;
				#$condicao3 .= " logincad='$login'";
		}else{
				#$condicao3 .= " logincad='$login'";
		}
		
		if ($tipocliente==""){$tipocliente='F';}

		if ($tipocliente == 'F'){
			
			if ($CPFCLI <>""){
				if ($palavrachave <> ""){
					$condicao3 .= " and cpf='$CPFCLI'";
				}else{
					$condicao3 .= " cpf='$CPFCLI'";
				}
			}
		}else{
			
			if ($CGCCLI <>""){
				if ($palavrachave <> ""){
					$condicao3 .= " and cnpj='$CGCCLI'";
				}else{
					$condicao3 .= " cnpj='$CGCCLI'";
				}
			}
		}

		#if ($palavrachave <> ""){
			#$condicao3 .= " 1";
		#}

		#echo("$condicao3");

		if ($condicao3 <> ""){

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "clientenovo", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcliente, nome, datacad, dataatualizacao, logincad, rescredito,  tipocliente", "clientenovo", $condicao3, $array, $array_campo, $parm );
		
		}
		
			
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


// Cadastra Cliente
function CadastraCli(formpessoa)
{
	var pg_ped
	var tipo = document.getElementById('tipopessoa').value
	if (tipo == 'F') { pg_ped = 2 } else { pg_ped = 3 }
	
	document.formpessoa.action = '$PHP_SELF?pg=112&pg_ped='+pg_ped+'';
	document.formpessoa.target = '_blank';
	document.formpessoa.submit();
}


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

    
    if (!(consisteCPF (form, form.CPFCLI.name, true)))
    {
        return false;
    }
	 if (!(consisteCGC (form, form.CGCCLI.name, true)))
    {
        return false;
    }

	return true;
      	
}

function verificaObrig1 (form)
{
	
	   if ((form.tipo_serv.value == 2) && (form.codbarra_pedref.value == ''))
    {
		alert('O codigo do pedido para o TIPO de O.S. SELECIONADO é de preenchimento obrigatório');
        return false;
    }


	   if ((form.tipo_serv.value == ''))
    {
		alert('ESCOLHA um TIPO de O.S.');
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
	

    if (campo == 'CPFCLI')
        return 'CPF do Titular';
	if (campo == 'CGCCLI')
        return 'CNPJ da Empresa';
   
}


</script>

<script>
// AO SELECIONAR UM CAMPO RADIO RECARREGA A MESMA PAGINA
function getMessage(who)
{
    
     loc = who.value
     top.location=loc

}
</script>

<body bgcolor='#FFFFFF' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'   >


");


if($Action == "insert" ){


		// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProd("clientenovo", "codcliente=$codclienteselect");
				
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
      <td width='112'><b><font face='Verdana' size='1'>ESCOLHA
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2c.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' color='#FF0000'><b>CADASTRO&nbsp;<br>
        DA OS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
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
<form method='POST' action='$PHP_SELF?Action=insert' name='Form77' onSubmit = 'if (verificaObrig1(Form77)==false) return false'>
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
echo("	
		<option value='' selected>ESCOLHA</option>
	  </select></font></td>
        <td width='202' bgcolor='#F3B94B'><font color='#800000'><b><font size='1' face='Verdana'>PEDIDO</font></b><font size='1' face='Verdana'><b>:<br>
          </b><input type='text' name='codbarra_pedref' size='14' value='$codbarra_pedref' maxlength='13'></font></font></td>
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
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='dddtel1' size='3' value='$dddtel1'><input type='text' name='tel1' size='10' value='$tel1'></font></td>
      </tr>
      <tr>
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='dddtel2' size='3' value='$dddtel2'><input type='text' name='tel2' size='10' value='$tel2'></font></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'>
          <table border='0' width='100%' cellspacing='1'>
            <tr>
             <td width='33%'><b><font size='1' face='Verdana' color='#800000'>
		");
		  if ($serv_coletar){
	echo("<input type='checkbox' name='serv_coletar' value='OK' checked>COLETAR NO CLIENTE</font></b>");
		 }else{
	echo("<input type='checkbox' name='serv_coletar' value='OK'>COLETAR NO CLIENTE</font></b>");
		  }
		  echo("
        </td>
              <td width='33%'><b><font size='1' face='Verdana' color='#800000'> 
			");
		  if ($serv_entregar){
	echo("<input type='checkbox' name='serv_entregar' value='OK' checked>ENTREGAR NO CLIENTE</font></b>");
		  }else{
	echo("<input type='checkbox' name='serv_entregar' value='OK'>ENTREGAR NO CLIENTE</font></b>");
		  }
		  echo("
		  </td>
              <td width='34%'><b><font size='1' face='Verdana' color='#800000'> 
			  ");
		  if ($serv_onsite){
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
        <td width='405' colspan='2' bgcolor='#FBE6BF'><font size='1' face='Verdana' color='#000000'><input type='text' name='codbarra_osref' size='14' value='$codbarra_osref' maxlength='13'>
          (colocar o código da última OS deste cliente)</font></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DESCRIÇÃO DO EQUIPAMENTO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='11' name='os_descricao_equip' cols='65'  onKeyDown = 'liberaEnter();'>$os_descricao_equip</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#800000'><br>
          DEFEITO RELATADO PELO CLIENTE:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#FBE6BF'><b><font size='1' face='Verdana' color='#000000'><textarea rows='10' name='os_defeito_apres' cols='65' onKeyDown = 'liberaEnter();'>$os_defeito_apres</textarea></font></b></td>
      </tr>
				 <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#800000'><br>
          DETALHES SOBRE O ORÇAMENTO:</font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3' bgcolor='#F3B94B'><b><font size='1' face='Verdana' color='#000000'><textarea rows='4' name='os_orcamento' cols='65'>$xos_orcamento</textarea></font></b></td>
      </tr>
      <tr>
        <td width='536' colspan='3'>
          <p align='center'><input type='submit' value='GRAVAR OS' name='B1'></td>
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
		 <input type='hidden' name='tipocliente' value='$tipocliente'>
		 <input type='hidden' name='codempselect' value='$codempselect'>
		 <input type='hidden' name='codclienteselect' value='$codclienteselect'>



</form>


");


}


if($Action == "list" ){


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
      <td width='27'><img border='0' src='images/n1c.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' color='#FF0000'>ESCOLHA
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1'><b>CADASTRO&nbsp;<br>
        DA OS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
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





<!-- ESCOLHA DE EMPRESAS - INICIO --> 
");

if ($allemp == "Y"){

echo("
<br><br>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ETAPA 
      </font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#FF6600'> - SELECIONAR A EMPRESA NA QUAL O PEDIDO SERÁ FEITO.</b> </font></td>
  </tr>
</table>

	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>


		 <table width='550' border='0' cellspacing='2' cellpadding='1' align='center' >
    <tr> 
       <td  > 
			<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#86ACB5'>
		<b> </b>
	       <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>                         
	");

	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp#cliente'>$nomeemp</option>
		");
	
	}
echo("	
		<option value='' selected>Escolha a Empresa</option>
	  </select>
	  </td>
    </tr>
	   
  </table>
	</form>
");
}else{

$codempselect = $codempvend;

}

echo("

<!-- ESCOLHA DE EMPRESAS - FIM --> 
	
<br>	
	<a name='cliente'>
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
            <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
			<td>
<table  border='0' cellspacing='1' cellpadding='1'>
<form action='' method='POST' name='formpessoa'>
  <tr>
    <td colspan='2'><strong>Inserir Novo Cliente</strong></td>
  </tr>
  <tr>
    <td><select name='tipopessoa' id='tipopessoa'>
      <option value='F'>Pessoa F&iacute;sica</option>
      <option value='J'>Pessoa Jur&iacute;dica</option>
    </select></td>
    <td><input type='submit' name='Submit' value='OK' onClick=CadastraCli('formpessoa');></td>
  </tr>
</form>
</table>
			</td>
              </center>
          <td width='40%'>
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

<form method='POST' action='$PHP_SELF?Action=$Action&codpedimport=$codpedimport&orcimp=$orcimp#cliente' name='FormPesq'>

	<table width='550' border='0' cellspacing='0' cellpadding='0' align='center' >
	 <tr> 
      <td width='550' colspan='2' > 
      <p align='center'>
");
if ($tipocliente == 'J'){$ckj = 'checked';}else{$ckf = 'checked';}


echo("

      <input type='radio' value='$PHP_SELF?Action=$Action&tipocliente=F&desloc=$desloc&codempselect=$codempselect&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pge&codpedimport=$codpedimport&orcimp=$orcimp#client' $ckf name='R1' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA
      FÍSICA </b></font><input type='radio' $ckj name='R1' value='$PHP_SELF?Action=$Action&tipocliente=J&desloc=$desloc&codempselect=$codempselect&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp#cliente' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA
      JURÍDICA</b></font>
	  </p>

      </td>
    </tr>
    <tr> 
      <td width='550' >
      </td>
    </tr>
    <tr> 
    
		  <td width='550'  > 
");
if ($tipocliente == 'J'){$doc = 'CGC';$docname = 'CGCCLI';}else{$doc = 'CPF';$docname = 'CPFCLI';}

echo("
  <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		NOME: <input type='text' name='palavrachave' size='20'></font>
<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>$doc: <input type='text' name='$docname' size='20' onchange='consiste$doc(this.form, this.form.$docname.name, true)'></font>
<input class='sbttn' type='submit' name='cond' value='OK'></p>
      </td>
     
	  
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		  <input type='hidden' name='tipocliente' value='$tipocliente'>
		 <input type='hidden' name='codempselect' value='$codempselect'>
	
    </tr>
  </table>
	</form>

");


if ($orcimp == 1){

echo("
<br>
<div align='center'>
  <center>
  <table border='0' width='550'>
    <tr>
      <td width='100%'><font face='Verdana' size='1' color='#FF0000'><b>IMPORTANTE:
        </b>AO TRANSFORMAR UM ORÇAMENTO EM PEDIDO É NECESSÁRIO DESTACAR AS
        SEGUINTES ALTERAÇÕES:</font>
        <blockquote>
          <ul>
            <li><font face='Verdana' size='1' color='#000000'><b>PRODUTOS EXTRAS</b>
              E <b>PRODUTOS QUE ESTÃO FORA DE LINHA</b>, NÃO SERÃO
              INCLUÍDOS;</font></li>
            <li><font face='Verdana' size='1' color='#000000'>OS <b>PREÇOS NO
              NOVO PEDIDO</b>, SERÃO ALTERADOS DE ACORDO COM A TABELA ATUAL.</font></li>
          </ul>
        </blockquote>
      </td>
    </tr>
  </table>
  </center>
</div>
<br>
");
}
echo("

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#FF6600'>>> Selecione o cliente pesquisado na lista abaixo. <<</font><br><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'></font></td>
  </tr>
</table>
	
	<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='30%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA CADASTRO</font></b></div>
    </td>
	 <td align='center' width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
	<td align='center' width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
   
  </tr>

	");
if (count($array) <> 0):
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codcliente = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$datacad = $prod->showcampo2();
			$dataatualiza = $prod->showcampo3();
			$logincad = $prod->showcampo4();
			$xrescredito=	$prod->showcampo5();
			$tipocliente = $prod->showcampo6();

	

			// FORMATACAO //
			$dataatualf = $prod->fdata($dataatualiza);
			$datahoje = $prod->gdata();
			$difdias = $prod->numdias($dataatualiza,$datahoje);


	#$difdias=91;

			// IMPORTACAO DO PEDIDO
			#if ($orcimp == 1){$Action = "importacao";}else{$Action = "start";}


// USUARIO POSSUI RESTRICAO DE CREDITO
if ($xrescredito == ""){

	// CADASTRO DESATUALIZADO POR MAIS DE 90 DIAS
	if ($difdias < 90){
		echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='20%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datacad</font></b></td>
");
		
		if ($codempselect == ""):
		echo("
			
		<td align='center' width='20%' height='0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></font></td>
		");
		else:
		echo("
			<td align='center' width='20%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=insert&codclienteselect=$codcliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp'><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></a></font></td>
		");
		endif;
		echo("
		");

// TESTA SE LOGIN DO USUARIO A TEM PERMISSAO DE ALTERAR ESSE CLIENTE
		echo("
			<td align='center' width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$PHP_SELF?Action=update&codcliente=$codcliente&tipopessoa=$tipocliente&retlogin=$retlogin&connectok=$connectok&pg=$codpgclientesec&lock=1&codpedimport=$codpedimport','name','600','500','yes');return 
false");echo('"');echo(">Alterar Cadastro</a></b></font></td>
	   </tr>
		");


}else{

echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome<br></font></td>
");

// TESTA SE LOGIN DO USUARIO A TEM PERMISSAO DE ALTERAR ESSE CLIENTE
		echo("
		<td align='center' width='60%' height='0' colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$PHP_SELF?Action=update&codcliente=$codcliente&tipopessoa=$tipocliente&retlogin=$retlogin&connectok=$connectok&pg=$codpgclientesec&lock=1','name','600','500','yes');return 
false");echo('"');echo(">Atualizar Cadastro</a></b></font><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><br>O cadastro deste cliente tem mais de 90 dias sem alteracao, por favor atualize o cadastro para que possa prosseguir com a OS pedido. </font></td>
		
	</tr>
		");
}


}else{

echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome<br></font></td>
		<td align='center' width='40%' height='0' colspan='2'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'>CLIENTE COM RESTRIÇÃO DE CRÉDITO</font></font></b><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><br>Este cliente possui alguma restrição de crédito. Entre em contato com o departamento financeiro para maiores informações </font></td>
");
	
		if ($codempselect == ""):
		echo("
			
		<td align='center' width='20%' height='0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></font></td>
		");
		else:
		echo("
			<td align='center' width='20%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=insert&codclienteselect=$codcliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp'><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></a></font></td>
		");
		endif;
echo("
		
		</tr>
		");

}


	 }

else:
	echo("
<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=5><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'>&nbsp;<td>
		<tr>
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=5><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM CLIENTE SELECIONADO</b><td>
		<tr>
	");
endif;

		echo("
				</table>
		");
		

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

} // ACTION LIST


if ($Action ==  "list" ){
/// CONTADOR DE PAGINAS ////
#$Action= "update";
$compl= "codpednew=$codpednew&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg#adicionar&codpedimport=$codpedimport";   
/// Complemento para a parte de mudanca de pagina
include("numcontg.php");
}

echo("
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




include ("sif-rodape.php");

}
?>
       
