

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedidoprodtemp";					// Tabela EM USO
$condicao1 = "cod=$cod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by ordem limit $desloc,$acrescimo ";								// order by nome
$campopesq = "descr";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "PEDIDO";
$titulo1 = "TRANSFERÊNCIA";

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
		$prod->listProd("seguranca", "arquivo='inicioorc.php'");
		$pgorc = $prod->showcampo0();


		// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='iniciopedtransf.php'");
		$codpgold = $prod->showcampo0();
		
		
		if ($fpgstart==1){
		// ATUALIZA DADOS NA TABELA PEDTEMP
		#$prod->listProd("pedidotemp", "codped=$codpedselect");
				
		
		

		#$prod->upProd("pedidotemp", "codped=$codpedselect");
		}

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$Actionsec="list";
		$desloc=0;

		 break;

    case "update":

		$prod->listProd("empresa", "codemp=$codempselect");
		$descmax = $prod->showcampo18();
		$fatorvista = $prod->showcampo20();
		$taxa = $prod->showcampo21();
		#echo("t=$taxa");
		$prod->listProd("vendedor", "nome='$login'");
		$fatorcusto = $prod->showcampo6(); 
		
		$dataatual = $prod->gdata();

		// VARIAVEIS DO PEDIDO TRANSFERENCIA
		$nump=1;
		$pt = $nump-1;
		$anopar = substr($dataatual,0,4);
		$mespar = substr($dataatual,4,2);
		$diapar = substr($dataatual,6,2);
		$avenc[$pt] = $anopar;
		$mvenc[$pt] = $mespar;
		$dvenc[$pt] = $diapar;
		#$valor[$pt] = $vpvt*$fatorvista*$fatorcusto;
		$valor[$pt] = $vpvt;
		if ($codemptransfselect == 1){
			$tipoopcaixa[$pt] = "02.15";
		}else{
			$tipoopcaixa[$pt] = "02.06";
		}
		

		#echo("valor = $valor[0], np=$nump");

		
		for($p = 0; $p < $nump; $p++ ){
		
			$datap[$p] = $avenc[$p].$mvenc[$p].$dvenc[$p];
			$difdias = $prod->numdias($dataatual,$datap[$p]); 
			$n = ($difdias/30);
			#$valor[$p] = str_replace('.','',$valor[$p]);
			#$valor[$p] = str_replace(',','.',$valor[$p]);
			$valorp[$p] = $valor[$p]/(pow((1+($taxa/100)),$n));

			#echo("v=$valor[$p] - vp=$valorp[$p] - df=$difdias - n=$n");

			// CALCULO DO VALOR DE VENDA A VISTA ( SOMATORIO DAS PARCELAS CONVERTIDAS PARA VALOR PRESENTE )
			$valorvendavista = $valorvendavista + $valorp[$p];
			$valorvenda = $valorvenda + $valor[$p];
		}

		// CALCULO DO VALOR DE TABELA A VISTA
		$valortotaltabela = $vpvt;
		$valortotaltabelavista = $valortotaltabela*$fatorvista;
		if ($mentr == "MOTOBOY" and $vpvt <250){$valorvendavista = $valorvendavista - 5;}
		$valorcustovista = $valortotaltabelavista*$fatorcusto;
		
		#echo(" vvista(vpv)=$valorvista - ");

		$valorminimovenda = ($valortotaltabelavista - ($valortotaltabelavista*($descmax/100)));
		
		$impostodif = $valorvendavista - $valortotaltabelavista;
				if ($impostodif <= 0 ){$impostodif = 0;}else{$impostodif=$impostodif*0.18;}

		#$impostodif = 0;

		// CALCULO DA COMISSAO

			// MARGEM DE LUCRO BRUTO
			$mlb = $valorvendavista - $valorcustovista - $impostodif;
			//MARGEM DE CONTRIBUICAO DE VENDA
			$mcv = (1000*($mlb)/$valortotaltabelavista);
			$mlb_real = $mlb;
            $mcv_real = $mcv;

		#echo(" valortotaltabelavista = $valortotaltabelavista <br> valorcustovista = $valorcustovista <br> valorvendavista $valorvendavista <br> impostodif = $impostodif <BR> valorminimovenda = $valorminimovenda <br>");

		// CALCULO DA COTA
		/*
		if ($valorparceladototal < $valorvista){
				$cota = (1-((1-($valorparceladototal/$valorvista))/($descmax/100)))*$valorvista;
		}else{
				$cota = (1-((1-($valorparceladototal/$valorvista))/(2*$descmax/100)))*$valorvista;
		}
		*/

		// CONSISTENCIA DO PEDIDO
		#echo("vppt(vt)=$valorparceladototal - vpvtabela=$valorvistatabela - vpvminimo=$valorvistaminimo - c=$cota");
		#if ($valorparceladototal > $valorvistaminimo){
		#if ($valorvendavista >= $valorminimovenda){
			
			// PEGA A ULTIMA DATA PARA PREVISAO ENTREGA
			/*
			$prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array77, $array_campo77, "order by datastatus DESC" );
			$prod->mostraProd( $array77, $array_campo77, 0 );
			$dataprevent = $prod->showcampo5();
			*/


			// INSERE PARCELAS NO BANCO DE DADOS
			$pendfpg=1;
			$dindim =1;
			for($i = 0; $i < $nump; $i++ ){
			
			$prod->setcampo0("");
			$prod->setcampo1($codpedselect);
			$prod->setcampo2($datap[$i]);
			$prod->setcampo3($valor[$i]);
			$prod->setcampo4($tipoopcaixa[$i]);
			$prod->setcampo5($numch[$i]);
			$prod->setcampo6($banco[$i]);
			$prod->setcampo7($agencia[$i]);
			$prod->setcampo8($conta[$i]);

				if(($tipoopcaixa[$i] =='02.01') and (($numch[$i] == "") or ($banco[$i] == "") or ($agencia[$i] == "") or ($conta[$i] == ""))){
					
					$pendfpg = $pendfpg*0;
					$prod->setcampo9("OK");
				}else{
					$pendfpg = $pendfpg*1;
					$prod->setcampo9("NO");
				}


			$prod->setcampo10("NO");
			$prod->setcampo11("");

			// VERIFICA SE DENTRE AS PARCELAS EXISTE ALGUMA QUE POSSUI DINHEIRO OU CARTAO OU VISAELECTRON
			if ($tipoopcaixa[$i] =='02.00' or $tipoopcaixa[$i] =='02.30' or $tipoopcaixa[$i] =='02.31'){$dindim = $dindim*1;}else{$dindim = $dindim*0;}

			$prod->addProd("pedidoparcelastemp", $uregparc);
			}
			
			$dindim == 1; // PEDIDO TRANSFERENCIA
			if ($pendfpg == 1){$pendfpgf = "NO";}else{$pendfpgf = "OK";}
			#if ($dindim == 1){$statusped = "APROV";}else{$statusped = "AVAL";}

			$statusped = "APROV"; // TRANSFERENCIA DE MERCADORIA

			$endentrega = "$endentr;$cepentr;$cidadeentr;$estadoentr;$bairroentr;";


            // PESQUISA O NUMERO DE CONJUNTOS DO PEDIDO
            $prod->clear();
            $prod->listProdSum("tipocj","pedidoprodtemp", "codped='$codpedselect' and tipoprod ='CJ' and tipocj <> 0", $arrayx45, $array_campox45, "group by tipocj");
            $num_cj = count($arrayx45);
			
			// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->listProd("pedidotemp", "codped=$codpedselect");
			$codcliente = $prod->showcampo2();
			

			$prod->setcampo7($mlb);
			$prod->setcampo8($valorvendavista);
			$prod->setcampo9($valortotaltabela);
			$prod->setcampo10($valorvenda);
			$prod->setcampo11($dataatual);
			$prod->setcampo18($obsfinanceiro);
			$prod->setcampo19($mcv);
			$prod->setcampo20($valorcustovista);
			$prod->setcampo4($endentrega);
			$prod->setcampo5($refentrega);
			$prod->setcampo16($obsmontagem);
			$prod->setcampo6($obsentrega);
			$dataprevent = $anopar.$mespar.$diapar;
			$prod->setcampo12($dataprevent);
			$horaprevent = "$hprevm,$hprevt";
			$prod->setcampo17("MANHÃ,TARDE"); // HORA PREVESAO ENTREGA
			$prod->setcampo25($mentr);
			$prod->setcampo14($statusped);
			$prod->setcampo21("OK");  // LIB. ENTREGA
			$prod->setcampo22("NO");  // COD BARRA
			$prod->setcampo24("NO");  // NOTA FISCAL
			$prod->setcampo30("NO");  // FICHA ENTREGA
			$prod->setcampo31("NO");  // CAIXA
			$prod->setcampo35($pendfpgf);  // PENDENCIA DE FORMA PG
			$prod->setcampo36("NO");  // REAVALIACAO DO PEDIDO
			$prod->setcampo38("NO");  // COMISSAO PAGA
			$prod->setcampo39("NO");  // FAT - FATURAMENTO
			$prod->setcampo40("NO");  // CANCEL - TOTAL
			$prod->setcampo41("NO");  // CANCEL - ESTOQUE
			$prod->setcampo42("NO");  // CANCEL - FINANCEIRO
			$prod->setcampo43("NO");  // CANCEL - FATURAMENTO
			$prod->setcampo44("NO");  // MODIFICAÇÃO - PEDIDO
			$prod->setcampo45($fatorvista);  // FATOR VENDA VISTA - PEDIDO
			$prod->setcampo46($taxa);  // FATOR VENDA VISTA - PEDIDO
			$prod->setcampo48($dataprevent); // DATAPREV ORIGINAL
			$prod->setcampo49("OK"); // PEDIDO TRANSFERENCIA
			$prod->setcampo51("NO"); // CONFIRMACAO DA FORMA DE PAGAMENTO
			$prod->setcampo52("NO"); // AGUARDA COMPENSACAO DE PAGAMENTO
			$prod->setcampo61("OK"); // INICIO SEP
			$prod->setcampo68($num_cj);  // NUMERO DE CONJUNTOS
			$prod->setcampo73($mlb_real);  // MLB REAL
			$prod->setcampo74($mcv_real);  // MCV_REAL
			$prod->setcampo77("N");  // MEIA_MCV
				

			$prod->upProd("pedidotemp", "codped=$codpedselect");

			$prod->listProdU("asscontrato", "clientenovo", "codcliente=$codcliente");
			$asscontrato = $prod->showcampo0();
			
			// VERIFICA DE O USUARIO NECESSITA DE PREENCHER CONTRATO
			$prod->listProd("pedidotemp", "codped=$codpedselect");

			if ($asscontrato == "S"){
				$prod->setcampo27("NO");
			}else{
				$prod->setcampo27("DC");
			}
			# NO - nao assinou contrato
			# OK - contrato preenchido
			# DC - dispensa contrato
			# EP - entrega posterior

			$prod->upProd("pedidotemp", "codped=$codpedselect");


			
			/*
			$prod->setcampo7($cota);
			$prod->setcampo8($valorvista);
			$prod->setcampo9($valorvistatabela);
			$prod->setcampo10($valorparceladototal);
			$prod->setcampo11($dataatual);
			$prod->setcampo18($obsfinanceiro);
			$prod->setcampo14("AVAL");
			$prod->upProd("pedidotemp", "codped=$codpedselect");
			*/

			
			
							
		#}else{
			#$Actionter = "lock";
			#$prod->msggeral("O pedido não foi aceito !", "ERRO", "$PHP_SELF?Action=list&desloc=$desloc&codpedselect=$codpedselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&pgold=$pgold", 0);
		#}

				
		 break;

	 case "list":


		if ($ex==1){
			
			$prod->delProd("pedidoparcelastemp", "codped=$codpedselect");

		}
		
		$Actionsec="list";

			
		 break;


	  case "delete":

		$Actionsec="list";
		
		 break;
		
	  case "end":
		
			$dataatual = $prod->gdata();
    	
			// ATUALIZA BANCO DE DADOS DE PEDIDOS
			$prod->clear();
			$prod->listProd("pedidotemp", "codped=$codpedselect");
			$codempped = $prod->showcampo1();
			$codvendped = $prod->showcampo3();
			
			$prod->setcampo0("");
			$prod->setcampo11($dataatual);
			$prod->setcampo15(0);

				if ($codvendped == 95 or $codvendped == 120 or $codvendped == 108){

				$prod->setcampo27("DC"); // CONTRATO
				$prod->setcampo21("OK");  // LIB. ENTREGA
				$prod->setcampo14("APROV"); // STATUS
				$confer = 1; // INSERE STATUS PED
				}

			$prod->addProd("pedido", $uregped);

			$prod->clear();
			$prod->listProd("pedido", "codped=$uregped");
			$codbarra = $prod->codbarra($codempped,$uregped, "PED");
			$prod->setcampo29($codbarra);
			$prod->upProd("pedido", "codped=$uregped");
			
			$prod->clear();
			$numreg = $prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array, $array_campo, "" );
			for($i = 0; $i < $numreg; $i++ ){
			$prod->mostraProd( $array, $array_campo, $i );
			$codprodped = $prod->showcampo2();
			$qtdepedold = $prod->showcampo3();
			$prod->setcampo0("");
			$prod->setcampo1($uregped);
			$prod->setcampo10("");
			$prod->addProd("pedidoprod", $ureg);
			
				// INSERE RESERVA NO ESTOQUE
				$prod->clear();
				$prod->listProd("estoque", "codemp=$codempped and codprod=$codprodped");
				
				$reserva = $prod->showcampo4();

				$reservanova = $reserva + $qtdepedold;
				$prod->setcampo4($reservanova);
				
				$prod->upProd("estoque", "codemp=$codempped and codprod=$codprodped");
			}

			// INSERE PARCELAS NO BANCO DE DADOS
			$prod->clear();
			$dindim = 1;
			$numreg1 = $prod->listProdgeral("pedidoparcelastemp", "codped=$codpedselect", $array43, $array_campo43, "" );
			for($i = 0; $i < $numreg1; $i++ ){
			$prod->mostraProd( $array43, $array_campo43, $i );
			$tipoopcaixa= $prod->showcampo4();
			$vp= $prod->showcampo3();

			// VERIFICA SE DENTRE AS PARCELAS EXISTE ALGUMA QUE POSSUI DINHEIRO OU CARTAO OU VISAELECTRON
			if ($tipoopcaixa =='02.00' or $tipoopcaixa =='02.30' or $tipoopcaixa =='02.31'){$dindim = $dindim*1;}else{$dindim = $dindim*0;}
			$dindim = 1; // PEDIDO TRANSFERENCIA

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipoopcaixa'");
			$tarifa = $prod->showcampo0();

			$prod->clear();
			$prod->mostraProd( $array43, $array_campo43, $i );
			$prod->setcampo0("");
			$prod->setcampo1($uregped);
			$vpnovo = $vp + $tarifa;
			$prod->setcampo3($vpnovo);
			$prod->addProd("pedidoparcelas", $uregparc);

			$vppnovo = $vppnovo + $vpnovo;
			}

			// ATUALIZA VALOR DO PEDIDO (VPP)
			$prod->clear();
			$prod->listProd("pedido", "codped=$uregped");
			$prod->setcampo10($vppnovo);
			$prod->upProd("pedido", "codped=$uregped");

			if ($dindim == 1){$statusped = "APROV";}else{$statusped = "AVAL";}
			if ($confer == 1){$statusped = "APROV";}

			// INSERE STATUS AVAL
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($uregped);
			$prod->setcampo2($dataatual);
			$prod->setcampo3($statusped);
			$prod->setcampo4($login);
			$prod->addProd("pedidostatus", $uregstatus);
			

			$prod->delProd("pedidotemp", "codped=$codpedselect");
			$prod->delProd("pedidoprodtemp", "codped=$codpedselect");

			

			$prod->delProd("pedidoparcelastemp", "codped=$codpedselect");

			$Actionter = "lock";
			$prod->msggeral("O pedido foi cadastrado corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pgold",0);

	
		
		 break;


}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){

		 $prod->listProd("pedidotemp", "codped=$codpedselect");

	    	$codpped = $prod->showcampo0();
			$codemp = $prod->showcampo1();
			$codcliente = $prod->showcampo2();
			$codvend = $prod->showcampo3();
			$endentrega = $prod->showcampo4();
			$refentrega = $prod->showcampo5();
			$obsentrega = $prod->showcampo6();
			$obsmontagem = $prod->showcampo16();
			$dataprevent = $prod->showcampo12();
			$dataprevent = $prod->fdata($dataprevent);
			$horaprevent = $prod->showcampo17();
			$modoentr = $prod->showcampo25();
			$obsfinanceiro = $prod->showcampo18();

			
		
		 $prod->listProdgeral("pedidoprodtemp", "codped=$codpedselect", $array3, $array_campo3 , "order by tipocj");
		

		$Action = "list";

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

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

	if (!(consisteVazioTamanho(form, form.nomeprod.name, 100)))
    {
        return false;
    }
   
	
	   

	return true;
      	
}

// FNCAO TESTA FORMA DE PAGAMENTO
function verificaObrigFPG (form, qtde, cadErro) 
{

 var o;
 var cont;
 var cname;
 var strValor;
 var strTipo;
 var strBanco;
 var strAgencia;
 var strConta;
 var strNum;
 var oini;
 var AnoAtual;
 var DiaAtual;
 var MesAtual;
 var DataAtual;
 var m_prev = form.mprev.value;
 var d_prev = form.dprev.value;
 var a_prev = form.aprev.value;

 var date2 = new Date(a_prev, m_prev-1, d_prev);
 var now = new Date();
 var diff1 = now.getTime();
 var diff2 = date2.getTime();
 var diff = date2.getTime() - now.getTime()
 var days = Math.floor(diff / (1000 * 60 * 60 * 24));


 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+10); o++)
  {
   strValor = oini + 3;
   strTipo = oini + 4;
   strBanco = oini + 5;
   strAgencia = oini + 6;
   strConta = oini + 7;
   strNum = oini + 8;

 	eval ('cname = form.elements[o].name');
	
	if (form.elements[strValor].value == 0)
	{
		alert ('Valor da Parcela ' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strValor].focus ()');
		return false;
	}
	if (verificaNumerico (form.elements[strValor].value, 2) != 1)
	{
		alert ('Valor da Parcela ' + cont + ' formato inválido');

		eval ('form.elements[strValor].focus ()');

		return false;
	}
	
	if (form.elements[strTipo].value != 0)
	{
	
		if ((form.elements[strTipo].value == '02.01') && (cadErro == 2))
		{
			alert ('O cadastro do cliente está incompleto, atualize as informações para que possa continuar o pedido.');
			eval ('form.elements[strTipo].focus ()');
			return false;
		} 
		
		
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strAgencia].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1) || (verificaNumerico (form.elements[strConta].value, 1) != 1))
		{
			alert ('Banco, Agencia, Conta e Num Cheque da Parcela ' + cont + ' formato inválido');
			eval ('form.elements[strValor].focus ()');

		return false;
		}
   }else {
	
		alert ('Forma de Pagamento ' + cont + ' : preenchimento obrigatório.');
		eval ('form.elements[strTipo].focus ()');
		return false;

	}	
	
	
  }
	  oini = oini + 10; 
 }

	if ((form.dprev.value == 0) || (form.mprev.value == 0) || (form.aprev.value == 0) )
	{
		alert ('Data de Previsao de Entrega : preenchimento obrigatório.');
		eval ('form.dprev.focus ()');
		return false;
	}


	
	if (days < -1) {
		alert ('Data de Previsao de Entrega : Incorreto - Data inferior a atual.');
		eval ('form.dprev.focus ()');
		return false;
	}

	if (!((form.hprevm.checked) || (form.hprevt.checked)))
	{
		alert ('Hora da Previsao de Entrega  : preenchimento obrigatório.');
		eval ('form.hprevm.focus ()');
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
	
    if (campo == 'valor')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}


function adjust(element) {

	return element.value.replace ('.', ',');
}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strValor;
	var strBanco;
	var strAgencia;
	var strConta;
	var strNum;
	var valor;

	cpos = (posicao*10) + 10; 
	
    strBanco = cpos - 5;
    strAgencia = cpos - 4;
    strConta = cpos - 3;
    strNum = cpos - 2;
	strValor = cpos - 1;
	
	valor = form.elements[strValor].value;

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strValor].focus ()');
				
	}else{
	
	form.elements[strBanco].value = valor.substring (1,4);
	form.elements[strAgencia].value = valor.substring (4,8);
	form.elements[strConta].value = valor.substring (23,32);
	form.elements[strNum].value = valor.substring (13,19);

	form.elements[strValor].disabled=true;
	
	}

	}
 
}




</script>

");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update"):

$codped=$codpedselect;

		 $prod->listProd("pedidotemp", "codped=$codped");
		
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
		$vpv = $prod->showcampo8();					// VALOR DO PEDIDO À VISTA
		$vt = $prod->showcampo9();					// VALOR TABELA
		$vpp = $prod->showcampo10();				// VALOR DO PEDIDO PARCELADO
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

	$prod->listProd("clientenovo", "codcliente=$codcliente");
				
		$nomeclienteold = $prod->showcampo1();
		$enderecoold = $prod->showcampo14();
		$bairroold = $prod->showcampo15();
		$cidadeold = $prod->showcampo16();
		$cepold = $prod->showcampo17();
		$estadoold = $prod->showcampo18();

	$prod->listProd("empresa", "codemp=$codemp");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
	
	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$tipoold = $prod->showcampo2();
		
	

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
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo1</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'></font></td>
                      </tr>
                    </tbody>
                  </table>

<div align='center'>
  <center>
  <table border='0' width='500' cellspacing='0' cellpadding='2'>
    <tr>
      <td width='27'><img border='0' src='images/n1.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' >ESCOLHA
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' ><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3c.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1' color='#FF0000'><b>FINALIZAR</b></font></td>
      </tr>
  </table>
  </center>
</div>
 </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </center>
</div>

<!-- CABECALHO DE DADOS DO CLIENTE - INICIO --> 



<div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='2'>
      <tr>
        <td width='34%' bgcolor='#000000'><b><font face=' Verdana, Arial, Helvetica, sans-serif' color='#F0F0F0' size='3'>$titulo:&nbsp;</font></b></td>
      </center>
      <td width='66%' colspan='2' bgcolor='#000000'>
        <p align='right'><font face=' Verdana, Arial, Helvetica, sans-serif' size='2' color='#86ACB5'><b>
       $nomeempold </b></font></td>
    </tr>
    <center>
    <tr>
      <td width='100%' colspan='3' bgcolor='#C0C0C0' valign='top'><font size='1' face='Verdana' color='#FFFFFF'><b>DADOS
        CLIENTE</b></font></td>
    </tr>
    <tr>
      <td width='50%' colspan='2' bgcolor='#F0F0F0' valign='top'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='1'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>CLIENTE:<br>
        </font></font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeclienteold</font></b></td>
    </center>
    <td width='50%' bgcolor='#F0F0F0' valign='top'>
      <p align='right'><font size='1'><b><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>VENDEDOR:<br>
          </font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif'>$nomevendold</font></b></font></td>
    </tr>
    <tr>
      <td width='100%' colspan='3' bgcolor='#F0F0F0' valign='top'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$enderecoold - $bairroold - $cidadeold - $estadoold - $cepold</font></td>
    </tr>
    <tr>
      <td width='100%' colspan='3' bgcolor='#C0C0C0' valign='top'>
        <font size='1' face='Verdana' color='#FFFFFF'><b>DADOS COMPLEMENTARES</b></font></td>
    </tr>
    <tr>
      <td width='50%' colspan='2' bgcolor='#F0F0F0' valign='top'>
        <p align='left'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>ENDEREÇO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$endentrega</font></td>
      <td width='50%' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>REF.
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$refentrega</font></td>
    </tr>
    <tr>
      <td width='50%' colspan='2' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsentrega</font></td>
      <td width='50%' bgcolor='#F0F0F0' valign='top' align='right'><font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>PREVISÃO
        ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$dataprevent - $horaprevent</font></td>
    </tr>
    <tr>
      <td width='50%' colspan='2' bgcolor='#F0F0F0' valign='top'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>OBS
        MONTAGEM:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$obsmontagem</font></td>
 <td width='50%' bgcolor='#F0F0F0' valign='top' align='right'>
        <font color='#336699' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>MODO ENTREGA:<br>
        </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$modoentr</font></td>
    </tr>
    <tr>
      <td width='100%' colspan='3' bgcolor='#FFFFFF' valign='top'>
        <hr size='0'>
      </td>
    </tr>
    </table>
  </div>


<!-- CABECALHO DE DADOS DO CLIENTE - FIM --> 



");

       
		


echo("
	


<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRODUTOS DO PEDIDO</b> </font></td>
  </tr>
</table>


<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>CONJUNTO</b></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS DO PEDIDO</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PU(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PT(R$)</b></font></td>
   
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprodtemp", "codped=$codped", $array3, $array_campo3 , "order by tipocj");

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS DE CONJUNTOS</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			
			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();
			
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

			
			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}
			
			
		
			$k=$i+1;

			if ($nomeprodcj == "" and $unidadeold == "CJ"){$nomeprodcj = "Conjunto";}

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 

		

	if ($tipocj <> $contcjshow){
			echo(" 
	
  <tr bgcolor='#FFFFFF'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
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
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
   
  </tr>
		
  ");
   
   

	echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS UNITÁRIOS</b><td>
		<tr>
		");
  
  $pmtotalu = 0.00;	

	 // PRODUTOS UNITARIO
	 for($i = 0; $i < count($array3); $i++ ){
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$puu = $prod->showcampo4();
			$puu = $puu * ($vpp/$vt);
			$tipoprod = $prod->showcampo8();

			
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprodped");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();
			
			
					
			$k=$i+1;

			$nomeprodcj = "";

			$put = $puu*$qtde;
			$puuf = number_format($puu,2,',','.'); 
			$putf = number_format($put,2,',','.'); 
			
		

echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
   
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
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotaluf</b></font></td>
   
  </tr>
		
  ");


}else{
	echo("
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM PRODUTO ADICIONADO</b><td>
		<tr>
	");
}

	$ptotal = number_format($ptotal,2,',','.'); 

  
		echo(" 
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>&nbsp;</b><td>
		<tr>
 <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'></font></td>
    <td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>R$</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
  
  </tr>
		
  ");

	echo("
		</table>
	<br>	
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
    </table>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - CONDIÇÕES DE PAGAMENTO</font></b></td>
  </tr>
</table>



 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BANCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>AGENCIA</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.CHEQUE</b></font></td>
      </tr>
");


  $prod->listProdgeral("pedidoparcelastemp", "codped=$codped", $array61, $array_campo61 , "order by datavenc");
	for($ji = 0; $ji < count($array61); $ji++ ){
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo2();
			$valorparcela = $prod->showcampo3();
			$tipo = $prod->showcampo4();

			//INSERE TARIFA NAS FORMAS DE PAGAMENTOS
			$prod->listProdU("tarifa", "formapg", "opcaixa='$tipo'");
			$tarifa = $prod->showcampo0();
			$valorparcela = $valorparcela + $tarifa;

			$numchec = $prod->showcampo5();
			$banco = $prod->showcampo6();
			$agencia = $prod->showcampo7();
			$conta = $prod->showcampo8();
			$datavencf = $prod->fdata($datavenc);
			$valorparcelaf = number_format($valorparcela,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricao = $prod->showcampo1();
			
echo("

	<tr bgcolor='$bgcorlinha'>
		<td width='20%'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%'><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%'><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
        <td width='15%'><font size='1' face='Verdana' >$numchec</font></td>
      </tr>
");
		
		$vppt = $vppt + $valorparcela;

	
	}

			$vpptf = number_format($vppt,2,',','.'); 

echo("
    </table>
	<table border='0' width='550' cellspacing='1' cellpadding='3'>
 	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'>&nbsp;</font></td>
		<td width='70%' ><font size='1' face='Verdana'>&nbsp;</font></td>
    </tr>

	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR TOTAL PEDIDO:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vpptf</b></font></td>
    </tr>
		<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>VALOR À VISTA:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $vpvf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MLB:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>R$ $mlbf</b></font></td>
    </tr>
	<tr bgcolor='#ffffff'>
        <td width='30%'><font size='1' face='Verdana' color='#336699'><b>MCV:</b></font></td>
		<td width='70%' ><font size='1' face='Verdana'><b>$mcvf %</b></font></td>
    </tr>

	 </table>
		 <br><br>
	<center>	
 <table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
    <tr bgcolor='#F3F8FA'> 
      <td width='31'><b><font size=' 1' color='#336699' face='Verdana, Arial, Helvetica, sans-serif'>OBS
        FINANCEIRO:</font></b></td>
      <td>  $obsfinanceiro</td>
    </tr>
  </table>
 </center>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='0'>
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
      <td width='18'><img border='0' src='images/bt-cancelaped.gif' ></td>
      <td width='172'><font size='1' face='Verdana'><b><a href=' $PHP_SELF?Action=start&amp;codpped=$codpped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codpednew=$codped&amp;codclienteselect=$codcliente&amp;codempselect=$codemp&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$codpgold'>CANCELAR PEDIDO</a></b></font></td>
	   <td width='18'><img border='0' src='images/bt-recalculaped.gif' ></td>
      <td width='168'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=update&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codpednew=$codped&amp;codcliente=$codcliente&amp;codemp=$codemp&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$codpgold&pgold=$pgold'>CORRIGIR PEDIDO</a></b></font></td>
      <td width='18'><font size='1' face='Verdana'><b><img border='0' src='images/bt-fechaped.gif'></b></font></td>
      <td width='151'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=end&amp;codpedselect=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&pgold=$pgold'>FINALIZAR PEDIDO</a></b></font></td>
     </tr>
  </table>
  </center>
</div>

		  <br><br>
		  <br>

		");


endif;

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if($Action == "delete" or $Action == "list"):
	
				
	
endif;

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////


/// INICIO - CONTADOR DE PAGINAS ////

if ($Action == "list"){

#-- CASO TENHA ALGUMA VARIAVEL EXTRA PARA PASSAR PARA OUTRA PAGINA --#
#$compl="codpesq=$codpesq&retlogin=$retlogin&connectok=$connectok"; 
#include("numcontg.php");
}

/// FIM - CONTADOR DE PAGINAS ////


/// INCLUSÃO DO RODAPE ////
include ("sif-rodape.php");


}
?>
       
