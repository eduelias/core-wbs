 

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "clientenovo";					// Tabela EM USO
$condicao1 = "codcliente=$codcliente";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CLIENTE";
$titulo = "ADMINISTRAÇÃO DE CLIENTE";

$Actionter = "unlock";

if ($tipocliente==""){$tipocliente='F';}

// INICIO DA CLASSE
$prod = new operacao();

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovendselect = $prod->showcampo2();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}




// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":
		
		if ($retorno){
		
		$dataatual = $prod->gdata();

		// So precisa SETAR os valores do formulario
		// Dados do Cliente 
			$prod->setcampo0("");
			$prod->setcampo1($nome);
			$prod->setcampo2($dataatual);
			$prod->setcampo3($tipocliente);
			$prod->setcampo4($cpf);
			$prod->setcampo5($cnpj);
			$prod->setcampo6($rg);
			$prod->setcampo7($rgemissor);
			$prod->setcampo8($ie);
			
			$datanew = str_replace('/','',$datanasc);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo9($data);
			
			$datanew = str_replace('/','',$dataativ);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo10($data);

			$prod->setcampo11($sexo);
			$prod->setcampo12($ecivil);
			$prod->setcampo13($nacionalidade);
			$prod->setcampo14($endereco);
			$prod->setcampo15($bairro);
			$prod->setcampo16($cidade);
			$cep = str_replace('-','',$cep);
			$prod->setcampo17($cep);
			$prod->setcampo18($estado);
			$prod->setcampo19($tempolocal);
			$prod->setcampo20($tipolocal);
			$prod->setcampo21($dddtel1);
			$prod->setcampo22($tel1);
			$prod->setcampo23($dddtel2);
			$prod->setcampo24($tel2);
			$prod->setcampo25($ramal);
			$prod->setcampo26($fatmensal);
			$prod->setcampo27($atividade);
		// Dados da Empresa Cliente
			$prod->setcampo28($c_empresa);
			$prod->setcampo29($c_cnpj);
			$prod->setcampo30($c_tempoemp);
			$prod->setcampo31($c_ocupacao);
			$prod->setcampo32($c_descricao);
			$prod->setcampo33($c_rendamensal);
			$prod->setcampo34($c_outrasrendas);
			$prod->setcampo35($c_endereco);
			$prod->setcampo36($c_bairro);
			$prod->setcampo37($c_cidade);
			$prod->setcampo38($c_cep);
			$prod->setcampo39($c_estado);
			$prod->setcampo40($c_dddtel);
			$prod->setcampo41($c_tel);
			$prod->setcampo42($c_ramal);
			$prod->setcampo43($c_endcorresp);
		// Dados do Conjuge
			$prod->setcampo44($cj_nome);
			$prod->setcampo45($cj_cpf);
			$prod->setcampo46($cj_rg);
			$prod->setcampo47($cj_rgemissor);
			
			$datanew = str_replace('/','',$cj_datanasc);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo48($data);
			
			$prod->setcampo49($cj_empresa);
			$prod->setcampo50($cj_ocupacao);
			$prod->setcampo51($cj_descricao);
			$prod->setcampo52($cj_rendamensal);
			$prod->setcampo53($cj_dddtel);
			$prod->setcampo54($cj_tel);
			$prod->setcampo55($cj_ramal);
		// Referencia Bancaria
			$prod->setcampo56($rb_banco);
			$prod->setcampo57($rb_agencia);
			$prod->setcampo58($rb_conta);
			$prod->setcampo59($rb_tipo);
			$prod->setcampo60($rb_dddtel);
			$prod->setcampo61($rb_tel);
			$prod->setcampo62($rb_clientedesde);
		// Referencia Pessoal
			$prod->setcampo63($rp_nome1);
			$prod->setcampo64($rp_dddtel1);
			$prod->setcampo65($rp_tel1);
			$prod->setcampo66($rp_nome2);
			$prod->setcampo67($rp_dddtel2);
			$prod->setcampo68($rp_tel2);
		// Referencia Comercial
			$prod->setcampo69($rc_nome1);
			$prod->setcampo70($rc_dddtel1);
			$prod->setcampo71($rc_tel1);
			$prod->setcampo72($rc_nome2);
			$prod->setcampo73($rc_dddtel2);
			$prod->setcampo74($rc_tel2);
		// Outros
			$prod->setcampo75($obsvend);
			$prod->setcampo76($obscredito);
			$prod->setcampo77($email);
			$prod->setcampo78($dataatual);
			$prod->setcampo80("S");
			$prod->setcampo81($contatocomprador);
			$prod->setcampo82($contatofinanceiro);
			$prod->setcampo83($dddfax);
			$prod->setcampo84($fax);
			$login = strtolower($login);
			$prod->setcampo85($login);
			$prod->setcampo86($rescredito);
			$prod->setcampo87($login);
			$prod->setcampo88($dataatual);
			$prod->setcampo90($numero);
			$prod->setcampo91($complemento);
		// Operacao de Caixa
			$opcaixaf = OPCAIXA_PADRAO;
			$prod->setcampo79($opcaixaf);
			$prod->setcampo99($tipo_pis);
			$prod->setcampo100($nome_fantasia);
			$meta = str_replace('.','',$meta);
			$meta = str_replace(',','.',$meta);
			$prod->setcampo101($meta);
			$lim_credito = str_replace('.','',$lim_credito);
			$lim_credito = str_replace(',','.',$lim_credito);
			$prod->setcampo102($lim_credito);
			$prod->setcampo104($tipo_aval);
			$prod->setcampo105($blacklist);
			$prod->setcampo106($pg_perdido);
			$prod->setcampo107($tipo_rev);
			

		if ($tipocliente == "F"){$condpesq = "cpf='$cpf'";}
		if ($tipocliente == "J"){$condpesq = "cnpj='$cnpj'";}

		$prod->listProdgeral($tabela, $condpesq, $array111, $array_campo111, "" );

		if (count($array111) <> 0){

		/// MENSAGEM DE ERRO
			if ($csocio <> 1){

				$Actionter = "lock";
					$prod->msggeral("ESTE USUÁRIO JÁ ESTÁ CADASTRADO", "ERRO", "$PHP_SELF?Action=volta&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgold&amp;hist=$hist&lock=$lock", 1);

			}else{

				$errosocio = 1;
			}


		}else{

		$prod->addProd($tabela, $ureg);

		}
		
		
		$Actionsec="list";
		$lockformsocio = 1;		// ESCONDE FORMULARIO DE CADASTRO NOVO SOCIO

			if ($csocio == 1){

				if ($errosocio <> 1){
				$prod->setcampo0("");
				$prod->setcampo1($codcliente_pri);
				$prod->setcampo2($ureg);

				$prod->addProd("relacaocli", $uregrel);
				}
			}
		}

		

		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":
		
	$prod->listProd($tabela, $condicao1);

			// Dados do Cliente 
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
		$xdatanasc =    $prod->fdata($xdatanasc);
		$xdataativ=		$prod->showcampo10();
		$xdataativ =    $prod->fdata($xdataativ);
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
		$xcj_datanasc = $prod->fdata($xcj_datanasc);
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
		$xdataatualiza =		$prod->showcampo78();
		$xopcaixa=		$prod->showcampo79();
		$xopcaixashow = explode(":", $xopcaixa);
		$xasscontrato=	$prod->showcampo80();
		$xcontatocomprador=	$prod->showcampo81();
		$xcontatofinanceiro=	$prod->showcampo82();
		$xdddfax=	$prod->showcampo83();
		$xfax=	$prod->showcampo84();
		$xrescredito=	$prod->showcampo86();
		$xlogincad =	$prod->showcampo87();
		$xlogincad = strtolower($xlogincad);
		$xnumero =	$prod->showcampo90();
		$xcomplemento =	$prod->showcampo91();
		$xtipo_pis =	$prod->showcampo99();
		$xnome_fantasia =	$prod->showcampo100();
		$xmeta =	$prod->showcampo101();
		$xmeta = number_format($xmeta, 2,',', '.');
		$xlim_credito =	$prod->showcampo102();
		$xlim_credito = number_format($xlim_credito, 2,',', '.');
		$xtipo_aval = $prod->showcampo104();
		$xblacklist = $prod->showcampo105();
		$xpg_perdido = $prod->showcampo106();
		$xtipo_rev = $prod->showcampo107();
		echo "aqui1 = $xtipo_aval - $xlim_credito";
		
		if ($retorno){

		$dataatual = $prod->gdata();


		// Dados do Cliente 
			$prod->setcampo0($codcliente);
			$prod->setcampo1($nome);
			$prod->setcampo2($xdatacad);
			$prod->setcampo3($tipocliente);
			$prod->setcampo4($cpf);
			$prod->setcampo5($cnpj);
			$prod->setcampo6($rg);
			$prod->setcampo7($rgemissor);
			$prod->setcampo8($ie);
			
			$datanew = str_replace('/','',$datanasc);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo9($data);

			$datanew = str_replace('/','',$dataativ);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo10($data);

			$prod->setcampo11($sexo);
			$prod->setcampo12($ecivil);
			$prod->setcampo13($nacionalidade);
			$prod->setcampo14($endereco);
			$prod->setcampo15($bairro);
			$prod->setcampo16($cidade);
			$cep = str_replace('-','',$cep);
			$prod->setcampo17($cep);
			$prod->setcampo18($estado);
			$prod->setcampo19($tempolocal);
			$prod->setcampo20($tipolocal);
			$prod->setcampo21($dddtel1);
			$prod->setcampo22($tel1);
			$prod->setcampo23($dddtel2);
			$prod->setcampo24($tel2);
			$prod->setcampo25($ramal);
			$prod->setcampo26($fatmensal);
			$prod->setcampo27($atividade);
		// Dados da Empresa Cliente
			$prod->setcampo28($c_empresa);
			$prod->setcampo29($c_cnpj);
			$prod->setcampo30($c_tempoemp);
			$prod->setcampo31($c_ocupacao);
			$prod->setcampo32($c_descricao);
			$prod->setcampo33($c_rendamensal);
			$prod->setcampo34($c_outrasrendas);
			$prod->setcampo35($c_endereco);
			$prod->setcampo36($c_bairro);
			$prod->setcampo37($c_cidade);
			$prod->setcampo38($c_cep);
			$prod->setcampo39($c_estado);
			$prod->setcampo40($c_dddtel);
			$prod->setcampo41($c_tel);
			$prod->setcampo42($c_ramal);
			$prod->setcampo43($c_endcorresp);
		// Dados do Conjuge
			$prod->setcampo44($cj_nome);
			$prod->setcampo45($cj_cpf);
			$prod->setcampo46($cj_rg);
			$prod->setcampo47($cj_rgemissor);
			
			$datanew = str_replace('/','',$cj_datanasc);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo48($data);
			
			$prod->setcampo49($cj_empresa);
			$prod->setcampo50($cj_ocupacao);
			$prod->setcampo51($cj_descricao);
			$prod->setcampo52($cj_rendamensal);
			$prod->setcampo53($cj_dddtel);
			$prod->setcampo54($cj_tel);
			$prod->setcampo55($cj_ramal);
		// Referencia Bancaria
			$prod->setcampo56($rb_banco);
			$prod->setcampo57($rb_agencia);
			$prod->setcampo58($rb_conta);
			$prod->setcampo59($rb_tipo);
			$prod->setcampo60($rb_dddtel);
			$prod->setcampo61($rb_tel);
			$prod->setcampo62($rb_clientedesde);
		// Referencia Pessoal
			$prod->setcampo63($rp_nome1);
			$prod->setcampo64($rp_dddtel1);
			$prod->setcampo65($rp_tel1);
			$prod->setcampo66($rp_nome2);
			$prod->setcampo67($rp_dddtel2);
			$prod->setcampo68($rp_tel2);
		// Referencia Comercial
			$prod->setcampo69($rc_nome1);
			$prod->setcampo70($rc_dddtel1);
			$prod->setcampo71($rc_tel1);
			$prod->setcampo72($rc_nome2);
			$prod->setcampo73($rc_dddtel2);
			$prod->setcampo74($rc_tel2);
		// Outros
			$prod->setcampo75($obsvend);
			$prod->setcampo76($obscredito);
			$prod->setcampo77($email);
			$prod->setcampo78($dataatual);
			
			$prod->setcampo81($contatocomprador);
			$prod->setcampo82($contatofinanceiro);
			$prod->setcampo83($dddfax);
			$prod->setcampo84($fax);
			$prod->setcampo85($login);
			$prod->setcampo90($numero);
			$prod->setcampo91($complemento);
		if ($lock <> 1){
			$prod->setcampo80($asscontrato);
			$prod->setcampo86($rescredito);
		// Operacao de Caixa
			for($k = 0; $k < $contopcaixa; $k++ ){
				$opcaixaf = $opcaixaf .":". $opcaixav[$k];
			}			
			$prod->setcampo79($opcaixaf);
		}else{
			$prod->setcampo80($xasscontrato);
			$prod->setcampo86($xrescredito);
			$prod->setcampo79($xopcaixa);
		}

		if ($codgrpselect == 2 or $codgrpselect == 58){
			
			$prod->setcampo87($respcart);
		}
		
		$prod->setcampo99($tipo_pis);
		$prod->setcampo100($nome_fantasia);
		$meta = str_replace('.','',$meta);
		$meta = str_replace(',','.',$meta);
		$prod->setcampo101($meta);
		$lim_credito = str_replace('.','',$lim_credito);
		$lim_credito = str_replace(',','.',$lim_credito);
		$prod->setcampo102($lim_credito);
		echo "aqui = $tipo_aval";
		$prod->setcampo104($tipo_aval);
		$prod->setcampo105($blacklist);
		$prod->setcampo106($pg_perdido);
		$prod->setcampo107($tipo_rev);
		
		
		$prod->upProd($tabela, $condicao1);

		$Actionsec="list";
		$lockformsocio = 1;		// ESCONDE FORMULARIO DE CADASTRO NOVO SOCIO

		}
				
		$nomeformsec=" ATUALIZAR $nomeform ";
		 break;

	 case "list":

		
		#$Actionsec="list";
	
		
		 break;

	 
	 case "addsocio":

		$prod->listProdgeral($tabela, "cpf='$cpfpesq'", $array1, $array_campo1, "" );

		if (count($array1) <> 0 and $cpfpesq <> ""){

			$prod->mostraProd( $array1, $array_campo1, 0 );
			$codcliente_sec = $prod->showcampo0();
			
			$prod->setcampo0("");
			$prod->setcampo1($codcliente_pri);
			$prod->setcampo2($codcliente_sec);

			$prod->addProd("relacaocli", $uregrel);

			$Actionsec="list";
			$lockformsocio = 1;		// ESCONDE FORMULARIO DE CADASTRO NOVO SOCIO
			
		}else{
			
			$Actionsec="list";
			$lockformsocio = 0;		// MOSTRA FORMULARIO DE CADASTRO NOVO SOCIO
			
		}

		
		 break;

	  case "delete":

		$prod->delProd("relacaocli", "codrelcli=$codrelcli");

		$Actionsec="list";
		$lockformsocio = 1;		// ESCONDE FORMULARIO DE CADASTRO NOVO SOCIO
		
		 break;
		
	 case "addvisita":

			$dataatual = $prod->gdata();

			
			if ($respvisita <> ""){

				$prod->setcampo0("");
				$prod->setcampo1($codcliente);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($respvisita);

				$prod->addProd("clientenovo_visita", $uregrel);

			}

			$prod->listProdU("datadono", "clientenovo", "codcliente=$codcliente");
			$datadono = $prod->showcampo0();

			$datahoje = $prod->gdata();
			$difdias = $prod->numdias($datadono,$datahoje);

			echo("d=$difdias");

			if ($difdias > 90){
				
				if ($respvisita <> ""){

				$prod->listProd("clientenovo", "codcliente=$codcliente");

				$prod->setcampo87($respvisita); // DONO CARTEIRA
				$prod->setcampo88($dataatual); // DATA DONO CARTEIRA
				$prod->upProd("clientenovo", "codcliente=$codcliente");

				}

			}

			$Action="update";
			$Actionsec = "list";
			$xcodcliente = $codcliente;
			$lockformsocio = 1;		// ESCONDE FORMULARIO DE CADASTRO NOVO SOCIO
		
			


			



			
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		
	$addsocio = 1;			// MOSTRA MENU DE ESCOLHA DE SOCIOS ( DEVEDOR SOLIDARIO )
	if ($Action == "insert" and $csocio <> 1){$codcliente_pri = $ureg;}
	if ($Action == "insert" and $csocio == 1){$codcliente_pri = $codcliente_pri;}
	if ($Action == "update"){$codcliente_pri = $xcodcliente;}
	$tipopessoa = "F";



}

if ($Actionter == "unlock"){

if ($lock <> 1){include("sif-topo.php");}else{include("sif-topolimpo.php");}

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

  
    if (!(consisteVazioTamanho (form, form.nome.name, 60)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.email.name, 100)))
    {
        return false;
    }
		if (!(consisteCPF (form, form.cpf.name, true)))
    {
        return false;
    }
		
	 if (!(consisteVazioTamanho(form, form.rg.name, 10)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.rgemissor.name, 5)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.endereco.name, 100)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.bairro.name, 50)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.cidade.name, 50)))
    {
        return false;
    }
	if (!(consisteCEP (form, form.cep.name)))
    {
        return false;
    }

    if (!(consisteUF (form, form.estado.name, true)))
    {
        return false;
    }

   

	return true;
      	
}


function verificaObrigJuridica (form)
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

  
    if (!(consisteVazioTamanho (form, form.nome.name, 60)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.email.name, 100)))
    {
        return false;
    }
		 if (!(consisteCGC (form, form.cnpj.name, true)))
    {
        return false;
    }
		 if (!(consisteVazioTamanho(form, form.ie.name, 50)))
    {
        return false;
    }
	
		 if (!(consisteVazioTamanho(form, form.endereco.name, 100)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.bairro.name, 50)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.cidade.name, 50)))
    {
        return false;
    }
	if (!(consisteCEP (form, form.cep.name)))
    {
        return false;
    }

    if (!(consisteUF (form, form.estado.name, true)))
    {
        return false;
    }

   
	return true;
      	
}


function verificaObrigSocio (form)
{

	
	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

  
 		if (!(consisteCPF (form, form.cpfpesq.name, true)))
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
	
//-------------------------------------------------------------------
   if (campo == 'cpfpesq')
        return 'CPF Pesquisado';
//-------------------------------------------------------------------
    if (campo == 'nome')
        return 'Nome do Titular';
	 if (campo == 'email')
        return 'Email do Titular';
    if (campo == 'cpf')
        return 'CPF do Titular';
    if (campo == 'cnpj')
        return 'CNPJ da Empresa';
    if (campo == 'ie')
        return 'Inscrição Estadual da Empresa';
    if (campo == 'datanasc')
        return 'Data de Nascimento do Titular';
    if (campo == 'dataativ')
        return 'Data da Ativação da Empresa';
    if (campo == 'rg')
        return 'RG do Titular';
    if (campo == 'rgemissor')
        return 'Emissor do RG do Titular';
    if (campo == 'sexo')
        return 'Sexo do Titular';
    if (campo == 'ecivil')
        return 'Estado Civil do Titular';
    if (campo == 'nacionalidade')
        return 'Nacionalidade do Titular';
    if (campo == 'endereco')
        return 'Endereço do Titular';
    if (campo == 'bairro')
        return 'Bairro do Titular';
    if (campo == 'cidade')
        return 'Cidade do Titular';
    if (campo == 'cep')
        return 'CEP do Titular';
    if (campo == 'estado')
        return 'Estado do Titular';
    if (campo == 'tempolocal')
        return 'Tempo de Residência do Titular';
    if (campo == 'tipolocal')
        return 'Tipo de Residência do Titular';
    if (campo == 'dddtel1')
        return 'DDD do Telefone 1 Residencial do Titular';
    if (campo == 'tel1')
        return 'Telefone 1 Residencial do Titular';
    if (campo == 'dddtel2')
        return 'DDD do Telefone 2 Residencial do Titular';
    if (campo == 'tel2')
        return 'Telefone 2 Residencial do Titular';
    if (campo == 'ramal')
        return 'Ramal do Titular';
    if (campo == 'fatmensal')
        return 'Faturamento Mensal do Titular';
    if (campo == 'atividade')
        return 'Atividade do Titular';
	 if (campo == 'fax')
        return 'FAX';
//-------------------------------------------------------------------
    if (campo == 'c_empresa')
        return 'Nome da Empresa do Titular';
    if (campo == 'c_cnpj')
        return 'CNPJ da Empresa do Titular';
    if (campo == 'c_tempoemp')
        return 'Tempo de Empresa do Titular';
    if (campo == 'c_ocupacao')
        return 'Ocupação do Titular';
    if (campo == 'c_descricao')
        return 'Descrição do Cargo do Titular';
    if (campo == 'c_rendamensal')
        return 'Renda Mensal do Titular';
    if (campo == 'c_outrasrendas')
        return 'Outras Rendas do Titular';
    if (campo == 'c_endereco')
        return 'Endereço Comercial do Titular';
    if (campo == 'c_bairro')
        return 'Bairro da Empresa do Titular';
    if (campo == 'c_cidade')
        return 'Cidade da Empresa do Titular';
    if (campo == 'c_cep')
        return 'CEP da Empresa do Titular';
    if (campo == 'c_estado')
        return 'Estado da Empresa do Titular';
    if (campo == 'c_dddtel')
        return 'DDD do Telefone Comercial do Titular';
    if (campo == 'c_tel')
        return 'Telefone Comercial do Titular';
    if (campo == 'c_ramal')
        return 'Ramal da Empresa do Titular';
    if (campo == 'c_endcorresp')
        return 'Endereço para Correspondência do Titular';
//-------------------------------------------------------------------
    if (campo == 'cj_nome')
        return 'Nome do Cônjuge';
    if (campo == 'cj_rg')
        return 'RG do Cônjuge';
    if (campo == 'cj_rgemissor')
        return 'Emissor do RG do Cônjuge';
    if (campo == 'cj_datanasc')
        return 'Data de Nascimento do Cônjuge';
    if (campo == 'cj_cpf')
        return 'CPF do Cônjuge';
    if (campo == 'cj_empresa')
        return 'Nome da Empresa do Cônjuge';
    if (campo == 'cj_ocupacao')
        return 'Cargo do Cônjuge';
    if (campo == 'cj_descricao')
        return 'Descrição do Cargo do Cônjuge';
    if (campo == 'cj_rendamensal')
        return 'Renda Mensal do Cônjuge';
    if (campo == 'cj_dddtel')
        return 'DDD do Telefone Comercial do Cônjuge';
    if (campo == 'cj_tel')
        return 'Telefone Comercial do Cônjuge';
    if (campo == 'cj_ramal')
        return 'Ramal Comercial do Cônjuge';
//-------------------------------------------------------------------
    if (campo == 'rb_banco')
        return 'Banco';
    if (campo == 'rb_agencia')
        return 'Agência Bancária)';
    if (campo == 'rb_conta')
        return 'Nº da Conta Corrente';
    if (campo == 'rb_tipo')
        return 'Tipo da Conta';
    if (campo == 'rb_dddtel')
        return 'DDD do Telefone da Agência Bancária';
    if (campo == 'rb_tel')
        return 'Telefone da Agência Bancária';
//-------------------------------------------------------------------
    if (campo == 'rp_nome1')
        return '1ª Referência Pessoal';
    if (campo == 'rp_dddtel1')
        return 'DDD do Telefone da 1ª Referência Pessoal';
    if (campo == 'rp_tel1')
        return 'Telefone da 1ª Referência Pessoal';
    if (campo == 'rp_nome2')
        return '2ª Referência Pessoal';
    if (campo == 'rp_dddtel2')
        return 'DDD do Telefone da 2ª Referência Pessoal';
    if (campo == 'rp_tel2')
        return 'Telefone da 2ª Referência Pessoal';
//-------------------------------------------------------------------
    if (campo == 'rc_nome1')
        return '1ª Referência Comercial';
    if (campo == 'rc_dddtel1')
        return 'DDD do Telefone da 1ª Referência Comercial';
    if (campo == 'rc_tel1')
        return 'Telefone da 1ª Referência Comercial';
    if (campo == 'rc_nome2')
        return '2ª Referência Comercial';
    if (campo == 'rc_dddtel2')
        return 'DDD do Telefone da 2ª Referência Comercial';
    if (campo == 'rc_tel2')
        return 'Telefone da 2ª Referência Comercial';
//-------------------------------------------------------------------
    if (campo == 'obscredito')
        return 'Observação do Financeiro';
    if (campo == 'obsvend')
        return 'Observação do Vendedor';
    else
        return 'Campo não cadastrado';
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

");


if($Action <> "list"):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($addsocio == 1)
	{$cor2="#FF0000";$cor1="#000000";$img2="images/n3c.gif";$img1="images/n2.gif";}
else{$cor1="#FF0000";$cor2="#000000";$img2="images/n3.gif";$img1="images/n2c.gif";}

echo("
<div align='center'>
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
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'>
	");
if ($addsocio ==1){
		/*
			echo("						
						<a href='$PHP_SELF?Action=update&amp;tipocliente=$tipocliente&codempselect=$codemp&amp;codcliente=$codcliente&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a>
						");
					*/
}else{
	if ($Action == insert){$Actionvolta = "volta";}else{$Actionvolta ="list";}
	echo("
						<a href='$PHP_SELF?Action=$Actionvolta&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgold&amp;hist=$hist&lock=$lock'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a>
						

	");
}
echo("
							
						
						</font></td>
                      </tr>
                    </tbody>
                  </table>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        <td width='27'><img src='images/n1.gif' border='0' width='27' height='27'></td>
                        <td width='112'><b><font face='Verdana' color='#000000' size='1'>ESCOLHER
                          TIPO FORMULÁRIO</font></b></td>
                        <td width='27'><font face='Verdana' size='1'><b><img src='$img1' border='0' width='27' height='27'></b></font></td>
                        <td width='113'><b><font face='Verdana' color='$cor1' size='1'>PREENCHIMENTO
                          DO FORMULÁRIO</font></b></td>
                        <td width='27'><font face='Verdana' size='1'><b><img src='$img2' border='0' width='27' height='27'></b></font></td>
                        <td width='114'><b><font face='Verdana' color='$cor2' size='1'>DEVEDOR
                          SOLIDÁRIO</font></b></td>
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
  </center>
</div>

");

/// ADICAO DE DEVEDOR SOLIDARIO
if($addsocio == 1){

echo("
<div align='center'>
  <center>
                                                      <TABLE width='500'>
                                                      <TR>
                                                          <TD bgcolor='#D6E7EF'>

<table border='0' width='100%' cellspacing='0' cellpadding='15'>
   <tr>
    <td width='100%' bgcolor='#FFFFFF'>
<table cellSpacing='0' cellPadding='0' width='500' align='center' border='0'>
  <tbody>
   <tr>
      <td bgcolor='#86acb5'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='4' color='#FFFFFF'>Devedores
        Solidários</font></b></td>
    </tr>
</table>
<table cellSpacing='1' cellPadding='2' width='500' align='center' border='0'>
  <tbody>
    <tr bgColor='#86acb5'>
      <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>&nbsp;</b></font></td>
      <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>NOME</b></font></td>
      <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><b>CPF</b></font></td>
      <td align='middle' width='10%' height='0'></td>
    </tr>
");
		$prod->listProdgeral("relacaocli", "codcliente_pri = $codcliente_pri", $array4, $array_campo4, "" );

	 for($i = 0; $i < count($array4); $i++ ){
			
			$prod->mostraProd( $array4, $array_campo4, $i );

			$codrelcli = $prod->showcampo0();
			$codcliente_sec = $prod->showcampo2();


			$prod->listProd($tabela, "codcliente=$codcliente_sec");
				
			$nomecli = $prod->showcampo1();
			$nomecli = strtoupper($nomecli);
			$cpf = $prod->showcampo4();

echo("
    <tr bgColor='#f3f8fa'>
      <td align='middle' width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$i</b></font></td>
      <td align='middle' width='30%' height='0'>
        <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>$nomecli</b></font></p>
      </td>
      <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$cpf</font></td>
      <td align='middle' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codrelcli=$codrelcli&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codcliente_pri=$codcliente_pri&tipopessoa=$tipopessoa&retorno=$retorno&ex=1&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold&lock=$lock'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
    </tr>
");
	 }

echo("
		 
  </tbody>
</table>
<br>
<form method='POST' action='$PHP_SELF?Action=addsocio' name='Form3' onSubmit = 'if (verificaObrigSocio(document.Form3)==false) return false'>
  <div align='center'>
    <center>
    <table border='0' width='50%' cellspacing='1' cellpadding='2'>
      <tr>
        <td width='378'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>CPF:
          </b></font><input type='text' name='cpfpesq' size='25'  onchange='consisteCPF(this.form, this.form.cpfpesq.name, true)'></td>
        <td width='154'><input type='submit' value='Procurar/Adicionar' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				   <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
				   <input type='hidden' name='pgold' value='$pgold'>
				  <input type='hidden' name='tipopessoa' value='$tipopessoa'>
				  <input type='hidden' name='codcliente_pri' value='$codcliente_pri'>	
			      <input type='hidden' name='lock' value='$lock'>

</form>
<div align='left'>
  <table cellSpacing='1' cellPadding='2' width='50%' border='0'>
    <tbody>
      
      <td width='18'><font face='Verdana' size='1'><b><img src='images/bt-fechaped.gif' border='0' ></b></font></td>
      <td width='151'><font face='Verdana' size='1'><b>
	  ");
if ($lock <> 1){
	  echo("
	  
	  <a href='$PHP_SELF?Action=list&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retorno=$retorno&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgold&lock=$lock'>FINALIZAR CADASTRO</a>
");
}else{
	echo("
 <a href='javascript:void(0)' onmouseup='javascript:window.close()'>FINALIZAR CADASTRO</a>
	 ");
}
echo("
</b></font></td>
    </tbody>
  </table>
</div>


			   </td>
  </tr>
</table>

                                                          </TD>
                                                      </TR>
                                                      </TABLE>
  </center>
</div>



");


}


// INICIO ---- FORMULARIO PESSOA FISICA	


if ($tipopessoa == "F"){	

	if ($errosocio == 1){
	$Actionter = "lock";
			$prod->msgpopup("Este Usuário já está Cadastrado", "ERRO");
	}


if ($lockformsocio <> 1){

	if ($addsocio == 1 ){$Action="insert";}

echo("
<div align='center'>
  <center>
	  <TABLE width='500'>
	  <TR>
		  <TD bgcolor='#93BEE2'>

	
<!-- INÍCIO DO FORM DE INCLUSÃO DE PROPOSTAS PESSOA FÍSICA -->


<form action='$PHP_SELF?Action=$Action' method='POST' name='Form' onSubmit = 'if (verificaObrig(document.Form)==false) return false'>
<TABLE BORDER='0' CELLPADDING='15' CELLSPACING='0' BGCOLOR='#FFFFFF' BORDERCOLOR='#93BEE2'>

<TR>
    <TD>
        <!-- INÍCIO DOS DADOS DO CLIENTE -->
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#93BEE2' colspan='4' width='532'>
                <b>
           <font size='4' face='Arial'>Dados do Cliente</font>
 </b>
            </td>
        </tr>
        <tr>
            <td width='65' height='24' bgcolor='#FFCC99'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99' width='461'>
                          <font size='1'>
                          <input name='nome' type='text' onChange='consisteVazioTamanho(this.form, this.form.nome.name, 100)' value='$xnome' size='60' >
                          </font>
            </td>
        </tr>
		<tr>
            <td width='65' height='24' bgcolor='#FFCC99'>
                <b><font size='1'>Email</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99' width='461'>
                          <font size='1'>
                          <input name='email' type='text' onChange='consisteVazioTamanho(this.form, this.form.email.name, 100)' value='$xemail' size='30' >
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>CPF</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99' width='461'>
                          <font size='1'>
                          <input type='text' size='17' name='cpf' value='$xcpf' onchange='consisteCPF(this.form, this.form.cpf.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>RG</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                      <font size='1'>
                  	  <input type='text' size='10' name='rg' value='$xrg' onchange='consisteVazioTamanho(this.form, this.form.rg.name, 10)'>
                      </font>
            </td>
            <td bgcolor='#FFCC99' width='75'>
                <b><font size='1'>Emissor</font></b>
            </td>
            <td bgcolor='#FFCC99' width='190'>
                          <font size='1'>
                          <input type='text' size='10' name='rgemissor' value='$xrgemissor' onchange='consisteVazioTamanho(this.form, this.form.rgemissor.name, 5)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Data de Nascimento</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='10' name='datanasc' value='$xdatanasc' onchange='verificaData(this.form, this.form.datanasc.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Sexo</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <select name='sexo' size='1' width='1'>
                                                               <option value='M'>M</option>
                                                               <option value='F' >F</option>
                                                               <option selected value='$xsexo'>$xsexo</option>
                          </select>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Estado Civil</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'>
                          <select name='ecivil' size='1' width='10'>
                                                                 <option value='Solteiro' >Solteiro</option>
                                                                 <option value='Casado'>Casado</option>
                                                                 <option value='Separado Jud.' >Separado
                                                                 Jud.</option>
                                                                 <option value='Viúvo' >Viúvo</option>
                                                                 <option value='Divorciado' >Divorciado</option>
                                                                 <option value='Outros' >Outros</option>
                            <option value='$xecivil' selected>$xecivil</option>
                          </select>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Nacionalidade</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <select name='nacionalidade' size='1' width='10'>
                                                                 <option value='Brasileiro' >Brasileiro</option>
                                                                 <option value='Estrangeiro' >Estrangeiro</option>
                            <option selected value='$xnacionalidade'>$xnacionalidade</option>
                          </select>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>Endereço Residencial</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99' width='461'>
                          <font size='1'>
                          <input type='text' size='60' name='endereco' value='$xendereco' onchange='consisteVazioTamanho(this.form, this.form.endereco.name, 100)'>
                          </font>
            </td>
        </tr>
		 <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>Numero</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                          <font size='1'>
                          <input type='text' size='20' name='numero' value='$xnumero' onchange='consisteTamanho(this.form, this.form.numero.name, 50)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Complemento</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <input type='text' size='21'  name='complemento' value='$xcomplemento' >
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>Bairro</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                          <font size='1'>
                          <input type='text' size='20' name='bairro' value='$xbairro' onchange='consisteTamanho(this.form, this.form.bairro.name, 50)'>
                          </font>
            </td>
            <td bgcolor='#FFCC99' width='75'>
                <b><font size='1'>Cidade</font></b>
            </td>
            <td bgcolor='#FFCC99' width='190'>
                          <font size='1'>
                          <input type='text' size='21' maxlength='40' name='cidade' value='$xcidade' onchange='consisteVazioTamanho(this.form, this.form.cidade.name, 50)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>CEP</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                          <font size='1'>
                          <input type='text' size='9' name='cep' value='$xcep' onchange='consisteCEP(this.form, this.form.cep.name)'>
                          </font>
            </td>
            <td bgcolor='#FFCC99' width='75'>
                <b><font size='1'>Estado</font></b>
            </td>
            <td bgcolor='#FFCC99' width='190'>
                          <font size='1'>
                          <input type='text' name='estado' size='2' value='$xestado' onblur='consisteUF(this.form, this.form.estado.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Tempo de Residência</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'>
                          <select name='tempolocal' size='1' width='20'>
                                                                 <option value='até 1 ano' >até
                                                                 1 ano</option>
                                                                 <option value='de 1 a 2 anos' >de
                                                                 1 a 2 anos</option>
                                                                 <option value='de 2 a 5 anos' >de
                                                                 2 a 5 anos</option>
                                                                 <option value='mais de 5 anos' >mais
                                                                 de 5 anos</option>
                            <option value='$xtempolocal' selected>$xtempolocal</option>
                          </select>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Tipo Residência</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <select name='tipolocal' size='1' width='20'>
                                                                  <option value='própria quitada' >própria
                                                                  quitada</option>
                                                                  <option value='própria financiada' >própria
                                                                  financiada</option>
                                                                  <option value='com parentes/pais' >com
                                                                  parentes/pais</option>
                                                                  <option value='alugada' >alugada</option>
                                                                  <option value='funcional' >funcional</option>
                            <option selected value='$xtipolocal'>$xtipolocal</option>
                          </select>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Telefone</font></b>
            </td>
                    <td colspan=1 bgcolor='#D6E7EF' width='184'> <font size='1'><b>(</b>
                      <input type='text' size='3' name='dddtel1' value='$xdddtel1' onchange='consisteTamanhoNumerico(this.form, this.form.dddtel1.name, 3)'>
                      <b>) </b></font><font face='Arial'><font size='1'>
                      <input type='text' size='10' name='tel1' value='$xtel1' onChange='consisteTelefone(this.form, this.form.tel1.name, false)'>
                      </font></font><font size='1'>&nbsp; </font> </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Telefone 2</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
        <font face='Arial' size='1'>
                          <b>(</b><input type='text' size='3' name='dddtel2' value='$xdddtel2' onchange='consisteTamanhoNumerico(this.form, this.form.dddtel2.name, 3)'><b>) </b><input type='text' size='10' name='tel2' value='$xtel2' onchange='consisteTelefone(this.form, this.form.tel2.name, false)'>
        </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Empresa</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='60' name='c_empresa' value='$xc_empresa' onchange='consisteTamanho(this.form, this.form.c_empresa.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>CNPJ</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='17' name='c_cnpj' value='$xc_cnpj' onchange='consisteCGC(this.form, this.form.c_cnpj.name, false)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Tempo de Empresa</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <select name='c_tempoemp' size='1' width='20'>
                                                                 <option value='até 3 meses' >até
                                                                 3 meses</option>
                                                                 <option value='de 3 a 6 meses' >de
                                                                 3 a 6 meses</option>
                                                                 <option value='de 6 a 12 meses' >de
                                                                 6 a 12 meses</option>
                                                                 <option value='de 1 a 2 anos' >de
                                                                 1 a 2 anos</option>
                                                                 <option value='de 2 a 3 anos' >de
                                                                 2 a 3 anos</option>
                                                                 <option value='mais de 3 anos' >mais
                                                                 de 3 anos</option>
                            <option selected value='$xc_tempoemp'>$xc_tempoemp</option>
                          </select>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Ocupação</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'>
                          <select name='c_ocupacao' size='1' width='20'>
                                                                 <option value='Funcionário Público' >Funcionário
                                                                 Público</option>
                                                                 <option value='Militar' >Militar</option>
                                                                 <option value='Assalariado' >Assalariado</option>
                                                                 <option value='Profissional Liberal' >Profissional
                                                                 Liberal</option>
                                                                 <option value='Autônomo' >Autônomo</option>
                                                                 <option value='Aposentado/Pensionista' >Aposentado/Pensionista</option>
                                                                 <option value='Empresário/Sócio' >Empresário/Sócio</option>
                                                                 <option value='Outros' >Outros</option>
                            <option value='$xc_ocupacao' selected>$xc_ocupacao</option>
                          </select>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Descrição</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <input type='text' size='21' maxlength='40' name='c_descricao' value='$xc_descricao' onchange='consisteVazioTamanho(this.form, this.form.c_descricao.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Renda Mensal</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'>
                          <input type='text' size='10' name='c_rendamensal' value='$xc_rendamensal' onchange='consisteValor(this.form, this.form.c_rendamensal.name, true)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Outras Rendas</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <input type='text' size='10' name='c_outrasrendas' value='$xc_outrasrendas' onchange='consisteValor(this.form, this.form.c_outrasrendas.name, false)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Endereço Comercial</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='60' name='c_endereco' value='$xc_endereco' onchange='consisteVazioTamanho(this.form, this.form.c_endereco.name, 100)'>
                          </font>
            </td>
        </tr>
		
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Bairro</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'><input type='text' size='20' name='c_bairro' value='$xc_bairro' onchange='consisteTamanho(this.form, this.form.c_bairro.name, 50)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Cidade</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'><input type='text' size='21' maxlength='40' name='c_cidade' value='$xc_cidade' onchange='consisteVazioTamanho(this.form, this.form.c_cidade.name, 50)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>CEP</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'><input type='text' size='9' name='c_cep' value='$xc_cep' onchange='consisteCEP(this.form, this.form.c_cep.name)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Estado</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'><input type='text' name='c_estado' size='2' value='$xc_estado' onblur='consisteUF(this.form, this.form.c_estado.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'><b>(</b><input type='text' size='3' name='c_dddtel' value='$xc_dddtel' onchange='consisteTamanhoNumerico(this.form, this.form.c_dddtel.name, 3)'><b>) </b><input type='text' size='10' name='c_tel' value='$xc_tel' onchange='consisteTelefone(this.form, this.form.c_tel.name, false)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Ramal</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <input type='text' size='5' name='c_ramal' value='$xc_ramal' onchange='consisteTamanhoNumerico(this.form, this.form.c_ramal.name, 5)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Endereço Corresp.</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <select name='c_endcorresp' size='1' width='20'>
                                                                  <option value='Residencial' >Residencial</option>
                                                                  <option value='Comercial' >Comercial</option>
                            <option selected value='$xc_endcorresp'>$xc_endcorresp</option>
                          </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>

        <!-- INÍCIO DOS DADOS DO CÔNJUGE -->
        <p>
         
        </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td colspan='4' bgcolor='#93BEE2'>
                <b>
           <font size='4' face='Arial'>Dados do Cônjuge</font>
                </b>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='60' name='cj_nome' value='$xcj_nome' onchange='consisteVazioTamanho(this.form, this.form.cj_nome.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>CPF</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='17' name='cj_cpf' value='$xcj_cpf' onchange='consisteCPF(this.form, this.form.cj_cpf.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>RG</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                      <font size='1'>
                  	  <input type='text' size='10' name='cj_rg' value='$xcj_rg' onchange='consisteVazioTamanho(this.form, this.form.cj_rg.name, 10)'>
                      </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Emissor</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <input type='text' size='10' name='cj_rgemissor' value='$xcj_rgemissor' onchange='consisteVazioTamanho(this.form, this.form.cj_rgemissor.name, 5)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Data de Nascimento</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF' width='461'>
                          <font size='1'>
                          <input type='text' size='10' name='cj_datanasc' value='$xcj_datanasc' onchange='verificaData(this.form, this.form.cj_datanasc.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Empresa</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                          <font size='1'>
                          <input type='text' size='40' name='cj_empresa' value='$xcj_empresa' onchange='consisteTamanho(this.form, this.form.cj_empresa.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Ocupação</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF'>
                          <font size='1'><select name='cj_ocupacao' size='1' width='20'>
                                                                 <option value='Funcionário Público' >Funcionário
                                                                 Público</option>
                                                                 <option value='Militar' >Militar</option>
                                                                 <option value='Assalariado' >Assalariado</option>
                                                                 <option value='Profissional Liberal' >Profissional
                                                                 Liberal</option>
                                                                 <option value='Autônomo' >Autônomo</option>
                                                                 <option value='Aposentado/Pensionista' >Aposentado/Pensionista</option>
                                                                 <option value='Empresário/Sócio' >Empresário/Sócio</option>
                                                                 <option value='Outros' >Outros</option>
                            <option value='$xcj_ocupacao' selected>$xcj_ocupacao</option>
                          </select>
                          </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Descrição</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='21' maxlength='40' name='cj_descricao' value='$xcj_descricao' onchange='consisteVazioTamanho(this.form, this.form.cj_descricao.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td height='26' bgcolor='#D6E7EF'>
                <b><font size='1'>Renda Mensal</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='17' name='cj_rendamensal' value='$xcj_rendamensal' onchange='consisteValor(this.form, this.form.cj_rendamensal.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='cj_dddtel' value='$xcj_dddtel' onchange='consisteTamanhoNumerico(this.form, this.form.cj_dddtel.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='cj_tel' value='$xcj_tel' onchange='consisteTelefone(this.form, this.form.cj_tel.name, false)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Ramal</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='5' name='cj_ramal' value='$xcj_ramal' onchange='consisteTamanhoNumerico(this.form, this.form.cj_ramal.name, 5)'>
                          </font>
            </td>
        </tr>
        </font>
        </table>

        <!-- INÍCIO DOS DADOS DE REFERÊNCIA BANCÁRIA -->
        <p>
           
        </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td colspan='4' bgcolor='#93BEE2'>
        <font face='Arial'>
                <b>
           <font size='4' face='Arial' color='#000000'>Referência Bancária</font>
                </b>
        </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Banco</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                <font size='1'>
                <input type='text' name='rb_banco' size=35 value='$xrb_banco' onblur='consisteVazioTamanho(this.form, this.form.rb_banco.name, 100)'>
                &nbsp;
                </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Agência</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                <font size='1'>
                <input type='text' size='6' name='rb_agencia' value='$xrb_agencia' onchange='consisteTamanhoNumerico(this.form, this.form.rb_agencia.name, 6)'>
                </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Conta</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                <font size='1'>
                <input type='text' size='13' name='rb_conta' value='$xrb_conta' onchange='consisteTamanhoNumerico(this.form, this.form.rb_conta.name, 13)'><input type='text' size='2' name='rb_vconta' value='$xrb_vconta' onchange='consisteTamanho(this.form, this.form.rb_vconta.name, 2)'>
                </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Tipo</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                <font size='1'>
                <select name='rb_tipo' size='1' width='10'>
                                                         <option value='Corrente' >Corrente</option>
                                                         <option value='Poupança' >Poupança</option>
                  <option selected value='$xrb_tipo'>$xrb_tipo</option>
                </select>
                </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                          <b><font size='1'>(</font></b><font size='1'><input type='text' size='3' name='rb_dddtel' value='$xrb_dddtel' onchange='consisteTamanhoNumerico(this.form, this.form.rb_dddtel.name, 3)'></font><b><font size='1'>)
                          </font></b>
                          <font size='1'><input type='text' size='10' name='rb_tel' value='$xrb_tel' onchange='consisteTelefone(this.form, this.form.rb_tel.name, false)'></font>
            </td>
			
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Cliente desde</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                <font size='1'><select name='rb_clientedesde' size='1' width='20'>
                                                                 <option value='até 3 meses' >até
                                                                 3 meses</option>
                                                                 <option value='de 3 a 6 meses' >de
                                                                 3 a 6 meses</option>
                                                                 <option value='de 6 a 12 meses' >de
                                                                 6 a 12 meses</option>
                                                                 <option value='de 1 a 2 anos' >de
                                                                 1 a 2 anos</option>
                                                                 <option value='de 2 a 3 anos' >de
                                                                 2 a 3 anos</option>
                                                                 <option value='mais de 3 anos' >mais
                                                                 de 3 anos</option>
                  <option selected value='$xrb_clientedesde'>$xrb_clientedesde</option>
                </select>
                          </font>
            </td>
        </tr>
        </table>

        </font>
        <p>
          
        </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#93BEE2' colspan='2'>
                <b>
           <font size='4' face='Arial'>Referência Pessoal</font>
                </b>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='60' name='rp_nome1' value='$xrp_nome1' onchange='consisteVazioTamanho(this.form, this.form.rp_nome1.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='rp_dddtel1' value='$xrp_dddtel1' onchange='consisteTamanhoNumerico(this.form, this.form.rp_dddtel1.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='rp_tel1' value='$xrp_tel1' onchange='consisteTelefone(this.form, this.form.rp_tel1.name, false)'></font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='60' name='rp_nome2' value='$xrp_nome2' onchange='consisteVazioTamanho(this.form, this.form.rp_nome2.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='rp_dddtel2' value='$xrp_dddtel2' onchange='consisteTamanhoNumerico(this.form, this.form.rp_dddtel2.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='rp_tel2' value='$xrp_tel2' onchange='consisteTelefone(this.form, this.form.rp_tel2.name, false)'></font>
            </td>
        </tr>
        </font>
        </table>

        <!-- INÍCIO DOS DADOS LIVRES DO LOJISTA -->
        <p>
           
        </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#93BEE2' colspan='2'>
                <b>
           <font size='4' face='Arial'>Referência </font>
           <font size='4'>Comercial</font>
                </b>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='60' name='rc_nome1' value='$xrc_nome1' onchange='consisteVazioTamanho(this.form, this.form.rc_nome1.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='rc_dddtel1' value='$xrc_dddtel1' onchange='consisteTamanhoNumerico(this.form, this.form.rc_dddtel1.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='rc_tel1' value='$xrc_tel1' onchange='consisteTelefone(this.form, this.form.rc_tel1.name, false)'></font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='60' name='rc_nome2' value='$xrc_nome1' onchange='consisteVazioTamanho(this.form, this.form.rc_nome2.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='rc_dddtel2' value='$xrc_dddtel2' onchange='consisteTamanhoNumerico(this.form, this.form.rc_dddtel2.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='rc_tel2' value='$xrc_tel2' onchange='consisteTelefone(this.form, this.form.rc_tel2.name, false)'></font>
            </td>
        </tr>
        </font>
        </table>

        <!-- INÍCIO DOS DADOS LIVRES DO LOJISTA -->
        <p>
        </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Obs.</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                <font size='1'>
                <input type='text' size='60' maxlength='150' name='obsvend' value='$xobsvend' onchange='consisteTamanho(this.form, this.form.obsvend.name, 250)'>
                </font>
            </td>
        </tr>
        </font>
        </table>
  <p><br>
        </p>
");

if ($Action == "update" and $lock <> 1){
echo("
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#93BEE2' colspan='2' width='492'>
                <b><font size='4'>Formas de Pagamentos</font></b>
            </td>
        </tr>
        </font>

");

	
	$prod->listProdgeral("formapg", "padraoped = 'S'", $array45, $array_campo45, "order by opcaixa" );

	 for($i = 0; $i < count($array45); $i++ ){
			
			$prod->mostraProd( $array45, $array_campo45, $i );

			$opcaixa = $prod->showcampo0();
			$descricao = $prod->showcampo1();

			
	 for($l = 0; $l < count($xopcaixashow); $l++ ){

			if ($xopcaixashow[$l] == $opcaixa){$chk = "checked";}
			
	 }

echo("
        <tr>
            <td bgcolor='#D6E7EF' width='29'>
                <font size='1' face='Verdana'><b>$opcaixa</b></font>
            </td>
            <td bgcolor='#D6E7EF' width='445'>
                          <font face='Verdana' size='1'><b><input type='checkbox' name='opcaixav[$i]' value='$opcaixa' $chk>
                          $descricao</b></font>
            </td>
        </tr>
");
$chk = "";
	 }
	 echo("
        </table>

<input type='hidden' name='contopcaixa' value='$i'>

<BR>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Necessita de Assinatura do Contrato ?</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                <font size='1'><select name='asscontrato' size='1' width='20'>
                                                                 <option value='S' >S</option>
                                                                 <option value='N' >N</option>
                  <option selected value='$xasscontrato'>$xasscontrato</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
<br>
      
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Tipo de cliente para PIS/COFINS </font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                <font size='1'><select name='tipo_pis' size='1' width='20'>
                                                                 <option value='C'>C</option>
                                                                 <option value='R'>R</option>
																  <option value='X'>X</option>
                  <option selected value='$xtipo_pis'>$xtipo_pis</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
 <BR>
 
  <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#FFCC66'>
                <b><font size='1'>Autorização de Avalista </font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC66'>
                <font size='1'><select name='tipo_aval' size='1' width='20'>
                                                                 <option value='S'>S</option>
                                                                 <option value='N'>N</option>
									<option selected value='$xtipo_aval'>$xtipo_aval</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
	<br>	
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#666666'>
                <b><font size='1'>Blacklist - Cliente no jurídico </font></b>
            </td>
            <td colspan=3 bgcolor='#666666'>
                <font size='1'><select name='blacklist' size='1' width='20'>
                                                                 <option value='S'>S</option>
                                                                 <option value='N'>N</option>
									<option selected value='$xblacklist'>$xblacklist</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#FF0000'>
                <b><font size='1'>Cliente Perdido - Boletas Perdidas </font></b>
            </td>
            <td colspan=3 bgcolor='#FF0000'>
                <font size='1'><select name='pg_perdido' size='1' width='20'>
                                                                 <option value='S'>S</option>
                                                                 <option value='N'>N</option>
									<option selected value='$xpg_perdido'>$xpg_perdido</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#66FF99'>
                <b><font size='1'>Tipo Revenda - Cliente liberado para RMA </font></b>
            </td>
            <td colspan=3 bgcolor='#66FF99'>
                <font size='1'><select name='tipo_rev' size='1' width='20'>
                                                                 <option value='1'>1</option>
                                                                 <option value='0'>0</option>
									<option selected value='$xtipo_rev'>$xtipo_rev</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		
 <BR>
	<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Restrição de Crédito:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
                <textarea rows='3' name='rescredito' cols='42'>$xrescredito</textarea>
            </td>
        </tr>
	 ");
	if($codgrpselect == 2 or $codgrpselect == 58 ){ 

		
echo("
		 <tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Responsável pela Carteira:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
                 <select size='1' class=drpdwn name='respcart' >
                                   	");

	$prod->listProdgeral("vendedor", "block <> 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendcad = $prod->showcampo1();
			$nomevendcad = strtolower($nomevendcad);


	echo("		
		<option value='$nomevendcad'>$nomevendcad</option>
		");
	
	}
	
echo("	
    	<option value='$xlogincad' selected>$xlogincad</option>
			
	                                      </select>
            </td>
        </tr>
");
	}
echo("
        </font>
		<tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Meta Mensal:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
                <input type='text' size='10' name='meta' value='$xmeta' onchange='consisteValor(this.form, this.form.meta.name, true)'>
            </td>
        </tr>
		<tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Limite Credito:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
               <input type='text' size='10' name='lim_credito' value='$xlim_credito' onchange='consisteValor(this.form, this.form.lim_credito.name, true)'>
            </td>
        </tr>
        </table>



");



}


echo("

<p>
          
        </p>

        <div align = center>
                            <center>
                            <table>
                            <tr>
                                <td>
                                    <input class='sbttn' type='submit' name='Submit' value='ENVIA DADOS'>
                                </td>
                                
                            </tr>
                            </table>
                            </center>
        </div>
    </td>
</tr>
</table>
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codcliente' value='$xcodcliente'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
                <input type='hidden' name='pgold' value='$pgold'>
				  <input type='hidden' name='tipocliente' value='$tipopessoa'>
				  <input type='hidden' name='codcliente_pri' value='$codcliente_pri'>
				    <input type='hidden' name='lock' value='$lock'>

");
				  if ($addsocio == 1){
						echo("<input type='hidden' name='csocio' value='1'>");
				  }
echo("
				
</form>


<!-- FIM DO FORM DE INCLUSÃO DE PROPOSTAS PESSOA FÍSICA -->
					   </TD>
                                                      </TR>
                                                      </TABLE>
  </center>

</div>

");
if ($lock <> 1){
echo("
<form method='POST' action='$PHP_SELP?Action=addvisita'>
  <div align='center'>
    <center>
    <table border='0' width='550' cellpadding='2' height='7'>
      <tr>
        <td width='540' colspan='2' bgcolor='#FF9933' height='1'><b><font face='Verdana' size='1' color='#000000'>VISITAS
          AOS CLIENTES:</font></b></td>
      </tr>
      <tr>
        <td width='154' bgcolor='#F3D5C2' height='21'><font face='Verdana' size='1'>ESCOLHA
          DO VENDEDOR</font></td>
        <td width='378' bgcolor='#F3D5C2' height='21'>   <select size='1' class=drpdwn name='respvisita' >
                                   	");

	$prod->listProdgeral("vendedor", "block <> 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendcad = $prod->showcampo1();
			$nomevendcad = strtolower($nomevendcad);


	echo("		
		<option value='$nomevendcad'>$nomevendcad</option>
		");
	
	}
		
echo("	
    	<option value='' selected>ESCOLHA</option>
			
	     </select>
	
	<input type='submit' value='ADICIONAR VISITA' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>
		 	  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codcliente' value='$xcodcliente'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
				  <input type='hidden' name='pgold' value='$pgold'>
				  <input type='hidden' name='tipocliente' value='$tipopessoa'>
				  <input type='hidden' name='tipopessoa' value='$tipopessoa'>
				  <input type='hidden' name='lock' value='$lock'>
</form>
											  
");

} //LOCK
}



}else{



/// INICIO ----- FORMULARIO PESSOA JURIDICA
echo("
<div align='center'>
   <center>
                                                      <TABLE width='500'>
                                                      <TR>
                                                          <TD bgcolor='#93BEE2'>

<!-- INÍCIO DO FORM DE INCLUSÃO DE PROPOSTAS PESSOA JURÍDICA -->

<form action='$PHP_SELF?Action=$Action' method='POST' name='Form' onSubmit = 'if (verificaObrigJuridica(document.Form)==false) return false'>
<TABLE BORDER='0' CELLPADDING='15' CELLSPACING='0' BGCOLOR='#FFFFFF' BORDERCOLOR='#93BEE2'>

<TR>
    <TD>
        <!-- INÍCIO DOS DADOS DO CLIENTE -->
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td colspan='4' bgcolor='#93BEE2'>
                <font color='#000000'><b>
           <font size='4' face='Arial'>Dados da Empresa</font> </b>&nbsp;</font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99'>
                <b><font size='1'>Razão Social</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99'>
                          <font size='1'>
                          <input type='text' size='60' name='nome' value='$xnome' onchange='consisteVazioTamanho(this.form, this.form.nome.name, 100)'>
                          </font>
            </td>
        </tr>
		 <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome Fantasia</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                          <font size='1'>
                          <input type='text' size='60' name='nome_fantasia' value='$xnome_fantasia' >
                          </font>
            </td>
        </tr>
	    <tr>
            <td width='65' height='24' bgcolor='#FFCC99'>
                <b><font size='1'>Email</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99' width='461'>
                          <font size='1'>
                          <input name='email' type='text' onChange='consisteVazioTamanho(this.form, this.form.email.name, 100)' value='$xemail' size='30' >
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99'>
                <b><font size='1'>CNPJ</font></b>
            </td>
            <td bgcolor='#FFCC99'>
                          <font size='1'>
                          <input type='text' size='19' name='cnpj' value='$xcnpj' onchange='consisteCGC(this.form, this.form.cnpj.name, true)'>
                          </font>
            </td>
            <td bgcolor='#FFCC99'>
                          <font size='1'><b>Insc. Estadual</b></font>
            </td>
            <td bgcolor='#FFCC99'>
                          <font size='1'><input type='text' size='21' maxlength='40' name='ie' value='$xie' onchange='consisteVazioTamanho(this.form, this.form.ie.name, 50)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Data da Ativação</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                          <font size='1'>
                          <input type='text' size='10' name='dataativ' value='$xdataativ' onchange='verificaData(this.form, this.form.dataativ.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>Endereço Comercial</font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC99' width='461'>
                          <font size='1'>
                          <input type='text' size='60' name='endereco' value='$xendereco' onchange='consisteVazioTamanho(this.form, this.form.endereco.name, 100)'>
                          </font>
            </td>
        </tr>
		 <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>Numero</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                          <font size='1'>
                          <input type='text' size='20' name='numero' value='$xnumero' onchange='consisteTamanho(this.form, this.form.numero.name, 50)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Complemento</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='190'>
                          <font size='1'>
                          <input type='text' size='21'  name='complemento' value='$xcomplemento' onchange='consisteVazioTamanho(this.form, this.form.complemento.name, 50)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>Bairro</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                          <font size='1'>
                          <input name='bairro' type='text' id='bairro' onchange='consisteTamanho(this.form, this.form.bairro.name, 50)' value='$xbairro' size='20'>
                          </font>
            </td>
            <td bgcolor='#FFCC99' width='75'>
                <b><font size='1'>Cidade</font></b>
            </td>
            <td bgcolor='#FFCC99' width='190'>
                          <font size='1'>
                          <input type='text' size='21' maxlength='40' name='cidade' value='$xcidade' onchange='consisteVazioTamanho(this.form, this.form.cidade.name, 50)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFCC99' width='65'>
                <b><font size='1'>CEP</font></b>
            </td>
            <td colspan=1 bgcolor='#FFCC99' width='184'>
                          <font size='1'>
                          <input type='text' size='9' name='cep' value='$xcep' onchange='consisteCEP(this.form, this.form.cep.name)'>
                          </font>
            </td>
            <td bgcolor='#FFCC99' width='75'>
                <b><font size='1'>Estado</font></b>
            </td>
            <td bgcolor='#FFCC99' width='190'>
                          <font size='1'>
                          <input type='text' name='estado' size='2' value='$xestado' onblur='consisteUF(this.form, this.form.estado.name, true)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF' width='65'>
                <b><font size='1'>Tempo no Local</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF' width='184'>
                          <font size='1'>
                          <select name='tempolocal' size='1' width='20'>
                                                                 <option value='até 1 ano' >até
                                                                 1 ano</option>
                                                                 <option value='de 1 a 2 anos' >de
                                                                 1 a 2 anos</option>
                                                                 <option value='de 2 a 5 anos' >de
                                                                 2 a 5 anos</option>
                                                                 <option value='mais de 5 anos' >mais
                                                                 de 5 anos</option>
                            <option value='$xtempolocal' selected>$xtempolocal</option>
                          </select>
                          </font>
            </td>
            <td bgcolor='#D6E7EF' width='75'>
                <b><font size='1'>Tipo </font></b>
                <font size='1'><b>de Local</b></font>
            </td>
                    <td bgcolor='#D6E7EF' width='190'> <font size='1'>&nbsp; </font><font face='Arial'><font size='1'>
                      <select name='tipolocal' size='1' width='20'>
                        <option value='próprio quitado' >próprio quitado</option>
                        <option value='próprio financiado' >próprio financiado</option>
                        <option value='alugado' >alugado</option>
                        <option value='funcional' >funcional</option>
                        <option selected value='$xtipolocal'>$xtipolocal</option>
                      </select>
                      </font></font> </td>
        </tr>
        <tr>
			<td bgcolor='#D6E7EF'>
                <b><font size='1'>Contato Comprador</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='20' name='contatocomprador' value='$xcontatocomprador'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone Comprador</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b><input type='text' size='3' name='dddtel1' value='$xdddtel1' onchange='consisteTamanhoNumerico(this.form, this.form.dddtel1.name, 3)'><b>) </b><input type='text' size='10' name='tel1' value='$xtel1' onchange='consisteTelefone(this.form, this.form.tel1.name, false)'>
                          </font>
            </td>
          
        </tr>
		 <tr>
           <td bgcolor='#D6E7EF'>
                <b><font size='1'>Contato Financeiro</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='20' name='contatofinanceiro' value='$xcontatofinanceiro'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone Financeiro</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font face='Arial' size='1'><b>(</b><input type='text' size='3' name='dddtel2' value='$xdddtel2' onchange='consisteTamanhoNumerico(this.form, this.form.dddtel2.name, 3)'><b>) </b><input type='text' size='10' name='tel2' value='$xtel2' onchange='consisteTelefone(this.form, this.form.tel2.name, false)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>FAX</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font face='Arial' size='1'><b>(</b><input type='text' size='3' name='dddfax' value='$xdddtel2' onchange='consisteTamanhoNumerico(this.form, this.form.dddfax.name, 3)'><b>) </b><input type='text' size='10' name='fax' value='$xfax' onchange='consisteTelefone(this.form, this.form.fax.name, false)'>
                          </font>
            </td>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Faturamento Mensal</font></b>
            </td>
            <td colspan=1 bgcolor='#D6E7EF'>
                          <font size='1'>
                          <input type='text' size='10' name='fatmensal' value='$xfatmensal' onchange='consisteValor(this.form, this.form.fatmensal.name, true)'>
                          </font>
            </td>
        </tr>
        </font>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Atividade</font></b>
            </td>
            <td bgcolor='#D6E7EF' colspan='3'>
                          <font size='1'>
                          <input type='text' name='atividade' size='52' value='$xatividade'>
                          </font>
            </td>
        </tr>
        </table>

                <p>
                  <!-- INÍCIO DOS DADOS DE REFERÊNCIA BANCÁRIA -->
                <table width='500'>
                  <tr> 
                    <td colspan='4' bgcolor='#93BEE2'> <font face='Arial'> <b> 
                      <font size='4' color='#000000'>Referência Bancária</font> 
                      </b> </font> </td>
                  </tr>
                  <tr> 
                    <td bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>Banco</font></b> 
                      </font></td>
                    <td bgcolor='#D6E7EF'> <font size='1' face='Arial'> 
                      <input type='text' name='rb_banco' size=35 value='$xrb_banco' onblur='consisteVazioTamanho(this.form, this.form.rb_banco.name, 100)'>
                      &nbsp; </font> </td>
                    <td bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>Agência</font></b> 
                      </font></td>
                    <td bgcolor='#D6E7EF'> <font size='1' face='Arial'> 
                      <input type='text' size='6' name='rb_agencia' value='$xrb_agencia' onchange='consisteTamanhoNumerico(this.form, this.form.rb_agencia.name, 6)'>
                      </font> </td>
                  </tr>
                  <tr> 
                    <td bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>Conta</font></b> 
                      </font></td>
                    <td bgcolor='#D6E7EF'> <font size='1' face='Arial'> 
                      <input type='text' size='13' name='rb_conta' value='$xrb_conta' onchange='consisteTamanhoNumerico(this.form, this.form.rb_conta.name, 13)'>
                      <input type='text' size='2' name='rb_vconta' value='$xrb_vconta' onchange='consisteTamanho(this.form, this.form.rb_vconta.name, 2)'>
                      </font> </td>
                    <td bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>Tipo</font></b> 
                      </font></td>
                    <td bgcolor='#D6E7EF'> <font size='1' face='Arial'> 
                      <select name='rb_tipo' size='1' width='10'>
                        <option value='Corrente' >Corrente</option>
                        <option value='Poupança' >Poupança</option>
                        <option selected value='$xrb_tipo'>$xrb_tipo</option>
                      </select>
                      </font> </td>
                  </tr>
                  <tr> 
                    <td bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>Telefone</font></b> 
                      </font></td>
                    <td colspan=3 bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>(</font></b><font size='1'>
                      <input type='text' size='3' name='rb_dddtel' value='$xrb_dddtel' onchange='consisteTamanhoNumerico(this.form, this.form.rb_dddtel.name, 3)'>
                      <b>) </b></font> <font size='1'>
                      <input type='text' size='10' name='rb_tel' value='$xrb_tel' onchange='consisteTelefone(this.form, this.form.rb_tel.name, false)'>
                      </font></font> </td>
                  </tr>
                  <tr> 
                    <td bgcolor='#D6E7EF'> <font face='Arial'><b><font size='1'>Cliente 
                      desde</font></b> </font></td>
                    <td colspan=3 bgcolor='#D6E7EF'> <font size='1' face='Arial'>
                      <select name='rb_clientedesde' size='1' width='20'>
                        <option value='até 3 meses' >até 3 meses</option>
                        <option value='de 3 a 6 meses' >de 3 a 6 meses</option>
                        <option value='de 6 a 12 meses' >de 6 a 12 meses</option>
                        <option value='de 1 a 2 anos' >de 1 a 2 anos</option>
                        <option value='de 2 a 3 anos' >de 2 a 3 anos</option>
                        <option value='mais de 3 anos' >mais de 3 anos</option>
                        <option selected value='$xrb_clientedesde'>$xrb_clientedesde</option>
                      </select>
                      </font> </td>
                  </tr>
                </table>
                <p></p>
        <p>
           
        </p>

        <!-- INÍCIO DOS DADOS LIVRES DO LOJISTA -->
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#93BEE2' colspan='2'>
                <b>
           <font size='4' face='Arial'>Referência </font>
           <font size='4'>Comercial</font>
                </b>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='60' name='rc_nome1' value='$xrc_nome1' onchange='consisteVazioTamanho(this.form, this.form.rc_nome1.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='rc_dddtel1' value='$xrc_dddtel1' onchange='consisteTamanhoNumerico(this.form, this.form.rc_dddtel1.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='rc_tel1' value='$xrc_tel1' onchange='consisteTelefone(this.form, this.form.rc_tel1.name, false)'></font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Nome</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><input type='text' size='60' name='rc_nome2' value='$xrc_nome2' onchange='consisteVazioTamanho(this.form, this.form.rc_nome2.name, 100)'>
                          </font>
            </td>
        </tr>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Telefone</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                          <font size='1'><b>(</b></font><font size='1'><input type='text' size='3' name='rc_dddtel2' value='$xrc_dddtel2' onchange='consisteTamanhoNumerico(this.form, this.form.rc_dddtel2.name, 3)'></font><font size='1'><b>) </b>
                          </font>
                          <font size='1'><input type='text' size='10' name='rc_tel2' value='$xrc_tel2' onchange='consisteTelefone(this.form, this.form.rc_tel2.name, false)'></font>
            </td>
        </tr>
        </font>
        </table>

                <p> 
                  <!-- INÍCIO DOS DADOS LIVRES DO LOJISTA -->
                </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Obs.</font></b>
            </td>
            <td bgcolor='#D6E7EF'>
                <font size='1'>
                <input type='text' size='60' maxlength='150' name='obsvend' value='$xobsvend' onchange='consisteTamanho(this.form, this.form.obsvend.name, 250)'>
                </font>
            </td>
        </tr>


        </font>
        </table>
 <p><br>
        </p>

	

");
if ($Action == "update" and $lock <> 1){

echo("

		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#93BEE2' colspan='2' width='492'>
                <b><font size='4'>Formas de Pagamentos</font></b>
            </td>
        </tr>
        </font>

");

	
	$prod->listProdgeral("formapg", "padraoped = 'S'", $array45, $array_campo45, "order by opcaixa" );

	 for($i = 0; $i < count($array45); $i++ ){
			
			$prod->mostraProd( $array45, $array_campo45, $i );

			$opcaixa = $prod->showcampo0();
			$descricao = $prod->showcampo1();

			
	 for($l = 0; $l < count($xopcaixashow); $l++ ){

			if ($xopcaixashow[$l] == $opcaixa){$chk = "checked";}
			
	 }

echo("
        <tr>
            <td bgcolor='#D6E7EF' width='29'>
                <font size='1' face='Verdana'><b>$opcaixa</b></font>
            </td>
            <td bgcolor='#D6E7EF' width='445'>
                          <font face='Verdana' size='1'><b><input type='checkbox' name='opcaixav[$i]' value='$opcaixa' $chk>
                          $descricao</b></font>
            </td>
        </tr>
");
$chk = "";
	 }
	 echo("
        </table>

<input type='hidden' name='contopcaixa' value='$i'>

				<p>
        </p>
        <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Necessita de Assinatura do Contrato ?</font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                <font size='1'><select name='asscontrato' size='1' width='20'>
                                                                 <option value='S' >S</option>
                                                                 <option value='N' >N</option>
                  <option selected value='$xasscontrato'>$xasscontrato</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		<BR>
		     <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF'>
                <b><font size='1'>Tipo de cliente para PIS/COFINS </font></b>
            </td>
            <td colspan=3 bgcolor='#D6E7EF'>
                <font size='1'><select name='tipo_pis' size='1' width='20'>
                                                                 <option value='C'>C</option>
                                                                 <option value='R'>R</option>
																  <option value='X'>X</option>
                  <option selected value='$xtipo_pis'>$xtipo_pis</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		<BR>
 
  <table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#FFCC66'>
                <b><font size='1'>Autorização de Avalista </font></b>
            </td>
            <td colspan=3 bgcolor='#FFCC66'>
                <font size='1'><select name='tipo_aval' size='1' width='20'>
                                                                 <option value='S'>S</option>
                                                                 <option value='N'>N</option>
									<option selected value='$xtipo_aval'>$xtipo_aval</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
			<br>	
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#666666'>
                <b><font size='1'>Blacklist - Cliente no jurídico </font></b>
            </td>
            <td colspan=3 bgcolor='#666666'>
                <font size='1'><select name='blacklist' size='1' width='20'>
                                                                 <option value='S'>S</option>
                                                                 <option value='N'>N</option>
									<option selected value='$xblacklist'>$xblacklist</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#FF0000'>
                <b><font size='1'>Cliente Perdido - Boletas Perdidas </font></b>
            </td>
            <td colspan=3 bgcolor='#FF0000'>
                <font size='1'><select name='pg_perdido' size='1' width='20'>
                                                                 <option value='S'>S</option>
                                                                 <option value='N'>N</option>
									<option selected value='$xpg_perdido'>$xpg_perdido</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		
		<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#66FF99'>
                <b><font size='1'>Tipo Revenda - Cliente liberado para RMA </font></b>
            </td>
            <td colspan=3 bgcolor='#66FF99'>
                <font size='1'><select name='tipo_rev' size='1' width='20'>
                                                                 <option value='1'>1</option>
                                                                 <option value='0'>0</option>
									<option selected value='$xtipo_rev'>$xtipo_rev</option>
                </select>
                          </font>
            </td>
        </tr>
        </font>
        </table>
		
 <BR>
						<table width='500'>
        <font face='Arial'>
        <tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Restrição de Crédito:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
                <textarea rows='3' name='rescredito' cols='42'>$xrescredito</textarea>
            </td>
        </tr>
");
	if($codgrpselect == 2 or $codgrpselect == 58){ 

		
echo("
		 <tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Responsável pela Carteira:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
                 <select size='1' class=drpdwn name='respcart' >
                                   	");

	$prod->listProdgeral("vendedor", "block <> 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendcad = $prod->showcampo1();
			$nomevendcad = strtolower($nomevendcad);


	echo("		
		<option value='$nomevendcad'>$nomevendcad</option>
		");
	
	}
	
echo("	
    	<option value='$xlogincad' selected>$xlogincad</option>
			
	                                      </select>
            </td>
        </tr>
");
	}
echo("
        </font>
		<tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Meta Mensal:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
                <input type='text' size='10' name='meta' value='$xmeta' onchange='consisteValor(this.form, this.form.meta.name, true)'>
            </td>
        </tr>
		<tr>
            <td bgcolor='#D6E7EF' width='119'>
                <b><font size='1'>Limite Credito:</font></b>
            </td>
            <td bgcolor='#D6E7EF' width='367'>
               <input type='text' size='10' name='lim_credito' value='$xlim_credito' onchange='consisteValor(this.form, this.form.lim_credito.name, true)'>
            </td>
        </tr>
        </table>


  
");

}
echo("


        <div align = center>
                            <center>
                            <table>
                            <tr>
                                <td>
                                    <input class='sbttn' type='submit' name='Submit' value='ENVIA DADOS'>
                                </td>
                               
                            </tr>
                            </table>
                            </center>
        </div>
    </TD>
</TR>
</TABLE>

				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codcliente' value='$xcodcliente'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
				  <input type='hidden' name='pgold' value='$pgold'>
				  <input type='hidden' name='tipocliente' value='$tipopessoa'>
				  <input type='hidden' name='tipopessoa' value='$tipopessoa'>
				  <input type='hidden' name='lock' value='$lock'>

</form>

	

<!-- FIM DO FORM DE INCLUSÃO DE PROPOSTAS PESSOA JURÍDICA -->

                                                          </TD>
                                                      </TR>
                                                      </TABLE>
  </center>

");
if ($lock <> 1){
echo("
</div>
<form method='POST' action='$PHP_SELP?Action=addvisita'>
  <div align='center'>
    <center>
    <table border='0' width='550' cellpadding='2' height='7'>
      <tr>
        <td width='540' colspan='2' bgcolor='#FF9933' height='1'><b><font face='Verdana' size='1' color='#000000'>VISITAS
          AOS CLIENTES:</font></b></td>
      </tr>
      <tr>
        <td width='154' bgcolor='#F3D5C2' height='21'><font face='Verdana' size='1'>ESCOLHA
          DO VENDEDOR</font></td>
        <td width='378' bgcolor='#F3D5C2' height='21'>   <select size='1' class=drpdwn name='respvisita' >
                                   	");

	$prod->listProdgeral("vendedor", "block <> 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendcad = $prod->showcampo1();
			$nomevendcad = strtolower($nomevendcad);


	echo("		
		<option value='$nomevendcad'>$nomevendcad</option>
		");
	
	}
		
echo("	
    	<option value='' selected>ESCOLHA</option>
			
	     </select>
	
	<input type='submit' value='ADICIONAR VISITA' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>
		
	  <input type='hidden' name='retorno' value='1'>
		  <input type='hidden' name='palavrachave' value='$palavrachave'>
		  <input type='hidden' name='desloc' value='$desloc'>
		  <input type='hidden' name='codcliente' value='$xcodcliente'>
		  <input type='hidden' name='operador' value='$operador'>
		  <input type='hidden' name='pagina' value='$pagina'>
		  <input type='hidden' name='retlogin' value='$retlogin'>
		  <input type='hidden' name='connectok' value='$connectok'>
		  <input type='hidden' name='pg' value='$pg'>
		  <input type='hidden' name='pgold' value='$pgold'>
		  <input type='hidden' name='tipocliente' value='$tipopessoa'>
		  <input type='hidden' name='tipopessoa' value='$tipopessoa'>
		  <input type='hidden' name='lock' value='$lock'>
		
</form>


");

} // LOCK

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////
}

/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	echo("
	
		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list"){
/// CONTADOR DE PAGINAS ////

/// Complemento para a parte de mudanca de pagina
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg&lock=$lock";  


include("numcontg.php");
}

if ($lock <> 1){include ("sif-rodape.php");}

}
?>
       
