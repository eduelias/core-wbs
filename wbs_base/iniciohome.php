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
$prod->listProdMY("IF (NOW() > '2005-07-20 00:00:00' , 'S', 'N')", "" , $array129, $array_campo129, "" );
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
<style type='text/css'>
<!--
.tabelammm {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	text-align: justify;
}
.titulommm {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-transform: capitalize;
	color: #FFFFFF;
	background-color: #5580C0;
	text-align: center;
	font-size: 11px;
}
.txtmmm {
	color: #000000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
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
	padding: 10px;
	font-weight: bold;
}
.bt {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 10px;
}
.campo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	border: 1px solid #000000;
}
.tabelannn {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	text-align: justify;
}
.subtb {
	background-color: #FFBEAE;
	border: 1px solid #EBE9ED;
	text-align: left;
	font-size: 11px;
}
.subtitulo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	background-color: #DD2D00;
	padding: 5px;
	text-align: center;
	border: 1px solid #FFFFFF;
	color: #FFFFFF;
}
.tituloooo {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-transform: capitalize;
	color: #FFFFFF;
	background-color: #DD2D00;
	font-size: 11px;
}
.txtmmm2 {
	color: #000000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
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
	padding: 10px;
}
.tituloalpha {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #DD2D00;
}
-->
</style>
<table width='100%'  border='0' align='center' cellpadding='1' cellspacing='0'>
  <tr>
    <td height='50' colspan='2' class='tituloalpha'>Bem vindo ao sistema do Grupo Ipasoft</td>
  </tr>
  <tr>
    <td colspan='2'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
      <tr>
        <td width='100' height='20' class='titulommm'>Nossa Miss&atilde;o</td>
        <td width='448'>&nbsp;</td>
      </tr>
      <tr>
        <td colspan='2' class='txtmmm'>&nbsp;&nbsp;&nbsp;&nbsp;Fornecer produtos e servi&ccedil;os nos segmentos de inform&aacute;tica, comunica&ccedil;&atilde;o de voz e dados, divers&atilde;o e solu&ccedil;&otilde;es tecnol&oacute;gicas, trabalhando para superar expectativas, satisfazer desejos e realizar os sonhos dos nossos clientes, colaboradores, fornecedores e comunidades nas quais servimos.</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan='2'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='2'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
      <tr>
        <td width='100' height='20' class='titulommm'>Nossa Vis&atilde;o</td>
        <td width='448'>&nbsp;</td>
      </tr>
      <tr>
        <td colspan='2' class='txtmmm'>&nbsp;&nbsp;&nbsp;&nbsp;Manter uma posi&ccedil;&atilde;o de lideran&ccedil;a em cada um dos mercados nos quais atuamos, oferecendo aos nossos clientes produtos e servi&ccedil;os customizados, com qualidade e alto valor percebido , mantendo diferenciais competitivos em rela&ccedil;&atilde;o aos nossos concorrentes, obtendo um crescimento sustent&aacute;vel de longo prazo.</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan='2'>&nbsp;</td>
  </tr>
  <tr valign='top'>
    <td width='50%'><table width='100%'  border='0' cellpadding='3' cellspacing='0' class='tabelannn'>
      <tr>
        <td class='tituloooo'>DADOS DO USU&Aacute;RIO </td>
      </tr>
      <tr>
        <td height='40'>Verifique se os dados abaixo est&atilde;o corretos para sua seguran&ccedil;a. </td>
      </tr>
      <tr>
        <td><table width='100%'  border='0' cellspacing='4' cellpadding='5'>
            <tr bgcolor='#F8F7F9'>
              <td colspan='2' bgcolor='#F8F7F9' class='subtb'><strong>NOME USU&Aacute;RIO:</strong><br>
            $xnome</td>
            </tr>
            <tr>
              <td colspan='2'><strong>CPF/CNPJ:</strong><br>
            $xcpf $xcgc</td>
            </tr>
            <tr valign='top'>
              <td width='50%'><strong>ENDERE&Ccedil;O:</strong><br>
            $xendereco - $xbairro</td>
              <td><strong>CIDADE/UF/CEP:</strong><br>
            $xcidade - $xestado - $xcep</td>
            </tr>
            <tr valign='top'>
              <td><strong>E-MAIL CONTATO:</strong><br>
            $xemail</td>
              <td><strong>TELEFONE:</strong><br>
            ($xdddtel1) $xtel1<br>
            ($xdddtel2) $xtel2</td>
            </tr>
            <tr>
              <td colspan='2'><strong>GRUPO PERTENCENTE:</strong><br>
              </td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td width='50%'>      <table width='100%'  border='0' cellpadding='3' cellspacing='0' class='tabelannn'>
        <tr>
          <td class='tituloooo'>ESTAT&Iacute;STICAS EM VALORES </td>
        </tr>
        <tr>
          <td height='40'>Abaixo est&atilde;o as tabelas com estat&iacute;sticas de pedidos e or&ccedil;amentos em valores.</td>
        </tr>
        <tr>
          <td><table width='100%'  border='0' cellpadding='5' cellspacing='2'>
              <tr>
                <td width='40%' class='subtitulo'>USU&Aacute;RIO</td>
                <td align='center' class='subtb'><strong>M&Ecirc;S/ANO</strong></td>
              </tr>
              <tr>
                <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/line_vend.php' name='Form' target = '_blank'>
                  <td class='subtb'><strong>Meta Di&aacute;ria </strong></td>
                  <td align='center' class='subtb'><input name='mes' type='text' class='campo' size='2' maxlength='2'>
                    /
                      <input name='ano' type='text' class='campo' size='4' maxlength='4'>
                  <input name='B1' type='submit' class='bt' value='OK'></td>
                  <input type='hidden' name='login' value='$login'>
                  <input type='hidden' name='metauser' value='$meta'>
                  <input type='hidden' name='codproj' value='$codproj'>
                  <input type='hidden' name='tipovend' value='$tipovend'>
                </form>
              </tr>
              <tr>
                <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/line_vend_mes.php' name='Form' target = '_blank'>
                  <td class='subtb'><strong>Meta Acumulada M&ecirc;s </strong></td>
                  <td align='center' class='subtb'><strong>ANO: </strong>
                      <input name='ano' type='text' class='campo' size='4' maxlength='4'>
                  <input name='B1' type='submit' class='bt' value='OK'></td>
                  <input type='hidden' name='login' value='$login'>
                  <input type='hidden' name='metauser' value='$meta'>
                  <input type='hidden' name='codproj' value='$codproj'>
                  <input type='hidden' name='tipovend' value='$tipovend'>
                </form>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>"); if ($tipouserproj == "Y"){ echo("
      <table width='100%'  border='0' cellpadding='5' cellspacing='2'>
        <tr>
          <td width='40%' class='subtitulo'>SUPERVISOR</td>
          <td align='center' class='subtb'><strong>M&Ecirc;S/ANO</strong></td>
        </tr>
        <tr>
          <form method='POST' action='http://wbs.ipasoft.com.br/graph/wbs/bar_vend_sup.php' name='Form' target = '_blank'>
            <td class='subtb'><strong>Meta Di&aacute;ria Vendedor </strong></td>
            <td align='center' class='subtb'><input name='mes' type='text' class='campo' size='2' maxlength='2'>
              /
                <input name='ano' type='text' class='campo' size='4' maxlength='4'>
                <input name='B1' type='submit' class='bt' value='OK'>
                <br>
                <strong>PROJETO:</strong><br>
                <select size='1' class=campo name='codproj'>
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


							$prod->listProdgeral("projeto_nome", "codproj='$codproj'", $array, $array_campo , '');
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
            <td class='subtb'><strong>Meta Acumulada M&ecirc;s </strong></td>
            <td align='center' class='subtb'><strong>ANO: </strong>
                <input name='ano' type='text' class='campo' size='4' maxlength='4'>
                <input name='B1' type='submit' class='bt' value='OK'>
                <br>
                <strong>PROJETO:</strong><br>
                <select size='1' class=drpdwn name='codproj'>
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
    <td colspan='2'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='2'><table width='100%'  border='0' cellpadding='0' cellspacing='0' class='tabelammm'>
      <tr>
        <td width='110' height='20' class='titulommm'>Nossos Valores</td>
        <td width='438'>&nbsp;</td>
      </tr>
      <tr>
        <td colspan='2' class='txtmmm2'><strong>Orienta&ccedil;&atilde;o ao Cliente</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Ouvir e dar aten&ccedil;&atilde;o aos nossos clientes<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Agir com dignidade e respeito<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Desenvolver produtos, servi&ccedil;os e inova&ccedil;&otilde;es focados na satisfa&ccedil;&atilde;o dos nossos clientes<br>
      <strong>Disciplina</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Conduzir neg&oacute;cios com integridade e profissionalismo<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Atender &agrave;s promessas feitas<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Desperdi&ccedil;ar significa comprometer o sucesso<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Ignorar disc&oacute;rdias e diferen&ccedil;as pessoais em favor do sucesso da equipe<br>
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
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Manter o local de trabalho limpo, saud&aacute;vel e agrad&aacute;vel<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Promover um ambiente competitivo com &eacute;tica<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Trabalhar em equipe<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Valorizar os seres humanos e as a&ccedil;&otilde;es de responsabilidade social<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Comprometimento e esp&iacute;rito de coopera&ccedil;&atilde;o<br>
      <strong>Orienta&ccedil;&atilde;o a Resultados</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Foco em resultados<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Assumir responsabilidades<br>
&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Cumprir metas e objetivos</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan='2'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='2'>&nbsp;</td>
  </tr>
</table>
");



/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

include ("sif-rodape.php");

}


?>
