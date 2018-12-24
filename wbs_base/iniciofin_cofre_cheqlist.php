

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomebco limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "COFRE";
$subtitulo = "FINANCEIRO";

$tipopesq="for";

$Actionter = "unlock";


// CONFIGURAÇÃO DE COR

$bgcortopo = "#86ACB5";
$bgcortopo1 = "#93BEE2";
$bgcorlinha = "#DADADA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();


	// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='iniciofin_cofre.php'");
		$pgcofre = $prod->showcampo0();


	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$codcxvend = $prod->showcampo13();
		$allemp = $prod->showcampo17();
		$allcx = $prod->showcampo18();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp =="N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
			if ($codcxvend <> 0){$codcxselect = $codcxvend;}
		}

		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
		
			$Actionsec = "list";
			
	
        break;

		

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "inscofre":

			

		$Action="update";
				
		 break;

	 case "dellanccofre":

						
		 break;	


}

		
/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "COFRE - OPERACOES DE COFRE";

include("sif-topolimpo.php");


/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):

			
	if ($saida == 1){$titulosec = "COFRE";$localch="CO";}else{$titulosec = "CAIXA";$localch="CX";}



echo("

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>LISTAGEM DE CHEQUES DO $titulosec</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgcofre&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'><img border='0' src='images/bt-continuaped.gif' ><br>
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

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tr>
    <td><hr size='1'></td>
  </tr>
</table>

 <a name='formapg'></a>
	");		

			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("codcx", "fin_cxsaldo", "codcxsaldo = $codcxsaldoselect", $array56, $array_campo56, "" );
			$prod->mostraProd( $array56, $array_campo56, 0 );
			$codcxselect = $prod->showcampo0();

			
			if ($banco == "" and $numch == ""){
				
				$condicao3 = " codemp='$codempselect'";
				if ($localch == "CX"){
					$condicao3 .= " and codcx=$codcxselect";
				}
				$condicao3 .= " and posfin = '$localch'";
							
			
			}else{
				
				$condicao3 = " (bco like '$banco' AND numcheq like '$numch') ";
				$condicao3 .= " and codemp='$codempselect'";
				if ($localch == "CX"){
					$condicao3 .= " and codcx=$codcxselect";
				}
				$condicao3 .= " and posfin = '$localch'";
									

			}

			#echo("$condicao3");


				// LISTA TODOS OS REGISTROS
				$prod->listProdSum("COUNT(*) as numreg", "fin_cheques", $condicao3, $array, $array_campo, "" );
				$prod->mostraProd( $array, $array_campo, 0 );
				$numreg = $prod->showcampo0();
				
				// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
				$prod->listProdSum("codch, bco, numcheq, valor, datavenc, posfin", "fin_cheques", $condicao3, $array, $array_campo, "ORDER BY DATAVENC" );

			
			#echo("$condicao3 - $numreg");
			
			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg /$acrescimo);  
			  $pagina = 1;
			endif; 

			$prod->listProdU("SUM(valor)", "fin_cheques" , $condicao3);
			$valort = $prod->showcampo0();

			// FORMATACAO //
			$valortf = number_format($valort,2,',','.'); 

	echo("

	<table width='550' border='0' cellspacing='1' align='center' cellpadding='2'>
	
<tr bgcolor='$bgcorlinha'> 
		<td width='152'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	<td width='130' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL DE CHEQUES</b></font></td>
	<td width='101'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='94'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>R$ $valortf</B></font></font></td>
			<td width='62' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
	</tr>
	<tr> 
		<td width='540' colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>&nbsp;</font></td>
	</tr>
	<tr bgcolor='$bgcortopo'> 
    <td width='152'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC.</font></b></div>
    </td>
	 <td width='87'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
	  <td width='152' colspan='2'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='156' colspan='2'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
    
  </tr>


	");
	 $prod->clear();
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codch = $prod->showcampo0();
			$bco = $prod->showcampo1();
			$numcheq = $prod->showcampo2();
			$valorp = $prod->showcampo3();
			$datavenc = $prod->showcampo4();

							
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
			$datavencf = $prod->fdata($datavenc);
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
	<tr bgcolor='$bgcorlinha'> 
		<td width='152' align='center'>
          <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$datavencf</b></font></p>
        </td>
	<td width='87' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	<td width='152' colspan='2' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numcheq</font></td>
			<td width='156' colspan='2' align='center'>
              <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></p>
        </td>
	</tr>


		");

	

	 }

echo("

				</table>
			
");


	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
