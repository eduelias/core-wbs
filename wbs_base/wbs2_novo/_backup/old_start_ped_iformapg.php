<?php

// WBS
// arquivo:		ped_icarrinho.php
// template:	ped_icarrinho.htm

require("../classprod.php");
$codemp = 1;
$login = "felipe";



// INICIO DA CLASSE
$prod = new operacao();


        $prod->listProd("empresa", "codemp=$codemp");
 	$descmax = $prod->showcampo18();
	$fatorvista = $prod->showcampo20();
	$taxa = $prod->showcampo21();
	$tac = $prod->showcampo22();
	$prod->clear();
	$prod->listProd("vendedor", "nome='$login'");
	$fatorcusto = $prod->showcampo6();
	
	$dataatual = $prod->gdata();


	// LISTA OS REGISTROS
	$prod->listProdSum("opcaixa, descricao", "formapg", "padraoped = 'S'", $arrayx, $array_campox, "ORDER BY  descricao");

		for($i = 0; $i < count($arrayx); $i++ ){

			$prod->mostraProd( $arrayx, $array_campox, $i );

			$opcaixa[$i] = $prod->showcampo0();
			$descricao[$i] = $prod->showcampo1();


		}//FOR




	// CALCULO DAS PARCELAS
	$ventrada = str_replace('.','',$ventrada);
	$ventrada = str_replace(',','.',$ventrada);
	$valortotal = str_replace('.','',$valortotal);
	$valortotal = str_replace(',','.',$valortotal);
	$valortotaltabela = $valortotal;
	$valortotaltabelavista = $valortotaltabela*$fatorvista;
	
	if ($nump >=6){
		$valorcustovista = ($valortotaltabelavista*$fatorcusto) + $tac;
	}else{
		$valorcustovista = ($valortotaltabelavista*$fatorcusto);
	}
	
		echo("vt=$valortotaltabela - $entrada - $simula");

	if ($simula == 1){
	
		if ($entrada == 1){
			$vparc = ($valortotaltabela - $ventrada)/($nump-1);
			$diaparc[1] = $diaent;
			$mesparc[1] = $mesent;
			$anoparc[1] = $anoent;
			$valor_parc[1] = $ventrada;
			$lx = 2;
		}else{
		        $vparc = ($valortotaltabela)/$nump;
		        $lx = 1;
		}

		for($op = $lx; $op <= $nump; $op++ ){
		
		if ($mespar > 12){$mespar=1;$anopar++;}
		if (strlen($mespar)==1){$mespar = '0'.$mespar;}

		 $diaparc[$op] = $diapar;
		 $mesparc[$op] = $mespar;
		 $anoparc[$op] = $anopar;
	         $valor_parc[$op] = $vparc;
	         
	         $mespar++;

     		echo("vp= $valor_parc[$op]");

		}//FOR
	}

	for($p = 1; $p <= $nump; $p++ ){
	
	$data_parc[$p] = $anoparc[$p].$mesparc[$p].$diaparc[$p];
	$difdias = $prod->numdias($dataatual,$data_parc[$p]);
	$n = ($difdias/30);
	$valor_parc_vista[$p] = $valor_parc[$p]*(pow((1+($taxa/100)),$n));

	$valorvendavista = $valorvendavista + $valor_parc_vista[$p] ;
	$valorvenda = $valorvenda + $valor_parc[$p];
	
	echo("v=$valor_parc[$p] - vp=$valor_parc_vista[$p] - df=$difdias - n=$n - data = $data_parc[$p]<br>");
	
	}//FOR
	
	echo("vvv= $valorvendavista");
	
	// CALCULO DO VALOR DE TABELA A VISTA
	if ($mentr == "MOTOBOY" and $valortotal <250){$valorvendavista = $valorvendavista - 5;}

 	$valorminimovenda = ($valortotaltabelavista - ($valortotaltabelavista*($descmax/100)));

	$impostodif = $valorvendavista - $valortotaltabelavista;
	if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

	// CALCULO DA COMISSAO
	
	

		// MARGEM DE LUCRO BRUTO
		$mlb = $valorvendavista - $valorcustovista - $impostodif;
		//MARGEM DE CONTRIBUICAO DE VENDA
		if ($nump > 0){
			$mcv = (1000*($mlb)/$valortotaltabelavista);
		}

echo("valortotaltabela = $valortotaltabela<br> valortotaltabelavista = $valortotaltabelavista <br> valorcustovista = $valorcustovista <br> valorvendavista $valorvendavista <br> impostodif = $impostodif <BR>");

	// TEMPLATE
	include ("templates/ped_iformapg.htm");

?>
