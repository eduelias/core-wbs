

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "empresa";					// Tabela EM USO
$condicao1 = "codemp=$codemp";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "EMPRESA";
$titulo = "ADMINISTRAÇÃO EMPRESA";

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){

		$dataatual = $prod->gdata();
		
		$datacad = $anocad . $mescad . $diacad;

		// So precisa SETAR os valores do formulario
		$prod->setcampo1($nome);
		$prod->setcampo2($endereco);
		$prod->setcampo3($bairro);
		$prod->setcampo4($cidade);
		$prod->setcampo5($estado);
		$prod->setcampo6($cep);
		$prod->setcampo7($tel1);
		$prod->setcampo8($tel2);
		$prod->setcampo9($tipo);
		$prod->setcampo10($rg);
		$prod->setcampo12($cpf);
		$prod->setcampo13($cgc);
		$prod->setcampo14($rs);
		$prod->setcampo15($ie);
		$prod->setcampo16($contato);
		$prod->setcampo17($datacad);
		$descmax = str_replace('.','',$descmax);
		$descmax = str_replace(',','.',$descmax);
		$prod->setcampo18($descmax);
		$prod->setcampo19($email);
		$prod->setcampo20($fatorvista);
		$taxa = str_replace('.','',$taxa);
		$taxa = str_replace(',','.',$taxa);
		$prod->setcampo21($taxa);
		$tac = str_replace('.','',$tac);
		$descmax = str_replace(',','.',$tac);
		$prod->setcampo22($tac);
		$prod->setcampo23($razaosocial);
		$prod->setcampo24($codvend_car); // VENDEDORES QUE RECEBERAO MSG DO FINANCEIRO CAR
		$prod->setcampo25($codvend_cap); // VENDEDORES QUE RECEBERAO MSG DO FINANCEIRO CAP
		$prod->setcampo27($codvend_fin); // USUARIO DA CONTA TRANSFERENCIA
		$prod->setcampo29($fatorvista_cel); // Fator vista Cel
		$prod->setcampo30($taxa_cel); // Taxa de juros
		$prod->setcampo31($codgrupo); // GRUPO DA EMPRESA
		$prod->setcampo32($hist_emp); // HISTORICO

		$prod->addProd($tabela, $ureg);
		
		// CALCULA TODO O ESTOQUE POR EMPRESAS DO MESMO GRUPO
		$prod->listProdU("codmoeda", "moeda", "padrao='S'");		
		$codmoedapadrao = $prod->showcampo0();

		// GERA UM ESTOQUE PARA A NOVA EMPRESA CRIADA
		$prod->listProdSum("codprod", "produtos", "unidade not like 'CJ'", $array21, $array_campo21, "" );
		
		for($i = 0; $i < count($array21); $i++ ){
		
			$prod->mostraProd( $array21, $array_campo21, $i );

				$codprod = $prod->showcampo0();

			$prod->setcampo0("");
			$prod->setcampo1($ureg);
			$prod->setcampo2($codprod);
			$prod->setcampo3(0);
			$prod->setcampo4(0);
			$prod->setcampo5(10);
			$prod->setcampo6(1);
			$prod->setcampo7(1);
			$prod->setcampo8($codmoedapadrao);
			echo("cp=$codprod");

			$prod->addProd("estoque", $ureg1);
		
		}

		// GERA UM CAIXA PARA A NOVA EMPRESA CRIADA
			
			$prod->clear();
			$prod->setcampo1($ureg);
			$prod->setcampo2("PRINCIPAL");
			$prod->addProd("fin_cx", $uregcx);

			//INSERE UM SALDO INICIAL
			$prod->clear();
			$prod->setcampo1($dataatual);
			$prod->setcampo2(0);
			$prod->setcampo4($ureg);
			$prod->setcampo5($uregcx);
			$prod->addProd("fin_cxsaldo", $uregsaldo);

		$Actionsec="list";
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVA $nomeform ";

        break;

    case "update":

		$prod->listProd($tabela, $condicao1);

		$codempold = $prod->showcampo0();
		$nomeold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$tel1old = $prod->showcampo7();
		$tel2old = $prod->showcampo8();
		$tipoold = $prod->showcampo9();
		$rgold = $prod->showcampo10();
		// $profissaoold = $prod->showcampo12();
		$cpfold = $prod->showcampo12();
		$cgcold = $prod->showcampo13();
		$rsold = $prod->showcampo14();
		$ieold = $prod->showcampo15();
		$contatoold = $prod->showcampo16();
		$datacadold = $prod->showcampo17();
		$descmaxold = $prod->showcampo18();
		$descmaxold = number_format($descmaxold, 2,',', '.');
		$emailold = $prod->showcampo19();
		$fatorvistaold = $prod->showcampo20();
		$taxaold = $prod->showcampo21();
		$taxaold = number_format($taxaold, 2,',', '.');
		$tacold = $prod->showcampo22();
		$tacold = number_format($tacold, 2,',', '.');
		$razaosocialold = $prod->showcampo23();
		$codvend_carold = $prod->showcampo24();
		$codvend_capold = $prod->showcampo25();
		$codvend_finold = $prod->showcampo27();
		$fatorvista_celold = $prod->showcampo29();
		$taxa_celold = $prod->showcampo30();
		$taxa_celold = number_format($taxa_celold, 2,',', '.');
		$codgrupoold = $prod->showcampo31();
		$hist_empold = $prod->showcampo32();
		
		$datacadold = str_replace('-','',$datacadold);

		$anocadold = substr($datacadold,0,4);
		$mescadold = substr($datacadold,4,2);
		$diacadold = substr($datacadold,6,2);
		
		
		if ($retorno){

		$datacad = $anocad . $mescad . $diacad;


		$prod->setcampo1($nome);
		$prod->setcampo2($endereco);
		$prod->setcampo3($bairro);
		$prod->setcampo4($cidade);
		$prod->setcampo5($estado);
		$prod->setcampo6($cep);
		$prod->setcampo7($tel1);
		$prod->setcampo8($tel2);
		$prod->setcampo9($tipo);
		$prod->setcampo10($rg);
		$prod->setcampo12($cpf);
		$prod->setcampo13($cgc);
		$prod->setcampo14($rs);
		$prod->setcampo15($ie);
		$prod->setcampo16($contato);
		$prod->setcampo17($datacad);
		$descmax = str_replace('.','',$descmax);
		$descmax = str_replace(',','.',$descmax);
		$prod->setcampo18($descmax);
		$prod->setcampo19($email);
		$prod->setcampo20($fatorvista);
		$taxa = str_replace('.','',$taxa);
		$taxa = str_replace(',','.',$taxa);
		$prod->setcampo21($taxa);
		$tac = str_replace('.','',$tac);
		$descmax = str_replace(',','.',$tac);
		$prod->setcampo22($tac);
		$prod->setcampo23($razaosocial);
		$prod->setcampo24($codvend_car); // VENDEDORES QUE RECEBERAO MSG DO FINANCEIRO CAR
		$prod->setcampo25($codvend_cap); // VENDEDORES QUE RECEBERAO MSG DO FINANCEIRO CAP
		$prod->setcampo27($codvend_fin); // USUARIO DA CONTA TRANSFERENCIA
		$prod->setcampo29($fatorvista_cel); // Fator vista Cel
		$taxa_cel = str_replace('.','',$taxa_cel);
		$taxa_cel = str_replace(',','.',$taxa_cel);
		$prod->setcampo30($taxa_cel); // Taxa de juros
		$prod->setcampo31($codgrupo); // GRUPO DA EMPRESA
		$prod->setcampo32($hist_emp); // EMPRESA
		
		$prod->upProd($tabela, $condicao1);

		$Actionsec="list";

		}
		$nomeformsec=" ATUALIZAR $nomeform ";
		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

		#$prod->delProd($tabela, $condicao1);
		#$prod->delProd("estoque", $condicao1);

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
	    	   
		$condicao2 = " LCASE($campopesq) like '%$palavrachave1%'";
		
		$numreg = $prod->listProdgeral($tabela, $condicao2, $array, $array_campo, "" );
		if ($palavrachave == ""){$condicao2 = "";}

		// Lista todos os REGISTROS contidos na TABELA DEFINIDA
		$prod->listProdgeral($tabela, $condicao2, $array, $array_campo, $parm );
		$Action="list";

		if ($desloc <> 0):
		  $totalpagina= ceil($numreg /$acrescimo);  
		else:
		  $totalpagina= ceil($numreg /$acrescimo);  
		  $pagina = 1;
		endif; 

}

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
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

  
   
    if (!(consisteVazioTamanho (form, form.nome.name, 100)))
    {
        return false;
    }
	 if (!(consisteCGC (form, form.cgc.name, true)))
    {
        return false;
    }
		 if (!(consisteVazioTamanho(form, form.ie.name, 50)))
    {
        return false;
    }
	  if (!(consisteVazioTamanho(form, form.endereco.name, 100)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.bairro.name, 50)))
    {
        return false;
    }
	 if (!(consisteVazioTamanho(form, form.cidade.name, 50)))
    {
        return false;
    }
	if (!(consisteUF (form, form.estado.name, true)))
    {
        return false;
    }
    if (!(consisteCEP (form, form.cep.name)))
    {
        return false;
    }
    if (!(consisteVazioTamanho(form, form.descmax.name, 6)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.fatorvista.name, 10)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.taxa.name, 5)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.fatorvista_cel.name, 10)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.taxa_cel.name, 5)))
    {
        return false;
    }
	if (!(consisteVazioTamanho(form, form.tac.name, 5)))
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
	
    if (campo == 'nome')
        return 'Razão Social';
	if (campo == 'email')
        return 'Email do Titular';
    if (campo == 'cgc')
        return 'CNPJ da Empresa';
    if (campo == 'ie')
        return 'Inscrição Estadual da Empresa';
    if (campo == 'endereco')
        return 'Endereço';
    if (campo == 'bairro')
        return 'Bairro';
    if (campo == 'cidade')
        return 'Cidade';
    if (campo == 'cep')
        return 'CEP';
    if (campo == 'estado')
        return 'Estado';
    if (campo == 'dddtel1')
        return 'DDD do Telefone 1 Residencial do Titular';
    if (campo == 'tel1')
        return 'Telefone 1 Residencial do Titular';
    if (campo == 'dddtel2')
        return 'DDD do Telefone 2 Residencial do Titular';
    if (campo == 'tel2')
        return 'Telefone 2 Residencial do Titular';
    if (campo == 'descmax')
        return 'Desconto maximo';
	if (campo == 'fatorvista')
        return 'Fator à Vista';
	if (campo == 'taxa')
        return 'Taxa';
	if (campo == 'fatorvista_cel')
        return 'Fator à Vista Cel';
	if (campo == 'taxa_cel')
        return 'Taxa Cel';
	if (campo == 'tac')
        return 'Tac';
    else
        return 'Campo não cadastrado';
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
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%'  ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome:</font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
                            	");
			if ($Action=="update"):
			echo("
                            <b>$nomeold<b>
							<input type='hidden' name='nome' value='$nomeold'>
				");
			else:
			echo("
                                <input type='text' value='$nomeold' name='nome' size='30' onchange='consisteVazioTamanho(this.form, this.form.nome.name, 100)'>
				");
			endif;
			echo("
                              </font></td>
                          </tr>
							  <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Razão Social:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$razaosocialold' name='razaosocial' size='50' >
                              </font></td>
                          </tr>
						   <tr bgcolor='#FFFFFF'> 
                            <td width='26%'><b><font size='2' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>&nbsp;</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
                              &nbsp;
                              </font></td>
                          </tr>
			<tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Grupo</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='codgrupo'>
                             
						  
	");

	$prod->listProdSum("codgrupo, nome", "empresa_grupo", "hist <> 'S'", $array, $array_campo , "order by nome");
	for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nome = $prod->showcampo1();
			$codgrupo = $prod->showcampo0();
	echo("		
		<option selected value='$codgrupo'>$nome</option>
	");
	}
	
	if ($Action=="update"){

		$prod->listProdSum("codgrupo, nome", "empresa_grupo", "codgrupo=$codgrupoold", $array, $array_campo , "");
		$prod->mostraProd( $array, $array_campo, 0 );
			$nomegrp = $prod->showcampo1();
		echo("		
		<option selected value='$codgrupoold'>$nomegrp</option>
		");
	}
	
	echo("	
						  </select>
						  </font></td></tr>
						   <tr bgcolor='#FFCC99'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>CNPJ:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$cgcold' name='cgc' size='20'  onchange='consisteCGC(this.form, this.form.cgc.name, true)'>
                              </font></td>
                          </tr>
                         
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Inscr. Est.:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$ieold' name='ie' size='25' onchange='consisteVazioTamanho(this.form, this.form.ie.name, 50)'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Contato:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$contatoold' name='contato' size='30' >
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Email:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$emailold' name='email' size='40'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Data de Cadastro:</font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' name='diacad' value='$diacadold' size='2'  maxlength='2'>
                              / 
                              <input type='text' name='mescad' value='$mescadold' size='2'  maxlength='2'>
                              / 
                              <input type='text' name='anocad' value='$anocadold' size='4'  maxlength='4'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Endere&ccedil;o:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$enderecoold' name='endereco' size='50' onchange='consisteVazioTamanho(this.form, this.form.endereco.name, 100)'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Bairro</font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$bairroold' name='bairro' size='30' onchange='consisteTamanho(this.form, this.form.bairro.name, 50)'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Cidade:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$cidadeold' name='cidade' size='21' onchange='consisteVazioTamanho(this.form, this.form.cidade.name, 50)'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Estado:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$estadoold' name='estado' size='2' maxlength='2' onblur='consisteUF(this.form, this.form.estado.name, true)'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>CEP:</font></b> 
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' name='cep' value='$cepold' size='9' onchange='consisteCEP(this.form, this.form.cep.name)'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Telefone 1:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$tel1old' name='tel1' size='20'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Telefone 2:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$tel2old' name='tel2' size='20'>
                              </font></td>
                          </tr>
                          
                         
                          <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Desconto Maximo:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$descmaxold' name='descmax' size='5'
maxlength='5' onChange='consisteValor(this.form, this.form.descmax.name, true)'> %
                              </font></td>
                          </tr>
						  <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Fator à vista:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$fatorvistaold' name='fatorvista' size='10'
maxlength='8' > (Converte tabela para valor a vista)
                              </font></td>
                          </tr>
						  <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Taxa de Juros:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$taxaold' name='taxa' size='5'
maxlength='5' onChange='consisteValor(this.form, this.form.taxa.name, true)'> %
                              </font></td>
                          </tr>
			 <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Fator à vista (Celular):</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$fatorvista_celold' name='fatorvista_cel' size='10'
maxlength='8' > (Converte tabela para valor a vista)
                              </font></td>
                          </tr>
						  <tr bgcolor='#FFCC99'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Taxa de Juros (Celular):</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$taxa_celold' name='taxa_cel' size='5'
maxlength='5' onChange='consisteValor(this.form, this.form.taxa_cel.name, true)'> %
                              </font></td>
                          </tr>
						    <tr bgcolor='#FFCC99' > 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>TAC:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$  
                              <input type='text' value='$tacold' name='tac' size='5'
maxlength='5' onChange='consisteValor(this.form, this.form.tac.name, true)'>
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>MSG CAR:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$codvend_carold' name='codvend_car' size='10' >
                              (Colocar os codigos dos vendedores separados por ':')</font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>MSG CAP:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$codvend_capold' name='codvend_cap' size='10' >
                              (Colocar os codigos dos vendedores separados por ':')</font></td>
                          </tr>
                           <tr bgcolor='#D6E7EF'>
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>VENDEDOR TRANSF:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                              <input type='text' value='$codvend_finold' name='codvend_fin' size='10' >
                              (Vendedor padrão da empresa para transferência)</font></td>
                          </tr>
						  
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Historico</font></b></td>
                            <td width='74%' colspan ='2'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='hist_emp'>
                             
						  <option value='S'>S</option>
						  <option value='N'>N</option>
						<option selected value='$hist_empold'>$hist_empold</option>
		
						  </select>
						  </font></td></tr>
                          <tr> 
                            <td width='100%' colspan='2' > 
                              <hr size='1'>
                            </td>
                          </tr>
                        </table>
                      </center>
                    </div>
                    		");
			if ($Action=='update'):$value="Atualizar";else:$value="Adicionar";endif;
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
					
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codemp' value='$codempold'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
        		  <input type='hidden' name='pg' value='$pg'>

                 <br> </form>
                </td>
              </tr>
              <tr> 
                <td bgcolor='#FFFFFF' width='100%'> 
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
      <td width=' 327' > 	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'><div align='center'>

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
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME
EMPRESA</font></b></div>
    </td>
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONTATO</font></b></div>
    </td>
	 <td width='30%' height='0'> 
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

			$codemp = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$contato = $prod->showcampo16();
			$codgrupo = $prod->showcampo31();
			$hist = $prod->showcampo32();
			$nomegrupo = "";
			
			if ($codgrupo){
				$prod->listProdU("nome", "empresa_grupo", "codgrupo='$codgrupo'");
				$nomegrupo = $prod->showcampo0();
			}	
			
			$bgcorlinha="#D6E7EF";
			if ($hist == "S"){$bgcorlinha="#E1AFAA";}

		echo("
		<tr bgcolor='$bgcorlinha'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codemp</font></td>
			<td width='30%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='10%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$contato</font></b></td>
		<td align='center' width='30%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomegrupo</font></b></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a
href='$PHP_SELF?Action=update&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><!--<a
href='$PHP_SELF?Action=delete&codemp=$codemp&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
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
$compl= "retlogin=$retlogin&connectok=$connectok&pg=$pg";   

include("numcontg.php");
}

include ("sif-rodape.php");


?>
       
