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
|  arquivo:     start_orc_page_mail_mensagem.php
+--------------------------------------------------------------
*/

$orc_html = "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<title></title>
<link href='http://wbs.ipasoft.com.br/wbs2/css/sistema.css' rel='stylesheet' type='text/css'>
</head>

<body>
<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td><table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
        <tr>
          <td><table width='100%'  border='0' cellpadding='2' cellspacing='0'>
            <tr valign='bottom'>
              <td><img src='http://wbs.ipasoft.com.br/wbs2/images/grupoipa_orc.gif' width='139' height='59'></td>
              <td align='center' valign='bottom'><img src='http://wbs.ipasoft.com.br/wbs2/images/orcamento_mini.gif' width='118' height='27'><br>
			  <strong>$codbarra</strong></td>
              <td align='right' class='orc_body_print'>Av. Independ&ecirc;ncia 988, Centro, 36016-320,<br>
        Juiz de Fora - MG<br>
        (32) 2101-5900</p></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td background='http://wbs.ipasoft.com.br/images/spacer.gif' bgcolor='#007297'><img src='wbs2/images/spacer.gif' width='1' height='1'></td>
        </tr>
        <tr>
          <td><img src='http://wbs.ipasoft.com.br/wbs2/images/spacer.gif' width='5' height='5'></td>
        </tr>
      </table>
        <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td><table  border='0' align='left' cellpadding='6' cellspacing='0' class='orc_body_print'>
                <tr>
                  <td><img src='http://wbs.ipasoft.com.br/wbs2/images/cliente.gif' width='16' height='16'></td>
                  <td><strong>NOME CLIENTE:</strong><br>
                      $nomecliente</td>
                  <td><strong>TELEFONE:</strong><br>
                      $telcliente</td>
                  <td><strong>E-MAIL:</strong><br>
                      $mailcliente</td>
                  <td><strong>VENDEDOR:</strong><br>
                      $nomevendedor</td>
                  <td><strong>DATA PROPOSTA:</strong><br>
                      $dataproposta</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td bgcolor='#007297'><img src='wbs2/images/spacer.gif' width='1' height='1'></td>
          </tr>
        </table>
        <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td>
";
if (count($array1) > 0){
$orc_html .= "
		  <table width='100%'  border='0' cellpadding='0' cellspacing='0' class='orc_body_print'>
            <tr>
              <td class='orc_titulos_print'>Cod</td>
              <td class='orc_titulos_print'>Produto</td>
              <td align='center' class='orc_titulos_print'>Qtde</td>
              <td align='center' class='orc_titulos_print'>Pre&ccedil;o<br>
              (R$)</td>
            </tr>
";

for ($i = 0; $i < count($arrayx); $i++)
{
	if ($xtipoprod <> $tipoprod[$i])
	{
		if ($tipoprod[$i] == 'CJ')
		{
			$titulocat = "Microcomputadores";
		}
		else
		{
			$titulocat = "Produtos";
		}
$orc_html .= "
            <tr>
              <td colspan='4' class='orc_tipo_micro_peca_print'>$titulocat</td>
            </tr>
";
	}
	$xtipoprod = $tipoprod[$i];

	if ($xtipocj <> $tipocj[$i] and $tipoprod[$i] == 'CJ')
	{
		$tipocj_n = $tipocj[$i];
$orc_html .= "
            <tr>
              <td align='center' class='orc_config_n_print'><span class='orc_config_n_printumero'>$tipocj[$i]</span></td>
              <td colspan='3' class='orc_config_n_print'>$nomeprodcj[$i]</td>
              </tr>
            <tr class='orc_list_prod_print'>
              <td align='center'>&nbsp;</td>
              <td align='right'>&nbsp;</td>
              <td align='center'><strong>Subtotal</strong></td>
              <td align='right'><strong>$subtotalf[$tipocj_n]</strong></td>
            </tr>
";
	}
	$xtipocj = $tipocj[$i];
	if ($tipoprod[$i] == 'CJ')
	{
$orc_html .= "
            <tr>
              <td align='center' class='orc_list_prod_print'>$codprod[$i]</td>
              <td class='orc_list_prod_print'>$nomeprod[$i]<br>
                <span class='orc_descrisao_print'>$descres[$i]</span></td>
              <td align='center' class='orc_list_prod_print'>$qtde[$i]</td>
              <td align='right' class='orc_list_prod_print'></td>
            </tr>
";
	}
	else
	{
$orc_html .= "
            <tr>
              <td align='center' class='orc_list_prod_print'>$codprod[$i]</td>
              <td class='orc_list_prod_print'>$nomeprod[$i]<br>
                <span class='orc_descrisao_print'>$descres[$i]</span></td>
              <td align='center' class='orc_list_prod_print'>$qtde[$i]</td>
              <td align='right' class='orc_list_prod_print'>
";
if ($print_val == 1){ echo '$pputf[$i]'; }
$orc_html .= "
</td>
            </tr>
";
	}
} // For
$orc_html .= "
            <tr>
              <td colspan='4' class='orc_config_n_print'><img src='wbs2/images/spacer.gif' width='1' height='1'></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td align='right'>&nbsp;</td>
              <td align='center'><strong>TOTAL</strong></td>
              <td align='right'><strong>$totalf</strong></td>
            </tr>
          </table>
";
}
$orc_html .= "
			</td>
          </tr>
          <tr>
            <td><table width='100%'  border='0' cellspacing='0' cellpadding='0'>
              <tr>
                <td><table  border='0' align='center' cellpadding='6' cellspacing='0' class='orc_body_print'>
                    <tr>
                      <td><strong>A Ipasoft recomenda o uso do Sistema Operacional Microsoft Windows&reg; </strong></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td bgcolor='#007297'><img src='wbs2/images/spacer.gif' width='1' height='1'></td>
              </tr>
              <tr>
                <td><table width='100%'  border='0' cellpadding='2' cellspacing='0'>
                    <tr valign='top'>
                      <td width='50%'><table width='100%'  border='0' cellpadding='3' cellspacing='0' class='orc_simulacao_print'>
                          <tr>
                            <td><strong>CONDI&Ccedil;&Otilde;ES DE PAGAMENTO: </strong></td>
                          </tr>
                          <tr>
                            <td class='orc_simulacao'>$simulacao</td>
                          </tr>
                        </table></td>
                      <td><table width='100%'  border='0' cellpadding='1' cellspacing='0' class='orc_body_print'>
                        <tr>
                          <td><strong>GARANTIA:</strong></td>
                        </tr>
                        <tr>
                          <td>$garantia</td>
                        </tr>
                        <tr>
                          <td><strong>IMPOSTOS:</strong></td>
                        </tr>
                        <tr>
                          <td>$impostos</td>
                        </tr>
                        <tr>
                          <td><strong>VALIDADE DA PROPOSTA:</strong></td>
                        </tr>
                        <tr>
                          <td>$validadeproposta dia(s) uteis </td>
                        </tr>
                        <tr>
                          <td><strong>PRAZO DE ENTREGA:</strong></td>
                        </tr>
                        <tr>
                          <td>at&eacute; $prazoentrega dia(s) uteis </td>
                        </tr>
                        <tr>
                          <td><strong>FRETE:</strong></td>
                        </tr>
                        <tr>
                          <td>$frete</td>
                        </tr>
                        <tr>
                          <td><strong>OBS.:</strong></td>
                        </tr>
                        <tr>
                          <td>$obs</td>
                        </tr>
                      </table>
                      </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td>
				<table  border='0' align='center' cellpadding='1' cellspacing='0' class='orc_body_print'>
                    <tr>
                      <td>Colocando-nos a disposi&ccedil;&atilde;o para quaisquer esclarecimento, subscrevemo-nos,</td>
                    </tr>
                    <tr>
                      <td align='center'>Cordialmente,</td>
                    </tr>
                    <tr>
                      <td align='center'>_________________________________________________________<br>
					  <strong>$nomevendedorcompleto</strong><br>
					  $mailvendedor<br>
                      <strong>IPASOFT TECNOLOGIA E INFORM&Aacute;TICA LTDA</strong></td>
                    </tr>
                </table>
				</td>
              </tr>
              <tr>
                <td><img src='wbs2/images/spacer.gif' width='5' height='5'></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
";
?>
