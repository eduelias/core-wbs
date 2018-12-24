<?php

//require("../classprod.php");

// CLASSE DO CEP
require_once(DIR_SISTEMA."/".DIR_MODULOS."/modulo_pedido/start_pesq_cep.php");

// INICIO DA CLASSE
$prod = new operacao();



$dataatual = $prod->gdata();

#echo("Action= $Action");

switch ($Action) {
    case "Procurar" :
        // Procura cliente com o CNPJ informado
        $prod->clear();
        $prod->listProdU("codcliente", "clientenovo", "cnpj= '$frmCNPJ' AND tipocliente = 'J'");

        $codcliente = $prod->showcampo0();

        if ($codcliente != "") {
            $prod->clear();
            $prod->listProd("clientenovo", "codcliente = '$codcliente'");
            // Cliente existe -> UPDATE
            $tipogravar = "UPDATE";
            
            // Dados do Cliente
    		$xcodcliente=	$prod->showcampo0();
    		$frmNome=			$prod->showcampo1();
    		$xdatacad=		$prod->showcampo2();
    		$xtipocliente=	$prod->showcampo3();
    		$frmCNPJ=			$prod->showcampo5();
    		$frmInscEst=			$prod->showcampo8();
    		$xdatanasc=		$prod->showcampo9();
    		$xdatanasc =    $prod->fdata($xdatanasc);
    		$xdataativ=		$prod->showcampo10();
    		$xdataativ =    $prod->fdata($xdataativ);
    		$frmEndereco=		$prod->showcampo14();
    		$frmBairro=		$prod->showcampo15();
    		$frmCidade=		$prod->showcampo16();
    		$xcep=			$prod->showcampo17();
			$frmCEP = str_replace('-','',$xcep);
    		$frmUF=		$prod->showcampo18();
    		$xtempolocal=	$prod->showcampo19();
    		$xtipolocal=	$prod->showcampo20();
    		$frmDDD=		$prod->showcampo21();
    		$frmTelefone=			$prod->showcampo22();
    		$frmDDD2=		$prod->showcampo23();
    		$frmTelefone2=	$prod->showcampo24();
    		$frmRamal=		$prod->showcampo25();
    		$xfatmensal=	$prod->showcampo26();
    		$frmRamoAtiv=	$prod->showcampo27();

            // Dados da Empresa Cliente
    		$frmTrabalhotempo=	$prod->showcampo30();
    		$frmEmpTipo=	$prod->showcampo31();
    		$frmRamoAtiv=	$prod->showcampo32();
    		$xc_endcorresp=	$prod->showcampo43();
            // Referencia Bancaria
    		$frmBanco=		$prod->showcampo56();
    		$frmAgencia=	$prod->showcampo57();
    		$frmContaCorrente=		$prod->showcampo58();
    		$frmBancoContaTipo=		$prod->showcampo59();
    		$frmBancoDDD=	$prod->showcampo60();
    		$frmBancoTelefone=		$prod->showcampo61();
    		$frmBancoClienteDesde=$prod->showcampo62();

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
    		$frmHomePage = $prod->showcampo97();


            $datacadf = $prod->fdata($xdatacad); // ALTERADO
			$datahoje = $prod->gdata();// ALTERADO
			$difdias_dono = $prod->numdias($xdatadono,$datahoje);

  	if ($difdias_dono > 90){$block_dono = 0;}
    		else{if ($xlogincad <> $login_vend){$block_dono = 1;}}
           
        	echo("$block_dono - $difdias_dono - v=$login_vend = $xlogincad");

            } else {
            // Não existe cliente com o CNPJ informado
            // Preencha o formulário
            $cnpj_nao_existe = "1";
        }
        
        break;
        
        case "CEP":
        
         // CEP
            if ($frmCEP <> "" and $pesq_cep == 1)
            {
                $sc = new CEP();
                $res = $sc->busca($frmCEP, $erro);

    	       	if ($erro == "")
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
        
        break;

    case "Gravar" :

        $prod->clear();
        $prod->listProdU("codcliente", "clientenovo", "cnpj= '$frmCNPJ' AND tipocliente = 'J'");

        $codcliente = $prod->showcampo0();

        if ($frmCNPJ <> $frmCNPJ_pesq){$block_cnpj =1;}

        if (($codcliente == "" or $tipogravar == "UPDATE") and $block_cnpj <> 1) {

            $prod->clear();

            if ($tipogravar == "UPDATE")
            {
                $prod->listProd("clientenovo", "codcliente = '$codcliente'");
            }

            // Dados do Cliente
			$prod->setcampo1($frmNome);
			$prod->setcampo2($xdatacad);
			$prod->setcampo3("J");
			$prod->setcampo5($frmCNPJ);
			$prod->setcampo8($frmInscEst);

			$prod->setcampo14($frmEndereco);
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
			$prod->setcampo28($frmNome);
			$prod->setcampo29($frmCNPJ);
			$prod->setcampo30($frmTrabalhotempo);
			$prod->setcampo31($frmEmpTipo);
			$prod->setcampo32($frmRamoAtiv);

    		// Referencia Bancaria
			$prod->setcampo56($frmBanco);
			$prod->setcampo57($frmAgencia);
			$prod->setcampo58($frmContaCorrente);
			$prod->setcampo59($frmBancoContaTipo);
			$prod->setcampo60($frmBancoDDD);
			$prod->setcampo61($frmBancoTelefone);
			$prod->setcampo62($frmBancoClienteDesde);

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

			$prod->setcampo90($frmNumero);
			$prod->setcampo91($frmComplemento);
			//$prod->setcampo94($frmEmpTipo);
			//$prod->setcampo95($frmEmpNumero);
			//$prod->setcampo96($frmEmpComplemento);
			$prod->setcampo97($frmHomePage);
			


        if ($tipogravar == "UPDATE")
        {
            // Atualiza
            $prod->setcampo85($login);
		    #$prod->setcampo87($login);
            #$prod->setcampo88($dataatual);
			$prod->upProd("clientenovo", "codcliente = '$codcliente'");
			$ureg_cliente = $codcliente;
        } else {
            // Insere Novo
            // Operacao de Caixa
	   $opcaixaf = OPCAIXA_PADRAO;
	    $prod->setcampo79($opcaixaf);
     	    $prod->setcampo80("S"); // ASSCONTRATO
	    $prod->setcampo2($dataatual);
	    $login = strtolower($login);
	    $prod->setcampo85($login);
	    $prod->setcampo86($rescredito);
	    $prod->setcampo87($login);
	    $prod->setcampo88($dataatual);
		$prod->setcampo99("C"); // PIS CONSUMIDOR FINAL
            $prod->addProd("clientenovo", $ureg_cliente);
          }

	// ATUALIZA PEDIDO
	$condicao_ped = "codcliente = $ureg_cliente";
	$prod->upProdU("pedidotemp",$condicao_ped, "codped='$codpedselect' ");

	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
        header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?pg=$pg&pg_ped=16&codpedselect=$codpedselect");
        
            } else {
            // Não existe cliente com o CNPJ informado
            // Preencha o formulário
            $cnpj_nao_existe = "2";
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

//include("topo.php");
include ("templates/cad_page_pessoajuridica.htm");
//include("rodape.php");

?>
