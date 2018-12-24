

<?php



if ($impressao == 1){require("classprod.php" );}

// VARIAVEIS DA PAGINA
$acrescimo = 1000;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " GROUP BY codped order by dataped  limit $desloc,$acrescimo ";				// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "RELATORIO GERAL DE PENDÊNCIA DE PEÇAS";
$subtitulo = "PEDIDOS";

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

$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codsuperselect = $prod->showcampo9();
		$codgrpselect = $prod->showcampo3();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp == "N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
		}
		#if ($codempvend <> 0){$codempselect = $codempvend;}


		// PARA PAGINA DO BANCO
		$prod->listProd("seguranca", "arquivo='iniciopedadm_est.php'");
		$pgest = $prod->showcampo0();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
        break;

    case "update":

						
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "reajuste":
			
	 

	
		
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

		switch ($tipopesq) {
	    
		case "for":
		
		$campopesq = "nomeprod";
		$condicao2 = " LCASE(produtos.$campopesq) like '%$palavrachave1%' and ";
		
		
		if ($pedpeca <>"OK"){
			$condicao4 = " ((pedido.status <> 'AVAL' and pedido.reavalfpg <>'OK')) and ";
		}else{
			$condicao4 = " ((pedido.status = 'PECA' )) and ";
		}
		
		
		$condicao3 = $condicao4;
		/*

		//PESQUISA POR NOME PRODUTO
		if ($palavrachave){
							
			$condicao3 .= $condicao2;
		}
		
			//PESQUISA POR NOME PRODUTO
		if ($ped_caixa){
							
			$condicao3 .= "  pedido.caixa = 'OK' and  ";
		}
		
		
		//PESQUISA POR NOME PRODUTO
		if ($codprodpesq){
							
			$condicao3 .= " pedidoprod.codprod = '$codprodpesq' and ";
		}
		*/
	
				$condicao3 .= " pedido.codemp='$codempselect'";
				$condicao3 .= " and pedido.hist <> '1'  ";
				$condicao3 .= " and pedido.cancel <> 'OK'  ";
				#$condicao3 .= " and (pedido.caixa = 'OK'  or  pedido.inicio_sep = 'OK' )";
				#$condicao3 .= " and pedidoprod.codprod = produtos.codprod  ";
				$condicao3 .= " and pedido.codped=pedidoprod.codped ";
				$condicao3 .= " and cb <>  'OK'  ";


		break;

		
		
		}

		#echo("c=$condicao3 - c4=$condicao4");

				
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("pedido.codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, pedido.status, horaprevent, pedido.codbarra, modped, pedidoprod.codprod, caixa, prontaentr   ", "pedidoprod, pedido", $condicao3, $array, $array_campo, $parm );

		#echo("nr=$numreg - r=$reg3");
		$Action="list";
		
		
		 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codped = $prod->showcampo0();
			$codcliente[$codped] = $prod->showcampo1();
			$codvend1[$codped] = $prod->showcampo2();
			$dataped[$codped] = $prod->showcampo3();
			$dataprevent[$codped] = $prod->showcampo4();
			$status[$codped] = $prod->showcampo5();
			$horaprevent[$codped] = $prod->showcampo6();
			$codbarra[$codped] = $prod->showcampo7();
			$modped[$codped] = $prod->showcampo8();
			$codprod[$codped] = $prod->showcampo9();
			$caixa[$codped] = $prod->showcampo10();
			$pronta[$codped] = $prod->showcampo11();
	
			$dataatual = $prod->gdata();
			$difdias[$codped] = $prod->numdias($dataatual,$dataprevent[$codped]);
			
			$prod->clear();
			$prod->listProdU("nome", "clientenovo", "codcliente=".$codcliente[$codped]);
			$nomecliente[$codped] = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend=".$codvend1[$codped]);
			$nomevend[$codped] = $prod->showcampo0();
			
			#echo "$codped - ".$codvend1[$codped]."<br>";
			
				
				//PRODUTOS
				$prod->listProdSum("codprod, qtde, codcb", "pedidoprod", "codped=$codped ", $array56, $array_campo56, "" );
				for($k = 0; $k < count($array56); $k++ ){
		
							
				$prod->mostraProd( $array56, $array_campo56, $k);
				$codprodnew  = $prod->showcampo0();
				$qtdenew  = $prod->showcampo1();
				$codcb  = $prod->showcampo2();
				$codcb_array1 = explode(":", $codcb);
				$codcb_array1 = array_diff($codcb_array1, array(''));
				$qtdecb = count($codcb_array1);
				#print_r(array_values ($codcb_array1));
				#if ($codcb == ""){$soma_dois = 0;}else{$soma_dois = 1;}
				
				#$qtde_cb = substr_count($codcb,':');
				#$qtdet_cb = $qtdenew - ($qtde_cb+$soma_dois);
				$qtdet_cb = $qtdenew - ($qtdecb);
				
					if ($qtdet_cb > 0 ){
					
						if ($est_ini[$codprodnew] == 0){
							$prod->listProdU("SUM(qtde)", "estoque", "codprod=$codprodnew and codemp ='$codempselect' ");
							$est_ini[$codprodnew] = $prod->showcampo0();
							$saldo_prod[$codprodnew] = $est_ini[$codprodnew];
						}
						
						
						
						
						$prod->listProdU("nomeprod", "produtos", "codprod=$codprodnew");
						$nomeprod[$codped][$codprodnew] = $prod->showcampo0();
						$saldo_prod[$codped][$codprodnew] = $saldo_prod[$codprodnew];
						$qtdet_cb_prod[$codped][$codprodnew] = $qtdet_cb;
						
						if ($saldo_prod[$codprodnew] > 0 ){$status_sep[$codped][$codprodnew] = "DISP";}
						
						else{
						
							// CALCULA ESTOQUE DA FABRICA
							$prod->clear();
							$prod->listProdU("COUNT(*) est","codbarra", "codprod=$codprodnew and (codemp=14 ) and tipo_fab <>'P' and codbarraped <> 1 GROUP by codprod ");							$est_fab = $prod->showcampo0();
	
							$prod->clear();
							$prod->listProdU("SUM(reserva) as res","estoque", "estoque.codprod=$codprodnew and (estoque.codemp=14) ");
							$res_fab = $prod->showcampo0();
							$res_fab = 0;
							
							$estt = ($est_fab-$res_fab);
							#$saldo_prod[$codprodnew] = $est_ini[$codprodnew];
							#echo "est_fb=".$est_ini[$codprodnew]."<BR>";
						
								if (($estt + $saldo_prod[$codprodnew]) > 0 ){
									$status_sep[$codped][$codprodnew] = "FABRICA";
								}else{
									$status_sep[$codped][$codprodnew] = "NO";
								}
								
						}
											
						$saldo_prod[$codprodnew] = $saldo_prod[$codprodnew] - ($qtdet_cb);
		
					}
				}
		
		}
		
		/*
		asort($dataped);
		reset($dataped);
		foreach($dataped as $chave => $valor) {
		
		#echo "<pre>";
		echo $codbarra[$chave]." - ".$dataped[$chave]."<BR>";
		#echo "</pre>";
		
			#echo "<pre>";
			#print_r($nomeprod[$chave]);
			#echo "</pre>";
			foreach($nomeprod[$chave] as $chave1 => $valor1) {
			
			echo " ----------------->". $nomeprod[$chave][$chave1]." - ".$saldo_prod[$chave][$chave1]." - ".$status_sep[$chave][$chave1]."<BR>";
			
			}
		
		}
		

		*/

	
}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

if ($impressao <> 1){ include("sif-topo.php"); }


/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "delete"):


endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"){

	echo("
<center>
  <table width='100%'>
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
        <font size='3' color='#FF9933'  >$titulo</font></font></b><br>
<font color='#336699' face=' Verdana, Arial, Helvetica, sans-serif' size='2'>$subtitulo</font></td>
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		<!--TIPO:<select size='1' name='tipopesq'>
    <option value='cli'>Cliente</option>
    <option selected value='oc'>Ordem Compra</option>
  </select>-->COD. PROD: <input type='text' name='codprodpesq' size='5'>
		
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codpednew' value='$codpednew'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

	  </p>
	   </td>
		  </form>
    </tr>
  </table>
      </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
	
	

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
		<option value='$PHP_SELF?Action=list&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
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


	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$contatoold = $prod->showcampo16();

		$nomeempold = strtoupper($nomeempold);
echo("
<br>
		

<div align='center'>
  <center>
  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
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
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
           
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif' width='16' height='16'></td>
            <td width='25%'><b><a href='$PHP_SELF?Action=list&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pedpeca=$pedpeca'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
              TABELA</font></a></b></td>
          <td width='40%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b>  $totalpagina</b></font></td>
        </tr>
          <tr>
            <td width='100%' colspan='5'>
      <hr size='1'>
            </td>
        </tr>
      </table>
       
    </td>
  </tr>
  <center>
 
  </table>
  </center>
</div>

	<table width='100%' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
 	<td width='7%' height='0'>&nbsp;</td>
    <td width='8%'><div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div></td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME VEND</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PED</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA PREV</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONT</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAIXA</font></b></div>
    </td>
	");
	
		asort($dataprevent);
		reset($dataprevent);
		foreach($dataprevent as $chave => $valor) {
		
			#echo $codbarra[$chave]." - ".$dataped[$chave]."<BR>";

			// FORMATACAO //
			$datapedf = $prod->fdata($dataped[$chave]);
			$datapreventf = $prod->fdata($dataprevent[$chave]);
			
			$bgcorlinha="#E5E5E5";
			if ($status[$chave] == "AVAL"){$bgcorlinha="#FFCC66";}
			if ($status[$chave] == "APROV"){$bgcorlinha="#CFFCC7";}
			if ($status[$chave] == "PECA"){$bgcorlinha="#D6B778";}
			if ($status[$chave] == "PROD"){$bgcorlinha="#F2E4C4";}
			if ($status[$chave] == "LIB"){$bgcorlinha="#EDE763";}
			if ($status[$chave] == "DESP"){$bgcorlinha="#339966";}
			if ($status[$chave] == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status[$chave] == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status[$chave] == "CANCEL"){$bgcorlinha="#E1AFAA";}
			
			if ($caixa[$chave] == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}
			if ($modped[$chave] == "OK"){$mod ="MOD";}else{$mod="";}
			
			if ($difdias[$chave] < 2 ){$img ="<img border='0' src='images/a_sep.png' >";$cori = "#FF0000";}  // HOJE E ATRASADOS
			if ($difdias[$chave] >= 2 and  $difdias[$chave] <= 4 ){$img ="<img border='0' src='images/b_sep.png' >";$cori = "#FF9933";} // AMANHA E D+2
			if ($difdias[$chave] > 4 ){$img ="";$cori = "#FFFFFF";} // MAIOR QUE D+3
			if ($pronta[$chave] == 'OK' ){$img ="<img border='0' src='images/pronta.png' >";$cori = "#000000";} // PRONTA ENTREGA
			
			

		echo("
			<tr bgcolor='$bgcorlinha'> 
			<td width='7%' height='0' align='center' bgcolor = '$cori'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$img<b></td>
			<td width='8%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codped=$chave&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pgest&hist=$hist'>$codbarra[$chave]</font></b></a></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente[$chave]</b></font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomevend[$chave]</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapedf</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datapreventf<br>$horaprevent[$chave]</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status[$chave]</b><br>$mod</font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$difdias[$chave]</font></b></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$cor4'>$caixa[$chave]</font></b></td>
			
</tr>
	<tr bgColor='#cffcc7'>
	 <td align='middle' width='7%' height='0' bgcolor='#FFFFFF'>&nbsp;</td>
      <td align='middle' width='100%' height='0' colspan='7' bgcolor='#FFFFFF'>

	<table border='0' width='100%' cellspacing='1'>
          
");


		foreach($nomeprod[$chave] as $chave1 => $valor1) {
		
		#echo " ----------------->". $nomeprod[$chave][$chave1]." - ".$saldo_prod[$chave][$chave1]." - ".$status_sep[$chave][$chave1]."<BR>";
		
		if ($status_sep[$chave][$chave1]  == "DISP"){$cor77= '#3366FF';}else{$cor77= '#FF0000';}


echo("
          <tr>
            <td width='20%' bgcolor='#F3F3F3' align = 'center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  ><b>$chave1</b></font></td>
            <td width='60%' bgcolor='#F3F3F3'>
");
		if ($palavrachave == "" and $codprodpesq == ""){$codprod = "";}
		if ($codprodpesq == $chave1){	  
			echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#CC0000'><b>".$nomeprod[$chave][$chave1]."</b></font>");
			}else{
			echo("<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>".$nomeprod[$chave][$chave1]."</font>");
		}
echo("
	</td>
		 <td width='10%' bgcolor='#F3F3F3' align = 'center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  >".$qtdet_cb_prod[$chave][$chave1]."</font></td>
  	 <td width='10%' bgcolor='#F3F3F3' align = 'center'>

	   <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor77' ><b>". $status_sep[$chave][$chave1]."</b></font>

	   </td>
          </tr>
    ");
			
}//FOR PRODUTOS
echo("
        </table>
      </td>
</tr>
	");
	 }//FOR PEDIDO

echo("
		</table>
");

}



/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

}



/// INCLUSÃO DO RODAPE ////

if ($impressao <> 1 ){ 


	include ("sif-rodape.php");}
}

?>
       
