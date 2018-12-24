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

$db->connect_mod3();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
$rs_delete = $db->query_db("DELETE FROM modelo_maxxmicro WHERE consolidado <> 'S' ","SQL_NONE","N");



$db->connect_wbs();
//$db->conn->debug =    true;

#$dataperiodo = '2009-07'; 

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT datanf, codprod, ocprod.codoc, ocprod.numnf, qtderec, pcu, ipi, tipo_nf, codfor, icms, v_frete_nota, v_seguro, v_desp_acess, icms_subs, v_frete_transp, icms_frete, tipo_frete, voc  FROM ocprod LEFT JOIN oc ON oc.codoc = ocprod.codoc WHERE ocprod.codemp =14 and qtderec <> 0 and datacompra like '".$dataperiodo."%'","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$db->connect_wbs();
			$rs_lista5 = $db->query_db("SELECT SUM((qtderec*pcu)+qtderec*pcu*(ipi/100)) as voc FROM ocprod WHERE codoc = '".$rs_lista->fields[2]."'","SQL_NONE","N");

			
			$ipi = $rs_lista->fields[5]*$rs_lista->fields[6]/100;
			$icms = $rs_lista->fields[5]*$rs_lista->fields[9]/100;
			
			$fator_calc = ($rs_lista->fields[5]+($ipi))/$rs_lista5->fields[0]; // (pcu+ipi)/voc
			
			$v_frete_nota = ($rs_lista->fields[10]*$fator_calc)/$rs_lista->fields[4];
			$v_seguro = ($rs_lista->fields[11]*$fator_calc)/$rs_lista->fields[4];
			$v_desp_acess = ($rs_lista->fields[12]*$fator_calc)/$rs_lista->fields[4];
			$icms_subs = ($rs_lista->fields[13]*$fator_calc)/$rs_lista->fields[4];
			if ($rs_lista->fields[15] <> 1){
				$v_frete_transp = ($rs_lista->fields[14]*$fator_calc)/$rs_lista->fields[4];
				$icms_frete = ($v_frete_transp*($rs_lista->fields[15]/100)*$fator_calc)/$rs_lista->fields[4];
			}
			$cofins = (7.6*$fator_calc)/$rs_lista->fields[4];
			$pis = (1.65*$fator_calc)/$rs_lista->fields[4];
			
			
			if ($rs_lista->fields[7] == 'P'){
			
				$posicao = 'MP';
				$pcu_liq = $rs_lista->fields[5] - $icms - $ipi + $v_desp_acess + $v_seguro + $v_frete_nota + $icms_subs + $v_frete_transp - $icms_frete;
				
			}else{
			
				$posicao = 'PV';
				$pcu_liq = $rs_lista->fields[5] - $icms + $ipi + $v_desp_acess + $v_seguro + $v_frete_nota + $icms_subs + $v_frete_transp - $icms_frete;
				
			}
			
			$db->connect_mod3();
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

$db->connect_mod3();

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

$db->connect_mod3();

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

if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$db->connect_wbs();
			$rs_lista1 = $db->query_db("SELECT datanf, nf FROM pedidonf WHERE codped = '".$rs_lista->fields[2]."'","SQL_NONE","N");
			$rs_lista2= $db->query_db("SELECT codcat FROM produtos WHERE codprod = '".$rs_lista->fields[1]."'","SQL_NONE","N");

		
			if ($rs_lista2->fields[0] == 72 or $rs_lista2->fields[0] == 73){$posicao_vend = "PA";}else{$posicao_vend = "PV";}
			
			$pos = strpos($rs_lista1->fields[0], $dataperiodo);
			
			echo "dataped".$rs_lista->fields[0]."datanota".$rs_lista1->fields[0]."<br>";
			
			#if ($pos === true) {
				$db->connect_mod3();
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

