<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_relatorio_premiacao_vendas.php
|  template:    relatorio_premiacao_vendas.html
+--------------------------------------------------------------
*/



$db->connect_data();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

//$db->conn->debug = true;

if(isset($_POST['selectmes']))
{
	$mes_selecionado = $_POST['selectmes'];
}
else
{
	$messs = date("m");
	$mes_selecionado = $messs;
	//$mes_selecionado = "jun";
}

switch($mes_selecionado)
{
	case "01":
	    $echo_mes = "JANEIRO";
		$num_mes = "01";
		$mes_selecionado = "jan";
		break;
	case "02":
	    $echo_mes = "FEVEREIRO";
		$num_mes = "02";
		$mes_selecionado = "fev";
		break;
	case "03":
	    $echo_mes = "MARÇO";
		$num_mes = "03";
		$mes_selecionado = "mar";
		break;
	case "04":
	    $echo_mes = "ABRIL";
		$num_mes = "04";
		$mes_selecionado = "abr";
		break;
	case "05":
	    $echo_mes = "MAIO";
		$num_mes = "05";
		$mes_selecionado = "mai";
		break;
	case "06":
	    $echo_mes = "JUNHO";
		$num_mes = "06";
		$mes_selecionado = "jun";
		break;
	case "07":
	    $echo_mes = "JULHO";
		$num_mes = "07";
		$mes_selecionado = "jul";
		break;
	case "08":
	    $echo_mes = "AGOSTO";
		$num_mes = "08";
		$mes_selecionado = "ago";
		break;
	case "09":
	    $echo_mes = "SETEMBRO";
		$num_mes = "09";
		$mes_selecionado = "set";
		break;
	case "10":
	    $echo_mes = "OUTUBRO";
		$num_mes = "10";
		$mes_selecionado = "out";
		break;
	case "11":
	    $echo_mes = "NOVEMBRO";
		$num_mes = "11";
		$mes_selecionado = "nov";
		break;
	case "12":
	    $echo_mes = "DEZEMBRO";
		$num_mes = "12";
		$mes_selecionado = "dez";
		break;
}

// USAR BANCO DE DADOS SIF_BASE
//$rs_001 = $db->query_db("USE sif_base","SQL_NONE","N");

// USAR BANCO DE DADOS SIF_DATAWARE
//$rs_002 = $db->query_db("USE sif_dataware","SQL_NONE","N");



if ($tipo == 'R') {$cond = "tipovend = 'R'";}else{$cond = "tipovend != 'R'";}

#echo "TIPO = $tipo - $cond";
#$db->conn->debug = true;
// PRODUTO
$rs_produto = $db->query_db("SELECT titulo, img FROM produtos_premiacao WHERE mes = '$num_mes' and ano = '$ano_hoje'","SQL_NONE","N");
$rs_produtof = $db->query_db("SELECT titulo, img FROM produtos_premiacao WHERE ano = '$ano_hoje' and p_final = 'S'","SQL_NONE","N");

// RANKING MES
$rs_lista = $db->query_db("SELECT nome, `$mes_selecionado` as mes FROM controle_ped_pontos where ano = '$ano_hoje' and ".$cond." and `$mes_selecionado` <> 0 ORDER BY mes DESC LIMIT 0,10","SQL_NONE","N");


// RANKING ACUMULADO
$rs_lista2 = $db->query_db("SELECT nome FROM controle_ped_pontos WHERE ano = '$ano_hoje' and ".$cond." ORDER by acum DESC LIMIT 0,10","SQL_NONE","N");

// TOTAL MES ACUMULADO POR VENDEDOR
$rs_acumulado_mes = $db->query_db("SELECT nome, `$mes_selecionado` as total_mes FROM controle_ped_pontos WHERE codvend = '$codvend' and ano = '$ano_hoje'","SQL_NONE","N");

// TOTAL ANO ACUMULADO POR VENDEDOR
$rs_acumulado_ano = $db->query_db("SELECT acum AS total_acum FROM controle_ped_pontos WHERE codvend = '$codvend' and ano = '$ano_hoje'","SQL_NONE","N");

// CONTROLE
$rs_controle = $db->query_db("SELECT sum(`$mes_selecionado`) as controle FROM controle_ped_pontos","SQL_NONE","N");

include("templates/relatorio_premiacao_vendas.html");

$db->disconnect();

$db->connect_wbs();

?>