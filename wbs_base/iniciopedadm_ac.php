 

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
$titulo = "APROVAÇÃO DE CRÉDITO";
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

		// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='iniciopedtroca.php'");
		$pgtroca = $prod->showcampo0();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		//VERIFICA SE TODOS OS CODBARRAS FORAM INSERIDOS
		$prod->listProdSum("COUNT(*) as cbok", "pedidoprod", "codped = $codped and codcb <> ''", $array613, $array_campo613, "" );
		$prod->mostraProd( $array613, $array_campo613, 0 );
		$numcbok = $prod->showcampo0();

		if ($numcbok <> 0 and $statuspeds == "REPR"){ 

			$Actionter = "lock";
			$prod->msggeral("Este pedido não poderá ser REPROVADO, algum produto já foi retirado do estoque, é necessário CANCELAR o mesmo.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);

	
		}else{
			
		if ($statuspeds <> 1){

			//PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");

			if (count($array614) == 0){

				$dataatual = $prod->gdata();

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($statuspeds);
				$prod->setcampo4($login);
					
				$prod->addProd("pedidostatus", $ureg);

				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$prod->setcampo14($statuspeds);
				$prod->setcampo26($obsac);
				$serasa = htmlentities($serasa, ENT_QUOTES);
				$prod->setcampo37($serasa);
				$prod->setcampo52($aguard_compselect); // AGUARDA COMPENSACAO DE PAGAMENTO
				if ($statuspeds == "REPR"){
				$prod->setcampo13($dataatual);
				$prod->setcampo15(1);  // HISTORICO
				$prod->setcampo40("OK");  // CANCEL - TOTAL
				$prod->setcampo41("OK");  // CANCEL - ESTOQUE
				$prod->setcampo42("OK");  // CANCEL - FINANCEIRO
				$prod->setcampo43("OK");  // CANCEL - FATURAMENTO

				}

				$prod->upProdPed("pedido", "codped=$codped");


				// ATUALIZA ESTOQUE
				if ($statuspeds == "REPR"){

				$prod->listProdgeral("pedidoprod", "codped=$codped", $array99, $array_campo99 , "");

					for($i = 0; $i < count($array99); $i++ ){

						$prod->mostraProd( $array99, $array_campo99, $i );

						$codprodped = $prod->showcampo2();
						$qtdeped = $prod->showcampo3();

						// ATUALIZA ESTOQUE
						$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodped");
						
						$reserva = $prod->showcampo4();

						$reservanovo = $reserva - $qtdeped;
						$prod->setcampo4($reservanovo);
						
						$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprodped");
					}
				} // ESTOQUE


			}

		}else{

				// ATUALIZA OUTROS DADOS DO PEDIDO
				
				$serasa = htmlentities($serasa, ENT_QUOTES);				
				$prod->upProdU("pedido","serasa = '$serasa', aguard_comp = '$aguard_compselect', obsapcredito = '$obsac'", "codped='$codped'");

		} //ESCOLHA
		
		
		} // CB JA INSERIDO
		
		$Actionsec = "list";
        break;

		case "insertreaval":


		// INSERE PARCELAS NO BANCO DE DADOS
			$prod->clear();
			$numreg1 = $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array43, $array_campo43, "order by datavenc" );
			for($i = 0; $i < $numreg1; $i++ ){
				$prod->mostraProd( $array43, $array_campo43, $i );
				$tipoopcaixa= $prod->showcampo4();
				$vp= $prod->showcampo3();
				$datavenc= $prod->showcampo2();

				$string_md5 .= $datavenc.$tipoopcaixa.$vp;

			}//FOR

			#echo("$string_md5");
			// GERA MD5 DAS PARCELAS
			$md5 = $prod->geraMD5($string_md5);


		if ($statuspeds == 'REPR'){ 

		//VERIFICA SE TODOS OS CODBARRAS FORAM INSERIDOS
		$prod->listProdSum("COUNT(*) as cbok", "pedidoprod", "codped = $codped and codcb <> ''", $array613, $array_campo613, "" );
		$prod->mostraProd( $array613, $array_campo613, 0 );
		$numcbok = $prod->showcampo0();

		if ($numcbok == 0){ 
		
		if ($statuspeds <> 1){

			//PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");
			

			if (count($array614) == 0){

				$dataatual = $prod->gdata();

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($statuspeds);
				$prod->setcampo4($login);
					
				$prod->addProd("pedidostatus", $ureg);

				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				
				$prod->setcampo26($obsac);
				$serasa = htmlentities($serasa, ENT_QUOTES);
				$prod->setcampo37($serasa);
				$prod->setcampo35("NO");  // PENDENCIA DE FORMA PG
				$prod->setcampo36("NO");  // REAVALIACAO DO PEDIDO
				$prod->setcampo56($md5);
				$prod->setcampo52($aguard_compselect); // AGUARDA COMPENSACAO DE PAGAMENTO
				if ($statuspeds == "REPR"){
				$prod->setcampo14($statuspeds);
				$prod->setcampo13($dataatual);
				$prod->setcampo15(1);  // HISTORICO
				$prod->setcampo40("OK");  // CANCEL - TOTAL
				$prod->setcampo41("OK");  // CANCEL - ESTOQUE
				$prod->setcampo42("OK");  // CANCEL - FINANCEIRO
				$prod->setcampo43("OK");  // CANCEL - FATURAMENTO

				}
				

				$prod->upProd("pedido", "codped=$codped");


				// ATUALIZA ESTOQUE

				$prod->listProdgeral("pedidoprod", "codped=$codped", $array99, $array_campo99 , "");

					for($i = 0; $i < count($array99); $i++ ){

						$prod->mostraProd( $array99, $array_campo99, $i );

						$codprodped = $prod->showcampo2();
						$qtdeped = $prod->showcampo3();

						// ATUALIZA ESTOQUE
						$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodped");
						
						$reserva = $prod->showcampo4();

						$reservanovo = $reserva - $qtdeped;
						$prod->setcampo4($reservanovo);
						
						$prod->upProd("estoque", "codemp=$codempselect and codprod=$codprodped");
					}
			}

		}else{ //ESCOLHA
			
				$serasa = htmlentities($serasa, ENT_QUOTES);

				$prod->upProdU("pedido","serasa = '$serasa', aguard_comp = '$aguard_compselect', obsapcredito = '$obsac'", "codped='$codped'");

		}
		
		}else{ // CODCB SEPARADO
			
			$Actionter = "lock";
			$prod->msggeral("Este pedido não poderá ser REPROVADO, algum produto já foi retirado do estoque, é necessário CANCELAR o mesmo.", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);

		}

	
		}else{ // REAPROVAÇÃO

		// MODIFICAÇÂO DO PEDIDO
		$prod->listProdU("modped","pedido", "codped=$codped");
		$modped = $prod->showcampo0();

		if ($statuspeds <> 1){

			// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");
			

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
				}

			}else{ // 

			$prod->mostraProd( $array614, $array_campo614, 0 );
			$codpstatus = $prod->showcampo0();
				
				// ATUALIZA STATUS DA TABELA
				$prod->setcampo2($dataatual);
				$prod->setcampo4($login);

				$prod->upProd("pedidostatus", "codpstatus=$codpstatus");

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);
				}
			
			}

				// ATUALIZA OUTROS DADOS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				#$prod->setcampo14("APROV");
				$prod->setcampo26($obsac);
				$serasa = htmlentities($serasa, ENT_QUOTES);
				$prod->setcampo37($serasa);
				$prod->setcampo35("NO");  // PENDENCIA DE FORMA PG
				$prod->setcampo36("NO");  // REAVALIACAO DO PEDIDO
				$prod->setcampo56($md5);
				$prod->setcampo52($aguard_compselect); // AGUARDA COMPENSACAO DE PAGAMENTO
				$prod->upProd("pedido", "codped=$codped");

		}else{ // ESCOLHA

			$serasa = htmlentities($serasa, ENT_QUOTES);
			$prod->upProdU("pedido","serasa = '$serasa', aguard_comp = '$aguard_compselect', obsapcredito = '$obsac'", "codped='$codped'");
				
		}


		} //REAPROVACAO
		
	
		$Actionsec = "list";
        break;

    case "update":

				
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
		$Actionsec="list";
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$condicao2 = " LCASE(clientenovo.$campopesq) like '%$palavrachave1%' and ";
		$condicao5 = " LCASE(vendedor.$campopesq) like '%$nomevendpesq1%' and ";
		if ($hist == 0){
			$condicao4 = " (pedido.status='AVAL' or pedido.reavalfpg ='OK') and ";
		}else{
			$condicao4 = "  ";
		}
		
	
			$condicao3 = $condicao4;

		//PESQUISA POR NOME CLIENTE
		if ($palavrachave){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR NOME VENDEDOR
		if ($nomevendpesq){
							
			$condicao3 .= $condicao5;
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " pedido.codbarra='$codpedpesq' and";
		}

		

				#$condicao3 .= " pedido.codemp='$codempselect'";
				$condicao3 .= " pedido.hist = '$hist'  ";
				$condicao3 .= " and pedido.codcliente=clientenovo.codcliente ";
				$condicao3 .= " and pedido.codvend=vendedor.codvend ";



		


		break;


		
		}

		
		
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		#$nr= count($array);
		#echo("nr = $numreg - $nr");
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome, pendfpg, reavalfpg, fat, modped, crypt_v, crypt_m, tipo_pis, modelo_ped", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, $parm );

		
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

echo("
<script type='text/javascript' src='wbs2_novo/editor/fckeditor.js'></script>
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



");

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
		$caixa = $prod->showcampo31();
		$reavalfpg = $prod->showcampo36();
		$serasaold = $prod->showcampo37();
		$fat = $prod->showcampo39();
		$modped = $prod->showcampo44();
		$aguard_comp = $prod->showcampo52();
		$bco_ac = $prod->showcampo53();
		$numch_ac = $prod->showcampo54();
		$c3_ac = $prod->showcampo55();
		$md5_parc = $prod->showcampo56();
		$cmc7 = $prod->showcampo65();
		$mlb_real = $prod->showcampo73();
		$mlb_realf = number_format($mlb_real,2,',','.');
		
		// TIPO CLIENTE PIS
		$prod->clear();
		$prod->listProdU(" avalista ", "pedido", " codped=$codped ");
		$avalista_ok = $prod->showcampo0();
	
	
			if($control_aval == 1 and $avalista_ok ==0){$block_ap =1;}else{$block_ap =0;} 	
		
		
	
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
		
	

echo("
<script type=\"text/javascript\">
      window.onload = function()
      {
        var oFCKeditor = new FCKeditor( 'serasa' ) ;
        oFCKeditor.ToolbarSet = 'My' ;
		oFCKeditor.BasePath = 'wbs2_novo/editor/' ;
		oFCKeditor.Height = 500 ; // 400 pixels
		oFCKeditor.ReplaceTextarea() ;
      }
</script>

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
        <p align='left'><font face=' Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='4'><b>PEDIDO:
        </b></font><font face=' Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>$codbarra</font></td>
      <center>
      <td width='50%' bgcolor='#000000'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#86ACB5' size='1'><b>VENDEDOR PEDIDO:</b></font><font size='1'><b><font color='#86ACB5' face='Verdana, Arial, Helvetica, sans-serif'>:</font><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'><br>
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
        </font><font color='#000000'>$codcliente - $xnome</font></font></b></td>
      <td width='50%' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CPF/CNPJ:<br>
      </font></b><font color='#000000'>$xcpf
      $xcnpj</font></font></td>
    </tr>
    <tr>
      <td width='100%' bgcolor='#F0F0F0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>ENDEREÇO:<br>
        </font>
        </b><font color='#000000'>$xendereco - $xnumero - $xcomplemento - $xbairro - $xcidade - $xestado - $xcep</font></font></td>
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
      <td width='100%' colspan='2' bgcolor='#F77673'><font size='1' face='Verdana' color='#FFFFFF'><b>REFERÊNCIA
        BANCÁRIA </b></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#FDDCDB'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>BANCO:<br>
        </font></b><font color='#000000'>$xrb_banco</font></font></td>
      <td width='50%' bgcolor='#FDDCDB'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>AGÊNCIA:<br>
        </font></b><font color='#000000'>$xrb_agencia</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#FDDCDB'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CONTA:<br>
        </font></b><font color='#000000'>$xrb_conta</font></font></td>
      <td width='50%' bgcolor='#FDDCDB'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TIPO:<br>
        </font></b><font color='#000000'>$xrb_tipo</font></font></td>
    </tr>
    <tr>
      <td width='50%' bgcolor='#FDDCDB'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE:<br>
        </font></b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>($xrb_dddtel)$xrb_tel</font></font></td>
      <td width='50%' bgcolor='#FDDCDB'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#FF0000'>CLIENTE
        DESDE:</font><font color='#336699'><br>
        </font></b><font color='#000000'>$xrb_clientedesde</font></font></td>
    </tr>
    <tr>
      <td width='100%' colspan='2' bgcolor='#F77673'><font size='1' face='Verdana' color='#FFFFFF'><b>INFORMAÇÕES
        PARA A APROVAÇÃO DE CRÉDITO</b></font></td>
    </tr>
  </center>
    <tr>
      <td width='100%' bgcolor='#FDDCDB' colspan='2'>
        <table border='0' width='100%' cellspacing='1'>
          <tr>
            <td width='100%' colspan='2'>
              <p align='center'><font color='#FF0000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>CMC7: 
              </b></font><font color='#000000'></font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$cmc7</font></td>
  <center>
  </center>
            
  <center>
            </tr>
          </table>
        </td>
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
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datapreventf - $horaprevent</font></td>
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

<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS FINANCEIRO</b></font></td>
    </tr>
    <tr>
      <td width='540' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS PARA
        FINANCEIRO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsfinanceiro</font></td>
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
			if ($vt <> 0){$fator_ped = $vpp/$vt;}else{$fator_ped = 0;}
  			$puu = $puu * ($fator_ped);
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
			if ($vt <> 0){$fator_ped = $vpp/$vt;}else{$fator_ped = 0;}
  			$puu = $puu * ($fator_ped);
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
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.<br>CHEQUE</b></font></td>
	    <td width='5%'><font size='1' face='Verdana' color='#ffffff'><b>CX</b></font></td>
      </tr>
");


  $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();
			
			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$parcpg = $prod->showcampo10();
			$numdoc = $prod->showcampo11();
			$datavencf = $prod->fdata($datavenc);
			$valorparcelaf = number_format($valorparcela,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricao = $prod->showcampo1();


			$string_md5 .= $datavenc.$tipo.$valorparcela;
			

		

	if ($parcpg == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}

if ($numdoc == ""){
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
        <td width='10%'><font size='1' face='Verdana' >$numchec</font></td>
		<td width='5%' align='center'><font size='1' face='Verdana' color='$cor1' >$parcpg</font></td>
      </tr>
");
}else{
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='40%' colspan ='4' align='center'><font size='1' face='Verdana' >$numdoc</font></td>
        <td width='5%' align='center'><font size='1' face='Verdana' color='$cor1' >$parcpg</font></td>
      </tr>
");
}

	}//FOR

		// GERA MD5 DAS PARCELAS
			$md5 = $prod->geraMD5($string_md5);
			#echo("$md5");

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
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MLB_REAL:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $mlb_realf (Pedido Distribuição)</b></font></td>
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
      <td width='549' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>OBS. SOBRE O CRÉDITO DO CLIENTE</font></b></td>
    </tr>
    
    <tr>
      <td width='1' valign='top'>
        <font size='1' face='Verdana'>&nbsp;</font></td>
      <td width='549' bgcolor='#f3f8fa' valign='top'>
        <b><font face='Verdana' color='#000000' size='1'>$xobscredito</font></b></td>
    </tr>
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
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>I</font>
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

#echo("$string_md5 - $md5 - $md5_parc");

// VERIFICA CONSITENCIA DE DATAS
$prod->listProdMY("IF ('$dataped' > '2004-08-11 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
$prod->mostraProd( $array129, $array_campo129, 0 );
$control = $prod->showcampo0();

if ($control == 'S' and ($md5 <> $md5_parc)){

echo("
<br>
	<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='549' bgcolor='#F77673' valign='top'>
        <b><font size='1' face='Verdana' color='#FFFFFF'>HOUVE ALTERAÇÃO NA
        FORMA DE PAGAMENTO DO PEDIDO</font></b></td>
    </tr>
    
    </table>
  </center>
</div>
");
}
echo("



");


if ($reavalfpg == "OK"){


echo("
<form method='POST' action='$PHP_SELF?Action=insertreaval'  name='Form'>
");
		if ($block_ap == 0){
		echo("
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ALTERAR STATUS</b></font></td>
        <td width='554' colspan='3'>
		");
		
		echo("
  <select size='1' class=drpdwn name='statuspeds'>
                             
						  

		<option value='REAPROV'>APROV NOVAMENTE</option>
");
if($modped <> "OK"){
echo("
		<option value='REPR'>REPR</option>
");
}
echo("
		<option value = '1' selected>ESCOLHA</option>
		
						  </select>
  


           <font face='Verdana' size='1'>(Reaprovação do Crédito)</font> </td>
        <td width='55' rowspan='3'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>
 <tr bgColor='#f3f8fa'>
        <td width='186'><font size='1' face='Verdana' color='#FF9933'><b>AGUARDAR<br>
        COMPENSAÇÃO:</b></font></td>
        <td width='139'>
 <select size='1' class=drpdwn name='aguard_compselect'>

	<option value='OK'>OK</option>
    <option value='NO'>NO</option>
   	<option value='$aguard_comp' selected>$aguard_comp</option>						  

  </select>


            </td>
      
        <td width='415'>
 <b><font size='1' face='Verdana'><font color='#008000'>OK</font>
        - </font></b><font size='1' face='Verdana'>AGUARDAR COMPENSAÇÃO<b><br>
        <font color='#FF0000'>NO</font> - </b>NÃO AGUARDAR </font>


            </td>
      
      </tr>

      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>OBS. APROVAÇÃO
          CRÉDITO</b></font></td>
        <td width='554' colspan='3'>
  <input type='text' name='obsac' value='$obsapcredito' size='48'>
  

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
");
		}
		echo("
		<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='549' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>DADOS SOBRE O SERASA</font></b></td>
    </tr>
    <br>
    <tr>
       <td width='550' bgcolor='#f3f8fa' valign='top' colspan ='2' align ='center'>
        <br><br>
 
   <textarea rows='5' id = 'serasa' name='serasa' cols='60' rows='200'  style='height:200 '>$serasaold</textarea>
                              </font>

		</td>
    </tr>
    </table>
  </center>
</div>
</form>


");
}else{
echo("
<form method='POST' action='$PHP_SELF?Action=insert'  name='Form'>
");
		if ($block_ap == 0){
		echo("
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>ALTERAR STATUS</b></font></td>
        <td width='554' colspan='3'>
  <select size='1' class=drpdwn name='statuspeds'>
                             
						  

		<option value='APROV'>APROV</option>
		<option value='REPR'>REPR</option>

		<option value = '1' selected>ESCOLHA</option>
		
						  </select>
  


            </td>
        <td width='55' rowspan='3'>
  <input type='submit' value='OK' name='B1'>
  


            </td>
      </tr>
   <tr bgColor='#f3f8fa'>
        <td width='186'><font size='1' face='Verdana' color='#FF9933'><b>AGUARDAR<br>
        COMPENSAÇÃO:</b></font></td>
        <td width='139'>
 <select size='1' class=drpdwn name='aguard_compselect'>

	<option value='OK'>OK</option>
    <option value='NO'>NO</option>
   	<option value='$aguard_comp' selected>$aguard_comp</option>						  

  </select>


            </td>
      
        <td width='138'>
 <b><font size='1' face='Verdana'><font color='#008000'>OK</font>
        - </font></b><font size='1' face='Verdana'>AGUARDAR COMPENSAÇÃO<b><br>
        <font color='#FF0000'>NO</font> - </b>NÃO AGUARDAR </font>


            </td>
      
      </tr>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>OBS. APROVAÇÃO
          CRÉDITO</b></font></td>
        <td width='554' colspan='3'>
  <input type='text' name='obsac' value='$obsapcredito' size='48'>
  

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

");
		}
		echo("


			<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='1' valign='top'>
        <b><font size='1' face='Verdana'>::</font></b></td>
      <td width='549' bgcolor='#86acb5' valign='top'>
        <b>
        <font size='1' face='Verdana' color='#FFFFFF'>DADOS SOBRE O SERASA</font></b></td>
    </tr>
    <br>
    <tr>
       <td width='550' bgcolor='#f3f8fa' valign='top' colspan ='2' align ='center'>
        <br><br>
 
   <textarea rows='5' name='serasa' cols='60' rows='200'  style='height:200 '>$serasaold</textarea>
                              </font>
	<script language='javascript1.2'>
	editor_generate('serasa');
	</script>		 
 
		</td>
    </tr>
    </table>
  </center>
</div>
			
			</form>


");
}


echo("

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
		CLIENTE: <input type='text' name='palavrachave' size='20'>VENDEDOR: <input type='text' name='nomevendpesq' size='20'></font>
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

/*	

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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpedpesq=$codpedpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq#cliente'>$nomeemp</option>
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

 */
#if ($codempselect<>""){


	#$prod->listProd("empresa", "codemp=$codempselect");
				
		#$nomeempold = $prod->showcampo1();
		#$enderecoold = $prod->showcampo2();
		#$bairroold = $prod->showcampo3();
		#$cidadeold = $prod->showcampo4();
		#$estadoold = $prod->showcampo5();
		#$cepold = $prod->showcampo6();
		#$contatoold = $prod->showcampo16();

		$nomeempold = "TODAS";
		$nomeempold = strtoupper($nomeempold);

echo("
<br>
<div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
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
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpedpesq=$codpedpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&nomevendpesq=$nomevendpesq'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></td>
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PEDIDO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpedpesq=$codpedpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&nomevendpesq=$nomevendpesq'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PEDIDO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpedpesq=$codpedpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1&nomevendpesq=$nomevendpesq'><br>
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


	<table width='100%' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PED</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>D/H:M:S</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PD</font></b></div>
    </td>
		<td width='3%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RCR</font></b></div>
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
			$pendfpg = $prod->showcampo13();
			$reavalfpg = $prod->showcampo14();
			$modped = $prod->showcampo16();
			$crypt_v = $prod->showcampo17();
			$crypt_m = $prod->showcampo18();
			$tipo_pis = $prod->showcampo19();
			$modelo_ped = $prod->showcampo20();
	
			// FORMATACAO //
			$datapedf = $prod->fdata($dataped);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataatual,$dataprevent);
			$difhoras = $prod->numdatahoras($dataped,$dataatual);
			
			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();
			
		
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
			if ($reavalfpg == "OK"){$bgcorlinha="#FCDCBC";}

if ($pendfpg == "OK"){$pendfpglogo = "<IMG SRC='images/est_prev.gif'  BORDER=0 >";}else{$pendfpglogo="";}
if ($reavalfpg== "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}
if ($modped == "OK"){$mod ="MOD";}else{$mod="";}
$ped_ata = "";
if ($modelo_ped == "ATA"){$cor7 ="#008000";$ped_ata = "ATACADO";}
if ($modelo_ped == "DST"){$cor7 ="#008000";$ped_ata = "DISTRIBUIDOR";}
if ($modelo_ped == "DSTE"){$cor7 ="#008000";$ped_ata = "DISTRIBUIDOR ESP";}
if ($modelo_ped == "RDST"){$cor7 ="#008000";$ped_ata = "FAT REVENDA";}
if ($modelo_ped == "RDD"){$cor7 ="#008000";$ped_ata = "FAT DIRETO";}

	
			// VERIFICA SE O PEDIDO CARTAO VISA 
		$prod->listProdU("COUNT(*)", "pedidoparcelas", " tipo ='02.35' and codped=$codped ");
		$parc_visa = $prod->showcampo0();
		#echo "aQUI".$parc_visa;
			// VERIFICA SE O PEDIDO CARTAO MASTERCARD 
		$prod->listProdU("COUNT(*)", "pedidoparcelas", " tipo ='02.36' and codped=$codped ");
		$parc_master = $prod->showcampo0();
		
		 $prod->clear();
	  $prod->listProdU("nome, if (tipocliente = 'F', cpf, cnpj) as doc", "clientenovo", "codcliente = (select avalista FROM pedido WHERE codped=$codped)");
		$nome_aval= $prod->showcampo0();
		$doc_aval= $prod->showcampo1();
		
		//BOLETA BANCARIA
	$prod->clear();
	$prod->listProdU("SUM( if( tipo = '02.04', 1, 0 ) ) as boleta ", "pedidoparcelas", " codped=$codped ");
	$parc_bol_aval = $prod->showcampo0();
	 
	// TIPO CLIENTE PIS
	$prod->clear();
	$prod->listProdU(" (SELECT tipo_pis FROM clientenovo WHERE codcliente = pedido.codcliente) as tipo ", "pedido", " codped=$codped ");
	$tipo_cli_aval = $prod->showcampo0();
	
	#echo $tipo_cli_aval;
	
	if ($parc_bol_aval > 0 and $tipo_cli_aval <>'R'){$checar_aval = 1;}else{$checar_aval = 0;}
			
		 if (($modelo_ped == "DST" or $modelo_ped == "RDD") and $checar_aval == 1){$avalista = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#FF0000'><B>AVALISTA</B><BR>$nome_aval</font>";$control_aval =1;}else{$avalista = "";$control_aval =0;}
		 
		 
	
		if ($parc_visa > 0  ){$cartao = "<IMG SRC='images/visa.gif'  BORDER=0 >";}else{$cartao="";}
		if ($parc_master > 0 ){$cartao1 = "<IMG SRC='images/mastercard.gif'  BORDER=0 >";}else{$cartao1="";}
		
		if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
		$arqcontrato_cartao="https://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).$bar."iniciocontrato_cartao_visa.php";
		$arqcontrato_cartao1="https://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).$bar."iniciocontrato_cartao_master.php";
		
		if ($tipo_pis == "X"){$aviso = "CLASSIFICAR CLIENTE";}
		if ($tipo_pis == "C"){$aviso = "CONSUMIDOR";}
		if ($tipo_pis == "R"){$aviso = "REVENDA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&codpedpesq=$codpedpesq&control_aval=$control_aval'>$codbarra</font></b></a><BR><a href='javascript:void(0)' onclick=\"NewWindow('$arqcontrato_cartao?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name','777','410','yes');return false\">$cartao</a><a href='javascript:void(0)' onclick=\"NewWindow('$arqcontrato_cartao1?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name','777','410','yes');return false\">$cartao1</a></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b><BR><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'>$aviso</font></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend</font><br><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor7'>$ped_ata</font></b><BR>$avalista</td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapreventf $horaprevent </font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br>$mod</font></td>
	");

$d = substr($difhoras,0,2);
$h = substr($difhoras,3,2);
$m = substr($difhoras,6,2);
if ($m >= 30 and $h >= 0 and $d >= 0){$cor = "#FF0000";}else{$cor="000000";}
if ($m <= 30 and $h ==0 and $d==0){$cor = "#000000";}else{$cor="#FF0000";}

echo("
			<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor'><b>$difhoras</b></font></td>
			<td align='center' width='3%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor'><b>$pendfpglogo</b></font></td>
			<td align='center' width='2%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor4'><b>$reavalfpg</b></font></td>
			
		");
	 }

		echo("
				</table>
		");


#}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" ){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&codpedpesq=$codpedpesq";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
