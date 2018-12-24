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

switch ($Action)
{

	case "pesquisa":
	
  		$prod->clear();
		#$prod->listProdSum("codped, codbarra, nome, cpf, cnpj, tipocliente, dataped", "pedido, clientenovo", "codvend = '$codvend_select' and pedido.codcliente=clientenovo.codcliente and dataped > '$aini-$mini-$dini' and dataped < '$afim-$mfim-$dfim' and cancel <>'OK'", $array2, $array2_campo, "ORDER BY codped");
		$prod->listProdSum("pedido.codped, codvend, codcliente, codcb, dataped, codplano, qtde, pedidoprod.codprod", "pedido, pedidoprod, produtos", "pedido.codped=pedidoprod.codped and pedidoprod.codprod = produtos.codprod and dataped like '$aini-$mini%' and cancel <>'OK'  and (codplano <> 0 and codplano <> 7) and codcat = 46", $array2, $array2_campo, "ORDER BY pedidoprod.codprod");
		
		
		for($i = 0; $i < count($array2); $i++ ){
			$prod->mostraProd( $array2, $array2_campo, $i );

			$codped_rel[$i] = $prod->showcampo0();
			$codvend_rel[$i] = $prod->showcampo1();
			$codcliente_rel[$i] = $prod->showcampo2();
			$codcb_rel[$i] = $prod->showcampo3();
    		$dataped_rel[$i] = $prod->showcampo4();
			$codplano_rel[$i] = $prod->showcampo5();
			$qtde_rel[$i] = $prod->showcampo6();
			$codprod_rel[$i] = $prod->showcampo7();
			
			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='".$codvend_rel[$i]."' ");
            $nomevend_rel[$i] = $prod->showcampo0();

			$prod->clear();			
			$prod->listProdU("nome, if (tipocliente = 'F', cpf, cnpj) ", "clientenovo", "codcliente='".$codcliente_rel[$i]."' ");
            $nomecli_rel[$i] = $prod->showcampo0();
            $doc_rel[$i] = $prod->showcampo1();

			$prod->clear();            
    		$prod->listProdU("plano", "produtos_planos", "codplano='".$codplano_rel[$i]."'");
            $nomeplano_rel[$i] = $prod->showcampo0();

			$prod->clear();
            $prod->listProdU("nomeprod", "produtos", "codprod='".$codprod_rel[$i]."'");
            $nomeprod_rel[$i] = $prod->showcampo0();
    		
    		    		   		
    
			
        }//FOR
		
       
		break;
}










 #include("topo.php");

		     include("templates/relatorio_page_celular_telemig.htm");

		       	#include("rodape.php");


?>
