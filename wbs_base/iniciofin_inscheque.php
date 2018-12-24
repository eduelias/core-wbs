

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
$titulo = "CONTAS A PAGAR";
$subtitulo = "FINANCEIRO";

$cont = 30;
$codempselect = 1;

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


		$dataatual = $prod->gdata();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		$dataatual = $prod->gdata();

		
		// ATUALIZA FORMA PG
				
		for($i = 0; $i < $cont; $i++ ){
			
			if ($valor[$i] <> ""){

			$prod->listProd("formapg", "opcaixa='$tipoopcaixa[$i]'");
			$descricao = $prod->showcampo1();
						
			#echo("cx=$caixa<br>bco=$bco<br>car=$car<br>cap=$cap<br>tipoparc=$tipoparc<bR>");

			$valor[$i] = str_replace('.','',$valor[$i]);
			$valor[$i] = str_replace(',','.',$valor[$i]);

			//INSERE CHEQUES
			$prod->clear();
			$prod->setcampo0("");
			$prod->setcampo1($codped);  //
			$prod->setcampo8($datap[$i]);
			$prod->setcampo7($valor[$i]);
			$prod->setcampo2($tipoopcaixa[$i]);
			$prod->setcampo6($numch[$i]);
			$prod->setcampo3($banco[$i]);
			$prod->setcampo4($agencia[$i]);
			$prod->setcampo5($conta[$i]);
			$prod->setcampo9("CO");
			$prod->setcampo10($uregopera);
			$prod->setcampo11($ureglanc);
			$prod->setcampo12($codempselect);

			$prod->addProd("fin_cheques", $uregcheq);

			//INSERE FORMA PG PARA AS CAP
			$prod->clear();
		
			$prod->setcampo1($tipoopcaixa[$i]);
			$prod->setcampo2($descricao);
			$prod->setcampo3($valor[$i]);
			#$prod->setcampo4($debito);
			$prod->setcampo5($dataatual);
			$prod->setcampo6($dataatual);
			$prod->setcampo8($uregopera);
			$prod->setcampo9($ureglanc);
			$prod->setcampo10($codped);
			$prod->setcampo11($uregcheq);
			$prod->setcampo12($codempselect);

			$prod->addProd("fin_cofre", $uregf);

			}

		} // FOR

	

	$Action = "list";
			

	
        break;

		

    case "update":

		

				
		 break;

		

	 case "list":

		$Actionsec="list";
			
		 break;

}


/// INCLUSÃO DO TOPO ////

$title = "COFRE - INSERE CHEQUES";

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


	if (form.valortpg.value != form.valortf.value)
	{
			alert ('Valor Total dos PAGAMENTOS não coincidem com o Valor Total das FORMAS DE PAGAMENTOS.');
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
	
    if (campo == 'valor')
        return 'Preco de Venda Varejo';
	if (campo == 'nomeprod')
        return 'Nome Produto';
	else
        return 'Campo não cadastrado';
}


function adjust(element) {

	return element.value.replace ('.', ',');
}


// COPIA VALORES DO CODIGO DE BARRA PARA OS CAMPOS CORRESPONDENTES
function CopiaCodBarraCheque(form, posicao)
{

	var cpos;
	var strValor;
	var strBanco;
	var strAgencia;
	var strConta;
	var strNum;
	var valor;

	cpos = (posicao*10) + 10; 
	
    strBanco = cpos - 5;
    strAgencia = cpos - 4;
    strConta = cpos - 3;
    strNum = cpos - 2;
	strValor = cpos - 1;
	
	valor = form.elements[strValor].value;

	if (valor != ''){

	if ((valor.indexOf(':') != -1) || (valor.length != 34))	
	
	{
				alert('O formato do Código de Barra do cheque está incorreto.');
				eval ('form.elements[strValor].focus ()');
				
	}else{
	
	form.elements[strBanco].value = valor.substring (1,4);
	form.elements[strAgencia].value = valor.substring (4,8);
	form.elements[strConta].value = valor.substring (23,32);
	form.elements[strNum].value = valor.substring (13,19);

	form.elements[strValor].disabled=true;
	
	}

	}
 
}





</script>


");

/// INICIO - PARTE DE UP/ADD DOS REGISTROS ////



		
echo("

<form method='POST' action='$PHP_SELF?Action=insert'  name='Form' >
    <div align='center'>
    <center>
    <table border='0' width='550' cellspacing='1' cellpadding='3'>
      <tr bgcolor='$bgcortopo'>
        <td width='25%'><font size='1' face='Verdana' color='#ffffff'><b>DATA VENC</b></font></td>
        <td width='10%'><font size='1' face='Verdana' color='#ffffff'><b>VALOR</b></font></td>
        <td width='20%'><font size='1' face='Verdana' color='#ffffff'><b>FORMA PG.</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>BCO</b></font></td>
        <td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>AG</b></font></td>
		<td width='10%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>CONTA</b></font></td>
		<td width='15%' align='center'><font size='1' face='Verdana' color='#ffffff'><b>NO.CHQ</b></font></td>
      </tr>
");

for($op = 0; $op < $cont; $op++ ){

	
echo("
      <tr bgcolor='$bgcorlinha'>
        <td width='25%' rowspan='2'><input type='text' name='dvenc[$op]'   size='2' maxlength='2'>/<input type='text' name='mvenc[$op]' size='2' maxlength='2'>/<input type='text' name='avenc[$op]'   size='4' maxlength='4'></td>
        <td width='10%' rowspan='2'><input type='text' name='valor[$op]'  size='8' onKeyUp='this.value = adjust(this);' ></td>
        <td width='20%' ><select size='1' name='tipoopcaixa[$op]'>
");
		
	
				$prod->listProdU("descricao", "formapg", "opcaixa='02.01'");
				$descricao = $prod->showcampo0();
			
			
		 

echo("
            <option value='02.01' >$descricao</option>
          
		  
          </select></td>
        <td width='10%' ><input type='text' name='banco[$op]' size='3' maxlength='3'></td>
        <td width='10%' ><input type='text' name='agencia[$op]' size='4' maxlength='4'></td>
        <td width='10%' ><input type='text' name='conta[$op]' size='6' maxlength='10'></td>
	    <td width='15%' ><input type='text' name='numch[$op]' size='6' maxlength='6'></td>
			  </tr>

    <tr bgcolor='$bgcorlinha'>
    		 <td width='20%' align='right' ><font size='1' face='Verdana' color='#FF9933'><b>CODBARRA CHEQUE:</b></font></td>
	      <td width='45%' colspan='4'><input type='text' name='T1' size='30' onChange='CopiaCodBarraCheque(this.form, $op);'></td>
    </tr>


");
$mespar++;
}
echo("
    </table>
    </center>
  </div>

   <p align='center'><input class='sbttn' type='submit' name='Submit' value='INSERIR'>
                   
				
                   </p>
		  	 <input type='hidden' name='retorno' value='1'>
				  <input type='hidden' name='palavrachave' value='$palavrachave'>
				  <input type='hidden' name='desloc' value='$desloc'>
				  <input type='hidden' name='codempselect' value='$codempselect'>
				  <input type='hidden' name='operador' value='$operador'>
				  <input type='hidden' name='pagina' value='$pagina'>
				  <input type='hidden' name='retlogin' value='$retlogin'>
				  <input type='hidden' name='connectok' value='$connectok'>
				  <input type='hidden' name='pg' value='$pg'>	  
                 
  </form>
  </center>
</div>
<p>&nbsp;</p>

	");

/// INCLUSÃO DO RODAPE ////

include ("sif-rodape.php");


?>