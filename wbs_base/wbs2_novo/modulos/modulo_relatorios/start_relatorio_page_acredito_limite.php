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
        $db->debug = true;
        
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
          
        
        
		
		//RELATORIO BOLETAS COM PEDIDOS DE CLIENTE
       $rs_per = $db->query_db("SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=-1000, if( DATEDIFF( datapg, datavenc ) <=3, 1, 0 ) , 0 ) ) AS per03, SUM( if( DATEDIFF( datapg, datavenc ) >=-1000, if( DATEDIFF( datapg, datavenc ) <=3, valorpago, 0 ) , 0 ) ) AS val03, SUM( if( DATEDIFF( datapg, datavenc ) >=4, if( DATEDIFF( datapg, datavenc ) <=14, 1, 0 ) , 0 ) ) AS per414, SUM( if( DATEDIFF( datapg, datavenc ) >=4, if( DATEDIFF( datapg, datavenc ) <=14, valorpago, 0 ) , 0 ) ) AS val414, SUM( if( DATEDIFF( datapg, datavenc ) >=15, if( DATEDIFF( datapg, datavenc ) <=30, 1, 0 ) , 0 ) ) AS per1530, SUM( if( DATEDIFF( datapg, datavenc ) >=15, if( DATEDIFF( datapg, datavenc ) <=30, valorpago, 0 ) , 0 ) ) AS val1530, SUM( if( DATEDIFF( datapg, datavenc ) >30,  1, 0 )  ) AS per30, SUM( if( DATEDIFF( datapg, datavenc ) >=30,  valorpago, 0 )  ) AS val30 FROM `fin_car` WHERE codcliente ='$codcliente_pesq' AND hist = 'S' AND valorpago <> 0 AND opcaixa = '02.04' and datavenc >= DATE_SUB( NOW( ) , INTERVAL 120 DAY )","SQL_NONE","N");
       $per0a3 = $rs_per->fields[0];
	   $val0a3 = $rs_per->fields[1];
	   $per4a14 = $rs_per->fields[2];
	   $val4a14 = $rs_per->fields[3];
	   $per14a30 = $rs_per->fields[4];
	   $val14a30 = $rs_per->fields[5];
	   $per30 = $rs_per->fields[6];
	   $val30 = $rs_per->fields[7];
	   $per_total = $per0a3+$per4a14+$per14a30+$per30;
	   $val_total = $val0a3+$val4a14+$val14a30+$val30;
	   
	    $rs_aper = $db->query_db("SELECT SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=-1000, if( DATEDIFF( datapg, datavenc ) <=3, 1, 0 ) , 0 ) )  FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS per03, SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=-1000, if( DATEDIFF( datapg, datavenc ) <=3, valorpago, 0 ) , 0 ) ) FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS val03 ,  SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=4, if( DATEDIFF( datapg, datavenc ) <=14, 1, 0 ) , 0 ) )  FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS per414, SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=4, if( DATEDIFF( datapg, datavenc ) <=14, valorpago, 0 ) , 0 ) ) FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS val414, SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=15, if( DATEDIFF( datapg, datavenc ) <=30, 1, 0 ) , 0 ) )  FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS per1530, SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >=15, if( DATEDIFF( datapg, datavenc ) <=30, valorpago, 0 ) , 0 ) ) FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS val1530,  SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >30,  1, 0 )  )  FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS per30, SUM((SELECT SUM( if( DATEDIFF( datapg, datavenc ) >30, valorpago, 0 )  ) FROM fin_car WHERE codped = pedido.codped and hist = 'S' and valorpago <> 0 and opcaixa = '02.04')) AS val30 FROM `pedido` WHERE avalista ='$codcliente_pesq' AND cancel <> 'OK' and dataped >= DATE_SUB( NOW( ) , INTERVAL 120 DAY ) ","SQL_NONE","N");
       $aper0a3 = $rs_aper->fields[0];
	   $aval0a3 = $rs_aper->fields[1];
	   $aper4a14 = $rs_aper->fields[2];
	   $aval4a14 = $rs_aper->fields[3];
	   $aper14a30 = $rs_aper->fields[4];
	   $aval14a30 = $rs_aper->fields[5];
	   $aper30 = $rs_aper->fields[6];
	   $aval30 = $rs_aper->fields[7];
	   $aper_total = $aper0a3+$aper4a14+$aper14a30+$aper30;
	   $aval_total = $aval0a3+$aval4a14+$aval14a30+$aval30;
		
		
		$rs_cliente = $db->query_db("SELECT limite_credito  FROM clientenovo WHERE codcliente = '$codcliente_pesq' ","SQL_NONE","N");
		$limite = $rs_cliente->fields[0];
		
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
		

        include ("templates/relatorio_page_acredito_limite.html");

        break;
}

?>