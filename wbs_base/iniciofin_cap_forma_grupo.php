

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datavenc DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "FORMA DE PAGAMENTO";
$subtitulo = "FINANCEIRO";

$tipopesq="for";

$Actionter = "unlock";


// CONFIGURAÇÃO DE COR

$bgcortopo = "#86ACB5";
$bgcortopo1 = "#93BEE2";
$bgcorlinha = "#F3F8FA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();


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


	

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		

		$Action="list";
		

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "FORMA DE PAGAMENTO - CONTAS A PAGAR";

include("sif-topolimpo.php");


/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "list"):


		

		// LISTA OS REGISTROS DOS PAGAMENTOS SELECIONADOS
		$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros", "fin_cap", "codformagrupo=$codfgruposelect", $array78, $array_campo78, "" );

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codpgforma, codformagrupo, bco, ag, cc, numcheq, opcaixa, valor, descricao, codconta", "fin_cap_forma", "codformagrupo=$codfgruposelect", $array79, $array_campo79, "" );
	
	

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                         </td>
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


	<center>
<div align='center'>
			

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PAGAMENTO(S) SELECIONADO(S)</font></b></td>
    </tr>
  </tbody>
</table>

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
	<table width='500' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#D6B778'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='35%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OC/FORNECEDOR</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array78); $i++ ){
			
			$prod->mostraProd( $array78, $array_campo78, $i );

			// DADOS //
			$datavenc = $prod->showcampo0();
			$numdoc = $prod->showcampo1();
			$opcaixa = $prod->showcampo2();
			$codfor = $prod->showcampo3();
			$valordevido = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$descricao = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$codcap = $prod->showcampo8();
			$codoc = $prod->showcampo9();
			$datapg = $prod->showcampo10();
			$valorpago = $prod->showcampo11();
			$juros = $prod->showcampo12();
			
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 
			
			if($codfor <> 0){
			$prod->listProdU("nome", "fornecedor", "codfor=$codfor");
			$nomefor = $prod->showcampo0();
			}
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#F2E4C4'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codoc</b><br>$nomeforn</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valordevidof</B></font></font></td>
			
		");

	$valortotal = $valortotal + $valordevido;

	 }

	$valortotalf = number_format($valortotal,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalf</B></font></font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
				</table>
					 </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>FORMAS DE PAGAMENTO DAS CONTAS</font></b></td>
    </tr>
  </tbody>
</table>
	<br>	
  </center>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
     <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>AG.</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>C.C.</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
	
    
  </tr>
	");
	 $prod->clear();
	 for($i = 0; $i < count($array79); $i++ ){
			
			$prod->mostraProd( $array79, $array_campo79, $i );

			// DADOS //
			$codpgforma = $prod->showcampo0();
			$codformagrupo = $prod->showcampo1();
			$bco = $prod->showcampo2();
			$ag = $prod->showcampo3();
			$cc = $prod->showcampo4();
			$numchfpg = $prod->showcampo5();
			$opcaixa = $prod->showcampo6();
			$valorp = $prod->showcampo7();
			$descricao = $prod->showcampo8();
			$codconta = $prod->showcampo9();
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#D6E7EF'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$ag</font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$cc</font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numchfpg</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></font></td>
		
		");

	$valortotalfpg = $valortotalfpg + $valorp;

	 }

	$valortotalfpgf = number_format($valortotalfpg,2,',','.');

	 echo("
	 <tr bgcolor='#F3F3F3'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='25%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalfpgf</B></font></font></td>
			
				</table>
<br>
");

endif;


/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
