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
#$db->$conn->debug = true;

#echo $Action;

switch ($Action)
{

	case "ins_log":
		
		
		#echo "'$codcar_bl', '$contato_bl', '$setor_bl', '$data_agenda'";
		#echo "AQUI INS = $codcliente_bl";
		if ($descricao_log <> ""){
		$rs_update = $db->query_db("INSERT INTO clientenovo_cobranca (codcliente, datacob, descricao, login, codcar, contato, setor, data_agenda) VALUES ('$codcliente_bl' ,  NOW(), '$descricao_log', '$login', '$codcar_bl', '$contato_bl', '$setor_bl', '$data_agenda' )","SQL_NONE","N");
		#$tipolist = 'N';
		}
		
	break;
	
	case "del_log":
		
		
		#echo "'$codcar_bl', '$contato_bl', '$setor_bl', '$data_agenda'";
		#echo "AQUI INS = $codcliente_bl";
		
		$rs_delete = $db->query_db("DELETE FROM clientenovo_cobranca WHERE codvisita = '$codlog_bl' ","SQL_NONE","N");
	
		
		
	break;

	case "pesquisa":

             

		break;
}


 			if ($tipolist == 'S')
        {
                $condicao3 = " and blacklist = 'S' ";   
        }else{
		
				$condicao3 = " and blacklist = 'N' ";   
		}

      

    	#echo("$condicao3 - $controle - $len - tipocliente_pesq = $tipocliente_pesq<BR>");

    	#if ($controle == 0){

            
			
			 #$rs = $db->conn->Execute("SELECT SUM( if( datavenc < NOW( ), valordevido, 0) ) as vtotal, SUM( if( datavenc >= NOW( ) , 0, 1 ) ) AS pos,  if( ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) =0, codcliente, ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) ) AS cliente_ped, (select blacklist from clientenovo WHERE codcliente = cliente_ped ) as blacklist FROM fin_car WHERE valorpago =0 AND hist = 'N' AND opcaixa = '02.04' and codcliente = $codcliente_bl GROUP BY cliente_ped HAVING pos >0 ".$condicao3." ORDER BY vtotal DESC");
           #$db->retorno_db($rs,"N");

			/*
            $rs1 = $db->conn->Execute("SELECT codcliente, nome, cpf, cnpj, dddtel1, tel1, endereco, numero, complemento, bairro, cep, cidade, estado, rescredito  FROM clientenovo WHERE  $condicao3 ORDER BY codcliente, nome");
            $db->retorno_db($rs1,"N");
           */

            #$db->disconnect();

    	#}//CONTROLE
		
		$rs_parc = $db->query_db("SELECT datavenc, valordevido, if (datavenc < NOW(), 0, 1) as pos, (select nome from clientenovo where codcliente = fin_car.codcliente) as cliente,  (select codbarra from pedido where codped = fin_car.codped) as codbarra, numdoc, opcaixa , if((DATEDIFF(NOW(), datavenc)) < 0, 0, DATEDIFF(NOW(), datavenc))  as atraso, codcar FROM fin_car WHERE valorpago = 0  and hist = 'N' and codcar='".$codcar_bl."' and (opcaixa = '02.04' or opcaixa = '02.03')  ORDER BY datavenc ","SQL_NONE","N");

        include ("templates/relatorio_page_cobranca_log.html");


/*
SELECT datavenc, SUM( valordevido ) , SUM( if( datavenc > NOW( ) , 0, 1 ) ) AS pos, (SELECT nome FROM clientenovo WHERE codcliente = fin_car.codcliente ) AS cliente, ( SELECT codbarra FROM pedido WHERE codped = fin_car.codped ) AS codbarra, numdoc, ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) AS aval, if( ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) =0, codcliente, ( SELECT avalista FROM pedido WHERE codped = fin_car.codped ) ) AS cliente_ped FROM fin_car WHERE valorpago =0 AND hist = 'N' AND opcaixa = '02.04' GROUP BY cliente_ped HAVING pos >0 ORDER BY codbarra
*/

?>