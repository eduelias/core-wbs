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
|  arquivo:     start_assistencia_tecnica_admin_criar_pesquisa.php
|  template:    assistencia_tecnica_admin_criar_pesquisa.htm
+--------------------------------------------------------------
*/


 $db->connect_wbs();
 #$db->conn->debug = true;
 
 if ($_POST['sn_pesq'] or ($_POST['codped_pesq_geral'] and $_POST['codprod_pesq_geral'])){
 
 /*
            
            $rs_lista = $db->query_db("SELECT idop_sn, codprod FROM op_sn , op_prod WHERE sn ='".$_POST['sn_pesq']."' and op_sn.idop = op_prod.idop","SQL_NONE","N");
            
 			
             $rs_lista_op = $db->query_db("SELECT op.idop, codemp, datainicio, codprod, qtde FROM op_sn , op WHERE sn ='".$_POST['sn_pesq']."' and op_sn.idop = op.idop","SQL_NONE","N");
             $codemp_op = $rs_lista_op->fields['codemp'];
             $idop = $rs_lista_op->fields['idop'];
             $qtde_lote = $rs_lista_op->fields['qtde'];
             $codprod_lote = $rs_lista_op->fields['codprod'];
             $data_inisn = $rs_lista_op->fields['data_ini'];
             $data_fimsn = $rs_lista_op->fields['data_fim'];
             
 #$codemp = 1;            
 
 			# echo "ne".$rs_lista->fields['idop_sn'];
			
			
			
			*/
		if ($_POST['codped_pesq_geral']){
			$rs_codped = $db->query_db("SELECT codped FROM pedido WHERE codbarra ='".$_POST['codped_pesq_geral']."'","SQL_NONE","N");
			$codped_pesq_geral = $rs_codped->fields[0];
		}
			
			
			if ($_POST['sn_pesq']){$cond = " codbarra.codbarra = '".$_POST['sn_pesq']."' and chkcb = 'Y' ";}else{$cond = " codbarra.codped = '".$codped_pesq_geral."' and codbarra.codprod =  '".$_POST['codprod_pesq_geral']."' ";}
			
			#echo $cond;
			
			$rs_prod = $db->query_db("SELECT codcb, codbarra.codbarra, nomeprod, codped, codemp, idop_sn, codbarra.codprod, tipo_gar  FROM codbarra, produtos WHERE ".$cond."  and produtos.codprod= codbarra.codprod and codbarraped = 1 ORDER by codcb DESC limit 0,1 ","SQL_NONE","N");
			
			#echo "<pre>";
			#print_r($rs_prod);
    		
			if ($rs_prod->_numOfRows <> 0)
			{
				
				while (!$rs_prod->EOF)
				{
			
				
				$codcb_pesq = $rs_prod->fields[0];
				$codbarra_pesq = $rs_prod->fields[1];
				$nomeprod_pesq = $rs_prod->fields[2];
				$codped_pesq = $rs_prod->fields[3];
				$codemp_pesq = $rs_prod->fields[4];
				$idop_sn_pesq = $rs_prod->fields[5];
				$codprod_pesq = $rs_prod->fields[6];
				$tipo_garantia = $rs_prod->fields[7];
				#$tipo_garantia = 'B';
				
				if ($idop_sn_pesq <> 0){
				
					#echo "AQUI";
				
					$rs_op_sn = $db->query_db("SELECT sn FROM op_sn WHERE idop_sn ='".$idop_sn_pesq."'","SQL_NONE","N");
					$sn_pesqm = $rs_op_sn->fields[0];
					
					#echo "sn_micro = $sn_pesqm";
					
					$rs_prod_micro = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod, codped, codemp, idop_sn, codbarra.codprod, tipo_gar FROM codbarra, produtos WHERE codbarra.codbarra ='".$sn_pesqm."'  and produtos.codprod= codbarra.codprod and codbarraped = 1 and chkcb = 'Y' ORDER by codcb DESC limit 0,1  ","SQL_NONE","N");
					
					#echo "<pre>";
					#print_r($rs_prod_micro);
								
						if ($rs_prod_micro)
						{
							
							while (!$rs_prod_micro->EOF)
							{
						
							
							$codcb_pesq = $rs_prod_micro->fields[0];
							$codcb_pesqm = $rs_prod_micro->fields[0];
							$codbarra_pesqm = $rs_prod_micro->fields[1];
							$nomeprod_pesqm = $rs_prod_micro->fields[2];
							$codped_pesq = $rs_prod_micro->fields[3];
							$codemp_pesqm = $rs_prod_micro->fields[4];
							$idop_sn_pesqm = $rs_prod_micro->fields[5];
							$codprod_pesq = $rs_prod_micro->fields[6];
							$codprod_pesqm = $rs_prod_micro->fields[6];
							$tipo_garantia = $rs_prod_micro->fields[7];
							
							#echo "codcb_micro = $codcb_pesqm - codbarra = $codbarra_pesqm - nomeprod = $nomeprod_pesqm - codped = $codped_pesq - codemp = $codemp_pesqm - idop_sn = $idop_sn_pesqm <br>";
							
							
							$rs_prod_micro->MoveNext();
							}//WHILE
						}
            
				}else{
				
				#echo "codcb = $codcb_pesq - codbarra = $codbarra_pesq - nomeprod = $nomeprod_pesq - codped = $codped_pesq - codemp = $codemp_pesq - idop_sn = $idop_sn_pesq <br>";
				
				}
				
				
							
				$rs_prod->MoveNext();
				}//WHILE
				
				
			$rs_pedido = $db->query_db("SELECT pedidonf.nf, pedidonf.datanf, pedidonf.valornf, pedidonf.modo_nf,  pedido.codemp, clientenovo.nome, pedido.codbarra, dataped, if (tipocliente = 'F' , cpf, cnpj) as doc, if (DATE(  (SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1)	MONTH , pedido.dataentrega + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1) MONTH))) >= DATE(NOW()), 1, 0) as gar,  if (DATE( (SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf , dataentrega )) ) + interval (if (DAYNAME(DATE( (SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf , dataentrega ))) + interval 2 DAY) = 'Sunday',3, 2) ) DAY >= DATE(NOW()), 1, 0 ) as 48h,  DATE_FORMAT((SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1)	MONTH , pedido.dataentrega + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1) MONTH)), '%d-%m-%Y') as venc FROM pedidonf, pedido, clientenovo WHERE pedido.codped ='".$codped_pesq."'  and pedido.codped= pedidonf.codped and clientenovo.codcliente= pedido.codcliente   ","SQL_NONE","N");	
			
			 
		
			#echo "<pre>";
			#print_r($rs_pedido);
			
			#$rs_pedido->Move(0);
			if ($rs_pedido)
			{
				
				while (!$rs_pedido->EOF)
				{
					
				$numnf_ped = $rs_pedido->fields[0];
				$datanf_ped = $rs_pedido->fields[1];
				$valornf_ped = $rs_pedido->fields[2];
				$modonf_ped = $rs_pedido->fields[3];
				$codemp_ped = $rs_pedido->fields[4];
				$nomecli_ped = $rs_pedido->fields[5];
				$codbarraped_ped = $rs_pedido->fields[6];
				$dataped_ped = $rs_pedido->fields[7];
				$doc_ped = $rs_pedido->fields[8];
				$gar_ped = $rs_pedido->fields[9];
				$gar1_ped = $rs_pedido->fields[10];
				$venc_ped = $rs_pedido->fields[11];
				
				#echo "datagar1 = ".$gar1_ped;
				#echo "vencgar1 = ".$venc_ped;
				
				#echo "numnf = $numnf_ped - datanf_ped = $datanf_ped - valornf_ped = $valornf_ped - modonf_ped = $modonf_ped - codemp_ped = $codemp_ped - codped = $codped_pesq - nomecli_ped = $nomecli_ped <br>";
							
			$rs_pedido->MoveNext();
				}//WHILE
			}
			
            
			
				$rs_estoque = $db->query_db("SELECT (SELECT (qtde - reserva) FROM estoque WHERE codemp =15 AND codprod ='".$codprod_pesq."') AS lf , (SELECT (qtde - reserva) FROM estoque WHERE codemp =1 AND codprod ='".$codprod_pesq."') as hf, (SELECT (qtde - reserva) FROM estoque WHERE codemp =14 AND codprod ='".$codprod_pesq."') as bt FROM estoque WHERE codprod ='".$codprod_pesq."' GROUP BY codprod","SQL_NONE","N");
				
				$rs_garantia = $db->query_db("SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and codcb like '%".$codcb_pesq."%' ","SQL_NONE","N");
						
				
			}
						 
			
				
            
 $db->disconnect();


include ("templates/fabrica_garantia_ipasoft_idetalhes.html");
}
?>