

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 10;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicaoex = " idicj = 'Y'";			// condicao extra para a pesquisa -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$codvendselect=1;
#$codempselect=1;
$titulo = "PEDIDO";
$titulo1 = "CRIAR NOVO PEDIDO";

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
	$prod->listProd("seguranca", "arquivo='iniciopedfpg.php'");
		$codpgsec = $prod->showcampo0();

	$prod->listProd("seguranca", "arquivo='inicioclientenovoped.php'");
		$codpgclienteped = $prod->showcampo0();

	$prod->listProd("seguranca", "arquivo='inicioclienteform.php'");
		$codpgclientesec = $prod->showcampo0();

	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplca o preco de tabela
	

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":
		
		#-- Separa os produtos do Conjunto
		
		$nprod= $cont;
		$contcj=1;
		$contcjold=0;
		for($k = 0; $k < $cont; $k++ ){

		$tipo = explode(":", $tipoprodt[$k]);
		$tipoprod[$k] = "$tipo[0]";
		$codprodcj[$k] = "$tipo[1]";
		$tipocj[$k] = "$tipo[2]";

		$desc = explode(":", $descplano[$k]);
		$desc_plano[$k] = "$desc[0]";
		$codplano[$k] = "$desc[1]";

		#echo("tcjs=$tipocj[$k]:$codprodcj[$k]:$qtde[$k]<br>");

	
		#echo("$tipocj[$k]");
				
		#echo("$unidade[$k]");
	
		if ($unidade[$k] == "CJ" and $qtde[$k] <> 0 ):
			$prod->listProdgeral("relacoes", "codprod=$codprod[$k]", $array88, $array_campo88 , "");
			
			for($j = 0; $j < count($array88); $j++ ){
			
			$prod->mostraProd( $array88, $array_campo88, $j );
			
			$codprod[$nprod] = $prod->showcampo2();
			$qtde[$nprod] = $qtde[$k];
			$codprodcj[$nprod] = $codprod[$k];
			$tipoprod[$nprod] = "CJ";
			
			if ($tipocj[$k] == 0){
				$prod->listProdgeral("pedidoprodtemp", "codped=$codpednew group by tipocj order by tipocj", $array312, $array_campo312 , "");
				for($ou = 0; $ou < count($array312); $ou++ ){
					$prod->mostraProd( $array312, $array_campo312, $ou );
					$tipocjold = $prod->showcampo9();
					#echo("ccj = $contcj - tcj=$tipocjold - ccjold=$contcjold");
				if($contcj==$tipocjold){$contcj++;}
				}
			
			$tipocj[$nprod] = $contcj;
			}else{
			$tipocj[$nprod] = $tipocj[$k];
			}	
				
			#echo("cp=$nprod - qt=$qtde[$nprod] - j=$j - unid=$unidade[$k]");
			$nprod = $nprod+1;
			}	

			$codprod[$k] = 0;
			$qtde[$k] = 0;
		endif;
		}
		
				
		#-- UP/ADD os produtos na tabela PEDPRODTEMP
		for($i = 0; $i < $nprod; $i++ ){

		
		if ($codprod[$i] <> 0 and $qtde[$i] <> 0){

		#echo("np=$nprod - i=$i - cp=$codprod[$i] - qt=$qtde[$i] - tp=$tipoprod[$i] <br>");
		
		$prod->setcampo7(0);
		$prod->setcampo13(0);
		$prod->setcampo6(0);
		$prod->setcampo12(0);
		$prod->setcampo15(0);
		$prod->setcampo14(0);
	
		#-- CALCULA PRECOS - INICIO
		switch ($tipovend) {

			// PRECO DE TABELA : $PRECO[$I] = $PRECOPADRAO[$I] * FATORMULT[$I]
			// PRECO DE VENDA : $PRECO[$I] * $FATORUSERTABELA
 
			case "A":
				if ($tipoprod[$i] =="CJ"):
					#-- Conjunto
					$prod->listProdU("pvacj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo15();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");					
				else:
					#-- Unidade
					$prod->listProdU("pva", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo14();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;

			break;

			default:
			
				if ($tipoprod[$i] =="CJ"):
					#-- Conjunto
					$prod->listProdU("pvvcj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo13();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");
					
				else:
					#-- Unidade
					$prod->listProdU("pvv", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo12();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;
			
		}

		// INSERE DESCONTO DO PLANO TELEMIG CELULAR
		$preco[$i] = $preco[$i] - $desc_plano[$i];
		

		#-- CALCULA PRECOS - FIM

		if ($codprodcj[$i] == ""){$codprodcj[$i]=0;}
		$prod->setcampo3(0);	
		$prod->setcampo4(0);
		$prod->setcampo8(0);
		$prod->setcampo6(0);
		  
		  // VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
			 $prod->clear();
			 $prod->listProdU("gar_um, gar_cj","produtos", "codprod = '$codprod[$i]'");
			 $gar_um = $prod->showcampo0();
			 $gar_cj = $prod->showcampo1();

  	    $prod->clear();
		$prod->listProdgeral("pedidoprodtemp", "codped=$codpednew and codprod=$codprod[$i] and codprodcj=$codprodcj[$i] and tipoprod='$tipoprod[$i]' and tipocj='$tipocj[$i]'", $array77, $array_campo77, "" );
		$numreg = count($array77);

		if ($numreg <> 0):

			$prod->mostraProd( $array77, $array_campo77, 0 );

			$qtdeold = $prod->showcampo3();
			$precoold = $prod->showcampo4();
			$tipoprodold = $prod->showcampo8();
			
			$qtdenew=$qtdeold+$qtde[$i];
			#$preconew=$precoold+($qtde[$i]*$preco[$i]);
			$preconew = $preco[$i];

			$prod->setcampo4($preconew);
			$prod->setcampo3($qtdenew);
			$prod->setcampo11($gar_um);
			$prod->setcampo12($gar_cj);
			$prod->setcampo15("");
			$prod->setcampo16("");
			$prod->setcampo17(1);
			#echo("tpold=$tipoprodold - tpi=$tipoprod[$i]");

		else:
			$qtdenew=$qtde[$i];
			#$preconew=($qtde[$i]*$preco[$i]);
			$preconew = $preco[$i];

			$prod->setcampo1($codpednew);
			$prod->setcampo2($codprod[$i]);
			$prod->setcampo7($codprodcj[$i]);
			$prod->setcampo8($tipoprod[$i]);
			$prod->setcampo9($tipocj[$i]);
			$prod->setcampo4($preconew);
			$prod->setcampo3($qtdenew);
			$prod->setcampo10("");
			$prod->setcampo11($gar_um);
			$prod->setcampo12($gar_cj);
			$prod->setcampo13($codplano[$i]);
			$prod->setcampo14($desc_plano[$i]);
			$prod->setcampo15("");
			$prod->setcampo16("");
			$prod->setcampo17(1);
		endif;

		
		
		#if($qtde[$i] <> 0):

			#if ($tipoprod[$i]=="$tipoprodold"):
			
			#$qtdenew=$qtdeold+$qtde[$i];
			#$preconew=$precoold+($qtde[$i]*$preco[$i]);
			#else:
			#$qtdenew=$qtde[$i];
			#$preconew=($qtde[$i]*$preco[$i]);
			#$numreg=0;
			#endif;

			#$prod->setcampo4($preconew);
			#$prod->setcampo3($qtdenew);


		#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - pr=$preco[$i] - tp=$tipoprod[$i] - po=$precoold | ");
			
			
			#echo("i=$i - cp=$codprod[$i] - qt=$qtdenew - np=$nprod - ct=$cont - j=$j  - tp=$tipoprod[$i] <br>");
			
			if ($numreg):
				if ($qtdenew > 0 ):
				$prod->upProd("pedidoprodtemp", "codped=$codpednew and codprod=$codprod[$i] and codprodcj=$codprodcj[$i] and tipoprod='$tipoprod[$i]' and tipocj=$tipocj[$i]");
				
				else:
				$prod->delProd("pedidoprodtemp", "codped=$codpednew and codprod=$codprod[$i] and codprodcj=$codprodcj[$i] and tipocj=$tipocj[$i]");
				endif;
			else:
				if ($qtdenew > 0 ):
				$prod->setcampo0("");
			    $prod->addProd("pedidoprodtemp", $ureg);
				
				endif;
			endif;
			
		#endif;
		$prod->setcampo3(0);
		$prod->setcampo4(0);
		$prod->setcampo8(0);
		
		}
		}
		$Actionsec="list";
			
        break;

	case "update":
		
				
		$Actionsec="list";
	
		
		 break;

	 case "list":
		
	
		$Actionsec="seclist";
	
		
		 break;

	 case "start":

		if ($ex==1){
			$prod->delProd("pedidotemp", "codped=$codpednew");
			$prod->delProd("pedidoprodtemp", "codped=$codpednew");
			$prod->delProd("pedidoparcelastemp", "codped=$codpednew");

		}

		if ($ex <> 1){
		$prod->clear();
		$prod->setcampo1($codempselect);
		$prod->setcampo2($codclienteselect);
		$prod->setcampo0("");
		$prod->setcampo3($codvendold);

		$prod->addProd("pedidotemp", $ureg);
		$codpednew = $ureg;

		$palavrachave="";
		}

		if ($ex==1){
		$Actionsec="seclist";
		}else{
		$Actionsec="list";
		}
		
		 break;

		
	 case "importacao":

				
			// IMPORTA BANCO DE DADOS DE ORÇAMENTOS
			$prod->listProd("orc", "codped=$codpedimport");
				$prod->setcampo0("");
				$prod->setcampo1($codempselect);
				$prod->setcampo2($codclienteselect);
				$prod->setcampo0("");
				$prod->setcampo3($codvendold);
				$prod->addProd("pedidotemp", $uregped);
				$codpednew = $uregped;
				$palavrachave="";

			$numreg = $prod->listProdSUM("codprod, tipoprod, codpped","orcprod", "codped=$codpedimport", $array, $array_campo, "" );
			for($i = 0; $i < $numreg; $i++ ){
			$block = 0;
			$prod->mostraProd( $array, $array_campo, $i );
			$codprod[$i] = $prod->showcampo0();
			$tipoprod[$i] = $prod->showcampo1();
			$codpped[$i] = $prod->showcampo2();

			$prod->listProdU("hist, lib_linha", "produtos", "codprod=$codprod[$i]");
			$hist = $prod->showcampo0();
			$lib_linha = $prod->showcampo1();

			$prod->listProdU("SUM(qtde-reserva)", "estoque", "codprod=$codprod[$i]");
			$estoque = $prod->showcampo0();

			if ($lib_linha <> "Y" and $estoque <= 0){$block = 1;}

			#echo("lb=$lib_linha - est=$estoque - b=$block");

		if ($hist <> "Y" and $codprod[$i] <> 99999999999 and $block <> 1 ){
		
		#-- CALCULA PRECOS - INICIO
		switch ($tipovend) {

			// PRECO DE TABELA : $PRECO[$I] = $PRECOPADRAO[$I] * FATORMULT[$I]
			// PRECO DE VENDA : $PRECO[$I] * $FATORUSERTABELA
 
			case "A":
				if ($tipoprod[$i] =="CJ"):
					#-- Conjunto
					$prod->listProdU("pvacj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo15();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");					
				else:
					#-- Unidade
					$prod->listProdU("pva", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo14();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo6();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;

			break;

			default:
			
				if ($tipoprod[$i] =="CJ"):
					#-- Conjunto
					$prod->listProdU("pvvcj", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo13();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfc=$preco[$i] ");
					
				else:
					#-- Unidade
					$prod->listProdU("pvv", "produtos", "codprod=$codprod[$i]");
					$precopadrao[$i] = $prod->showcampo0();
					#$precopadrao[$i] = $prod->showcampo12();
					$prod->listProd("estoque", "codprod=$codprod[$i] and codemp=$codempselect");
					$fatormult[$i] = $prod->showcampo7();
					$preco[$i] = $precopadrao[$i] * $fatormult[$i];
					$preco[$i] = $preco[$i] * $fatorusertabela;
					#echo("pfu=$preco[$i] ");
				endif;
			
		}

		#-- CALCULA PRECOS - FIM

			 // VERIFICA SE PRODUTO AINDA ESTA NA GARANTIA
			 $prod->clear();
			 $prod->listProdU("gar_um, gar_cj","produtos", "codprod = '$codprod[$i]'");
			 $gar_um = $prod->showcampo0();
			 $gar_cj = $prod->showcampo1();

				$prod->listProd("orcprod", "codpped=$codpped[$i]");
				$prod->setcampo0("");
				$prod->setcampo4($preco[$i]);
				$prod->setcampo1($uregped);
				$prod->setcampo11($gar_um);
				$prod->setcampo12($gar_cj);
				$prod->addProd("pedidoprodtemp", $ureg);

		}
			
			}// FOR

			
			$Actionsec="list";
							
		
		 break;


	 case "delete":
		
	

		if ($ex==1){
			$prod->delProd("pedidoprodtemp", "codped=$codpednew");
		}else{
			if ($exp == 1){
				$prod->delProd("pedidoprodtemp", "codped=$codpednew and codprodcj=$codprodcj and tipocj=$tipocj");
			}else{
				$prod->delProd("pedidoprodtemp", "codpped=$codpped");
			}
		}

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and hist <> 'Y'";
		
		if ($palavrachave == ""){$condicao2 = "hist <> 'Y'";}
		
		if ($codprodpesq <>""){$condicao2 = "codprod=$codprodpesq and hist <> 'Y'";}

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao2, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, unidade, descres, kit, pvv, lib_linha", $tabela, $condicao2, $array, $array_campo, $parm );
			


		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

		if($numreg-($desloc+$acrescimo)>0){
			$numregpg=$acrescimo;
		}else{
			$numregpg=$numreg-$desloc;
		}
}

if ($Actionsec == "seclist"){
		   
			if ($tipocliente==""){$tipocliente='F';}

			$condicao2 = "";
			if ($tipocliente == 'F'):

				if ($CPFCLI <>""):
					$condicao2 = "cpf='$CPFCLI'";
					$condicao3 = $condicao2 ;
				else:
					$condicao3 = $condicao2 ;
				endif;
			endif;
			if ($tipocliente == 'J'):
				
				if ($CGCCLI <>""):
					$condicao2 = "cnpj='$CGCCLI'";
					$condicao3 = $condicao2 ;
				else:
					$condicao3 = $condicao2 ;
				endif;
			endif;

		if ($CGCCLI <> "" or $CPFCLI <> ""){

		$prod->listProdSum("COUNT(*) as numreg", "clientenovo", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdSum("codcliente, nome, datacad, dataatualizacao, logincad, rescredito, tipocliente, datadono", "clientenovo", $condicao3, $array, $array_campo, "order by nome limit $desloc,$acrescimo" );
		}

		$Action="list";
		
	
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


// INCLUI CONSISTENCIA DO JAVA SCRIPT PARA O FORMULARIO
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
    //  Verifica dupla submissao  *******************************************************
    //***********************************************************************************
    //if (cond == OK)
    //{
    //    return false;
    //}


	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

    
    if (!(consisteCPF (form, form.CPFCLI.name, true)))
    {
        return false;
    }
	 if (!(consisteCGC (form, form.CGCCLI.name, true)))
    {
        return false;
    }

	return true;
      	
}

function verificaObrig1 (form)
{
	
	if((document.form1.padd.value==0))
    {
		alert('Nenhum Produto Adicionado');
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
	

    if (campo == 'CPFCLI')
        return 'CPF do Titular';
	if (campo == 'CGCCLI')
        return 'CNPJ da Empresa';
   
}


</script>

<script>
// AO SELECIONAR UM CAMPO RADIO RECARREGA A MESMA PAGINA
function getMessage(who)
{
    
     loc = who.value
     top.location=loc

}
</script>

");


if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////


	$prod->listProd("clientenovo", "codcliente=$codclienteselect");
				
		$nomeclienteold = $prod->showcampo1();
		$enderecoold = $prod->showcampo14();
		$bairroold = $prod->showcampo15();
		$cidadeold = $prod->showcampo16();
		$cepold = $prod->showcampo17();
		$estadoold = $prod->showcampo18();

	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		$codemp = $codempselect;
	

echo("
<a name='topo'></a>


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
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2c.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1' color='#FF0000'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FORMA DE PAGAMENTO</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n4.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
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
	   <tr>
        <td width='100%' colspan='3'>
          <table border='0' width='100%' cellspacing='1' cellpadding='2'>
            <tr>
              <td width='5%'>
                <p align='right'><img border='0' src='images/seta_laranja.gif' ></p>
              </td>
    <center>
              <td width='19%'><font size='1' face='Verdana'><b><a href='#adicionar'>ADICIONAR <br>
                PRODUTOS</a></b></font></td>
  </center>
              <td width='8%'>
                <p align='right'><img border='0' src='images/seta_laranja.gif' ></p>
              </td>
    <center>
              <td width='16%'><b><font size='1' face='Verdana'><a href='#lista'>PRODUTOS
                ADICIONADOS</a></font></b></td>
  </center>
              <td width='8%'>
                <p align='right'></p>
              </td>
    <center>
              <td width='18%'><b><font size='1' face='Verdana'></td>
              <td width='8%'>
                <p align='center'><img border='0' src='images/seta.gif' ></p>
              </td>
              <td width='18%'><b><font size='1' face='Verdana'><a href='#finalizar'>PRÓXIMA<br>
                ETAPA</a></font></b></td>
            </tr>
          </table>
        </td>
    </tr>

<tr>
       <td width='100%' colspan='3'>
        <hr size='0'>
      </td>
    </tr>
	<tr>

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
<a name='lista'></a>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='33%' align='center'><font size='1' face='Verdana' color='#800000'><b>SEM
        PREVISÃO<br>
        <img border='0' src='images/est_no.gif' width='15' height='15'></b></font></td>
      <td width='33%' align='center'><font size='1' face='Verdana' color='#800000'><b>PRODUTO EM
        ESTOQUE<br>
        <img border='0' src='images/est_ok.gif' width='15' height='15'></b></font></td>
      <td width='34%' align='center'><font size='1' face='Verdana'><b><font color='#800000'>PREVISÃO<br>
        </font>
        <img border='0' src='images/est_prev.gif' width='14' height='15'><br>
        </b><font color='#0000FF'>QTDE </font><font color='#0000FF'>PREVISTA DE
        CHEGADA</font></font></td>
    </tr>
  </table>
  </center>
</div>


		<br>


<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      I</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - LISTA DE PRODUTOS ADICIONADOS AO PEDIDO</b> </font></td>
  </tr>
</table>



<table border='0' width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
  <tr bgcolor='#D6B778'> 
	<td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>&nbsp;</b></font></td>
	<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>CONJUNTO</b></font></td>
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#ffffff'><b>PRODUTOS DO PEDIDO</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PU(R$)</b></font></td>
    <td width='5%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>QTDE</b></font></td>
	<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'  color='#ffffff'><b>PT(R$)</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>

  ");

	
	  $prod->listProdgeral("pedidoprodtemp", "codped=$codpednew", $array3, $array_campo3 , "order by tipocj");

 $padd = count($array3); // PARA GARANTIR QUE ALGUM PRODUTO FOI ADICIONADO

if (count($array3)<>0){		
		
		echo("
		<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='left' colspan=7><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#D6B778'><b>PRODUTOS DE CONJUNTOS</b><td>
		<tr>
		");


	 // SEPARA PRODUTOS DO CONJUNTO EM PRODUTOS UNITARIOS
	 $contcjshow=1;
	 for($i = 0; $i < count($array3); $i++ ){

		  $lmt="";
			$datapreventant = "0000-00-00";
			
			$prod->mostraProd( $array3, $array_campo3, $i );

			$codprodcj = $prod->showcampo7();
			
			
		if ($codprodcj <> 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$qtdecj[$codprodped] = $qtde;
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();
			$tipocj = $prod->showcampo9();

			//VERIFICA ESTOQUES
				$prod->clear();
				$prod->listProdU("qtde, reserva","estoque", "codprod=$codprodped and codemp=$codemp");
				
				$qtde_est[$codprodped] = $prod->showcampo0();
				$reserva_est[$codprodped] = $prod->showcampo1();

				if ($reserva_est[$codprodped] < 0 ){$reserva_est[$codprodped] = 0;}
				if ($qtde_est[$codprodped] < 0 ){$qtde_est[$codprodped] = 0;}

				$estoque = $qtde_est[$codprodped]-($qtde_uso[$codprodped]+$reserva_est[$codprodped]);
						#echo("est[$codprodped]= $est[$codprodped]");
								

					// VERIFICA SE O ESTOQUE ESTA COMPATIVEL
					if ($qtdecj[$codprodped] <= $estoque):

						$statusest = "<IMG SRC='images/est_ok.gif'  BORDER=0 >";
						$datapreventcj = "0000-00-00";
						$statusfinal = "OK";
						$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
											
												
					else: // NAO TEM ESTOQUE

					
						//VERIFICA OC
						$prod->clear();
						$prod->listProdU("SUM(qtdecomp)","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc");
						
						$qtde_oc[$codprodped] = $prod->showcampo0();

						$estoque_oc = $qtde_oc[$codprodped] - ($qtde_uso[$codprodped]+$reserva_est[$codprodped] + $qtdecj[$codprodped]);
							
						// ESTOQUE_OC <= QTDE_PED		
						if ($qtdecj[$codprodped] <= ($estoque_oc + $qtdecj[$codprodped])){
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$estoque_oc;
							$statusfinal = "PREV";
							$dataprevcjf = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$estoque_oc;
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
						}
							
						// ESTOQUE_OC > QTDE_PED		
						if ($qtdecj[$codprodped] > ($estoque_oc + $qtdecj[$codprodped])){
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = "<IMG SRC='images/est_no.gif'  BORDER=0 > ";
							$statusfinal = "S/PREV";
							$dataprevcjf = "<IMG SRC='images/est_no.gif'  BORDER=0 > ";
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
						}
							
																			
						$statusest = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corstatus'>$dataprevcjf</font>";
						
					endif;

				$qtdeestold[$codprodped]++;
				
				#echo("   -    qtdeestold[$codprodped] = $qtdeestold[$codprodped]");
			
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
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
		
  ");
	  $putotal = 0;
	  $pmtotal = 0;
		
	$contcjshow++;
	}
	
echo(" 
	
  <tr bgcolor='#F2E4C4'> 
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$statusest</b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
    <td align='center' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codpped=$codpped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpednew=$codpednew&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg#lista'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
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
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL </b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$putotalf</b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotalf</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
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

		  $lmt="";
			$datapreventant = "0000-00-00";
			
			$prod->mostraProd( $array3, $array_campo3, $i );
			
				$codprodcj = $prod->showcampo7();
			
		if ($codprodcj == 0){

			$codpped = $prod->showcampo0();
			$codprodped = $prod->showcampo2();
			$qtde = $prod->showcampo3();
			$qtdecj[$codprodped] = $qtde;
			$puu = $prod->showcampo4();
			$tipoprod = $prod->showcampo8();

			//VERIFICA ESTOQUES
				$prod->clear();
				$prod->listProdU("qtde, reserva","estoque", "codprod=$codprodped and codemp=$codemp");
				
				$qtde_est[$codprodped] = $prod->showcampo0();
				$reserva_est[$codprodped] = $prod->showcampo1();

				if ($reserva_est[$codprodped] < 0 ){$reserva_est[$codprodped] = 0;}
				if ($qtde_est[$codprodped] < 0 ){$qtde_est[$codprodped] = 0;}

				$estoque = $qtde_est[$codprodped]-($qtde_uso[$codprodped]+$reserva_est[$codprodped]);
						#echo("est[$codprodped]= $est[$codprodped]");
								

					// VERIFICA SE O ESTOQUE ESTA COMPATIVEL
					if ($qtdecj[$codprodped] <= $estoque):

						$statusest = "<IMG SRC='images/est_ok.gif'  BORDER=0 >";
						$datapreventcj = "0000-00-00";
						$statusfinal = "OK";
						$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
											
												
					else: // NAO TEM ESTOQUE

					
						//VERIFICA OC
						$prod->clear();
						$prod->listProdU("SUM(qtdecomp)","ocprod, oc", "codprod=$codprodped and ocprod.codemp=$codemp and oc.hist <> 1 and oc.codoc=ocprod.codoc");
						
						$qtde_oc[$codprodped] = $prod->showcampo0();

						$estoque_oc = $qtde_oc[$codprodped] - ($qtde_uso[$codprodped]+$reserva_est[$codprodped] + $qtdecj[$codprodped]);
							
						// ESTOQUE_OC <= QTDE_PED		
						if ($qtdecj[$codprodped] <= ($estoque_oc + $qtdecj[$codprodped])){
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$estoque_oc;
							$statusfinal = "PREV";
							$dataprevcjf = "<IMG SRC='images/est_prev.gif'  BORDER=0 > ".$estoque_oc;
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
						}
							
						// ESTOQUE_OC > QTDE_PED		
						if ($qtdecj[$codprodped] > ($estoque_oc + $qtdecj[$codprodped])){
								
							#echo(" ENCONTROU OC - CJ - $qtdeoct[$codprodped] -  $qtdeocusado[$codprodped]");

							$datapreventcj = "<IMG SRC='images/est_no.gif'  BORDER=0 > ";
							$statusfinal = "S/PREV";
							$dataprevcjf = "<IMG SRC='images/est_no.gif'  BORDER=0 > ";
							$corstatus = "#3366CC";
							$qtde_uso[$codprodped] = $qtde_uso[$codprodped] + $qtdecj[$codprodped];
						}
							
																			
						$statusest = "<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='$corstatus'>$dataprevcjf</font>";
						
					endif;
						
				$qtdeestold[$codprodped]++;
				
				#echo("   -    qtdeestold[$codprodped] = $qtdeestold[$codprodped]");

			
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
	<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$statusest</b></font></td>
	<td width='20%' height='0'  align='center'>
	<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>$nomeprodcj</font></td>
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	$nomeprod<br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$puuf</font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$qtde</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$putf</font></td>
    <td align='center' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=delete&codpped=$codpped&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codpednew=$codpednew&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retorno=$retorno&retlogin=$retlogin&connectok=$connectok&pg=$pg#lista'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
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
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
	<b>SUBTOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pmtotaluf</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
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
    <td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
	<b>TOTAL</b></font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b></b></font></td>
    <td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>R$</font></td>
	<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$ptotal</b></font></td>
    <td align='center' width='10%' height='0'><font size='1'></font></td>
  </tr>
		
  ");

	echo("
		</table>
	<br>
<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
     
       <div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1' cellpadding='2'>
    <tr>
      <td width='28'><img border='0' src='images/bt-cancelaped.gif' width='26' height='27'></td>
      <td width='126'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=start&amp;codpped=$codpped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codpednew=$codpednew&amp;codclienteselect=$codclienteselect&amp;codempselect=$codempselect&amp;codvendselect=$codvendselect&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg'>CENCELAR PEDIDO</a></b></font></td>
      <td width='29'><font size='1' face='Verdana'><b><img border='0' src='images/bt-recalculaped.gif' width='27' height='27'></b></font></td>
      <td width='198'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=delete&amp;codpped=$codpped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;codpednew=$codpednew&amp;codclienteselect=$codclienteselect&amp;codempselect=$codempselect&amp;codvendselect=$codvendselect&amp;retorno=$retorno&amp;ex=1&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg#lista'>EXCLUIR TODOS PRODUTOS</a></b></font></td>
      <td width='198'><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif'><b><font size='1' color='#336699'></font></font></td>
    </tr>
  </table>
  </center>
</div>

      
    </td>
  </tr>
</table>

<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>






	<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - ESCOLHA DE PRODUTOS</font></b></td>
  </tr>
</table>



	<form method='POST' action='$PHP_SELF?Action=update#adicionar' name='Form'>
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='codpednew' value='$codpednew'>
		<input type='hidden' name='codclienteselect' value='$codclienteselect'>
		<input type='hidden' name='codempselect' value='$codempselect'>
		<input type='hidden' name='codvendselect' value='$codvendselect'>
		<input type='hidden' name='retlogin' value='$retlogin'>
	    <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='pg' value='$pg'>

	  </p>
	</form>
	<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr> 
    <td width='95'> 
      <div align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> 
        &nbsp; </b> </font></div>
    </td>
    <td width='455'> 
      <div align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></div>
    </td>
  </tr>
  <tr> 
    <td colspan='2'>&nbsp;</td>
  </tr>
</table>
	
<a name='adicionar'></a>
<table border='0' width='550' align='center'>
  <tr>
    <td width='100%'>
          <form method='POST' action='$PHP_SELF?Action=insert#lista' >
            <table border='0' width='100%'>
              <tr bgcolor='$bgcortopo1'> 
                <td width='5%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'></font></b></td>
				<td width='50%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>NOME PRODUTO&nbsp;</font></b></td>
				<td width='5%' nowrap height='5' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>UN</font></b></td>
                <td width='10%' align='center' nowrap height='5' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>QTDE</font></b></td>
                <td width='10%' align='center' nowrap ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>PU(R$)</font></b></td>
                <td width='20%' nowrap height='5' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>TIPO PROD.</b> 
                  </font></td>
              </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codprod[$i] = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$unidade[$i] = $prod->showcampo2();
			$descres = $prod->showcampo3();
			$kit = $prod->showcampo4();
			$ppu = $prod->showcampo5();
			$ppu = $ppu * $fatorusertabela;
			$ppuf = number_format($ppu,2,',','.'); 
			$lib_linha = $prod->showcampo6();

			if ($unidade[$i] == "CJ"){

				$pvvcjtotal = 0;

			$prod->listProdgeral("relacoes", "codprod=$codprod[$i]", $array3, $array_campo3 , "");

				for($u = 0; $u < count($array3); $u++ ){
				
				$prod->mostraProd( $array3, $array_campo3, $u );
				$codsubprod = $prod->showcampo2();
				$qtde = $prod->showcampo3();

				$prod->listProdSum("pvvcj", "produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
				$prod->mostraProd( $array1, $array_campo1, 0 );
				$pvvcj = $prod->showcampo0();
			
				$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
				} // FOR

                       	$pvvcjtotal = $pvvcjtotal * $fatorusertabela;
			$ppuf = number_format($pvvcjtotal,2,',','.'); 

			#if ($unidade[$i] == "CJ"){
			#	if ($contcj==0){$contcj=1;}else{$contcj++;}
			#}

			}

			// CALCULA TODO O ESTOQUE
			$prod->clear();
			$prod->listProdU("qtde, reserva", "estoque" , "codprod = $codprod[$i] and codemp = $codempselect GROUP BY codprod");
			$qtde = $prod->showcampo0();
			$reserva = $prod->showcampo1();

			if ($reserva < 0 ){$reserva = 0;}
			if ($qtde < 0 ){$qtde = 0;}
			$estoque = $qtde - $reserva;

			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod, oc ", "codprod = $codprod[$i] and ocprod.codemp=$codempselect and hist<>1 and oc.codoc=ocprod.codoc");
			$qtdecomp = $prod->showcampo0();
			$qtdecomp = $qtdecomp - $reserva;

	$kit_no = 0;$linha_no=0;
	if ($estoque > 0){
		$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
	}else{
		if ($qtdecomp > 0 ){
			$alarm = "<IMG SRC='images/est_prev.gif' BORDER=0 ><br>$qtdecomp"; //PREVISAO DE COMPRA
			
		}else{
			if ($unidade[$i] <> "CJ"){
				$alarm = "<IMG SRC='images/est_no.gif'  BORDER=0 >"; // SEM ESTOQUE
				if ($kit == "Y"){$kit_no = 1;}else{$kit_no = 0;}
				if ($lib_linha == "Y"){$linha_no = 0;}else{$linha_no = 1;}
			}else{
				$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
			}
		} 
	}
	

	if ($unidade[$i] == "UM"){$cor ="#D6E7EF";}else{$cor="#F3F8FA";}
	if ($kit == "Y"){$cor ="#C7E9C0";}

	if ($kit_no <> 1 and $linha_no <> 1){
					
		echo("
		 <tr bgcolor='$cor'> 
				<td width='5%' align = 'center'><font face='Verdana' size='1'>$alarm</font></td>
				<td width='50%' ><font face='Verdana' size='1' color='#990000'>$codprod[$i] - $nomeprod</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font>
	
		");
			$prod->listProdSum("desconto, codplano","produtos_planos_relacao", "codprod=$codprod[$i]", $array38, $array_campo38 , "");

// EXISTE RELACAO DE PLANOS
if (count($array38) <> 0 ){
	
echo("
	<select name='descplano[$i]' class=drpdwn>
");
	 for($oq = 0; $oq < count($array38); $oq++ ){
			
			$prod->mostraProd( $array38, $array_campo38, $oq );
			$desc = $prod->showcampo0();
			$codplano = $prod->showcampo1();
						
			$prod->listProdU("plano", "produtos_planos", "codplano=$codplano");
			$nomeplano = $prod->showcampo0();


			
			echo("
				<option value='$desc:$codplano'>$nomeplano</option>
				
				");
	 }//FOR
}// EXISTE RELACAO DE PLANOS
echo("
		 
		 </td>
				<td width='5%' align='center' ><font face='Verdana' size='1'>$unidade[$i]</font></td>
                <td width='10%' align='center' ><font face='Verdana' size='1'> 
                 <input type='text' name='qtde[$i]' size='4' maxlength='3' value='0'>

	</font></td>
                <td width='10%' align='center' ><font face='Verdana' size='1'><strong>$ppuf</strong></font></td>
                <td width='20%' align = 'center' > 
	");
	#if ($unidade[$i] <> "CJ"){
		echo("
		<select name='tipoprodt[$i]' class=drpdwn>
		");
		$prod->listProdgeral("pedidoprodtemp", "codped=$codpednew and codprodcj <> 0 group by tipocj", $array31, $array_campo31 , "");

	 for($o = 0; $o < count($array31); $o++ ){
			
			$prod->mostraProd( $array31, $array_campo31, $o );
			
			$codprodcj = $prod->showcampo7();
			$tipocj = $prod->showcampo9();
						
			$prod->listProdU("nomeprod, unidade", "produtos", "codprod=$codprodcj");
			$nomeprodcj = $prod->showcampo0();

			if ($tipocj <> 0 or $tipocj <> ""){
			$nomeprodcj = $nomeprodcj . " - " . $tipocj;
			}

		if ($unidade[$i] == "CJ"){
			if ($codprodcj == $codprod[$i]){
			echo("
				<option value='CJ:$codprodcj:$tipocj'>$nomeprodcj</option>
				
				");
			}
		}else{
		echo("
			<option value='CJ:$codprodcj:$tipocj'>$nomeprodcj</option>
			
			");
		} // UNIDADE  == CJ
	 } //FOR
	if ($unidade[$i] == "CJ"){
		
		echo("
			<option selected value='CJ:0:0'>Novo Conjunto</option>
        </select> 
		");
	}else{
		echo("
			<option selected value='UM:0:0'>Unidade</option>
        </select> 
	");
	} // UNIDADE  == CJ
		#}
				
		echo(" 
		</td>
              </tr>
			  <input type='hidden' name='codprod[$i]' value='$codprod[$i]'>
				<input type='hidden' name='unidade[$i]' value='$unidade[$i]'>
		");
	 }
	 
		echo(" 

 <tr> 
	 ");
	 } // KIT SEM ESTOQUE
	 echo("
                <td  colspan='6' ><br>
                  <p align='right'><font face='Verdana' size='1'><b><font size='2'>
                    <input  class='sbttn' type='submit' name='Submit' value='Adicionar iten(s) escolhido(s)'>
                    </font></b></font></p>
                </td>
              </tr>
            </table>

				  <input type='hidden' name='cont' value='$numregpg'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>

				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codpednew' value='$codpednew'>
				  <input type='hidden' name='codclienteselect' value='$codclienteselect'>
                  <input type='hidden' name='codvendselect' value='$codvendselect'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='retorno' value='$retorno'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
			      <input type='hidden' name='connectok' value='$connectok'>
                <input type='hidden' name='pg' value='$pg'>
				  
      </form>
    </td>
  </tr>
</table>


  </center>
</div>


	");

///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


else:

/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

if ($codempselect <>""){

	$prod->listProd("empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo1();
		$nomeempold = strtoupper($nomeempold);
		
}
	echo("
	<a name='topo'></a>

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
      <td width='27'><img border='0' src='images/n1c.gif' width='27' height='27'><font face='Verdana' size='1'><b>
        </b></font></td>
      <td width='112'><b><font face='Verdana' size='1' color='#FF0000'>ESCOLHA
        DO CLIENTE</font></b></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n2.gif' width='27' height='27'></b></font></td>
      <td width='113'><font face='Verdana' size='1'><b>ESCOLHA DE PRODUTOS</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n3.gif' width='27' height='27'></b></font></td>
      <td width='114'><font face='Verdana' size='1'><b>FORMA DE PAGAMENTO</b></font></td>
      <td width='27'><font face='Verdana' size='1'><b><img border='0' src='images/n4.gif' width='27' height='27'></b></font></td>
      <td width='105'><font face='Verdana' size='1'><b>FINALIZAR</b></font></td>
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





<!-- ESCOLHA DE EMPRESAS - INICIO --> 
");

if ($allemp == "Y"){

echo("
<br><br>
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>ETAPA 
      </font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#FF6600'> - SELECIONAR A EMPRESA NA QUAL O PEDIDO SERÁ FEITO.</b> </font></td>
  </tr>
</table>

	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>


		 <table width='550' border='0' cellspacing='2' cellpadding='1' align='center' >
    <tr> 
       <td  > 
			<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#86ACB5'>
		<b> </b>
	       <select size='1' class=drpdwn name='codempselect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>                         
	");

	$prod->listProdgeral("empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomeemp = $prod->showcampo1();
			$codemp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp#cliente'>$nomeemp</option>
		");
	
	}
echo("	
		<option value='' selected>Escolha a Empresa</option>
	  </select>
	  </td>
    </tr>
	   
  </table>
	</form>
");
}else{

$codempselect = $codempvend;

}

echo("

<!-- ESCOLHA DE EMPRESAS - FIM --> 
	
<br>	
	<a name='cliente'>
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
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='25%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$PHP_SELF?Action=insert&retlogin=$retlogin&connectok=$connectok&pg=$codpgclienteped&lock=1','name','600','500','yes');return 
false");echo('"');echo(">INSERIR NOVO CLIENTE</a></b></font></td>
              </center>
          <td width='40%'>
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
<br>

<form method='POST' action='$PHP_SELF?Action=$Action&codpedimport=$codpedimport&orcimp=$orcimp#cliente' name='FormPesq' onSubmit = 'if (verificaObrig(document.FormPesq)==false) return false'>

	<table width='550' border='0' cellspacing='0' cellpadding='0' align='center' >
	 <tr> 
      <td width='550' colspan='2' > 
      <p align='center'>
");
if ($tipocliente == 'J'){$ckj = 'checked';}else{$ckf = 'checked';}


echo("

      <input type='radio' value='$PHP_SELF?Action=$Action&tipocliente=F&desloc=$desloc&codempselect=$codempselect&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pge&codpedimport=$codpedimport&orcimp=$orcimp#client' $ckf name='R1' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA
      FÍSICA </b></font><input type='radio' $ckj name='R1' value='$PHP_SELF?Action=$Action&tipocliente=J&desloc=$desloc&codempselect=$codempselect&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp#cliente' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA
      JURÍDICA</b></font>
	  </p>

      </td>
    </tr>
    <tr> 
      <td width='550' >
      </td>
    </tr>
    <tr> 
      <td width='550'  colspan='2' >
");
if ($tipocliente == 'J'){$doc = 'CGC';$docname = 'CGCCLI';}else{$doc = 'CPF';$docname = 'CPFCLI';}

echo("<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>$doc: <input type='text' name='$docname' size='20' onchange='consiste$doc(this.form, this.form.$docname.name, true)'></font>
<input class='sbttn' type='submit' name='cond' value='OK'></p>
      </td>
     
	  
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		  <input type='hidden' name='tipocliente' value='$tipocliente'>
		 <input type='hidden' name='codempselect' value='$codempselect'>
	
    </tr>
  </table>
	</form>

");


if ($orcimp == 1){

echo("
<br>
<div align='center'>
  <center>
  <table border='0' width='550'>
    <tr>
      <td width='100%'><font face='Verdana' size='1' color='#FF0000'><b>IMPORTANTE:
        </b>AO TRANSFORMAR UM ORÇAMENTO EM PEDIDO É NECESSÁRIO DESTACAR AS
        SEGUINTES ALTERAÇÕES:</font>
        <blockquote>
          <ul>
            <li><font face='Verdana' size='1' color='#000000'><b>PRODUTOS EXTRAS</b>
              E <b>PRODUTOS QUE ESTÃO FORA DE LINHA</b>, NÃO SERÃO
              INCLUÍDOS;</font></li>
            <li><font face='Verdana' size='1' color='#000000'>OS <b>PREÇOS NO
              NOVO PEDIDO</b>, SERÃO ALTERADOS DE ACORDO COM A TABELA ATUAL.</font></li>
          </ul>
        </blockquote>
      </td>
    </tr>
  </table>
  </center>
</div>
<br>
");
}
echo("

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#FF6600'>>> Selecione o cliente pesquisado na lista abaixo. <<</font><br><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'></font></td>
  </tr>
</table>
	
	<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='30%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CLIENTE DESDE</font></b></div>
    </td>
	 <td align='center' width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
	<td align='center' width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
   
  </tr>

	");
if (count($array) <> 0):
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codcliente = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$datacad = $prod->showcampo2();
			$dataatualiza = $prod->showcampo3();
			$logincad = $prod->showcampo4();
			$xrescredito=	$prod->showcampo5();
			$tipocliente = $prod->showcampo6();
			$datadono = $prod->showcampo7();
			

			// FORMATACAO //
			$dataatualf = $prod->fdata($dataatualiza);
			$datacadf = $prod->fdata($datacad);
			$datahoje = $prod->gdata();
			$difdias = $prod->numdias($dataatualiza,$datahoje);
			$difdias_dono = $prod->numdias($datadono,$datahoje);

			if ($difdias_dono > 90){$status_dono = "EXPIRADO";}else{$status_dono = "";}



	#$difdias=91;

			// IMPORTACAO DO PEDIDO
			if ($orcimp == 1){$Action = "importacao";}else{$Action = "start";}


// USUARIO POSSUI RESTRICAO DE CREDITO
if ($xrescredito == ""){

	// CADASTRO DESATUALIZADO POR MAIS DE 90 DIAS
	if ($difdias < 90){
		echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='20%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datacadf</b></font><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'><br>$logincad<br><b>$status_dono</b></font></td>
");
		
		if ($codempselect == ""):
		echo("
			
		<td align='center' width='20%' height='0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></font></td>
		");
		else:
		echo("
			<td align='center' width='20%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=$Action&codclienteselect=$codcliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codempselect=$codempselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&codpedimport=$codpedimport&orcimp=$orcimp'><font face='Verdana, Arial, Helvetica, sans-serif'>Selecionar 
			  </font></b></a></font></td>
		");
		endif;
		echo("
		");

// TESTA SE LOGIN DO USUARIO A TEM PERMISSAO DE ALTERAR ESSE CLIENTE
if ($logincad <> $login):
		echo("
			
		<td align='center' width='20%' height='0'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar Cadastro 
			  </font></b></font></td>
		");
		else:
		echo("
			<td align='center' width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$PHP_SELF?Action=update&codcliente=$codcliente&tipopessoa=$tipocliente&retlogin=$retlogin&connectok=$connectok&pg=$codpgclientesec&lock=1&codpedimport=$codpedimport','name','600','500','yes');return 
false");echo('"');echo(">Alterar Cadastro</a></b></font></td>
		");
		endif;
		echo("
	   </tr>
		");


}else{

echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome<br></font></td>
");

// TESTA SE LOGIN DO USUARIO A TEM PERMISSAO DE ALTERAR ESSE CLIENTE
if ($logincad == $login):
		echo("
		<td align='center' width='60%' height='0' colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b><a href='javascript:void(0)' onclick=");echo('"');echo("NewWindow('$PHP_SELF?Action=update&codcliente=$codcliente&tipopessoa=$tipocliente&retlogin=$retlogin&connectok=$connectok&pg=$codpgclientesec&lock=1','name','600','500','yes');return 
false");echo('"');echo(">Atualizar Cadastro</a></b></font><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><br>O cadastro deste cliente tem mais de 90 dias sem alteracao, por favor atualize o cadastro para que possa prosseguir com o pedido. Caso não seja o responsável pela carteira desse cliente entre em contato com o depertamento financeiro.  </font></td>
		
		");
	else:
		echo("
		<td align='center' width='60%' height='0' colspan='3'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>Atualizar Cadastro</b></font><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><br>O cadastro deste cliente tem mais de 90 dias sem alteracao, por favor atualize o cadastro para que possa prosseguir com o pedido. Caso não seja o responsável pela carteira desse cliente entre em contato com o depertamento financeiro.  </font></td>
		");
	endif;
	echo("
	</tr>
		");
}


}else{

echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome<br></font></td>
		<td align='center' width='60%' height='0' colspan='3'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'>CLIENTE COM RESTRIÇÃO DE CRÉDITO</font></font></b><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><br>Este cliente possui alguma restrição de crédito. Entre em contato com o departamento financeiro para maiores informações </font></td>
		</tr>
		");

}


	 }

else:
	echo("
<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=5><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'>&nbsp;<td>
		<tr>
	<tr bgcolor='#FFFFFF'> 
		<td width='5%' height='0' align='center' colspan=5><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF3300'><b>NENHUM CLIENTE SELECIONADO</b><td>
		<tr>
	");
endif;

		echo("
				</table>
		");
		
if($orcimp==1){$Action = "list";}

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;
if ($Action<> "list" ){
/// CONTADOR DE PAGINAS ////
$Action= "update";
$compl= "codpednew=$codpednew&codclienteselect=$codclienteselect&codempselect=$codempselect&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg#adicionar&codpedimport=$codpedimport";   
/// Complemento para a parte de mudanca de pagina
include("numcontg.php");
}
echo("
<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>
");
if ($Actionsec == "list"){

	echo("
<br>
<a name='finalizar'></a>

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      III</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - PRÓXIMA ETAPA </font></b></td>
  </tr>
</table>
 <form name='form1' method='post' action='$PHP_SELF?Action=list&desloc=0&codpedselect=$codpednew&fpgstart=1&retlogin=$retlogin&connectok=$connectok&pg=$codpgsec&pgold=$pg' onSubmit = 'if (verificaObrig1(document.Form)==false) return false'>



<br>

<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>
      <div align='right'>
          <table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='58%'><b></td>
              
              <td width='22%'>
                <p align='right'>
          <input class='sbttn' type='submit' name='Submit' value='Próxima Etapa => Forma de Pagamento'>
              </td>
            </tr>
          </table>
        </div>
      
    </td>
  </tr>
</table>
<input type='hidden' name='padd' value='$padd'>

</form>
	<table border='0' width='550' cellspacing='1' cellpadding='2' align='center'>
	<tr>
      <td>
        <hr size='0'>
      </td>
    </tr>
	<tr>
      <td>
        <p align='right'><font size='1' face='Verdana'><b><a href='#topo'>TOPO</a>
        <img border='0' src='images/seta-sobe.gif' > </b></font>
      </td>
    </tr>
    </table>

	");
}



include ("sif-rodape.php");

}
?>
       
