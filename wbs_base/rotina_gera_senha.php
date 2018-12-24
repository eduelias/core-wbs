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
|  arquivo:     start_sistema_tabela.php
|  template:    sistema_tabela.htm
+--------------------------------------------------------------
*/
include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();
$db->connect_wbs();
//$db->conn->debug = true;

$rs_list = $db->query_db("SELECT vendedor.nome , clientenovo.nome, empresa.nome FROM vendedor, empresa, clientenovo WHERE empresa.codemp = vendedor.codemp AND block <> 'Y' AND funcionario = 'Y' AND vendedor.doc = clientenovo.cpf ORDER BY `empresa`.`nome` ASC","SQL_NONE","N");




?>

<table id="table_results" class="data">


 <tr class="odd">
    <td>LOGIN</td>
    <td>NOME</td>
    <td>EMPRESA</td>
    <td>SENHA</td>
</tr>
<?
if ($rs_list) {
		while (!$rs_list->EOF) { 
			
$senha = substr(ereg_replace("[^0-9]", "", crypt(time())).ereg_replace("[^0-9]", "", crypt(time())).ereg_replace("[^0-9]", "", crypt(time())),0, 5);
?>
 <tr class="odd">
    <td><? echo  $rs_list->fields[0]  ?></td>
    <td><? echo  $rs_list->fields[1] ?></td>
    <td><? echo  $rs_list->fields[2] ?></td>
    <td><? echo  $senha ?></td>
</tr>

<?
		$rs_list->MoveNext();
		}//WHILE
	}
?>

</table>



<?


$db->disconnect();
#include ("templates/sistema_senha.htm");

?>