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
 
 if ($_POST['sn_pesq']){
 
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
			$rs_prod = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod, codped, codemp, idop_sn, codbarra.codprod  FROM codbarra, produtos WHERE codbarra.codbarra ='".$_POST['sn_pesq']."'  and produtos.codprod= codbarra.codprod and codbarraped = 1 and chkcb = 'Y' ORDER by codcb DESC limit 0,1 ","SQL_NONE","N");
			
			#echo "<pre>";
			#print_r($rs_prod);
    		
			if ($rs_prod)
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
				
				if ($idop_sn_pesq <> 0){
				
					#echo "AQUI";
				
					$rs_op_sn = $db->query_db("SELECT sn FROM op_sn WHERE idop_sn ='".$idop_sn_pesq."'","SQL_NONE","N");
					$sn_pesqm = $rs_op_sn->fields[0];
					
					#echo "sn_micro = $sn_pesqm";
					
					$rs_prod_micro = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod, codped, codemp, idop_sn, codbarra.codprod FROM codbarra, produtos WHERE codbarra.codbarra ='".$sn_pesqm."'  and produtos.codprod= codbarra.codprod and codbarraped = 1 and chkcb = 'Y' ORDER by codcb DESC limit 0,1  ","SQL_NONE","N");
					
					#echo "<pre>";
					#print_r($rs_prod_micro);
								
						if ($rs_prod_micro)
						{
							
							while (!$rs_prod_micro->EOF)
							{
						
							
							$codcb_pesqm = $rs_prod_micro->fields[0];
							$codbarra_pesqm = $rs_prod_micro->fields[1];
							$nomeprod_pesqm = $rs_prod_micro->fields[2];
							$codped_pesq = $rs_prod_micro->fields[3];
							$codemp_pesqm = $rs_prod_micro->fields[4];
							$idop_sn_pesqm = $rs_prod_micro->fields[5];
							$codprod_pesqm = $rs_prod_micro->fields[6];
							
							#echo "codcb_micro = $codcb_pesqm - codbarra = $codbarra_pesqm - nomeprod = $nomeprod_pesqm - codped = $codped_pesq - codemp = $codemp_pesqm - idop_sn = $idop_sn_pesqm <br>";
							
							
							$rs_prod_micro->MoveNext();
							}//WHILE
						}
            
				}else{
				
				#echo "codcb = $codcb_pesq - codbarra = $codbarra_pesq - nomeprod = $nomeprod_pesq - codped = $codped_pesq - codemp = $codemp_pesq - idop_sn = $idop_sn_pesq <br>";
				
				}
				
				
							
				$rs_prod->MoveNext();
				}//WHILE
			}
						 
			$rs_pedido = $db->query_db("SELECT pedidonf.nf, pedidonf.datanf, pedidonf.valornf, pedidonf.modo_nf,  pedido.codemp, clientenovo.nome, pedido.codbarra, dataped, if (tipocliente = 'F' , cpf, cnpj) as doc FROM pedidonf, pedido, clientenovo WHERE pedido.codped ='".$codped_pesq."'  and pedido.codped= pedidonf.codped and clientenovo.codcliente= pedido.codcliente   ","SQL_NONE","N");			 
			
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
				
				#echo "numnf = $numnf_ped - datanf_ped = $datanf_ped - valornf_ped = $valornf_ped - modonf_ped = $modonf_ped - codemp_ped = $codemp_ped - codped = $codped_pesq - nomecli_ped = $nomecli_ped <br>";
							
			$rs_pedido->MoveNext();
				}//WHILE
			}
			
  /*          
switch ($Action)
  {
    case "Verificar":
    
    
       	     			  
      $rs_prod_ant = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod FROM codbarra, produtos WHERE codbarra.codbarra ='".$codbarra_ant."' and idop_sn ='".$_POST['idop_sn']."' and codemp = '".$codemp_op."' and produtos.codprod= codbarra.codprod","SQL_NONE","N");
      $num_row_ant = $rs_prod_ant->RecordCount();
     
            
      $rs_prod_novo = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod FROM codbarra, produtos WHERE codbarra.codbarra ='".$codbarra_novo."'  and codemp = '".$codemp_op."' and codbarraped <> 1 and produtos.codprod= codbarra.codprod and codbarra.codprod ='".$rs_prod_ant->fields['codprod']."' and tipo_fab = 'P' ","SQL_NONE","N");
       $num_row_novo = $rs_prod_novo->RecordCount();
      
      
      echo "ne".$_POST['idop_sn']. "d". $num_row_ant;
      #echo "e".$num_existe;
    	
     if ($num_row_ant <> 0 and $num_row_novo <> 0 ){$Action ="Modificar";$lib_mod = 1;}
     
			  break;
			  
	case "Modificar":
	
		
	
		$rs_atualiza = $db->query_db("UPDATE codbarra SET codbarraped = 0, idop_sn = 0 WHERE codcb ='".$_POST['codcb_ant']."'","SQL_NONE","N");
		
		$rs_atualiza = $db->query_db("UPDATE codbarra SET codbarraped = 1, idop_sn = '".$_POST['idop_sn']."' WHERE codcb ='".$_POST['codcb_novo']."'","SQL_NONE","S");
		
	$Action ="Verificar";
	$end = 1;
  
    break;
    
    default:
    	
    	 $Action ="Verificar";
    	 
    break;
    
    
  }// SWITCH

            */
            
            
            
 $db->disconnect();


include ("templates/fabrica_garantia_idetalhes.html");
}
?>