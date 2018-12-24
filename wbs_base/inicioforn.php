

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "fornecedor";					// Tabela EM USO
$condicao1 = "codfor=$codfor";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "FORNECEDOR";
$titulo = "ADMINISTRAÇÃO FORNECEDOR";


// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$datacad = $anocad . $mescad . $diacad;

		// So precisa SETAR os valores do formulario
		$prod->setcampo1($nome);
		$prod->setcampo2($endereco);
		$prod->setcampo3($bairro);
		$prod->setcampo4($cidade);
		$prod->setcampo5($estado);
		$prod->setcampo6($cep);
		$prod->setcampo7($telvenda);
		$prod->setcampo8($telfinanceiro);
		$prod->setcampo9($tipo);
		// $prod->setcampo10($empresa);
		$prod->setcampo11($rg);
		// $prod->setcampo12($profissao);
		$prod->setcampo13($cpf);
		$prod->setcampo14($cgc);
		$prod->setcampo15($rs);
		$prod->setcampo16($ie);
		$prod->setcampo17($contatovenda);
		$prod->setcampo18($datacad);
		$prod->setcampo19($email);
		$prod->setcampo20($contatofinanceiro);
		$prod->setcampo21($faxvenda);
		$prod->setcampo22($faxfinanceiro);
		$prod->setcampo23("N");
		$prod->setcampo24($fabrica);

		$prod->addProd($tabela, $ureg);

		$Actionsec="list";
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":

		$prod->listProd($tabela, $condicao1);

		$codforold = $prod->showcampo0();
		$nomeold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$telvendaold = $prod->showcampo7();
		$telfinanceiroold = $prod->showcampo8();
		$tipoold = $prod->showcampo9();
		// $empresaold = $prod->showcampo10();
		$rgold = $prod->showcampo11();
		// $profissaoold = $prod->showcampo12();
		$cpfold = $prod->showcampo13();
		$cgcold = $prod->showcampo14();
		$rsold = $prod->showcampo15();
		$ieold = $prod->showcampo16();
		$contatovendaold = $prod->showcampo17();
		$datacadold = $prod->showcampo18();
		$emailold = $prod->showcampo19();
		$contatofinanceiroold = $prod->showcampo20();
		$faxvendaold = $prod->showcampo21();
		$faxfinanceiroold = $prod->showcampo22();
		$histold = $prod->showcampo23();
		$fabricaold = $prod->showcampo24();


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
		$prod->setcampo7($telvenda);
		$prod->setcampo8($telfinanceiro);
		$prod->setcampo9($tipo);
		// $prod->setcampo10($empresa);
		$prod->setcampo11($rg);
		// $prod->setcampo12($profissao);
		$prod->setcampo13($cpf);
		$prod->setcampo14($cgc);
		$prod->setcampo15($rs);
		$prod->setcampo16($ie);
		$prod->setcampo17($contatovenda);
		$prod->setcampo18($datacad);
		$prod->setcampo19($email);
		$prod->setcampo20($contatofinanceiro);
		$prod->setcampo21($faxvenda);
		$prod->setcampo22($faxfinanceiro);		
		$prod->setcampo23($hist);
		$prod->setcampo24($fabrica);
		
		$prod->upProd($tabela, $condicao1);

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
    if (!(consisteVazioTamanho(form, form.descmax.name, 5)))
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
        return 'Nome Fornecedor';
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
                            <td width='26%'  ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome Fornecedor:</font></b></td>
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
						   <tr bgcolor='#FFFFFF'> 
                            <td width='26%'><b><font size='2' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>&nbsp;</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
                              &nbsp;
                              </font></td>
                          </tr>
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
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Contato de Venda:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$contatovendaold' name='contatovenda' size='30' >
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Telefone de Venda:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$telvendaold' name='telvenda' size='20'>
                              </font></td>
                          </tr>
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>FAX de Venda:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$faxvendaold' name='faxvenda' size='20'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Contato Financeiro:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$contatofinanceiroold' name='contatofinanceiro' size='30' >
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Telefone Financeiro:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$telfinanceiroold' name='telfinanceiro' size='20'>
                              </font></td>
                          </tr>
						  <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>FAX Financeiro:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$faxfinanceiroold' name='faxfinanceiro' size='20'>
                              </font></td>
                          </tr>
    <tr>
	                      <tr bgcolor='#FFFFFF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Histórico</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                             <select size='1' class=drpdwn name='hist'>



		<option  value='S'>S</option>
			<option value='N' selected>N</option>
	");

	if ($Action=="update"){

		echo("
		<option selected value='$histold'>$histold</option>
		");
	}

	echo("
						  </select>
						  </font></td>

	                      </tr>
						  
						  
						   <tr bgcolor='#FFFFFF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Fabricante (PPB)</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                             <select size='1' class=drpdwn name='fabrica'>



		<option  value='S'>S</option>
			<option value='N' selected>N</option>
	");

	if ($Action=="update"){

		echo("
		<option selected value='$fabricaold'>$fabricaold</option>
		");
	}

	echo("
						  </select>
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
                   ");
			if ($Action=='update'):$value="Atualizar";else:$value="Adicionar";endif;
			echo("
                     <p align='center'><input class='sbttn' type='submit' name='Submit' value='$value'>
                   
				
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codfor' value='$codforold'>
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
                  <BR>
<font  face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF6600'>:: SELECIONAR<b> MARCAS</b> PARA ESSE FORNECEDOR</font><br>
    
			<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0' style='border-style: solid; border-color: black; border-width: 1px 1px 1px 1px;'>
  <tr>
    <td><iframe src='inicioforn_select.php?codfornselect=$codforold' name='iforn' width='100%' marginwidth='0' height='400' marginheight='0' scrolling='yes' frameborder='0'></iframe></td>
  </tr>
</table>
               <BR>
<font  face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF6600'>:: SELECIONAR<b> CATEGORIAS DE PRODUTOS</b> PARA ESSE FORNECEDOR</font><br>
    
			<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0' style='border-style: solid; border-color: black; border-width: 1px 1px 1px 1px;'>
  <tr>
    <td><iframe src='inicioforn_select_cat.php?codfornselect=$codforold' name='iforn' width='100%' marginwidth='0' height='400' marginheight='0' scrolling='yes' frameborder='0'></iframe></td>
  </tr>
</table>

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
    <td width='50%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME FORNEC.</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONTATO</font></b></div>
    </td>
	 <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>HIST</font></b></div>
    </td>
  </tr>
	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codfor = $prod->showcampo0();
			$nome = $prod->showcampo1();
			$contato = $prod->showcampo17();
			$hist = $prod->showcampo23();
			$fab = $prod->showcampo24();
			
			if ($hist == "S"){$cor ="#F2E4C4";}else{$cor ="#D6E7EF";}
			if ($fab == "S"){$cor ="#FFCC66";}else{$cor ="#D6E7EF";}


		echo("
		<tr bgcolor='$cor'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codfor</font></td>
			<td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='20%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$contato</font></b></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a
href='$PHP_SELF?Action=update&codfor=$codfor&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
			<td align='center' width='10%' height='0'><font size='1'><b>$hist<!--<a
href='$PHP_SELF?Action=delete&codfor=$codfor&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
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

include ("sif-rodape.php");


?>
       
