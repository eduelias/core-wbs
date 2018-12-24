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
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    	// Pesquisar Cliente
	case "pesquisa":



        $db->connect_wbs();
        #$db->$conn->debug = true;
        
        
        
         $rs_forma = $db->query_db("SELECT codformagrupo FROM fin_cap_forma  WHERE codch = '$codch_pesq'","SQL_NONE","N");
        
         if ($rs_forma->fields['codformagrupo'] <> ""){
         $rs = $db->query_db("SELECT opcaixa, descricao, codfor, datapg, valordevido, obs FROM fin_cap WHERE codformagrupo = '".$rs_forma->fields['codformagrupo']."'","SQL_NONE","N");
         }

         $rs_ped = $db->query_db("SELECT codbarra, nome, dataped, posfin FROM pedido, fin_cheques, clientenovo WHERE codch = '$codch_pesq' and pedido.codped=fin_cheques.codped and pedido.codcliente=clientenovo.codcliente","SQL_NONE","N");

        
        $db->disconnect();

		break;
}

include ("templates/relatorio_page_cheques_fpg.htm");

?>
