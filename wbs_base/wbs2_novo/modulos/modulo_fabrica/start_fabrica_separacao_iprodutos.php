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
            
            
 			
             $rs_lista_op = $db->query_db("SELECT op.idop, codemp, datainicio, codprod, qtde FROM op_sn , op WHERE sn ='".$_POST['sn_pesq']."' and op_sn.idop = op.idop","SQL_NONE","N");
             $codemp_op = $rs_lista_op->fields['codemp'];
             $idop = $rs_lista_op->fields['idop'];
             $qtde_lote = $rs_lista_op->fields['qtde'];
             $codprod_lote = $rs_lista_op->fields['codprod'];
             
 #$codemp = 1;            
            
switch ($Action)
  {
    case "insert_cb":
    
	
	$rs_lista_prod_op = $db->query_db("SELECT idop_prod FROM op_prod WHERE idop ='".$idop."' ","SQL_NONE","N");
	
	if ($rs_lista_prod_op)
	{
		
		while (!$rs_lista_prod_op->EOF)
		{
      	
    	     			  
      $rs_codbarra = $db->query_db("SELECT codcb, count(*) as cont FROM codbarra WHERE codbarra ='".$codbarra[$rs_lista_prod_op->fields['idop_prod']]."' and codemp = '".$codemp_op."' and codbarraped <> 1 and codprod = '".$codprod[$rs_lista_prod_op->fields['idop_prod']]."' and tipo_fab = 'P' GROUP by codprod, codemp LIMIT 0,1 ","SQL_NONE","N");
      $num_n_existe = $rs_codbarra->fields['cont'];
      
         	     			  
      #$rs_codbarra = $db->query_db("SELECT codcb, count(*) as cont FROM codbarra WHERE codbarra ='".$codbarra[$i]."' and codemp = '".$codemp_op."' and codbarraped <> 1 and codprod = '".$codprod[$i]."'  GROUP by codprod, codemp LIMIT 0,1 ","SQL_NONE","N");
      #$num_n_existe = $rs_codbarra->fields['cont'];
	  
	   #$rs_op_prod = $db->query_db("SELECT count(*) as qtde FROM op_prod WHERE idop ='".$idop."' and codprod = '".$codprod[$rs_lista_prod_op->fields['idop_prod']]."'  and idop_prod = '".$rs_lista_prod_op->fields['idop_prod']."' and cb_prod = 'NO' ","SQL_NONE","N");
	   $rs_codbarra_codprod = $db->query_db("SELECT COUNT(*) as cont FROM codbarra WHERE idop_sn ='".$_POST['idop_sn']."' and codemp = '".$codemp_op."' and codprod = '".$codprod[$i]."' and idop_prod = '".$rs_lista_prod_op->fields['idop_prod']."' and codbarraped = 1 ","SQL_NONE","N");
	   
      
      #$rs_codbarra_codprod = $db->query_db("SELECT (".$rs_op_prod->fields['qtde']." - COUNT(*)) as cont FROM codbarra WHERE idop_sn ='".$_POST['idop_sn']."' and codemp = '".$codemp_op."' and codprod = '".$codprod[$i]."' ","SQL_NONE","N");
	  #$num_existe = $rs_op_prod->fields['qtde'];
      $num_existe = $rs_codbarra_codprod->fields['cont'];
      
      #echo "ne=".$num_n_existe;
      #echo "e=".$num_existe."<br>";
    	
      
      // EXISTE CODBARRA VAZIO
      if ($num_n_existe > 0 )
      {
      	//AINDA NAO FOI INSERIDO
      	if ($num_existe == 0)
      	{
      		#echo $rs_codbarra->fields['codcb']."<br>";
      		#echo $_POST['codbarra[$i]'];
			#echo $codbarra[$rs_lista_prod_op->fields['idop_prod']]."<br>";
      		#echo $_POST['codprod[$i]'];
			#echo $codprod[$rs_lista_prod_op->fields['idop_prod']]."<br>";
			
      		#echo "NAO FOI INSERIDO<BR>";
      		
      		//ATUALIZA CODBARRA
      		$rs_atualiza = $db->query_db("UPDATE codbarra SET idop_sn = '".$_POST['idop_sn']."', codbarraped = '1', idop_prod = '".$rs_lista_prod_op->fields['idop_prod']."' WHERE codcb = '".$rs_codbarra->fields['codcb']."'","SQL_NONE","N");
			$rs_atualiza = $db->query_db("UPDATE op_prod SET cb_prod = 'OK' WHERE idop_prod ='".$rs_lista_prod_op->fields['idop_prod']."'","SQL_NONE","N");
      		
      		//ATUALIZA ESTOQUE 
      		$rs_atualiza = $db->query_db("UPDATE estoque SET qtde = qtde - 1, reserva = reserva - 1 WHERE codemp = '".$codemp_op."' and codprod = '".$codprod[$rs_lista_prod_op->fields['idop_prod']]."'","SQL_NONE","N");
      		#echo"qtde=". $est_novo;
      		
      		
      	
      	}
      	// JA ESTA INSERIDO
      	else{
      		
      		#echo $rs_codbarra->fields['codcb'];
      		#echo $_POST['codbarra[$i]'];
      		#echo $_POST['codprod[$i]'];
      		#echo "INSERIDO<bR>";
      	
      	}
      
      
      }
	 	#$ix++;
		$rs_lista_prod_op->MoveNext();
	}//WHILE
    }//EXISTE WHILE
	
	
	
	
    
     $grava =1;
    
     // MICRO TERMINADO
     $rs_num_prod_op = $db->query_db("SELECT count(*) as cont FROM op_prod WHERE idop ='".$idop."' ","SQL_NONE","N");
     $rs_num_prod_ins = $db->query_db("SELECT count(*) as cont FROM codbarra WHERE idop_sn ='".$_POST['idop_sn']."' ","SQL_NONE","N");
	 $rs_codbarra_ins = $db->query_db("SELECT count(*) as cont FROM codbarra WHERE codbarra ='".$sn_pesq."' and codemp = '".$codemp_op."' and codbarraped <> 1 ","SQL_NONE","N");
     
     #echo "qtde_prod=".$rs_num_prod_op->fields['cont']."qtde_ins=".$rs_num_prod_ins->fields['cont']."cb_ins=".$rs_codbarra_ins->fields['cont'];
  
     if(($rs_num_prod_op->fields['cont'] == $rs_num_prod_ins->fields['cont']) and $rs_codbarra_ins->fields['cont'] == 0 )
     {
     	$rs_atualiza = $db->query_db("UPDATE op_sn SET cb = 'OK', codvend = '".$codvend."' WHERE idop_sn ='".$_POST['idop_sn']."'","SQL_NONE","N");
     	
     	//CRIA CODBARRA DO MICRO
     	$rs_cria_ = $db->query_db("INSERT INTO codbarra (codbarra, codemp, flag_acerto, idop, codprod, datainsert) VALUES ('$sn_pesq', '$codemp_op', 'S1', '$idop', '$codprod_lote', NOW())","SQL_NONE","N");
     	//ATUALIZA ESTOQUE 
      	$rs_atualiza = $db->query_db("UPDATE estoque SET qtde = qtde + 1 WHERE codemp = '".$codemp_op."' and codprod = '".$codprod_lote."'","SQL_NONE","N");
   		
   		$micro_ok = 1;
      	
     }
     
      // LOTE TERMINADO
     $rs_num_sn_op = $db->query_db("SELECT count(*) as cont FROM op_sn WHERE idop ='".$idop."' and cb = 'OK' ","SQL_NONE","N");
          
     if($rs_num_sn_op->fields['cont'] == $qtde_lote)
     {
     	$rs_atualiza = $db->query_db("UPDATE op SET datafim = NOW() , hist = 'S' WHERE idop ='".$idop."'","SQL_NONE","N");
     }
     
     
			  break;
   
  }// SWITCH

	$rs_lista = $db->query_db("SELECT idop_prod, idop_sn, op_prod.codprod, cb_prod FROM op_sn , op_prod WHERE sn ='".$_POST['sn_pesq']."' and cb = 'NO' and op_sn.idop = op_prod.idop ","SQL_NONE","N");
            
            
            
 $db->disconnect();


include ("templates/fabrica_separacao_iprodutos.htm");

?>