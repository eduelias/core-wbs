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
#$ano_hoje = 2006;
$mes_hoje = $hoje[mon];

$db->connect_data();
//$db->conn->debug = true;
//$db->query_db("USE sif_dataware","SQL_NONE","N");
$rs_delete = $db->query_db("DELETE FROM controle_ped_pontos WHERE ano = '$ano_hoje'","SQL_NONE","N");

for($i = 1; $i <= 12; $i++ ){
	if (strlen($i)==1){$u = '0'.$i;}else{$u = $i;}
	if ($u == "06" and $ano_hoje == "2006"){$dia = "09";}else{$dia = "01";} 

	$db->connect_wbs();
	//$db->conn->debug = true;
	$db->query_db("USE sif_base","SQL_NONE","N");	
	$rs_lista = $db->query_db("SELECT pedido.codvend, nome, sum( ponto_ped ) AS ponto FROM pedido, pedidostatus, vendedor WHERE dataped >= '$ano_hoje-$u-$dia 00:00:00' AND dataped <= '$ano_hoje-$u-31 23:59:59' AND ( pedido.contrato =  'OK' OR pedido.contrato =  'DC' ) AND pedido.caixa =  'OK' AND pedido.codped = pedidostatus.codped AND (statusped =  'CAIXA' or statusped =  'CAIXA FAT') AND datastatus <= DATE_ADD( dataped, INTERVAL if( tipo = 'R', 6, 4 )
DAY )  AND vendedor.codvend = pedido.codvend AND block = 'N' and cancel <> 'OK' and ped_transf <> 'OK' and (modelo_ped ='' or modelo_ped ='RDD') GROUP by pedido.codvend ORDER by ponto DESC, pedido.codvend","SQL_NONE","N");

	$rs_lista_user = $db->query_db("SELECT codvend, nome, tipo FROM vendedor WHERE  block = 'N'","SQL_NONE","N");


	$db->connect_data();
		
if ($i == 1){	
	while (!$rs_lista_user->EOF)
	{
	$codvend= $rs_lista_user->fields[0];
	$nome = $rs_lista_user->fields[1];
	$tipovend = $rs_lista_user->fields[2];
	

	$rs_insert = $db->query_db("INSERT INTO controle_ped_pontos SET codvend = '$codvend' , nome = '$nome', ano= '$ano_hoje' , data_atual = NOW(), tipovend = '$tipovend' ","SQL_NONE","N");
	//echo "$u - $codvend - $nome - $pontos<BR>";
	
		$rs_lista_user->MoveNext();
	}
}
	
	
	//$rs_lista->Move(0);
	while (!$rs_lista->EOF)
	{
	$pontos = $rs_lista->fields[2];
	$codvend= $rs_lista->fields[0];
	$nome = $rs_lista->fields[1];
	
	 if ($i == 1){$var_mes = 'jan';}
	 if ($i == 2){$var_mes = 'fev';} 
	 if ($i == 3){$var_mes = 'mar';} 
	 if ($i == 4){$var_mes = 'abr';} 
	 if ($i == 5){$var_mes = 'mai';} 
	 if ($i == 6){$var_mes = 'jun';} 
	 if ($i == 7){$var_mes = 'jul';} 
	 if ($i == 8){$var_mes = 'ago';}
	 if ($i == 9){$var_mes = 'set';}
	 if ($i == 10){$var_mes = 'out';} 
	 if ($i == 11){$var_mes = 'nov';}  
	 if ($i == 12){$var_mes = 'dez';} 
	
	 $pontost[$codvend] = $pontost[$codvend] + $pontos;
	 
	 if ($i < 6 and $ano_hoje == 2006){$pontos = 0;$pontost[$codvend] = 0;}
	 if ($i < 7 and $ano_hoje == 2007){$pontos = 0;$pontost[$codvend] = 0;}
	 if ($i < 5 and $ano_hoje == 2009){$pontos = 0;$pontost[$codvend] = 0;}
	 
	$rs_update = $db->query_db("UPDATE controle_ped_pontos SET `$var_mes` = $pontos , acum ='".$pontost[$codvend]."' WHERE codvend = '$codvend' and ano = '$ano_hoje' ","SQL_NONE","N");
	
	
	#echo "$u - $codvend - $nome - $pontos -". $pontost[$codvend]. " <BR>";
	
		$rs_lista->MoveNext();
	}
	
	
}//FOR MES

/*
	$rs_lista->Move(0);
	while (!$rs_lista->EOF)
	{
	
	$codvend= $rs_lista->fields[0];
	$nome = $rs_lista->fields[1];

	$db->connect_data();
	$db->conn->debug = true;
	$rs_update = $db->query_db("UPDATE controle_ped_pontos SET acum = $pontost[$codvend]  WHERE codvend = '$codvend' ","SQL_NONE","N");
		
	#echo "$u - $codvend - $nome -". $pontost[$codvend]. "<BR>";
	echo "AQUI";
	
	
		$rs_lista->MoveNext();
	}
	*/

$db->disconnect();
?>