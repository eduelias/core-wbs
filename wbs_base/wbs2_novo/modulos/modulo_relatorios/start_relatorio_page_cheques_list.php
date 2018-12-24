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

	case "pesquisa":


		break;
		
		case "sf":

        if ($sf_pesq == 'NO'){
        $db->connect_wbs();
        #$db->$conn->debug = true;
        $rs_up = $db->query_db("UPDATE fin_cheques SET sf='OK', datasf = NOW(), sf_pg='NO', datasf_pg = '0000-00-00 00:00:00' WHERE codch = '$codch_pesq'","SQL_NONE","S");
        
        $rs_ch = $db->query_db("SELECT codcliente FROM pedido, fin_cheques WHERE codch = '$codch_pesq' and pedido.codped=fin_cheques.codped","SQL_NONE","N");

            if ($rs_ch->fields['codcliente'] <> 0){
            $rs_cliente = $db->query_db("UPDATE clientenovo SET rescredito='CHEQUE SEM FUNDO' WHERE codcliente = '".$rs_ch->fields['codcliente']."'","SQL_NONE","N");
            }
        
        $ch_sf = "ALL";
        $db->disconnect();
        }
		break;

		case "sfpg":
		
        if ($sf_pesq == 'OK' and $sfpg_pesq == 'NO'){
        $db->connect_wbs();
        #$db->$conn->debug = true;
        $rs_up = $db->query_db("UPDATE fin_cheques SET sf_pg='PG', datasf_pg = NOW(), posfin = 'PG' WHERE codch = '$codch_pesq'","SQL_NONE","S");
        
        $rs_ch = $db->query_db("SELECT codcliente FROM pedido, fin_cheques WHERE codch = '$codch_pesq' and pedido.codped=fin_cheques.codped","SQL_NONE","N");

        if ($rs_ch->fields['codcliente'] <> 0){
        $rs_cliente = $db->query_db("UPDATE clientenovo SET rescredito='' WHERE codcliente = '".$rs_ch->fields['codcliente']."'","SQL_NONE","N");
        }
        
        $ch_sf = "ALL";
        $db->disconnect();
        }

		break;
		
        case "sf_erase":

        if ($sf_pesq == 'OK' and $sfpg_pesq == 'NO'){
        $db->connect_wbs();
        #$db->$conn->debug = true;
        $rs_up = $db->query_db("UPDATE fin_cheques SET sf='NO', sf_pg='NO', datasf_pg = '0000-00-00 00:00:00', dataju = '0000-00-00 00:00:00', datasf = '0000-00-00 00:00:00' WHERE codch = '$codch_pesq'","SQL_NONE","S");

        $rs_ch = $db->query_db("SELECT codcliente FROM pedido, fin_cheques WHERE codch = '$codch_pesq' and pedido.codped=fin_cheques.codped","SQL_NONE","N");

        if ($rs_ch->fields['codcliente'] <> 0){
        $rs_cliente = $db->query_db("UPDATE clientenovo SET rescredito='' WHERE codcliente = '".$rs_ch->fields['codcliente']."'","SQL_NONE","N");
        }
        
        $ch_sf = "ALL";
        $db->disconnect();
        }

		break;

		case "ju":
		
        if ($sf_pesq == 'OK' and $sfpg_pesq == 'NO'){
        $db->connect_wbs();
        #$db->$conn->debug = true;
        $rs_up = $db->query_db("UPDATE fin_cheques SET posfin='JU', dataju = NOW() WHERE codch = '$codch_pesq'","SQL_NONE","S");
        
        $ch_sf = "ALL";
        $db->disconnect();
        }

		break;

}

       
        if ($ch_sf == "ALL" ){

            if ($bco_pesq <> "" and $numch_pesq <> ""){

            $condicao = "bco = '$bco_pesq' and numcheq = '$numch_pesq'";
           

            }
        }else{

            if ($ch_sf == "PG" ){$condsf = " sf = 'OK' and sf_pg ='PG'";}
            if ($ch_sf == "NO" ){$condsf = " sf = 'OK' and sf_pg ='NO'";}
            if ($ch_sf == "JU" ){$condsf = " sf = 'OK' and posfin = 'JU'";}


                if ($bco_pesq <> "" and $numch_pesq <> ""){
                    $condicao = " bco = '$bco_pesq' and numcheq = '$numch_pesq' and ".$condsf;
                    
                }else{
                    $condicao = $condsf;
                    
                }
        }
        #echo $condicao;
        if ($condicao <> ""){
           $db->connect_wbs();
           #$db->$conn->debug = true;
           $rs = $db->query_db("SELECT codch, bco, ag, cc, numcheq, valor, posfin, datavenc, sf, sf_pg FROM fin_cheques  WHERE ".$condicao,"SQL_NONE","N");
           $db->disconnect();
           
        }

include ("templates/relatorio_page_cheques_list.htm");

?>
