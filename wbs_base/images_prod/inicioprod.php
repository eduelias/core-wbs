

<?php

#include_once("classprod.php" );
require("fileupload-class.php");

// VARIAVEIS DA PAGINA
$acrescimo = 40;
$tabela = "produtos";					// Tabela EM USO
$condicao1 = "codprod=$codprod";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomeprod limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomeprod";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PRODUTO";
$titulo = "ADMINISTRAÇÃO DE PRODUTO";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProd("seguranca", "arquivo='addprodcj.php'");
		$codpgsec = $prod->showcampo0();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$datauc = $anouc . $mesuc . $diauc;

		$codcs = explode(":", $codcs);
		$codcat = "$codcs[0]";
		$codsubcat = "$codcs[1]";

		// So precisa SETAR os valores do formulario
		
		#$nomeprod= strtolower($nomeprod);
		$nomeprod= strtoupper($nomeprod);
		#$nomeprod= ucwords($nomeprod);

		$prod->setcampo19($nomeprod);
		$pvv = str_replace('.','',$pvv);
		$pvv = str_replace(',','.',$pvv);
		$prod->setcampo12($pvv);
		#$prod->setcampo8($datauc);
		$prod->setcampo1($codcat);

		$prod->setcampo2($codsubcat);
		#$prod->setcampo3($codmoeda);
		$prod->setcampo4($descres);
		$prod->setcampo5($descdet);
		#$prod->setcampo6($imgdata);
		$prod->setcampo7($unidade);
		$prod->setcampo9($codbarra);
		#$puc = str_replace('.','',$puc);
		#$puc = str_replace(',','.',$puc);
		#$prod->setcampo10($puc);
		#$pcm = str_replace('.','',$pcm);
		#$pcm = str_replace(',','.',$pcm);
		#$prod->setcampo11($pcm);
		$pvvcj = str_replace('.','',$pvvcj);
		$pvvcj = str_replace(',','.',$pvvcj);
		$prod->setcampo13($pvvcj);
		$pva = str_replace('.','',$pva);
		$pva = str_replace(',','.',$pva);
		$prod->setcampo14($pva);
		$pvacj = str_replace('.','',$pvacj);
		$pvacj = str_replace(',','.',$pvacj);
		$prod->setcampo15($pvacj);
		$mtv = str_replace('.','',$mtv);
		$mtv = str_replace(',','.',$mtv);
		$prod->setcampo16($mtv);
		$mta = str_replace('.','',$mta);
		$mta = str_replace(',','.',$mta);
		$prod->setcampo17($mta);
		$prod->setcampo18($idicj);
		$prod->setcampo23($hist);
		$prod->setcampo24($kit);
		
		$prod->setcampo0("");
		if ($chkcb==""){$chkcb="N";}
			$prod->setcampo22($chkcb);
		$prod->setcampo25($garum);
		$prod->setcampo26($garcj);
		$prod->setcampo27($lib_linha);

		$prod->addProd($tabela, $ureg);

		// INSERE FOTOS NO SISTEMA
		if ($form_data <> "none"){
			#$imgdata = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
		
			//DEFINICOES
			$path = "images_prod/";
			$upload_file_name = "form_data";
			$acceptable_file_types = "image/gif|image/jpeg|image/pjpeg";
			$default_extension = "";
				// OPTIONS:
				//   1 = overwrite mode
				//   2 = create new with incremental extention
				//   3 = do nothing if exists, highest protection
				$mode = 4;
			
			// INSERIR IMAGENS
				// Create a new instance of the class
				$my_uploader = new uploader($_POST['language']); // for error messages in french, try: uploader('fr');
				
				// OPTIONAL: set the max filesize of uploadable files in bytes
				$my_uploader->max_filesize(40000);
				
				// OPTIONAL: if you're uploading images, you can set the max pixel dimensions 
				$my_uploader->max_image_size(640, 480); // max_image_size($width, $height)
				
				// UPLOAD the file
				if ($my_uploader->upload($upload_file_name, $acceptable_file_types, $default_extension)) {
					$my_uploader->save_file($path, $mode, $ureg);
				}

				#if ($my_uploader->error) {
				#	echo $my_uploader->error . "<br><br>\n";
				#}

		
		// ATUALIZA DADOS DA IMAGEM
		$prod->listProd($tabela, "codprod = $ureg");
		$prod->setcampo20($my_uploader->file['size']);
		$prod->setcampo21($my_uploader->file['type']);
		$prod->setcampo28($my_uploader->file['name']);
		$prod->setcampo29($my_uploader->file['extention']);
		$prod->upProd($tabela, "codprod = $ureg");


		}
		

		
		


		if ($unidade == "UM"){

			// GERA UM ESTOQUE PARA A NOVA EMPRESA CRIADA
			$prod->listProdgeral("empresa", "", $array212, $array_campo212, "" );

			for($i = 0; $i < count($array212); $i++ ){
			
				$prod->mostraProd( $array212, $array_campo212, $i );

					$codemp = $prod->showcampo0();

				$prod->setcampo0("");
				$prod->setcampo1($codemp);
				$prod->setcampo2($ureg);
				$prod->setcampo3(0);
				$prod->setcampo4(0);
				$prod->setcampo5(10);
				$prod->setcampo6(1);
				$prod->setcampo7(1);

				$prod->addProd("estoque", $ureg1);
			
			}

		}
		
		if ($unidade == "CJ" or $kit == "Y"){
		$Actionter="lock";
		
		$url= "$PHP_SELF?codprodselect=$ureg&Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$codpgsec&pgold=$pg";
		include("redirect.php");
		
		/*
		//VARIAVEIS
		$codprodselect=$codprodold;$Action="list";$desloc=0;
		$retlogin=$retlogin;$connectok="$connectok";$pg=$codpgsec;$pgold=$pg;
		include("restrito.php");
		*/
		}

		$Actionsec="list";
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":

		echo("fdata= $form_data");

		$prod->listProd($tabela, $condicao1);
				
		$nomeprodold = $prod->showcampo19();
		$pvvold = $prod->showcampo12();
		$pvvold = number_format($pvvold, 2,',', '.');
		#$dataucold = $prod->showcampo8();
		$codprodold = $prod->showcampo0();
		$codcatold = $prod->showcampo1();
		
		$codsubcatold = $prod->showcampo2();
		#$codmoedaold = $prod->showcampo3();
		$descresold = $prod->showcampo4();
		$descdetold = $prod->showcampo5();
		$unidadeold = $prod->showcampo7();
		$codbarraold = $prod->showcampo9();
		#$pucold = $prod->showcampo10();
		#$pucold = number_format($pucold, 2,',', '.');
		#$pcmold = $prod->showcampo11();
		#$pcmold = number_format($pcmold, 2,',', '.');
		$pvvcjold = $prod->showcampo13();
		$pvvcjold = number_format($pvvcjold, 2,',', '.');
		$pvaold = $prod->showcampo14();
		$pvaold = number_format($pvaold, 2,',', '.');
		$pvacjold = $prod->showcampo15();
		$pvacjold = number_format($pvacjold, 2,',', '.');
		$mtvold = $prod->showcampo16();
		$mtvold = number_format($mtvold, 2,',', '.');
		$mtaold = $prod->showcampo17();
		$mtaold = number_format($mtaold, 2,',', '.');
		$idicjold = $prod->showcampo18();
		$chkcbold = $prod->showcampo22();
		$histold = $prod->showcampo23();
		$kitold = $prod->showcampo24();
		$garumold = $prod->showcampo25();
		$garcjold = $prod->showcampo26();
		$lib_linhaold = $prod->showcampo27();
		
		//DADOS DA IMAGEM
		$imgsizeold = $prod->showcampo20();
		$imgtypeold = $prod->showcampo21();
		$imgnameold = $prod->showcampo28();
		


		$dataucold = str_replace('-','',$dataucold);

		$anoucold = substr($dataucold,0,4);
		$mesucold = substr($dataucold,4,2);
		$diaucold = substr($dataucold,6,2);
		
		
		if ($retorno){

		$datauc = $anouc . $mesuc . $diauc;
		
		#if ($form_data <> "none"){
		#	$imgdata = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
		#		$prod->setcampo20($form_data_size);
		#		$prod->setcampo21($form_data_type);
		#		$prod->setcampo6($imgdata);
		#}
		
		
		// INSERE FOTOS NO SISTEMA
		if ($form_data <> ""){
			#$imgdata = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
		
			//DEFINICOES
			$path = "images_prod/";
			$upload_file_name = "form_data";
			$acceptable_file_types = "image/gif|image/jpeg|image/pjpeg";
			$default_extension = "";
				// OPTIONS:
				//   1 = overwrite mode
				//   2 = create new with incremental extention
				//   3 = do nothing if exists, highest protection
				//   4 = change file name
				$mode = 4;
			
			// INSERIR IMAGENS
				// Create a new instance of the class
				$my_uploader = new uploader($_POST['language']); // for error messages in french, try: uploader('fr');
				
				// OPTIONAL: set the max filesize of uploadable files in bytes
				$my_uploader->max_filesize(40000);
				
				// OPTIONAL: if you're uploading images, you can set the max pixel dimensions 
				$my_uploader->max_image_size(640, 480); // max_image_size($width, $height)
				
				// UPLOAD the file
				if ($my_uploader->upload($upload_file_name, $acceptable_file_types, $default_extension)) {
					$my_uploader->save_file($path, $mode, $codprodold);
				}

				#echo $form_data;

				#if ($my_uploader->error) {
				#	echo $my_uploader->error . "<br><br>\n";
				#}

			// ATUALIZA DADOS DA IMAGEM
		$prod->setcampo20($my_uploader->file['size']);
		$prod->setcampo21($my_uploader->file['type']);
		$prod->setcampo28($my_uploader->file['name']);
		$prod->setcampo29($my_uploader->file['extention']);

		}


		$codcs = explode(":", $codcs);
		$codcat = "$codcs[0]";
		$codsubcat = "$codcs[1]";
		
		$prod->setcampo19($nomeprod);
		$pvv = str_replace('.','',$pvv);
		$pvv = str_replace(',','.',$pvv);
		$prod->setcampo12($pvv);
		#$prod->setcampo8($datauc);
		$prod->setcampo1($codcat);
		
		$prod->setcampo2($codsubcat);
		#$prod->setcampo3($codmoeda);
		$prod->setcampo4($descres);
		$prod->setcampo5($descdet);
		$prod->setcampo9($codbarra);
		#$puc = str_replace('.','',$puc);
		#$puc = str_replace(',','.',$puc);
		#$prod->setcampo10($puc);
		#$pcm = str_replace('.','',$pcm);
		#$pcm = str_replace(',','.',$pcm);
		#$prod->setcampo11($pcm);
		$pvvcj = str_replace('.','',$pvvcj);
		$pvvcj = str_replace(',','.',$pvvcj);
		$prod->setcampo13($pvvcj);
		$pva = str_replace('.','',$pva);
		$pva = str_replace(',','.',$pva);
		$prod->setcampo14($pva);
		$pvacj = str_replace('.','',$pvacj);
		$pvacj = str_replace(',','.',$pvacj);
		$prod->setcampo15($pvacj);
		$mtv = str_replace('.','',$mtv);
		$mtv = str_replace(',','.',$mtv);
		$prod->setcampo16($mtv);
		$mta = str_replace('.','',$mta);
		$mta = str_replace(',','.',$mta);
		$prod->setcampo17($mta);
		$prod->setcampo18($idicj);
		$prod->setcampo23($hist);
		$prod->setcampo24($kit);
		if ($chkcb==""){$chkcb="N";}
			$prod->setcampo22($chkcb);
		$prod->setcampo25($garum);
		$prod->setcampo26($garcj);
		$prod->setcampo27($lib_linha);
		$prod->setcampo6("");
		
						
		$prod->upProdImg($tabela, $condicao1, $form_data);
		
		if ($unidadeold == "CJ" or $kitold == "Y"){
		$Actionter="lock";
		$url= "$PHP_SELF?codprodselect=$codprodold&Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$codpgsec&pgold=$pg";
		include("redirect.php");

		//VARIAVEIS
		#$codprodselect=$codprodold;$Action="list";$desloc=0;
		#$retlogin=$retlogin;$connectok="$connectok";$pg=$codpgsec;$pgold=$pg;
		#include("restrito.php");
		}
		
		$Actionsec="list";
		
		

		}
		$nomeformsec=" ATUALIZAR $nomeform ";
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		$prod->delProd($tabela, $condicao1);
		$prod->delProd("estoque", $condicao1);

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		if ($palavrachave == ""){$condicao2 = "";}
		
		if ($codprodpesq <>""){$condicao2 = "codprod=$codprodpesq";}

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao2, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod, pvv, pva, unidade, hist, kit ", $tabela, $condicao2, $array, $array_campo, $parm );

		
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

	if (!(consisteVazioTamanho(form, form.nomeprod.name, 150)))
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
                        
  </center>
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>ADMINISTRAÇÃO</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
                          DE $nomeform</font><br>
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
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data' onSubmit = 'if (verificaObrig(document.Form)==false) return false'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='2' cellpadding='1' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
					  ");
					if ($Action=="update"):
			echo("
						  <table border='0' width='100%' cellspacing='1' cellpadding='2'>
                                    <tr>
                                      <td width='50%'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
						");
						  if($imgsizeold ==0){
							  echo(" <img src='images/semimagem.gif'>");
						  }else{
							  echo("
						  
						  <img src='images_prod/$imgnameold'>
							  ");
						  }
						  echo("
						  
						  </font></td>
                                      <td width='50%'><b><font face='Verdana' size='2'>COD.:
                                        $codprod</font><font face='Verdana' size='5'><br>
                                        </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='4'>$nomeprodold</font></b>
                                        <p><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>tamanho</b></font><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>:
                                        </b>$imgsizeold Kb<br>
                                        <b>tipo: </b>$imgtypeold</font></td>
                                    </tr>
                                  </table>
						<input type='hidden' value='$nomeprodold' name='nomeprod' size='50' >
											");
										endif;
			echo("
</font></td>
                          </tr>

			   <tr bgcolor='#FFCC99'>  
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Unidade do Produto</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             
               ");          
			if ($Action=="update"):
			echo("
                          <b><font size='2' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>$unidadeold</font></b>
				");
			else:
			echo("			
							<select size='1' name='unidade' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
                            <option selected value='$PHP_SELF?Action=insert&unidade=UM&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>UM</option>
							<option  value='$PHP_SELF?Action=insert&unidade=CJ&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente'>CJ</option>
							
							<option  value='$PHP_SELF?Action=insert&unidade=$unidade&codempselect=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente' selected>$unidade</option>
							</select>

								<input type='hidden' name='unidade' value='$unidade'>

				");
			endif;
			echo("
			
								
	
						 
						  </font></td>
                          </tr>
                          
<tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></td>
                          </tr>

			");
			if ($Action<>"update"):
			echo("

			
                          <tr bgcolor='#93BEE2'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome Produto:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
			
                                <input type='text' value='$nomeprodold' name='nomeprod' size='50' >
			
                          
                              </font></td>
                          </tr>
						
					  	");
			
			endif;
			echo("
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Descrição Simples:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$descresold' name='descres' size='30' maxlength='150'>
                              </font></td>
                          </tr>
							   <tr bgcolor='#D6E7EF'> 
                            
                            <td width='100%' colspan='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>Descrição Detalhada:</b>
							
 



                             
							 </td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            
                            <td width='100%' colspan='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
							
 



                             <textarea rows='5' name='descdet' cols='60' rows='300'  style='height:300 '>$descdetold</textarea>
                              </font>
							<script language='javascript1.2'>
							editor_generate('descdet');
							</script>	 
							 </td>
                          </tr>
						
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Cod. Barra:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$codbarraold' name='codbarra' size='30' maxlength='50'>
                              </font></td>
                          </tr>
							 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Categoria</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codcs'>
                             
						  
	");

	$prod->listProdgeral("categoria", $condicao2, $array, $array_campo , "order by nomecat");
	for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nomecat = $prod->showcampo1();
			$codcat = $prod->showcampo0();

	$prod->listProdgeral("subcategoria", "codcat=$codcat", $array1, $array_campo1 , "");
	for($j = 0; $j < count($array1); $j++ ){
		$prod->mostraProd( $array1, $array_campo1, $j );
			$nomesubcat = $prod->showcampo2();
			$codsubcat = $prod->showcampo0();

	echo("		
		<option selected value='$codcat:$codsubcat'>$nomecat - $nomesubcat</option>
		");
	}
	}
	
	if ($Action=="update"){

		$prod->listProdgeral("categoria", "codcat=$codcatold", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
			$nomecat = $prod->showcampo1();
		$prod->listProdgeral("subcategoria", "codsubcat=$codsubcatold", $array1, $array_campo1 , "");
		$prod->mostraProd( $array1, $array_campo1, 0 );
			$nomesubcat = $prod->showcampo2();

		echo("		
		<option selected value='$codcatold:$codsubcatold'>$nomecat - $nomesubcat</option>
			
		");
	}
	
	echo("	
						  </select>
						  </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Imagem Produto:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='file'  name='form_data' size='30' >
                              </font></td>
							 </tr>

								   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Garantia UM:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$garumold' name='garum' size='5'> meses (ex:12)
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Garantia CJ:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$garcjold' name='garcj' size='5'> meses (ex:12)
                              </font></td>
                          </tr>

						

							
");
if (($Action == "insert" and $unidade <> "CJ") or ($Action == "update" and $unidadeold <> "CJ")){
	echo("

						
                          
						   
						    <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Margem Trabalho Varejo:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$mtvold' name='mtv' size='5' onChange='consisteValor(this.form, this.form.mtv.name, true)'> %
                              </font></td>
                          </tr>
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Margem Trabalho Atacado:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$mtaold' name='mta' size='5' onChange='consisteValor(this.form, this.form.mta.name, true)'> %
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Preco Venda Varejo:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$pvvold' name='pvv' size='10' onChange='consisteValor(this.form, this.form.pvv.name, true)'>
                              </font></td>
                          </tr>
						  <tr bgcolor='#D6E7EF''> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Preco Venda Varejo CJ:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$pvvcjold' name='pvvcj' size='10' onChange='consisteValor(this.form, this.form.pvvcj.name, true)'>
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Preco Venda Atacado:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$pvaold' name='pva' size='10' onChange='consisteValor(this.form, this.form.pva.name, true)'>
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Preco Venda Atacado CJ:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$pvacjold' name='pvacj' size='10' onChange='consisteValor(this.form, this.form.pvacj.name, true)'>
                              </font></td>
                          </tr>
						 
						 
						  
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>IDICJ:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
			");
			if ($idicjold=="Y"):
			echo("
                             <input type='checkbox' name='idicj' value='Y' checked > Identificador de Conjunto <br>(Caso este produto possa fazer parte de um conjunto)
				");
			else:
			echo("
                             <input type='checkbox' name='idicj' value='Y' > Identificador de Conjunto <br>(Caso este produto possa fazer parte de um conjunto)
				");
			endif;
			echo("
                              </font></td>
                          </tr>
								    <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Verificador Cod. Barra</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
			");
			if ($Action == "update"){
				if ($chkcbold=="N" or $chkcbold==""):
				echo("
								 <input type='checkbox' name='chkcb' value='Y'  > Necessita de verificar codigo de barras para retirada do produto do estoque.
					");
				else:
				echo("
								 <input type='checkbox' name='chkcb' value='Y' checked> Necessita de verificar codigo de barras para retirada do produto do estoque.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='chkcb' value='Y' checked> Necessita de verificar codigo de barras para retirada do produto do estoque.
				");
			}
			echo("
                              </font></td>
                          </tr>
					  <tr bgcolor='#93BEE2'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Kit Fechado:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
			");
			if ($Action <> "update"){
			if ($kitold=="Y"):
			echo("
                             <input type='checkbox' name='kit' value='Y' checked > Montar um produto unitário contendo um conjunto de outros produtos.
				");
			else:
			echo("
                             <input type='checkbox' name='kit' value='Y' >  Montar um produto unitário contendo um conjunto de outros produtos.
				");
			endif;
			echo("
                              </font></td>
                          </tr>
							

");
			}else{
			echo("
                             <input type='hidden' name='kit' value='$kitold' >  Montar um produto unitário contendo um conjunto de outros produtos.
				");

			}
				}
echo("
		    <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Produto Fora de Linha</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($Action == "update"){
				if ($histold=="N" or $histold==""):
				echo("
								 <input type='checkbox' name='hist' value='Y'  > Produto nao será listado em futuros pedidos por estar fora de linha.
					");
				else:
				echo("
								 <input type='checkbox' name='hist' value='Y' checked> Produto nao será listado em futuros pedidos por estar fora de linha.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='hist' value='Y' checked> Produto nao será listado em futuros pedidos por estar fora de linha.
				");
			}
			echo("
                              </font></td>
                          </tr>
			    <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Listar produto s/ estoque</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($Action == "update"){
				if ($lib_linhaold=="N" or $lib_linhaold==""):
				echo("
								 <input type='checkbox' name='lib_linha' value='Y'  > Produto continuará sendo listado mesmo depois de ter esgotado o estoque.
					");
				else:
				echo("
								 <input type='checkbox' name='lib_linha' value='Y' checked> Produto continuará sendo listado mesmo depois de ter esgotado o estoque.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='lib_linha' value='Y' checked> Produto continuará sendo listado mesmo depois de ter esgotado o estoque.
				");
			}
			echo("
                              </font></td>
                          </tr>
	                       <tr > 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
				");
			if ($Action=='update'):$value="Atualizar";else:$value="Adicionar";endif;
			if($unidadeold=="CJ" or $kitold == "Y"){$value="Continuar => Inserir Produtos do Conjunto";}
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
				
                   </p>
					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codprod' value='$codprodold'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
                  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
        		  <input type='hidden' name='pg' value='$pg'>
		

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


/// INICIO - PARTE DE LISTAGEM DOS REGISTROS ////
else:

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
  </center>
	

	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width='30%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933' >$titulo</font></font></b></td>
      <td width='70%' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>

	  <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		<b>PESQUISA POR:</b><br>
		COD: <input type='text' name='codprodpesq' size='5'> 
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=insert&retlogin=$retlogin&connectok=$connectok&pg=$pg'>INSERIR
              NOVO</a></b></font></td>
            <td width='7%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='30%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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
");
		if ($my_uploader->error) {
			echo $my_uploader->error . "<br><br>\n";
		}
echo("
    </td>
  </tr>
  </table>
  </center>
</div>

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='35%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME PROD</font></b></div>
    </td>
    <td  align='center' width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>UNID.</font></b></div>
    </td>
    <td align='center' width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PVV</font></b></div>
    </td>
	 <td align='center' width='15%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PVA</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
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
			$unidade = $prod->showcampo4();
			$hist = $prod->showcampo5();
			$kit = $prod->showcampo6();


						
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

		echo("
		<tr bgcolor='$cor'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codprod</font></td>
			<td width='35%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomeprod</font></td>
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$unidade</font></td>
			<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$pvv</font></td>
			<td align='center' width='15%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$pva</font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=update&codprod=$codprod&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><!--<a href='$PHP_SELF?Action=delete&codprod=$codprod&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a>--></font></td>
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
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg";   

include("numcontg.php");
}

include ("sif-rodape.php");

}
?>
       
