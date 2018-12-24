<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

echo("

<table border='0' width='100%' cellspacing='1' height='31'>
  <tr>
    <td width='50%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODPED</font></b></td>
     <td width='20%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>DATAPED</font></b></td>
    <td width='10%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CONT</font></b></td>
    <td width='10%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>KIT</font></b></td>
    <td width='10%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>TOTAL</font></b></td>
    
  </tr>


");

$felipe = "felipe";

		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codbarra, pedido.codped, dataped, dataentrega, status", "pedido", "dataped like '$ano-$mes%' and cancel <> 'OK' and  ped_transf <> 'OK' ", $array, $array_campo, "ORDER BY codped");
		#$prod->listProdSum("codbarra, pedido.codped, dataped, dataentrega, status", "pedido", "dataped >= '2005-08-01' and cancel <> 'OK' and ped_transf <> 'OK' ", $array, $array_campo, "ORDER BY codped");
		#$prod->listProdSum("codbarra, pedido.codped", "pedido", "dataped >= '2005-08-01' and cancel <> 'OK' and  ped_transf <> 'OK' ", $array, $array_campo, "ORDER BY codped");
		
		$contador_pedidos = count($array);
		
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codbarra = $prod->showcampo0();
			$codped = $prod->showcampo1();
			$dataped = $prod->showcampo2();
			$dataentr = $prod->showcampo3();
			$status = $prod->showcampo4();
			$reinc = 0;
			$os_cj = 0;
			$os_kit = 0;
			$reinc_cj = 0;
			$reinc_kit = 0;
			$count_os = 0;
			
			
			
			$prod->clear();
			$prod->listProdSum("COUNT(tipocj)", "pedidoprod", "codped='$codped' and tipoprod = 'CJ' and tipocj <> 0", $array1, $array_campo1, "GROUP by tipocj");
			#$prod->mostraProd( $array1, $array_campo1, 0 );
			$conta = count($array1);
			
			#echo "contador - $i :".$contador[$i];
			
			$prod->clear();
			$prod->listProdU("SUM(qtde) as kit", "pedidoprod, produtos", "codped='$codped' and tipoprod = 'UM' and (codcat = 73 or codcat = 72) and pedidoprod.codprod = produtos.codprod GROUP by tipocj");
			$kit = $prod->showcampo0();
			
			if ($conta > 0 or $kit > 0){
				
				#echo "conta= $conta : kit = $kit<br>"; 
				
			
				
			$prod->clear();
			$prod->listProdSum("codos_at, dataos_at_ini", "os_at", "codped='$codped' and cancel <> 'OK' AND dataos_at_ini >= DATE_ADD( '$dataped' , INTERVAL $ini DAY )  AND dataos_at_ini  <= DATE_ADD( '$dataped' , INTERVAL $fim DAY ) ", $array3, $array_campo3, "");
			for($k = 0; $k < count($array3); $k++ ){
			$count_os = count($array3);
			$prod->mostraProd( $array3, $array_campo3,$k);
			$codos_at = $prod->showcampo0();
			$dataos_at = $prod->showcampo1();
			#echo "data= $dataos_at";
			
			#echo "ped = $codped : conta= $conta : kit = $kit : os = $count_os: os_at = $codos_at<br>"; 
			
			if ($count_os > 1){$reinc = ($count_os-1);$count_os = 1;}
	
		
			if ($count_os){
				
				if ($conta > 0){
					
					$os_cj = $count_os;$reinc_cj = $reinc;
					
					$prod->clear();
					$prod->listProdU("DATEDIFF( dataos_at_ini, '$dataped' ) as prazo", "os_at, os_at_analise, os_at_srv_exec", "os_at.codos_at = '$codos_at' and os_at.cancel <> 'S' and os_at.codos_at = os_at_analise.codos_at and os_at_srv_exec.codsrv_exec = os_at_analise.codsrv_exec and (cat ='CPU' )");
					$prazo_cj = $prod->showcampo0();
					
					if ($prazo_cj){echo"$prazo_cj;cj<br>";}
							
					//echo "CJ";
					
					$prod->clear();
					$prod->listProdSum("cat, os_at_analise.codsrv_exec, count(*)", "os_at_analise, os_at_srv_exec", "os_at_analise.codsrv_exec=os_at_srv_exec.codsrv_exec and codos_at = '$codos_at' and cancel <> 'S'  ", $array4, $array_campo4, "GROUP by cat");
						
					for($j = 0; $j < count($array4); $j++ ){
					$prod->mostraProd( $array4, $array_campo4, $j );
					$cat= $prod->showcampo0();
					//$cat= $prod->showcampo1();
					$soma_cat= $prod->showcampo2();
					
					//echo "CAT = ".$cat."<BR>";
							
					if ($cat == 'CPU'){$oc_1 = $oc_1 + $soma_cat;}
					if ($cat == 'PERI'){$oc_2 = $oc_2 + $soma_cat;}
					if ($cat == 'INST'){$oc_3 = $oc_3 + $soma_cat;}
					if ($cat == 'SOFT'){$oc_4 = $oc_4 + $soma_cat;}
					if ($cat == 'CORT'){$oc_5 = $oc_5 + $soma_cat;}
					if ($cat == 'ONS'){$oc_6 = $oc_6 + $soma_cat;}
					if ($cat == 'REV'){$oc_7 = $oc_7 + $soma_cat;}
					if ($cat == 'FORA'){$oc_8 = $oc_8 + $soma_cat;}
					if ($cat == 'OUTROS'){$oc_9 = $oc_9 + $soma_cat;}
					if ($cat == 'PECA'){$oc_10 = $oc_10 + $soma_cat;}
					
					$soma_total_cj = $soma_total_cj + $soma_cat;
					
					}//FOR
					
					$prod->clear();
					$prod->listProdSum("descricao, os_at_analise.codsrv_exec", "os_at_analise, os_at_srv_exec", "os_at_analise.codsrv_exec=os_at_srv_exec.codsrv_exec and codos_at = '$codos_at' and cancel <> 'S'  ", $array4, $array_campo4, "");
						
					for($u = 0; $u < count($array4); $u++ ){
					$prod->mostraProd( $array4, $array_campo4, $u );
					$descricao= $prod->showcampo0();
					$cod_srv= $prod->showcampo1();
					$soma_srv= $prod->showcampo2();
					
					$codsrv[$cod_srv] = $cod_srv;
					$desc[$cod_srv] = $descricao;
					$catc[$cod_srv] = $cat;
					$soma[$cod_srv] = $soma[$cod_srv] + 1;
					
					#echo "$codsrv[$cod_srv];$desc[$cod_srv];$soma[$cod_srv];CJ<br>";
							
					
					}//FOR
				}else{
					
					$os_kit = $count_os;$reinc_kit = $reinc;
					
					$prod->clear();
					$prod->listProdU("DATEDIFF( dataos_at_ini, '$dataped' ) as prazo", "os_at, os_at_analise, os_at_srv_exec", "os_at.codos_at = '$codos_at' and os_at.cancel <> 'S' and os_at.codos_at = os_at_analise.codos_at and os_at_srv_exec.codsrv_exec = os_at_analise.codsrv_exec and (cat ='CPU' )");
					$prazo_kit = $prod->showcampo0();
					
					if ($prazo_kit){echo"$prazo_kit;kit<br>";}
					//echo "KIT";
					
					
					$prod->clear();
					$prod->listProdSum("cat, os_at_analise.codsrv_exec, count(*)", "os_at_analise, os_at_srv_exec", "os_at_analise.codsrv_exec=os_at_srv_exec.codsrv_exec and codos_at = '$codos_at' and cancel <> 'S' ", $array5, $array_campo5, "GROUP by cat");
						
					for($j = 0; $j < count($array5); $j++ ){
					$prod->mostraProd( $array5, $array_campo5, $j );
					$cat1= $prod->showcampo0();
					//$cat= $prod->showcampo1();
					$soma_cat= $prod->showcampo2();
				
					//echo "CAT = ".$cat1."<BR>";
						
					if ($cat1 == 'CPU'){$oc_1k = $oc_1k + $soma_cat;}
					if ($cat1 == 'PERI'){$oc_2k = $oc_2k + $soma_cat;}
					if ($cat1 == 'INST'){$oc_3k = $oc_3k + $soma_cat;}
					if ($cat1 == 'SOFT'){$oc_4k = $oc_4k + $soma_cat;}
					if ($cat1 == 'CORT'){$oc_5k = $oc_5k + $soma_cat;}
					if ($cat1 == 'ONS'){$oc_6k = $oc_6k + $soma_cat;}
					if ($cat1 == 'REV'){$oc_7k = $oc_7k + $soma_cat;}
					if ($cat1 == 'FORA'){$oc_8k = $oc_8k + $soma_cat;}
					if ($cat1 == 'OUTROS'){$oc_9k = $oc_9k + $soma_cat;}
					if ($cat1 == 'PECA'){$oc_10k = $oc_10k + $soma_cat;}
					
					$soma_total_kit = $soma_total_kit + $soma_cat;
					
					}//FOR
					
					$prod->clear();
					$prod->listProdSum("descricao, os_at_analise.codsrv_exec", "os_at_analise, os_at_srv_exec", "os_at_analise.codsrv_exec=os_at_srv_exec.codsrv_exec and codos_at = '$codos_at' and cancel <> 'S'  ", $array4, $array_campo4, "");
						
					for($u = 0; $u < count($array4); $u++ ){
					$prod->mostraProd( $array4, $array_campo4, $u );
					$descricao= $prod->showcampo0();
					$cod_srv= $prod->showcampo1();
					$soma_srv= $prod->showcampo2();
					
					$codsrvk[$cod_srv] = $cod_srv;
					$desck[$cod_srv] = $descricao;
					$catk[$cod_srv] = $cat1;
					$somak[$cod_srv] = $somak[$cod_srv] + 1;
					
					#echo "$codsrvk[$cod_srv];$desck[$cod_srv];$somak[$cod_srv];KIT<br>";
							
					
					}//FOR
									
				}
			
					
					
			}//SE EXISTE OS
			
			}//FOR
			
	
			
			
			}// SE EXISTE CJ OU KIT
			
			$t = $conta + $kit;
			
			if ($t >0){
				/*
			echo("
		 <tr>
    <td width='50%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$codbarra - $status</font></td>
    <td width='20%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$dataped - $dataentr</font></td>
    <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$conta - $os_cj - $reinc_cj</font></b></td>
      <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$kit - $os_kit - $reinc_kit</font></b></td>
    <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$t</font></b></td>
  </tr>

");
*/
			}
$countt = $countt + $conta;
$kitt= $kitt + $kit;
$tt = $tt + $t;
$tos_cj = $tos_cj + $os_cj;
$tos_kit = $tos_kit + $os_kit;
$treinc_cj = $treinc_cj + $reinc_cj;
$treinc_kit = $treinc_kit + $reinc_kit;


		}//FOR
		
		echo("
		
		 <tr>
    <td width='50%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'></font></td>
    <td width='20%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'></font></td>
    <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$countt - $tos_cj - $treinc_cj</font></b></td>
      <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$kitt - $tos_kit - $treinc_kit</font></b></td>
    <td width='10%' height='8' bgcolor='#EBEBEB'><b><font face='Verdana' size='1'>$tt</font></b></td>
  </tr>
  </table>
  ");

		
echo("TOTAL DE ANALISES_CONJUNTOS : $soma_total_cj <BR>CPU: $oc_1 <BR>PECA: $oc_10 <BR>PERI: $oc_2 <BR>INST: $oc_3 <BR>SOFT: $oc_4 <BR>CORT: $oc_5 <BR>ONS: $oc_6 <BR>REV: $oc_7 <BR>FORA: $oc_8 <BR>OUTROS: $oc_9<br><br>");

for($u = 30000; $u < 30300; $u++ ){
	
	if ($codsrv[$u]){
	echo "$codsrv[$u];$desc[$u];$soma[$u];$catc[$u];CJ<br>";
	}
	
}//FOR

echo("<BR>TOTAL DE ANALISES_KITS : $soma_total_kit <BR>CPU: $oc_1k <BR>PECA: $oc_10k <BR>PERI: $oc_2k <BR>INST: $oc_3k <BR>SOFT: $oc_4k <BR>CORT: $oc_5k <BR>ONS: $oc_6k <BR>REV: $oc_7k <BR>FORA: $oc_8k <BR>OUTROS: $oc_9k<br><br>");
		

for($u = 30000; $u < 30300; $u++ ){
	
	if ($codsrvk[$u]){
	echo "$codsrvk[$u];$desck[$u];$somak[$u];$catk[$u];KIT<br>";
	}
}//FOR


		
#echo("TOTAL DE PEDIDOS : $i <BR>TOTAL DE PEDIDOS C/ CONJUNTO: $u <BR>TOTAL DE CONJUNTOS : $countt");

