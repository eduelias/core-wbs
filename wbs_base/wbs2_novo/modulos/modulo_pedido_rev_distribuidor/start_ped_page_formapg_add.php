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

	// DATA HOJE
 	$hoje = getdate();
	$ano = $hoje[year];
	$mes = $hoje[mon];
	$dia = $hoje[mday];
	if (strlen($mes)==1){$mes = '0'.$mes;}
	if (strlen($dia)==1){$dia = '0'.$dia;}

	$prod->clear();
	$prod->listProdU("pedidotemp.codemp, pedidotemp.codvend, tipo, fatorusertabela, codcliente, vpp,vpv, mlb, mcv, tipo_vge, sj10x, codvend_dist","pedidotemp, vendedor", "codped='$codpedselect' AND pedidotemp.codvend=vendedor.codvend");
	$codempselect = $prod->showcampo0();
	$codvendselect = $prod->showcampo1();;
	$tipovend = $prod->showcampo2();
	$fatorusertabela = $prod->showcampo3();
	$codcliente = $prod->showcampo4();
	$vpp = $prod->showcampo5();
	$vpv = $prod->showcampo6();
	$mlb = $prod->showcampo7();
	$mcv = $prod->showcampo8();
	$tipo_vge = $prod->showcampo9();
	$sj10x = $prod->showcampo10();
	$codvend_dist = $prod->showcampo11();
	
	$prod->clear();
	$prod->listProdU("descmax, fatorvista, taxa","empresa", "codemp=$codempselect");
	$descmax = $prod->showcampo0();
	$fatorvista = $prod->showcampo1();
	$taxa = $prod->showcampo2();

#echo("codcli = $codcliente");
	// FORMATA
	$vppf = number_format($vpp,2,',','.');
	$vpvf = number_format($vpv,2,',','.');
	$mcvf = number_format($mcv,2,',','.');
	$mlbf = number_format($mlb,2,',','.');
	
	// PESQUISA ENDEREÇO DO CLIENTE
	$prod->clear();
	$prod->listProdU("cep, endereco, numero, complemento, bairro, cidade, estado, tipo_pis", "clientenovo", "codcliente=$codcliente");
	$abccep = $prod->showcampo0();
	$abcendereco = $prod->showcampo1();
	$abcnumero = $prod->showcampo2();
	$abccomplemento = $prod->showcampo3();
	$abcbairro = $prod->showcampo4();
	$abccidade = $prod->showcampo5();
	$abcestado = $prod->showcampo6();
	$tipo_pis = $prod->showcampo7();
	
	// PESQUISA POR PRODUTOS QUE NAO POSSUEM PRODUTOS DE CELULAR
    $prod->clear();
    $prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "codped='$codpedselect' and produtos.codcat <> 46 and pedidoprodtemp.codprod=produtos.codprod ");
    $count_prod_ncel = $prod->showcampo0();
    if ($count_prod_ncel == 0){$tipo_pad = "C";}else{$tipo_pad = "I";}
    
    // PESQUISA POR PRODUTOS QUE SAO PARA TODOS
    $prod->clear();
    $prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "codped='$codpedselect' and produtos.codsubcat = 218 and pedidoprodtemp.codprod=produtos.codprod ");
    $count_prod_todos = $prod->showcampo0();
    
    if ($sj10x ==  'OK'){
    // PESQUISA OPCAIXA 10x
    
    $prod->clear();
    $prod->listProdSum("opcaixa10x","pedidoprodtemp, produtos", "codped='$codpedselect' and opcaixa10x <> ''", $array64, $array_campo64 , "group by produtos.codprod");
	   for($j = 0; $j < count($array64); $j++ ){
			
			$prod->mostraProd( $array64, $array_campo64, $j );
			$opcaixa10x[$j] = $prod->showcampo0();
			$array_prod[$j] = explode(":", $opcaixa10x[$j]);
			if($j==0){$xopcaixashow = $array_prod[0];}
			$xopcaixashow = array_intersect($xopcaixashow, $array_prod[$j]);
			#echo $opcaixa10x[$j]."<BR> - $j - $x - $codpedselect";
			#print_r($array_prod);
			#print_r($xopcaixashow);
			
		
		}//FOR

    }else{
     
   #echo "cliente = $codcliente";
	// PESQUISA POR DADOS DO CLIENTE
	$prod->clear();
	$prod->listProdU("opcaixa","clientenovo", "codcliente=$codcliente");
	$opcaixa = $prod->showcampo0();
	$xopcaixashow1 = explode(":", $opcaixa);
	if($tipo_p == 1) {$array_ata = "02.00:02.01:02.17:02.18";}
	if($tipo_p != 1) {if ($vpp > 300) {$array_ata = "02.01:02.04";}else{$array_ata = "02.01";}}
	
	$show_array_ata = explode(":", $array_ata);
	
	$xopcaixashow = array_intersect($xopcaixashow1, $show_array_ata);
	#print_r ($xopcaixashow);
    }
    
	// LISTA OS REGISTROS
	foreach ($xopcaixashow as $l => $value){
	 #for($l = 0; $l < count($xopcaixashow); $l++ ){

		#echo $xopcaixashow[$l];
		if ($xopcaixashow[$l] <> ""){
		
		$prod->listProdU("descricao, tipo, fabrica","formapg", "opcaixa='$xopcaixashow[$l]'");
		$descricao[$l] = $prod->showcampo0();
		$tipo_cel[$l] = $prod->showcampo1();
		$fabrica[$l] = $prod->showcampo2();	
		}
	#}// FOR
	}//FOREACH
    $prod->clear();
	$prod->listProdSum("codvend, nome","vendedor", "block <> 'Y' and funcionario = 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){

		$prod->mostraProd( $array6, $array_campo6, $j );
		$codvend_cm[$j] = $prod->showcampo0();
		$nome_cm[$j] = $prod->showcampo1();
	}//FOR

	$prod->clear();
	$prod->listProdSum("datavenc, vp, codparcped ", "pedidoparcelastemp", "codped = '$codpedselect'", $arrayx, $array_campox, "ORDER BY datavenc");

		for ($j = 0; $j < count($arrayx); $j++)
		{
			$prod->mostraProd($arrayx, $array_campox, $j);
			$datavenc[$j+1] = $prod->showcampo0();
			$vp[$j+1] = $prod->showcampo1();
			$codparc[$j+1] = $prod->showcampo2();
			
			$vpf[$j+1] = $prod->fpreco($vp[$j+1]);
			$datavencf[$j+1] = $prod->fdata($datavenc[$j+1]);
			

		}//FOR
		
		// PESQUISA O NUMERO DE CONJUNTOS DO PEDIDO
        $prod->clear();
        $prod->listProdSum("tipocj","pedidoprodtemp", "codped='$codpedselect' and tipoprod ='CJ' and tipocj <> 0", $arrayx45, $array_campox45, "group by tipocj");
        $num_cj = count($arrayx45);
        // PESQUISA NUMERO DE MICROS KITS
        $prod->clear();
        $prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "codped='$codpedselect' and produtos.codcat = 73 and pedidoprodtemp.codprod=produtos.codprod ");
        $num_kit = $prod->showcampo0();
        
        $num_micro = $num_cj + $num_kit;
        
         // PESQUISA POR S/O WINDOWS NO PEDIDO
  		$prod->clear();
        $prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "codped='$codpedselect' and produtos.codcat = 65 and pedidoprodtemp.codprod=produtos.codprod ");
        $count_soft = $prod->showcampo0();
        
                
        // PESQUISA POR FALTA DE ESTOQUE
        $status_prod = 1;
        $prod->clear();
        $prod->listProdSum("codprod, qtde","pedidoprodtemp", "codped='$codpedselect' ", $arrayx45, $array_campox45, "");
        for($i = 0; $i < count($arrayx45); $i++ )
        {
       
		$prod->mostraProd( $arrayx45, $array_campox45, $i );
		$codprod_ped = $prod->showcampo0();
		$qtdeprod_ped = $prod->showcampo1();
		
		$est_real = 0;
        $prod->clear();        
        $prod->listProdU("(SUM(qtde-reserva) - $qtdeprod_ped) as est", "estoque", "codprod = '$codprod_ped' and codemp = '$codempselect'");		
		$est_real = $prod->showcampo0();
		
		if ($codempselect ==15){
			
			$prod->clear();
			$prod->listProdU("COUNT(*) est","codbarra", "codprod=$codprod_ped and codemp=14 and tipo_fab <>'P' and codbarraped <> 1 GROUP by codprod ");
			$est_fab = $prod->showcampo0();
			$prod->clear();
			$prod->listProdU("SUM(reserva) as res","estoque", "estoque.codprod=$codprod_ped and estoque.codemp=14");
			$res_fab = $prod->showcampo0();
			
			$est_real = $est_real + ($est_fab-$res_fab);
				#echo "est_fb=".$est_fab[$k]."<BR>";
		}
		
		if ($codempselect == 15){$cond1 = "(ocprod.codemp = 14 or ocprod.codemp = 15)";$cond2 = " and codped_transf = 0";}else{$cond1 = "(ocprod.codemp = $codempselect)";$cond2 = "";}
        
		if ($est_real == ""){$est_real=0;}
		$prod->clear();		
		$prod->listProdU("(SUM(qtdecomp)+$est_real) as qtdeoc","ocprod, oc", "codprod='$codprod_ped' and ".$cond1." and oc.hist <> 1 and oc.codoc=ocprod.codoc and tipo_nf <> 'P' ".$cond2." GROUP by codprod");
		$qtde_ocreal = $prod->showcampo0();
		
		if ($est_real < 0){
			if ($qtde_ocreal <= 0){$status_prod = $status_prod*0;}//SEM ESTOQUE 
			if ($qtde_ocreal > 0){$status_prod = $status_prod*0;}//PREVISAO COMPRA 
		}
		if ($est_real >= 0){$status_prod = $status_prod*1;}// COM ESTOQUE
				
        }//FOR

        $prod->clear(); 		
		$prod->listProdU("codemp", "pedidotemp", "codped='$codpedselect'");
		$codemp_op = $prod->showcampo0();	
		
		// VERIFICA SE O PEDIDO FOI À VISTA E EM DINHEIRO , FINANCIAMNETO BANCARIO ou CARTAO VISA
		$prod->listProdSum("opcaixa, loja", "empresa_formapg", "codemp='$codemp_op' ", $array56, $array_campo56, "" );
		
        
// INICIO DAS ACOES
   switch ($Action)
{
	case "grava":

		$pendfpg=1; // PENDENCIA DE PREENCHIMENTO DE ALGUMA FORMA DE PAGAMENTO
		$dindim =1; // SO EXISTE FORMA DE PAGAMENTO EM DINHEIRO
		$aguarda_comp=1;
		$string_md5 = "" ; // STRAING MD5 PARA PARCELAS
		for($i = 1; $i <= $nump; $i++ ){

			// VERIFICA PENDENCIA DE DADOS
			if(($formapg[$i] =='02.01') and (($numch[$i] == "") or ($banco[$i] == "") or ($agencia[$i] == "") or ($conta[$i] == ""))){
				$pendfpg = $pendfpg*0;
				$pendfpg_parc = "OK";
			}else{
				$pendfpg = $pendfpg*1;
				$pendfpg_parc = "NO";
			}
			
			// VERIFICA PENDENCIA DE DADOS
			if($formapg[$i] == '02.55' or $formapg[$i] == '02.35' or $formapg[$i] == '02.36' ){
				$aguarda_comp = $aguarda_comp*0;
			}else{
				$aguarda_comp = $aguarda_comp*1;
			}

// VERIFICA SE DENTRE AS PARCELAS EXISTE ALGUMA QUE POSSUI DINHEIRO OU CARTAO OU VISAELECTRON OU FINANCIAMENTO
if ($formapg[$i] =='02.00'){$dindim = $dindim*1;}else{$dindim = $dindim*0;}


		// ATULALIZA DADOS NA TABELA PARCELAS
                $condicao_ped = "banco = '$banco[$i]', ";
		$condicao_ped .= "agencia = '$agencia[$i]', ";
		$condicao_ped .= "conta='$conta[$i]', ";
		$condicao_ped .= "numcheq='$numch[$i]', "; 
		$condicao_ped .= "tipo = '$formapg[$i]', ";
		$condicao_ped .= "pendfpg='$pendfpg_parc', ";
		$condicao_ped .= "parcpg = 'NO', ";
		$condicao_ped .= "numdoc = '' ";
		$string_md5 .= $datavenc[$i].$formapg[$i].$vp[$i];
	
 		$prod->upProdU("pedidoparcelastemp",$condicao_ped, "codparcped='$codparc[$i]'");

		}//FOR
		
		if ($pendfpg == 1){$pendfpgf = "NO";}else{$pendfpgf = "OK";}
		if ($dindim == 1){$statusped = "APROV";}else{$statusped = "AVAL";}


        $endentrega = "$enderecoentr;$numentr;$complementoentr;$cep;$bairroentr;$cidadeentr;$estadoentr;";
		// PESQUISAS DE RESTRICOES
		$prod->listProdU("asscontrato", "clientenovo", "codcliente=$codcliente");
		$asscontrato = $prod->showcampo0();
        #if ($asscontrato <> "S" and $tipo_vge == 0){$contrato = "DC";}else{$contrato= "NO";}
 		#if ($asscontrato == "S" and tipo_vge > 0){$contrato = "NO";}else{$contrato= "DC";}

		
    	// PESQUISA POR PRODUTOS QUE NAO POSSUEM PRODUTOS DE CELULAR
        $prod->clear();
        $prod->listProdU("COUNT(*)","pedidoprodtemp, produtos", "codped='$codpedselect' and produtos.codcat <> 46 and pedidoprodtemp.codprod=produtos.codprod ");
        $count_prod = $prod->showcampo0();
        $prod->clear();
        $prod->listProdU("vpp","pedidotemp", "codped='$codpedselect'");
        $vpp_ped = $prod->showcampo0();
        
        
        // APLICA RESTRICAO PARA DECLARACAO DE SOFTWARE
        #$declara = $modoinstall;
        $declara = "NO";
        //if ($num_cj > 0 and $count_soft == 0){$declara = "NO";}
        //if ($num_cj > 0 and $count_soft <> 0){$declara = "DD";}
        //if ($num_cj == 0){$declara = "DD";}
        
        #echo("de=$declara - $num_cj - $count_soft");

        // APLICACAO DAS RESTRICOES
        if ($asscontrato <> "S" and $tipo_vge == 0){$contrato = "DC";}else{$contrato= "NO";}
		#if ($count_prod == 0) {$contrato = "DC";} // LIBERA CONTRATO PARA TELEMIG CELULAR HALFELD
        #if ($codempselect == 9) {$contrato = "DC";} // LIBERA CONTRATO PARA TELEMIG CELULAR
		#if ($codvendselect == 95 or $codvendselect == 120 or $codvendselect == 108){$contrato = "DC";$libentr="OK";$statusped="APROV";}else{$libentr="NO";}
        #if ($vpp_ped > 100 and $dindim == 0 and $asscontrato == "S") {$contrato = "NO";} // EXIGE CONTRATO PARA VALORES
		$libentr="NO";
		$contrato = "DC";
		
  		// GRAVA DADOS NA TABELA PEDIDO
		$condicao_ped = "endentrega = '$endentrega', ";
		$condicao_ped .= "cepentr = '$cep', ";
		$condicao_ped .= "refentrega = '$refentr', ";
		$condicao_ped .= "obsentrega='$obsentr', ";
		$datapreventr = $aentr.$mentr.$dentr;
		$condicao_ped .= "dataprevent='$datapreventr', ";// DATAPREV ORIGINAL
		$condicao_ped .= "dataprevent_old='$datapreventr', ";// DATAPREV ANTIGA
		$condicao_ped .= "status = '$statusped', ";
		$condicao_ped .= "hist='0', ";
		$condicao_ped .= "obsmontagem = '$obsmont', ";
		$horaprevent = "$hprevm,$hprevt";
		$condicao_ped .= "horaprevent = '$horaprevent', ";
		$condicao_ped .= "obsfinanceiro = '$obsfin', ";
		$condicao_ped .= "libentr = '$libentr', "; 	// LIB. ENTREGA
		$condicao_ped .= "cb = 'NO', ";  		// COD BARRA
		$condicao_ped .= "nf = 'NO', ";			// NOTA FISCAL
		$condicao_ped .= "modoentr = '$modoentr', ";
		$condicao_ped .= "contrato = '$contrato', "; 	// CONTRATO
		$condicao_ped .= "fichaentr = 'NO', ";		// FICHA ENTREGA
		$condicao_ped .= "caixa = 'NO', ";		// CAIXA
		$condicao_ped .= "pendfpg = '$pendfpgf', ";	// PENDENCIA DE FORMA PG
		$condicao_ped .= "reavalfpg = 'NO', ";		// REAVALIACAO DO PEDIDO
		$condicao_ped .= "ckmlb = 'NO', ";		// COMISSAO PAGA
 		$condicao_ped .= "fat = 'NO', ";		// FAT - FATURAMENTO
  		$condicao_ped .= "cancel = 'NO', ";		// CANCEL - TOTAL
   		$condicao_ped .= "cancel_est = 'NO', "; 	// CANCEL - ESTOQUE
    	$condicao_ped .= "cancel_fin = 'NO', ";		// CANCEL - FINANCEIRO
    	$condicao_ped .= "cancel_fat = 'NO', ";		// CANCEL - FATURAMENTO
    	$condicao_ped .= "modped = 'NO', ";		// MODIFICAÇÃO - PEDIDO
    	$condicao_ped .= "fatorvista = '$fatorvista', ";// FATOR VENDA VISTA - PEDIDO
    	$condicao_ped .= "taxa = '$taxa', ";		// TAXA JUROS - PEDIDO
    	$condicao_ped .= "confirm_fpg = 'NO', ";	// CONFIRMACAO DA FORMA DE PAGAMENTO
		if ($aguarda_comp==0){$aguarda = 'OK';}else{$aguarda = 'NO';}
		$condicao_ped .= "aguard_comp = '$aguarda', ";	// AGUARDA COMPENSACAO DE PAGAMENTO
		$condicao_ped .= "bco_ac = '$banco_ap', ";	// BANCO AC
    	$condicao_ped .= "numch_ac = '$nunch_ap', ";	// NUMCH AC
    	$condicao_ped .= "c3_ac = '$c3_ap', ";		// C3 AC
    	$condicao_ped .= "cmc7 = '$Y_0', "; // CMC7 DO CHEQUE
		$md5 = $prod->geraMD5($string_md5);    		// GERA MD5 DAS PARCELAS
    	$condicao_ped .= "md5_parc = '$md5', ";
    	$condicao_ped .= "codvend_cm = '$codvend_cm_select', ";
    		if ($porc_cm > 100){$porc_cm = 100;}
		$condicao_ped .= "porc_cm = '$porc_cm', ";
		$condicao_ped .= "declara = '$declara', "; // DECLARAÇAO DE SOFTWARE
   		$condicao_ped .= "num_cj = '$num_micro', "; // NUMERO DE CONJUNTOS DO PEDIDO + KITS
		$condicao_ped .= "modelo_ped = 'RDST', "; // TIPO DE PEDIDO RDST = REVENDA DISTRIBUICAO
   		$condicao_ped .= "inicio_sep = 'OK' "; // INICIO DA SEPARACAO
   		

		$prod->upProdU("pedidotemp",$condicao_ped, "codped='$codpedselect'");

		// ENVIA PARA FINALIZAR PEDIDO
		if (dirname($_SERVER['PHP_SELF']) == "/"){$bar = "";}else{$bar = "/";}
		header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?pg=$pg&pg_ped=14&codpedselect=$codpedselect");

 	break;
	
	case "pesq_cep":
	
	$sc = new CEP();
	$res = $sc->busca($cep, $erro);
	
	// LISTA OS REGISTROS
	 for($l = 1; $l <= count($formapg); $l++ ){

		if ($formapg[$l] <> ""){
		$prod->listProdU("descricao","formapg", "opcaixa='$formapg[$l]'");
		$xdescricao[$l] = $prod->showcampo0();
 		}
	}// FOR

	break;
}

	// TEMPLATES
	include ("templates/ped_page_formapg_add.htm");

?>
