<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.


include("config.inc.php"); // ARQUIVO DE CONFIGURACAO DE CONSTANTES
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");
$db = new Padrao();


            $db->connect_wbs();
            #$db->$conn->debug = true;

            $rs = $db->query_db("SELECT codcb FROM codbarra, pedido WHERE pedido.codped = codbarra.codped and codbarraped = 1 and codbarra.codemp = 1 and fat <> 'OK'","SQL_NONE","N");
         
            if ($rs) {
		      while (!$rs->EOF) {

      		$rs_prod = $db->query_db("UPDATE codbarra SET datainsert = NOW() WHERE codcb = '".$rs->fields['codcb']."'","SQL_NONE","N");
      		          
               $i++;
               $rs->MoveNext();
        	   }//WHILE
            }
         
            echo("CONCLUIDO $i");
         
            $db->disconnect();







