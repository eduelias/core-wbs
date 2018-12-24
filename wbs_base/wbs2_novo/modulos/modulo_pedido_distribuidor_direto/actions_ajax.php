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
|  arquivo:     start_teste_ajax_index.php
|  template:    teste_ajax_index.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->$conn->debug = true;

        
switch ($Action)
{

	
    case "Delons" :
    	
        	
   	  $rs_update = $db->query_db("UPDATE pedidoprodtemp SET gos_12 = 'NO', gos_24 = 'NO', vgos = 0 WHERE codped='$codped' and codpped = '$codpped'","SQL_NONE","N");
      
	   #print_r( $rs_update);
    break;

    
	case "Addons" :
		
		$rs_select = $db->query_db("SELECT codprod FROM pedidoprodtemp WHERE codpped = '$codpped'","SQL_NONE","N");
      
		
		 if ($tipo_ons == '12'){$cond = "gos_12 = 'OK' , gos_24 = 'NO', vgos = (SELECT if(garonsite_12 = 'OK', v_garonsite_12, 0) FROM produtos WHERE codprod = ".$rs_select->fields['codprod'].")";}else{$cond = "gos_12 = 'NO' , gos_24 = 'OK' , vgos = (SELECT if(garonsite_24 = 'OK', v_garonsite_24, 0) FROM produtos WHERE codprod = ".$rs_select->fields['codprod'].")";}
      
	   $rs_update = $db->query_db("UPDATE pedidoprodtemp SET $cond WHERE codped='$codped' and codpped = '$codpped'","SQL_NONE","N");
      #print_r( $rs_update);
      #echo $tipo_ons;
    break;

    case "Delcjons" :

    	    	   	
   	  $rs_update = $db->query_db("UPDATE pedidoprodtemp SET gos_12 = 'NO', gos_24 = 'NO', vgos = 0 WHERE codped='$codped' and codprodcj = '$codprodcj' and tipocj = '$tipocj'","SQL_NONE","N");
   	  
   	  
	   #print_r( $rs_update);
    break;

    
	case "Addcjons" :
      
	  $rs_select = $db->query_db("SELECT codprod FROM pedidoprodtemp WHERE codped = '$codped' and codprodcj = '$codprodcj' and tipocj = '$tipocj' ","SQL_NONE","N");	
      
      if ($rs_select)
	{
		while (!$rs_select->EOF)
		{
			
		 if ($tipo_ons == '12'){$cond = "gos_12 = 'OK' , gos_24 = 'NO', vgos = (SELECT if(garonsite_12 = 'OK', v_garonsite_12, 0) FROM produtos WHERE codprod = ".$rs_select->fields['codprod'].")";}else{$cond = "gos_12 = 'NO' , gos_24 = 'OK' , vgos = (SELECT if(garonsite_24 = 'OK', v_garonsite_24, 0) FROM produtos WHERE codprod = ".$rs_select->fields['codprod'].")";}	
	    	   	
   	  $rs_update = $db->query_db("UPDATE pedidoprodtemp SET $cond WHERE codped='$codped' and codprodcj = '$codprodcj' and tipocj = '$tipocj' and codprod = ".$rs_select->fields['codprod']."","SQL_NONE","N");
   	  
   	  	 	$rs_select->MoveNext();
		}//WHILE
	}
      #print_r( $rs_update);
       # echo $tipo_ons;
    break;

    	 case "upPed_add" :

      $rs_select = $db->query_db("SELECT SUM(vgos) as soma FROM pedidoprodtemp WHERE codped = '$codped'","SQL_NONE","N");	 	
    	    	   	
   	  $rs_update = $db->query_db("UPDATE pedidotemp SET onsite = 'OK', vonsite = '".$rs_select->fields['soma']."', vonsite_desloc='$vonsite_desloc', cepons = '$cep' WHERE codped='$codped'","SQL_NONE","N");
   	  
   	  
	   #print_r( $rs_update);
    break;
  
    
     case "upPed_del" :

      	
    	    	   	
   	  $rs_update = $db->query_db("UPDATE pedidotemp SET onsite = 'NO', vonsite = 0, vonsite_desloc=0, cepons = '' WHERE codped='$codped'","SQL_NONE","N");
   	  
   	  
	   #print_r( $rs_update);
    break;
	
	case "verif_login" :

      	
    	    	   	
   	 $rs_select = $db->query_db("SELECT COUNT(*) FROM vendedor_usuario WHERE codvend_user = '$login_user' and  senha_user = '$senha_user'","SQL_NONE","N");	
   	 
	 echo $rs_select->fields[0];
   	  
	   #print_r( $rs_update);
    break;
  
}

	
$db->disconnect();



?>
