

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
$titulo = "CAR";
$subtitulo = "FINANCEIRO";

$tipopesq="for";

$Actionter = "unlock";


// CONFIGURA��O DE COR

$bgcortopo = "#86ACB5";
$bgcortopo1 = "#93BEE2";
$bgcorlinha = "#DADADA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();


	// PARA PAGINA DE SEGURANCA SECUNDARIA
		$prod->listProd("seguranca", "arquivo='iniciofin_car.php'");
		$pgcar = $prod->showcampo0();


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

		
		
			$Actionsec = "list";
			
	
        break;

		

    case "update":

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "inscofre":

			

		$Action="update";
				
		 break;

	 case "dellanccofre":

						
		 break;	


}

		
/// INCLUS�O DO TOPO ////

if ($Actionter == "unlock"){

$title = "CAR - CONTAS A RECEBER";

include("sif-topolimpo.php");


/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "update"):

			
	if ($saida == 1){$titulosec = "COFRE";$localch="CO";}else{$titulosec = "CAIXA";$localch="CX";}



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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>LISTAGEM DE BOLETAS EM ABERTO</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pgcar&amp;hist=$hist&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'><img border='0' src='images/bt-continuaped.gif' ><br>
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

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tr>
    <td><hr size='1'></td>
  </tr>
</table>

 <a name='formapg'></a>
	");		

			$condicao3 = " fin_car.numdoc = '' and (fin_car.opcaixa = '02.04' OR fin_car.opcaixa ='02.60') and ";
			$condicao3 .= "codemp='$codempselect' and ";
			$condicao3 .= "fin_car.codcliente=clientenovo.codcliente and ";
			$condicao3 .= "hist = 'N'";
			

			#echo("$condicao3");


				// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "fin_car, clientenovo", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("datavenc, numdoc, fin_car.opcaixa, fin_car.codcliente, valordevido, hist, descricao, nf, codcar, codped, datapg, valorpago, juros", "fin_car, clientenovo", $condicao3, $array, $array_campo, "ORDER BY clientenovo.nome" );


			
			#echo("$condicao3 - $numreg");
			
			// CRIA AS PAGINAS
			if ($desloc <> 0):
			  $totalpagina= ceil($numreg /$acrescimo);  
			else:
			  $totalpagina= ceil($numreg /$acrescimo);  
			  $pagina = 1;
			endif; 

			
	echo("

	<table width='550' border='0' cellspacing='1' align='center' cellpadding='2'>
	

	<tr> 
		<td width='540' colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>&nbsp;</font></td>
	</tr>
	<tr bgcolor='$bgcortopo'> 
    <td width='50%'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DADOS CLIENTE</font></b></div>
    </td>
	 <td width='15%'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAVENC.</font></b></div>
    </td>
	  <td width='15%' colspan='2'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATAFAT</font></b></div>
    </td>
	 <td width='20%' colspan='2'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>VALOR</font></b></div>
    </td>
	
    
  </tr>


	");
	 $prod->clear();
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$datavenc = $prod->showcampo0();
			$numdoc = $prod->showcampo1();
			$opcaixa = $prod->showcampo2();
			$codcliente = $prod->showcampo3();
			$valordevido = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$descricao = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$codcar = $prod->showcampo8();
			$codped = $prod->showcampo9();
			$datapg = $prod->showcampo10();
			$valorpago = $prod->showcampo11();
			$juros = $prod->showcampo12();
			$codbarra = "";
			if($codped <> 0){
			$codbarra = $prod->codbarra($codempselect,$codped, "PED");
			}
				
			// FORMATACAO //
			$datavencf = $prod->fdata($datavenc);
			$datapgf = $prod->fdata($datapg);
			$valordevidof = number_format($valordevido,2,',','.'); 
			$valorpagof = number_format($valorpago,2,',','.'); 
			$jurosf = number_format($juros,2,',','.'); 
			
			$xnomecliente = "";
			if($codped <> 0){
			$prod->clear();
			$prod->listProdU("codcliente, nome, cpf, cnpj, endereco, bairro, cidade, cep, estado", "clientenovo", "codcliente=$codcliente");
			$xcodcliente=	$prod->showcampo0();
			$xnomecliente = $prod->showcampo1();
			$xcpf=			$prod->showcampo2();
			$xcnpj=			$prod->showcampo3();
			$xendereco=		$prod->showcampo4();
			$xbairro=		$prod->showcampo5();
			$xcidade=		$prod->showcampo6();
			$xcep=			$prod->showcampo7();
			$xestado=		$prod->showcampo8();
			}

			if($codcliente <> 0){
			$prod->clear();
			$prod->listProdU("codcliente, nome, cpf, cnpj, endereco, bairro, cidade, cep, estado, numero, complemento", "clientenovo", "codcliente=$codcliente");
			$xcodcliente=	$prod->showcampo0();
			$xnomecliente = $prod->showcampo1();
			$xcpf=			$prod->showcampo2();
			$xcnpj=			$prod->showcampo3();
			$xendereco=		$prod->showcampo4();
			$xbairro=		$prod->showcampo5();
			$xcidade=		$prod->showcampo6();
			$xcep=			$prod->showcampo7();
			$xestado=		$prod->showcampo8();
			$xnumero =      $prod->showcampo9();
    		$xcomplemento = $prod->showcampo10();

			}

			if($codped <> 0){
			$prod->clear();
			$prod->listProdU("datastatus", "pedidostatus", "codped=$codped and statusped = 'FAT'");
			$xdatafat=	$prod->showcampo0();
			$datafatf = $prod->fdata($xdatafat);
			}
			
			$bgcorlinha="#E0F3E1";
			#if ($hist == "N"){$bgcorlinha="#F2E4C4";}
			#if ($hist == "S"){$bgcorlinha="";}

			if ($opcaixa == "02.60"){$boltipo="TORUS";}else{$boltipo = "";}

		echo("
	<tr bgcolor='$bgcorlinha'> 
		<td width='50%' >
          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$xcodcliente - $xnomecliente</b><br>$xendereco - $xnumero - $xcomplemento - $xbairro - $xcidade - $xestado - $xcep<br><font color='#FF6600'>$xcpf
      $xcnpj<br>
		
      <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#336699'>
      <b>NOTA FISCAL:<br>
      </b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'>
");
$prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf = $prod->showcampo0();
			$nf_ped = $prod->showcampo2();
			$valornf = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.'); 	
echo("
		$nf_ped<br>
			");
	}
	echo("
	
</font>
	</font></font></p>
        </td>
	<td width='15%' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datavencf<br><b>$boltipo</b></font></td>
	<td width='15%' colspan='2' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$datafatf</font></td>
			<td width='20%' colspan='2' >
              <p ><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' >DEV: <b>R$ $valordevidof</B><BR>REC: R$ $valorpagof<BR><font color='#FF6600'>JUR: R$ $valorjurosf</font></font>
        </td>
	</tr>


		");

	

	 }

echo("

				</table>
			
");


	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INCLUS�O DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
