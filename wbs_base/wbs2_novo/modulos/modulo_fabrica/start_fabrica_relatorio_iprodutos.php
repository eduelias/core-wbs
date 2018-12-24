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
            
            $rs_lista = $db->query_db("SELECT op_prod.codprod, op_prod.qtde FROM  op_prod, op  WHERE op.idop ='".$_GET['idop']."' and op_prod.idop = op.idop","SQL_NONE","N");
 			
             $rs_lista_op = $db->query_db("SELECT op.idop, codemp, datainicio, codprod, qtde FROM op WHERE idop ='".$_GET['idop']."' ","SQL_NONE","N");
             $codemp_op = $rs_lista_op->fields['codemp'];
             $idop = $rs_lista_op->fields['idop'];
             $qtde_lote = $rs_lista_op->fields['qtde'];
             $codprod_lote = $rs_lista_op->fields['codprod'];
			 
			 $lote_dec = 70000000 + $idop;
			 $lote_hex = strtoupper(dechex($lote_dec));
			 
			 
			 $rs_lista1 = $db->query_db("SELECT op_insumos.codprod, op_insumos.qtde,  op_insumos.unidade FROM  op_insumos, op  WHERE op.idop ='".$_GET['idop']."' and op_insumos.idop = op.idop","SQL_NONE","N");
             
 #$codemp = 1;            
            


            
            
            
            
 $db->disconnect();


include ("templates/fabrica_relatorio_iprodutos.htm");

?>