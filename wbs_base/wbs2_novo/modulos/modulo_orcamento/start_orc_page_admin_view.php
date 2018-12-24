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
|  arquivo:     start_orc_page_admin_view.php
|  template:    orc_page_admin_view.htm
+--------------------------------------------------------------
*/

// inicio da classe
$prod = new operacao();

// SELECIONA PAGINA PARA REDIRECIONAMENTO
$prod->clear();
$prod->listProdU("codpg","seguranca", "arquivo='start_ped_index.php'");
$pg_sel = $prod->showcampo0();

#echo("pgsel = $pg_sel");

$prod->clear();
$prod->listProdU("orc.codemp, orc.codvend, tipo, fatorusertabela, vendedor.nome, orc.nomecliente, orc.tel, orc.email, orc.dataped, orc.condicaopg, orc.garantia, orc.impostos, orc.validade, orc.pentrega, orc.frete, orc.obs, orc.codbarra, papel_rec, orc.obsorcamento","orc, vendedor", "codped='$codorcselect' AND orc.codvend = vendedor.codvend ");
$codempselect = $prod->showcampo0();
$codvendselect = $prod->showcampo1();;
$tipovend = $prod->showcampo2();
$fatorusertabela = $prod->showcampo3();
$nomevendedor = $prod->showcampo4();
$nomecliente = $prod->showcampo5();
$telcliente = $prod->showcampo6();
$mailcliente = $prod->showcampo7();
$dataproposta = $prod->showcampo8();
$dataproposta = $prod->fdata($dataproposta);
$simulacao = $prod->showcampo9();
$simulacao = html_entity_decode($simulacao);
$garantia = $prod->showcampo10();
$impostos = $prod->showcampo11();
$validadeproposta = $prod->showcampo12();
$prazoentrega = $prod->showcampo13();
$frete = $prod->showcampo14();
$obs = $prod->showcampo15();
$codbarra = $prod->showcampo16();
$papel_rec = $prod->showcampo17();
$obsorcamento_show = $prod->showcampo18();

$prod->clear();
$prod->listProdU("tipocliente, tipo, doc", "vendedor", "codvend='$codvendselect'");
	$tipocliente = $prod->showcampo0();
	$tipo = $prod->showcampo1();
	$doc = $prod->showcampo2();

	if ($tipocliente == "F")
	{
		$condicao78 = "cpf='$doc'";
	} else {
		$condicao78 = "cnpj='$doc'";
	}

// MOSTRA DADOS DO CLIENTE - INICIO
$prod->clear();
$prod->listProdU("nome, email", "clientenovo", $condicao78);
$nomevendedorcompleto = $prod->showcampo0();
$mailvendedor = $prod->showcampo1();

if ($codorcselect <> "")
{
	// Rotina Default
	$prod->listProdSum("orcprod.codprod, produtos.nomeprod, orcprod.qtde, ppu * orcprod.qtde AS pput, codprodcj, tipoprod, tipocj, descres, fator_micro, garext_12, garext_24", "orcprod, produtos", " codped = '$codorcselect' AND orcprod.codprod = produtos.codprod ", $arrayx, $array_campox, " ORDER BY tipoprod, tipocj, ordem , nomeprod");

	for ($i = 0; $i < count($arrayx); $i++)
	{
		$prod->mostraProd($arrayx, $array_campox, $i);
		
		// Dados
		$codprod[$i] = $prod->showcampo0();
		$nomeprod[$i] = $prod->showcampo1();
		$qtde[$i] = $prod->showcampo2();
		$pput[$i] = $prod->showcampo3();
		$codprodcj[$i] = $prod->showcampo4();
		$tipoprod[$i] = $prod->showcampo5();
		$tipocj[$i] = $prod->showcampo6();
		$descres[$i] = $prod->showcampo7();
		$fator_micro = $prod->showcampo8();
    	$garext_12[$i] = $prod->showcampo9();
    	$garext_24[$i] = $prod->showcampo10();
		
		$pput[$i] = $pput[$i] * $fator_micro;
		
		//FORMATADO
		$pputf[$i] =  $prod->fpreco($pput[$i]);
			
		$prod->listProdU("nomeprod", "produtos", "codprod = $codprodcj[$i]");
		$nomeprodcj[$i] = $prod->showcampo0();
		
        if (($garext_12[$i]=="OK" or $garext_24[$i]=="OK") and  $tipoprod[$i] == "CJ"){$estrela[$i] = 1;}else{$estrela[$i] = 0;}
	
	}//FOR
	

	$prod->listProdSum("tipocj, SUM(qtde*ppu*fator_micro) as subtotal, qtde, SUM(qtde*ppu) as subtotal_tabela", "orcprod", "codped = '$codorcselect'", $array1, $array_campo1, "GROUP BY tipocj ORDER BY tipoprod, tipocj");

	for ($j = 0; $j < count($array1); $j++)
	{
		$prod->mostraProd($array1, $array_campo1, $j);
		$tipocj_soma = $prod->showcampo0();
		$subtotal[$tipocj_soma] = $prod->showcampo1();
		$qtdetotal[$tipocj_soma] = $prod->showcampo2();
		$subtotal_tabela[$tipocj_soma] = $prod->showcampo3();
		
		// FORMATADO
		$subtotalf[$tipocj_soma] =  $prod->fpreco($subtotal[$tipocj_soma]);
		
		$total =  $total + $subtotal[$tipocj_soma];
		$total_tabela =  $total_tabela + $subtotal_tabela[$tipocj_soma];
	}//FOR


// CALCULO DO PRECO REAL
$prod->clear();
$prod->listProdSum("tipoprod, orcprod.qtde, (pvacj*fatorata*$fatorusertabela), (pva*fatorata*$fatorusertabela), (pvvcj*fatorvar*$fatorusertabela),(pvv*fatorvar*$fatorusertabela)", "orcprod, produtos, estoque", "codped = '$codorcselect' AND orcprod.codprod=produtos.codprod AND produtos.codprod=estoque.codprod and estoque.codemp='$codempselect'", $array2, $array_campo2, "");

for ($j = 0; $j < count($array2); $j++)
{
	$prod->mostraProd($array2, $array_campo2, $j);
	$tipoprod_real = $prod->showcampo0();
	$qtde_real = $prod->showcampo1();
	$pvacj_real = $prod->showcampo2();
	$pva_real = $prod->showcampo3();
	$pvvcj_real = $prod->showcampo4();
	$pvv_real = $prod->showcampo5();

	if ($tipovend == "A"){
	        if ($tipoprod_real == "CJ"){$preco_real = $pvacj_real;}else{$preco_real = $pva_real;}
	}else{
	 	if ($tipoprod_real == "CJ"){$preco_real = $pvvcj_real;}else{$preco_real = $pvv_real;}
 	}

 	$preco_real = $preco_real* $qtde_real;
  	$total_tabela_real =  $total_tabela_real + $preco_real;

}//FOR

	// FORMATADO
	$totalf =  $prod->fpreco($total);
	$total_tabelaf =  $prod->fpreco($total_tabela);
	$total_tabela_realf =  $prod->fpreco($total_tabela_real);
	
	
	// LISTAR STATUS
	$prod->clear();
	$prod->listProdSum("datastatus, statusped", "orcstatus", "codped = '$codorcselect'", $array8, $array_campo8, "ORDER BY  codpstatus");

	for ($s = 0; $s < count($array8); $s++)
	{
		$prod->mostraProd($array8, $array_campo8, $s);
		$statusdata[$s] = $prod->showcampo0();
		$statusdata[$s] = $prod->fdata($statusdata[$s]);
		$statusstatus[$s] = $prod->showcampo1();
	}//FOR
	
}

// Endereço Empresa Vendedor
$prod->clear();
$prod->listProdU("tipocliente, doc, tipo, codemp", "vendedor", "codvend = '$codvendselect'");
$tipodocvend = $prod->showcampo0();
$docvend = $prod->showcampo1();
$vendtipo = $prod->showcampo2();
$codemp_orc = $prod->showcampo3();

if ($vendtipo == "R")
{
    #echo "codvendselect: $codvendselect - tipodocvend: $tipodocvend - docvend: $docvend<br>";

    if ($tipodocvend == "F")
    {
        $consulta1 = "tipocliente = 'F' AND cpf = '$docvend'";
    }
    else
    {
        $consulta1 = "tipocliente = 'J' AND cnpj = '$docvend'";
    }

    #echo "$consulta1<br>";

    $prod->clear();
    $prod->listProdU("endereco, numero, complemento, bairro, cidade, cep, estado, dddtel1, tel1, ramal", "clientenovo", $consulta1);
    $ddemp_end = $prod->showcampo0();
    $ddemp_n = $prod->showcampo1();
    $ddemp_comp = $prod->showcampo2();
    $ddemp_bairro = $prod->showcampo3();
    $ddemp_cidade = $prod->showcampo4();
    $ddemp_cep = $prod->showcampo5();
    $ddemp_estado = $prod->showcampo6();
    $ddemp_ddd = $prod->showcampo7();
    $ddemp_tel = $prod->showcampo8();
    $ddemp_ramal = $prod->showcampo9();
}
else
{
	$prod->listProdU("endereco, bairro, cidade, cep, estado,  tel1 ", "empresa", "codemp=$codemp_orc");
    $ddemp_end = $prod->showcampo0();
    $ddemp_n = "";
    $ddemp_comp = "";
    $ddemp_bairro = $prod->showcampo1();
    $ddemp_cidade = $prod->showcampo2();
    $ddemp_cep = $prod->showcampo3();
    $ddemp_estado = $prod->showcampo4();
    $ddemp_ddd = "";
    $ddemp_tel = $prod->showcampo5();
    $ddemp_ramal = "";
	
    /*if ($codemp_orc == 1){
    
    $ddemp_end = "Av. Independência";
    $ddemp_n = "990";
    $ddemp_comp = "";
    $ddemp_bairro = "Centro";
    $ddemp_cidade = "Juiz de Fora";
    $ddemp_cep = "36010-021";
    $ddemp_estado = "MG";
    $ddemp_ddd = "32";
    $ddemp_tel = "2101-5900";
    $ddemp_ramal = "";
    }
    */
}


/* bloqueio */
#if($codvend <> $codvendselect) { $Action = "BloqueioView"; }
#echo "acao=".$Action;
#echo "$codvend - $codvendselect";
switch ($Action)
{
	case "print" :
		include ("templates/orc_page_admin_print.htm");
		break;
    case "modifica" :
        if (dirname($_SERVER['PHP_SELF']) == "/") {$bar = "";} else {$bar = "/";}
        header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). $bar . "restrito.php?Action=orc_modifica&codorcselect=$codorcselect&pg=$pg_sel&pg_ped=18&atual_val=$atual_val&modped=$modped&orcalt=$orcalt");
        exit;
		break;
    case "mail" :
        include ("start_orc_page_mail_mensagem.php");
        include ("start_orc_page_mail.php");
        include ("templates/orc_page_admin_view.htm");
        break;
    case "acomp_orc" :
        $prod->clear();
        $prod->upProdU("orc", " obsorcamento = '$obsorcamento'", "codped = '$codorcselect'");
        //echo "$obsorcamento_show - obsorcamento = $obsorcamento - codped = $codorcselect<BR>";
        include ("templates/orc_page_admin_view.htm");
        break;
    case "BloqueioView" :
    	//include ("templates/orc_page_bloqueio.htm");
    	break;
	default :
		echo "AQUI32";
		include ("templates/orc_page_admin_view.htm");
        break;
}

?>