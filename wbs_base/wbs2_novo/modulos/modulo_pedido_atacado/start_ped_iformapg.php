<?php

// WBS
// arquivo:		ped_icarrinho.php
// template:	ped_icarrinho.htm

#require("../classprod.php");
#$codemp = 1;
#$login = "felipe";


// INICIO DA CLASSE
$prod = new operacao();

	$prod->clear();
	$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
	$codempselect = $prod->showcampo0();
	$codvendselect = $prod->showcampo1();;
	$tipovend = $prod->showcampo2();
	$fatorusertabela = $prod->showcampo3();
	
	 // PESQUISA POR PRODUTOS QUE NAO POSSUEM COMISSAO
    $prod->clear();
    $prod->listProdU("COUNT(*)","produtos_planos_relacao, pedidoprodtemp", "codped='$codpedselect' and pedidoprodtemp.codplano <> 0 and pedidoprodtemp.codplano=produtos_planos_relacao.codplano and pedidoprodtemp.codprod=produtos_planos_relacao.codprod and scomissao <> 'S'");
    $numped_plano = $prod->showcampo0();
    
  	// PESQUISA POR PRODUTOS QUE NAO POSSUEM PRODUTOS DE CELULAR
    $prod->clear();
    $prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "codped='$codpedselect' and (produtos.codcat <> 46 and produtos.codcat <> 71) and pedidoprodtemp.codprod=produtos.codprod ");
    $count_prod = $prod->showcampo0();
    
    $prod->clear();
    $prod->listProd("empresa", "codemp=$codempselect");
 	$descmax = $prod->showcampo18();
	$fatorvista = $prod->showcampo20();
	#$fatorvista = 0.9213;
	$taxa = $prod->showcampo21();
	$tac = $prod->showcampo22();
	$fatorvista_cel = $prod->showcampo29();
	$taxa_cel = $prod->showcampo30();
	$num_parc_calc = 6;
	// ATACADO
	 $fatorvista = 1;
      $taxa = 0.0001;
      $tac = 0;
      $num_parc_calc = 6;
	
			
	
	$prod->clear();
	$prod->listProdU("fatorcusto, data_inimcv, data_fimmcv, mcv_prot, mcv_aplic, meia_mcv","vendedor", "nome='$login'");
	$fatorcusto = $prod->showcampo0();
    $data_inimcv = $prod->showcampo1();
    $data_fimmcv = $prod->showcampo2();
    $mcv_prot = $prod->showcampo3();
    $mcv_aplic = $prod->showcampo4();
    $meia_mcv = $prod->showcampo5();
	$dataatual = $prod->gdata();
	
	if ($sj10x == 1){
      $fatorvista = 1;
      $taxa = 0.01;
      $tac = 0;
      $num_parc_calc = 10;
      
      
    }
	
	if ($count_prod == 0){
      $fatorvista = $fatorvista_cel;
      $taxa = $taxa_cel;
      $tac = 0;
      $num_parc_calc = 6;
      
    }
    
  
    
    #echo("cel = $count_prod - $num_parc_calc - $fatorvista - $taxa - $tac");

	// CALCULO DAS PARCELAS
	
	$ventrada = str_replace('.','',$ventrada);
	$ventrada = str_replace(',','.',$ventrada);
	#$valortotal = str_replace('.','',$valortotal);
	#$valortotal = str_replace(',','.',$valortotal);
	$vparc_i = str_replace('.','',$vparc_i);
	$vparc_i = str_replace(',','.',$vparc_i);
	#$valortabela_real = str_replace('.','',$valortabela_real);
	#$valortabela_real = str_replace(',','.',$valortabela_real);
	$valortotaltabela = $_POST['valortotal'];
	if ($tipo_p == 1){$valortotaltabela = $valortotaltabela * 1;}
	if ($tipo_p == 7){$valortotaltabela = $valortotaltabela * 1.02;}
	if ($tipo_p == 14){$valortotaltabela = $valortotaltabela * 1.03;}
	if ($tipo_p == 28){$valortotaltabela = $valortotaltabela * 1.04;}
	$valortotaltabelavista = $valortotaltabela*$fatorvista;
	#$valortabela_realvista = $_POST['valortabela_real']*$fatorvista;
	$valortabela_realvista = $valortotaltabelavista;
	if ($nump > $num_parc_calc){
		$valorcustovista = ($valortabela_realvista*$fatorcusto) ;
		#$valorcustovista = ($valortabela_realvista*$fatorcusto) + $tac;
	}else{
		$valorcustovista = ($valortabela_realvista*$fatorcusto);
	}
	
	#echo("vt=$valortotaltabela  vtr=$valortabela_real- ent = $entrada - sim = $simula- calc = $calcular<br>");
	if ($vparc_i <> "" and $entrada <> 1){$fixa = 1;} // VALOR FIXO DE PARCELAS

	//SIMULACAO DAS PARCELAS IGUAIS
	if ($simula == 1){
	
		if ($entrada == 1){
		
		        if ($fixa <> 1){ // VALOR DE TABELA DIVIDO IGUALMENTE
		
			$anopar = $anopar1;
			$mespar = $mespar1;
			$diapar = $diapar1;
			
			$diaparc[1] = $diaent;
			 if ($mesent == 2 and $diaent > 28){$diaparc[1] = 28;}
		     if (($mesent == 4 or $mesent == 6 or $mesent == 9 or $mesent == 11) and $diaent > 30){$diaparc[1] = 30;}
			$mesparc[1] = $mesent;
			$anoparc[1] = $anoent;
			$valor_parc[1] = $ventrada;
			#$valor_parc[1] = number_format($ventrada,2,',','.');
			
			// CALCULA O JUROS DA ENTRADA
            $data_parc_ent = $anoent.$mesent.$diaent;
			$difdias_ent = $prod->numdias($dataatual,$data_parc_ent);
			$n_ent = ($difdias_ent/30);
			$juros_entrada = $ventrada*(pow((1+($taxa/100)),$n_ent)-1);

			$vsentrada = ($valortotaltabelavista - $ventrada)+ $juros_entrada;

			// CALCULA O VALOR PRESENTE DO PRINCIPAL MENOS A ENTRADA
			$anopar_ini = $anopar;
			$mespar_ini = $mespar - 1;
			if ($mespar_ini < 1){$mespar_ini=12;$anopar_ini--;}
			if (strlen($mespar_ini)==1){$mespar_ini = '0'.$mespar_ini;}
			$data_parc = $anopar_ini.$mespar_ini.$diapar;
			$difdias = $prod->numdias($dataatual,$data_parc);
			$n = ($difdias/30);
			$valor_principal_sub = $vsentrada*(pow((1+($taxa/100)),$n));

	//CALCULA O PMT
	$valor_principal = $valor_principal_sub;
	$k = ($taxa/100)*(pow((1+($taxa/100)),$nump-1))/((pow((1+($taxa/100)),$nump-1))-1);
	$pmt = $valor_principal*$k;
	#echo $pmt;
	
			$lx = 2;
			#$ad = 1; // ADICIONA
			
			}else{ // VALORES FIXADOS
				$diaparc[1] = $diaent;
				 if ($mesent == 2 and $diaent > 28){$diaparc[1] = 28;}
		     	 if (($mesent == 4 or $mesent == 6 or $mesent == 9 or $mesent == 11) and $diaent > 30){$diaparc[1] = 30;}
				$mesparc[1] = $mesent;
				$anoparc[1] = $anoent;
				$valor_parc[1] = $ventrada;
				$vsentrada = ($valortotaltabela - $ventrada);
				if ($nump == 1){$nump_f = 2;}else{$nump_f = $nump;}
				$pmt = $vsentrada/($nump_f-1);
				$lx = 2;
			}

		}else{
		
			
		
            if ($fixa <> 1){ // VALOR DE TABELA DIVIDO IGUALMENTE
		         
			// CALCULA O VALOR PRESENTE DO PRINCIPAL
			
						
			$prod->listProdMY("DATE_ADD(NOW(), INTERVAL $tipo_p DAY)", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data_parc1 =  $prod->showcampo0();
			$data_parc1 = str_replace('-','',$data_parc1);
			$anopar = substr($data_parc1,0,4);
			$mespar = substr($data_parc1,4,2);
			$diapar = substr($data_parc1,6,2);
			
			$data_parc = $anopar.$mespar.$diapar;

			#echo "AQIU= $tipo_p - $data_parc";
			
			$difdias = $prod->numdias($dataatual,$data_parc);
			$n = ($difdias/30);
			$valor_principal_sub = $valortotaltabelavista*(pow((1+($taxa/100)),$n));
			#echo(" datap = $data_parc - vp_sub = $valor_principal_sub");

			//PRINCIPAL DESCONTADO
			$valor_principal = $valor_principal_sub / (1+($taxa/100));
			//CALCULA O PMT
			$k = ($taxa/100)*(pow((1+($taxa/100)),$nump))/((pow((1+($taxa/100)),$nump))-1);
			$pmt = $valor_principal*$k;
					$lx = 1;
					$ventrada = 0;
			
			}else{ // VALORES FIXADOS
				$ventrada = 0;
				$pmt = $valortotaltabela/($nump);
				if ($vparc_i <> "" and $entrada <> 1){$pmt = $vparc_i;}
				$lx = 1;
			}
		       
		}

	#echo("vp=$valor_principal - k=$k - df=$difdias - n=$n - n_ent = $n_ent - j_ent = $juros_entrada - vs_ent = $vsentrada - nump = $nump - fixa= $fixa<br>");
	
	for($op = $lx; $op <= $nump; $op++ ){
		
		 		
		if ($mespar > 12){$mespar=1;$anopar++;}
		if (strlen($mespar)==1){$mespar = '0'.$mespar;}

		
		 $diaparc[$op] = $diapar;
		 if ($mespar == 2 and $diapar > 28){$diaparc[$op] = 28;}
		 if (($mespar == 4 or $mespar == 6 or $mespar == 9 or $mespar == 11) and $diapar > 30){$diaparc[$op] = 30;}
		 $mesparc[$op] = $mespar;
		 $anoparc[$op] = $anopar;
	 	 #$pmt_x = number_format($pmt,2,',','.');
	         $valor_parc[$op] = $pmt;

	         $mespar++;
	         
	         $valor_prazo = $valor_prazo + $pmt;

     		#echo("vp[$op]= $valor_parc[$op] - $nump<br>");

	}//FOR
		
		#$valorvendavista = $valorvendavista + $ventrada;
		$valor_prazo = $valor_prazo + $ventrada;
		if ($nump > $num_parc_calc ){
			$valor_parc[1] = $valor_parc[1] +$tac;
			#$valorvendavista = $valortotaltabelavista + $tac;
    		$valorvendavista = $valortotaltabelavista;
			$valor_prazo = $valor_prazo + $tac;
		}else{
			$valorvendavista = $valortotaltabelavista;
		}
		

	#echo("vvv= $valorvendavista");
	
	// ACRESCIMO PARA USO DE MOTOBOY
	#if ($mentr == "MOTOBOY" and $valortotal <250){$valorvendavista = $valorvendavista - 5;}
 	$valorminimovenda = ($valortabela_realvista - ($valortabela_realvista*($descmax/100)));
	if ($valorvendavista < $valorminimovenda){$erro_valor_venda =1;}else{$erro_valor_venda =0;}

    #echo("vvenda = $valorvendavista vmvenda = $valorminimovenda");
	#$impostodif = $valorvendavista - $valortotaltabelavista;
	#if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

	// CALCULO DA COMISSAO

		// MARGEM DE LUCRO BRUTO
		$mlb = $valorvendavista - $valorcustovista - $impostodif;
		//MARGEM DE CONTRIBUICAO DE VENDA
		if ($nump > 0){
          if ($valortabela_realvista <> 0){
			$mcv = (1000*($mlb)/$valortabela_realvista);
            }
		}
		$mlb = 0;
		$mcv = 0;
        $mlb_real = $mlb;
        $mcv_real = $mcv;
        
       

        //////////////////////////////// MODULO MCV PROTEGIDO
		#$mcv_prot = 30;
		#$mcv_aplic = 50;
		#$data_inimcv = '2005-08-30 00:00:00';
		#$data_fimmcv = '2005-08-31 00:00:00';
		#$meia_mcv = "S";
		#echo("$data_inimcv - $data_fimmcv<br>");
		
		$prod->listProdMY("IF ((NOW() >= '$data_inimcv')  and  (NOW() <= '$data_fimmcv') , 'S', 'N')", "" , $array129, $array_campo129, "" );
		$prod->mostraProd( $array129, $array_campo129, 0 );
		$control_mcv = $prod->showcampo0();
		
		if ($control_mcv =="S"){

      	     if ($mcv < $mcv_prot and $mcv >= 0)
            {
                if ($meia_mcv == "S"){
                    $mcv = (($mcv_prot-$mcv_real)/2)+$mcv_real;
                    $mlb = ($mcv*$valortabela_realvista)/1000;
                }else{
                    $mcv = $mcv_aplic;
                    $mlb = ($mcv_aplic*$valortabela_realvista)/1000;
                }
            }
        }else{
        	$mcv_aplic = 0;
        	$mcv_prot = 0;
        	$meia_mcv = "N";
        }
        ////////////////////////////////FIM -  MODULO MCV PROTEGIDO
        

        #if ($mcv == ""){$mcv = 100;$mcv_real = 100;}
        if ($numped_plano > 0 ){$mlb = 0;$mlb_real = 0;} // SE EXISTIR ALGUM PRODUTO SEM COMISSAO
        if ($mlb < 0){$erro_valor =1;}// BLOQUEIA MLB NEGATIVA



#echo("vt_real = $valortabela_realvista<BR>vv = $valorvendavista<BR> vc = $valorcustovista <BR>i =  $impostodif<br>mlb = $mlb<br>mcv = $mcv<br>mlb_real = $mlb_real<br>mcv_real = $mcv_real<br>cont= $control_mcv");

#echo("<br>valortotaltabela_real = $valortabela_real<br>valortotaltabela = $valortotaltabela<br> valortotaltabelavista = $valortotaltabelavista <br> valorcustovista = $valorcustovista <br> valorvendavista $valorvendavista <br> impostodif = $impostodif <BR>");

	}// SIMULA

	// CALCULO DE PARACELAS ALTERAVEIS
	if ($calcular == 1 ){
	$valorvendavista = 0;
	$valor_prazo = 0;
	for($op = 1; $op <= $nump; $op++ ){

		$data_parc[$op] = $anoparc[$op].$mesparc[$op].$diaparc[$op];
		$difdias = $prod->numdias($dataatual,$data_parc[$op]);
		$n = ($difdias/30);
		if ($fixa <> 1){
			$valor_parc_x[$op] = str_replace('.','',$valor_parc[$op]);
			$valor_parc_x[$op] = str_replace(',','.',$valor_parc_x[$op]);	
			#$valor_parc_x[$op] = $valor_parc[$op];		
		}else{
			$valor_parc_x[$op] = $valor_parc[$op];
		}
		#echo "valorp=$valor_parc_x[$op]";
		#if ($nump > 6 ){$valor_parc_x[1] = $valor_parc_x[1] - $tac;}
		$valor_presente[$op] = $valor_parc_x[$op]/(pow((1+($taxa/100)),$n));

		#echo("vp= $valor_presente[$op]<br>");
		// CALCULO DO VALOR PRESENTE DAS PARCELAS
		$valorvendavista = $valorvendavista + $valor_presente[$op];
		$valor_prazo = $valor_prazo + $valor_parc_x[$op];

	}//FOR
		if ($nump > $num_parc_calc ){
			$valorvendavista = $valorvendavista - $tac;
			#$valor_prazo = $valor_prazo + $tac;
			
			#$valorvendavista_padrao = $valorvendavista - $tac;
		}else{
			$valorvendavista = $valorvendavista;
			#$valorvendavista_padrao = $valorvendavista;
		}
		
	#if ($modoentrf == "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista - 5;}
	#if ($modoentrf == "MOTOBOY" and $mentr <> "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista;}
	#if ($mentr == "MOTOBOY" and $modoentrf <> "MOTOBOY" and $vt < 250 ){$valorvendavista = $valorvendavista - 5;}
 	$valorminimovenda = ($valortabela_realvista - ($valortabela_realvista*($descmax/100)));
	if ($valorvendavista < $valorminimovenda){$erro_valor_venda =1;}else{$erro_valor_venda =0;}

    #echo("vvenda = $valorvendavista vmvenda = $valorminimovenda");
	// CALCULO DO IMPOSTO
	$impostodif = $valorvendavista - $valortotaltabelavista;
	if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

	// CALCULO DA COMISSAO

		// MARGEM DE LUCRO BRUTO
		$mlb = $valorvendavista - ($valorcustovista) - $impostodif;

		//echo "mlb=$mlb - vc = $valorcustovista";
		//MARGEM DE CONTRIBUICAO DE VENDA
		if ($nump > 0){
            if ($valortabela_realvista <> 0){
			$mcv = (1000*($mlb)/$valortabela_realvista);
            }
        }
        $mlb_real = $mlb;
        $mcv_real = $mcv;

		
        //////////////////////////////// MODULO MCV PROTEGIDO
		#$mcv_prot = 30;
		#$mcv_aplic = 50;
		#$data_inimcv = '2005-08-30 00:00:00';
		#$data_fimmcv = '2005-09-31 00:00:00';
		#$meia_mcv = "N";

		$prod->listProdMY("IF ((NOW() >= '$data_inimcv')  and  (NOW() <= '$data_fimmcv') , 'S', 'N')", "" , $array129, $array_campo129, "" );
		$prod->mostraProd( $array129, $array_campo129, 0 );
		$control_mcv = $prod->showcampo0();

		if ($control_mcv == "S"){

      	     if ($mcv < $mcv_prot and $mcv >= 0)
            {
                if ($meia_mcv == "S"){
                    $mcv = (($mcv_prot-$mcv_real)/2)+$mcv_real;
                    $mlb = ($mcv*$valortabela_realvista)/1000;
                }else{
                    $mcv = $mcv_aplic;
                    $mlb = ($mcv_aplic*$valortabela_realvista)/1000;
                }
            }
        }else{
        	$mcv_aplic = 0;
        	$mcv_prot = 0;
        	$meia_mcv = "N";
        }
        ////////////////////////////////FIM -  MODULO MCV PROTEGIDO


        if ($mcv == ""){$mcv = 100;$mcv_real = 100;}
        if ($numped_plano > 0 ){$mlb = 0;$mlb_real = 0;} // SE EXISTIR ALGUM PRODUTO SEM COMISSAO
        if ($mlb < 0){$erro_valor =1;}// BLOQUEIA MLB NEGATIVA
        
        
#echo("vt_real = $valortabela_realvista<BR>vv = $valorvendavista<BR> vc = $valorcustovista <BR>i =  $impostodif<br>mlb = $mlb<br>mcv = $mcv<br>mlb_real = $mlb_real<br>mcv_real = $mcv_real<br>cont= $control_mcv<BR>meia_mcv= $meia_mcv");

		
#echo("<br>valortotaltabela_real = $valortabela_real<br>valortotaltabela = $valortotaltabela<br> valortotaltabelavista = $valortotaltabelavista <br> valorcustovista = $valorcustovista <br> valorvendavista $valorvendavista <br> impostodif = $impostodif <BR>");
 

	}//CALCULAR
	
	
	$_SESSION['valortotal'] = $valortotal;
	$_SESSION['valortabela_real'] = $valortabela_real;
	$_SESSION['vpp'] = $valor_prazo;
	$_SESSION['vpv'] = $valorvendavista;
	$_SESSION['vc'] = $valorcustovista;
	$_SESSION['mlb'] = $mlb;
	$_SESSION['mcv'] = $mcv;
	$_SESSION['mlb_real'] = $mlb_real;
	$_SESSION['mcv_real'] = $mcv_real;
	$_SESSION['mcv_prot'] = $mcv_prot;
	$_SESSION['mcv_aplic'] = $mcv_aplic;
	$_SESSION['meia_mcv'] = $meia_mcv;
	
	// FORMATADO
	$valortotalf = number_format($valortotal,2,',','.');
 	$valortabela_realf = number_format($valortabela_real,2,',','.');
 	$valor_prazof = number_format($valor_prazo,2,',','.');
	$valorvendavistaf = number_format($valorvendavista,2,',','.');
	$valorcustovistaf = number_format($valorcustovista,2,',','.');
	$mcvf = number_format($mcv,2,',','.');
	$mlbf = number_format($mlb,2,',','.');
	$mcv_realf = number_format($mcv_real,2,',','.');
	$mlb_realf = number_format($mlb_real,2,',','.');

	// TEMPLATE
	#echo "entrada=".$entrada."nump=".$nump;
	if ($nump == 1 and $entrada == 1){
	
	}else{
		include ("templates/ped_iformapg.htm");
	}
?>
