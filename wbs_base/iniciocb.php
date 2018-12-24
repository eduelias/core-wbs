<?php

include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "codbarra";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CATEGORIA";
$titulo = "Lista de Categorias";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){

		// VERIFICA EXISTENCIA DE CAMPO VAZIO
		
		for($i = 0; $i < $cont; $i++ ){

		#echo("codbarra[$i]= $codbarra[$i]<br>");
		
		if ($codbarra[$i] <> ""){

			$prod->listProdU("COUNT(*) as numreg", "codbarra", "codbarra = '$codbarra[$i]' and codprod=$codprod and codemp = $codemp");
			$numreg = $prod->showcampo0();

			#echo("nreg=$numreg<br>");
			
			if ($numreg == 0 and $ins[$i] == 0){

				$prod->clear();
				$prod->setcampo1($codoc);
				$prod->setcampo2($codprod);
				$prod->setcampo3("$codbarra[$i]");
				$prod->setcampo8($codemp);
				$prod->setcampo9($i); // FLAG QUE MARCA CRIACAO NO BANCO DE DADOS
				$prod->setcampo10("N"); // FLAG RMA
				$prod->setcampo11("N"); // FLAG PECA ANTIGA
				$prod->setcampo13("S1"); // FLAG PECA ACERTO ESTOQUE
				$prod->setcampo16($dataatual); // DATA INSERT
				//$prod->setcampo17($tipo_nf); // TIPO NF
				$prod->setcampo18("PC"); // TIPO PROD
				if ($tipo_nf <> "P"){$tipo_nf = "";}
				$prod->setcampo26($tipo_nf); // TIPO FAB
				
				$prod->addProd($tabela, $ureg);
				
				// ATUALIZA DADOS DA TABELA OC
				$prod->listProd("oc", "codoc=$codoc");
				$codmoedaoc = $prod->showcampo3();
				$codempoc = $prod->showcampo1();

				// VERIFICA COTACAO OC
				$prod->listProd("moeda", "codmoeda=$codmoedaoc");
				$cotacao = $prod->showcampo2();
				$datacotacao = $prod->showcampo3();
				
				$prod->listProd("ocprod", "codpoc=$codpoc");
				$codprodoc = $prod->showcampo2();
				$qtderec = 1;
				$pcu = $prod->showcampo5();

				// VERIFICA LIBERACAO DO CODBARRA
				$prod->listProdU("IF (chkcb = 'N' , 'S', 'N')", "produtos", "codprod = $codprodoc");
				$libcb = $prod->showcampo0();

				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempoc and codprod=$codprodoc");
				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				$codmoedaprod = $prod->showcampo8();
				$pcm = $prod->showcampo11();

				//CAMBIO DE MOEDAS

					// MODIFICA A COTACAO DO PRODUTO ORIGINAL PARA A MOEDA DO PRODUTO DA OC
					// PASSA TODOS OS VALORES PARA MESMA BASE

					$prod->listProd("moeda", "codmoeda=$codmoedaprod");
					$tipomoedaprod = $prod->showcampo1();
					$cotacaoprod = $prod->showcampo2();

					$pcucambio = ($pcu*$cotacao)/$cotacaoprod;
					#$pcmcambio = ($pcm*$cotacao)/$cotacaoprod;
					$pcmcambio = $pcm;


				// CALCULO DO PCM NOVO

					
					// CALCULA TODO O ESTOQUE POR EMPRESAS DO MESMO GRUPO
					$prod->clear();
					$prod->listProdU("codgrupo", "empresa", "codemp='$codempselect'");		
					$codgrupo_emp = $prod->showcampo0();
					
					$prod->clear();
					$prod->listProdSum("(SUM(qtde)-SUM(reserva)) as estoque", "estoque, empresa", "codprod=$codprodoc  AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
					
					$prod->clear();
					$prod->listProdSum("(SUM(qtde)) as estoque_trans", "pedido, pedidoprod, empresa", "ped_transf = 'OK' AND cb <> 'OK' AND cancel <> 'OK' AND pedido.codped = pedidoprod.codped and  codprod=$codprodoc  AND empresa.codemp = pedido.codemp and codgrupo = '$codgrupo_emp'", $array992, $array_campo992, "" );
					$prod->mostraProd( $array992, $array_campo992, 0 );
					$estoque_trans = $prod->showcampo0();
					
					$estoque = $estoque + $estoque_trans;

					//CALCULA O PCM NOVO
					if (($estoque) > 0 and $pcmcambio <> 0):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtderec))/($estoque+$qtderec);
					else:
						$pcmnovo = $pcucambio;
					endif;


				$qtdenovo = $qtdeold + $qtderec;
				#echo("qtde_novo = $qtdenovo");
				
				if ($libcb == "N"){
					// ATUALIZA QTDE NOVA NO ESTOQUE
					$prod->upProdU("estoque", "qtde = qtde + $qtderec", "codprod=$codprodoc and codemp='$codempoc'");
				}
					
				//VERIFICA EMPRESAS DO GRUPO
				$prod->listProdSum("codemp", "empresa", "codgrupo = '$codgrupo_emp'", $array992, $array_campo992, "" );
								
				for($t = 0; $t < count($array992); $t++ ){
				
					$prod->mostraProd( $array992, $array_campo992, $t );
					$codemp_now = $prod->showcampo0();
					
					// ATUALIZA PCM E PUC NA TABELA ESTOQUE POR EMPRESAS DO MESMO GRUPO
					//$prod->upProdU("estoque, empresa", "pcm  = '$pcmnovo', puc = '$pcucambio', datauc = '$dataatual' ", "codprod=$codprodoc  AND empresa.codemp = estoque.codemp and codgrupo = '$codgrupo_emp'");
					
					// ATUALIZA PCM E PUC NA TABELA ESTOQUE POR EMPRESAS DO MESMO GRUPO
					$prod->upProdU("estoque", "pcm  = '$pcmnovo', puc = '$pcucambio', datauc = '$dataatual' ", "codprod=$codprodoc and codemp = '$codemp_now'");

				}
							
				$ins[$i] = 1;
				$ne[$i] = 1;

			}else{

				if ($ins[$i] == 0){
					$ne[$i] = 0;
				}else{
					$ne[$i] = 1;
				}
					

			}

		}else{
		
		$ne[$i] = 0;
		
		}// CODBARRA VAZIO

		} // FOR
		
		$Action="list";
		
		// VERIFICA ATRAVES DE MULTIPLICACAO SE TODOS OS COD BARRAS ESTAO OK.
		//	SE $end = 0 -> Existe erro (algum codbarra nao foi preenchido)
		//  SE $end = 1 -> Todos os codbarras estao ok
		$end=1;
		for($i = 0; $i < $cont; $i++ ){
			
			$end = $end * $ne[$i];
			#echo("$i - $end - $ne[$i]<br>");
		
		}
		
		// FINALIZAÇÃO - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
		if ($end == 1){

/*
		// ATUALIZA DADOS DA TABELA OC
		$prod->listProd("oc", "codoc=$codoc");
		$codmoedaoc = $prod->showcampo3();
		$codempoc = $prod->showcampo1();

		// VERIFICA COTACAO OC
		$prod->listProd("moeda", "codmoeda=$codmoedaoc");
		$cotacao = $prod->showcampo2();
		$datacotacao = $prod->showcampo3();
		
		
		// ATUALIZA DADOS DA TABELA ESTOQUE
		$prod->listProdgeral("ocprod", "codoc=$codoc and codprod = $codprod", $array99, $array_campo99 , "");

		for($i = 0; $i < count($array99); $i++ ){
			
			$prod->mostraProd( $array99, $array_campo99, $i );

			$codprodoc = $prod->showcampo2();
			$qtderec = $prod->showcampo4();
			$pcu = $prod->showcampo5();

			// VERIFICA LIBERACAO DO CODBARRA
			$prod->listProdU("IF (chkcb = 'N' , 'S', 'N')", "produtos", "codprod = $codprodoc");
			$libcb = $prod->showcampo0();
			
			
				// ATUALIZA ESTOQUE
				$prod->listProd("estoque", "codemp=$codempoc and codprod=$codprodoc");

				$qtdeold = $prod->showcampo3();
				$reserva = $prod->showcampo4();
				$codmoedaprod = $prod->showcampo8();
				#$puc = $prod->showcampo9();
				#$datauc = $prod->showcampo10();
				$pcm = $prod->showcampo11();

				#echo("qtde-old = $qtdeold");
				
								
				//CAMBIO DE MOEDAS
					
					// MODIFICA A COTACAO DO PRODUTO ORIGINAL PARA A MOEDA DO PRODUTO DA OC
					// PASSA TODOS OS VALORES PARA MESMA BASE

					$prod->listProd("moeda", "codmoeda=$codmoedaprod");		
					$tipomoedaprod = $prod->showcampo1();
					$cotacaoprod = $prod->showcampo2();

					$pcucambio = ($pcu*$cotacaoprod)/$cotacao;	
					$pcmcambio = ($pcm*$cotacaoprod)/$cotacao;	
			
								
				// CALCULO DO PCM NOVO

					// CALCULA TODO O ESTOQUE POR EMPRESAS

					$prod->listProdSum("COUNT(*)*(SUM(qtde)-SUM(reserva)) as estoque", "estoque", "codprod=$codprodoc and codemp = $codempoc", $array991, $array_campo991, "" );
					$prod->mostraProd( $array991, $array_campo991, 0 );
					$estoque = $prod->showcampo0();
	
										
					//CALCULA O PCM NOVO
					if (($estoque) > 0 ):
						$pcmnovo = ($pcmcambio*($estoque)+($pcucambio*$qtderec))/($estoque+$qtderec);
					else:
						$pcmnovo = $pcucambio;
					endif;


				$qtdenovo = $qtdeold + $qtderec;
				#echo("qtde_novo = $qtdenovo");
				$prod->listProd("estoque", "codemp=$codempoc and codprod=$codprodoc");
				if ($libcb == "N"){
				$prod->setcampo3($qtdenovo);
				}
				$prod->setcampo8($codmoedaoc);
				$prod->setcampo9($pcucambio);
				$prod->setcampo10($dataatual);
				$prod->setcampo11($pcmnovo);

				$prod->upProd("estoque", "codemp=$codempoc and codprod=$codprodoc");
				*/
				// ATUALIZA OC
				$prod->upProdU("ocprod", "cb  = 'OK'", "codpoc=$codpoc");

			#$Action="end";
		#}

		}

		}
		
		$desloc=0;

		
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
/*if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		$numreg = $prod->listProdgeral($tabela, $condicao2, $array, $array_campo, "" );
		if ($palavrachave == ""){$condicao2 = "";}

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral($tabela, $condicao2, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}
*/
// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////


	echo("

<html>

<head>
<title>CONFERÊNCIA DE CÓDIGO DE BARRA</title>
	<script language='javascript'>
<!--
function Link(url) 
{ 
path = url;
 opener.top.frames['Main'].location.href=path

window.close();

}
//-->



</script>
</head>

<body onload=");echo('"javascript:Link(');echo("'restrito.php?Action=update&codoc=$codoc&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'");;echo(')"');echo("
>

</body>

</html>







	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	$prod->listProdU("nomeprod, chkcb", "produtos", "codprod=$codprod");
				
		$nomeprod = $prod->showcampo0();
		$chkcb = $prod->showcampo1();
		$nomeprod = strtoupper($nomeprod);

$title = "ORDEM DE COMPRA - CONFERÊNCIA DE CODBARRA ";

include("sif-topolimpo.php");

	echo("
	
	<form method='POST' action='$PHP_SELF?Action=insert'>
  <div align='center'>
    <center>
    <table border='0' width='400' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='108' bgcolor='#D6E7EF'><font size='2' face='Verdana'><b>$codprod</b></font></td>
        <td width='280' bgcolor='#D6E7EF'><font size='2' face='Verdana'><b>$nomeprod</b></font></td>
      </tr>
      <tr>
        <td width='394' colspan='2' align='center'>
          <hr size='1'>
	

        </td>
      </tr>
    </table>
    </center>
  </div>
			");
	if(isset($msgerro)){
	$prod->msgpopup($msgerro, "ERRO");
	}
     echo("
  <div align='center'>
    <center>
    <table border='0' width='400' cellspacing='1' cellpadding='1'>
      <tr>
        <td width='10%'></td>
        <td width='70%'><font size='2' face='Verdana' color='#FF6600'><b>CÓDIGO DE BARRA</b></font></td>
	   <td width='20%'></td>
      </tr>
");

for($i = 0; $i < $cont; $i++ ){
	$j=$i+1;
	if ($tipo_nf <> "P"){$tipo_nf = "";}
	//echo "AQUI=".$tipo_nf;
	$prod->clear();
	$prod->listProdU("codbarra", "codbarra", "codprod=$codprod and codemp=$codemp and codoc=$codoc and flag_ins = $i and tipo_fab = '$tipo_nf' ");
	$cb = $prod->showcampo0();
	if ($cb <> ""){
		$ne[$i] = 1;
		$ins[$i] = 1;
		$codbarra[$i] = $cb;
		}
	
	
  if ($chkcb == "N" or $chkcb == ""){$corcampo="#F2E4C4";}else{$corcampo="#FFFFFF";}
  if ($ne[$i] == 1 ){
	  
	  $corc="#669900";$erro="OK";
  
  
  echo("
	<tr bgcolor='$corcampo'>
        <td width='10%' align='center'><font size='2' face='Verdana'><b>$j</b></font></td>
        <td width='70%'><font size='2' face='Verdana' color='#003399'><b>$codbarra[$i]</b></font></td>
	 <td width='20%'><font size='2' face='Verdana' color='$corc'><b>$erro</b></font></td>
		<input type='hidden' name='codbarra[$i]' value='$codbarra[$i]'>
		<input type='hidden' name='ins[$i]' value='$ins[$i]'>
      </tr>

  ");
  
  }else{
	  $corc="#FF0000";$erro="ERRO";

  if ($chkcb == "N" or $chkcb == ""){
echo("
      <tr bgcolor='$corcampo'>
        <td width='10%' align='center'><font size='2' face='Verdana'><b>$j</b></font></td>
        <td width='70%'><input type='text' value = 'IPA0007SCODE' name='codbarra[$i]' size='30'></td>
	 <td width='20%'><font size='2' face='Verdana' color='$corc'><b>$erro</b></font></td>
      </tr>
");
	}else{
echo("
      <tr bgcolor='$corcampo'>
        <td width='10%' align='center'><font size='2' face='Verdana'><b>$j</b></font></td>
        <td width='70%'><input type='text' value = '$codbarra[$i]' name='codbarra[$i]' size='30'></td>
		 <td width='20%'><font size='2' face='Verdana' color='$corc'><b>$erro</b></font></td>
      </tr>
");
	}


  } // ERRO
} // FOR
echo("
      
    </table>
    </center>
  </div>
  <div align='center'>
    <center>
    <table border='0' width='400' cellspacing='0'>
      <tr>
        <td width='100%'>
          <hr size='1'>
        </td>
      </tr>
      <tr>
        <td width='100%' align='center'>
");
if ($cb_ok <> 1){
echo("
	<div id='camada' style='z-index:1; visibility: visible; overflow: hidden;'>
	<input type='submit' value='INSERIR CÓDIGOS' name='B1' onClick=");echo('"MM_changeProp(');echo("'camada','','style.visibility','hidden','LAYER')");echo('"');echo(">
	</div>	
");
}
echo("
	</td>
      </tr>
    </table>
    </center>
  </div>

	<input type='hidden' name='retlogin' value='$retlogin'>
    <input type='hidden' name='connectok' value='$connectok'>
	<input type='hidden' name='pg' value='$pg'>
	<input type='hidden' name='codempselect' value='$codempselect'>
	<input type='hidden' name='codoc' value='$codoc'>
	<input type='hidden' name='codpoc' value='$codpoc'>
	<input type='hidden' name='tipo_nf' value='$tipo_nf'>
	<input type='hidden' name='codprod' value='$codprod'>
	<input type='hidden' name='codemp' value='$codemp'>
	<input type='hidden' name='retorno' value='1'>
	<input type='hidden' name='cont' value='$cont'>
</form>

		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;


}
?>
       
