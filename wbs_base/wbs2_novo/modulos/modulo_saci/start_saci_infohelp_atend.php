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
|  arquivo:     start_saci_admin_atend.php
|  template:    saci_admin_atend.htm
+--------------------------------------------------------------
*/

switch ($Action)
{
    	// Pesquisar Cliente
    	case "PesquisarCli" :
            // Consulta Nome do Cliente
            $prod->clear();
            $prod->listProdU("nome, endereco, bairro, cep, numero, complemento, tipocliente, cpf, cnpj, dddtel1, tel1","clientenovo", "codcliente='$pesqcodcliente'");
            
            $nomecliente_view = $prod->showcampo0();
            $endereco_view = $prod->showcampo1();
            $bairro_view = $prod->showcampo2();
            $cep_view = $prod->showcampo3();
            $numero_view = $prod->showcampo4();
            $complemento_view = $prod->showcampo5();
            $tipocliente_view = $prod->showcampo6();
            $cpf_view = $prod->showcampo7();
            $cnpj_view = $prod->showcampo8();
            $dddtel1_view = $prod->showcampo9();
            $tel1_view = $prod->showcampo10();

            if ($tipocliente_view == "F") {
                $doccliente = $cpf_view;
            }
            if ($tipocliente_view == "J") {
                $doccliente = $cnpj_view;
            }
            break;
}

// categoria
$prod->clear();
$prod->listProdSum("saci_cat.idcat, saci_cat.titulo", "saci_cat", "saci_cat.habilitado = 'S' AND saci_cat.tipo = 'EXT'", $arrayx, $array_campox, "ORDER BY saci_cat.titulo");
for($i = 0; $i < count($arrayx); $i++ ){
    $prod->mostraProd( $arrayx, $array_campox, $i);

    $cat_id[$i] = $prod->showcampo0();
    $cat_titulo[$i] = $prod->showcampo1();

    // subcategoria
    $prod->clear();
    $prod->listProdSum("saci_subcat.idsubcat, saci_subcat.titulo", "saci_subcat", "saci_subcat.idcat = '$cat_id[$i]' AND saci_subcat.habilitado = 'S'", $array1, $array_campo1, "ORDER BY saci_subcat.titulo");
    for($j = 0; $j < count($array1); $j++ ){
        $prod->mostraProd( $array1, $array_campo1, $j);

        $subcat_subid[$i][$j] = $prod->showcampo0();
        $subcat_titulo[$i][$j] = $prod->showcampo1();
        
        $x_subcat_subid[$i] .= "'".$subcat_subid[$i][$j]."', ";
        $x_subcat_titulo[$i] .= "'".$subcat_titulo[$i][$j]."', ";
    }// FOR

$sub_array[$i] = $j;
$x_subcat_subid[$i] .= "''";
$x_subcat_titulo[$i] .= "''";

}// FOR

include ("templates/saci_infohelp_atend.htm");

?>