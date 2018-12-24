

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "empresa";					// Tabela EM USO
$condicao1 = "codemp=$codemp";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by codbarra limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CODBARRA";
$titulo = "PROCURA POR CODBARRA";

// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

        break;

    case "update":


		 break;

	 case "list":

		
		$Actionsec="list";
	
		
		 break;


	 case "delete":

	

		$Actionsec="list";
		
		 break;

}

// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
		
		$palavrachave1 = strtolower($palavrachave);
		$campopesq = "codbarra";
	    $condicao3 = " LCASE($campopesq) like '%$palavrachave1%'";

		if ($palavrachave){

		// LISTA TODOS OS REGISTROS
		$prod->listProdSum("COUNT(*) as numreg", "codbarra", $condicao3, $array, $array_campo, "" );
		$prod->mostraProd( $array, $array_campo, 0 );
		$numreg = $prod->showcampo0();
		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codcb, codprod, codbarra, codped, codoc, idop_sn", "codbarra", $condicao3, $array, $array_campo, $parm );
		}

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
						    <tr bgcolor='#FFCC99' > 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>TAC:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>R$  
                              <input type='text' value='$tacold' name='tac' size='5'
maxlength='5' onChange='consisteValor(this.form, this.form.tac.name, true)'>
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
		CODBARRA: <input type='text' name='palavrachave' size='20'></font>
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
            <td width='5%'>
              <p align='center'><img border='0' src='images/refresh.gif'></td>
            <td width='60%'><b><a href='$PHP_SELF?Action=list&codprod=$codprod&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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

	<table width='550' border='0' cellspacing='1' cellpadding='2' align='center' height='71'>
	<tr bgcolor='#93BEE2'> 
    <td width='44' height='21'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='202' height='21'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME
        PROD</font></b></div>
    </td>
    <td width='98' height='21'> 
      <div align='center'>
        <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CODBARRA</font></b></div>
    </td>
	 <td align='center' width='105' height='21'> 
      <div align='center'>
        <p align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PEDIDO&nbsp;</font></b></div>
    </td>
    <td align='center' width='105' height='21'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>FORNECEDOR&nbsp;</font></b></div>
    </td>
  </tr>

	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$codcb = $prod->showcampo0();
			$codprod = $prod->showcampo1();
			$codbarra = $prod->showcampo2();
			$codped = $prod->showcampo3();
			$codoc = $prod->showcampo4();
			$idop_sn = $prod->showcampo5();
			
			
			
						
			$prod->clear();
			$prod->listProdU("nomeprod, unidade, descres", "produtos", "codprod=$codprod");
			$nomeprod = $prod->showcampo0();
			$unidadeold = $prod->showcampo1();
			$descres = $prod->showcampo2();

			$prod->clear();
			$prod->listProdU("codbarra, codcliente, dataped, codvend", "pedido", "codped=$codped");
			$codbarra_ped = $prod->showcampo0();
			$codcliente = $prod->showcampo1();
			$dataped = $prod->showcampo2();
			$codvend = $prod->showcampo3();

			$nomevend = "";
			if($codvend){
			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend=$codvend");
			$nomevend = $prod->showcampo0();
			}

			$nomecliente = "";
			if($codcliente){
			$prod->clear();
			$prod->listProdU("nome", "clientenovo", "codcliente=$codcliente");
			$nomecliente = $prod->showcampo0();
			}
			if ($codped == -2000){$codbarra_ped = "RMA";}
			if ($codped == -5000){$codbarra_ped = "EMPRESTIMO";}

			$prod->clear();
			$prod->listProdU("codfor, ocprod.numnf, ocprod.datanf, ocprod.datavencgar", "oc, ocprod", "oc.codoc=$codoc and oc.codoc=ocprod.codoc and codprod = $codprod");
			$codfor = $prod->showcampo0();
			$numnf = $prod->showcampo1();
			$datanf = $prod->showcampo2();
			$datavencgar = $prod->showcampo3();
			
			$nomefor = "";
			if($codfor){
			$prod->clear();
			$prod->listProdU("nome", "fornecedor", "codfor=$codfor");
			$nomefor = $prod->showcampo0();
			}
			
			if ($idop_sn <> 0){
			$prod->clear();
			$prod->listProdU("sn", "op_sn", "idop_sn='$idop_sn'");
			$sn = $prod->showcampo0();
			$codbarra_ped = "MAXXPC<BR>".$sn;
			}

			// FORMATACAO //
			$datanff = $prod->fdata($datanf);
			$datavencgarf = $prod->fdata($datavencgar);
			

		echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='44' height='38' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcb</font></td>
			<td width='202' height='38'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nomeprod<br>
              <font color='#800000'>$descres</font></font></td>
			<td align='center' width='98' height='38'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#800000'>$codbarra</font></b></td>
			<td align='center' width='105' height='38'>
              <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>$codbarra_ped<br>
              </b>$nomecliente<br><font color='#800000'>$nomevend</font></font></p>
            </td>
			<td align='center' width='105' height='38'><font size='1'><b>
              <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomefor<br>
              </font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b><font color='#808080'>OC:</font>
              <font color='#FF9933'>$codoc</font></b><b><font color='#800000'><br>
              </font><font color='#808080'>NF:</font></b><b><font color='#800000'> $numnf</font></b><br>
              <b><font color='#808080'>DN:</font></b> $datanff<br>
              <b><font color='#808080'>DG:</font></b> <b><font color='#800000'>$datavencgarf</font></b></font></p>
              </font></td>

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
       
