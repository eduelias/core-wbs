<?php

//require("../classprod.php");

// CLASSE DO CEP
require_once(DIR_SISTEMA."/".DIR_MODULOS."/modulo_pedido/start_pesq_cep.php");

// INICIO DA CLASSE
$prod = new operacao();



$dataatual = $prod->gdata();

switch ($Action) {
    case "Procurar" :
        // Procura cliente com o CPF informado
        $prod->clear();
        $prod->listProdU("codcliente", "clientenovo", "cpf= '$frmCPF' AND tipocliente = 'F'");
        
        $codcliente = $prod->showcampo0();
        
        if ($codcliente != "") {
            $prod->clear();
            $prod->listProd("clientenovo", "codcliente = '$codcliente'");
            // Cliente existe -> UPDATE
            $tipogravar = "UPDATE";

            // Dados do Cliente
    		$xcodcliente=	$prod->showcampo0();
    		$frmNome = 		$prod->showcampo1();
    		$xdatacad=		$prod->showcampo2();
    		$xtipocliente=	$prod->showcampo3();
    		$frmCPF=			$prod->showcampo4();
    		$frmRG=			$prod->showcampo6();
    		$frmRGEmissor=	$prod->showcampo7();
    		$frmNasc=		$prod->showcampo9();
    		$frmNasc=    $prod->fdata($frmNasc);
    		$xdataativ=		$prod->showcampo10();
    		$xdataativ =    $prod->fdata($xdataativ);
    		$frmSexo=			$prod->showcampo11();
    		$frmEstadoCivil=		$prod->showcampo12();
    		$frmNacionalidade=$prod->showcampo13();
    		$frmEndereco=		$prod->showcampo14();
    		$frmBairro=		$prod->showcampo15();
    		$frmCidade=		$prod->showcampo16();
    		$xcep=			$prod->showcampo17();
   	    	$xcep = str_replace('-','',$xcep);
	       	$frmCEP= $xcep;
    		$frmUF=		$prod->showcampo18();
    		$frmTempoResidencia=	$prod->showcampo19();
    		$frmResidencia=	$prod->showcampo20();
    		$frmDDD=		$prod->showcampo21();
    		$frmTelefone=	$prod->showcampo22();
    		$frmDDD2=		$prod->showcampo23();
    		$frmTelefone2=	$prod->showcampo24();
    		$frmRamal=		$prod->showcampo25();
    		$frmSalario=	$prod->showcampo26();
    		$frmCatProf=	$prod->showcampo27();

            // Dados da Empresa Cliente
    		$frmEmpNome=	$prod->showcampo28();
    		$frmEmpCNPJ=		$prod->showcampo29();
    		$frmTrabalhotempo=	$prod->showcampo30();
    		$frmCatProf=	$prod->showcampo31();
    		$frmRamoProf=	$prod->showcampo32();
    		$frmSalario=$prod->showcampo33();
    		$frmEmpEndereco=	$prod->showcampo35();
    		$frmEmpBairro=		$prod->showcampo36();
    		$frmEmpCidade=		$prod->showcampo37();
    		$xc_cep=		$prod->showcampo38();
    		$xc_cep = str_replace('-','',$xc_cep);
    		$frmEmpCEP = $xc_cep;
    		$frmEmpUF=		$prod->showcampo39();
    		$frmEmpDDD=		$prod->showcampo40();
    		$frmEmpTelefone=		$prod->showcampo41();
    		$frmEmpRamal=		$prod->showcampo42();
    		$frmCorrespondencia=	$prod->showcampo43();

            // Dados do Conjuge
    		$frmNomeConj=		$prod->showcampo44();
    		$frmCPFConj=		$prod->showcampo45();
    		$frmRGConj=		$prod->showcampo46();
    		$frmRGEmissorConj=	$prod->showcampo47();
    		$xcj_datanasc=	$prod->showcampo48();
    		$frmNasConj = $prod->fdata($xcj_datanasc);
    		$frmEmpConj=	$prod->showcampo49();
    		$frmOcupConj=	$prod->showcampo50();
    		$frmFuncConj=	$prod->showcampo51();
    		$frmRendaConj=$prod->showcampo52();
    		$frmDDDEmpConj=	$prod->showcampo53();
    		$frmTelEmpConj=		$prod->showcampo54();
    		$frmRamalEmpConj=		$prod->showcampo55();

            // Referencia Bancaria
    		$frmBanco=		$prod->showcampo56();
    		$frmAgencia=	$prod->showcampo57();
    		$frmContaCorrente=		$prod->showcampo58();
    		$frmBancoContaTipo=		$prod->showcampo59();
    		$frmBancoDDD=	$prod->showcampo60();
    		$frmBancoTelefone=		$prod->showcampo61();
    		$frmBancoClienteDesde=$prod->showcampo62();

            // Referencia Pessoal
    		$frmRefParentescoNome=		$prod->showcampo63();
    		$frmRefParentescoDDD=	$prod->showcampo64();
    		$frmRefParentescoTelefone=		$prod->showcampo65();
    		$xrp_nome2=		$prod->showcampo66();
    		$xrp_dddtel2=	$prod->showcampo67();
    		$xrp_tel2=		$prod->showcampo68();

            // Referencia Comercial
    		$frmRefComercialNome=		$prod->showcampo69();
    		$frmRefComercialDDD=	$prod->showcampo70();
    		$frmRefComercialTelefone=		$prod->showcampo71();
    		$xrc_nome2=		$prod->showcampo72();
    		$xrc_dddtel2=	$prod->showcampo73();
    		$xrc_tel2=		$prod->showcampo74();

            // Outros
    		$frmOBS=		$prod->showcampo75();
    		$xobscredito=	$prod->showcampo76();
    		$frmEmail=		$prod->showcampo77();
    		$xdataatualiza =	$prod->showcampo78();
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
   			$xdatadono =	$prod->showcampo88();
   			
    		$frmRGEmissao = $prod->showcampo89();
    		$frmNumero = $prod->showcampo90();
    		$frmComplemento = $prod->showcampo91();
    		$frmPai = $prod->showcampo92();
    		$frmMae = $prod->showcampo93();
    		$frmEmpTipo = $prod->showcampo94();
    		$frmEmpNumero = $prod->showcampo95();
    		$frmEmpComplemento = $prod->showcampo96();
    		
    		$datacadf = $prod->fdata($xdatacad); // ALTERADO
			$datahoje = $prod->gdata();// ALTERADO
			$difdias_dono = $prod->numdias($xdatadono,$datahoje);
			
   			if ($difdias_dono > 90){$block_dono = 0;}
    		else{if ($xlogincad <> $login_vend){$block_dono = 1;}}
           

        } else {
            // Não existe cliente com o CPF informado
            // Preencha o formulário
            $cpf_nao_existe = "1";
        }
        
        break;

        case "CEP" :

        
         // CEP Residencial
            if ($frmCEP <> "" and $pesq_cep == 1)
            {
                $sc = new CEP();
                $res = $sc->busca($frmCEP, $erro1);

    	       	if ($erro1 == "")
                {
                    $frmEndereco = $res['logradouro']." ".$res['endereco'];
                    $frmNumero = "";
                    $frmComplemento = "";
                    $frmBairro =  $res['bairro'];
                    $frmCidade = $res['cidade'];
                    $frmUF = $res['uf'];
                    $frmCEP = $frmCEP;
                }
	       	}

	       	// CEP Empresa
	       	if ($frmEmpCEP <> "" AND $pesq_cep == 2)
	       	{
                $sc = new CEP();
                $res = $sc->busca($frmEmpCEP, $erro2);

                if ($erro2 == "")
                {
                    $frmEmpEndereco = $res['logradouro']." ".$res['endereco'];
                    $frmEmpNumero = "";
                    $frmEmpComplemento = "";
                    $frmEmpBairro =  $res['bairro'];
                    $frmEmpCidade = $res['cidade'];
                    $frmEmpUF = $res['uf'];
                    $frmEmpCEP = $frmEmpCEP;
                }
            }


        break;
        
    case "Gravar" :
    
        $prod->clear();
        $prod->listProdU("codcliente", "clientenovo", "cpf= '$frmCPF' AND tipocliente = 'F'");
        $codcliente = $prod->showcampo0();

        if ($frmCPF <> $frmCPF_pesq){$block_cpf =1;}

        if (($codcliente == "" or $tipogravar == "UPDATE") and $block_cpf <> 1) {

            $prod->clear();
        
            if ($tipogravar == "UPDATE")
            {
                $prod->listProd("clientenovo", "codcliente = '$codcliente'");
            }
            
            // Dados do Cliente
			$prod->setcampo1($frmNome);
			$prod->setcampo2($xdatacad);
			$prod->setcampo3("F");
			$prod->setcampo4($frmCPF);
			$prod->setcampo6($frmRG);
			$prod->setcampo7($frmRGEmissor);
			$datanew = str_replace('/','',$frmNasc);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo9($data);
			$datanew2 = str_replace('/','',$dataativ);
			$ano2 = substr($datanew2,4,4);
			$mes2 = substr($datanew2,2,2);
			$dia2 = substr($datanew2,0,2);
			$data2 = $ano2 . $mes2 . $dia2;
			$prod->setcampo10($data2);
			$prod->setcampo11($frmSexo);
			$prod->setcampo12($frmEstadoCivil);
			$prod->setcampo13($frmNacionalidade);
			$prod->setcampo14($frmEndereco);
			// FALTA NUMERO
			// FALTA COMPLEMENTO
			$prod->setcampo15($frmBairro);
			$prod->setcampo16($frmCidade);
			$prod->setcampo17($frmCEP);
			$prod->setcampo18($frmUF);
			$prod->setcampo19($frmTempoResidencia);
			$prod->setcampo20($frmResidencia);
			$prod->setcampo21($frmDDD);
			$prod->setcampo22($frmTelefone);
			$prod->setcampo23($frmDDD2);
			$prod->setcampo24($frmTelefone2);
			$prod->setcampo25($frmRamal);

    		// Dados da Empresa Cliente
			$prod->setcampo28($frmEmpNome);
			$prod->setcampo29($frmEmpCNPJ);
			$prod->setcampo30($frmTrabalhotempo);
			$prod->setcampo31($frmCatProf);
			$prod->setcampo32($frmRamoProf);
			$prod->setcampo33($frmSalario);
			$prod->setcampo35($frmEmpEndereco);
			$prod->setcampo36($frmEmpBairro);
			$prod->setcampo37($frmEmpCidade);
			$prod->setcampo38($frmEmpCEP);
			$prod->setcampo39($frmEmpUF);
			$prod->setcampo40($frmEmpDDD);
			$prod->setcampo41($frmEmpTelefone);
			$prod->setcampo42($frmEmpRamal);
			$prod->setcampo43($frmCorrespondencia);

    		// Dados do Conjuge
			$prod->setcampo44($frmNomeConj);
			$prod->setcampo45($frmCPFConj);
			$prod->setcampo46($frmRGConj);
			$prod->setcampo47($frmRGEmissorConj);
			$datanew = str_replace('/','',$frmNasConj);
			$ano = substr($datanew,4,4);
			$mes = substr($datanew,2,2);
			$dia = substr($datanew,0,2);
			$data = $ano . $mes . $dia;
			$prod->setcampo48($data);
			$prod->setcampo49($frmEmpConj);
			$prod->setcampo50($frmOcupConj);
			$prod->setcampo51($frmFuncConj);
			$prod->setcampo52($frmRendaConj);
			$prod->setcampo53($frmDDDEmpConj);
			$prod->setcampo54($frmTelEmpConj);
			$prod->setcampo55($frmRamalEmpConj);

    		// Referencia Bancaria
			$prod->setcampo56($frmBanco);
			$prod->setcampo57($frmAgencia);
			$prod->setcampo58($frmContaCorrente);
			$prod->setcampo59($frmBancoContaTipo);
			$prod->setcampo60($frmBancoDDD);
			$prod->setcampo61($frmBancoTelefone);
			$prod->setcampo62($frmBancoClienteDesde);

    		// Referencia Pessoal
			$prod->setcampo63($frmRefParentescoNome);
			$prod->setcampo64($frmRefParentescoDDD);
			$prod->setcampo65($frmRefParentescoTelefone);

    		// Referencia Comercial
			$prod->setcampo69($frmRefComercialNome);
			$prod->setcampo70($frmRefComercialDDD);
			$prod->setcampo71($frmRefComercialTelefone);

    		// Outros
			$prod->setcampo75($frmOBS);
			$prod->setcampo77($frmEmail);
			$prod->setcampo78($dataatual);
			$login = strtolower($login);
		    $prod->setcampo85($login);
			
			$prod->setcampo89($frmRGEmissao);
			$prod->setcampo90($frmNumero);
			$prod->setcampo91($frmComplemento);
			$prod->setcampo92($frmPai);
			$prod->setcampo93($frmMae);
			$prod->setcampo94($frmEmpTipo);
			$prod->setcampo95($frmEmpNumero);
			$prod->setcampo96($frmEmpComplemento);
			
			

            if ($tipogravar == "UPDATE")
            {
                // Atualiza
                $prod->setcampo85($login); // LOGIN ATUAL
		        #$prod->setcampo87($login); //LOGIN CADASTRO
                #$prod->setcampo88($dataatual); //DATA DONO
    			$prod->upProd("clientenovo", "codcliente = '$codcliente'");
    			$ureg_cliente = $codcliente;
            } else {
                // Insere Novo
                // Operacao de Caixa
        	$opcaixaf = OPCAIXA_PADRAO;
		    $prod->setcampo79($opcaixaf);
            $prod->setcampo80("S"); // ASSCONTRATO
        	$prod->setcampo2($dataatual); // DATA CADASTRO
        	$login = strtolower($login);
		    $prod->setcampo85($login); // LOGIN ATUAL
		    $prod->setcampo86($rescredito);
		    $prod->setcampo87($login); //LOGIN CADASTRO
		    $prod->setcampo88($dataatual); //DATA DONO
			$prod->setcampo99("C"); // PIS CONSUMIDOR FINAL
            $prod->addProd("clientenovo", $ureg_cliente);
            }

        	// ATUALIZA PEDIDO
        	$condicao_ped = "codcliente = $ureg_cliente";
        	$prod->upProdU("pedidotemp",$condicao_ped, "codped='$codpedselect' ");

            if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
            header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=16&codpedselect=$codpedselect");
            
            } else {
            // Não existe cliente com o CPF informado
            // Preencha o formulário
            $cpf_nao_existe = "2";
            }
            
            break;
            
      case "Continuar" : // ALTERADO
      
      	// ATUALIZA PEDIDO
      	
          	$ureg_cliente = $codcliente;

        	$condicao_ped = "codcliente = $ureg_cliente";
        	$prod->upProdU("pedidotemp",$condicao_ped, "codped='$codpedselect' ");

            if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
            header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=16&codpedselect=$codpedselect");
            
            break;
            
}


 		$prod->clear();
        $prod->listProdU("cepons, onsite", "pedidotemp", "codped='$codpedselect'");
        $cepons = $prod->showcampo0();
        $onsite = $prod->showcampo1();
        
           
        #echo "aqui=$codpedselect";

//include ("topo.php");
include ("templates/cad_page_pessoafisica.htm");
//include ("rodape.php");

?>
