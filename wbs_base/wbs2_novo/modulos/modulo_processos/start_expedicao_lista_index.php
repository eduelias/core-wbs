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
      
        for($i = 0; $i < $numRows; $i++ )
        {
            if ($rows_codped[$i] <> "")
            {
                $db->connect_wbs();
				
				$rs_verif = $db->query_db("SELECT fat FROM pedido WHERE codped = '$rows_codped[$i]'","SQL_NONE","N");

				if ($rs_verif->fields['fat'] != 'OK'){
                	$rs_update = $db->query_db("UPDATE pedido SET datasol_nf = NOW() WHERE codped = '$rows_codped[$i]'","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
                }
				
                $db->disconnect();
            }
        }
    break;
	
	// GERAR LISTA DESPACHO
	  case "acao_2" :
       
        
        for($i = 0; $i < $numRows; $i++ )
        {
			
            if ($rows_codped[$i] <> "")
            {
                $db->connect_wbs();
				
				#$rs_verif = $db->query_db("SELECT libentr FROM pedido WHERE codped = '$rows_codped[$i]'","SQL_NONE","N");

				#if ($rs_verif->fields['libentr'] == 'OK'){
                	$rs_update = $db->query_db("UPDATE pedido SET lista_desp = 'OK' WHERE codped = '$rows_codped[$i]'","SQL_NONE","N");
                	#echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
				#}
                
                $db->disconnect();
            }
        }
    break;
	
	// LIMPA LISTA DESPACHO
	  case "acao_3" :
       
        
        for($i = 0; $i < $numRows; $i++ )
        {
			
            if ($rows_codped[$i] <> "")
            {
                $db->connect_wbs();

                $rs_update = $db->query_db("UPDATE pedido SET lista_desp = 'NO' WHERE codped = '$rows_codped[$i]'","SQL_NONE","N");
                #echo "<b>I</b> = $i <b>codpedido</b> = $codpedido[$i]<br>";
                
                $db->disconnect();
            }
        }
    break;
    
    
      
}

$db->connect_wbs();

#$db->$conn->debug = true;

$condicaopesq = " ((pedido.status = 'LIB') or (pedido.modped = 'OK' and pedido.cb = 'OK'  )) and (pedido.contrato = 'OK' or  pedido.contrato = 'EP' or  pedido.contrato = 'DC' ) AND pedido.codcliente=clientenovo.codcliente and pedido.codvend=vendedor.codvend";

$rs_lista = $db->query_db("SELECT codped, pedido.codcliente, pedido.codvend, dataped, dataprevent, status, horaprevent, nf, contrato, libentr, codbarra, caixa, clientenovo.nome as nomecli, vendedor.nome as nomevend, fat, modped, modoentr, dataprevent_old, aguard_comp, declara, prontaentr, modelo_ped, ped_transf, datasol_nf, lista_desp, dddtel1, tel1, endereco, numero, complemento, bairro, cep, cidade, estado, rescredito, refentrega, obsentrega, endentrega, clientenovo.tipocliente FROM pedido, clientenovo, vendedor WHERE $condicaopesq and pedido.codemp = '$empresa' ORDER by dataprevent","SQL_NONE","N");

$numRows = $rs_lista->_numOfRows;

// PESQUISA POR EMPRESA
$rs_empresas = $db->query_db("SELECT codemp, nome FROM empresa WHERE hist_emp <> 'S'","SQL_NONE","N");
$rs_empresa = $db->query_db("SELECT codemp, nome FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
$empresa = $rs_empresa->fields['codemp'];

$db->disconnect();

include ("templates/expedicao_lista_index.htm");

?>
