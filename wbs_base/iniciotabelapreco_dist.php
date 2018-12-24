

<?php

if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat, nomesubcat, nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "TABELA DE PREÇOS DISTRIBUIÇÃO";

$Actionter = "unlock";

echo ("
<style>
a.layinfo{
    position:relative;
    color:#000;
    padding-right: 0px;
    padding-left: 0;
    text-decoration:none;
    cursor:help;
    z-index:5;
}
a.layinfo:hover{background-color:#fff;z-index:20; text-decoration:none;}
a.layinfo span{display: none}
a.layinfo:hover span{
    display:block;
    position:absolute;
    top:20px; left:-100px; width:200px;
    font-size:11px;
    padding: 5px;
    border:1px solid #000;
    background-color:#FFD865; color:#000;
    text-align: center;
    cursor:help;
    z-index:20;
}
</style>
");

// INICIO DA CLASSE
$prod = new operacao();

// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProd("seguranca", "arquivo='addprodcj.php'");
		$codpgsec = $prod->showcampo0();

		$prod->clear();
		$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$var_codgrp = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplca o preco de tabela
		$fatorusertabela_ata = $prod->showcampo55(); // Fator que multiplca o preco de tabela
		$fatormajor = $prod->showcampo56(); // Fator que multiplca o preco de tabela
		$codempselect = 20;
		
function unhtmlentities ($string) {
   $trans_tbl1 = get_html_translation_table (HTML_ENTITIES);
   foreach ( $trans_tbl1 as $ascii => $htmlentitie ) {
        $trans_tbl2[$ascii] = '&#'.ord($ascii).';';
   }
   $trans_tbl1 = array_flip ($trans_tbl1);
   $trans_tbl2 = array_flip ($trans_tbl2);
   return strtr (strtr ($string, $trans_tbl1), $trans_tbl2);
}

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
		$Actionsec="list";
		$desloc=0;

		
        break;

    case "update":

		$prod->listProd($tabela, $condicao1);
				
		$nomeprodold = $prod->showcampo19();
		$codprodold = $prod->showcampo0();
		$descresold = $prod->showcampo4();
		$descdetold = $prod->showcampo5();
		$descdetold = unhtmlentities($descdetold);
		$unidadeold = $prod->showcampo7();
		$pvvold = $prod->showcampo12();
		$pvvcjold = $prod->showcampo13();
		$pvdold = $prod->showcampo50();
		$chkcbold = $prod->showcampo22();
		$histold = $prod->showcampo23();
		#$descdetold = htmlentities ($descdetold, ENT_NOQUOTES, 'UTF-8');
		

		//DADOS DA IMAGEM
		$imgsizeold = $prod->showcampo20();
		$imgtypeold = $prod->showcampo21();
		$imgnameold = $prod->showcampo28();


		#-- CALCULA PRECOS - INICIO
		
			// PRECO DE TABELA : $PRECO[$I] = $PRECOPADRAO[$I] * FATORMULT[$I]
			// PRECO DE VENDA : $PRECO[$I] * $FATORUSERTABELA
			
				if ($unidadeold =="CJ"){
					
					$pvvcjtotal = 0;
					$prod->listProdgeral("relacoes", "codprod=$codprod", $array3, $array_campo3 , "");

						for($u = 0; $u < count($array3); $u++ ){
				
						$prod->mostraProd( $array3, $array_campo3, $u );
						$codsubprod = $prod->showcampo2();
						$qtde = $prod->showcampo3();

						$prod->listProdSum("pvvcj", "produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
						$prod->mostraProd( $array1, $array_campo1, 0 );
						$pvvcj = $prod->showcampo0();
				
						$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
	
						}
	
					#-- Conjunto
					$precopadrao = $pvvcjtotal;
					#$prod->listProd("estoque", "codprod=$codprodold and codemp=$codempselect");
					#$fatormult = $prod->showcampo7();
					#$preco = $precopadrao * $fatormult;
					$preco = $precopadrao * $fatorusertabela;
					#echo("pfc=$preco ");
					
				}else{
					#-- Unidade
					if ($var_codgrp == 21){
						$pvd = $pvdold;
					}else{
						$pvd_custo = $pvdold * $fatorusertabela_ata;
						$pvd = $pvdold * $fatorusertabela_ata*$fatormajor;
					}
					$precopadrao = $pvd;
					#$prod->listProd("estoque", "codprod=$codprodold and codemp=$codempselect");
					#$fatormult = $prod->showcampo7();
					#$preco = $precopadrao * $fatormult;
					$preco = $precopadrao;
					#echo("pfu=$preco ");
				}
			

			$precof = number_format($preco,2,',','.'); 
			$tam = strlen ($precof);
			$real = substr($precof,0,($tam-3));
			$centavos = substr($precof,($tam-2),$tam);
			
	

		#-- CALCULA PRECOS - FIM

			
			
		$nomeformsec=" ATUALIZAR $nomeform ";
		
		 break;

	 case "list":
	 
	 
	 	$prod->clear();
		$prod->listProdU("COUNT(*)","vendedor_usuario", "codvend_user = '$codvend_user_select' and  senha_user = MD5('$senha_user')");
		$verif = $prod->showcampo0();
		$prod->clear();
		$prod->listProdU("tipo_supervisor","vendedor_usuario", "codvend_user = '$codvend_user_select'");
		$tipo_supervisor = $prod->showcampo0();
	 
	 		
		if ($verif > 0){
			$_SESSION['chave_vend'][$pg] = true;
			$_SESSION['codvend_sess_user'][$pg] = $codvend_user_select;
			$_SESSION['tipo_user'][$pg] = $tipo_supervisor;
		}else{
			
			#$_SESSION['chave_vend'][$pg] = false;
			#$_SESSION['codvend_sess_user'][$pg] = false;
			#$_SESSION['tipo_user'][$pg] = false;
		}
		
		#echo "$verif - $codvend_user_select - $senha_user - $tipo_supervisor - ".$_SESSION['tipo_user'][$pg];

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and hist <>'Y' and categoria.codcat=produtos.codcat and subcategoria.codsubcat=produtos.codsubcat and produtos.pvd <> 0";

		
		
		if ($palavrachave == ""){
			$condicao2 = " hist <>'Y' ";
			$condicao2 .= " and produtos.pvd <> 0";
			$condicao2 .= " and categoria.codcat=produtos.codcat";
			$condicao2 .= " and subcategoria.codsubcat=produtos.codsubcat";
		}
		
		if ($codprodpesq <>""){
			
			$condicao2 = "codprod=$codprodpesq and hist <>'Y'";
			$condicao2 .= " and produtos.pvd <> 0";
			$condicao2 .= " and categoria.codcat=produtos.codcat";
			$condicao2 .= " and subcategoria.codsubcat=produtos.codsubcat";
		}
	
		if ($pedlib == "OK"){
			$condicao2 = " hist <>'Y' ";
			$condicao2 .= " and TO_DAYS(NOW()) - TO_DAYS(datacad) <= 15";
			$condicao2 .= " and produtos.pvd <> 0";
			$condicao2 .= " and categoria.codcat=produtos.codcat";
			$condicao2 .= " and subcategoria.codsubcat=produtos.codsubcat";
		}
		#echo("$condicao2");

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "produtos, categoria, subcategoria", $condicao2 , $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, pvv, pva, datauc, unidade, hist, kit, lib_linha, produtos.codcat, produtos.codsubcat , descres, garext_12, garext_24, porc_garext_12, porc_garext_24, ponto, pvd as pvd, fdist, pvdcj", "produtos, categoria, subcategoria", $condicao2, $array, $array_campo, $parm );

		
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

if ($impressao <> 1){ include("sif-topo.php"); }

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************

function verificaObrig (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	if (!(consisteVazioTamanho(form, form.nomeprod.name, 100)))
    {
        return false;
    }
   
	
	   

	return true;
      	
}


//***************************************************************************************
//  Função para obtenção de descrição do campo
//  Retorno: Uma descrição para o campo que corresponde
//           ao que é mostrado no browser
//***************************************************************************************

function retornaNmCampo (campo)
{
	
    if (campo == 'pvv')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}


</script>


<script language=");echo('"Javascript1.2"><!-- // load htmlarea
_editor_url = "textarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);');echo("
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src=");echo('"');echo("' +_editor_url+ 'editor.js");echo('"');echo("');
  document.write(' language=");echo('"Javascript1.2"');echo("></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>






");


if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if ($impressao == 1){
	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);

echo("
<body bgcolor='#FFFFFF'>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='50%'><img border='0' src='images/grupoipa.gif' width='200' height='85'><br>
      <b><font face='Verdana' size='3'>&nbsp;&nbsp;&nbsp;&nbsp;(32) 3229-5900</font></b></td>
    </center>
    <td width='50%'>
      <p align='right'><b><font size='1' face='Verdana' color='#800000'>DATA 
      EMISSÃO<br>
      </font></b><font size='1' face='Verdana'>$datainstf<br>
      </font> <p align='right'></td>
  </tr>
  </table>
</div>
	<br>
	

	

");

}



	echo("

<div align='center'>
  <center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
  </center>
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>DETALHES</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          DO $nomeform</font><br>
                          </font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a></font></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

	<div align='center'>
<center>
    <div align='left'></div>
    <table border=0 cellpadding=0 cellspacing=0 width=550>
      <tbody> 
      <tr bgcolor='#93BEE2'> 
        <td width='100%' colspan='2'> 
          
          </td>
      </tr>
      <tr bgcolor='#93BEE2'> 
        <td colspan=2 width='100%'> 
          <div align=center> 
            <table border=0 cellpadding=0 cellspacing=0 width=548>
              <tbody> 
              <tr> 
                <td bgcolor=#ffffff width='100%' align='center'> &nbsp; 
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data' onSubmit = 'if (verificaObrig(document.Form)==false) return false'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='2' cellpadding='1' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
					  ");
					if ($Action=="update"):
			echo("
						  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
                                    <tr>
                                      <td width='50%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
						");
						  if($imgsizeold ==0){
							  echo(" <img src='images/semimagem.gif'>");
						  }else{
							  echo("
						  
						    <img src='images_prod/$imgnameold'>
							  ");
						  }
						  echo("
						  
						  </font></td>
                                      <td width='50%'><b><font face='Verdana' size='2'>COD.:
                                        $codprod</font><font face='Verdana' size='5'><br>
                                        </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='4'>$nomeprodold</font></b><br>$descresold
                                        <p><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='70%'>
                    <p align='right'><b><font color='#800000'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>
                    </font><font face='Verdana, Arial, Helvetica, sans-serif' size='5'><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='3'>R$</font> $real,</font></font></b></td>
                  <td width='30%'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='3'>$centavos</font></b></td>
                </tr>
              </table>
						<br><br>
						<table border='0' width='100%' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='5%'><font size='1' face='Verdana'><img border='0' src='images/envie.gif' width='35' height='17'></font></td>
    <td width='95%'><font size='1' face='Verdana'>Envie para um email</font></td>
  </tr>
  <tr>
    <td width='5%'><font size='1' face='Verdana'><img border='0' src='images/print.gif' width='36' height='21'></font></td>
    <td width='95%'><font size='1' face='Verdana'>Imprima esta página</font></td>
  </tr>
</table>

</td>
                                    </tr>
                                  </table>
						<input type='hidden' value='$nomeprodold' name='nomeprod' size='50' >
											");
										endif;
			echo("
</font></td>
                          </tr>

			  
					 <tr > 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>	 
                     
							   <tr bgcolor=''> 
                            
                            <td width='100%' colspan='2'>
								
							<table cellSpacing='0' cellPadding='0' width='100%' border='0'>
  <tr>
    <td><a name='topomenu'></a><br>
      <table cellSpacing='0' cellPadding='0' width='100%' border='0'>
        <tbody>
          <tr>
            <td><img src='images/title_saiba_mais.gif' align='left' width='113' height='17'></td>
          </tr>
          <tr>
            <td class='label' background='images/bg_label.gif' height='24'><img height='1' src='images/spacer_trans.gif' width='10'>
              <a class='label' href='#especificacoes'>Especificações</a>&nbsp;|&nbsp;&nbsp;<a class='label' href='#requisitos'>Requisitos</a>&nbsp;|&nbsp;&nbsp;<a class='label' href='#dadostecnicos'>Dados
              Técnicos</a>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </td>
  <tr>
    <td><a name='especificacoes'></a><br>
      <table cellSpacing='0' cellPadding='0' width='100%' border='0'>
        <tbody>
          <tr>
            <td><img src='images/label_especificacoes_on.gif' border='0' width='97' height='22'></td>
            <td class='label' align='right' width='100%' background='images/label_bg.gif'><a href='#topomenu'><img src='images/bot_voltartopo.gif' border='0' valign='bottom' width='112' height='19'></a></td>
          </tr>
        </tbody>
      </table>
      <br>
    </td>
  </tr>
  <tr>
    <td class='text'>
	<br>
	$descdetold
			</td>
  </tr>
  <tr>
    <td><img height='10' src='images/spacer_trans.gif' width='7' border='0'></td>
  </tr>
  <tr>
    <td><a name='requisitos'></a><br>
      <table cellSpacing='0' cellPadding='0' width='100%' border='0'>
        <tbody>
          <tr>
            <td><img src='images/label_reqbasicos_on.gif' border='0' width='75' height='22'></td>
            <td class='label' align='right' width='100%' background='images/label_bg.gif'><a href='#topomenu'><img src='images/bot_voltartopo.gif' border='0' valign='bottom' width='112' height='19'></a></td>
          </tr>
        </tbody>
      </table>
      <br>
    </td>
  </tr>
  <tr>
    <td class='text'>
     
    </td>
  </tr>
  <tr>
    <td class='textb'></td>
  </tr>
  <tr>
    <td><img height='10' src='images/spacer_trans.gif' width='7' border='0'></td>
  </tr>
  <tr>
    <td><a name='dadostecnicos'></a><br>
      <table cellSpacing='0' cellPadding='0' width='100%' border='0'>
        <tbody>
          <tr>
            <td><img src='images/label_dadostecnicos_on.gif' border='0' width='100' height='22'></td>
            <td class='label' align='right' width='100%' background='images/label_bg.gif'><a href='#topomenu'><img src='images/bot_voltartopo.gif' border='0' valign='bottom' width='112' height='19'></a></td>
          </tr>
        </tbody>
      </table>
      <br>
    </td>
  </tr>
  <tr>
    <td class='text'>
     
    </td>
  </tr>
  <tr>
    <td><img height='10' src='images/spacer_trans.gif' width='7' border='0'></td>
  </tr>
</table>
							
							
						
 



                             
							 </td>
                          </tr>
						   
						

							
	                       <tr > 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
			
                </td>
              </tr>
              <tr> 
                <td bgcolor=#FFFFFF width='100%'> 
                  <p align='center'><font size='1' face='Verdana'></font></p>
                </td>
              </tr>
              </tbody> 
            </table>
          </div>
        </td>
      </tr>
      <tr> 
        <td bgcolor='#93BEE2' width='50%'></td>
        <td align=right bgcolor='#93BEE2' width='50%'></td>
      </tr>
      </tbody> 
    </table>
    <p>&nbsp;</p>
  </center>
</div>
	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	echo("
<div align='center'>
  <center>
  <table width='550'>
    <tbody>
      <tr>
        <td bgColor='#d6e7ef'>
          <table cellSpacing='0' cellPadding='15' width='100%' border='0'>
            <tbody>
              <tr>
                <td width='100%' bgColor='#ffffff'>
  </center>
	

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width='30%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width='70%' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>

	  <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'><br>LANÇAMENTOS:<input type='checkbox' name='pedlib' value='OK'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='codempselect' value='$codempselect'>
         <input type='hidden' name='pg' value='$pg'>
	  </p>
			</td>
			</form>
    </tr>
  </table>
						
			  </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

");
# Pesquisa pela Empresa do OC

	
//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

/*
if ($allemp == "Y"){

echo("
<br>
<table width='300' border='0' cellspacing='0' cellpadding='0' align='center' >
  <tr><form><td align='center' valign='top'>
 
<FONT >
	      <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                                                
	");

	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();
			
	
if ($tipovend <> 'R' and $var_codgrp <> 21 and $var_codgrp <> 62 and $var_codgrp <> 42 and $var_codgrp <> 13 and $var_codgrp <> 56 and $var_codgrp <> 54 and $var_codgrp <> 32){

	echo"AQUI";

	echo("		
		<option value='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
		");
	}else{
	if ($tipovend <> 'R'){
		if ($codemp <> 14 ){
		echo("		
			<option value='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
			");
		}
	}else{
		if ($codemp == 1 or $codemp == 15 ){
		echo("		
			<option value='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
			");
		}
	}//IF REVENDAS
	
}//GRUPOS
}//FOR
	echo("	
		<option value='' selected>Escolha a Empresa</option>
	  </select>
  </td>
  </form>
 </tr>
</table>
	
");
}else{

$codempselect = $codempvend;

}
*/

//<!-- ESCOLHA DE EMPRESAS - FIM --> 
if ($_SESSION['chave_vend'][$pg] == false){
 
 echo ("
 <center>
 <table  border='0' cellspacing='2' cellpadding='2'>
 <form action='$PHP_SELF?pg=$pg&Action=list' method='post' name = 'form1'>
      <tr valign='top'>
        <td><fieldset>
          <legend class='titulos_itens'> LOGIN DO VENDEDOR</legend>
          <table width='100%'  border='0' cellspacing='4' cellpadding='4'>

            <tr class='negrito10preto'>
              <td align='center'>LOGIN
                <select name='codvend_user_select' class='cmp1'>
 
 
 ");
 
 
		 $prod->clear();
		$prod->listProdSum("codvend_user, login_user","vendedor_usuario", "hist <> 'Y' and codvend = $codvend", $array6, $array_campo6 , "order by login_user");
		for($j = 0; $j < count($array6); $j++ ){
	
			$prod->mostraProd( $array6, $array_campo6, $j );
			$codvend_list_user = $prod->showcampo0();
			$nome_user = $prod->showcampo1();
 
 echo ("
 
  <option value='$codvend_list_user'>$nome_user</option>
 ");
 }//FOR
 
  echo ("
 
          <option value='-1' selected>ESCOLHA</option>
                </select></td>
              <td align='center'>SENHA:
                <input name='senha_user' type='password' class='cmp1' id='senha_user' size='8' maxlength='8'><input name='OK' type='submit' value='OK' ></td>
            </tr>
          </table>
        </fieldset></td>
      </tr>
	  </form>
    </table>
	</center>
 ");
 
  }// CHAVE
 
 
if ($codempselect<>"" and $_SESSION['chave_vend'][$pg] == true){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
echo("
	<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='100%'>
      <hr size='1'>
      </td>
    </tr>
    <tr>
      <td width='100%'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
          <tr>
             <td width='5%'><img border='0' src='images/empresa.gif' width='25' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='20%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>

			<td width='5%'><font size='1' face='Verdana'><img border='0' src='images/print.gif' width='36' height='21'></font></td>
			<td width='20%'><b>
			<form method='POST' action='iniciotabelapreco_dist_imp.php?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&codvendselect=$codvendold' name='Form' target = '_black'>
			");
			if($var_codgrp == "66" or $var_codgrp == "70" or $var_codgrp == "58" or $var_codgrp == "2"){
			echo("
			Fator:<input type='text' name='fatorx' size='2' value = 1> 
			<br>Fatdir:<input type='checkbox' name='libfatdir' size='2' value = 'OK'> (não imprime)
			");
			}else{
			echo("
			<input type='hidden' name='fatorx' size='2' value = 1> 
			");
			}
			echo ("
				<input class='sbttn' type='submit' name='Submit' value='Imprimir Tabela Completa'>
			</form>
			</td>

          <td width='25%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></td>
        </tr>
      </table>
    </td>
  </tr>
  <center>
  <tr>
    <td width='100%'>
      <hr size='1'>
    </td>
  </tr>
  </table>
  </center>
</div>

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='40%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME PROD</font></b></div>
    </td>
    <td  align='center' width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>UNID.</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PREÇO</font></b></div>
    </td>
	<td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PREÇO<BR>FAT DIR</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>POS<br>EST</font></b></div>
    </td>
     <td align='center' width='5%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PTO</font></b></div>
    </td>
	<td align='center' width='15%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
 
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codprod = $prod->showcampo0();			
			$nomeprod = $prod->showcampo1();
			$pvv = $prod->showcampo2();
			$pva = $prod->showcampo3();
			$datauc = $prod->showcampo4();
			$unidade = $prod->showcampo5();
			$hist = $prod->showcampo6();
			$kit = $prod->showcampo7();
			$lib_linha = $prod->showcampo8();
			$codcat = $prod->showcampo9();
			$codsubcat = $prod->showcampo10();
			$descres = $prod->showcampo11();

            // garantia
   			$garext_12 = $prod->showcampo12();
			$garext_24 = $prod->showcampo13();
			$porc_garext_12 = $prod->showcampo14();
			$porc_garext_24 = $prod->showcampo15();
			$ponto_prod = $prod->showcampo16();
			$pvd = $prod->showcampo17();
			$fdist = $prod->showcampo18();
			$pvdcj = $prod->showcampo19();
			
			$fdist = (1-$fdist)*100;
			$fdistf = number_format($fdist, 2,',', '.');
			
			//CALCULO DO CUSTO
			$pvd_custo = $pvd * $fatorusertabela_ata;
			$pvdcj_custo = $pvdcj * $fatorusertabela_ata;
					
			
			$pvv = $pvv * $fatorusertabela * $fatormult_var;
			$pvvf = number_format($pvv, 2,',', '.');
			$pva = $pva * $fatorusertabela * $fatormult_ata;
			$pvaf = number_format($pva, 2,',', '.');
			
			if ($var_codgrp == 66 or $var_codgrp == 70 or $var_codgrp == 58){
				
				$pvd = $pvd;
				$pvdcj = $pvdcj;
			}else{
				
				$pvd = $pvd * $fatorusertabela_ata*$fatormajor;
				$pvdcj = $pvdcj *$fatorusertabela_ata*$fatormajor;
			}
			
			
			
			$pvdf = number_format($pvd, 2,',', '.');
			$pvdcjf = number_format($pvdcj, 2,',', '.');
			$pvd_custof = number_format($pvd_custo, 2,',', '.');
			$pvdcj_custof = number_format($pvdcj_custo, 2,',', '.');
			
			
			//echo "$porc_garext_12 - $porc_garext_24<br>";
			
			

    		$datauc = str_replace('-','',$datauc);

			$anouc = substr($datauc,0,4);
			$mesuc = substr($datauc,4,2);
			$diauc = substr($datauc,6,2);
			

			if ($unidade == "UM"){$cor ="#D6E7EF";}else{$cor="#F3F8FA";}
			if ($hist == "Y"){$cor ="#F2E4C4";}
			if ($kit == "Y"){$cor ="#C7E9C0";}

				
			// CALCULA TODO O ESTOQUE
			$prod->clear();
			$prod->listProdU("qtde, reserva", "estoque" , "codprod = $codprod and codemp = $codempselect GROUP BY codprod");
			$qtde = $prod->showcampo0();
			$reserva = $prod->showcampo1();

			if ($reserva < 0 ){$reserva = 0;}
			if ($qtde < 0 ){$qtde = 0;}
			$estoque = $qtde - $reserva;
			
					// MARRETA PARA MOSTRAR ESTOQUE DA FABRICA 
				#echo "est=".$estoque."<BR>";
				
				$reserva_total = 0; 
				$est_reserva_ped = 0;
				$est_reserva_op = 0;
				$est_reserva_op_total = 0;
				
				if ($codempselect ==15){
					
					$prod->clear();
					$prod->listProdU("COUNT(*) est","codbarra", "codprod=$codprod and codemp=14 and tipo_fab <>'P' and codbarraped <> 1 GROUP by codprod ");
					$est_fab = $prod->showcampo0();
					$prod->clear();
					$prod->listProdU("SUM(reserva) as res","estoque", "estoque.codprod=$codprod and estoque.codemp=14");
					$res_fab = $prod->showcampo0();
					
					
					/*
					// VERIFICA QUANTIDADES EM PRODUCAO DESSE PRODUTO
			
						$prod->clear();
						$prod->listProdSum("op.qtde, op.idop", "op_prod LEFT JOIN op ON op.idop = op_prod.idop", "op_prod.codprod = $codprod and codemp=14 and hist <> 'S' GROUP by op_prod.idop", $array5, $array_campo5, "" );
						#$prod->listProdU("SUM(op.qtde), op.idop", "op_prod LEFT JOIN op ON op.idop = op_prod.idop", "op_prod.codprod = $codprod and codemp=$codempselect and hist <> 'S' GROUP by op_prod.codprod");
							for($t = 0; $t < count($array5); $t++ ){
						
								$prod->mostraProd( $array5, $array_campo5, $t );
								$est_reserva_op = $prod->showcampo0();
								$idop = $prod->showcampo1();
						#echo "aqui=$idop";
						
							$prod->clear();
							$prod->listProdU("COUNT(*)", "op_sn LEFT JOIN op ON op.idop = op_sn.idop", "codemp=14 and hist <> 'S' and op_sn.cb = 'OK' and op.idop = '$idop'");
							$est_reserva_op_sn = $prod->showcampo0();
							
							$est_reserva_op_total = $est_reserva_op_total + ($est_reserva_op-$est_reserva_op_sn);
							#echo "| $est_reserva_op + $est_reserva_op_sn | $idop <BR>";
						
							}//FOR
					
					*/
					$estoque = $estoque + ($est_fab-$res_fab+$est_reserva_op_total);
						#echo "est_fb=".$est_fab."<BR>";
				}
				#echo "est_t=".$estoque."<BR>";
			
			if ($codempselect == 15){$cond1 = "(ocprod.codemp = 14 or ocprod.codemp = 15)";$cond2 = " and codped_transf = 0";}else{$cond1 = "(ocprod.codemp = $codempselect)";$cond2 = "";}
			
			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod, oc ", "codprod = $codprod and ".$cond1." and hist<>1 and oc.codoc=ocprod.codoc and tipo_nf <> 'P' ".$cond2);
			$qtdecomp = $prod->showcampo0();
			$qtdecomp = $qtdecomp + $estoque;

			$prod->listProdSum("dataprevcheg","ocprod, oc", "codprod=$codprod and ".$cond1." and oc.hist <> 1 and oc.codoc=ocprod.codoc  and tipo_nf <> 'P' ".$cond2, $array77, $array_campo77, "ORDER BY dataprevcheg LIMIT 0,1" );
			$prod->mostraProd( $array77, $array_campo77, 0 );
			$dataprevcheg = $prod->showcampo0();
			$dataprevf = $prod->fdata($dataprevcheg);
			if ($dataprevcheg == ""){$dataprevf = "SEM PREVISAO";}

			$kit_no = 0;$linha_no=0;
			if ($estoque < 0 ){$estoque = 0;}
			
	if ($estoque > 0){
		$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
	}
	if (($estoque == 0 OR $estoque < 0) and $qtdecomp > 0){
			$alarm = "<IMG SRC='images/est_prev.gif' alt='DATA PREVISAO CHEGADA:$dataprevf' BORDER=0 ><br>$qtdecomp"; //PREVISAO DE COMPRA
	}					
	if (($estoque == 0 OR $estoque < 0) and $qtdecomp <= 0){
			if ($unidade <> "CJ"){
				$alarm = "<IMG SRC='images/est_no.gif'  BORDER=0 >"; // SEM ESTOQUE
				if ($kit == "Y"){$kit_no = 1;}else{$kit_no = 0;}
				if ($lib_linha == "Y"){$linha_no = 0;}else{$linha_no = 1;}
			}else{
				$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
			}
		
	}
	
	if ($xcodcat <> $codcat){
		$prod->clear();
	$prod->listProdU("nomecat", "categoria" , "codcat = $codcat");
	$nomecat = $prod->showcampo0();
	
echo("
<tr bgcolor=''> 
			
			<td width='80%' height='0' colspan='6'>
            <img border='0' src='images/seta_laranja.gif' width='11' height='9'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF66000'>
            $nomecat</font></b><hr></td>
			
	   </tr>
");
		}
$xcodcat = $codcat;

if ($xcodsubcat <> $codsubcat){
		$prod->clear();
	$prod->listProdU("nomesubcat", "subcategoria" , "codsubcat = $codsubcat");
	$nomesubcat = $prod->showcampo0();
	
echo("
<tr bgcolor=''> 
			
			<td width='80%' height='0' colspan='6' align = 'left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img border='0' src='images/seta1-a.gif' width='5' height='11'>&nbsp;<b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#93BEE2'>
            $nomesubcat</font></b></td>
			
	   </tr>
");
		}
$xcodsubcat = $codsubcat;

	
	#echo("es=$estoque");
	if ($kit_no <> 1 and  $pvd <> 0){

		echo("
		<tr bgcolor='$cor'> 
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codprod</font></td>
			<td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></td>
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$unidade</font></td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$pvdf<BR>"); if($var_codgrp == "66" or $var_codgrp == "70" or $var_codgrp == "58" ){echo "$fdistf %<br>";} echo ("</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#FF0000'>"); if($_SESSION['tipo_user'][$pg] == "S" and ($var_codgrp != "66" or $var_codgrp != "70" or $var_codgrp != "58" )){echo "<b>CUSTO</B>:<BR>$pvd_custof";} echo ("</font>"); if($estrela == "1"){echo $layinfo;} echo ("</td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$pvdcjf<BR>"); if($var_codgrp == "66" or $var_codgrp == "70" or $var_codgrp == "58" ){echo "$fdistf %<br>";} echo ("</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#FF0000'>"); if($_SESSION['tipo_user'][$pg] == "S" and ($var_codgrp != "66" or $var_codgrp != "70" or $var_codgrp != "58" )){echo "<b>CUSTO</B>:<BR>$pvdcj_custof";} echo ("</font>"); if($estrela == "1"){echo $layinfo;} echo ("</font></td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$alarm<br>$estoque</font></td>
			<td align='center' width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$ponto_prod</font></td>
			<td align='center' width='15%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=update&codprod=$codprod&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codempselect=$codempselect'><font face='Verdana, Arial, Helvetica, sans-serif'>Ver Detalhes
			  </font></b></a></font></td>
			
	   </tr>
		");
	} // KIT SEM ESTOQUE
	 }

		echo("
				</table>
		");
}

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list" and $codempselect <> ""){
/// CONTADOR DE PAGINAS ////
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg&codempselect=$codempselect";   

include("numcontg.php");
}

if ($impressao <> 1 ){ include ("sif-rodape.php");}

}
?>
       
