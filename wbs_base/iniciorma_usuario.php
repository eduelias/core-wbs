

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "rma";					// Tabela EM USO
$condicao1 = "codrma='$codrmaselect'";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datarma_ini limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codrma";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "RMA USUÁRIO";
$titulo = "RMA USUÁRIO";

$Actionter = "unlock";

if ($hist == ""){ $hist ="N";}


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendselect = $prod->showcampo1();
		$codvendselect = $prod->showcampo0();
		$tipovend = $prod->showcampo2();


$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$prod->clear();
		$prod->setcampo1($codprodselect);
		$prod->setcampo2($codcb_def);
		#$prod->setcampo3($codcb_nova);
		$prod->setcampo4("NOVA");
		$prod->setcampo5($laudo);
		$prod->setcampo6($tecnico);
		$prod->setcampo7($obs);
		$prod->setcampo8($dataatual);
		$prod->setcampo10($pant);
		$prod->setcampo11($codvendselect);
		$prod->setcampo12("N");
		if ($pant == "S"){
			$prod->setcampo14("$codbarra_def");
		}
		$prod->setcampo15("NO"); // CHECA PECA DEF
		$prod->setcampo16("NO"); // CHECA PECA NOVA
		
		$prod->addProd($tabela, $ureg);

		// ATUALIZA STATUS DA TABELA
		$prod->setcampo0("");
		$prod->setcampo1($ureg);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("NOVA");
		$prod->setcampo4($login);
			
		$prod->addProd("rma_status", $ureg);

		if ($codcb_def <> ""){
		// INSERE FLAG_RMA NA TABELA CODBARRA
		$prod->clear();
		$prod->listProd("codbarra", "codcb=$codcb_def");
		$prod->setcampo10("S");
		$prod->upProd("codbarra", "codcb=$codcb_def");

		}
		
				
		$Actionsec="list";
		
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVA $nomeform ";

        break;

    case "update":

		if ($retorno){
		
		//  PESQUISA PELA DATA GARANTIA NA TABELA CODBARRA
		$prod->clear();
		$prod->listProdSum("codcb, codbarra.codprod, datavencgar, codbarraped, pedido.codbarra, pedido.codvend, flag_rma, pedido.dataped", "codbarra, ocprod, pedido", "codbarra.codbarra='$codbarra_def' and codbarra.codoc=ocprod.codoc and codbarra.codped=pedido.codped and codbarraped = 1 ", $array_cb, $array_campo_cb, "");
		
		if (count($array_cb) <> 0 ){

			$prod->mostraProd( $array_cb, $array_campo_cb, 0 );
			$codcb = $prod->showcampo0();
			$codprod = $prod->showcampo1();
			$datavencgar = $prod->showcampo2();
			$codbarra = $prod->showcampo4();
			$codvend= $prod->showcampo5();
			$flag_rma= $prod->showcampo6();
			$dataped= $prod->showcampo7();
			$pant = "N"; // PECA ANTIGA
			
			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codvend'");
			$nomevend = $prod->showcampo0();

			$prod->clear();
			$prod->listProdU("nomeprod", "produtos", "codprod='$codprod'");
			$nomeprod = $prod->showcampo0();

			#echo("gar=$datavencgar fp= $dataped");
			
			// VERIFICA CONSITENCIA DE DATAS
			$prod->listProdMY("IF (DATE_FORMAT('$dataped' + INTERVAL 1 YEAR, '%Y-%m-%d') > NOW() , 'S', 'N')", "" , $array129, $array_campo129, "" );
			$prod->mostraProd( $array129, $array_campo129, 0 );
			$control = $prod->showcampo0();



			
			if ($control == 'S'){

				

				$prod->listProdMY("DATE_FORMAT('$dataped' + INTERVAL 1 YEAR, '%Y-%m-%d') ", "" , $array129, $array_campo129, "" );
				$prod->mostraProd( $array129, $array_campo129, 0 );
				$datagar = $prod->showcampo0();

				// GARANTIA OK

				// FORMATACAO //
				$datagarf = $prod->fdata($datagar);

				if($flag_rma <> "S"){

				$garantia ="<FONT SIZE='1' COLOR='#336600'><b>GARANTIA:</b> $datagarf</FONT>";
				$Action="insert";

				}else{

				$garantia ="<FONT SIZE='1' COLOR='#000099'><b>GARANTIA:</b> $datagarf<br> (Uma RMA com esse codbarra já foi inserida no sistema)</FONT>";
				$Action="update";
				$control = "N";
				}

							
			}else{

				// SEM GARANTIA
				$garantia ="<FONT SIZE='1' COLOR='#FF0000'><b>GARANTIA:</b> O prazo de garantia se esgotou!</FONT>";

			}

		}else{

			// PRODUTO NAO ENCONTRADO
			$pant = "S"; // PECA ANTIGA
			$garantia ="<FONT SIZE='1' COLOR='#FF3300'><b>CODBARRA NÃO ENCONTRADO</b></FONT><FONT SIZE='1' COLOR='#000000'><br>(O codigo de barra não foi encontrado no sistema novo, insira abaixo o código do produto para criar uma RMA. Esta ,por sua vez, estará sujeita à aprovação quanto a garantia.) </FONT>";

			if ($pesqsec == 1){

				//  PESQUISA POR NOME PROD
				if ($codprod_def <> ""){
				$prod->clear();
				$prod->listProdSum("nomeprod", "produtos", "codprod=$codprod_def", $array_prod, $array_campo_prod, "");
					
					if (count($array_prod) <> 0 ){

						$prod->mostraProd( $array_prod, $array_campo_prod, 0 );
						$nomeprod = $prod->showcampo0();
						$codprod = $codprod_def;
						$Action="insert";
						$control = "S";

					}else{

						$Action="update";
					}

				}

			}

		}
		

		} // RETORNO

		$desloc=0;
			
		
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;

	


	 case "ver":

		$prod->clear();
		$prod->listProd($tabela, $condicao1);
				
		$xcodrma = $prod->showcampo0();
		$xcodprod = $prod->showcampo1();
		$xcodcb_def = $prod->showcampo2();
		$xcodcb_nova = $prod->showcampo3();
		$xstatus = $prod->showcampo4();
		$xlaudo = $prod->showcampo5();
		$xtecnico = $prod->showcampo6();
		$xobs = $prod->showcampo7();
		$xpecaant = $prod->showcampo10();
		$xcodvend = $prod->showcampo11();
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$campopesq = "nomeprod";
		$palavrachave1 = strtolower($palavrachave);
	    $condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
	
		
	
			if ($palavrachave == "" ){
							
				$condicao3 .= " codvend='$codvendselect'";
				$condicao3 .= " and rma.codprod=produtos.codprod";
				$condicao3 .= " and rma.hist='$hist'";
						
			
			}else{
				
				$condicao3 .= $condicao2;
				$condicao3 .= " and codvend='$codvendselect'";
				$condicao3 .= " and rma.codprod=produtos.codprod";
				$condicao3 .= " and rma.hist='$hist'";
									

			}


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "rma, produtos", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codrma, produtos.codprod, produtos.nomeprod, codcb_def, codcb_nova, status, tecnico, datarma_ini, datarma_fim, rma.hist, codvend, pecaant", "rma, produtos", $condicao3, $array, $array_campo, $parm );

		
			$Action = "list";	
			
			// CRIA AS PAGINAS
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

if($Action <> "list" ):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'></font></b><b><font size='3' face='Verdana'><font color='#FF9933'>$nomeform</font><br>
                          </font><font face='Verdana' size='2' color='#93BEE2'>$nomeformsec</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist'><img border='0' src='images/bt-continuaped.gif' ><br>
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
                  <form method='POST' action='$PHP_SELF?Action=update'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='1' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#93BEE2' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            CODBARRA PEÇA DEFEITUOSA</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#93BEE2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' value='$codbarra_def' name='codbarra_def' size='30' > 
			                          <input class='sbttn' type='submit' name='Submit' value='Verificar CodBarra'>
                   
                              </font></td>
                          </tr>
							<tr>
                            <td width='26%' bgcolor='#FFFFFF'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color'#FF6600'>
                            STATUS DA GARANTIA:</font></b></td>
                            <td width='74%' bgcolor='#FFFFFF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                $garantia

								
			                              

                              </font></td>
                          </tr>
								  	
			               

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codprodselect' value='$codprod'>
				  <input type='hidden' name='pant' value='$pant'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
		          <input type='hidden' name='pg' value='$pg'>
					  <input type='hidden' name='hist' value='$hist'>
				  <input type='hidden' name='codcb_def' value='$codcb'>
				

                 <br> </form>
	");
			
							  if ($pant == "S"){
								  echo("

			 <form method='POST' action='$PHP_SELF?Action=update'  name='Form' enctype='multipart/form-data'>
							<tr>
                            <td width='26%' bgcolor='#FFFFFF'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color'#FF6600'>
                            COD. PRODUTO DEFEITUOSO:</font></b></td>
                            <td width='74%' bgcolor='#FFFFFF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                               <input type='text' value='$codprod_def' name='codprod_def' size='15' ><input class='sbttn' type='submit' name='Submit' value='Pesquisar'> 
			                          
                              </font></td>
                          </tr>

				   <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codprodselect' value='$codprod'>
				  <input type='hidden' name='pant' value='$pant'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
		          <input type='hidden' name='pg' value='$pg'>
					  <input type='hidden' name='hist' value='$hist'>
				  <input type='hidden' name='codcb_def' value='$codcb'>
					   <input type='hidden' name='codbarra_def' value='$codbarra_def'>
					      <input type='hidden' name='pesqsec' value='1'>
								  </form>
");
							  }

							  if ($control == "S"){
								  echo("
								  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data'>
                         <tr>
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                          <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size=3>
                            INFORMAÇÕES GERAIS DA RMA</font></b><hr>
                            <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber1'>
                              <tr>
                                <td width='100%' bgcolor='#F3F3F3' colspan='2'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF6600'>
                                PEÇA: <br>
                                </font>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>
                                $nomeprod</font></b></td>
                              </tr>
                              <tr>
                                <td width='50%' bgcolor='#F3F3F3'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
                                REVENDA:<br></b>
                                </font>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                                $nomevend</font></td>
                                <td width='50%' bgcolor='#F3F3F3'><b>
                                <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
                                PEDIDO</font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>:
                                <br>
                                </b></font>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                                $codbarra</font></td>
                              </tr>
                              <tr>
                                <td width='50%' bgcolor='#F3F3F3'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
                                CODBARRA PECA DEFEITUOSA:<br></b>
                                </font>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                                $codbarra_def</font></td>
                                <td width='50%' bgcolor='#F3F3F3'><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>
                                CODBARRA PECA NOVA:<br></b>
                                </font>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                                $codcb_nova</font></td>
                              </tr>
                            </table>
                            <hr></td>
                            </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            LAUDO TÉCNICO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='laudo' cols='25'></textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            TÉCNICO RESPONSÁVEL:</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' value='$tecnico' name='tecnico' size='30' > 
			                          
                              </font></td>
                          </tr>
								   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                           OBS.:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='obs' cols='25'></textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>


		");
							  }
							  echo("
                         
						 
	                      <tr> 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
					");
			if ($Action=='insert'){
				$value="Adicionar";
			echo("
			                   <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codprodselect' value='$codprod'>
				  <input type='hidden' name='pant' value='$pant'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
		          <input type='hidden' name='pg' value='$pg'>
					  <input type='hidden' name='hist' value='$hist'>
				  <input type='hidden' name='codcb_def' value='$codcb'>
					  <input type='hidden' name='codbarra_def' value='$codbarra_def'>

                 <br> </form>
					 ");
			}
				 echo("
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
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

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
      <td width=' 223' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width=' 327' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
	 <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		NOME: <input type='text' name='palavrachave' size='20'></font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
	  </p>
	   </td>
	   	</form>
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=update&retlogin=$retlogin&connectok=$connectok&pg=$pg'>INSERIR
              NOVA RMA</a></b></font></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
        TABELA</font></a></b></td>
          </center>
          <td width='35%'>
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></td>
        </tr>
				 <tr>
            <td width='100%' colspan='5'>
      <hr size='1'>
            </td>
        </tr>
      </table>
		 <table border='0' width='100%' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='21%'></td>
            <td width='6%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='30%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>RMA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N'><br>
              EM ABERTO</a></font></b></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='61%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>RMA:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S'><br>
              HISTÓRICO</a></font></b></td>
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

	<table width='550' border='0' cellspacing='2' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
		<td width='10%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>USUÁRIO</font></b></td>
    <td width='20%' height='0'> 
      <div align='center'><b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PRODUTO</font></b></div>
    </td>
    <td width='15%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA<br>INICIAL</font></b></td>
    <td width='15%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA<br>FINAL</font></b></td>
    <td width='10%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>STATUS</font></b></td>
    <td width='10%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TÉCNICO</font></b></td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
  </tr>



	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codrma = $prod->showcampo0();
			$nomeprod = $prod->showcampo2();
			$datarma_ini = $prod->showcampo7();
			$datarma_fim = $prod->showcampo8();
			$status = $prod->showcampo5();
			$tecnico = $prod->showcampo6();
			$codvend = $prod->showcampo10();
			$pant = $prod->showcampo11();

			$prod->listProdU("nome", "vendedor", "codvend='$codvend'");
			$nomevend = $prod->showcampo0();

			// FORMATACAO //
			$datarma_inif = $prod->fdata($datarma_ini);
			$datarma_fimf = $prod->fdata($datarma_fim);


			if ($pant == "S"){$cor='#E1AFAA';}else{$cor='#D6E7EF';}
			
			

		echo("
	<tr bgcolor='$cor'> 
			<td width='10%' height='0' align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codrma</font></b></td>
			<td width='10%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$nomevend</b></font></td>
			<td width='20%' height='0'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
			<td width='15%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datarma_inif</font></td>
			<td width='15%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datarma_fimf</font></td>
			<td width='10%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$status</b></font></td>
			<td width='10%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$tecnico</font></td>
			<td align='center' width='10%' height='0'><font size='1'>
		<!--<a href='$PHP_SELF?Action=update&opcaixaselect=$opcaixa&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Detalhes 
			  </font></b></a>--></font></td>
	   </tr>



		");
	 }

		echo("
				</table>
		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list"){
/// CONTADOR DE PAGINAS ////

/// Complemento para a parte de mudanca de pagina
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg";  


include("numcontg.php");
}

include ("sif-rodape.php");

}
?>
       
