

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 10;
$tabela = "produtos, empresa";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "RELATÓRIO CONTROLE DE ESTOQUE";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProd("seguranca", "arquivo='inicioprod.php'");
		$codpgsec = $prod->showcampo0();

	// PARA PAGINA DE SEGURANCA SECUNDARIA ESTOQUE
	$prod->listProd("seguranca", "arquivo='inicioestoque.php'");
		$codpgest = $prod->showcampo0();


// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":

		
		$Actionsec="list";
		$nomeformsec=" ATUALIZAR $nomeform ";
		 
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		
		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and hist <> 'Y'";
		
		if ($palavrachave == ""):
			
			$condicao2 = "";
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq' ";
				$condicao3 = $condicao2 . "and unidade not like 'CJ' and hist <> 'Y'  ";
			else:
				$condicao3 = $condicao2 . " unidade not like 'CJ' and hist <> 'Y' ";
			endif;

		else:
			
			if ($codprodpesq <>""):
				$condicao2 = "codprod='$codprodpesq' and hist <> 'Y' ";
			endif;
			$condicao3 =  " unidade not like 'CJ'  and " . $condicao2 ;
		endif;

		
		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, pvv, pva, unidade, hist, mta, mtv, codemp, fatorvista, nome", $tabela, $condicao3, $array, $array_campo, $parm );

		#$Action="list";


		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 


}

// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");


if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////
	echo("


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
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
			<input type='hidden' name='codempselect' value='$codempselect'>
		 <input type='hidden' name='connectok' value='$connectok'>
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

	




 


		
		


<br>
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
           
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='58%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
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

 <div align='center'>
      <center>
      <table border='0' width='550' cellspacing='1' cellpadding='0'>
       

	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$pvv = $prod->showcampo2();
			$pva = $prod->showcampo3();
			$unidade = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$mtv = $prod->showcampo6();
			$mta = $prod->showcampo7();
			$codempselect = $prod->showcampo8();
			$nomeempold = $prod->showcampo10();
			$fatorvista = $prod->showcampo9();
			$nomeempold = strtoupper($nomeempold);


				
			// ESTOQUE MINIMO
			$prod->listProd("estoque", "codprod=$codprod and codemp=$codempselect");

			$codest	= $prod->showcampo0();
			$qtdemin = $prod->showcampo5();
			$fatorata = $prod->showcampo6();
			$fatorvar = $prod->showcampo7();
			$datauc = $prod->showcampo10();
			$datauc = $prod->fdata($datauc);
			$puc = $prod->showcampo9();
			$pcm = $prod->showcampo11();
			$codmoedaprod = $prod->showcampo8();

			//MOEDA DO PRODUTO
			$prod->listProd("moeda", "codmoeda=$codmoedaprod");
				
			$tipomoeda = $prod->showcampo1();
			$cotacao = $prod->showcampo2();
			
			//CAMBIO DE MOEDAS

			$prod->listProd("moeda", "padrao='S'");		
			$tipomoedaprod = $prod->showcampo1();
			$cotacaopadrao = $prod->showcampo2();

			
					// FAZ O CAMBIO DE MOEDA PARA A MOEDA PADRAO DO SISTEMA
					$pcucambio = ($pcu*$cotacao)/$cotacaopadrao;
					$pcmcambio = ($pcm*$cotacao)/$cotacaopadrao;

			$pvvnovo = ($pvv*$fatorvista) * $fatorvar;
			$pvanovo = ($pva*$fatorvista) * $fatorata;


			// CALCULA TODO O ESTOQUE POR EMPRESAS

					$prod->listProdSum("COUNT(*)*(SUM(qtde)-SUM(reserva)) as estoque", "estoque" , "codprod = $codprod and codemp = $codempselect", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();

			/*
			// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS

					$prod->listProdSum("COUNT(*)*(SUM(qtde)-SUM(reserva)) as estoque", "estoque" , "codprod = $codprod and codemp = $codempselect", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
	
										
					//CALCULA O PCM NOVO
					if (($estoque) > 0 ):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtde))/($estoque+$qtde);
					else:
						$pcmnovo = $pcucambio;
					endif;

			*/
						
				//CHECAGEM DO MARGEM DE TRABALHO
					
			if ($pvvnovo > ($pcm+($pcm*$mtv)/100)){
				$cotavar = $pvvnovo - ($pcm+($pcm*$mtv)/100);
				$cotavar = $prod->fpreco($cotavar);
				$cotavar = "-" . $cotavar;
				$corvar = "#33CC00";
			}else{
				$cotavar =($pcm+($pcm*$mtv)/100) - $pvvnovo;
				$cotavar = $prod->fpreco($cotavar);
				$cotavar = "+" . $cotavar;
				$corvar = "#FF0000";
			}
			if ($pvanovo > ($pcm+($pcm*$mta)/100)){
				$cotaata =$pva - ($pcm+($pcm*$mtv)/100);
				$cotaata = $prod->fpreco($cotaata);
				$cotaata = "-" . $cotaata;
				$corata = "#33CC00";
			}else{
				$cotaata =($pcm+($pcm*$mtv)/100) - $pvanovo;
				$cotaata = $prod->fpreco($cotaata);
				$cotaata = "+" . $cotaata;
				$corata = "#FF0000";
			}
			
			
			
		
			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdSum("COUNT(*), dataprevcheg ", "ocprod, oc", "codprod = $codprod and oc.codemp=$codempselect and hist = 0 and ocprod.codoc=oc.codoc", $array6, $array_campo6, "group by dataprevcheg order by dataprevcheg DESC" );
		
			$prod->mostraProd( $array6, $array_campo6, 0 );
			$qtdecomp = $prod->showcampo0();
			if ($qtdecomp == ""){$qtdecomp = 0;}
			$datacompra = $prod->showcampo1();
			if ($datacompra == ""){$datacompra = "0000-00-00 00:00:00";}
			$datacompra = $prod->fdata($datacompra);

			/*
			// GIRO MEDIO DIARIO DESSE PRODUTO
			$prod->listProdSum("COUNT(*), dataprevcheg ", "ocprod, oc", "codprod = $codprod and oc.codemp=$codempselect and hist = 0 and ocprod.codoc=oc.codoc", $array6, $array_campo6, "group by dataprevcheg order by dataprevcheg DESC" );
		
			$prod->mostraProd( $array6, $array_campo6, 0 );
			$qtdecomp = $prod->showcampo0();
			*/

			if ($estoque == $qtdemin){$cor ="#FFFFEA"; $alarm = "ESTOQUE LIMITE";}else{$cor="#F3F8FA"; $alarm = "";}
			if ($estoque < $qtdemin){$cor ="#F2E4C4"; $alarm = "ESTOQUE CRÍTICO";}
			if ($estoque <= 0){$cor ="#E8E8E8"; $alarm = "SEM ESTOQUE";}

			$pvvf = number_format($pvv, 2,',', '.');
			$pvaf = number_format($pva, 2,',', '.');
			$pucf = number_format($puc, 2,',', '.');
			$pcmf = number_format($pcm, 2,',', '.');
			$mtaf = number_format($mta, 2,',', '.');
			$mtvf = number_format($mtv, 2,',', '.');
			$fatorataf = number_format($fatorata, 3,'', '');
			$fatorvarf = number_format($fatorvar, 3,'', '');



		echo("
		 <tr bgColor='#e8e8e8'>
      <td align='middle' width='547' colspan='5' bgcolor='#FFFFFF'>
        <table border='0' width='100%' cellpadding='2' bgcolor='#FFFFFF'>
          <tr>
            <td width='7%'><img src='images/empresa.gif' border='0' width='25' height='26'></td>
            <td width='26%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
              PRODUTO:<br>
              </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#006699' size='1'><b>$nomeempold</b></font></td>
            <td width='33%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#006699' size='1'><a href='$PHP_SELF?Action=update&amp;codprod=$codprod&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$codpgsec'> [ALTERAR PREÇOS]</a></font></td>
            <td width='34%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#006699' size='1'><a href='$PHP_SELF?Action=update&amp;codprod=$codprod&amp;codemp=$codempselect&codest=$codest&desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$codpgest'> [ALTERAR ESTOQUE]</a></font></td>
          </tr>
        </table>
      </td>
    </tr>

		<tr bgcolor='$cor'> 
      
          <td width='55' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'><b>$codprod</b></font></td>
           <td width='76' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$nomeprod</b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'></font></td>

          <td width='239' valign='top'>
            <table border='0' width='100%' cellspacing='1' cellpadding='2'>
              <tr>
                <td width='68%' colspan='2'></td>
                <td width='32%' align='left'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>REAJUSTE</font></b></td>
              </tr>
              <tr>
                <td width='35%'><font size='1' face='Verdana'><b>PCM:</b></font></td>
                <td width='33%' align='left'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#D6B778'>$tipomoeda
                  $pcmf</font></b></td>
                <td width='32%' align='left'>
                  <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>R$</font></b></td>
              </tr>
              <tr>
                <td width='35%'><font size='1' face='Verdana'><b>PUC:</b></font></td>
                <td width='33%' align='left'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808000'>$tipomoeda
                  $pucf</font></b></td>
                <td width='32%' align='left'></td>
              </tr>
              <tr>
                <td width='35%'><font size='1' face='Verdana'><b>DATAUC:</b></font></td>
                <td width='33%' align='left'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808000'>$datauc&nbsp;&nbsp;&nbsp;</font></b></td>
                <td width='32%' align='left'></td>
              </tr>
              <tr>
                <td width='35%'><font size='1' face='Verdana'><b>PVV:</b></font></td>
                <td width='43%' align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'>R$
                  $pvvf</font></td>
                <td width='22%' align='center'><b><font color='$corvar' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$cotavar</font></b></td>
              </tr>
              <tr>
                <td width='35%'><font size='1' face='Verdana'><b>PVA:</b></font></td>
                <td width='43%' align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'>R$
                  $pvaf</font></td>
                <td width='22%' align='center'><b><font color='$corata' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$cotaata</font></b></td>
              </tr>
			 <tr>
                <td width='35%'><font size='1' face='Verdana'><b>FATV/MTV:</b></font></td>
                <td width='43%' align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'>$fatorvarf / $mtvf%</font></td>
                <td width='22%' align='center'><b><font color='$corata' size='1' face='Verdana, Arial, Helvetica, sans-serif'></font></b></td>
              </tr>
			<tr>
                <td width='35%'><font size='1' face='Verdana'><b>FATA/MTA</b></font></td>
                <td width='43%' align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'>$fatorataf / $mtaf%</font></td>
                <td width='22%' align='center'><b><font color='$corata' size='1' face='Verdana, Arial, Helvetica, sans-serif'></font></b></td>
              </tr>
            </table>
          </td>
          <td width='115'  valign='top'>
            <table border='0' width='100%' cellspacing='1' cellpadding='2'>
              <tr>
                <td width='44%'></td>
                <td width='56%' align='center'><font size='1' face='Verdana' color='#800000'><b>QTDE</b></font></td>
              </tr>
              <tr>
                <td width='44%'><font size='1' face='Verdana'><b>
                  ESTOQUE:</b></font></td>
                <td width='56%' align='center' height='100%'><font size='1' face='Verdana' color='#808000'><b>$estoque</b></font></td>
              </tr>
			   <tr>
                <td width='44%'><font size='1' face='Verdana'><b>
                  MÍNIMO:</b></font></td>
                <td width='56%' align='center' height='100%'><font size='1' face='Verdana' color='#808000'><b>$qtdemin</b></font></td>
              </tr>
              <tr>
                <td width='44%'><font size='1' face='Verdana'><b>COMPRADO:</b></font></td>
                <td width='56%' align='center'><font size='1' face='Verdana' color='#808000'><b>$qtdecomp</b></font></td>
              </tr>
              <tr>
                <td width='100%' colspan='2'>
                  <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'><b>PREV
                  CHEGADA</b><br>
                  $datacompra</font></td>
              </tr>
			 <tr>
                <td width='100%' colspan='2'>
                  <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF6600'>$alarm</font></b></td>
              </tr>

            </table>
          </td>
          <td width='62'><b><font size='1' face='Verdana'><font color='#800000'>GIRO
            MEDIO DIÁRIO:</font> <br>
            </font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#006699'>$giro</font></td>
        </tr>
        <tr bgcolor='#FFFFFF'>
          <td width='547'  colspan='5'>
            <hr size='1'>
          </td>
      </center>
        </tr>



		");
		
		$prod->clear();
	
	 }

		echo("
				</table>
		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list" and $codempselect <>""){
/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg";   

include("numcontg.php");
}


include ("sif-rodape.php");

}
?>
       
