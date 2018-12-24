

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "cliente";					// Tabela EM USO
$condicao1 = "codcliente=$codcliente";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CLIENTE";
$titulo = "Lista de Clientes";

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
		$prod->setcampo7($tel1);
		$prod->setcampo8($tel2);
		$prod->setcampo9($tipo);
		$prod->setcampo10($empresa);
		$prod->setcampo11($rg);
		$prod->setcampo12($profissao);
		$prod->setcampo13($cpf);
		$prod->setcampo14($cgc);
		$prod->setcampo15($rs);
		$prod->setcampo16($ie);
		$prod->setcampo17($contato);
		$prod->setcampo18($datacad);
		$prod->setcampo19($email);

		$prod->addProd($tabela, $ureg);

		$Actionsec="list";
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":

		$prod->listProd($tabela, $condicao1);

		$codclienteold = $prod->showcampo0();
		$nomeold = $prod->showcampo1();
		$enderecoold = $prod->showcampo2();
		$bairroold = $prod->showcampo3();
		$cidadeold = $prod->showcampo4();
		$estadoold = $prod->showcampo5();
		$cepold = $prod->showcampo6();
		$tel1old = $prod->showcampo7();
		$tel2old = $prod->showcampo8();
		$tipoold = $prod->showcampo9();
		$empresaold = $prod->showcampo10();
		$rgold = $prod->showcampo11();
		$profissaoold = $prod->showcampo12();
		$cpfold = $prod->showcampo13();
		$cgcold = $prod->showcampo14();
		$rsold = $prod->showcampo15();
		$ieold = $prod->showcampo16();
		$contatoold = $prod->showcampo17();
		$datacadold = $prod->showcampo18();
		$emailold = $prod->showcampo19();

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
		$prod->setcampo10($empresa);
		$prod->setcampo11($rg);
		$prod->setcampo12($profissao);
		$prod->setcampo13($cpf);
		$prod->setcampo14($cgc);
		$prod->setcampo15($rs);
		$prod->setcampo16($ie);
		$prod->setcampo17($contato);
		$prod->setcampo18($datacad);
		$prod->setcampo19($email);
		
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


if($Action <> "list"):

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////
	echo("
	

<div align='center'>
<center>
    <div align='left'></div>
    <table border=0 cellpadding=0 cellspacing=0 width=500>
      <tbody> 
      <tr bgcolor='#93BEE2'> 
        <td width='100%' colspan='2'> 
          <p><b><font face='Verdana' size='2' color='#000000'>&nbsp;</font><font face='Verdana' size='2' color='#FF0000'><font size='4' color='#000000'>CADASTRO 
            DE $nomeform<br>
            </font></font></b><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FFFFFF'><b>&nbsp;&nbsp;<font color='#000000'>$nomeformsec</font></b></font></p>
          </td>
      </tr>
      <tr bgcolor='#93BEE2'> 
        <td colspan=2 width='100%'> 
          <div align=center> 
            <table border=0 cellpadding=0 cellspacing=0 width=498>
              <tbody> 
              <tr> 
                <td bgcolor=#ffffff width='100%' align='center'> &nbsp; 
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome 
                              Cliente:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
            
								");
			/*
			if ($Action=="update"):
			echo("
                            <b>$nomeold<b>
							<input type='hidden' name='nome' value='$nomeold'>
				");
			else:
			*/
			echo("
			
                                <input type='text' value='$nomeold' name='nome' size='30' >
			");
			#endif;
			echo("
			
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Email:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$emailold' name='email' size='40'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%'  ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Data de Cadastro:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' name='diacad' value='$diacadold' size='2'  maxlength='2'>
                              / 
                              <input type='text' name='mescad' value='$mescadold' size='2'  maxlength='2'>
                              / 
                              <input type='text' name='anocad' value='$anocadold' size='4'  maxlength='4'>
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Endere&ccedil;o:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$enderecoold' name='endereco' size='50'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%'  ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Bairro</font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$bairroold' name='bairro' size='30'>
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Cidade:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$cidadeold' name='cidade' size='30'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Estado:</font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$estadoold' name='estado' size='3' maxlength='2'>
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>CEP:</font></b> 
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' name='cep' value='$cepold' size='15'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Telefone 1:</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$tel1old' name='tel1' size='20'>
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Telefone 2:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$tel2old' name='tel2' size='20'>
                              </font></td>
                          </tr>
						   <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Profiss&atilde;o:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$profissaoold' name='profissao' size='30'>
                              </font></td>
                          </tr>
                        
						 	  <tr> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Empresa:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$empresaold' name='empresa' size='30'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'></font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($tipoold=="F"):
			echo("
							 <input type='radio' name='tipo' value='F' checked>
                              Pessoa F&iacute;sica 
                              <input type='radio' name='tipo' value='J'>
                              Pessoa Jur&iacute;dica
                            
				");
			else:
			echo("
                             <input type='radio' name='tipo' value='F' >
                              Pessoa F&iacute;sica 
                              <input type='radio' name='tipo' value='J' checked>
                              Pessoa Jur&iacute;dica
				");
			endif;
			echo("


                              </font></td>
                          </tr>
                         
        		 
                          <tr> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>RG:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$rgold' name='rg' size='30' onmouseover='javascript:func2();'>
                              </font></td>
                          </tr>
                           <tr bgcolor='#D6E7EF'>
                            <td width='26%' height='31' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>CPF:</font></b></td>
                            <td width='74%' height='31' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$cpfold' name='cpf' size='30' onmouseover='javascript:func2();'>
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>CGC:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$cgcold' name='cgc' size='30' onmouseover='javascript:func2();'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Raz&atilde;o Social:</font></b></td>
                            <td width='74%'  ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$rsold' name='rs' size='30' onmouseover='javascript:func2();'>
                              </font></td>
                          </tr>
                          <tr> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Inscr. Est.:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$ieold' name='ie' size='30' onmouseover='javascript:func2();'>
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif'
color='#000000'>Contato:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                              <input type='text' value='$contatoold' name='contato' size='30' onmouseover='javascript:func2();'>
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
                   
					<input class='sbttn' type='button' name='Submit' value='Cancelar' onClick=history.go(-1)>
                   </p>

					
				  <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codcliente' value='$codclienteold'>
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
        <td bgcolor='#93BEE2' width='50%'><img height=11 
                  src='images/inf-esq.gif' width=11></td>
        <td align=right bgcolor='#93BEE2' width='50%'><img height=11 
                  src='images/inf-dir.gif' 
            width=11></td>
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
	<form method='POST' action='$PHP_SELF?Action=$Action' name='Form'>
	<table width='600' border='0' cellspacing='0' cellpadding='0' align='center' >
    <tr> 
      <td width=' 223' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size=' 5' color='#336699' >$titulo</font></font></b></td>
      <td width=' 327' > 
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
    </tr>
  </table>
	</form>
	<table width='550' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr> 
    <td width='95'> 
      <div align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#0066CC' size='1'><b> 
        &nbsp; <a href='$PHP_SELF?Action=insert&retlogin=$retlogin&connectok=$connectok&pg=$pg'>Inserir Novo</a></b> </font></div>
    </td>
    <td width='455'> 
      <div align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>PÁGINA<b> 
        $pagina </b>DE<b> $totalpagina</b></font></div>
    </td>
  </tr>
  <tr> 
    <td colspan='2'>&nbsp;</td>
  </tr>
</table>
	<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='50%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CLIENTE</font></b></div>
    </td>
    <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CONTATO</font></b></div>
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
			$contato = $prod->showcampo17();


		echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='10%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$codcliente</font></td>
			<td width='50%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif'
size='1'>$nome</font></td>
			<td align='center' width='20%' height='0'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$contato</font></b></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a
href='$PHP_SELF?Action=update&codcliente=$codcliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a
href='$PHP_SELF?Action=delete&codcliente=$codcliente&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font
face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
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
       
