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
        
        $rs_data = $db->query_db("SELECT NOW() - INTERVAL 12 MONTH as dataini, NOW() - INTERVAL 7 DAY as data7 ","SQL_NONE","N");

        $rs = $db->query_db("SELECT codcliente, codped FROM pedido WHERE codcliente = '$codcliente_pesq' AND cancel <>'OK' and dataped >= '".$rs_data->fields['dataini']."' ORDER by codped","SQL_NONE","N");

        if ($rs) {
		  while (!$rs->EOF) {

            // TOTAL COMPRADO POR FORMAPG
            $rs_parc = $db->query_db("SELECT tipo, SUM(vp) as vp  FROM pedidoparcelas WHERE codped = '".$rs->fields['codped']."' GROUP by tipo ORDER by tipo","SQL_NONE","N");
             if ($rs_parc) {
                  while (!$rs_parc->EOF) {
                $valor_tipo[$rs_parc->fields['tipo']] = $valor_tipo[$rs_parc->fields['tipo']] + $rs_parc->fields['vp'];
                   
                $rs_parc->MoveNext();
           		}//WHILE
            }
            // CHEQUES PAGOS
            $rs_ch = $db->query_db("SELECT SUM(valor) as valor  FROM fin_cheques WHERE codped = '".$rs->fields['codped']."' and posfin ='PG' and ((sf = 'NO' and sf_pg= 'NO') OR (sf = 'OK' and sf_pg= 'OK')) GROUP by codped ","SQL_NONE","N");
            $valorch_pg = $valorch_pg + $rs_ch->fields['valor'];
            //CHEQUES COFRE A VENCER
            $rs_ch_av = $db->query_db("SELECT SUM(valor) as valor  FROM fin_cheques WHERE codped = '".$rs->fields['codped']."' and posfin ='CO' and datavenc > NOW() GROUP by codped ","SQL_NONE","N");
            $valorch_coav = $valorch_coav + $rs_ch_av->fields['valor'];
            //CHEQUES COFRE ATRASO
            $rs_ch_dv = $db->query_db("SELECT SUM(valor) as valor  FROM fin_cheques WHERE codped = '".$rs->fields['codped']."' and posfin ='CO' and datavenc >= '".$rs_data->fields['dataini']."' and datavenc < NOW()  GROUP by codped ","SQL_NONE","N");
            $valorch_codv = $valorch_codv + $rs_ch_dv->fields['valor'];
            //CHEQUES PAGO SEM FUNDO
            $rs_ch_sf = $db->query_db("SELECT SUM(valor) as valor  FROM fin_cheques WHERE codped = '".$rs->fields['codped']."' and sf ='OK' and sf_pg = 'NO' and datavenc >= '".$rs_data->fields['dataini']."' and datavenc < NOW()  GROUP by codped ","SQL_NONE","N");
            $valorch_sf = $valorch_sf + $rs_ch_sf->fields['valor'];
            //CHEQUES ULTIMOS 7 DIAS
            $rs_ch_7 = $db->query_db("SELECT SUM(valor) as valor  FROM fin_cheques WHERE codped = '".$rs->fields['codped']."' and posfin ='PG' and ((sf = 'NO' and sf_pg= 'NO') OR (sf = 'OK' and sf_pg= 'OK')) and datavenc >= '".$rs_data->fields['data7']."'   GROUP by codped ","SQL_NONE","N");
            //CHEQUES PAGO SEM FUNDO TOTAL
            $rs_ch_sft = $db->query_db("SELECT COUNT(*) as valor  FROM fin_cheques WHERE codped = '".$rs->fields['codped']."' and sf ='OK'   GROUP by codped ","SQL_NONE","N");
            $valorch_sft = $valorch_sft + $rs_ch_sft->fields['valor'];
            
            $valorch_7 = $valorch_7 + $rs_ch_7->fields['valor'];
            

        
        //CAR PAGOS
       $rs_car_pg = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codped = '".$rs->fields['codped']."' and hist = 'S' and valorpago <> 0 and datavenc >='".$rs_data->fields['dataini']."' and opcaixa <> '02.30' and opcaixa <> '02.31' GROUP by codped ","SQL_NONE","N");
       $valorcar_pg = $valorcar_pg + $rs_car_pg->fields['valor'];
       //CAR A VENCER
       $rs_car_av = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codped = '".$rs->fields['codped']."' and hist = 'N' and valorpago = 0 and datavenc >= NOW() and opcaixa <> '02.30' and opcaixa <> '02.31' GROUP by codped ","SQL_NONE","N");
       $valorcar_av = $valorcar_av + $rs_car_av->fields['valor'];
       //CAR VENCIDOS
       $rs_car_dv = $db->query_db("SELECT SUM(valordevido) as valor  FROM fin_car WHERE codped = '".$rs->fields['codped']."' and hist = 'N' and valorpago = 0 and datavenc >= '".$rs_data->fields['dataini']."' and datavenc < NOW() and opcaixa <> '02.30' and opcaixa <> '02.31' GROUP by codped ","SQL_NONE","N");
       $valorcar_dv = $valorcar_dv + $rs_car_dv->fields['valor'];
          
        
          $rs->MoveNext();
		}//WHILE
       }
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
        #echo "<BR>CH: $valorch_pg - $valorch_coav - $valorch_codv";
        #echo "<br>CAR: $valorcar_pg - $valorcar_av - $valorcar_dv";
        #print "</pre>";
        
        #foreach ($valor_tipo as $tipo => $valor) {
          #  echo "$tipo => $valor.\n";
			#echo "FOR: $value";
		#}


        $db->disconnect();
        
        include ("templates/relatorio_page_cliente_ped_limite.htm");

        break;
}

?>