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
//$db->conn->debug =    true;


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



switch ($modelo)
  {
  	
  	case "2376":
    			// BRANCO 128 Z01 - MAXX COM MONITOR
			  $codprod_m[0] = "1293";   	$lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "229";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "150";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "171";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2056";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "1531";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2137";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2205";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "1544";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "2040";	$lib_imp[10] = 0;	//PL MAE
			  $codprod_m[11] = "1477";	$lib_imp[11] = 0;	//MONITOR
			  			  		
			  $modelo_prod = "2376";				// COD PRODUTO
			  $soft = 1;						// 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  						// 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =0;    						// 0 - BRANCO, 1 - PRETO
			  $descr = "MAXX-PC Z01";  	     			// DESCRICAO MICRO
			  $monitor = 1;						// 0 - SEM MONITOR, 1 - COM MONITOR
			
			  break;	  
    
 	 case "2158":
    			// PRETO X 256 DVD - MAXX COM MONITOR
			  $codprod_m[0] = "1781";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1532";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "712";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2310";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "1901";	$lib_imp[10] = 0;	//PL MAE
			  $codprod_m[11] = "1092";	$lib_imp[11] = 0;	//MONITOR
			  			  		
			  $modelo_prod = "2158";						 // COD PRODUTO
			  $soft = 1;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 226M256DRW BLACK";  	     // DESCRICAO MICRO
			  $monitor = 1;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			
			  break;
			  
	 case "2159":
    			// BRANCO X 256 DVD - MAXX - COM MONITOR
			  $codprod_m[0] = "1293";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "229";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "150";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2056";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "1531";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2182";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2205";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "278";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "2112";	$lib_imp[10] = 0;	//PL MAE
			  $codprod_m[11] = "1678";	$lib_imp[11] = 0;	//MONITOR
			  			  		
			  $modelo_prod = "2159";						 // COD PRODUTO
			  $soft = 1;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =0;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 226M256RW";  	     // DESCRICAO MICRO
			  $monitor = 1;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			
			  break;
			 
	   case "2176":
    			// PRETO X 256 DVD - MAXX
			  $codprod_m[0] = "1293";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "229";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "150";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2310";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "2112";	$lib_imp[10] = 0;	//PL MAE
			  			  		
			  $modelo_prod = "2176";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 226X256DRWX BLACK";  	     // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			
			  break;
			  
	  case "2197":
    			// BRANCO X 256 MAXXPC
			  $codprod_m[0] = "1633";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1532";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2056";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "1531";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2137";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2205";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "278";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "1901";	$lib_imp[10] = 0;	//PL MAE
			  			
			  $modelo_prod = "2197";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =0;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 226X256RWX ";  				 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
	
  	
			  
	   case "2210":
    			// MODELO 306X512DRWX BLACKD - MAXX
			  $codprod_m[0] = "2143";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "151";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2310";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "2291";	$lib_imp[10] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2210";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 306X512DRWX BLACK";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;		
			  
			  
	  case "2211":
    			// MODELO 524X512DRWX BLACK - MAXX
			  $codprod_m[0] = "1506";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1614";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1863";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2241";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2238";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2240";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2239";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[9] = "1901";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2211";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 524X512DRWX BLACK";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
		case "2237":
    			// PRETO X 256 DVD - IPASOFT
			  $codprod_m[0] = "1781";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";   $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "150";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2309";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "2291";	$lib_imp[10] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2237";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. I-226X256DRWX BLACK BOX";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;			
			  
  	
	 case "2252":
    			// PRETO X 128 MAXXPC
			  $codprod_m[0] = "1293";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "229";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "2142";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "171";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2056";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "1531";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2137";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2205";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "278";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "2112";	$lib_imp[10] = 0;	//PL MAE
			  $codprod_m[11] = "1477";	$lib_imp[11] = 0;	//MONITOR
			  
			
			  $modelo_prod = "2252";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =0;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. 226M128DRWX ";  				 // DESCRICAO MICRO
			  $monitor = 1;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
		case "2294":
    			// PRETO X 256 CDRW - IPASOFT
			  $codprod_m[0] = "1781";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1532";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2309";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "1327";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "1901";	$lib_imp[10] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2294";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. I-226X256RWX BLACK BOX";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
		case "2295":
    			// PRETO X 1024 DVD - IPASOFT
			  $codprod_m[0] = "2008";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1614";    $lib_imp[2] = 1;	//MEMORIA 1
			  $codprod_m[3] = "1614";    $lib_imp[3] = 1;	//MEMORIA 2
			  $codprod_m[4] = "1863";	$lib_imp[4] = 1;	//HD
			  $codprod_m[5] = "2241";	$lib_imp[5] = 0;	//GABINETE
			  $codprod_m[6] = "2238";	$lib_imp[6] = 0;	//TECLADO
			  $codprod_m[7] = "2240";	$lib_imp[7] = 0;	//MOUSE
			  $codprod_m[8] = "2239";	$lib_imp[8] = 0;	//CAIXA SOM
			  $codprod_m[9] = "2148";	$lib_imp[9] = 1;	//CD/DVD
			  //$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "1901";	$lib_imp[10] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2295";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. I-805X1024DRWX BLACK BOX";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
		 case "2311":
    			// MODELO I-306X512DRWX BLACK -IPASOFT
			  $codprod_m[0] = "2143";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "151";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2309";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[9] = "1901";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2311";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $descr = "MOD. I-306X512DRWX BLACK BOX";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;				

		case "2312":
    			// MODELO I 524X512DRWX BLACK - IPA
			  $codprod_m[0] = "1506";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1614";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "2314";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2241";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2238";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2240";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2239";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2148";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[9] = "1901";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2312";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MOD. I-524X512DRWX BLACK BOX";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;		  	  	  
 	
		  case "2333":
    			// MODELO I-306X256DRWX BLACKD - IPA
			  $codprod_m[0] = "2143";   $lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "150";    $lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1602";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2309";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2245";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[9] = "2291";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2333";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MOD. I-306X256DRWX BLACK BOX";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
		case "2358":
    			// MODELO  MAXX-PC A01
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2619";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2310";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[6] = "2616";	$lib_imp[6] = 1;	//CD/DVD
			  $codprod_m[7] = "1421";	$lib_imp[7] = 0;	//FAX
			  $codprod_m[8] = "2479";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2358";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC A01";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
		case "2359":
    			// MODELO MAXX-PC D02
			  $codprod_m[0] = "2340";   	$lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1614";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1863";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2310";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2245";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[9] = "2282";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2359";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC D02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;		
			  
			case "2391":
    			// MODELO MAXX-PC P01
			  $codprod_m[0] = "2215";   	$lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "150";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "2368";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2310";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2245";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "1901";	$lib_imp[10] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2391";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC P01";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			  case "2598":
    			// MODELO MAXX-PC MC01
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2310";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2148";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2586";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2598";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MC01";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			  case "2608":
    			// MODELO MAXX-PC MC01S
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  #$codprod_m[4] = "2245";	$lib_imp[4] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[4] = "2747";	$lib_imp[4] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2608";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MC01S";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;									
			  
				case "2582":
    			// MODELO MAXX-PC MC02
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2582";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MC02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  case "2780":
    			// MODELO MAXX-PC MC03
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2245";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2780";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MC03";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  	
			  
			  case "2599":
    			// MODELO MAXX-PC MD01
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2599";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MD01";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			   case "2718":
    			// MODELO MAXX-PC MD02
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2718";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MD02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  case "2609":
    			// MODELO MAXX-PC ME01
			  $codprod_m[0] = "2540";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2368";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2310";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2245";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2479";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2609";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC ME01";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  case "2600":
    			// MODELO MAXX-PC ME02
			  $codprod_m[0] = "2769";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2600";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC ME02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			   case "2812":
    		// MODELO MAXX-PC RMC02
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[8] = "2586";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2812";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMC02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			   case "2814":
    		// MODELO MAXX-PC RMD02
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			   $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[8] = "2586";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2814";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMD02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;											
			  	
			  
			case "2342":
    			// MODELO DECISIUM C201
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2148";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2586";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2342";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM C201";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;						
			  	  
			  
		case "2343":
    			// MODELO DECISIUM C202
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2343";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM C202";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  case "2832":
    			// MODELO DECISIUM C202+
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[8] = "2586";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2832";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM C202+";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  case "2754":
    			// MODELO DECISIUM C203
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2754";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM C203";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
		case "2503":
    			// MODELO DECISIUM C200S
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[7] = "2148";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2503";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM C200S";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
		 
			case "2831":
    			// MODELO DECISIUM C200+
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[7] = "2148";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[7] = "2586";	$lib_imp[7] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2831";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM C200+";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
		case "2535":
    			// MODELO DECISIUM D203
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2535";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM D203";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  
			  case "2536":
    			// MODELO DECISIUM D204V
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2368";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2479";	$lib_imp[9] = 0;	//PL MAE
			  $codprod_m[10] = "710";	$lib_imp[10] = 1;	//PL VIDEO
			  
			
			  $modelo_prod = "2536";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM D204V";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  case "2719":
    			// MODELO DECISIUM D205
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2719";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM D205";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  
		case "2379":
    			// MODELO DECISIUM P201
			  $codprod_m[0] = "1754";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2479";	$lib_imp[9] = 0;	//PL MAE
			  
			 
			  $modelo_prod = "2379";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM P201";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  case "2602":
    			// MODELO DECISIUM P201+
			  $codprod_m[0] = "1754";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			 
			  $modelo_prod = "2602";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM P201+";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;			
			  	
			  
		case "2466":
    			// MODELO DECISIUM P202
			  $codprod_m[0] = "1740";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2479";	$lib_imp[9] = 0;	//PL MAE
			  
			 
			  $modelo_prod = "2466";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM P202";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  case "2583":
    			// MODELO DECISIUM E202
			  $codprod_m[0] = "2647";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			 
			  $modelo_prod = "2583";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM E202";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			   case "2750":
    			// MODELO DECISIUM E203
			  $codprod_m[0] = "2769";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1863";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			 
			  $modelo_prod = "2750";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT DECISIUM E203";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
				  
			case "2349":
    			// MODELO PRIMA C101
			  $codprod_m[0] = "1781";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2368";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "1327";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "1901";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2349";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT PRIMA C101";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
		case "2398":
    			// MODELO PRIMA C100
			  $codprod_m[0] = "1781";   	$lib_imp[0] = 1;	//PROCESSADOR
			  $codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "1532";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "171";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2310";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "2296";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2245";	$lib_imp[8] = 1;	//CD/DVD
			  $codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[10] = "1901";	$lib_imp[10] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2398";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT PRIMA C100";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  	  
			  
		case "2465":
    			// MODELO PRIMA C100S
			  $codprod_m[0] = "2577";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";   $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[8] = "2245";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[7] = "2747";	$lib_imp[7] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2465";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT PRIMA C100S";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
		case "2492":
    			// MODELO PRIMA C101P
			  $codprod_m[0] = "1781";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";   $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "1638";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2586";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2492";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT PRIMA C101P";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			
		
		
		
			  
		 	  
		case "2350":
    			// MODELO SUPREMUS D301
			  $codprod_m[0] = "2208";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2241";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2238";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2240";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2148";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2350";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS D301";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;		
			  
			   case "2648":
    			// MODELO SUPREMUS D301S
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[4] = "2238";	$lib_imp[4] = 0;	//TECLADO
			  #$codprod_m[5] = "2240";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[7] = "2148";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[4] = "2282";	$lib_imp[4] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2648";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS D301S";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
				case "2351":
    			// MODELO SUPREMUS D302
			  $codprod_m[0] = "2558";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "852";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2241";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2238";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2240";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2351";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS D302";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;		
			  
			  	case "2664":
    			// MODELO SUPREMUS D302+
			  $codprod_m[0] = "2558";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2374";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2624";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2664";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS D302+";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			
			case "2491":
    			// MODELO SUPREMUS E401
			  $codprod_m[0] = "2495";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2314";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2241";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2238";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2240";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2624";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2491";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS E401";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  case "2537":
    			// MODELO SUPREMUS E402V
			  $codprod_m[0] = "2495";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2499";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2314";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2241";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2238";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2240";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  $codprod_m[9] = "2472";	$lib_imp[9] = 1;	//PLACA VIDEO
			  
			
			  $modelo_prod = "2537";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS E402V";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;		
			  
			   case "2578":
    			// MODELO SUPREMUS E400
			  $codprod_m[0] = "2647";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2368";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2624";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2578";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS E400";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  			  
			  
			  	case "2562":
    			// MODELO SUPREMUS GAMER E400
			  $codprod_m[0] = "2540";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2374";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2001";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "1531";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "1239";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[7] = "2148";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[6] = "2282";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2562";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT SUPREMUS GAMER E400";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			   case "2606":
    			// MODELO IBOXX C201W+
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2564";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  $codprod_m[10] = "2774";	$lib_imp[10] = 1;	//WINDOWS LICENCA STARTER
			  $codprod_m[11] = "2772";	$lib_imp[11] = 0;	//WINDOWS MIDIA
			  $codprod_m[12] = "2773";	$lib_imp[12] = 0;	//WINDOWS LITERATURA
			  $codprod_m[13] = "2605";	$lib_imp[13] = 1;	//LEITOR CARTAO
			  
			
			  $modelo_prod = "2606";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "IPASOFT IBOXX C201W+";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  	
			  
			  case "2509":
    			// MODELO SERVIDOR IPASOFT S302R-2X160
			  $codprod_m[0] = "2340";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2314";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2124";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[6] = "2245";	$lib_imp[6] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[7] = "2282";	$lib_imp[7] = 0;	//PL MAE
			  $codprod_m[8] = "1397";	$lib_imp[8] = 0;	//FONTE
			  
			
			  $modelo_prod = "2509";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "SERVIDOR IPASOFT S302R-2X160";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			   case "2510":
    			// MODELO  	SERVIDOR IPASOFT S302R-2X300
			  $codprod_m[0] = "2340";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2525";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2124";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[6] = "2245";	$lib_imp[6] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[7] = "2282";	$lib_imp[7] = 0;	//PL MAE
			  $codprod_m[8] = "1397";	$lib_imp[8] = 0;	//FONTE
			  
			
			  $modelo_prod = "2510";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "SERVIDOR IPASOFT S302R-2X300";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			   case "2585":
    			// MODELO  	SERVIDOR IPASOFT S402R-2X160
			  $codprod_m[0] = "2495";   $lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    $lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1614";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2374";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2124";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[9] = "1421";	$lib_imp[9] = 0;	//FAX
			  $codprod_m[8] = "2282";	$lib_imp[8] = 0;	//PL MAE
			  $codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2585";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "SERVIDOR IPASOFT S402R-2X160";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			  case "2751":
    			// MODELO MAXX-PC EPC01
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2619";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "1638";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2751";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC EPC01";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  
			 case "2752":
    			// MODELO MAXX-PC EPC02
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  $codprod_m[10] = "2774";	$lib_imp[10] = 1;	//WINDOWS LICENCA STARTER
			  $codprod_m[11] = "2772";	$lib_imp[11] = 0;	//WINDOWS MIDIA
			  $codprod_m[12] = "2773";	$lib_imp[12] = 0;	//WINDOWS LITERATURA
			  $codprod_m[13] = "1550";	$lib_imp[13] = 0;	//MONITOR
			  
			
			  $modelo_prod = "2752";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC EPC02";  	 			// DESCRICAO MICRO
			  $monitor = 1;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			   case "2753":
    			// MODELO MAXX-PC EPD03
			  $codprod_m[0] = "2558";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2296";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2747";	$lib_imp[9] = 0;	//PL MAE
			  $codprod_m[10] = "2777";	$lib_imp[10] = 1;	//WINDOWS LICENCA HOME
			  $codprod_m[11] = "2775";	$lib_imp[11] = 0;	//WINDOWS MIDIA
			  $codprod_m[12] = "2776";	$lib_imp[12] = 0;	//WINDOWS LITERATURA
			  $codprod_m[13] = "2679";	$lib_imp[13] = 0;	//MONITOR
			  
			
			  $modelo_prod = "2753";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 1;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC EPD03";  	 			// DESCRICAO MICRO
			  $monitor = 1;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
  }






$rs_insert_op = $db->query_db("INSERT INTO op SET codemp = '$codemp_estoque' , codprod = '$modelo_prod', qtde= '$qtde_lote' , datainicio = NOW()  ","SQL_NONE","N");
$idop = $db->conn->Insert_ID();
#$idop = 423;

if($idop){
	for($i = 0; $i < count($codprod_m); $i++ ){
		
	$rs_insert_op_prod = $db->query_db("INSERT INTO op_prod SET idop = '$idop' , codprod = '$codprod_m[$i]', qtde= '1' ","SQL_NONE","N");	
	$rs_insert_estoque = $db->query_db("UPDATE estoque SET reserva = (reserva + $qtde_lote) WHERE codemp = '$codemp_estoque' and codprod = '$codprod_m[$i]'","SQL_NONE","N");	
	
	
	}//FOR
	
	
	for($i = 1; $i <= $qtde_lote; $i++ ){
		
		$lote_dec = 70000000 + $idop;
		$lote_hex = strtoupper(dechex($lote_dec));
	 	$unidade = 100000 + $i;
	 	$unidade = substr($unidade, 1,6);
	 	$sn  = "MX".$unidade_prod."L".$lote_hex."UN".$unidade;
	 	
	 	echo $i."-".$sn."<BR>";
		
	$rs_insert_op_sn = $db->query_db("INSERT INTO op_sn SET idop = '$idop' , unidade = '$i' , sn = '$sn'","SQL_NONE","N");	
	
	}//FOR
}

$db->disconnect();
?>
