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
|  arquivo:     start_votacao_index.php
|  template:    votacao_index.htm
+--------------------------------------------------------------
*/

$prod->clear();
$prod->listProdU("eleitor","vendedor", "codvend='$codvend'");
$eh_eleitor = $prod->showcampo0();

if ($eh_eleitor == "S")
{
    $prod->clear();
    $prod->listProdU("count(*)","vot_votos", "codeleitor='$codvend'");
    $javotou = $prod->showcampo0();

    #echo "VOTOU: $javotou<br>";
    #echo "TIPO_VOTO: $tipo_voto<br>";
    #echo "CANDIDATO_VOTO: $codcandidato_post<br>";

    if ($javotou == "0")
    {
        if ($tipo_voto == "votar" AND $codcandidato_post <> "")
        {
            $prod->clear();
            $prod->setcampo0("");
            $prod->setcampo1($codcandidato_post);
            $datahoraatual = gmDate("Y-m-d H:i:s");
            $prod->setcampo2($datahoraatual);
            $prod->setcampo3($codvend);

            $prod->addProd("vot_votos", $uregatend);

            // Mostra nome do candidato votato
            $prod->clear();
            $prod->listProdU("clientenovo.nome","vendedor, clientenovo", "clientenovo.cpf = vendedor.doc AND vendedor.codvend = '$codcandidato_post'");
            $nomecandidato_votado = $prod->showcampo0();

            include ("templates/votacao_confirmado.htm");
        }
        else
        {
            $prod->clear();
            $prod->listProdSum("codvend, clientenovo.nome", "vendedor, clientenovo", "clientenovo.cpf = vendedor.doc AND vendedor.candidato = 'S' AND vendedor.block <> 'Y'", $arrayx, $array_campox, "ORDER BY clientenovo.nome");
            // $prod->listProdSum("codvend, clientenovo.nome", "vendedor, clientenovo", "clientenovo.cpf = vendedor.doc AND vendedor.candidato = 'S' AND vendedor.block <> 'Y' AND vendedor.codvend <> '$codvend'", $arrayx, $array_campox, "ORDER BY clientenovo.nome");

            for($i = 0; $i < count($arrayx); $i++ ){
            	$prod->mostraProd( $arrayx, $array_campox, $i );

            	$codcandidato_list[$i] = $prod->showcampo0();
            	$nomecandidato_list[$i] = $prod->showcampo1();
            }
            include ("templates/votacao_index.htm");
        }
    }
    else
    {
        include ("templates/votacao_javotou.htm");
    }
}
else
{
    include ("templates/votacao_nao.htm");
}

?>
