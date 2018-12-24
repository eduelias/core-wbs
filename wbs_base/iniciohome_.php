<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CATEGORIA";
$titulo = "HOME";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

	$dataatual = $prod->gdata();

	//DADOS DO USUARIO
	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codgrpold = $prod->showcampo3();
		$tipoclienteold = $prod->showcampo7();
		$docold = $prod->showcampo8();
		$codproj = $prod->showcampo25();
		$tipouserproj = $prod->showcampo26();
		$meta = $prod->showcampo27();
		if ($tipoclienteold == "F"){
			$prod->listProd("clientenovo", "cpf='$docold'");
			$xcodcliente=	$prod->showcampo0();
		}else{
			$prod->listProd("clientenovo", "cnpj='$docold'");
			$xcodcliente=	$prod->showcampo0();
		}
		

	 


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":


		$desloc=0;
		
        break;

	 case "update":

		 
		 break;

	 case "list":

		$ini = 1;
		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		
		$Actionsec="list";
		
		 break;

}


// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");




if($Action == "list" ):

		

$prod->listProd("clientenovo", "codcliente=$xcodcliente");

			// Dados do Cliente 
		$xcodcliente=	$prod->showcampo0();
		$xnome=			$prod->showcampo1();
		$xcpf=			$prod->showcampo4();
		$xcnpj=			$prod->showcampo5();
		$xendereco=		$prod->showcampo14();
		$xbairro=		$prod->showcampo15();
		$xcidade=		$prod->showcampo16();
		$xcep=			$prod->showcampo17();
		$xestado=		$prod->showcampo18();
		$xdddtel1=		$prod->showcampo21();
		$xtel1=			$prod->showcampo22();
		$xdddtel2=		$prod->showcampo23();
		$xtel2=			$prod->showcampo24();
		$xramal=		$prod->showcampo25();
		$xemail=		$prod->showcampo77();


/// INICIO - PARTE LISTAGEM DOS REGISTROS ////
// VERIFICA CONSITENCIA DE DATAS
$prod->listProdMY("IF (NOW() > '2005-06-20 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
$prod->mostraProd( $array129, $array_campo129, 0 );
$control = $prod->showcampo0();

if ($control <> 'S'){

echo('
<script language=JavaScript>
setTimeout("');echo("window.open('noticias.php?tipo=$tipovend','somename','toolbar=0,width=500,height=300,copyhistory=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no')");echo('",0);
</script>
');
echo('
<script language=JavaScript>
setTimeout("');echo("window.open('noticias1.htm','somename1','toolbar=0,width=500,height=500,copyhistory=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no')");echo('",0);
</script>
');
}

echo("
<script language='javascript'>
function SetaInfoPopup(texto)
{
	document.getElementById('informacoespopup').innerHTML = texto; 
}
</script>
<style type='text/css'>
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 10px;
	color: #000000;
}
.pleader {
	color: #333;
	background-color: #ffffef;
	padding: 8px;
	border: 1px solid #e9e9e9;
	font-weight: normal;
	font-size: 13px;
	line-height: 20px;
}
.popupmsg, a.popupmsg:link, a.popupmsg:active, a.popupmsg:visited {
	font-size: 10px;
	color: #000000;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	text-decoration: none;
}

.popupiframe {
	border: 1px inset #e9e9e9;
	background-color: #FFFFFF;
}
.popupinfo {
	border: 1px inset #e9e9e9;
	background-color: #FFFFFF;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 10px;
	color: #666666;
	padding: 3px;
}
.tabelammm {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #000000;
	text-align: justify;
}
.titulommm {
	font-weight: bold;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	text-transform: capitalize;
	color: #FFFFFF;
	background-color: #5580C0;
	text-align: center;
	font-size: 11px;
	padding-right: 10px;
	padding-left: 10px;
	height: 20px;
}
.txtmmm {
	color: #000000;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	background-color: #FEFEFE;
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #5580C0;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-right-color: #5580C0;
	border-bottom-color: #5580C0;
	border-left-color: #5580C0;
	padding: 5px;
	font-weight: normal;
	font-size: 11px;
}
.usertitulo {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 12px;
	font-weight: bold;
	text-transform: uppercase;
	color: #EA0000;
	background-color: #FFFFFF;
	padding: 2px;
	border-bottom-width: 3px;
	border-bottom-style: solid;
	border-bottom-color: #EA0000;
}
.usertxt {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #000000;
	padding: 3px;
	border-left: 3px solid #D4D0C8;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #D4D0C8;
}
.usertxt2 {
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #EA0000;
	padding: 3px;
	border-bottom: 1px solid #EA0000;
	border-left: 3px solid #EA0000;
}
.style1 {
	font-size: 10px;
	font-family: 'Trebuchet MS', Tahoma, Verdana, Arial;
}
-->
</style>
<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td colspan='3'><img src='wbs2/images/spacer.gif' width='10' height='10'></td>
  </tr>
  <tr>
    <td width='49%'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
      <tr>
        <td height='20'><table  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
            <tr>
              <td class='titulommm'>Nossa Miss&atilde;o</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class='txtmmm'>&nbsp;&nbsp;&nbsp;&nbsp;Fornecer produtos e servi&ccedil;os
          nos segmentos de inform&aacute;tica, comunica&ccedil;&atilde;o de voz
          e dados, divers&atilde;o e solu&ccedil;&otilde;es tecnol&oacute;gicas,
          trabalhando para superar expectativas, satisfazer desejos e realizar
          os sonhos dos nossos clientes, colaboradores, fornecedores e comunidades
          nas quais servimos.</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td width='49%'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
      <tr>
        <td height='20'><table  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
            <tr>
              <td class='titulommm'>Nossa Vis&atilde;o</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class='txtmmm'>&nbsp;&nbsp;&nbsp;&nbsp;Manter uma posi&ccedil;&atilde;o
          de lideran&ccedil;a em cada um dos mercados nos quais atuamos, oferecendo
          aos nossos clientes produtos e servi&ccedil;os customizados, com qualidade
          e alto valor percebido , mantendo diferenciais competitivos em rela&ccedil;&atilde;o
          aos nossos concorrentes, obtendo um crescimento sustent&aacute;vel
          de longo prazo.</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan='3'><img src='wbs2/images/spacer.gif' width='10' height='10'></td>
  </tr>
  <tr valign='top'>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td class='usertitulo'>DADOS DO USU&Aacute;RIO </td>
      </tr>
      <tr>
        <td height='20'><span class='style1'>Verifique se os dados abaixo est&atilde;o corretos
            para sua seguran&ccedil;a.</span></td>
      </tr>
      <tr>
        <td><table width='100%'  border='0' cellspacing='2' cellpadding='0'>
            <tr>
              <td colspan='2' class='usertxt2'><strong>NOME USU&Aacute;RIO:</strong><br>
            $xnome</td>
            </tr>
            <tr>
              <td colspan='2' class='usertxt'><strong>CPF/CNPJ:</strong><br>
            $xcpf $xcgc</td>
            </tr>
            <tr valign='top'>
              <td width='50%' class='usertxt'><strong>ENDERE&Ccedil;O:</strong><br>
            $xendereco, $xnumero $xcomplemento - $xbairro </td>
              <td class='usertxt'><strong>CIDADE/UF/CEP:</strong><br>
            $xcidade - $xestado - $xcep</td>
            </tr>
            <tr valign='top'>
              <td class='usertxt'><strong>E-MAIL CONTATO:</strong><br>
            $xemail</td>
              <td class='usertxt'><strong>TELEFONE:</strong><br>
            ($xdddtel1) $xtel1<br>
            ($xdddtel2) $xtel2</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelannn'>
      <tr>
        <td class='usertitulo'>ESTAT&Iacute;STICAS EM VALORES </td>
      </tr>
      <tr>
        <td height='20' class='style1'>Abaixo est&atilde;o as tabelas com estat&iacute;sticas
          de pedidos e or&ccedil;amentos em valores.</td>
      </tr>
      <tr>
        <td><table width='100%'  border='0' cellpadding='0' cellspacing='2'>
            <tr class='usertxt2'>
              <td width='40%'><strong>USU&Aacute;RIO</strong></td>
              <td><strong>M&Ecirc;S/ANO</strong></td>
            </tr>
            <tr>
              <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/line_vend.php' name='Form' target = '_blank'>
                <td class='usertxt'><strong>Meta Di&aacute;ria </strong></td>
                <td class='usertxt'><input name='mes' type='text' class='popupmsg' size='2' maxlength='2'>
              /
                <input name='ano' type='text' class='popupmsg' size='4' maxlength='4'>
                <input name='B1' type='submit' class='popupmsg' value='OK'></td>
                <input type='hidden' name='login' value='$login'>
                <input type='hidden' name='metauser' value='$meta'>
                <input type='hidden' name='codproj' value='$codproj'>
                <input type='hidden' name='tipovend' value='$tipovend'>
              </form>
            </tr>
            <tr>
              <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/line_vend_mes.php' name='Form' target = '_blank'>
                <td class='usertxt'><strong>Meta Acumulada M&ecirc;s </strong></td>
                <td class='usertxt'><strong>ANO: </strong>
                    <input name='ano' type='text' class='popupmsg' size='4' maxlength='4'>
                    <input name='B1' type='submit' class='popupmsg' value='OK'></td>
                <input type='hidden' name='login' value='$login'>
                <input type='hidden' name='metauser' value='$meta'>
                <input type='hidden' name='codproj' value='$codproj'>
                <input type='hidden' name='tipovend' value='$tipovend'>
              </form>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src='wbs2/images/spacer.gif' width='5' height='5'></td>
      </tr>
      <tr>
        <td>"); if ($tipouserproj == "Y"){ echo("
            <table width='100%'  border='0' cellpadding='0' cellspacing='2'>
              <tr class='usertxt2'>
                <td width='40%'><strong>SUPERVISOR</strong></td>
                <td><strong>M&Ecirc;S/ANO</strong></td>
              </tr>
              <tr>
                <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/bar_vend_sup.php' name='Form' target = '_blank'>
                  <td class='usertxt'><strong>Meta Di&aacute;ria Vendedor </strong></td>
                  <td class='usertxt'><input name='mes' type='text' class='popupmsg' size='2' maxlength='2'>
              /
                <input name='ano' type='text' class='popupmsg' size='4' maxlength='4'>
                <input name='B1' type='submit' class='popupmsg' value='OK'>
                <br>
                <strong>PROJETO:</strong><br>
                <select size='1' class=popupmsg name='codproj'>
                  ");

					if ($codgrpold == "2"){

						$prod->listProdgeral("projeto_nome", "", $array, $array_campo , "order by nomeproj");
						for($i = 0; $i < count($array); $i++ ){

								$prod->mostraProd( $array, $array_campo, $i );

								$nomeproj = $prod->showcampo1();
								$codproj= $prod->showcampo0();
						echo("
                  <option selected value='$codproj'>$nomeproj</option>
                  ");
						}

					}else{


							$prod->listProdgeral("projeto_nome", "codproj='$codproj'", $array, $array_campo , "");
							$prod->mostraProd( $array, $array_campo, 0 );
								$nomeproj = $prod->showcampo1();
							echo("
                  <option selected value='$codproj'>$nomeproj</option>
                  ");
					}
						echo("
                </select>
                <input type='hidden' name='login' value='joao'>
                <input type='hidden' name='metauser' value='$meta'></td>
                </form>
              </tr>
              <tr>
                <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/line_vend_mes_sup.php' name='Form' target = '_blank'>
                  <td class='usertxt'><strong>Meta Acumulada M&ecirc;s </strong></td>
                  <td class='usertxt'><strong>ANO: </strong>
                      <input name='ano' type='text' class='popupmsg' size='4' maxlength='4'>
                      <input name='B1' type='submit' class='popupmsg' value='OK'>
                      <br>
                      <strong>PROJETO:</strong><br>
                      <select size='1' class=popupmsg name='codproj'>
                        ");

					if ($codgrpold == "2"){

						$prod->listProdgeral("projeto_nome", "", $array, $array_campo , "order by nomeproj");
						for($i = 0; $i < count($array); $i++ ){

								$prod->mostraProd( $array, $array_campo, $i );

								$nomeproj = $prod->showcampo1();
								$codproj= $prod->showcampo0();
						echo("
                        <option selected value='$codproj'>$nomeproj</option>
                        ");
						}

					}else{


							$prod->listProdgeral("projeto_nome", "codproj='$codproj'", $array, $array_campo , "");
							$prod->mostraProd( $array, $array_campo, 0 );
								$nomeproj = $prod->showcampo1();
							echo("
                        <option selected value='$codproj'>$nomeproj</option>
                        ");
					}
						echo("
                      </select>
                      <input type='hidden' name='login' value='joao'>
                      <input type='hidden' name='metauser' value='$meta'></td>
                </form>
              </tr>
            </table>
      "); } echo(" </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan='3'><img src='wbs2/images/spacer.gif' width='10' height='10'></td>
  </tr>
  <tr valign='top'>
    <td colspan='3'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='pleader'>
      <tr valign='top'>
        <td width='30%'><table width='100%'  border='0' cellpadding='1' cellspacing='1' class='popupmsg'>
            <tr>
              <td align='center'><img src='wbs2/images/logonotint2.gif' width='113' height='43'></td>
            </tr>
            <tr>
              <td>&#8226; <a href='noticias.php' target='inoticias' class='popupmsg' onClick=\"SetaInfoPopup('Promoção do Mês - Garantia Estendida')\">Promoção do Mês</a></td>
            </tr>
            <tr>
              <td>&#8226; <a href='wbs2/garantiaestendidapopup.php' target='inoticias' class='popupmsg' onClick=\"SetaInfoPopup('Procedimento para Garantia Estendida')\">Procedimento para Garantia Estendida</a></td>
            </tr>
            <tr>
              <td>&#8226; <a href='noticias1.htm' target='inoticias' class='popupmsg' onClick=\"SetaInfoPopup('Novas Regras do Financeiro')\">Novas Regras do Financeiro</a></td>
            </tr>
        </table></td>
        <td><table width='100%'  border='0' cellspacing='0' cellpadding='0'>
            <tr>
              <td class='popupinfo' id='informacoespopup'><strong>Nome do popup</strong> -
                Data: 00/00/0000 00:00:00 </td>
            </tr>
            <tr>
              <td><iframe src='noticias.php' name='inoticias' width='100%' marginwidth='0' height='150' marginheight='0' scrolling='yes' frameborder='0' class='popupiframe'></iframe></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan='3'><img src='wbs2/images/spacer.gif' width='10' height='10'></td>
  </tr>
  <tr>
    <td colspan='3'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
      <tr>
        <td height='20'><table  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
            <tr>
              <td class='titulommm'>Nossos Valores </td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td class='txtmmm'><span class='txtmmm2'><strong>Orienta&ccedil;&atilde;o
              ao Cliente</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Ouvir e dar aten&ccedil;&atilde;o aos nossos
clientes<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Agir com dignidade e respeito<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Desenvolver produtos, servi&ccedil;os e inova&ccedil;&otilde;es
focados na satisfa&ccedil;&atilde;o dos nossos clientes<br>
<strong>Disciplina</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Conduzir neg&oacute;cios com integridade e profissionalismo<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Atender &agrave;s promessas feitas<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Desperdi&ccedil;ar significa comprometer o sucesso<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Ignorar disc&oacute;rdias e diferen&ccedil;as
pessoais em favor do sucesso da equipe<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Aten&ccedil;&atilde;o aos detalhes<br>
<strong>Qualidade</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Alcan&ccedil;ar os altos &iacute;ndices de excel&ecirc;ncia<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Aprender, desenvolver e melhorar continuamente<br>
<strong>Inova&ccedil;&atilde;o e Criatividade</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Buscar inova&ccedil;&atilde;o e pensamento criativo<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Escutar novas id&eacute;ias e pontos de vista<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Estar aberto a mudan&ccedil;as em todos os n&iacute;veis<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Aprender pelo sucesso e pelos erros<br>
<strong>Ambiente de trabalho</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Manter o local de trabalho limpo, saud&aacute;vel
e agrad&aacute;vel<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Promover um ambiente competitivo com &eacute;tica<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Trabalhar em equipe<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Valorizar os seres humanos e as a&ccedil;&otilde;es
de responsabilidade social<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Comprometimento e esp&iacute;rito de coopera&ccedil;&atilde;o<br>
<strong>Orienta&ccedil;&atilde;o a Resultados</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Foco em resultados<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Assumir responsabilidades<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Cumprir metas e objetivos</span></td>
      </tr>
    </table></td>
  </tr>
</table>");



/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

include ("sif-rodape.php");

}


?>
