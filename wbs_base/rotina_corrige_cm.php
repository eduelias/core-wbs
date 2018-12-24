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

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

$db->connect_wbs();
$db->conn->debug = true;



#$rs_lista = $db->query_db("SELECT codest, produtos.codprod, pvv, codcat, estoque.pcm, if( codcat =46, pvv / 1.40, pvv / 1.44 ) AS pcmnovo, estoque.puc, if( estoque.puc = 0, if( codcat =46, pvv / 1.40, pvv / 1.44 ) , estoque.puc ) as pucnovo, if( estoque.datauc =0, now(), estoque.datauc) as dataucnovo, mtv, mta, if( codcat =46, 40, mtv ) AS mtvnovo, estoque.codmoeda FROM produtos, estoque WHERE produtos.codprod = estoque.codprod ORDER BY `produtos`.`codprod` ASC  ","SQL_NONE","N"); 

$rs_lista = $db->query_db("SELECT codest, produtos.codprod, pvv, codcat, estoque.pcm, if( codcat =46, pvv / 1.40, pvv / 1.44 ) AS pcmnovo, estoque.puc, if( codcat =46, pvv / 1.40, pvv / 1.44 ) as pucnovo, if( estoque.datauc =0, now(), estoque.datauc) as dataucnovo, mtv, mta, if( codcat =46, 40, mtv ) AS mtvnovo, estoque.codmoeda FROM produtos, estoque WHERE produtos.codprod = estoque.codprod ORDER BY `produtos`.`codprod` ASC  ","SQL_NONE","N"); 

if ($rs_lista)
{
	
	while (!$rs_lista->EOF)
	{
		
		
		$rs_insert_estoque = $db->query_db("UPDATE estoque SET pcm = '".$rs_lista->fields['pcmnovo']."', puc = '".$rs_lista->fields['pucnovo']."', datauc = '".$rs_lista->fields['dataucnovo']."',  codmoeda = '2' WHERE codest = '".$rs_lista->fields['0']."'","SQL_NONE","N");	
		
		if ($rs_lista->fields['codcat'] == '46')
		{
		
			$rs_insert_estoque1 = $db->query_db("UPDATE produtos SET mtv = '".$rs_lista->fields['mtvnovo']."', mta = '".$rs_lista->fields['mtvnovo']."' WHERE codprod = '".$rs_lista->fields['1']."'","SQL_NONE","N");	
			
		}
		
		
		$rs_lista->MoveNext();
	}//WHILE
}

$db->disconnect();
?>