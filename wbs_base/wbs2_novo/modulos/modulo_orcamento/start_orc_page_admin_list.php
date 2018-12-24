<?php

// WBS
// arquivo:	start_orc_page_admin_list.php
// template:	orc_page_admin_list.htm

// inicio da classe
$prod = new operacao();


$prod->clear();
$prod->listProdU("codemp, codvend, tipo, allemp, codsuper, list_cli, codgrp","vendedor", "nome='$login'");
$codemp_padrao = $prod->showcampo0();
$codvend_padrao = $prod->showcampo1();
$tipovend_padrao = $prod->showcampo2();
$allemp = $prod->showcampo3();
$codsuper_padrao = $prod->showcampo4();
$list_cli_padrao = $prod->showcampo5();
$var_codgrp = $prod->showcampo6();

if ($allemp == "N"){
	if ($codemp_padrao <> 0){$codemppesq = $codemp_padrao;}
}
if ($hist == ""){$hist = 0;}
$dataatual = $prod->gdata();

// GRAVA ORCAMENTO PARA O HISTORICO
if ($gravar == 1){

	for($i = 0; $i < $cont; $i++ ){

			if ($ckorc[$i] <> ""){

			$prod->upProdU("orc", "hist = 1, status ='HISTORICO'","codped=$ckorc[$i]");
			// INSERE STATUS AVAL
		        $prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($ckorc[$i]);
			$prod->setcampo2($dataatual);
			$prod->setcampo3("HISTORICO");
			$prod->addProd("orcstatus", $uregstatus);

					#echo("gravar= $ckgmsg[$i]");
			}
	}


}

switch ($Action)
{
	case "pesquisa":


	//PESQUISA DA PÁGINA

	$nomeclientepesq1 = strtolower($nomeclientepesq);
	$nomevendpesq1 = strtolower($nomevendpesq);
	$telpesq = $dddtel.$tel;
        /*
	if ($codsuper_padrao <> 0){
	// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
	$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvend_padrao", $array98, $array_campo98, "" );

	// GERENTE
	$condicao4 .= " ( ";

	 // SUPERVISORES
	 for($k = 0; $k < count($array98); $k++ ){
		$prod->mostraProd( $array98, $array_campo98, $k );
		$codvend_sub = $prod->showcampo0();

        if ()
        $condicao4 .= " orc.codvend=$codvend_sub or ";

            // USUARIOS
		$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvend_sub", $array99, $array_campo99, "" );
		 for($t = 0; $t < count($array99); $t++ ){
			$prod->mostraProd( $array99, $array_campo99, $t );
			$codvend_sub = $prod->showcampo0();
			$condicao4 .= " orc.codvend=$codvend_sub or ";
		 }
	 }
			$condicao4 .= " orc.codvend=$codvend_padrao ) and ";
	}else{

	$condicao4 = "";

	}
    echo("$condicao4");
    $condicao3 = $condicao4;
    */
	$len = strlen($nomeclientepesq);
	$len1 = strlen($nomevendpesq);

	if ($nomeclientepesq <> "" ){

		$condicao3 .= " LCASE(nomecliente) like '%$nomeclientepesq1%' AND";

	}

	if ($nomevendpesq <> "" ){

		$condicao3 .= " LCASE(vendedor.nome) like '$nomevendpesq1' AND ";
	}

	if ($telpesq <> ""){

		$condicao3 .= " orc.tel = '$telpesq' AND";
	}
	
	//PESQUISA POR CODBARRA
	if ($codbarrapesq){

		$condicao3 .= " orc.codbarra='$codbarrapesq' AND";
	}
	
		$condicao3 .= " orc.codemp='$codemppesq'";
		$condicao3 .= " and orc.hist = '$hist'  ";
		$condicao3 .= " and orc.new_orc= 'OK' ";
		$condicao3 .= " and orc.codvend=vendedor.codvend ";

        // BLOQUEIA PESQUISA DO HISTORICO
        if (($nomeclientepesq == "" OR $len <3) AND ($nomevendpesq == "" OR $len1 <3 ) AND ($telpesq == "" )AND ($codbarrapesq == ""))
	{
		$controle = 1;
  	}else{
  		$controle = 0;
  	}
	
	#echo("$condicao3 - $controle - $len");

	if ( $controle == 0){
	

	$prod->listProdSum("tel", "orc, vendedor", $condicao3, $array, $array_campo, "GROUP BY tel ORDER by dataped DESC");

	for($i = 0; $i < count($array); $i++ ){

		$prod->mostraProd( $array, $array_campo, $i );
		$tel_orc[$i] = $prod->showcampo0();
		
 		$prod->listProdSum("codped, orc.codvend, vt, dataped, status, validade, codbarra, nomecliente, emailenv", "orc, vendedor", "orc.tel = '$tel_orc[$i]' AND " . $condicao3, $array2, $array_campo2, "ORDER by  dataped, codbarra , nomecliente");
		

		for($k = 0; $k < count($array2); $k++ ){

		$prod->mostraProd( $array2, $array_campo2, $k );

		$codorc[$i][$k] = $prod->showcampo0();
		$codvend_orc[$i][$k] = $prod->showcampo1();
		$vt[$i][$k] = $prod->showcampo2();
		$dataorc[$i][$k] = $prod->showcampo3();
		$status[$i][$k] = $prod->showcampo4();
		$validade[$i][$k] = $prod->showcampo5();
		$codbarra[$i][$k]= $prod->showcampo6();
		$nomecliente[$i][$k] = $prod->showcampo7();
		$emailenv[$i][$k] = $prod->showcampo8();
		
		$contador[$i][$k] = $prod->numdias($dataorc[$i][$k],$dataatual);
		$dataorc[$i][$k] = $prod->fdata($dataorc[$i][$k]);
		$liberar_orc[$i][$k] = 0;

    	$codvend_orc1 = $prod->showcampo1();
		
 		$prod->clear();
		$prod->listProdU("nome","vendedor", "codvend=$codvend_orc1");
		$nomevend[$i][$k] = $prod->showcampo0();
		
		
		//LIBERAR ORCAMENTO PARA SUPERVISOR
		if ($codsuper_padrao <> 0){
    	// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
    	$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvend_padrao", $array98, $array_campo98, "" );

    	   // GERENTE
    	   $condicao4 .= " ( ";

   	       // SUPERVISORES
           	 for($k6 = 0; $k6 < count($array98); $k6++ ){
  	         $prod->mostraProd( $array98, $array_campo98, $k6 );
             $codvend_sub = $prod->showcampo0();

                if ($codvend_sub == $codvend_orc1){$liberar_orc[$i][$k] = 1;}
       

                // USUARIOS
        		$prod->listProdSum("codvend", "relacaohierarquia", "codsuper = $codvend_sub", $array99, $array_campo99, "" );
        		 for($t = 0; $t < count($array99); $t++ ){
        			$prod->mostraProd( $array99, $array_campo99, $t );
        			$codvend_sub = $prod->showcampo0();
                    if ($codvend_sub == $codvend_orc1){$liberar_orc[$i][$k] = 1;}

        		 }//FOR
	       }//FOR
            if ($codvend_padrao == $codvend_orc1){$liberar_orc[$i][$k] = 1;}
           
	   }else{

        $liberar_orc[$i][$k] = 1;

       }
	

		}//FOR
		$sub_array[$i] = $k;

	}//FOR
		
	}//CONTROLE
	
	

	
}
	// LISTA DE EMPRESAS
	$prod->listProdSum("codemp,nome", "empresa", "nome <> ''", $arrayx, $array_campox, "ORDER BY  nome");

	for($i = 0; $i < count($arrayx); $i++ ){

	$prod->mostraProd( $arrayx, $array_campox, $i );
	$codemp[$i] = $prod->showcampo0();
	$nomeemp[$i] = $prod->showcampo1();

	}//FOR
	
	// NOME DA EMPRESA SELECIONADA
	$prod->clear();
	$prod->listProdU("nome","empresa", "codemp='$codemppesq'");
	$nomeempselect = $prod->showcampo0();

include ("sif-topo.php");
// Chama a Template
include ("templates/orc_page_admin_list.htm");
include ("sif-rodape.php");
?>
