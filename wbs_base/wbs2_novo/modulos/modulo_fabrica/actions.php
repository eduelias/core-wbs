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
|  arquivo:     start_teste_ajax_index.php
|  template:    teste_ajax_index.htm
+--------------------------------------------------------------
*/

$db->connect_wbs();

#$db->$conn->debug = true;

        
switch ($Action)
{

		
    case "DelLote" :
        //$rs_codbarra = $db->query_db("SELECT codcb FROM codbarra WHERE codbarra ='".$_GET['codbarra']."' and codemp = '".$_GET['codemp']."' and codbarraped <> 1 and codprod = '".$_GET['codprod']."' ","SQL_NONE","N");
       echo "idop".$idop_select; 
	   
	$rs_op = $db->query_db("SELECT qtde, codemp FROM op WHERE  idop = '".$idop_select."'","SQL_NONE","N");
	  
	$rs_op_prod = $db->query_db("SELECT codprod FROM op_prod WHERE  idop = '".$idop_select."'","SQL_NONE","N");
	
	if ($rs_op_prod)
	{
		$ix = 0;
		while (!$rs_op_prod->EOF)
		{
	 		$rs_insert_estoque = $db->query_db("UPDATE estoque SET reserva = (reserva - ".$rs_op->fields['qtde'].") WHERE codemp = '".$rs_op->fields['codemp']."' and codprod = '".$rs_op_prod->fields['codprod']."'","SQL_NONE","N");	
				
			$ix++;
			$rs_op_prod->MoveNext();
		}//WHILE
	}
		 
	$rs_del_op_prod = $db->query_db("DELETE FROM op_prod WHERE idop = '".$idop_select."'","SQL_NONE","N");
	$rs_del_op_sn = $db->query_db("DELETE FROM op_sn WHERE idop = '".$idop_select."'","SQL_NONE","N");
	$rs_del_insumos = $db->query_db("DELETE FROM op_insumos WHERE idop = '".$idop_select."'","SQL_NONE","N");
	$rs_del_op = $db->query_db("DELETE FROM op WHERE idop = '".$idop_select."'","SQL_NONE","N");		

	
       
        
    break;
    
	
	 case "CriaLote" :
        #$rs_codbarra = $db->query_db("SELECT codcb FROM codbarra WHERE codbarra ='".$_GET['codbarra']."' and codemp = '".$_GET['codemp']."' and codbarraped <> 1 and codprod = '".$_GET['codprod']."' ","SQL_NONE","N");
		
		//echo "modelo".$idop_mod; 
		//echo "qtde".$qtde_mod;
		//echo "emp".$emp; 
		
		
	if ($emp == 1){
		// VARIAVEIS PADRAO
		$unidade_prod = '99';
		$codemp_estoque = 1;
		#$qtde_lote = ;	
	}
	if ($emp == 14){
	
		// VARIAVEIS PADRAO
		$unidade_prod = '01';
		$codemp_estoque = 14;
		#$qtde_lote = ;	
	}
	
	if ($emp == 18){
	
		// VARIAVEIS PADRAO
		$unidade_prod = '02';
		$codemp_estoque = 18;
		#$qtde_lote = ;	
	}
	
	// MODELO
	$rs_modelo= $db->query_db("SELECT codprod, descr, soft, fax, perif, monitor, cor FROM op_mod WHERE  idop_mod = '".$idop_mod."'","SQL_NONE","N");
	
	  $modelo_prod = $rs_modelo->fields['codprod'];						 
	  $soft =  $rs_modelo->fields['soft'];	 									
	  $fax =  $rs_modelo->fields['fax'];										
	  $cor = $rs_modelo->fields['cor'];	;    									
	  $perif = $rs_modelo->fields['perif'];	   									
	  $descr =  $rs_modelo->fields['descr'];	  	 		
	  $monitor =  $rs_modelo->fields['monitor'];	
	  $qtde_lote = $qtde_mod;								 
	
	
	// PRODUTOS MODELO
	$rs_modelo_prod = $db->query_db("SELECT codprod, lib_imp FROM op_mod_prod WHERE  idop_mod = '".$idop_mod."'","SQL_NONE","N");
	
	if ($rs_modelo_prod)
	{
		$ix = 0;
		while (!$rs_modelo_prod->EOF)
		{
	 
			 $codprod_m[$ix] = $rs_modelo_prod->fields['codprod'];   	
			 $lib_imp[$ix] = $rs_modelo_prod->fields['lib_imp']; 
	
			$ix++;
			$rs_modelo_prod->MoveNext();
		}//WHILE
	}
		
	// INSUMOS
	$rs_modelo_insumos = $db->query_db("SELECT codprod, qtde, unidade FROM op_mod_insumos","SQL_NONE","N");
	
	if ($rs_modelo_insumos)
	{
		$ix = 0;
		while (!$rs_modelo_insumos->EOF)
		{
	 		$codprod_insumo[$ix] = $rs_modelo_insumos->fields['codprod']; 	
			$qtde_ins[$ix] = $rs_modelo_insumos->fields['qtde']; 	
			$unid_ins[$ix] = $rs_modelo_insumos->fields['unidade']; 
			 
			$ix++;
			$rs_modelo_insumos->MoveNext();
		}//WHILE
	}
	
	//echo "<pre>";
	//print_r($codprod_m);
	//print_r($lib_imp);
	//print_r($codprod_insumo);


// CRIA LOTES NO BANCO DE DADOS
$rs_insert_op = $db->query_db("INSERT INTO op SET codemp = '$codemp_estoque' , codprod = '$modelo_prod', qtde= '$qtde_lote' , datainicio = NOW() , codcliente = '$codcli' ","SQL_NONE","N");
$idop = $db->conn->Insert_ID();
#$idop = 423;

if($idop){
	for($i = 0; $i < count($codprod_m); $i++ ){
		
	$rs_insert_op_prod = $db->query_db("INSERT INTO op_prod SET idop = '$idop' , codprod = '$codprod_m[$i]', qtde= '1' ","SQL_NONE","N");	
	$rs_insert_estoque = $db->query_db("UPDATE estoque SET reserva = (reserva + $qtde_lote) WHERE codemp = '$codemp_estoque' and codprod = '$codprod_m[$i]'","SQL_NONE","N");	
	
	
	}//FOR
	
	
	for($i = 0; $i < count($codprod_insumo); $i++ ){
	
	if($qtde_ins[$i] <> 0){	
	
		$rs_insert_op_insumo = $db->query_db("INSERT INTO op_insumos SET idop = '$idop' , codprod = '".$codprod_insumo[$i]."', qtde= '".$qtde_ins[$i]."', unidade = '".$unid_ins[$i]."',  datainsumo = NOW() ","SQL_NONE","N");	
	}
	
	}//FOR
	
	for($i = 1; $i <= $qtde_lote; $i++ ){
		
		$lote_dec = 70000000 + $idop;
		$lote_hex = strtoupper(dechex($lote_dec));
	 	$unidade = 100000 + $i;
	 	$unidade = substr($unidade, 1,6);
	 	$sn  = "MX".$unidade_prod."L".$lote_hex."UN".$unidade;
	 	
	 	#echo $i."-".$sn."<BR>";
		
	$rs_insert_op_sn = $db->query_db("INSERT INTO op_sn SET idop = '$idop' , unidade = '$i' , sn = '$sn'","SQL_NONE","N");	
	
	}//FOR
}
//////////////////////////////////// CRIA LOTES NO BANCO DE DADOS



//////////////////////////////////// CRIA ETIQUETAS
$rs_listprod = $db->query_db("SELECT nomeprod FROM produtos WHERE codprod = '$modelo_prod' ","SQL_NONE","N");


$incr = 275;
if($idop){
	for($i = 0; $i < count($codprod_m); $i++ ){
		
		
	#$rs_insert_op_prod = $db->query_db("INSERT INTO op_prod SET idop = '$idop' , codprod = '$codprod_m[$i]', qtde= '1' ","SQL_NONE","N");	
	#$rs_insert_estoque = $db->query_db("UPDATE estoque SET reserva = (reserva + $qtde_lote) WHERE codemp = '$codemp_estoque' and codprod = '$codprod_m[$i]'","SQL_NONE","N");	
	
	$rs_listprod_p = $db->query_db("SELECT nomeprod FROM produtos WHERE codprod = '$codprod_m[$i]' ","SQL_NONE","N");
	
	if ($lib_imp[$i] == 1){ $text1 .= "^FO150,".$incr."^A0,20,15^FD- ".$rs_listprod_p->fields['nomeprod']."^FS";$incr = $incr + 20;}
	
	
	}//FOR
	
	if ($fax == 1){$text1 .= "^FO150,".$incr."^A0,20,15^FD- FAX MODEM 56K^FS";$incr = $incr + 20;}
	if ($perif == 1){$text1 .= "^FO150,".$incr."^A0,20,15^FD- TECLADO, MOUSE OPTICO, CAIXAS DE SOM^FS";$incr = $incr + 20;}
	if ($soft == 1){$text1 .= "^FO150,".$incr."^A0,20,15^FD- SISTEMA OPERACIONAL MURIQUI LINUX^FS";$incr = $incr + 20;}
	
	for($i = 1; $i <= $qtde_lote; $i++ ){
		
		$lote_dec = 70000000 + $idop;
		$lote_hex = strtoupper(dechex($lote_dec));
	 	$unidade = 100000 + $i;
	 	$unidade = substr($unidade, 1,6);
	 	$sn  = "MX".$unidade_prod."L".$lote_hex."UN".$unidade;
	 	
	 	echo $i."-".$sn."<BR>";
		
	//$rs_insert_op_sn = $db->query_db("INSERT INTO op_sn SET idop = '$idop' , unidade = '$i' , sn = '$sn'","SQL_NONE","N");

	
	$text .= "^XA";
	$text .= "^PQ3,0,0,N";
	if ($cor==0){$text .= "^FO150,60^GB400,50,3^FS";}
	if ($cor==1){$text .= "^FO150,60^GB400,1,50^FS";}
	#$text .= "^FO150,75^A0,35,30^FR^FD".$rs_listprod->fields['nomeprod']."^FS";
	$text .= "^FO60,70^A0,40,35^FR^FD".$modelo_prod."^FS";
	$text .= "^FO170,75^A0,25,25^FR^FD".$descr."^FS";
	$text .= "^FO55,130^BCN,70,Y,N,N^FD".$sn."^FS";
	$text .= "^FO150,255^A0,20,30^FDCONFIGURACAO^FS";
	
	$text .= $text1;
	
	$text .= "^FO220,470^A0,15,15^FD PRODUZIDO POR ^FS";
	$text .= "^FO330,470^A0,15,20^FDMAXXMICRO INDUSTRIA DE^FS";
	$text .= "^FO230,485^A0,15,20^FDEQUIPAMENTOS DE INFORMATICA LTDA^FS";
	$text .= "^FO320,500^A0,15,15^FDAV. RIO BRANCO 870 - MANOEL HONORIO^FS";
	$text .= "^FO305,515^A0,15,15^FDJUIZ DE FORA - MG - CEP 36035-000^FS";
	$text .= "^FO390,530^A0,15,15^FDCNPJ: 07.296.453/0001-56^FS";
	$text .= "^FO140,260^GB2,280,3,B,5^FS";
	$text .= "^FO140,460^GB420,2,3,B,5^FS";
	$text .= "^FO50,260^XGE:MAXXPC.GRF^FS";
	$text .= "^XZ";
	#$text .= "";
	
	if ($monitor == 1){
		
		$rs_listprod_p1 = $db->query_db("SELECT nomeprod FROM produtos WHERE codprod = '$codprod_m[11]' ","SQL_NONE","N");
		
		$text .= "^XA";
		$text .= "^PQ2,0,0,N";
		if ($cor==0){$text .= "^FO150,60^GB400,50,3^FS";}
		if ($cor==1){$text .= "^FO150,60^GB400,1,50^FS";}
		#$text .= "^FO150,75^A0,35,30^FR^FD".$rs_listprod->fields['nomeprod']."^FS";
		$text .= "^FO60,70^A0,40,35^FR^FD".$modelo_prod."^FS";
		$text .= "^FO170,75^A0,25,25^FR^FD".$descr."^FS";
		$text .= "^FO55,130^BCN,70,Y,N,N^FD".$sn."^FS";
		$text .= "^FO150,255^A0,20,30^FDCONFIGURACAO^FS";
		
		$text .= "^FO150,275^A0,20,15^FD- ".$rs_listprod_p1->fields['nomeprod']."^FS";
		
		$text .= "^FO220,470^A0,15,15^FD PRODUZIDO POR ^FS";
		$text .= "^FO330,470^A0,15,20^FDMAXXMICRO INDUSTRIA DE^FS";
		$text .= "^FO230,485^A0,15,20^FDEQUIPAMENTOS DE INFORMATICA LTDA^FS";
		$text .= "^FO320,500^A0,15,15^FDAV. RIO BRANCO 870 - MANOEL HONORIO^FS";
		$text .= "^FO305,515^A0,15,15^FDJUIZ DE FORA - MG - CEP 36035-000^FS";
		$text .= "^FO390,530^A0,15,15^FDCNPJ: 07.296.453/0001-56^FS";
		$text .= "^FO140,260^GB2,280,3,B,5^FS";
		$text .= "^FO140,460^GB420,2,3,B,5^FS";
		$text .= "^FO50,260^XGE:MAXXPC.GRF^FS";
		$text .= "^XZ";
		
	}
	
	}//FOR
}


#echo $text;


#echo("$texto");
$filename = "etiquetas/".$lote_hex.".txt";
if (!is_file($filename)){
	fopen($filename, 'x+');
}


// Tendo certeza que o arquivo existe e que há permissão de escrita primeiro.
if (is_writable($filename)) {

   // Em nosso exemplo, nós estamos abrindo $filename em modo de append (acréscimo).
   // O ponteiro do arquivo estará no final dele desde
   // que será aqui que $somecontent será escrito com fwrite().
   if (!$handle = fopen($filename, 'w')) {
         print "Erro abrindo arquivo ($filename)";
         exit;
   }

   
   // Escrevendo $somecontent para o arquivo aberto.
   if (!fwrite($handle, $text)) {
       print "Erro escrevendo no arquivo ($filename)";
       exit;
   }

   print "Sucesso: escrito no arquivo ($filename)";

   fclose($handle);

} else {
   print "The file $filename is not writable";
}
//////////////////////////////////// CRIA ETIQUETAS
        
        
    break;
    
    
}

	

$db->disconnect();



?>
