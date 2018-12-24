

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "oc";					// Tabela EM USO
$condicao1 = "codoc=$codoc";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by codoc limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codoc";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "ORDEM DE COMPRA";
$titulo = "ADMINISTRAÇÃO ORDEM DE COMPRA - CONTABIL";
$titulo1 = "ORDEM DE COMPRA";

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
		#if ($codempvend <> 0){$codempselect = $codempvend;}
		$codemp_transf = $prod->showcampo34();
        $codgrp_transf = $prod->showcampo3();
		
    	if (($codgrp_vend == 32 or $codgrp_vend == 51 or $codgrp_vend == 56 or $codgrp_vend == 53) and $codemp_transf <> 0){$block_transf = 1;$allemp = 'N';$codempvend = $codemp_transf;}

    	
    	$dataatual = $prod->gdata();
    	    	
    	
// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$dataatual = $prod->gdata();

		// ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
		$codempoc = $prod->showcampo1();
		$prod->setcampo9($dataatual);
		$prod->setcampo13(1);
		
		$prod->upProd("oc", $condicao1);

		

		$Actionter = "lock";
		$prod->msggeral("Ordem de Compra registrada corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg", 0);
		
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";
		$codemp="";

        break;

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;

	 case "recalc":

		 // ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
					

		// VERIFICA COTACAO OC
		$prod->listProd("moeda", "codmoeda=$codmoedaoc");
		$cotacao = $prod->showcampo2();
		$datacotacao = $prod->showcampo3();

		$prod->clear();
		$prod->listProdgeral("ocprod", "codoc=$codoc", $array98, $array_campo98 , "order BY codprod");

		for($i = 0; $i < count($array98); $i++ ){
			
			$prod->mostraProd( $array98, $array_campo98, $i );

			// ATUALIZA DADOS DA TABELA OCPROD

			$codpoc = $prod->showcampo0();	
			$codprodoc = $prod->showcampo2();
			$cbok = $prod->showcampo11();
			#$tipo_nf = $prod->showcampo12();
			#$pcu[$i] = $prod->showcampo5();
			$garantia[$i] = $prod->showcampo6();
			#$tipo_nf[$i] = $prod->showcampo12();
			
			#echo "AQUI=".$dnf[$i]."gar".$garantia[$i];
			
			$prod->setcampo4($qtderec[$i]);
			#$pcu[$i] = str_replace('.','',$pcu[$i]);
			#$pcu[$i] = str_replace(',','.',$pcu[$i]);
			#$prod->setcampo5($pcu[$i]);
			#$prod->setcampo6($garantia[$i]);
			$preco[$i] = str_replace('.','',$preco[$i]);
			$preco[$i] = str_replace(',','.',$preco[$i]);
			$prod->setcampo5($preco[$i]);
			$prod->setcampo12($tipo_nf[$i]);
			$prod->setcampo13($icms[$i]);
			$prod->setcampo14($ipi[$i]);
			$prod->setcampo16($cst_a[$i]);
			$prod->setcampo17($cst_b[$i]);
			$prod->setcampo18($obs_fab[$i]);
			$prod->setcampo8($nf[$i]);
			$prod->setcampo9($nfa[$i].$nfm[$i].$nfd[$i]);
			$prod->setcampo20($codfab_select[$i]);
			$prod->setcampo21($tipo_port[$i]);
			$prod->setcampo22($port[$i]);
			$prod->setcampo23($port_comp[$i]);
			$prod->setcampo24($aport[$i].$mport[$i].$dport[$i]);
			$prod->setcampo25($nf_fab[$i]);
			$prod->setcampo26($anf[$i].$mnf[$i].$dnf[$i]);
			
			// CALCULO DA DATA DE PREV DE CHEGADA
			$dpm = $nfm[$i];
			$dpa = $nfa[$i];
			$dpm = $dpm + $garantia[$i];
			$dpmresto=0;
			$dpmresto = $dpm%12;
			if ($dpmresto==0){
				$dpmresto=$nfm[$i];
				$difdpa = (floor($dpm/12))-1;
			}else{
				$difdpa = floor($dpm/12);
			}
			$dpa = $dpa + $difdpa;
			if (strlen($dpmresto)==1){$dpmresto = '0'.$dpmresto;}

			$prod->setcampo10($dpa.$dpmresto.$nfd[$i]);

			$prod->upProd("ocprod", "codpoc=$codpoc");

			/*

			if ($qtderec[$i] > 0 and $scb[$i] <> ""){
	
			if ($cbok <> "OK"){

			// VERIFICA LIBERACAO DO CODBARRA
			$prod->listProdU("IF (chkcb = 'N' , 'S', 'N')", "produtos", "codprod = $codprodoc");
			$libcb = $prod->showcampo0();
			
			if ($libcb == "S"){

				for($p = 0; $p < $qtderec[$i]; $p++ ){

					$prod->clear();
					$prod->setcampo1($codoc);
					$prod->setcampo2($codprodoc);
					$prod->setcampo3($scb[$i]);
					$prod->setcampo8($codempselect);
					$prod->setcampo9($p); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
					$prod->setcampo10("N"); // FLAG RMA
					$prod->setcampo11("N"); // FLAG PECA ANTIGA
					$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
					$prod->setcampo16($dataatual); // DATA INSERT
					#$prod->setcampo17($tipo_nf); // TIPO NF
					$prod->setcampo18("PC"); // TIPO PROD
					if ($tipo_nf[$i] <> "P"){$tipo_nf[$i] = "";}
					$prod->setcampo26($tipo_nf[$i]); // TIPO FAB
					
					
					$prod->addProd("codbarra", $ureg);

				}
				

				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempselect and codprod=$codprodoc");

				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				$codmoedaprod = $prod->showcampo8();
				#$puc = $prod->showcampo9();
				#$datauc = $prod->showcampo10();
				$pcm = $prod->showcampo11();
				
				#echo("qtde-old = $qtdeold");
								
				//CAMBIO DE MOEDAS
					
					// MODIFICA A COTACAO DO PRODUTO DA OC PARA A MOEDA PADRAO DO PRODUTO 
					// PASSA TODOS OS VALORES PARA MESMA BASE

					$prod->listProd("moeda", "codmoeda=$codmoedaprod");		
					$tipomoedaprod = $prod->showcampo1();
					$cotacaoprod = $prod->showcampo2();
					$pcucambio = ($pcu[$i]*$cotacao)/$cotacaoprod;	
					//$pcmcambio = ($pcm*$cotacao)/$cotacaoprod;	
					$pcmcambio = $pcm;
											
				// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS DO MESMO GRUPO
					$prod->listProdU("codgrupo", "empresa", "codemp='$codempselect'");		
					$codgrupo_emp = $prod->showcampo0();
					

					$prod->listProdSum("(SUM(qtde)-SUM(reserva)) as estoque", "estoque, empresa", "codprod=$codprodoc  AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
					#echo " $estoque - $pcmcambio - $pcucambio - $pcmnovo" ;
										
					//CALCULA O PCM NOVO
					if ($estoque > 0 and $pcmcambio <> 0){
						$pcmnovo = (($pcmcambio*$estoque)+($pcucambio*$qtderec[$i]))/($estoque+$qtderec[$i]);
						#echo "aqui" .$pcmnovo;
					}else{
						$pcmnovo = $pcucambio;
						#echo "aqui1" .$pcmnovo;
					}


				$qtdenovo = $qtdeold + $qtderec[$i];
				#echo("qtde_novo = $qtdenovo");
				
				// ATUALIZA QTDE NOVA NO ESTOQUE
				$prod->upProdU("estoque", "qtde = qtde + $qtderec[$i]", "codprod=$codprodoc and codemp='$codempselect'");
				
				//VERIFICA EMPRESAS DO GRUPO
				$prod->listProdSum("codemp", "empresa", "codgrupo = '$codgrupo_emp'", $array992, $array_campo992, "" );
								
				for($t = 0; $t < count($array992); $t++ ){
				
					$prod->mostraProd( $array992, $array_campo992, $t );
					$codemp_now = $prod->showcampo0();
					
					// ATUALIZA PCM E PUC NA TABELA ESTOQUE POR EMPRESAS DO MESMO GRUPO
					//$prod->upProdU("estoque, empresa", "pcm  = '$pcmnovo', puc = '$pcucambio', datauc = '$dataatual' ", "codprod=$codprodoc  AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'");
					
					// ATUALIZA PCM E PUC NA TABELA ESTOQUE POR EMPRESAS DO MESMO GRUPO
					$prod->upProdU("estoque", "pcm  = '$pcmnovo', puc = '$pcucambio', datauc = '$dataatual' ", "codprod=$codprodoc and codemp = '$codemp_now'");

				}
	
				// FINALIZAÇÃO - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
				$prod->upProdU("ocprod", "cb  = 'OK'", "codpoc=$codpoc");
				

				


			}

			} // CBOK

			} // QTDEREC
	
			*/
			

		}
			$v_frete = str_replace('.','',$v_frete);
			$v_frete = str_replace(',','.',$v_frete);
			$v_seguro = str_replace('.','',$v_seguro);
			$v_seguro = str_replace(',','.',$v_seguro);
			$v_outrasd = str_replace('.','',$v_outrasd);
			$v_outrasd = str_replace(',','.',$v_outrasd);
			$v_icms_subst = str_replace('.','',$v_icms_subst);
			$v_icms_subst = str_replace(',','.',$v_icms_subst);
			$v_frete_transp = str_replace('.','',$v_frete_transp);
			$v_frete_transp = str_replace(',','.',$v_frete_transp);
			$ptotal_notaf = str_replace('.','',$ptotal_notaf);
			$ptotal_notaf = str_replace(',','.',$ptotal_notaf);
				
						
			// ATUALIZA QTDE NOVA NO ESTOQUE
			$prod->upProdU("oc", "v_frete_nota = '$v_frete', v_seguro= '$v_seguro', v_desp_acess = '$v_outrasd', icms_subs = '$v_icms_subst', v_frete_transp = '$v_frete_transp', icms_frete = '$icms_frete', tipo_frete = '$tipo_frete' , voc = '$ptotal_notaf'", "codoc='$codoc'");
			
		
		 break;


	 case "delete":
		$prod->delProd("oc", "codoc=$codoc");

		$prod->delProd("ocprod", "codoc=$codoc");
		

		$Actionsec="list";
		
		 break;

	 case "altdata":
			
			// ATUALIZA CAR

				$datavencnew = $avenc.$mvenc.$dvenc;
				$prod->listProd("oc", "codoc=$codoc");
				$prod->setcampo11($datavencnew);
				$prod->upProd("oc", "codoc=$codoc");
			
				$Action = "update";
		
				
		 break;
		 
	/*	 
	case "recalc_transf":

	
		$prod->clear();
		$prod->listProdgeral("ocprod", "codoc=$codoc", $array98, $array_campo98 , "");

		for($i = 0; $i < count($array98); $i++ ){
			
			$prod->mostraProd( $array98, $array_campo98, $i );

			// ATUALIZA DADOS DA TABELA OCPROD

			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo2();
			$garantia[$i] = $prod->showcampo6();
			$datanf = $nfa[$i].$nfm[$i].$nfd[$i];
			
				// CALCULO DA DATA DE PREV DE CHEGADA
			$dpm = $nfm[$i];
			$dpa = $nfa[$i];
			$dpm = $dpm + $garantia[$i];
			$dpmresto=0;
			$dpmresto = $dpm%12;
			if ($dpmresto==0){
				$dpmresto=$nfm[$i];
				$difdpa = (floor($dpm/12))-1;
			}else{
				$difdpa = floor($dpm/12);
			}
			$dpa = $dpa + $difdpa;
			if (strlen($dpmresto)==1){$dpmresto = '0'.$dpmresto;}

			$datavencgar = $dpa.$dpmresto.$nfd[$i];
			
			// ATULALIZA DADOS NA TABELA PARCELAS
                $condicao_oc = "numnf = '$nf[$i]', ";
                $condicao_oc .= "datanf = '$datanf', ";
                $condicao_oc .= "datavencgar = '$datavencgar' ";
				
 				$prod->upProdU("ocprod",$condicao_oc, "codpoc=$codpoc");

		}
		
			$v_frete = str_replace('.','',$v_frete);
			$v_frete = str_replace(',','.',$v_frete);
			$v_seguro = str_replace('.','',$v_seguro);
			$v_seguro = str_replace(',','.',$v_seguro);
			$v_outrasd = str_replace('.','',$v_outrasd);
			$v_outrasd = str_replace(',','.',$v_outrasd);
			$v_icms_subst = str_replace('.','',$v_icms_subst);
			$v_icms_subst = str_replace(',','.',$v_icms_subst);
			$v_frete_transp = str_replace('.','',$v_frete_transp);
			$v_frete_transp = str_replace(',','.',$v_frete_transp);
				
						
			// ATUALIZA QTDE NOVA NO ESTOQUE
			$prod->upProdU("oc", "v_frete_nota = '$v_frete', v_seguro= '$v_seguro', v_desp_acess = '$v_outrasd', icms_subs = '$v_icms_subst', v_frete_transp = '$v_frete_transp', icms_frete = '$icms_frete', tipo_frete = '$tipo_frete' ", "codoc='$codoc'");
				$Action = "update";
			
		 break;


	case "importcb":

		$erro = 1;

		$prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

		for($i = 0; $i < count($array3); $i++ ){
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprod_ped = $prod->showcampo2();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			for($j = 0; $j < count($codcb_array); $j++ ){

				$prod->listProdU("codbarra", "codbarra", "codcb = $codcb_array[$j]");
				$codbarra = $prod->showcampo0();

				//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
				$prod->listProdSum("COUNT(*) as numreg", "codbarra", "codbarra = '$codbarra' and codbarraped <> '1' and codprod=$codprod_ped and codemp=$codempselect", $array, $array_campo, "" );
				$prod->mostraProd( $array, $array_campo, 0 );
				$numreg = $prod->showcampo0();

				// VERIFICA LIBERACAO DO CODBARRA
				$prod->listProdU("IF (chkcb = 'N' , 'S', 'N')", "produtos", "codprod = $codprod_ped");
				$libcb = $prod->showcampo0();
			
				if ($libcb == "S"){$numreg = 0;}
				
				#echo"$codbarra - $numreg - $libcb<br>";

				if ($numreg <> 0){
					$erro = $erro *0;
				}else{
					$erro = $erro *1;
				}//NUMREG

			}//FOR

		}//FOR

		// INSERE CODBARRA
		if ( $erro == 1){

		$prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

		for($i = 0; $i < count($array3); $i++ ){
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprod_ped = $prod->showcampo2();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);

			for($j = 0; $j < count($codcb_array); $j++ ){
			
				$prod->listProdU("codbarra", "codbarra", "codcb = $codcb_array[$j]");
				$codbarra = $prod->showcampo0();
				

				// CRIA CODBARRA
					$prod->clear();
					$prod->setcampo1($codoc);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3($codbarra);
					$prod->setcampo8($codempselect);
					$prod->setcampo9($j); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
					$prod->setcampo10("N"); // FLAG RMA
					$prod->setcampo11("N"); // FLAG PECA ANTIGA
					$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
					$prod->setcampo16($dataatual); // DATA INSERT
					$prod->setcampo17("A"); // TIPO NF 
					$prod->setcampo26(""); // TIPO FAB
					
										
					$prod->addProd("codbarra", $ureg);

			}//FOR

		}//FOR


		// ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
		$codempoc = $prod->showcampo1();

		// VERIFICA COTACAO OC
		$prod->listProd("moeda", "codmoeda=$codmoedaoc");
		$cotacao = $prod->showcampo2();
		$datacotacao = $prod->showcampo3();
		
		
		// ATUALIZA DADOS DA TABELA ESTOQUE
		$prod->listProdgeral("ocprod", "codoc=$codoc", $array99, $array_campo99 , "");

		for($i = 0; $i < count($array99); $i++ ){
			
			$prod->mostraProd( $array99, $array_campo99, $i );

			$codpoc = $prod->showcampo0();	
			$codprodoc = $prod->showcampo2();
			$qtderec = $prod->showcampo4();
			$pcu = $prod->showcampo5();

					
				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempoc and codprod=$codprodoc");

				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				$codmoedaprod = $prod->showcampo8();
				#$puc = $prod->showcampo9();
				#$datauc = $prod->showcampo10();
				$pcm = $prod->showcampo11();
				
								
				//CAMBIO DE MOEDAS
					
					// MODIFICA A COTACAO DO PRODUTO ORIGINAL PARA A MOEDA DO PRODUTO DA OC
					// PASSA TODOS OS VALORES PARA MESMA BASE

					$prod->listProd("moeda", "codmoeda=$codmoedaprod");		
					$tipomoedaprod = $prod->showcampo1();
					$cotacaoprod = $prod->showcampo2();

					$pcucambio = ($pcu*$cotacao)/$cotacaoprod;	
					//$pcmcambio = ($pcm*$cotacao)/$cotacaoprod;	
					$pcmcambio = $pcm;
			
								
				// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS DO MESMO GRUPO
					$prod->clear();
					$prod->listProdU("codgrupo", "empresa", "codemp='$codempselect'");		
					$codgrupo_emp = $prod->showcampo0();
					
					$prod->clear();
					$prod->listProdSum("(SUM(qtde)-SUM(reserva)) as estoque", "estoque, empresa", "codprod=$codprodoc AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
	
					$prod->clear();
					$prod->listProdSum("(SUM(qtde)) as estoque_trans", "pedido, pedidoprod, empresa", "ped_transf = 'OK' AND cb <> 'OK' AND cancel <> 'OK' AND pedido.codped = pedidoprod.codped and codprod=$codprodoc  AND empresa.codemp = pedido.codemp and codgrupo = '$codgrupo_emp'", $array992, $array_campo992, "" );
					$prod->mostraProd( $array992, $array_campo992, 0 );
					$estoque_trans = $prod->showcampo0();
					
					$estoque = $estoque + $estoque_trans;
								
					//CALCULA O PCM NOVO
					if (($estoque) > 0 and $pcmcambio <> 0):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtderec))/($estoque+$qtderec);
					else:
						$pcmnovo = $pcucambio;
					endif;


				$qtdenovo = $qtdeold + $qtderec;
				//echo("$qtdenovo");
				
				// ATUALIZA QTDE NOVA NO ESTOQUE
				$prod->upProdU("estoque", "qtde = qtde + $qtderec", "codprod=$codprodoc and codemp='$codempselect'");
				
				//VERIFICA EMPRESAS DO GRUPO
				$prod->listProdSum("codemp", "empresa", "codgrupo = '$codgrupo_emp'", $array992, $array_campo992, "" );
								
				for($t = 0; $t < count($array992); $t++ ){
				
					$prod->mostraProd( $array992, $array_campo992, $t );
					$codemp_now = $prod->showcampo0();
					
					// ATUALIZA PCM E PUC NA TABELA ESTOQUE POR EMPRESAS DO MESMO GRUPO
					//$prod->upProdU("estoque, empresa", "pcm  = '$pcmnovo', puc = '$pcucambio', datauc = '$dataatual' ", "codprod=$codprodoc  AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'");
					
					// ATUALIZA PCM E PUC NA TABELA ESTOQUE POR EMPRESAS DO MESMO GRUPO
					$prod->upProdU("estoque", "pcm  = '$pcmnovo', puc = '$pcucambio', datauc = '$dataatual' ", "codprod=$codprodoc and codemp = '$codemp_now'");

				}

				
				// FINALIZAÇÃO - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
				$prod->upProdU("ocprod", "cb  = 'OK'", "codpoc=$codpoc");
				
				
		}

			$msg_erro = "IMPORTAÇÃO COMPLETA";
			$lib_end = 1;

		}else{

			$msg_erro = "ERRO NA IMPORTAÇÃO DO CODBARRAS";

		}
		
		$Action = "update";
				
		 break;
*/


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nome";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";

		if ($palavrachave == ""):
							
			$condicao2 = "";
			if ($codempselect <> ""):

				if ($codocpesq <>""):
					$condicao3 .= "oc.codemp='$codempselect'";
					$condicao3 .= "and oc.codoc='$codocpesq'";
					$condicao3 .= "and oc.codfor=fornecedor.codfor";
				else:
					$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor";
				endif;
			
			else:

				$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor";
		
			endif;
		

		else:
			
			if ($codempselect <> ""):

				if ($codocpesq <>""):
					$condicao3 .= "oc.codemp='$codempselect'";
					$condicao3 .= "and oc.codoc='$codocpesq'";
					$condicao3 .= "and oc.codfor=fornecedor.codfor";
				else:
					$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor and" . $condicao2 ;
				endif;
			
			else:

				$condicao3 = "oc.hist = '$hist' and oc.codemp='$codempselect' and oc.codfor=fornecedor.codfor";
			
			endif;

		endif;


		break;


		
		}

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "oc, fornecedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codoc, oc.codfor, codmoeda, datacompra, dataprevcheg, voc, fornecedor.nome, ocmod", "oc, fornecedor", $condicao3, $array, $array_campo, $parm );
		
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
<script language='JavaScript'>


function adjust(element) {

	return element.value.replace ('.', ',');
}


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

</script>

");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "recalc" ):
	
#-- Mostra dados da tabela OCTEMP

 	$prod->listProd("oc", "codoc=$codoc");

		$codoc = $prod->showcampo0();
		$codemp = $prod->showcampo1();
		$codfor = $prod->showcampo2();
		$codmoeda = $prod->showcampo3();
		$codvend = $prod->showcampo4();
		$contato = $prod->showcampo5();
		$dtoc = $prod->showcampo7();
		$obs = $prod->showcampo10();
		$dtoc = $prod->fdata($dtoc);
		$dprevcheg = $prod->showcampo11();
		$codped_transf = $prod->showcampo14();
		$cb = $prod->showcampo15();

		$dprevcheg = str_replace('-','',$dprevcheg);
		$anopar = substr($dprevcheg,0,4);
		$mespar = substr($dprevcheg,4,2);
		$diapar = substr($dprevcheg,6,2);

		#$dprevcheg = $prod->fdata($dprevcheg);
		$hist = $prod->showcampo13();
		
 $prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);

$prod->listProd("fornecedor", "codfor=$codfor");
				
		$nomeforold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$tel1old = $prod->showcampo7();
		$tel2old = $prod->showcampo8();
		$cgcold = $prod->showcampo14();
		$ieold = $prod->showcampo16();
		$contatoold = $prod->showcampo17();
		$emailold = $prod->showcampo19();

 $prod->listProd("moeda", "codmoeda=$codmoeda");
				
		$tipomoeda = $prod->showcampo1();
		$cotacao = $prod->showcampo2();
		$datacot = $prod->showcampo3();
		$datacot = $prod->fdata($datacot);

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>ADMINISTRAÇÃO</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></b></td>
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
<form method='POST' name='Form54' action='$PHP_SELF?Action=altdata'>							
 <div align='center'>
      <center>
      <table border='0' width='550' cellspacing='1' cellpadding='2'>
        <tr>
          <td width='315' bgcolor='#000000'><b><font face=' Verdana, Arial, Helvetica, sans-serif' color='#F0F0F0' size='3'>$titulo1:&nbsp;$codoc</font></b></td>
          <td width='217' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='2' color='#86ACB5'><b>
       $nomeempold </b></font></td>
        </tr>
      </center>
      <tr>
        <td width='318' bgcolor='#F0F0F0'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MOEDA DA OC:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$tipomoeda</font></td>
        <center>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>COMPRADOR:<br>
          </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        FORNECEDOR</b></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>FORNECEDOR:<br>
        </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeforold</font></b></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>CNPJ:<br>
      </font></b><font color='#000000'>$cgcold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$enderecoold
        - $cidadeold - $bairroold - $estadoold - $cepold</font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>INSC. EST.:<br>
      </font></b><font color='#000000'>$ieold</font></font></td>
        </tr>
        <tr>
      <td width='318' bgcolor='#F0F0F0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>EMAIL:<br>
        </font></font></b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#000000'>$emailold</font></font></td>
      <td width='214' bgcolor='#F0F0F0'>
      <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#336699'>TELEFONE<br>
      </font></b><font color='#000000'>&nbsp;$tel1old<br>&nbsp;$tel2old</font></font></td>
        </tr>
        <tr>
      <td width='540' bgcolor='#808080' colspan='2'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        COMPLEMENTARES</b></font></td>
        </tr>
        <tr>
          <td width='315' bgcolor='#F0F0F0'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS:<br>
            </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obs</font></td>
        </center>
        <td width='217' bgcolor='#F0F0F0'>
		<p align='right'><font size='1'><b>
      <font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>DATA 
      PREV. CHEGADA:<br>
      </font><font face=' Verdana, Arial, Helvetica, sans-serif'><input type='text' name='dvenc' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc' value='$anopar'  size='4' maxlength='4'></font></b></font>
        </td>
      </tr>
      <center>
      <tr>
        <td width='540' colspan='2'>
        <hr size='0'>
        </td>
      </tr>
      </table>
      </center>
    </div>

			  <p align='center'><input type='submit' value='Alterar Data OC.' name='B1' class='sbttn'></p>

	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='retorno' value='1'>
		<input type='hidden' name='desloc' value='$desloc'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
	</form>
	  <br>

");
if ($codped_transf <> 0){
$valorcampo = "ATUALIZAR NOTAS";
echo("

<form name='form1' method='post' action='$PHP_SELF?Action=recalc&desloc=0'>

");
}else{
$valorcampo = "RECALCULAR VALORES";	
echo("
<form name='form1' method='post' action='$PHP_SELF?Action=recalc&desloc=0'>

");
}
echo("
 <table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
        <tbody>
          <tr>
            <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
              PRODUTOS</font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
              <b>DA ORDEM DE COMPRA</b></font></td>
          </tr>
        </tbody>
      </table>
<table border='0' width='100%'  cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'>
    <td width='5%'>&nbsp;</td>
	<td width='19%' height='29'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS</b></font></td>
	<td width='4%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>CST</b></font></td>
	<td width='4%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='11%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br /> 
    UNIT&Aacute;RIO </b></font></td>
	<td width='10%' height='29' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR <br />
    TOTAL </b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>ICMS<br />
(%)</b></font></td>
	<td width='3%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>IPI<br />
(%)</b></font></td>
	<td width='11%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>VALOR<br />
 IPI </b></font></td>
	<td width='25%' height='29' align='center'>
	<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>NF<br>
	(MÊS)</b></font></td>
	<td width='4%' height='29' align='center'>
	<p align='center'><b><font color='#ffffff' size='1' face='Verdana, Arial, Helvetica, sans-serif'>T</font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>IPO</b></font></td>
	<td align='center' width='1%' height='29'><b><font color='#FFFFFF' size='1' face='Verdana, Arial, Helvetica, sans-serif'>CB</font></b></td>
  </tr>
  
  
 ");
				$prod->clear();
			  $prod->listProdgeral("ocprod", "codoc=$codoc", $array3, $array_campo3 , "order BY codprod");

	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
			$codpoc = $prod->showcampo0();
			$codprodoc = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$qtderec = $prod->showcampo4();
			$garantia = $prod->showcampo6();
			$nf = $prod->showcampo8();
			$datanf = $prod->showcampo9();
			$nfa = substr($datanf,0,4);
			$nfm = substr($datanf,5,2);
			$nfd = substr($datanf,8,2);
			$cb = $prod->showcampo11();
			$tipo_nf = $prod->showcampo12();
			$icms = $prod->showcampo13();
			$ipi = $prod->showcampo14();
			$cst_a = $prod->showcampo16();
			$cst_b = $prod->showcampo17();
			$obs_fab = $prod->showcampo18();
			$xcodfab = $prod->showcampo20();
			$xtipo_port = $prod->showcampo21();
			$xport = $prod->showcampo22();
			$xport_comp = $prod->showcampo23();
			$xdataport = $prod->showcampo24();
			$xaport = substr($xdataport,0,4);
			$xmport = substr($xdataport,5,2);
			$xdport = substr($xdataport,8,2);
			$xnf_fab = $prod->showcampo25();
			$datanf_fab = $prod->showcampo26();
			$xanf = substr($datanf_fab,0,4);
			$xmnf = substr($datanf_fab,5,2);
			$xdnf = substr($datanf_fab,8,2);
			
		
			
			
						
			if ($cb=="OK"){$corcb="#339900";}else{$cb="NO";$corcb="#FF0000";}
			#if ($qtderec == 0){$qtderec = $qtde;}

			#$codprodcj = $prod->showcampo8();
			$pcu = $prod->showcampo5();
			$dtprev = $prod->showcampo10();
			$dtprev = $prod->fdata($dtprev);
			if ($qtde<>$qtderec){
			$put= $qtde*$pcu;
			}else{
			$put= $qtderec*$pcu;
			}
			
			$v_icms = ($qtde*$pcu*$icms)/100;
			$v_ipi = ($qtde*$pcu*$ipi)/100;
			$v_ipif = $prod->fpreco($v_ipi);

			$prod->listProdU("nomeprod, unidade, chkcb, chk_ppb", "produtos", "codprod=$codprodoc");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$chkcb = $prod->showcampo2();
			$chk_ppb = $prod->showcampo3();
			
			$prod->clear();
			$prod->listProdU("nome, cgc", "fornecedor", "codfor='$xcodfab'");
			$xnomefab = $prod->showcampo0();
			$xcgcfab = $prod->showcampo1();
			
						
			/*
			$prod->listProdgeral("produtos", "codprod=$codprodcj", $array12, $array_campo12 , "");
			$prod->mostraProd( $array12, $array_campo12, 0 );

			$nomeprodcj = $prod->showcampo19();
			*/
			
		

		$k=$i+1;

		$fput = $prod->fpreco($put);
		$fpcu = $prod->fpreco($pcu);


echo("
  <tr bgcolor='#F2E4C4'>
   <td width='5%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href=\"javascript:void(0);\" onClick=\"MM_openBrWindow('$PHP_SELF?pg=137&pg_ped=1&codpedselect=$codpedselect&codprodselect=$codprodoc&menu_not=1','Detalhes','scrollbars=yes,width=550,height=400')\"><b>$codprodoc</b></a></font></td>
	<td width='19%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
	 <td width='4%' height='0' align='center'> <select name='cst_a[$i]' id='cst_a[$i]'>
				    <option value='0'>0</option>
					<option value='1'>1</option>
				    <option value='2'>2</option>
				    <option value='$cst_a' selected>$cst_a</option>
					</select>
					<select name='cst_b[$i]' id='cst_b[$i]'>
				    <option value='00'>00</option>
					<option value='10'>10</option>
				    <option value='20'>20</option>
					<option value='30'>30</option>
					<option value='40'>40</option>
					<option value='41'>41</option>
					<option value='50'>50</option>
					<option value='51'>51</option>
					<option value='60'>60</option>
					<option value='70'>70</option>
					<option value='90'>90</option>
				    <option value='$cst_b' selected>$cst_b</option>
					</select></td>
    <td width='4%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font><input type='hidden' name='qtderec[$i]' size='4' value='$qtde'>
</td>
    <td width='11%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'> <input type='text' name='preco[$i]' size='10' maxlength='10' value='$fpcu' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" ></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$fput</b></font></td>
	<td align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	 <select name='icms[$i]' id='icms[$i]'>
				    <option value='0'>0</option>
				    <option value='7'>7</option>
				    <option value='12'>12</option>
				    <option value='18'>18</option>
				    <option value='25'>25</option>
				    <option value='30'>30</option>
					<option value='$icms' selected>$icms</option>
                                    </select></font></td>
	<td align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	 <select name='ipi[$i]' id='ipi[$i]'>
				    <option value='0'>0</option>
					<option value='0.75'>0.75</option>
				    <option value='1'>1</option>
				    <option value='2'>2</option>
				    <option value='3'>3</option>
				    <option value='5'>5</option>
				    <option value='8'>8</option>
				    <option value='10'>10</option>
				    <option value='15'>15</option>
				    <option value='20'>20</option>
				    <option value='25'>25</option>
					<option value='$ipi' selected>$ipi</option>
                                    </select></font></td>
	<td align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_ipif</font></td>
	");
	#if ($hist <> 1){ 
	echo("
	<td width='29%' height='0' align='center'><input name='nf[$i]' type='text' id='nf[$i]' value='$nf' size='7' maxlength='6' />
	  <br>
	  <input name='nfd[$i]' type='text' id='nfd[$i]' value='$nfd' size='2' maxlength='2' />
/
<input name='nfm[$i]' type='text' id='nfm[$i]' value='$nfm' size='2' maxlength='2' />
/
<input name='nfa[$i]' type='text' id='nfa[$i]' value='$nfa' size='4' maxlength='4' /></td>
	");
	#}else{
	#echo("
	
	#<td width='25%' height='0' align='center'>$nf<br>$nfd/$nfm/$nfa</td>
	
	#");
	#}
	echo("
	<td width='4%' height='0' align='center'><font color='#FF0000'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><strong><font color='#000000'>
	 <select name='tipo_nf[$i]'>
				     <option value='P'>P</option>
				     <option value='V' >V</option>
					  <option value='$tipo_nf' SELECTED>$tipo_nf</option>
				   </select></font></strong></font></font></td>
	<td align='center' width='1%' height='0'>
	");
	
if ($qtderec <> 0){

		//HISTORICO OU CB OK 
		if ($cb=="OK" or $hist==1){
				
		 echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=\"NewWindow('iniciocb.php?Action=list&desloc=$desloc&codemp=$codemp&codprod=$codprodoc&codoc=$codoc&codpoc=$codpoc&cont=$qtderec&codempselect=$codemp&retlogin=$retlogin&connectok=$connectok&pg=$pg&cb_ok=1&tipo_nf=$tipo_nf','name','500','400','yes');return 
false\">$cb</a></b></font>");

		// FALTA PASSAR CB
		}else{

			 if ($codped_transf == 0){
				
			 	// LIBERA CODBARRA
			    if ($chkcb <>'Y'){
				 echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>SCB</b><br><input type='text' name='scb[$i]' size='8' ></font>");
				 
				// NAO LIBERA CODBARRA
			 	}else{
				echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=\"NewWindow('iniciocb.php?Action=list&desloc=$desloc&codemp=$codemp&codprod=$codprodoc&codoc=$codoc&codpoc=$codpoc&cont=$qtderec&codempselect=$codemp&retlogin=$retlogin&connectok=$connectok&pg=$pg&tipo_nf=$tipo_nf','name','500','400','yes');return false\">$cb</a></b></font>");
			   }//FIM LIBERA
			 
			 // PEDIDO TRANSFERENCIA
			 }else{

				 echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b>$cb</b></font>");
			 }



		  }
}else{
	 echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb' align='center'>PREENCHER<bR>QTDE CHEG.</font> ");
	
}// QTDEREC = 0
	echo("
	
	
	</td>
  </tr>
   ");
  
  if ($chk_ppb == "S"){
  echo ("
  
 <tr bgcolor='#FFFFFF'>
   <td align='center' colspan='18'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>DADOS DA NOTA DO FABRICANTE</B><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></td>
  </tr>
 <tr bgcolor='#FFFFFF'>
   <td align='center' colspan='18'><table width='100%' border='0' cellpadding='1' cellspacing='1'>
     <tr>
       <td width='6%' bgcolor='#FFFFCC'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>FABRICANTE:</strong></font></td>
       <td colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif'>
         <select name='codfab_select[$i]' id='codfab_select[$i]'>
		 
		 ");
		 $prod->clear();
		 $prod->listProdSum("codfor, nome, cgc", "fornecedor", "fabricante = 'S'", $array992, $array_campo992, "order by nome" );
								
				for($t = 0; $t < count($array992); $t++ ){
				
					$prod->mostraProd( $array992, $array_campo992, $t );
					$codfab = $prod->showcampo0();
					$nomefab = $prod->showcampo1();
					$cgcfab = $prod->showcampo2();
		 echo("
           <option value='$codfab'>$cgcfab - $nomefab</option>
         
		   ");
		   }
		  echo("
		    <option value='$xcodfab' selected>$xcgcfab - $xnomefab</option>
           </select>
         <br />
       </font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>CNPJ:</font><b>$xcgcfab</b></td>
     </tr>
     <tr>
       <td bgcolor='#FFFFCC'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> PORTARIA: </font></td>
       <td><font face='Verdana, Arial, Helvetica, sans-serif'>
         <select name='tipo_port[$i]' id='select'>
           <option value='SUFRAMA'>SUFRAMA</option>
           <option value='MCT'>MCT</option>
		    <option value='$xtipo_port' selected>$xtipo_port</option>
         </select>
           <input name='port[$i]' type='text' id='port[$i]' value='$xport' size='3' maxlength='3' />
         /
         <input name='port_comp[$i]' type='text' id='port_comp[$i]' value='$xport_comp' size='2' maxlength='2' />
       </font></td>
       <td bgcolor='#FFFFCC'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>DATA PORTARIA:</font></td>
       <td><input name='dport[$i]' type='text' id='dport[$i]' size='2' maxlength='2' value = '$xdport'/>
/
 <input name='mport[$i]' type='text' id='mport[$i]' size='2' maxlength='2' value = '$xmport'/>
/
<input name='aport[$i]' type='text' id='aport[$i]' size='4' maxlength='4' value = '$xaport'/></td>
     </tr>
     <tr>
       <td bgcolor='#FFFFCC'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>NF/DATA NF:</font></td>
       <td colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif'>
         <input name='nf_fab[$i]' type='text' id='nf_fab[$i]' value='$xnf_fab' size='60' maxlength='100' /><br><font color='#FF0000' size='-6'>ex: 278977 de 12/04/2007 368726 de 03/06/2006</font>       </font>
       </font></td>
     </tr>
     <tr>
       <td bgcolor='#FFFFCC'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>OBS:</font></td>
       <td colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif'>
         <input name='obs_fab[$i]' type='text' id='obs_fab[$i]' value='$obs_fab' size='100' maxlength='200' /> <br />
       <font color='#FF0000' size='-6'>ex: outras portarias ou informações complementares</font>
       </font></td>
     </tr>
   </table></td>
  </tr>
  
  ");
  
  }//PROD PPB

	$ptotal = $ptotal + $put;
	$v_icmst = $v_icmst + $v_icms;
	$v_ipit = $v_ipit + $v_ipi;
	 }//FOR
	 
	 $ptotalf = $prod->fpreco($ptotal);
	$v_icmstf = $prod->fpreco($v_icmst);
	$v_ipitf = $prod->fpreco($v_ipit);
	
	
	
	$prod->clear();
	$prod->listProdU("v_frete_nota , v_seguro, v_desp_acess, icms_subs, v_frete_transp, icms_frete, tipo_frete ", "oc", "codoc=$codoc");
			$v_frete = $prod->showcampo0();
			$v_seguro = $prod->showcampo1();
			$v_outrasd = $prod->showcampo2();
			$v_icms_subst = $prod->showcampo3();
			$v_frete_transp = $prod->showcampo4();
			$icms_frete = $prod->showcampo5();
			$tipo_frete = $prod->showcampo6();
			$v_fretef = $prod->fpreco($v_frete);
			$v_segurof = $prod->fpreco($v_seguro);
			$v_outrasdf = $prod->fpreco($v_outrasd);
			$v_icms_substf = $prod->fpreco($v_icms_subst);
			$v_frete_transpf = $prod->fpreco($v_frete_transp);
	

	$ptotal_notaf = $prod->fpreco($ptotal+$v_ipit+$v_frete+$v_seguro+$v_outrasd+$v_icms_subst);		
			
	echo("
		

		
<tr bgcolor='#FFFFFF'>
    <td width='5%'>&nbsp;</td>
	<td width='19%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	</font></td>
	<td width='4%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='4%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='11%' height='0' align='center'>&nbsp;</td>
	<td width='10%' height='0' align='center'>&nbsp;</td>
	<td width='3%' align='center'>&nbsp;</td>
	<td width='3%' align='center'>&nbsp;</td>
	<td width='11%' align='center'>&nbsp;</td>
	<td width='25%' height='0' align='center'>&nbsp;</td>
	<td width='4%' height='0' align='center'>&nbsp;</td>
	<td align='center' width='1%' height='0'>	</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' colspan='9' align='right'><table width='100%' border='0'>
      <tr>
        <td align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR <br>
          FRETE:</b></font></td>
        <td><input name='v_frete' type='text' id='v_frete' value='$v_fretef' size='10' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" /></td>
        <td align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR<br> 
          SEGURO:</b></font></td>
        <td><input name='v_seguro' type='text' id='v_seguro' value='$v_segurof' size='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\"/></td>
        <td align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OUTRAS<br> 
          DESPESAS :</b></font></td>
        <td><input name='v_outrasd' type='text' id='v_outrasd' value='$v_outrasdf' size='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" /></td>
        <td align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS<br> 
          SUBST.:</b></font></td>
        <td><input name='v_icms_subst' type='text' id='v_icms_subst' value='$v_icms_substf' size='10'  onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" /></td>
      </tr>
    </table></td>
    <td height='0' align='center'>&nbsp;</td>
    <td align='center' height='0'></td>
  </tr>
 <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' align='right'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='6' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td align='center' height='0'></td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' align='right' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR ICMS:</b></font></td>
    <td height='0' align='center' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$v_icmstf</font></td>
    <td height='0' colspan='6' align='right' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>VALOR TOTAL DOS PRODUTOS:</b></font></td>
    <td height='0' align='center' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$ptotalf</font></td>
    <td height='0' colspan='2' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' align='left' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>1 - EMITENTE<br>
2 - DESTINAT&Aacute;RIO </b></font></td>
    <td height='0' align='center' bgcolor='#FFCC66'><select name='tipo_frete' id='tipo_frete'>
      <option value='1'>1</option>
      <option value='2'>2</option>
      <option value='$tipo_frete' selected>$tipo_frete</option>
        </select></td>
    <td height='0' colspan='6' align='right' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>VALOR TOTAL IPI:</b></font></td>
    <td height='0' align='center' bgcolor='#FFCC66'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$v_ipitf</font></td>
    <td height='0' colspan='2' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' bgcolor='#FF9933'>&nbsp;</td>
    <td height='0' align='center' bgcolor='#FF9933'>&nbsp;</td>
    <td height='0' colspan='6' align='right' bgcolor='#FF9933'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>VALOR TOTAL DA NOTA:</b></font></td>
    <td height='0' align='center' bgcolor='#FF9933'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>$ptotal_notaf</strong></font></td>
    <td height='0' colspan='2' align='center'>&nbsp;</td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' colspan='6' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td height='0' align='center'>&nbsp;</td>
    <td align='center' height='0'></td>
  </tr>
  <tr bgcolor='#FFFFFF'>
    <td>&nbsp;</td>
    <td height='0' colspan='9'><table width='100%' border='0'>
      <tr bgcolor='#D6B778'>
        <td colspan='4' bgcolor='#D6B778'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>FRETE TRANSPOSTADORA:</b></font></td>
        </tr>
      <tr bgcolor='#D6B778'>
        <td align='right' bgcolor='#F2E4C4'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>VALOR FRETE TRANSP:</b></font></td>
        <td bgcolor='#F2E4C4'><input name='v_frete_transp' type='text' id='v_frete_transp' value='$v_frete_transpf' size='10' onkeyPress='if (!(mascara_valor(this))) return false;' onFocus=\"virgula(this, '', 1)\" onBlur=\"virgula(this, 1, '')\" /></td>
        <td align='right' bgcolor='#F2E4C4'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ALIQUOTA ICMS TRANSP  :</b></font></td>
        <td bgcolor='#F2E4C4'><select name='icms_frete' id='icms_frete'>
				    <option value='7'>7</option>
				    <option value='12'>12</option>
				    <option value='18'>18</option>
				    <option value='25'>25</option>
				    <option value='30'>30</option>
				    <option value='$icms_frete' selected>$icms_frete</option>
                                    </select>
          <b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> %</font></b></td>
      </tr>
    </table></td>
    <td height='0' align='center'>&nbsp;</td>
    <td align='center' height='0'></td>
  </tr>
</table>



<BR><BR>

	 		   ");

	#$ptotal = $ptotal + $put;
	if($cb=="OK"){echo("<input type='hidden' name='qtderec[$i]' value='$qtderec'>");}
	 
	
	#$ptotalf = $prod->fpreco($ptotal);

	//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
	$prod->listProdSum("COUNT(*) as numreg", "ocprod", "codoc=$codoc and cb not like 'OK'", $array99, $array_campo99, "" );
	$prod->mostraProd( $array99, $array_campo99, 0 );
	$numregcb = $prod->showcampo0();



	echo("
		

        
			<br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					  <td width='58%'>&nbsp;
                        <table border='0' width='100%' cellspacing='0' cellpadding='2'>
                          <tr>
                            <td width='5%'><img border='0' src='images/bt-continuaped.gif' ></td>
                            <td width='32%'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR
                              A LISTAGEM</a></b></font></td>
                            <td width='5%'><img border='0' src='images/bt-recalculaped.gif' ></td>
                            <td width='58%'><font size='1' face='Verdana'><b>
				
								<input class='sbttn' type='submit' name='Submit' value='$valorcampo'><BR>$msg_erro</b></font>
							
                            </td>
                          </tr>
                        </table>
                        &nbsp;</td>
");
if ($tipomoeda == "Dolar"){$caractmoeda = "U$";}else{$caractmoeda = "R$";}
echo("
                      <td width='20%'>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>
              <input type='hidden' name='codoc' value='$codoc'>
			  <input type='hidden' name='codempselect' value='$codemp'>
			  <input type='hidden' name='codped' value='$codped_transf'>
			  <input type='hidden' name='retorno' value='1'>
			  <input type='hidden' name='retlogin' value='$retlogin'>
			  <input type='hidden' name='connectok' value='$connectok'>
			  <input type='hidden' name='pg' value='$pg'>
			  <input type='hidden' name='hist' value='$hist'>
			   <input type='hidden' name='ptotal_notaf' value='$ptotal_notaf'>
</form>
						  				
	      ");
if ($hist<>1 ){		  
		  
if ($codped_transf <> 0 and $hist<>1){
	$valorcampo1 = "IMPORTAR CODBARRAS";
	echo("
	
		
<form name='form3' method='post' action='$PHP_SELF?Action=importcb&desloc=0'>

	
			
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					  <td width='58%'>&nbsp;
                        <table border='0' width='100%' cellspacing='0' cellpadding='2'>
                          <tr>
                            <td width='5%'></td>
                            <td width='32%'></td>
                            <td width='5%'></td>
                            <td width='58%'><font size='1' face='Verdana'><b>
				");
							if ($codped_transf <> 0 and $numregcb == 0){
							echo("$msg_erro");
							}else{
							echo("
								<input class='sbttn' type='submit' name='Submit' value='$valorcampo1'><BR>$msg_erro</b></font>
							");
							}
							echo("
                            </td>
                          </tr>
                        </table>
                        &nbsp;</td>
");


if ($tipomoeda == "Dolar"){$caractmoeda = "U$";}else{$caractmoeda = "R$";}
echo("
                      <td width='20%'>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>
              <input type='hidden' name='codoc' value='$codoc'>
		<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='codped' value='$codped_transf'>
	<input type='hidden' name='retorno' value='1'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
</form>
						  				 <br><br>
");
}
echo("
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					        
                            <td width='100%'> <p><font size='1' face='Verdana'><font color='#FF0000'>
                      IMPORTANTE:</font> Para que possa FINALIZAR A ORDEM DE COMPRA é necessário preencher os CODIGOS DE BARRA no campo <b>CB</b>. </font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>
              
<br>
<BR>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font color='#336699'>V</font>
        - MODIFICAÇÃO DO OC</font></b></td>
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

	$prod->listProdgeral("ocmod", "codoc=$codoc", $array612, $array_campo612 , "order by datamod");
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


		$codbarra_troca = "";

	echo("
     <tr bgColor='#F2E4C4'>
        <td width='86' ><font face='Verdana' size='1'>$datamodf</font></td>
        <td width='263' ><font face='Verdana' size='1'><b>$nomeprod_mod<br>
          </b></font></td>
        <td width='44' ><font face='Verdana' size='1'>$qtde_mod</font></td>
        <td width='100' ><font face='Verdana' size='1'>$codbarra_troca</font></td>
        <td width='80'><font face='Verdana' size='1'><b>$statusmod</b></font></td>
      </tr>



");
	}
echo("
  </table>

              
              
              
");
if ($codped_transf == 0){
	$show_end = 1;
}else{
	if ($numregcb == 0){
			$show_end = 1;
	}else{
			$show_end = 0;
	}
}

 $prod->listProdgeral("ocprod", "codoc=$codoc and cb not like 'OK'", $array313, $array_campo313 , "");
 if (count($array313) == 0 and $show_end == 1){	
	 
	 $reg_cancel = $prod->listProd("ocprod", "codoc=$codoc");
	 if ($reg_cancel <> 0){
echo("
          <br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					        <td width='50%' align='right'><img border='0' src='images/bt-fechaped.gif' ></td>
                            <td width='50%'><font size='1' face='Verdana'><b>&nbsp;<a href='$PHP_SELF?Action=insert&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codoc=$codoc&retorno=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>FINALIZA ORDEM DE COMPRA</a></b></font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>

");
	 }else{
		 echo("
		  <br><br>
			  <div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
                    <tr>
					        <td width='50%' align='right'><img border='0' src='images/bt-fechaped.gif' ></td>
                            <td width='50%'><font size='1' face='Verdana'><b>&nbsp;<a href='$PHP_SELF?Action=delete&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codoc=$codoc&retorno=1&retlogin=$retlogin&connectok=$connectok&pg=$pg'>CANCELAR ORDEM DE COMPRA</a></b></font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>

			");
	 }
 }
}else{
echo("
			  <p><div align='center'>
                <center>
                <table cellSpacing='0' cellPadding='0' width='550' border='0'>
                  <tbody>
				  <tr>
					        <td width='40%' align='right'>&nbsp;</td>
                            <td width='60%'><font size='1' face='Verdana'><b>&nbsp;</b></font></td>
                    </tr>
                    <tr>
					        <td width='40%' align='right'><img border='0' src='images/bt-continuaped.gif' ></td>
                            <td width='60%'><font size='1' face='Verdana'><b>&nbsp;<a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>VOLTAR A LISTAGEM</a></b></font></td>
                    </tr>
                  </tbody>
                </table>
                </center>
              </div>
				
");
}

 echo("


        
 	
	




	");
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "delete" or $Action == "list"):

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
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='for'>Fornecedor</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->
		COD OC: <input type='text' name='codocpesq' size='5'> 
		NOME FOR: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codocnew' value='$codocnew'>
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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'>$nomeemp</option>
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
            <td width='26%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
              ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='27%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ORDEM
              DE COMPRA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>ORDEM
              DE COMPRA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1'><br>
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


	<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME FORNEC.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA OC</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MOEDA</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR<BR>PRODUTOS</font></b></div>
    </td>
	
	<td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV CHEG</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codoc = $prod->showcampo0();
			$codfor = $prod->showcampo1();
			$codmoeda = $prod->showcampo2();
			$dataoc = $prod->showcampo3();
			$dataoc = $prod->fdata($dataoc);
			$dataprevcheg = $prod->showcampo4();
			$dataprevcheg = $prod->fdata($dataprevcheg);
			$valor = $prod->showcampo5();
			$valorf = $prod->fpreco($valor);
			$nomefor = $prod->showcampo6();
			$ocmod = $prod->showcampo7();
			
			if ($ocmod == "OK"){$mod ="MOD";}else{$mod="";}
			
			$prod->listProd("moeda", "codmoeda=$codmoeda");
			$tipomoeda = $prod->showcampo1();

			if ($hist==1){$bgcorlinha="#99CCFF";}
			if ($hist==1){$botao="Detalhes";}else{$botao="Alterar";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codoc</font></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomefor</b></font></td>
	<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$dataoc</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$tipomoeda</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$valorf</font></b></td>
			
			<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$dataprevcheg<br><b>$mod</B></font></td>
			
			<td align='center' width='10%' height='0'><font size='1'><b><a
href='$PHP_SELF?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>$botao 
			  </font></b></a></font></td>
	");
if($hist<>1){
echo("
			<td align='center' width='10%' height='0'><font size='1'><b><!--<a
href='$PHP_SELF?Action=delete&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a>--></font></td>
	");
}else{
	echo("
<td align='center' width='10%' height='0'><font size='1'><b>&nbsp;</font></td>
	");
}
echo("
	   </tr>
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
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist";   
include("numcontg.php");
}


/// INCLUSÃO DO RODAPE ////

echo("<br><br>");
include ("sif-rodape.php");
}

?>
       
