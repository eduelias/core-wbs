<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_seed.php
|  template:    sistema_seed.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch ($Action)
{
    case "Ajustar" :
		$rs_lista_x = $db->query_db("SELECT * FROM vendedor ORDER BY codvend","SQL_NONE","N");

		$seed_pos = range(0, 9999);
		srand((float)microtime()*1000000);
		shuffle($seed_pos);			

		$ix = 0;
		while (!$rs_lista_x->EOF)
		{
			$rs_update = $db->query_db("UPDATE vendedor SET seed = '".$seed_pos[$ix]."' WHERE codvend = '".$rs_lista_x->fields['codvend']."'","SQL_NONE","N");
			
			$ix++;
			$rs_lista_x->MoveNext();
		}
		$rs_lista = $db->query_db("SELECT * FROM vendedor ORDER BY codvend","SQL_NONE","N");
    break;
}

$rs_listgrp = $db->query_db("SELECT codgrp, nomegrp FROM segurancagrp ORDER BY nomegrp","SQL_NONE","N");

$rs_lista = $db->query_db("SELECT * FROM vendedor ORDER BY codvend","SQL_NONE","N");

$db->disconnect();

include ("templates/sistema_seed.htm");

?>