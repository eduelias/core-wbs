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
|  arquivo:     start_controle_revenda_index.php
|  template:    controle_revenda_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 100;

//$db->connect_wbs();
$db->connect_data();


//$db->$conn->debug = true;


$rs_lista = $db->query_db("SELECT codcat, sum(qtde) as qtde  FROM distribuicao_produtos WHERE codcliente = '".$codcliente_pesq."' GROUP by codcat ORDER by qtde DESC","SQL_NONE","N");


$db->disconnect();

include ("templates/controle_revenda_clientes_produtos.htm");

?>

