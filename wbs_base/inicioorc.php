

<?php

include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "";					// Tabela EM USO
$condicao1 = "";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = "  ";								// order by nome
$campopesq = "";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "";
$titulo = "";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();


#$entrada = 500;
#$afpg = 2003;
#$mfpg = 01;
#$dfpg = 17;
#$afpge = 2002;
#$mfpge = 12;
#$dfpge = 17;
#$parcelas = 3;
#$tac = 20;

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

  
    case "calculo":


		if ($fpg == 1){
		
			$entrada = 0;
			$afpg = $afpg1;	$mfpg = $mfpg1;	$dfpg = $dfpg1;
			$afpge = 0; $mfpge = 0; $dfpge = 0;
			$parcelas = $parcelas1;

		}else{

			$afpg = $afpg2;	$mfpg = $mfpg2;	$dfpg = $dfpg2;
			$parcelas = $parcelas2;

		}
		
		echo("login=$loginselect");

		$prod->listProd("empresa", "codemp=$codemp");
		$descmax = $prod->showcampo18();
		$fatorvista = $prod->showcampo20();
		$taxa = $prod->showcampo21();
		$tac = $prod->showcampo22();
		#echo("t=$taxa");
		$prod->clear();
		$prod->listProd("vendedor", "nome='$loginselect'");
		$fatorcusto = $prod->showcampo6(); 
		
		$dataatual = $prod->gdata();

		// CALCULO DO VALOR DE TABELA A VISTA
		#$valortotaltabela = $vpvt;
		$valortotaltabela = $vt;
		$valortotaltabelavista = $valortotaltabela*$fatorvista;
		$valorcustovista = $valortotaltabelavista*$fatorcusto;
		
		$pma=0;
		$pm=0;
		for($p = 0; $p < $parcelas; $p++ ){

			if ($mfpg == 13):
				$mfpg = '01';
				$afpg = $afpg + 1;
			endif;
			if (strlen($mfpg)==1){$mfpg = '0'.$mfpg;}
			if (strlen($mfpge)==1){$mfpge = '0'.$mfpge;}
		
			$dataentrada = $afpge.$mfpge.$dfpge;
			$datavenc[$p] = $afpg.$mfpg.$dfpg;
			$difdias = $prod->numdias($dataatual,$datavenc[$p]); 
			$difdiasentrada = $prod->numdias($dataatual,$dataentrada); 
			#$n = ($difdias/30);
			$valortp = ($valortotaltabela - $entrada);
			$valorpini[$p] = ($valortotaltabela - $entrada)/$parcelas;
			$pma = $pma + $valorpini[$p]*$difdias;

			#echo("difdias=$difdias<br>");
			#echo("pma=$pma<br>");

			$mfpg++;

		}
			
			$pmap = $pma/$valortp;
			$pm = (($entrada*$difdiasentrada) + ($pma)) / $valortotaltabela;

	
			for($p = 0; $p < $parcelas; $p++ ){

				$jurosentrada[$p] = $entrada*(pow((1+($taxa/100)),$difdiasentrada/30)-1);
				$valorp[$p] = (($valortotaltabelavista - $entrada)+$jurosentrada[$p])/$parcelas;
				$valorpv[$p] = $valorp[$p]*(pow((1+($taxa/100)),$pmap/30));

				// CALCULO DO VALOR DE VENDA A VISTA ( SOMATORIO DAS PARCELAS CONVERTIDAS PARA VALOR PRESENTE )
				$valorvendavista = $valorvendavista + $valorpv[$p] ;
				$valorvenda = $valorvenda + $valorp[$p];

			}	
				$valorvendavista = $valorvendavista + $entrada;

			
			if ($fpg == 1){
				$entrada = $valorpv[0];
				$dataentrada = $datavenc[0];
				$parcelascont = $parcelas - 1;
			}else{
				$parcelascont = $parcelas;
			}
			if ($pm > 63){
				$entrada = $entrada + $tac;
			}else{
				$entrada = $entrada;
				}

			#echo("valorvendavista = $valorvendavista <br> valorcustovista = $valorcustovista <br> valortotaltabelavista = $valortotaltabelavista <br> fatorcusto = $fatorcusto");

			$impostodif = $valortotaltabelavista - $valortotaltabelavista;
			if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

			// MARGEM DE LUCRO BRUTO
			$mlb = $valortotaltabelavista - $valorcustovista - $impostodif;
			//MARGEM DE CONTRIBUICAO DE VENDA
			$mcv = (1000*($mlb)/$valortotaltabelavista); 

		
		#$Actionsec="list";
		
				
		 break;

	 case "list":

		$valortabela = $vt;
		$valortabela = number_format($valortabela,2,',','.'); 
		$Actionsec="list";
	
		
		 break;


	 case "delete":

	
		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
	
		$Action="list";


}

// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

echo("
<html>

<head>
<meta http-equiv='Content-Language' content='pt-br'>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<meta name='GENERATOR' content='Microsoft FrontPage 4.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<title>SIMULAÇÃO DE ORÇAMENTO</title>
<SCRIPT language=JavaScript src='scripts.js'></SCRIPT>
<SCRIPT language=JavaScript src='consiste.js'></SCRIPT>
<link rel='stylesheet' type='text/css' href='style.css'>


</head>
	");

#include("sif-topo.php");

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

$valortotaltabela = number_format($valortotaltabela,2,',','.'); 
$valortotaltabelavista = number_format($valortotaltabelavista,2,',','.'); 
$valorvendavista = number_format($valorvendavista,2,',','.'); 
$entrada = number_format($entrada,2,',','.'); 
$mlbf = number_format($mlb,2,',','.'); 
$pm = number_format($pm,2,',','.'); 
$dataentrada = $prod->fdata($dataentrada);

	echo("

  <p align='right'>&nbsp;</p>
    <div align='center'>
      <center>
      <table border='0' width='350' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='100%'><font face='Verdana' size='4' color='#86ACB5'><b>::
            RESULTADO SIMULAÇÃO ::</b></font></td>
        </tr>
      </center>
      <tr>
        <td width='100%'><font size='1' face='Verdana'>&nbsp;</font></td>
      </tr>
      <tr>
        <td width='100%'> 
        </td>
      </tr>
      <center>
      <tr>
        <td width='100%'>
          <hr size='1'>
          <table border='0' width='100%' cellspacing='1' cellpadding='3'>
            <tr>
              <td width='48%' bgcolor='#F3F8FA'>
                <font size='1' face='Verdana'><b>VALOR PEDIDO : </b></font></td>
            <td width='52%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'><b>
          R$ </b>$valortotaltabela</font></td>
          </tr>
            </center>
            <tr>
              <td width='48%' bgcolor='#F3F8FA'>
                <p align='left'><font size='1' face='Verdana'><b>VALOR PEDIDO À
                VISTA: </b></font></td>
      <center>
            <td width='52%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'><b>
          R$ </b>$valortotaltabelavista</font></td>
          </tr>
            </center>
        </table>
      </td>
      </tr>
      <center>
      <tr>
        <td width='100%'>
          <hr size='1'>
          <table border='0' width='100%' cellspacing='1' cellpadding='2'>
            <tr>
              <td width='100%' bgcolor='#F3F8FA' colspan='3'>
                <b><font size='1' face='Verdana' color='#000000'>VALORES A
                PRAZO:</font></b></td>
            </tr>
            <tr>
              <td width='100%' bgcolor='#F3F8FA' colspan='3'>&nbsp;</td>
            </center>
          </tr>
          <center>
           <tr>
            <td width='29%' bgcolor='#F3F8FA'><font size='1' face='Verdana'>Entrada:</font></td>
            <td width='39%' bgcolor='#F3F8FA' align='center'><font size='1' face='Verdana'>$dataentrada</font></td>
            <td width='32%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'><b>
          R$ </b>$entrada</font></td>
          </tr>

    ");
		$i=1;
		for($p = 0; $p < $parcelascont; $p++ ){
			$valorpv[$p] = number_format($valorpv[$p],2,',','.'); 
			if ($fpg==1){$u=$i;}else{$u=$p;}
			$datavenc[$u] = $prod->fdata($datavenc[$u]);
	echo("
           <tr>
            <td width='29%' bgcolor='#F3F8FA'><font size='1' face='Verdana' color='#000000'>Prestação
              No $i</font><font size='1' face='Verdana' color='#000000'>:</font></td>
            <td width='39%' bgcolor='#F3F8FA' align='center'><font size='1' face='Verdana'>$datavenc[$u]</font></td>
            <td width='32%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'><b>
          R$ </b>$valorpv[$p]</font></td>
          </tr>

				");	
		  $i++;
		}	
	echo("

          </table>
        </center>
        </td>
      </tr>
      <tr>
        <td width='100%'>
          <hr size='1'>
      <center>
          <table border='0' width='100%' cellspacing='1' cellpadding='2'>
			<tr>
            <td width='57%' bgcolor='#F3F8FA'><font size='1' face='Verdana'><b>PRAZO MÉDIO GLOBAL: </b></font></td>

            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'>$pm dias</font></td>
          </tr>
          <tr>
            <td width='57%' bgcolor='#F3F8FA'><font size='1' face='Verdana'><b>VALOR PEDIDO
              A PRAZO: </b></font></td>

            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'><b>
          R$ </b>$valorvendavista</font></td>
          </tr>
          <tr>
            <td width='57%' bgcolor='#F3F8FA'><font size='1' face='Verdana'><b>MLB</b></font></td>
            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><font size='1' face='Verdana'><b>
          R$ </b>$mlbf</font></td>
          </tr>
          </table>
            </center>
        </td>
      </tr>
        <tr>
        <td width='100%'>
        <hr size='1'>
        </td>
      </tr>
      <tr>
        <td width='100%'>
        <p align='center'><font size='1' face='Verdana'><b><a href='javascript:history.go(-1);'>VOLTAR</a></b></font>
        </td>
      </tr>

      </table>
    </div>

    <p align='center'>&nbsp;</p>
		");
/*
		
	valortotaltabela = $valortotaltabela<br>
	valortotaltabelavista = $valortotaltabelavista<br>
	difdias = $difdias<br>
	difdiasentrada = $difdiasentrada<br>
	valortp = $valortp<br>
	pma = $pma<br>
	pmap = $pmap<br>
	pm = $pm<br>
    ");
		for($p = 0; $p < $parcelas; $p++ ){
	echo("
		jurosentrada[$p] = $jurosentrada[$p]<br>
		valorpini[$p] = $valorpini[$p]<br>
		valorp[$p] = $valorp[$p]<br>
		valorpv[$p] = $valorpv[$p]<br>
		");	
		}	
	echo("

		valorvendavista = $valorvendavista<br>
		valorvenda = $valorvenda<br>
		entrada = $entrada<br>
		parcelas = $parcelas<br>
*/
	

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	echo("
  <form method='POST' action='$PHP_SELF?Action=calculo'>
    <p align='right'>&nbsp;</p>
    <div align='center'>
      <center>
      <table border='0' width='350' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='100%'><font face='Verdana' size='4' color='#86ACB5'><b>::
            SIMULAÇÃO ::</b></font></td>
        </tr>
      </center>
      <tr>
        <td width='100%'><font size='1' face='Verdana'>&nbsp;</font></td>
      </tr>
      <tr>
        <td width='100%'>
          <p align='right'><font size='1' face='Verdana'><b>VALOR PEDIDO TABELA:
          R$ </b>$valortabela</font></td>
      </tr>
      <center>
      <tr>
        <td width='100%'>
          <hr size='1'>
          <table border='0' width='100%' cellspacing='1' cellpadding='2'>
            <tr>
              <td width='6%' bgcolor='#86ACB5'>
                <p align='center'><font size='1' face='Verdana' color='#FFFFFF'><b>1</b></font></td>
              <td width='28%' bgcolor='#F3F8FA'><b><font size='1' face='Verdana' color='#000000'>PARCELAS
                IGUAIS</font></b></td>
            </center>
            <td width='23%' bgcolor='#F3F8FA'>&nbsp;</td>
            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><b><font face='Verdana' size='1' color='#000000'>DATA
              1º VENC.</font></b></td>
          </tr>
          <tr>
            <td width='6%' bgcolor='#F3F8FA'><font face='Verdana' size='1'><input type='radio' name='fpg' value='1' checked></font></td>
            <td width='28%' bgcolor='#F3F8FA'><font face='Verdana' size='1'><select size='1' name='parcelas1'>
                <option selected>Escolha</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
              </select></font></td>
            <td width='23%' bgcolor='#F3F8FA'>
              <p align='center'>&nbsp;</td>
            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><font face='Verdana' size='1'><input type='text' name='dfpg1' size='2'>/<input type='text' name='mfpg1' size='2'>/<input type='text' name='afpg1' size='4'></font></td>
          </tr>
        </table>
      </td>
      </tr>
      <center>
      <tr>
        <td width='100%'>
          <hr size='1'>
          <table border='0' width='100%' cellspacing='1' cellpadding='2'>
            <tr>
              <td width='6%' bgcolor='#86ACB5'>
                <p align='center'><font size='1' face='Verdana' color='#FFFFFF'><b>2</b></font></td>
              <td width='28%' bgcolor='#F3F8FA'><b><font size='1' face='Verdana' color='#000000'>PARCELAS
                IGUAIS</font></b></td>
              <td width='23%' bgcolor='#F3F8FA'>
                <p align='center'><b><font size='1' face='Verdana' color='#000000'>ENTRADA<br>
                (R$)</font></b></td>
              <td width='43%' bgcolor='#F3F8FA'>
                <p align='right'><b><font face='Verdana' size='1' color='#000000'>DATA
                ENTRADA</font></b></td>
            </tr>
            <tr>
              <td width='6%' bgcolor='#F3F8FA'><font face='Verdana' size='1'><input type='radio' name='fpg' value='2'></font></td>
              <td width='28%' bgcolor='#F3F8FA'><font face='Verdana' size='1'><select size='1' name='parcelas2'>
                <option selected>Escolha</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                
              </select></font></td>
              <td width='23%' bgcolor='#F3F8FA'>
                <p align='center'><font face=Verdana><input type=text name='entrada' size='8'></font></td>
              <td width='43%' bgcolor='#F3F8FA'>
                <p align='right'><font face='Verdana' size='1'><input type='text' name='dfpge' size='2'>/<input type='text' name='mfpge' size='2'>/<input type='text' name='afpge' size='4'></font></td>
            </tr>
            <tr>
              <td width='6%' bgcolor='#F3F8FA'>&nbsp;</td>
              <td width='28%' bgcolor='#F3F8FA'>&nbsp;</td>
              <td width='23%' bgcolor='#F3F8FA'>&nbsp;</td>
            </center>
            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><b><font face='Verdana' size='1'>DATA 1º VENC.</font></b></td>
          </tr>
          <center>
          <tr>
            <td width='6%' bgcolor='#F3F8FA'>&nbsp;</td>
            <td width='28%' bgcolor='#F3F8FA'>&nbsp;</td>
            <td width='23%' bgcolor='#F3F8FA'>&nbsp;</td>
            <td width='43%' bgcolor='#F3F8FA'>
              <p align='right'><font face='Verdana' size='1'><input type='text' name='dfpg2' size='2'>/<input type='text' name='mfpg2' size='2'>/<input type='text' name='afpg2' size='4'></font></td>
          </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td width='100%'>
          <hr size='1'>
        </td>
      </tr>
      </table>
      </center>
    </div>

	  			<input type='hidden' name='vt' value='$vt'>
				<input type='hidden' name='codemp' value='$codemp'>
				<input type='hidden' name='desloc' value='0'>
				<input type='hidden' name='operador' value='OR'
				<input type='hidden' name='retlogin' value='$retlogin'>
				<input type='hidden' name='connectok' value='$connectok'>
				<input type='hidden' name='loginselect' value='$loginselect'>
				<input type='hidden' name='pg' value='$pg'>

    <p align='center'><input type='submit' class='sbttn' value='ENVIAR' name='B1'></p>
   </form>

		");



/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list"){
/// CONTADOR DE PAGINAS ////

/// Complemento para a parte de mudanca de pagina
#$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg";  


#include("numcontg.php");
}

#include ("sif-rodape.php");

}
?>
       
