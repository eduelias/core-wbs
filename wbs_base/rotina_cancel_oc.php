<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

		$codempselect = 8; // LOJA INHELP COMERCIAL
		
		$prod->listProdU("COUNT(*)","ocprod", "codoc='$codoc' and cb = 'OK'");
		$control = $prod->showcampo0();

if ($control == 0){

		// DELETE OC
		$prod->delProd("oc", "codoc=$codoc");

		// DELETE PRODUTO DA OC
		$prod->delProd("ocprod", "codoc=$codoc");
		
echo("OC CANCELADA !");
		
}else{


echo("OC JA POSSUI PRODUTOS COM CODBARRAS INSERIDOS : $control");

}



