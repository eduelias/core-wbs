<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_page_cad_list_usuario.php
|  template:    start_cad_list_usuario.htm
+--------------------------------------------------------------
*/

// inicio da classe
$prod = new operacao();

$prod->clear();
$prod->listProdU("codemp, codvend, tipo, allemp, codsuper, list_cli","vendedor", "nome='$login'");
$codemp_padrao = $prod->showcampo0();
$codvend_padrao = $prod->showcampo1();
$tipovend_padrao = $prod->showcampo2();
$allemp = $prod->showcampo3();
$codsuper_padrao = $prod->showcampo4();
$list_cli_padrao = $prod->showcampo5();
		#echo "$login_vend - $list_cli_padrao";

if ($allemp == "N"){
	if ($codemp_padrao <> 0){$codemppesq = $codemp_padrao;}
}
if ($hist == ""){$hist = 0;}
$dataatual = $prod->gdata();

switch ($Action)
{
	case "pesquisa":
    $len = strlen($nomeclientepesq);
    $nomeclientepesq1 = strtolower($nomeclientepesq);

	if ($nomeclientepesq <> "" )
    {
		$condicao3 = " LCASE(nome) like '%$nomeclientepesq1%' ";
	}
	
	if ($tipocliente == 'F')
    {
        if ($cpf <> "")
        {
            if ($condicao3 <> ""){$condicao3 .=" AND ";}
            $condicao3 .= " cpf='$cpf' ";
        }
	}
    if ($tipocliente == 'J')
    {
        if ($cnpj <> "")
        {
            if ($condicao3 <> ""){$condicao3 .=" AND ";}
            $condicao3 .= " cnpj='$cnpj' ";
        }
    }

    //PESQUISA POR CODBARRA
	if ($codbarrapesq <> ""){

        if ($condicao3 <> ""){$condicao3 .= " AND ";}
		$condicao3 .= " codcliente = '$codbarrapesq' ";
	}

	// Meus Clientes
	if ($meusclientes == 'OK')
	{
        if ($condicao3 <> ""){$condicao3 .= " AND ";}
        $condicao3 .= "logincad = '$login'";
    }

    // BLOQUEIA PESQUISA DO HISTORICO
    if (($nomeclientepesq == "" OR $len <3) AND ($codbarrapesq == "") AND ($cpf == "" ) AND ($cnpj == "" ) AND ($meusclientes == ""))
	{
		$controle = 1;
  	}else{
  		$controle = 0;
  	}

	#echo("$condicao3 - $controle - $len - tipocliente = $tipocliente<BR>");

	if ($controle == 0){
        $prod->clear();
        $prod->listProdSum("codcliente, nome, cpf, cnpj, logincad, tipocliente, cidade, estado, email, cep, dddtel1, tel1, dddtel2, tel2, contatocomprador, nome_fantasia ", "clientenovo", $condicao3, $array2, $array_campo2, "ORDER BY codcliente, nome");

		for($k = 0; $k < count($array2); $k++ )
        {

    		$prod->mostraProd($array2, $array_campo2, $k);

    		$codcliente[$k] = $prod->showcampo0();
    		$nomecliente[$k] = $prod->showcampo1();
    		$cpf_cli[$k] = $prod->showcampo2();
    		$cnpj_cli[$k] = $prod->showcampo3();
    		$resp[$k] = $prod->showcampo4();
            
    		$tipoclientepesq[$k] = $prod->showcampo5();
			$cidade[$k] = $prod->showcampo6();
			$estado[$k] = $prod->showcampo7();
			$email[$k] = $prod->showcampo8();
			$cep[$k] = $prod->showcampo9();
			$dddtel1[$k] = $prod->showcampo10();
			$tel1[$k] = $prod->showcampo11();
			$dddtel2[$k] = $prod->showcampo12();
    		$tel2[$k] = $prod->showcampo13();
			$contatocomprador[$k] = $prod->showcampo14();
			$nome_fantasia[$k] = $prod->showcampo15();
			
    		#echo $codcliente[$k];
    		
    		#$contador[$k] = $prod->numdias($dataorc[$k],$dataatual);

     		#$prod->clear();
    		#$prod->listProdU("nome","vendedor", "codvend=$codvend");
    		#$nomevend[$k] = $prod->showcampo0();
			
	

		}//FOR
		
	}//CONTROLE
	break;
}

include("templates/cad_page_list_usuario.htm");

?>
