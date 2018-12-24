

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by dataos DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "RECEBIBENTO DE O.S.";
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
		$allemp = $prod->showcampo17();
		$allcx = $prod->showcampo18();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp =="N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
			if ($codcxvend <> 0){$codcxselect = $codcxvend;}
		}

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$dataatual = $prod->gdata();

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("os_fin_forma_grupo", $uregfgrupo);


		$prod->listProdSum("codos, codformagrupo ", "os_temp", "codemp = $codempselect", $array48, $array_campo48, "" );
		for($i = 0; $i < count($array48); $i++ ){
			if ($i <> 0){$condicao_os .= " OR ";}
			$prod->mostraProd( $array48, $array_campo48, $i );
			$codos_select = $prod->showcampo0();
			$codformagrupo = $prod->showcampo1();
			$condicao_os .= " codos = $codos_select ";
			$codos .= "$codos_select:";

				$prod->clear();
				$prod->listProd("os", "codos=$codos_select");
				$prod->setcampo49($uregfgrupo);  // FORMAGRUPO
				$prod->upProd("os", "codos=$codos_select");
		}

		// LISTA TODOS OS REGISTROS
		$prod->listProdU("codcx, hist", "fin_cxsaldo", "codcxsaldo = $codcxsaldoselect");
		$codcxselect = $prod->showcampo0();
		$hist_saldo = $prod->showcampo1();
		
	if ($hist_saldo <> 1){

		// INSERE PARCELAS NO BANCO DE DADOS
    	$prod->listProdSum("datavenc, tipo, SUM( vp ), parcpg, numcheq, banco, agencia, conta, codos","os_parcelas", $condicao_os , $array612, $array_campo612 , "GROUP  BY datavenc, tipo ORDER BY datavenc ");

		

		$errof = 1;
		$contador = count($array612);
		#echo("c=$contador<bR>");
		for($i = 0; $i < count($array612); $i++ ){

			$erro[$i]=1;

			$prod->mostraProd( $array612, $array_campo612, $i );
			$datavenc = $prod->showcampo0();
			$opcaixa = $prod->showcampo1();
			$valorp = $prod->showcampo2();	
			$codos_parc = $prod->showcampo8();	

			$prod->listProdU("codcliente", "os", "codos=$codos_parc ");
			$codcliente = $prod->showcampo0();
			

			#echo("$valorp - $opcaixa - $datavenc - $contador<br>");
			
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($uregfgrupo);
			$prod->setcampo2($banco[$i]);
			$prod->setcampo3($agencia[$i]);
			$prod->setcampo4($conta[$i]);
			$prod->setcampo5($numch[$i]);
			$prod->setcampo6($opcaixa);
			$prod->setcampo7($valorp);
			$prod->setcampo11($datavenc);
			$prod->addProd("os_fin_forma", $uregftemp);

			#echo("opcx=$opcaixa<br>");

			if ($parcpg <> "OK"){
							
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
			
			#echo("cx=$caixa<br>bco=$bco<br>car=$car<br>cap=$cap<br>tipoparc=$tipoparc<bR>");

			#if ($tipoparc == "CX" ){

			// INSERE PARCELAS NOS REPECTIVOS CAMPOS DA FORMAPG

				if ($caixa) {

					if ($errof <> 0){
				
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
						$prod->setcampo4($descricao);
						$prod->setcampo5($dataatual);
                    	if ($caixa =="C"){
							$prod->setcampo6($valorp);
                        }
                        if ($caixa =="D"){
							$prod->setcampo7($valorp);
						}
						if ($caixa =="CD"){
                           	$prod->setcampo6($valorp);
                        	$prod->setcampo7($valorp);
						}
						$prod->setcampo9($codped);
						$prod->setcampo11($login);
						$prod->setcampo12($uregfgrupo); 
						$prod->addProd("fin_cxlanc", $ureglanc);

						
					if ($codcxsaldoselect == 0){
						
						$erro_aud[$i] = 0;
						$msg_aud[$i] = "Algum erro ocorreu nessa operação";
					}

						

					} //ERRO
				}

				if ($car) {

					if ($errof <> 0) {
				
					#if ($pnumdoc == "S" and $numdoc[$codparcped] == ""){
						
						#$erro[$i] = 0;
						#$msg[$i] = "O NUM. DOCUMENTO da Parcela $i não foi preenchido";

					#}else{
						//INSERE NO CAR
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($numdoc[$codparcped]);
						$prod->setcampo2($opcaixa);
						$prod->setcampo4($codcliente);
						$prod->setcampo5($descricao);
						$prod->setcampo6($datavenc);
						$prod->setcampo7($nf);
						$prod->setcampo13("N");  // HISTORICO
						$prod->setcampo14($codped);  
						$prod->setcampo8($valorp);
						$prod->setcampo17($codempselect);
						$prod->setcampo20($uregfgrupo);
					
						$prod->addProd("fin_car", $uregcar);
					#}

					} //ERRO
					
				}

				if ($bco) { 

					if ($errof <> 0) {

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$codvendped ");
						$codconta = $prod->showcampo0();
					}
					

					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valorp);
						}else{
							$prod->setcampo5($valorp);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);
					$prod->setcampo14($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

					} //ERRO
			

				}

				if ($inschtab == "S") { 

					if ($errof <> 0) {

											
					//INSERE CHEQUES
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codped);  
					$prod->setcampo2($opcaixa);
					$prod->setcampo3($banco[$i]);
					$prod->setcampo4($agencia[$i]);
					$prod->setcampo5($conta[$i]);
					$prod->setcampo6($numch[$i]);
					$prod->setcampo7($valorp);
					$prod->setcampo8($datavenc);
					$prod->setcampo9("CX");
					$prod->setcampo10($uregopera);
					$prod->setcampo11($ureglanc);
					$prod->setcampo12($codempselect);
					$prod->setcampo13($codcxselect);
					$prod->setcampo14($uregfgrupo);
					$prod->setcampo16('NO');
					$prod->setcampo18('NO');
					$prod->setcampo20($codcxsaldoselect);

					$prod->addProd("fin_cheques", $uregcheq);

					} //ERRO
			

				}

				if ($errof <> 0 and $erro[$i] <> 0){


					$prod->listProdgeral("os_temp", "codemp = $codempselect", $array48, $array_campo48, "" );
					for($k = 0; $k < count($array48); $k++ ){
						$prod->mostraProd( $array48, $array_campo48, $k );
						$codos_select = $prod->showcampo0();

						$prod->listProdgeral("os_parcelas", "codos = $codos_select", $array49, $array_campo49, "" );
						for($j = 0; $j < count($array49); $j++ ){
							$prod->mostraProd( $array49, $array_campo49, $j );
							$codparcos = $prod->showcampo0();

							$prod->clear();
							$prod->listProd("os_parcelas", "codparcos=$codparcos");
							$prod->setcampo10("OK");
							$prod->upProd("os_parcelas", "codparcos=$codparcos");

						}
					}
					
				}		
				

			
				
			} // ESTA PARCELA JA FOI PAGA 


			#} //TIPO PARCELA == FT

		
		
		$errof = $errof*$erro[$i];

		#echo("e=$errof");

		} //FOR	
		
		//DELETA FORMA PG TEMPORARIA
		#$prod->delProd("os_fin_forma_temp", "codpgforma=$codpgforma");
		#$prod->delProd("os_fin_forma_grupo_temp", "codemp = '$codempselect'");
		$prod->delProd("os_temp", "codemp = '$codempselect'");
		
     }else{
      $errof = 0; $msgf = "CAIXA FECHADO - NÃO PODE RECEBER LANÇAMENTOS";
     }// CAIXA FECHADO

			#echo("e=$errof");		

			if ($errof <> 0){


	$prod->listProdSum("codos", "os", "codformagrupo = '$uregfgrupo'", $array488, $array_campo488, "" );
		for($i = 0; $i < count($array488); $i++ ){
			$prod->mostraProd( $array488, $array_campo488, $i );
			$codos = $prod->showcampo0();

			#echo("os = $codos");
		

				//VERIFICA SE TODAS AS PARCELAS FORAM PAGAS
				$prod->listProdSum("COUNT(*) as pg", "os_parcelas", "codos=$codos and parcpg ='NO'", $array613, $array_campo613, "order by datavenc" );
				$prod->mostraProd( $array613, $array_campo613, 0 );
				$numparcpg = $prod->showcampo0();

				
					// ATUALIZA STATUS DO PEDIDO
					$prod->clear();
					$prod->listProd("os", "codos=$codos");
					$xstatus_os = $prod->showcampo16();
					if ($numparcpg == 0 ){
						$prod->setcampo35("OK"); // CAIXA
						if ($xstatus_os == "LIB"){
							$prod->setcampo36("OK"); // LIB ENTREGA
						}
					}
					$prod->upProd("os", "codos=$codos");

					// PESQUISA POR ALGUMA OCORRENCIA DO STATUS
					$prod->listProdgeral("os_status", "codos=$codos and statusped='CAIXA'", $array614, $array_campo614 , "");

					if (count($array614) == 0){

						// ATUALIZA STATUS DA TABELA
						$prod->clear();
						$prod->setcampo0("");
						$prod->setcampo1($codos);
						$prod->setcampo2($dataatual);
						$prod->setcampo3("CAIXA");
						$prod->setcampo4($login);

						$prod->addProd("os_status", $ureg);

					}

				$prod->listProdU("IF( ckmlb = 'NO', 'S', 'N' ) ", "os", "codos=$codos ");
				$comissao_ok = $prod->showcampo0();

				#echo("comi = $comissao_ok");

				if ($comissao_ok == 'S'){

					$prod->listProdU("mlb, vc, fatorcomissao, tipo, os.codvend_tec, codbarra, vs, fatorcomissao_serv, codtipo_serv ", "os, vendedor", "codos=$codos and os.codvend_tec=vendedor.codvend");
					$ped_mlb = $prod->showcampo0();
					$ped_vc = $prod->showcampo1();
					$ped_fatorcomissao = $prod->showcampo2();
					$ped_tipo = $prod->showcampo3();
					$ped_codvend = $prod->showcampo4();
					$ped_codbarra = $prod->showcampo5();
					$ped_vs = $prod->showcampo6();
					$ped_fatorcomissao_serv = $prod->showcampo7();
					$ped_codtipo_serv = $prod->showcampo8();

					if ($ped_codtipo_serv == 2 and $ped_mlb < 0){$ped_mlb = 0;}

					if ($ped_tipo == 'R'){$valorp = $ped_mlb;}
					if ($ped_tipo == 'V'){$valorp = $ped_fatorcomissao*$ped_mlb;}
					if ($ped_tipo == 'C'){$valorp = $ped_fatorcomissao*$ped_mlb;}
					if ($ped_tipo == 'A'){$valorp = $ped_fatorcomissao*$ped_vc;}

					if ($ped_tipo == 'V'){$valorp_serv = $ped_fatorcomissao_serv*$ped_vs;}
					if ($ped_tipo == 'C'){$valorp_serv = $ped_fatorcomissao_serv*$ped_vs;}
					if ($ped_tipo == 'R'){$valorp_serv = $ped_fatorcomissao_serv*$ped_vs;}
					if ($ped_tipo == 'A'){$valorp_serv = $ped_fatorcomissao_serv*$ped_vs;}
					
					#echo("codconta1=$codconta <br> mlb = $ped_mlb");

					if (!$codconta){
						$prod->listProdU("codconta", "fin_bcoconta", "codvend=$ped_codvend");
						$codconta = $prod->showcampo0();
					}
					
					#echo("codcont2=$codconta");
					//OBS: o codconta tem que ser passado para se efetuar a operacao
						
					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.02");
					$prod->setcampo3("Comissão O.S. Vendas");
					if ($valorp >= 0){
							$valorpf = abs($valorp);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);
					$prod->setcampo14($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta);  //
					$prod->setcampo2("00.03");
					$prod->setcampo3("Comissão O.S. Serviço");
					if ($valorp_serv >= 0){
							$valorpf = abs($valorp_serv);
							$prod->setcampo4($valorpf);
						}else{
							$valorpf = abs($valorp_serv);
							$prod->setcampo5($valorpf);
						}
					$prod->setcampo6($dataatual);
					$prod->setcampo7($dataatual);
					$prod->setcampo8("N");
					$prod->setcampo11($codped);
					$prod->setcampo13($login);
					$prod->setcampo14($uregfgrupo);

					$prod->addProd("fin_bcomov", $uregbcomov);

					// ATUALIZA STATUS DO PEDIDO
					$prod->clear();
					$prod->listProd("os", "codos=$codos");
					$prod->setcampo31("OK"); // COMISSAO PAGA
					$prod->upProd("os", "codos=$codos");
				
						
				}
		
		}//FOR
				
						
			}else{

				for($i = 0; $i < count($array612); $i++ ){

					$msgf .= "<p>$msg[$i]</p>";
				}

				$Actionter = "lock";
				$prod->msggeral("$msgf", "ERRO", "$PHP_SELF?Action=update&codos=$codos&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&pgold=$pgold&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect", 0);

			}
		
		
		$Actionsec = "list";
        break;

		

    case "update":

		$prod->clear();
		$prod->setcampo1($dataatual);
		$prod->addProd("os_fin_forma_grupo_temp", $uregfgrupo);

		$codfgruposelect = $uregfgrupo;
	
		// COPIA CODFGRUPO PARA CADA CONTA A SER PAGA
		$prod->clear();
		$prod->listProdgeral("os_temp", "codemp=$codempselect", $array21, $array_campo21, "" );

					
		for($i = 0; $i < count($array21); $i++ ){
			
			
			$prod->mostraProd( $array21, $array_campo21, $i );

			$codostemp = $prod->showcampo0();
					
			$prod->setcampo49($uregfgrupo);

			$prod->upProd("os_temp", "codos=$codostemp");
		
		}

				
		 break;

	 case "list":

		$Actionsec="list";
			
		 break;


	 case "delete":
		
		$Actionsec="list";
	    break;

	case "inscontapg":

		
			//INSERE NO CAP
			$prod->clear();
			$regnum = $prod->listProd("os_temp", "codos=$codos");
			if ($regnum == 0){ 
				$prod->listProd("os", "codos=$codos");
				$prod->setcampo49($codfgruposelect);
				$prod->addProd("os_temp", $uregcap);
			}

		$Actionsec="list";
				
		 break;
	
	case "delcontapg":

			//INSERE NO CAP
			$prod->delProd("os_temp", "codos=$codos");
			
		$Actionsec="list";
				
		 break;


	case "delformapg":

			//INSERE NO CAP
			$prod->delProd("os_fin_forma_temp", "codpgforma=$codpgformaselect");
		
				
		 break;


	case "reajuste":

		

			// INSERE PARCELAS NO BANCO DE DADOS
			 $prod->listProdgeral("pedidoparcelas", "codped=$codped", $array612, $array_campo612 , "order by datavenc");
			 $pendfpg=1;		
			 for($i = 0; $i < count($array612); $i++ ){
			
				$prod->mostraProd( $array612, $array_campo612, $i );
				$codparcped = $prod->showcampo0();
				$xtipoopcaixa = $prod->showcampo4();

				$prod->mostraProd( $array612, $array_campo612, $i );
				$prod->setcampo5($numch[$i]);
				$prod->setcampo6($banco[$i]);
				$prod->setcampo7($agencia[$i]);
				$prod->setcampo8($conta[$i]);

				$prod->upProd("pedidoparcelas", "codparcped=$codparcped");

			 }

				// ATUALIZA BANCO DE DADOS DE PEDIDOS
				$prod->listProd("pedido", "codped=$codped");
				
				$prod->setcampo51("OK");  // CONFERENCIA DE FORMA PG

				$prod->upProd("pedido", "codped=$codped");

	

	echo("cfpg=$confere_fpg");

	$Action = "update";
		
	    break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	
	$palavrachave1 = strtolower($palavrachave);
		$statuspesq1 = strtolower($statuspesq);
		
		$campopesq = "nome";
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and";
		$condicao4 = " ((os.status = 'LIB' and os.cancel <> 'OK') and os.caixa <> 'OK'  ) and ";
		
			$condicao3 = $condicao4;
				

		//PESQUISA POR NOME CLIENTE
		if ($statuspesq1){
							
			$condicao3 .= " LCASE(os.status) like '%$statuspesq1%' and ";
		}

		//PESQUISA POR STATUS
		if ($palavrachave1){
							
			$condicao3 .= $condicao2;
		}

		//PESQUISA POR NOME VENDEDOR
		if ($tipo_servpesq){
							
			$condicao3 .= " os.codtipo_serv = '$tipo_servpesq' and ";
		}
		
		//PESQUISA POR CODBARRA
		if ($codpedpesq){
							
			$condicao3 .= " os.codbarra='$codpedpesq' and";
		}
		
	
				$condicao3 .= " os.codemp='$codempselect'";
				$condicao3 .= " and os.hist = '$hist'  ";
				$condicao3 .= " and os.codcliente=clientenovo.codcliente ";
				#$condicao3 .= " and os.codvend_tec=vendedor.codvend ";


		#echo("$condicao3"); 
		

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "os, clientenovo", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, os.codcliente, os.codvend, dataos, dataprevent, status, horaprevent, nf, libentr, codbarra, caixa, clientenovo.nome, fat, modped, codtipo_serv, codvend_tec, hist", "os, clientenovo", $condicao3, $array, $array_campo, $parm );

		
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "RECEBIMENTO DE PEDIDO";

include("sif-topolimpo.php");


echo("
<script language='JavaScript'>



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
 var strXBanco;
 var strXAgencia;
 var strXConta;
 var strXNum;
 var oini;

 oini=0;

 for (cont = 1; cont <= qtde; cont++)
 {
	
  for (o = oini; o < (oini+10); o++)
  {
   strTipo = oini;
   strXBanco = oini + 1;
   strXAgencia = oini + 2;
   strXConta = oini + 3;
   strXNum = oini + 4;
   strBanco = oini + 5;
   strAgencia = oini + 6;
   strConta = oini + 7;
   strNum = oini + 8;

 		cname = form.elements[strTipo].value + ' - ' + form.elements[strBanco].value + ' - ' + form.elements[strBanco].value;
			
		if ((verificaNumerico (form.elements[strBanco].value, 1) != 1) || (verificaNumerico (form.elements[strNum].value, 1) != 1))
		{
			alert ('Banco e Num Cheque da Parcela ' + cont + ' - ' + cname +' formato inválido');
			eval ('form.elements[strBanco].focus ()');

		return false;
		}

		if ((form.elements[strTipo].value == '02.01') && ((form.elements[strBanco].value == '') ||  (form.elements[strNum].value == '') ))
		{
			alert ('Banco e Num Cheque da Parcela ' + cont +  ' preenchimento obrigatório');
			eval ('form.elements[strBanco].focus ()');

		return false;
		}

		
  }
	  oini = oini + 10; 
 }

	
	return true;
	
}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strPValor;
	var strPBanco;
	var strPAgencia;
	var strPConta;
	var strPNum;
	var valor;

	cpos = (posicao*10) + 10; 
	
    strPBanco = cpos - 5;
    strPAgencia = cpos - 4;
    strPConta = cpos - 3;
    strPNum = cpos - 2;
	strPValor = cpos - 1;
	
	valor = form.elements[strPValor].value;

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strPValor].focus ()');
				
	}else{
	
	form.elements[strPBanco].value = valor.substring (1,4);
	form.elements[strPAgencia].value = valor.substring (4,8);
	form.elements[strPConta].value = valor.substring (23,32);
	form.elements[strPNum].value = valor.substring (13,19);

	form.elements[strPValor].disabled=true;
	
	}

	}
 
}

// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function verificaObrigRec(form)
{

		if (form.contratoselect.value == 'ESCOLHA')
		{
			alert ('Recebimento de contrato: escolha obrigatória');
			eval ('form.contratoselect.focus ()');

		return false;
		}

		if ((form.conf_fpg.value == '') || (form.conf_fpg.value == 'NO'))
		{
			alert ('Confirmação da Forma de Pagamento: operação obrigatória');
			
		return false;
		}

	return true;
 
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

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "insert" or $Action == "update" or $Action == "delete"):
	

		$codformagruposelect = 1;

		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, os_temp.codcliente, os_temp.codvend, dataos, dataprevent, status, horaprevent, nf, libentr, codbarra, caixa, clientenovo.nome, fat, modped, codtipo_serv, codvend_tec, hist", "os_temp, clientenovo", "os_temp.codemp='$codempselect' and os_temp.hist = '$hist' and os_temp.codcliente=clientenovo.codcliente", $array78, $array_campo78, $parm );
	
	

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
			
	
					<BR><BR><bR>
 <a name='contapg'></a>
		

<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - RECEBIMENTO(S) SELECIONADO(S)</b> </font></td>
  </tr>
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
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
	  <td width='40%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
	   <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array78); $i++ ){

		 if ($i <> 0){$condicao_os .= " OR ";}
			
			$prod->mostraProd( $array78, $array_campo78, $i );

			$codos = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataos = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$libentr = $prod->showcampo8();
			$codbarra = $prod->showcampo9();
			$caixa = $prod->showcampo10();
			$nomecliente = $prod->showcampo11();
			$fat = $prod->showcampo12();
			$modped = $prod->showcampo13();
			$codtipo = $prod->showcampo14();
			$codvend_tec = $prod->showcampo15();
			$hist = $prod->showcampo16();
	
			// FORMATACAO //
			$dataosf = $prod->fdata($dataos);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataos,$dataatual);

			$prod->clear();
			$prod->listProdU("tipo", "os_tipo", "codtipo_serv='$codtipo'");
			$tipo_serv = $prod->showcampo0();
				
			$condicao_os .= "codos = $codos ";

		echo("
		<tr bgcolor='#F2E4C4'> 
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codbarra</b></font></td>
		<td width='40%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomecliente</font></td>
		<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$tipo_serv</font></b></td>
		 <td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></B></font></font></td>
		");

	$valortotal = $valortotal + $valordevido;

	 }

	$valortotalf = number_format($valortotal,2,',','.');

	 echo("
	  <tr bgcolor='#F3F3F3'> 
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='60%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b></font></b></td>
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
");

echo("$condicao_os");

  $prod->listProdSum("datavenc, tipo, SUM( vp ), parcpg, numcheq, banco, agencia, conta","os_parcelas", $condicao_os , $array61, $array_campo61 , "GROUP  BY datavenc, tipo ORDER BY datavenc ");

  $nump = count($array61);
  $cadErro = 0;


echo("

	
<form method='POST' action='$PHP_SELF?Action=insert'  name='Form' onSubmit = 'if (verificaObrigFPG(Form, $nump, $cadErro)==false) return false'>
   

 <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
		<td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>TIPO</b></font></td>
        <td width='15%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC.</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>BCO</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>AG</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>C.C.</b></font></td>
		<td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>NUM.CH</b></font></td>
		<td width='5%'><font size='1' face='Verdana' color='#ffffff'><b>PG</b></font></td>
      </tr>
");


	for($ji = 0; $ji < count($array61); $ji++ ){

			
			
			$prod->mostraProd( $array61, $array_campo61, $ji );

			$datavenc = $prod->showcampo0();
			$valorparcela = $prod->showcampo2();
			$tipo = $prod->showcampo1();
			
			$numchec = $prod->showcampo4();
			$banco = $prod->showcampo5();
			$agencia = $prod->showcampo6();
			$conta = $prod->showcampo7();
			$parcpg = $prod->showcampo3();
			$datavencf = $prod->fdata($datavenc);
			$valorparcelaf = number_format($valorparcela,2,',','.'); 
			$prod->listProd("formapg", "opcaixa='$tipo'");
				$descricao = $prod->showcampo1();

if ($parcpg == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
			
echo("
	<input type='hidden' name='tipo[$ji]' value='$tipo'>
	<input type='hidden' name='xbanco[$ji]' value='$banco'>
	<input type='hidden' name='xagencia[$ji]' value='$agencia'>
	<input type='hidden' name='xconta[$ji]' value='$conta'>
	<input type='hidden' name='xnumch[$ji]' value='$numchec'>
	<tr bgcolor='$bgcorlinha'>
		<td width='20%' rowspan='3'><font size='1' face='Verdana'  ><b>$descricao</b></font></td>
		<td width='15%' ><font size='1' face='Verdana' >$datavencf</font></td>
		<td width='10%' ><font size='1' face='Verdana'><b>R$ $valorparcelaf</b></font></td>
        <td width='10%'><font size='1' face='Verdana'>$banco</font></td>
        <td width='10%'><font size='1' face='Verdana'>$agencia</font></td>
		 <td width='10%'><font size='1' face='Verdana' >$conta</font></td>
        <td width='10%'><font size='1' face='Verdana' >$numchec</font></td>
		<td width='5%' rowspan='3' ><font size='1' face='Verdana' color ='$cor1'><b>$parcpg</B></font></td>
      </tr>
");
if ($tipo <> "02.01" or $parcpg == "OK"){
echo("

 <tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF0000'><b>&nbsp;</b></font></td>
	     <td width='10%' ><input type='hidden' name='banco[$ji]' size='3' maxlength='3' value = '$banco' ></td>
        <td width='10%' ><input type='hidden' name='agencia[$ji]' size='4' maxlength='4' value = '$agencia' ></td>
        <td width='10%' ><input type='hidden' name='conta[$ji]' size='6' maxlength='10' value = '$conta'></td>
	    <td width='10%' ><input type='hidden' name='numch[$ji]' size='6' maxlength='6' value = '$numchec'></td>
	  
    </tr>
		 <tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>&nbsp;</b></font></td>
	      <td width='40%' colspan='4'><input type='hidden' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'></td>
    </tr>
");
}else{
	echo("

		 <tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF0000'><b></b></font></td>
	     <td width='10%' ><input type='text' name='banco[$ji]' size='3' maxlength='3'></td>
        <td width='10%' ><input type='text' name='agencia[$ji]' size='4' maxlength='4'></td>
        <td width='10%' ><input type='text' name='conta[$ji]' size='6' maxlength='10'></td>
	    <td width='10%' ><input type='text' name='numch[$ji]' size='6' maxlength='6'></td>
		
    </tr>
		 <tr bgcolor='$bgcorlinha'>
    		 <td width='25%' align='right' colspan='2'><font size='1' face='Verdana' color='#FF9933'><b>CODBARRA CHEQUE:</b></font></td>
	      <td width='40%' colspan='4'><input type='text' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $ji);'></td>
    </tr>
");
}
	}

if ($conf_fpg == "NO"){$cor1 ="#FF0000";}else{$cor1="#008000";}
echo("
    </table>

		<br>
    <table border='0' width='550' cellspacing='0' cellpadding='2'>
      <tr><td width='50%'>
        <p align='center'><font size='1' face='Verdana' color='#FF9933'><b><font color='$cor1'></font></b></font></td>
        
        <td width='50%' align='center'><input class='sbttn' type='submit' value='RECEBER O.S.' name='B1'></td>
      </tr>
    </table>


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
			
			


		</form>


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
      <td width='70%' > <form method='POST' action='$PHP_SELF?Action=list' name='Form'>	  
	   <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		
		COD: <input type='text' name='codpedpesq' size='14' maxlength='13'> 
		CLIENTE: <input type='text' name='palavrachave' size='20'>
		STATUS: <input type='text' name='statuspesq' size='20'>
		<select size='1' class=drpdwn name='tipo_servpesq' >                         
	");

	$prod->listProdgeral("os_tipo", "", $array6, $array_campo6 , "order by tipo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$tipo_serv = $prod->showcampo1();
			$codtipo_serv = $prod->showcampo0();

	echo("		
		<option value='$codtipo_serv'>$tipo_serv</option>
		");
	
	}

echo("	
		<option value='' selected>ESCOLHA</option>

	  </select></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
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
		<option value='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>$nomeemp</option>
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>EMPRESA
        ATUAL:<br>
        </b>$nomeempold</font></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
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

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='$bgcortopo'> 
    <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='31%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    
		<td width='12%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
	 <td width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA OS</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAIXA</font></b></div>
    </td>
	<td width='14%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
  </tr>
	");

	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

		
			// DADOS //
			$codos = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataos = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$libentr = $prod->showcampo8();
			$codbarra = $prod->showcampo9();
			$caixa = $prod->showcampo10();
			$nomecliente = $prod->showcampo11();
			$fat = $prod->showcampo12();
			$modped = $prod->showcampo13();
			$codtipo = $prod->showcampo14();
			$codvend_tec = $prod->showcampo15();
			$hist = $prod->showcampo16();
	
			// FORMATACAO //
			$dataosf = $prod->fdata($dataos);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataos,$dataatual);
			
			$prod->clear();
			$prod->listProdU("tipo", "os_tipo", "codtipo_serv='$codtipo'");
			$tipo_serv = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codvend_tec'");
			$nomevend_tec = $prod->showcampo0();

			$bgcorlinha="#E5E5E5";
			if ($status == "ABERTA"){$bgcorlinha="#FFCC66";}
			if ($status == "MAN"){$bgcorlinha="#D6B778";}
			if ($status == "LIB"){$bgcorlinha="#EDE763";}
			if ($status == "ORC"){$bgcorlinha="#339966";}
			if ($status == "ENTR"){$bgcorlinha="#BFD9F9";}
			if ($status == "REPROV"){$bgcorlinha="#FFFFFF";}
			if ($status == "CANCEL"){$bgcorlinha="#E1AFAA";}
			
							

if ($libentr == "NO"){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($fat == "NO"){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($caixa == "NO"){$cor4 ="#FF0000";}else{$cor4="#008000";}


		echo("
			<tr bgcolor='$bgcorlinha'> 
			<td width='15%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=update&codos=$codos&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq'>$codbarra</font></b></a><br><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#FF0000'></font></td>
			<td width='31%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$nomecliente</b></font></td>
		
			<td align='center' width='12%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'>$tipo_serv</font></b></td>
			<td width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$dataosf</font></td>
			
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$status</b><br></font></td>
			<td align='center' width='5%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='$cor4'>$caixa</font></b></td>
		 <td width='14%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>");
if ($hist <> 1){
echo("
<a
href='$PHP_SELF?Action=inscontapg&codos=$codos&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&opcaixarec=$opcaixa&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#contapg'>Inserir</a>
");
}else{
echo("
PG
");
}
echo("
</b></font></td>
			</tr>
");
			 }//FOR
	
	echo("

				</table>
		");


}


/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////


/// CONTADOR DE PAGINAS ////
$compl= "codempselect=$codempselect&&codvendselect=$codvendselect&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&nomevendpesq=$nomevendpesq&pedlib=$pedlib&pgcx=$pgcx&codcxsaldoselect=$codcxsaldoselect";   
include("numcontg.php");




		echo("

					<BR><BR><bR>
 <a name='contapg'></a>
		");
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codos, os_temp.codcliente, os_temp.codvend, dataos, dataprevent, status, horaprevent, nf, libentr, codbarra, caixa, clientenovo.nome, fat, modped, codtipo_serv, codvend_tec, hist", "os_temp, clientenovo", "os_temp.codemp='$codempselect' and os_temp.hist = '$hist' and os_temp.codcliente=clientenovo.codcliente", $array78, $array_campo78, $parm );
		
echo("
<form method='POST' action='$PHP_SELF?Action=update&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'  name='Form7' enctype='multipart/form-data' >
<table width='550' border='0' cellspacing= '0' cellpadding='0' align='center'>
  <tr>
    <td><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#336699'>PARTE 
      II</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> - RECEBIMENTO(S) SELECIONADO(S)</b> </font></td>
  </tr>
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
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
	  <td width='40%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
	   <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></b></div>
    </td>
	
    
  </tr>
	");
	 
	 for($i = 0; $i < count($array78); $i++ ){
			
			$prod->mostraProd( $array78, $array_campo78, $i );

			$codos = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$dataos = $prod->showcampo3();
			$dataprevent= $prod->showcampo4();
			$status= $prod->showcampo5();
			$horaprevent = $prod->showcampo6();
			$nf = $prod->showcampo7();
			$libentr = $prod->showcampo8();
			$codbarra = $prod->showcampo9();
			$caixa = $prod->showcampo10();
			$nomecliente = $prod->showcampo11();
			$fat = $prod->showcampo12();
			$modped = $prod->showcampo13();
			$codtipo = $prod->showcampo14();
			$codvend_tec = $prod->showcampo15();
			$hist = $prod->showcampo16();
	
			// FORMATACAO //
			$dataosf = $prod->fdata($dataos);
			$datapreventf = $prod->fdata($dataprevent);
			$dataatual = $prod->gdata();
			$difdias = $prod->numdias($dataos,$dataatual);

			$prod->clear();
			$prod->listProdU("tipo", "os_tipo", "codtipo_serv='$codtipo'");
			$tipo_serv = $prod->showcampo0();
				
			

		echo("
		<tr bgcolor='#F2E4C4'> 
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$codbarra</b></font></td>
		<td width='40%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomecliente</font></td>
		<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b>$tipo_serv</font></b></td>
		 <td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b><a
href='$PHP_SELF?Action=delcontapg&codos=$codos&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=$hist&codforselect=$codforselect&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#contapg'>Excluir</a></B></font></font></td>
		");

	$valortotal = $valortotal + $valordevido;

	 }

	$valortotalf = number_format($valortotal,2,',','.');

	 echo("
	  <tr bgcolor='#F3F3F3'> 
			<td width='20%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'><b></font></b></td>
			<td width='60%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1' color='#800000'><b></font></b></td>
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
");
if (count($array78) <> 0){
echo("
					<CENTER><input class='sbttn' type='submit' name='OK' value='RECEBER O.S. SELECIONADAS'></CENTER>
");
}
echo("
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
							 </form>
	");



endif;



/// INCLUSÃO DO RODAPE ////

include ("sif-rodapelimpo.php");
}

?>
       
