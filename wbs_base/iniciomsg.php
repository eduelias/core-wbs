

<?php

#include_once("classprod.php" );
include('email/htmlMimeMail.php');


// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "rma";					// Tabela EM USO
$condicao1 = "codrma='$codrmaselect'";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datamsg DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codrma";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "QUADRO MENSAGENS";
$titulo = "QUADRO DE MENSAGENS";

$Actionter = "unlock";

if ($hist == ""){ $hist ="N";}


// INICIO DA CLASSE
$prod = new operacao();


$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$codgrpold = $prod->showcampo3();
		$tipovend = $prod->showcampo2();


$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

	if ($retorno){

  	if ($gruposelect <> -5){

			$assunto = htmlspecialchars("$assunto", ENT_QUOTES);
			$msg = htmlspecialchars("$msg", ENT_QUOTES);
			
			#echo("$msg");
			
		if ($gruposelect == -1){

			$prod->listProdgeral("vendedor", "block <> 'Y'", $array11, $array_campo11, "" );
			
		for($i = 0; $i < count($array11); $i++ ){

			$prod->mostraProd( $array11, $array_campo11, $i );
			$codvend_msg = $prod->showcampo0();
			$codgrp_msg = $prod->showcampo3();
			$email_cel = $prod->showcampo21();
			$email_msg = $prod->showcampo23();

				$prod->clear();
				$prod->setcampo1($codgrp_msg);
				$prod->setcampo2($codvend_msg);
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("N");  // HISTORICO
				$prod->setcampo7("NO");      // STATUS
				$prod->setcampo9($codvendold);  
				$prod->setcampo10("NO"); // ENVIADA
										
				$prod->addProd("msg", $ureg);

			
			if ($email_msg == "Y"){

			// ENVIO DE EMAIL
				$mail = new htmlMimeMail();
				$text = "";
				$mail->setText($text);
				$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
				$mail->setFrom('GRUPO IPASOFT');
				$mail->setSubject('MSG: '.$assunto);
				$result = $mail->send(array($email_cel), 'smtp');
			}

		}

		}else{

			#echo("us= $userselect");
			if ($userselect == -1){

			$prod->listProdgeral("vendedor", "block <> 'Y' and codgrp = '$gruposelect'", $array12, $array_campo12, "" );
				for($i = 0; $i < count($array12); $i++ ){

				$prod->mostraProd( $array12, $array_campo12, $i );
				$codvend_msg = $prod->showcampo0();
				$email_cel = $prod->showcampo21();
				$email_msg = $prod->showcampo23();
				
					$prod->clear();
					$prod->setcampo1($gruposelect);
					$prod->setcampo2($codvend_msg);
					$prod->setcampo3($dataatual);
					$prod->setcampo4($assunto);
					$prod->setcampo5($msg);
					$prod->setcampo6("N");  // HISTORICO
					$prod->setcampo7("NO");      // STATUS
					$prod->setcampo9($codvendold); 
					$prod->setcampo10("NO"); // ENVIADA
											
					$prod->addProd("msg", $ureg);


				if ($email_msg == "Y"){

					// ENVIO DE EMAIL
					$mail = new htmlMimeMail();
					$text = "";
					$mail->setText($text);
					$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
					$mail->setFrom('GRUPO IPASOFT');
					$mail->setSubject('MSG: '.$assunto);
					$result = $mail->send(array($email_cel), 'smtp');
				}

					
				}

			}else{

				$prod->clear();
				$prod->setcampo1($gruposelect);
				$prod->setcampo2($userselect);
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("N");  // HISTORICO
				$prod->setcampo7("NO");      // STATUS
				$prod->setcampo9($codvendold);     
				$prod->setcampo10("NO"); // ENVIADA					

				$prod->addProd("msg", $ureg);

		    $prod->listProdU("email_cel, email_msg", "vendedor", "codvend='$userselect'");
			$email_cel = $prod->showcampo0();
			$email_msg = $prod->showcampo1();

			if ($email_msg == "Y"){

			// ENVIO DE EMAIL
				$mail = new htmlMimeMail();
				$text = "";
				$mail->setText($text);
				$mail->setSMTPParams('200.202.216.1', 25, 'jfnet.com.br');
				$mail->setFrom('GRUPO IPASOFT');
				$mail->setSubject('MSG: '.$assunto);
				$result = $mail->send(array($email_cel), 'smtp');
			}

				

			}
		}

				// MENSAGEM ENVIADA
				$prod->clear();
				$prod->setcampo1($gruposelect);
				$prod->setcampo2($userselect);
				$prod->setcampo3($dataatual);
				$prod->setcampo4($assunto);
				$prod->setcampo5($msg);
				$prod->setcampo6("S");  // HISTORICO
				$prod->setcampo7("OK");      // STATUS
				$prod->setcampo8($dataatual);
				$prod->setcampo9($codvendold);  
				$prod->setcampo10("OK"); // ENVIADA
										
				$prod->addProd("msg", $ureg);


		$Actionsec="list";

	}else{

		$Action="insert";
	}
		
	}
		$desloc=0;


        break;

    case "update":

		if ($retorno){
		
		

		} // RETORNO

		$desloc=0;
			
		
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;

	


	 case "ver":

		$prod->clear();
		$prod->listProd("msg", "codmsg=$codmsg");
		$prod->setcampo7("OK");
		$prod->setcampo8($dataatual);
		$prod->upProd("msg", "codmsg=$codmsg");

		#$Actionsec="list";
		
	  break;

	 case "gravar":

		for($i = 0; $i < $cont; $i++ ){

			if ($ckgmsg[$i] <> ""){
				
				$prod->clear();
				$prod->listProd("msg", "codmsg=$ckgmsg[$i]");
				$prod->setcampo6("S");
				$prod->setcampo7("OK");
				$prod->setcampo8($dataatual);
				$prod->upProd("msg", "codmsg=$ckgmsg[$i]");
				
					#echo("gravar= $ckgmsg[$i]");
			}
		}

		$Actionsec="list";
		
	  break;

	 case "apagar":

	for($i = 0; $i < $cont; $i++ ){
		if ($ckmsg[$i] <> ""){
			$prod->delProd("msg", "codmsg=$ckmsg[$i]");
			#echo("msg= $ckmsg[$i]");
		}
	}

		$Actionsec="list";
		
	  break;

	  case "replay":

		$prod->clear();
		$prod->listProdU("codvend_r, assunto, msg", "msg", "codmsg=$codmsg");
		$codvend_r = $prod->showcampo0();
		$xassunto = "RE.: ";
		$xassunto .= $prod->showcampo1();
		#$xmsg = $prod->showcampo2();
		$xassunto = html_entity_decode($xassunto);
		#$xmsg = html_entity_decode($xmsg);
		$prod->listProdU("nome,  codgrp", "vendedor", "codvend='$codvend_r'");
		$nomevend_r = $prod->showcampo0();
		$codgrp_r = $prod->showcampo1();
		$nomevend_r = strtoupper($nomevend_r);
		$prod->listProdU("nomegrp", "segurancagrp", "codgrp='$codgrp_r'");
		$nomegrp_r = $prod->showcampo0();

		$codgrpselect = $codgrp_r;
		$replay_msg = 1;

		
		$Action="insert";

	 break;

	case "fwd":

		$prod->clear();
		$prod->listProdU("assunto, msg", "msg", "codmsg=$codmsg");
		$xassunto = "ENC.: ";
		$xassunto .= $prod->showcampo0();
		$xmsg = $prod->showcampo1();
		$xassunto = html_entity_decode($xassunto);
		$xmsg = html_entity_decode($xmsg);
		
		$fwd_msg = 1;

	

		$Action="insert";
		
	  break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
		$nomevendpesq1 = strtolower($nomevendpesq);

				
		$condicao2 = " LCASE(msg.assunto) like '%$palavrachave1%' and ";
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
			$msg_env = "NO";
			$condicao3 .= " (msg.codgrp = '$codgrpold' OR msg.codgrp = -1) AND (msg.codvend = -1 OR msg.codvend = '$codvendold') and ";
			#$condicao3 .= " (msg.codgrp = '$codgrpold' ) AND (msg.codvend = '$codvendold') and ";
			$condicao3 .= " msg.hist = '$hist' and msg.msg_env = '$msg_env' ";
		}else{
			#$msg_env_b = "OK";
			$condicao3 .= " msg.hist = '$hist' and msg.msg_env = '$msg_env' and codvend_r = '$codvendold' ";
		}
		
				#$condicao3 .= " (msg.codgrp = '$codgrpold' OR msg.codgrp = -1) and (msg.codvend = -1 OR msg.codvend = '$codvendold') ";
				#$condicao3 .= " msg.hist = '$hist' and msg.msg_env = '$msg_env_b' ";
				#$condicao3 .= " msg.codvend=vendedor.codvend ";

			
		#echo("$condicao3");
		#echo("$parm");


			// LISTA TODOS OS REGISTROS
			$prod->listProdSum("COUNT(*) as numreg", "msg", $condicao3, $array, $array_campo, "" );
			$prod->mostraProd( $array, $array_campo, 0 );
			$numreg = $prod->showcampo0();
			
			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
			$prod->listProdSum("codmsg, msg.codgrp, msg.codvend, datamsg, assunto, msg.msg, status, codvend_r, msg_env", "msg", $condicao3, $array, $array_campo, $parm );

		
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
	if ($tipovend == "R"){$condicao = "codgrp <> 14";}else{$condicao = "";}

	$prod->listProdgeral("segurancagrp", $condicao, $array6, $array_campo6 , "order by nomegrp");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$nomegrpselect = $prod->showcampo1();
			$xcodgrp = $prod->showcampo0();

	echo("		
		<option value='$PHP_SELF?Action=$Action&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codgrpselect=$xcodgrp&codmsg=$codmsg'>$nomegrpselect</option>
		");
	
	}
if ($tipovend <> "R"){
echo("	
                                      <option value='$PHP_SELF?Action=$Action&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&codgrpselect=-1&codmsg=$codmsg' >TODOS</option>
");
}
echo("
        						      <option value='-5' selected>ESCOLHA</option>
");
if ($codgrpselect <> ""){
	if ($codgrpselect <> -1){
		$prod->listProdU("nomegrp", "segurancagrp", "codgrp='$codgrpselect'");
		$nomegrpselect = $prod->showcampo0();
	}else{
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

	$prod->listProdgeral("vendedor", "codgrp = '$codgrpselect' and block <> 'Y'", $array6, $array_campo6 , "order by nome");
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
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ASSUNTO</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' name='assunto' size='30' value = '$xassunto'> 
			                          
                                (max. 150 caracteres)</font></td>
                          </tr>
								   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MENSAGEM:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' >
                            <textarea rows='12' name='msg' cols='25' onKeyDown='liberaEnter();'>$xmsg</textarea><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
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
			$prod->listProd("msg", "codmsg=$codmsg");
			$codmsg = $prod->showcampo0();
			$codgrp_msg = $prod->showcampo1();
			$codvend_msg = $prod->showcampo2();
			$datamsg = $prod->showcampo3();
			$assunto = $prod->showcampo4();
			$msg = $prod->showcampo5();
			$assunto = html_entity_decode($assunto);
			$msg = html_entity_decode($msg);
			$status = $prod->showcampo7();
			$codvend_r = $prod->showcampo9();
			
			if ($codvend_msg <> -1){
				$prod->listProdU("nome", "vendedor", "codvend='$codvend_msg'");
				$nomevend_msg = $prod->showcampo0();
				$nomevend_msg = strtoupper($nomevend_msg);
			}else{
				$nomevend_msg = "TODOS";
			}
			$prod->listProdU("nome,  codgrp", "vendedor", "codvend='$codvend_r'");
			$nomevend_r = $prod->showcampo0();
			$codgrp_r = $prod->showcampo1();
			$nomevend_r = strtoupper($nomevend_r);
			$prod->listProdU("nomegrp", "segurancagrp", "codgrp='$codgrp_r'");
			$nomegrp_r = $prod->showcampo0();
			if ($codgrp_msg <> -1){
				$prod->listProdU("nomegrp", "segurancagrp", "codgrp='$codgrp_msg'");
				$nomegrp_msg = $prod->showcampo0();
			}else{
				$nomegrp_msg = "TODOS";
			}
			

			

			// FORMATACAO //
			$datamsgf = $prod->fdata($datamsg);
			

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////
	echo("
<html>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<meta name='GENERATOR' content='Microsoft FrontPage 4.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<title>Nova pagina 1</title>
</head>

<body>
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
								  	
								 
                          <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2'>
                              <table>
                                <tr>
                                  <td vAlign='top' width='540' bgColor='#336699' colSpan='2'><font face='Verdana' color='#ffffff' size='1'><b>DADOS
                                    DA MENSAGEM</b></font></td>
                                </tr>
							   <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#800000' size='1'>REMETENTE:<br>
                                    </font>
                                    </b><font face='Verdana' color='#336699' size='1'><b>GRUPO:
                                    </b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><br>
                                    </font>
                                    </b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomegrp_r<br>
                                    </b></font><font face='Verdana' color='#336699' size='1'><b>USUÁRIO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><br>
                                    </font>
                                    </b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>$nomevend_r</b></font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>DESTINATÁRIO<br>
                                    </font></b><font face='Verdana' color='#336699' size='1'><b>GRUPO:
                                    </b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><br>
                                    </font>
                                    </b><font face='Verdana' size='1'>$nomegrp_msg
                                    </font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><br>
                                    </b></font><font face='Verdana' color='#336699' size='1'><b>USUÁRIO:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><br>
                                    </font>
                                    </b><font face='Verdana' size='1'>$nomevend_msg</font></td>
                                </tr>
                                <tr>
                                  <td vAlign='top' width='228' bgColor='#f0f0f0'>
                                  <font face='Verdana' color='#336699' size='1'><b>DATA
                                    MENSAGEM:<br>
                                    </b></font>
                                  <font face='Verdana' color='#000000' size='1'>$datamsgf</font></td>
                                  <td vAlign='top' align='right' width='304' bgColor='#f0f0f0'>&nbsp;</td>
                                </tr>
                              </table>
                            <hr size='1'></td>
                            </tr>
                         <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2' >
                              <table border='0' width='100%' cellspacing='0' cellpadding='0'>
                                <tr>
                                  <td width='7%'>
                                    <p align='center'><font size='1'><img border='0' src='images/replaymsg.gif' width='15' height='15'></font></p>
                                  </td>
                                  <td width='21%'><font size='1'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000'><a href='$PHP_SELF?Action=replay&amp;codmsg=$codmsg&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;nomevendpesq=$nomevendpesq&amp;hist=$hist&amp;msg_env=$msg_env'>RESPONDER<br>
                                   AO
                                    REMETENTE</b></a></font></font></td>
                                  <td width='9%'>
                                    <p align='center'><img border='0' src='images/encaminharmsg.gif' width='16' height='15'></td>
                                  <td width='12%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b><a href='$PHP_SELF?Action=fwd&amp;codmsg=$codmsg&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;nomevendpesq=$nomevendpesq&amp;hist=$hist&amp;msg_env=$msg_env'>ENCAMINHAR<br>
                                    MENSAGEM</a></b></font></td>
                                  <td width='12%'>
                                    <p align='center'><img border='0' src='images/msg_gravar.png' width='18' height='13'></td>
                                  <td width='17%'><b><font face='Verdana' size='1' color='#000000'><a href='$PHP_SELF?Action=gravar&amp;ckgmsg[0]=$codmsg&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;nomevendpesq=$nomevendpesq&amp;hist=$hist&amp;msg_env=$msg_env&cont=1'>GRAVAR<br>
                                    MENSAGEM</a></font></b></td>
                                  <td width='9%'>
                                    <p align='center'><img border='0' src='images/msg_empty.png' width='11' height='13'></td>
                                  <td width='13%'><b><font face='Verdana' size='1' color='#000000'><a href='$PHP_SELF?Action=apagar&amp;ckmsg[0]=$codmsg&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;nomevendpesq=$nomevendpesq&amp;hist=$hist&amp;msg_env=$msg_env&cont=1'>APAGAR<br>
                                    MENSAGEM</a></font></b></td>
                                </tr>
                              </table>
                            </td>
                          </tr>


                          <tr>
                            <td width='100%' bgcolor='#FFFFFF' colspan='2' >
                            <hr size='1'></td>
                          </tr>
                          <tr>
                            <td width='32%' bgcolor='#D6E7EF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#336699'>ASSUNTO:</font></b></td>
                            <td width='68%' bgcolor='#D6E7EF' >
                            <font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                              <b>$assunto</B></font></td>
                          </tr>
								   <tr>
                            <td width='32%' bgcolor='#FFFFFF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#336699'>MENSAGEM:</font></b></td>
                            <td width='68%' bgcolor='#FFFFFF' >
                           &nbsp;</td>
                          </tr>

						 
	                      <tr> 
                            <td width='100%' colspan='2' > 
                              <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$msg</font><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font> 
                              <hr size='1'>
                            </td>
                          </tr>

						 
	                      <tr> 
                            <td width='100%' colspan='2' > 
                              &nbsp;</td>
                          </tr>
                         </table>
                      </center>
                    </div>
					
			
			                
                   
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
</body>

</html>




	");
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////
endif;

if($Action <> "insert" and $Action <> "ver"):
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
		ASSUNTO: <input type='text' name='palavrachave' size='20'><br></font>
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
            <td width='5%'><img border='0' src='images/novodado.gif' width='30' height='26'></td>
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=insert&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq'>INSERIR
              NOVA MENSAGEM</a></b></font></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&desloc=$desloc&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&nomevendpesq=$nomevendpesq&hist=$hist'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
            <td width='19%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>MENSAGENS:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=0&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=N&nomevendpesq=$nomevendpesq'><br>
              CAIXA DE ENTRADA</a></font></b></td>
            <td width='10%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='18%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>MENSAGENS:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=0&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S&nomevendpesq=$nomevendpesq'><br>
              ARQUIVO GRAVADAS</a></font></b></td>
            <td width='9%'>
              <p align='center'><img border='0' src='images/historico.gif' width='20' height='22'></td>
            <td width='50%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>MENSAGEM:</b></font><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FFFFFF'><a href='$PHP_SELF?Action=list&desloc=0&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=S&nomevendpesq=$nomevendpesq&msg_env=OK'><br>
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
<form name='form1' action='$PHP_SELF?codmsg=$codmsg&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&hist=$hist&msg_env=$msg_env' method='post'>

<input type=hidden name='Action' value='apagar'>

	<table width='550' border='0' cellspacing='2' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111'>
	<tr bgcolor='#FFFFFF'> 
	 <td align='center' width='99%' height='0' colspan='6'> <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp; </font>
    </td>
    <td align='center' width='3%' height='0'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='javascript:gravamsg()'><img border='0' src='images/msg_gravar.png' alt='GRAVAR MENSAGEM SELECIONADAS' ></a> </font></b>
    </td>
		 <td align='center' width='3%' height='0'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='javascript:delemsg()'><img border='0' src='images/msg_empty.png' alt='APAGAR MENSAGENS SELECIONADAS' ></a> </font></b>
    </td>
  </tr>

	<tr bgcolor='#93BEE2'> 
	 <td align='center' width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
	<td width='15%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DE</font></b></td>
		<td width='41%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ASSUNTO</font></b></td>
   <td width='20%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA<br>MSG</font></b></td>
		 <td width='15%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PARA</font></b></td>
   	<td align='center' width='3%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    <td align='center' width='3%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><input type='checkbox' name='chkall1' value='1' onclick='sel1()'> </font></b></div>
    </td>
		 <td align='center' width='3%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><input type='checkbox' name='chkall' value='1' onclick='sel()'> </font></b></div>
    </td>
  </tr>



	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codmsg = $prod->showcampo0();
			$codgrp_msg = $prod->showcampo1();
			$codvend_msg = $prod->showcampo2();
			$datamsg = $prod->showcampo3();
			$assunto = $prod->showcampo4();
			$msg = $prod->showcampo5();
			$assunto = html_entity_decode($assunto);
			$msg = html_entity_decode($msg);
			$status = $prod->showcampo6();
			$msg = substr($msg, 0, 50);
			$codvend_r = $prod->showcampo7();
			$msg_env_b = $prod->showcampo8();

			if ($codvend_msg <> -1){
				$prod->listProdU("nome", "vendedor", "codvend='$codvend_msg'");
				$nomevend_msg = $prod->showcampo0();
				$nomevend_msg = strtoupper($nomevend_msg);
			}else{
				$nomevend_msg = "TODOS";
			}
			$prod->listProdU("nome, codgrp", "vendedor", "codvend='$codvend_r'");
			$nomevend_r = $prod->showcampo0();
			$codgrp_r = $prod->showcampo1();
			$nomevend_r = strtoupper($nomevend_r);
			$prod->listProdU("nomegrp", "segurancagrp", "codgrp='$codgrp_r'");
			$nomegrp_r = $prod->showcampo0();
			if ($codgrp_msg <> -1){
				$prod->listProdU("nomegrp", "segurancagrp", "codgrp='$codgrp_msg'");
				$nomegrp_msg = $prod->showcampo0();
			}else{
				$nomegrp_msg = "TODOS";
			}
			
			

			// FORMATACAO //
			$datamsgf = $prod->fdata($datamsg);
			
			if ($status == "NO"){$cor='#E1AFAA';}else{$cor='#D6E7EF';}
			if ($status == "NO"){$email='images/email_novo.gif';}else{$email='images/email_lido.gif';}
			if ($hist == "S"){$cor='#E2E2E2';}
			if ($msg_env_b == "OK"){$cor='#DEFBDB';}
			
			

		echo("
	<tr bgcolor='$cor'> 
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><img border='0' src=' $email' alt='MENSAGEM' ></font></td>
			<td width='15%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'><b>$nomegrp_r</b><BR>$nomevend_r</font></td>
			<td width='41%' height='0' >
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$assunto</b><br>$msg</font></td>
			<td width='20%' height='0'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datamsgf</font></td>
			<td width='15%' height='0'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'color='#FF6600'><b>$nomegrp_msg</b><BR>$nomevend_msg</font></td>
			<td width='3%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><a href='$PHP_SELF?Action=ver&codmsg=$codmsg&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&hist=$hist&msg_env=$msg_env'><b><font face='Verdana, Arial, Helvetica, sans-serif'><img border='0' src='images/msg_select.png' alt='LER MENSAGEM'> 
			  </font></b></a></font></td>
			<td align='center' width='3%' height='0'><font size='1'><input type='checkbox' name='ckgmsg[$i]' value='$codmsg'>
		</font></td>
			<td align='center' width='3%' height='0'><font size='1'><input type='checkbox' name='ckmsg[$i]' value='$codmsg'>
		</font></td>
	   </tr>



		");
	 }

		echo("
				</table>
<input type=hidden name='cont' value='$i'>
</form>
					<p><font size='1' face='Verdana'>LEGENDA:</font></p>
						 <div align='center'>
      <center>

<table border='0' width='550' cellpadding='2'>
  <tr>
    <td width='3%'><font size='1' face='Verdana'><b><img alt='MENSAGEM' src='images/email_lido.gif' border='0'></b></font></td>
    <td width='12%'><font size='1' face='Verdana' color='#93BEE2'><b>MENSAGEM<br>
      LIDA</b></font></td>
    <td width='3%'><font size='1' face='Verdana' color='#93BEE2'><b><img alt='MENSAGEM' src='images/email_novo.gif' border='0'></b></font></td>
    <td width='12%'><font size='1' face='Verdana' color='#93BEE2'><b>NOVA<br>
      MENSAGEM </b></font></td>
    <td width='4%'><font size='1' face='Verdana' color='#93BEE2'><b><img alt='LER MENSAGEM' src='images/msg_select.png' border='0' width='14' height='13'></b></font></td>
    <td width='11%'><font size='1' face='Verdana' color='#93BEE2'><b>VER<br>
      MENSAGEM</b></font></td>
    <td width='4%'><font size='1' face='Verdana' color='#93BEE2'><b><img alt='GRAVAR MENSAGEM' src='images/msg_gravar.png' border='0' width='18' height='13'></b></font></td>
    <td width='12%'><font size='1' face='Verdana' color='#93BEE2'><b>GRAVAR<br>
      MENSAGEM<br>
      HISTÓRICO</b></font></td>
    <td width='3%'><font size='1' face='Verdana' color='#93BEE2'><b><img alt='APAGAR MENSAGEM' src='images/msg_empty.png' border='0' width='11' height='13'></b></font></td>
    <td width='36%'><font size='1' face='Verdana' color='#93BEE2'><b>APAGAR<br>
      MENSAGEM</b></font></td>
  </tr>
</table>
	
      </center>
    </div>


		");

/// FIM - PARTE DE LISTAGEM DOS REGISTROS ////

endif;

if ($Action== "list"){
/// CONTADOR DE PAGINAS ////

/// Complemento para a parte de mudanca de pagina
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg&nomevendpesq=$nomevendpesq&msg_env=$msg_env&hist=$hist";  


include("numcontg.php");
}

include ("sif-rodape.php");

}
?>
       
