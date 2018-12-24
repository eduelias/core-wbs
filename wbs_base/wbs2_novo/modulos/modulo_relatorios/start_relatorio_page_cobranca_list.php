<?php

/* 
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (vers�o 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright � 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();
#$db->$conn->debug = true;

echo $Action;

switch ($Action)
{

	case "ins_jur":
		
		#echo "AQUI INS = $codcliente_bl";
		$rs_update = $db->query_db("UPDATE clientenovo SET blacklist = 'S' WHERE codcliente = $codcliente_bl","SQL_NONE","N");
		$tipolist = 'N';
		
	break;
	
	case "del_jur":
		
		#echo "AQUI DEL = $codcliente_bl";
		$rs_update = $db->query_db("UPDATE clientenovo SET blacklist = 'N' WHERE codcliente = $codcliente_bl","SQL_NONE","N");
		$tipolist = 'S';
		
		
	break;
	
	case "ins_pg_perd":
		
		#echo "AQUI DEL = $codcliente_bl";
		$rs_update = $db->query_db("UPDATE clientenovo SET pg_perdido = 'S' WHERE codcliente = $codcliente_bl","SQL_NONE","N");
		$tipolist = 'N';
		
		
	break;
	
	case "del_pg_perd":
		
		#echo "AQUI DEL = $codcliente_bl";
		$rs_update = $db->query_db("UPDATE clientenovo SET pg_perdido = 'N' WHERE codcliente = $codcliente_bl","SQL_NONE","N");
		$tipolist = 'N';
		
		
	break;

	case "pesquisa":

             

		break;
}


 			if ($tipolist == 'S')
        {
                $condicao3 = " and blacklist = 'S' and vend like '%$nomevend_pesq%' ";   
        }else{
		
				$condicao3 = " and blacklist <> 'S' and vend like '%$nomevend_pesq%'";   
		}

		#$codgrp_vend =  3;
		
		  if ( $codgrp_vend ==  43 or $codgrp_vend == 2 or $codgrp_vend ==  52 or $codgrp_vend == 80 )
        {
                $condicao4 = " ";   
        }else{
		
				$condicao4 = " and vend = '$login'";   
		}
      

    	#echo("$condicao3 - $controle - $len - tipocliente_pesq = $tipocliente_pesq<BR>");

    	#if ($controle == 0){

            
			
			 $rs = $db->conn->Execute("SELECT COUNT(*) as num_bol, SUM( if( datavenc < NOW( ), valordevido, 0) ) as vtotal, SUM( if( datavenc >= NOW( ) , 0, 1 ) ) AS pos,  if( ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) =0, codcliente, ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) ) AS cliente_ped, (select blacklist from clientenovo WHERE codcliente = cliente_ped ) as blacklist, (select pg_perdido from clientenovo WHERE codcliente = cliente_ped ) as pg_perdido, (SELECT COUNT(*)
FROM clientenovo_cobranca WHERE codcliente =cliente_ped  ) as num_contato, (SELECT DATE_FORMAT(data_agenda, '%d-%m-%Y' )
FROM clientenovo_cobranca WHERE codcliente =cliente_ped ORDER by data_agenda limit 1) as data_visita, (SELECT logincad FROM clientenovo WHERE codcliente = cliente_ped) as vend FROM fin_car WHERE valorpago =0 AND hist = 'N' AND (opcaixa = '02.04' or opcaixa = '02.03')  GROUP BY cliente_ped HAVING pos >0 ".$condicao3." ".$condicao4." ORDER BY data_visita ASC, vtotal DESC");
            $db->retorno_db($rs,"N");

			/*
            $rs1 = $db->conn->Execute("SELECT codcliente, nome, cpf, cnpj, dddtel1, tel1, endereco, numero, complemento, bairro, cep, cidade, estado, rescredito  FROM clientenovo WHERE  $condicao3 ORDER BY codcliente, nome");
            $db->retorno_db($rs1,"N");
           */
		   
		   
         
            $db->disconnect();

    	#}//CONTROLE

        include ("templates/relatorio_page_cobranca_list.html");


/*
SELECT datavenc, SUM( valordevido ) , SUM( if( datavenc > NOW( ) , 0, 1 ) ) AS pos, (SELECT nome FROM clientenovo WHERE codcliente = fin_car.codcliente ) AS cliente, ( SELECT codbarra FROM pedido WHERE codped = fin_car.codped ) AS codbarra, numdoc, ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) AS aval, if( ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) =0, codcliente, ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) ) AS cliente_ped FROM fin_car WHERE valorpago =0 AND hist = 'N' AND opcaixa = '02.04' GROUP BY cliente_ped HAVING pos >0 ORDER BY codbarra
*/

?>