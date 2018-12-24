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

 $db->connect_wbs();

#echo("$pagina - $ini_reg");
	#$codgrp_vend =  3;

 	 if ( $codgrp_vend ==  43 or $codgrp_vend == 2 or $codgrp_vend ==  52)
        {
				$condicao2 = " ";
                $condicao4 = " ";   
        }else{
				$condicao2 = " , (SELECT logincad FROM clientenovo WHERE codcliente = fin_car.codcliente) as vend";
				$condicao4 = " GROUP by vend HAVING vend = '$login'";   
		}


 $rs = $db->conn->Execute("SELECT  SUM( if( datavenc < NOW( ), if((SELECT blacklist FROM clientenovo WHERE codcliente = fin_car.codcliente) = 'N',   valordevido, 0),0 )) as vpendente, SUM( if( datavenc < NOW( ), if((SELECT blacklist FROM clientenovo WHERE codcliente = fin_car.codcliente) = 'S',   valordevido, 0),0 )) as vjuridico, SUM( if( datavenc < NOW( ), if((SELECT pg_perdido FROM clientenovo WHERE codcliente = fin_car.codcliente) = 'S',   valordevido, 0),0 )) as vperdido ".$condicao2."  FROM `fin_car` WHERE valorpago =0 AND hist = 'N' AND (opcaixa = '02.04' or opcaixa = '02.03') ".$condicao4." ");
         $db->retorno_db($rs,"N");
		 
		 #echo "<pre>";
		 #print_r($rs->sql);

  $db->disconnect();
  
  
include ("templates/relatorio_page_cobranca_pesq.html");

?>
