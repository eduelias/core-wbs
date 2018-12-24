<?php

include("classprod.php");

// INICIO DA CLASSE
$prod = new operacao();

// Votação
$prod->clear();
$prod->listProdU("count(*)","vot_votos", "");
$totalvotos = $prod->showcampo0();

$prod->clear();
$prod->listProdSum("codcandidato, (count(*)/$totalvotos)*100 as porc", "vot_votos", "", $arrayx, $array_campox, "GROUP BY codcandidato ORDER BY porc DESC");
for($i = 0; $i < count($arrayx); $i++ ){
	$prod->mostraProd( $arrayx, $array_campox, $i );

	$codcandidato_list[$i] = $prod->showcampo0();
	$porccandidato_list[$i] = $prod->showcampo1();

	$prod->clear();
	$prod->listProdU("doc","vendedor", "codvend = '$codcandidato_list[$i]'");
	$doccandidato_list[$i] = $prod->showcampo0();

	$prod->clear();
	$prod->listProdU("nome","clientenovo", "cpf = '$doccandidato_list[$i]' and tipocliente = 'F'");
	$nomecandidato_list[$i] = $prod->showcampo0();
	$nomecandidato_list[$i] = explode(" ", $nomecandidato_list[$i]);
	$nomecandidato_list[$i] = $nomecandidato_list[$i][0];
	$nomecandidato_list[$i] = strtoupper($nomecandidato_list[$i]);
}

?>
<table  border="0" cellpadding="2" cellspacing="1" class="tabela">
              <tr>
                <td colspan="2" class="infohometitulo3">Resultado Parcial </td>
              </tr>
              <? for($i = 0; $i < count($arrayx); $i++ ){ ?>
              <tr>
                <td><? echo $nomecandidato_list[$i]; ?></td>
                <td width="300"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="ft_pequena">
                    <tr class="vot_conteudo">
                      <td width="90%"><table width="<? echo $porccandidato_list[$i]; ?>%" border="0" cellpadding="0" cellspacing="0" class="cargas">
                          <tr>
                            <td ><img src="images/spacer.gif" width="1" height="6"></td>
                          </tr>
                      </table></td>
                      <td><? echo $porccandidato_list[$i]; ?>%</td>
                    </tr>
                </table></td>
              </tr>
              <? } ?>
          </table>
