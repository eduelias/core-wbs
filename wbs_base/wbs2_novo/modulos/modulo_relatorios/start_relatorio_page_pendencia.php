<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN


// Busca codvend
$prod->listProdU("codvend, allemp, codemp", "vendedor", "nome = '$login'");
$var_codvend = $prod->showcampo0();
$var_allemp = $prod->showcampo1();

if ($var_allemp <> 'Y'){
	$var_codemp = $prod->showcampo2();
}

$dataatual = $prod->gdata();

switch ($Action)
{

	case "pesquisa":
	
        if ($status_select <> ""){$condicao0 = " pedido.status = '$status_select' and ";}
        if ($aini <> "" and $mini <> "" and $dini <> "" and $afim <>"" and $mfim<>"" and $dfim<>""){$condicao1 = " dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim' and "; }
        if ($cadnpg == 1){$condicao2 = " caixa = 'OK' and ";}else{$condicao2 = "  ";}
        if ($cadnpg2 == 1){$condicao2 = " caixa = 'NO' and ";}else{$condicao2 = "  ";}
        if ($ordvend == 1){$condicao3 = " ORDER BY pedido.codvend ";}else{$condicao3 = " ORDER BY pedido.codped ";}
        #if ($codemp_select <> ""){$condicao4 = " pedido.codemp = '$codemp_select' and ";}
        if ($codproj_select <> ""){$condicao4 = " vendedor.codproj='$codproj_select' and ";}
	
	#echo"$condicao0 - $condicao1 - $condicao2 - $condicao3 - $condicao4";
	
  		$prod->clear();
		$prod->listProdSum("codped, codbarra, pedido.codvend, dataped, status, contrato , libentr,  fat, caixa, codcliente, vpp, pedido.codemp", "pedido, vendedor", $condicao0 . $condicao1 . $condicao2 . $condicao4 ."hist <> 1  and cancel <> 'OK' and pedido.codemp <> 0 and pedido.codvend=vendedor.codvend", $array2, $array2_campo, $condicao3);
		for($i = 0; $i < count($array2); $i++ ){
			$prod->mostraProd( $array2, $array2_campo, $i );

			$codped_rel[$i] = $prod->showcampo0();
			$codbarra_rel[$i] = $prod->showcampo1();
			$codvend_rel[$i] = $prod->showcampo2();
   			$dataped_rel[$i] = $prod->showcampo3();
   			$status_rel[$i] = $prod->showcampo4();
   			$contrato_rel[$i] = $prod->showcampo5();
   			$libentr_rel[$i] = $prod->showcampo6();
   			$fat_rel[$i] = $prod->showcampo7();
   			$caixa_rel[$i] = $prod->showcampo8();
   			$codcliente_rel[$i] = $prod->showcampo9();
   			$vpp_rel[$i] = $prod->showcampo10();
            $codemp_rel[$i] = $prod->showcampo11();
   			
            $prod->clear();
            $prod->listProdU("nome", "clientenovo", "codcliente='$codcliente_rel[$i]'");
            $nomecli_rel[$i] = $prod->showcampo0();
            
      		// Busca codvend
      		$prod->clear();
            $prod->listProdU("nome", "vendedor", "codvend = '$codvend_rel[$i]'");
            $nomevend_rel[$i] = $prod->showcampo0();
            
            // Busca codvend
      		$prod->clear();
            $prod->listProdU("nome", "empresa", "codemp = '$codemp_rel[$i]'");
            $nomeemp_rel[$i] = $prod->showcampo0();
           
            $vtotal = $vtotal + $vpp_rel[$i];
            
            
			$cont_rel[$i] = $prod->numdias($dataped_rel[$i], $dataatual);
			
        }//FOR


		// Busca codvend
		$prod->clear();
        $prod->listProdU("nome", "vendedor", "codvend = '$codvend_select'");
        $nomevend_select = $prod->showcampo0();
        
        	// Busca codvend
       	$prod->clear();
        $prod->listProdU("nomeproj", "projeto_nome", "codproj = '$codproj_select'");
        $nomeproj_select = $prod->showcampo0();

		break;
}
/*
$prod->listProdSum("codvend, nome", "vendedor", "block <> 'Y' ", $array_pesq, $array_campo_pesq, "ORDER BY nome");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codvend_pesq[$i] = $prod->showcampo0();
	$nomevend_pesq[$i] = $prod->showcampo1();
	
}

$prod->listProdSum("codemp, nome", "empresa", "", $array_pesq1, $array_campo_pesq1, "ORDER BY nome");
for ($i = 0; $i < count($array_pesq1); $i++ )
{
	$prod->mostraProd( $array_pesq1, $array_campo_pesq1, $i );

	$codemp_pesq[$i] = $prod->showcampo0();
	$nomeemp_pesq[$i] = $prod->showcampo1();

}
*/
$prod->listProdSum("codproj, nomeproj", "projeto_nome", "", $array_pesq1, $array_campo_pesq1, "ORDER BY nomeproj");
for ($i = 0; $i < count($array_pesq1); $i++ )
{
	$prod->mostraProd( $array_pesq1, $array_campo_pesq1, $i );

	$codproj_pesq[$i] = $prod->showcampo0();
	$nomeproj_pesq[$i] = $prod->showcampo1();

}


 #include("topo.php");

		     include("templates/relatorio_page_pendencia.htm");

		       	#include("rodape.php");


?>
