<?php

// WBS
// arquivo:		ped_topocarrinho.php
// template:	ped_topocarrinho.htm

#require("../classprod.php");
// CLASSE DO CEP
require_once('start_pesq_cep.php');

// inicio da classe
$prod = new operacao();


#$valortotal = "2.000,00";
#$valortabela_real = "2.312,00";
#$codcliente = 140;

	// DATA HOJE
 	$hoje = getdate();
	$ano = $hoje[year];
	$mes = $hoje[mon];
	$dia = $hoje[mday];
	if (strlen($mes)==1){$mes = '0'.$mes;}
	if (strlen($dia)==1){$dia = '0'.$dia;}
	
	$prod->clear();
	$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
	$codempselect = $prod->showcampo0();
	$codvendselect = $prod->showcampo1();;
	$tipovend = $prod->showcampo2();
	$fatorusertabela = $prod->showcampo3();
	$valortotalf = number_format($valortotal,2,',','.');
	$vgarext_12f =  $prod->fpreco($vgarext_12_calc);
	$vgarext_24f =  $prod->fpreco($vgarext_24_calc);
	$vgaros_12f =  $prod->fpreco($vgaros_12_calc);
	$vgaros_24f =  $prod->fpreco($vgaros_24_calc);
	$vgaros_36f =  $prod->fpreco($vgaros_36_calc);
	


	// PESQUISA POR DADOS DO CLIENTE
	#$prod->listProdU("opcaixa","clientenovo", "codcliente=$codcliente");
	#$opcaixa = $prod->showcampo0();
	#$xopcaixashow = explode(":", $opcaixaold);


	// LISTA OS REGISTROS
	$prod->listProdSum("opcaixa, descricao", "formapg", "padraoped = 'S'", $arrayx, $array_campox, "ORDER BY  descricao");

		for($i = 0; $i < count($arrayx); $i++ ){

			$prod->mostraProd( $arrayx, $array_campox, $i );

			$opcaixa[$i] = $prod->showcampo0();
			$descricao[$i] = $prod->showcampo1();


		}//FOR
		
	// MODIFICACAO DO ORCAMENTO
	if ($modped == 1){

	$prod->clear();
	$prod->listProdU("condicaopg, codbarra","orc", "codped='$codorcselect'");
	$condicaop = $prod->showcampo0();
	$codbarraorc = $prod->showcampo1();
	$condicaop = html_entity_decode($condicaop);

	

	}

	
		
   switch ($Action)
{
	case "grava":
	
	        $prod->delProd("pedidoparcelastemp", "codped = '$codpedselect'");

		for($i = 1; $i <= $nump; $i++ ){
		
 			      $valor_parc[$i] = str_replace('.','',$valor_parc[$i]);
			$valor_parc[$i] = str_replace(',','.',$valor_parc[$i]);

                       	$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($codpedselect);
			$prod->setcampo2($anoparc[$i].$mesparc[$i].$diaparc[$i]);
			$prod->setcampo3($valor_parc[$i]);
			$prod->setcampo17(1);
			$prod->addProd("pedidoparcelastemp", $uregmicro);	

		}//FOR
		
		#$vt = str_replace('.','',$valortabela_real);
		#$vt = str_replace(',','.',$vt);
		$vt_mdped = $valortabela_real_mdped;

		$condicao_ped = "vt = $vt_mdped, ";
		$condicao_ped .= "vpv = $vpv_mdped, ";
		$condicao_ped .= "vpp = $vpp_mdped, ";
		$condicao_ped .= "mlb = $mlb_mdped, ";
		$condicao_ped .= "mcv = $mcv_mdped, ";
		$condicao_ped .= "vc = $vc_mdped, ";
		if ($vgarext_12_select <> 0){$vge = $vgarext_12_select;$tipo_vge=12;}
		if ($vgarext_24_select <> 0){$vge = $vgarext_24_select;$tipo_vge=24;}
		$condicao_ped .= "vge = '$vge', ";
		$condicao_ped .= "mlb_real = $mlb_real_mdped, ";
		$condicao_ped .= "mcv_real = $mcv_real_mdped, ";
		$condicao_ped .= "mcv_prot = '$mcv_prot', ";
		$condicao_ped .= "mcv_aplic = '$mcv_aplic', ";
		if ($meia_mcv == ""){$meia_mcv = "N";}
		$condicao_ped .= "meia_mcv = '$meia_mcv', ";
        $condicao_ped .= "tipo_vge = '$tipo_vge', ";
        $condicao_ped .= "sj10x = '$sj10x'";
        
		$prod->upProdU("pedidotemp",$condicao_ped, "codped='$codpedselect' ");

		
if ($orcamento == 1){

		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codempselect);
		$prod->setcampo3($codvendselect);
		$prod->setcampo14("NOVO");
		$nome_orc = strtoupper($nome_orc);
		$prod->setcampo36($nome_orc);
		$tel = "$dddtel_orc"."$tel_orc";
		$prod->setcampo37($tel);
		$prod->setcampo38($email_orc);
		$prod->setcampo34($validade_orc);
		$prod->setcampo31($prazo_orc);
		$prod->setcampo30($garantia_orc);
		$prod->setcampo32($imposto_orc);
		$prod->setcampo33($frete_orc);
		$prod->setcampo35($obs_orc);
		$cond_orc = str_replace("\r", '', $cond_orc);
		$cond_orc = str_replace( "\n", '<br />', $cond_orc );
		#$cond_orc = nl2br_indent($cond_orc, 0); // INSERE <BR>
		$cond_orc = htmlentities($cond_orc); // GRAVA CODIGOS HTML
		$prod->setcampo29($cond_orc);
		$prod->setcampo43("OK"); // NOVO ORCAMENTO

		$prod->addProd("orctemp", $uregorc);
	
		if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
		header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?pg=$pg&pg_ped=14&codpedselect=$codpedselect&codorcselect=$uregorc&tipo_orc=1");

}else{
		
		if ($tipo_pessoa == "F"){
		        if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
			header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?pg=$pg&pg_ped=12&codpedselect=$codpedselect");
		}else{
			if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
			header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=13&codpedselect=$codpedselect");
		}
}

	break;
	
	case "pesq_cep":
	
	$sc = new CEP();
	$res = $sc->busca($cep, $erro);
	
	#if ($erro == ""){echo "aqio";}
	
	break;
	
	
	default:
		
	//ZERA GARANTIA ONSITE
	$condicao_ped = "gos_12 = 'NO', ";
    $condicao_ped .= "gos_24 = 'NO', ";
    $condicao_ped .= "vgos = '0'";
	$prod->upProdU("pedidoprodtemp",$condicao_ped, "codped='$codpedselect' ");
	
	$condicao_ped = "onsite = 'NO', ";
    $condicao_ped .= "vonsite = '0', ";
    $condicao_ped .= "vonsite_desloc = '0'";
	$prod->upProdU("pedidotemp",$condicao_ped, "codped='$codpedselect' ");
	
	break;
}

	$prod->clear();
	$prod->listProdU("COUNT(*)","pedidoprodtemp", "codped='$codpedselect'");
	$count_total = $prod->showcampo0();
	
	$prod->clear();
	$prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "pedidoprodtemp.codprod = produtos.codprod and codped='$codpedselect' and opcaixa10x <> ''");
	$count_10x = $prod->showcampo0();
	
	if ($count_total <> $count_10x){$count_10x = 0;}

	// TEMPLATES
	include ("templates/ped_page_formapg.htm");

?>
