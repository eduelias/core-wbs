

<?php

#include_once("classprod.php" );
include('email/htmlMimeMail.php');

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "rma";					// Tabela EM USO
$condicao1 = "codrma='$codrmaselect'";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datanc DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codrma";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "NÃO CONFORMIDADES";
$titulo = "NÃO CONFORMIDADES";

$Actionter = "unlock";

if ($hist == ""){ $hist ="N";}


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$codgrpold = $prod->showcampo3();
		$tipovend = $prod->showcampo2();
		$codncgrpold = $prod->showcampo19();
		$tiponcgrpold = $prod->showcampo20();
		#echo("grpnc=$codncgrpold");


/*
// FUNCAO PARA TRANSFORMAR HTML
function html_entity_decode( $given_html, $quote_style = ENT_QUOTES ) {
   $trans_table = get_html_translation_table( HTML_SPECIALCHARS, $quote_style );
   if( $trans_table["'"] != '&#039;' ) { # some versions of PHP match single quotes to &#39;
     $trans_table["'"] = '&#039;';
   }
   return ( strtr( $given_html, array_flip( $trans_table ) ) );
}
*/


$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

	if ($retorno){

  	if ($gruposelect <> -5 or $userselect <> -5){

			$descricao = htmlspecialchars("$descricao", ENT_QUOTES);
			$solucao = htmlspecialchars("$solucao", ENT_QUOTES);
			$acao = htmlspecialchars("$acao", ENT_QUOTES);
			
				
				$prod->clear();
				$prod->setcampo1($gruposelect);
				$prod->setcampo2($userselect);
				$prod->setcampo3($prioridade);
				$prod->setcampo4($descricao);
				$prod->setcampo5($solucao);
				$prod->setcampo6($acao);
				$prod->setcampo7($gravidade);
				$prod->setcampo8($sug_gravidade);
				$prod->setcampo9($dataatual);
				$prod->setcampo11($codvendold);  
				$prod->setcampo12($motivo);  
				$prod->setcampo13("N");  // HISTORICO
														
				$prod->addProd("iso_nc", $ureg);

		

				// STATUS DA NC
				$prod->clear();
				$prod->setcampo1($ureg);
				$prod->setcampo2($dataatual);
				$prod->setcampo3("ABERTO");
				$prod->setcampo4($login);
														
				$prod->addProd("iso_nc_status", $ureg);


				$prod->listProdU("motivo", "iso_nc_motivo", "idnc='$motivo'");
				$xmotivo = $prod->showcampo0();

			
			if ($userselect <> -1){
				$prod->listProdU("email_cel, email_nc", "vendedor", "codvend='$userselect'");
				$email_cel = $prod->showcampo0();
				$email_nc = $prod->showcampo1();

				if ($email_nc == "Y"){

					// ENVIO DE EMAIL
					$mail = new htmlMimeMail();
					$text = "";
					$mail->setText($text);
					$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
					$mail->setFrom('GRUPO IPASOFT');
					$mail->setSubject('NC: '.$xmotivo);
					$result = $mail->send(array($email_cel), 'smtp');

				}
			}

			#echo("$email_cel, $email_nc, us=$userselect");

			if ($userselect == -1){
			$prod->listProdgeral("vendedor", "block <> 'Y' and codncgrp = '$gruposelect' and tiponcgrp = 'Y'", $array12, $array_campo12, "" );
				for($i = 0; $i < count($array12); $i++ ){

				$prod->mostraProd( $array12, $array_campo12, $i );
				$codvend_msg = $prod->showcampo0();
				$email_cel = $prod->showcampo21();
				$email_nc = $prod->showcampo22();

				#echo("$email_cel, $email_nc, us=$userselect");

						if ($email_nc == "Y"){

						// ENVIO DE EMAIL
							$mail = new htmlMimeMail();
							$text = "";
							$mail->setText($text);
							$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
							$mail->setFrom('GRUPO IPASOFT');
							$mail->setSubject('NC: '.$xmotivo);
							$result = $mail->send(array($email_cel), 'smtp');
						}

				}

			}
		
				
			


		$Actionsec="list";

	}else{

		$Action="insert";
	}
		
	}
		$desloc=0;


        break;

    case "update":

		if ($retorno){

			$prod->clear();
			$prod->listProd("iso_nc", "codnc=$codnc");
				#$datasol = $prod->showcampo14();
				$xsolucao = $prod->showcampo5();
				#$xacao = $prod->showcampo14();
				$prod->setcampo2($userselect);
				$prod->setcampo3($prioridade);
				$prod->setcampo4($descricao);
				$prod->setcampo5($solucao);
				$prod->setcampo6($acao);
				$prod->setcampo7($gravidade);
				if ($final == "OK"){
					$prod->setcampo10($dataatual); // DATA FINAL
					$prod->setcampo13("S");  // HISTORICO
				}
				if ($solucao <> "" and $acao == ""){
					$prod->setcampo14($dataatual); // DATA SOLUCAO
				}
				if ($solucao <> "" and $acao <> "" and $xsolucao == ""){
					$prod->setcampo14($dataatual); // DATA SOLUCAO
				}
				$prod->setcampo12($motivo);  
			$prod->upProd("iso_nc", "codnc=$codnc");

			if ($solucao <> "" and $acao == ""){
				// STATUS DA NC
				$prod->clear();
				$prod->setcampo1($codnc);
				$prod->setcampo2($dataatual);
				$prod->setcampo3("SOLUCAO");
				$prod->setcampo4($login);
				$prod->addProd("iso_nc_status", $ureg);
			}
			if ($solucao <> "" and $acao <> "" and $xsolucao == ""){
				// STATUS DA NC
				$prod->clear();
				$prod->setcampo1($codnc);
				$prod->setcampo2($dataatual);
				$prod->setcampo3("SOLUCAO");
				$prod->setcampo4($login);
				$prod->addProd("iso_nc_status", $ureg);
			}


			if ($acao <> "" and $final <> "OK"){
				// STATUS DA NC
				$prod->clear();
				$prod->setcampo1($codnc);
				$prod->setcampo2($dataatual);
				$prod->setcampo3("ACAO");
				$prod->setcampo4($login);							
				$prod->addProd("iso_nc_status", $ureg);
			}
		
		} // RETORNO

		$desloc=0;
		$Actionsec="list";
			
		
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;

	


	 case "ver":

		 if ($msg_env == "NO" or $msg_env == ""){
				$msg_env_b = "NO";
		 }else{
				$msg_env_b = "OK";
		 }

		

		#$Actionsec="list";
		
	  break;

	
	case "fwd":

		if ($retorno){


		$prod->clear();
		$prod->listProd("iso_nc", "codnc=$codnc");
		$prod->setcampo1($gruposelect);
		$prod->setcampo2($userselect);
		$prod->upProd("iso_nc", "codnc=$codnc");

		// STATUS DA NC
		$prod->clear();
		$prod->setcampo1($codnc);
		$prod->setcampo2($dataatual);
		$prod->setcampo3("ENCAMINHADA");
		$prod->setcampo4($login);
												
		$prod->addProd("iso_nc_status", $ureg);

			$Actionsec="list";
		#echo("AQUI");

		}else{

			$Action="fwd";
		}
		
	  break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

				
		$condicao2 = " LCASE(iso_nc_motivo.motivo) like '%$palavrachave1%' and ";
		#$condicao5 = " LCASE(vendedor.nome) like '%$nomevendpesq1%' and ";
		#$condicao4 = " msg.codgrp = '$codgrpold' and (msg.codvend ='-1' OR msg.codvend = '$codvendold') and ";
		
	
		#$codndicao3 .= $condicao4;
		
		//PESQUISA POR NOME CLIENTE
		if ($palavrachave){
							
			$condicao3 .= $condicao2;
		}
		
		//PESQUISA POR NOME VENDEDOR
		if ($nomevendpesq){
							
			$condicao3 .= $condicao5;
		}
			
					
			if ($msg_env == "NO" or $msg_env == ""){
				$msg_env_b = "NO";
				$msg_env = "NO";
				if ($tiponcgrpold <> "Y"){
					$condicao3 .= " ((iso_nc.codgrp = '$codncgrpold' AND iso_nc.codvend = '-1') OR (iso_nc.codvend = '$codvendold')) and ";
				}else{
					if ($verall <> 'Y'){
						$condicao3 .= " ((iso_nc.codgrp = '$codncgrpold') OR (iso_nc.codvend = '$codvendold')) and ";
					}else{
						$condicao3 .= " ";
					}

				}
					$condicao3 .= " iso_nc.hist = '$hist' ";
			}else{
				$msg_env_b = "OK";
				$condicao3 .= " codvend_r = '$codvendold' ";
			}

	
				#$condicao3 .= " iso_nc.idnc=iso_nc_motivo.idnc";
				#$condicao3 .= " iso_nc.codvend=vendedor.codvend ";

			
		#echo("$condicao3");
		#echo("$parm");


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "iso_nc", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codnc, iso_nc.codgrp, iso_nc.codvend, datanc, iso_nc.descricao, iso_nc.idnc, iso_nc.codvend_r, prioridade, sug_gravidade, iso_nc.hist, iso_nc.acao, iso_nc.solucao, iso_nc.datafinal, iso_nc.datasol", "iso_nc", $condicao3, $array, $array_campo, $parm );

		
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

echo("

<script language='JavaScript'>

function delemsg() { 
	with(document.form1) { Action.value = 'apagar'; submit(); } 
}

function sel() {
	with(document.form1) {
		for(i=0;i<elements.length;i++) {
			thiselm = elements[i];
			if(thiselm.name.substring(0,5) == 'ckmsg')
				thiselm.checked = !thiselm.checked
		}
	}
}
function sel1() {
	with(document.form1) {
		for(i=0;i<elements.length;i++) {
			thiselm = elements[i];
			if(thiselm.name.substring(0,6) == 'ckgmsg')
				thiselm.checked = !thiselm.checked
		}
	}
}
function gravamsg() { 
	with(document.form1) { Action.value = 'gravar'; submit(); } 
 } 



</script>
");


if($Action == "insert" ):

		$nomevendoldf = strtoupper($nomevendold);

		if ($fwd_msg == 1){$Action = "fwd";}
		if ($raplay_msg == 1){$Action = "replay";}
		

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&msg_env=$msg_env'><img border='0' src='images/bt-continuaped.gif' ><br>
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
								  	
								  <form method='POST' action='$PHP_SELF?Action=insert'  name='Form' enctype='multipart/form-data'>
                          <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2'>
                              <table>
                                <tr>
                                  <td vAlign='top' width='540' bgColor='#336699' colSpan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                                    DA MENSAGEM</b></font></td>
                                </tr>
								 <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>REMETENTE:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomevendoldf</b></font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>GRUPO</b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>:<br>
                                    </b></font>
									 <select size='1' class=drpdwn name='gruposelect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'> 
							");

	$prod->listProdgeral("iso_nc_grupo", "", $array6, $array_campo6 , "order by nomencgrp");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomegrpselect = $prod->showcampo1();
			$xcodgrp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=$Action&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codgrpselect=$xcodgrp&codmsg=$codmsg'>$nomegrpselect</option>
		");
	
	}
echo("	
                                       <option value='-5' selected>ESCOLHA</option>
");
if ($codgrpselect <> ""){
	$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codgrpselect'");
	$nomegrpselect = $prod->showcampo0();
	if ($codgrpselect == -1){
			$nomegrpselect = "TODOS";
	}

echo("
									 <option value='$codgrpselect' selected>$nomegrpselect</option>
");
}
echo("
										
                                    </select></p>
                                  </td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>USUÁRIO:<br>
                                    </b></font>
								   <select size='1' class=drpdwn name='userselect' >
                                   	");
	
	$prod->listProdgeral("vendedor", "codncgrp = '$codgrpselect' and block <> 'Y' and tipo <> 'R'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendselect = $prod->showcampo1();
			$nomevendselect = strtoupper($nomevendselect);
			$xcodvend = $prod->showcampo0();

	echo("		
		<option value='$xcodvend'>$nomevendselect</option>
		");
	
	}
	
echo("	
                                      <option value='-1' selected>TODOS</option>
									  <option value='-5' selected>ESCOLHA</option>
								
	  ");
	if ($replay_msg == 1){
	echo("		
		<option value='$codvend_r' selected>$nomevend_r</option>
		");
	}
	echo("


                                    </select></td>
                                </tr>
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>DATA
                                    MENSAGEM:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datamsg</font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                              </table>
                            <hr></td>
                            </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MOTIVO</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                 <select size='1' class=drpdwn name='motivo' >
                                   	");

	$prod->listProdgeral("iso_nc_motivo", "", $array6, $array_campo6 , "order by motivo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$motivoselect = $prod->showcampo1();
			$motivoselect = strtoupper($motivoselect);
			$xidnc = $prod->showcampo0();

	echo("		
		<option value='$xidnc'>$motivoselect</option>
		");
	
	}
	
echo("	
                                      <option value='-5' selected>ESCOLHA</option>
								
	  ");
	if ($replay_msg == 1){
	echo("		
		<option value='$codvend_r' selected>$nomevend_r</option>
		");
	}
	echo("


                                    </select></td>
                          </tr>
								   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO DETALHADA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='descricao' cols='25' onKeyDown='liberaEnter();'>$xdescricao</textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
										   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PRIORIDADE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <select size='1' name='prioridade' class=drpdwn>
						  <option value='-5' selected>ESCOLHA</option>
						  <option value='NORMAL' >NORMAL</option>
						  <option value='URGENTE'>URGENTE</option>
						  <option value='CRITICA'>CRITICA</option>
						  </select>
							<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
											   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SUGESTAO DE GRAVIDADE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <select size='1' name='sug_gravidade' class=drpdwn>
						  <option value='-5' selected>ESCOLHA</option>
						  <option value='0' >0</option>
						  <option value='1'>1</option>
						  <option value='2'>2</option>
						  <option value='3'>3</option>
						  </select>
							<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
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
					
			
			                   <p align='center'><input class='sbttn' type='submit' name='Submit' value='ENVIAR'>
                   
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codgrpselect' value='$codgrpselect'>
				  <input type='hidden' name='pant' value='$pant'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
		          <input type='hidden' name='pg' value='$pg'>
				  <input type='hidden' name='hist' value='$hist'>
				 

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
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////
endif;

if($Action == "ver" ):

			$prod->clear();
			$prod->listProd("iso_nc", "codnc=$codnc");
			$codnc = $prod->showcampo0();
			$codgrp_nc = $prod->showcampo1();
			$codvend_nc = $prod->showcampo2();
			$xprioridade = $prod->showcampo3();
			$xdescricao = $prod->showcampo4();
			$xsolucao = $prod->showcampo5();
			$xacao = $prod->showcampo6();
			$xgravidade = $prod->showcampo7();
			$xsug_gravidade = $prod->showcampo8();
			$datanc = $prod->showcampo9();
			$codvend_r = $prod->showcampo11();
			$idnc = $prod->showcampo12();
			$xhist = $prod->showcampo13();
						
			$xdescricao = html_entity_decode($xdescricao);
			$xsolucao = html_entity_decode($xsolucao);
			$xacao = html_entity_decode($xacao);

			$prod->listProdU("motivo", "iso_nc_motivo", "idnc='$idnc'");
			$xmotivo = $prod->showcampo0();

			if ($codvend_nc <> -1){
				$prod->listProdU("nome", "vendedor", "codvend='$codvend_nc'");
				$nomevend_nc = $prod->showcampo0();
				$nomevend_nc = strtoupper($nomevend_nc);
			}else{
				$nomevend_nc = "TODOS";
			}
			if ($codgrp_nc <> -1){
				$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codgrp_nc'");
				$nomegrp_nc = $prod->showcampo0();
			}else{
				$nomegrp_nc = "TODOS";
			}
			
			
			$prod->listProdU("nome,  codncgrp", "vendedor", "codvend='$codvend_r'");
			$nomencvend_r = $prod->showcampo0();
			$codncgrp_r = $prod->showcampo1();
			$nomencvend_r = strtoupper($nomencvend_r);
			$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codncgrp_r'");
			$nomencgrp_r = $prod->showcampo0();
			
			
			if ($msg_env_b == "OK" ){$xhist = "S";}
			if ($tiponcgrpold <> "Y" ){$xhist = "S";}

			// FORMATACAO //
			$datancf = $prod->fdata($datanc);
			

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&msg_env=$msg_env'><img border='0' src='images/bt-continuaped.gif' ><br>
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
								  	
								  <form method='POST' action='$PHP_SELF?Action=update'  name='Form' enctype='multipart/form-data'>
                          <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2'>
                              <table>
                                <tr>
                                  <td vAlign='top' width='540' bgColor='#336699' colSpan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                                    DA MENSAGEM</b></font></td>
                                </tr>
								 <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>REMETENTE:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomencvend_r</b></font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>GRUPO</b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>:<br>
                                    </b></font>
									<font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomegrp_nc</b></font>
                                  </td>
	");
	if ($xhist == "N"){
	echo("
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>USUÁRIO:<br>
                                    </b></font>
								   <select size='1' class=drpdwn name='userselect' >
                                   	");

	$prod->listProdgeral("vendedor", "codncgrp = '$codgrp_nc' and block <> 'Y' and tipo <> 'R'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendselect = $prod->showcampo1();
			$nomevendselect = strtoupper($nomevendselect);
			$xcodvend = $prod->showcampo0();

	echo("		
		<option value='$xcodvend'>$nomevendselect</option>
		");
	
	}
	
echo("	
                                      <option value='-1' selected>TODOS</option>
									  <option value='$codvend_nc' selected>$nomevend_nc</option>
								
	 	
                                    </select></td>
                                </tr>
");
}else{
echo("

                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>USUÁRIO:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomevend_nc</b></font></td>
                                </tr>
									  ");
}
echo("
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>DATA
                                    MENSAGEM:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datancf</font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                              </table>
                            <hr>
");
	if ($xhist == "N"){
	echo("
								<table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                <tr>
                                  <td width='10%'>
                                    <p align='center'><img border='0' src='images/encaminharmsg.gif' width='16' height='15'></td>
                                  <td width='90%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><a href='$PHP_SELF?Action=fwd&amp;codnc=$codnc&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;nomevendpesq=$nomevendpesq&amp;hist=$hist&amp;msg_env=$msg_env'>ENCAMINHAR NC PARA OUTRO GRUPO<br>
                                    </a></b></font></td>
                                 </tr>
                              </table>	  
								  <hr>
");
	}
	echo("
								  </td>
                            </tr>
");
	if ($xhist == "N"){
	echo("
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>MOTIVO</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                 <select size='1' class=drpdwn name='motivo' >
                                   	");

	$prod->listProdgeral("iso_nc_motivo", "", $array6, $array_campo6 , "order by motivo");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$motivoselect = $prod->showcampo1();
			$motivoselect = strtoupper($motivoselect);
			$xidnc = $prod->showcampo0();

	echo("		
		<option value='$xidnc'>$motivoselect</option>
		");
	
	}
	
	echo("		
		<option value='$idnc' selected>$xmotivo</option>
	


                                    </select></td>
                          </tr>
");
}else{
echo("
<tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>MOTIVO</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
							<font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$xmotivo</b></font></td>
 </tr>
");
}
if ($xhist == "N"){
echo("
								   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>DESCRIÇÃO DETALHADA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='descricao' cols='25' onKeyDown='liberaEnter();'>$xdescricao</textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
");
}else{
echo("
									   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>DESCRIÇÃO DETALHADA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                                <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$xdescricao</font></td>
				
                                </font></td>
                          </tr>
");
}
if ($xhist == "N"){
echo("
										   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>PRIORIDADE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <select size='1' name='prioridade' class=drpdwn>
						 
						  <option value='NORMAL' >NORMAL</option>
						  <option value='URGENTE'>URGENTE</option>
						  <option value='CRITICA'>CRITICA</option>
						 <option value='$xprioridade' selected>$xprioridade</option>
						  </select>
							<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
");
}else{
echo("
						 <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>PRIORIDADE:</font></b></td>
							<td width='74%' bgcolor='#D6E7EF' >
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$xprioridade</b></font></td>
	");
}
echo("
											   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>SUGESTAO DE GRAVIDADE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                         <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$xsug_gravidade</b></font></td>
                          </tr>
");
if ($xhist == "N"){
echo("
											   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>GRAVIDADE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <select size='1' name='gravidade' class=drpdwn>
						  <option value='$xsug_gravidade' selected>$xsug_gravidade</option>
	");
			if ($xgravidade <> 0){
				echo("
						  <option value='$xgravidade' selected>$xgravidade</option>

					");
			}
			echo("
						  <option value='0' >0</option>
						  <option value='1'>1</option>
						  <option value='2'>2</option>
						  <option value='3'>3</option>
						  </select>
							<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
");
}else{
echo("
							 <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>GRAVIDADE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
								  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$xgravidade</b></font></td>
");
}
if ($xhist == "N"){
echo("
									   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>SOLUCAO IMEDIATA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='solucao' cols='25' onKeyDown='liberaEnter();'>$xsolucao</textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
");
}else{
echo("
						 	   
									 <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>SOLUCAO IMEDIATA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                             <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$xsolucao</font></td>
				
                                </font></td>
                          </tr>
");
}
if ($xhist == "N"){
echo("
									  <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>AÇÃO CORRETIVA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='acao' cols='25' onKeyDown='liberaEnter();'>$xacao</textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                </font></td>
                          </tr>
");
}else{
echo("

				 <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color ='#800000'>AÇÃO CORRETIVA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                               <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$xacao</font></td>
				
                                </font></td>
                          </tr>
");
}
if ($xhist == "N"){
echo("
			   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONCLUSÃO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <select size='1' name='final' class=drpdwn>
						  <option value='-5' selected>ESCOLHA</option>
");
if ($xacao <> "" AND $xsolucao <> ""){ 
echo("
						  <option value='OK' >OK</option>
						  <option value='NO'>NO</option>
");
}
echo("
						</select>
							<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><BR>
				(Todos os campos acima foram preenchidos? <br>Deseja Finalizar a  NÃO CONFORMIDADE ?)
                                </font></td>
                          </tr>
");
}else{
echo("
							 <!--<tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONCLUSÃO:</font></b></td>
								 <td width='74%' bgcolor='#D6E7EF' >
                           <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b></b></font></td>
                          </tr>-->
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
									<div align='center'>
  <center>
  <table cellSpacing='1' cellPadding='3' width='80%' border='0'>

      <tr bgColor='#86acb5'>
        <td width='30%'><font face='Verdana' color='#ffffff' size='1'><b>DATA
          STATUS</b></font></td>
        <td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>STATUS</b></font></td>
		<td width='35%'><font face='Verdana' color='#ffffff' size='1'><b>MODIFICADO POR</b></font></td>
        
      </tr>
");

	$prod->listProdgeral("iso_nc_status", "codnc=$codnc", $array612, $array_campo612 , "order by datastatus");
	for($j = 0; $j < count($array612); $j++ ){
			
			$prod->mostraProd( $array612, $array_campo612, $j );

			$codpstatus = $prod->showcampo0();
			$datastatus = $prod->showcampo2();
			$statusped = $prod->showcampo3();
			$modpor = $prod->showcampo4();
			$datastatusf = $prod->fdata($datastatus);

echo("
      <tr bgColor='#f3f8fa'>
        <td width='30%'><font face='Verdana' size='1'>$datastatusf</font></td>
        <td width='35%'><font face='Verdana' size='1'><b>$statusped</b></font></td>
		<td width='35%'><font face='Verdana' size='1'><b>$modpor</b></font></td>
      </tr>
");		
	}
echo("
  </table>
  <table cellSpacing='1' cellPadding='3' width='80%' border='0'>

      <tr bgColor='#ffffff'>
        <td width='30%'><font face='Verdana' color='#336699' size='1'>&nbsp;</font></td>
        <td width='70%'><font face='Verdana' size='1'>&nbsp;</font></td></tr>

  </table>
  </center>
</div>

					");
	if ($xhist == "N"){
	echo("
			
			                   <p align='center'><input class='sbttn' type='submit' name='Submit' value='ENVIAR'>
             ");		
	}
echo("      
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codgrpselect' value='$codgrpselect'>
				  <input type='hidden' name='codnc' value='$codnc'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
		          <input type='hidden' name='pg' value='$pg'>
				  <input type='hidden' name='hist' value='$hist'>
				 

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
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////
endif;

if($Action == "fwd" ):

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
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&msg_env=$msg_env'><img border='0' src='images/bt-continuaped.gif' ><br>
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
								  	
								  <form method='POST' action='$PHP_SELF?Action=fwd'  name='Form' enctype='multipart/form-data'>
                          <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2'>
                              <table>
                                <tr>
                                  <td vAlign='top' width='540' bgColor='#336699' colSpan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                                    DA MENSAGEM</b></font></td>
                                </tr>
								 <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>REMETENTE:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomevendoldf</b></font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>GRUPO</b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>:<br>
                                    </b></font>
									 <select size='1' class=drpdwn name='gruposelect' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'> 
							");

	$prod->listProdgeral("iso_nc_grupo", "", $array6, $array_campo6 , "order by nomencgrp");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomegrpselect = $prod->showcampo1();
			$xcodgrp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=$Action&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codgrpselect=$xcodgrp&codnc=$codnc'>$nomegrpselect</option>
		");
	
	}
echo("	
                                     
        						      <option value='-5' selected>ESCOLHA</option>
");
if ($codgrpselect <> ""){
	$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codgrpselect'");
	$nomegrpselect = $prod->showcampo0();
	if ($codgrpselect == -1){
			$nomegrpselect = "TODOS";
	}

echo("
									 <option value='$codgrpselect' selected>$nomegrpselect</option>
");
}
echo("
										
                                    </select></p>
                                  </td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>USUÁRIO:<br>
                                    </b></font>
								   <select size='1' class=drpdwn name='userselect' >
                                   	");
	
	$prod->listProdgeral("vendedor", "codncgrp = '$codgrpselect' and block <> 'Y'", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomevendselect = $prod->showcampo1();
			$nomevendselect = strtoupper($nomevendselect);
			$xcodvend = $prod->showcampo0();

	echo("		
		<option value='$xcodvend'>$nomevendselect</option>
		");
	
	}
	
echo("	
                                      <option value='-1' selected>TODOS</option>
									  <option value='-5' selected>ESCOLHA</option>
								
	  ");
	if ($replay_msg == 1){
	echo("		
		<option value='$codvend_r' selected>$nomevend_r</option>
		");
	}
	echo("


                                    </select></td>
                                </tr>
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>DATA
                                    MENSAGEM:<br>
                                    </b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>$datamsg</font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                              </table>
                           </td>
                            </tr>
									   <tr> 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
					
			
			                   <p align='center'><input class='sbttn' type='submit' name='Submit' value='ENCAMINHAR NÃO CONFORMIDADE'>
                   
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codgrpselect' value='$codgrpselect'>
				  <input type='hidden' name='codnc' value='$codnc'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
		          <input type='hidden' name='pg' value='$pg'>
				  <input type='hidden' name='hist' value='$hist'>
				 

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


endif;


if($Action <> "insert" and $Action <> "ver" and $Action <> "fwd"):
/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////

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
		ASSUNTO: <input type='text' name='palavrachave' size='20'><br>
	");
	if ($tiponcgrpold == 'Y'){
	echo("
	LISTA COMPLETA<input type='checkbox' name='verall' value='Y'>
		");
	}
	echo("
		</font>
		<input class='sbttn' type='submit' name='Submit' value='OK'>
		
		
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		<input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		<input type='hidden' name='msg_env' value='$msg_env'>
		 <input type='hidden' name='pg' value='$pg'>
		 <input type='hidden' name='hist' value='$hist'>
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
	");
if ($tiponcgrpold == "Y" ){
	echo("
            <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> 

	<a href='$PHP_SELF?Action=insert&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&verall=$verall'>INSERIR
              NOVA N.C.</a>
	
	</b></font></td>
		");
}
	echo("
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&desloc=$desloc&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&nomevendpesq=$nomevendpesq&hist=$hist&verall=$verall'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
            <td width='10%'></td>
            <td width='9%'><img border='0' src='images/listadados.gif' width='22' height='22'></td>
            <td width='19%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>N. C.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=0&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&nomevendpesq=$nomevendpesq&verall=$verall'><br>
              EM PENDÊNCIA</a></font></b></td>
            <td width='10%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='18%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>N. C.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=0&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S&nomevendpesq=$nomevendpesq&verall=$verall'><br>
              ARQUIVO HISTÓRICO</a></font></b></td>
            <td width='9%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='50%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>N. C.:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=0&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&msg_env=OK&verall=$verall'><br>
              ENVIADAS</a></font></b></td>
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
<form name='form1' action='$PHP_SELF?codmsg=$codmsg&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&hist=$hist&msg_env=$msg_env&verall=$verall' method='post'>

<input type=hidden name='Action' value='apagar'>

	<table width='550' border='0' cellspacing='2' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111'>
	

<tr bgcolor='#93BEE2'> 
	 <td align='center' width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
	<td width='15%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DE</font></b></td>
		<td width='47%' height='0' align='center' colspan='2'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MOTIVO</font></b></td>
   <td width='20%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA<br>N.C.</font></b></td>
		 <td width='15%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PARA</font></b></td>
   
	<td align='center' width='3%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    
		
  </tr>




	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codnc = $prod->showcampo0();
			$codgrp_nc = $prod->showcampo1();
			$codvend_nc = $prod->showcampo2();
			$xprioridade = $prod->showcampo7();
			$xdescricao = $prod->showcampo4();
			$xsug_gravidade = $prod->showcampo8();
			$datanc = $prod->showcampo3();
			$codvend_r = $prod->showcampo6();
			$idnc = $prod->showcampo5();
			$xhist = $prod->showcampo9();
			$xacao = $prod->showcampo10();
			$xsolucao = $prod->showcampo11();
			$xdatafinal = $prod->showcampo12();
			$xdatasol = $prod->showcampo13();
						
			$xdescricao = html_entity_decode($xdescricao);

			$xdescricao = substr($xdescricao, 0, 50);

			$prod->listProdU("motivo", "iso_nc_motivo", "idnc='$idnc'");
			$xmotivo = $prod->showcampo0();
			
			if ($codvend_nc <> -1){
				$prod->listProdU("nome", "vendedor", "codvend='$codvend_nc'");
				$nomevend_nc = $prod->showcampo0();
				$nomevend_nc = strtoupper($nomevend_nc);
			}else{
				$nomevend_nc = "TODOS";
			}
			if ($codgrp_nc <> -1){
				$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codgrp_nc'");
				$nomegrp_nc = $prod->showcampo0();
			}else{
				$nomegrp_nc = "TODOS";
			}
			$prod->listProdU("nome, codncgrp", "vendedor", "codvend='$codvend_r'");
			$nomevend_r = $prod->showcampo0();
			$codgrp_r = $prod->showcampo1();
			$nomevend_r = strtoupper($nomevend_r);
			$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codgrp_r'");
			$nomegrp_r = $prod->showcampo0();
			
			// PESQUISA POR DIFERENCAS DE STATUS		
			$prod->listProdU("nomencgrp", "iso_nc_grupo", "codncgrp='$codgrp_nc'");
			$nomegrp_nc = $prod->showcampo0();
			

			// FORMATACAO //
			$datancf = $prod->fdata($datanc);
			$dataatual = $prod->gdata();
			$difhoras = $prod->numdatahoras($datanc,$dataatual);
			$difsolucao = $prod->numdatahoras($datanc,$xdatasol);
			$difacao = $prod->numdatahoras($datanc,$xdatafinal);
			
			if ($xprioridade == "CRITICA"){$cor='#F3A794';}
			if ($xprioridade == "URGENTE"){$cor='#F9F4BD';}
			if ($xprioridade == "NORMAL"){$cor='#D6E7EF';}
			if ($xhist == "S"){$cor='#E2E2E2';}
			if ($msg_env_b == "OK" and $xhist == "S"){$cor='#E2E2E2';}

			$d = substr($difhoras,0,2);
			$h = substr($difhoras,3,2);
			$m = substr($difhoras,6,2);
			if ($xhist == "S"){$difhoras = "FINALIZADO";}

			if ($xsolucao == ""){$status_s = "ABERTO";$tempo=$difhoras;}else{$status_s = "CONCLUIDO";$tempo=$difsolucao;}
			if ($xhist == "N"){$status_a = "ABERTO";$tempo1=$difhoras;}else{$status_a = "CONCLUIDO";$tempo1=$difacao;}
			if ($xhist == "N" and $xacao <> ""){$status_a = "PENDENTE";$tempo1=$difhoras;}
			

		echo("

	<tr bgcolor='$cor'> 
			<td width='5%' height='0' align='center' rowspan='2'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codnc</font></td>
			<td width='15%' height='0' align='center' rowspan='2'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'><b>$nomegrp_r</b><BR>$nomevend_r</font></td>
			<td width='47%' height='0' colspan='2' >
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'><b>$xmotivo</b></font></td>
			<td width='20%' height='0' rowspan='2'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datancf</font></td>
			<td width='15%' height='0' rowspan='2'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'color='#FF6600'><b>$nomegrp_nc</b><BR>$nomevend_nc</font></td>
			<td width='3%' height='0' align='center' rowspan='2'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='$PHP_SELF?Action=ver&codnc=$codnc&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&hist=$hist&msg_env=$msg_env&verall=$verall'><b><font face='Verdana, Arial, Helvetica, sans-serif'><img border='0' src='images/msg_select.png' alt='LER NÃO CONFORMIDADE'> 
			  </font></b></a></font></td>
			
			
	   </tr>
		   <tr bgcolor='$cor'> 
			<td width='21%' height='0' >
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>SOLUÇÃO</b></font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><br>
            &nbsp;$tempo<br>
            <font color='#800000'><b>$status_s</b></font></font></td>
			
			
			<td width='20%' height='0' >
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>AÇÃO</b><br>
            $tempo1<br>
            <font color='#800000'><b>$status_a</b></font></font></td>
			
			
	   </tr>






		");
	 }

		echo("
				</table>
<input type=hidden name='cont' value='$i'>
</form>
					<p><font size='1' face='Verdana'>LEGENDA:</font></p>
	<div align='center'>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='20' bgcolor='#D6E7EF'>&nbsp;</td>
      <td width='110'><font size='1' face='Verdana'><b>NORMAL</b><br>12 horas</font></td>
      <td width='20' bgcolor='#F9F4BD'>&nbsp;</td>
      <td width='123'><font size='1' face='Verdana'><b>URGENTE</b><br>3 horas</font></td>
      <td width='20' bgcolor='#F3A794'>&nbsp;</td>
      <td width='235'><font size='1' face='Verdana'><b>CRITICA</b><br>1 hora</font></td>
    </tr>
  </table>

</div>


		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list"){
/// CONTADOR DE PAGINAS ////

/// Complemento para a parte de mudanca de pagina
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&msg_env=$msg_env&hist=$hist&verall=$verall";  


include("numcontg.php");
}

include ("sif-rodape.php");

}
?>
       
