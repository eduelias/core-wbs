<?

/// NUMERO DO IDOP
#$idop = 940; 

 //INSUMOS
			  $codprod_insumo[0] = "2974";	$qtde_ins[0] = 0;	$unid_ins[0] = "UN"; //CAIXA MAXX-PC
			  $codprod_insumo[1] = "2975";	$qtde_ins[1] = 3;	$unid_ins[1] = "UN"; //ETIQUETA CODBARRA		  
			  $codprod_insumo[2] = "2976";	$qtde_ins[2] = 0;	$unid_ins[2] = "UN"; //ETIQUETA LOGO		  
			  $codprod_insumo[3] = "2977";	$qtde_ins[3] = 1;	$unid_ins[3] = "UN"; //ETIQUETA LINUX
			  $codprod_insumo[4] = "2978";	$qtde_ins[4] = 0;	$unid_ins[4] = "UN"; //LACRE GARENTIA  //padrao:2
			  $codprod_insumo[5] = "2979";	$qtde_ins[5] = 0;	$unid_ins[5] = "UN"; //MANUAL DE INSTALACAO
			  $codprod_insumo[6] = "2980";	$qtde_ins[6] = 0;	$unid_ins[6] = "METRO"; //FITA ADESIVA	MAXX-PC //padrao 2m


switch ($modelo)
  {
  	
  
			  
			 case "2598":
    			// MODELO MAXX-PC MC01
			  $codprod_m[0] = "2577";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "1532";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2310";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
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
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA // 512 mb
			  $codprod_m[2] = "2792";	$lib_imp[2] = 1;	//HD  		  // 80 gb
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  #$codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  #$codprod_m[4] = "2245";	$lib_imp[4] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[4] = "2747";	$lib_imp[4] = 0;	//PL MAE
			  #$codprod_m[5] = "1397";	$lib_imp[5] = 0;	//FONTE
			  
			
			  $modelo_prod = "2608";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MC01S";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			 case "3061":
    			// MODELO MAXX-PC MC02S
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA // 1 gb
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD  		  // 160 gb
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  #$codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  #$codprod_m[4] = "2245";	$lib_imp[4] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[4] = "2747";	$lib_imp[4] = 0;	//PL MAE
			  #$codprod_m[5] = "1397";	$lib_imp[5] = 0;	//FONTE
			  
			
			  $modelo_prod = "3061";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC MC02S";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;									
			  
			case "2582":
    			// MODELO MAXX-PC MC02
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2792";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  #$codprod_m[7] = "1397";	$lib_imp[7] = 0;	//FONTE
			  
			
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
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  #$codprod_m[7] = "1397";	$lib_imp[7] = 0;	//FONTE
			  
			
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
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
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
			  $codprod_m[0] = "2969";   	$lib_imp[0] = 1;	//PROCESSADOR // 2969
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA  //2691
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE   //2747
			  #$codprod_m[7] = "1397";	$lib_imp[7] = 0;	//FONTE
			  
			
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
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
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
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  #$codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[4] = "2790";	$lib_imp[4] = 1;	//CD/DVD
			  $codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  #$codprod_m[7] = "1397";	$lib_imp[7] = 0;	//FONTE
			  
			
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
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2792";	$lib_imp[2] = 1;	//HD  // padrao: 2792
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2812";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMC02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			    case "2889":
    		// MODELO MAXX-PC RMC03
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2792";	$lib_imp[2] = 1;	//HD  //80gb 2792
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX  // PADRAO SEM MODEM
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2889";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMC03";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			   case "2861":
    		// MODELO MAXX-PC RM001
			  $codprod_m[0] = "2969";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[6] = "2790";	$lib_imp[6] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[6] = "2747";	$lib_imp[6] = 0;	//PL MAE
			  
			
			  $modelo_prod = "2861";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RM001";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			   case "2814":
    		// MODELO MAXX-PC RMD02
			  $codprod_m[0] = "2969";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD 			
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM		
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD		
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE 
			  #$codprod_m[9] = "2691";    $lib_imp[9] = 1;	//MEMORIA
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2814";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMD02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  
			    case "3134":
    		// MODELO MAXX-PC RMD03
			  $codprod_m[0] = "2969";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2942";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2988";	$lib_imp[2] = 1;	//HD 			
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM		
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD		
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE 
			  #$codprod_m[9] = "2691";    $lib_imp[9] = 1;	//MEMORIA
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "3134";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMD03";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  
			    case "2858":
    		// MODELO MAXX-PC RME02
			  $codprod_m[0] = "3102";   	$lib_imp[0] = 1;	//PROCESSADOR  // padrao: 2968
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  //$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX  /// PADRAO DESABILITADO
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE  // padrao 2747
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  //$codprod_m[10] = "2605";	$lib_imp[10] = 1;	//LEITOR CARTAO
			  
			
			  $modelo_prod = "2858";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RME02";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;								
			  	
			  
			  
			  case "2948":
    		// MODELO MAXX-PC RME03
			  $codprod_m[0] = "3102";   	$lib_imp[0] = 1;	//PROCESSADOR   
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2942";    	$lib_imp[1] = 1;	//MEMORIA // 2942 padrao 1 de 2gb
			  #$codprod_m[2] = "2691";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[2] = "2988";	$lib_imp[2] = 1;	//HD	// 2988
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE  // 2747
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2948";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RME03";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  
			  case "2949":
    		// MODELO MAXX-PC RME04
			  $codprod_m[0] = "2769";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2779";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2779";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "1998";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "1998";	$lib_imp[4] = 1;	//HD
			  $codprod_m[5] = "2309";	$lib_imp[5] = 0;	//GABINETE
			  $codprod_m[6] = "2293";	$lib_imp[6] = 0;	//TECLADO
			  $codprod_m[7] = "2297";	$lib_imp[7] = 0;	//MOUSE
			  $codprod_m[8] = "3032";	$lib_imp[8] = 0;	//CAIXA SOM
			  $codprod_m[9] = "2790";	$lib_imp[9] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[10] = "2851";	$lib_imp[10] = 0;	//PL MAE
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2949";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RME04";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			  case "2950":
    		// MODELO MAXX-PC RME05
			  $codprod_m[0] = "2730";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2942";    	$lib_imp[1] = 1;	//MEMORIA
			  #$codprod_m[2] = "2691";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[2] = "2988";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[8] = "2851";	$lib_imp[8] = 0;	//PL MAE
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2950";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RME05";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;	
			  
			    case "2951":
    		// MODELO MAXX-PC RMQ01
			  $codprod_m[0] = "2639";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2942";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2942";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "2988";	$lib_imp[3] = 1;	//HD
			  $codprod_m[4] = "2309";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  $codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[8] = "2790";	$lib_imp[8] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[5] = 0;	//FAX
			  $codprod_m[9] = "2851";	$lib_imp[9] = 0;	//PL MAE
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  
			
			  $modelo_prod = "2951";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMQ01";  	 			// DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
			  
			  case "3109":
    		// MODELO MAXX-PC RMS03 SEMPROM
			  $codprod_m[0] = "3095";   	$lib_imp[0] = 1;	//PROCESSADOR + PLACA MAE   
			  $codprod_m[1] = "3110";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[2] = "2942";    	$lib_imp[2] = 1;	//MEMORIA // 2942 padrao 1 de 2gb
			  #$codprod_m[2] = "2691";    	$lib_imp[2] = 1;	//MEMORIA
			  $codprod_m[3] = "2988";	$lib_imp[3] = 1;	//HD	// 2988
			  $codprod_m[4] = "2309";	$lib_imp[4] = 0;	//GABINETE
			  $codprod_m[5] = "2293";	$lib_imp[5] = 0;	//TECLADO
			  $codprod_m[6] = "2297";	$lib_imp[6] = 0;	//MOUSE
			  #$codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[5] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[8] = "2747";	$lib_imp[8] = 0;	//PL MAE  // 2747
			  #$codprod_m[9] = "1397";	$lib_imp[9] = 0;	//FONTE
			  #$codprod_m[8] = "1432";	$lib_imp[8] = 1;	//DRIVE 1.44
			  
			
			  $modelo_prod = "3109";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =1;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC RMS03";  	 			// DESCRICAO MICRO
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[2] = "2792";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[0] = "2967";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  #$codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[0] = "2969";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2593";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  
			
			  
			   case "2719":
    			// MODELO DECISIUM D205
			  $codprod_m[0] = "2969";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  
		
			  
			   case "2583":
    			// MODELO DECISIUM E202
			  $codprod_m[0] = "2647";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[0] = "2968";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2791";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[7] = "3032";	$lib_imp[7] = 0;	//CAIXA SOM
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[1] = "2593";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "852";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2241";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2238";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2240";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "2239";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2624";	$lib_imp[7] = 1;	//CD/DVD
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
			  $codprod_m[1] = "2691";    $lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2374";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[1] = "2691";    $lib_imp[1] = 1;	//MEMORIA
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  $codprod_m[2] = "1602";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2309";	$lib_imp[3] = 0;	//GABINETE
			  $codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  $codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "1638";	$lib_imp[7] = 1;	//CD/DVD
			  $codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[9] = "2282";	$lib_imp[9] = 0;	//PL MAE
			  
			
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  $codprod_m[7] = "2245";	$lib_imp[7] = 1;	//CD/DVD
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
			  $codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
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
			  
			  
			    case "2916":
    			// MODELO DECISIUM ZS
			  $codprod_m[0] = "2769";   	$lib_imp[0] = 1;	//PROCESSADOR
			  #$codprod_m[1] = "1516";    	$lib_imp[1] = 0;	//COOLER
			  $codprod_m[1] = "2691";    	$lib_imp[1] = 1;	//MEMORIA
			  $codprod_m[2] = "2368";	$lib_imp[2] = 1;	//HD
			  $codprod_m[3] = "2828";	$lib_imp[3] = 0;	//GABINETE
			  #$codprod_m[4] = "2293";	$lib_imp[4] = 0;	//TECLADO
			  #$codprod_m[5] = "2297";	$lib_imp[5] = 0;	//MOUSE
			  #$codprod_m[6] = "3032";	$lib_imp[6] = 0;	//CAIXA SOM
			  #$codprod_m[7] = "2790";	$lib_imp[7] = 1;	//CD/DVD
			  #$codprod_m[8] = "1421";	$lib_imp[8] = 0;	//FAX
			  $codprod_m[4] = "2747";	$lib_imp[4] = 0;	//PL MAE
			  
			 
			  $modelo_prod = "2916";						 // COD PRODUTO
			  $soft = 0;  									 // 0 - SEM SOFTWARE, 1 - COM SOFTWARE
			  $fax = 0;  									 // 0 - SEM FAX MODEM, 1 - COM FAX MODEM
			  $cor =1;    									 // 0 - BRANCO, 1 - PRETO
			  $perif =0;    									 // 0 - SEM PERIFERICOS, 1 - COM PERIFERICOS
			  $descr = "MAXX-PC ZS";  	 // DESCRICAO MICRO
			  $monitor = 0;									 // 0 - SEM MONITOR, 1 - COM MONITOR
			 			
			  break;
			  
  }



?>