

<?php

#include_once("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 30;
$tabela = "formapg";					// Tabela EM USO
$condicao1 = "opcaixa='$opcaixaselect'";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by opcaixa limit $desloc,$acrescimo ";								// order by nome
$campopesq = "descricao";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "OPERAÇÃO DE CAIXA";
$titulo = "OPERAÇÃO DE CAIXA";

$Actionter = "unlock";


// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA
switch ($Action) {

    case "insert":

		if ($retorno){
		
		$prod->clear();
		$prod->setcampo0($opcaixa);
		$prod->setcampo1($descricao);
		$prod->setcampo2($padraoped);
		$prod->setcampo3($bco);
		$prod->setcampo5($caixa);
		$prod->setcampo6($car);
		$prod->setcampo7($cap);
		$prod->setcampo8($cofre);
		$prod->setcampo9($inschtab);
		$prod->setcampo11($tipoparc);
		$prod->setcampo12("N");
		$prod->setcampo13($bco_vend);
		$tarifa = str_replace('.','',$tarifa);
		$tarifa = str_replace(',','.',$tarifa);
		$prod->setcampo14($tarifa);
		$prod->setcampo15($hist);
		$prod->setcampo16($despesa);
		$prod->setcampo17($tipo_ped);
		$prod->setcampo18($fabrica);
		$prod->setcampo19($lib_contrato);
		$prod->setcampo20($lib_aprov);
		$prod->setcampo21($fin_grupo);
		$prod->setcampo22($fin_subgrupo);
		$prod->setcampo23($aguarda_comp);
		
		
		$prod->addProd($tabela, $ureg);
				
		$Actionsec="list";
		
		}
		$desloc=0;

		$nomeformsec=" INSERIR NOVA $nomeform ";

        break;

    case "update":

		$prod->clear();
		$prod->listProd($tabela, $condicao1);
				
		$xopcaixa = $prod->showcampo0();
		$xdescricao = $prod->showcampo1();
		$xpadraoped = $prod->showcampo2();
		$xbco = $prod->showcampo3();
		$xpbco = $prod->showcampo4();
		$xcaixa = $prod->showcampo5();
		$xcar = $prod->showcampo6();
		$xcap = $prod->showcampo7();
		$xcofre = $prod->showcampo8();
		$xinschtab = $prod->showcampo9();
		$xtipoparc = $prod->showcampo11();
		$xpnumdoc = $prod->showcampo12();
		$xbco_vend = $prod->showcampo13();
		$xtarifa = $prod->showcampo14();
		$xtarifa = number_format($xtarifa, 2,',', '.');
		$xhist = $prod->showcampo15();
		$xdespesa = $prod->showcampo16();
		$xtipo_ped = $prod->showcampo17();
		$xfabrica = $prod->showcampo18();
		$xlib_contrato = $prod->showcampo19();
		$xlib_aprov = $prod->showcampo20();
		$xfin_grupo = $prod->showcampo21();
		$xfin_subgrupo = $prod->showcampo22();
		$xaguarda_comp = $prod->showcampo23();

				
		if ($retorno){

		$prod->setcampo0($opcaixa);
		$prod->setcampo1($descricao);
		$prod->setcampo2($padraoped);
		$prod->setcampo3($bco);
		$prod->setcampo5($caixa);
		$prod->setcampo6($car);
		$prod->setcampo7($cap);
		$prod->setcampo8($cofre);
		$prod->setcampo9($inschtab);
		$prod->setcampo11($tipoparc);
		$prod->setcampo13($bco_vend);
		$tarifa = str_replace('.','',$tarifa);
		$tarifa = str_replace(',','.',$tarifa);
		$prod->setcampo14($tarifa);
		$prod->setcampo15($hist);
		$prod->setcampo16($despesa);
		$prod->setcampo17($tipo_ped);
		$prod->setcampo18($fabrica);
		$prod->setcampo19($lib_contrato);
		$prod->setcampo20($lib_aprov);
		$prod->setcampo21($fin_grupo);
		$prod->setcampo22($fin_subgrupo);
		$prod->setcampo23($aguarda_comp);

		
						
		$prod->upProd($tabela,"opcaixa='$opcaixa'");
		
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
                        <td width='370'><b><b><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 1' >SE&Ccedil;&Atilde;O</font><font face=' Verdana, Arial, Helvetica, sans-serif' size=' 6' ><br><font color='#FF9933' size='3' face='Verdana'></font></b><b><font size='3' face='Verdana'><font color='#FF9933'>$nomeform</font><br>
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
                        <table border='0' width='90%' cellspacing='1' cellpadding='2' >
                          <tr> 
                            <td width='100%'  colspan='2'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'></font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#93BEE2' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            OPCAIXA</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#93BEE2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                <input type='text' value='$xopcaixa' name='opcaixa' size='10' > (Formato: XX.XX)
			                          
                              </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#93BEE2' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            D</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>escrição:</font></b></td>
                            <td width='74%' bgcolor='#93BEE2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$xdescricao' name='descricao' size='36' >
			                          
                              </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            Padrão Pedido</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='padraoped'>
                        	<option value='S'>S</option>
                            <option value='N' selected>N</option>
							
                            <option value='$xpadraoped' selected>$xpadraoped</option>
							
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font>
                            <font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> 
				
                                (Define se esse OPCAIXA irá aparecer na lista de escolha das formas de pagamentos do pedido.)</font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            Banco:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='bco'>
                            <option value='C'>C</option>
                            <option value='D'>D</option>
							<option value=''></option>
                            <option value='$xbco' selected>$xbco</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
								
				
                                </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            Caixa:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='caixa'>
                            <option value='C'>C</option>
                            <option value='D'>D</option>
                            <option value='CD'>CD</option>
							<option value=''></option>
                            <option value='$xcaixa' selected>$xcaixa</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            CAR:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='car'>
                            <option value='C'>C</option>
                            <option value='D'>D</option>
							<option value=''></option>
                            <option value='$xcar' selected>$xcar</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            CAP:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='cap'>
                            <option value='C'>C</option>
                            <option value='D'>D</option>
							<option value=''></option>
                            <option value='$xcap' selected>$xcap</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            COFRE:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='cofre'>
                            <option value='C'>C</option>
                            <option value='D'>D</option>
							<option value=''></option>
                            <option value='$xcofre' selected>$xcofre</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						<tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            BCO VEND:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='bco_vend'>
                            <option value='C'>C</option>
                            <option value='D'>D</option>
							<option value=''></option>
                            <option value='$xbco_vend' selected>$xbco_vend</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
                          <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            Inserir Cheque Tabela:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='inschtab'>
                            <option value='S'>S</option>
                            <option value='N' selected>N</option>
							
                            <option value='$xinschtab' selected>$xinschtab</option>
							
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font>
                            <font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> <br>
				
                                (Quando a Forma de Pagamentos for em cheques, estes devem ser copiados para uma tabela S ou N )</font></td>
                          </tr>
                          <tr bgcolor='#D6E7EF'> 
                            <td width='26%' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            Tipo Parcela</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' ><select size='1' name='tipoparc'>
                            <option value='CX'>CX</option>
                            <option value='FT'>FT</option>
							
                            <option value='$xtipoparc' selected>$xtipoparc</option>
							
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font>
                            <font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'><br> 
				
                                (Quando a Forma de Pagamento tiver esse OPCAIXA ela será inserida no caixa através co próprio caixa CX ou pelo setor de faturamento FT)</font></td>
                          </tr>
						 <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>
                            TARIFA</font><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='1'> R$ 
				
                                <input type='text' value='$xtarifa' name='tarifa' size='10' onChange='consisteValor(this.form, this.form.tarifa.name, true)'> 
			                          
                              </font></td>
                          </tr>
						 <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            HISTORICO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='hist'>
                            <option value='S'>S</option>
                            <option value='N'>N</option>
							<option value=''></option>
                            <option value='$xhist' selected>$xhist</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						 <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            TIPO DE DESPESA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='despesa'>
                            <option value='OP'>OP</option>
                            <option value='NO'>NO</option>
                            <option value='FO'>FO</option>
							<option value=''></option>
                            <option value='$xdespesa' selected>$xdespesa</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
	 <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            TIPO DE PEDIDO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='tipo_ped'>
                            <option value='C'>C</option>
                            <option value='I'>I</option>
                            <option value='T'>T</option>
							<option value=''></option>
                            <option value='$xtipo_ped' selected>$xtipo_ped</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            LIB. FABRICA:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='fabrica'>
                            <option value='S'>S</option>
                            <option value='N'>N</option>
                            <option value='$xfabrica' selected>$xfabrica</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            LIB. CONTRATO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='lib_contrato'>
                            <option value='S'>S</option>
                            <option value='N'>N</option>
                            <option value='$xlib_contrato' selected>$xlib_contrato</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						   <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            LIB. APROVAÇÃO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='lib_aprov'>
                            <option value='S'>S</option>
                            <option value='N'>N</option>
                            <option value='$xlib_aprov' selected>$xlib_aprov</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						  <tr>
                            <td width='26%' bgcolor='#D6E7EF' ><b><font size='1' face='Verdana, Arial, Helvetica, sans-serif' color='#000000'>
                            AGUARDA COMPENSAÇÃO:</font></b></td>
                            <td width='74%' bgcolor='#D6E7EF' ><select size='1' name='aguarda_comp'>
                            <option value='S'>S</option>
                            <option value='N'>N</option>
                            <option value='$xaguarda_comp' selected>$xaguarda_comp</option>
                            </select><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                </font></td>
                          </tr>
						  <tr>
                            <td width='26%' bgcolor='#93BEE2' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
                            Grupo:</font></b></td>
                            <td width='74%' bgcolor='#93BEE2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$xfin_grupo' name='fin_grupo' size='10'  maxlength='10' >
			                          
                              </font></td>
                          </tr>
						  <tr>
                            <td width='26%' bgcolor='#93BEE2' ><b>
                            <font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#000000'>
                            Sub Grupo:</font></b></td>
                            <td width='74%' bgcolor='#93BEE2' ><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
				
                                <input type='text' value='$xfin_subgrupo' name='fin_subgrupo' size='10' maxlength='10' >
			                          
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
            <td width='30%'><b><a href='$PHP_SELF?Action=list&opcaixaselect=$opcaixa&codempselect=$codempselect&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&codprodpesq=$codprodpesq&retlogin=$retlogin&connectok=$connectok&pg=$pg&hist=0'><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>ATUALIZAR
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

	<table width='100%' border='0' cellspacing='2' cellpadding='2' style='border-collapse: collapse' bordercolor='#111111' >
	<tr bgcolor='#93BEE2'> 
    <td width='5%' height='0'> 
      <div align='center'><b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>OPCAIXA</font></b></div>
    </td>
    <td width='40%' height='0'> 
      <div align='center'><b>
        <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESCRIÇÃO</font></b></div>
    </td>
    <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO</font></b></td>
    <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAIXA</font></b></td>
    <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAR</font></b></td>
    <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CAP</font></b></td>
	<td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>BCO<br>VEND</font></b></td>
    <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>CH</font></b></td>
	 <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>PED</font></b></td>
    <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>TIPO</font></b></td>
	 <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>DESP</font></b></td>
	  <td width='5%' height='0' align='center'> 
      <b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>GRUPO</font></b></td>
    <td align='center' width='10%' height='0'> 
      <div align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>&nbsp;</font></b></div>
    </td>
  </tr>



	");
	 
	 for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			$opcaixa = $prod->showcampo0();
			$descricao = $prod->showcampo1();
			$padraoped = $prod->showcampo2();
			$bco = $prod->showcampo3();
			$pbco = $prod->showcampo4();
			$caixa = $prod->showcampo5();
			$car = $prod->showcampo6();
			$cap = $prod->showcampo7();
			$cofre = $prod->showcampo8();
			$inschtab = $prod->showcampo9();
			$tipoparc = $prod->showcampo11();
			$pnumdoc = $prod->showcampo12();
			$bco_vend = $prod->showcampo13();
			$hist = $prod->showcampo15();
			$despesa = $prod->showcampo16();
			$tipo = $prod->showcampo17();
			$fin_grupo = $prod->showcampo21();

			
			if ($hist == "S"){$cor ="#FCC2BC";}else{$cor="#D6E7EF";}

		echo("
	<tr bgcolor='$cor'> 
			<td width='5%' height='0' align='center'><b><font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$opcaixa</font></b></td>
			<td width='40%' height='0'>
           <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$descricao</font></td>
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$bco</font></td>
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$caixa</font></td>
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$car</font></td>
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$cap</font></td>
			<td width='5%' height='0' align='center'>
			<font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$bco_vend</font></td>
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$inschtab</font></td>
			<td width='5%' height='0' align='center'>
            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$tipo</font></td>
			<td width='5%' height='0' align='center'>

            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$tipoparc</font></td>
			<td width='5%' height='0' align='center'>

            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$despesa</font></td>
			<td width='5%' height='0' align='center'>

            <font face='Verdana, Arial, Helvetica, sans-serif' size='1'>$fin_grupo</font></td>
			<td align='center' width='10%' height='0'><font size='1'><a href='$PHP_SELF?Action=update&opcaixaselect=$opcaixa&desloc=$desloc&palavrachave=$palavrachave&operador=$operador&pagina=$pagina&retlogin=$retlogin&connectok=$connectok&pg=$pg'><b><font face='Verdana, Arial, Helvetica, sans-serif'>Alterar 
			  </font></b></a></font></td>
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
       
