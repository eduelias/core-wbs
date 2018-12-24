

<?php

#require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 15;
$tabela = "pedido";					// Tabela EM USO
$condicao1 = "codped=$codped";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "codemp=$codempselect";			// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by datavenc DESC limit $desloc,$acrescimo ";								// order by nome
$campopesq = "codped";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "PEDIDO";
$titulo = "PROVENTOS PESSOAL";
$subtitulo = "FINANCEIRO";

$tipopesq="for";

$Actionter = "unlock";


// CONFIGURAÇÃO DE COR

$bgcortopo = "#86ACB5";
$bgcortopo1 = "#93BEE2";
$bgcorlinha = "#F3F8FA";
$bgcorlinha1 = "#d6e7ef"; 
$bgcordisplay = "#CCFFFF";
$cortitulolist = "#336699";
$corpesq = "#86ACB5";


// INICIO DA CLASSE
$prod = new operacao();


	$prod->listProd("vendedor", "nome='$login'");
				
		$nomevendold = $prod->showcampo1();
		$codvendold = $prod->showcampo0();
		$tipovend = $prod->showcampo2();
		$codempvend = $prod->showcampo10();
		$codcxvend = $prod->showcampo13();
		$allemp = $prod->showcampo17();
		$allcx = $prod->showcampo18();
		$fatorusertabela = $prod->showcampo5(); // Fator que multiplica o preco de tabela
		if ($allemp =="N"){
			if ($codempvend <> 0){$codempselect = $codempvend;}
			if ($codcxvend <> 0){$codcxselect = $codcxvend;}
		}

		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    		

	 case "insert":

						
		$prod->listProd("formapg", "opcaixa='$opcaixaselect'");
		$descricao = $prod->showcampo1();
		$bco = $prod->showcampo3();
		#$pbco = $prod->showcampo4();
		#$caixa = $prod->showcampo5();
		#$car = $prod->showcampo6();
		#$cap = $prod->showcampo7();
		#$cofre = $prod->showcampo8();
		#$inschtab = $prod->showcampo9();
		#$tipoparc = $prod->showcampo11();
		#$pnumdoc = $prod->showcampo12();


		$prod->listProdSum("codvend, codproj ","vendedor", "block <>'Y' and tipo <> 'R' and funcionario = 'Y'", $array, $array_campo , "order by nome");
		for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$cv = $prod->showcampo0();	
			$projselect = $prod->showcampo1();

			if ($valornew[$cv] <> ""){
			
				$valornew[$cv] = str_replace('.','',$valornew[$cv]);
				$valornew[$cv] = str_replace(',','.',$valornew[$cv]);

				
					// ROTINA DEPARTAMENTO PESSOAL

					// CONTA DO FUNCIONARIO
					$prod->listProdU("codconta", "fin_bcoconta", "codvend=$cv ");
					$codconta_vend = $prod->showcampo0();

					$prod->listProdU("descricao","formapg", "opcaixa='$opcaixaselect'");
					$descricao = $prod->showcampo0();

					#echo("$opcaixaselect - $descricao");

					#$bco = "C"; // OPERACAO DE BANCO (CREDITA)

					//INSERE NO BCO
					$prod->clear();
					$prod->setcampo0("");
					$prod->setcampo1($codconta_vend);  //
					$prod->setcampo2($opcaixaselect);
					$prod->setcampo3($descricao);
					if ($bco =="C"){
							$prod->setcampo4($valornew[$cv]);
						}else{
							$prod->setcampo5($valornew[$cv]);
						}
					$prod->setcampo6($acc.$mcc.'25');
					$prod->setcampo7($acc.$mcc.'25');
					$prod->setcampo8("N");
					$prod->setcampo13($login);

					$prod->addProd("fin_bcomov", $uregbcomov);
					

			}

		}//FOR

			$Actionter = "lock";
			$prod->msggeral("Os dados foram inseridos corretamente", "OK", "$PHP_SELF?Action=list&desloc=0&retlogin=$retlogin&connectok=$connectok&pg=$pg",0);

		$Action="list";
				
		 break;

		

	 case "list":

		$Actionsec="list";
			
		 break;




}


// ACOES SECUNDARIAS DA PAGINA
if ($Actionsec == "list"){
	

		

		
		$Action="list";
		

}

/// INCLUSÃO DO TOPO ////

if ($Actionter == "unlock"){

$title = "CAP - CONTAS A PAGAR";

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

	
	if ((form.opcaixaselect.value == '') )
	{
			alert ('ESCOLHA DO PROVENTO : obrigatório');
			return false;
	}
		
	if ((form.mcc.value == '') || (form.acc.value == '') )
	{
			alert ('Data de Competência : preenchimento obrigatório');
			return false;
	}
	


	return true;
      	
}



function verificaObrig1 (form)
{

	//***********************************************************************************
    //  Verifica campos obrigatorios  ***************************************************
    //***********************************************************************************
    
	//********** Dados do cliente

	
		
	if ((form.mcc_u.value == '')  || (form.acc_u.value == ''))
	{
			alert ('Data de Competência : preenchimento obrigatório');
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
	
   	if (campo == 'valornew')
        return 'Valor';
	if (campo == 'codfor')
        return 'Cod. Fornecedor';
	if (campo == 'codoc')
        return 'Cod. OC';
	if (campo == 'juros')
        return 'Juros';
	if (campo == 'valorrec')
        return 'Valor Recebido';
	if (campo == 'opcaixanew')
        return 'OP CAIXA';
	if (campo == 'dvenc')
        return 'Dia Vencimento';
	if (campo == 'mvenc')
        return 'Mes Vencimento';
	if (campo == 'avenc')
        return 'Ano Vencimento';
	if (campo == 'nfnew')
        return 'Nota Fiscal';

	else
        return 'Campo não cadastrado';
}

function adjust(element) {

	return element.value.replace ('.', ',');

}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form)
{
	var valor;
	valor = form.cbch.value;
	

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strValor].focus ()');
				
	}else{
	
	form.banco.value = valor.substring (1,4);
	form.agencia.value = valor.substring (4,8);
	form.conta.value = valor.substring (23,32);
	form.numch.value = valor.substring (13,19);

	form.cbch.disabled=true;
	
	}

	}
 
}





</script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////

if($Action == "list"):


		

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>$titulo</font></b></td>
                        <td width='51' bgcolor='#FFFFFF'>
                          <p align='center'><font size='1' face='Verdana'><a href='$PHP_SELF?Action=list&amp;codempselect=$codempselect&codcxsaldoselect=$codcxsaldoselect&amp;codped=$codped&amp;desloc=$desloc&amp;palavrachave=$palavrachave&amp;operador=$operador&amp;pagina=$pagina&amp;retlogin=$retlogin&amp;connectok=$connectok&amp;pg=$pg&amp;hist=$hist&pgcx=$pgcx&codcxselect=$codcxselect&codcxsaldoselect=$codcxsaldoselect&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate'><img border='0' src='images/bt-continuaped.gif' ><br>
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


<br><bR>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tr>
    <td><hr size='1'></td>
  </tr>
</table>

<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td><b><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'>PARTE
        III</font><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
        - </font></b><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ADICIONAR NOVOS PROVENTOS</font></b></td>
    </tr>
  </tbody>
</table>
<br>	
<div align='center'>
  <center>
  <form method='POST' name ='Form9' action='$PHP_SELF?Action=insert&codforselect=$codforselect		&opcaixaselect=$opcaixaselect&dde=$dde&mde=$mde&ade=$ade&date=$date&mate=$mate&aate=$aate#formapg' onSubmit = 'if (verificaObrig(this)==false) return false'>
<div align='center'>
  <center>
  <table border='0' cellpadding='1' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' 
 <tr>
                                  <td vAlign='middle' width='228' bgColor='#f0f0f0' align='center'>
                                    <p align='left'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>PROVENTO:</b></font></p>
                                  </td>
                                  <td vAlign='middle' align='center' width='266' bgColor='#f0f0f0'>
                                    <p align='left'>
									 <select size='1' class=drpdwn name='opcaixaselect'> 
                            ");

	$prod->listProdSum("opcaixa, descricao","formapg", "opcaixa like '820.%'", $array, $array_campo , "order by descricao");
	for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$descricao = $prod->showcampo1();
			$descricao = strtoupper($descricao);
			$opcaixa= $prod->showcampo0();

	echo("		
		<option value='$opcaixa'>$descricao</option>
		");
	
	}

echo("										
				<option value='' selected>ESCOLHA</option>
                                    </select></p>
                                  </td>
                                  <td vAlign='middle' align='center' width='38' bgColor='#f0f0f0' rowspan='4'><input type='submit' value='OK' name='B1'></td>
                                </tr>
 
								   <tr>
            <td width='228' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>DATA DE
              COMPETÊNCIA</b></font></td>
            <td  width='266' bgColor='#f0f0f0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'><input  size='2' name='mcc' maxlength='2'>/<input size='4' name='acc' maxlength='4'></font></td>
          </tr>





  </table>
  </center>
</div>

		  		

");
if($erro){
echo("
					 <table border='0' width='100%' cellspacing='1'>
  <tr>
    <td width='100%'>
      <p align='center'><img border='0' src='images/erro.gif' width='35' height='33'><font face='Verdana' size='1' color='#FF0000'><b><br>
      $erro</b></font></td>
  </tr>
</table>
");
}
echo("
  </center>
</div>

<br>
<table cellSpacing='0' cellPadding='0' width='550' align='center' border='0'>
  <tbody>
    <tr>
      <td>
        <hr SIZE='1'>
      </td>
    </tr>
  </tbody>
</table>

<br>
<div align='center'>
  <center>
  
    <div align='center'>
      <center>
      <table border='0' width='550' cellspacing='1'>
        <tr>
          <td width='268' bgcolor='#C0C0C0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>USUÁRIO</b></font></td>
          <td width='122' bgcolor='#C0C0C0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#336699' size='1'><b>VALOR</b></font></td>
      </center>
  </center>
          <td width='140' bgcolor='#C0C0C0'>
            <p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>
      </td>
        </tr>
  <center>
      <center>

");
	$prod->listProdSum("codvend, nome, tipocliente, doc","vendedor", "block <>'Y' and tipo <> 'R' and funcionario = 'Y'", $array, $array_campo , "order by nome");
	for($i = 0; $i < count($array); $i++ ){
							
			$prod->mostraProd( $array, $array_campo, $i );

			$codvend_list = $prod->showcampo0();
			$nomevend_list= $prod->showcampo1();
			$tipocliente_list= $prod->showcampo2();
			$docold = $prod->showcampo3();
			$nomevend_list = strtoupper($nomevend_list);

			if ($tipocliente_list == "F"){
				$prod->listProdU("nome","clientenovo", "cpf='$docold'");
				$nomecliente=	$prod->showcampo0();
			}else{
				$prod->listProdU("nome","clientenovo", "cnpj='$docold'");
				$nomecliente=	$prod->showcampo0();
			}

			$nomecliente = strtoupper($nomecliente);

echo("
	
        <tr>
          <td width='268' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'><b>$nomecliente<br>
            </b>$nomevend_list</font></td>
          <td width='122' bgcolor='#F0F0F0'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>R$
            <input onKeyUp='this.value = adjust(this);' size='12' name='valornew[$codvend_list]'></font></td>
          <td width='140' bgcolor='#F0F0F0'></td>
        </tr>

		
");
	}
echo("
      </table>
      </center>
    </div>
	
    		 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='0'>
				  <input type='hidden' name='codprojselect' value='$codprojselect'>
				  <input type='hidden' name='codcapselect' value='$codcapselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
  </form>
  </center>
</div>
<br><br>
		
						
	");


	
endif;
///  FIM - PARTE DE UP/ADD DOS REGISTROS ////



/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");
}

?>
       
