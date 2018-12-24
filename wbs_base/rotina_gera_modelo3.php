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

$db->connect_data();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
$rs_delete = $db->query_db("DELETE FROM modelo_maxxmicro WHERE consolidado <> 'S' ","SQL_NONE","N");



$db->connect_wbs();
//$db->conn->debug =    true;

$dataperiodo = '2009'; 

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT datanf, codprod, ocprod.codoc, ocprod.numnf, qtderec, pcu, ipi, tipo_nf, codfor, icms, v_frete_nota, ocprod.v_seguro, v_desp_acess, icms_subs, v_frete_transp, icms_frete, tipo_frete, voc, st1,st2  FROM ocprod LEFT JOIN oc ON oc.codoc = ocprod.codoc WHERE ocprod.codemp =14 and qtderec <> 0 and datacompra like '".$dataperiodo."%'","SQL_NONE","N");

/*
 
SELECT datanf, ocprod.numnf, codprod, (  

SELECT nomeprod
FROM produtos
WHERE codprod = ocprod.codprod
) AS produto, ocprod.codoc, codfor, qtderec AS entrada, 0 AS saida, 0 AS saldo, if( tipo_nf = 'P', 'MP', 'PV' ) AS tipo, REPLACE( pcu, '.', ',' ) AS pc, REPLACE( ipi, '.', ',' ) AS ipi, REPLACE( icms, '.', ',' ) AS icms, REPLACE( v_frete_nota, '.', ',' ) AS v_frete_nota, REPLACE( ocprod.v_seguro, '.', ',' ) AS v_seguro, REPLACE( v_desp_acess, '.', ',' ) AS v_desp_acess, REPLACE( icms_subs, '.', ',' ) AS icms_subs, REPLACE( v_frete_transp, '.', ',' ) AS v_frete_transp, REPLACE( icms_frete, '.', ',' ) AS icms_frete, REPLACE( voc, '.', ',' ) AS voc
FROM ocprod
LEFT JOIN oc ON oc.codoc = ocprod.codoc
WHERE ocprod.codemp =14
AND qtderec <>0
AND datacompra LIKE '2006%'
AND tipo_nf = 'P'



*/


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$fator_calc =0;
			
			$db->connect_wbs();
			$rs_lista5 = $db->query_db("SELECT SUM((qtderec*pcu)+qtderec*pcu*(ipi/100)) as voc FROM ocprod WHERE codoc = '".$rs_lista->fields[2]."'","SQL_NONE","N");
			
			$rs_lista6 = $db->query_db("SELECT UPPER(cidade) FROM fornecedor WHERE codfor = '".$rs_lista->fields[8]."'","SQL_NONE","N");

			
			$ipi = $rs_lista->fields[5]*$rs_lista->fields[6]/100;
			$icms = $rs_lista->fields[5]*$rs_lista->fields[9]/100;
			
			$fator_calc = ($rs_lista->fields[5]+($ipi))/$rs_lista5->fields[0]; // (pcu+ipi)/voc
			
			if ($rs_lista5->fields[0] == 0){echo "OC: ".$rs_lista->fields[2]." - VOC: ".$rs_lista5->fields[0]."<BR>";}
			
			$v_frete_nota = ($rs_lista->fields[10]*$fator_calc)/$rs_lista->fields[4];
			$v_seguro = ($rs_lista->fields[11]*$fator_calc)/$rs_lista->fields[4];
			$v_desp_acess = ($rs_lista->fields[12]*$fator_calc)/$rs_lista->fields[4];
			#$icms_subs = ($rs_lista->fields[13]*$fator_calc)/$rs_lista->fields[4];
			$st1 = $rs_lista->fields[18];
			$st2 = $rs_lista->fields[19];
			
			if ($rs_lista->fields[15] <> 1){
				$v_frete_transp = ($rs_lista->fields[14]*$fator_calc)/$rs_lista->fields[4];
				$icms_frete = ($v_frete_transp*($rs_lista->fields[15]/100)*$fator_calc)/$rs_lista->fields[4];
			}
			
			if ($rs_lista6->fields[0] == 'MANAUS'){
				$cofins = (4.6*$fator_calc)/$rs_lista->fields[4];
				$pis = (1.0*$fator_calc)/$rs_lista->fields[4];
				
			}else{
				//manaus
				$cofins = (7.6*$fator_calc)/$rs_lista->fields[4];
				$pis = (1.65*$fator_calc)/$rs_lista->fields[4];
			}
			
			if ($rs_lista->fields[7] == 'P'){
			
				$posicao = 'MP';
				$pcu_liq = $rs_lista->fields[5] - $icms - $ipi + $v_desp_acess + $v_seguro + $v_frete_nota + $st1 + $st2 + $v_frete_transp - $icms_frete - $cofins - $pis;
				
			}else{
			
				$posicao = 'PV';
				$pcu_liq = $rs_lista->fields[5] - $icms + $ipi + $v_desp_acess + $v_seguro + $v_frete_nota + $st1 + $st2 + $v_frete_transp - $icms_frete - $cofins - $pis;
				
			}
			
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."' , 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = '".$posicao."' , 
			codfor = '".$rs_lista->fields[8]."' ,
			codoc = '".$rs_lista->fields[2]."' , 
			nf = '".$rs_lista->fields[3]."', 
			entrada = '".$rs_lista->fields[4]."',  
			pcu = '".$rs_lista->fields[5]."', 
			ipi = '".$rs_lista->fields[6]."',
			icms = '".$rs_lista->fields[9]."',
			v_frete_nota = '".$v_frete_nota."',
			v_seguro =  '".$v_seguro."',
			v_desp_acess =  '".$v_desp_acess."',
			icms_subs =  '".$icms_subs."',
			v_frete_transp =  '".$v_frete_transp."',
			icms_frete =  '".$icms_frete."',
			cofins =  '".$cofins."',
			pis =  '".$pis."',
			pcu_liq =  '".$pcu_liq."'
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}

////////////////////////// ORDEM DE PRODUCAO - SAIDA ///////////////////////////////////////
$db->connect_wbs();

$rs_lista = $db->query_db("SELECT datainicio, op_prod.codprod, op.idop, op.qtde, op.codprod as codprod_m FROM op_prod LEFT JOIN op ON op.idop = op_prod.idop WHERE codemp =14 and datainicio like '".$dataperiodo."%'","SQL_NONE","N");

/*SELECT DATE_FORMAT( datainicio, '%d/%m/%Y' ) AS date, 0, op_prod.codprod, 0 ,  0, 0, 0 AS entrada, op.qtde AS saida, 0 AS saldo, 'PP' ,  0, 0, 0, 0, 0, 0, 0, 0, 0, 0
FROM op_prod
LEFT JOIN op ON op.idop = op_prod.idop
WHERE codemp =14
AND datainicio LIKE '2006%'

*/


$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			
			// SAIDA DO PRODUTO PARA PRODUCAO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'MP' , 
			idop = '".$rs_lista->fields[2]."' , 
			saida = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			
			// 4A ETAPA 
			
			// ENTRADA DO PRODUTO EM PROCESSO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[4]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PP' , 
			idop = '".$rs_lista->fields[2]."' , 
			entrada = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			
			$rs_lista->MoveNext();
		}//WHILE
}


////////////////////////// ORDEM DE PRODUÇAO - ENTRADA ///////////////////////////////////////

$db->connect_wbs();

$rs_lista = $db->query_db("SELECT datafim, op.codprod, op.idop, op.qtde FROM op WHERE codemp =14 and datafim <> 0 and datafim like '".$dataperiodo."%'","SQL_NONE","N");

/*
SELECT DATE_FORMAT( datafim, '%d/%m/%Y' ) AS date, 0, op.codprod, (

SELECT nomeprod
FROM produtos
WHERE codprod = op.codprod
) AS produto, 0, 0, op.qtde AS entrada, 0 AS saida, 0 AS saldo,'PA' ,  0, 0, 0, 0, 0, 0, 0, 0, 0, 0
FROM op
WHERE codemp =14
AND datafim <>0
AND datafim LIKE '2006%'
*/

$db->connect_data();

if ($rs_lista) {
		while (!$rs_lista->EOF) { 

			
			// SAIDA DO PRODUTO ACABADO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PP' , 
			idop = '".$rs_lista->fields[2]."' , 
			saida = '".$rs_lista->fields[3]."'
			","SQL_NONE","N");
			
			// ENTRADA DO PRODUTO ACABADO
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."', 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = 'PA' , 
			idop = '".$rs_lista->fields[2]."' , 
			entrada = '".$rs_lista->fields[3]."' 
			","SQL_NONE","N");
						
			
			$rs_lista->MoveNext();
		}//WHILE
}

////////////////////////// PEDIDOS - SAIDA ///////////////////////////////////////

$db->connect_wbs();

 $rs_lista = $db->query_db("SELECT dataped, codprod, pedido.codped, qtde FROM pedido LEFT JOIN pedidoprod ON pedidoprod.codped = pedido.codped WHERE codemp =14 AND cancel <> 'OK' and dataped like '".$dataperiodo."%'","SQL_NONE","N");
 
 /*
SELECT (

SELECT datanf
FROM pedidonf
WHERE codped = pedido.codped
LIMIT 0 , 1
) AS datanf, (

SELECT nf
FROM pedidonf
WHERE codped = pedido.codped
LIMIT 0 , 1
) AS numnf, codprod, 0, 0, 0, 0 AS entrada, qtde AS saida, 0 AS saldo, 'PV', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
FROM pedido
LEFT JOIN pedidoprod ON pedidoprod.codped = pedido.codped
WHERE codemp =14
AND cancel <> 'OK'
AND (

SELECT datanf
FROM pedidonf
WHERE codped = pedido.codped
LIMIT 0 , 1
) LIKE '2009%'
 
 */
 

if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$db->connect_wbs();
			$rs_lista1 = $db->query_db("SELECT datanf, nf FROM pedidonf WHERE codped = '".$rs_lista->fields[2]."'","SQL_NONE","N");
			$rs_lista2= $db->query_db("SELECT codcat FROM produtos WHERE codprod = '".$rs_lista->fields[1]."'","SQL_NONE","N");

		
			if ($rs_lista2->fields[0] == 72 or $rs_lista2->fields[0] == 73){$posicao_vend = "PA";}else{$posicao_vend = "PV";}
			
			$pos = strpos($rs_lista1->fields[0], $dataperiodo);
			
			#echo "dataped".$rs_lista->fields[0]."datanota".$rs_lista1->fields[0]."<br>";
			
			#if ($pos === true) {
				$db->connect_data();
				$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
				datalanc = '".$rs_lista1->fields[0]."' , 
				codficha = '".$rs_lista->fields[1]."', 
				codprod = '".$rs_lista->fields[1]."', 
				posicao = '".$posicao_vend."' , 
				codped = '".$rs_lista->fields[2]."' , 
				nf = '".$rs_lista1->fields[1]."' , 
				saida = '".$rs_lista->fields[3]."'
				","SQL_NONE","N");
			#}						
			
			$rs_lista->MoveNext();
		}//WHILE
}


$db->connect_wbs();
////////////////////////// ORDEM DE MOVIMENTACAO  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT omov_prod.datanf, codprod, omov_prod.codomov, omov_prod.numnf, qtde, pcu, ipi, tipo_prod, codfor, icms, v_frete_nota, omov.v_seguro, v_desp_acess, icms_subs, v_frete_transp, icms_frete, tipo_frete, valor_omov , operacao, st1, st2 FROM omov_prod LEFT JOIN omov ON omov.codomov = omov_prod.codomov WHERE omov_prod.codemp =14 and qtde <> 0 and omov_prod.datanf like '".$dataperiodo."%'","SQL_NONE","N");

/*
SELECT datanf, ocprod.numnf, codprod, (

SELECT nomeprod
FROM produtos
WHERE codprod = ocprod.codprod
) AS produto, ocprod.codoc, codfor, qtderec AS entrada, 0 AS saida, 0 AS saldo, if( tipo_nf = 'P', 'MP', 'PV' ) AS tipo, REPLACE( pcu, '.', ',' ) AS pc, REPLACE( ipi, '.', ',' ) AS ipi, REPLACE( icms, '.', ',' ) AS icms, REPLACE( v_frete_nota, '.', ',' ) AS v_frete_nota, REPLACE( ocprod.v_seguro, '.', ',' ) AS v_seguro, REPLACE( v_desp_acess, '.', ',' ) AS v_desp_acess, REPLACE( icms_subs, '.', ',' ) AS icms_subs, REPLACE( v_frete_transp, '.', ',' ) AS v_frete_transp, REPLACE( icms_frete, '.', ',' ) AS icms_frete, REPLACE( voc, '.', ',' ) AS voc
FROM ocprod
LEFT JOIN oc ON oc.codoc = ocprod.codoc
WHERE ocprod.codemp =14
AND qtderec <>0
AND datacompra LIKE '2006%'
AND tipo_nf = 'P'


*/


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$fator_calc =0;
		
			$db->connect_wbs();
			$rs_lista5 = $db->query_db("SELECT SUM((qtde*pcu)+qtde*pcu*(ipi/100)) as voc FROM omov_prod WHERE codomov = '".$rs_lista->fields[2]."'","SQL_NONE","N");
			$rs_lista6 = $db->query_db("SELECT UPPER(cidade) FROM fornecedor WHERE codfor = '".$rs_lista->fields[8]."'","SQL_NONE","N");


			if ($rs_lista->fields[18] == "E"){
			
			$ipi = $rs_lista->fields[5]*$rs_lista->fields[6]/100;
			$icms = $rs_lista->fields[5]*$rs_lista->fields[9]/100;
			
			$fator_calc = ($rs_lista->fields[5]+($ipi))/$rs_lista5->fields[0]; // (pcu+ipi)/voc
			if ($rs_lista5->fields[0] == 0){echo "MOV: ".$rs_lista->fields[2]." - VMOV: ".$rs_lista5->fields[0]."<BR>";}
			
			$v_frete_nota = ($rs_lista->fields[10]*$fator_calc)/$rs_lista->fields[4];
			$v_seguro = ($rs_lista->fields[11]*$fator_calc)/$rs_lista->fields[4];
			$v_desp_acess = ($rs_lista->fields[12]*$fator_calc)/$rs_lista->fields[4];
			#$icms_subs = ($rs_lista->fields[13]*$fator_calc)/$rs_lista->fields[4];
			$st1 = $rs_lista->fields[19];
			$st2 = $rs_lista->fields[20];
			
			if ($rs_lista->fields[15] <> 1){
				$v_frete_transp = ($rs_lista->fields[14]*$fator_calc)/$rs_lista->fields[4];
				$icms_frete = ($v_frete_transp*($rs_lista->fields[15]/100)*$fator_calc)/$rs_lista->fields[4];
			}
			
			if ($rs_lista6->fields[0] == 'MANAUS'){
				$cofins = (4.6*$fator_calc)/$rs_lista->fields[4];
				$pis = (1.0*$fator_calc)/$rs_lista->fields[4];
				
			}else{
				//manaus
				$cofins = (7.6*$fator_calc)/$rs_lista->fields[4];
				$pis = (1.65*$fator_calc)/$rs_lista->fields[4];
			}
			
			if ($rs_lista->fields[7] == 'P'){
			
				$posicao = 'MP';
				$pcu_liq = $rs_lista->fields[5] - $icms - $ipi + $v_desp_acess + $v_seguro + $v_frete_nota + $st1 + $st2 + $v_frete_transp - $icms_frete - $cofins - $pis;
				
			}else{
			
				$posicao = 'PV';
				$pcu_liq = $rs_lista->fields[5] - $icms + $ipi + $v_desp_acess + $v_seguro + $v_frete_nota + $st1 + $st2 + $v_frete_transp - $icms_frete - $cofins - $pis;
				
			}
			
			// ENTRADA DA ORDEM DE MOV
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."' , 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = '".$posicao."' , 
			codfor = '".$rs_lista->fields[8]."' ,
			codoc = '".$rs_lista->fields[2]."' , 
			nf = '".$rs_lista->fields[3]."', 
			entrada = '".$rs_lista->fields[4]."',
			pcu = '".$rs_lista->fields[5]."', 
			ipi = '".$rs_lista->fields[6]."',
			icms = '".$rs_lista->fields[9]."',
			v_frete_nota = '".$v_frete_nota."',
			v_seguro =  '".$v_seguro."',
			v_desp_acess =  '".$v_desp_acess."',
			icms_subs =  '".$icms_subs."',
			v_frete_transp =  '".$v_frete_transp."',
			icms_frete =  '".$icms_frete."',
			cofins =  '".$cofins."',
			pis =  '".$pis."',
			pcu_liq =  '".$pcu_liq."',
			mov = 'S'
			","SQL_NONE","N");
			
			}else{//entrada
				
				if ($rs_lista->fields[7] == 'P'){
			
				$posicao = 'MP';
				$pcu_liq = 0;
				
				}else{
			
				$posicao = 'PV';
				$pcu_liq = 0;
				
				}
				
			$entrada = 0;
			$saida = $rs_lista->fields[4];
			
			// SAIDA DA ORDEM DE MOV
			$db->connect_data();
			$rs_insert_op = $db->query_db("INSERT INTO modelo_maxxmicro SET 
			datalanc = '".$rs_lista->fields[0]."' , 
			codficha = '".$rs_lista->fields[1]."' , 
			codprod = '".$rs_lista->fields[1]."', 
			posicao = '".$posicao."' , 
			codped = '".$rs_lista->fields[2]."',
			nf = '".$rs_lista->fields[3]."', 
			saida = '".$rs_lista->fields[4]."',
			mov = 'S' 
			","SQL_NONE","N");
			
			
				
			}//saida
			
						
			
			$rs_lista->MoveNext();
		}//WHILE
}



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

