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

$udia_mes = date("t");
$dia_mes = date("d");
$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];
#$dia_hoje = $hoje[day];
if (strlen($mes_hoje)==1){$mes_hoje = '0'.$mes_hoje;}else{$mes_hoje = $mes_hoje;}

$db->connect_data();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
$rs_delete = $db->query_db("DELETE FROM distribuicao_produtos WHERE 1 ","SQL_NONE","N");

echo $ano_hoje."-".$mes_hoje."-".$dia_mes."-".$udia_mes;


#$ano_hoje = "2008";
#$mes_hoje = "04";
#$condpesq = " and (pedido.codvend = 78 or pedido.codvend = 507 or pedido.codvend = 591 or pedido.codvend = 516)";
#$condpesq1 = " and (pedido.codcliente = 77 )";



$db->connect_wbs();
#$db->conn->debug =    true;


////////////////////////// SOMATORIO DE VENDAS (RDD - RSDT - VAR) ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT pedido.codped, SUM(vt), pedido.codvend, vendedor.nome, SUM(if (modelo_ped = 'RDD', vt, 0)), SUM(if (modelo_ped = 'RDST', vt, 0)), SUM(if (modelo_ped = '', vt, 0)) FROM pedido , vendedor  WHERE pedido.codvend = vendedor.codvend  AND (pedido.codemp =14 or pedido.codemp = 15) AND cancel <> 'OK' and dataped like '".$ano_hoje."-".$mes_hoje."%' and (modelo_ped = 'RDD' or modelo_ped = 'RDST' or (modelo_ped = '' and vendedor.tipo = 'R')) and ped_transf <> 'OK'  ".$condpesq." GROUP by pedido.codvend","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
		$codped= $rs_lista->fields[0];
		$sum_vendas= $rs_lista->fields[1];
		$codvend= $rs_lista->fields[2];
		#$nome_vend= $rs_lista->fields[3];
		$v_rdd= $rs_lista->fields[4];
		$v_rdst= $rs_lista->fields[5];
		$v_var= $rs_lista->fields[6];
		$pareto = 0;
		
		$db->connect_wbs();
		#$db->conn->debug =    true;
		
		//// DADOS DO CLIENTE
		$rs_lista_cliente = $db->query_db("SELECT codcliente, clientenovo.nome, nome_fantasia, logincad, clientenovo.meta, limite_credito FROM vendedor LEFT JOIN clientenovo ON vendedor.doc = if( vendedor.tipocliente = 'F', clientenovo.cpf, clientenovo.cnpj ) WHERE codvend = $codvend","SQL_NONE","N");
		$codcliente= $rs_lista_cliente->fields[0];
		$nome_cli= $rs_lista_cliente->fields[1];
		$nome_fantasia = $rs_lista_cliente->fields[2];
		$meta= $rs_lista_cliente->fields[4];
		$lim_credito= $rs_lista_cliente->fields[5];
		$projetado = ($sum_vendas/$dia_mes)*$udia_mes;
		if ($projetado >= $meta){$performace = '1';}
		if ($projetado >= $meta*0.90 and $projetado <= $meta*0.99){$performace = '0';}
		if ($projetado < $meta*0.90){$performace = '-1';}
		
				
		//// DADOS DO VENDEDOR RESP
		$rs_lista_cliente = $db->query_db("SELECT codvend, vendedor.nome FROM clientenovo LEFT JOIN vendedor ON clientenovo.logincad = vendedor.nome  WHERE codcliente = $codcliente","SQL_NONE","N");
		$codvend_resp= $rs_lista_cliente->fields[0];
		$nome_vend_resp= $rs_lista_cliente->fields[1];
		
		
		
		///// DADOS PERIODO 
		$rs_lista_periodo = $db->query_db("SELECT  SUM(if( DATEDIFF( NOW( ) , dataped ) >15, if( DATEDIFF( NOW( ) , dataped ) <=21, 1, 0 ), 0 )) , SUM(if( DATEDIFF( NOW( ) , dataped ) >=7, if( DATEDIFF( NOW( ) , dataped ) <=15, 1, 0 ) , 0 ) ), SUM(if( DATEDIFF( NOW( ) , dataped ) <7, 1, 0 )), SUM(if( DATEDIFF( NOW( ) , dataped ) >15, if( DATEDIFF( NOW( ) , dataped ) <=21, vt, 0 ), 0 )) , SUM(if( DATEDIFF( NOW( ) , dataped ) >=7, if( DATEDIFF( NOW( ) , dataped ) <=15, vt, 0 ) , 0 ) ), SUM(if( DATEDIFF( NOW( ) , dataped ) <7, vt, 0 )) FROM pedido , vendedor  WHERE pedido.codvend = vendedor.codvend  AND (pedido.codemp =14 or pedido.codemp = 15) AND cancel <> 'OK' and (modelo_ped = 'RDD' or modelo_ped = 'RDST' or (modelo_ped = '' and vendedor.tipo = 'R'))  AND pedido.codvend = '".$codvend."' and ped_transf <> 'OK' GROUP by pedido.codvend","SQL_NONE","N");
		$perio_15= $rs_lista_periodo->fields[0];
		$perio_7a15= $rs_lista_periodo->fields[1];
		$perio_7= $rs_lista_periodo->fields[2];
		$perio_15_valor= $rs_lista_periodo->fields[3];
		$perio_7a15_valor= $rs_lista_periodo->fields[4];
		$perio_7_valor= $rs_lista_periodo->fields[5];
		
		
		
		//// DADOS DO CAR
		$rs_lista_car = $db->query_db("SELECT SUM(if (fin_car.codcliente = ".$codcliente.", if( DATEDIFF( NOW( ) , datavenc ) >2, 1, 0 ), 0) ) , SUM( if (fin_car.codcliente = ".$codcliente.", if( DATEDIFF( NOW( ) , datavenc ) >0, if( DATEDIFF( NOW( ) , datavenc ) <=2, 1, 0 ) , 0 ), 0) ) , SUM( if (fin_car.codcliente = ".$codcliente.",  if( DATEDIFF( NOW( ) , datavenc ) <=0, 1, 0 ), 0 )) , SUM( valordevido ), SUM(if (fin_car.codcliente = ".$codcliente.", valordevido, 0))  FROM fin_car, pedido, vendedor WHERE fin_car.codped = pedido.codped AND pedido.codvend = vendedor.codvend  AND (pedido.codemp =14 or pedido.codemp = 15) AND cancel <> 'OK' and (modelo_ped = 'RDD' or modelo_ped = 'RDST' or (modelo_ped = '' and vendedor.tipo = 'R')) AND fin_car.valorpago =0  AND fin_car.hist <> 'S'  AND opcaixa = '02.04' AND pedido.codvend = '".$codvend."' and ped_transf <> 'OK' GROUP by pedido.codvend","SQL_NONE","N");
		$pont_2= $rs_lista_car->fields[0];
		$pont_0a2= $rs_lista_car->fields[1];
		$pont_0= $rs_lista_car->fields[2];
		$valor_devido= $rs_lista_car->fields[3];
		$valor_devido_cli= $rs_lista_car->fields[4];
		$lim_credito_res = $lim_credito - $valor_devido_cli;
		
		echo "<b>$sum_vendas - $codcliente - $nome_cli - $codvend_resp - $nome_vend_resp - $perio_15 - $perio_7a15 - $perio_7 ($perio_15_valor, $perio_7a15_valor, $perio_7_valor) - $valor_devido - $valor_devido_cli - $pont_2 - $pont_0a2 - $pont_0 ( $v_rdd - $v_rdst - $v_var)</b><br>";
		
			
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO distribuicao_geral SET 
			codcliente = '".$codcliente."' , 
			codvend_resp = '".$rs_lista_cliente->fields[0]."' , 
			vendas_mes = '".$sum_vendas."', 
			vendas_dia = '".$sum_vendas_dia."' , 
			projetado_mes = '".$projetado."' ,
			meta = '".$meta."' , 
			performace = '".$performace."', 
			perio_max = '".$perio_15."',  
			perio_med = '".$perio_7a15."', 
			perio_min = '".$perio_7."',
			perio_max_valor = '".$perio_15_valor."',
			perio_med_valor = '".$perio_7a15_valor."',
			perio_min_valor =  '".$perio_7_valor."',
			pont_max =  '".$pont_2."',
			pont_med =  '".$pont_0a2."',
			pont_min =  '".$pont_0."',
			lim_credito =  '".$lim_credito."',
			contas_pagar =  '".$valor_devido_cli."',
			contas_pagar_clientes =  '".$valor_devido."',
			lim_credito_res =  lim_credito - contas_pagar ,
			ped_dst =  '0',
			ped_rdd =  '".$v_rdd."',
			ped_rdst =  '".$v_rdst."',
			ped_var =  '".$v_var."',
			datareg =  NOW(),
			nome =  '".$nome_cli."',
			nome_fantasia =  '".$rs_lista_cliente->fields[2]."',
			dataatual =  NOW()
			","SQL_NONE","N");
			
		
		$db->connect_wbs();
		#$db->conn->debug =    true;
		
		//// DADOS DOS PRODUTOS
		$rs_lista_prod = $db->query_db("SELECT pedidoprod.codprod, nomeprod, SUM( pedidoprod.qtde ) AS soma, codcat  FROM pedidoprod, produtos, pedido, vendedor WHERE pedidoprod.codped = pedido.codped AND pedidoprod.codprod = produtos.codprod AND pedido.codvend = vendedor.codvend AND ( pedido.codemp =14 OR pedido.codemp =15 ) AND cancel <> 'OK' AND ( modelo_ped = 'RDD' OR modelo_ped = 'RDST' OR ( modelo_ped = '' AND vendedor.tipo = 'R' ) ) AND dataped >= SUBDATE( NOW( ) , 90 ) AND pedido.codvend = '".$codvend."'  GROUP BY pedidoprod.codprod, pedido.codvend and ped_transf <> 'OK' ORDER BY vendedor.nome ASC , soma DESC","SQL_NONE","N");
		
			
		if ($rs_lista_prod) {
		while (!$rs_lista_prod->EOF) { 
			
			$codprod= $rs_lista_prod->fields[0];
			$nomeprod= $rs_lista_prod->fields[1];
			$soma= $rs_lista_prod->fields[2];
			$codcat= $rs_lista_prod->fields[3];
			
			
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO distribuicao_produtos SET 
			codcliente = '".$codcliente."' , 
			codprod = '".$codprod."' , 
			nomeprod = '".$nomeprod."' , 
			codcat = '".$codcat."' , 
			qtde = '".$soma."'
			","SQL_NONE","N");
			
				
			#echo "<b>$codprod - $nomeprod - $soma</b><br>";
			
			$rs_lista_prod->MoveNext();
		}//WHILE
		}
		
				
			
			$rs_lista->MoveNext();
		}//WHILE
}

		
echo "<BR>////////////////////////////////////////////////////////////////////////////////////////<br>";

$db->connect_wbs();
#$db->conn->debug =    true;
////////////////////////// SOMATORIO DE VENDAS (DISTRIBUICAO) ///////////////////////////////////////

$rs_lista1 = $db->query_db("SELECT pedido.codped, SUM(vt),  SUM(if (modelo_ped = 'DST', vt, 0)), codcliente FROM pedido WHERE  (pedido.codemp =14 or pedido.codemp = 15) AND cancel <> 'OK' and dataped like '".$ano_hoje."-".$mes_hoje."%' and (modelo_ped = 'DST' ) and ped_transf <> 'OK' ".$condpesq1." GROUP by pedido.codcliente","SQL_NONE","N");


if ($rs_lista1) {
		while (!$rs_lista1->EOF) { 
		
		$codped= $rs_lista1->fields[0];
		$sum_vendas= $rs_lista1->fields[1];
		$v_dst= $rs_lista1->fields[2];
		$codcliente= $rs_lista1->fields[3];
		$pareto = 0;
		
		$db->connect_wbs();
		#$db->conn->debug =    true;
		
		//// DADOS DO CLIENTE
		$rs_lista_cliente1 = $db->query_db("SELECT codcliente, clientenovo.nome, nome_fantasia, logincad, codvend, vendedor.nome, clientenovo.meta, limite_credito FROM clientenovo LEFT JOIN vendedor ON clientenovo.logincad = vendedor.nome  WHERE codcliente = $codcliente","SQL_NONE","N");
		#$codcliente= $rs_lista_cliente->fields[0];
		$nome_cli= $rs_lista_cliente1->fields[1];
		$codvend_resp= $rs_lista_cliente1->fields[4];
		$nome_vend_resp= $rs_lista_cliente1->fields[5];
		$nome_fantasia = $rs_lista_cliente1->fields[2];
		$meta= $rs_lista_cliente1->fields[6];
		$lim_credito= $rs_lista_cliente1->fields[8];
		$projetado = ($sum_vendas/$dia_mes)*$udia_mes;
		if ($projetado >= $meta){$performace = '1';}
		if ($projetado >= $meta*0.90 and $projetado <= $meta*0.99){$performace = '0';}
		if ($projetado < $meta*0.90){$performace = '-1';}
		
		///// DADOS DO PERIODO
		$rs_lista_periodo1 = $db->query_db("SELECT SUM(if( DATEDIFF( NOW( ) , dataped ) >15, if( DATEDIFF( NOW( ) , dataped ) <=21, 1, 0 ), 0 )) , SUM(if( DATEDIFF( NOW( ) , dataped ) >=7, if( DATEDIFF( NOW( ) , dataped ) <=15, 1, 0 ) , 0 ) ), SUM(if( DATEDIFF( NOW( ) , dataped ) <7, 1, 0 )), SUM(if( DATEDIFF( NOW( ) , dataped ) >15, if( DATEDIFF( NOW( ) , dataped ) <=21, vt, 0 ), 0 )) , SUM(if( DATEDIFF( NOW( ) , dataped ) >=7, if( DATEDIFF( NOW( ) , dataped ) <=15, vt, 0 ) , 0 ) ), SUM(if( DATEDIFF( NOW( ) , dataped ) <7, vt, 0 )) FROM pedido WHERE  (pedido.codemp =14 or pedido.codemp = 15) AND cancel <> 'OK' and (modelo_ped = 'DST' )  AND pedido.codcliente = '".$codcliente."' and ped_transf <> 'OK' GROUP by pedido.codcliente","SQL_NONE","N");	
		$perio_15= $rs_lista_periodo1->fields[0];
		$perio_7a15= $rs_lista_periodo1->fields[1];
		$perio_7= $rs_lista_periodo1->fields[2];
		$perio_15_valor= $rs_lista_periodo1->fields[3];
		$perio_7a15_valor= $rs_lista_periodo1->fields[4];
		$perio_7_valor= $rs_lista_periodo1->fields[5];	
		
		
		//// DADOS DO CAR
		$rs_lista_car1 = $db->query_db("SELECT SUM(if (fin_car.codcliente = ".$codcliente.", if( DATEDIFF( NOW( ) , datavenc ) >2, 1, 0 ), 0) ) , SUM( if (fin_car.codcliente = ".$codcliente.", if( DATEDIFF( NOW( ) , datavenc ) >0, if( DATEDIFF( NOW( ) , datavenc ) <=2, 1, 0 ) , 0 ), 0) ) , SUM( if (fin_car.codcliente = ".$codcliente.",  if( DATEDIFF( NOW( ) , datavenc ) <=0, 1, 0 ), 0 )), SUM( valordevido ), SUM(if (fin_car.codcliente = ".$codcliente.", valordevido, 0))  FROM fin_car, pedido WHERE fin_car.codped = pedido.codped AND (pedido.codemp =14 or pedido.codemp = 15) AND cancel <> 'OK' and (modelo_ped = 'DST') AND fin_car.valorpago =0  AND fin_car.hist <> 'S'  AND opcaixa = '02.04' AND pedido.codcliente = '".$codcliente."' and ped_transf <> 'OK' GROUP by pedido.codcliente","SQL_NONE","N");
		$pont_2= $rs_lista_car1->fields[0];
		$pont_0a2= $rs_lista_car1->fields[1];
		$pont_0= $rs_lista_car1->fields[2];
		$valor_devido= $rs_lista_car1->fields[3];
		$valor_devido_cli= $rs_lista_car1->fields[4];
		$lim_credito_res = $lim_credito - $valor_devido_cli;
		

		
		echo "<b>$sum_vendas - $codcliente - $nome_cli - $codvend_resp - $nome_vend_resp - $perio_15 - $perio_7a15 - $perio_7 ($perio_15_valor, $perio_7a15_valor, $perio_7_valor) - $valor_devido - $valor_devido_cli - $pont_2 - $pont_0a2 - $pont_0 ($v_dst)</b><br>";
	
	
		$db->connect_data();
		
		$rs_lista_verif1 = $db->query_db("SELECT COUNT(*) FROM distribuicao_geral  WHERE codcliente = '".$codcliente."' and datareg = NOW() ","SQL_NONE","N");
		$cont_reg= $rs_lista_verif1->fields[0];
		
		#echo "<BR>CONT = $cont_reg <BR>";
		
		if ($cont_reg <> 0){
		
			//// UPDATE
			$rs_insert_op = $db->query_db("UPDATE distribuicao_geral SET 
			vendas_mes = vendas_mes + '".$sum_vendas."', 
			vendas_dia = vendas_dia + '".$sum_vendas_dia."' , 
			perio_max = perio_max + '".$perio_15."',  
			perio_med = perio_med + '".$perio_7a15."', 
			perio_min = perio_min + '".$perio_7."',
			perio_max_valor = perio_max_valor + '".$perio_15_valor."',
			perio_med_valor = perio_med_valor + '".$perio_7a15_valor."',
			perio_min_valor = perio_min_valor + '".$perio_7_valor."',
			pont_max = pont_max + '".$pont_2."',
			pont_med = pont_med + '".$pont_0a2."',
			pont_min = pont_min + '".$pont_0."',
			contas_pagar = contas_pagar + '".$valor_devido_cli."',
			contas_pagar_clientes = contas_pagar_clientes + '".$valor_devido."',
			lim_credito_res =  lim_credito - contas_pagar ,
			ped_dst =  '".$v_dst."'
			WHERE codcliente = '".$codcliente."' and datareg = NOW() 
			","SQL_NONE","N");
			
			}else{
			
			$rs_insert_op = $db->query_db("INSERT INTO distribuicao_geral SET 
			codcliente = '".$codcliente."' , 
			codvend_resp = '".$codvend_resp."' , 
			vendas_mes = '".$sum_vendas."', 
			vendas_dia = '".$sum_vendas_dia."' , 
			projetado_mes = '".$projetado."' ,
			meta = '".$meta."' , 
			performace = '".$performace."', 
			perio_max = '".$perio_15."',  
			perio_med = '".$perio_7a15."', 
			perio_min = '".$perio_7."',
			perio_max_valor = '".$perio_15_valor."',
			perio_med_valor = '".$perio_7a15_valor."',
			perio_min_valor =  '".$perio_7_valor."',
			pont_max =  '".$pont_2."',
			pont_med =  '".$pont_0a2."',
			pont_min =  '".$pont_0."',
			lim_credito =  '".$lim_credito."',
			contas_pagar =  '".$valor_devido_cli."',
			contas_pagar_clientes =  '".$valor_devido."',
			lim_credito_res =  lim_credito - contas_pagar ,
			ped_dst =  '".$v_dst."',
			datareg =  NOW(),
			nome =  '".$nome_cli."',
			nome_fantasia =  '".$nome_fantasia."',
			dataatual =  NOW()
			","SQL_NONE","N");
			
			}
			
		$db->connect_wbs();
		#$db->conn->debug =    true;
		//// DADOS DOS PRODUTOS
		$rs_lista_prod1 = $db->query_db("SELECT pedidoprod.codprod, nomeprod, SUM( pedidoprod.qtde ) AS soma , codcat FROM pedidoprod, produtos, pedido WHERE pedidoprod.codped = pedido.codped AND pedidoprod.codprod = produtos.codprod  AND ( pedido.codemp =14 OR pedido.codemp =15 ) AND cancel <> 'OK' AND ( modelo_ped = 'DST' ) AND dataped >= SUBDATE( NOW( ) , 90 ) AND pedido.codcliente = '".$codcliente."' and ped_transf <> 'OK' GROUP BY pedidoprod.codprod, pedido.codcliente ORDER BY soma DESC","SQL_NONE","N");
		
			
		if ($rs_lista_prod1) {
		while (!$rs_lista_prod1->EOF) { 
			
			$codprod= $rs_lista_prod1->fields[0];
			$nomeprod= $rs_lista_prod1->fields[1];
			$soma= $rs_lista_prod1->fields[2];
			$codcat= $rs_lista_prod1->fields[3];
			
				
			#echo "<b>$codprod - $nomeprod - $soma</b><br>";
			
			$db->connect_data();
			$rs_lista_verif2 = $db->query_db("SELECT COUNT(*) FROM distribuicao_produtos  WHERE codcliente = '".$codcliente."' and codprod = ".$codprod." ","SQL_NONE","N");
			$cont_reg_prod= $rs_lista_verif1->fields[0];
		
				#echo "<BR>CONT = $cont_reg_prod <BR>";
		
			if ($cont_reg_prod <> 0){
			
				$rs_insert_op = $db->query_db("UPDATE distribuicao_produtos SET 
				qtde = qtde + '".$soma."'
				WHERE codcliente = '".$codcliente."'  and codprod = ".$codprod." 
				","SQL_NONE","N");
			
			}else{
			
				$rs_insert_op = $db->query_db("INSERT INTO distribuicao_produtos SET 
				codcliente = '".$codcliente."' , 
				codprod = '".$codprod."' , 
				nomeprod = '".$nomeprod."' , 
				codcat = '".$codcat."' , 
				qtde = '".$soma."'
				","SQL_NONE","N");

			}
			
			$rs_lista_prod1->MoveNext();
		}//WHILE
		}
		
			
			
			$rs_lista1->MoveNext();
		}//WHILE
}




$db->disconnect();



echo "DONE!!";
?>

