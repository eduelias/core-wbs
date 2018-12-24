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
	$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela, fatorusertabela_ata, codvend_user, lucro_min, funcionario","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
	$codempselect = $prod->showcampo0();
	$codvendselect = $prod->showcampo1();;
	$tipovend = $prod->showcampo2();
	$fatorusertabela = $prod->showcampo3();
	$fatorusertabela_ata = $prod->showcampo4();
	$codvend_user_ped = $prod->showcampo5();
	$lucro_min = $prod->showcampo6();
	$funcionario = $prod->showcampo7();
	
		$prod->listProdU("tipo_supervisor","vendedor_usuario", "codvend_user = '$codvend_user_ped'");
		$tipo_supervisor = $prod->showcampo0();
		
		#echo "superv=".$tipo_supervisor;
	
	
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
      #$taxa = 0.0001;
      $tac = 0;
      $num_parc_calc = 6;
	
			
	
	$prod->clear();
	$prod->listProdU("fatorcusto, data_inimcv, data_fimmcv, mcv_prot, mcv_aplic, meia_mcv, codvend_dist","vendedor", "nome='$login'");
	$fatorcusto = $prod->showcampo0();
    $data_inimcv = $prod->showcampo1();
    $data_fimmcv = $prod->showcampo2();
    $mcv_prot = $prod->showcampo3();
    $mcv_aplic = $prod->showcampo4();
    $meia_mcv = $prod->showcampo5();
	$dataatual = $prod->gdata();
	$fatorcusto = 1; // DISTRIBUICAO
	$codvend_dist = $prod->showcampo6();
	$prod->clear();
	$prod->listProdU("fatorcomfixo, fatorcomvar","vendedor", "codvend = $codvend_dist");
	$fatorcomfixo = $prod->showcampo0();
	$fatorcomvar = $prod->showcampo1();
	
	if ($sj10x == 1){
      #$fatorvista = 1;
      #$taxa = 0.01;
      #$tac = 0;
      #$num_parc_calc = 10;
      $fixa = 1;
      
    }
	
	if ($count_prod == 0){
      $fatorvista = $fatorvista_cel;
      $taxa = $taxa_cel;
      $tac = 0;
      $num_parc_calc = 6;
      
    }
    
  
    
    #echo("cel = $count_prod - $num_parc_calc - $fatorvista - $taxa - $tac");

	// CALCULO DAS PARCELAS
	$valortotalvenda = str_replace('.','',$valortotalvenda);
	$valortotalvenda = str_replace(',','.',$valortotalvenda);
	
	$opcaixap_t = array(1=>"02.00", 2=>"02.01", 3=>"02.44", 4=>"02.48", 5=>"02.53", 6=>"02.54", 7=>"02.18", 8=>"02.17");
	#$ventradap_t[0]=0;
		
	for($r = 1; $r <= 8 ; $r++ ){
	
	$ventradap[$r] = str_replace('.','',$ventradap[$r]);
	$ventradap[$r] = str_replace(',','.',$ventradap[$r]);
	
		if ($ventradap[$r] <> 0){
			$ventrada = $ventrada + $ventradap[$r];
			$nump_entrada++;
			$ventradap_t[$r] .= $ventradap[$r];
		}
		
		
		
	}
	
	  
	
	
	#print_r($ventradap_t);
	#print_r($opcaixap_t);
	
	#if ($ventrada == 0){$ventrada = $valortotalvenda;}
	
	
	
	$vparc_i = str_replace('.','',$vparc_i);
	$vparc_i = str_replace(',','.',$vparc_i);
	#$valortabela_real = str_replace('.','',$valortabela_real);
	#$valortabela_real = str_replace(',','.',$valortabela_real);
	
	$valortotaltabela = $_POST['valortotal'];
	$valortotaltabelavista = $valortotaltabela*$fatorvista;
	$valortabela_realvista = $_POST['valortabela_real']*$fatorvista;
	$valortabela_realfator = $_POST['valortabela_real']*$fatorvista*$fatorusertabela_ata;
	
		
	#$valortabela_realvista = $valortotaltabelavista;
	if ($nump > $num_parc_calc){
		#$valorcustovista = ($valortabela_realvista*$fatorcusto) ;
		$valorcustovista = $_POST['valorcusto_real']*$fatorvista;
		#$valorcustovista = ($valortabela_realvista*$fatorcusto) + $tac;
	}else{
		#$valorcustovista = ($valortabela_realvista*$fatorcusto);
		$valorcustovista = $_POST['valorcusto_real']*$fatorvista;
	}
	
	
	#echo("vt=$valortotaltabela  vtr=$valortabela_real- ent = $entrada - sim = $simula- calc = $calcular<br>");
	if ($vparc_i <> "" and $entrada <> 1){$fixa = 1;} // VALOR FIXO DE PARCELAS
	if ($tipo_cartao == "B"){if ($nump > 10){$nump = 10;} $fixa =0;}

	//SIMULACAO DAS PARCELAS IGUAIS
	if ($simula == 1){
	
		if ($entrada == 1){
		
		        if ($fixa <> 1 ){ // VALOR DE TABELA DIVIDO IGUALMENTE
		
			#$anopar = $anopar1;
			#$mespar = $mespar1;
			#$diapar = $diapar1;
			
			#$diaparc[1] = $diaent;
			 #if ($mesent == 2 and $diaent > 28){$diaparc[1] = 28;}
		     #if (($mesent == 4 or $mesent == 6 or $mesent == 9 or $mesent == 11) and $diaent > 30){$diaparc[1] = 30;}
			#$mesparc[1] = $mesent;
			#$anoparc[1] = $anoent;
			#$valor_parc[1] = $ventrada;
			#$valor_parc[1] = number_format($ventrada,2,',','.');
			
			$prod->listProdMY("DATE_ADD(NOW(), INTERVAL 0 DAY)", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data_parc1ent =  $prod->showcampo0();
			$data_parc1ent = str_replace('-','',$data_parc1ent);
			$anoent = substr($data_parc1ent,0,4);
			$mesent = substr($data_parc1ent,4,2);
			$diaent = substr($data_parc1ent,6,2);
			
								
			// CALCULA O JUROS DA ENTRADA
            $data_parc_ent = $anoent.$mesent.$diaent;
			$difdias_ent = $prod->numdias($dataatual,$data_parc_ent);
			$n_ent = ($difdias_ent/30);
			$juros_entrada = $ventrada*(pow((1+($taxa/100)),$n_ent)-1);

			$vsentrada = ($valortotalvenda - $ventrada)+ $juros_entrada;
			if ($vsentrada <= 0){$vsentrada = 0;}

			// CALCULA O VALOR PRESENTE DO PRINCIPAL MENOS A ENTRADA
			#$anopar_ini = $anopar;
			#$mespar_ini = $mespar - 1;
			#if ($mespar_ini < 1){$mespar_ini=12;$anopar_ini--;}
			#if (strlen($mespar_ini)==1){$mespar_ini = '0'.$mespar_ini;}
			
			 if ($tipo_cartao == "B"){$datainicio = "'$anopar_bol-$mespar_bol-$diapar_bol 00:00:00'";$tipo_p1 = -30;}else{$datainicio = "NOW()";$tipo_p1 = 30;}
			
			$prod->listProdMY("DATE_ADD($datainicio, INTERVAL $tipo_p1 DAY)", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data_parc1 =  $prod->showcampo0();
			$data_parc1 = str_replace('-','',$data_parc1);
			$anopar = substr($data_parc1,0,4);
			$mespar = substr($data_parc1,4,2);
			$diapar = substr($data_parc1,6,2);
			
			$data_parc = $anopar.$mespar.$diapar;
			
			#$data_parc = $anopar_ini.$mespar_ini.$diapar;
			$difdias = $prod->numdias($dataatual,$data_parc);
			$n = (($difdias)/30);
			#$valor_principal_sub = $vsentrada*(pow((1+($taxa/100)),$n));
			$valor_principal_sub = $vsentrada;
			
			

	//CALCULA O PMT
	
	if ($tipo_cartao == 'B'){$taxa = 3.2;$add_bol = 2.5;$juros_boleta = $valor_principal_sub*(pow((1+($taxa/100)),$n)-1);$valor_principal = $valor_principal_sub+$juros_boleta;}// BOLETA BANCARIA
	else {$valor_principal = $valor_principal_sub / 0.96 ;$add_bol = 0;if ($tipo_cartao == 'V' or $tipo_cartao == 'M'){$taxa = 2.8;}}// COBRANCA DO JUROS DO CARTAO
	
	#echo(" datap = $data_parc  - $datainicio - vp_sub = $valor_principal - $valor_principal_sub - n= $n - add_bol = $add_bol - taxa = $taxa - nump= $nump - juros_bol = $juros_boleta");
	
	#$k = ($taxa/100)*(pow((1+($taxa/100)),$nump-1))/((pow((1+($taxa/100)),$nump-1))-1);
	if ($nump <> 0){
		$k = ($taxa/100)*(pow((1+($taxa/100)),$nump))/((pow((1+($taxa/100)),$nump))-1);
		$pmt = ($valor_principal*$k)+$add_bol;
	}else{$pmt = 0;}
	#echo " $k - $pmt";
	
			$lx = 2;
			#$ad = 1; // ADICIONA
			
			}else{ // VALORES FIXADOS
			
				$prod->listProdMY("DATE_ADD(NOW(), INTERVAL 0 DAY)", "" , $array129, $array_campo129, "" );
				$prod->mostraProd( $array129, $array_campo129, 0 );
				$data_parc1ent =  $prod->showcampo0();
				$data_parc1ent = str_replace('-','',$data_parc1ent);
				$anoent = substr($data_parc1ent,0,4);
				$mesent = substr($data_parc1ent,4,2);
				$diaent = substr($data_parc1ent,6,2);
				
									
				// CALCULA O JUROS DA ENTRADA
				if ($nump > 10){$nump = 10;}
				$data_parc_ent = $anoent.$mesent.$diaent;
				$difdias_ent = $prod->numdias($dataatual,$data_parc_ent);
				$n_ent = ($difdias_ent/30);
				$juros_entrada = $ventrada*(pow((1+($taxa/100)),$n_ent)-1);
	
				$vsentrada = ($valortotalvenda - $ventrada)+ $juros_entrada;
				$desconto_mlb = $vsentrada*(0.0439+0.011*$nump); // JUROS DO CARTAO DE CREDITO
				#if ($nump == 1){$nump_f = 2;}else{$nump_f = $nump;}
				$pmt = ($vsentrada/($nump)+$add_bol);
				#$lx = 2;
				
				#echo "pmt=".$pmt;
				
			}

		}else{
		
			/*
		
            if ($fixa <> 1){ // VALOR DE TABELA DIVIDO IGUALMENTE
		         
			// CALCULA O VALOR PRESENTE DO PRINCIPAL
			
					
			$prod->listProdMY("DATE_ADD(NOW(), INTERVAL 30 DAY)", "" , $array129, $array_campo129, "" );
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
			$valor_principal_sub = ($valortotalvenda-100)*(pow((1+($taxa/100)),$n));
			echo("AQUI datap = $data_parc - vp_sub = $valor_principal_sub");

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
			
			*/
		       
		}

	#echo("vp=$valor_principal - k=$k - df=$difdias - n=$n - n_ent = $n_ent - j_ent = $juros_entrada - vs_ent = $vsentrada - nump = $nump - fixa= $fixa<br>");
	#$tipo_p1 = 30;
	
	//PARCELAS DA ENTRADA
	#for($op = 1; $op <= count($ventradap_t); $op++ ){
	$op=1;
	if (is_array($ventradap_t)){
	foreach ($ventradap_t as $key => $value) {
		 
		 
		 $prod->listProdMY("DATE_ADD(NOW(), INTERVAL 0 DAY)", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data_parc1 =  $prod->showcampo0();
			$data_parc1 = str_replace('-','',$data_parc1);
			$anoparc[$op] = substr($data_parc1,0,4);
			$mesparc[$op] = substr($data_parc1,4,2);
			$diaparc[$op] = substr($data_parc1,6,2);
		 
		#if ($mespar > 12){$mespar=1;$anopar++;}
		#if (strlen($mespar)==1){$mespar = '0'.$mespar;}

		
		 #$diaparc[$op] = $diapar;
		 #if ($mespar == 2 and $diapar > 28){$diaparc[$op] = 28;}
		 #if (($mespar == 4 or $mespar == 6 or $mespar == 9 or $mespar == 11) and $diapar > 30){$diaparc[$op] = 30;}
		 #$mesparc[$op] = $mespar;
		 #$anoparc[$op] = $anopar;
	 	 #$pmt_x = number_format($pmt,2,',','.');
	         $valor_parc[$op] = $ventradap_t[$key];
			 $opcaixa_parc[$op] = $opcaixap_t[$key];

	        
	         
	         $valor_prazo = $valor_prazo + $ventradap_t[$key];

     		#echo("vp[$op]= $valor_parc[$op] - $nump - op[$op] = $opcaixa_parc[$op]<br>");
			
			#echo "op_entrada=". $op;
			$op++;
	}		
	}
	
	#}//FOR
	
	#echo "tipo_cartao = $tipo_cartao";
	 if ($tipo_cartao == "B"){$datainicio = "'$anopar_bol-$mespar_bol-$diapar_bol 00:00:00'";$tipo_p1 = 0;}else{$datainicio = "NOW()";$tipo_p1 = 30;}
	
	//PARCELAS CARTAO
	for($op = ($nump_entrada+1); $op <= ($nump+$nump_entrada); $op++ ){
				 
		 $prod->listProdMY("DATE_ADD($datainicio, INTERVAL $tipo_p1 DAY)", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$data_parc1 =  $prod->showcampo0();
			$data_parc1 = str_replace('-','',$data_parc1);
			$anoparc[$op] = substr($data_parc1,0,4);
			$mesparc[$op] = substr($data_parc1,4,2);
			$diaparc[$op] = substr($data_parc1,6,2);
		 
		#if ($mespar > 12){$mespar=1;$anopar++;}
		#if (strlen($mespar)==1){$mespar = '0'.$mespar;}

		
		 #$diaparc[$op] = $diapar;
		 #if ($mespar == 2 and $diapar > 28){$diaparc[$op] = 28;}
		 #if (($mespar == 4 or $mespar == 6 or $mespar == 9 or $mespar == 11) and $diapar > 30){$diaparc[$op] = 30;}
		 #$mesparc[$op] = $mespar;
		 #$anoparc[$op] = $anopar;
	 	 #$pmt_x = number_format($pmt,2,',','.');
	         $valor_parc[$op] = $pmt;
			 if ($tipo_cartao == "V"){$opcaixa_parc[$op] = "02.35";}
			 if ($tipo_cartao == "M"){$opcaixa_parc[$op] = "02.36";}
			 if ($tipo_cartao == "B"){$opcaixa_parc[$op] = "02.04";}

	      #   $mespar++;
	         
	         $valor_prazo = $valor_prazo + $pmt;

     		#echo("vp[$op]= $valor_parc[$op] - $nump<br>");
			
			#echo "op_parcela=". $op;
	
	$tipo_p1 = $tipo_p1 + 30;

	}//FOR
		
		/*
		#$valorvendavista = $valorvendavista + $ventrada;
		#$valor_prazo = $valor_prazo + $ventrada;
		if ($nump > $num_parc_calc ){
			$valor_parc[1] = $valor_parc[1] +$tac;
			#$valorvendavista = $valortotaltabelavista + $tac;
    		$valorvendavista = $valortotaltabelavista;
			$valor_prazo = $valor_prazo + $tac;
		}else{
			$valorvendavista = $valortotaltabelavista;
		}
		*/
		
	$valorvendavista = $valortotalvenda;
		
	

	#echo("vvv= $valorvendavista - vc = $valorcustovista");
	
	// ACRESCIMO PARA USO DE MOTOBOY
	#if ($mentr == "MOTOBOY" and $valortotal <250){$valorvendavista = $valorvendavista - 5;}
 	#$valorminimovenda = ($valortabela_realvista - ($valortabela_realvista*($descmax/100)));
	$valorminimovenda = ($valortabela_real*$fatorusertabela_ata*$lucro_min);
	if ($valorvendavista < $valorminimovenda){$erro_valor_venda =1;}else{$erro_valor_venda =0;}
	if ($valorvendavista != $ventrada and $nump == 0){$erro_valor_venda_vista =1;}else{$erro_valor_venda_vista =0;}
	
    #echo("vvenda = $valorvendavista vmvenda = $valorminimovenda");
	#$impostodif = $valorvendavista - $valortotaltabelavista;
	#if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}
	
	$nump = $nump + $nump_entrada;

	// CALCULO DA COMISSAO


		#echo "vpp =$valorvendavista - vt =$valortabela_realvista - vc =$valorcustovista ";
		// MARGEM DE LUCRO BRUTO
		#$mlb = $valorvendavista - $valorcustovista - $impostodif;
		
		//CALCULO COMISSAO DISTRIBUIDOR

		/*
		if ($valorvendavista > $valortabela_realvista){
			$mlb = ($valortotaltabelavista-$valortabela_realvista)/2 + ($valortabela_realvista-$valorcustovista);
		}else{
			$mlb = ($valorvendavista-$valorcustovista);
		}
		*/
		
		//CALCULO COMISSAO REVENDA DISTRIBUICAO
		#$mlb_dist = ($valortabela_realfator-$valortabela_realvista)/2 + ($valortabela_realvista-$valorcustovista);
		$mlb_dist = ($fatorcomfixo*($valortabela_realfator))+ ($fatorcomvar*($valortabela_realfator - $valorcustovista));
		
		if ($sj10x == 1){
			$mlb_rev = (($valorvendavista-$valortabela_realfator)*0.9)-$desconto_mlb;
		}else{
			$mlb_rev = ($valorvendavista-$valortabela_realfator)*0.9;
		}
		if ($funcionario == 'Y'){$mlb_rev =0;}
		
		$mlb = $mlb_dist + $mlb_rev;
		
		//$mlb_rev_nova = (($valorvendavista-$valortabela_realfator)*0.9);
		
		//echo "mlb = $mlb_dist + $mlb_rev | $mlb_rev_nova - $desconto_mlb";
		
		
		//MARGEM DE CONTRIBUICAO DE VENDA
		if ($nump > 0){
          if ($valortabela_realvista <> 0){
			$mcv = (1000*($mlb)/$valortabela_realvista);
            }
		}
		#$mlb = 0;
		$mcv = 100;
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
        if ($mlb_rev < 0){$erro_valor_venda = 1;}// BLOQUEIA MLB NEGATIVA
		#echo "mlb = $mlb_dist + $mlb_rev | $mlb_rev_nova - $desconto_mlb";



#echo("vt_real = $valortabela_realvista<BR>vv = $valorvendavista<BR> vc = $valorcustovista <BR>i =  $impostodif<br>mlb = $mlb<br>mcv = $mcv<br>mlb_real = $mlb_real<br>mcv_real = $mcv_real<br>cont= $control_mcv");

#echo("<br>valortotaltabela_real = $valortabela_real<br>valortotaltabela = $valortotaltabela<br> valortotaltabelavista = $valortotaltabelavista <br> valorcustovista = $valorcustovista <br> valorvendavista $valorvendavista <br> impostodif = $impostodif <BR>");

	}// SIMULA

	/*
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
 	#$valorminimovenda = ($valortabela_realvista - ($valortabela_realvista*($descmax/100)));
	$valorminimovenda = ($valortabela_realvista*0.9);
	if ($valorvendavista < $valorminimovenda){$erro_valor_venda =1;}else{$erro_valor_venda =0;}

    #echo("vvenda = $valorvendavista vmvenda = $valorminimovenda");
	// CALCULO DO IMPOSTO
	$impostodif = $valorvendavista - $valortotaltabelavista;
	if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

	// CALCULO DA COMISSAO

		#echo "vpp =$valorvendavista - vt =$valortabela_realvista - vc =$valorcustovista ";
		// MARGEM DE LUCRO BRUTO
		#$mlb = $valorvendavista - $valorcustovista - $impostodif;
		
		if ($valorvendavista > $valortabela_realvista){
			$mlb = ($valorvendavista-$valortabela_realvista)/2 + ($valortabela_realvista-$valorcustovista);
		}else{
			$mlb = ($valorvendavista-$valorcustovista);
		}
				
		//echo "mlb=$mlb - vc = $valorcustovista";
		//MARGEM DE CONTRIBUICAO DE VENDA
		if ($nump > 0){
            if ($valortabela_realvista <> 0){
			$mcv = (1000*($mlb)/$valortabela_realvista);
            }
        }
		$mcv = 100;
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
	*/
	
	$_SESSION['valortotal'] = $valortotal;
	$_SESSION['valortabela_real'] = $valortabela_real;
	$_SESSION['valorcusto_real'] = $valorcusto_real;
	$_SESSION['vpp_mdped'] = $valor_prazo;
	$_SESSION['vpv_mdped'] = $valorvendavista;
	$_SESSION['vt_mdped'] = $valortotal;
	$_SESSION['vc_mdped'] = $valortabela_real*$fatorusertabela_ata;
	$_SESSION['mlb_mdped'] = $mlb;
	$_SESSION['mcv_mdped'] = $mcv;
	$_SESSION['mlb_real_mdped'] = $mlb_real;
	$_SESSION['mcv_real_mdped'] = $mcv_real;
	$_SESSION['mcv_prot'] = $mcv_prot;
	$_SESSION['mcv_aplic'] = $mcv_aplic;
	$_SESSION['meia_mcv'] = $meia_mcv;
	$_SESSION['mlb_dist'] = $mlb_dist;
	
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
	$mlb_revf = number_format($mlb_rev,2,',','.');
	// TEMPLATE
	#echo "entrada=".$entrada."nump=".$nump;
	if ($nump == 0 ){
	
	}else{
		include ("templates/ped_iformapg.htm");
	}
?>
