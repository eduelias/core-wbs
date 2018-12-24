

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 30;
$tabela = "clientenovo";					// Tabela EM USO
$condicao1 = "codcliente=$codcliente";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CLIENTE";
$titulo = "CADASTRO DE CLIENTE";

if ($tipocliente==""){$tipocliente='F';}

// INICIO DA CLASSE
$prod = new operacao();

	// PARA PAGINA DE SEGURANCA SECUNDARIA
	$prod->listProd("seguranca", "arquivo='inicioclienteform_vend.php'");
		$codpgsec = $prod->showcampo0();



// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$dataatual = $prod->gdata();

		// So precisa SETAR os valores do formulario
		// Dados do Cliente 
			$prod->setcampo0("");
			$prod->setcampo1($nome);
			$prod->setcampo2($dataatual);
			$prod->setcampo3($tipocliente);
			$prod->setcampo4($cpf);
			$prod->setcampo5($cnpj);
			$prod->setcampo6($rg);
			$prod->setcampo7($rgemissor);
			$prod->setcampo8($ie);
			$prod->setcampo9($datanasc);
			$prod->setcampo10($dataativ);
			$prod->setcampo11($sexo);
			$prod->setcampo12($ecivil);
			$prod->setcampo13($nacionalidade);
			$prod->setcampo14($endereco);
			$prod->setcampo15($bairro);
			$prod->setcampo16($cidade);
			$prod->setcampo17($cep);
			$prod->setcampo18($estado);
			$prod->setcampo19($tempolocal);
			$prod->setcampo20($tipolocal);
			$prod->setcampo21($dddtel1);
			$prod->setcampo22($tel1);
			$prod->setcampo23($dddtel2);
			$prod->setcampo24($tel2);
			$prod->setcampo25($ramal);
			$prod->setcampo26($fatmensal);
			$prod->setcampo27($atividade);
		// Dados da Empresa Cliente
			$prod->setcampo28($c_empresa);
			$prod->setcampo29($c_cnpj);
			$prod->setcampo30($c_tempoemp);
			$prod->setcampo31($c_ocupacao);
			$prod->setcampo32($c_descricao);
			$prod->setcampo33($c_rendamensal);
			$prod->setcampo34($c_outrasrendas);
			$prod->setcampo35($c_endereco);
			$prod->setcampo36($c_bairro);
			$prod->setcampo37($c_cidade);
			$prod->setcampo38($c_cep);
			$prod->setcampo39($c_estado);
			$prod->setcampo40($c_dddtel);
			$prod->setcampo41($c_tel);
			$prod->setcampo42($c_ramal);
			$prod->setcampo43($c_endcorresp);
		// Dados do Conjuge
			$prod->setcampo44($cj_nome);
			$prod->setcampo45($cj_cpf);
			$prod->setcampo46($cj_rg);
			$prod->setcampo47($cj_rgemissor);
			$prod->setcampo48($cj_datanasc);
			$prod->setcampo49($cj_empresa);
			$prod->setcampo50($cj_ocupacao);
			$prod->setcampo51($cj_descricao);
			$prod->setcampo52($cj_rendamensal);
			$prod->setcampo53($cj_dddtel);
			$prod->setcampo54($cj_tel);
			$prod->setcampo55($cj_ramal);
		// Referencia Bancaria
			$prod->setcampo56($rb_banco);
			$prod->setcampo57($rb_agencia);
			$prod->setcampo58($rb_conta);
			$prod->setcampo59($rb_tipo);
			$prod->setcampo60($rb_dddtel);
			$prod->setcampo61($rb_tel);
			$prod->setcampo62($rb_clientedesde);
		// Referencia Pessoal
			$prod->setcampo63($rp_nome1);
			$prod->setcampo64($rp_dddtel1);
			$prod->setcampo65($rp_tel1);
			$prod->setcampo66($rp_nome2);
			$prod->setcampo67($rp_dddtel2);
			$prod->setcampo68($rp_tel2);
		// Referencia Comercial
			$prod->setcampo69($rc_nome1);
			$prod->setcampo70($rc_dddtel1);
			$prod->setcampo71($rc_tel1);
			$prod->setcampo72($rc_nome2);
			$prod->setcampo73($rc_dddtel2);
			$prod->setcampo74($rc_tel2);
		// Outros
			$prod->setcampo75($obsvend);
			$prod->setcampo76($obscredito);
			$prod->setcampo77($email);
			$prod->setcampo78($dataatual);
			$prod->setcampo80("S");
			$prod->setcampo81($contatocomprador);
			$prod->setcampo82($contatofinanceiro);
			$prod->setcampo83($dddfax);
			$prod->setcampo84($fax);
			$prod->setcampo85($login);
			$prod->setcampo86($rescredito);
			$prod->setcampo87($login);

		$prod->addProd($tabela, $ureg);

		$Actionsec="list";
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":

		// FUNCIONA SOMENTE PARA ATUALIZACAO DOS DADOS DA PESSOA FISICA, POIS E NECESSARIO LISTAR OS DADOS DEPOIS DA ATUALIZACAO
			
		$prod->listProd($tabela, $condicao1);

		// Dados do Cliente 
		$xdatacad=		$prod->showcampo2();


		if ($retorno){

		$dataatual = $prod->gdata();

		// Dados do Cliente 
			$prod->setcampo0($codcliente);
			$prod->setcampo1($nome);
			$prod->setcampo2($xdatacad);
			$prod->setcampo3($tipocliente);
			$prod->setcampo4($cpf);
			$prod->setcampo5($cnpj);
			$prod->setcampo6($rg);
			$prod->setcampo7($rgemissor);
			$prod->setcampo8($ie);
			$prod->setcampo9($datanasc);
			$prod->setcampo10($dataativ);
			$prod->setcampo11($sexo);
			$prod->setcampo12($ecivil);
			$prod->setcampo13($nacionalidade);
			$prod->setcampo14($endereco);
			$prod->setcampo15($bairro);
			$prod->setcampo16($cidade);
			$prod->setcampo17($cep);
			$prod->setcampo18($estado);
			$prod->setcampo19($tempolocal);
			$prod->setcampo20($tipolocal);
			$prod->setcampo21($dddtel1);
			$prod->setcampo22($tel1);
			$prod->setcampo23($dddtel2);
			$prod->setcampo24($tel2);
			$prod->setcampo25($ramal);
			$prod->setcampo26($fatmensal);
			$prod->setcampo27($atividade);
		// Dados da Empresa Cliente
			$prod->setcampo28($c_empresa);
			$prod->setcampo29($c_cnpj);
			$prod->setcampo30($c_tempoemp);
			$prod->setcampo31($c_ocupacao);
			$prod->setcampo32($c_descricao);
			$prod->setcampo33($c_rendamensal);
			$prod->setcampo34($c_outrasrendas);
			$prod->setcampo35($c_endereco);
			$prod->setcampo36($c_bairro);
			$prod->setcampo37($c_cidade);
			$prod->setcampo38($c_cep);
			$prod->setcampo39($c_estado);
			$prod->setcampo40($c_dddtel);
			$prod->setcampo41($c_tel);
			$prod->setcampo42($c_ramal);
			$prod->setcampo43($c_endcorresp);
		// Dados do Conjuge
			$prod->setcampo44($cj_nome);
			$prod->setcampo45($cj_cpf);
			$prod->setcampo46($cj_rg);
			$prod->setcampo47($cj_rgemissor);
			$prod->setcampo48($cj_datanasc);
			$prod->setcampo49($cj_empresa);
			$prod->setcampo50($cj_ocupacao);
			$prod->setcampo51($cj_descricao);
			$prod->setcampo52($cj_rendamensal);
			$prod->setcampo53($cj_dddtel);
			$prod->setcampo54($cj_tel);
			$prod->setcampo55($cj_ramal);
		// Referencia Bancaria
			$prod->setcampo56($rb_banco);
			$prod->setcampo57($rb_agencia);
			$prod->setcampo58($rb_conta);
			$prod->setcampo59($rb_tipo);
			$prod->setcampo60($rb_dddtel);
			$prod->setcampo61($rb_tel);
			$prod->setcampo62($rb_clientedesde);
		// Referencia Pessoal
			$prod->setcampo63($rp_nome1);
			$prod->setcampo64($rp_dddtel1);
			$prod->setcampo65($rp_tel1);
			$prod->setcampo66($rp_nome2);
			$prod->setcampo67($rp_dddtel2);
			$prod->setcampo68($rp_tel2);
		// Referencia Comercial
			$prod->setcampo69($rc_nome1);
			$prod->setcampo70($rc_dddtel1);
			$prod->setcampo71($rc_tel1);
			$prod->setcampo72($rc_nome2);
			$prod->setcampo73($rc_dddtel2);
			$prod->setcampo74($rc_tel2);
		// Outros
			$prod->setcampo75($obsvend);
			$prod->setcampo76($obscredito);
			$prod->setcampo77($email);
			$prod->setcampo78($dataatual);
			$prod->setcampo80($asscontrato);
			$prod->setcampo81($contatocomprador);
			$prod->setcampo82($contatofinanceiro);
			$prod->setcampo83($dddfax);
			$prod->setcampo84($fax);
			$prod->setcampo85($login);
			$prod->setcampo86($rescredito);
		
		$prod->upProd($tabela, $condicao1);

		$Actionsec="list";

		}
		$nomeformsec=" ATUALIZAR $nomeform ";
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;

	 case "volta":

		
		
	
		
		 break;


	 case "delete":

		$prod->delProd($tabela, $condicao1);

		$prod->delProd("relacaocli", "codcliente_pri=$codcliente");

		$Actionsec="list";
		
		 break;

}

#echo("tc = $tipocliente - cpf = $CPFCLI - cgc = $CGCCLI");

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){

		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%' and";

		if (strlen($palavrachave1) < 3){$condicao2 = "";} 

		if ($palavrachave <> ""){
				$condicao3 = $condicao2;
				$condicao3 .= " logincad='$login'";
		}else{
				$condicao3 .= " logincad='$login'";
		}
				

		if ($tipocliente == 'F'){
			
			if ($CPFCLI <>""){
					$condicao3 .= " and cpf='$CPFCLI'";
			}
		}else{
			
			if ($CGCCLI <>""){
					$condicao3 .= " and cnpj='$CGCCLI'";
			}
		}

			

		echo("$condicao3");

		if ($condicao3 <> ""){

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", $tabela, $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcliente, nome, tipocliente, cpf, cnpj, logincad", $tabela, $condicao3, $array, $array_campo, $parm );
		
		}
		
		$Action="list";
		
	
		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

// BLOQUEAR EXIBIÇAO PARA ABRIR EM NOVA TELA
if ($lock <> 1){include("sif-topo.php");}else{include("sif-topolimpo.php");}

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


if($Action <> "list"):

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
                        
                        <td width='370'><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'>
						  ");
						  if ($lock <> 1){
							 echo("
						  <a href='$PHP_SELF?Action=list&amp;codempselect=$codemp&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&lock=$lock'><img border='0' src='images/bt-continuaped.gif' ><br>
                          <b>VOLTAR</b></a>
						  ");
						  }
						  echo("
						  
						  </font></td>
                      </tr>
                    </tbody>
                  </table>
                  <table cellSpacing='0' cellPadding='2' width='500' border='0'>
                    <tbody>
                      <tr>
                        <td width='27'><img src='images/n1c.gif' border='0' width='27' height='27'></td>
                        <td width='112'><b><font face='Verdana' color='#FF0000' size='1'>ESCOLHER
                          TIPO FORMULÁRIO</font></b></td>
                        <td width='27'><font face='Verdana' size='1'><b><img src='images/n2.gif' border='0' width='27' height='27'></b></font></td>
                        <td width='113'><b><font face='Verdana' color='#000000' size='1'>PREENCHIMENTO
                          DO FORMULÁRIO</font></b></td>
                        <td width='27'><font face='Verdana' size='1'><b><img src='images/n3.gif' border='0' width='27' height='27'></b></font></td>
                        <td width='114'><b><font face='Verdana' color='#000000' size='1'>DEVEDOR
                          SOLIDÁRIO</font></b></td>
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
  </center>
</div>



<form method='POST' action='$PHP_SELF?Action=insert'>
  <center></center>
  <div align='center'>
    <center>
    <table cellSpacing='1' width='550' border='0'>
      <tr>
        <td width='153%' bgColor='#86ACB5' colSpan='3'>
          <p align='left'><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff' size='4'>Tipo
          de Formulário</font></b></p>
        </td>
      </tr>
      <tr>
        <td width='36%' bgColor='#F3F8FA'>
          <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>PESSOA
          :</font></b></p>
        </td>
        <td width='102%' bgColor='#F3F8FA'><font color='#86ACB5'><input type='radio' CHECKED value='F' name='tipopessoa'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>FÍSICA
          </b></font><input type='radio' value='J' name='tipopessoa'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>JURÍDICA</b></font></font></td>
        <td width='15%' bgColor='#F3F8FA' rowSpan='2'><input class='sbttn' type='submit' value='OK' name='cond'></td>
      </tr>
      <tr>
        <td width='36%' bgColor='#F3F8FA'>
          <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>MODELO
          :</font></b></p>
        </td>
        <td width='102%' bgColor='#F3F8FA'><font color='#86ACB5'><input type='radio' CHECKED value='C' name='modelo'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>COMPLETO
          </b></font></font></td>
      </tr>
      <tr>
        <td width='153%' bgColor='#FFFFFF' colspan='3'>&nbsp;</td>
      </tr>
      <tr>
        <td width='153%' bgColor='#FFFFFF' colspan='3' align='left'>
		");
						  if ($lock <> 1){
							 echo("
          <table cellSpacing='1' cellPadding='2' width='30%' border='0'>
            <tr>
              <td width='28'><img src='images/bt-continuaped.gif' border='0' ></td>
              <td width='126'><font face='Verdana' size='1'><b>
			   
			  <a href='$PHP_SELF?Action=list&tipocliente=J&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'>VOLTAR</a>
			
			  
			  </b></font></td>
            </tr>
          </table>
				  ");
						  }
						  echo("
        </center><center></td>
      </tr>
    </table>
    </center>
  </div>
				<input type='hidden' name='desloc' value='0'>
				<input type='hidden' name='operador' value='OR'>
				 <input type='hidden' name='retlogin' value='$retlogin'>
				 <input type='hidden' name='connectok' value='$connectok'>
				 <input type='hidden' name='pg' value='$codpgsec'>
				  <input type='hidden' name='pgold' value='$pg'>
				    <input type='hidden' name='lock' value='$lock'>

</form>
&nbsp;
<p><br>

	

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
	<form method='POST' action='$PHP_SELF?Action=$Action' name='FormPesq' >
	 <tr> 
      <td width=' 223' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size='3' color='#FF9933'  >$titulo</font></font></b></td>
      <td width=' 327' colspan='2' > 
      <p align='center'>
");
if ($tipocliente == 'J'){$ckj = 'checked';}else{$ckf = 'checked';}


echo("

      <input type='radio' value='$PHP_SELF?Action=$Action&tipocliente=F&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg' $ckf name='R1' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA
      FÍSICA </b></font><input type='radio' $ckj name='R1' value='$PHP_SELF?Action=$Action&tipocliente=J&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg' onClick='getMessage(this)'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>PESSOA
      JURÍDICA</b></font>
	  </p>

		   </td>
    </tr>
    <tr> 
      <td width='524' colspan='2' >
        <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'><b>
        PESQUISA POR:</b></font></td>
      <td width='26' > 
	   </td>
    </tr>
    <tr> 
      <td width=' 223' valign='middle' >
        <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>
		NOME: <input type='text' name='palavrachave' size='20'></font></p>
      </td>
");
if ($tipocliente == 'J'){$doc = 'CGC';$docname = 'CGCCLI';}else{$doc = 'CPF';$docname = 'CPFCLI';}

echo("
      <td width='301' valign='middle' > 
      <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#52A0CF'>$doc: <input type='text' name='$docname' size='20' onchange='consiste$doc(this.form, this.form.$docname.name, true)'></font>
	   </td>
      <td width='26' > 
      <input class='sbttn' type='submit' name='cond' value='OK'>
	  
		<input type='hidden' name='desloc' value='0'>
		<input type='hidden' name='operador' value='OR'>
		 <input type='hidden' name='retlogin' value='$retlogin'>
		 <input type='hidden' name='connectok' value='$connectok'>
		 <input type='hidden' name='pg' value='$pg'>
		  <input type='hidden' name='tipocliente' value='$tipocliente'>
	
	  </p>
	   </td>
    </tr>
		</form>
  </table>
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
    <td width='30%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='25%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>Nº DOC</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RESP.</font></b></div>
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

			$codcliente = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$tipocliente = $prod->showcampo2();
			$xlogincad = $prod->showcampo5();
			if ($tipocliente =="F"){$doccliente = $prod->showcampo3();}else{$doccliente = $prod->showcampo4();}


		echo("
		<tr bgcolor='#D6E7EF' > 
			<td width='5%' height='0' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='40%' height='0' ><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='25%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$doccliente</font></b></td>
		<td width='10%' height='0'  align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$xlogincad</font></td>
			<td align='center' width='10%' height='0'>
");
if (strtolower($xlogincad) == strtolower($login)){
echo("
			<font size='1'><b><a
href='$PHP_SELF?Action=update&codcliente=$codcliente&tipopessoa=$tipocliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$codpgsec&pgold=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font>
");
}
echo("	
</td>
		
			<td align='center' width='10%' height='0'><font size='1'><b><!--<a
href='$PHP_SELF?Action=delete&codcliente=$codcliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a>--></font></td>
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

// BLOQUEAR EXIBIÇAO PARA ABRIR EM NOVA TELA
if ($lock <> 1){include ("sif-rodape.php");}


?>
       
