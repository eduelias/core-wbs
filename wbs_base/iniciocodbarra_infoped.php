

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "empresa";					// Tabela EM USO
$condicao1 = "codemp=$codemp";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by codbarra limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CODBARRA";
$titulo = "CODBARRA PEDIDOS";

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

        break;

    case "update":


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
		
		if ($codpedselect){

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("codprod, codcb, qtde, pedido.codped", "pedidoprod, pedido", "codbarra = '$codpedselect' AND pedido.codped=pedidoprod.codped", $array, $array_campo, "order by codprod");

		$Action = "list";

		}

		

}

include("sif-topo.php");

if($Action <> "list"):




/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:
if ($impressao <> 1){
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
  </center>
	

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width=' 223' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width=' 327' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'><div align='center'>

	  <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		CODPED: <input type='text' name='codpedselect' size='13'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='retlogin' value='$retlogin'>
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
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
			 <td width='30%'><b>
			 <a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$PHP_SELF?Action=list&codprod=$codprod&codpedselect=$codpedselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&menu_not=1&impressao=1','COFRE','600','400','yes');return 
false");echo('"');echo("> >> IMPRIMIR</a>
			 
			</b></td>
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
");
}//impressao
echo ("
<div align='center'>
  <center>
   
  ");
$prod->listProdU("codped", "pedido", "codbarra = '$codpedselect'");
$codped_sel = $prod->showcampo0();
$prod->listProdgeral("pedidonf", "codped='$codped_sel'", $array612, $array_campo612 , "");
for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$numnf = $prod->showcampo2();
			$valornf = $prod->showcampo3();
			$tiponf = $prod->showcampo4();
			$datanf = $prod->showcampo5();
			
			$datanf = $prod->fdata($datanf);
			
			if ($numnf <> ""){
			$html_fat .= $numnf.", ";
			}
			
}

echo("
  <table border='0' width='550' cellpadding='2' height='43'>
    <tr>
      <td width='479' height='14' bgcolor='#FFFFFF'><font size='3' face='Verdana'><b><font color='#008080' size='3'>ROMANEIO DOS NÚMEROS DE SÉRIE:</font></b></font></td>
      <td width='45' height='14' bgcolor='#FFFFFF'>&nbsp;</td>
    </tr>
   <tr>
     <td height='14' bgcolor='#FFFFFF'><font size='2' face='Verdana'><b><font color='#008080'>PEDIDO:</font> $codpedselect</b></font></td>
     <td height='14' bgcolor='#FFFFFF'>&nbsp;</td>
   </tr>
   <tr>
     <td height='14' bgcolor='#FFFFFF'><font size='2' face='Verdana'><b><font color='#008080'> NF(S):</font> $html_fat</b></font></td>
     <td height='14' bgcolor='#FFFFFF'>&nbsp;</td>
   </tr>

    <tr>
      <td width='90%' height='14' bgcolor='#008080'><font size='1' face='Verdana' color='#FFFFFF'><b>NOME
        PRODUTO</b></font></td>
     
      <td width='10%' height='14' bgcolor='#008080'><font size='1' face='Verdana' color='#FFFFFF'><b>QTDE</b></font></td>
    </tr>
");
	 
	for($i = 0; $i < count($array); $i++ ){

			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codprod = $prod->showcampo0();
			$codcb = $prod->showcampo1();
			$qtde = $prod->showcampo2();

			$prod->listProdU("nomeprod", "produtos", "codprod = $codprod");
			$nomeprod = $prod->showcampo0();

			$codcb_array = explode(":", $codcb);



			#print_r($codcb_array);
		

			echo("
			<tr>
      <td width='90%' height='17' bgcolor='#DCF5E7'><font size='1' face='Verdana'><b>$codprod
        </b>- $nomeprod</font> <hr size='1'>
		");
		
	
			for($o = 0; $o < count($codcb_array); $o++ ){
			
			$prod->clear();
			$prod->listProdU("codbarra", "codbarra", "codcb = '$codcb_array[$o]'");
			$codbarra = $prod->showcampo0();
			
			$cor1 ="#FF0000";
				echo ("
		<font face='Verdana' size='1' color = '$cor1'>$codbarra</font>
		");
			}//FOR O
			
		echo("
		</td>
   
      <td width='10%' height='17' bgcolor='#DCF5E7' align = 'center'><font size='1' face='Verdana'>$qtde</font></td>
    </tr>
");
			
		} //FOR I

echo("
</table>
  </center>
</div>
");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;


include ("sif-rodape.php");


?>
       
