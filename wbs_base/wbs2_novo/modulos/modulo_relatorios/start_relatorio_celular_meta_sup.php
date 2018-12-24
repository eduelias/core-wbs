<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis



//require("../classprod.php");


 #include("topo.php");
 
// inicio da classe
$prod = new operacao();
 


switch ($Action)
{

	case "Pesquisar":

		$pesqSelectarray = explode(":", $db->discover_method('pesqSelect'));
		$codvend_select = $pesqSelectarray[0];
		$codproj_select = $pesqSelectarray[1];
		
		if ($codproj_pesq == -1){
			$codproj_select = -1;
			$nomeproj = "TODOS";
		}else{
			$rs_list = $db->query_db("SELECT nomeproj FROM projeto_nome WHERE codproj = '$codproj_select'","SQL_NONE","N");
			$nomeproj = $rs_list->fields['nomeproj'];
			
		}
		
		if ($codvend_select == -1)
		{
			$nomevend = "TODOS";
			$rs_list1 = $db->query_db("SELECT SUM(meta_pi) as meta_pi, SUM(meta_c) as meta_c, SUM(meta_car) as meta_car, SUM(meta_car_fat) as meta_car_fat FROM vendedor, vendedor_meta WHERE vendedor_meta.codvend = vendedor.codvend and codproj = '$codproj_select' AND datameta LIKE '$ano-$mes%'","SQL_NONE","N");
			
		}else{
			$rs_list = $db->query_db("SELECT nome FROM vendedor WHERE codvend = '$codvend_select'","SQL_NONE","N");
			$nomevend = $rs_list->fields['nome'];
			$rs_list1 = $db->query_db("SELECT SUM(meta_pi) as meta_pi, SUM(meta_c) as meta_c, SUM(meta_car) as meta_car, SUM(meta_car_fat) as meta_car_fat FROM vendedor_meta WHERE vendedor_meta.codvend = '$codvend_select'  AND datameta LIKE '$ano-$mes%'","SQL_NONE","N");
			
		}
		
		#echo "$codvend_select - $codproj_select - $ano - $mes - iu=$codproj_pesq";

		break;
}

 
 


// PESQUISA GRUPO SELECIONADO 
if ($codgrp_vend == 54 or $codgrp_vend == 2 ){
	$cond_proj = "";
	$cond_vend = "";
}else{
	$cond_proj = " codproj = $codproj_vend ";
	if ($tipouserproj_vend <> "Y"){
		$cond_vend = " and codvend = $codvend";
	}else{
		$cond_vend = "";
	}
}

// PESQUISA DE CATEGORIA 
$prod->listProdSum("codproj, nomeproj", "projeto_nome", $cond_proj, $array_pesq, $array_campo_pesq, "ORDER BY nomeproj");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codprojp[$i] = $prod->showcampo0();
	$nomeprojp[$i] = $prod->showcampo1();

	$prod->clear();
	$prod->listProdSum("codvend, nome", "vendedor", "codproj = $codprojp[$i] and block <>  'Y' and tipo_celular =  'Y'  ".$cond_vend, $array_pesq1, $array_campo_pesq1, "ORDER BY nome");

	for ($j = 0; $j <= count($array_pesq1); $j++)
	{
		$prod->mostraProd($array_pesq1, $array_campo_pesq1, $j);

		$codvendp[$i][$j] = $prod->showcampo0();
		$nomevendp[$i][$j] = $prod->showcampo1();
				
		if ($j == count($array_pesq1)){$codprojp[$i]=$codprojp[$i];$nomevendp[$i][$j]="TODOS";$codvendp[$i][$j]="-1";}

		$codvend_pesq[$i] .= "'".$codvendp[$i][$j].":".$codprojp[$i]."'".", ";
		$nomevend_pesq[$i] .= "'".$nomevendp[$i][$j]."'".", ";
	}
	$sub_array_pesq[$i] = $j;
	$codvend_pesq[$i] .= "''";
	$nomevend_pesq[$i] .= "''";
}


		     include("templates/relatorio_celular_meta_sup.html");

		       	#include("rodape.php");


?>
