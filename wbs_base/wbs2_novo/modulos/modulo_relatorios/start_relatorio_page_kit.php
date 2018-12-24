<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis
// inicio da classe
#include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");



#$db = new Padrao();
#$db->conn->debug = true;

#$_pg = new Mult_Pag();
#$acrescimo = 20;
#$ini_reg = $pagina * $acrescimo;


#echo("$pagina - $ini_reg");
switch ($Action)
{

	case "pesquisa":
	
        if ($codvend_select <> ""){$condicao = " and codvend = '$codvend_select'";}else{$condicao = "";}

        $db->connect_data();
        
        $rs_total = $db->$conn->Execute("SELECT COUNT(*) FROM pesq_kit_agrupado WHERE dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim' and tipo = '$tipo_select' $condicao");
        $numrows = $rs_total->fields[0];
        /*
        $rs_subtotal = $db->$conn->Execute("SELECT COUNT(*) as qtde FROM pesq_kit_agrupado WHERE dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim' and tipo = '$tipo_select' $condicao GROUP BY md5 ORDER BY qtde DESC");
        $total_reg = $rs_subtotal->fields[0];
        */
        $rs = $db->$conn->Execute("SELECT md5, cj_nomeprod, count(*) as qtde, (count(*)/$numrows)*100 as porc FROM pesq_kit_agrupado WHERE dataped >= '$aini-$mini-$dini' and dataped <= '$afim-$mfim-$dfim' and tipo = '$tipo_select' $condicao GROUP BY md5 ORDER BY qtde DESC ");

        #$total_reg = $rs->RecordCount();

        #$_pg->define_var($acrescimo, $PHP_SELF, $total_reg, "numero");

        #echo("nr=$numrows");

        $db->disconnect();
        
        
  		
/*
		// Busca codvend
		$prod->clear();
        $prod->listProdU("nome", "vendedor", "codvend = '$codvend_select'");
        $nomevend_select = $prod->showcampo0();
        
        	// Busca codvend
       	$prod->clear();
        $prod->listProdU("nome", "empresa", "codemp = '$codemp_select'");
        $nomeproj_select = $prod->showcampo0();
*/
		break;
}


$db->connect_wbs();
$rs_vend = $db->$conn->Execute("SELECT codvend, nome FROM vendedor WHERE block <> 'Y' ORDER BY nome ");
$db->disconnect();


	     include("templates/relatorio_page_kit.htm");



?>
