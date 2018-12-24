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
|  arquivo:     start_sistema_seed.php
|  template:    sistema_seed.htm
+--------------------------------------------------------------
*/

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];


$db->connect_wbs();
//$db->conn->debug =    true;

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT produtos.codprod, nomeprod, SUM( if( estoque.codemp =1, (
qtde - reserva
), 0 ) ) AS PRODUCAO, SUM( if( estoque.codemp =2, (
qtde - reserva
), 0 ) ) AS INDEP, SUM( if( estoque.codemp =4, (
qtde - reserva
), 0 ) ) AS USADOS, SUM( if( estoque.codemp =10, (
qtde - reserva
), 0 ) ) AS HALFELD, SUM( if( estoque.codemp =12, (
qtde - reserva
), 0 ) ) AS MINAS, SUM( if( estoque.codemp =13, (
qtde - reserva
), 0 ) ) AS BH, SUM( if( estoque.codemp =14, (
qtde - reserva
), 0 ) ) AS MAXXMICRO, SUM( if( estoque.codemp =15, (
qtde - reserva
), 0 ) ) AS MAXXMICRO_L, hist, lib_linha
FROM produtos, estoque
WHERE produtos.codprod = estoque.codprod
AND hist <> 'Y'
GROUP BY estoque.codprod
HAVING (
PRODUCAO + INDEP + HALFELD + USADOS + MAXXMICRO + MINAS + BH + MAXXMICRO_L
) =0","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			
			$rs_insert_op = $db->query_db("UPDATE produtos SET hist = 'Y', lib_linha = 'Y' WHERE codprod = '".$rs_lista->fields[0]."'","SQL_NONE","N");
			echo $i." - ".$rs_lista->fields[0]."<BR>";
						
	
			$rs_lista->MoveNext();
		}//WHILE
}


$db->disconnect();


?>

