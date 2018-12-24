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
	
$prod->clear();
$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();;
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();


switch ($Action)
{
    // Gravando Orçamento
    	case "orc_grava":

	// CRIA ORCAMENTO
        $prod->clear();
        $prod->listProd("orctemp", "codped = $codorcselect");
        $statusped = $prod->showcampo14();
        $codemp_ped = $prod->showcampo1();
        $prod->setcampo0("");
        $prod->addProd("orc", $uregped);
        
         // ATUALIZA PEDIDO COM CODBARRA E DATA
        $codbarra = $prod->codbarra($codemp_ped, $uregped, "ORC");
	$prod->upProdU("orc", "codbarra = '$codbarra', dataped = '$dataatual', emailenv  = 'NO', hist = 0", "codped=$uregped");
	
	// CRIA PRODUTOS DO PEDIDO
        $prod->clear();
        $prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array, $array_campo, "" );

        for($i = 0; $i < count($array); $i++ )
        {
		$prod->mostraProd( $array, $array_campo, $i );
            $gar_um = $prod->showcampo11();
	        $gar_cj = $prod->showcampo12();
	        $prod_add = $prod->showcampo15();
	        $prod_placa = $prod->showcampo16();
	        $fator_micro = $prod->showcampo17();
	        $ordem = $prod->showcampo18();
		
	       	$prod->setcampo0("");
	        $prod->setcampo1($uregped);
            $prod->setcampo10("");
            $prod->setcampo11("");
	        $prod->setcampo12($gar_um);
	        $prod->setcampo13($gar_cj);
	        $prod->setcampo14($prod_add);
	        $prod->setcampo15($prod_placa);
	        $prod->setcampo16($fator_micro);
       	    $prod->setcampo17($ordem);
       	    $prod->addProd("orcprod", $uregprod);
        }//FOR
        
        // INSERE STATUS AVAL
        $prod->clear();
	$prod->setcampo0("");
	$prod->setcampo1($uregped);
	$prod->setcampo2($dataatual);
	$prod->setcampo3("NOVO");
	$prod->addProd("orcstatus", $uregstatus);
	
	$prod->delProd("orctemp", "codped=$codorcselect");
	$prod->delProd("pedidotemp", "codped=$codpedselect");
	$prod->delProd("pedidoprodtemp", "codped=$codpedselect");
	$prod->delProd("pedidoparcelastemp", "codped=$codpedselect");

	// APAGA COOKIE
	$prod->begin_id("id_session", "");

	$codorcselect = $uregped;

	// ENVIA PARA FINALIZAR ORCAMENTO
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?pg=$pg&Action=finaliza&pg_ped=14&codorcselect=$codorcselect&tipo_orc=1&codbarra=$codbarra");

         break;
    // Gravando Pedido
	case "ped_grava":

	// CRIA PEDIDO
        $prod->clear();
        $prod->listProd("pedidotemp", "codped = $codpedselect");
        $statusped = $prod->showcampo14();
        $codemp_ped = $prod->showcampo1();
        $vge_ped = $prod->showcampo63();
        $tipovge_ped = $prod->showcampo64();
        $onsite_ped = $prod->showcampo83();
        $vonsite_ped = $prod->showcampo84();
        $vonsite_desloc_ped = $prod->showcampo85();
        $cepons_ped = $prod->showcampo86();
        $prod->setcampo0("");
        $prod->addProd("pedido", $uregped);
        
        #echo "ons=$onsite_ped - vons=$vonsite_ped - vonsd=$vonsite_desloc_ped";
		
				
        
       
       if($onsite_ped == 'OK'){         
       	$prod->upProdU("pedido", "onsite='$onsite_ped', vonsite ='$vonsite_ped', vonsite_desloc='$vonsite_desloc_ped', cepons='$cepons_ped'", "codped=$uregped");
       }else{
       	$onsite_ped = 'NO';$vonsite_ped = 0;$vonsite_desloc_ped = 0;$cepons_ped="";
       } 
      

	// CRIA PRODUTOS DO PEDIDO
        $pontot_prod = 0;
        $prod->clear();
        $prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array, $array_campo, "" );
        for($i = 0; $i < count($array); $i++ )
        {
        $garumprod_ped = 0;
        $garcjprod_ped = 0;
        $ppuprod_ped = 0;
		$prod->mostraProd( $array, $array_campo, $i );
		$codprod_ped = $prod->showcampo2();
		$qtdeprod_ped = $prod->showcampo3();
		$ppuprod_ped = $prod->showcampo4();
		$tipoprod_ped = $prod->showcampo8();
		$garumprod_ped = $prod->showcampo11();
		$garcjprod_ped = $prod->showcampo12();
		$planoprod_ped = $prod->showcampo13();
		if ($garumprod_ped == 0){$garumprod_ped = 12;}
    	if ($garcjprod_ped == 0){$garcjprod_ped = 12;}
		$garumprod_ped_or = $garumprod_ped;
		$garcjprod_ped_or = $garcjprod_ped;
		
		$prod->clear();
		$prod->listProdU("codcat, codsubcat", "produtos", "codprod = '$codprod_ped'");
		$codcat_ped = $prod->showcampo0();
		$codsubcat_ped = $prod->showcampo1();
		
		if ($planoprod_ped){
		$prod->clear();
		$prod->listProdU("ponto", "produtos_planos", "codplano = '$planoprod_ped'");
		$ponto_plano = $prod->showcampo0();
		}else{
		$ponto_plano = 0;
		}
		$prod->clear();
        $prod->listProdU("garext_12, garext_24, porc_garext_12, porc_garext_24, ponto", "produtos", "codprod = '$codprod_ped'");
		$garext_12 = $prod->showcampo0();
		$garext_24 = $prod->showcampo1();
		$p_garext_12 = $prod->showcampo2();
		$p_garext_24 = $prod->showcampo3();
		$ponto_prod = $prod->showcampo4();
		
		$ponto_prod = $ponto_prod + $ponto_plano;
		
			
		$prod->listProdU("(SUM(qtde-reserva) - $qtdeprod_ped) as est, pcm", "estoque", "codprod = '$codprod_ped' and codemp = '$codemp_ped' group by codprod");
		$est_real = $prod->showcampo0();
		$pcm = $prod->showcampo1();
				
		$prod->listProdU("(SUM(qtdecomp)+$est_real) as qtdeoc","ocprod, oc", "codprod='$codprod_ped' and ocprod.codemp=$codemp_ped and oc.hist <> 1 and oc.codoc=ocprod.codoc");
		$qtde_ocreal = $prod->showcampo0();
		
		if ($est_real < 0){
			if ($qtde_ocreal <= 0){$status_prod = "SE";}//SEM ESTOQUE 
			if ($qtde_ocreal > 0){$status_prod = "PC";}//PREVISAO COMPRA 
		}
		if ($est_real >= 0){$status_prod = "CE";}// COM ESTOQUE
		
		
    		if ($tipovge_ped == 12 and $garext_12 == 'OK' and ($tipoprod_ped == "CJ" or $codcat_ped = 73)){
              $ppuprod_ped = $ppuprod_ped + $ppuprod_ped*($p_garext_12/100);
              $garumprod_ped = $garumprod_ped + $tipovge_ped;
              $garcjprod_ped = $garcjprod_ped + $tipovge_ped;
            }
            if ($tipovge_ped == 24 and $garext_24 == 'OK' and ($tipoprod_ped == "CJ" or $codcat_ped = 73)){
              $ppuprod_ped = $ppuprod_ped + $ppuprod_ped*($p_garext_24/100);
              $garumprod_ped = $garumprod_ped + $tipovge_ped;
              $garcjprod_ped = $garcjprod_ped + $tipovge_ped;
            }
		
		$prod->mostraProd( $array, $array_campo, $i );
		$prod->setcampo0("");
		$prod->setcampo1($uregped);
		$prod->setcampo4($ppuprod_ped);
		$prod->setcampo6($status_prod); // STATUS PROD
		$prod->setcampo5($dataatual); // DATA STATUS
		$prod->setcampo11($garumprod_ped);
		$prod->setcampo12($garcjprod_ped);
		$prod->setcampo19($garumprod_ped_or);
		$prod->setcampo20($garcjprod_ped_or);
		$prod->setcampo21($ponto_prod);
		$prod->setcampo23($pcm);
		if ($onsite_ped <> 'OK'){
			$prod->setcampo24('NO');
			$prod->setcampo25(0);
			$prod->setcampo26(0);
		}
	    $prod->addProd("pedidoprod", $uregprod);
	    
	    $pontot_prod = $pontot_prod + $ponto_prod*$qtdeprod_ped;

		// CRIA RESERVA NA TABELA ESTOQUE
	        $prod->clear();
		$prod->listProdU("reserva", "estoque", "codprod = '$codprod_ped' AND codemp = '$codemp_ped'");
		$reserva = $prod->showcampo0();
		$reservanova = $reserva + $qtdeprod_ped;
		$prod->upProdU("estoque", "reserva = '$reservanova'", "codprod = '$codprod_ped' AND codemp = '$codemp_ped'");
			
        }//FOR
        
        // CRIA PARCELAS PEDIDO
        $prod->clear();
        $prod->listProdgeral("pedidoparcelastemp", "codped=$codpedselect", $array, $array_campo, "" );
        
         for($i = 0; $i < count($array); $i++ )
        {
		$prod->mostraProd( $array, $array_campo, $i );
        $prod->setcampo0("");
	    $prod->setcampo1($uregped);
	    $prod->addProd("pedidoparcelas", $uregparc);

        }//FOR

	//CALCULO DA PONTUACAO FINAL DO PEDIDO
    if ($tipovge_ped == 12){$ponto_gar = 50;}
    if ($tipovge_ped == 24){$ponto_gar = 30;}
    if ($onsite_ped == 'OK'){$ponto_gar_onsite = 50;}
    
    $prod->clear();
    $prod->listProdU("codvend","pedido", "codped=$uregped");
	$codvend_ped_list = $prod->showcampo0();
	$prod->clear();
    $prod->listProdU("(70000/ if (meta = 0, 70000, meta)) as fator, codproj","vendedor", "codvend=$codvend_ped_list");
	$fator_meta = $prod->showcampo0();
	$codproj_ped = $prod->showcampo1();
	
	#echo "$ponto_gar + $pontot_prod + $ponto_gar_onsite";
	
	        
    $ponto_final = ($ponto_gar + $pontot_prod + $ponto_gar_onsite)*$fator_meta;
    
   
      // ATUALIZA PEDIDO COM CODBARRA E DATA
    $codbarra = $prod->codbarra($codemp_ped, $uregped, "PED");
    $prod->upProdU("pedido", "codbarra = '$codbarra', ponto_ped = '$ponto_final', dataped = '$dataatual', codproj = '$codproj_ped'", "codped=$uregped");
	
	//PRONTA ENTREGA AUTOMATICA
		$prod->listProdU("IF( dataprevent = DATE_FORMAT( dataped, '%Y-%m-%d' ) , 1, 0 ) * if( dataprevent = DATE_FORMAT( NOW( ) , '%Y-%m-%d' ) , 1, 0 ) * if( modoentr = 'RETIRA', 1, 0 ) ", "pedido", "codped=$uregped ");
		$auto_pronta = $prod->showcampo0();
			
			if ($auto_pronta  == 1){
			
					#if ($pedido_cestoque == 1){$nday = 2;}else{$nday = 5;}
					$prod->upProdU("pedido", "prontaentr = 'OK'", "codped=$uregped");
			}

	// CRIA STATUS DO PEDIDO
	$prod->clear();
	$prod->setcampo0("");
	$prod->setcampo1($uregped);
	$prod->setcampo2($dataatual);
	$prod->setcampo3($statusped);
	$prod->setcampo4($login);
	$prod->addProd("pedidostatus", $uregstatus);
	
	$prod->delProd("pedidotemp", "codped=$codpedselect");
	$prod->delProd("pedidoprodtemp", "codped=$codpedselect");
	$prod->delProd("pedidoparcelastemp", "codped=$codpedselect");
	
	// APAGA COOKIE
	$prod->begin_id("id_session", "");

	$codpedselect = $uregped;

	// ENVIA PARA FINALIZAR PEDIDO
	if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
	header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar. "restrito.php?pg=$pg&Action=finaliza&pg_ped=14&codpedselect=$codpedselect&codbarra=$codbarra");
	        

        break;
        
       	case "finaliza":
       	
               if ($tipo_orc == 1){
                	$titulo = "Orçamento";
                	$Action = "orc_grava";
		}else{
			$titulo = "Pedido";
	               	$Action = "ped_grava";
	               	$prod->clear();
			$prod->listProdU("pendfpg", "pedido", "codped = '$codpedselect'");
			$pendfpg = $prod->showcampo0();
	               	
		}

	       	// TEMPLATES
  		include ("templates/ped_page_finaliza.htm");
       	
       	break;
        
        default:
        
                 if ($tipo_orc == 1){
                	$titulo = "Orçamento";
               		$Action = "orc_grava";
		}else{
			$titulo = "Pedido";
	        	$Action = "ped_grava";
		}
	        // TEMPLATES
		include ("templates/ped_page_finaliza_ini.htm");

        break;
}



?>
