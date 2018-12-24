

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataprevent DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "EXPEDIÇÃO";
$subtitulo = "PEDIDO";

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
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}
		#if ($codempvend <> 0){$codempselect = $codempvend;}
			$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":
    /*

		if ($statuspeds <> "ESCOLHA"){

		

			// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");

			// MODIFICAÇÂO DO PEDIDO
			$prod->listProdU("modped","pedido", "codped=$codped");
			$modped = $prod->showcampo0();

			if (count($array614) == 0){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($statuspeds);
				$prod->setcampo4($login);

				$prod->addProd("pedidostatus", $ureg);

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);

					$prod->listProd("pedido", "codped=$codped");
					$status_ped = $prod->showcampo14();
					if ($status_ped == "ENTR"){
						$prod->setcampo15(1);  // HISTORICO
					}
					$prod->setcampo44("NO"); // MODIFICAÇÃO - PEDIDO
					$prod->upProd("pedido", "codped=$codped");

				}

				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo14($statuspeds);
				$prod->setcampo32($dataatual);
				
				$prod->upProd("pedido", "codped=$codped");

			}else{

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);

					$prod->listProd("pedido", "codped=$codped");
					$status_ped = $prod->showcampo14();
					if ($status_ped == "ENTR"){
						$prod->setcampo15(1);  // HISTORICO
					}
					$prod->setcampo44("NO"); // MODIFICAÇÃO - PEDIDO
					$prod->upProd("pedido", "codped=$codped");
				}

			}
		}

		
		$Actionsec = "list";
        */
        break;
        
     case "ins_oco":
   
   
            if ($codocoselect){
           // ATUALIZA STATUS DA TABELA
            $prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($codocoselect);
			$prod->setcampo2($codped);
			$prod->setcampo3($dataatual);
			$prod->setcampo4($login);

			$prod->addProd("pedido_ocorrencia_list", $ureg);
			}

		#$Actionsec="list";
		$Action = "update";

		 break;
		 
	  case "ins_desp":

            if ($codtranspselect <> "" and $chkdesp == 1){

           	// MODIFICAÇÂO DO PEDIDO
			$prod->listProdU("modped, status","pedido", "codped=$codped");
			$modped = $prod->showcampo0();
			$status_ped = $prod->showcampo1();
			
                if ($modped == 'OK'){

                    // ATUALIZA STATUS DA TABELA
                    $prod->clear();
    	      		$prod->setcampo0("");
    	       		$prod->setcampo1($codped);
                    $prod->setcampo2($dataatual);
            		$prod->setcampo3("DESP MOD");
    		      	$prod->setcampo4($login);
    		      	$prod->addProd("pedidostatus", $ureg);
    		      	
    		      	$condicao_up .= "modped = 'NO', "; // MODIFICAÇÃO - PEDIDO

                }

                     // ATUALIZA STATUS DA TABELA
                    $prod->clear();
        			$prod->setcampo0("");
        			$prod->setcampo1($codped);
        			$prod->setcampo2($dataatual);
        			$prod->setcampo3("DESP");
        			$prod->setcampo4($login);
        			$prod->addProd("pedidostatus", $ureg);

            
         	$condicao_up .= "status = 'DESP', ";
         	$condicao_up .= "codtransp = '$codtranspselect', ";
         	$condicao_up .= "datasaidaest = '$dataatual' ";

			$prod->upProdU("pedido", $condicao_up, "codped=$codped");
			

                $Actionsec="list";
            }else{
                $Action = "update";
            }

  
		 
		 case "ins_lib":

            if ($chklib == 1){

           	// MODIFICAÇÂO DO PEDIDO
			$prod->listProdU("modped, status","pedido", "codped=$codped");
			$modped = $prod->showcampo0();
			$status_ped = $prod->showcampo1();
			


                    // ATUALIZA STATUS DA TABELA
                    $prod->clear();
        			$prod->setcampo0("");
        			$prod->setcampo1($codped);
        			$prod->setcampo2($dataatual);
        			$prod->setcampo3("LIB RETORNO");
        			$prod->setcampo4($login);
        			$prod->addProd("pedidostatus", $ureg);


         	$condicao_up .= "status = 'LIB', ";
         	$condicao_up .= "datasaidaest = '0000-00-00 00:00:00' ";

			$prod->upProdU("pedido", $condicao_up, "codped=$codped");


                $Actionsec="list";
            }else{
                $Action = "update";
            }
            
             break;
             
        case "ins_entr":

            if ($chkentr == 1){

           	// MODIFICAÇÂO DO PEDIDO
			$prod->listProdU("modped, status","pedido", "codped=$codped");
			$modped = $prod->showcampo0();
			$status_ped = $prod->showcampo1();
			
			  if ($modped == 'OK'){

                    // ATUALIZA STATUS DA TABELA
                    $prod->clear();
    	      		$prod->setcampo0("");
    	       		$prod->setcampo1($codped);
                    $prod->setcampo2($dataatual);
            		$prod->setcampo3("ENTR MOD");
    		      	$prod->setcampo4($login);
    		      	$prod->addProd("pedidostatus", $ureg);

    		      	$condicao_up .= "modped = 'NO', "; // MODIFICAÇÃO - PEDIDO

                }

                    // ATUALIZA STATUS DA TABELA
                    $prod->clear();
        			$prod->setcampo0("");
        			$prod->setcampo1($codped);
        			$prod->setcampo2($dataatual);
        			$prod->setcampo3("ENTR");
        			$prod->setcampo4($login);
        			$prod->addProd("pedidostatus", $ureg);


         	$condicao_up .= "status = 'ENTR', ";
            #$condicao_up .= "hist = '1', ";
            if ($modped == 'NO' and $status_ped <> 'ENTR'){
             	$condicao_up .= "datainst_ini = '$data_inst_ini', ";
             	$condicao_up .= "datainst_fim = '$data_inst_fim', ";
             	$condicao_up .= "obsinst = '$obsinst', ";
             	$condicao_up .= "dataentrega = '$data_entr', ";
            }
            $condicao_up .= "fichaentr = 'OK' ";
            $prod->upProdU("pedido", $condicao_up, "codped=$codped");


                $Actionsec="list";
            }else{
                $Action = "update";
            }

             break;
             
      case "update":

		#$Actionsec="list";


		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":

		 /*

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
		*/
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$nomevendselect1 = strtolower($nomevendselect);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$condicao2 = " LCASE(clientenovo.$campopesq) like '%$palavrachave1%' AND ";
		$condicao5 = " LCASE(vendedor.$campopesq) like '%$nomevendselect1%' AND ";
	
        if ($pedlib =="OK"){
#           $condicao4 .= " ((pedido.status = 'LIB' or (pedido.modped = 'OK' and pedido.cb = 'OK')) and pedido.libentr = 'OK' and (pedido.fat = 'NO' OR pedido.caixa = 'OK') and (pedido.contrato = 'OK' or  pedido.contrato = 'EP' or  pedido.contrato = 'DC' )) )  and";

            $condicao4 = " ((pedido.status = 'LIB' or (pedido.modped = 'OK' and pedido.cb = 'OK')) and pedido.fat = 'OK' and pedido.caixa = 'OK' and (pedido.contrato = 'OK' or  pedido.contrato = 'EP' or  pedido.contrato = 'DC' ) or ";
            $condicao4 .= " (pedido.status = 'LIB' and pedido.libentr = 'OK') or ";
            $condicao4 .= " ((pedido.status = 'LIB' or (pedido.modped = 'OK' and pedido.cb = 'OK')) and pedido.caixa = 'OK' and (pedido.contrato = 'OK' or  pedido.contrato = 'EP' or  pedido.contrato = 'DC' )) )  and";
		}else{
			$condicao4 = " (pedido.status = 'LIB' or pedido.status = 'DESP' or (pedido.modped = 'OK' and pedido.cb = 'OK')) AND ";
		}

        	$condicao3 = $condicao4;

		//PESQUISA POR NOME CLIENTE
		if ($palavrachave){

			$condicao3 .= $condicao2;
		}

		//PESQUISA POR NOME VENDEDOR
		if ($nomevendselect){

			$condicao3 .= $condicao5;
		}

		//PESQUISA POR CODBARRA
		if ($codpedpesq){

			$condicao3 .= " pedido.codbarra='$codpedpesq' and";
		}


				$condicao3 .= " pedido.codemp='$codempselect'";
				#$condicao3 .= " and pedido.hist = '$hist'  ";
				$condicao3 .= " and pedido.codcliente=clientenovo.codcliente ";
				$condicao3 .= " and pedido.codvend=vendedor.codvend ";

		break;


		
		}

		#echo("$condicao3");
		
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome, vendedor.nome, fat, modped, modoentr, dataprevent_old, aguard_comp, declara, prontaentr, modelo_ped, ped_transf", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, $parm );

		
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
		$dataprevent_old = $prod->showcampo48();
		$dataprevent_oldf  = $prod->fdata($dataprevent_old);
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
		$conf_fpg = $prod->showcampo51();
		$aguard_comp = $prod->showcampo52();
		$declara = $prod->showcampo67();
		$status_ped = $prod->showcampo14();
		$modped = $prod->showcampo44();
		$codtransp = $prod->showcampo69();
	
			
	
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
		$xnumero = $prod->showcampo90();
    		$xcomplemento = $prod->showcampo91();

	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProd("vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo1();
		
//  INICIO - INICIO DA PARTE DE IMPRESSAO ///


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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pedlib=$pedlib'><img border='0' src='images/bt-continuaped.gif' ><br>
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

if ($impressao == 1){
	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);

echo("
<body bgcolor='#FFFFFF'>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='50%'><img border='0' src='images/grupoipa.gif' width='200' height='85'><br>
      <b><font face='Verdana' size='4'>Ficha de Entrega</font></b></td>
    </center>
    <td width='50%'>
      <p align='right'><b><font size='1' face='Verdana' color='#800000'>DATA 
      EMISSÃO<br>
      </font></b><font size='1' face='Verdana'>$datainstf<br>
      </font> <p align='right'><img src='barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
  </tr>
  </table>
</div>
	<br>
	

	

");

}


echo("

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 
  <script src='calendar.js' type='text/javascript' language='javascript'></script>
<div align='center'>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
	 

    <tr>
      <td width='50%' bgcolor='#000000'>
        <p align='left'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PEDIDO:
        </b></font><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
      <center>
      <td width='50%' bgcolor='#000000'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='1'><b>VENDEDOR PEDIDO</b></font><font size='1'><b><font color='#86ACB5' face='Verdana, Arial, Helvetica, sans-serif'>:</font><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><br>
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
        </b><font color='#000000'>$xendereco - $xnumero - $xcomplemento - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
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
      <td width='540' colspan='2' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS ENTREGA</b></font></td>
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
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datapreventf - $horaprevent</font><BR>
		 <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PREVISÃO
        ENTREGA ORIGINAL:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dataprevent_oldf</font></td>
    </tr>
    
      <tr>
      <td width='228' bgcolor='#F0F0F0' valign='top' colspan ='2'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS PARA
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsentrega</font></td>
	
    </tr>
    
    </table>
  </center>
</div>

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 


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
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'></font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONTATO DO VENDEDOR COM O CLIENTE</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

      <tr bgColor='#BB1D0B'>
        <td width='20%'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          CONTATO</b></font></td>
        <td width='65%'><font face='Verdana' color='#ffffff' size='1'><b>DESCR.</b></font></td>
		<td width='15%'><font face='Verdana' color='#ffffff' size='1'><b>LOGIN</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("pedido_contato", "codped=$codped", $array612, $array_campo612 , "order by datacontato");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$modpor = $prod->showcampo4();
			$datastatusf = $prod->fdata($datastatus);


echo("
      <tr bgColor='#FDE2DF'>
        <td width='20%'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='65%'><font face='Verdana' size='1'><b>$statusped</b></font></td>
		<td width='15%'><font face='Verdana' size='1'><b>$modpor</b></font></td>
      </tr>
");		
	}
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
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>

<br>

<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='2%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='88%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>QTDE</b></font></td>
	
    
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>MICROCOMPUTADORES</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO DE PRODUTOS UNITARIOS
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
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			
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

			if ($tipocj <> $contcjshow){
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><hr size='0'><td>
		<tr>
				");
		$contcjshow++;
		}

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='2%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><img border='0' src='images/quadrado.gif'></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprodcj </b></font></td>
    <td width='48%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	
    
  </tr>
		
  ");

	$ptotal = $ptotal + $put;
		}
	}
	$ku=$k;
	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");

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

			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

echo(" 
	
  <tr bgcolor='#F2E4C4'>
	<td width='2%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><img border='0' src='images/quadrado.gif'></font></td>
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#8000000'><b>$nomeprodcj </b></font></td>
    <td width='48%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	$nomeprod</font></td>

    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	
	  </tr>
		
  ");

	$ptotal = $ptotal + $put;

		}
	 }

}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=4><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotal = number_format($ptotal,2,',','.'); 

 $ku=$ku+1;
	
	
echo("

");


//  FIM - FIM DA PARTE DE IMPRESSAO ///

if ($impressao <> 1 ):




echo("


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
      <td width='1028' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. LIBERAÇÃO DE CRÉDITO</font></b></td>
    </tr>
    
    <tr>
      <td width='24' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='508' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$notafin</font></b></td>
    </tr>
    
    </table>
  </center>
</div>
<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        III</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOTA FISCAL</font></b></td>
    </tr>
  </tbody>
</table>
<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='550' border='0'>

       <tr bgColor='#86acb5'>
        <td width='12%'><font face='Verdana' color='#ffffff' size='1'><b>TIPO</b></font></td>
        <td width='28%'><b><font color='#ffffff' size='1' face='Verdana'>DATA NOTA </font></b></td>
        <td width='38%'><font face='Verdana' color='#ffffff' size='1'><b>NUMERO NOTA </b></font></td>
        <td width='22%'><font face='Verdana' color='#ffffff' size='1'><b>VALOR</b></font></td>
	  </tr>
");

	$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$numnf = $prod->showcampo2();
			$valornf = $prod->showcampo3();
			$tiponf = $prod->showcampo4();
			$datanf = $prod->showcampo5();
			
			$datanf = $prod->fdata($datanf);
		
			
			$valornff = number_format($valornf,2,',','.'); 
			

echo("
    <tr bgColor='#f3f8fa'>
	  	  <td width='12%'><font face='Verdana' size='1'><b>$tiponf</b></font></td>
          <td width='28%'><font face='Verdana' size='1'><b>$datanf</b></font></td>
          <td width='38%'><font face='Verdana' size='1'><b>$numnf</b></font></td>
		  <td width='22%'><font face='Verdana' size='1'><b>R$ </b>$valornff</font></td>
	  </tr>
");		
	}
echo("
  </table>
 
<br>

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
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>V</font>
        - MODIFICAÇÃO DO PEDIDO</font></b></td>
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

	$prod->listProdgeral("pedidomod", "codped=$codped", $array612, $array_campo612 , "order by datamod");
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

			$prod->clear();
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj_mod");
			$nomeprodcj_mod = $prod->showcampo0();

		$codbarra_troca = "";
		if ($codcb_mod <> ""){
			
			$codcb_array = explode(":", $codcb_mod);

		   for($y = 0; $y < count($codcb_array); $y++ ){

			$prod->clear();
			$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$y]");
			$codbarra_mod = $prod->showcampo0();

					if ($y == 0){
						$codbarra_troca = $codbarra_mod;
					}else{
						$codbarra_troca .= ", ".$codbarra_mod;
					}

			}
		}
			
	echo("
     <tr bgColor='#F2E4C4'>
        <td width='86' ><font face='Verdana' size='1'>$datamodf</font></td>
        <td width='263' ><font face='Verdana' size='1'><b>$nomeprod_mod<br>
          </b>$nomeprodcj_mod - $tipocj_mod</font></td>
        <td width='44' ><font face='Verdana' size='1'>$qtde_mod</font></td>
        <td width='100' ><font face='Verdana' size='1'>$codbarra_troca</font></td>
        <td width='80'><font face='Verdana' size='1'><b>$statusmod</b></font></td>
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

");


if ($contrato == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($contrato == "EP"){$cor1 ="#FF6600";}
if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}



echo("

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%' colspan='4'>
        <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: CONTRATO: <font color='$cor1'>$contrato</font></b></font></td>
      <td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: LIB. ENTREGA: <font color='$cor2'>$libentr</font></b></font></td>
      <td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: FATURADO: </b></font><font size='1' face='Verdana' color='$cor3'><b>$fat</b></font></td> 
	<td width='25%'>
        <p align='center'><font size='1' face='Verdana'><b>:: PAGO: <font color='$cor4'>$caixa</font></b></font></td>
    </tr>
  </table>
  </center>
</div>

	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>

<table width='555' border='0' align='center' cellpadding='1' cellspacing='1'>
  <tr>
    <td><table width='100%'  border='0' cellspacing='1' cellpadding='1'>
        <form action='gerafrete.php?codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg'' name='form1' method='post' target='_blank'>
          <tr align='left' bgcolor='#999999'>
            <td colspan='2' valign='top'><strong>IMPRESS&Atilde;O</strong></td>
          </tr>
          <tr>
            <td width='20%' align='right' valign='top'><strong>ETIQUETAS:</strong></td>
            <td align='left'> VOLUMES:<br>
                <input name='numvol' type='text' size='10' maxlength='10'>
                <input type='submit' name='Submit' value='OK'></td>
          </tr>
          <tr>
            <td align='right' valign='top'><strong>CHECKLIST: </strong></td>
            <td align='left'><a href='");echo"".DIR_SISTEMA."/".DIR_MODULOS."/"."modulo_relatorios/"; echo("start_relatorio_page_checklist_entrega.php?Action=pesquisa&codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg' target='_blank'><img src='images/bt_checklist_install.gif' width='130' height='30' border='0'></a></td>
          </tr>
        </form>
      </table>
      <table width='100%'  border='0' cellspacing='2' cellpadding='2'>
        <tr>
          <td width='20%' align='center'>&nbsp;</td>
          <td width='11' align='center'>&nbsp;</td>
        </tr>
      </table>
      <table width='100%'  border='0' cellspacing='1' cellpadding='1'>
        <form action='$PHP_SELF?Action=ins_oco&codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg' name='form2' method='post' >
          <tr align='left' bgcolor='#FFFF99'>
            <td colspan='2' valign='top'><strong>OCORR&Ecirc;NCIAS NA ENTREGA </strong></td>
          </tr>
          <tr bgcolor='#FFFFCC'>
            <td width='20%' align='right' valign='top'><strong>OCORR&Ecirc;NCIAS:</strong></td>
            <td align='left'><select name='codocoselect' id='codocoselect'>
");
            $prod->clear();
            $prod->listProdSum("codoco, ocorrencia","pedido_ocorrencia", "hist<>'S' and tipo = 'ENTR'", $array6, $array_campo6 , "order by ocorrencia");
	for($j = 0; $j < count($array6); $j++ ){

			$prod->mostraProd( $array6, $array_campo6, $j );

			$codoco_list = $prod->showcampo0();
			$ocorrencia_list = $prod->showcampo1();
			echo("

		<option value='$codoco_list'>$ocorrencia_list</option>
		");

}
	echo("
		<option value='' selected>Escolha a Ocorrência</option>
             </select>
                <input type='submit' name='Submit' value='OK'></td>
          </tr>
          <tr bgcolor='#FFFFCC'>
            <td align='right' valign='top' bgcolor='#FFFFCC'>&nbsp;</td>
            <td align='left' bgcolor='#FFFFFF'><table width='100%'  border='0' cellspacing='1' cellpadding='0'>
            ");
            $prod->clear();
            $prod->listProdSum("dataoco, codoco","pedido_ocorrencia_list", "codped = $codped ", $array6, $array_campo6 , "order by dataoco");
	for($j = 0; $j < count($array6); $j++ ){

			$prod->mostraProd( $array6, $array_campo6, $j );

			$dataoco_list1 = $prod->showcampo0();
			$codoco_list1 = $prod->showcampo1();

            $prod->clear();
			$prod->listProdU("ocorrencia","pedido_ocorrencia", "codoco='$codoco_list1'");
    		$ocorrencia_list1 = $prod->showcampo0();

			echo("

	  <tr bgcolor='#FFFFCC'>
                  <td width='10%' align='center'><img src='images/seta_laranja.gif' width='11' height='9'></td>
                  <td width='30%'>$dataoco_list1</td>
                  <td width='60%'><strong>$ocorrencia_list1</strong></td>
                </tr>
		");

}
	echo("
            </table></td>
          </tr>
        </form>
      </table>
 ");
 
 // PROCESSO DE DESPACHO
 if ($status_ped == 'LIB'){
 echo("
      <table width='100%'  border='0' cellspacing='2' cellpadding='2'>
        <form action='$PHP_SELF?Action=ins_desp&codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg' name='form3' method='post' >
          <tr align='left' bgcolor='#FFCC66'>
            <td colspan='2'><strong>PROCEDIMENTO DE DESPACHO<br>
            </strong>O status do pedido mudar&aacute; para DESP quando o campo DESPACHAR PEDIDO for marcado. </td>
          </tr>
          <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'><strong>TRANPORTADORA:</strong></td>
            <td align='left'><select name='codtranspselect' id='codtranspselect'>
");
            $prod->clear();
            $prod->listProdSum("codtransp, nome","transportadora", "hist<>'S'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){

			$prod->mostraProd( $array6, $array_campo6, $j );

			$codtransp_list = $prod->showcampo0();
			$nome_list = $prod->showcampo1();
			echo("

		<option value='$codtransp_list'>$nome_list</option>
		");

}
	echo("
		<option value='' selected>Escolha a Transportadora</option>
             </select></td>
          </tr>
          <tr bgcolor='#FFEBCC'>
            <td width='20%' align='right' valign='top'>&nbsp;</td>
            <td align='left'><input name='chkdesp' type='checkbox' id='chkdesp' value='1'>
        DESPACHAR PEDIDO ( STATUS <strong>DESP</strong> ) </td>
          </tr>
          <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'>&nbsp;</td>
            <td align='left'>
");
if ($aguard_comp == "OK"){$aguard ="PEDIDO AGUARDANDO COMPENSAÇÃO";}else{$aguard ="";}
#if ($declara == "EP"){$declara_info ="PEDIDO AGUARDANDO DECLARAÇÃO";}else{$declara_info ="";}
#if ($libentr == "OK" and $aguard_comp <> "OK" and ($declara == 'OK' or $declara == 'DD')){
if ($libentr == "OK" and $aguard_comp <> "OK" ){
echo("

            <input type='submit' name='Submit' value='OK'>
");
}else{
echo"
<font face='Verdana' size='1' color='#FF0000'><b>$aguard</b></font><BR>
<font face='Verdana' size='1' color='#FF0000'><b>$declara_info</b></font>
";
}
echo("
            </td>
            
          </tr>
          	<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
        </form>
      </table>
");
}else{

echo("
<table width='100%'  border='0' cellspacing='2' cellpadding='2'>
        <form action='$PHP_SELF?Action=ins_desp&codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg' name='form3' method='post' >
          <tr align='left' bgcolor='#FFCC66'>
            <td colspan='2'><strong>PROCEDIMENTO DE DESPACHO<br>
            </strong>O status do pedido mudar&aacute; para DESP quando o campo DESPACHAR PEDIDO for marcado. </td>
          </tr>
          <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top' width = '50%'><strong>TRANPORTADORA:</strong></td>
            <td align='left'>
");

            $prod->clear();
            $prod->listProdU("codtransp, nome, instalacao","transportadora", "codtransp = '$codtransp'");
	       	$codtransp_list = $prod->showcampo0();
			$nome_list = $prod->showcampo1();
			$install_list = $prod->showcampo2();
			
echo("
<font face='Verdana' size='1' color='#FF0000'><b>$codtransp_list - $nome_list</b></font><BR>
	
</td>
          </tr>
         
          
        </form>
      </table>
");

}

 // PROCESSO DE ENTREGA
 if ($status_ped == 'DESP' or ($status_ped == 'ENTR' and $modped == 'OK')){

 if ($modped == 'OK'){$install_list = "N";}

echo("
      <table width='100%'  border='0' cellspacing='2' cellpadding='2'>
        <form action='$PHP_SELF?Action=ins_entr&codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg' name='form4' method='post' >
          <tr align='left'>
            <td colspan='2' valign='top' bgcolor='#FFCC66'><strong>PROCEDIMENTO DE ENTREGA<br>
            </strong>Ap&oacute;s o recebimento da FICHA DE ENTREGA o respons&aacute;vel deve preencher os dados abaixo.</td>
          </tr>
");
if ($install_list == "S"){
  echo("
           <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'><strong>INSTALA&Ccedil;&Atilde;O:</strong></td>
            <td align='left'>DATA INÍCIO<br><input name='data_inst_ini' type='text' id='data_inst_ini' size='20' onfocus = 'javascript:blur()'> <a href=\"javascript:openCalendar('pg=$pg', 'form4', 'data_inst_ini', 'datetime')\"><img src='images/b_calendar.png' width='16' height='16' border='0'></a></td>
          </tr>
           <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'><strong></strong></td>
            <td align='left'>DATA T&Eacute;RMINO<br><input name='data_inst_fim' type='text' id='data_inst_fim' size='20' onfocus = 'javascript:blur()'> <a href=\"javascript:openCalendar('pg=$pg', 'form4', 'data_inst_fim', 'datetime')\"><img src='images/b_calendar.png' width='16' height='16' border='0'></a></td>
          </tr>
");
}

echo("
          <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'><strong>OBS:</strong></td>
            <td align='left'><input name='obsinst' type='text' id='obsinst' size='50' > </td>
          </tr>

          <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'>&nbsp;</td>
            <td align='left'><input name='chkentr' type='checkbox' id='chkentr' value='1'>
        PEDIDO ENTREGUE ( STATUS <strong>ENTR</strong> ) </td>
          </tr>
 
          <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'><strong>DATA ENTREGA:</strong></td>
            <td align='left'><input name='data_entr' type='text' id='data_entr' size='20' onfocus = 'javascript:blur()'> <a href=\"javascript:openCalendar('pg=$pg', 'form4', 'data_entr', 'datetime')\"><img src='images/b_calendar.png' width='16' height='16' border='0'></a></td>
          </tr>

 
         <tr bgcolor='#FFEBCC'>
            <td align='right' valign='top'>&nbsp;</td>
            <td align='left'><input type='submit' name='Submit' value='OK'></td>
          </tr>
          	<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
        </form>
      </table>
");
}
 // PROCESSO DE RETORNO PARA A EXPEDICAO
 if ($status_ped == 'DESP' ){
echo("
      <table width='100%'  border='0' cellspacing='2' cellpadding='2'>
        <form action='$PHP_SELF?Action=ins_lib&codped=$codped&retlogin=$retlogin&connectok=$connectok&pg=$pg' name='form5' method='post' >
          <tr align='left' bgcolor='#999999'>
            <td colspan='2' valign='top'><strong>RETORNO DO PEDIDO PARA A EXPEDI&Ccedil;&Atilde;O<br>
            </strong>Os produtos n&atilde;o puderam ser entregue.</td>
          </tr>
          <tr bgcolor='#CCCCCC'>
            <td width='20%' align='right' valign='top'>&nbsp;</td>
            <td align='left'><input name='chklib' type='checkbox' id='chklib' value='1'>
        PEDIDO RETORNOU A EXPEDI&Ccedil;&Atilde;O ( STATUS <strong>LIB</strong> ) </td>
          </tr>
          <tr bgcolor='#CCCCCC'>
            <td align='right' valign='top'>&nbsp;</td>
            <td align='left'><input type='submit' name='Submit' value='OK'></td>
          </tr>
          	<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
        </form>
    </table></td>
  </tr>
</table>
");
}
echo("

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

<!--
<form method='POST' action='$PHP_SELF?Action=insert'  name='Form'>
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ALTERAR STATUS</b></font></td>
        <td width='554'>
  <select size='1' class=drpdwn name='statuspeds'>
       ");
if ($aguard_comp == "OK"){$aguard ="PEDIDO AGUARDANDO COMPENSAÇÃO";}else{$aguard ="";}
if ($declara == "EP"){$declara_info ="PEDIDO AGUARDANDO DECLARAÇÃO";}else{$declara_info ="";}
if ($libentr == "OK" and $aguard_comp <> "OK" and ($declara == 'OK' or $declara == 'DD')){

echo("
		<option value='DESP'>DESP</option>
");
}

echo("

		<option selected>ESCOLHA</option>
		
						  </select>
  


            </td>
        <td width='55' rowspan='2'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'></td>
        <td width='554'><font face='Verdana' size='1' color='#FF0000'><b>$aguard</b></font>
  

            </td>
      </tr>
       <tr bgColor='#f3f8fa'>
        <td width='186'></td>
        <td width='554'><font face='Verdana' size='1' color='#FF0000'><b>$declara_info</b></font>


            </td>
      </tr>
    </table>
    </center>
  </div>
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
        <input type='hidden' name='palavrachave' value='$palavrachave'>
		<input type='hidden' name='pagina' value='$pagina'>
		<input type='hidden' name='codped' value='$codped'>
		<input type='hidden' name='codempselect' value='$codemp'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
</form>

-->
<br><BR>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        IV</font>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
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

	$prod->listProdgeral("pedidostatus", "codped=$codped", $array612, $array_campo612 , "order by datastatus");
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
// FIM - PARTE NAO IMPRIMIVEL

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
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		VENDEDOR: <input type='text' name='nomevendselect' size='20'><br>LIBERADOS PARA EXPEDIR:<input type='checkbox' name='pedlib' value='OK'></font>
		
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
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&pedlib=$pedlib'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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


	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='18%' height='0'> 
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
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CX</font></b></div>
    </td>
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataped = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$contrato = $prod->showcampo8();
			$libentr = $prod->showcampo9();
			$codbarra = $prod->showcampo10();
			$caixa = $prod->showcampo11();
			$nomecliente = $prod->showcampo12();
			$nomevend = $prod->showcampo13();
			$fat = $prod->showcampo14();
			$modped = $prod->showcampo15();
			$modoentr = $prod->showcampo16();
			$dataprevent_old = $prod->showcampo17();
			$aguard_comp = $prod->showcampo18();
        	$declara = $prod->showcampo19();
			$pronta = $prod->showcampo20();
			$modelo_ped = $prod->showcampo21();
			$ped_transf = $prod->showcampo22();

			// FORMATACAO //
			$datapedf = $prod->fdata($dataped);
			$datapreventf = $prod->fdata($dataprevent);
			$dataprevent_olff = $prod->fdata($dataprevent_old);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataatual,$dataprevent);
			
			//VERIFICA SE TODAS AS PARCELAS SAO FAT
			$prod->listProdSum("COUNT(*) as fat", "pedidoparcelas, formapg", "codped=$codped and tipoparc ='FT' and pedidoparcelas.tipo = formapg.opcaixa", $array613, $array_campo613, "order by datavenc" );
			$prod->mostraProd( $array613, $array_campo613, 0 );
			$numparcfat = $prod->showcampo0();

			if ($numparcfat <> 0){$descfat="FAT";}else{$descfat="";}
			
			$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();

			$bgcorlinha="#E5E5E5";
			if ($status == "AVAL"){$bgcorlinha="#FFCC66";}
			if ($status == "APROV"){$bgcorlinha="#CFFCC7";}
			if ($status == "PECA"){$bgcorlinha="#D6B778";}
			if ($status == "PROD"){$bgcorlinha="#F2E4C4";}
			if ($status == "LIB"){$bgcorlinha="#EDE763";}
			if ($status == "DESP"){$bgcorlinha="#339966";}
			if ($status == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}

if ($aguard_comp == "OK"){$aguard ="AGUARDA<br>COMPENSAÇÃO";}else{$aguard ="";}
#if ($declara == "EP"){$declara_info ="AGUARDA<br>DECLARAÇÃO";}else{$declara_info ="";}
if ($contrato == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($contrato == "EP"){$cor1 ="#FF6600";}
if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}
if ($modped == "OK"){$mod ="MOD";}else{$mod="";}
if ($modoentr == "MOTOBOY"){$moto ="MOTOBOY";}else{$moto="";}
if ($pronta == "OK" ){$pronta_logo = "<IMG SRC='images/prontap.png'  BORDER=0 >";}else{$pronta_logo="";}

$ped_ata = "";
if ($modelo_ped == "ATA"){$cor7 ="#008000";$ped_ata = "ATACADO";}
if ($modelo_ped == "DST"){$cor7 ="#008000";$ped_ata = "DISTRIBUIDOR";}
if ($modelo_ped == "DSTE"){$cor7 ="#008000";$ped_ata = "DISTRIBUIDOR ESP";}
if ($modelo_ped == "RDST"){$cor7 ="#008000";$ped_ata = "FAT REVENDA";}
if ($modelo_ped == "RDD"){$cor7 ="#008000";$ped_ata = "FAT DIRETO";}
if ($ped_transf == "OK"){$cor8 ="#008000";$ped_transf = "TRANSF";}else{$ped_transf = "";}

		if ($dataprevent <> $dataprevent_old){$cor45 = "#FF0000";}else{$cor45 = "#000000";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pedlib=$pedlib'>$codbarra</b></a><br>$descfat<br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'>$aguard</font><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#008000'><b>$declara_info</b></font></font></td>
			<td width='18%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend<br><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor7'>$ped_ata</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor8'>$ped_transf</font></b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color ='$cor45'>$datapreventf<br>$horaprevent <br><b>$moto</b></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br>$mod<BR>$pronta_logo</font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$contrato</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$libentr</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor3'>$fat</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor4'>$caixa</font></b></td>
			
			
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
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pedlib=$pedlib";
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ include ("sif-rodape.php");}


}

?>
       
