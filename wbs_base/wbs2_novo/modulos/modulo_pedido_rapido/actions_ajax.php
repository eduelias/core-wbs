
<?php
if ($login == "felipe"){
?>	
<a href="<? echo"$PHP_SELF?pg=$pg&pg_ped=150&Action=pedido"; ?>">GERA PEDIDO</a>
<?
}
/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_teste_ajax_index.php
|  template:    teste_ajax_index.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

#$db->$conn->debug = true;


$codemp_gp = 15;
$codemp_transf = 20; 
$incr = 0;
$desloc = 45; //45


#$Action = "pedido";
 
 #echo "AQUI";
   
		
switch ($Action)
{
	case "pedido" :
	 
	for($i = 1; $i <= 1; $i++ ){
	
	$vt= 0;$vc = 0;$mlb=0;
	
	
////////////////// CRIAR PEDIDO //////////////////////////
	$condicao_ped = "codemp = ".$codemp_gp.", ";
	$condicao_ped .= "codcliente = '76185', "; // <------------------ 76185 // 66499
	$condicao_ped .= "codvend = '455' "; //<------------------ LOGIN DA EMPRESA QUE CRIA O PEDIDO
		
	$rs_insert = $db->query_db("INSERT INTO pedido SET ".$condicao_ped."","SQL_NONE","N");
	$codped_ureg = $db->conn->Insert_ID();
	$codbarra_ped = $db->func_codbarra($codemp_gp, $codped_ureg, "PED");
	
	echo $codbarra_ped ." - ". $codped_ureg;
	 
////////////////// CRIAR OC //////////////////////////
	 
	$condicao_oc = "codemp = ".$codemp_transf.", ";
	$condicao_oc .= "codfor = '113', ";
	$condicao_oc .= "codmoeda = '2', ";
	$condicao_oc .= "codvend = '770', "; // 770<------------------ LOGIN DA EMPRESA ONDE SE CRIA A OC
	$condicao_oc .= "datacompra = NOW(), ";
	$condicao_oc .= "obs = 'OC DE TRANFERÊNCIA ', ";
	$condicao_oc .= "dataprevcheg = NOW(), ";
	$condicao_oc .= "codped_transf = '".$codped_ureg."' ";
	 
	$rs_insert = $db->query_db("INSERT INTO oc SET ".$condicao_oc."","SQL_NONE","N");
	 $codoc_ureg = $db->conn->Insert_ID();
	

////////////////// INSERE PRODUTOS //////////////////////////	
	$rs_lista_prod = $db->query_db("SELECT codprod, qtde FROM estoque WHERE qtde > 0  and codemp = '".$codemp_gp."'  limit $incr,$desloc ","SQL_NONE","N");
	
	if ($rs_lista_prod)
	{
		
		while (!$rs_lista_prod->EOF)
		{			
		
				
		//////////////// CALCUTO CUSTO //////////////////////////
	$rs_custo = $db->query_db("SELECT   ifnull( ( SELECT (custo_ger) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra <= 'NOW()' AND codprod = estoque.codprod ORDER BY datacompra DESC  LIMIT 0 , 1 ) , if ( ( SELECT puc FROM produtos WHERE codprod = estoque.codprod ) , ( SELECT puc FROM produtos WHERE codprod = estoque.codprod ),   ( SELECT (custo_ger) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra >= 'NOW()' AND codprod = estoque.codprod ORDER BY datacompra ASC  LIMIT 0 , 1 )) )  FROM estoque WHERE codprod = '".$rs_lista_prod->fields['codprod']."' and codemp = '".$codemp_gp."'","SQL_NONE","N");
	
	$custo = $rs_custo->fields[0];
	if ($rs_lista_prod->fields['codprod'] == 3277 or $rs_lista_prod->fields['codprod'] == 3557){$custo = 140;}
	$custo_prod = $custo*1.02;
	
	echo "CUSTO:". $custo_prod ." - ".$rs_lista_prod->fields['qtde']."<BR>";
	
		//////////////// INFORMACOES PRODUTOS //////////////////////////
	   $rs_produto = $db->query_db("SELECT gar_um, gar_cj, ponto FROM produtos WHERE codprod ='".$rs_lista_prod->fields['codprod']."'","SQL_NONE","N");
	

		//////////////////////////// TABELA PRODUTOS  ///////////////////////////
		$condicao_ped = "codped = ".$codped_ureg.", "; 
		$condicao_ped .= "codprod = ".$rs_lista_prod->fields['codprod'].", ";
		$condicao_ped .= "qtde = ".$rs_lista_prod->fields['qtde'].", "; 
		$condicao_ped .= "ppu = ".$custo_prod.", "; 
        $condicao_ped .= "datastatus = NOW(), ";
		$condicao_ped .= "status = 'CE', ";
		$condicao_ped .= "codprodcj = '0', ";
		$condicao_ped .= "tipoprod = 'UM', "; 
		$condicao_ped .= "tipocj = '0', ";
		$condicao_ped .= "gar_um = '".$rs_produto->fields['gar_um']."', "; 
		$condicao_ped .= "gar_cj = '".$rs_produto->fields['gar_cj']."', "; 
		$condicao_ped .= "prod_add = 'OK', ";
		$condicao_ped .= "fator_micro = '1', ";
		$condicao_ped .= "gar_um_orig = '".$rs_produto->fields['gar_um']."', "; 
		$condicao_ped .= "gar_cj_orig = '".$rs_produto->fields['gar_cj']."', "; 
		$condicao_ped .= "ponto_prod = '".$rs_produto->fields['ponto']."', "; 
		$condicao_ped .= "prod_kit = 'NO', ";
		$condicao_ped .= "pcm = ".$custo_prod." "; 
		
		
		 $rs_insert = $db->query_db("INSERT INTO pedidoprod SET ".$condicao_ped."","SQL_NONE","N");
		 $codpedprod_ureg = $db->conn->Insert_ID();


		////////////////// TABELA OCPROD //////////////////////////
		$condicao_oc = "codemp = ".$codemp_transf.", ";
		$condicao_oc .= "codprod = ".$rs_lista_prod->fields['codprod'].", ";
		$condicao_oc .= "codoc = '".$codoc_ureg."', ";
		$condicao_oc .= "qtdecomp = '".$rs_lista_prod->fields['qtde']."', ";
		$condicao_oc .= "qtderec = '".$rs_lista_prod->fields['qtde']."', ";
		$condicao_oc .= "pcu = '".$custo_prod."', ";
		$condicao_oc .= "garantia = '".$rs_produto->fields['gar_um']."', ";
		$condicao_oc .= "datanf = NOW(), ";
		$condicao_oc .= "datavencgar = NOW(), "; //<------------------
		$condicao_oc .= "tipo_nf = 'V' ";
		
		$rs_insert = $db->query_db("INSERT INTO ocprod SET ".$condicao_oc."","SQL_NONE","N");
		
		
		
		////////////////// INSERE CODBARRAS //////////////////////////	     			  
      $rs_codbarra = $db->query_db("SELECT codcb FROM codbarra WHERE codprod ='".$rs_lista_prod->fields['codprod']."' and codemp = '".$codemp_gp."' and codbarraped <> 1  ","SQL_NONE","N");
	  
	  if ($rs_codbarra)
	{
		
		while (!$rs_codbarra->EOF)
		{
				  
     	 $codcb = $rs_codbarra->fields['codcb'];
		 $codprod_ant = $rs_lista_prod->fields['codprod'];
		 
		 if ($codprod_ant == $rs_lista_prod->fields['codprod']){
		 
		 	$array_cb[$rs_lista_prod->fields['codprod']] .= $codcb.":"; 
			$iy++;
		 
		 }else{
			
			 $iy = 0;
			 $array_cb[$rs_lista_prod->fields['codprod']] = $codcb;
			
		 }
		 
		 
		 
		 //ATUALIZA CODBARRA
         $rs_atualiza = $db->query_db("UPDATE codbarra SET codped = '".$codped_ureg."', codbarraped = '1', codpped = '".$codpedprod_ureg."' WHERE codcb = '".$rs_codbarra->fields['codcb']."'","SQL_NONE","N");
		 
		 //ATUALIZA ESTOQUE 
     	 $rs_atualiza = $db->query_db("UPDATE estoque SET qtde = qtde - 1 WHERE codemp = '".$codemp_gp."' and codprod = '".$rs_lista_prod->fields['codprod']."'","SQL_NONE","N");
		
      	
	  	echo $ix." - ".$rs_lista_prod->fields['codprod']." - ".substr($array_cb[$rs_lista_prod->fields['codprod']],0,-1)." - ". $iy."<BR>";
	  
	  
	  $ix++;
	  $rs_codbarra->MoveNext();
	}//WHILE
    }//EXISTE WHILE
	
	
	
	//////////////////////////// TABELA PRODUTOS  ///////////////////////////
	$condicao_ped = "codcb = '".substr($array_cb[$rs_lista_prod->fields['codprod']],0,-1)."' "; 
	
	$rs_atualiza = $db->query_db("UPDATE pedidoprod SET ".$condicao_ped." WHERE codpped = ".$codpedprod_ureg."","SQL_NONE","N");
	
	
	$vt = $vt + ($custo_prod*$rs_lista_prod->fields['qtde']);
	
	echo "VT=".$vt;
     
	 	#$ix++;
		$rs_lista_prod->MoveNext();
	}//WHILE
    }//EXISTE WHILE
	
	$vc = $vt * 0.91981 * 0.9;
	$mlb = $vt-$vc;
	
	
//////////////////////////// TABELA OC //////////////////////////
		$condicao_oc = "voc = '".$vt."' "; 
		$rs_atualiza = $db->query_db("UPDATE oc SET ".$condicao_oc." WHERE codoc = ".$codoc_ureg."","SQL_NONE","N");

	
	
//////////////////////////// TABELA PEDIDO //////////////////////////
		$condicao_ped = "mlb = '".$mlb."', "; 
		$condicao_ped .= "vpv = '".$vt."', "; 
		$condicao_ped .= "vt = '".$vt."', "; 
		$condicao_ped .= "vpp = '".$vt."', "; 
		$condicao_ped .= "mcv = '171.48846', ";
		$condicao_ped .= "vc = '".$vc."', "; 
		$condicao_ped .= "mlb_real = '".$mlb."', "; 
		$condicao_ped .= "mcv_real = '171.48846', ";
    	$condicao_ped .= "mcv_prot = '0.00', ";
		$condicao_ped .= "mcv_aplic = '0.00', ";
		$condicao_ped .= "meia_mcv = 'N', ";
		$condicao_ped .= "codbarra = '".$codbarra_ped."', ";
		
		$condicao_ped .= "endentrega = '', ";
		$condicao_ped .= "cepentr = '', ";
		$condicao_ped .= "refentrega = '', ";
		$condicao_ped .= "obsentrega='', ";
		$condicao_ped .= "dataped=NOW(), ";// DATAPED
		$condicao_ped .= "dataprevent=NOW(), ";// DATAPREV ORIGINAL
		$condicao_ped .= "dataprevent_old=NOW(), ";// DATAPREV ANTIGA
		$condicao_ped .= "status = 'LIB', ";
		$condicao_ped .= "hist='0', ";
		$condicao_ped .= "obsmontagem = '', ";
		$condicao_ped .= "horaprevent = 'MANHÃ,TARDE', ";
		$condicao_ped .= "obsfinanceiro = '', ";
		$condicao_ped .= "libentr = 'OK', "; 	// LIB. ENTREGA
		$condicao_ped .= "cb = 'OK', ";  		// COD BARRA
		$condicao_ped .= "nf = 'NO', ";			// NOTA FISCAL
		$condicao_ped .= "modoentr = '', ";
		$condicao_ped .= "contrato = 'DC', "; 	// CONTRATO
		$condicao_ped .= "fichaentr = 'OK', ";		// FICHA ENTREGA
		$condicao_ped .= "caixa = 'NO', ";		// CAIXA
		$condicao_ped .= "pendfpg = 'NO', ";	// PENDENCIA DE FORMA PG
		$condicao_ped .= "reavalfpg = 'NO', ";		// REAVALIACAO DO PEDIDO
		$condicao_ped .= "ckmlb = 'NO', ";		// COMISSAO PAGA
 		$condicao_ped .= "fat = 'NO', ";		// FAT - FATURAMENTO
  		$condicao_ped .= "cancel = 'NO', ";		// CANCEL - TOTAL
   		$condicao_ped .= "cancel_est = 'NO', "; 	// CANCEL - ESTOQUE
    	$condicao_ped .= "cancel_fin = 'NO', ";		// CANCEL - FINANCEIRO
    	$condicao_ped .= "cancel_fat = 'NO', ";		// CANCEL - FATURAMENTO
    	$condicao_ped .= "modped = 'NO', ";		// MODIFICAÇÃO - PEDIDO
    	$condicao_ped .= "fatorvista = '0.91981000', ";// FATOR VENDA VISTA - PEDIDO
    	$condicao_ped .= "taxa = '3.40', ";		// TAXA JUROS - PEDIDO
		$condicao_ped .= "ped_transf = 'OK', ";		// PEDIDO TRANSFERENCIA  
		$condicao_ped .= "codemp_transf = '20', ";		// PEDIDO TRANSFERENCIA  <------------------
    	$condicao_ped .= "confirm_fpg = 'NO', ";	// CONFIRMACAO DA FORMA DE PAGAMENTO
		$condicao_ped .= "aguard_comp = 'NO', ";	// AGUARDA COMPENSACAO DE PAGAMENTO
		$condicao_ped .= "bco_ac = '$banco_ap', ";	// BANCO AC
    	$condicao_ped .= "numch_ac = '$nunch_ap', ";	// NUMCH AC
    	$condicao_ped .= "c3_ac = '$c3_ap', ";		// C3 AC
    	$condicao_ped .= "cmc7 = '$Y_0', "; // CMC7 DO CHEQUE
    	$condicao_ped .= "md5_parc = '', ";
    	$condicao_ped .= "codvend_cm = '0', ";
    	$condicao_ped .= "porc_cm = '0.00', ";
		$condicao_ped .= "declara = 'NO', "; // DECLARAÇAO DE SOFTWARE
		$condicao_ped .= "prontaentr = 'NO', "; // PRONTA ENTREGA
   		$condicao_ped .= "num_cj = '0', "; // NUMERO DE CONJUNTOS DO PEDIDO + KITS
		$condicao_ped .= "datainicio_sep=NOW(), ";// DATAINICIO SEPARACAO
   		$condicao_ped .= "inicio_sep = 'OK', "; // INICIO DA SEPARACAO
		$condicao_ped .= "datasep_ini = NOW(), ";
		$condicao_ped .= "datasep_fim = NOW()";
				
		$rs_atualiza = $db->query_db("UPDATE pedido SET ".$condicao_ped." WHERE codped = ".$codped_ureg."","SQL_NONE","N");
		
		
		
//////////////////////////// TABELA PARCELAS ///////////////////////////
		$condicao_ped = "codped = ".$codped_ureg.", "; 
		$condicao_ped .= "datavenc = NOW(), ";
		$condicao_ped .= "vp = '".$vt."', "; 
		$condicao_ped .= "tipo = '02.06', ";
        $condicao_ped .= "banco = '', ";
		$condicao_ped .= "agencia = '', ";
		$condicao_ped .= "conta='', ";
		$condicao_ped .= "numcheq='', "; 
		$condicao_ped .= "pendfpg='NO', ";
		$condicao_ped .= "parcpg = 'NO', ";
		$condicao_ped .= "numdoc = '' ";
		
				
		 $rs_insert = $db->query_db("INSERT INTO pedidoparcelas SET ".$condicao_ped."","SQL_NONE","N");
		
		
		
//////////////////////////// TABELA STATUS ///////////////////////////
		$condicao_ped = "codped = '".$codped_ureg."', "; 
		$condicao_ped .= "datastatus = NOW(), ";
		$condicao_ped .= "statusped = 'APROV', "; 
		$condicao_ped .= "login = 'felipe' ";
       
		$rs_insert = $db->query_db("INSERT INTO pedidostatus SET ".$condicao_ped."","SQL_NONE","N");
		
	$incr = $incr + $desloc;
	}//FOR
	
	 break;

	
    case "Parcelas" :
    	
		
		 $array["valortotal"] = 2000;
		$array["codvend"] = 2;
		$array["codcliente"] = 4;
		#$array["parcelas"] = array("dinheiro" =>$xnf_fab, "debito" =>  array(vp =>45, opcaixa => 55, vp =>432, opcaixa => 213), "credito" =>  array(vp =>$vp, opcaixa =>$opcaixa, numparc =>$numparc));
		$array["parcelas"] = array(0 =>array(np => 1, vp =>45.00, tp => "02.00"), 1 =>array(np => 1, vp =>500.00, tp => "02.31"), 2 =>array(np => 1, vp =>45.00, tp => "02.34"), 3 =>array(np => 3, vp =>300.00, tp => "02.30"), 4 =>array(np => 2, vp =>100.00, tp => "02.33"));
		#$array["parcelas1"]["02.02"]["3"]["100,00"] =45;
		
		#$array["parcelas"] = array();
		
		echo "<pre>";
		print_r($array);
		echo "</pre>";
		echo "<br>";
		
		foreach ($array["parcelas"] as $k => $v) {
			#foreach ($k as $result) {
			
		
		print_r($k);
		#print_r($v);
		
		
		echo $np = $v["np"]."<BR>";
		echo $vp = $v["vp"]."<BR>";
		echo $tp = $v["tp"]."<BR>";
		
		#print_r($k);
		
 		  # foreach ($codprod as $codfab) {
		if 	($k["tp"] == "02.00" ){
			
			echo "dinheiro" ;
			
			$rs_empresa = $db->query_db("SELECT codemp, nome FROM empresa WHERE codemp = '$empresa'","SQL_NONE","N");
			$empresa = $rs_empresa->fields['codemp'];
			
			#$prod->listProdMY("DATE_ADD('$datavenc', INTERVAL $difdias DAY)", "" , $array129, $array_campo129, "" );
				#$prod->mostraProd( $array129, $array_campo129, 0 );
				#$datavenc =  $prod->showcampo0();
		}
		
		
		
		}#}
        	
			
			
			
   
    break;
  
}

	
$db->disconnect();



?>
