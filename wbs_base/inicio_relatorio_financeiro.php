<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "FINANCEIRO";
$nomeformsec = "Relatórios do Financeiro";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		#if ($codempvend <> 0){$codempselect = $codempvend;}

	$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

	
		
        break;

	 case "update":
			
		 
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	
	


}


// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");

echo("

<SCRIPT language=JavaScript> 
function Go(_f){ 
  var _ret=false; /* this will cancel the submit */
if(_f.relat[0].checked)
{
  _f.action='rotina_fluxo_faturamento.php';
  _ret=true;
} 
if(_f.relat[1].checked)
{
  _f.action='graph/wbs/fluxo_cap.php';
  _ret=true;
} 
if(_f.relat[2].checked)
{
  _f.action='graph/wbs/fluxo_cap_hist.php';
  _ret=true;
} 
if(!_ret)
  alert('Voce tem que selecionar um relatorio primeiro!');
return(_ret);
}

function Go1(_f){ 
  var _ret=false; /* this will cancel the submit */
if(_f.relat[0].checked)
{
  _f.action='rotina_pedido_pendencia_relatorio.php';
  _ret=true;
} 
if(_f.relat[1].checked)
{
  _f.action='rotina_pedido_prazo_medio_relatorio.php';
  _ret=true;
} 
if(!_ret)
  alert('Voce tem que selecionar um relatorio primeiro!');
return(_ret);
}
</SCRIPT> 

");

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	


	echo("
	<head>
<title> SUBSTITUIÇÃO DE CÓDIGO BARRA</title>


</head>
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br></font><font color='#FF9933' size='3' face='Verdana'></font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><font size='3' face='Verdana'><font color='#FF9933'>
                          $nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></font></b></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><br>
                          </a></font></td>
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

");
//<!-- ESCOLHA DE EMPRESAS - INICIO --> 

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

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
		");
	
}
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


//<!-- ESCOLHA DE EMPRESAS - FIM --> 
if ($codempselect<>""){


	$prod->listProdU("nome","empresa", "codemp=$codempselect");
				
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='7%'>
              <p align='center'></td>
            <td width='30%'></td>
          </center>
          <td width='35%'>
            </td>
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
  <tr>
      <td width='542' bgColor='#93bee2' height='31'><b><font face='Verdana' color='#000000' size='2'>RELATÓRIOS
        FINANCEIROS<br>
        </font></b><font face='Verdana' color='#000000' size='1'>(Lista de
        Relatórios )</font></td>
  </tr>
  <tr>
      <td width='542' height='21'></td>
  </tr>
  </table>
  </center>
</div>
<a name='a1'></a>
<form method='POST' onsubmit='return Go(this)' target='_blanck'>
  <div align='center'>
  <center>
<table height='128' cellPadding='3' width='550' border='0'>
  <tbody>
    <tr>
      <td width='76' bgColor='#ffffff' height='21'>&nbsp;</td>
    </center>
    <td width='215' bgColor='#ffffff' height='21'>
      <p align='left'><b><font face='Verdana' color='#800000' size='2'>&nbsp; DADOS</font></b></p>
    </td>
    <td width='245' bgColor='#ffffff' height='21'><b><font face='Verdana' color='#800000' size='2'>&nbsp;</font></b></td>
  </tr>
  <center>
  <tr>
    <td width='76' bgColor='#93bee2' height='21'><b><font face='Verdana' size='1'>PERÍODO</font></b></td>
  </center>
  <td width='215' bgColor='#93bee2' height='21'>
    <p align='left'><b><font size='2' face='Verdana'><input type='text' name='mes' size='2' maxlength='2'>/<input type='text' name='ano' size='4' maxlength='4'>
    </font></b></p>
  </td>
  <td width='245' bgColor='#93bee2' height='21'>&nbsp;</td>
  </tr>
  <center>
  <tr>
    <td width='76' bgColor='#d6e7ef' height='21'><b><font face='Verdana' size='1'>USUÁRIO</font></b></td>
  </center>
  <td width='215' bgColor='#d6e7ef' height='21'>
  <select size='1' class=drpdwn name='codvend' >
                                   	");

	$prod->listProdgeral("vendedor", "block <> 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendselect = $prod->showcampo1();
			$nomevendselect = strtoupper($nomevendselect);
			$xcodvend = $prod->showcampo0();

	echo("		
		<option value='$xcodvend'>$nomevendselect</option>
		");
	
	}
	
echo("	
                                      <option value='-1' selected>TODOS</option>	
	
                                    </select></td>
  <td width='245' bgColor='#d6e7ef' height='21'>(opcional)</td>
  </tr>
  <tr>
    <td width='76' bgColor='#FFFFFF' height='21' align='center'><b><font size='1' face='Verdana'>&nbsp;</font></b></td>
    <td width='460' bgColor='#FFFFFF' height='21' colspan='2'>&nbsp;</td>
  </tr>
  <tr>
    <td width='76' bgColor='#ffffcc' height='21' align='center'>
      <p align='center'><b><font size='1' face='Verdana'><input type='radio' value='1' checked name='relat'></font></b></p>
    </td>
    <td width='460' bgColor='#ffffcc' height='21' colspan='2'>
      <p align='left'><b><font size='1' face='Verdana'>Analise de vendas por
      forma de pagamento</font></b></p>
    </td>
  </tr>
  <tr>
    <td width='76' bgColor='#ffffcc' height='21' align='center'><b><font size='1' face='Verdana'><input type='radio' value='2' checked name='relat'></font></b></td>
    <td width='460' bgColor='#ffffcc' height='21' colspan='2'>
      <p align='left'><b><font size='1' face='Verdana'>Fluxo de Desembolso</font></b></p>
    </td>
  </tr>
<tr>
    <td width='76' bgColor='#ffffcc' height='21' align='center'><b><font size='1' face='Verdana'><input type='radio' value='3' checked name='relat'></font></b></td>
    <td width='460' bgColor='#ffffcc' height='21' colspan='2'>
      <p align='left'><b><font size='1' face='Verdana'>Fluxo de Pagamentos</font></b></p>
    </td>
  </tr>
  <tr>
    <td width='542' colSpan='3' height='21'>
      <p align='center'></p>
    </td>
  </tr>
  <center>
  <tr>
    <td width='542' colSpan='3' height='21'>
      <p align='center'><input type='submit' value='Gerar Relatório'></p>
    </td>
  </tr>
  </center>
</tbody>
</table>

  </div>
  
  <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codemp' value='$codempselect'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>


<a name='a1'></a>
<form method='POST' onsubmit='return Go1(this)' target='_blanck'>
  <div align='center'>
  <center>
<table height='128' cellPadding='3' width='550' border='0'>
  <tbody>
    <tr>
      <td width='76' bgColor='#ffffff' height='21'>&nbsp;</td>
    </center>
    <td width='215' bgColor='#ffffff' height='21'>
      <p align='left'><b><font face='Verdana' color='#800000' size='2'>&nbsp; DADOS</font></b></p>
    </td>
    <td width='245' bgColor='#ffffff' height='21'><b><font face='Verdana' color='#800000' size='2'>&nbsp;</font></b></td>
  </tr>
  <center>
  <tr>
    <td width='76' bgColor='#93bee2' height='21'><b><font face='Verdana' size='1'>PERÍODO</font></b></td>
  </center>
  <td width='215' bgColor='#93bee2' height='21'>
    <p align='left'><b><font size='2' face='Verdana'>DE <input type='text' name='mes' size='2' maxlength='2'>/<input type='text' name='ano' size='4' maxlength='4'>
    ATE </font></b><b><font size='2' face='Verdana'><input type='text' name='mes1' size='2' maxlength='2'>/<input type='text' name='ano1' size='4' maxlength='4'>
    </font></b></p>
  </td>
  <td width='245' bgColor='#93bee2' height='21'>&nbsp;</td>
  </tr>
  <center>
  <tr>
    <td width='76' bgColor='#d6e7ef' height='21'><b><font face='Verdana' size='1'>PROJETO</font></b></td>
  </center>
  <td width='215' bgColor='#d6e7ef' height='21'>
  <select size='1' class=drpdwn name='codproj' >
                                   	");

$prod->listProdgeral("projeto_nome", "", $array, $array_campo , "order by nomeproj");
						for($i = 0; $i < count($array); $i++ ){
								
								$prod->mostraProd( $array, $array_campo, $i );

								$nomeproj = $prod->showcampo1();
								$xcodproj= $prod->showcampo0();
						echo("		
							<option selected value='$xcodproj'>$nomeproj</option>
						");
						}
	
echo("	
                                      <option value='-1' selected>TODOS</option>	
	
                                    </select></td>
  <td width='245' bgColor='#d6e7ef' height='21'>&nbsp;</td>
  </tr>
  <tr>
    <td width='76' bgColor='#FFFFFF' height='21' align='center'><b><font size='1' face='Verdana'>&nbsp;</font></b></td>
    <td width='460' bgColor='#FFFFFF' height='21' colspan='2'>&nbsp;</td>
  </tr>
  <tr>
    <td width='76' bgColor='#ffffcc' height='21' align='center'>
      <p align='center'><b><font size='1' face='Verdana'><input type='radio' value='1' checked name='relat'></font></b></p>
    </td>
    <td width='460' bgColor='#ffffcc' height='21' colspan='2'>
      <p align='left'><b><font size='1' face='Verdana'>Pedidos Pendentes de
      Pagamento</font></b></p>
    </td>
  </tr>
  <tr>
    <td width='76' bgColor='#ffffcc' height='21' align='center'><b><font size='1' face='Verdana'><input type='radio' value='2' name='relat'></font></b></td>
    <td width='460' bgColor='#ffffcc' height='21' colspan='2'>
      <p align='left'><b><font size='1' face='Verdana'>Prazo Médio de Acerto</font></b></p>
    </td>
  </tr>
  <tr>
    <td width='542' colSpan='3' height='21'>
      <p align='center'></p>
    </td>
  </tr>
  <center>
  <tr>
    <td width='542' colSpan='3' height='21'>
      <p align='center'><input type='submit' value='Gerar Relatório'></p>
    </td>
  </tr>
  </center>
</tbody>
</table>

  </div>
	    <input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codemp' value='$codempselect'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
  
</form>

		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////
}
endif;

include ("sif-rodape.php");
}

?>
       
