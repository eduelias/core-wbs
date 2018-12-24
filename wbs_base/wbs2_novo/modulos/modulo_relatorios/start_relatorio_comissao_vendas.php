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
|  arquivo:     start_cadastro_marcas_index.php
|  template:    cadastro_marcas_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

$db->connect_wbs();

#$codproj_pesq = 3;

switch ($Action) 
{
    case "Pesquisar" :
    
    	if ($mes_pesq <> "" and  $ano_pesq <> "" and  $codproj_pesq <> -1) {               
			
			if ($codgrp_vend == 13){$cond1 = "and codvend = $codvend";}else{$cond1 = "";}
			
    		if ($codproj_pesq == 3){$cond = "SUM(vc) as valor_vendas";}else{$cond = "SUM(vpv) as valor_vendas";}
			$rs = $db->query_db("SELECT codvend, nome, meta, codgrp FROM vendedor WHERE vendedor.codproj='$codproj_pesq' and block <> 'Y' $cond1 ","SQL_NONE","N");
    	$rs_projeto_pesq = $db->query_db("SELECT codproj, nomeproj FROM projeto_nome WHERE codproj = '$codproj_pesq' ","SQL_NONE","N");
    	
    	
    	}
    break; 
  
}



#$db->$conn->debug = true;

if ($codgrp_vend == 2 or $codgrp_vend == 54 or $codgrp_vend == 62 or $codgrp_vend == 79){
	$condproj = "WHERE nomeproj like '%NET%'";
}else{
	$condproj = "WHERE codproj = '$codproj_vend' and nomeproj like '%NET%'"; 
}

$rs_projeto = $db->query_db("SELECT codproj, nomeproj FROM projeto_nome ".$condproj ,"SQL_NONE","N");



include ("templates/relatorio_comissao_vendas.htm");

$db->disconnect();
?>
