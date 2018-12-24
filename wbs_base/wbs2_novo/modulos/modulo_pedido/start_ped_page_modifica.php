<?php

#require("../classprod.php");

// inicio da classe
$prod = new operacao();

// DATA HOJE
$hoje = getdate();
$ano = $hoje[year];
$mes = $hoje[mon];
$dia = $hoje[mday];
if (strlen($mes)==1) {$mes = '0'.$mes;}
if (strlen($dia)==1) {$dia = '0'.$dia;}
$dataatual = $prod->gdata();
	
switch ($Action)
{
    // Gravando Orçamento
    	case "orc_modifica":

	// CRIA ORCAMENTO
	$prod->clear();
	$prod->listProdU("orc.codemp, orc.codvend, tipo, fatorusertabela","orc, vendedor", "codped='$codorcselect' AND orc.codvend=vendedor.codvend");
	$codemp_orc = $prod->showcampo0();
	$codvend_orc = $prod->showcampo1();;
	$tipovend_orc = $prod->showcampo2();
	$fatorusertabela = $prod->showcampo3();
	$prod->clear();
	$prod->setcampo0("");
	$prod->setcampo1($codemp_orc);
	$prod->setcampo3($codvend_orc);
    $prod->addProd("pedidotemp", $uregped);

	// CRIA PRODUTOS DO PEDIDO
        $prod->clear();
        $prod->listProdgeral("orcprod", "codped=$codorcselect", $array, $array_campo, "" );

        for($i = 0; $i < count($array); $i++ )
        {
		$prod->mostraProd( $array, $array_campo, $i );
		$codprod = $prod->showcampo2();
		$ppu = $prod->showcampo4();
		$tipoprod = $prod->showcampo8();
	 	$gar_um = $prod->showcampo12();
		$gar_cj = $prod->showcampo13();
		$prod_add = $prod->showcampo14();
		$prod_placa = $prod->showcampo15();
		$fator_micro = $prod->showcampo16();
		$ordem = $prod->showcampo17();
		$prod_kit = $prod->showcampo22();
		#$preco_real = $ppu;
	        
	        //ATUALIZAR VALORES DOS PRODUTOS NO ORCAMENTO
	        #if ($atual_val == 1){
	    $prod->clear();
		$prod->listProdU("(pvacj*fatorata*$fatorusertabela), (pva*fatorata*$fatorusertabela), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela)", "produtos, estoque", "produtos.codprod = '$codprod'  AND produtos.codprod=estoque.codprod and estoque.codemp='$codemp_orc'");
		$pvacj_real = $prod->showcampo0();
		$pva_real = $prod->showcampo1();
		$pvvcj_real = $prod->showcampo2();
		$pvv_real = $prod->showcampo3();
		
			if ($tipovend_orc == "A"){
			   if ($tipoprod == "CJ"){$preco_real = $pvacj_real;}else{$preco_real = $pva_real;}
			}else{
			   if ($tipoprod == "CJ"){$preco_real = $pvvcj_real;}else{$preco_real = $pvv_real;}
			}

		$preco_real = $preco_real;
			
		#}// ATUALIZA VALORES

        $prod->clear();
		$prod->mostraProd( $array, $array_campo, $i );
		$prod->setcampo0("");
	    $prod->setcampo1($uregped);
	    $prod->setcampo4($preco_real);
        $prod->setcampo10("");
        $prod->setcampo11($gar_um);
	    $prod->setcampo12($gar_cj);
		$prod->setcampo13("");
		$prod->setcampo14("");
		$prod->setcampo15($prod_add);
		$prod->setcampo16($prod_placa);
		$prod->setcampo17($fator_micro);
		$prod->setcampo18($ordem);
		$prod->setcampo22($prod_kit); //KIT
		$prod->addProd("pedidoprodtemp", $uregprod);
        }//FOR
        
        if ($orcalt <> 1){
        // MODIFICA STATUS DO ORCAMENTO
        $prod->upProdU("orc", "status ='VENDIDO', tranf_ped = 'OK'","codped=$codorcselect");
		// INSERE STATUS AVAL
			$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codorcselect);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("VENDIDO");
		$prod->addProd("orcstatus", $uregstatus);
		}

	// CRIA COOKIE
	$prod->begin_id("id_session", "$uregped");

	#$codorcselect = $uregped;

	// ENCAMINHA PAR AO CARRINHO
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&pg_ped=2&codpedselect=$uregped&modped=1&codorcselect=$codorcselect");

         break;
    
}



?>
