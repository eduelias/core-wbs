

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 20;
$tabela = "seguranca";					// Tabela EM USO
$condicao1 = "codpg=$codpgseg";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomem limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomem";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "ARQUIVOS DE ACESSO";
$titulo = "SEGURAN�A ARQUIVOS DE ACESSO";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$prod->setcampo1($nomemnew);
		$prod->setcampo2($arquivonew);
		$prod->setcampo3($actionpg);
		$prod->setcampo4($descr);
		$prod->setcampo5($codmenunew);
		$prod->setcampo6($modulonew);
		
		$prod->addProd($tabela, $ureg);
				
		$Actionsec="list";
		
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVO $nomeform ";

        break;

    case "update":

		$prod->listProd($tabela, $condicao1);
				
		$codpgold = $prod->showcampo0();
		$nomemold = $prod->showcampo1();
		$arquivoold = $prod->showcampo2();
		$actionpgold = $prod->showcampo3();
		$descrold = $prod->showcampo4();
		$codmenuold = $prod->showcampo5();
		$moduloold = $prod->showcampo6();


		if ($retorno){


		$prod->setcampo1($nomemnew);
		$prod->setcampo2($arquivonew);
		$prod->setcampo3($actionpg);
		$prod->setcampo4($descr);
		$prod->setcampo5($codmenunew);
		$prod->setcampo6($modulonew);
						
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

// OCULTAR TODO O RESTO DA P�GINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");

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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'>SEGURAN�A</font></b><b><font size='3' face='Verdana'><font color='#FF9933'>
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
                <td bgcolor='#ffffff' width='100%' align='center'> &nbsp; 
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
							
						  <tr bgcolor='#FFFFFF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome Menu</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$nomemold' name='nomemnew' size='50' >
			                          
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome Arquivo:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$arquivoold' name='arquivonew' size='50' >
			                          
                              </font></td>
                          </tr>
							<tr bgcolor='#FFFFFF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Descri��o </font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$descrold' name='descr' size='50' >
			                          
                              </font></td>
                          </tr>
							  <tr bgcolor='#FFFFFF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>P�gina Vis�vel</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
                             <select size='1' class=drpdwn name='actionpg'>
                             
						  
		
		<option selected value='S'>S</option>
			<option value='N'>N</option>
	");
	
	if ($Action=="update"){

		echo("		
		<option selected value='$actionpgold'>$actionpgold</option>
		");
	}
	
	echo("	
						  </select>
						  </font></td>
						 
	                      <tr> 
                 				  <tr bgcolor='#FFFFFF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>GRUPO MENU</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            <select size='1' class=drpdwn name='codmenunew'>


	");

// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
$prod->listProdSum("codmenu, menu", "seguranca_menu", "", $array_menu, $array_campo_menu, "ORDER BY codmenu");

	for($i = 0; $i < count($array_menu); $i++ ){

	$prod->mostraProd( $array_menu, $array_campo_menu, $i );

	// DADOS //
	$codmenu = $prod->showcampo0();
	$menu = $prod->showcampo1();
	echo("
		<option selected value='$codmenu'>$menu</option>
	");
	}//FOR

	if ($Action=="update"){

	$prod->listProdU("codmenu, menu", "seguranca_menu", "codmenu=$codmenuold");
	// DADOS //
	$codmenuold = $prod->showcampo0();
	$menuold = $prod->showcampo1();
		echo("
		<option selected value='$codmenuold'>$menuold</option>
		");
	}

	echo("
						  </select>
						  </font></td>

	                      <tr>
	                      	  <tr bgcolor='#FFFFFF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Modulo</font></b></td>
                            <td width='74%'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                             <select size='1' class=drpdwn name='modulonew'>



		<option  value='S'>S</option>
			<option value='N' selected>N</option>
	");

	if ($Action=="update"){

		echo("
		<option selected value='$moduloold'>$moduloold</option>
		");
	}

	echo("
						  </select>
						  </font></td>

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
				  <input type='hidden' name='codpgseg' value='$codpgold'>
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
      <td width='40%' ><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br>
        <font size=' 3' color='#FF9933' ><b>$titulo</b></font></font></b></td>
      <td width='60%' > 
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
            <p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' color='#000000' size='1'>P�GINA<b> 
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
	<table width='550' border='0' cellspacing='1' cellpadding='1' align='center'>
	<tr bgcolor='#93BEE2'> 
    <td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></div>
    </td>
    <td width='40%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRI��O</font></b></div>
    </td>
	 <td width='20%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME ARQUIVO</font></b></div>
    </td>
	<td width='10%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MENU</font></b></div>
    </td>
	<td width='5%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>SHOW</font></b></div>
    </td>
    	<td width='5%' height='0'>
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>MOD</font></b></div>
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

			$nomem = $prod->showcampo1();
			$codpgseg = $prod->showcampo0();
			$arquivo = $prod->showcampo2();
			$actionpg = $prod->showcampo3();
			$descr = $prod->showcampo4();
			$codmenu = $prod->showcampo5();
			$modulo = $prod->showcampo6();
			$prod->clear();
			$prod->listProdU("menu", "seguranca_menu", "codmenu=$codmenu");
			// DADOS //
			$menuold = $prod->showcampo0();


		echo("
		<tr bgcolor='#D6E7EF'> 
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codpgseg</font></td>
			<td width='40%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'><B>$nomem</B></font><br><font face='Verdana, Arial, Helvetica, sans-serif' size='-3'>$descr</font></td>
			<td width='20%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$arquivo</font></td>
			<td width='10%' height='0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$menuold</font></td>
			<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$actionpg</font></td>
				<td width='5%' height='0' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$modulo</font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=update&codpgseg=$codpgseg&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
			<td align='center' width='10%' height='0'><font size='1'><b><a href='$PHP_SELF?Action=delete&codpgseg=$codpgseg&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Excluir</font></b></a></font></td>
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
       