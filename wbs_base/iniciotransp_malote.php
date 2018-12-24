

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datamal DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "MALOTE";
$titulo = "ADMINISTRAÇÃO MALOTE";
$subtitulo = "MALOTE";

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
		#if ($codempvend <> 0){$codempselect = $codempvend;}

		if ($hist == ""){$hist = "N";}
		

	$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":


			// MOSTRA DADOS DO MALOTE - INICIO
			$prod->listProd("transp_malote", "codmal=$codmal");
		
			$xcodmal = $prod->showcampo0();
			$xcodvend = $prod->showcampo1();
			$xsol = $prod->showcampo2();
			$xcol = $prod->showcampo3();
			$xent= $prod->showcampo4();
			
		

			if ($xsol == "NO" and $solselect =="OK"){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codmal);
				$prod->setcampo2($dataatual);
				$prod->setcampo3('MOTORISTA SOLICITADO');
				$prod->setcampo4($login);
				$prod->addProd("transp_malote_status", $ureg);

				$prod->listProd("transp_malote", "codmal=$codmal");
				$prod->setcampo9("MOTORISTA SOLICITADO"); // STATUS
				$prod->setcampo10($dataatual); 
				$prod->upProd("transp_malote", "codmal=$codmal");

			}

			if ($xcol == "NO" and $colselect =="OK"){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codmal);
				$prod->setcampo2($dataatual);
				$prod->setcampo3('MALOTE COLETADO');
				$prod->setcampo4($login);
				$prod->addProd("transp_malote_status", $ureg);

				$prod->listProd("transp_malote", "codmal=$codmal");
				$prod->setcampo9("MALOTE COLETADO"); // STATUS
				$prod->setcampo10($dataatual); 
				$prod->upProd("transp_malote", "codmal=$codmal");

			}

			if ($solselect == "OK" and $colselect == "OK" and $entselect =="OK"){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codmal);
				$prod->setcampo2($dataatual);
				$prod->setcampo3('MALOTE ENTREGUE');
				$prod->setcampo4($login);
				$prod->addProd("transp_malote_status", $ureg);

				$prod->listProd("transp_malote", "codmal=$codmal");
				$prod->setcampo9("MALOTE ENTREGUE"); // STATUS
				$prod->setcampo10($dataatual); 
				$prod->setcampo6($dataatual); // DATA ENTREGA
				$prod->setcampo7("Y"); 

				$prod->upProd("transp_malote", "codmal=$codmal");

			}

			if ($solselect == "OK" and $colselect == "OK" and $entselect =="NO"){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codmal);
				$prod->setcampo2($dataatual);
				$prod->setcampo3('AGUARDANDO ENTREGA');
				$prod->setcampo4($login);
				$prod->addProd("transp_malote_status", $ureg);

				$prod->listProd("transp_malote", "codmal=$codmal");
				$prod->setcampo9("AGUARDANDO ENTREGA"); // STATUS
				$prod->setcampo10($dataatual); 
				$prod->upProd("transp_malote", "codmal=$codmal");

			}
				
				// ATUALIZA OBS
				$prod->listProd("transp_malote", "codmal=$codmal");
				$prod->setcampo2($solselect);
				$prod->setcampo3($colselect);
				$prod->setcampo4($entselect); 
				$prod->setcampo8($obs); 
				$prod->upProd("transp_malote", "codmal=$codmal");
		
		
		$Actionsec = "list";
        break;

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codmal);
				$prod->setcampo2($dataatual);
				$prod->setcampo3('MALOTE CANCELADO');
				$prod->setcampo4($login);
				$prod->addProd("transp_malote_status", $ureg);

				$prod->listProd("transp_malote", "codmal=$codmal");
				$prod->setcampo9("MALOTE CANCELADO"); // STATUS
				$prod->setcampo10($dataatual); 
				#$prod->setcampo6($dataatual); // DATA ENTREGA
				$prod->setcampo7("Y"); 

				$prod->upProd("transp_malote", "codmal=$codmal");

			$Actionsec = "list";

		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

				
		$campopesq = "nome";
		$condicao5 = " LCASE(vendedor.$campopesq) like '%$nomevendpesq1%' and ";
		
		
			
		//PESQUISA POR NOME VENDEDOR
		if ($nomevendpesq){
							
			$condicao3 .= $condicao5;
		}
		
		//PESQUISA POR CODMALOTE
		if ($codpesq){
							
			$condicao3 .= " transp_malote.codmal='$codpesq' and";
		}

		
			
	
				$condicao3 .= " transp_malote.hist = '$hist'  ";
				$condicao3 .= " and transp_malote.codvend=vendedor.codvend ";

					

		#echo("c=$condicao3 - c4=$condicao4");

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "transp_malote, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
				
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codmal, transp_malote.codvend, solicitado, coletado, entregue, hist, datamal, datastatus, dataentrega, obs, status", "transp_malote, vendedor", $condicao3, $array, $array_campo, $parm );

		
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
	 $prod->listProd("transp_malote", "codmal=$codmal");
		
			$codmal = $prod->showcampo0();
			$codvend = $prod->showcampo1();
			$sol = $prod->showcampo2();
			$col = $prod->showcampo3();
			$ent= $prod->showcampo4();
			$datamal = $prod->showcampo5();
			$dataentrega = $prod->showcampo6();
			$hist= $prod->showcampo7();
			$obs = $prod->showcampo8();
			$status = $prod->showcampo9();
			$datastatus = $prod->showcampo10();

			// FORMATACAO //
			$datamalf = $prod->fdata($datamal);
			$datastatusf = $prod->fdata($datastatus);
			$dataentregaf = $prod->fdata($dataentrega);

			$prod->listProdU("tipocliente, doc","vendedor", "codvend='$codvend'");
				
				$tipoclienteold = $prod->showcampo0();
				$docold = $prod->showcampo1();
				if ($tipoclienteold == "F"){
					$prod->listProdU("codcliente", "clientenovo", "cpf='$docold'");
					$xcodcliente=	$prod->showcampo0();
				}else{
					$prod->listProdU("codcliente", "clientenovo", "cnpj='$docold'");
					$xcodcliente=	$prod->showcampo0();
				}


	
if ($sol == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($col == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($ent == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}

	
	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProd("clientenovo", "codcliente=$xcodcliente");
				
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

		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();
		
	

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
        <p align='left'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>MALOTE:
        </b></font><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codmal</font></td>
      <center>
      <td width='50%' bgcolor='#000000'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='1'><b>REVENDA:</font><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><br>
      </font><font color='#FFFFFF' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
      </tr>
		 
      <tr>
        <td width='50%' bgcolor='#F0F0F0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA
          EMISSÃO PEDIDO:<br>
          </font><font face=' Verdana, Arial, Helvetica, sans-serif'>$datamalf</font></b></font></td>
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
			  <tr>
      <td width='50%' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br></b>
        </font><font color='#000000'>$xemail</font></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>($xdddtel1) $xtel1<br>($xdddtel2) $xtel2 <br>RAMAL: $xramal<br></font></td>
    </tr>
		
		  <!--
		     <tr>
        <td width='100%' bgColor='#FFFFFF' colspan='2'>
          <p align='right'><img src='cbshow.php?ean=9782212110333'></td>
      </tr>
		  -->
    </table>
  </center>
</div>


<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='4'>
        <hr size='1'>
      </td>
    </tr>
    
  </table>
  </center>
</div>


<form method='POST' action='$PHP_SELF?Action=insert'  name='Form'>
 <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
	 <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>MOTORISTA<bR>SOLICITADO</b></font></td>
        <td width='554'>
");
if ($hist <> "Y"){
echo("
  <select size='1' class=drpdwn name='solselect'>

	<option value='OK'  >OK</option>
    <option value='NO'>NO</option>
	<option value='$sol' selected>$sol</option>				  

  </select>
");
}else{
echo("
<b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$sol</font></b>
	");
}
echo("
        </td>
	   
        <td width='55' rowspan='4'>
");
if ($hist <> "Y"){
echo("
 <input type='submit' value='OK' name='B1'>
");
}
echo("		
        </td>
     </tr>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>COLETADO</b></font></td>
        <td width='554'>
");
if ($hist <> "Y"){
echo("
  <select size='1' class=drpdwn name='colselect'>

	<option value='OK'  >OK</option>
    <option value='NO'>NO</option>
	<option value='$col' selected>$col</option>				  

  </select>
");
}else{
echo("
<b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$col</font></b>
	");
}
echo("
     </tr>
     
	     <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ENTREGUE<BR> À IPASOFT</b></font></td>
        <td width='554'>
");
if ($hist <> "Y"){
echo("
  <select size='1' class=drpdwn name='entselect'>

	<option value='OK'  >OK</option>
    <option value='NO'>NO</option>
	<option value='$ent' selected>$ent</option>				  

  </select>
");
}else{
echo("
<b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor3'>$ent</font></b>
	");
}
echo("
        </td>
     </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>OBS:</b></font></td>
        <td width='554'>
");
if ($hist <> "Y"){
echo("
  	<input type='text' name='obs' value='$obs' size='48'>
");
}else{
echo("
<b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'>$obs</font></b>
	");
}
echo("	
		
        </td>
      </tr>

    </table>
    </center>
  </div>

		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codmal' value='$codmal'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
</form>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>I</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO MALOTE</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#86acb5'>
        <td width='30%'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>STATUS</b></font></td>
		<td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>MODIFICADO POR</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("transp_malote_status", "codmal=$codmal", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$modpor = $prod->showcampo4();
			$datastatusf = $prod->fdata($datastatus);

if ($statusped == "ENTR"){$apgdata =1;}

echo("
      <tr bgColor='#f3f8fa'>
        <td width='30%'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='35%'><font face='Verdana' size='1'><b>$statusped</b></font></td>
		<td width='35%'><font face='Verdana' size='1'><b>$modpor</b></font></td>
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
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='cli'>Cliente</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->
		COD: <input type='text' name='codpesq' size='5' maxlength='13'> 
		VENDEDOR: <input type='text' name='nomevendpesq' size='20'></font>
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
/*
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

	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
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
*/
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
           
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='54%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>MALOTE:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&nomevendpesq=$nomevendpesq'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>MALOTE:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=Y&nomevendpesq=$nomevendpesq'><br>
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
    <td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
	<td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>REVENDA</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA MALOTE</font></b></div>
    </td>
	<td width='30%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA STATUS</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SOL</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COL</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ENT</font></b></div>
    </td>
		<td width='4%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codmal = $prod->showcampo0();
			$codvend = $prod->showcampo1();
			$sol = $prod->showcampo2();
			$col = $prod->showcampo3();
			$ent= $prod->showcampo4();
			$hist= $prod->showcampo5();
			$datamal = $prod->showcampo6();
			$datastatus = $prod->showcampo7();
			$dataentrega = $prod->showcampo8();
			$obs = $prod->showcampo9();
			$status = $prod->showcampo10();
	
			// FORMATACAO //
			$datamalf = $prod->fdata($datamal);
			$datastatusf = $prod->fdata($datastatus);
			$dataentregaf = $prod->fdata($dataentrega);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataatual,$dataprevent);
			
			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();

			$bgcorlinha="#E5E5E5";
			if ($sol == "NO" and $col == "NO" and $ent == "NO"){$bgcorlinha="#FFCC66";}
			if ($sol == "OK" and $col == "NO" and $ent == "NO"){$bgcorlinha="#CFFCC7";}
			if ($sol == "OK" and $col == "OK" and $ent == "NO"){$bgcorlinha="#99CCFF";}
			#if ($sol == "OK" and $col == "OK" and $ent == "OK"){$bgcorlinha="#E6E6E6";}
			if ($sol == "NO" and $col == "OK" and $ent == "NO"){$bgcorlinha="#E1AFAA";}
			
			
if ($sol == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($col == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($ent == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}

if ($hist == "Y"){$bgcorlinha="#E5E5E5";}


		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codmal=$codmal&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>$codmal</font></b></a></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomevend</b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datamalf</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b></font></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datastatusf</font></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$sol</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$col</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor3'>$ent</font></b></td>
			<td align='center' width='4%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor4'>
");
if ($hist <> "Y"){
echo("
<a href='$PHP_SELF?Action=delete&codmal=$codmal&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist' onclick=");echo('"return confirmLink(this, ');echo("'CANCELAR MALOTE')");echo('"');echo("><img border='0' src='images/msg_empty.png' alt='CANCELAR MALOTE' ></a>
");
}
echo("
</font></b></td>
			
			
		");
	 }

		echo("
				</table>
<br><br><BR>
					<div align='center'>
  <center>
  <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber1'>
    <tr>
      <td width='50%'><font size='1' face='Verdana'><b><a name='legenda'></a>
      Legenda : </b></font>
            <ul>
              <li><font size='1' face='Verdana'><b>SOL</b> - Solicitação do
                motorista para a entrega do malote.</font></li>
              <li><font size='1' face='Verdana'><b>COL</b> - Malote coletado na
                transportadora.</font></li>
              <li><font size='1' face='Verdana'><b>ENT</b> - Malote entregue na
                Ipasoft.</font></li>
              <li><font size='1' face='Verdana'><img border='0' src='images/msg_empty.png' alt='APAGAR MALOTE' > - CANCELAR
                solicitação de malote.</font></li>
            </ul>
          </td>
      <td width='50%'><font size='1' face='Verdana'><b>Legenda
            Cores: </b></font>
            <ul>
              <li><font size='1' face='Verdana'><b><font color='#FFCC66'>LARANJA</font></b>
                - Novo pedido de malote</font></li>
              <li><font size='1' face='Verdana'><b><font color='#66CC00'>VERDE</font></b>
                - Motorista Solicitado.</font></li>
              <li><font size='1' face='Verdana'><b><font color='#99CCFF'>AZUL</font>&nbsp;</b>
                - A coleta foi feita pelo motorista</font></li>
              <li><font size='1' face='Verdana'><b><font color='#FF0000'>VERMELHO</font></b>
                - O campo <b>SOL</b> não foi marcado.</font></li>
            </ul>
          </td>
    </tr>
  </table>
  </center>
</div>

		");


#}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
