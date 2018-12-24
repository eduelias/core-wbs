

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
$titulo = "CENTRO DE CUSTOS REVENDA";
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

		$dataatual = $prod->gdata();

		
			
	

			$Actionsec = "list";
			

	
        break;

		

    case "update":

		

				
		 break;

	case "inscentrocusto":

		
			
			$codcap = $prod->showcampo0();
			

			$valornew = str_replace('.','',$valornew);
			$valornew = str_replace(',','.',$valornew);

			
			$prod->listProdU("opcaixa, ROUND(valordevido,2), datavenc, codemp","fin_cap", "codcap='$codcapselect'");
			$opcaixa = $prod->showcampo0();
			$valortotal = $prod->showcampo1();
			$datavenc = $prod->showcampo2();
			$codempselect = $prod->showcampo3();


			// PAU NO MYSQL
			#$prod->clear();
			#$prod->listProdU("SUM(valor)","", "codcap='$codcapselect'");
			#$soma = $prod->showcampo0();

			$prod->listProdSum("ROUND(valor,2)", "projeto_relacao_custo","codcap='$codcapselect'", $array45, $array_campo45, "" );
				$soma_pt = 0;
				for($uy = 0; $uy < count($array45); $uy++ ){
					$prod->mostraProd( $array45, $array_campo45, $uy );
					$soma_p = $prod->showcampo0();
					$soma_pt = $soma_pt + $soma_p;
				}
			
			$soma = $soma_pt;

			#echo("s=$soma");

			if (($soma+$valornew) <= ($valortotal+0.05)){
						
			
									
			for($i = 0; $i < $periodoselect; $i++ ){

			$valornewt = $valornew/$periodoselect;

			if ($projselect <> 0 ){
			
				//INSERE FORMA PG PARA AS CAP
				$prod->clear();
			
				$prod->setcampo1($projselect);
				$prod->setcampo2($subprojselect);
				$prod->setcampo3($codcapselect);
				$prod->setcampo4($codempselect);
				$prod->setcampo5($opcaixa);
				$prod->setcampo6($valornewt);
				$prod->setcampo7($valortotal);
				$prod->setcampo8($datavenc);
				#$prod->setcampo8($codvend);
				$prod->setcampo10($acc.$mcc.'25');
				
				$prod->addProd("projeto_relacao_custo", $uregf);

				$mcc = $mcc + 1;
				if ($mcc == 13){$mcc = 1;$acc = $acc +1;}
				if (strlen($mcc)==1){$mcc = '0'.$mcc;}

			}

			}

			}else{

				$erro = "Valor total dos centros de custos é maior que o valor da conta a pagar!";

			}



		$Action="update";
				
		 break;

	 case "inscentrocusto_pessoal":

		$prod->listProdSum("codvend, codproj ","vendedor", "block <>'Y' and tipo = 'R' ", $array, $array_campo , "order by nome");
		for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$cv = $prod->showcampo0();	
			$projselect = $prod->showcampo1();

			if ($valornew[$cv] <> ""){
			
				$valornew[$cv] = str_replace('.','',$valornew[$cv]);
				$valornew[$cv] = str_replace(',','.',$valornew[$cv]);

				
				$prod->listProdU("opcaixa, ROUND(valordevido,2), datavenc, codemp","fin_cap", "codcap='$codcapselect'");
				$opcaixa = $prod->showcampo0();
				$valortotal = $prod->showcampo1();
				$datavenc = $prod->showcampo2();
				$codempselect = $prod->showcampo3();


				$prod->listProdSum("ROUND(valor,2)", "projeto_relacao_custo","codcap='$codcapselect'", $array45, $array_campo45, "" );
				$soma_pt = 0;
				for($uy = 0; $uy < count($array45); $uy++ ){
					$prod->mostraProd( $array45, $array_campo45, $uy );
					$soma_p = $prod->showcampo0();
					$soma_pt = $soma_pt + $soma_p;
				}
			
				$soma = $soma_pt;

				echo("s=$soma");

				if (($soma+$valornew[$cv]) <= ($valortotal+0.05)){
							
				for($j = 0; $j < $periodoselect; $j++ ){

					$valornewt = $valornew[$cv]/$periodoselect;

					echo("$valornewt<br>");

					if ($projselect <> 0 ){
					
					//INSERE FORMA PG PARA AS CAP
					$prod->clear();
				
					$prod->setcampo1($projselect);
					$prod->setcampo2($subprojselect);
					$prod->setcampo3($codcapselect);
					$prod->setcampo4($codempselect);
					$prod->setcampo5($opcaixa);
					$prod->setcampo6($valornewt);
					$prod->setcampo7($valortotal);
					$prod->setcampo8($datavenc);
					$prod->setcampo9($cv);
					$prod->setcampo10($acc_u.$mcc_u.'25');
					
					$prod->addProd("projeto_relacao_custo", $uregf);

					if ($periodoselect > 1){
						$mcc_u = $mcc_u + 1;
						if ($mcc_u == 13){$mcc_u = 1;$acc_u = $acc_u +1;}
						if (strlen($mcc_u)==1){$mcc_u = '0'.$mcc_u;}
					}

					}

				}

				}else{

					$erro = "Valor total dos centros de custos é maior que o valor da conta a pagar!";

				}

			}

		}//FOR



		$Action="update";
				
		 break;

		 case "insformapgch":

				

		$Action="update";
				
		 break;

	case "inscontapg":

		
			//INSERE NO CAP
			$prod->clear();
			$regnum = $prod->listProd("fin_cap_temp", "codcap=$codcap");
			if ($regnum == 0){ 
			$prod->listProd("fin_cap", "codcap=$codcap");
			$prod->setcampo17($codfgruposelect);
			$prod->addProd("fin_cap_temp", $uregcap);
			}

		$Actionsec="list";
				
		 break;
	
	case "delcontapg":

			//INSERE NO CAP
			$prod->delProd("fin_cap_temp", "codcap=$codcap");
			
		$Actionsec="list";
				
		 break;

	case "delcap":

			//INSERE NO CAP
			$prod->delProd("fin_cap", "codcap=$codcap");
				//DELETE CENTRO DE CUSTOS
			$prod->delProd("projeto_relacao_custo", "codcap=$codcap");
			
		$Actionsec="list";
				
		 break;

	case "delcentrocusto":

			//INSERE NO CAP
			$prod->delProd("projeto_relacao_custo", "codcusto=$codcustoselect");
			
		$Action="update";
				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "newreg":

		 if($retorno){

		 $dataatual = $prod->gdata();

			// ADAPTACAO DE VALORES
			$valornew = str_replace('.','',$valornew);
			$valornew = str_replace(',','.',$valornew);
			$valorp = $valornew;
			$opcaixa = $opcaixanew;
			$datavenc = $avenc.$mvenc.$dvenc;


		

							
			$prod->listProd("formapg", "opcaixa='$opcaixa'");
			$descricao = $prod->showcampo1();
			$bco = $prod->showcampo3();
			$pbco = $prod->showcampo4();
			$caixa = $prod->showcampo5();
			$car = $prod->showcampo6();
			$cap = $prod->showcampo7();
			$cofre = $prod->showcampo8();
			$inschtab = $prod->showcampo9();
			$tipoparc = $prod->showcampo11();
			$pnumdoc = $prod->showcampo12();

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG

		
		if ($flag_up <> 1){

			
			if ($cap) {

				
					//INSERE NO CAP
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($numdocnew);
					$prod->setcampo2($opcaixa);
					$prod->setcampo4($codfornew);
					$prod->setcampo5($descricao);
					$prod->setcampo6($datavenc);
					$prod->setcampo7($nfnew);
					$prod->setcampo13("N");  // HISTORICO
					$prod->setcampo14($codocnew);  
					$prod->setcampo8($valorp);
					$prod->setcampo16($codempselect);
					$prod->setcampo18($obs);
				
					$prod->addProd("fin_cap", $uregcap);
			
					
				}
			
		$codcapselect = $uregcap;

		}else{


				//INSERE FORMA PG PARA AS CAP
			$prod->clear();
			$prod->listProd("fin_cap", "codcap=$codcapselect");

			$prod->setcampo1($numdocnew);
			$prod->setcampo2($opcaixa);
			$prod->setcampo4($codfornew);
			$prod->setcampo5($descricao);
			$prod->setcampo6($datavenc);
			$prod->setcampo7($nfnew);
			$prod->setcampo13("N");  // HISTORICO
			$prod->setcampo14($codocnew);  
			$prod->setcampo8($valorp);
			$prod->setcampo16($codempselect);
			$prod->setcampo18($obs);


			$prod->upProd("fin_cap", "codcap=$codcapselect");

		}

		

		$Action="update";
				
				
		 }
	    break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	

		

		if ($codempselect <> ""):


			if ($ade == "" and $mde == "" and $dde == "" and $aate == "" and $mate == "" and $date == ""){
									
				#$condicao3 .= "TO_DAYS(NOW()) - TO_DAYS(datavenc) <= 5 and ";
							
			}else{
				
				$datainicial = $ade."-".$mde."-".$dde." 00:00:00";
				$datafinal = $aate."-".$mate."-".$date." 23:59:59"; 
				$condicao3 .= "(datavenc >= '$datainicial' and datavenc <= '$datafinal') and ";
					
			}
				
			if ($opcaixaselect){

				$condicao3 .= "opcaixa = '$opcaixaselect' and ";				

			}
			if ($codforselect){
				
				$condicao3 .= "codfor='$codforselect' and ";
			}
				
				
			$condicao3 .= "codemp='$codempselect' and ";
			$condicao3 .= "(opcaixa like '830.01' or opcaixa like '600.%') and ";
			if ($hist == "S"){
				$condicao3 .= "hist = 'S'";
			}else{
				$condicao3 .= "hist = 'N'";
			}
					
			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_cap", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros, obs", "fin_cap", $condicao3, $array, $array_campo, $parm );

		

			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg /$acrescimo);  
			  $pagina = 1;
			endif; 


		endif;
	
		
		$Action="list";
		

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "CAP - CONTAS A PAGAR";

include("sif-topo.php");

echo("
<script language='JavaScript'>


//***************************************************************************************
//  Função para verificação de campos obrigatórios e consistência
//  Retorno:  false = erro de consistência
//            true  = ok
//***************************************************************************************

function verificaObrig (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	
	if ((form.projselect.value == '-5') )
	{
			alert ('Escolha do Projeto : obrigatório');
			return false;
	}
	
	if ((form.valornew.value == '') )
	{
			alert ('Valor : preenchimento obrigatório');
			return false;
	}
		
	if ((form.mcc.value == '')  || (form.acc.value == ''))
	{
			alert ('Data de Competência : preenchimento obrigatório');
			return false;
	}

	


	return true;
      	
}



function verificaObrig1 (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	
		
	if ((form.mcc_u.value == '')  || (form.acc_u.value == ''))
	{
			alert ('Data de Competência : preenchimento obrigatório');
			return false;
	}



	return true;
      	
}


function verificaObrigInsert (form, erro)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente


	if ((erro == '1') )
	{
			alert ('OPRERACAO DE CAIXA : incorreta');
			return false;
	}
	
	if ((form.opcaixanew.value == '') )
	{
			alert ('OPERACAO DE CAIXA  : preenchimento obrigatório');
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
	
   	if (campo == 'valornew')
        return 'Valor';
	if (campo == 'codfor')
        return 'Cod. Fornecedor';
	if (campo == 'codoc')
        return 'Cod. OC';
	if (campo == 'juros')
        return 'Juros';
	if (campo == 'valorrec')
        return 'Valor Recebido';
	if (campo == 'opcaixanew')
        return 'OP CAIXA';
	if (campo == 'dvenc')
        return 'Dia Vencimento';
	if (campo == 'mvenc')
        return 'Mes Vencimento';
	if (campo == 'avenc')
        return 'Ano Vencimento';
	if (campo == 'nfnew')
        return 'Nota Fiscal';

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


		#$codformagruposelect = 1;

		// LISTA OS REGISTROS DOS PAGAMENTOS SELECIONADOS
		$prod->listProdSum("datavenc, numdoc, opcaixa, codfor, valordevido, hist, descricao, nf, codcap, codoc , datapg, valorpago, juros", "fin_cap", "codcap='$codcapselect'", $array78, $array_campo78, "" );

		#echo("$ccap = $codcapselect");

		// LISTA OS REGISTROS DAS FORMAS DE PAGAMENTOS
		$prod->listProdSum("codcusto, codproj, codsubproj, datavenc, valor, valortotal, datacc, codvend", "projeto_relacao_custo", "codcap='$codcapselect'", $array79, $array_campo79, "order by datacc" );
	
	

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><img border='0' src='images/bt-continuaped.gif' ><br>
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

	$valortotal = $valordevido;

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
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RATEIOS DOS CENTRO DE CUSTOS</font></b></td>
    </tr>
  </tbody>
</table>
	<br>	
  </center>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
     <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA<br>COMPET.</font></b></div>
    </td>
     <td width='30%' height='0'> 
      <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PROJETO<BR>CENTRO CUSTO</font></b>
    </td>
    <td width='15%' height='0'> 
      <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>USUÁRIO</font></b>
    </td>
    <td width='18%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='12%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>% TOTAL</font></b></div>
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
			$codcusto = $prod->showcampo0();
			$codproj = $prod->showcampo1();
			$codsubproj = $prod->showcampo2();
			$datavenc = $prod->showcampo3();
			$valor = $prod->showcampo4();
			$valortotal = $prod->showcampo5();
			$datacc = $prod->showcampo6();
			$codvend_cc = $prod->showcampo7();
			
			$prod->clear();
			$prod->listProdU("nomeproj", "projeto_nome", "codproj=$codproj");
			$nomeproj = $prod->showcampo0();
			
			$prod->clear();	
			$prod->listProdU("nomesubproj", "projeto_subnome", "codsubproj=$codsubproj");
			$nomesubproj = $prod->showcampo0();

			$prod->clear();	
			$prod->listProdU("nome", "vendedor", "codvend=$codvend_cc");
			$nomevend_cc = $prod->showcampo0();
		
			$perc = ($valor/$valortotal)*100;

			// FORMATACAO //
			$valorf = number_format($valor,2,',','.'); 
			$percf = number_format($perc,2,',','.'); 
			$dataccf = $prod->fdata($datacc);
				
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
<tr bgcolor='#D6E7EF'> 
		<td width='15%' height='0' align='center' rowspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$dataccf</font></td>
		<td width='30%' height='0' align='center'>
          <p align='left'><b><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF6600'>$nomeproj</font></b></td>
			<td width='15%' height='0' rowspan='2'>
              <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomevend_cc</font></td>
			<td width='18%' height='0' rowspan='2'>
              <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$valorf</font></p>
        </td>
	<td width='12%' height='0' rowspan='2'>
      <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$percf %</font></p>
        </td>
			<td width='10%' height='0' align='center' rowspan='2'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=delcentrocusto&codcustoselect=$codcusto&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codcapselect=$codcapselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#contapg'>Excluir</a></B></font></td>
</tr>




  	<tr bgcolor='#D6E7EF'> 
		<td width='30%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#000000'>$nomesubproj</font></td>
</tr>


		");

	$valortotalcusto = $valortotalcusto + $valor;


	 }

	$perct = ($valortotalcusto/$valortotal)*100;
	$perctf = number_format($perct,2,',','.'); 

	$valortotalcustof = number_format($valortotalcusto,2,',','.');

	 echo("

 <tr bgcolor='#F3F3F3'> 
		<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
		<td width='30%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b>TOTAL</font></b></font></td>
			<td width='15%' height='0' align='center'></td>
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>R$ $valortotalcustof</B></font></td>
			<td width='12%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$perctf %</B></font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
				</table>

<br>

	<form method='POST' name ='Form89' action='$PHP_SELF?Action=insert&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate' onSubmit = 'if (verificaObrig(Form89)==false) return false'>

	<CENTER><input class='sbttn' type='submit' name='OK' value='FINALIZAR'></CENTER>
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
				  <input type='hidden' name='codcxselect' value='$codcxselect'>
	              <input type='hidden' name='codfgruposelect' value='$codfgruposelect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
		  <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
		
		<input type='hidden' name='valortpg' value='$valortotal'>	
		<input type='hidden' name='valortcusto' value='$valortotalcusto'>	
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
        III</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ADICIONAR NOVOS RATEIOS DO CENTRO DE CUSTO</font></b></td>
    </tr>
  </tbody>
</table>
<br>	
<div align='center'>
  <center>
  <form method='POST' name ='Form9' action='$PHP_SELF?Action=inscentrocusto&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#formapg' onSubmit = 'if (verificaObrig(this)==false) return false'>
<div align='center'>
  <center>
  <table border='0' cellpadding='1' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' 
 <tr>
                                  <td vAlign='middle' width='228' bgColor='#f0f0f0' align='center'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>CENTRO
                                    DE CUSTO</b></font></p>
                                  </td>
                                  <td vAlign='middle' align='center' width='266' bgColor='#f0f0f0'>
                                    <p align='left'>
									 <select size='1' class=drpdwn name='projselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'> 
                            ");

	$prod->listProdgeral("projeto_nome", "", $array, $array_campo , "order by nomeproj");
	for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$nomeproj = $prod->showcampo1();
			$nomeproj = strtoupper($nomeproj);
			$codproj= $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=update&codprojselect=$codproj&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codcapselect=$codcapselect'>$nomeproj</option>
		");
	
	}
echo("	
                                       <option value='-5' selected>ESCOLHA</option>
");

if ($codprojselect <> ""){
	$prod->listProdU("nomeproj", "projeto_nome", "codproj='$codprojselect'");
	$nomeprojselect = $prod->showcampo0();
	$nomeprojselect = strtoupper($nomeprojselect);

echo("
									 <option value='$codprojselect' selected>$nomeprojselect</option>
");
}
echo("										
                                    </select></p>
                                  </td>
                                  <td vAlign='middle' align='center' width='38' bgColor='#f0f0f0' rowspan='5'><input type='submit' value='OK' name='B1'></td>
                                </tr>
 <tr>
                                  <td vAlign='middle' width='228' bgColor='#f0f0f0' align='center'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>SUB
                                    CENTRO DE CUSTO</b></font>
                                  </td>
                                  <td vAlign='middle' align='center' width='266' bgColor='#f0f0f0'>
                                    <p align='left'>
								   <select size='1' class=drpdwn name='subprojselect' >
                                    ");
	
	$prod->listProdgeral("projeto_subnome", "codproj = '$codprojselect'", $array6, $array_campo6 , "order by nomesubproj");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomesubprojselect = $prod->showcampo1();
			$nomesubprojselect = strtoupper($nomesubprojselect);
			$codsubprojselect = $prod->showcampo0();

	echo("		
		<option value='$codsubprojselect'>$nomesubprojselect</option>
		");
	
	}
	echo("
                                    </select></td>
                                </tr>
 <tr>
                                  <td vAlign='middle' width='228' bgColor='#f0f0f0' align='center'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>VALOR</b></font>
                                  </td>
                                  <td vAlign='middle' align='center' width='266' bgColor='#f0f0f0'>
                                    <p align='left'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                R$ <input type='text' name='valornew' size='12' onChange='consisteValor(this.form, this.form.valornew.name, true)'>
			                          
                              </font>
								 </td>
                                </tr>
								   <tr>
            <td width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>DATA DE
              COMPETÊNCIA</b></font></td>
            <td  width='266' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><input  size='2' name='mcc' maxlength='2'>/<input size='4' name='acc' maxlength='4'></font></td>
          </tr>
								   <tr>
                                  <td vAlign='middle' width='228' bgColor='#f0f0f0' align='center'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>PERIODO:</b></font>
                                  </td>
                                  <td vAlign='middle' align='center' width='266' bgColor='#f0f0f0'>
                                    <p align='left'>
								   <select size='1' class=drpdwn name='periodoselect' >
                                    ");
	
	for($j = 1; $j <= 12; $j++ ){
			
			
	echo("		
		<option value='$j'>$j</option>
		");
	
	}
	echo("
	<option value='1' selected>1</option>
                                    </select></td>
                                </tr>





  </table>
  </center>
</div>

		  		 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='0'>
				  <input type='hidden' name='codprojselect' value='$codprojselect'>
				  <input type='hidden' name='codcapselect' value='$codcapselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	
					   <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
  </form>

");
if($erro){
echo("
					 <table border='0' width='100%' cellspacing='1'>
  <tr>
    <td width='100%'>
      <p align='center'><img border='0' src='images/erro.gif' width='35' height='33'><font face='Verdana' size='1' color='#FF0000'><b><br>
      $erro</b></font></td>
  </tr>
</table>
");
}
echo("
  </center>
</div>

<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td>
        <hr SIZE='1'>
      </td>
    </tr>
  </tbody>
</table>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        IV</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'> -
        ADICIONAR NOVOS RATEIOS DO CENTRO DE CUSTO POR USUÁRIO</font></b></td>
    </tr>
  </tbody>
</table>
<br>
<div align='center'>
  <center>
  <form method='POST' name ='Form10' action='$PHP_SELF?Action=inscentrocusto_pessoal&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#formapg' onSubmit = 'if (verificaObrig1(this)==false) return false'>
    <div align='center'>
      <center>
      <table border='0' width='550' cellspacing='1'>
        <tr>
          <td width='268' bgcolor='#C0C0C0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>USUÁRIO</b></font></td>
          <td width='110' bgcolor='#C0C0C0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>VALOR</b></font></td>
      </center>
  </center>
          <td width='152' bgcolor='#C0C0C0'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><input maxLength='2' size='2' name='mcc_u'>/<input maxLength='4' size='4' name='acc_u'></font>
 <select size='1' class=drpdwn name='periodoselect' >
                                    ");
	
	for($j = 1; $j <= 12; $j++ ){
			
			
	echo("		
		<option value='$j'>$j</option>
		");
	
	}
	echo("
	<option value='1' selected>1</option>
                                    </select>	  
  <input type='submit' value='OK' name='B1'>
      </td>
        </tr>
  <center>
      <center>

");
	$prod->listProdSum("codvend, nome, tipocliente, doc","vendedor", "block <>'Y' and tipo = 'R' ", $array, $array_campo , "order by nome");
	for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$codvend_list = $prod->showcampo0();
			$nomevend_list= $prod->showcampo1();
			$tipocliente_list= $prod->showcampo2();
			$docold = $prod->showcampo3();
			$nomevend_list = strtoupper($nomevend_list);

			if ($tipocliente_list == "F"){
				$prod->listProdU("nome","clientenovo", "cpf='$docold'");
				$nomecliente=	$prod->showcampo0();
			}else{
				$prod->listProdU("nome","clientenovo", "cnpj='$docold'");
				$nomecliente=	$prod->showcampo0();
			}

			$nomecliente = strtoupper($nomecliente);

echo("
	
        <tr>
          <td width='268' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>$nomecliente<br>
            </b>$nomevend_list</font></td>
          <td width='110' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>R$
            <input onKeyUp='this.value = adjust(this);' size='12' name='valornew[$codvend_list]'></font></td>
          <td width='152' bgcolor='#F0F0F0'></td>
        </tr>

		
");
	}
echo("
      </table>
      </center>
    </div>
	
    		 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='0'>
				  <input type='hidden' name='codprojselect' value='$codprojselect'>
				  <input type='hidden' name='codcapselect' value='$codcapselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	
				   <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
  </form>
  </center>
</div>
<br><br>
		
						
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
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		OPCAIXA: <input type='text' name='opcaixaselect' size='6' maxlength='6'><br>
		CODFOR: <input type='text' name='codforselect' size='6' maxlength='6'>
		<br>
		DE: <input type='text' name='dde' size='2' maxlength='2'>/ <input type='text' name='mde' size='2' maxlength='2'>/ <input type='text' name='ade' size='4' maxlength='4'><br> ATE: <input type='text' name='date' size='2' maxlength='2'>/ <input type='text' name='mate' size='2' maxlength='2'>/ <input type='text' name='aate' size='4' maxlength='4'> 
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codcxsaldoselect' value='$codcxsaldoselect'>
		<input type='hidden' name='codcxselect' value='$codcxselect'>
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

# Pesquisa pela Empresa do OC

	
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
		<option value='$PHP_SELF?Action=list&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#cliente'>$nomeemp</option>
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


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
	
echo("
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
		
            <td width='5%'><img border='0' src='images/empresa.gif' width='25' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA ATUAL<br>
        </b>$nomeempold</font></td>
			 <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='20%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=newreg&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&desloc=$desloc&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'>INSERIR
              NOVA CONTA</a></b></font></td>
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='20%'><b><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='25%'>
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

				 <table border='0' width='550' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='21%'></td>
            <td width='6%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAP:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>CAP:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&codcxselect=$codcxselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><br>
              HISTÓRICO</a></font></b></td>
          </center>
        </tr>
				 <tr>
    <td width='100%' colspan ='5'>
      <hr size='1'>
    </td>
  </tr>
      </table>
<form method='POST' action='$PHP_SELF?Action=update&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'  name='Form7' enctype='multipart/form-data' >
	<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTAGEM DE PAGAMENTOS</b> </font></td>
  </tr>
</table>
				<br>
	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC</font></b></div>
    </td>
	  <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OC</font></b></div>
    </td>
	 <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	 <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>

    
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

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
			$obs = $prod->showcampo13();
			
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 

			$prod->clear();
			$nomefor = "";
			if($codfor <> 0){
			$prod->listProdU("nome", "fornecedor", "codfor=$codfor");
			$nomefor = $prod->showcampo0();
			}
		
			#$bgcorlinha="#E5E5E5";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$datavencf</font></b></td>
		<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$opcaixa</font></b></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$descricao</b><br>$nomefor</font><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF0000'>$nf</FONT><br><FONT SIZE='1' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#FF6600'>$obs</FONT></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codoc</font></td>
			<td width='25%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>DEV: <b>R$ $valordevidof</B><BR>REC: R$ $valorpagof<BR><font color='#FF6600'>JUR: R$ $valorjurosf</font></font></td>
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>");
if ($hist == "N"){
echo("
<a
href='$PHP_SELF?Action=newreg&codcapselect=$codcap&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#contapg'>Detalhes</a>
");
}else{
echo("
PG
");
}
echo("</b></font></td>
<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><b>");
	 if ($hist == "N"){
echo("
<a
href='$PHP_SELF?Action=delcap&codcap=$codcap&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'>Excluir</a>
");
}else{
echo("

");
}
echo("</b></font></td>
	</tr>
		");
	 }
	 echo("
				</table>
	");

if ($Action == "list" and $codempselect <>""){

/// CONTADOR DE PAGINAS ////
$compl= "opcaixaselect=$opcaixaselect&codcxselect=$codcxselect&codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&opcaixa=$opcaixa&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate";   
include("numcontg.php");
}



}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;




if ($Action == "newreg"){



	if ($codcapselect <> ""){

			$prod->clear();
			$prod->listProd("fin_cap", "codcap='$codcapselect'");

			$numdoc = $prod->showcampo1();
			$opcaixaselect = $prod->showcampo2();
			$codfor = $prod->showcampo4();
			$datavenc = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$valordevido = $prod->showcampo8();
			$codoc = $prod->showcampo14();
			$obs = $prod->showcampo18();

			$datavenc = str_replace('-','',$datavenc);
			$xavenc = substr($datavenc,0,4);
			$xmvenc = substr($datavenc,4,2);
			$xdvenc = substr($datavenc,6,2);
		
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$valordevidof = number_format($valordevido,2,',','.'); 

			$flag_up = 1;

	}

	if ($opcaixaselect <> ""){
	$prod->clear();
	$prod->listProdU("descricao", "formapg", "opcaixa='$opcaixaselect'");
		$descricao = $prod->showcampo0();
		if ($descricao == ""){$descricao = "Não existe esta OPCAIXA";$erro_opcaixa = 1;}else{$erro_opcaixa = 0;}
		
	}else{
		$erro_opcaixa = 1;

	}



/// CONTADOR DE PAGINAS ////
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'></font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          $titulo</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>INSERIR NOVA CONTA</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><img border='0' src='images/bt-continuaped.gif' ><br>
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

	<div align='center'>
<center>
    <div align='left'></div>
    <table border=0 cellpadding=0 cellspacing=0 width=550>
      <tbody> 
      <tr bgcolor='#93BEE2'> 
        <td width='100%' colspan='2'> 
          
          </td>
      </tr>
      <tr bgcolor='#93BEE2'> 
        <td colspan=2 width='100%'> 
          <div align=center> 
            <table border=0 cellpadding=0 cellspacing=0 width=548>
              <tbody> 
              <tr> 
                <td bgcolor=#ffffff width='100%' align='center'> &nbsp; 
                  
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='1' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
					   <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form3' enctype='multipart/form-data' >
					   <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'></font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='opcaixaselect' size='6' >
			                          
                              </font> <input class='sbttn' type='submit' name='OK' value='Selecionar => OPCAIXA'>
							 <input type='hidden' name='retorno' value=''>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcapselect' value='$codcapselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
								    <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 
							 </td> </form>
							<form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data' onSubmit = 'if (verificaObrigInsert(Form, $erro_opcaixa)==false) return false'>
						 <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></td>
                          </tr>
							 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Num. Documento:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text'  name='numdocnew' size='40' >
			                          
                              </font></td>
								<tr bgcolor='#D6E7EF'> 
                             <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OPCAIXA</font></b></td>
                            <td width='74%' ><font color='#FF3300' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text'  name='opcaixanew' value ='$opcaixaselect' size='6' > <b>:: $descricao</B>
			                          
                              </font> </td>
							  </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod. Fornecedor:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='codfornew' value='$codfor' size='10' onChange='verificaNumerico(this.form, this.form.codfor.name, 1)' > <br>(OBS.: Este campo não é obrigatorio, torna-se necessário o seu preenchimento somente quando a CONTA A PAGAR estiver relacionada com um FORNECEDOR) 
			                          
                              </font></td>
                          </tr>
						 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Data Vencimento:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                               <input type='text' name='dvenc' value= '$xdvenc' size='2' maxlength='2'>/ <input type='text' name='mvenc' value= '$xmvenc' size='2' maxlength='2'>/ <input type='text' name='avenc' value= '$xavenc' size='4' maxlength='4'>
			                          
                              </font></td>
                          </tr>
							<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Valor:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                R$ <input type='text' name='valornew' value = '$valordevidof' size='12' onChange='consisteValor(this.form, this.form.valornew.name, true)'>
			                          
                              </font></td>
                          </tr>
						<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nota Fiscal:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' name='nfnew' value = '$nf' size='20' >
			                          
                              </font></td>
                          </tr>
							<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod. OC:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='codocnew' value = '$codoc' size='13'  onChange='verificaNumerico(this.form, this.form.codoc.name, 1)'><br>(OBS.: Este campo não é obrigatorio, torna-se necessário o seu preenchimento somente quando a CONTA A PAGAR estiver relacionada com uma ORDEM DE COMPRA) 
			                          
                              </font></td>
                          </tr>
								  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>OBS.:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' name='obs' size='40' value = '$obs'>
			                          
                              </font></td>
                          </tr>
	                      <tr> 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
				");
			if ($codcapselect<>''):$value="Atualizar Centro de Custo";else:$value="Adicionar Centro de Custo";endif;
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
				
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='codcapselect' value='$codcapselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='flag_up' value='$flag_up'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>
					    <input type='hidden' name='dde' value='$dde'>
				  <input type='hidden' name='mde' value='$mde'>
				  <input type='hidden' name='ade' value='$ade'>
				  <input type='hidden' name='date' value='$date'>
				  <input type='hidden' name='mate' value='$mate'>
				  <input type='hidden' name='aate' value='$aate'> 

                 <br> </form>
                </td>
              </tr>
              <tr> 
                <td bgcolor=#FFFFFF width='100%'> 
                  <p align='center'><font size='1' face='Verdana'></font></p>
                </td>
              </tr>
              </tbody> 
            </table>
          </div>
        </td>
      </tr>
      <tr> 
        <td bgcolor='#93BEE2' width='50%'></td>
        <td align=right bgcolor='#93BEE2' width='50%'></td>
      </tr>
      </tbody> 
    </table>
    <p>&nbsp;</p>
  </center>
</div>
	");
}


/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
