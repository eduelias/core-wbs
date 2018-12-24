<?php

// WBS
// arquivo:	start_ped_page_index.php
// template:	ped_page_index.htm

// Variáveis

define("MOD_COR", "amarelo");
define("MOD_PG", $pg);
define("MOD_TITULO", "CHECKLIST TESTE");

 $db->connect_wbs();
 #$db->conn->debug = true;
 
 if ($_GET['codcb_select'] ){
 
 /*
            
            $rs_lista = $db->query_db("SELECT idop_sn, codprod FROM op_sn , op_prod WHERE sn ='".$_POST['sn_pesq']."' and op_sn.idop = op_prod.idop","SQL_NONE","N");
            
 			
             $rs_lista_op = $db->query_db("SELECT op.idop, codemp, datainicio, codprod, qtde FROM op_sn , op WHERE sn ='".$_POST['sn_pesq']."' and op_sn.idop = op.idop","SQL_NONE","N");
             $codemp_op = $rs_lista_op->fields['codemp'];
             $idop = $rs_lista_op->fields['idop'];
             $qtde_lote = $rs_lista_op->fields['qtde'];
             $codprod_lote = $rs_lista_op->fields['codprod'];
             $data_inisn = $rs_lista_op->fields['data_ini'];
             $data_fimsn = $rs_lista_op->fields['data_fim'];
             
 #$codemp = 1;            
 
 			# echo "ne".$rs_lista->fields['idop_sn'];
			
			
			
			*/
						
			#echo $cond;
			
			$rs_prod = $db->query_db("SELECT codcb, codbarra.codbarra, nomeprod, codped, codemp, idop_sn, codbarra.codprod, tipo_gar  FROM codbarra, produtos WHERE codbarra.codcb = '".$_GET['codcb_select']."' and chkcb = 'Y'  and produtos.codprod= codbarra.codprod and codbarraped = 1 ORDER by codcb DESC limit 0,1 ","SQL_NONE","N");
			
			#echo "<pre>";
			#print_r($rs_prod);
    		
			if ($rs_prod->_numOfRows <> 0)
			{
				
				while (!$rs_prod->EOF)
				{
			
				
				$codcb_pesq = $rs_prod->fields[0];
				$codbarra_pesq = $rs_prod->fields[1];
				$nomeprod_pesq = $rs_prod->fields[2];
				$codped_pesq = $rs_prod->fields[3];
				$codemp_pesq = $rs_prod->fields[4];
				$idop_sn_pesq = $rs_prod->fields[5];
				$codprod_pesq = $rs_prod->fields[6];
				$tipo_garantia = $rs_prod->fields[7];
				#$tipo_garantia = 'B';
				
				if ($idop_sn_pesq <> 0){
				
					
								
						
            
				}else{
				
				#echo "codcb = $codcb_pesq - codbarra = $codbarra_pesq - nomeprod = $nomeprod_pesq - codped = $codped_pesq - codemp = $codemp_pesq - idop_sn = $idop_sn_pesq <br>";
				
				}
				
				
							
				$rs_prod->MoveNext();
				}//WHILE
				
				
			$rs_pedido = $db->query_db("SELECT pedidonf.nf, pedidonf.datanf, pedidonf.valornf, pedidonf.modo_nf,  pedido.codemp, clientenovo.nome, pedido.codbarra, dataped, if (tipocliente = 'F' , cpf, cnpj) as doc, if (DATE(  (SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1)	MONTH , pedido.dataentrega + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1) MONTH))) >= DATE(NOW()), 1, 0) as gar,  if (DATE( (SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf , dataentrega )) ) + interval (if (DAYNAME(DATE( (SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf , dataentrega ))) + interval 2 DAY) = 'Sunday',3, 2) ) DAY >= DATE(NOW()), 1, 0 ) as 48h,  DATE_FORMAT((SELECT if(pedidonf.datanf <> '0000-00-00', pedidonf.datanf + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1)	MONTH , pedido.dataentrega + interval (SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and  codcb like '%".$codcb_pesq."%' LIMIT 1) MONTH)), '%d-%m-%Y') as venc FROM pedidonf, pedido, clientenovo WHERE pedido.codped ='".$codped_pesq."'  and pedido.codped= pedidonf.codped and clientenovo.codcliente= pedido.codcliente   ","SQL_NONE","N");	
			
			 
		
			#echo "<pre>";
			#print_r($rs_pedido);
			
			#$rs_pedido->Move(0);
			if ($rs_pedido)
			{
				
				while (!$rs_pedido->EOF)
				{
					
				$numnf_ped = $rs_pedido->fields[0];
				$datanf_ped = $rs_pedido->fields[1];
				$valornf_ped = $rs_pedido->fields[2];
				$modonf_ped = $rs_pedido->fields[3];
				$codemp_ped = $rs_pedido->fields[4];
				$nomecli_ped = $rs_pedido->fields[5];
				$codbarraped_ped = $rs_pedido->fields[6];
				$dataped_ped = $rs_pedido->fields[7];
				$doc_ped = $rs_pedido->fields[8];
				$gar_ped = $rs_pedido->fields[9];
				$gar1_ped = $rs_pedido->fields[10];
				$venc_ped = $rs_pedido->fields[11];
				
				#echo "datagar1 = ".$gar1_ped;
				#echo "vencgar1 = ".$venc_ped;
				
				#echo "numnf = $numnf_ped - datanf_ped = $datanf_ped - valornf_ped = $valornf_ped - modonf_ped = $modonf_ped - codemp_ped = $codemp_ped - codped = $codped_pesq - nomecli_ped = $nomecli_ped <br>";
							
			$rs_pedido->MoveNext();
				}//WHILE
			}
			
            
			
				$rs_estoque = $db->query_db("SELECT (SELECT (qtde - reserva) FROM estoque WHERE codemp =15 AND codprod ='".$codprod_pesq."') AS lf , (SELECT (qtde - reserva) FROM estoque WHERE codemp =1 AND codprod ='".$codprod_pesq."') as hf, (SELECT (qtde - reserva) FROM estoque WHERE codemp =14 AND codprod ='".$codprod_pesq."') as bt FROM estoque WHERE codprod ='".$codprod_pesq."' GROUP BY codprod","SQL_NONE","N");
				
				$rs_garantia = $db->query_db("SELECT gar_um FROM pedidoprod WHERE codped = ".$codped_pesq." and codprod = ".$codprod_pesq." and codcb like '%".$codcb_pesq."%' ","SQL_NONE","N");
						
				
			}
						 
			
}				
            
 $db->disconnect();

/*
#require("../../../../../classprod.php");
#require("../../config.inc.php");

// inicio da classe
$prod = new operacao();

#$login = felipe; // SETAR O LOGIN



switch ($Action)
{

	case "pesquisa":
	
        // MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProdU("codemp, codcliente, codvend, vpp, nf, codbarra, dataped, tipo_vge, endentrega, refentrega", "pedido", "codped=$codped");

		$codemp = $prod->showcampo0();
		$codcliente = $prod->showcampo1();
		$codvend = $prod->showcampo2();
		$vpp = $prod->showcampo3();
		$vppf = number_format($vpp,2,',','.');
		$nf = $prod->showcampo4();
		$codbarra = $prod->showcampo5();
		$dataped = $prod->showcampo6();
		$tipo_vge = $prod->showcampo7();
		$endentrega = $prod->showcampo8();
		$refentrega = $prod->showcampo9();
		
		$prod->listProdU("nome", "vendedor", "codvend=$codvend");
		$nomevend = $prod->showcampo0();
		

	// MOSTRA DADOS DO CLIENTE - INICIO
	$prod->listProdU("nome, tipocliente, cpf, cnpj, rg, rgemissor, endereco, bairro, cidade, cep, estado, numero, complemento, dddtel1, tel1, dddtel2, tel2", "clientenovo", "codcliente=$codcliente");

		$xnome=			$prod->showcampo0();
		$xtipocliente=	$prod->showcampo1();
		if ($xtipocliente == "F"){
		$xdoc=			$prod->showcampo2(); // CPF
		}else{
		$xdoc=			$prod->showcampo3(); // CNPJ
		}
		$xrg=			$prod->showcampo4();
		$xrgemissor=	$prod->showcampo5();
		$xendereco=		$prod->showcampo6();
		$xbairro=		$prod->showcampo7();
		$xcidade=		$prod->showcampo8();
		$xcep=			$prod->showcampo9();
		$xestado=		$prod->showcampo10();
        $xynumero = $prod->showcampo11();
        $xycomplemento = $prod->showcampo12();
        $xdddtel1 = $prod->showcampo13();
        $xtel1 = $prod->showcampo14();
        $xdddtel2 = $prod->showcampo15();
        $xtel2 = $prod->showcampo16();
            
        
        
        $prod->listProdgeral("pedidonf", "codped=$codped", $array612, $array_campo612 , "");
	for($j = 0; $j < count($array612); $j++ ){

			$prod->mostraProd( $array612, $array_campo612, $j );

			$codnf[$j] = $prod->showcampo0();
			$nf_ped[$j] = $prod->showcampo2();
			$valornf[$j] = $prod->showcampo3();

			$valornff = number_format($valornf,2,',','.');
    }//FOR

		break;
}

*/

    include("templates/fabrica_garantia_checklist_teste.htm");




?>
