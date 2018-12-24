<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sedex_index.php
|  template:    sedex_index.htm
+--------------------------------------------------------------
*/

include(DIR_SISTEMA."/".DIR_MODULOS."/paginador.class.php");
$paginator = new Mult_Pag();

$acrescimo = 10;

switch ($Action)
{
    // SOLICITA NOTA FISCAL
    case "acao_1" :
      
       
                $db->connect_wbs();
				
				if ($codtransp != -1){
				
							
                	
					
				$rs_verif = $db->query_db("SELECT codped, modped FROM pedido WHERE lista_desp = 'OK'","SQL_NONE","N");

				if ($rs_verif)
				{
					while (!$rs_verif->EOF)
					{
					$rs_insert= $db->query_db("INSERT INTO pedidostatus (statusped, codped, datastatus, login) VALUES ('DESP' , '".$rs_verif->fields['codped']."',  NOW(), '$login' )","SQL_NONE","N");
					 	$rs_verif->MoveNext();
					}//WHILE
				}
				
				$rs_update = $db->query_db("UPDATE pedido SET status = 'DESP', codtransp = '$codtransp',  datasaidaest = NOW(), modped = 'NO', lista_desp = 'NO' WHERE lista_desp = 'OK'","SQL_NONE","N");
					
					
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
                }
				
                $db->disconnect();
        
    break;
	
	
    
    
      
}

$db->connect_wbs();

#$db->$conn->debug = true;

$condicaopesq = " lista_desp = 'OK' AND pedido.codcliente=clientenovo.codcliente and pedido.codvend=vendedor.codvend";


$rs_lista = $db->query_db("SELECT codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome as nomecli, vendedor.nome as nomevend, fat, modped, modoentr, dataprevent_old, aguard_comp, declara, prontaentr, modelo_ped, ped_transf, datasol_nf, lista_desp, dddtel1, tel1, endereco, numero, complemento, bairro, cep, cidade, estado, rescredito, refentrega, obsentrega, endentrega FROM pedido, clientenovo, vendedor WHERE $condicaopesq and pedido.codemp = '$empresa' ORDER by dataprevent","SQL_NONE","N");
$numRows = $rs_lista->_numOfRows;

// PESQUISA POR EMPRESA
#$rs_empresas = $db->query_db("SELECT codemp, nome FROM empresa WHERE hist_emp <> 'S'","SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT codemp, nome FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];

$rs_transp = $db->query_db("SELECT codtransp, nome FROM transportadora WHERE hist<>'S' order by nome","SQL_NONE","N");

$db->disconnect();

include ("templates/expedicao_lista_desp.htm");

?>
