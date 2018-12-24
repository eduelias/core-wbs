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

//$db->connect_data();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
#$rs_delete = $db->query_db("DELETE FROM modelo_maxxmicro WHERE consolidado <> 'S' ","SQL_NONE","N");



$db->connect_wbs();
//$db->conn->debug =    true;

$dataperiodo = '2008'; 

////////////////////////// INSERE PRODUTOS ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT datafim, op.codprod, op.idop, (op.qtde*3) as qtde FROM op WHERE codemp =14 and datafim <> 0 and datafim >= '2008-08-20' and datafim <= '2008-12-31' ","SQL_NONE","N");

$i = 0;
$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			
			if ( $i <= 8000 ){
				
			echo "Saldo".$i." - ".$rs_lista->fields[3]." - ".$rs_lista->fields[2]."<br>" ;
			
			
			
			// SAIDA DO PRODUTO PARA PRODUCAO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '2975', 
			codprod = '2975', 
			posicao = 'MP' , 
			idop = '".$rs_lista->fields[2]."' , 
			saida = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			
			// 4A ETAPA 
			
			// ENTRADA DO PRODUTO EM PROCESSO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '2975', 
			posicao = 'PP' , 
			idop = '".$rs_lista->fields[2]."' , 
			entrada = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
					

			}
			$i = $i + $rs_lista->fields[3];
			
			$rs_lista->MoveNext();
			
			
		}//WHILE
}

echo "Saldo".$i." - ".$rs_lista->fields[3]."<br>" ;
$db->disconnect();

/*
SELECT codprod, SUM( entrada ) , SUM( saida ) , (
SUM( entrada ) - SUM( saida )
) AS saldo
FROM `modelo_maxxmicro`
GROUP BY codprod


*/
echo "DONE!!";
?>
