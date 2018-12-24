

<?php

require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 30;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat, nomesubcat, nomeprod ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "TABELA DE PREÇOS";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProd("seguranca", "arquivo='addprodcj.php'");
		$codpgsec = $prod->showcampo0();

		$prod->listProd("vendedor", "codvend='$codvendselect'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$allemp = $prod->showcampo17();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplca o preco de tabela
		$fatorusertabela_ata = $prod->showcampo55(); // Fator que multiplca o preco de tabela
		$fatormajor = $prod->showcampo56(); // Fator que multiplca o preco de tabela

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		
		$Actionsec="list";
		$desloc=0;

		
        break;

    case "update":

		$prod->listProd($tabela, $condicao1);
				
		$nomeprodold = $prod->showcampo19();
		$codprodold = $prod->showcampo0();
		$descresold = $prod->showcampo4();
		$descdetold = $prod->showcampo5();
		$unidadeold = $prod->showcampo7();
		$pvvold = $prod->showcampo12();
		$pvvcjold = $prod->showcampo13();
		$chkcbold = $prod->showcampo22();
		$histold = $prod->showcampo23();

		//DADOS DA IMAGEM
		$imgsizeold = $prod->showcampo20();
		$imgtypeold = $prod->showcampo21();
		$imgnameold = $prod->showcampo28();


		#-- CALCULA PRECOS - INICIO
		
			// PRECO DE TABELA : $PRECO[$I] = $PRECOPADRAO[$I] * FATORMULT[$I]
			// PRECO DE VENDA : $PRECO[$I] * $FATORUSERTABELA
			
				if ($unidadeold =="CJ"):
					
					$pvvcjtotal = 0;
					$prod->listProdgeral("relacoes", "codprod=$codprod", $array3, $array_campo3 , "");

						for($u = 0; $u < count($array3); $u++ ){
				
						$prod->mostraProd( $array3, $array_campo3, $u );
						$codsubprod = $prod->showcampo2();
						$qtde = $prod->showcampo3();

						$prod->listProdSum("pvvcj", "produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
						$prod->mostraProd( $array1, $array_campo1, 0 );
						$pvvcj = $prod->showcampo0();
				
						$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
	
						}
	
					#-- Conjunto
					$precopadrao = $pvvcjtotal;
					#$prod->listProd("estoque", "codprod=$codprodold and codemp=$codempselect");
					#$fatormult = $prod->showcampo7();
					#$preco = $precopadrao * $fatormult;
					$preco = $precopadrao * $fatorusertabela;
					#echo("pfc=$preco ");
					
				else:
					#-- Unidade
					$precopadrao = $pvvold;
					#$prod->listProd("estoque", "codprod=$codprodold and codemp=$codempselect");
					#$fatormult = $prod->showcampo7();
					#$preco = $precopadrao * $fatormult;
					$preco = $precopadrao * $fatorusertabela;
					#echo("pfu=$preco ");
				endif;
			

			$precof = number_format($preco,2,',','.'); 
			$tam = strlen ($precof);
			$real = substr($precof,0,($tam-3));
			$centavos = substr($precof,($tam-2),$tam);
			
	

		#-- CALCULA PRECOS - FIM

			
			
		$nomeformsec=" ATUALIZAR $nomeform ";
		
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
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " hist <>'Y' and categoria.codcat=produtos.codcat and subcategoria.codsubcat=produtos.codsubcat and produtos.pvd <> 0";
		

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "produtos, categoria, subcategoria", $condicao2 , $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, pvv, pva, datauc, unidade, hist, kit, lib_linha, produtos.codcat, produtos.codsubcat , descres, garext_12, garext_24, porc_garext_12, porc_garext_24, ponto, pvd as pvd, fdist, pvdcj", "produtos, categoria, subcategoria", $condicao2, $array, $array_campo, $parm );

		
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

if ($impressao <> 1){ include("sif-topolimpo.php"); }

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


//***************************************************************************************
//  Função para obtenção de descrição do campo
//  Retorno: Uma descrição para o campo que corresponde
//           ao que é mostrado no browser
//***************************************************************************************

function retornaNmCampo (campo)
{
	
    if (campo == 'pvv')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}


</script>


<script language=");echo('"Javascript1.2"><!-- // load htmlarea
_editor_url = "textarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);');echo("
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src=");echo('"');echo("' +_editor_url+ 'editor.js");echo('"');echo("');
  document.write(' language=");echo('"Javascript1.2"');echo("></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>






");


if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////


///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

	echo("
<div align='center'>
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
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width='10%' align = 'right'>
	  <!--<IMG SRC='images/est_ok.gif'  BORDER=0 ><br>
	 <IMG SRC='images/est_prev.gif' alt='DATA PREVISAO CHEGADA:$dataprevf' BORDER=0 ><br />
 	  <IMG SRC='images/est_no.gif'  BORDER=0 ><br>-->
      </td>
	  <td width='70%' align = 'right'><!--VERIFICAR DISPONIBILIDADE IMEDIATA<br>
	VERIFICAR DISPONIBILIDADE ENCOMENDA<br>
 	INDISPONÍVEL<br>-->
      <img src='images/logo_maxxmicro.png'  /></td>
    </center>
	
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

");
# Pesquisa pela Empresa do OC

	$datainst = $prod->gdata();
	$datainstf = $prod->fdata($datainst);
 
if ($codempselect<>""){


	$prod->listProdU("nome", "empresa", "codemp=$codempselect");
				
		$nomeempold = $prod->showcampo0();
		$nomeempold = strtoupper($nomeempold);
	
echo("
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
            <td width='35%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>DATA EMISSÃO:<br>
        </b>$datainstf</font></td>
             <td width='5%'></td>
            <td width='55%'></td>
          </center>

			
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

	<table width='100%' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='55%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME PROD</font></b></div>
    </td>
    <td  align='center' width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>UNID.</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PREÇO<BR>à vista</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PREÇO<BR>14 dias</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PREÇO<BR>28 dias</font></b></div>
    </td>
    
 
  </tr>
  
	");
	
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$pvv = $prod->showcampo2();
			$pvv = number_format($pvv, 2,',', '.');
			$pva = $prod->showcampo3();
			$pva = number_format($pva, 2,',', '.');
			$datauc = $prod->showcampo4();
			$unidade = $prod->showcampo5();
			$hist = $prod->showcampo6();
			$kit = $prod->showcampo7();
			$lib_linha = $prod->showcampo8();
			$codcat = $prod->showcampo9();
			$codsubcat = $prod->showcampo10();
			$descres = $prod->showcampo11();
			
			$garext_12 = $prod->showcampo12();
			$garext_24 = $prod->showcampo13();
			$porc_garext_12 = $prod->showcampo14();
			$porc_garext_24 = $prod->showcampo15();
			$ponto_prod = $prod->showcampo16();
			$pvd = $prod->showcampo17();
			$fdist = $prod->showcampo18();
			$pvdcj = $prod->showcampo19();
			
			
			if ($var_codgrp == 66 or $var_codgrp == 70 or $var_codgrp == 58){
				$pvd = $pvd*$fatorx;
				$pvdcj = $pvdcj*$fatorx;
			}else{
				$pvd_custo = $pvd * $fatorusertabela_ata;
				$pvdcj_custo = $pvdcj * $fatorusertabela_ata;
				$pvd = $pvd * $fatorusertabela_ata*$fatormajor*$fatorx;
				$pvdcj = $pvdcj *$fatorusertabela_ata*$fatormajor*$fatorx;
			}
						
			$pvd14 = $pvd*1.01;
			$pvd28 = $pvd*1.024;
			
					#echo $pvd."nome = $nomeprod - $fatormajor - $fatorusertabela_ata";
			
			$pvdf = number_format($pvd, 2,',', '.');
			$pvdf = number_format($pvd, 2,',', '.');
			$pvd14f = number_format($pvd14, 2,',', '.');
			$pvd28f = number_format($pvd28, 2,',', '.');
			$pvdcjf = number_format($pvdcj, 2,',', '.');
			
			$datauc = str_replace('-','',$datauc);

			$anouc = substr($datauc,0,4);
			$mesuc = substr($datauc,4,2);
			$diauc = substr($datauc,6,2);

			
			if ($unidade =="CJ"){

				$pvvcjtotal = 0;
				$pvacjtotal = 0;

			$prod->listProdgeral("relacoes", "codprod=$codprod", $array3, $array_campo3 , "");

				for($u = 0; $u < count($array3); $u++ ){
				
				$prod->mostraProd( $array3, $array_campo3, $u );
				
				$codsubprod = $prod->showcampo2();
				$qtde = $prod->showcampo3();

				$prod->listProdSum("pvvcj, pvacj", "produtos", "codprod=$codsubprod", $array1, $array_campo1 , "");
			
			
				$prod->mostraProd( $array1, $array_campo1, 0 );

				$pvvcj = $prod->showcampo0();
				$pvacj = $prod->showcampo1();

				$pvvcjtotal = $pvvcjtotal + ($pvvcj*$qtde);
				$pvacjtotal = $pvacjtotal + ($pvacj*$qtde);
				}

			$pvv = number_format($pvvcjtotal,2,',','.'); 
			$pva = number_format($pvacjtotal,2,',','.'); 
			}

			if ($unidade == "UM"){$cor ="#D6E7EF";}else{$cor="#F3F8FA";}
			if ($hist == "Y"){$cor ="#F2E4C4";}
			if ($kit == "Y"){$cor ="#C7E9C0";}

		
			// CALCULA TODO O ESTOQUE
			$prod->clear();
			$prod->listProdU("qtde - reserva as estoque", "estoque" , "codprod = $codprod and codemp = $codempselect GROUP BY codprod");
			$estoque = $prod->showcampo0();
			#$qtde = $prod->showcampo0();
			#$reserva = $prod->showcampo1();

			#if ($reserva < 0 ){$reserva = 0;}
			#if ($qtde < 0 ){$qtde = 0;}
			#$estoque = $qtde - $reserva;
				
					// MARRETA PARA MOSTRAR ESTOQUE DA FABRICA 
				#echo "est=".$estoque."<BR>";
				
				if ($codempselect ==15){
					
					$prod->clear();
					$prod->listProdU("COUNT(*) est","codbarra", "codprod=$codprod and codemp=14 and tipo_fab <>'P' and codbarraped <> 1 GROUP by codprod ");
					$est_fab = $prod->showcampo0();
					$prod->clear();
					$prod->listProdU("SUM(reserva) as res","estoque", "estoque.codprod=$codprod and estoque.codemp=14");
					$res_fab = $prod->showcampo0();
					
					$estoque = $estoque + ($est_fab-$res_fab);
						#echo "est_fb=".$est_fab."<BR>";
				}
				#echo "est_t=".$estoque."<BR>";
			/*
			if ($codempselect == 15){$cond1 = "(ocprod.codemp = 14 or ocprod.codemp = 15)";$cond2 = " and codped_transf = 0";}else{$cond1 = "(ocprod.codemp = $codempselect)";$cond2 = "";}
			
			// VERIFICA QUANTIDADES COMPRADAS DESSE PRODUTO
			$prod->listProdU("SUM(qtdecomp)", "ocprod, oc ", "codprod = $codprod and ".$cond1." and hist<>1 and oc.codoc=ocprod.codoc and tipo_nf <> 'P' ".$cond2);
			$qtdecomp = $prod->showcampo0();
			$qtdecomp = $qtdecomp + $estoque;

			$prod->listProdSum("dataprevcheg","ocprod, oc", "codprod=$codprod and ".$cond1." and oc.hist <> 1 and oc.codoc=ocprod.codoc  and tipo_nf <> 'P' ".$cond2, $array77, $array_campo77, "ORDER BY dataprevcheg LIMIT 0,1" );
			$prod->mostraProd( $array77, $array_campo77, 0 );
			$dataprevcheg = $prod->showcampo0();
			$dataprevf = $prod->fdata($dataprevcheg);
			if ($dataprevcheg == ""){$dataprevf = "SEM PREVISAO";}

			$kit_no = 0;$linha_no=0;
	if ($estoque > 0){
		$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
	}
	if (($estoque == 0 OR $estoque < 0) and $qtdecomp > 0){
			$alarm = "<IMG SRC='images/est_prev.gif' alt='DATA PREVISAO CHEGADA:$dataprevf' BORDER=0 ><br>$qtdecomp"; //PREVISAO DE COMPRA
	}					
	if (($estoque == 0 OR $estoque < 0) and $qtdecomp <= 0){
			if ($unidade <> "CJ"){
				$alarm = "<IMG SRC='images/est_no.gif'  BORDER=0 >"; // SEM ESTOQUE
				if ($kit == "Y"){$kit_no = 1;}else{$kit_no = 0;}
				if ($lib_linha == "Y"){$linha_no = 0;}else{$linha_no = 1;}
			}else{
				$alarm = "<IMG SRC='images/est_ok.gif'  BORDER=0 >"; // COM ESTOQUE
			}
		
	}
*/
	
		if ($lib_linha == "Y"){$linha_no = 0;}else{$linha_no = 1;}
		if ($kit == "Y"){$kit_no = 1;}else{$kit_no = 0;}

	if ($xcodcat <> $codcat){
		$prod->clear();
	$prod->listProdU("nomecat", "categoria" , "codcat = $codcat");
	$nomecat = $prod->showcampo0();
	
echo("
<tr bgcolor=''> 
			
			<td width='80%' height='0' colspan='6'>
            <img border='0' src='images/seta_laranja.gif' width='11' height='9'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF66000'>
            $nomecat</font></b><hr></td>
			
	   </tr>
");
		}
$xcodcat = $codcat;

if ($xcodsubcat <> $codsubcat){
		$prod->clear();
	$prod->listProdU("nomesubcat", "subcategoria" , "codsubcat = $codsubcat");
	$nomesubcat = $prod->showcampo0();
	
echo("
<tr bgcolor=''> 
			
			<td width='80%' height='0' colspan='6' align = 'left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img border='0' src='images/seta1-a.gif' width='5' height='11'>&nbsp;<b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#93BEE2'>
            $nomesubcat</font></b></td>
			
	   </tr>
");
		}
$xcodsubcat = $codsubcat;

	
	#echo("es=$pvd - $kit_no<br>");
	if ($kit_no <> 1  and $pvd > 0 and $estoque > 0){

		echo("
		<tr bgcolor='$cor'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codprod</font></td>
			<td width='55%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#808080'>$descres</font></td>
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$unidade</font></td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pvdf</b>"); if ($pvdcj <> $pvd){ echo("<br>FAT DIR: $pvdcjf");}echo("</font></td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pvd14f</b></font></td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$pvd28f</b></font></td>
			
			
			
	   </tr>
		");
	} // KIT SEM ESTOQUE
	 }

		echo("
				</table>
		");
}

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;



if ($impressao <> 1 ){ echo "<BR><BR>"; #include ("sif-rodapelimpo.php");
}

}
?>
       
