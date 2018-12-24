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

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

	if ($retorno){
		// VERIFICA EXISTENCIA DE CODBARRAS 


		function logar($dataatual, $codped, $codprod, $qtdeold, $reserva, $qtdenovo, $reservanovo){
                if (($qtdeold - $qtdenovo) <> 1 or ($reserva-$reservanovo) <> 1){$erro_est = 1;}else{$erro_est=0;}
				$arquivo = "log/estoque_log.txt";
				$abre = fopen($arquivo, "a");
				if($abre){
					fwrite ($abre, "$dataatual\tPED:$codped\tPRD:$codprod\tA:$qtdeold\t$reserva\tN:$qtdenovo\t$reservanovo\tERRO:$erro_est\t\n");
					$gravou = TRUE;
				} else {
					$gravou = FALSE;
				}
				return $gravou;
			}
			
			
	//VERIFICA SE O PEDIDO EH TRANSFERENCIA DE MP
	$prod->listProdU("transf_mp ","pedido", "codped=$codped");
	$transf_mp = $prod->showcampo0();
	
	if ($transf_mp == 'OK'){$cond_pesq = " and tipo_fab = 'P' ";}else{$cond_pesq = " and tipo_fab <> 'P' ";}

		#echo "cond_pesq=".$cond_pesq;

	 $prod->clear();
	 $prod->listProdSum("codpped, codprod, codprodcj, tipocj, qtde", "pedidoprod", "codped=$codped", $array3, $array_campo3 , "ORDER by tipocj, ordem");

	for($i = 0; $i < count($array3); $i++ ){

			$prod->mostraProd( $array3, $array_campo3, $i );

			$codpped = $prod->showcampo0();
			$codprod = $prod->showcampo1();
			$codprodcj = $prod->showcampo2();
			$tipocj = $prod->showcampo3();
			$qtdeped = $prod->showcampo4();
			
			
			#echo "<b>qtdeped = $qtdeped - i=$i - cpp = $codpped</b><br>";
		
			

		for($j = 0; $j < $qtdeped; $j++ ){

		$codbarra_prod = $codbarra[$codpped][$j]; // CODBARRA PRODUTO PEDIDO
						
		//VERIFICA SE EXISTE ALGUM COD BARRA LIVRE
		$prod->clear();
        $prod->listProdU("codcb", "codbarra", "codbarra = '$codbarra_prod' and codbarraped <> '1' and codprod=$codprod and codemp=$codempselect $cond_pesq LIMIT 0,1");
		$codcb = $prod->showcampo0(); 
		 
			#echo("$codcb - $codprod - cb=$codbarra_prod - $codempselect - j= $j<br>");
							
			if ($codcb){
				
				$prod->clear();
				$prod->listProdU("COUNT(*)", "codbarra", "codbarra = '$codbarra_prod' and codbarraped = '1' and codprod=$codprod and codped = $codped and codprodcj = $codprodcj and tipocj=$tipocj and codemp=$codempselect and codpped = $codpped ");
				$cont_cbusados = $prod->showcampo0(); 

				#echo("control = $cont_cbusados - $qtdeped<br>");

			  if ($cont_cbusados < $qtdeped ){
			
				$prod->clear();
				$prod->listProdU("COUNT(*)" , "codbarra", "codped='$codped'");
				$num_sep = $prod->showcampo0();
				
				//VERIFICA A 
				if ($num_sep ==0){
				$prod->upProdU("pedido", "datasep_ini = NOW()", "codped='$codped'");			
				}
				
				
				
				#echo "codcb = $codcb<BR>";
				
				// ATUALIZA TABELA CODBARRA
				$prod->upProdU("codbarra", "codped = $codped, codprodcj = $codprodcj , tipocj = $tipocj, codpped = $codpped, codbarraped = 1", "codcb='$codcb'");


				// COMO PRODUTOS IGUAIS DE UM MESMO MICRO SAO CONTADOS COMO QUANTIDADE, FOI NECESSARIO CRIAR UM CAMPO COM O CODCB NA TABELA PEDIDOPROD.
				
				$prod->clear();
				$prod->listProdU("codcb" , "pedidoprod", "codpped='$codpped'");
				$codcbold = $prod->showcampo0();
				
				   if ($codcbold == ""){
					$codcbnew = $codcb;
				   }else{
					$codcbnew = $codcbold . ":" . $codcb;
				   }
				#echo "old=$codcbold -  new=$codcbnew<BR>";
				 
				// ATUALIZA TABELA PEDIDOPROD
				$prod->upProdU("pedidoprod", "codcb = '$codcbnew' ", "codpped='$codpped'");

										
				// ATUALIZA ESTOQUE
				$prod->upProdU("estoque", "qtde = qtde - 1, reserva = reserva - 1", "codemp=$codempselect and codprod=$codprod");

			  }
			
			}

		} // FOR 2
	}// FOR 1

		
		
		$Action="update";

		//VERIFICA A QTDE DE PRODUTOS
		$prod->listProdSum("SUM(qtde) as qtde", "pedidoprod", "codped = $codped", $array613, $array_campo613, "" );
		$prod->mostraProd( $array613, $array_campo613, 0 );
		$qtde_prodped = $prod->showcampo0();

		#echo("qt=$qtde_prodped");
		
		//VERIFICA SE TODOS OS CODBARRAS FORAM INSERIDOS
		$prod->listProdSum("COUNT(*) as cbok", "codbarra", "codbarraped = '1' and codped = $codped", $array613, $array_campo613, "" );
		$prod->mostraProd( $array613, $array_campo613, 0 );
		$numcbok = $prod->showcampo0();

		#echo("ncb=$numcbok");
		
		// FINALIZAÇÃO - TODOS OS PRODUTOS FORAM CONFERIDOS PELO SISTEMA
		if ($numcbok == $qtde_prodped){
		
				#$prod->listProd("pedido", "codped='$codped'");
				#$prod->setcampo22("OK");  // CODBARRA OK
				#$prod->upProd("pedido", "codped='$codped'");
				$prod->upProdU("pedido", "datasep_fim = NOW(), cb = 'OK' ", "codped='$codped'");	

		$end=1;			
		$Action="check";

		
			// CRIA OC PARA PEDIDO TRANSFERENCIA
			$prod->listProdU("ped_transf, codemp_transf, codvend, vpp, vt","pedido", "codped=$codped");
			$ped_transf = $prod->showcampo0();
			$codemp_t = $prod->showcampo1();
			$codvend_t = $prod->showcampo2();
			$vpp_t = $prod->showcampo3();
			$vt_t = $prod->showcampo4();

			$dataatual = $prod->gdata();
			$anopar = substr($dataatual,0,4);
			$mespar = substr($dataatual,4,2);
			$diapar = substr($dataatual,6,2);
			
			$prod->listProdU("COUNT(*)","oc", "codped_transf=$codped");
			$control_transf = $prod->showcampo0();
			echo("ct=$control_transf");

			if ($ped_transf == "OK" and $control_transf == 0){
				
				// CRIACAO DA OC
				$prod->listProd("moeda", "padrao = 'S'");
				$codmoeda = $prod->showcampo0();
				
				$prod->clear();
				$prod->setcampo0("");
				$prod->setcampo1($codemp_t);
				$prod->setcampo2(113);  // SISTEMA ANTIGO (MUDAR)
				$prod->setcampo3($codmoeda);
				$prod->setcampo4($codvend_t);
				$prod->setcampo5("");  // CONTATO
				$prod->setcampo6(""); // NUMNF
				$prod->setcampo7($dataatual);  //DATA COMPRA
				if ($transf_mp == 'OK'){$oc_mp = "(MP)";}else{$oc_mp = "";}
				$prod->setcampo10("OC DE TRANFERÊNCIA $oc_mp");
			
				$prod->setcampo11($anopar.$mespar.$diapar);
				$prod->setcampo12($vpp_t); // VALOR TOTAL OC
				$prod->setcampo14($codped);
				$prod->addProd("oc", $ureg_oc);

				// ADICAO DE PRODUTOS
				 $prod->listProdgeral("pedidoprod", "codped=$codped", $array333, $array_campo333 , "");

				 for($i = 0; $i < count($array333); $i++ ){
				
					$prod->mostraProd( $array333, $array_campo333, $i );
					$codprod_ped = $prod->showcampo2();
					$qtde_ped = $prod->showcampo3();
					$puu_ped = $prod->showcampo4();
					$puu_ped = $puu_ped * ($vpp_t/$vt_t);

					$garantia = 12;

					$prod->setcampo0("");
					$prod->setcampo1($ureg_oc);
					$prod->setcampo2($codprod_ped);
					$prod->setcampo3($qtde_ped);  //QTDE COMP
					$prod->setcampo4($qtde_ped);  //QTDE REC
					$prod->setcampo5($puu_ped);
					$prod->setcampo6($garantia);
					$prod->setcampo7($codemp_t);
					$prod->setcampo8("");
					$prod->setcampo9($anopar.$mespar.$diapar);

							// CALCULO DA DATA DE PREV DE CHEGADA
							$dpm = $mespar;
							$dpa = $anopar;
							$dpm = $dpm + $garantia;
							$dpmresto=0;
							$dpmresto = $dpm%12;
							if ($dpmresto==0){
								$dpmresto=$nfm[$i];
								$difdpa = (floor($dpm/12))-1;
							}else{
								$difdpa = floor($dpm/12);
							}
							$dpa = $dpa + $difdpa;
							if (strlen($dpmresto)==1){$dpmresto = '0'.$dpmresto;}


					$prod->setcampo10($dpa.$dpmresto.$diapar);
					$prod->setcampo11("");  // CBOK
					if ($transf_mp == 'OK'){$tipo_nf = "P";}else{$tipo_nf = "V";}
					$prod->setcampo12($tipo_nf);  // TIPO NF (V, P)
					$prod->addProd("ocprod", $ureg);

				 }//FOR
					
			}

		
		}
		
		// PESQUISA POR PRODUTOS QUE NAO POSSUEM PRODUTOS MAXX
    	$prod->clear();
    	$prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codped' and (produtos.codcat = 72 or produtos.codcat = 73) and pedidoprod.codprod=produtos.codprod ");
    	$count_prod_maxx = $prod->showcampo0();
    	
    	if ($count_prod_maxx <> 0){
    		$prod->clear();
    		$prod->listProdU("COUNT(*)","pedidoprod, produtos", "codped='$codped' and produtos.codcat <> 58 and pedidoprod.codprod=produtos.codprod ");
    		$count_prod_extra = $prod->showcampo0();
    	}
			
			echo "cjex = $cjex";

			if ($end == 1 and $cjex == 1){$statuspeds = "LIB";}
			if ($end == 1 and $cjex == 0){$statuspeds = "PROD";}
			if ($end == 1 and $count_prod_extra <> 0){$statuspeds = "PROD";}
			if ($end == 0){$statuspeds = "PECA";}
			

			$dataatual = $prod->gdata();

			// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
			$prod->listProdgeral("pedidostatus", "codped=$codped and statusped='$statuspeds'", $array614, $array_campo614 , "");
						
			// MODIFICAÇÂO DO PEDIDO
			$prod->listProdU("modped","pedido", "codped=$codped");
			$modped = $prod->showcampo0();

			if (count($array614) == 0){

				// ATUALIZA STATUS DA TABELA
				$prod->setcampo0("");
				$prod->setcampo1($codped);
				$prod->setcampo2($dataatual);
				$prod->setcampo3($statuspeds);
				echo "login".$login;
				$prod->setcampo4($login);

				$prod->addProd("pedidostatus", $ureg);

				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);
				}
					
			
				// ATUALIZA STATUS DO PEDIDO
				$prod->listProd("pedido", "codped=$codped");
				$codempped = $prod->showcampo1();
				$prod->setcampo14($statuspeds);
				

				$prod->upProd("pedido", "codped=$codped");

				
			}else{


				if ($modped == "OK"){

					// ATUALIZA STATUS DA TABELA
					$prod->setcampo0("");
					$prod->setcampo1($codped);
					$prod->setcampo2($dataatual);
					$prod->setcampo3($statuspeds." MOD");
					$prod->setcampo4($login);

					$prod->addProd("pedidostatus", $ureg);
					
					// ATUALIZA STATUS DO PEDIDO
					$prod->listProd("pedido", "codped=$codped");
					$codempped = $prod->showcampo1();
					$prod->setcampo14($statuspeds);
					
	
					$prod->upProd("pedido", "codped=$codped");
				}
			}
			
			

		} // RETORNO

		if ($B1 == "Finalizar"){$Action="check";}

		$desloc=0;
		
        break;

	 case "update":

      #echo("$cont");
		 
		 break;

	 case "list":

		$ini = 1;
		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		
		$Actionsec="list";
		
		 break;
		 
	 case "importcb":
	 
	 	
		if ($oc){
		
		$prod->listProdU("if ((COUNT(*)=$qtde),1,0)","codbarra", "codoc = $oc and codprod = $codprod_oc and codbarraped <> 1 and tipo_fab <> 'P' ");
		$verif = $prod->showcampo0();
	
		#echo "$verif";

		if ($verif == 1){

			$prod->listProdSum("codbarra", "codbarra", "codoc = $oc and codprod = $codprod_oc and codbarraped <> 1 and tipo_fab <> 'P'", $array_pesq, $array_campo_pesq, "");
				for ($i = 0; $i < count($array_pesq); $i++ )
				{
					$prod->mostraProd( $array_pesq, $array_campo_pesq, $i );
				
					$cb_oc_t[$i] = $prod->showcampo0();
					
					#echo "cb = ".$cb_oc_t[$i]."<BR>";
		
				}
				
			$prod->listProdU("codpped", "pedidoprod", "codped = $codped and codprod = $codprod_oc ");
			$codpped = $prod->showcampo0();	
				
					for ($i = 0; $i < $qtde; $i++ )
				{
				
					#echo "codpped = ".$codpped."<BR>";
					
					$cb_oc[$codpped][$i]= $cb_oc_t[$i]; 
					
					#echo "cb_real = ".$cb_oc[$codpped][$i]."<BR>";
		
				}
			
			#echo("$oc - $codprod_oc - $qtde ");
			}
		
		}
		
		$Actionsec="list";
		
		 break;

}
	echo("
<html>

<head>
<script language='javascript'>
function doOne(Form45, codprod, qtde)
{

var oc= document.getElementById('oc_'+codprod+'').value;

document.Form45.action = '$PHP_SELF?pg=$pg&Action=importcb&codped=$codped&oc='+oc+'&codprod_oc='+codprod+'&qtde='+qtde+'';
document.Form45.submit();
}

</script>
");

// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

if($Action == "check" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////
	echo("

<html>

<head>
<title>CONFERÊNCIA DE PRODUTOS</title>
	<script language='javascript'>
<!--
function Link(url) 
{ 
path = url;
 opener.top.frames['Main'].location.href=path

window.close();

}
//-->

function doOne(Form45, codprod)
{

var oc= document.getElementById('oc_'+codprod+'').value;

document.Form45.action = '$PHP_SELF?pg=$pg&Action=importcb&codped=$codped&oc='+oc+'';
document.Form45.submit();
}

</script>
</head>

<body onload=");echo('"javascript:Link(');echo("'restrito.php?Action=insert&codped=$codped&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&cjex=$cjex&end=$end'");echo(')"');echo("
>

</body>

</html>



	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////

/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

else:
  
	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProd("pedido", "codped=$codped");
		
		$codemp = $prod->showcampo1();
		$codcliente = $prod->showcampo2();
		$codvend = $prod->showcampo3();
		$endentrega = $prod->showcampo4();
		$refentrega = $prod->showcampo5();
		$obsentrega = $prod->showcampo6();
		$dataped = $prod->showcampo11();
		$dataprev = $prod->showcampo12();
		$datapedf = $prod->fdata($dataped);
		$dataprevf = $prod->fdata($dataprev);
		$mlb = $prod->showcampo7();
		$mcv = $prod->showcampo19();
		$vpv = $prod->showcampo8();
		$vt = $prod->showcampo9();
		$vpp = $prod->showcampo10();
		$mlbf = number_format($mlb,2,',','.'); 
		$mcvf = number_format($mcv,5,',','.'); 
		$vpvf = number_format($vpv,2,',','.'); 
		$vtf = number_format($vt,2,',','.'); 
		$vppf = number_format($vpp,2,',','.'); 
		$obsmontagem = $prod->showcampo16();
		$dataprevent = $prod->showcampo12();
		$dataprevent = $prod->fdata($dataprevent);
		$horaprevent = $prod->showcampo17();
		$obsfinanceiro = $prod->showcampo18();
		$modoentr = $prod->showcampo25();
		$obsapcredito = $prod->showcampo26();
		$nf = $prod->showcampo24();
		$contrato = $prod->showcampo27();
		$libentr = $prod->showcampo21();
		$notafin = $prod->showcampo28();
		$codbarra = $prod->showcampo29();
		$caixa = $prod->showcampo31();
		$reavalfpg = $prod->showcampo36();
		$serasaold = $prod->showcampo37();
		$xckmlb = $prod->showcampo38();
		$fat = $prod->showcampo39();
		$cb_ok = $prod->showcampo22();
		$ped_transf = $prod->showcampo49();

$title = "ESTOQUE - CONFERÊNCIA DE PRODUTOS";

include("sif-topolimpo.php");

echo("
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>

<form method='POST' action='$PHP_SELF?Action=insert'  name='Form45'>



  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>
<BR>
<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>&nbsp;</b></font></td>
	<td width='75%' height='0' colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>DESCRIÇÃO DETALHADA</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b>QTDE</b></font></td>
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b></b></font></td>
		<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#000000'><b></b></font></td>
	
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprod", "codped=$codped", $array3, $array_campo3 , "order by tipocj, ordem");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>MICROCOMPUTADORES</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			$cj[0] = 1;

			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			
			$prod->listProdU("nomeprod, unidade, chkcb", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$chkcb = $prod->showcampo2();
			
			$prod->listProdU("nomeprod", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();


			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
			
			$cj[0] = 0; // VERIFICA SE EXISTE CONJUNTO
		
			$k=$i+1;
			$u=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

	// ESTOQUE DE SEPARACAO
	if ($codcb == ""){$soma_dois = 0;}else{$soma_dois = 1;}
	$qtde_cb = substr_count($codcb,':');
	$qtdet_cb = $qtde - ($qtde_cb+$soma_dois);

	$prod->listProdU("SUM(qtde), codcb","pedido, pedidoprod", "pedidoprod.codprod = $codprodped AND codcb = '' AND pedido.codped = pedidoprod.codped AND cancel <> 'OK' AND pedido.codemp =$codemp  AND pedido.hist <> 1 and dataped < '$dataped' GROUP by codprod");
	$qtde_ped = $prod->showcampo0();
	$codcb_ped  = $prod->showcampo1();
	if ($codcb_ped == ""){$soma_dois1 = 0;}else{$soma_dois1 = 1;}
	$qtde_cb_ped = substr_count($codcb_ped,':');
	$qtde_pedt = $qtde_ped - ($qtde_cb_ped+$soma_dois1);
	$prod->listProdU("qtde", "estoque", "codprod=$codprodped and codemp =$codemp");
	$qtde_estoque = $prod->showcampo0();

	if ($tipocj <> $contcjshow){
			echo(" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
  </tr>
		
  ");
	
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}

	  if ($chkcb == "N" or $chkcb == ""){$corcampo="#CBF5CD";}else{$corcampo="#F2E4C4";}

echo(" 
	
  <tr bgcolor='$corcampo'> 
	<td width='5%' height='0' align='center'>
	  ");
for($o = 0; $o < $qtde; $o++ ){

  	if ($codcb_array[$o] == ""){
		$cb="NO";
		$cor1 ="#FF0000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}else{
		$cb="OK";
		$cor1="#008000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}
}
echo("
</td>
<td width='40%' height='0'  align='center'>
	");

	for($o = 0; $o < $qtde; $o++ ){

  		if ($codcb_array[$o] == ""){
		
		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b><input type='text' name='codbarra[$codpped][$o]' ></b></font><bR>
		");
		}else{

		$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$o]");
		$codbarra_ok = $prod->showcampo0();

		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$codbarra_ok</b></font><br>

		");
		}
	}
	echo("
	  </td>
    <td width='45%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>$codprodped</b> - $nomeprod</font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
    <td width='5%' height='0' align='center'>");
for($p = 1; $p <= $qtdet_cb; $p++ ){

if (($qtde_estoque - $qtde_pedt)-$p >= 0){$status_sep = "DISP";$cor77= '#3366FF';}else{$status_sep = " NDISP";$cor77= '#FF0000';}

echo("
	   <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor77' ><b>$status_sep</b></font>
");
}
echo("
</td>
	
   
  </tr>
		
  ");

	

	$ptotal = $ptotal + $put;
		}
	
	$putotal = $putotal +$puu;
	$pmtotal = $pmtotal +$put;
	$putotalf = number_format($putotal,2,',','.'); 
	$pmtotalf = number_format($pmtotal,2,',','.'); 
		}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
   
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=8><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");
  
  $pmtotalu = 0.00;	

	 // PRODUTOS UNITARIO
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();

		$cj[1] = 1;
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$codcb = $prod->showcampo10();
			$codcb_array = explode(":", $codcb);
			$tipocj = 0;

			
			$prod->listProdU("nomeprod, unidade, chkcb", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$chkcb = $prod->showcampo2();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();
			
					
			$k=$i+1;
			$u=$u+1;


			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

	  if ($chkcb == "N" or $chkcb == ""){$corcampo="#CBF5CD";}else{$corcampo="#F2E4C4";}

	// ESTOQUE DE SEPARACAO
	if ($codcb == ""){$soma_dois = 0;}else{$soma_dois = 1;}
	$qtde_cb = substr_count($codcb,':');
	$qtdet_cb = $qtde - ($qtde_cb+$soma_dois);

	$prod->listProdU("SUM(qtde), codcb, ped_transf","pedido, pedidoprod", "pedidoprod.codprod = $codprodped AND codcb = '' AND pedido.codped = pedidoprod.codped AND cancel <> 'OK' AND pedido.codemp =$codemp  AND pedido.hist <> 1 and dataped < '$dataped' GROUP by codprod");
	$qtde_ped = $prod->showcampo0();
	$codcb_ped  = $prod->showcampo1();
	$ped_transf_ped  = $prod->showcampo2();
	if ($codcb_ped == ""){$soma_dois1 = 0;}else{$soma_dois1 = 1;}
	$qtde_cb_ped = substr_count($codcb_ped,':');
	$qtde_pedt = $qtde_ped - ($qtde_cb_ped+$soma_dois1);
	$prod->listProdU("qtde", "estoque", "codprod=$codprodped and codemp =$codemp");
	$qtde_estoque = $prod->showcampo0();
			
echo(" 
	
  <tr bgcolor='$corcampo'> 
	<td width='5%' height='0' align='center'>
	  ");
for($o = 0; $o < $qtde; $o++ ){

  	if ($codcb_array[$o] == ""){
		$cb="NO";
		$cor1 ="#FF0000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}else{
		$cb="OK";
		$cor1="#008000";
		 echo("
	  <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor1'><b>$cb</b></font>
	
	  ");
	}
}
echo("
</td>
<td width='40%' height='0'  align='center'>
	");

	for($o = 0; $o < $qtde; $o++ ){

  		if ($codcb_array[$o] == ""){
		
		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b><input type='text' name='codbarra[$codpped][$o]' value = '"); echo $cb_oc[$codpped][$o]; echo("'></b></font><bR>
		");
		}else{

		$prod->listProdU("codbarra", "codbarra", "codcb=$codcb_array[$o]");
		$codbarra_ok = $prod->showcampo0();

		echo("
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$codbarra_ok</b></font><br>

		");
		}
	}
	echo("
	  </td>
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>$codprodped</b> - $nomeprod</font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
  <td width='5%' height='0' align='center'>");
for($p = 1; $p <= $qtdet_cb; $p++ ){

if (($qtde_estoque - $qtde_pedt)-$p >= 0){$status_sep = "DISP";$cor77= '#3366FF';}else{$status_sep = " NDISP";$cor77= '#FF0000';}

echo("
	   <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor77' ><b>$status_sep</b></font>
");
}

echo("</td>
<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
");
if ($ped_transf == 'OK'){
echo("
<b>OC<BR><input type='text' name='oc_$codprodped' id='oc_$codprodped' size = '6' ></b>  
<input type='button' name='button' id='button' value='IMPORTAR' onclick = 'doOne(Form45, $codprodped, $qtde);'/>
</font>
");
}
echo("
</td>
  </tr>
  ");

	
	$ptotal = $ptotal + $put;
	$pmtotalu = $pmtotalu + $put;
	$pmtotaluf = number_format($pmtotalu,2,',','.'); 

		}
	 }
	 if ($pmtotaluf == 0 ){$pmtotaluf="0,00";}
		echo(" 
	
 <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='40%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b></b></font></td>
	
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>

   
  </tr>
		
  ");


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotalf = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>

		
  ");
// VERIFICA ATRAVES DE MULTIPLICACAO SE EXISTE CONJUNTO OU NAO
//	SE $cjex = 0 -> existe conjunto
//  SE $cjex = 1 -> so existe unitarios

$cjex=1;
 for($t = 0; $t < 2; $t++ ){
			
	$cjex = $cjex * $cj[$t];
	#echo("$t - $cjex - $cj[$t]<br>");
		
}

	echo("
		</table>
	<br>	
  <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='100%' align='center'>
		<div id='camada' style='z-index:1; visibility: visible; overflow: hidden;'>
		<input class='sbttn' type='submit' value='Inserir Codbarra' name='B1' onClick=");echo('"MM_changeProp(');echo("'camada','','style.visibility','hidden','LAYER')");echo('"');echo(">&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Finalizar' name='B1' onClick=");echo('"MM_changeProp(');echo("'camada','','style.visibility','hidden','LAYER')");echo('"');echo(">
		</div>
			</td>
      </tr>
    </table>
    </center>
  </div>
	<input type='hidden' name='desloc' value='0'>
			<input type='hidden' name='operador' value='OR'>
			<input type='hidden' name='codped' value='$codped'>
			<input type='hidden' name='codcliente' value='$codcliente'>
			<input type='hidden' name='codvendped' value='$codvend'>
			<input type='hidden' name='codempselect' value='$codemp'>
			<input type='hidden' name='vpvt' value='$ptotal'>
			<input type='hidden' name='nump' value='$nump'>
			<input type='hidden' name='retlogin' value='$retlogin'>
    	    <input type='hidden' name='connectok' value='$connectok'>
	     	<input type='hidden' name='pg' value='$pg'>
			<input type='hidden' name='cjex' value='$cjex'>
			<input type='hidden' name='retorno' value='1'>
			


		</form>
<br>

	
		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;


}
?>
       
