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
        //$db->$conn->debug = true;

 
		$cond = "";
        // PESQUISA SOMATORIO PRODUTOS
        $rs_total = $db->query_db("SELECT codped  FROM pedido WHERE avalista = '$codcliente_pesq' and cancel <> 'OK' and caixa = 'OK' ","SQL_NONE","N");

		
        if ($rs_total) {
		
	
		  while (!$rs_total->EOF) {

            $cond .= " OR codped = ".$rs_total->fields['codped'];
    

          $rs_total->MoveNext();
		}//WHILE

		
       }
       
       #$in=array(0=>array('felipe'=>"X"));
       #$array67 = $db->array_push_before($rs_arr,$in, 0);
       #$array67 = array_merge_recursive($in, $rs_1);
       
        // PESQUISA POR PARCELAS
    	#$rs_parc = $db->query_db("SELECT datavenc, vp, tipo, numcheq, banco , parcpg , codparcped  FROM pedidoparcelas WHERE codped = '$codped_pesq' ORDER BY datavenc ","SQL_NONE","N");



	$rs_parc = $db->query_db("SELECT datavenc, valordevido, if (datavenc <= NOW(), 0, 1) as pos, (select nome from clientenovo where codcliente = fin_car.codcliente) as cliente,  (select codbarra from pedido where codped = fin_car.codped) as codbarra, numdoc, opcaixa  FROM fin_car WHERE valorpago = 0  and hist = 'N' and (codcliente = '$codcliente_pesq' ".$cond." ) and (opcaixa = '02.04' or opcaixa = '02.03') ORDER BY datavenc ","SQL_NONE","N");

    /*

	for ($i = 0; $i < count($rs_parc); $i++)
	{

    $rs_cheques = $db->query_db("SELECT codch, posfin  FROM fin_cheques WHERE numcheq = '".$rs_parc[$i]['numcheq']."' and bco = '".$rs_parc[$i]['banco']."' and  codped = '$codped_pesq'","SQL_ARRAY","N");
    
      #echo $rs_parc[$i]['numcheq'];
      $rs_posfin[$i] =  $rs_cheques[$i]['posfin'];
      #echo $rs_cheques1->fields[$i]['posfin'] ;
      echo $rs_cheques[$i]['codch'];
        print "<pre>";
        print_r($rs_cheques);
        print "</pre>";
        
      
    }//FOR


        if ($rs_parc) {
		  while (!$rs_parc->EOF) {

        $rs_cheques = $db->query_db("SELECT codch, posfin  FROM fin_cheques WHERE numcheq = '".$rs_parc->fields['numcheq']."' and bco = '".$rs_parc->fields['banco']."' and  codped = '$codped_pesq'","SQL_NONE","N");
        
        $cheques1[$]
  		
  		#$rs_parc->fields['codch'] = $rs_cheques->fields['codch'];
  		#$rs_parc->fields['posfin'] = $rs_cheques->fields['posfin'];
  		$in=array('fields'=>array('codch'=>$rs_cheques->fields['codch'], 'posfin'=>$rs_cheques->fields['posfin']));
  		$in2 =array('_numOfFields'=>9);
        echo $rs_cheques['_numOfFields'];

  		 $rs_parc1 = array_merge_recursive($in, $rs_parc);
	     $rs_parc1 = array_merge($in2, $rs_parc1);

          $rs_parc->MoveNext();
		  }//WHILE
		}
        $rs_parc1->MoveFirst();



        #$arr1 = array_merge($rs, $rs_total);
        #$arr = $rs->GetArray();
        #$arr1 = $rs_parc1->GetArray();
        #$arr2 = $rs->GetRowAssoc();
        print "<pre>";
	    #print_r($rs);
	    #print_r($array67);
	    #$arr1 = $array67->GetArray();
        #print_r($rs_total1);
	    #print_r($rs_teste);
        print_r($rs_parc1);
        #print_r($arr1);
        #print_r($arr2[CODPROD]);
    	print "</pre>";
    
*/
        $db->disconnect();

        include ("templates/relatorio_page_acredito_detalhes.html");

        break;
}



?>
