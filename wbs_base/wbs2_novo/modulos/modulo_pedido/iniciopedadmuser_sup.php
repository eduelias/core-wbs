

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataped DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "ADMINISTRAÇÃO SUPERVISOR";
$subtitulo = "PEDIDOS";

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
		$var_codgrp = $prod->showcampo3();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}

	$dataatual = $prod->gdata();
// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$dataatual = $prod->gdata();

		// ATUALIZA STATUS DA TABELA
			$prod->setcampo0("");
			$prod->setcampo1($codped);
			$prod->setcampo2($dataatual);
			$prod->setcampo3($ncontato);
			$prod->setcampo4($login);

			$prod->addProd("pedido_contato", $ureg);

			$dataprevent = $aprev.$mprev.$dprev;

			// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedido", "codped=$codped");
			$prod->setcampo12($dataprevent);  // DATA PREV ENTREGA

			$prod->upProd("pedido", "codped=$codped");

			$Action= "update";

		
        break;

    case "update":

						
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;

	 case "insertparc":
	 
	 	for($p = 0; $p < $numpar_add; $p++ ){
	
		$prod->clear();
		$prod->setcampo0("");	
		$prod->setcampo1($codped);
		$prod->setcampo4("02.00");
		$prod->setcampo9("NO");
		$prod->setcampo10("NO");
		$prod->addProd("pedidoparcelas", $uregparc);
		
		}


		$Action="update";
		
	 break;


	 case "reajuste":
			
	 $prod->listProd("empresa", "codemp=$codempselect");
		$descmax = $prod->showcampo18();
    	$tac = $prod->showcampo22();
		#$fatorvista = $prod->showcampo20();
		#$taxa = $prod->showcampo21();
		#echo("t=$taxa");
		#$prod->listProd("vendedor", "nome='$login'");
		#$fatorcusto = $prod->showcampo6(); 
		
		$dataatual = $prod->gdata();
		
		
		// PESQUISA POR PRODUTOS QUE NAO POSSUEM PRODUTOS DE CELULAR
	    $prod->clear();
	    $prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codpedselect' and (produtos.codcat <> 46 and produtos.codcat <> 71) and pedidoprod.codprod=produtos.codprod ");
	    $count_prod = $prod->showcampo0();
	    
	    if ($count_prod == 0){
	      $tac = 0;
	      $num_parc_calc = 6;
	    }else{
	      $num_parc_calc = 6;
	    }

		// VERIFICA CAMPOS DOS PEDIDOS
		$prod->clear();
		$prod->listProdU("vpv, vt, vc, dataped, fatorvista, taxa, modoentr, md5_parc, mcv_prot, mcv_aplic, meia_mcv, tipo_vge, codcliente", "pedido", "codped=$codpedselect");
		$vpv = $prod->showcampo0();
		$vt = $prod->showcampo1();
		$vc = $prod->showcampo2();
		$dataped = $prod->showcampo3();
		$fatorvista = $prod->showcampo4();
		$taxa = $prod->showcampo5();
		$modoentrf = $prod->showcampo6();
		$md5_parc = $prod->showcampo7();
        $mcv_prot = $prod->showcampo8();
        $mcv_aplic = $prod->showcampo9();
        $meia_mcv = $prod->showcampo10();
		$tipo_vge = $prod->showcampo11();
		$codcliente = $prod->showcampo12();

		for($p = 0; $p <= $nump; $p++ ){
		
			$datap[$p] = $avenc[$p].$mvenc[$p].$dvenc[$p];
			$difdias = $prod->numdias($dataped,$datap[$p]); 
			$n = ($difdias/30);
            #echo("p=$p teste=$valor[$p] t=$tac<BR>");
			$valor[$p] = str_replace('.','',$valor[$p]);
			$valor[$p] = str_replace(',','.',$valor[$p]);
			
			#if ($nump > 6 and $p==0){$valor[0] = $valor[0] - $tac;}
			$valorp[$p] = $valor[$p]/(pow((1+($taxa/100)),$n));
			
			#echo("p=$p teste=$valor[$p] t=$tac<BR>");
			#echo("v=$valor[$p] - vp=$valorp[$p] - df=$difdias - n=$n<BR>");

			// CALCULO DO VALOR DE VENDA A VISTA ( SOMATORIO DAS PARCELAS CONVERTIDAS PARA VALOR PRESENTE )
			$valorvendavista = $valorvendavista + $valorp[$p];
			$valorvenda = $valorvenda + $valor[$p];

		}//FOR
		#echo "vv= $valorvendavista";
   	    if ($nump > $num_parc_calc ){
			$valorvendavista = $valorvendavista - $tac;
			#$valor[0] = $valor[0] + $tac;
		}else{
			$valorvendavista = $valorvendavista;
		}

		// CALCULO DO VALOR DE TABELA A VISTA
		$valortotaltabela = $vt;
		$valortotaltabelavista = $valortotaltabela*$fatorvista;
		$valorcustovista = $vc;
	    #if ($nump > 6 ){$valorcustovista = $valorcustovista + $tac;}
		#echo(" vvista(vpv)=$valorvista - ");
		if ($modoentrf == "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista - 5;}
		if ($modoentrf == "MOTOBOY" and $mentr <> "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista;}
		if ($mentr == "MOTOBOY" and $modoentrf <> "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista - 5;}
	
		$valorminimovenda = ($valortotaltabelavista - ($valorcustovista*($descmax/100)));
		$impostodif = $valorvendavista - $valortotaltabelavista;
		if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}
				
        #echo(" vt=$vt - vtv = $valortotaltabelavista - vc = $vc - i = $impostodif - vv = $valorvendavista ");

		#$impostodif = 0;

		// CALCULO DA COMISSAO

			// MARGEM DE LUCRO BRUTO
			$mlb = $valorvendavista - $valorcustovista - $impostodif;
			//MARGEM DE CONTRIBUICAO DE VENDA
			$mcv = (1000*($mlb)/$valortotaltabelavista);
            $mlb_real = $mlb;
            $mcv_real = $mcv;


        //////////////////////////////// MODULO MCV PROTEGIDO
		#$mcv_prot = 30;
		#$mcv_aplic = 50;
		#$meia_mcv = "S";

		if ($mcv_prot <> 0){

      	     if ($mcv < $mcv_prot and $mcv >= 0)
            {
                if ($meia_mcv == "S"){
                    $mcv = (($mcv_prot-$mcv_real)/2)+$mcv_real;
                    $mlb = ($mcv*$valortotaltabelavista)/1000;
                }else{
                    $mcv = $mcv_aplic;
                    $mlb = ($mcv_aplic*$valortotaltabelavista)/1000;
                }
            }
        }
        ////////////////////////////////FIM -  MODULO MCV PROTEGIDO
             

		// CALCULO DA COTA
		/*
		if ($valorparceladototal < $valorvista){
				$cota = (1-((1-($valorparceladototal/$valorvista))/($descmax/100)))*$valorvista;
		}else{
				$cota = (1-((1-($valorparceladototal/$valorvista))/(2*$descmax/100)))*$valorvista;
		}
		*/

		// CONSISTENCIA DO PEDIDO
		#echo("vppt(vt)=$valorparceladototal - vpvtabela=$valorvistatabela - vpvminimo=$valorvistaminimo - c=$cota");
		#if ($valorparceladototal > $valorvistaminimo){
		if ($valorvendavista > $valorminimovenda){
			
			// PEGA A ULTIMA DATA PARA PREVISAO ENTREGA
			/*
			$prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array77, $array_campo77, "order by datastatus DESC" );
			$prod->mostraProd( $array77, $array_campo77, 0 );
			$dataprevent = $prod->showcampo5();
			*/


			// INSERE PARCELAS NO BANCO DE DADOS
			 $prod->listProdgeral("pedidoparcelas", "codped=$codpedselect", $array612, $array_campo612 , "order by datavenc");
			 $pendfpg=1;
			 $aguarda_comp=1;		
			 $dindim=1;	
			 $ctr_parc = 1; 	
			 for($i = 0; $i < count($array612); $i++ ){
			
				$prod->mostraProd( $array612, $array_campo612, $i );
				$codparcped = $prod->showcampo0();
				$xtipoopcaixa = $prod->showcampo4();
				$datap[$i] = $avenc[$i].'-'.$mvenc[$i].'-'.$dvenc[$i];

				//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
				$prod->listProdU("tarifa", "formapg", "opcaixa='$tipoopcaixa[$i]'");
				$tarifa = $prod->showcampo0();
			
				$prod->mostraProd( $array612, $array_campo612, $i );
				$prod->setcampo2($datap[$i]);
				#echo("v=$valor[$i] - t=$tarifa - ");
				$valornovo[$i] = $valor[$i] + $tarifa;
				#$valornovo[$i] = $valor[$i];
				#echo("vn = $valornovo[$i]");
				$valornovo[$i] = number_format($valornovo[$i],2,'.','');
				#echo("vnp=$valornovo[$i]<BR>");
				$prod->setcampo3($valornovo[$i]);
				$prod->setcampo4($tipoopcaixa[$i]);
				$prod->setcampo5($numch[$i]);
				$prod->setcampo6($banco[$i]);
				$prod->setcampo7($agencia[$i]);
				$prod->setcampo8($conta[$i]);

				if(($tipoopcaixa[$i] =='02.01') and (($numch[$i] == "") or ($banco[$i] == "") or ($agencia[$i] == "") or ($conta[$i] == ""))){
					
					$pendfpg = $pendfpg*0;
					$prod->setcampo9("OK");
				}else{
					$pendfpg = $pendfpg*1;
					$prod->setcampo9("NO");
				}
				
				if($tipoopcaixa[$i] == '02.55' or $tipoopcaixa[$i] == '02.35' or $tipoopcaixa[$i] == '02.36') {
					
					$aguarda_comp = $aguarda_comp*0;
				
				}else{
					$aguarda_comp = $aguarda_comp*1;
				
				}

			$prod->upProd("pedidoparcelas", "codparcped=$codparcped");

			$vppnovo = $vppnovo + $valornovo[$i];
			
			//STRING DO MD5 DAS PARCELAS
			$string_md5 .= $datap[$i].$tipoopcaixa[$i].$valornovo[$i];

			// VERIFICA SE DENTRE AS PARCELAS EXISTE ALGUMA QUE POSSUI DINHEIRO OU CARTAO OU VISAELECTRON OU FINANCIAMENTO
			#if (($tipoopcaixa[$i] =='02.00' or $tipoopcaixa[$i] =='02.30' or $tipoopcaixa[$i] =='02.31' or  $tipoopcaixa[$i] =='02.32' or  $tipoopcaixa[$i] =='02.33' or  $tipoopcaixa[$i] =='02.34' or $tipoopcaixa[$i] =='02.40' or $tipoopcaixa[$i] =='02.41' or $tipoopcaixa[$i] =='02.42' or $tipoopcaixa[$i] =='02.43' or $tipoopcaixa[$i] =='02.44' or $tipoopcaixa[$i] =='02.45' or $tipoopcaixa[$i] =='02.46' or $tipoopcaixa[$i] =='02.47' or $tipoopcaixa[$i] =='02.48' or $tipoopcaixa[$i] =='02.49' or $tipoopcaixa[$i] =='02.50' or $tipoopcaixa[$i] =='02.51' or $tipoopcaixa[$i] =='02.52'  or $tipoopcaixa[$i] =='02.53'  or $tipoopcaixa[$i] =='02.54' or $tipoopcaixa[$i] =='02.55' or  $tipoopcaixa[$i] =='02.56') and $mcv >= 0){$dindim = $dindim*1;}else{$dindim = $dindim*0;}
				
			//VERIFICA SE A FORMA DE PAGAMENTO NECESSITA DE APROVACAO
			$prod->clear();
			$prod->listProdU("lib_aprov","formapg", "opcaixa = '".$tipoopcaixa[$i]."'");
			$lib_aprov = $prod->showcampo0();
			#echo "lib_aprov=$lib_aprov";
			if ($lib_aprov == 'S' and $mcv >= 0){$dindim = $dindim*1;}else{$dindim = $dindim*0;}
			
			// VERIFICA SE A FORMA DE PAGAMENTO LIBERA CONTRATO
			$prod->clear();
			$prod->listProdU("lib_contrato","formapg", "opcaixa = '".$tipoopcaixa[$i]."'");
			$lib_contrato = $prod->showcampo0();
			if ($lib_contrato == 'S'){$ctr_parc = $ctr_parc*1;}else{$ctr_parc = $ctr_parc*0;}
		
			#echo("d=$dindim - $tipoopcaixa[$i]");

			}//FOR PARCELAS
			
			#echo("vppn=$vppnovo");
			#echo("$string_md5");
			if ($pendfpg == 1){$pendfpgf = "NO";}else{$pendfpgf = "OK";}
			
			// GERA MD5 DAS PARCELAS
			$md5 = $prod->geraMD5($string_md5);

			// VERIFICA CONSITENCIA DE DATAS
			$prod->listProdMY("IF ('$dataped' > '2004-08-11 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$control = $prod->showcampo0();

			if ($dindim == 1){
				$reavalfpg = "NO";
			}else{
				if ($control == 'S' and ($md5 <> $md5_parc)){
					$reavalfpg = "OK";
				}else{
					if ($mcv > 0){
						$reavalfpg = "NO";
					}else{
						$reavalfpg = "OK";
					}
					if ($control == 'N'){
						$reavalfpg = "OK";
					}
				}
			}

			#echo("$control - $dindim - $md5 - $md5_parc - $reavalfpg");

            $endentrega = "$endentr;$numentr;$complementoentr;$cepentr;$bairroentr;$cidadeentr;$estadoentr;";
			
			
			
			// APLICA RESTRICAO DE CONTRATO
			if (($md5 <> $md5_parc)){
			
				$prod->clear();
				$prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codpedselect' and produtos.lib_contrato !='S' and pedidoprod.codprod=produtos.codprod ");
				$count_naolibcrt = $prod->showcampo0();
				#echo "ctr_parc = $ctr_parc  - nlib= $count_naolibcrt - statusped = $statusped - asscort = $asscontrato - tvge = $tipo_vge"; 
				
				if ($ctr_parc == 1  and $count_naolibcrt == 0){
				
					$contrato = "DC";
					
				}else{
					
					$prod->clear();
					$prod->listProdU("asscontrato", "clientenovo", "codcliente='$codcliente'");
					$asscontrato = $prod->showcampo0();
					
					if ($asscontrato <> "S" and $tipo_vge == 0){$contrato = "DC";}else{$contrato= "NO";}
					if ($count_prod == 0) {$contrato = "DC";} // LIBERA CONTRATO CELULAR
					#if ($vpp_ped > 100 and $dindim == 0 and $asscontrato == "S") {$contrato = "NO";} // EXIGE CONTRATO POR RESTRICAO DE VALORES
				}
			}
			
			// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedido", "codped=$codpedselect");
			$codcliente = $prod->showcampo2();
			#$contrato = $prod->showcampo27();
			
			echo "contrato = $contrato";
			
			$prod->setcampo27($contrato);  // CONTRATO	
			$prod->setcampo56($md5);  // MD5_PARC	
           
			$prod->setcampo7($mlb);
            $prod->setcampo18($obsfinanceiro);
			$prod->setcampo4($endentrega);
			$prod->setcampo5($refentrega);
			$prod->setcampo16($obsmontagem);
			$prod->setcampo6($obsentrega);
			$prod->setcampo25($mentr);
			$prod->setcampo8($valorvendavista);
			#$prod->setcampo9($valortotaltabela);
			$prod->setcampo10($vppnovo);
			$prod->setcampo19($mcv);
			#$prod->setcampo20($valorcustovista);
			$prod->setcampo35($pendfpgf);  // PENDENCIA DE FORMA PG
			$prod->setcampo36($reavalfpg);  // REAVALIACAO DO PEDIDO
			$prod->setcampo73($mlb_real);  // MLB REAL
			$prod->setcampo74($mcv_real);  // MCV_REAL
			
			if ($aguarda_comp==0){$aguarda = 'OK';}else{$aguarda = 'NO';}
			$prod->setcampo52($aguarda);  // AGUARDA COMPENSACAO

			$prod->upProd("pedido", "codped=$codpedselect");
					
			$codped = $codpedselect;
			$Action= "update";
			$Action_mod = "end"; //modifica comissao e tudo mais
			$condpg = 1;
							
		}else{
			$Actionter = "lock";
			$prod->msggeral("O pedido não foi aceito !", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		}

	
		
	    break;
	    
      
	    
	case "inicio_sep":

	#echo("AQUI - $inicio_sep - $codped");
	if ($inicio_sep == 'OK'){
        $prod->upProdU("pedido", "inicio_sep = '$inicio_sep', datainicio_sep = NOW()", "codped=$codped");
        
         // ATUALIZA STATUS DA TABELA
        $prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codped);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("INICIO SEP");
		$prod->setcampo4($login);

		$prod->addProd("pedidostatus", $ureg);
        }
        $Action= "update";
	    	 
	break;
	
	case "pronta":

	#echo("AQUI - $inicio_sep - $codped");
	if ($pronta == 'OK'){
        $prod->upProdU("pedido", "prontaentr = '$pronta'", "codped=$codped");
        
         // ATUALIZA STATUS DA TABELA
        $prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codped);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("PRONTA ENTREGA");
		$prod->setcampo4($login);

		$prod->addProd("pedidostatus", $ureg);
        }
        $Action= "update";
	    	 
	break;
	/*
	
		case "declara":

	#echo("AQUI - $inicio_sep - $codped");
	if ($declara == 'EP'){
        $prod->upProdU("pedido", "declara = '$declara'", "codped=$codped");

        // ATUALIZA STATUS DA TABELA
        $prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codped);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("DECLARA");
		$prod->setcampo4($login);

		$prod->addProd("pedidostatus", $ureg);
        }
        $Action= "update";

	break;
*/
}
echo("$Action_mod");
if ($Action_mod == "end"){

			$dataatual = $prod->gdata();

			$prod->listProdU("dataped","pedido", "codped=$codped");
			$data_ped = $prod->showcampo0();

			// VERIFICA CONSITENCIA DE DATAS
			$prod->listProdMY("IF ('$data_ped' < '2003-12-12 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$control = $prod->showcampo0();

			//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
			$prod->listProdSum("COUNT(*) as pg", "pedidoparcelas", "codped=$codped and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
			$prod->mostraProd( $array613, $array_campo613, 0 );
			$numparcpg = $prod->showcampo0();

			$prod->clear();
            $prod->listProdU("COUNT(*)", "pedidoparcelas", "codped=$codped and tipo = '02.44' and parcpg = 'OK'");
            $num_finasa = $prod->showcampo0();

		 	// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedido", "codped=$codped");
			$hist_ped = $prod->showcampo15();
			$comissao_ped = $prod->showcampo38();
			$transf_ped = $prod->showcampo49();
			$pontos_ped = $prod->showcampo66();

			#$prod->setcampo44("OK");  // MODIFICAÇÃO - PEDIDO
			if ($control == "S"){
				//$prod->setcampo27("NO");  // CONTRATO
			}

			#$prod->setcampo22("NO");  // COD BARRA
			if ($transf_ped <> 'OK'){
				$prod->setcampo21("NO");  // LIB. ENTREGA
			}
			if ($hist_ped == 1){
				$prod->setcampo15(0);  // HISTORICO
			}

			$prod->setcampo24("NO");  // NOTA FISCAL
			$prod->setcampo39("NO");  // FAT - FATURAMENTO

			if ($condpg == 1){
					#$prod->setcampo24("NO");  // NOTA FISCAL
					#$prod->setcampo39("NO");  // FAT - FATURAMENTO
				if ($numparcpg <> 0){
					$prod->setcampo31("NO");  // CAIXA
					$prod->setcampo51("NO"); // CONFIRMACAO DA FORMA DE PAGAMENTO
				}

			}
			//CONTROLE FINASA
			if ($num_finasa > 0){$pontos_ped = 2*$pontos_ped;}
            $prod->setcampo66($pontos_ped); // PONTOS_PED

			$prod->upProd("pedido", "codped=$codped");

  			if ($condpg == 1 and $comissao_ped == "OK"){

			$prod->listProdU("mlb, vc, fatorcomissao, tipo, pedido.codvend, codbarra, codvend_cm, porc_cm", "pedido, vendedor", "codped=$codped and pedido.codvend=vendedor.codvend");
					$ped_mlb = $prod->showcampo0();
					$ped_vc = $prod->showcampo1();
					$ped_fatorcomissao = $prod->showcampo2();
					$ped_tipo = $prod->showcampo3();
					$ped_codvend = $prod->showcampo4();
					$ped_codbarra = $prod->showcampo5();
					$ped_codvend_cm = $prod->showcampo6();
					$ped_porc_cm = $prod->showcampo7();

					if ($ped_porc_cm <> 0 and $ped_codvend_cm <> 0){

					$porc_vend = (100 - $ped_porc_cm)/100;
					$porc_vend_cm = ($ped_porc_cm)/100;

					$prod->listProdU("fatorcomissao", "vendedor", "codvend = $ped_codvend_cm");
					$ped_fatorcomissao_cm = $prod->showcampo0();

					if ($ped_tipo == 'R'){$valorp = $ped_mlb;}
					if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_mlb*$porc_vend;}
					if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_mlb*$porc_vend;}
					if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_vc*$porc_vend;}
					if ($ped_tipo == 'V'){$valorp_cm = $ped_fatorcomissao_cm*$ped_mlb*$porc_vend_cm;}
					if ($ped_tipo == 'C'){$valorp_cm = $ped_fatorcomissao_cm*$ped_mlb*$porc_vend_cm;}
					if ($ped_tipo == 'A'){$valorp_cm = $ped_fatorcomissao_cm*$ped_vc*$porc_vend_cm;}


					#echo("codconta1=$codconta <br> mlb = $ped_mlb");

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
						$codconta = $prod->showcampo0();
					}

						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend_cm");
						$codconta_cm = $prod->showcampo0();

					#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao

					//INSERE NO BCO
					$prod->clear();
					$prod->listProd("fin_bcomov", "codconta=$codconta and codped = $codped");
					$valorp_credito = $prod->showcampo4();
					$valorp_debito = $prod->showcampo5();

						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}

					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Estorno Comissão Pedido");
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);


					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Comissão Pedido");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);


					//INSERE NO BCO (DIVISAO DE COMISSAO)
					$prod->clear();
					$prod->listProd("fin_bcomov", "codconta=$codconta_cm and codped = $codped");
					$valorp_credito = $prod->showcampo4();
					$valorp_debito = $prod->showcampo5();

						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}

					$prod->setcampo0("");
					$prod->setcampo1($codconta_cm);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Estorno Comissão Pedido");
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);


					//INSERE NO BCO (DIVISAO DE COMISSAO)
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_cm);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Comissão Pedido");
					if ($valorp >= 0){
							$valorpf = abs($valorp_cm);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp_cm);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

					}else{

					if ($ped_tipo == 'R'){$valorp = $ped_mlb;}
					if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_mlb;}
					if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_mlb;}
					if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_vc;}

					#echo("codconta1=$codconta <br> mlb = $ped_mlb");

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
						$codconta = $prod->showcampo0();
					}

					#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao

					//INSERE NO BCO
					$prod->clear();
					$prod->listProd("fin_bcomov", "codconta=$codconta and codped = $codped");
					$valorp_credito = $prod->showcampo4();
					$valorp_debito = $prod->showcampo5();

						if ($valorp_credito <> 0){
							$prod->setcampo4(0);
							$prod->setcampo5($valorp_credito);
						}else{
							$prod->setcampo4($valorp_debito);
							$prod->setcampo5(0);
						}

					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Estorno Comissão Pedido");
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);


					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.01");
					$prod->setcampo3("Comissão Pedido");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);

					}

			}

			#$Actionter = "lock";
			#$prod->msggeral("Modificação efetuada com sucesso !", "OK", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pgtroca&pgold=$pgold", 0);

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

		if ($codsuperselect <> 0){
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvendselect", $array97, $array_campo97, "" );
		
		// GERENTE
		$condicao4 .= " ( ";
		
		// SUBGERENTE
		 for($u = 0; $u < count($array97); $u++ ){
			$prod->mostraProd( $array97, $array_campo97, $u );
			$codvend_sub = $prod->showcampo0();

			$condicao4 .= " pedido.codvend=$codvend_sub or ";

			 // SUPERVISORES
			 $prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvend_sub", $array98, $array_campo98, "" );
			 for($k = 0; $k < count($array98); $k++ ){
				$prod->mostraProd( $array98, $array_campo98, $k );
				$codvend_sub = $prod->showcampo0();
	
				$condicao4 .= " pedido.codvend=$codvend_sub or ";
	
				// USUARIOS
				$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvend_sub", $array99, $array_campo99, "" );
				 for($t = 0; $t < count($array99); $t++ ){
					$prod->mostraProd( $array99, $array_campo99, $t );
					$codvend_sub = $prod->showcampo0();
	
					$condicao4 .= " pedido.codvend=$codvend_sub or ";
	
				 }
		 	}
		 }
		 		
				$condicao4 .= " pedido.codvend=$codvendselect ) and ";

		}else{
		
		$condicao4 = "";
		
		}
		
		#echo $condicao4;
		// ADMINISTRADOR DO SISTEMA
		/*
		if ($codgrpselect == 2 or $codgrpselect == 20 or $codgrpselect == 24 or $codgrpselect == 15){
			$condicao4 = "";
		}
		*/
		
		
		#echo("cgrp=$codgrpselect");


		$condicao3 = $condicao4;

		//PESQUISA PENDENCIAS DE PAGAMENTOS POR DATA
		if ($diaspg){

			$condicao3 .= " TO_DAYS(NOW()) - TO_DAYS(dataped) >= $diaspg and pedido.caixa = 'NO' and ";
		}

		//PESQUISA POR NOME CLIENTE
		if ($palavrachave){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR NOME VENDEDOR
		if ($nomevendpesq){
							
			$condicao3 .= $condicao5;
		}
		
		//PEDIDOS ATACADO
		if ($tipo_ata){

			$condicao3 .= " modelo_ped ='ATA' and ";
		}
		
			//PEDIDOS TRANSFERENCIA
		if ($tipo_transf){

			$condicao3 .= " ped_transf ='OK' and ";
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " pedido.codbarra='$codpedpesq' and";
		}

				$condicao3 .= " pedido.codemp='$codempselect'";
				$condicao3 .= " and pedido.hist = '$hist'  ";
				$condicao3 .= " and pedido.codcliente=clientenovo.codcliente ";
				$condicao3 .= " and pedido.codvend=vendedor.codvend ";

		break;

		
		
		}

		// BLOQUEIA PESQUISA DO HISTORICO
		if ($hist == 1 ){
	        if (($palavrachave == "") AND ($nomevendpesq == "" ) AND ($codpedpesq == "" ))
			{
				$controle = 1;
	  		}else{
	  			$controle = 0;
	  		}
  		}else{
  			$controle = 0;
  		}
		
		if ( $controle == 0){
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome, pendfpg, reavalfpg, fat, vendedor.nome, modped, dataprevent_old, aguard_comp, inicio_sep, declara, onsite, crypt_v, crypt_m, modelo_ped, ped_transf, prontaentr ", "pedido, clientenovo, vendedor", $condicao3, $array, $array_campo, $parm );
		}
		
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

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************


// FUNCAO TESTA FORMA DE PAGAMENTO
function verificaObrigFPG (form, qtde, cadErro) 
{

 var o;
 var cont;
 var cname;
 var strDia;
 var strMes;
 var strAno;
 var strValor;
 var strTipo;
 var strBanco;
 var strAgencia;
 var strConta;
 var strNum;
 var oini;
 var maxx_block = 0;
 var status_maxx = document.getElementById('status_maxx').value;

 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+10); o++)
  {
   strDia = oini + 0;
   strMes = oini + 1;
   strAno = oini + 2;
   strValor = oini + 3;
   strTipo = oini + 4;
   strBanco = oini + 5;
   strAgencia = oini + 6;
   strConta = oini + 7;
   strNum = oini + 8;


   
 	var dateparc = new Date(form.elements[strAno].value, form.elements[strMes].value, form.elements[strDia].value);
    var dateped = new Date(form.adataped.value, form.mdataped.value, form.ddataped.value);
    var diff5 = dateparc.getTime() - dateped.getTime()
    var daysparc = Math.floor(diff5 / (1000 * 60 * 60 * 24));
    
     //alert ('VALOR ' + dateped + dateparc + daysparc +' INFERIOR a data do pedido.');

    if (daysparc <= -1)
	{
		alert ('Data da parcela ' + cont +' INFERIOR a data do pedido.');
		eval ('form.elements[strDia].focus ()');
		return false;
	}

	if (form.elements[strValor].value == 0)
	{
		alert ('Valor da Parcela ' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strValor].focus ()');
		return false;
	}
	if (verificaNumerico (form.elements[strValor].value, 2) != 1)
	{
		alert ('Valor da Parcela ' + cont + ' formato inválido');

		eval ('form.elements[strValor].focus ()');

		return false;
	}
	
	if (form.elements[strTipo].value != 0)
	{
	
		if ((form.elements[strTipo].value == '02.01') && (cadErro == 1))
		{
			alert ('O cadastro do cliente está incompleto, atualize as informações para que possa continuar o pedido.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		}

		if ((form.elements[strTipo].value == '02.04') && (daysparc < 20))
		{
			alert ('DATA DA BOLETA da PARCELA '+cont+' inferior A 20 DIAS da DATA DO PEDIDO.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		} 
		
			if ((form.elements[strTipo].value == '02.49') || (form.elements[strTipo].value == '02.50'))
		{
			maxx_block = 1;
			
		} 
		/*
		if ((form.elements[strTipo].value == '02.01') && ((form.elements[strBanco].value == 0) || (form.elements[strAgencia].value == 0) || (form.elements[strNum].value == 0) || (form.elements[strConta].value == 0)))
		{
			
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' : preenchimento obrigatório.');
			eval ('form.elements[strBanco].focus ()');
			return false;
		}
		*/
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strAgencia].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1) || (verificaNumerico (form.elements[strConta].value, 1) != 1))
		{
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' formato inválido');
			eval ('form.elements[strValor].focus ()');

		return false;
		}
   }else {
	
		alert ('Forma de Pagamento' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strTipo].focus ()');
		return false;

	}	
	
	
  }
	  oini = oini + 10; 
 }

	if (maxx_block != 1 && status_maxx > 0)
    {
        alert('IMPORTANTE! Você possui um COMPUTADOR PARA TODOS no seu carrinho! Esse produto so poderá ser vendido através do FINANCIAMENTO CEF para todos ou FINANCIAMENTO BCO BRASIL para todos. ');
       
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


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strXValor;
	var strXBanco;
	var strXAgencia;
	var strXConta;
	var strXNum;
	var xvalor;

	cpos = (posicao*10) + 10; 
	
    strXBanco = cpos - 5;
    strXAgencia = cpos - 4;
    strXConta = cpos - 3;
    strXNum = cpos - 2;
	strXValor = cpos - 1;
	
	xvalor = form.elements[strXValor].value;

	if (xvalor != ''){

	if ((xvalor.indexOf(':') != -1) || (xvalor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strXValor].focus ()');
				
	}else{
	
	form.elements[strXBanco].value = xvalor.substring (1,4);
	form.elements[strXAgencia].value = xvalor.substring (4,8);
	form.elements[strXConta].value = xvalor.substring (23,32);
	form.elements[strXNum].value = xvalor.substring (13,19);

	form.elements[strXValor].disabled=true;
	
	}

	}
 
}


// FUNCAO TESTA FORMA DE PAGAMENTO
function ControleImbecil() 
{
	
	alert ('O contrato não poderá ser impresso, pois algum cheque não foi preenchido');
		
			
}
var duplaSubmissao = 0;

function Envia(tipo)
{
    if (duplaSubmissao > 0)
    {
        alert('Por favor, aguarde. Proposta já enviada ao sistema.');
        return false;
    }

 	
	var dia = document.getElementById('dprev').value; 
	var mes = document.getElementById('mprev').value;
	var ano = document.getElementById('aprev').value;
	var diax = document.getElementById('dprevx').value; 
	var mesx = document.getElementById('mprevx').value;
	var anox = document.getElementById('aprevx').value;
			
	var date2 = new Date(ano, mes-1, dia);
	var now = new Date(anox, mesx-1, diax);
	var diff = date2.getTime() - now.getTime();
	var days = Math.floor(diff / (1000 * 60 * 60 * 24));
	
	if (days <= -1){
		alert('DATA DE PREVISÃO DE ENTREGA inferior a DATA ORIGINAL DE ENTREGA');
        document.Form1.dprev.focus();
        return false;
	}

     if (tipo == 0)
    {
        document.Form1.submit();
    }

    duplaSubmissao++;

    return true;
}



// FUNCAO TESTA FORMA DE PAGAMENTO
function sel( valor)
{


document.form77.action = '$PHP_SELF?Action=inicio_sep&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codped=$codped&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&inicio_sep='+valor+'';
document.form77.target = '';
document.form77.submit();


}

function sel1( valor)
{

document.form79.action = '$PHP_SELF?Action=declara&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codped=$codped&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&declara='+valor+'';
document.form79.target = '';
document.form79.submit();

}

function sel2( valor)
{

document.form80.action = '$PHP_SELF?Action=pronta&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codped=$codped&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg&pronta='+valor+'';
document.form80.target = '';
document.form80.submit();

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
		$endentrf = explode(";",$endentrega);
        $endentr = trim($endentrf[0]);
		$numentr = trim($endentrf[1]);
		$complementoentr = trim($endentrf[2]);
		$cepentr = trim($endentrf[3]);
		$cidadeentr = trim($endentrf[5]);
		$estadoentr = trim($endentrf[6]);
		$bairroentr = trim($endentrf[4]);
		$refentrega = $prod->showcampo5();
		$obsentrega = $prod->showcampo6();
		$dataped = $prod->showcampo11();
		$adataped = substr($dataped,0,4);
		$mdataped = substr($dataped,5,2);
		$ddataped = substr($dataped,8,2);
		$datapedf = $prod->fdata($dataped);
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
		$datapreventf  = $prod->fdata($dataprevent);
		$dataprevent = str_replace('-','',$dataprevent);
			$xaprev = substr($dataprevent,0,4);
			$xmprev = substr($dataprevent,4,2);
			$xdprev = substr($dataprevent,6,2);
		$dataprevent_old = $prod->showcampo48();
		$dataprevent_old1 = str_replace('-','',$dataprevent_old);
			$xaprev1 = substr($dataprevent_old1,0,4);
			$xmprev1 = substr($dataprevent_old1,4,2);
			$xdprev1 = substr($dataprevent_old1,6,2);
		$dataprevent_oldf  = $prod->fdata($dataprevent_old);
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
		$fat = $prod->showcampo39();
		$inicio_sep = $prod->showcampo61();
		$declara = $prod->showcampo67();
		$mlb_real = $prod->showcampo73();
   		$mcv_real = $prod->showcampo74();
		$mlb_realf = number_format($mlb_real,2,',','.');
		$mcv_realf = number_format($mcv_real,5,',','.');
		$sj10x = $prod->showcampo87();
		$modelo_ped = $prod->showcampo90();
		
		
		
		 if ($declara == "OK" or $declara == "EP"){$declara_info = "INSTALAR SOFTWARE";}
	
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
		if ($sj10x ==  'OK'){
		    // PESQUISA OPCAIXA 10x
		    
		    $prod->clear();
		    $prod->listProdSum("opcaixa10x","pedidoprod, produtos", "codped='$codped' and opcaixa10x <> ''", $array64, $array_campo64 , "group by produtos.codprod");
			   for($j = 0; $j < count($array64); $j++ ){
					
					$prod->mostraProd( $array64, $array_campo64, $j );
					$opcaixa10x[$j] = $prod->showcampo0();
					$array_prod[$j] = explode(":", $opcaixa10x[$j]);
					if($j==0){$xopcaixashow = $array_prod[0];}
					$xopcaixashow = array_intersect($xopcaixashow, $array_prod[$j]);
					#echo $opcaixa10x[$j]."<BR> - $j - $x - $codpedselect";
					//print_r($array_prod);
					#print_r($xopcaixashow);
					
				
				}//FOR

    }else{
		$xopcaixashow = explode(":", $xopcaixa);
    }
		$xasscontrato=	$prod->showcampo80();
			$xnumero = $prod->showcampo90();
    		$xcomplemento = $prod->showcampo91();


	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
	
	$prod->listProdU("nome, tipo","vendedor", "codvend='$codvend'");
				
		$nomevendold = $prod->showcampo0();
		$tipovendold = $prod->showcampo1();
		
    // PESQUISA POR PRODUTOS QUE SAO PARA TODOS
    $prod->clear();
    $prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codped' and produtos.codsubcat = 218 and pedidoprod.codprod=produtos.codprod ");
    $count_prod_todos = $prod->showcampo0();
	
	
	// PESQUISA POR PRODUTOS QUE SAO PARA TODOS
    $prod->clear();
    $prod->listProdU("if( dataprevent = DATE_FORMAT( dataped, '%Y-%m-%d' ) AND prontaentr != 'OK', 1, 0 ) as pronta","pedido", "codped='$codped'");
    $bloqueio_data = $prod->showcampo0();
	
	 


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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&nomevendpesq=$nomevendpesq&diaspg=$diaspg&tipo_ata=$tipo_ata&tipo_transf=$tipo_transf'><img border='0' src='images/bt-continuaped.gif' ><br>
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
      <b><font face='Verdana' size='4'></font></b></td>
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
");
if ($modelo_ped == "ATA" or $modelo_ped == "DST"){$impressao = 1;}
if ($impressao <> 1 or $fin ==1){

echo("

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
		<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='540' bgcolor='#808080' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS MONTAGEM</b></font></td>
    </tr>
    <tr>
      <td width='540' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS PARA
        MONTAGEM:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsmontagem</font></td>
    </tr>
    <tr>
      <td width='540' bgcolor='#FDE2DF' valign='top' align = 'center'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' color='#FF0000' size='2' ><b>$declara_info</b></font></td>
    </tr>
    </table>
  </center>
</div>

	");
}

echo("

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
<form method='POST' action='$PHP_SELF?Action=insert'  name='Form1'>
 <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='550' border='0'>
      <tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>NOVO CONTATO:</b></font></td>
        <td width='554'>
			<input type='text' name='ncontato' size='48' maxlength='250'>	<input type='button' value='OK' name='B1' onClick='javascript:Envia(0);'>
        </td>
      </tr>
	<tr bgColor='#f3f8fa'>
        <td width='186'><font face='Verdana' size='1'><b>NOVA DATA DE PREVISÃO DE ENTREGA:</b></font></td>
        <td width='554'>
		<b><font color='#000000' face='Verdana' size='1'><input type='text' name='dprev' value ='$xdprev' size='2' maxlength='2' id = 'dprev'>/<input type='text' name='mprev' value ='$xmprev' size='2' maxlength='2' id = 'mprev'>/<input type='text' name='aprev' value ='$xaprev' size='4' maxlength='4' id = 'aprev'>&nbsp;
        </font></b>
        </td>
      </tr>
    </table>
    </center>
  </div>
	<br>

	<input type='hidden' name='dprevx' value ='$xdprev1' id = 'dprevx' size='2' >
	<input type='hidden' name='mprevx' value ='$xmprev1' id = 'mprevx' size='2' >
	<input type='hidden' name='aprevx' value ='$xaprev1' id = 'aprevx' size='4' >
		
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
        <td width='65%'><font face='Verdana' size='1'>$statusped</font></td>
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
			$codcb = $prod->showcampo10();
			$codplano = $prod->showcampo13();

			$codcb_array = explode(":", $codcb);
			
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

            if ($codplano <> 0){
			$prod->clear();
        	$prod->listProdU("plano", "produtos_planos", "codplano = $codplano");
        	$descr_plano = $prod->showcampo0();
        	}


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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
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
	<td width='5%' height='0' align='center'>
	  ");
for($o = 0; $o < $qtde; $o++ ){

  	if ($codcb_array[$o] == ""){
		$cb="NO";
		$cor1 ="#FF0000";

		$prod->listProdSum("dataprevcheg","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc", $array77, $array_campo77, "ORDER BY dataprevcheg LIMIT 0,1" );
		$prod->mostraProd( $array77, $array_campo77, 0 );
		$dataprevcheg = $prod->showcampo0();
		$dataprevf = $prod->fdata($dataprevcheg);
		if ($dataprevcheg == ""){$dataprevf = "SEM PREVISAO";}

		 echo("
		 <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1' ><b>");
		echo('
		<a href="#" class = "text"><img src="images/icon_no.gif" alt="DATA PREVISAO CHEGADA:');echo(" $dataprevf");echo('" border=0></a>
		');
		echo("
	<!--
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1' ><b> <a href='#' class = 'text' onMouseOver=");echo('"showTooltip(');echo("'dHTMLToolTip',event, '<B>DATA PREVISAO CHEGADA:</B><br><br>$dataprevf', '#ffff99','#000000','#000000','6000')");echo('" onMouseOut="hideTooltip(');echo("'dHTMLToolTip')");echo('"');echo(">$cb</a></b></font>
	 -->
	
	  ");
	}else{
		$cb="OK";
		$cor1="#008000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}
}
echo("
</td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ff6600'>$descr_plano</font></font></td>
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' >
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
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			$codplano = $prod->showcampo13();

			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
			if ($codplano <> 0){
			$prod->clear();
        	$prod->listProdU("plano", "produtos_planos", "codplano = $codplano");
        	$descr_plano = $prod->showcampo0();
        	}
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 
			
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'>
	  ");
for($o = 0; $o < $qtde; $o++ ){

  	if ($codcb_array[$o] == ""){
		$cb="NO";
		$cor1 ="#FF0000";
		
		$prod->listProdSum("dataprevcheg","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc", $array77, $array_campo77, "ORDER BY dataprevcheg LIMIT 0,1" );
		$prod->mostraProd( $array77, $array_campo77, 0 );
		$dataprevcheg = $prod->showcampo0();
		$dataprevf = $prod->fdata($dataprevcheg);
		if ($dataprevcheg == ""){$dataprevf = "SEM PREVISAO";}


		 echo("
		 <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1' ><b>");
		echo('
		<a href="#" class = "text"><img src="images/icon_no.gif" alt="DATA PREVISAO CHEGADA:');echo(" $dataprevf");echo('" border=0></a>
		');
		echo("
		</b></font>
	<!--
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1' ><b> <a href='#' class = 'text' onMouseOver=");echo('"showTooltip(');echo("'dHTMLToolTip',event, '<B>DATA PREVISAO CHEGADA:</B><br><br>$dataprevf', '#ffff99','#000000','#000000','6000')");echo('" onMouseOut="hideTooltip(');echo("'dHTMLToolTip')");echo('"');echo(">$cb</a></b></font>
	 -->
	
	  ");
	}else{
		$cb="OK";
		$cor1="#008000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}
}
echo("
</td>
 
<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ff6600'>$descr_plano</font></font></td>
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' >
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

	$ptotalf = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotalf</b></font></td>
  
  </tr>
		
  ");

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

	}

echo("
    </table>
	");


	//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
	$prod->listProdSum("COUNT(*) as pg", "pedidoparcelas", "codped=$codped and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
	$prod->mostraProd( $array613, $array_campo613, 0 );
	$numparcpg = $prod->showcampo0();
	
	#echo("numparc=$numparcpg");
	


if ($impressao <> 1 ){

	#if ($numparcpg == 0){
    
	echo("

	<br>

			<div align='center'>

<form action='$PHP_SELF?Action=insertparc&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codped=$codped&amp;codempselect=$codempselect&amp;codvendselect=$codvendselect&amp;retorno=$retorno&amp;retlogin=$retlogin&amp;connectok=$connectok&condpg=$condpg&amp;pg=$pg#lista' name='form66' method='post'>
<table width='550' border='0' cellspacing='0' cellpadding='0'>
  <tr bgcolor='$bgcorlinha'>
    <td width='4%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
    <td width='63%'><b> ADICIONAR PARCELA</b> </td>
    <td width='33%'>NUM. PARCELAS <select name='numpar_add'>
      <option value='1' selected='selected'>1</option>
      <option value='2'>2</option>
      <option value='3'>3</option>
      <option value='4'>4</option>
      <option value='5'>5</option>
      <option value='6'>6</option>
      <option value='7'>7</option>
      <option value='8'>8</option>
      <option value='9'>9</option>
      <option value='10'>10</option>
    </select>
    </td>
    <td width='33%'><input type='submit' name='Submit' value='ADICIONAR' /></td>
  </tr>
</table>
<input type='hidden' name='desloc' value='0'>
<input type='hidden' name='operador' value='OR'>
<input type='hidden' name='codpedselect' value='$codped'>
<input type='hidden' name='codempselect' value='$codemp'>
<input type='hidden' name='vpvt' value='$ptotal'>
<input type='hidden' name='nump' value='$nump'>
<input type='hidden' name='retlogin' value='$retlogin'>
<input type='hidden' name='connectok' value='$connectok'>
<input type='hidden' name='pg' value='$pg'>
</form>
  
</div>
");
    if ($numparcpg > 0){
echo("

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
      III</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - ALTERAR CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>
		");

/// PESQUISA SE O CLIENTE SELECIONADO ESTA COM O CADASTRO INCOMPLETO
	$prod->listProdgeral("clientenovo", "(c_ocupacao ='' or c_descricao ='' or c_rendamensal = '' or rb_banco ='' or rb_agencia ='' or rb_conta = '' or rb_clientedesde ='') and codcliente = $codcliente", $array145, $array_campo145 , "");
	
	$cadErro = count($array145);
	$nump = count($array61);
	$cadErro = 0;

echo("

<form method='POST' action='$PHP_SELF?Action=reajuste'  name='Form' onSubmit = 'if (verificaObrigFPG(Form, $nump, $cadErro)==false) return false'>
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='25%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>BCO</b></font></td>
        <td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>AG</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='15%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>NO.CHQ</b></font></td>
      </tr>
");

 $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipo'");
			$tarifa = $prod->showcampo0();
			$valorparcela = $valorparcela - $tarifa;
			
			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$pendfpg = $prod->showcampo9();
			$parcpg = $prod->showcampo10();
			#$datavencf = $prod->fdata($datavenc);
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricaoold = $prod->showcampo1();
			
			$valorparcelaf = number_format($valorparcela,2,',','.');
			$valorparcelaf = str_replace('.','',$valorparcelaf);
			

			$datavenc = str_replace('-','',$datavenc);
			$anopar = substr($datavenc,0,4);
			$mespar = substr($datavenc,4,2);
			$diapar = substr($datavenc,6,2);
			
			$bgcorlinha = "#F3F8FA";
			if ($pendfpg == "OK"){$bgcorlinha="#FCDCBC";}

if ($parcpg <> "OK"){
		
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='25%' rowspan='2'><input type='text' name='dvenc[$ji]' value='$diapar'  size='2' maxlength='2'>/<input type='text' name='mvenc[$ji]' value='$mespar' size='2' maxlength='2'>/<input type='text' name='avenc[$ji]' value='$anopar'  size='4' maxlength='4'></td>
        <td width='10%' rowspan='2'><input type='text' name='valor[$ji]' value='$valorparcelaf' size='8' onKeyUp='this.value = adjust(this);' ></td>
        <td width='20%' ><select size='1' name='tipoopcaixa[$ji]'>
");
		 for($l = 0; $l < count($xopcaixashow); $l++ ){

			  
			if ($xopcaixashow[$l] <> ""){
				$prod->listProdU("descricao, tipo, fabrica","formapg", "opcaixa='$xopcaixashow[$l]'");
				$descricao = $prod->showcampo0();
				$tipo_cel = $prod->showcampo1();
				$fabrica = $prod->showcampo2();		
			
			if (($xopcaixashow[$l] == '02.35' or $xopcaixashow[$l] == '02.36') and ($codemp <> 1 or $tipovendold <> 'R')){$flag = 1;}else{$flag=0;}
			if ($fabrica <> 'S' and ($codemp == 15 or $codemp == 16)){$flag = 1;}
			
			if ($flag == 0){
		 

echo("
            <option value='$xopcaixashow[$l]'>$descricao</option>
          
");
			}
			}
		 }
echo("
		  <option selected>Escolha</option>
		  <option value='$tipo' selected>$descricaoold</option>
		  </select></td>
        <td width='10%' ><input type='text' name='banco[$ji]' value='$banco' size='3' maxlength='3'></td>
        <td width='10%' ><input type='text' name='agencia[$ji]' value='$agencia' size='4' maxlength='4'></td>
        <td width='10%' ><input type='text' name='conta[$ji]' value='$conta' size='6' maxlength='10'></td>
	    <td width='15%' ><input type='text' name='numch[$ji]' value='$numchec' size='6' maxlength='6'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
    		 <td width='20%' align='right' ><font size='1' face='Verdana' color='#FF9933'><b>CODBARRA CHEQUE:</b></font></td>
	      <td width='45%' colspan='4'><input type='text' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'></td>
    </tr>


");
}else{ // PARCPG

	echo("
      <input type='hidden' name='dvenc[$ji]' value='$diapar'  size='2' maxlength='2'>
	  <input type='hidden' name='mvenc[$ji]' value='$mespar' size='2' maxlength='2'>
	  <input type='hidden' name='avenc[$ji]' value='$anopar'  size='4' maxlength='4'>
      <input type='hidden' name='valor[$ji]' value='$valorparcelaf' size='8' onKeyUp='this.value = adjust(this);' >
  	  <input type='hidden' name='tipoopcaixa[$ji]' value='$tipo'  size='4' maxlength='4'>



        <input type='hidden' name='banco[$ji]' value='$banco' size='3' maxlength='3'>
        <input type='hidden' name='agencia[$ji]' value='$agencia' size='4' maxlength='4'>
        <input type='hidden' name='conta[$ji]' value='$conta' size='6' maxlength='10'>
	    <input type='hidden' name='numch[$ji]' value='$numchec' size='6' maxlength='6'>

	    <input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'>


");

} // PARCPG


}//FOR
echo("
    </table>
    </center>

		  <div align='center'>
    <center>

<br>
<a name='dadoscompl'></a>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - DADOS COMPLEMENTARES</font></b></td>
  </tr>
</table>

<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
    <tr bgcolor='#86ACB5'> 
      <td  colspan='2'  ><font face='Verdana, Arial, Helvetica, sans-serif'><b></b></font> 
        <div align='center'>
          <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font size='1' color='#FFFFFF'>DADOS 
          DA ENTREGA</font></b></font></div>
      </td>
    </tr>
    <tr bgcolor='#F3F8FA'>
      <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>END.
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='endentr' value='$endentr' size='50'>
        </font></b></font></td>
    </tr>
     <tr bgcolor='#F3F8FA'>
      <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>NUMERO:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='numentr' value='$numentr' size='50'>
        </font></b></font></td>
    </tr>
     <tr bgcolor='#F3F8FA'>
      <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>COMPLEMENTO:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='complementoentr' value='$complementoentr' size='50'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>BAIRRO
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='bairroentr' value='$bairroentr' size='20'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>CIDADE
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='cidadeentr' value='$cidadeentr' size='40'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>ESTADO
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='estadoentr' value='$estadoentr' size='3'>
        </font></b></font></td>
    </tr>
	  <td width='31'><font face=' Verdana, Arial, Helvetica, sans-serif'  size='1'  color=' #336699' ></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
        </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b><font color='#336699'>CEP
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        <input type='text' name='cepentr' value='$cepentr' size='10'>
        </font></b></font></td>
    </tr>
    <tr bgcolor='#F3F8FA'>
      <td width='31'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size=' 1' color='#336699'>REF.
        ENTREGA:</font></b></font></td>
      <td width='508'><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'><b><font size='1'>
        	<input type='text' name='refentrega'  value ='$refentrega' size='50'>
        </font></b></font></td>
    </tr>
    
");
if ($modoentr == "RETIRA"){$ch1 = "checked";}
if ($modoentr == "ENTREGA"){$ch2 = "checked";}
if ($modoentr == "MOTOBOY"){$ch3 = "checked";}

echo("   
	 <tr bgcolor='#F3F8FA'> 
      <td width='31'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>MODO
        ENTREGA:</font></b></font></td>
      <td width='508'><font size='1' face='Verdana'>
	   <input type='radio' name='mentr' value='RETIRA' $ch1><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>RETIRA</font>
	");
		// CONSIDERADO O VALOR DE TABELA
		if ($ptotal > 250){
	echo("
	   <input type='radio' name='mentr' value='ENTREGA' $ch2><font color='#000000'>ENTREGA (TRANPORTADORA)</font>
	");
		}
		if ($tipovend <> "R"){
	 echo("
	   <input type='radio' name='mentr' value='MOTOBOY' $ch3><font color='#000000'>MOTOBOY</font></font>
	  </td>
	");
		}
	echo("
    </tr>

    
  </table>


		  <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'><input class='sbttn' type='submit' value='Alterar Condições de Pagamento' name='B1'></td>
      </tr>
    </table>
    </center>
  </div>


			<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codpedselect' value='$codped'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
	     	<input type='hidden' name='adataped' value='$adataped' id='adataped' >
	     	<input type='hidden' name='mdataped' value='$mdataped' id='mdataped'>
	     	<input type='hidden' name='ddataped' value='$ddataped' id='ddataped'>
	     	<input name='status_maxx' id = 'status_maxx' type='hidden' value ='$count_prod_todos' >

			


		</form>
  </div>
");

    } // NUMPARPG
} // IMPRESSSAO

if ($impressao <> 1 ){

if ($caixa <> 'OK' and $inicio_sep <> 'OK'){
echo("


<table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
<form action='$PHP_SELF' name='form77' method='post' >
  <tbody>
    <tr bgColor='#86acb5'>
      <td colSpan='3' bgcolor='#F7A909'>
        <div align='center'>
          <p align='left'><font color='#ffffff' size='1' face='Verdana, Arial, Helvetica, sans-serif'><b>CONTROLE PARA IN&Iacute;CIO DA SEPARA&Ccedil;&Atilde;O</b></font></p>
        </div>
      </td>
    </tr>
    <tr bgColor='#f3f8fa'>
      <td colspan='3' bgcolor='#FDEAC4'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>O MICRO ou as PE&Ccedil;AS AVULSAS s&oacute; come&ccedil;ar&atilde;o a ser separadas quando a<strong> OP&Ccedil;&Atilde;O 2</strong> for selecionada. O usu&aacute;rio estar&aacute; sujeito a pena de multa caso o PEDIDO seja CANCELADO por falta de pagamento. </font></td>
    </tr>
    <tr>
      <td align='right' bgcolor='#FDEAC4'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OP&Ccedil;&Atilde;O 1:</b></font></td>
      <td align='center' bgcolor='#FDEAC4'><input name='inicio_sep' type='radio' value='NO' checked  id ='radio' onClick=sel(this.value)></td>
      <td bgcolor='#FDEAC4'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>AGUARDAR PAGAMENTO PARA INICIAR A SEPARA&Ccedil;&Atilde;O </b></font></td>
    </tr>
    <tr>
      <td align='right' bgcolor='#FDEAC4'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OP&Ccedil;&Atilde;O 2: </b></font></td>
      <td align='center' bgcolor='#FDEAC4'><input name='inicio_sep' type='radio' value='OK' id ='radio2' onClick=sel(this.value)></td>
      <td bgcolor='#FDEAC4'><font color='#FF0000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>LIBERAR PARA SEPARA&Ccedil;&Atilde;O COM PAGAMENTO POSTERIOR</b></font></td>
    </tr>
  </tbody>
    <input type='hidden' name='desloc' value='0'>
	<input type='hidden' name='operador' value='OR'>
	<input type='hidden' name='codpedselect' value='$codped'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='vpvt' value='$ptotal'>
	<input type='hidden' name='nump' value='$nump'>
	<input type='hidden' name='retlogin' value='$retlogin'>
	<input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
  </form>
</table>

");
}

if ($pronta <> 'OK' and $inicio_sep == 'OK' and $bloqueio_data == 1 and $modoentr == "RETIRA"){
echo("


<table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
<form action='$PHP_SELF' name='form80' method='post' >
  <tbody>
    <tr bgColor='#86acb5'>
      <td colSpan='3' bgcolor='#F7A909'>
        <div align='center'>
          <p align='left'><b><font color='#ffffff' size='3' face='Verdana, Arial, Helvetica, sans-serif'>PRONTA ENTREGA</font></b></p>
        </div>      </td>
    </tr>
    <tr bgColor='#f3f8fa'>
      <td colspan='3' bgcolor='#FDEAC4'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>Pedido com <strong>PRIORIDADE PARA ENTREGA</strong> s&oacute; come&ccedil;ar&atilde;o a ser separadas quando a<strong> OP&Ccedil;&Atilde;O ABAIXO </strong> for selecionada. O usu&aacute;rio estar&aacute; sujeito a pena de multa caso o PEDIDO seja CANCELADO por falta de pagamento. </font></td>
    </tr>
    <tr>
      <td align='right' bgcolor='#FDEAC4'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><img src='images/pronta.png' width='32' height='32' /></b></font></td>
      <td align='center' bgcolor='#FDEAC4'><input name='pronta' type='radio' value='OK' id ='radio2' onClick=sel2(this.value)></td>
      <td bgcolor='#FDEAC4'><font color='#FF0000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>SELECIONE O CAMPO PARA PRONTA ENTREGA</b></font></td>
    </tr>
  </tbody>
    <input type='hidden' name='desloc' value='0'>
	<input type='hidden' name='operador' value='OR'>
	<input type='hidden' name='codpedselect' value='$codped'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='vpvt' value='$ptotal'>
	<input type='hidden' name='nump' value='$nump'>
	<input type='hidden' name='retlogin' value='$retlogin'>
	<input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
  </form>
</table>

");
}
/*
#echo("d=$declara");
if ($declara == 'NO'){
echo("

<table cellSpacing='1' cellPadding='2' width='550' align='center' border='0'>
<form action='$PHP_SELF' name='form79' method='post' >
  <tbody>
    <tr bgColor='#D84A27'>
      <td colSpan='3'>
        <div align='center'>
          <p align='left'><font color='#ffffff' size='1' face='Verdana, Arial, Helvetica, sans-serif'><b>DECLARA&Ccedil;&Atilde;O </b></font></p>
        </div>
      </td>
    </tr>
    <tr bgColor='#FCD7C5'>
      <td colspan='3'><font color='#FF0000' size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>ATEN&Ccedil;&Atilde;O:</strong> </font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>O MICRO ou as PE&Ccedil;AS AVULSAS s&oacute; come&ccedil;ar&atilde;o a ser separadas quando a OPÇÃO abaixo for selecionada. </font></td>
    </tr><!--
    <tr bgcolor='#FCD7C5'>
      <td align='right'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OP&Ccedil;&Atilde;O 1: </b></font></td>
      <td align='center'><input name='declara' type='radio' value='DD' id ='radio2' onClick=sel1(this.value)></td>
      <td><font color='#FF0000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>N&Atilde;O INSTALAR SISTEMA OPERACIONAL </b></font></td>
    </tr>-->
    <tr bgcolor='#FCD7C5'>
      <td align='right'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OP&Ccedil;&Atilde;O 1:</b></font></td>
      <td align='center'><input name='declara' type='radio' value='EP'  id ='radio' onClick=sel1(this.value)></td>
      <td><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>O VENDEDOR SE RESPONSABILIZA &Agrave; ENTREGAR A DECLARA&Ccedil;&Atilde;O POSTERIORMENTE</b></font></td>
    </tr>
  </tbody>
    <input type='hidden' name='desloc' value='0'>
	<input type='hidden' name='operador' value='OR'>
	<input type='hidden' name='codpedselect' value='$codped'>
	<input type='hidden' name='codempselect' value='$codemp'>
	<input type='hidden' name='vpvt' value='$ptotal'>
	<input type='hidden' name='nump' value='$nump'>
	<input type='hidden' name='retlogin' value='$retlogin'>
	<input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
  </form>
</table>
");
}
*/
}
echo("

 <div align='center'>
    <center>
   	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='39%' ><font size='1' face='Verdana'>&nbsp;</font></td>
        <td width='15%' >&nbsp;</td>
 	    <td width='19%' >&nbsp;</td>
 	</tr>

	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>R$ $vppf</b></font></td>
        <td width='15%' >&nbsp;</td>
	    <td width='19%' >&nbsp;</td>
	</tr>
		<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>VALOR À VISTA:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>R$ $vpvf</b></font></td>
        <td width='15%' >&nbsp;</td>
	    <td width='19%' >&nbsp;</td>
	  </tr>
	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#666666'><b>MLB_REAL:</b></font></td>
        <td width='19%' ><font color='#666666' size='1' face='Verdana'><b>R$ $mlb_realf</b></font></td>
	</tr>
	<tr bgcolor='#ffffff'>
        <td width='27%'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='39%' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#666666'><b>MCV_REAL:</b></font></td>
        <td width='19%' ><font color='#666666' size='1' face='Verdana'><b>$mcv_realf %</b></font></td>
	</tr>

	 </table>

 </center>
  </div>
");

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
if ($impressao <> 1 ){

	 $prod->clear();
	$prod->listProdU("COUNT(*), tipo", "pedidoparcelas", "codped = '$codped' and (tipo = '02.44' or tipo = '02.48'  or tipo = '02.52') GROUP BY tipo");
	$cont_finasa = $prod->showcampo0();
	
	$prod->clear();
	$prod->listProdU("COUNT(*), tipo", "pedidoparcelas", "codped = '$codped' and (tipo = '02.52') GROUP BY tipo");
	$tipo_finasa = $prod->showcampo0();
				
	 $prod->clear();
    $prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codped' and produtos.codsubcat = 203 and codplano <> 7 and pedidoprod.codprod=produtos.codprod ");
    $count_prod_ncel = $prod->showcampo0();
				
				
	

echo("
		 <table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
  <div align='center'>
    <center>
    <table cellSpacing='1' cellPadding='3' width='50%' border='0'>
      <tr >
	    <td align='right' width='10%'><font face='Verdana' size='1' color='#FF6600'><b><img border='0' src='images/impressora.gif'></b></font></td>
        <td align='left' width='30%' height='0'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciopedadmuser_sup.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1','name','600','400','yes');return 
false");echo('"');echo(">IMPRIMIR PEDIDO</a></b></font></td>
");
if ($cont_finasa > 0 ){
	if ($tipo_finasa > 0){$tipo_finasa_cel = 1;}else{ $tipo_finasa_cel = 0;}
echo("
<td align='right' width='10%'><font face='Verdana' size='1' color='#FF6600'><b><img border='0' src='images/impressora.gif'></b></font></td>
<td align='left' width='20%' height='0'>

	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciochecklist_finasa.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&reimp=1&tipo_finasa_cel=$tipo_finasa_cel','name','600','400','yes');return 
false");echo('"');echo(">IMPRIMIR CHECKLIST FINASA</a></b></font>

</td>
");
}
echo("
");
if ($count_prod_ncel <> 0){
echo("
<td align='right' width='10%'><font face='Verdana' size='1' color='#FF6600'><b><img border='0' src='images/impressora.gif'></b></font></td>
<td align='left' width='20%' height='0'>

	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corcb'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('iniciochecklist_celular.php?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&reimp=1','name','600','400','yes');return 
false");echo('"');echo(">IMPRIMIR CHECKLIST CELULAR</a></b></font>

</td>
");
}
echo("
 </tr>
  </table>


");

}
if ($modelo_ped == "ATA" or $modelo_ped == "DST"){$impressao = 0;}
if ($impressao <> 1 or $fin == 1){



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


	");
}

echo("
<!--
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
        <p align='center'><font face='Verdana' size='1'><a href='$PHP_SELF?Action=list&codempselect=$codemp&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq'>VOLTAR</a></font>
      </td>
    </tr>
  </table>
  </center>
</div>
			-->
");







//  FIM - FIM DA PARTE DE IMPRESSAO ///


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
		VENDEDOR: <input type='text' name='nomevendpesq' size='20'><br>
		PAGAMENTO EM ATRASO: MAIOR QUE <input type='text' name='diaspg' size='4'> DIAS <br>PED ATACADO:<input type='checkbox' name='tipo_ata' value='OK'> <br>PED TRANSFERENCIA:<input type='checkbox' name='tipo_transf' value='OK'></font>
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

//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

if ($allemp == "Y"){

echo("
<br>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();


if ($tipovend <> 'R' and $var_codgrp <> 21 and $var_codgrp <> 62 and $var_codgrp <> 42 and $var_codgrp <> 13 and $var_codgrp <> 56 and $var_codgrp <> 54 and $var_codgrp <> 32){

	echo"AQUI";

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&diaspg=$diaspg#cliente'>$nomeemp</option>
		");
	}else{
	if ($tipovend <> 'R'){
		if ($codemp <> 14 ){
		echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&diaspg=$diaspg#cliente'>$nomeemp</option>
		");
		}
	}else{
		if ($codemp == 1 or $codemp == 15 ){
		echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&diaspg=$diaspg#cliente'>$nomeemp</option>
		");
		}
	}//IF REVENDAS
	
}//GRUPOS
}//FOR
			
	
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
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='25%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='40%'>
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
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PEDIDO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&nomevendpesq=$nomevendpesq&diaspg=$diaspg'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>PEDIDO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=1&nomevendpesq=$nomevendpesq&diaspg=$diaspg'><br>
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
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='16%' height='0'> 
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
    	
    <td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CR</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CG</font></b></div>
    </td>
    	<td width='2%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>AT</font></b></div>
    </td>
    	<td width='2%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DS</font></b></div>
    </td>
    	<td width='2%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OnS</font></b></div>
    </td>
		<td width='2%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
    	<td width='2%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SEP</font></b></div>
    </td>
		<td width='2%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
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
			$fat = $prod->showcampo15();
			$nomevend = $prod->showcampo16();
			$modped = $prod->showcampo17();
			$dataprevent_old = $prod->showcampo18();
			$aguard_comp = $prod->showcampo19();
			$inicio_sep = $prod->showcampo20();
			$declara = $prod->showcampo21();
			$onsite = $prod->showcampo22();
			$crypt_v = $prod->showcampo23();
			$crypt_m = $prod->showcampo24();
			$modelo_ped = $prod->showcampo25();
			$ped_transf = $prod->showcampo26();
			$pronta = $prod->showcampo27();
	
	
			// FORMATACAO //
			$datapedf = $prod->fdata($dataped);
			$datapreventf = $prod->fdata($dataprevent);
			$dataprevent_olff = $prod->fdata($dataprevent_old);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataatual,$dataprevent);
			
			$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
			
			$prod->listProdU("tipo", "vendedor", "codvend=$codvend");
			$tipovend_pesq = $prod->showcampo0();

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
		
			if ($dataprevent <> $dataprevent_old){$cor45 = "#FF0000";}else{$cor45 = "#000000";}


if ($aguard_comp == "OK"){$aguard ="AGUARDA<br>COMPENSAÇÃO";}else{$aguard ="";}
#if ($declara == "EP" or $declara == "NO" ){$declara_info ="AGUARDA<br>DECLARAÇÃO";}else{$declara_info ="";}
if ($contrato == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($contrato == "EP"){$cor1 ="#FF6600";}
if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}
if ($declara == ""){$declara = "NO";}
if ($declara == "NO"){$cor5 ="#FF0000";}else{$cor5="#008000";}
if ($pendfpg == "OK"){$pendfpglogo = "<IMG SRC='images/est_prev.gif'  BORDER=0 >";}else{$pendfpglogo="";}
if ($inicio_sep == "NO" and $caixa == "NO"){$sep_logo = "<IMG SRC='images/cadeado_f.gif'  BORDER=0 >";}else{$sep_logo="";}
if ($inicio_sep == "OK" and $caixa == "NO"){$sep_logo = "<IMG SRC='images/cadeado_a.gif'  BORDER=0 >";}
if ($pronta == "OK" ){$pronta_logo = "<IMG SRC='images/prontap.png'  BORDER=0 >";}else{$pronta_logo="";}
if ($modped == "OK"){$mod ="MOD";}else{$mod="";}
if ($onsite <> "OK"){$cor6 ="#FF0000";}else{$cor6="#008000";}

$ped_ata = "";
if ($modelo_ped == "ATA"){$cor7 ="#008000";$ped_ata = "ATACADO";}
if ($modelo_ped == "DST"){$cor7 ="#008000";$ped_ata = "DISTRIBUIDOR";}
if ($ped_transf == "OK"){$cor8 ="#008000";$ped_transf = "TRANSF";}else{$ped_transf = "";}
		
		// VERIFICA SE O PEDIDO FOI À VISTA E EM DINHEIRO , FINANCIAMNETO BANCARIO ou CARTAO VISA
		$prod->listProdSum("IF((tipo like '02.00' or tipo like '02.08' or tipo like '02.4%' or tipo like '02.30' or tipo like '02.31' or tipo like '02.18'), 1, 0)", "pedidoparcelas", "codped=$codped ", $array56, $array_campo56, "" );
		$vvista=1;
		
		// VERIFICA SE O PEDIDO POSSUI BOLETA - VISA e MASTER com DECLARACAO
		$prod->listProdU("SUM( if( tipo = '02.04', 1, 0 ) ) as boleta, SUM( if( tipo = '02.35', 1, 0 ) ) as visa , SUM( if( tipo = '02.36', 1, 0 ) ) as master ", "pedidoparcelas", " codped=$codped GROUP by tipo");
		$parc_bol = $prod->showcampo0();
		$parc_visa = $prod->showcampo1();
		$parc_master = $prod->showcampo2();
		
		if ($parc_visa > 0  and $status == "AVAL" ){$cartao = "<IMG SRC='images/visa.gif'  BORDER=0 >";}else{$cartao="";}
		if ($parc_master > 0 and $status == "AVAL" ){$cartao1 = "<IMG SRC='images/mastercard.gif'  BORDER=0 >";}else{$cartao1="";}
		
			
		for($k = 0; $k < count($array56); $k++ ){

			$prod->mostraProd( $array56, $array_campo56, $k);
			$nr = $prod->showcampo0();
			#echo("nr=$nr");
			$vvista=$vvista*$nr;

		}
		
		if ($vvista == 0 ){$arqcontrato="iniciocontrato.php";$reserva=1;}else{$arqcontrato="iniciocontrato.php";$reserva=0;}
		if ($contrato == "DC"){$arqcontrato="iniciocontrato.php";$reserva=0;}

		$arqcontrato_garantia="iniciocontrato_garantia.php";
		$arqcontrato_boleta="iniciocontrato_boleta.php";
		$arqcontrato_declara="iniciocontrato_declara.php";
		$arqcontrato_onsite="iniciocontrato_onsite.php";
		if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
		$arqcontrato_cartao="https://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).$bar."iniciocontrato_cartao_visa.php";
		$arqcontrato_cartao1="https://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).$bar."iniciocontrato_cartao_master.php";
		$arqcontrato_cartao_imp="iniciocontrato_cartao.php";

		#$prod->listProdSum("COUNT(*) as pendfpg", "pedidoparcelas", "codped = $codped and pendfpg = 'OK'", $array613, $array_campo613, "" );
		#$prod->mostraProd( $array613, $array_campo613, 0 );
		#$pendfpg_num = $prod->showcampo0();
		$pendfpg_num = 0;
		
		
		
		echo("
			<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codped=$codped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&diaspg=$diaspg'>$codbarra</font></b></a><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'>$aguard</font><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#008000'>$declara_info<br><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			<a href='javascript:void(0)' onclick=\"NewWindow('$arqcontrato_cartao?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=0&reserva=$reserva','name','777','410','yes');return false\">$cartao</a><a href='javascript:void(0)' onclick=\"NewWindow('$arqcontrato_cartao1?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=0&reserva=$reserva','name','777','410','yes');return false\">$cartao1</a></font></b></font></td>
			<td width='16%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
			<td width='14%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend</font><br><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor7'>$ped_ata</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor8'>$ped_transf</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color ='$cor45'>$datapreventf<br>$horaprevent</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br>$mod<BR>$pronta_logo</font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>$contrato</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'>$libentr</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor3'>$fat</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor4'>$caixa</font></b></td>
			
		");
if ($pendfpg_num > 0 ){
echo("
		
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			<a href='javascript:void(0)' onclick='ControleImbecil();'>CR</a></font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			<a href='javascript:void(0)' onclick='ControleImbecil();'>CG</a></font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			</font></b></td>

");
}else{

		// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProdU("COUNT(*)", "pedidoprod", "codped='$codped' AND tipoprod = 'CJ'");
		$control_leite = $prod->showcampo0();

		$arqleite="iniciocontrato_leite.php";

echo("
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			"); if ($contrato <> "DC") { echo("<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name','650','400','yes');return false");echo('"');echo(">CR</a>"); } echo ("</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			"); if ($contrato <> "DC") { echo("<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato_garantia?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name1','650','400','yes');return false");echo('"');echo(">CG</a>"); } echo ("</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>");if ($parc_bol <> 0){echo("
			<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato_boleta?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name2','650','400','yes');return false");echo('"');echo(">AT</a>");}echo("</font></b></td>

			
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'>
			");if ($declara <> "OK" ){ if ($tipovend_pesq <> 'R'){echo("
			<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato_declara?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name1','650','400','yes');return false");echo('"');echo(">DS</a><br>");
			}}

echo("</font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor5'>");if ($tipovend_pesq <> 'R'){echo("$declara");}echo("</font></b></td>

				<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor6'>");if ($onsite == 'OK'){echo("
			<a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$arqcontrato_onsite?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=1&reserva=$reserva','name2','650','400','yes');return false");echo('"');echo(">OnS</a>");}echo("</font></b></td>

				<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'>
			");
if ($control_leite > 0){
echo("
		CJ
");
}
echo("</font></b></td>


");
}
echo("
			
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor4'>$sep_logo</font></b></td>
			<td align='center' width='2%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'><b>
			");
if ($status  <> "AVAL" and $parc_visa > 0 and $caixa = 'NO'){
echo("
			
			<a href='javascript:void(0)' onclick=\"NewWindow('$arqcontrato_cartao_imp?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=2&visa=1','name','650','400','yes');return false\">DCV</a>
	");
}

if ($status  <> "AVAL" and $parc_master > 0 and $caixa = 'NO'){
echo("
			
			<br><a href='javascript:void(0)' onclick=\"NewWindow('$arqcontrato_cartao_imp?Action=update&desloc=$desloc&codped=$codped&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&impressao=2&visa=0','name','650','400','yes');return false\">DCM</a>
	");
}
echo("</font></b></td> ");

	 }//FOR

		echo("
				</table>
		");

}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action == "list" ){

/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&diaspg=$diaspg&tipo_ata=$tipo_ata&tipo_transf=$tipo_transf";   
include("numcontg.php");
}




/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 

/*
	
	echo("

<br><br><br>
	<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>LEGENDA - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS
        DO PEDIDO</font></b></td>
    </tr>
  </tbody>
</table>

	<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='3' cellpadding='3'>
    <tr>
      <td width='11%' bgcolor='#FFCC66' align='center'><font size='1' face='Verdana' class='texto'>
        AVALIAÇÃO DE CRÉDITO</font></td>
      <td width='11%' bgcolor='#CFFCC7' align='center'><font size='1' face='Verdana' class='texto'><b>PEDIDO
        APROVADO</b></font></td>
      <td width='11%' bgcolor='#D6B778' align='center'><font size='1' face='Verdana' class='texto'><b>AGUARDA
        PEÇA</b></font></td>
      <td width='11%' align='center' bgcolor='#F2E4C4'><font size='1' face='Verdana' class='texto'><b>EM <br>
        PRODUÇÃO</b></font></td>
      <td width='11%' align='center' bgcolor='#EDE763'><font size='1' face='Verdana' class='texto'><b>LIBERADO
        PARA EXPEDIÇÃO</b></font></td>
      <td width='11%' align='center' bgcolor='#339966'><font size='1' face='Verdana' class='texto'><b>DESPACHADO
        PARA TRANSPORTADORA</b></font></td>
      <td width='11%' align='center' bgcolor='#BFD9F9'><font size='1' face='Verdana' class='texto'><b>PEDIDO
        ENTREGUE</b></font></td>
      <td width='11%' align='center'><font size='1' face='Verdana' class='texto'><b>CRÉDITO
        REPROVADO</b></font></td>
      <td width='12%' align='center' bgcolor='#E1AFAA'><font size='1' face='Verdana' class='texto'><b>PEDIDO
        CANCELADO</b></font></td>
    </tr>
  </table>

  </center>
</div>
");
	
	*/
	
	include ("sif-rodape.php");}
}

?>
       
