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
        //$db->debug = true;
        
      
	  
	  	/// AVALISTA
	  
	  	  //CAR COMPRADO
       $rs_acar_total = $db->query_db("SELECT SUM((SELECT SUM(valordevido) as valor  FROM fin_car WHERE codped = pedido.codped and opcaixa = '02.04')) as valor  FROM pedido  WHERE avalista = '$codcliente_pesq' AND cancel <>'OK' ","SQL_NONE","N");
       $valoracar_total = $rs_acar_total->fields['valor'];
        //CAR PAGOS
       $rs_acar_pg = $db->query_db("SELECT SUM((SELECT SUM(valorpago) as valor  FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04') )as valor  FROM pedido  WHERE avalista = '$codcliente_pesq' AND cancel <>'OK'  ","SQL_NONE","N");
       $valoracar_pg = $rs_acar_pg->fields['valor'];
       //CAR A VENCER
       $rs_acar_av = $db->query_db("SELECT SUM((SELECT SUM(valordevido) as valor  FROM fin_car WHERE codped = pedido.codped and hist = 'N' and valorpago = 0 and datavenc >= NOW() and opcaixa = '02.04')) as valor  FROM pedido WHERE  avalista = '$codcliente_pesq' AND cancel <>'OK'  ","SQL_NONE","N");
       $valoracar_av = $rs_acar_av->fields['valor'];
       //CAR VENCIDOS (ATRASO)
       $rs_acar_dv = $db->query_db("SELECT SUM((SELECT SUM(valordevido) as valor  FROM fin_car WHERE codped = pedido.codped and hist = 'N' and valorpago = 0 and datavenc < NOW() and opcaixa = '02.04')) as valor  FROM pedido WHERE  avalista = '$codcliente_pesq' AND cancel <>'OK'  ","SQL_NONE","N");
       $valoracar_dv = $rs_acar_dv->fields['valor'];
             
                
 		// PEDIDO (CONTAS A RECEBER)

         //CAR COMPRADO
       $rs_car_total = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '$codcliente_pesq' and opcaixa = '02.04'","SQL_NONE","N");
       $valorcar_total = $rs_car_total->fields['valor'];
        //CAR PAGOS
       $rs_car_pg = $db->query_db("SELECT SUM(valorpago) as valor  FROM fin_car WHERE codcliente = '$codcliente_pesq' and hist = 'S' and valorpago <> 0 and (opcaixa = '02.04' or opcaixa = '02.03') ","SQL_NONE","N");
       $valorcar_pg = $rs_car_pg->fields['valor'];
       //CAR A VENCER
       $rs_car_av = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '$codcliente_pesq' and hist = 'N' and valorpago = 0 and datavenc >= NOW() and opcaixa = '02.04' ","SQL_NONE","N");
       $valorcar_av = $rs_car_av->fields['valor'];
       //CAR VENCIDOS (ATRASO)
       $rs_car_dv = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '$codcliente_pesq' and hist = 'N' and valorpago = 0 and datavenc < NOW() and opcaixa = '02.04' ","SQL_NONE","N");
       $valorcar_dv = $rs_car_dv->fields['valor'];
	   
	    //CAR A VENCER ACORDO
       $rs_car_av_acor = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '$codcliente_pesq' and hist = 'N' and valorpago = 0 and datavenc >= NOW() and opcaixa = '02.03' ","SQL_NONE","N");
       $valorcar_av_acor = $rs_car_av_acor->fields['valor'];
       //CAR VENCIDOS (ATRASO) ACORDO
       $rs_car_dv_acor = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '$codcliente_pesq' and hist = 'N' and valorpago = 0 and datavenc < NOW() and opcaixa = '02.03' ","SQL_NONE","N");
       $valorcar_dv_acor = $rs_car_dv_acor->fields['valor'];
          
      
		 $rs = $db->conn->Execute("SELECT  SUM( if( datavenc < NOW( ), if((SELECT blacklist FROM clientenovo WHERE codcliente = fin_car.codcliente) = 'N',   valordevido, 0),0 )) as vpendente, SUM( if( datavenc < NOW( ), if((SELECT blacklist FROM clientenovo WHERE codcliente = fin_car.codcliente) = 'S',   valordevido, 0),0 )) as vjuridico, SUM( if( datavenc < NOW( ), if((SELECT pg_perdido FROM clientenovo WHERE codcliente = fin_car.codcliente) = 'S',   valordevido, 0),0 )) as vperdido FROM `fin_car` WHERE valorpago =0 AND hist = 'N' AND (opcaixa = '02.04' or opcaixa = '02.03')");
         $db->retorno_db($rs,"N");
        
/*
       $rs->Move(0);
       //CAR PAGOS
       $rs_car_pg = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '".$rs->fields['codcliente']."' and hist = 'S' and valorpago <> 0 and datavenc >='".$rs_data->fields['dataini']."' GROUP by codcliente ","SQL_NONE","N");
       $valorcar_pg = $valorcar_pg + $rs_car_pg->fields['valor'];
       //CAR A VENCER
       $rs_car_av = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '".$rs->fields['codcliente']."' and hist = 'N' and valorpago = 0 and datavenc > NOW() GROUP by codcliente ","SQL_NONE","N");
       $valorcar_av = $valorcar_av + $rs_car_av->fields['valor'];
       //CAR VENCIDOS
       $rs_car_dv = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codcliente = '".$rs->fields['codcliente']."' and hist = 'N' and valorpago = 0 and datavenc < NOW() and datavenc >= '".$rs_data->fields['dataini']."' GROUP by codcliente ","SQL_NONE","N");
       $valorcar_dv = $valorcar_dv + $rs_car_dv->fields['valor'];
*/

        #print "<pre>";
        #print_r($valor_tipo);
		#echo "<BR>cliente = $codcliente_pesq";
        #echo "<BR>CH: $valorch_pg - $valorch_coav - $valorch_codv";
        #echo "<br>CAR: $valorcar_pg - $valorcar_av - $valorcar_dv";
		#echo "<br>CARAVA: $valoracar_pg - $valoracar_av - $valoracar_dv";
        #print "</pre>";
        
        #foreach ($valor_tipo as $tipo => $valor) {
          #  echo "$tipo => $valor.\n";
			#echo "FOR: $value";
		#}


        $db->disconnect();
		

        include ("templates/relatorio_page_cobranca_limite.html");

        break;
}

?>