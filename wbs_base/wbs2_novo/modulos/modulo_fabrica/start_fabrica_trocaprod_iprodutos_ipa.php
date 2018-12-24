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
 			
 			 
            
switch ($Action)
  {
    case "Verificar":
    
    
       	     			  
      $rs_prod_ant = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod FROM codbarra, produtos WHERE codbarra.codbarra ='".$codbarra_ant."' and idop_sn ='".$_POST['idop_sn']."' and codemp = '".$codemp_op."' and produtos.codprod= codbarra.codprod","SQL_NONE","N");
      $num_row_ant = $rs_prod_ant->RecordCount();
     
            
      $rs_prod_novo = $db->query_db("SELECT codcb, codbarra.codprod, nomeprod FROM codbarra, produtos WHERE codbarra.codbarra ='".$codbarra_novo."'  and codemp = '".$codemp_op."' and codbarraped <> 1 and produtos.codprod= codbarra.codprod and codbarra.codprod ='".$rs_prod_ant->fields['codprod']."'  ","SQL_NONE","N");
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

            
            
            
            
 $db->disconnect();


include ("templates/fabrica_trocaprod_iprodutos_ipa.html");

?>