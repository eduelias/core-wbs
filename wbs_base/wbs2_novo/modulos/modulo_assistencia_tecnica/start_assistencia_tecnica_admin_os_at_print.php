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
|  arquivo:     start_assistencia_tecnica_admin_os_at_print.php
|  template:    assistencia_tecnica_admin_os_at_print.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

		    $hoje = getdate();
			$ano = $hoje[year];
			$mes = $hoje[mon];
			$dia = $hoje[mday];
			$h = $hoje[hours];
			$m = $hoje[minutes];
			$s = $hoje[seconds];
			if (strlen($dia)==1){$dia = '0'.$dia;}
			if (strlen($m)==1){$m = '0'.$m;}
			if ($mes == 1){$mes = "Janeiro";}
			if ($mes == 2){$mes = "Fevereiro";}
			if ($mes == 3){$mes = "Março";}
			if ($mes == 4){$mes = "Abril";}
			if ($mes == 5){$mes = "Maio";}
			if ($mes == 6){$mes = "Junho";}
			if ($mes == 7){$mes = "Julho";}
			if ($mes == 8){$mes = "Agosto";}
			if ($mes == 9){$mes = "Setembro";}
			if ($mes == 10){$mes = "Outubro";}
			if ($mes == 11){$mes = "Novembro";}
			if ($mes == 12){$mes = "Dezembro";}

//$db->conn->debug = true;

// Dados OS_AT
$rs_dados_os_at = $db->query_db("SELECT * FROM os_at WHERE codos_at = '$codos_at_select'","SQL_NONE","N");

$rs_analises_os_at = $db->query_db("SELECT * FROM os_at_analise WHERE codos_at = '$codos_at_select' AND cancel = 'N'","SQL_NONE","N");

$rs_cliente_os_at = $db->query_db("SELECT * FROM clientenovo WHERE codcliente = '".$rs_dados_os_at->fields['codcliente']."'","SQL_NONE","N");

include ("templates/assistencia_tecnica_admin_os_at_print.htm");

$db->disconnect();

?>
