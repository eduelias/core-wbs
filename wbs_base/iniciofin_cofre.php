

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
$bgcorlinha = "#F3F8FA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();

	// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='iniciofin_cofre_cheqlist.php'");
		$pglistchq = $prod->showcampo0();


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

			if($retorno){

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("codcx", "fin_cxsaldo", "codcxsaldo = $codcxsaldoselect", $array56, $array_campo56, "" );
		$prod->mostraProd( $array56, $array_campo56, 0 );
		$codcxselect = $prod->showcampo0();

		// ATUALIZA FORMA PG
		$prod->clear();
		$prod->listProdgeral("fin_cofre_temp", "codcofregrupo=$codcofregruposelect", $array21, $array_campo21, "" );
	
		for($i = 0; $i < count($array21); $i++ ){
			$prod->mostraProd( $array21, $array_campo21, $i );
			
			$codcofre = $prod->showcampo0();
			$opcaixa = $prod->showcampo1();
			$descricao = $prod->showcampo2();
			$credito = $prod->showcampo3();
			$debito = $prod->showcampo4();
			$codped = $prod->showcampo10();
			$codch = $prod->showcampo11();
			$codemp = $prod->showcampo12();


				if (!$uregopera){
					//INSERE NOVA OPERACAO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($dataatual);
					$prod->setcampo2($codcxsaldoselect);
					$prod->addProd("fin_cxopera", $uregopera);
				}

				//INSERE NO CAIXA
				$prod->clear();
				$prod->setcampo0("");
				$prod->setcampo1($uregopera);
				$prod->setcampo2($codcxsaldoselect);
				$prod->setcampo3($opcaixa);
				$prod->setcampo4($descricao." - COFRE");
				$prod->setcampo5($dataatual);
				if ($saida <> 1){
					$prod->setcampo7($credito);
				}else{
					$prod->setcampo6($debito);
				}
				$prod->setcampo8($uregfgrupo);
				$prod->setcampo9($codped);
				$prod->setcampo11($login);
				$prod->addProd("fin_cxlanc", $ureglanc);


													
				//INSERE CHEQUES
				$prod->clear();
				$prod->listProd("fin_cheques", "codch=$codch");
				if ($saida <> 1){
					$prod->setcampo9("CO");
				}else{
					$prod->setcampo10($uregopera);
					$prod->setcampo11($ureglanc);
					$prod->setcampo13($codcxselect);
					$prod->setcampo9("CX");
				}
				$prod->upProd("fin_cheques", "codch=$codch");

				
			//INSERE FORMA PG PARA AS CAP
			$prod->clear();
		
			$prod->setcampo1($opcaixa);
			$prod->setcampo2($descricao);
			$prod->setcampo3($credito);
			$prod->setcampo4($debito);
			$prod->setcampo5($dataatual);
			if ($saida <> 1){
				$prod->setcampo6($dataatual);
			}
			$prod->setcampo8($uregopera);
			$prod->setcampo9($ureglanc);
			$prod->setcampo10($codped);
			$prod->setcampo11($codch);
			$prod->setcampo12($codempselect);

			$prod->addProd("fin_cofre", $uregf);

			//DELETA FORMA PG TEMPORARIA
			$prod->delProd("fin_cofre_temp", "codcofre=$codcofre");
			$prod->delProd("fin_cofre_grupo_temp", "codcofregrupo=$codcofregruposelect");


		} // FOR

		
			$Actionsec = "list";
			}
		
	
        break;

		

    case "update":

		if(!$codcofregruposelect){

			$prod->clear();
			$prod->setcampo1($dataatual);
			$prod->addProd("fin_cofre_grupo_temp", $uregcofregrupo);

			$codcofregruposelect = $uregcofregrupo;
		}
				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "inscofre":

			$valorfpg = str_replace('.','',$valorfpg);
			$valorfpg = str_replace(',','.',$valorfpg);

			if ($insch == 1){

				$prod->listProd("fin_cheques", "codch='$codch'");
				$opcaixa = $prod->showcampo2();
				$valorfpg = $prod->showcampo7();
				$codped = $prod->showcampo1();
				
			}

	
			$prod->listProd("formapg", "opcaixa='$opcaixa'");
			$descricao = $prod->showcampo1();

			
			
			//INSERE ENTRADA NO COFRE
			$prod->clear();
		
			$prod->setcampo1($opcaixa);
			$prod->setcampo2($descricao);
			if ($saida <> 1){ 
				$prod->setcampo3($valorfpg);
			}else{
				$prod->setcampo4($valorfpg);
			}
			$prod->setcampo10($codped);
			$prod->setcampo11($codch);
			$prod->setcampo12($codempselect);
			$prod->setcampo13($codcofregruposelect);

			$prod->addProd("fin_cofre_temp", $uregcofre);

			$banco =="";$conta=="";$agencia=="";$numch="";

			
			
			

		$Action="update";
				
		 break;

	 case "dellanccofre":

			//DELETE LANCAMENTO COFRE TEMPORARIO
			$prod->delProd("fin_cofre_temp", "codcofre=$codcofreselect");
			
		$Action="update";
				
		 break;	


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){

		if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){

									
				$condicao3 .= " codemp='$codempselect'";
				$condicao3 .= " and TO_DAYS(NOW()) - TO_DAYS(datamov) <= 5";
							
			}else{
				
				$datainicial = $ade."-".$mde."-".$dde." 00:00:00";
				$datafinal = $aate."-".$mate."-".$date." 23:59:59"; 
				$condicao3 .= " codemp='$codempselect'";
				$condicao3 .= " and (datamov >= '$datainicial' and datamov <= '$datafinal')";

					
			}
			

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "fin_cofre", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcofre, codcxlanc, codcxopera, opcaixa, descricao, datamov, dataini, credito, debito, codped, codch", "fin_cofre", $condicao3, $array, $array_campo, "order by datamov DESC" );
		
	

		// CRIA AS PAGINAS
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 


		/*
		
		$prod->listProdU("codemp, saldoini, dataini, nomebco, tipoconta", "fin_bcoconta", "codconta=$codcontaselect");
		$codemp = $prod->showcampo0();
		$saldoini = $prod->showcampo1();
		$datainiconta = $prod->showcampo2();
		$nomebco = $prod->showcampo3();
		$tipoconta = $prod->showcampo4();
		
		
		// FORMATACAO //
		$datainicontaf = $prod->fdata($datainiconta);
		$saldoinif = number_format($saldoini,2,',','.'); 
		
		*/

		$prod->listProdU("nome", "empresa", "codemp=$codempselect");
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);

		// CALCULA O SALDO ATUAL EM CHEQUES
		$prod->listProdSum("(SUM(credito)-SUM(debito))", "fin_cofre", "codemp = $codempselect and opcaixa not like '02.00'" , $array12, $array_campo12, "" );
		$prod->mostraProd( $array12, $array_campo12, 0 );
		$saldoatualch = $prod->showcampo0();

		// CALCULA O SALDO ATUAL EM DINHEIRO
		$prod->listProdSum("(SUM(credito)-SUM(debito))", "fin_cofre", "codemp = $codempselect and opcaixa like '02.00'" , $array12, $array_campo12, "" );
		$prod->mostraProd( $array12, $array_campo12, 0 );
		$saldoatualesp = $prod->showcampo0();

		// FORMATACAO //
		$dataatualf = $prod->fdata($dataatual);
		$saldoatualchf = number_format($saldoatualch,2,',','.'); 
		$saldoatualespf = number_format($saldoatualesp,2,',','.'); 




		// CALCULA O SALDO INICIAL DO PERIODO
		if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){

			$prod->listProdMY("DATE_FORMAT(NOW() - INTERVAL 5 DAY, '%Y-%m-%d')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$datainicial = $prod->showcampo0();
			$datafinal = $dataatual;

		}
		
			$prod->listProdSum("(SUM(credito)-SUM(debito)) as saldo", "fin_cofre", "codemp = $codempselect  and (datamov >= '$datainiconta' and datamov < '$datainicial')" , $array125, $array_campo125, "" );
			$prod->mostraProd( $array125, $array_campo125, 0 );
			$saldoiniperiodo = $prod->showcampo0();

			// FORMATACAO //
			$datainicialf = $prod->fdata($datainicial);
			$datafinalf = $prod->fdata($datafinal);
			$saldoiniperiodof = number_format($saldoiniperiodo,2,',','.'); 

		#echo("dini = $datainiconta s = $saldoiniperiodof d = $datainicial");
	
		
		$Action="list";
		

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "COFRE - OPERACOES DE COFRE";

include("sif-topolimpo.php");

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************

function verificaObrig (form, saldo1, saldo2, saida)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	if ((saldo2 > saldo1) && saida == 1)
    {
		alert ('Valor em espécie não disponível no cofre');
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
	
    if (campo == 'qcaixa')
        return 'Quebra de Caixa';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}

function adjust(element) {

	return element.value.replace ('.', ',');

}




// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form)
{
	var valor;
	valor = form.cbch.value;
	

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strValor].focus ()');
				
	}else{
	
	form.banco.value = valor.substring (1,4);
	form.agencia.value = valor.substring (4,8);
	form.conta.value = valor.substring (23,32);
	form.numch.value = valor.substring (13,19);

	form.cbch.disabled=true;
	
	}

	}
 
}




</script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):

		// CALCULA O SALDO ATUAL EM DINHEIRO
		$prod->listProdSum("(SUM(credito)-SUM(debito))", "fin_cofre", "codemp = $codempselect and opcaixa like '02.00'" , $array12, $array_campo12, "" );
		$prod->mostraProd( $array12, $array_campo12, 0 );
		$saldoatualesp_cofre = $prod->showcampo0();

		// CALCULA O SALDO ATUAL EM DINHEIRO
		$prod->listProdSum("(SUM(credito)-SUM(debito))", "fin_cofre_temp", "codcofregrupo=$codcofregruposelect and opcaixa like '02.00'" , $array12, $array_campo12, "" );
		$prod->mostraProd( $array12, $array_campo12, 0 );
		$saldoatualesp_select = $prod->showcampo0();
		$saldoatualesp_select = -1*$saldoatualesp_select;

		#echo("s1=$saldoatualesp_cofre - s2= $saldoatualesp_select");
			

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codcofre, opcaixa, descricao, credito, debito, codch", "fin_cofre_temp", "codcofregrupo=$codcofregruposelect", $array79, $array_campo79, "" );
	
	if ($saida==1){$subtitulo = "SAÍDA DO";}else{$subtitulo = "ENTRADA NO";}


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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$subtitulo $titulo</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'><img border='0' src='images/bt-continuaped.gif' ><br>
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


	<center>
<div align='center'>
			

<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        I</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LANÇAMENTOS DO COFRE</font></b></td>
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
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CRÉDITO<br>(R$)</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DÉBITO<br>(R$)</font></b></div>
    </td>
	  <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DADOS<br>CHEQUE</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
	
    
  </tr>
	");
	 $prod->clear();
	 for($i = 0; $i < count($array79); $i++ ){
			
			$prod->mostraProd( $array79, $array_campo79, $i );

			// DADOS //
			$codcofre = $prod->showcampo0();
			$opcaixa = $prod->showcampo1();
			$descricao = $prod->showcampo2();
			$credito = $prod->showcampo3();
			$debito = $prod->showcampo4();
			$codch = $prod->showcampo5();

			$prod->clear();
			$prod->listProd("fin_cheques", "codch='$codch'");
				
				$bco = $prod->showcampo3();
				$ag = $prod->showcampo4();
				$cc = $prod->showcampo5();
				$numcheq = $prod->showcampo6();
				
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='#D6E7EF'> 
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$descricao</font></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$credito</font></td>
	<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$debito</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>BANCO:</b> $bco<br><b>AGÊNCIA:</b> $ag<br><b>C.C.:</b> $cc<br><b>NUMCH.:</B> $numcheq</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=dellanccofre&codcofreselect=$codcofre&codcofregruposelect=$codcofregruposelect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist#contapg&saida=$saida'>Excluir</a></B></font></font></td>
		");

		$subcredito = $subcredito + $credito;
		$subdebito = $subdebito + $debito;
		$subcreditof = number_format($subcredito,2,',','.'); 
		$subdebitof = number_format($subdebito,2,',','.'); 
	 }
		

		$total = $subcredito - $subdebito + $saldoiniperiodo;
		$totalf = number_format($total,2,',','.');

	if ($saida == 1){$titulosec = "COFRE";$localch="CO";}else{$titulosec = "CAIXA";$localch="CX";}

	 echo("
	<tr bgColor='#d6b778'>
		<td width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
		<td align='middle' width='20%' height='0' bgcolor='#F3F3F3'><p align='center'><b>
		<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
		TOTAL<br>MOVIMENTAÇÃO</font></b></td>
		<td width='15%' height='0' bgcolor='#F3F3F3'><b>R$ $totalf</b></td>
		<td align='middle' width='15%' height='0' bgcolor='#F3F3F3'></td>
		<td width='20%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
		<td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
</tr>
				</table>
<br>

	<form method='POST' name ='Form89' action='$PHP_SELF?Action=insert' onSubmit = 'if (verificaObrig(Form89, $saldoatualesp_cofre, $saldoatualesp_select, $saida)==false) return false'>

	<CENTER><input class='sbttn' type='submit' name='OK' value='EFETUAR OPERAÇÃO'></CENTER>
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codcofregruposelect' value='$codcofregruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
						<input type='hidden' name='saida' value='$saida'>	
		
		<input type='hidden' name='valortpg' value='$valortotal'>	
		<input type='hidden' name='valortf' value='$valortotalfpg'>	
							 </form>

			
<br><bR>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tr>
    <td><hr size='1'></td>
  </tr>
</table>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        II</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPOS DE MOVIMENTAÇÃO NO COFRE</font></b></td>
    </tr>
  </tbody>
</table>
<br>	
<div align='center'>
  <center>
  <form method='POST' name ='Form1' action='$PHP_SELF?Action=update#formapg'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber1'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO<br>
      </font><font face='Verdana' color='#800000' size='3'>CHEQUES NO $titulosec</font></b></td>
      <td width='286' height='111'>
      <div align='right'>
<table border='0' width='231' cellspacing='0' cellpadding='3' style='border-collapse: collapse' bordercolor='#111111' height='1'>
      <tr bgcolor='$bgcortopo'>
		<td width='57' align='center' height='12' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'><b>BCO</b></font></td>
        <td width='58' align='center' height='12' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'><b>AG</b></font></td>
		<td width='58' align='right' height='12' bgcolor='#FFFFFF'>
        <p align='center'>
        <font size='1' face='Verdana'><b>CONTA</b></font></td>
		<td width='58' align='center' height='12' bgcolor='#FFFFFF'>
        <font size='1' face='Verdana'><b>NO.CHQ</b></font></td>
		<td width='58' align='center' height='12' bgcolor='#FFFFFF'>
        &nbsp;</td>
      </tr>
      <tr bgcolor='$bgcorlinha'>
        <td width='57' height='1' bgcolor='#FFFFFF' ><input type='text' name='banco'  size='3' maxlength='3'></td>
        <td width='58' height='1' bgcolor='#FFFFFF' ><input type='text' name='agencia'  size='4' maxlength='4'></td>
        <td width='58' height='1' align='right' bgcolor='#FFFFFF' ><input type='text' name='conta'  size='6' maxlength='10'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' ><input type='text' name='numch'  size='6' maxlength='6'></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1' class='sbttn'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
	      <td width='450' colspan='5' height='22' bgcolor='#FFFFFF'><input type='text' name='cbch' size='30' onChange='CopiaCodBarraCheque(this.form);'></td>
    </tr>
</table>



      </div>
      </td>
    </tr>
  </table>
  </center>
</div>

		  		 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codcofregruposelect' value='$codcofregruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				   <input type='hidden' name='opcaixa' value='02.01'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
				<input type='hidden' name='saida' value='$saida'>	
  </form>
  </center>
</div>
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
				$prod->listProdSum("codch, bco, ag, cc, numcheq, valor, posfin", "fin_cheques", $condicao3, $array, $array_campo, " limit $desloc,$acrescimo " );

			
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


	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	
<tr bgcolor='$bgcorlinha'> 
		<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>R$ $valortf</B></font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
	</tr>
	<tr> 
		<td width='100%' height='0' colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>&nbsp;</font></td>
	</tr>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO.</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>AG.</font></b></div>
    </td>
	  <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>C.C.</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NUMCH.</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 $prod->clear();
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codch = $prod->showcampo0();
			$bco = $prod->showcampo1();
			$ag = $prod->showcampo2();
			$cc = $prod->showcampo3();
			$numcheq = $prod->showcampo4();
			$valorp = $prod->showcampo5();
			
			
				
			// FORMATACAO //
			$valorpf = number_format($valorp,2,',','.'); 
						
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
		<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$bco</font></td>
	<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$ag</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$cc</font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$numcheq</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valorpf</B></font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=inscofre&codch=$codch&codcofregruposelect=$codcofregruposelect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&insch=1&saida=$saida'>Adicionar</a></B></font></font></td>
	</tr>
		");

	

	 }

echo("

				</table>
			
");

if ($Action == "update" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "opcaixaselect=$opcaixaselect&codcofregruposelect=$codcofregruposelect&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&saida=$saida";   
include("numcontg.php");
}


		echo("


<p>&nbsp;</p>
<div align='center'>
  <center>
  <form method='POST' name ='Form3' action='$PHP_SELF?Action=inscofre'>
<div align='center'>
  <center>
  <table border='0' cellpadding='15' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber3'>
    <tr>
      <td width='204' height='111'><b>
      <font face=' Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO<br>
      </font><font face='Verdana' color='#800000' size='3'>DINHEIRO</font></b></td>
      <td width='286' height='111'>
      <div align='right'>
<table border='0' width='231' cellspacing='0' cellpadding='3' style='border-collapse: collapse' bordercolor='#111111' height='1'>
      <tr bgcolor='#F3F3F3'>
        <td width='231' height='1' bgcolor='#FFFFFF' >
        <font face='Verdana' size='1'><b>VALOR:&nbsp; R$
        <input type='text' name='valorfpg' size='9' onKeyUp='this.value = adjust(this);'>
        </b></font></td>
	    <td width='58' height='1' bgcolor='#FFFFFF' >
        <input type='submit' value='OK' name='B1'></td>
			  </tr>

    </table>



      </div>
      </td>
    </tr>
  </table>
  </center>
</div>

		  		 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codcofregruposelect' value='$codcofregruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
					 <input type='hidden' name='opcaixa' value='02.00'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
				<input type='hidden' name='saida' value='$saida'>	
  </form>
  </center>
</div>






			
						
	");	
		

	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "list"):

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
      <td width='30%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933'  >$titulo</font></font></b><br>
<font color='#336699' face=' Verdana, Arial, Helvetica, sans-serif' size='2'>$subtitulo</font></td>
      <td width='50%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA DATA:</b><br>
		DE: <input type='text' name='dde' size='2' maxlength='2'>/ <input type='text' name='mde' size='2' maxlength='2'>/ <input type='text' name='ade' size='4' maxlength='4'><br> ATE: <input type='text' name='date' size='2' maxlength='2'>/ <input type='text' name='mate' size='2' maxlength='2'>/ <input type='text' name='aate' size='4' maxlength='4'> 
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcontaselect' value='$codcontaselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>

	  </p>
	   </td>
		   <td width='20%' bgcolor='#FFFFFF'>
          </font></td>
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

	echo("		
		<option value='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
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
*/

//<!-- ESCOLHA DE EMPRESAS - FIM --> 

 
 
if ($codempselect<>""){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	

echo("
<br>
<form method='POST' action='$PHP_SELF?Action=consolida' name='Form1' >	

<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 

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
			 <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=update&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=$desloc'>ENTRADA COFRE</a></b></font></td>
			 <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=update&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=$desloc&saida=1'>SAÍDA COFRE</a></b></font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='20%'><b><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='25%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></td>
        </tr>
          <tr>
			 <td width='5%'><img border='0' src='images/print.gif'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'> <a href='$PHP_SELF?Action=update&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&&retlogin=$retlogin&connectok=$connectok&pg=$pglistchq&desloc=$desloc'>CHEQUES
              CAIXA</a></font></td>
			 <td width='5%'><img border='0' src='images/print.gif'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><a href='$PHP_SELF?Action=update&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&&retlogin=$retlogin&connectok=$connectok&pg=$pglistchq&desloc=$desloc&saida=1'>CHEQUES
              COFRE</a></font></td>
            <td width='5%'>
             </td>
            <td width='20%'></td>
          <td width='25%'>
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
  </table>
  </center>
</div>


<div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
      <tr>
     <td width='544' bgcolor='#000000' valign='top' colspan ='3'></td>
    </tr>
    <center>
      <tr>
      <td width='269' bgcolor='#F3F3F3' valign='top' rowspan='3'><font face='Verdana'><b>
      <font size='1'><font color='#800000'>EMPRESA:</font><br>
        </b>$nomeempold</font></font></td>
    <td width='270' bgcolor='#F3F3F3' valign='top' colspan='2'>
      <p align='right'><font size='2' face='Verdana'><font color='#800000'><b>
      SALDO ATUAL</b></font></font></td>
      </tr>
      <tr>
    <td width='193' bgcolor='#F3F3F3' valign='top' align='right'>
      <b><font size='2' face='Verdana'>R$ $saldoatualchf</font></b></td>
    <td width='72' bgcolor='#F3F3F3' valign='top' align='center'>
      <font size='1' face='Verdana'>CHEQUES</font></td>
      </tr>
      <tr>
    <td width='193' bgcolor='#F3F3F3' valign='top' align='right'>
      <font size='2' face='Verdana'><b>R$ $saldoatualespf</b></font></td>
    <td width='72' bgcolor='#F3F3F3' valign='top' align='center'>
      <font size='1' face='Verdana'>ESPÉCIE</font></td>
      </tr>
    <tr>
      <td width='269' bgcolor='#F3F3F3' valign='top'>
      <p align='left'>&nbsp;</td>
    </center>
    <td width='270' bgcolor='#F3F3F3' valign='top' colspan='2'>
      <p align='right'><font face='Verdana'>
      <font size='1'><font color='#800000'>DATA ATUAL:<br>
          </font>$dataatualf</font></font></td>
    </tr>
  <tr>
     <td width='544' bgcolor='#000000' valign='top' colspan ='3'></td>
    </tr>
    </table>
  </div>

<br>
<div align='center'>
  <center>
  <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='550' id='AutoNumber1'>
    <tr>
      <td width='100%'>
      <p align='right'><b><font face='Verdana' size='1'>DE</font></b><font size='1' face='Verdana'><b>
      </b>$datainicialf <b>ATÉ </b>$datafinalf</font></td>
    </tr>
  </table>
  </center>
</div>


	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr>
    <td width='15%' height='0' bgcolor='#F3F3F3'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
    $datainicialf</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
    <td width='20%' height='0' bgcolor='#F3F3F3'>
    <p align='center'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
    SALDO<br> ANTERIOR</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'><b>
    <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$ $saldoiniperiodof</font></b></td>
    <td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
      <td align='middle' width='25%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
  </tr>

	<tr bgcolor='#D6B778'> 
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA MOV.</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CRÉDITO<BR>(R$)</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DÉBITO<BR>(R$)</font></b></div>
    </td>
	<td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DADOS<br> CHEQUE</font></b></div>
    </td>
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
		$prod->mostraProd( $array, $array_campo, $i );

		$codcofre = $prod->showcampo0();
		$codcxlanc = $prod->showcampo1();
		$codcxopera = $prod->showcampo2();
		$opcaixa = $prod->showcampo3();
		$descricao = $prod->showcampo4();
		$datamov = $prod->showcampo5();
		$dataini = $prod->showcampo6();
		$credito = $prod->showcampo7();
		$debito = $prod->showcampo8();
		$codped = $prod->showcampo9();
		$codch = $prod->showcampo10();

		$prod->clear();
		$prod->listProd("fin_cheques", "codch='$codch'");

			$bco = $prod->showcampo3();
			$ag = $prod->showcampo4();
			$cc = $prod->showcampo5();
			$numch = $prod->showcampo6();

		
		$prod->clear();
		$prod->listProdU("codbarra", "pedido", "codped=$codped");
		$codbarra = $prod->showcampo0();

		
		
		// FORMATACAO
		$datamovf = $prod->fdata($datamov);
		$datainif = $prod->fdata($dataini);
		$creditof = number_format($credito,2,',','.'); 
		$debitof = number_format($debito,2,',','.'); 


		#if ($saldofin == 0){$status ="ABERTO";}else{$status="FECHADO";}			

		$bgcorlinha="#F2E4C4";
		#if ($status == "ABERTO"){$bgcorlinha="#FFCC66";}
		#if ($status == "FECHADO"){$bgcorlinha="#E1AFAA";}

		

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'>$datamovf</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$opcaixa</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'	
size='1'><b>$descricao</b><bR>$codbarra</font></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$creditof</font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$debitof</font></td>
		
	<td width='25%' height='0' ><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color ='#000000'><b>BANCO:</b> $bco<br><b>AGÊNCIA:</b> $ag<br><b>C.C.:</b> $cc<br><b>NUMCH.:</B> $numch</font></b></td>


	</tr>
		
		");
		$subcredito = $subcredito + $credito;
		$subdebito = $subdebito + $debito;
		$subcreditof = number_format($subcredito,2,',','.'); 
		$subdebitof = number_format($subdebito,2,',','.'); 
	 }
		

		$total = $subcredito - $subdebito + $saldoiniperiodo;
		$totalf = number_format($total,2,',','.'); 

		echo("
		<tr bgColor='#ffffff'>
			<td width='15%' height='0'>&nbsp;</td>
			<td align='middle' width='10%' height='0'>&nbsp;</td>
			<td width='20%' height='0'>
			<p align='center'><b>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
			SALDO MOVIMENTAÇÃO</font></b></td>
			<td align='middle' width='10%' height='0'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $subcreditof</b></font></td>
			<td align='middle' width='10%' height='0'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $subdebitof</b></font></td>
			
			<td align='middle' width='25%' height='0'>&nbsp;</td>
		</tr>
		<tr bgColor='#d6b778'>
			<td width='15%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			<td width='20%' height='0' bgcolor='#F3F3F3'>
			<p align='center'><b>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
			SALDO NO PERIODO</font></b></td>
			<td align='middle' width='10%' height='0' bgcolor='#F3F3F3'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>R$ $totalf</b></font></td>
			<td width='10%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
			
			<td align='middle' width='25%' height='0' bgcolor='#F3F3F3'>&nbsp;</td>
  </tr>

		

				</table>
					
		");







echo("	


		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcontaselect' value='$codcontaselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='datainicc' value='$datainiconta'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>
		<input type='hidden' name='hist' value='$hist'>
		</form>
			
		");
}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;


/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
