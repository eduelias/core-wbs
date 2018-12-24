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
 //$db->conn->debug = true;
 
 if ($_POST['sn_pesq'] ){
 
 			
						
			$rs_prod = $db->query_db("SELECT codcb, codbarra.codbarra, nomeprod, codped, codemp, idop_sn, codbarra.codprod, codpped, codprodcj, tipocj, tipo_gar FROM codbarra, produtos WHERE codbarra.codbarra = '".$_POST['sn_pesq']."' and chkcb = 'Y'  and produtos.codprod= codbarra.codprod and codbarraped = 1 and codped <> -5555 ORDER by codcb DESC limit 0,1 ","SQL_NONE","N");
			
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
				$codpped_pesq = $rs_prod->fields[7];
				$codprodcj_pesq = $rs_prod->fields[8];
				$tipocj_pesq = $rs_prod->fields[9];
				$tipo_garantia = $rs_prod->fields[10];
				
				#$tipo_garantia = 'A';
				
				if ($idop_sn_pesq <> 0){
				
					
            
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
			
            
			
				$rs_estoque = $db->query_db("SELECT (SELECT (qtde - reserva) FROM estoque WHERE codemp =15 AND codprod ='".$codprod_pesq."') AS lf , (SELECT (qtde - reserva) FROM estoque WHERE codemp =19 AND codprod ='".$codprod_pesq."') as hf, (SELECT (qtde - reserva) FROM estoque WHERE codemp =17 AND codprod ='".$codprod_pesq."') as bt FROM estoque WHERE codprod ='".$codprod_pesq."' GROUP BY codprod","SQL_NONE","N");
				
				$rs_garantia = $db->query_db("SELECT gar_um, codcb FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and codcb like '%".$codcb_pesq."%' ","SQL_NONE","N");
						
				
			}

//VERIFICA CODBARRA NOVO SE PODERA SER TROCADO						 
if ($_POST['cb_novo']){

$rs_prod_novo = $db->query_db("SELECT codcb, codbarra.codbarra, nomeprod, codped, codemp, idop_sn, codbarra.codprod  FROM codbarra, produtos WHERE codbarra.codbarra = '".$_POST['cb_novo']."' and chkcb = 'Y'  and codbarra.codprod = '".$codprod_pesq."' and codemp = '".$codemp_vend."' and produtos.codprod= codbarra.codprod and codbarraped <> 1 ORDER by codcb DESC limit 0,1 ","SQL_NONE","N");

			#echo "<pre>";
			#print_r($rs_prod_novo);

if ($rs_prod_novo->_numOfRows <> 0)
			{
				
				while (!$rs_prod_novo->EOF)
				{
			
				
				$codcb_pesq_n = $rs_prod_novo->fields[0];
				$codbarra_pesq_n = $rs_prod_novo->fields[1];
				$nomeprod_pesq_n = $rs_prod_novo->fields[2];
				$codped_pesq_n = $rs_prod_novo->fields[3];
				$codemp_pesq_n = $rs_prod_novo->fields[4];
				$idop_sn_pesq_n = $rs_prod_novo->fields[5];
				$codprod_pesq_n = $rs_prod_novo->fields[6];
				$tipo_garantia_n = 'A';
				
				
					#echo "NOVO:codcb = $codcb_pesq_n - codbarra = $codbarra_pesq_n - nomeprod = $nomeprod_pesq_n - codped = $codped_pesq_n - codemp = $codemp_pesq_n - idop_sn = $idop_sn_pesq_n <br>";
				
					#echo "ANTIGO:codcb = $codcb_pesq - codbarra = $codbarra_pesq - nomeprod = $nomeprod_pesq - codped = $codped_pesq - codemp = $codemp_pesq - idop_sn = $idop_sn_pesq <br>";
					
			//TRANSFERE PRODUTO PARA NOVO PARA O PEDIDO		
			$rs_cria = $db->query_db("INSERT INTO codbarra (codbarra, codemp, flag_acerto, codprod, datainsert, codoc, codbarraped, codpped, codped, codprodcj, tipocj) VALUES ('".$codbarra_pesq_n."', '".$codemp_pesq."', 'S1',  '".$codprod_pesq."', NOW(), 99999999 , 1,  '".$codpped_pesq."', '".$codped_pesq."', '".$codprodcj_pesq."', '".$tipocj_pesq."')","SQL_NONE","N");	
			$codcb_novo = $db->conn->Insert_ID();
			#echo "CBNOVO".$codcb_novo;
			
			$rs_atualiza = $db->query_db("UPDATE codbarra SET codbarraped = 1, codped = -7777, codped_troca_rma = '".$codped_pesq."' WHERE codcb ='".$codcb_pesq_n."'","SQL_NONE","N");
			
			$codcb_array = explode(":", $rs_garantia->fields[1]);

				for($i = 0; $i < count($codcb_array); $i++ ){
					if ($codcb_array[$i] == $codcb_pesq){$codcb_array[$i] = $codcb_novo;}
				}
			$codcbatual = implode(":", $codcb_array);

			
			
			$rs_atualiza = $db->query_db("UPDATE pedidoprod SET codcb = '".$codcbatual."' WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and codcb like '%".$codcb_pesq."%' ","SQL_NONE","N");
			
				
			//TRANSFERE PRODUTO PARA ANTIGO PARA O ESTOQUE DA LOJA	
			$rs_cria = $db->query_db("INSERT INTO codbarra (codbarra, codemp, flag_acerto, codprod, datainsert, codoc ) VALUES ('".$codbarra_pesq."', '".$codemp_pesq_n."', 'S1',  '".$codprod_pesq."', NOW(), 99999999  )","SQL_NONE","N");	
			
			$rs_atualiza = $db->query_db("UPDATE codbarra SET codped = -5555, codped_troca_rma = '".$codped_pesq."' WHERE codcb ='".$codcb_pesq."'","SQL_NONE","N");
				
								
							
				$rs_prod_novo->MoveNext();
				}//WHILE
				
			$troca_efetuada = 1;
	}else{
		$troca_rejeitada = 1;
		$troca_efetuada = 0;
	}

}			
				
            
 $db->disconnect();


include ("templates/fabrica_trocaprod_lojas_idetalhes.html");
}
?>