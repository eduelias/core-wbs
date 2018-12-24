

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "vendedor";					// Tabela EM USO
$condicao1 = "codvend=$codvendselect";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "USUÁRIO";
$titulo = "ADMINISTRAÇÃO DE $nomeform";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
	$prod->listProdgeral("vendedor", "nome='$nome'", $array614, $array_campo614 , "");

	if (count($array614) == 0){

		$dataatual = $prod->gdata();
		if ($nome==$login){$password = md5($senhanew);}
		$senhanew = base64_encode("$senhanew");
		
		$nome = strtolower($nome);
		$prod->setcampo1($nome);
		$prod->setcampo2($tipouser);
		$prod->setcampo3($codgrpuser);
		$prod->setcampo4($senhanew);
		$prod->setcampo5($fatorusertabela);
		$prod->setcampo6($fatorcusto);
		$prod->setcampo7($tipocliente);
		if ($tipocliente == "F"){
		$prod->setcampo8($CPFCLI);
		}else{
		$prod->setcampo8($CGCCLI);   
	    }
		if ($codsuper == ""){$codsuper= 0;}
		$prod->setcampo9($codsuper);

		#$codempcx = explode(":", $codempcx);
		#$codemp = "$codempcx[0]";
		#$codcx = "$codempcx[1]";
		
		$prod->setcampo10($codempcx);
		if ($block == ""){$block= "N";}
		$prod->setcampo11($block);
		$prod->setcampo12($msg);
		$prod->setcampo13($codcx);
		$prod->setcampo14($dataatual);
		$prod->setcampo15($dataatual);
		$prod->setcampo16($fatorcomissao);
		if ($allemp == ""){$allemp= "N";}
		$prod->setcampo17($allemp);
		if ($allcx == ""){$allcx= "N";}
		$prod->setcampo18($allcx);
		$prod->setcampo19($codncgrpuser);
		$prod->setcampo20($tiponcgrp);
		$prod->setcampo21($email_cel);
		$prod->setcampo22($email_nc);
		$prod->setcampo23($email_msg);
		$prod->setcampo24($ped_lib);
		$prod->setcampo25($codprojuser);
		$prod->setcampo26($tipouserproj);
		$meta = str_replace('.','',$meta);
		$meta = str_replace(',','.',$meta);
		$prod->setcampo27($meta);
		$prod->setcampo28($msg_fin);
		$prod->setcampo29($func);
		// Operacao de Caixa
			for($k = 0; $k < $contcaixa; $k++ ){
				$caixaf = $caixaf .":". $caixav[$k];
			}			
		$prod->setcampo30($caixaf);
		$prod->setcampo31($fatorcomissao_serv);
		$prod->setcampo32($list_cli);
		$prod->setcampo33($papel_rec);
		$prod->setcampo34($codemp_transf);
		$prod->setcampo37($data_inimcv);
        $prod->setcampo38($data_fimmcv);
		$prod->setcampo39($mcv_prot);
		$prod->setcampo40($mcv_aplic);
		if ( $meia_mcv == ""){$meia_mcv = "N";}
		$prod->setcampo41($meia_mcv);
		$alcada = str_replace('.','',$alcada);
		$alcada = str_replace(',','.',$alcada);
		$prod->setcampo44($alcada);



		echo "cx=$codcx, codemp =$codemp ";

		$prod->addProd($tabela, $ureg);

		if ($codsuper <> 0 ){
			$prod->setcampo0($codsuper);
			$prod->setcampo1($ureg);
			$prod->addProd("relacaohierarquia", $uregh);
		}

		//CRIA CONTA BANCARIA
		$prod->clear();
		$prod->setcampo4(0);
		$prod->setcampo5($dataatual);
		$prod->setcampo6($ureg);
		$prod->setcampo7("C");
		$prod->setcampo8($nome);
		$prod->setcampo9($codemp);
		
		$prod->addProd("fin_bcoconta", $uregbco);
				
		$Actionsec="list";
		
	}else{
	$erro= "Este <b>Login</b> já existente!";
	$insertini=1;
	}
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":
		$dataatual = $prod->gdata();

		$prod->listProd($tabela, $condicao1);
				
		$nomeold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipouserold = $prod->showcampo2();
		$codgrpold = $prod->showcampo3();
		$senhaold = $prod->showcampo4();
		$senhaold_decrypt = base64_decode("$senhaold");
		$fatorusertabelaold = $prod->showcampo5();
		$fatorcustoold = $prod->showcampo6();
		$tipoclienteold = $prod->showcampo7();
		$docold = $prod->showcampo8();
		$codsuperold = $prod->showcampo9();
		$codempold = $prod->showcampo10();
		$blockold = $prod->showcampo11();
		$msgold = $prod->showcampo12();
		$codcxold = $prod->showcampo13();
		$datainiold = $prod->showcampo14();
		$fatorcomissaoold = $prod->showcampo16();
		$allempold = $prod->showcampo17();
		$allcxold = $prod->showcampo18();
		$codncgrpold = $prod->showcampo19();
		$tiponcgrpold = $prod->showcampo20();
		$email_celold = $prod->showcampo21();
		$email_ncold = $prod->showcampo22();
		$email_msgold = $prod->showcampo23();
		$ped_libold = $prod->showcampo24();
		$codprojold = $prod->showcampo25();
		$tipouserprojold = $prod->showcampo26();
		$metaold = $prod->showcampo27();
		$metaold = number_format($metaold, 2,',', '.');
		$msg_finold = $prod->showcampo28();
		$func_old = $prod->showcampo29();
		$xcaixa=		$prod->showcampo30();
		$xcaixashow = explode(":", $xcaixa);
		$xfatorcomissao_serv = $prod->showcampo31();
		$list_cliold = $prod->showcampo32();
		$papel_recold = $prod->showcampo33();
		$codemp_transfold = $prod->showcampo34();
		$xdata_inimcv = $prod->showcampo37();
		$xdata_fimmcv = $prod->showcampo38();
		$xmcv_prot = $prod->showcampo39();
		$xmcv_aplic = $prod->showcampo40();
		$xmeia_mcv = $prod->showcampo41();
		if ($xmeia_mcv == "S"){$chk_meiamcv = "checked";}else{$chk_meiamcv = "";}
        $xalcada = $prod->showcampo44();
		$xalcada = number_format($xalcada, 2,',', '.');
		
		#echo("tco=$tipoclienteold");
		
		if ($retorno){

	
		
		#echo("$nome - $login"); 
		#echo("$tipocliente - $CPFCLI - $CGCCLI");
		if ($nome==$login){$password = md5($senhanew);}
		$senhanew = base64_encode("$senhanew");
		#if ($senhaold <> $senhanew){$senhanew = md5($senhanew);}

		$nome = strtolower($nome);
		$prod->setcampo1($nome);
		$prod->setcampo2($tipouser);
		$prod->setcampo3($codgrpuser);
		$prod->setcampo4($senhanew);		
		$prod->setcampo5($fatorusertabela);
		$prod->setcampo6($fatorcusto);
		$prod->setcampo7($tipocliente);
		if ($tipocliente == "F"){
		$prod->setcampo8($CPFCLI);
		}else{
		$prod->setcampo8($CGCCLI);
		}
		if ($codsuper == ""){$codsuper= 0;}
		$prod->setcampo9($codsuper);

		#$codempcx = explode(":", $codempcx);
		#$codemp = "$codempcx[0]";
		#$codcx = "$codempcx[1]";

		$prod->setcampo10($codempcx);
		if ($block == ""){$block= "N";}
		$prod->setcampo11($block);
		$prod->setcampo12($msg);
		$prod->setcampo13($codcx);
		$prod->setcampo14($datainiold);
		$prod->setcampo15($dataatual);
		$prod->setcampo16($fatorcomissao);
		if ($allemp == ""){$allemp= "N";}
		$prod->setcampo17($allemp);
		if ($allcx == ""){$allcx= "N";}
		$prod->setcampo18($allcx);
		$prod->setcampo19($codncgrpuser);
		$prod->setcampo20($tiponcgrp);
		$prod->setcampo21($email_cel);
		$prod->setcampo22($email_nc);
		$prod->setcampo23($email_msg);
		$prod->setcampo24($ped_lib);
		$prod->setcampo25($codprojuser);
		$prod->setcampo26($tipouserproj);
		$meta = str_replace('.','',$meta);
		$meta = str_replace(',','.',$meta);
		$prod->setcampo27($meta);
		$prod->setcampo28($msg_fin);
		$prod->setcampo29($func);
		// Operacao de Caixa
			for($k = 0; $k < $contcaixa; $k++ ){
				$caixaf = $caixaf .":". $caixav[$k];
			}			
		$prod->setcampo30($caixaf);
		$prod->setcampo31($fatorcomissao_serv);
		$prod->setcampo32($list_cli);
		$prod->setcampo33($papel_rec);
		$prod->setcampo34($codemp_transf);
		$prod->setcampo37($data_inimcv);
        $prod->setcampo38($data_fimmcv);
		$prod->setcampo39($mcv_prot);
		$prod->setcampo40($mcv_aplic);
		if ( $meia_mcv == ""){$meia_mcv = "N";}
		$prod->setcampo41($meia_mcv);
		$alcada = str_replace('.','',$alcada);
		$alcada = str_replace(',','.',$alcada);
		$prod->setcampo44($alcada);

		$prod->upProd($tabela, $condicao1);

		// ATUALIZA CODEMP NO BANCO
		$prod->listProd("fin_bcoconta", "codvend = $codvendold");
		$prod->setcampo9($codemp);
		$prod->upProd("fin_bcoconta", "codvend = $codvendold");

		if ($codsuper <> 0 ){
			if ($codsuperold == 0){
				$prod->setcampo0($codsuper);
				$prod->setcampo1($codvendold);
				$prod->addProd("relacaohierarquia", $ureg);
			}else{
				$prod->setcampo0($codsuper);
				$prod->setcampo1($codvendold);
				$prod->upProd("relacaohierarquia", "codvend=$codvendold");
			}
		}else{
				$prod->delProd("relacaohierarquia", "codvend=$codvendold");
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

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		if ($palavrachave == ""){$condicao2 = "";}

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao2, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codvend, nome, tipo, codgrp, block, dataatualiza", $tabela, $condicao2, $array, $array_campo, $parm );
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

");
if ($Action == "insert" and $insertini == 1){

	$tipodoc = "F";
}else{
	if ($Action == "update" and $updateini == 1){
		if ($tipoclienteold == ""){$tipoclienteold = "F";}
		$tipodoc = $tipoclienteold;
	}else{
		$tipodoc = $tipocliente;
	}
}


if ($tipodoc <> "F"){
echo("
	 if (!(consisteCGC (form, form.CGCCLI.name, true)))
    {
        return false;
    }
");
}else{
echo("
	 if (!(consisteCPF (form, form.CPFCLI.name, true)))
    {
        return false;
    }
");
}
echo("


	if (!(consisteTamanhoMinimoMaximo(form, form.nome.name, 4, 14)))
    {
        return false;
    }
	if (!(consisteTamanhoMinimoMaximo(form, form.senhanew.name, 6, 12)))
    {
        return false;
    }
	if ((form.tipouser.value != 'V') && (form.codemp.value == 0) && (form.codsuper.value != 0))
	{
		alert ('É necessário escolher uma empresa para esse TIPO DE VENDA e CODIGO SUPERVISOR DIFERENTE DE 0 (ZERO).');
		eval ('form.codemp.focus ()');
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
	
    if (campo == 'senhanew')
        return 'Campo SENHA ';
	if (campo == 'nome')
        return 'Campo LOGIN';
	if (campo == 'CPFCLI')
        return 'Campo CPF';
	if (campo == 'CGCCLI')
        return 'Campo CGC/CNPJ';
	else
        return 'Campo não cadastrado';
}

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
	echo("
 <script src='calendar.js' type='text/javascript' language='javascript'></script>
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
                        <table border='0' width='90%' cellspacing='1' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
					  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'></font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 

");
if ($Action == "insert" and $insertini == 1){

	$ckf = 'checked';

}else{
	if ($Action == "update" and $updateini == 1){
		if ($tipoclienteold == 'J'){$ckj = 'checked';}else{$ckf = 'checked';}
	}else{
		if ($tipocliente == 'J'){$ckj = 'checked';}else{$ckf = 'checked';}
	}
}

echo("

				
							<input type='radio' value='$PHP_SELF?Action=$Action&tipocliente=F&codvendselect=$codvendold&desloc=$desloc&codempselect=$codempselect&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente' $ckf name='R1' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA FÍSICA </b></font>
							<input type='radio' $ckj name='R1' value='$PHP_SELF?Action=$Action&tipocliente=J&codvendselect=$codvendold&desloc=$desloc&codempselect=$codempselect&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg#cliente' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA JURÍDICA</b></font>

			                          
                              </font></td>
                          </tr>
								    ");

if ($Action == "insert" and $insertini == 1){

	$doc = 'CPF';$docname = 'CPFCLI';

}else{
	if ($Action == "update" and $updateini == 1){
		if ($tipoclienteold == 'J'){$doc = 'CGC';$docname = 'CGCCLI';}else{$doc = 'CPF';$docname = 'CPFCLI';}
	}else{
		if ($tipocliente == 'J'){$doc = 'CGC';$docname = 'CGCCLI';}else{$doc = 'CPF';$docname = 'CPFCLI';}
	}
}

						echo("

						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>$doc</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                             
						<input type='text' name='$docname' size='20' value = '$docold' onchange='consiste$doc(this.form, this.form.$docname.name, true)'>

			                          
                              </font></td>
							</tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Login:</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
");
if ($Action == "update"){								  
echo("							<b>$nomeold</b>
                                 <input type='hidden' name='nome' value='$nomeold'>
");
}else{
echo("				
                                <input type='text' value='$nomeold' name='nome' size='14' maxlength='14' onchange='consisteTamanhoMinimoMaximo(this.form, this.form.nome.name, 4,14)' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>(letras
      minúsculas e sem espaço.)</font><br>
								<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'>$erro</font>
");
}
echo("
			                          
                              </font> </td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Senha:</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='password' value='$senhaold_decrypt' name='senhanew' size='8' maxlength='8' onchange='consisteTamanhoMinimoMaximo(this.form, this.form.senhanew.name, 6,8)' >
			                          
                              </font> <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>(min. 6 e max. 8 caracteres)</font></td>
                          </tr>
						 			   <tr bgcolor='#D6E7EF'>  
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Tipo Venda:</font></b></td>
                            <td width='30%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
							<select size='1' name='tipouser'>
							<option  value='V'>V</option>
							<option  value='A'>A</option>
							<option  value='R'>R</option>
	                        <option  value='C'>C</option>
							<option selected value='$tipouserold'>$tipouserold</option>
							</select><br>
							 ");
						                   if ($func_old =="Y"):
			echo("
                              <input type='checkbox' name='func' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='func' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><b>FUNCIONÁRIO</b></font></b><BR><b>
						 
						  </font></td>
							  <td width='44%'>							
							 <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>V => VAREJO <br>A => ATACADO<br> R => REVENDA<br> C => CORPORATIVO</font>
						 
						  </font></td>
                          </tr>
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Grupo</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codgrpuser'>
                             
						  
	");

	$prod->listProdgeral("segurancagrp", "", $array, $array_campo , "order by nomegrp");
	for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nomegrp = $prod->showcampo1();
			$codgrpuser = $prod->showcampo0();
	echo("		
		<option selected value='$codgrpuser'>$nomegrp</option>
	");
	}
	
	if ($Action=="update"){

		$prod->listProdgeral("segurancagrp", "codgrp=$codgrpold", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
			$nomegrp = $prod->showcampo1();
		echo("		
		<option selected value='$codgrpold'>$nomegrp</option>
		");
	}
	
	echo("	
						  </select>
						  </font></td></tr>

						<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>COD. Supervisor:</font></b></td>
                            <td width='30%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$codsuperold' name='codsuper' size='5' >
			                          <BR><b>
							 ");
						                   if ($msg_finold=="Y"):
			echo("
                              <input type='checkbox' name='msg_fin' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='msg_fin' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>REL. FINANCEIRO</font></b><BR><b>
                              </font></td>
								  <td width='44%'>							
							 <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>0 => ADMIN<br>OUTRO => CODIGO SUPERVISOR</font>
						 
						  </font></td>
                          </tr>
	                     <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Empresa</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codempcx'>
                             
						  
	");

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){
			
			$prod->mostraProd( $array6, $array_campo6, $j );

			$codemp = $prod->showcampo0();
			$nomeemp = $prod->showcampo1();
			

	echo("		
		<option selected value='$codemp'>$nomeemp</option>
		
	");
	}
		
	if ($Action=="update"){

			$prod->listProdU("nome", "empresa", "codemp=$codempold");
			$nomeemp = $prod->showcampo0();
		echo("		
			<option selected value='$codempold'><b>$nomeemp </b></option>]
		");
	}
	
	echo("	
			
						  </select>
						  </font><BR><b>
							 ");
						                   if ($allempold=="Y"):
			echo("
                              <input type='checkbox' name='allemp' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='allemp' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PERMITIR
  LISTAR TODAS AS EMPRESAS</font></b><BR><b>
							 						  </td>
						 
						  

						  </tr>
						<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>CAIXAS :</font></b></td>
                            <td width='74%' colspan ='2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 

					");

	
	$prod->listProdSum("codcx, codemp, nomecx" , "fin_cx", "1", $array45, $array_campo45, "order by codemp" );

	 for($i = 0; $i < count($array45); $i++ ){
			
			$prod->mostraProd( $array45, $array_campo45, $i );

			$codcx = $prod->showcampo0();
			$codemp_cx = $prod->showcampo1();
			$nomecx = $prod->showcampo2();
			$prod->listProdU("nome", "empresa", "codemp=$codemp_cx");
			$nomeemp_cx = $prod->showcampo0();

			
	 for($l = 0; $l < count($xcaixashow); $l++ ){

			if ($xcaixashow[$l] == $codcx){$chk = "checked";}
			
	 }

echo("
				 <font face='Verdana' size='1'><input type='checkbox' name='caixav[$i]' value='$codcx' $chk>$nomeemp_cx<b> - $nomecx</b></font><br>

					 ");
$chk = "";
	 }
	 echo("
       <input type='hidden' name='contcaixa' value='$i'>

			                          
                              </font></td>
                          </tr>
						 <tr bgcolor='#D6E7EF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Empresa Transferência</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                             <select size='1' class=drpdwn name='codemp_transf'>


	");

	$prod->listProdSum("codemp, nome", "empresa", "", $array6, $array_campo6 , "order by nome");
	for($j = 0; $j < count($array6); $j++ ){

			$prod->mostraProd( $array6, $array_campo6, $j );

			$codemp_transf = $prod->showcampo0();
			$nomeemp_transf = $prod->showcampo1();


	echo("
		<option value='$codemp_transf'>$nomeemp_transf</option>
		

	");}
	
	echo("<option selected value='0'>NENHUMA</option>");
	if ($Action=="update"){

            if ($codemp_transfold == 0){$nomeemp_transfold = 'NENHUMA';}else{
			$prod->listProdU("nome", "empresa", "codemp=$codemp_transfold");
			$nomeemp_transfold = $prod->showcampo0();
		echo("
			<option selected value='$codemp_transfold'><b>$nomeemp_transfold </b></option>
		");
		}
	}

	echo("

						  </select>
						  </font>
							 						  </td>



						  </tr>
						 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fator Usuário Tabela:</font></b></td>
                            <td width='74%' colspan ='2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$fatorusertabelaold' name='fatorusertabela' size='8' >
			                          
                              </font></td>
                          </tr>
								  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fator Custo:</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$fatorcustoold' name='fatorcusto' size='8' >
			                          
                              </font></td>
                          </tr>
								  	  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fator Comissão:</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$fatorcomissaoold' name='fatorcomissao' size='8' >
			                          
                              </font></td>
                          </tr>
								  	  	  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fator Comissão Serviço:</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$xfatorcomissao_serv' name='fatorcomissao_serv' size='8' >
			                          
                              </font></td>
                          </tr>
						<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Grupo N.C.</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codncgrpuser'>
                             
						  
	");

	$prod->listProdgeral("iso_nc_grupo", "", $array, $array_campo , "order by nomencgrp");
	for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nomencgrp = $prod->showcampo1();
			$codncgrpuser = $prod->showcampo0();
	echo("		
		<option selected value='$codncgrpuser'>$nomencgrp</option>
	");
	}
	
	if ($Action=="update"){

		$prod->listProdgeral("iso_nc_grupo", "codncgrp='$codncgrpold'", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
			$nomencgrp = $prod->showcampo1();
		echo("		
		<option selected value='$codncgrpold'>$nomencgrp</option>
		");
	}
	
	echo("	
						  </select>
						  </font>
						<BR><b>
							 ");
						                   if ($tiponcgrpold=="Y"):
			echo("
                              <input type='checkbox' name='tiponcgrp' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='tiponcgrp' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>SUPERVISOR DO GRUPO</font></b>
							 
						  </td></tr>
				<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>PROJETO</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codprojuser'>
                             
						  
	");

	$prod->listProdgeral("projeto_nome", "", $array, $array_campo , "order by nomeproj");
	for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nomeproj = $prod->showcampo1();
			$codproj= $prod->showcampo0();
	echo("		
		<option selected value='$codproj'>$nomeproj</option>
	");
	}
	
	if ($Action=="update"){

		$prod->listProdgeral("projeto_nome", "codproj='$codprojold'", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
			$nomeproj = $prod->showcampo1();
		echo("		
		<option selected value='$codprojold'>$nomeproj</option>
		");
	}
	
	echo("	
						  </select>
						  </font>
						<BR><b>
							 ");
						                   if ($tipouserprojold=="Y"):
			echo("
                              <input type='checkbox' name='tipouserproj' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='tipouserproj' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>SUPERVISOR DO PROJETO</font></b>
							 
						  </td></tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>META MENSAL:</font></b></td>
                            <td width='74%' colspan ='2'><b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> R$ </b>
				
                                <input type='text' value='$metaold' name='meta' size='10'  onChange='consisteValor(this.form, this.form.meta.name, true)' >
			                          
                              </font> <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>(ex.: 10.000,00)</font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>MENSAGEM SMS:</font></b></td>
                            <td width='74%' colspan ='2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
								<b>EMAIL:</b> <input type='text' value='$email_celold' name='email_cel' size='40' maxlength='100' >
			                          
                              </font>
								<BR><b>
							 ");
						                   if ($email_msgold=="Y"):
			echo("
                              <input type='checkbox' name='email_msg' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='email_msg' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>ENVIAR SMS DE NOVAS MENSAGENS</font></b>
							  
							  	<BR><b>
							 ");
						                   if ($email_ncold=="Y"):
			echo("
                              <input type='checkbox' name='email_nc' value='Y' checked > 
				");
			else:
			echo("
                              <input type='checkbox' name='email_nc' value='Y' > 
				");
			endif;
			echo("
						  <font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>ENVIAR SMS DE NOVAS NÃO CONFORMIDADES</font></b>
							  
							  
							  </td>
                          </tr>

					  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>LIBERAR PARA ENTREGA</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				");
                                if ($ped_libold=="Y"):
			echo("
                             <input type='checkbox' name='ped_lib' value='Y' checked ><b> LIBERAR PEDIDO PARA ENTREGA</b>
				");
			else:
			echo("
                             <input type='checkbox' name='ped_lib' value='Y' > <b> LIBERAR PEDIDO PARA ENTREGA</b>
				");
			endif;
			echo("
			                          
                              </font></td>
                          </tr>
                            <tr bgcolor='#D6E7EF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>ALÇADA:</font></b></td>
                            <td width='74%' colspan ='2'><b><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> R$ </b>

                                <input type='text' value='$xalcada' name='alcada' size='10'  onChange='consisteValor(this.form, this.form.alcada.name, true)' >

                              </font> <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>(ex.: 10.000,00)</font></td>
                          </tr>
                          		  <tr bgcolor='#D6E7EF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>CLIENTES</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
				");
                                if ($list_cliold=="Y"):
			echo("
                             <input type='checkbox' name='list_cli' value='Y' checked ><b> EDITAR TODOS OS CLIENTES</b>
				");
			else:
			echo("
                             <input type='checkbox' name='list_cli' value='Y' > <b>EDITAR TODOS OS CLIENTES</b>
				");
			endif;
			echo("

                              </font></td>
                          </tr>
                          		  <tr bgcolor='#D6E7EF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>PAPEL RECICLADO</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
				");
                                if ($papel_recold=="Y"):
			echo("
                             <input type='checkbox' name='papel_rec' value='Y' checked ><b> USAR PAPEL RECICLADO</b>
				");
			else:
			echo("
                             <input type='checkbox' name='papel_rec' value='Y' > <b> USAR PAPEL RECICLADO</b>
				");
			endif;
			echo("

                              </font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Bloquear Usuário</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				");
                                if ($blockold=="Y"):
			echo("
                             <input type='checkbox' name='block' value='Y' checked > (O usuário será bloquedo para acesso ao sistema)
				");
			else:
			echo("
                             <input type='checkbox' name='block' value='Y' > (O usuário será bloquedo para acesso ao sistema)
				");
			endif;
			echo("
			                          
                              </font></td>
                          </tr>

						 <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Mensagem Bloqueio:</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$msgold' name='msg' size='50' >
			                          
                              </font></td>
                          </tr>


							<tr>
                            <td width='100%' colspan='3' > 
                              <hr size='1'>
                            </td>
                          </tr>
                         </table>
                      </center>
                    </div>
                    
                    <table  border='0' cellspacing='2' cellpadding='2' width='80%'>
  <tr valign='top'>
    <td><fieldset>
      <legend class='titulos_itens'><strong> COMISS&Atilde;O GARANTIDA </strong></legend>
      <table width='100%'  border='0' cellspacing='1' cellpadding='1'>
        <tr>
          <td>DATA INICIO </td>
          <td><input name='data_inimcv' type='text' id='data_inimcv' size='20' onFocus = 'javascript:blur()' value = '$xdata_inimcv'>
            <a href=\"javascript:openCalendar('pg=$pg', 'Form', 'data_inimcv', 'datetime')\"><img src='images/b_calendar.png' width='16' height='16' border='0'></a></td>
        </tr>
        <tr>
          <td>DATA FIM <br></td>
          <td><input name='data_fimmcv' type='text' id='data_fimmcv' size='20' onFocus = 'javascript:blur()' value = '$xdata_fimmcv'>
            <a href=\"javascript:openCalendar('pg=$pg', 'Form', 'data_fimmcv', 'datetime')\"><img src='images/b_calendar.png' width='16' height='16' border='0'></a></td>
        </tr>
        <tr>
          <td>MCV PROTEGIDO </td>
          <td><input name='mcv_prot' type='text' size='10' id ='mcv_prot' value='$xmcv_prot' >
            % </td>
        </tr>
        <tr>
          <td>MCV APLICADO </td>
          <td><input name='mcv_aplic' type='text' size='10' id= 'mcv_aplic' value='$xmcv_aplic' >
            %</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type='checkbox' name='meia_mcv' value='S' id= 'meia_mcv' $chk_meiamcv >
          MEIA MCV </td>
        </tr>
      </table>
    </fieldset></td>
  </tr>
</table>
                    
					");
			if ($Action=='update'):$value="Atualizar";else:$value="Adicionar";endif;
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
					
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codvendselect' value='$codvendold'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
					  <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>



		<input type='hidden' name='tipocliente' value='$tipodoc'>
		    

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
      <td width=' 223' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size=' 3' color='#FF9933' ><b>$titulo</b></font></font></b></td>
      <td width=' 327' > 
			<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
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
            <td width='23%'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> <a href='$PHP_SELF?Action=insert&retlogin=$retlogin&connectok=$connectok&pg=$pg&insertini=1'>INSERIR
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
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME USUÁRIO</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DATA MODIF.</font></b></div>
    </td>
	<td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></div>
    </td>
	<td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>GRUPO</font></b></div>
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

			$codvend = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$tipo = $prod->showcampo2();
			$codgrpuser = $prod->showcampo3();
			$block = $prod->showcampo4();
			$datamod = $prod->showcampo5();

			// FORMATACAO //
			$datamodf = $prod->fdata($datamod);
			
			$prod->listProdgeral("segurancagrp", "codgrp=$codgrpuser", $array1, $array_campo1 , "");
			$prod->mostraProd( $array1, $array_campo1, 0 );
			$nomegrp = $prod->showcampo1();

			if ($block == "Y"){$bgcorlinha="#E1AFAA";}
			if ($block == "N" or $block == ""){$bgcorlinha="#D6E7EF";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codvend</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$nome</b></font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$datamodf</font></td>
			<td align='center' width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$tipo</font></td>
			<td align='center' width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomegrp</font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=update&codvendselect=$codvend&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg&updateini=1'><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
			<td align='center' width='10%' height='0'><font size='1'><!--<b><a href='$PHP_SELF?Action=delete&codvendselect=$codvend&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a>--></font></td>
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
       
