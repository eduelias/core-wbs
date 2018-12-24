

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 50;
$tabela = "categoria";					// Tabela EM USO
$condicao1 = "codcat=$codcat";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nomecat limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nomecat";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CATEGORIA";
$titulo = "ADMINISTRAÇÃO CATEGORIA";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){

		if ($restricao_pl == ""){$restricao_pl = "NO";}
		if ($n_prod_int == ""){$n_prod_int = "NO";}
		if ($n_prod_ext == ""){$n_prod_ext = "NO";}
		if ($cat_cj == ""){$cat_cj = "NO";}
		if ($cat_kit == ""){$cat_kit = "NO";}
		
		$prod->setcampo1($nomecat);
		$prod->setcampo2($restricao_pl);
		$prod->setcampo3($n_prod_int);
		$prod->setcampo4($n_prod_ext);
		$prod->setcampo5($cat_cj);
		$prod->setcampo6($ordem);
		$prod->setcampo7($cat_kit);

		
		$prod->addProd($tabela, $ureg);
				
		$Actionsec="list";
		
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVA $nomeform ";

        break;

    case "update":

		$prod->listProd($tabela, $condicao1);
		
		$codcatold = $prod->showcampo0();		
		$nomecatold = $prod->showcampo1();
		$xrestricao_pl = $prod->showcampo2();
		$xn_prod_int = $prod->showcampo3();
		$xn_prod_ext = $prod->showcampo4();
		$xcat_cj = $prod->showcampo5();
		$xordem = $prod->showcampo6();
		$xcat_kit = $prod->showcampo7();

				
		if ($retorno){

		if ($restricao_pl == ""){$restricao_pl = "NO";}
		if ($n_prod_int == ""){$n_prod_int = "NO";}
		if ($n_prod_ext == ""){$n_prod_ext = "NO";}
		if ($cat_cj == ""){$cat_cj = "NO";}
    	if ($cat_kit == ""){$cat_kit = "NO";}

		$prod->setcampo1($nomecat);
		$prod->setcampo2($restricao_pl);
		$prod->setcampo3($n_prod_int);
		$prod->setcampo4($n_prod_ext);
		$prod->setcampo5($cat_cj);
		$prod->setcampo6($ordem);
		$prod->setcampo7($cat_kit);
		
						
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

// OCULTAR TODO O RESTO DA PÁGINA ////
if ($Actionter == "unlock"){

include("sif-topo.php");

if($Action <> "list" ):

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
                  <form method='POST' action='$PHP_SELF?Action=$Action'  name='Form' enctype='multipart/form-data'>
                    <div align='center'> 
                      <center>
                        <table border='0' width='90%' cellspacing='0' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Nome Categoria:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$nomecatold' name='nomecat' size='20' >
			                          
                              </font></td>
                          </tr>
					
		    <tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Restrição</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($Action == "update"){

				if ($xrestricao_pl == "NO" or $xrestricao_pl == ""):
				echo("
								 <input type='checkbox' name='restricao_pl' value='OK'  > Categoria possui restrição com placa mãe.
					");
				else:
				echo("
								 <input type='checkbox' name='restricao_pl' value='OK' checked> Categoria possui restrição com placa mãe.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='restricao_pl' value='OK' checked> Categoria possui restrição com placa mãe.
				");
			}
			echo("
                              </font></td>
                          </tr>
		<tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Produto(INT)</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($Action == "update"){

				if ($xn_prod_int == "NO" or $xn_prod_int == ""):
				echo("
								 <input type='checkbox' name='n_prod_int' value='OK'  > Produto liberado para nao ser selecionado.
					");
				else:
				echo("
								 <input type='checkbox' name='n_prod_int' value='OK' checked> Produto liberado para nao ser selecionado.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='n_prod_int' value='OK' checked> Produto liberado para nao ser selecionado.
				");
			}
			echo("
                              </font></td>
                          </tr>			
								  
			<tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Produto (EXT)</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($Action == "update"){

				if ($xn_prod_ext == "NO" or $xn_prod_ext == ""):
				echo("
								 <input type='checkbox' name='n_prod_ext' value='OK'  > Produto liberado para nao ser selecionado.
					");
				else:
				echo("
								 <input type='checkbox' name='n_prod_ext' value='OK' checked> Produto liberado para nao ser selecionado.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='n_prod_ext' value='OK' checked> Produto liberado para nao ser selecionado.
				");
			}
			echo("
                              </font></td>
                          </tr>	
				<tr bgcolor='#D6E7EF'> 
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Categotia (CJ)</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
");
			if ($Action == "update"){

				if ($xcat_cj == "NO" or $xcat_cj == ""):
				echo("
								 <input type='checkbox' name='cat_cj' value='OK'  > Categoria listavel em um conjunto.
					");
				else:
				echo("
								 <input type='checkbox' name='cat_cj' value='OK' checked> Categoria listavel em um conjunto.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='cat_cj' value='' checked>  Categoria listavel em um conjunto.
				");
			}
			echo("
                              </font></td>
                          </tr>	
                          <tr bgcolor='#D6E7EF'>
                            <td width='26%'><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Categotia (KIT)</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'>
");
			if ($Action == "update"){

				if ($xcat_kit == "NO" or $xcat_kit == ""):
				echo("
								 <input type='checkbox' name='cat_kit' value='OK'  > Categoria listavel em um kit.
					");
				else:
				echo("
								 <input type='checkbox' name='cat_kit' value='OK' checked> Categoria listavel em um kit.
					");
				endif;
			}else{
				echo("
							 <input type='checkbox' name='cat_kit' value='' checked>  Categoria listavel em um kit.
				");
			}
			echo("
                              </font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'>
                            <td width='26%' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>Ordem do Conjunto:</font></b></td>
                            <td width='74%' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'>

                                <input type='text' value='$xordem' name='ordem' size='4' >

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
				  <input type='hidden' name='codcat' value='$codcatold'>
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
 <tr align='center' bgcolor='#93BEE2'>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>COD.</font></b></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>NOME CATEGORIA</font></b></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ORD</font></b></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>RES</font></b></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LIB<br>
        </font></b> <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>INT</b></font></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>LIB<br>
        </font></b> <font face='Verdana, Arial, Helvetica, sans-serif' size='1'><b>EXT</b></font></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CJ</font></b></td>
        <td><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>KIT</font></b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>


	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$nomecat = $prod->showcampo1();
			$codcat = $prod->showcampo0();
			$restricao_pl = $prod->showcampo2();
			$n_prod_int = $prod->showcampo3();
			$n_prod_ext = $prod->showcampo4();
			$cat_cj = $prod->showcampo5();
			$ordem = $prod->showcampo6();
			$cat_kit = $prod->showcampo7();

if ($restricao_pl == "NO" or $restricao_pl == ""){$cor1 ="#FF0000";}else{$cor1="#008000";}
if ($n_prod_int == "NO" or $n_prod_int == ""){$cor2 ="#FF0000";}else{$cor2="#008000";}
if ($n_prod_ext == "NO" or $n_prod_ext == ""){$cor3 ="#FF0000";}else{$cor3="#008000";}
if ($cat_cj == "NO" or $cat_cj == ""){$cor4 ="#FF0000";}else{$cor4="#008000";}
if ($cat_kit == "NO" or $cat_kit == ""){$cor5 ="#FF0000";}else{$cor5="#008000";}

		echo("
	 <tr align='center' bgcolor='#D6E7EF'>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$codcat</font></td>
        <td align='left' ><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$nomecat</font></td>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '#000000'><b>$ordem</b></font></td>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor1'><b>$restricao_pl</b></font></td>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor2'><b>$n_prod_int</b></font></td>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor3'><b>$n_prod_ext</b></font></td>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor4'><b>$cat_cj</b></font></td>
        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='1' color = '$cor5'><b>$cat_kit</b></font></td>
        <td><font size='1'><b><a href='$PHP_SELF?Action=update&codcat=$codcat&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar</font></a></b></font></td>
        <td><!--<font size='1'><a href='$PHP_SELF?Action=delete&codcat=$codcat&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><font face='Verdana, Arial, Helvetica, sans-serif'><strong>Excluir</strong></font></a></font>--></td>
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
       
