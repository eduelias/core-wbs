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
|  arquivo:     start_relatorio_atualiza_precos.php
|  template:    relatorio_atualiza_precos.html
+--------------------------------------------------------------
*/

$db->connect_wbs();

//$db->conn->debug = true;

switch($Action)
{
  	case "Pesquisar" :
		$nomepesq = strtolower($db->discover_method('nomepesq'));

		$pesqSelectarray = explode(":", $db->discover_method('pesqSelect'));
		$codsubcat_select = $pesqSelectarray[0];
		$codcat_select = $pesqSelectarray[1];

		$rs_grupoemp_select = $db->query_db("SELECT codemp FROM empresa WHERE codgrupo = '".$db->discover_method('grupoemp_select')."'","SQL_NONE","N");
		$rs_grupoemp_show = $db->query_db("SELECT nome FROM empresa_grupo WHERE codgrupo = '".$db->discover_method('grupoemp_select')."'","SQL_NONE","N");
		$rs_cat_show = $db->query_db("SELECT nomecat FROM categoria WHERE codcat = '$codcat_select'","SQL_NONE","N");
		$rs_subcat_show = $db->query_db("SELECT nomesubcat FROM subcategoria WHERE codsubcat = '$codsubcat_select'","SQL_NONE","N");

		if ($nomepesq <> "")
		{
			$condicao2 = " LCASE(nomeprod) like '%$nomepesq%' ";
			$condicao2 .= " AND produtos.hist <> 'Y' ";
			$condicao2 .= " AND categoria.codcat = produtos.codcat";
			$condicao2 .= " AND subcategoria.codsubcat = produtos.codsubcat";
			$condicao2 .= " AND produtos.codprod = estoque.codprod";
			$condicao2 .= " AND estoque.codemp = '".$rs_grupoemp_select->fields['codemp']."'";
			$pesquisafoi = $nomepesq;
		}

		if ($db->discover_method('pesqSelect') <> "")
		{
			$condicao2 = " produtos.codcat = '$codcat_select'";
	 		$condicao2 .= " AND produtos.codsubcat = '$codsubcat_select'";
			$condicao2 .= " AND produtos.hist <> 'Y' ";
			$condicao2 .= " AND categoria.codcat = produtos.codcat";
			$condicao2 .= " AND subcategoria.codsubcat = produtos.codsubcat";
			$condicao2 .= " AND produtos.codprod = estoque.codprod";
			$condicao2 .= " AND estoque.codemp = '".$rs_grupoemp_select->fields['codemp']."'";
			$pesquisafoi = $rs_cat_show->fields['nomecat']."/".$rs_subcat_show->fields['nomesubcat'];
		}

		if ($db->discover_method('codprodpesq') <> "")
		{
			$condicao2 = " produtos.codprod = '".$db->discover_method('codprodpesq')."'";
			$condicao2 .= " AND produtos.hist <> 'Y' ";
			$condicao2 .= " AND categoria.codcat = produtos.codcat";
			$condicao2 .= " AND subcategoria.codsubcat = produtos.codsubcat";
			$condicao2 .= " AND produtos.codprod = estoque.codprod";
			$condicao2 .= " AND estoque.codemp = '".$rs_grupoemp_select->fields['codemp']."'";
			$pesquisafoi = "Produto código ".$db->discover_method('codprodpesq');
		}
  		if($condicao2 <> "")
  		{
		    $rs_lista = $db->query_db("SELECT produtos.codcat, produtos.codsubcat, produtos.codprod, nomeprod, estoque.datauc, estoque.puc, estoque.pcm, produtos.pvv, produtos.pvvcj, produtos.pva, produtos.pvacj, produtos.mtv, produtos.mta FROM produtos, estoque, categoria, subcategoria WHERE $condicao2 GROUP BY produtos.codprod ORDER BY nomecat, nomesubcat, nomeprod","SQL_NONE","N");
		    $numRows = $rs_lista->_numOfRows;
		    
		}
		
		if ($db->discover_method('tipo_preco') == "A"){$tipo_preco_pesq = "Atacado";}else{$tipo_preco_pesq = "Varejo";}
		
		break;
		
		case "Atualiza_preco" :
		
		
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_cod[$i] <> "")
            {
                $db->connect_wbs();
                
                if ($tipo_preco_select == "V"){$condicao3 = "pvv = '".$db->fvalorbd($xp[$i])."' , pvvcj = '".$db->fvalorbd($xpcj[$i])."'";}else{$condicao3 = "pva = '".$db->fvalorbd($xp[$i])."' , pvacj = '".$db->fvalorbd($xpcj[$i])."'";}

                $rs_update = $db->query_db("UPDATE produtos SET $condicao3, dataatualiza_preco = NOW() WHERE codprod = '$rows_cod[$i]'","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
                
                $db->disconnect();
            }
        }
		
        
        case "Atualiza_margem" :
		
		
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_cod[$i] <> "")
            {
                $db->connect_wbs();
                
                if ($tipo_preco_select == "V"){$condicao3 = "mtv = '".$db->fvalorbd($margem[$i])."'";}else{$condicao3 = "mta = '".$db->fvalorbd($margem[$i])."'";}

                $rs_update = $db->query_db("UPDATE produtos SET $condicao3 WHERE codprod = '$rows_cod[$i]'","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
                
                $db->disconnect();
            }
        }
		
		break;
		
		
}



// PESQUISA GRUPO SELECIONADO 
$rs_grupoemp = $db->query_db("SELECT * FROM empresa_grupo ORDER BY nome","SQL_NONE","N");

// PESQUISA DE CATEGORIA 
$prod->listProdSum("codcat, nomecat", "categoria", "", $array_pesq, $array_campo_pesq, "ORDER BY nomecat");
for ($i = 0; $i < count($array_pesq); $i++ )
{
	$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );

	$codcatp[$i] = $prod->showcampo0();
	$nomecatp[$i] = $prod->showcampo1();

	$prod->clear();
	$prod->listProdSum("codsubcat, nomesubcat", "subcategoria", "codcat = $codcatp[$i]", $array_pesq1, $array_campo_pesq1, "ORDER BY nomesubcat");

	for ($j = 0; $j < count($array_pesq1); $j++)
	{
		$prod->mostraProd($array_pesq1, $array_campo_pesq1, $j);

		$codsubcatp[$i][$j] = $prod->showcampo0();
		$nomesubcatp[$i][$j] = $prod->showcampo1();

		$codsubcat_pesq[$i] .= "'".$codsubcatp[$i][$j].":".$codcatp[$i]."'".", ";
		$nomesubcat_pesq[$i] .= "'".$nomesubcatp[$i][$j]."'".", ";
	}
	$sub_array_pesq[$i] = $j;
	$codsubcat_pesq[$i] .= "''";
	$nomesubcat_pesq[$i] .= "''";
}

/*
// CATEGORIA
$rs_cat = $db->query_db("SELECT codcat, nomecat FROM categoria ORDER BY nomecat","SQL_NONE","N");
if ($rs_cat)
{
	while (!$rs_cat->EOF)
	{
			// SUBCATEGORIA
			$rs_subcat = $db->query_db("SELECT codsubcat, nomesubcat FROM subcategoria WHERE codcat = '".$rs_cat->fields['codcat']."' ORDER BY nomesubcat","SQL_NONE","N");
			if ($rs_subcat)
			{
				while (!$rs_subcat->EOF)
				{
					$codsubcat_pesq[$i] .= "'".$codsubcatp[$i][$j].":".$codcatp[$i]."'".", ";
					$nomesubcat_pesq[$i] .= "'".$nomesubcatp[$i][$j]."'".", ";
					
					$rs_subcat->MoveNext();
				}
				$rs_subcat->Move(0);
			}
			$rs_cat->MoveNext();
			
			$sub_array_pesq[$i] = count($rs_subcat);
			$codsubcat_pesq[$i] .= "''";
			$nomesubcat_pesq[$i] .= "''";
	}//WHILE
	$rs_cat->Move(0);
}
*/

include("templates/relatorio_atualiza_precos.html");

$db->disconnect();

?>