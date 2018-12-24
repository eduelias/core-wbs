<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
$datarma = $prod->fdata($dataatual);
	

// ACOES PRINCIPAIS DA PAGINA

echo("

<table border='0' width='100%' cellspacing='1' height='31'>
 <td width='100%' height='15' colspan = '6'><b><font face='Verdana' size='3'>RELATÓRIO DE
      DEVOLUCAO RMA - 2 - $datarma</font></b></td>
  </tr>

  <tr>
    <td width='14%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODOS</font></b></td>
    <td width='14%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODPED</font></b></td>
    <td width='30%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>PECA
      USADA</font></b></td>
    <td width='6%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>R$</font></b></td>
    <td width='30%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>PECA
      NOVA</font></b></td>
    <td width='6%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>R$</font></b></td>
  </tr>


");



		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("os_prod.codos, codprod, ppu, codcb, codpos_troca, tipo_estoque, codpos", "os_prod, os", "tipo_estoque = 'D' and os.codos=os_prod.codos and hist = 1 and os_prod.conf_cb <> 'OK'", $array, $array_campo, "ORDER BY codos");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codos = $prod->showcampo0();
			$codprod = $prod->showcampo1();
			$ppu = $prod->showcampo2();
			$codcb = $prod->showcampo3();
			$codpos_troca = $prod->showcampo4();
			$tipo_estoque = $prod->showcampo5();
			$codpos = $prod->showcampo6();
			$codbarra_ped = $prod->showcampo7();

			$prod->clear();
			$prod->listProdU("nomeprod","produtos", "codprod='$codprod'");
			$nomeprod = $prod->showcampo0();
			$prod->listProdU("codbarra","codbarra", "codcb='$codcb'");
			$codbarra = $prod->showcampo0();
			$prod->listProdU("codbarra_pedref, codbarra, codtipo_serv","os", "codos='$codos'");
			$codbarra_ped = $prod->showcampo0();
			$codbarra_os = $prod->showcampo1();
			$codtipo_serv = $prod->showcampo2();

			$prod->listProdU("tipo","os_tipo", "codtipo_serv='$codtipo_serv'");
			$tipo = $prod->showcampo0();
			
			
			
			// PRODUTO NOVO
			$prod->clear();
			$prod->listProdU("codos, codprod, ppu, codcb, codpos_troca, tipo_estoque, codpos","os_prod", "codpos=$codpos_troca");
			$codos_n = $prod->showcampo0();
			$codprod_n = $prod->showcampo1();
			$ppu_n = $prod->showcampo2();
			$codcb_n = $prod->showcampo3();
			$codpos_troca_n = $prod->showcampo4();
			$tipo_estoque_n = $prod->showcampo5();
			$codpos_n = $prod->showcampo6();

			$prod->listProdU("nomeprod","produtos", "codprod='$codprod_n'");
			$nomeprod_n = $prod->showcampo0();
			$prod->listProdU("codbarra","codbarra", "codcb='$codcb_n'");
			$codbarra_n = $prod->showcampo0();


			if ($tipo_estoque == 'D'){$valor_d = $valor_d + $ppu_n;}

			
				$dataatual = $prod->gdata();

			#echo("$codos - $codpos - $codprod - $nomeprod - $codbarra - $tipo_estoque - $codpos_troca<br>");
			
			echo("
			 <tr>
    <td width='14%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$codbarra_os</b><br>$tipo</font></td>
    <td width='14%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$codbarra_ped</font></b></td>
    <td width='30%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#800000'>$codprod - $nomeprod<b><br>
      $codbarra</b></font></td>
    <td width='6%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#000000'>$ppu</font></td>
    <td width='30%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' >$codprod_n - $nomeprod_n<b><br>
      $codbarra_n</b></font></td>
    <td width='6%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#800000' >$ppu_n</font></td>
  </tr>

");

		


if ($grava == 1){
		//ATUALIZA BANCO CODBARRA

		// INSERE CODBARRA NA TABELA CODBARRA
		$prod->clear();
		$prod->listProd("codbarra", "codcb = $codcb");
		$prod->setcampo4(-2000);
		$prod->setcampo5(0);
		$prod->setcampo6(0);
		$prod->setcampo7(1);
		$prod->setcampo8(1);  // EMPRESA PRODUCAO
		$prod->upProd("codbarra", "codcb='$codcb'");
	

		// ATUALIZA OS, OS_PROD
		$prod->clear();
		$prod->listProd("os_prod", "codpos = $codpos");
		$prod->setcampo15("OK");
		$prod->upProd("os_prod", "codpos='$codpos'");

	#echo("codos = $codos");

		// ATUALIZA OS, OS_PROD
		$prod->clear();
		$prod->listProd("os", "codos = '$codos'");
		$prod->setcampo52("OK");
		$prod->upProd("os", "codos='$codos'");
			

}


		}//FOR

		$valor_d = $valor_d*0.9*0.91981; // VALORES A VISTA



		$dataatual = $prod->gdata();

if ($grava == 1){


		//ATUALIZA CONTA CORRENTE
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1(205);  //
		$prod->setcampo2("00.04");
		$prod->setcampo3("Crédito Ref. Devolução Produtos Garantia");
		if ($valor_d >= 0){
				$valorpf = abs($valor_d);
				$prod->setcampo4($valorpf);
			}else{
				$valorpf = abs($valor_d);
				$prod->setcampo5($valorpf);
			}
		$prod->setcampo6($dataatual);
		$prod->setcampo7($dataatual);
		$prod->setcampo8("N");
		$prod->setcampo11("");
		$prod->setcampo12("Relatorio Devolucao Rma - 1");
		$prod->setcampo13("felipe");
		

		$prod->addProd("fin_bcomov", $uregbcomov);

		$gravacao = 1;

}

echo("

 <tr>
    <td width='14%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>OS TOTAL = $i</font></td>
   
    <td width='14%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>
     </font></td>
	 <td width='30%' height='8' bgcolor='#EBEBEB'>$gravacao</td>
    <td width='6%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1' color='#FF0000'></font></td>
    <td width='30%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='3' color='#FF0000'>TOTAL CREDITO</font></b></td>
    <td width='6%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='3' color='#FF0000'><b>$valor_d</B></font></td>
  </tr>

");

