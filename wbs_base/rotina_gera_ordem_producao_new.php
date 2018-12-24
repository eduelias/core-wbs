
<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_seed.php
|  template:    sistema_seed.htm
+--------------------------------------------------------------
*/

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

$db->connect_wbs();
//$db->conn->debug = true;

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


include ("rotina_gera_ordem_producao_config.php");


#$rs_insert_op = $db->query_db("INSERT INTO op SET codemp = '$codemp_estoque' , codprod = '$modelo_prod', qtde= '$qtde_lote' , datainicio = NOW()  ","SQL_NONE","N");
#$idop = $db->conn->Insert_ID();
#$idop = 697;//1771
#$idop = $idop_etiquetas;

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


echo $text;


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

/*
// ARQUIVO DIRETRIZ DO FTP

$filename = "etiquetas/diretriz.txt";
if (!is_file($filename)){
	fopen($filename, 'x+');
}
$diretriz .= "open 200.251.60.119\n";
$diretriz .= "etq\n";
$diretriz .= "951786\n";
$diretriz .= "LCD c:\etiqueta\n";
$diretriz .= "get ".$lote_hex.".txt\n";
$diretriz .= "bye\n";


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
   if (!fwrite($handle, $diretriz)) {
       print "Erro escrevendo no arquivo ($filename)";
       exit;
   }

   print "Sucesso: escrito no arquivo ($filename)";

   fclose($handle);

} else {
   print "The file $filename is not writable";
}

// ARQUIVO BAT DE IMPRESSAO

$filename = "etiquetas/imp.bat";
if (!is_file($filename)){
	fopen($filename, 'x+');
}
$imp .= "type c:\etiqueta\\".$lote_hex.".txt > lpt1\n";
$imp .= "del c:\etiqueta\sys\diretriz.txt\n";
$imp .= "del c:\etiqueta\sys\md5ver.txt\n";
$imp .= "exit\n";


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
   if (!fwrite($handle, $imp)) {
       print "Erro escrevendo no arquivo ($filename)";
       exit;
   }

   print "Sucesso: escrito no arquivo ($filename)";

   fclose($handle);

} else {
   print "The file $filename is not writable";
}


// ARQUIVO MD5 VERIFICACAO

$md5_dir = md5($diretriz);
$md5_imp = md5($imp);
$md5_etq = md5($text);
echo $md5_etq;

$filename = "etiquetas/md5ver.txt";
if (!is_file($filename)){
	fopen($filename, 'x+');
}
$md5ver .= $md5_etq." *../".$lote_hex.".txt";
#$md5ver .= $md5_dir." *diretriz.txt";


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
   if (!fwrite($handle, $md5ver)) {
       print "Erro escrevendo no arquivo ($filename)";
       exit;
   }

   print "Sucesso: escrito no arquivo ($filename)";

   fclose($handle);

} else {
   print "The file $filename is not writable";
}
*/
$db->disconnect();
?>
