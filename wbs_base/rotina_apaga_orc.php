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

            $rs = $db->query_db("SELECT codped FROM orc WHERE dataped < '2004-01-01'","SQL_NONE","N");
         
            if ($rs) {
		      while (!$rs->EOF) {

      		$rs_prod = $db->query_db("DELETE FROM orcprod WHERE codped = '".$rs->fields['codped']."'","SQL_NONE","N");
      		$rs_status = $db->query_db("DELETE FROM orcstatus WHERE codped = '".$rs->fields['codped']."'","SQL_NONE","N");
      		$rs_orc = $db->query_db("DELETE FROM orc WHERE codped = '".$rs->fields['codped']."'","SQL_NONE","N");
           
               $i++;
               $rs->MoveNext();
        	   }//WHILE
            }
         
            echo("CONCLUIDO $i");
         
            $db->disconnect();







